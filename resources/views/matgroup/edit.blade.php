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
                    <h1 class="page-header">Update Entity</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
																		
            <!-- /.row -->
            <div class="row">
			{!! Form::open(['action'=>array('EntityController@update',$ent->id), 'method'=>'PUT']) !!}
					<div class="col-lg-8 col-md-8 col-md-offset-2">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Entity Code<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('entitycode',["01-234-001"=>"ESRNL 001", "01-234-002"=>"NPRNL 002", "01-234-003"=>"PFNL 003" ],$ent->entitycode,array('class' => 'input-md form-control', 'id'=>'entitycode')); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Entity Name<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('name',["ESRNL"=>"ESRNL","NPRNL"=>"NPRNL","PFNL"=>"PFNL"],$ent->name,array('class' => 'input-md form-control', 'id'=>'name', 'required')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Company Full Name<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('fName',$ent->fName,array('class' => 'input-md form-control', 'id'=>'fName')); !!}
						</div>	
					</div>						
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Location<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('location',['AGBARA'=>'AGBARA','IKEJA'=>'IKEJA','IKOYI'=>'IKOYI'],$ent->metric1,array( 'class' => 'input-md form-control', 'id'=>'location')); !!}
						</div>	
					</div>			
						
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Company Address<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::textarea('cAddr',$ent->cAddress,array('class' => 'input-md form-control', 'id'=>'cAddr')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">GM Name<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('gmName',$ent->gmName,array('class' => 'input-md form-control', 'id'=>'gmName')); !!}
						</div>	
					</div>					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">GM Email<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::email('gmEmail',$ent->gmEmail,array('class' => 'input-md form-control', 'id'=>'gmEmail')); !!}
						</div>	
					</div>	
								
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! link_to('/entity', 'Back', ['class' => 'btn btn-danger']) !!}
						{!! Form::submit('Update', array('class'=>'btn btn-info')); !!}
						</div>
					</div>

						{!! Form::close() !!}
				</div>
            </div>
            <!-- /.row -->
            </div>
            <!-- /.row -->
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

@endsection