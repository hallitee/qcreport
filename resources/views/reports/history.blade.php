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
                    <h1 class="page-header text-primary text-center">Generate QC Analysis Report</h1>
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
				
				<button class="btn btn-md btn-info report"> <i class="fa fa-search fa-1x"> </i> Search </button>

                </div>

                <!-- /.col-lg-12 -->
<hr class="col-xs-12" style="width: 100%; color: black; height: 1px; background-color:black" />
            </div><!-- /.row-->	
		
            <div class="row">

		<div class="col-lg-12 col-xs-12" id="inprocess">
		<table class="table table-responsive table-condensed table-striped table-bordered restable text-center">
		<thead>

    <tr>
      <th class="col-xs-1" rowspan='3' colspan='1'>DATE</th>
	  <th class="col-xs-1 text-center"  rowspan='4' colspan='1'>Shift</th>	
	  <th class="col-xs-3" class="text-center" rowspan='2' colspan='4'>PROCESSS WATER</th> 	  
      <th class="col-xs-4" class="text-center" colspan='10'>IN-PROCESSS</th>     	
	  <th class="col-xs-3" class="text-center" rowspan='2' colspan='5'>FINISHED PRODUCT POWDER</th>     	       	  
    </tr>		
    <tr>
      <td colspan='3'>LABSNa</td>  
      <td colspan='2'>12% Caustic Storage</td>   	  
      <td colspan='2'>SLURRY</td>     	       
      <td colspan='3'>BASE POWDER</td>  	  
    </tr>
    <tr>
    	       
      <th colspan='1'>PH</th>
      <th colspan='1'>Iron</th> 
      <th colspan='1'>Sulphate</th>
      <th colspan='1'>Fresh/Recycle</th> 
      <th colspan='1'>LABSNa %AM(Inside)</th>
      <th colspan='1'>LABSNa %AM (Outside)</th>     	       
      <th colspan='1'>Density(g/ml)</th>
      <th colspan='1'>S.g(g/cm3)</th> 
      <th colspan='1'>Analytical Result(%)</th>	  
      <th colspan='1'>Slurry Conc.</th>
      <th colspan='1'>Slurry %AM</th> 
      <th colspan='1'>%AM</th>
      <th colspan='1'>%H20</th> 
      <th colspan='1'>BD (g/cm3)</th>
      <th colspan='1'>BD (g/cm3)</th>     	       
      <th colspan='1'>%AM</th>
      <th colspan='1'>%H20</th> 
      <th colspan='1'>PH</th>
      <th colspan='1'>REMARKS</th> 	  
    </tr>
    <tr>
       <td colspan='1'>LIMITS</td>   	       
      <td colspan='1'></td>
      <td colspan='1'></td> 
      <td colspan='1'></td>
      <td colspan='1'></td> 
      <td colspan='1'></td>
      <td colspan='1'></td>     	       
      <td colspan='1'></td>
      <td colspan='1'></td> 
      <td colspan='1'></td>
      <td colspan='1'></td> 	  
      <td colspan='1'></td>
      <td colspan='1'></td> 
      <td colspan='1'></td>
      <td colspan='1'></td> 
      <td colspan='1'></td>
      <td colspan='1'></td>     	       
      <td colspan='1'></td>
      <td colspan='1'></td> 
      <td colspan='1'></td>
      <td colspan='1'></td> 	  
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