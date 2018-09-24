<?php

namespace App\Http\Controllers;
use App\User;
use App\Entity;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$usr = User::paginate(10);
		return view('user.list')->with('user', $usr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$comp = ["ESRNL"=>"ESRNL","NPRNL"=>"NPRNL","PFNL"=>"PFNL"];
		return view('user.index')->with(['comp'=>$comp]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usr = new User;
		$usr->name = $request->name;
		$usr->username = $request->username;
		$usr->email = $request->email;
		$usr->company = $request->company;
		if($request->company=='NPRNL'){
		$usr->entitycode = '01-234-002';
		}
		elseif($request->company=='ESRNL'){
		$usr->entitycode = '01-234-001';
		}
		$usr->role = $request->role;
		$usr->priv = $request->group;
		$usr->password = bcrypt($request->password);
		$usr->save();
		$user= User::paginate(10);
		return redirect('user')->with(['status'=>$usr->name.' created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$comp = [];
		$e = Entity::all();
		foreach($e as $a){
			$comp[$a->id] = $a->name;
		}
		$usr = User::find($id);
		return view('user.edit')->with(['s'=>$usr, 'comp'=>$comp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$comp = ["ESRNL"=>"ESRNL","NPRNL"=>"NPRNL","PFNL"=>"PFNL"];
		$usr = User::find($id);
		return view('user.edit')->with(['s'=>$usr, 'comp'=>$comp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$usr = User::find($id);
		if($request->has('name')){
		$usr->name = $request->name;
		}
		if($request->has('username')){
		$usr->username = $request->username;
		}
		if($request->has('email')){
		$usr->email = $request->email;
		}
		if($request->has('company')){
		$usr->company = $request->company;
		if($request->company=='NPRNL'){
		$usr->entitycode = '01-234-002';
		}
		elseif($request->company=='ESRNL'){
		$usr->entitycode = '01-234-001';
		}
		
		}
		if($request->has('role')){
		$usr->role = $request->role;
		}
		if($request->has('priv')){
		$usr->priv = $request->group;
		}
		if($request->has('password')){
		$usr->password = bcrypt($request->password);
		}
		$usr->save();	
		$user= User::paginate(10);		
		return redirect('user')->with(['status'=>$usr->name.' updated successfully','user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
		$usr = User::find($req->id);
		$user= User::with('entity')->paginate(10);
		$usr->delete();
		return redirect('user')->with(['status'=>$usr->name.' deleted successfully']);
    }
}
