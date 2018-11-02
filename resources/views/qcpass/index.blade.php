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
                    <h1 class="page-header text-center">New QC-Pass </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			{!! Form::open(['action' => 'QcpassController@store']) !!}
            <div class="row">
			
					<div class="col-sm-10 col-md-10">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4 col-md-push-2  requiredField"> Material Group <span class="asteriskField"> *</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::select('matid',$mat,'',array('class' => 'input-md form-control', 'id'=>'matid', 'required')); !!}
						</div>	
					</div>	
					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  col-md-push-2 requiredField">Product Name <span class="asteriskField"> *</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::select('product',[],'',array('class' => 'input-md form-control', 'id'=>'product', 'required')); !!}
						</div>	
					</div>	

						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  col-md-push-2 requiredField">Manufacturer<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::text('supplier','',array('class' => 'input-md form-control', 'id'=>'supplier', 'required')); !!}
						</div>	
					</div>	
					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-3 col-md-push-2  requiredField">Manufacturing Date<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-3 col-md-offset-1"  style="margin-bottom: 10px">
						{!! Form::date('mfgDate','',array('class' => 'input-md form-control', 'id'=>'mfg', 'required')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2 requiredField">Expiry Date<span class="asteriskField"></span> </label>
						<div class="controls col-md-3"  style="margin-bottom: 10px">
						{!! Form::date('expDate','',array('class' => 'input-md form-control', 'id'=>'exp')); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-3 col-md-push-2  requiredField">Delivery Date<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-3 col-md-offset-1"  style="margin-bottom: 10px">
						{!! Form::date('delDate','',array('class' => 'input-md form-control', 'id'=>'delivery', 'required')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2 requiredField">Sample Date<span class="asteriskField"></span> </label>
						<div class="controls col-md-3"  style="margin-bottom: 10px">
						{!! Form::date('samDate','',array('class' => 'input-md form-control', 'id'=>'sample')); !!}
						</div>	
					</div>						
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-3 col-md-push-2 requiredField">Batch Number<span class="asteriskField"></span> </label>
						<div class="controls col-md-3 col-md-offset-1"  style="margin-bottom: 10px">
						{!! Form::text('batch','',array('class' => 'input-md form-control', 'id'=>'batch')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2 requiredField">Qty Supplied<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-3"  style="margin-bottom: 10px">
						{!! Form::number('qtySup','',array('class' => 'input-md form-control', 'id'=>'qtySup', 'required')); !!}
						</div>	
					</div>			

						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4 col-md-push-2 requiredField">Waybill Number<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-3"  style="margin-bottom: 10px">
						{!! Form::text('waybill','',array('class' => 'input-md form-control', 'id'=>'waybill', 'required')); !!}
						</div>	
					</div>					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2 requiredField">Vehicle Number<span class="asteriskField"> *</span> </label>
						<div class="controls col-md-3"  style="margin-bottom: 10px">
						{!! Form::text('vehicle','',array('class' => 'input-md form-control', 'id'=>'vehicle', 'required')); !!}
						</div>	
					</div>	
					
				</div>  <!--  closing div for col-md-8   -->
            </div>
			<hr>
			
			<div class="row">
				<div class="col-sm-10">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('SEND FOR ANALYSIS', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>
				</div>
				</div>
            </div>
			
            <!-- /.row -->
			{!! Form::close() !!}
     
        <!-- /#page-wrapper -->

@endsection