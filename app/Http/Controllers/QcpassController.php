<?php

namespace App\Http\Controllers;

use App\qcpass;
use Illuminate\Http\Request;

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
        //
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
