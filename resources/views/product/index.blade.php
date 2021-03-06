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
                    <h1 class="page-header">New Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			{!! Form::open(['action' => 'ProductController@store']) !!}
					<div class="col-lg-8 col-md-8 col-md-offset-2">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Select Material Group <span class="asteriskField"> *</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('matid',$mat,'',array('class' => 'input-md form-control', 'id'=>'matgrp', 'required')); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Product Name<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('name','',array('class' => 'input-md form-control', 'id'=>'name', 'required')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">SKU <span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('sku',"",array('class' => 'input-md form-control', 'id'=>'qcSuper')); !!}
						</div>	
					</div>		
				
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Select Test Methods <span class="asteriskField"> *</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('measure[]',[],'',array('class' => 'input-md form-control', 'id'=>'measure', 'required', 'multiple')); !!}
						<i>Select multiple holding down 'ctrl' key</i>
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