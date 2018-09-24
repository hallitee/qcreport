@extends('layouts.master')

@section('navleft')

@parent

@endsection
@section('navright')
@parent
@endsection

@section('body')
@php
$rd = "readonly";
$app="";
if($req->approved==1){
	$app = 'APPROVED';
	$cls = "text-success";
}
elseif($req->approved==2){
	$app = 'UNAPPROVED';
	$cls = "text-danger";	
}
else
{
	$app = 'AWAITING APPROVAL';
	$cls = "text-primary";	
	
}
@endphp

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
			
                    <h1 class="page-header text-center"> Approval Confirmation</h1>
			
				<div class="alert alert-success text-center">
					{{ $status }}
				</div>
				
				
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
                       <div class="row">
			{!! Form::open(['action' => array('ReqController@update', $req->id),'method'=>'PUT']) !!}
					<div class="col-lg-8 col-md-8 col-md-offset-3">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Item Type<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('itemType',$req->item_type,array('class' => 'input-md form-control', 'id'=>'itemType', $rd)); !!}
				
						<ul id="myUL">
										
						</ul>
					</div>	
					</div>					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Item Description<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::textarea('itemDesc',$req->descr,array('class' => 'input-md form-control', 'placeholder'=>'120mm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Blue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 240V &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  2KVA', 'id'=>'itemDesc', 'size'=>'20x5', $rd)); !!}
					
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Type of Material <span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('matType',$req->mat_type,array('class' => 'input-md form-control', 'id'=>'matType', $rd)); !!}
					</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Brand<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('brand',$req->brand,array('class' => 'input-md form-control', 'id'=>'brand', $rd)); !!}
					</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Inventory UOM<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('invUom',[$req->invUom=>$req->invUom],$req->invUom,array( 'class' => 'input-md form-control', 'id'=>'mainCat', $rd)); !!}
						</div>	
					</div>						
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Family<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('subCat',[$req->subcatname=>$req->subcatname],$req->subcatname,array( 'class' => 'input-md form-control', 'id'=>'family', $rd)); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Category<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('category',[$req->cat=>$req->cat],$req->cat,array( 'class' => 'input-md form-control', 'id'=>'category', $rd)); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Sub Category<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('subClass',[$req->subcat=>$req->subcat],$req->subcat,array( 'class' => 'input-md form-control', 'id'=>'subCat', $rd)); !!}
						</div>	
					</div>					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Warehouse Code<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('warehouse',[$req->whcode=>$req->whcode],$req->whcode,array( 'class' => 'input-md form-control', 'id'=>'subCat', $rd)); !!}
						</div>	
					</div>		
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Date Created<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('dateCreated',$req->created_at,array('class' => 'input-md form-control', 'id'=>'brand', $rd)); !!}
					</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Created By<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('createdBy',$req->user->email,array('class' => 'input-md form-control', 'id'=>'brand', $rd)); !!}
					</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">MID Creator<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('midCreator',$crt->creator,array('class' => 'input-md form-control', 'id'=>'brand', $rd)); !!}
					</div>	
					</div>						
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Request Status<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						<b class="{{ $cls}}"> {{  $app  }}</b>
					</div>	
					</div>						

						{!! Form::close() !!}
				</div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

@endsection