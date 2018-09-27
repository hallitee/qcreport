
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
	<th scope="col">id</th>
	
      <th scope="col">Material</th>
	  <th scope="col">Entity</th>
      <th scope="col">Supervisor</th>    
	     <th scope="col">Manager</th>    

      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($mat as $l)
    <tr>
      <th scope="row">{{ $l->id}}</th>
      <td>{{ $l->name}}</td> 
      <td>{{ $l->entity->name }}</td> 	  
	    <td>{{ $l->qcSuperEmail}}</td> 	   
		 <td>{{ $l->qcManEmail}}</td> 

      <td><a class="btn btn-sm btn-info" href="{{ route('matgroup.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('MatgroupController@destroy', $l->id),'method'=>'DELETE']) !!}
        <button class="btn btn-sm btn-danger" type="submit"><u>Delete</u></a>
       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $mat->links() }}