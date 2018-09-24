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
                    <h1 class="page-header">Update Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
																		
            <!-- /.row -->
            <div class="row">
			{!! Form::open(['action'=>array('UserController@update',$s->id), 'method'=>'PUT']) !!}
					<div class="col-lg-8 col-md-8 col-md-offset-2">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Full Name<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('name',$s->name,array('class' => 'input-md form-control', 'id'=>'name')); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">User Name<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::text('username',$s->username,array('class' => 'input-md form-control', 'id'=>'username')); !!}
						</div>	
					</div>		
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Company<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('company',$comp,$s->company,array( 'class' => 'input-md form-control', 'id'=>'company')); !!}
						</div>	
					</div>					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">User Email<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::email('email',$s->email,array('class' => 'input-md form-control', 'id'=>'email')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Password<span class="asteriskField">*</span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::password('password',array('class' => 'input-md form-control', 'id'=>'password')); !!}
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Role<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('role',['0'=>'ANALYST', '1'=>'ADMIN'],$s->role,array( 'class' => 'input-md form-control', 'id'=>'role')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField">Group<span class="asteriskField"></span> </label>
						<div class="controls col-md-5 "  style="margin-bottom: 10px">
						{!! Form::select('group',['1'=>'ALL', '0'=>'ONLY'],$s->priv,array( 'class' => 'input-md form-control', 'id'=>'group')); !!}
						</div>	
					</div>									
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8 "  style="margin-bottom: 10px">
						{!! Form::submit('UPDATE', array('class'=>'btn btn-info')); !!}
						</div>						
					</div>

						{!! Form::close() !!}
				</div>
            </div>
            <!-- /.row -->
            </div>
            <!-- /.row -->
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

@endsection