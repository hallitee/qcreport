
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
	<th scope="col">S/N</th>
      <th scope="col">Product</th>
	  <th scope="col">Manufacturer</th>
      <th scope="col">Delivery date</th>    
      <th scope="col">Waybill No</th>
      <th scope="col">Vehicle Number</th>     
	  <th scope="col">Qty Supplied</th>
      <th scope="col">Created By</th>    
      <th scope="col">Analysis Status</th>
      <th scope="col">Action</th>  	  
    </tr>
  </thead>
  <tbody>
    @foreach($qc as $l)
    <tr>
      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $l->product->name}}</td> 
      <td>{{ $l->supplier}}</td> 	  
	  <td>{{ $l->arrDate }}</td> 	   
      <td>{{ $l->waybill}}</td> 
      <td>{{ $l->vehNum }}</td> 	  
	  <td>{{ $l->quantity }}</td> 
	  <td>{{ $l->metric1 }}</td> 
	  <td>
		@if(Auth::user()->priv()<2)
			@if($l->metric3==50)
				<button class="btn btn-md btn-warning"><b>AWAITING</b></button>
				@elseif($l->metric3==40)
				<button class="btn btn-md btn-primary"><b>ONGOING</b></button>
				@elseif($l->metric3==30)
				<button class="btn btn-md btn-danger"><b>NOT PASSED</b></button>	
				@elseif($l->metric3==20)
				<button class="btn btn-md btn-success"><b>PASSED</b></button>		 
			@endif
		@elseif(Auth::user()->priv()>1)
			@if($l->metric3==50)
				<button class="btn btn-md btn-warning"><b>PENDING</b></button>
				@elseif($l->metric3==40)
				<button class="btn btn-md btn-primary"><b>ANALYSED</b></button>
				@elseif($l->metric3==30)
				<button class="btn btn-md btn-danger"><b>NOT APPROVED</b></button>	
				@elseif($l->metric3==20)
				<button class="btn btn-md btn-success"><b>APPROVED</b></button>		 
			@endif		
		@endif
	  </td>
	  <td>
	  @if(Auth::user()->priv()<2)
	  <button value="{{$l->id}}" class="btn btn-md btn-info"><b>Print</b></button>
	  @elseif(Auth::user()->priv()>1)
	   {!! Form::open(['action' => array('QcpassController@analysis', 'id'=>$l->id),'method'=>'POST']) !!}
	  <button value="{{$l->id}}" class="btn btn-md btn-info"><b>Analyse</b></button>
	   {!! Form::close() !!}
	  @elseif(Auth::user()->priv()>2)
	  <button value="{{$l->id}}" class="btn btn-md btn-info"><b>Approve</b></button>		
	  @endif
	  </td>
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $qc->links() }}