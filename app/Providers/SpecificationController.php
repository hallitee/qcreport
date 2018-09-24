<?php

namespace App\Http\Controllers;

use App\Specification;
use App\Entity;
use App\prodOrder;
use Illuminate\Http\Request;
use Auth;
use DB;

class SpecificationController extends Controller
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
		$spec = Specification::paginate(10);
		return view('spec.list')->with(['user'=>$spec]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function create(Request $req)
    {
        //
		if($req->ajax()){
		$r = new prodOrder;
		$d= $r->newQuery();
		$d->select(DB::raw("entitycode, itemcode, itemname"));
		$prod="";
		$prods=[];
		if(Auth::user()->company=='NPRNL'){
			$d->where('entitycode', '01-234-002');
			if($req->proc=='FG'){ $d->where('itemcode', 'LIKE', '16%')->orWhere('itemcode', 'LIKE', '17%');} 
			else{ $d->where('itemcode', 'LIKE', '12%'); }
				
		}
		elseif(Auth::user()->company=='ESRNL'){
			$d->where('entitycode', '01-234-001');
			if($req->proc=='FG'){ $d->where('itemcode', 'LIKE', '17%');}
			else{ $d->where('itemcode', 'LIKE', '12%'); }		
		}
		$prod = $d->groupBy(DB::raw("itemname, itemcode, entitycode"))->get();
		/*foreach($prod as $p){
			$prods[$p->itemname] = $p->itemname;
		}
		*/
		return  response()->json($prod);
		}
		
		$ent = ["ESRNL"=>"ESRNL","NPRNL"=>"NPRNL","PFNL"=>"PFNL"];
		return view('spec.index')->with(['ent'=>$ent]);
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
	$spec = new Specification;
	$spec->labAM = implode("-", array($request->labAMmin, $request->labAMmax));
	$spec->labDensity = $request->labDensity;
	$spec->caustic = implode("-", array($request->causticMin, $request->causticMax));
	$spec->baume = implode("-", array($request->baumeMin, $request->baumeMax));	
	$spec->slurryConc = implode("-", array($request->slurryConcMin, $request->slurryConcMax));		
	$spec->slurryAM = implode("-", array($request->SlurryAMmin, $request->SlurryAMmax));	
	$spec->slurryConc = implode("-", array($request->SlurryConcMin, $request->SlurryConcMax));	
	$spec->bpGranularInt = $request->bpGran;
	$spec->bpAM = implode("-", array($request->bpAMmin, $request->bpAMmax));
	$spec->bpWater = $request->waterMax;
	$spec->bpDensity = implode("-", array($request->bpBDmin, $request->bpBDmax));
	$spec->fpGranular = $request->fpGran;
	$spec->fpPerfume = $request->fpPerf;
	$spec->fpDensity = implode("-", array($request->fpBDmin, $request->fpBDmax));	
	$spec->fpSpot = $request->fpSpot;	
	$spec->fpAM = implode("-", array($request->fpAMmin, $request->fpAMmax));	
	$spec->fpWater = implode("-", array($request->fpWatermin, $request->fpWatermax));		
	$spec->fpPH = implode("-", array($request->fpPHmin, $request->fpPHmax));	
	$spec->entity_id = $request->entity;
	$spec->save();
	return redirect('spec')->with('status', 'Specification submitted successfully');

	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function show(Specification $specification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function edit(Specification $specification, $id)
    {
        //
		$spec =  Specification::with('entity')->find($id);
		$comp = [];
		$ent = Entity::all();
		foreach($ent as $a){
		$comp[$a->id] = $a->name;	
			
		}
		return view('spec.edit')->with(['s'=>$spec, 'comp'=>$comp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
	$spec = Specification::find($id);
	if($request->has('labAMmin') && $request->has('labAMmax')){
	$spec->labAM = implode("-", array($request->labAMmin, $request->labAMmax));
	}
	if($request->has('labDensity')){
	$spec->labDensity = $request->labDensity;
	}
	if($request->has('causticMin') && $request->has('causticMax')){
	$spec->caustic = implode("-", array($request->causticMin, $request->causticMax));
	}
	if($request->has('baumeMin') && $request->has('baumeMax')){
	$spec->baume = implode("-", array($request->baumeMin, $request->baumeMax));	
	}
	if($request->has('slurryConcMin') && $request->has('slurryConcMax')){
	$spec->slurryConc = implode("-", array($request->SlurryConcMin, $request->SlurryConcMax));		
	}
	if($request->has('SlurryAMmin') && $request->has('SlurryAMmax')){
	$spec->slurryAM = implode("-", array($request->SlurryAMmin, $request->SlurryAMmax));	
	}
	if($request->has('SlurryConcMin') && $request->has('SlurryConcMax')){
	$spec->slurryConc = implode("-", array($request->SlurryConcMin, $request->SlurryConcMax));	
	}
	if($request->has('bpGran')){
	$spec->bpGranularInt = $request->bpGran;
	}
	if($request->has('bpAMmin') && $request->has('bpAMmax')){
	$spec->bpAM = implode("-", array($request->bpAMmin, $request->bpAMmax));
	}
	if($request->has('waterMax')){
	$spec->bpWater = $request->waterMax;
	}
	if($request->has('bpBDMin') && $request->has('bpBDMax')){
	$spec->bpDensity = implode("-", array($request->bpBDMin, $request->bpBDMax));
	}
	if($request->has('fpGran')){
	$spec->fpGranular = $request->fpGran;
	}
	if($request->has('fpPerf')){
	$spec->fpPerfume = $request->fpPerf;
	}
	if($request->has('fpBDmin') && $request->has('fpBDmax')){
	$spec->fpDensity = implode("-", array($request->fpBDmin, $request->fpBDmax));	
	}
	if($request->has('fpSpot')){
	$spec->fpSpot = $request->fpSpot;	
	}
	if($request->has('fpAMmin') && $request->has('fpAMmax')){
	$spec->fpAM = implode("-", array($request->fpAMmin, $request->fpAMmax));	
	}
	if($request->has('fpWatermin') && $request->has('fpWatermax')){	
	$spec->fpWater = implode("-", array($request->fpWatermin, $request->fpWatermax));		
	}
	if($request->has('fpPHmin') && $request->has('fpPHmax')){
	$spec->fpPH = implode("-", array($request->fpPHmin, $request->fpPHmax));	
	}
	if($request->has('entity')){
	$spec->entity_id = $request->entity;
	}
	$spec->save();
	return redirect('spec')->with('status', 'Specification submitted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specification $specification)
    {
        //
		$spec = Specification::find($id);
		$spec->delete();
		return redirect('spec')->with('status', ' deleted successfully');
    }
}
