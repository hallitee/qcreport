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
                    <h1 class="page-header text-primary text-center">Analysis Log</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			

            <div class="row">
			
			@include('reports.listings')
        <!-- /#page-wrapper -->
			</div>
</div>		
@endsection