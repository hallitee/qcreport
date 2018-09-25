<?php

namespace App\Http\Controllers;

use App\entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$ent = entity::paginate(20);
		return view('entity.list')->with("ent", $ent);
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
		$ent = new entity;
		$ent->name = $request->name;
		$ent->fName = $request->fName;
		$ent->metric1 = $request->location;
		$ent->entitycode = $request->entitycode;
		$ent->gmName = $request->gmName;
		$ent->gmEmail = $request->gmEmail;
		$ent->cAddress = $request->cAddr;
		$ent->save();
		return redirect('entity')->with('status', " Saved successfully ");
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function show(entity $entity)
    {
        //
		
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function edit(entity $entity, Request $req)
    {
        //
		$ent = entity::find($req->id);
		return view('entity.edit')->with('ent', $ent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, entity $entity)
    {
        //
		$ent = entity::find($request->id);
		$ent->name = $request->name;
		$ent->fName = $request->fName;
		$ent->metric1 = $request->location;
		$ent->entitycode = $request->entitycode;
		$ent->gmName = $request->gmName;
		$ent->gmEmail = $request->gmEmail;
		$ent->cAddress = $request->cAddr;
		$ent->save();
		return redirect('entity')->with('status', " Updated successfully ");		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function destroy(entity $entity,Request $request)
    {
        //
		$ent = entity::find($request->id);
		$ent->delete();
		return redirect('entity')->with('status', $ent->name." deleted successfully ");
    }
}
