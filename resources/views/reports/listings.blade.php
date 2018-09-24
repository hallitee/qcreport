
<table class="table table-responsive table-dark table-bordered">
  <thead>
  @if(Auth::check())
    <tr>
      <th scope="col">Prod #</th>
	  <th scope="col">Process</th> 	  
      <th scope="col">Shift</th>    
      <th scope="col">Analysis Date</th>
      <th scope="col">Post Date</th>	  
      <th scope="col">Created by</th>    
      <th scope="col">Review</th>	  
      	       
    </tr>		
	@endif
  </thead>
  <tbody>
  @if(Auth::check())  
    @foreach($url as $l)
    <tr>
      <th scope="row">{{ $l->prodOrder}}</th>
	  <td>{{ $l->processType}}</td>
	   <td>{{ $l->shiftName}}</td>
	    <td>{{ substr($l->shiftDate, 0, 16)}}</td>
		 <td>{{ $l->created_at->toDateTimeString() }}</td>
		  <td>{{ $l->analystName}}</td>
       <td>
	   
		@if(Auth::user()->isApprover())
		<a href="{{ route('report.edit', $l->id) }}"><button class="btn btn-info btn-xs">Edit</button></a>
		@else
		<a href="{{ route('report.edit', $l->id) }}"><button class="btn btn-info btn-xs">View</button></a>
		@endif
	   
	   </td>	         
    </tr>
    @endforeach
@endif
  </tbody>
</table> <!-- /table -->
{{ $url->links() }}