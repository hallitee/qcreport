
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
	<th scope="col">id</th>
      <th scope="col">Name</th>
	  <th scope="col">Probes</th>
      <th scope="col">Mat Group</th>    
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($mg as $l)
    <tr>
      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $l->name}}</td> 
      <td>{{ $l->probes->count() }}</td> 	  
	    <td>{{ $l->matgroup->name }}</td> 	   

      <td><a class="btn btn-sm btn-info" href="{{ route('measuregrp.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('MeasuregrpController@destroy', $l->id),'method'=>'DELETE']) !!}
        <button class="btn btn-sm btn-danger" type="submit"><u>Delete</u></a>
       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $mg->links() }}