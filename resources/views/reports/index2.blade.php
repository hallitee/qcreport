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
                    @if ($errors->any())
			<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div>
					@endif
					<h2 class="page-header text-primary text-center">Enter Report Data</h2>
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-12">
					<div class="col-md-4">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Item Description<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('itemDesc',"",array('class' => 'input-md form-control', 'placeholder'=>'', 'id'=>'itemDesc')); !!}
						</div>	
						</div>						
						

						<!-- /.col-md-4 -->
					</div>							
                <!-- /.col-lg-12 -->
				</div>
				 <!-- /.row -->
				</div>	
            <div class="row">
				<div class="col-md-6">
			<h2 class="page-header text-center">Enter Report Data</h2>
				</div>
				<div class="col-md-6">
				<h2 class="page-header text-center">Enter Report Data</h2>
				</div>
            </div>
            <!-- /.row -->
			<!-- /#page-wrapper -->
			</div>
      

@endsection