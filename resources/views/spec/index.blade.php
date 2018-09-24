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
                    <h1 class="page-header text-center">New Specification</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="row">
			<div class="col-md-12"> 
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Process Type<span class="asteriskField">*</span> </label>
						<div class="controls col-md-2" style="margin-bottom:10px">
						{!! Form::select('procs',[""=>"","SFG"=>"SEMI FINISHED GOODS", "FG"=>"FINISHED GOODS"],"",array( 'class' => 'input-md form-control', 'id'=>'procs')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-1  requiredField">Select Product<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7" style="margin-bottom:10px">
						{!! Form::select('prods[]',[],"",array( 'multiple'=>true, 'class' => 'input-md form-control', 'id'=>'prods')); !!}
						</div>	
					</div>	
				
			</div>
			 
			</div>
            <div class="row">
			{!! Form::open(['action' => 'SpecificationController@store']) !!}
					<div class="col-lg-8 col-md-8 col-md-push-2 " id="sfgForm" hidden>
					<hr>	
					<label id="sfgProcs" hidden></label>
					<label id="sfgProds" hidden></label>					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">LABSNa %AM Range<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('labAMmin',"",array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>90, 'required')); !!} 
						<span>%range:0-90</span></div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('labAMmax',"",array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>100,'required')); !!}
						<span>%range:0-100</span></div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">LABSNa Density (g/ml)<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('labDensity',"",array('class' => 'input-md form-control', 'id'=>'username','step'=>0.01, 'max'=>0.9999, 'required')); !!}
						<span>range:0.01-0.99 STD(0.98)</span></div>	
					</div>		
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">12% Caustic Range<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('causticMin',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'max'=>15, 'required')); !!} 
						<span>range:0.01- 15</span></div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('causticMax',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'max'=>20,'required')); !!}
						<span>range:0.01-20</span></div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Baume Range<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('baumeMin',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'min'=>1, 'max'=>20, 'required')); !!} 
						<span>range:1-20</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('baumeMax',"",array('class' => 'input-md form-control', 'id'=>'name','step'=>0.01, 'min'=>2, 'max'=>30,'required')); !!} <span>range:2-30</span>
						</div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Slurry % Concentration<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('SluryConcMin',"",array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('SlurryConcMax',"",array('class' => 'input-md form-control', 'id'=>'name', 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Slurry %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('SlurryAMmin',"",array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('SlurryAMmax',"",array('class' => 'input-md form-control', 'id'=>'name', 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>						
					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder Granular<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('bpGran',"",array('class' => 'input-md form-control', 'id'=>'email', 'required', 'max'=>5)); !!}<span>range:1-5 </span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('bpAMmin',"",array('class' => 'input-md form-control', 'id'=>'name','step'=>0.01 ,'min'=>1, 'max'=>90, 'required')); !!} 
						<span>range:1-90</span></div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('bpAMmax',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}
						<span>range:2-100</span></div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">% Water(H20) Max<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('waterMax',"",array('class' => 'input-md form-control', 'id'=>'email', 'max'=>10, 'required')); !!}
						<span>10% max</span></div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder Density(g/cm3)<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('bpBDMin',"",array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01,'max'=>1, 'required')); !!} <span>range:0.01-1</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('bpBDMax',"",array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01, 'max'=>1,'required')); !!}<span>range:0.01-1</span>
						</div>							
					</div>									
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('SUBMIT', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>
					{!! Form::close() !!}
				</div>
				<div class="col-lg-8 col-md-8 col-md-push-2" id="fgForm" hidden>
					{!! Form::open(['action' => 'SpecificationController@store']) !!}
					<hr>
					<label id="fgProcs" hidden></label>
					<label id="fgProds" hidden></label>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP Granular Max<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpGran',"",array('class' => 'input-md form-control', 'id'=>'email', 'min'=>1, 'max'=>5, 'required')); !!} <span>range:1-5</span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP Perfume<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpPerf',"",array('class' => 'input-md form-control', 'min'=>1, 'max'=>5,'id'=>'email', )); !!} <span>range:1-5</span>
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %BD (g/cm3)<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpBDmin',"",array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01,  'max'=>1, 'required')); !!} <span>range:0.01-1</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpBDmax',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'max'=>1,'required')); !!}<span>range:0.01-1</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP SPOT<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpSpot',"",array('class' => 'input-md form-control', 'id'=>'email', 'min'=>1, 'max'=>5, 'required')); !!}<span>range:1-5</span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpAMmin',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpAMmax',"",array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %Water (H20)<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpWatermin',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpWatermax',"",array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP PH<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpPHmin',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpPHmax',"",array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Company / Entity<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('entity',$ent,Auth::user()->company,array( 'class' => 'input-md form-control', 'id'=>'role', 'readonly')); !!}
						</div>	
					</div>									
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('SUBMIT', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>		
				{!! Form::close() !!}					
            </div>
				
            <!-- /.row -->
            <!-- /.row -->
        </div>
		
        <!-- /#page-wrapper -->

@endsection