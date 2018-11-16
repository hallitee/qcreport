
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
	<th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>    
       <th scope="col">Company</th>
	   <th scope="col">Email</th>
	         <th scope="col">Role</th>
      <th scope="col">Group</th>   	  
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($user as $l)
    <tr>
      <th scope="row">{{ $l->id}}</th>
      <td>{{ $l->name}}</td> 
	    <td>{{ $l->username}}</td> 	   
	    <td>{{ $l->company}}</td>
	   <td>{{ $l->email}}</td>		
	   <td>@if($l->priv==1)
			Warehouse Admin
		@elseif($l->priv==2)
			QC Analyst
		@elseif($l->priv==3)
			QC Supervisor
		@elseif($l->priv==4)
			QC Manager
		@else
			ADMIN
		@endif</td> 
	   <td>@if($l->role == 1)
			ALL
		@else
			ONLY
		@endif
	   </td> 
      <td><a class="btn btn-sm btn-info" href="{{ route('user.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('UserController@destroy', $l->id),'method'=>'DELETE']) !!}
        <button class="btn btn-sm btn-danger" type="submit"><u>Delete</u></a>
       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $user->links() }}