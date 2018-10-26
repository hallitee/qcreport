<?php

namespace App\Http\Controllers;

use App\measuregrp;
use Illuminate\Http\Request;
use Auth;
use App\matgroup;
use App\probe;


class MeasuregrpController extends Controller
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
		 $m = matgroup::with('entity')->whereHas('entity', function($query) use ($u){ return $query->where('name', $u->company); })->get();
		 foreach($m as $a){
			 $mat[$a->id] = $a->name.' - '.$a->entity->name;
		 }			 
		 }
		 return $mat;
	 }	 
    public function index()
    {
		$mg = measuregrp::with('probes')->paginate(10);
        return view('measuregrp.list')->with(['mg'=>$mg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mat = $this->loadMat();
		return view('measuregrp.index')->with('mat', $mat);
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
	
		$mg = new measuregrp;
		$mg->mat_id = $req->matid;
		$mg->name = $req->name;
		$mg->save();
		
	
	//$items = Input::get('items');
	$items = $req->input('items');
	//$item->insert($items);
	//$doc->item()->saveMany($items);
	foreach($items as $key => $val){
			$item = new probe;
			$item->prop = $val['prop'];
			$item->unit = $val['unit'];
			$item->method = $val['method'];
			$item->tarType = $val['type'];
			$item->tarName = $val['target'];
			$item->iLow = $val['min'];
			$item->iHigh = $val['max'];
			$item->error = $val['tol'];
			$item->measuregrps_id = $mg->id;
			$item->save();
	} 
		return redirect('measuregrp')->with('status', 'Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\measuregrp  $measuregrp
     * @return \Illuminate\Http\Response
     */
    public function show(measuregrp $measuregrp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\measuregrp  $measuregrp
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
		$mat = $this->loadMat();
		$mg= measuregrp::with(['matgroup','probes'])->find($req->id);
		return view('measuregrp.edit')->with(['mg'=>$mg,'mat'=>$mat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\measuregrp  $measuregrp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, measuregrp $measuregrp)
    {
        //
		$mg= measuregrp::with('probes')->find($req->id);
		$mg->fill($req->all())->save();
		$mg->probes->fill($req->all)->save();
		//$mg->push();
		return redirect('measuregrp')->with('status', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\measuregrp  $measuregrp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
		$m = measuregrp::find($req->id);
		$m->delete();
		return redirect('measuregrp')->with('status', 'Deleted successfully');
    }
}
