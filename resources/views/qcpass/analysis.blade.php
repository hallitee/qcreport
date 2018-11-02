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
                    <h3 class="page-header text-center">ANALYSIS SPECIFICATION / RESULT SHEET</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			{!! Form::open(['action' => 'QcpassController@store']) !!}
            <div class="row">
			
					<div class="col-sm-8 col-md-8 col-sm-push-2">
					<table class="table table-bordered table-responsive-sm">
					<tbody>
					<tr><th> Manufacturer /Supplier:</th><td colspan='3'> {{ $pass->supplier }}</td></tr>
					<tr><th> Date of Production:</th><td> {{ $pass->prodDate}}</td><th>Arrival Date: </th><td> {{$pass->arrDate}}</td> </tr>
					<tr><th> Expiry Date: </th><td>{{ $pass->expDate}}</td><th>Sampled Date:</th><td>  {{$pass->samDate}}</td> </tr>
					<tr><th> Batch No: </th><td>{{ $pass->batch}}</td><th>Quantity Supplied:</th><td>  {{$pass->quantity}}</td> </tr>
					<tr><th> SKU: </th><td>{{ $pass->product->sku }}</td><th>Waybill No: </th><td> {{$pass->waybill}}</td> </tr>					
					</tbody>
					</table>
				</div>  <!--  closing div for col-md-8   -->
				<div class="col-sm-12 col-md-12">
				<table class="table table-stripped table-responsive-sm table-bordered">
				<thead>
				<tr><th class="col-sm-1" rowspan="3">PROPERTIES</th><th class="col-sm-1" rowspan="3">UNITS</th><th class="col-sm-1"  rowspan="3">TESTING METHOD</th><th class="col-sm-1" rowspan="3">TARGET</th><th class="col-sm-8  text-center" colspan="{{$sample+1}}">RESULT</th></tr>
				<tr><th rowspan="2">COA</th><th class="text-center" colspan="{{$sample}}">ACTUAL TEST</th></tr>
				<tr>@for($y = 1;$y < ($sample+1);$y++)
					<th class="text-center">{{$y}}</th>
					@endfor
				</tr>

				</thead>
				<tbody>
				@foreach($pass->product->measures as $m)
				<tr>
				<th  colspan="{{ ($sample+5) }}">{{ $loop->iteration.'. '}} {{$m->name}} </th>
				
				</tr>
				@foreach($m->probes as $p)
				<tr>
				<td>{{$p->prop}}</td><td>{{$p->unit}}</td><td>{{$p->method}}</td><td>{{$p->iHigh}}</td><td><input name="data[coa][{{$p->prop}}]" type="number" class="form-control" ></td>
				@for($x=1; $x<=$sample; $x++)
				<td><input type="number" name="data[{{$p->prop}}][{{$p->id}}][{{$x}}]" class="form-control" ></td>
				@endfor
				</tr>
				@endforeach
				@endforeach
				</tbody>
				</table>
				</div>
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