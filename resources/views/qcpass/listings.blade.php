
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
		@if((Auth::user()->priv()==1))
				@if($l->metric3==50 )
				<button class="btn btn-md btn-warning"><b>AWAITING</b></button>
				@elseif($l->metric3==45)
				<button class="btn btn-md btn-primary"><b>ANALYSING</b></button>
				@elseif($l->metric3==40)
				<button class="btn btn-md btn-primary"><b>ANALYSED</b></button>	
				@elseif($l->metric3==35)
				<button class="btn btn-md btn-success"><b>APPROVAL<span class="badge">1/2</span></b></button>	
				@elseif($l->metric3==30)
				<button class="btn btn-md btn-success"><b>QC PASSED</b></button>
				@elseif($l->metric3==25)
				<button class="btn btn-md btn-danger"><b>APPROVAL<span class="badge">1/2</span></b></button>	
				@elseif($l->metric3==20)
				<button class="btn btn-md btn-danger"><b>QC FAILED</b></button>		 
			@endif
		@elseif(Auth::user()->priv()==2)
			@if($l->metric3==50)
				<button class="btn btn-md btn-warning"><b>PENDING</b></button>
				@elseif($l->metric3==45)
				<button class="btn btn-md btn-primary"><b>PENDING</b></button>
				@elseif($l->metric3==40)
				<button class="btn btn-md btn-primary"><b>ANALYSED</b></button>	
				@elseif($l->metric3==35)
				<button class="btn btn-md btn-success"><b>APPROVAL <span class="badge">1/2</span></b></button>	
				@elseif($l->metric3==30)
				<button class="btn btn-md btn-success"><b>QC PASSED</b></button>
				@elseif($l->metric3==25)
				<button class="btn btn-md btn-danger"><b>APPROVAL <span class="badge">1/2</span></b></button>	
				@elseif($l->metric3==20)
				<button class="btn btn-md btn-danger"><b>QC FAILED</b></button>		
			@endif	
		@elseif(Auth::user()->priv()>2)
				@if($l->metric3==50)
				<button class="btn btn-md btn-warning"><b>PENDING</b></button>
				@elseif($l->metric3==45)
				<button class="btn btn-md btn-primary"><b>ANALYSING</b></button>
				@elseif($l->metric3==40)
				<button class="btn btn-md btn-primary"><b>ANALYSED</b></button>	
				@elseif($l->metric3==35)
				<button class="btn btn-md btn-success"><b>APPROVAL <span class="badge">1/2</span></b></button>	
				@elseif($l->metric3==30)
				<button class="btn btn-md btn-success"><b>QC PASSED</b></button>
				@elseif($l->metric3==25)
				<button class="btn btn-md btn-danger"><b>APPROVAL <span class="badge">1/2</span></b></button>	
				@elseif($l->metric3==20)
				<button class="btn btn-md btn-danger"><b>QC FAILED</b></button>		
				@endif					
		@endif
	  </td>
	  <td>
	  @if(Auth::user()->priv()<2)
	 <a href="{{ route('qcpass.print', ['id'=>$l->id ])}}"> <button value="{{$l->id}}" class="btn btn-md btn-info"><b>Print</b></button></a>
	  @elseif(Auth::user()->priv()==2)
		@if($l->metric3>45)
			<button value="{{$l->id}}" class="btn btn-md btn-info btnAnal"><b>Analyse</b></button>
		@else
			<a href="{{ route('analyse.edit',['id'=>$l->id])}}"><button value="{{$l->id}}" class="btn btn-md btn-info"><b>Review</b></button></a>
		@endif
	  @elseif(Auth::user()->priv()>2)
			@if($l->metric3<38)
			<a href="{{ route('qcpass.appr',['id'=>$l->id, 'email'=>Auth::user()->email]) }}"><button value="{{$l->id}}" class="btn btn-md btn-info"><b>Approve</b></button></a>
			@else
			<a href="{{ route('analyse.edit',['id'=>$l->id])}}"><button value="{{$l->id}}" class="btn btn-md btn-info"><b>Review</b></button></a>
			
			@endif
			
	  @endif
	  </td>
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $qc->links() }}