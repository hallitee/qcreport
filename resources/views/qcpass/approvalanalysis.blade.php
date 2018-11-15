@extends('layouts.master')

@section('navleft')
@parent
@endsection
@section('navright')
@parent
@endsection

@section('body')
@php
$bad = " #e5bbb9 "; //" #f3dcdb " "#f9b5b5"
$good =   "#b9e5bd" ;//"#ddf3db" "#bcf5b6"
$samcnt=-1;
$sample = $pass->metric2;

@endphp 
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text-center">{{ strtoupper($pass->product->matgroup->name )}} ANALYSIS SPECIFICATION / RESULT SHEET</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			{!!  Form::open(['action'=>array('QcpassController@approveqcpass','id'=>$pass->id), 'method'=>'PUT'])  !!}		
            <div class="row">
			
					<div class="col-sm-8 col-md-8 col-sm-push-2">
					<table class="table table-bordered table-responsive-sm">
					<tbody>
					<tr><th> Material: </th><td colspan='3'> {{ $pass->product->name }}</td></tr>
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
				@foreach($m->probes as $u=>$p)
				@php
				++$samcnt;
				if($p->tarType=='FIXED'){
				$num=intval($samp[$samcnt]->coa)>intval($p->iHigh);
				if($num){
					$coacolor=$bad;		//			
				}
				else{
					if(intval($samp[$samcnt]->coa)==intval($p->iHigh)){
						$coacolor=$good;
					}
					else{
						$coacolor=$bad;
					}
				}
				 
				}
				else{
					$num = intval($samp[$samcnt]->coa)>=intval($p->iLow) && intval($samp[$samcnt]->coa)<=intval($p->iHigh);
					if($num){
					$coacolor=$good;
					}else{
						
						$coacolor=$bad;
					}
					
				}				
				@endphp
				<tr>
		
				<td>{{$p->prop}}</td><td>{{$p->unit}}</td><td>{{$p->method}}</td><td>{{$p->iHigh}}</td><td bgcolor="{{ $coacolor }}">{{ $samp[$samcnt]->coa }}</td>			
			
			
				@for($x=1;$x<=$sample; $x++)
				@php
				$d="data".$x;		
				if($p->tarType=='FIXED'){
				$num=intval($samp[$samcnt]->$d)>intval($p->iHigh);
				if($num){
					$color=$bad;		//			
				}
				else{
					if(intval($samp[$samcnt]->$d)==intval($p->iHigh)){
						$color=$good;
					}
					else{
						$color=$bad;
					}
				}
				 
				}
				else{
					$num = intval($samp[$samcnt]->$d)>=intval($p->iLow) && intval($samp[$samcnt]->$d)<=intval($p->iHigh);
					if($num){
					$color=$good;
					}else{
						
						$color=$bad;
					}
					
				}
				
				@endphp
				<td style="text-alignment:center;" bgcolor="{{$color}}">{{ $samp[$samcnt]->$d }}</td>
				
				@endfor
				</tr>
				@endforeach
				@endforeach
				</tbody>
				</table>
				</div>
            </div>
			<hr>
					
			<input name="sample" value="{{$sample}}" id="sample" hidden>	
			@if($pass->metric3>36)
			<div class="row">
				<div class="col-sm-12">
						<div id="div_id_select" class="form-group required">
						    <label class="col-md-4 col-md-push-2">
								<i>Direct Approval in Managers Absence</i>
    </label>
    <label class="radio-inline col-md-2 col-md-push-2">
      <input type="radio" name="dirAppr" value="YES">Yes 
    </label>
    <label class="radio-inline col-md-2 col-md-push-2">
      <input type="radio" name="dirAppr" value="NO" checked>No
    </label>
					</div>    <!-- /.form-group -->
				</div>    <!-- /.col-sm-12 -->

				</div>   <!-- /.row -->			
				<hr>
			<div class="row">
				<div class="col-sm-12">
						<div id="div_id_select" class="form-group required">
						
						<div class="controls col-md-2 col-md-push-4"  style="margin-bottom: 10px">
						{!! Form::submit('QC PASSED', array('class'=>'btn btn-success', 'name'=>'subbtn')) !!}
						</div>			
						<div class="controls col-md-2 col-md-push-4"  style="margin-bottom: 10px">
						{!! Form::submit('NOT PASSED', array('class'=>'btn btn-danger', 'name'=>'subbtn')) !!}
						</div>		
					
					</div>    <!-- /.form-group -->
				</div>    <!-- /.col-sm-12 -->
				</div>   <!-- /.row -->
				@endif
            </div>
			
           <hr>
			
     
        <!-- /#page-wrapper -->
			<hr>
			{!! Form::close() !!}
     
@endsection