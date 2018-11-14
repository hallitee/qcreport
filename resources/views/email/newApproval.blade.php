<html>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</style>
<head></head>
<body>
This is to notify you that an Analysis has been carried out on the below QCPass for your approval 
<br>
<br>

<table style="width:70%">
  <caption>QCPass Details</caption>

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
</table>
<br>
<br>
 <a href="{{ route('qcpass.appr', ['id'=>$pass->id, 'email'=>$pass->product->matgroup->qcSuperEmail]) }}">To approve the analysis please login to the portal</a>
</body>
</html>