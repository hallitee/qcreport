
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
	<th scope="col">id</th>
	
      <th scope="col">Name</th>
	  <th scope="col">Sku</th>
	  <th scope="col">Test</th>
      <th scope="col">Material group</th>    
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($prod as $l)
    <tr>
      <th scope="row">{{ $l->id}}</th>
      <td>{{ $l->name}}</td> 
      <td>{{ $l->sku }}</td> 	  
	       <td>@foreach($l->measures as $m)
		   {{$m->name}}
		   @endforeach
		   </td> 
	    <td> {{ $l->matgroup->name }}</td> 	   


      <td><a class="btn btn-sm btn-info" href="{{ route('product.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('ProductController@destroy', $l->id),'method'=>'DELETE']) !!}
        <button class="btn btn-sm btn-danger" type="submit"><u>Delete</u></a>
       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $prod->links() }}