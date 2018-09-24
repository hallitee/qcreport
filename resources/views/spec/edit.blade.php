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
                    <h1 class="page-header">Update Specification</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
																		
            <!-- /.row -->
             <div class="row">
					{!! Form::open(['action'=>array('SpecificationController@update',$s->id), 'method'=>'PUT']) !!}
					<div class="col-lg-6 col-md-6">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">LABSNa %AM Range<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('labAMmin',explode("-",$s->labAM)[0],array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>90, 'required')); !!} 
						<span>%range:0-90</span></div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('labAMmax',explode("-",$s->labAM)[1],array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>100,'required')); !!}
						<span>%range:0-100</span></div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">LABSNa Density (g/ml)<span class="asteriskField">*</span> </label>
						<div class="controls col-md-7 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('labDensity',$s->labDensity,array('class' => 'input-md form-control', 'id'=>'username','step'=>0.01, 'max'=>0.9999, 'required')); !!}
						<span>range:0.01-0.99 STD(0.98)</span></div>	
					</div>		
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">12% Caustic Range<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('causticMin',explode("-",$s->caustic)[0],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'max'=>15, 'required')); !!} 
						<span>range:0.01- 15</span></div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('causticMax',explode("-",$s->caustic)[1],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'max'=>20,'required')); !!}
						<span>range:0.01-20</span></div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Baume Range<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('baumeMin',explode("-",$s->baume)[0],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'min'=>1, 'max'=>20, 'required')); !!} 
						<span>range:1-20</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('baumeMax',explode("-",$s->baume)[1],array('class' => 'input-md form-control', 'id'=>'name','step'=>0.01, 'min'=>2, 'max'=>30,'required')); !!} <span>range:2-30</span>
						</div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Slurry % Concentration<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('SlurryConcMin',explode("-",$s->slurryConc)[0],array('class' => 'input-md form-control', 'id'=>'name', 'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('SlurryConcMax',explode("-",$s->slurryConc)[1],array('class' => 'input-md form-control', 'id'=>'name', 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Slurry %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('SlurryAMmin',explode("-",$s->slurryAM)[0],array('class' => 'input-md form-control', 'id'=>'name','step'=>0.01, 'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('SlurryAMmax',explode("-",$s->slurryAM)[1],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>						
					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder Granular<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('bpGran',$s->bpGranularInt,array('class' => 'input-md form-control', 'id'=>'email', 'required', 'max'=>5)); !!}<span>range:1-5 </span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('bpAMmin',explode("-",$s->bpAM)[0],array('class' => 'input-md form-control', 'id'=>'name','step'=>0.01,'min'=>1, 'max'=>90, 'required')); !!} 
						<span>range:1-90</span></div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('bpAMmax',explode("-",$s->bpAM)[1],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}
						<span>range:2-100</span></div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">% Water(H20) Max<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('waterMax',$s->bpWater,array('class' => 'input-md form-control', 'id'=>'email', 'max'=>10, 'required')); !!}
						<span>10% max</span></div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">Base Powder Density(g/cm3)<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('bpBDMin',explode("-",$s->bpDensity)[0],array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01,'max'=>1, 'required')); !!} <span>range:0.01-1</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('bpBDMax',explode("-",$s->bpDensity)[1],array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01, 'max'=>1,'required')); !!}<span>range:0.01-1</span>
						</div>							
					</div>									
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('UPDATE SPEC', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>

				</div>
<div class="col-lg-6 col-md-6">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP Granular Max<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpGran',$s->fpGranular,array('class' => 'input-md form-control', 'id'=>'email', 'min'=>1, 'max'=>5, 'required')); !!} <span>range:1-5</span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP Perfume<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpPerf',$s->fpPerfume,array('class' => 'input-md form-control', 'min'=>1, 'max'=>5,'id'=>'email', )); !!} <span>range:1-5</span>
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %BD (g/cm3)<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpBDmin',explode("-",$s->fpDensity)[0],array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01,  'max'=>1, 'required')); !!} <span>range:0.01-1</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpBDmax',explode("-",$s->fpDensity)[1],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'max'=>1,'required')); !!}<span>range:0.01-1</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP SPOT<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpSpot',$s->fpSpot,array('class' => 'input-md form-control', 'id'=>'email', 'min'=>1, 'max'=>5, 'required')); !!}<span>range:1-5</span>
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %AM<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpAMmin',explode("-",$s->fpAM)[0],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpAMmax',explode("-",$s->fpAM)[1],array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP %Water (H20)<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpWatermin',explode("-",$s->fpWater)[0],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpWatermax',explode("-",$s->fpWater)[1],array('class' => 'input-md form-control', 'id'=>'name',  'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-5  requiredField">FP PH<span class="asteriskField">*</span></label>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom:10px">
						{!! Form::number('fpPHmin',explode("-",$s->fpPH)[0],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01,  'min'=>1, 'max'=>90, 'required')); !!} <span>range:1-90</span>
						</div>	
						<span class="control-label col-md-1 col-md-pull-1 glyphicon glyphicon-resize-horizontal"  style="font-size:28px"></span>
						<div class="controls col-md-3 col-md-pull-1"  style="margin-bottom: 10px">
						{!! Form::number('fpPHmax',explode("-",$s->fpPH)[1],array('class' => 'input-md form-control', 'id'=>'name', 'step'=>0.01, 'min'=>2, 'max'=>100,'required')); !!}<span>range:2-100</span>
						</div>							
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Company / Entity<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('entity',$comp,$s->entity_id,array( 'class' => 'input-md form-control', 'id'=>'role')); !!}
						</div>	
					</div>									
					
            </div>
				{!! Form::close() !!}
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

@endsection