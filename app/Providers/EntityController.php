<?php

namespace App\Http\Controllers;

use App\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
	public function __construct(){
		 
		 $this->middleware('auth');
	 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$comp = Entity::paginate(10);
		return view('entity.list')->with('user', $comp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('entity.index');
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
		$ent = new Entity;
		$ent->code = $request->code;
		$ent->name = $request->name;
		$ent->location  = $request->location;
		$ent->GMname = $request->GMname;
		$ent->GMemail = $request->GMemail;
		$ent->save();
		
		return redirect('entity')->with('status', $ent->name.' created successfully');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function show(Entity $entity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $id)
    {
        $ent = Entity::find($id);
		
		return view('entity.edit')->with('ent', $ent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
		$ent  = Entity::find($id);
		if($request->has('code')){
			$ent->code = $request->code;
		}
		if($request->has('name')){
			$ent->name = $request->name;
		}	
		if($request->has('location')){
			$ent->location = $request->location;
		}
		if($request->has('GMname')){
			$ent->GMname = $request->GMname;
		}
		if($request->has('GMemail')){
			$ent->GMemail = $request->GMemail;
		}
			$ent->save();
			return redirect('entity')->with('status', $ent->name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entity $entity, $id)
    {
        //
		$ent = Entity::find($id);
		$ent->delete();
		return redirect('entity')->with('status', $ent->name.' deleted successfully');
    }
}
