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
                    <h1 class="page-header">Manage Tests</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			<div class="col-lg-12 col-md-12">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
				@include('measuregrp.listings')
			</div>	
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

@endsection