@extends('layouts.master')

@section('navleft')

@parent

@endsection
@section('navright')
@parent
@endsection



@section('body')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-primary text-center">Search Production Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			

            <div class="row">
			
			<input name="userid" id="userid" value="{{Auth::user()->id}}" hidden/>
                <div class="col-xs-12">
				<div class="col-xs-6" style="margin-bottom:10px">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-xs-5  requiredField">Production Order#<span class="asteriskField"></span> </label>
						<div class="controls col-xs-7">
						{!! Form::text('prodOrder',"",array('class' => 'input-xs form-control', 'id'=>'prodOder')); !!}
						
						</div>	
					</div>		
					</div>	
					<div class="col-xs-6" style="margin-bottom:10px">	
						<div class="form-group required">
						<label class="control-label col-xs-5  requiredField">Product Name:<span class="asteriskField"></span> </label>
						<div class="controls col-xs-7 col-xs-pull-1">
						{!! Form::text('prodName',"",array('class' => 'input-xs form-control', 'id'=>'prodName')); !!}
						</div>	
					</div>					
				</div>
				<div class="col-xs-10" style="margin-bottom:12px">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-xs-4  requiredField">Posting date( between)#<span class="asteriskField"></span> </label>
						<div class="controls col-xs-4 col-xs-pull-1">
						
						{!! Form::date('dateFrom',"",array('class' => 'input-xs form-control', 'id'=>'dateFrom')); !!}<span class="asteriskField">From</span>
						</div>	
						
						<div class="controls col-xs-4 col-xs-pull-1">
						{!! Form::date('dateTo',"",array('class' => 'input-xs form-control', 'id'=>'dateTo')); !!}<span class="asteriskField">To</span>
						</div>							
					</div>		
					</div>	
				<div class="col-xs-2"> 
				
				<button class="btn btn-md btn-info search"> <i class="fa fa-search fa-1x"> </i> Search </button>
	
                </div>
<hr class="col-xs-12" style="width: 100%; color: black; height: 1px; background-color:black" />
                <!-- /.col-lg-12 -->

            </div><!-- /.row-->	
		
            <div class="row">

		<div class="col-lg-12 col-xs-12" id="inprocess">
		<table class="table table-responsive table-dark table-bordered restable" hidden>
		<thead>

    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Process</th>    
      <th scope="col">Prod. Number</th>
      <th scope="col">Item Name</th>	  
      <th scope="col">Post date</th>    
      <th scope="col">Action</th>  	  
	 	       
    </tr>		

  </thead>
  <tbody id="tbody">

  </tbody>
</table> <!-- /table -->
            </div>

            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
				
@endsection