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
                    <h3 class="page-header text-center">New QC-Pass </h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			{!! Form::open(['action' => 'QcpassController@store']) !!}
            <div class="row">
			
					<div class="col-sm-10 col-md-10">

					
				</div>  <!--  closing div for col-md-8   -->
            </div>
			<hr>
						
			<div class="row">
				<div class="col-sm-10">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('SEND FOR ANALYSIS', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>
				</div>
				</div>
            </div>
			
            <!-- /.row -->
			{!! Form::close() !!}
     
        <!-- /#page-wrapper -->

@endsection