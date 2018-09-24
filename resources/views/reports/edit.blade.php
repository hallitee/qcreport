@extends('layouts.master')

@section('navleft')

@parent

@endsection
@section('navright')
@parent
@endsection



@section('body')
@php
$sfg="";
if($po->processType=='IN PROCESS'){
	$sfg = 'IN PROCESS';
}
else{
	$sfg = 'FINISHED PRODUCT';
}
	
if($po->user_id==Auth::user()->id){
	$rd = "readonly";
	$bt = "BACK";
}
else{
	if(Auth::user()->isAprover()){
	$bt = "UPDATE";
	$rd="";
	}
	else{
		$bt = "BACK";
		$rd="readonly";
	}
}

@endphp

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-primary text-center">Edit Analysis Data</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		
	{!! Form::open(['action'=>array('DailyreportController@update',$po->id), 'method'=>'PUT']) !!}	

 <div class="row">

                <div class="col-lg-12 col-md-12">
					
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Production  Order<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::text('prodOrder',$po->prodOrder,array('class' => 'input-md form-control', 'required', 'readonly')); !!} 
						</div>				
				</div>								
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Batch Number<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::text('batch',$po->batch,array('class' => 'input-md form-control', 'required', 'readonly')); !!} 
						</div>				
				</div>	
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Shift<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::select('shift',['MORNING'=>'MORNING', 'AFTERNOON'=>'AFTERNOON', 'NIGHT'=>'NIGHT'],$po->shitName,array('class' => 'input-md form-control', 'required', 'readonly')); !!} 
						</div>				
				</div>
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">MFD Date<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::date('mfgDate',$po->mfgDate,array('class' => 'input-md form-control', 'required', 'readonly')); !!} 
						</div>				
				</div>								
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Expiry Date<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::date('expiry',$po->expDate,array('class' => 'input-md form-control', 'required', 'readonly')); !!} 
						</div>				
				</div>	
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">SFG Type<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::select('sfgType',['IN PROCESS'=>'IN PROCESS', 'FINISHED PRODUCT'=>'FINISHED PRODUCT'],$sfg,array('class' => 'input-md form-control', 'id'=>'sfgType','required','readonly')); !!} 
						</div>				
				</div>
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Analyst<span class="asteriskField">:</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::text('analyst',Auth::user()->name ,array('class' => 'input-md form-control','readonly', 'required')); !!} 
						</div>				
				</div>								
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Date of Analysis<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::date('anDate',substr($po->shiftDate, 0, 10),array('class' => 'input-md form-control', 'required', 'readonly')); !!} 
						</div>				
				</div>	
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Analysis Time<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::time('anTime',substr($po->shiftDate, 11, 5),array('class' => 'input-md form-control', 'required', 'readonly')); !!}  
						</div>				
				</div>				
                </div>
                <!-- /.col-lg-12 -->
            </div>	
<hr style="width: 100%; color: black; height: 1px; background-color:black;" />			
    <div class="row">
 @if($po->processType=='IN PROCESS')
<div class="col-md-6 col-lg-6" id="inprocess">
<label for="id_select"  class="control-label col-md-12  text-primary">LABSNa Transfer</label>
<hr style="width: 100%; color: black; height: 1px;" class="text-primary" />	
									
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">LABSNa %AM<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('labAM',$po->labAM,array('class' => 'input-md form-control','step'=>0.001, 'id'=>'name', 'min'=>1, 'max'=>100, $rd)); !!} 
						<span>%AM range:0-100</span></div>			
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">LABSNa Density (g/ml)<span class="asteriskField"></span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('labDensity',$po->labDensity,array('class' => 'input-md form-control', 'id'=>'username','step'=>0.001, 'max'=>0.9999, $rd)); !!}
						<span>range:0.01-0.99 STD(0.98)</span></div>	
					</div>	
