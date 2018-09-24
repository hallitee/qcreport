@extends('layouts.master')

@section('body')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
                    <h1 class="page-header">Dashboard</h1>
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8 col-md-8">

                </div>


            </div>
            <!-- /.row -->
 
        </div>
        <!-- /#page-wrapper -->

@endsection