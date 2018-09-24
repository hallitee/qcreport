
<table class="table-sm table-responsive-sm table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">Entity</th>
      <th scope="col">%LabAM</th>    
       <th scope="col">Density</th>
	   <th scope="col">12% Caustic</th>
	   <th scope="col">Baume</th>
      <th scope="col">Slurry Conc.</th>   	  
      <th scope="col">Slurry %AM</th>
      <th scope="col">BP Gran</th>      
      <th scope="col">BP %AM</th>
      <th scope="col">BP %H20</th>    
       <th scope="col">BP Density</th>
	   <th scope="col">FP Gran</th>
	   <th scope="col">FP Perfume</th>
      <th scope="col">BD Density</th>   
       <th scope="col">FP SPOT</th>
	   <th scope="col">FP %AM</th>
	   <th scope="col">FP %H20</th>
      <th scope="col">FP PH</th> 	  
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>  	  
    </tr>
  </thead>
  <tbody>
    @foreach($user as $l)
    <tr>
      <th scope="row">{{ $l->entity->name}}</th>
      <td>{{ $l->labAM}}</td> 
	    <td>{{ $l->labDensity}}</td> 	   
	    <td>{{ $l->caustic}}</td>
	   <td>{{ $l->baume}}</td>		
      <td>{{ $l->slurryConc}}</th>
      <td>{{ $l->slurryAM}}</td> 
	    <td>{{ $l->bpGranularInt}}</td> 	   
	    <td>{{ $l->bpAM}}</td>
	   <td>{{ $l->bpWater}}</td>	
      <td>{{ $l->bpDensity}}</th>
      <td>{{ $l->fpGranular}}</td> 
	    <td>{{ $l->fpPerfume}}</td> 	   
	    <td>{{ $l->fpDensity}}</td>
		<td>{{ $l->fpSpot}}</td>
		<td>{{ $l->fpAM}}</td>		
	   <td>{{ $l->fpWater}}</td>		   
	   <td>{{ $l->fpPH}}</td>	
      <td><a class="btn btn-sm btn-info" href="{{ route('spec.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('SpecificationController@destroy', $l->id),'method'=>'DELETE']) !!}
        <button class="btn btn-sm btn-danger" type="submit"><u>Delete</u></a>
       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $user->links() }}