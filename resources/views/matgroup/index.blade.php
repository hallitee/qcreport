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
                    <h1 class="page-header">New Material Group</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			{!! Form::open(['action' => 'MeasuregrpController@store']) !!}
					<div class="col-lg-8 col-md-8 col-md-offset-2">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Select Entity<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('matid',$mat,'',array('class' => 'input-md form-control', 'id'=>'entitycode', 'required')); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Material Group Name<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('name','',array('class' => 'input-md form-control', 'id'=>'name', 'required')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Supervisor<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('qcSuper',"",array('class' => 'input-md form-control', 'id'=>'qcSuper')); !!}
						</div>	
					</div>		
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Supervisor Email<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('qcSuperEmail',"",array('class' => 'input-md form-control', 'id'=>'qcSuperEmail')); !!}
						</div>	
					</div>						


						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Manager Name<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('manName',"",array('class' => 'input-md form-control', 'id'=>'gmName')); !!}
						</div>	
					</div>					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Managers Email<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::email('manEmail',"",array('class' => 'input-md form-control', 'id'=>'gmEmail')); !!}
						</div>	
					</div>	
								
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('CREATE', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>

						{!! Form::close() !!}
				</div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

@endsection