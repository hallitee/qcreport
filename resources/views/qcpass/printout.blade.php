@extends('layouts.master')
<style>

</style>
@section('navleft')
@endsection
@section('navright')
@endsection

@section('body')
<div class="col-sm-10">
<table  class="table table-sm table-bordered table-center">
	<tr><th  colspan="4" class="text-center"><p> {{$pass->product->matgroup->entity->fName }} <p>
	<p>  {{$pass->product->matgroup->entity->cAddress }}</p>

	</th></tr>
	<tr><th  colspan="4" class="text-center"> QC-PASS </th></tr>
	<tr>
    <th>Product:</th>
    <td>{{$pass->product->name}}</td>
    <th>Warehouse</th>
    <td>{{$pass->product->matgroup->name}}</td>	
	</tr>
	<tr>
    <th>Manufacturer/Supplier</th>
    <td>{{$pass->supplier }}</td>
    <th>Vehicle Number</th>
    <td>{{$pass->vehNum }}</td>
	</tr>
    <tr>
    <th>Production date:</th>
    <td>{{$pass->prodDate}}</td>
    <th>Arrival Date</th>
    <td>{{$pass->arrDate}}</td>	
	</tr>
    <tr>
    <th>Expiry Date:</th>
    <td>{{$pass->expDate}}</td>
    <th>Sampled Date</th>
    <td>{{$pass->samDate}}</td>	
	</tr>
    <tr>
    <th>Batch Number:</th>
    <td>{{$pass->batch}}</td>
    <th>Waybill Number</th>
    <td>{{ $pass->waybill }}</td>	
	</tr>  
    <tr>
    <th>SKU</th>
    <td>{{$pass->product->sku}}</td>
    <th>Quantity Supplied</th>
    <td>{{$pass->qunatity }}</td>	
	</tr>
	<tr>
    <th>Analysis Result</th>
    <td colspan='3'>
	@if(($pass->metric3==20) || ($pass->metric3==25))
	<h2 class="text-center text-danger"> NOT PASSED </h2>
	@elseif(($pass->metric3==30) || ($pass->metric3==35))
	<h2 class="text-center text-primary"> PASSED </h2>
	@else
	<h2 class="text-center text-danger"> NOT COMPLETED </h2>
	@endif
	</td>
	</tr>
	
	
	
	<tr><th>QC analyst </th><td colspan='3'>{{$pass->metric1}}</td></tr>
	<tr><th>QC Supervisor </th><td colspan='3'>{{ $pass->supervised}}</td></tr>





</table>
</div>
@endsection