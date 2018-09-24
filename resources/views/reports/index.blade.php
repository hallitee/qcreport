@extends('layouts.master')

@section('navleft')

@parent

@endsection
@section('navright')
@parent
@endsection



@section('body')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-primary text-center">Search Production Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
{!! Form::open(['action' => 'DailyreportController@store']) !!}	
            <div class="row">
                <div class="col-lg-12 col-md-12">
					
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Production  Order<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::text('prodOrder',"",array('class' => 'input-md form-control', 'required')); !!} 
						</div>				
				</div>								
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Batch Number<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::text('batch',"",array('class' => 'input-md form-control', 'required')); !!} 
						</div>				
				</div>	
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Shift<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::select('shift',['MORNING'=>'MORNING', 'AFTERNOON'=>'AFTERNOON', 'NIGHT'=>'NIGHT'],"",array('class' => 'input-md form-control', 'required')); !!} 
						</div>				
				</div>
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">MFD Date<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::date('mfgDate',"",array('class' => 'input-md form-control', 'required')); !!} 
						</div>				
				</div>								
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Expiry Date<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::date('expiry',"",array('class' => 'input-md form-control', 'required')); !!} 
						</div>				
				</div>	
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">SFG Type<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::select('sfgType',['IN PROCESS'=>'IN PROCESS', 'FINISHED PRODUCT'=>'FINISHED PRODUCT'],"",array('class' => 'input-md form-control', 'id'=>'sfgType','required')); !!} 
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
						{!! Form::date('anDate',"",array('class' => 'input-md form-control', 'required')); !!} 
						</div>				
				</div>	
				<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Analysis Time<span class="asteriskField">*</span></label>
						<div class="controls col-md-2"  style="margin-bottom:10px">
						{!! Form::time('anTime',"",array('class' => 'input-md form-control', 'required')); !!}  
						</div>				
				</div>				
                </div>
                <!-- /.col-lg-12 -->
            </div>	
<hr style="width: 100%; color: black; height: 1px; background-color:black;" />			
            <div class="row">

					<div class="col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2" id="inprocess">
<label for="id_select"  class="control-label col-md-12  text-primary">LABSNa Transfer</label>
<hr style="width: 100%; color: black; height: 1px;" class="text-primary" />	
									
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">LABSNa %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('labAM',"",array('class' => 'input-md form-control','step'=>0.01, 'id'=>'name', 'min'=>1, 'max'=>100)); !!} 
						<span>%AM range:0-100</span></div>			
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">LABSNa Density (g/ml)<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('labDensity',"",array('class' => 'input-md form-control', 'id'=>'username','step'=>0.01, 'max'=>0.9999)); !!}
						<span>range:0.01-0.99 STD(0.98)</span></div>	
					</div>		
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">12% Caustic Range<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('caustic',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'max'=>15)); !!} 
						<span>range:0.01- 15</span></div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Baume Range<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('baume',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'min'=>1, 'max'=>20)); !!} 
						<span>range:1-20</span>
						</div>								
					</div>	
<label for="id_select"  class="control-label col-md-12  text-primary">SLURRY</label>	
<hr style="width: 100%; color: black; height: 1px;" class="text-primary" />	
								
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Slurry % Concentration<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('SluryConc',"",array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>90)); !!} <span>range:1-90</span>
						</div>								
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Slurry %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('SlurryAM',"",array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>90)); !!} <span>range:1-90</span>
						</div>								
					</div>						
<label for="id_select"  class="control-label col-md-12  text-primary">BASE POWDER</label>	
<hr style="width: 100%; color: black; height: 1px;" class="text-primary" />	
								
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder Granular<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('bpGran',"",array('class' => 'input-md form-control', 'id'=>'email', 'max'=>5)); !!}<span>range:1-5 </span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('bpAM',"",array('class' => 'input-md form-control', 'id'=>'name','step'=>0.01 ,'min'=>1, 'max'=>90)); !!} 
						<span>range:1-90</span></div>	
							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">% Water(H20) Max<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('waterMax',"",array('class' => 'input-md form-control', 'id'=>'email', 'max'=>10)); !!}
						<span>10% max</span></div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder Density(g/cm3)<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('bpBD',"",array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01,'max'=>1)); !!} <span>range:0.01-1</span>
						</div>			
					</div>									
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('SUBMIT', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>

				</div>
<div class="col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2" id="finished">
<label for="id_select"  class="control-label col-md-12  text-primary">FINISHED PRODUCT POWDER</label>	
<hr style="width: 100%; color: black; height: 1px;" class="text-primary" />	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP Granular Max<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpGran',"",array('class' => 'input-md form-control', 'id'=>'email', 'min'=>1, 'max'=>5)); !!} <span>range:1-5</span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP Perfume<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpPerf',"",array('class' => 'input-md form-control', 'min'=>1, 'max'=>5,'id'=>'email', )); !!} <span>range:1-5</span>
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %BD (g/cm3)<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpBD',"",array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01,  'max'=>1)); !!} <span>range:0.01-1</span>
						</div>	
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP SPOT<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpSpot',"",array('class' => 'input-md form-control', 'id'=>'email', 'min'=>1, 'max'=>5)); !!}<span>range:1-5</span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpAM',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>100)); !!} <span>range:1-90</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %Water (H20)<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpWater',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>100)); !!} <span>range:1-90</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP PH<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpPH',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>100)); !!} <span>range:1-90</span>
						</div>							
					</div>	
		
					<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('SUBMIT', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>					
					
            </div>

            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
				{!! Form::close() !!}
@endsection