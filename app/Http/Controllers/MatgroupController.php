<?php

namespace App\Http\Controllers;

use App\matgroup;
use App\entity;
use Illuminate\Http\Request;

class MatgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$mat =  matgroup::paginate(20);
		return view('matgroup.list')->with('mat', $mat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$entity = [];
		$ent = entity::get();
		foreach($ent as $e){
					$entity[$e->id]=$e->name;	
		}
		return view('matgroup.index')->with('ent', $entity);
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
		$mat =  new matgroup;
		$mat->name = strtoupper($request->name);
		$mat->entity_id = $request->entity;
		$mat->qcSuper = strtoupper($request->qcSuper);
		$mat->qcSuperEmail = strtolower($request->qcSuperEmail);
		$mat->qcMan = strtoupper($request->manName);
		$mat->qcManEmail = strtolower($request->manEmail);
		$mat->save();
		return redirect('matgroup')->with('status', $mat->name.' created successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\matgroup  $matgroup
     * @return \Illuminate\Http\Response
     */
    public function show(matgroup $matgroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\matgroup  $matgroup
     * @return \Illuminate\Http\Response
     */
    public function edit(matgroup $matgroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\matgroup  $matgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, matgroup $matgroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\matgroup  $matgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(matgroup $matgroup)
    {
        //
    }
}
