<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\qcpass;
use Illuminate\Http\Request;
use Auth;
use App\matgroup;
use App\product; 
use App\sample;
use App\Jobs\sendApprovalEmailJob;
use App\Mail\approvalEmail;

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
		$pass = qcpass::with('product.measures.probes')->find($req->id);
		$sample=5;
		if($req->has('sample')){
			$sample=$req->sample;
		}
		return view('qcpass.analysis')->with(['pass'=>$pass, 'sample'=>$req->sample]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function analysisedit(Request $req)
    {
		$pass = qcpass::with('product.measures.probes')->find($req->id);
		$samp = sample::where('qcpass_id', $req->id)->get();
		return view('qcpass.analysisedit')->with(['pass'=>$pass, 'samp'=>$samp]);
	}
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
		$s='';

		if($req->has('sample')){
		$pass = qcpass::with('product.measures.probes')->find($req->id);
			foreach($pass->product->measures as $m){
				foreach($m->probes as $key=>$p){
					$sam = new sample;
					$sam->coa = $req->data["coa"][strval($p->prop)][strval($p->id)];
					$sam->name = "data[".$p->prop."][".$p->id."][".$pass->id."]";
					for($x=1;$x<=intval($req->sample);$x++){
						$n = "data".$x;
					$sam->$n = $req->data[strval($p->prop)][strval($p->id)][strval($x)];
					}		
					$sam->metric1 = $p->id;
					
					$sam->qcpass_id = $pass->id;	
					$sam->save();				
				}
			}
			$pass->metric2 = $req->sample;
			if($req->saveButton=='SAVE ANALYSIS'){
			$pass->metric3 = 45; //partially save without sending email to QC manager
			$pass->metric4++;
			}
			else{	
			$pass->metric3 = 40;  //final analysis value and send mail to QC manager
			$pass->metric4++;
			$newApprovalJob = (new sendApprovalEmailJob($pass))->delay(Carbon::now()->addMinutes(1));
			dispatch($newApprovalJob);				
			}			
			$pass->save();
			
			return redirect('qcpass')->with('status', 'Updated successfully, approver notified');

		//	echo $req->data['coa']['Inner core diameter'];
			
		}else{
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
    public function edit(Request $req)
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
    public function update(Request $req)
    {
 
			$pass = qcpass::with('product.measures.probes')->find($req->id);
			foreach($pass->product->measures as $m){
				foreach($m->probes as $key=>$p){
					$sam = sample::where("name","=", "data[".$p->prop."][".$p->id."][".$pass->id."]")->first();
					
					if($sam==null){
						
						return redirect('qcpass')->with('status', 'Sample cant be null');
					}
					$sam->coa = $req->data['coa'][strval($p->prop)][strval($p->id)];
					//$sam->name = "data[".$p->prop."][".$p->id."]";
					for($x=1;$x<=intval($req->sample);$x++){
						$n = "data".$x;
					$sam->$n = $req->data[strval($p->prop)][strval($p->id)][strval($x)];
					}		
					$sam->metric1 = $p->id;
					$sam->metric2= $p->name;
					$sam->qcpass_id = $pass->id;	
					$sam->save();				
				}
			}
			$pass->metric2 = $req->sample;
			if($req->saveButton=='SAVE ANALYSIS'){
			$pass->metric3 = 45; //partially save without sending email to QC manager
			$pass->metric4++;
			}
			else{
			$pass->metric3 = 40;  //final analysis value and send mail to QC manager
			$pass->metric4++;
			$newApprovalJob = (new sendApprovalEmailJob($pass))->delay(Carbon::now()->addMinutes(1));
			dispatch($newApprovalJob);				
			}			
			$pass->save();
			return redirect('qcpass')->with('status', 'Updated successfully, approver notified');
			
	
		
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