<label for="id_select"  class="control-label col-md-12  text-primary">12% Caustic</label>	
<hr style="width: 100%; color: black; height: 1px;" class="text-primary" />						
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">12% Caustic Range<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('caustic',$po->caustic,array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.001, 'max'=>15, $rd)); !!} 
						<span>range:0.01- 15</span></div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Baume Range<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('baume',$po->baume,array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.0001, 'min'=>1, 'max'=>20, $rd)); !!} 
						<span>range:1-20</span>
						</div>								
					</div>	
	<label for="id_select"  class="control-label col-md-12  text-primary">SLURRY</label>	
	<hr style="width: 100%; color: black; height: 1px;" class="text-primary" />	
								
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Slurry % Concentration<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('SluryConc',$po->slurryConc,array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>90, $rd)); !!} <span>range:1-90</span>
						</div>								
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Slurry %AM<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('SlurryAM',$po->slurryAM,array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.0001, 'min'=>1, 'max'=>90, $rd)); !!} <span>range:1-90</span>
						</div>								
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit($bt, array('class'=>'btn btn-info')); !!}
						</div>						
					</div>					
					
					
					
</div>
<div class="col-md-6 col-lg-6" id="inprocess2">					
<label for="id_select"  class="control-label col-md-12  text-primary">BASE POWDER</label>	
<hr style="width: 100%; color: black; height: 1px;" class="text-primary" />	
								
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder Granular<span class="asteriskField"></span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('bpGran',$po->bpGranular,array('class' => 'input-md form-control', 'id'=>'email', 'max'=>5, $rd)); !!}<span>range:1-5 </span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder %AM<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('bpAM',$po->bpAM,array('class' => 'input-md form-control', 'id'=>'name','step'=>0.001 ,'min'=>1, 'max'=>90, $rd)); !!} 
						<span>range:1-90</span></div>	
							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">% Water(H20)<span class="asteriskField"></span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('waterMax',$po->bpWater,array('class' => 'input-md form-control', 'id'=>'email', 'max'=>10, $rd)); !!}
						<span>10% max</span></div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder Density(g/cm3)<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('bpBD',$po->bpDensity,array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.0001,'max'=>1, $rd)); !!} <span>range:0.01-1</span>
						</div>			
					</div>									


				</div>
				
@else			
<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2" id="finished">
<label for="id_select"  class="control-label col-md-12  text-primary">FINISHED PRODUCT POWDER</label>	
<hr style="width: 100%; color: black; height: 1px;"/>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP Granular<span class="asteriskField"></span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpGran',$po->fpGranular,array('class' => 'input-md form-control', 'id'=>'email', 'min'=>1, 'max'=>5, $rd)); !!} <span>range:1-5</span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP Perfume<span class="asteriskField"></span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpPerf',$po->fpPerfume,array('class' => 'input-md form-control', 'min'=>1, 'max'=>5,'id'=>'email', $rd )); !!} <span>range:1-5</span>
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %BD (g/cm3)<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpBD',$po->fpDensity,array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.0001,  'max'=>1, $rd)); !!} <span>range:0.01-1</span>
						</div>	
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP SPOT<span class="asteriskField"></span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpSpot',$po->fpSpot,array('class' => 'input-md form-control', 'id'=>'email', 'min'=>1, 'max'=>5, $rd)); !!}<span>range:1-5</span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %AM<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpAM',$po->fpAM,array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.001,  'min'=>1, 'max'=>100, $rd)); !!} <span>range:1-90</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %Water (H20)<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpWater',$po->fpWater,array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.001,  'min'=>1, 'max'=>100, $rd)); !!} <span>range:1-90</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP PH<span class="asteriskField"></span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpPH',$po->fpPH,array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.001,  'min'=>1, 'max'=>100, $rd)); !!} <span>range:1-90</span>
						</div>							
					</div>	
						<div class="form-group required" id="fpsubmit">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit($bt, array('class'=>'btn btn-info')); !!}
						</div>						
					</div>					
            </div>
@endif
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
				{!! Form::close() !!}
@endsection