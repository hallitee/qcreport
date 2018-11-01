<?php

namespace App\Http\Controllers;

use App\qcpass;
use Illuminate\Http\Request;
use Auth;
use App\matgroup;
use App\product; 

class QcpassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 	public function __construct(){
		 $this->middleware('auth');	
		}
		 public function loadMat(){
		 $u =  Auth::user();
		 $mat= [];
		 if ($u->priv()>2 || $u->isAdmin()){
		 $m = matgroup::with('entity')->get();
		 foreach($m as $a){
			 $mat[$a->id] = $a->name.' - '.$a->entity->name;
		 }  
		 }
		 else{
		 $m = matgroup::with('entity')->whereHas('entity', function($query) use ($u){ return $query->where('name',$u->company); })->get();
		 foreach($m as $a){
			 $mat[$a->id] = $a->name.' - '.$a->entity->name;
		 }			 
		 }
		 return $mat;
	 }
    public function index()
    {
        //
		$qc = qcpass::with('product')->orderBy('created_at', 'DESC')->paginate(10);
		return view('qcpass.list')->with(['qc'=>$qc]);
    }
	public function analysis(Request $req){
		$pass = qcpass::with('product')->find($req->id);
		return view('qcpass.analysis')->with(['pass'=>$pass]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$mat = $this->loadMat();
		$comp= Auth::user()->company;	
		$arr = [];
		$prod = product::whereHas('matgroup', function($q) use ($comp){
			$q->whereHas('entity', function($p) use ($comp){ $p->where('name', $comp); });
		})->get();
		foreach($prod as $m){
			$arr[$m->id] = $m->name;
		}		
		return view('qcpass.index')->with(['mat'=>$mat, 'prod'=>$arr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
		$pass = new qcpass;
		$pass->matName =  $req->matid;
		$pass->supplier = strtoupper($req->supplier);
		$pass->product_id = $req->product;
		$pass->prodDate = $req->mfgDate;
		$pass->expDate = $req->expDate;
		$pass->arrDate = $req->delDate;
		$pass->samDate = $req->samDate;
		$pass->batch = strtoupper($req->batch);
		$pass->quantity = $req->qtySup;
		$pass->waybill = strtoupper($req->waybill);
		$pass->vehNum = strtoupper($req->vehicle);
		$pass->metric1= strtoupper(Auth::user()->name);
		$pass->metric3 = 50;
		$pass->save();		
		return redirect('qcpass')->with('status', ' Created successfully ');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qcpass  $qcpass
     * @return \Illuminate\Http\Response
     */
    public function show(qcpass $qcpass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qcpass  $qcpass
     * @return \Illuminate\Http\Response
     */
    public function edit(qcpass $qcpass)
    {
        //
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qcpass  $qcpass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qcpass $qcpass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qcpass  $qcpass
     * @return \Illuminate\Http\Response
     */
    public function destroy(qcpass $qcpass)
    {
        //
    }
}
