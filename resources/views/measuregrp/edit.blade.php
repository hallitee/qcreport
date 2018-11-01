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
                    <h1 class="page-header text-center">New Test Method</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
 {!! Form::open(['action' => array('MeasuregrpController@update', $mg->id),'method'=>'PUT']) !!}
            <div class="row">
			
					<div class="col-sm-6 col-md-6">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"> Material Group <span class="asteriskField"> *</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::select('matid',$mat,$mg->matgroup->id,array('class' => 'input-md form-control', 'id'=>'matid', 'required','readonly')); !!}
						</div>	
												 <input name="loop" type="number" value="0" id="loop" hidden>

					</div>	
					</div>
					<div class="col-sm-6 col-md-6">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4 requiredField">Method Name<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::text('name',$mg->name,array('class' => 'input-md form-control', 'id'=>'name', 'required')); !!}
						</div>	
					</div>
												
				</div>
            </div>
			<hr>
			<h3 class="text-center">Enter Probes </h3>
			<hr>
			<div class="row">
					<div class="row">
								<div class="col-lg-12" style="margin-top:20px">
								<table class="table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr>
						<th class="col-xs-1 text-center">
							S/N
						</th>
						<th class="col-xs-2 text-center">
							Property*
						</th>
						<th class="col-xs-1 text-center">
							Unit*
						</th>
						<th class="col-xs-2 text-center">
							Method*
						</th>
						<th class="col-xs-2 text-center">
							Type*
						</th>
						<th class="col-xs-2 text-center">
							<p>Target text*</p>
							<i>e.g SHORT/MEDIUM/LONG</i>
						</th>	
						<th class="col-xs-1 text-center">
							Min*
						</th>
						<th class="col-xs-1 text-center">
							Max*
						</th>	
						<th class="col-xs-1 text-center">
							Tolerance +/-
						</th>							
					</tr>
				</thead>
				<tbody id='tbody'>
				@foreach($mg->probes as $probe)
			
					<tr id='addr{{($loop->iteration-1)}}'>
						<td class="text-center">
						{{$loop->iteration}}
						</td>
						<td>
						<input value="{{$probe->prop}}" type="text" name='items[{{ $loop->iteration-1 }}][prop]'  placeholder='Length' class="form-control" required>
						</td>
						<td>
						<input  value='{{ $probe->unit }}' type='text' name='items[{{ $loop->iteration-1 }}][unit]' placeholder='m' class="form-control" required>
						</td>
						<td>
						<input value='{{ $probe->method }}' type="text" name='items[{{ $loop->iteration-1 }}][method]' placeholder='Meter' class="form-control" required>
						</td>
						<td>						
						{!!	Form::select('items['.($loop->iteration-1).'][type]',["FIXED"=>"FIXED","RANGE"=>"RANGE"],$probe->tarType,array('class' => 'form-control iType', 'required')); !!} 
						</td>
						<td>
						<input value='{{$probe->tarName}}' type="text" name='items[{{ $loop->iteration-1 }}][target]' placeholder='VERY SHORT/SHORT/LONG/VERY LONG' class="form-control" required>
						</td>
						<td>
						<input value='{{ $probe->iLow }}' onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items[{{ $loop->iteration-1 }}][min]' placeholder='' class="form-control" @if($probe->tarType=='FIXED') {{ 'readonly' }}
						@endif >
					
						</td>
						<td>
						<input value='{{ $probe->iHigh }}' onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items[{{ $loop->iteration-1 }}][max]' placeholder='' class="form-control" required>
						</td>		
						<td>
						<input value='{{$probe->error }}' onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items[{{ $loop->iteration-1 }}][tol]' placeholder='' class="form-control">
						</td>			
								
						
									
					</tr>
					<input value='{{$loop->iteration-1}}' name='loops' id='loops' hidden>
					@endforeach
                 
				</tbody>
			</table>
			<a id="add_rowe" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
                    </div>
						</div>
					

						
				</div>
				<div class="row">
				<div class="col-sm-12>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('UPDATE TEST', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>
				</div>
				</div>
            </div>
			
            <!-- /.row -->
			{!! Form::close() !!}
        </div>
        <!-- /#page-wrapper -->

@endsection