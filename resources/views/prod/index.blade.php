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
                    <h1 class="page-header">Create Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			{!! Form::open(['action' => 'EntityController@store']) !!}
					<div class="col-lg-8 col-md-8 col-md-offset-2">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">SKU Name<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('name',"",array('class' => 'input-md form-control', 'id'=>'name', 'required')); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">SKU Brand<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('brand',"",array('class' => 'input-md form-control', 'id'=>'username', 'required')); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Size<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('size',"",array('class' => 'input-md form-control', 'id'=>'username', 'required')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Weight (g)<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::number('weight',"",array('class' => 'input-md form-control', 'id'=>'username', 'required')); !!}
						</div>	
					</div>						
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Specification<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('spec',$spec,[],array( 'class' => 'input-md form-control', 'id'=>'company')); !!}
						</div>	
					</div>					

								
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('SAVE', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>

						{!! Form::close() !!}
				</div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

@endsection