<?php

namespace App\Http\Controllers;
use App\User;
use App\Entity;
use Illuminate\Http\Request;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 	public function __construct(){
		 $this->middleware('auth');	
	}
	public function comp(){
		
		$u = Auth::user();
		if ($u->priv()>2 || $u->isAdmin()){
		$comp = ["ESRNL"=>"ESRNL","NPRNL"=>"NPRNL","PFNL"=>"PFNL"];
		}
		else{
			$comp = [$u->company=>$u->company];
		}
		return $comp;
	}
    public function index()
    {
        //
		$u = Auth::user();
		if ($u->priv()>0 || $u->isAdmin()){
		$usr = User::paginate(10);
		}else{
			$usr = User::where('company', $u->company)->paginate(10);
		}
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
		$comp = $this->comp();
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
		else{ $usr->entitycode = '01-234-003'; }
		$usr->role = intval($request->group);
		$usr->priv = intval($request->role);
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
		$comp = $this->comp();
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
		$comp = $this->comp();
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
        
		$usr = User::find($id);
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
		else{ $usr->entitycode = '01-234-003'; }
		$usr->role = intval($request->group);
		$usr->priv = intval($request->role);
		$usr->password = bcrypt($request->password);
		$usr->save();	
		$user= User::paginate(10);		
		return redirect('user')->with(['status'=>$usr->name.' updated successfully','user'=>$user]);
		
		echo $id;
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
