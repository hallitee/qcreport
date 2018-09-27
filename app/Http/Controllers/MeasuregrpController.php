<?php

namespace App\Http\Controllers;

use App\measuregrp;
use Illuminate\Http\Request;
use Auth;
use App\matgroup;


class MeasuregrpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function loadMat(){
		 $u =  Auth::user();
		 $mat= [];
		 if ($u->priv()>0 || $u->isAdmin()){
		 $m = matgroup::with('entity')->get();
		 foreach($m as $a){
			 $mat[$a->id] = $a->name.' - '.$a->entity->name;
		 }  
		 }
		 else{
		 $m = matgroup::with('entity')->whereHas('entity', function($query){ return $query->where('name','NPRNL'); })->get();
		 foreach($m as $a){
			 $mat[$a->id] = $a->name.' - '.$a->entity->name;
		 }			 
		 }
		 return $mat;
	 }	 
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    public function edit(measuregrp $measuregrp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\measuregrp  $measuregrp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, measuregrp $measuregrp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\measuregrp  $measuregrp
     * @return \Illuminate\Http\Response
     */
    public function destroy(measuregrp $measuregrp)
    {
        //
    }
}
