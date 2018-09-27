<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\matgroup;
use Auth;

class ProductController extends Controller
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
		$prod = product::with('matgroup')->paginate(20);
		return view('product.list')->with('prod', $prod);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$mat = $this->loadMat();
		return view('product.index')->with('mat', $mat);
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
		$prod =  new product;
		$prod->name = strtoupper($request->name);
		$prod->sku = strtoupper($request->sku);
		$prod->mat_id = $request->matid;
		$prod->save();
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
    public function edit(product $product)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
