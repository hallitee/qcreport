
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
	<th scope="col">id</th>
      <th scope="col">Entity code</th>
      <th scope="col">Name</th>    
	     <th scope="col">Full Name</th>    
       <th scope="col">location</th>
	   <th scope="col">GM Name</th>
	         <th scope="col">GM Email</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($mat as $l)
    <tr>
      <th scope="row">{{ $l->id}}</th>
      <td>{{ $l->entitycode}}</td> 
	    <td>{{ $l->name}}</td> 	   
		 <td>{{ $l->fName}}</td> 
	    <td>{{ $l->metric1 }}</td>
	   <td>{{ $l->gmName}}</td>		
	   <td>{{ $l->gmEmail}}</td>  
      <td><a class="btn btn-sm btn-info" href="{{ route('entity.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('EntityController@destroy', $l->id),'method'=>'DELETE']) !!}
        <button class="btn btn-sm btn-danger" type="submit"><u>Delete</u></a>
       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $mat->links() }}