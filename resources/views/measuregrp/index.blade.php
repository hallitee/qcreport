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
			{!! Form::open(['action' => 'MeasuregrpController@store']) !!}
            <div class="row">
			
					<div class="col-sm-6 col-md-6">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"> Material Group <span class="asteriskField"> *</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::select('matid',$mat,'',array('class' => 'input-md form-control', 'id'=>'entitycode', 'required')); !!}
						</div>	
					</div>	
					</div>
					<div class="col-sm-6 col-md-6">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4 requiredField">Method Name<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::text('name','',array('class' => 'input-md form-control', 'id'=>'name', 'required')); !!}
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
					<tr id='addr0'>
						<td class="text-center">
						1
						</td>
						<td>
						<input type="text" name='items[0][prop]'  placeholder='Length' class="form-control" required>
						</td>
						<td>
						<input  type='text' name='items[0][unit]' placeholder='m' class="form-control" required>
						</td>
						<td>
						<input type="text" name='items[0][method]' placeholder='Meter' class="form-control" required>
						</td>
						<td>						
						<select type="text" name='items[0][type]' placeholder='' class="form-control">
							  <option value="FIXED">FIXED</option>
							  <option value="RANGE">RANGE</option>
						</select>						
						</td>
						<td>
						<input type="text" name='items[0][target]' placeholder='VERY SHORT/SHORT/LONG/VERY LONG' class="form-control" required>
						</td>
						<td>
						<input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items[0][min]' placeholder='' class="form-control" required>
						</td>
						<td>
						<input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items[0][max]' placeholder='' class="form-control" required>
						</td>		
						<td>
						<input onkeypress='return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57' type='number' min='-10000' max='10000' name='items[0][tol]' placeholder='' class="form-control">
						</td>						
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
			<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
                    </div>
						</div>
					

						
				</div>
				<div class="row">
				<div class="col-sm-12>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('CREATE TEST', array('class'=>'btn btn-info')); !!}
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