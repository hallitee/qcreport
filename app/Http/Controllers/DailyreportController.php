<?php

namespace App\Http\Controllers;
use App\prodOrder;
use App\dailyreport;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DailyreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function __construct(){
		 
		 $this->middleware('auth');
	 }
	public function getprod(Request $req){
		return view('reports.search');
	}
	public function search(Request $req){
		
		$user = User::find($req->userid);
		$r = new prodOrder;
		$q = $r->newQuery();
		$q->where('ENTITYCODE', '=', $user->entitycode);
		if($req->has('prodOrder')){
			$q->where('PROD_NUMBER', $req->prodOrder);
		}
		if($req->has('prodName')){
			$q->where('ITEMNAME','LIKE', '%'.$req->prodName.'%');
		}		
		if(($req->has('dateFrom')) && ($req->has('dateTo'))){
			$q->whereBetween('POSTDATE', [$req->dateFrom, $req->dateTo]);
		}
		else{
		if($req->has('dateFrom')){
			$q->whereDate('POSTDATE', $req->dateFrom);
		}				
		if($req->has('dateTo')){
			$q->whereDate('POSTDATE', $req->dateTo);
		}				
		}		
		$res=$q->orderBy('POSTDATE', 'DESC')->get();
		return response()->json($res);
	}	
    public function index()
    {
        //
		$dr = dailyreport::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(20);
		return view('reports.list')->with(['url'=>$dr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
      
		$po = prodOrder::where('PROD_NUMBER', $req->id)->first();
		return view('reports.index1')->with('po', $po);
		
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
		//echo $request;
		$p = prodOrder::where('PROD_NUMBER', $request->prodOrder)->first();
		$dr = new dailyreport;
		//------------------------ Analysis --------------------------------------------
		//$dr->itemname = $p->ITEMNAME;
		if($request->has("shift")){
			$dr->shiftName = $request->shift;
		}
		if($request->has("anTime")){
			$dr->shiftTime = $request->anTime;
		}
		if($request->has("anDate")){
			$dr->shiftDate= $request->anDate.' '.$request->anTime;
		}
		if($request->has("prodOrder")){
			$dr->prodOrder = $request->prodOrder;
		}
		if($request->has("batch")){
			$dr->batch= $request->batch;
		}
		if($request->has("mfgDate")){
			$dr->mfgDate = $request->mfgDate;	
			}
		if($request->has("expiry")){
			$dr->expDate = $request->expiry;	
			}			
		if($request->has("sfgType")){
			$dr->processType = $request->sfgType;	
			}	
		if($request->has("analyst")){
			$dr->analystName = $request->analyst;	
			}
			//----------------------------IN PROCESS---------------------------------------------
		if($request->has("labAM")){
			$dr->labAM = $request->labAM;	
			}
		if($request->has("labDensity")){
			$dr->labDensity = $request->labDensity;	
			}
		if($request->has("caustic")){
			$dr->caustic = $request->caustic;	
			}
			
		if($request->has("baume")){
			$dr->baume = $request->baume;	
			}	
		if($request->has("SluryConc")){
			$dr->slurryConc = $request->SluryConc;	
			}
		if($request->has("SlurryAM")){
			$dr->slurryAM = $request->SlurryAM;	
			}
		if($request->has("bpGran")){
			$dr->bpGranular = $request->bpGran;	
			}
		if($request->has("bpAM")){
			$dr->bpAM = $request->bpAM;	
			}
			
		if($request->has("waterMax")){
			$dr->bpWater = $request->waterMax;	
			}
		if($request->has("bpBD")){
			$dr->bpDensity = $request->bpBD;	
			}
			//--------------------------------  FINISHED PRODUCT ----------------- 
		if($request->has("fpGran")){
			$dr->fpGranular = $request->fpGran;	
			}
			
		if($request->has("fpPerf")){
			$dr->fpPerfume = $request->fpPerf;	
			}	
		if($request->has("fpBD")){
			$dr->fpDensity = $request->fpBD;	
			}
		if($request->has("fpSpot")){
			$dr->fpSpot = $request->fpSpot;	
			}
		if($request->has("fpAM")){
			$dr->fpAM = $request->fpAM;	
			}
		if($request->has("fpWater")){
			$dr->fpWater = $request->fpWater;	
			}	
		if($request->has("fpPH")){
			$dr->fpPH = $request->fpPH;	
			}									
		$dr->user_id=Auth::user()->id;
		$dr->save();										
		
		return redirect('report')->with('status', 'Created successfully');
		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dailyreport  $dailyreport
     * @return \Illuminate\Http\Response
     */
    public function show(dailyreport $dailyreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dailyreport  $dailyreport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$po = dailyreport::find($id);
		return view('reports.edit')->with('po', $po);
    }
	public function report(Request $req){
	  $res = [];
	  if($req->ajax()){
		if($req->has('prodOrder')){
		$m = dailyreport::select(DB::raw("FORMAT(shiftDate, 'dd-MMM-yy') as 'period',shiftName, prodOrder, AVG(labAM) as 'labAm',AVG(fpAM) as 'fpAM',AVG(labAMOut) as 'labAMOut',cast(AVG(labDensity) as decimal(9,2)) as 'labDensity',AVG(caustic) as 'caustic',AVG(AnRes) as 'AnRes',AVG(slurryAM) as 'slurryAM',AVG(slurryConc) as 'slurryConc',AVG(bpGranular) as 'bpGranular',AVG(bpGranularInt) as 'bpGranularInt',AVG(bpAM) as 'bpAM',AVG(baume) as 'baume',AVG(bpWater) as 'bpWater',cast(AVG(bpDensity) as decimal(9,2)) as 'bpDensity',AVG(fpGranular) as 'fpGranular',AVG(fpPerfume) as 'fpPerfume',AVG(fpPerfInt) as 'fpPerfInt',cast(AVG(fpDensity) as decimal(2,2)) as 'fpDensity',AVG(fpSpot) as 'fpSpot',AVG(fpAM) as 'fpAM',AVG(fpWater) as 'fpWater',AVG(fpPH) as 'fpPH',AVG(wPH) as 'wPH',AVG(wIron) as 'wIron',AVG(wSulphate) as 'wSulphate',AVG(wFR) as 'wFR'" ))->where('prodOrder', $req->prodOrder)->groupBy(DB::raw("FORMAT(shiftDate,'dd-MMM-yy'),shiftName, prodOrder"))->orderByRaw("CASE WHEN  shiftName='MORNING' THEN '1' WHEN shiftName = 'AFTERNOON' THEN '2' ELSE shiftName END ASC")->get();	
		  }
		  return response()->json($m);		  
	  }
	  return view('reports.history');
  }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dailyreport  $dailyreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$dr = dailyreport::find($id);
        //
				//------------------------ Analysis --------------------------------------------
		if($request->has("shift")){
			$dr->shiftName = $request->shift;
		}
		if($request->has("anTime")){
			$dr->shiftTime = $request->anTime;
		}
		if($request->has("anDate")){
			$dr->shiftDate= $request->anDate.' '.$request->anTime;
		}
		if($request->has("prodOrder")){
			$dr->prodOrder = $request->prodOrder;
		}
		if($request->has("batch")){
			$dr->batch= $request->batch;
		}
		if($request->has("mfgDate")){
			$dr->mfgDate = $request->mfgDate;	
			}
		if($request->has("expiry")){
			$dr->expDate = $request->expiry;	
			}			
		if($request->has("sfgType")){
			$dr->processType = $request->sfgType;	
			}	
		if($request->has("analyst")){
			$dr->analystName = $request->analyst;	
			}
			//----------------------------IN PROCESS---------------------------------------------
		if($request->has("labAM")){
			$dr->labAM = $request->labAM;	
			}
		if($request->has("labDensity")){
			$dr->labDensity = $request->labDensity;	
			}
		if($request->has("caustic")){
			$dr->caustic = $request->caustic;	
			}
			
		if($request->has("baume")){
			$dr->baume = $request->baume;	
			}	
		if($request->has("SluryConc")){
			$dr->slurryConc = $request->SluryConc;	
			}
		if($request->has("SlurryAM")){
			$dr->slurryAM = $request->SlurryAM;	
			}
		if($request->has("bpGran")){
			$dr->bpGranular = $request->bpGran;	
			}
		if($request->has("bpAM")){
			$dr->bpAM = $request->bpAM;	
			}
			
		if($request->has("waterMax")){
			$dr->bpWater = $request->waterMax;	
			}
		if($request->has("bpBD")){
			$dr->bpDensity = $request->bpBD;	
			}
			//--------------------------------  FINISHED PRODUCT ----------------- 
		if($request->has("fpGran")){
			$dr->fpGranular = $request->fpGran;	
			}
			
		if($request->has("fpPerf")){
			$dr->fpPerfume = $request->fpPerf;	
			}	
		if($request->has("fpBD")){
			$dr->fpDensity = $request->fpBD;	
			}
		if($request->has("fpSpot")){
			$dr->fpSpot = $request->fpSpot;	
			}
		if($request->has("fpAM")){
			$dr->fpAM = $request->fpAM;	
			}
		if($request->has("fpWater")){
			$dr->fpWater = $request->fpWater;	
			}	
		if($request->has("fpPH")){
			$dr->fpPH = $request->fpPH;	
			}
			$dr->save();
			
			return redirect('report')->with('status', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dailyreport  $dailyreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(dailyreport $dailyreport)
    {
        //
    }
}
