<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\matgroup;
use Auth;
use App\measuregrp;

class ProductController extends Controller
{
	public function __construct(){
		 $this->middleware('auth');	
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
		 $m = matgroup::with('entity')->whereHas('entity', function($query){ return $query->where('name',$u->company); })->get();
		 foreach($m as $a){
			 $mat[$a->id] = $a->name.' - '.$a->entity->name;
		 }			 
		 }
		 return $mat;
	 }
	 public function loadTest(Request $req){
		 $id = $req->id;
		 /*$u =  Auth::user();
		 $mat= [];
		
		 if ($u->priv()>2 || $u->isAdmin()){
	
		 foreach($m as $a){
			 $mat[$a->id] = $a->name.' - '.$a->matgroup->entity->name;
		 }  
		 }
		 else{
		 $m = measuregrp::with('matgroup.entity')->whereHas('entity', function($query){ return $query->where('name', $u->company); })->get();
		foreach($m as $a){
			 $mat[$a->id] = $a->name.' - '.$a->entity->name;
		 }		 
		 }*/
		  $m = measuregrp::with('matgroup.entity')->where('mat_id', $req->id)->get();
		 return response()->json($m);
	 }  
  public function index()
    {
        //
		$prod = product::with('matgroup')->with('measures')->paginate(20);
		return view('product.list')->with('prod', $prod);
    }
 public function getTest()
    {
    
	return Response::json("success");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {		
		$mat = $this->loadMat();
		//$measure = $this->loadTest();
		return view('product.index')->with(['mat'=>$mat]);
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
		$a = [];
		foreach($request->measure as $m){
			array_push($a, $m);
		}
		$prod =  new product;
		$prod->name = strtoupper($request->name);
		$prod->sku = strtoupper($request->sku);
		$prod->mat_id = $request->matid;
		$prod->save();
		$test = measuregrp::find($a);
		$prod->measures()->attach($test);
		$prod = product::with('matgroup')->with('measures')->find($prod->id);
		return redirect('product')->with('status', $prod->name.' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
		$mat = $this->loadMat();
		$prod = product::with('measures')->find($req->id);
		$m = measuregrp::where('mat_id', $prod->matgroup()->first()->id)->get();
		$a = [];
		foreach($m as $b){
			$a[$b->id] = $b->name;
		}
		$c = [];
		foreach($prod->measures as $l){
			//$c[$l->id] = $l->name;
			array_push($c, $l->id);
		}
		return view('product.edit')->with(['prod'=>$prod,'mat'=>$mat, 'test'=>$a, 'mea'=>$c]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
		$a = [];
		foreach($request->measure as $m){
			array_push($a, $m);
		}
		$prod =  product::find($request->id);
		$prod->name = strtoupper($request->name);
		$prod->sku = strtoupper($request->sku);
		$prod->mat_id = $request->matid;
		$prod->save();
		$test = measuregrp::find($a);
		$prod->measures()->sync($test);
		$prod = product::with('matgroup')->with('measures')->find($prod->id);
		return redirect('product')->with('status', $prod->name.' created successfully.');		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
		$prod = product::find($req->id);
		$prod->measures()->detach();
		$prod->delete();
		return redirect('product')->with('status', $prod->name.' deleted successfully.');	
    }
}
