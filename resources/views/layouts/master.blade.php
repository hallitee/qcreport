<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'QCREPORT') }}</title>

    <!-- Bootstrap Core CSS -->
	
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/sb-admin-2.css')}}" rel="stylesheet">
	<link href="{{asset('dist/css/bootstrap-dialog.min.css')}}" rel="stylesheet">
    <!-- Morris Charts CSS -->


    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'QCREPORT')  }}</a>
            </div>
            <!-- /.navbar-header -->
@section('navright')

						
            <ul class="nav navbar-top-links navbar-right">
			  @if (Auth::guest())

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <b> {{ Auth::user()->name }} </b>
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li>
                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        <i class="fa fa-sign-out fa-fw"></i></a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>						
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
						@endif
            </ul>
            <!-- /.navbar-top-links -->
	
			@show
@section('navleft')
	
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						@if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->priv()>0))
								<li>
									<a href="{{ url('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
								</li>
                                <li>								
                                    <a href="#"><i class="fa fa-eyedropper fa-fw"></i>QC Analysis<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>									
										<a href="{{route('report.getprod')}}">New Analysis data</a>
                                        </li>
                                        <li>									
										<a href="{{route('report.index')}}">Analysed Result</a>
                                        </li>										
                                    </ul>
              
                                </li>	
                                <li>
                                    <a href="#"><i class="fa fa-area-chart fa-fw"></i>Report<span class="fa arrow"></span></a>
                                    <ul class="nav nav-secod-level">
                                        <li>									
										<a href="{{route('report.history')}}">Generate Report</a>
                                        </li>	
                                        <li>									
										<a href="#">Visual reports</a>
                                        </li>											
                                    </ul>
              
                                </li>	
@if(Auth::user()->priv()>=3)								
							<li>
							
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Configuration<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								@if(Auth::user()->priv()>4)
                                <li>
                                    <a href="#">Users<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                       <a href="{{ route('user.create')}}">New User</a>
                                        </li>
                                        <li>
										<a href="{{ route('user.index') }}">Manage Users</a>
                                        </li>
                                    </ul>
                           
                                </li>  
									@endif
									
                                <li>
                                    <a href="#">Entity<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                       <a href="{{ route('entity.create')}}">New Entity</a>
                                        </li>
                                        <li>
										<a href="{{ route('entity.index') }}">Manage Entities</a>
                                        </li>
                                    </ul>
                           
                                </li>  		
                                <li>
                                    <a href="#">Material Group<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                       <a href="{{ route('matgroup.create')}}">New Warehouse</a>
                                        </li>
                                        <li>
										<a href="{{ route('matgroup.index') }}">Manage Warehouse</a>
                                        </li>
                                    </ul>
                           
                                </li>	
                                <li>
                                    <a href="#">Measure Group<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                       <a href="{{ route('measuregrp.create')}}">New Test</a>
                                        </li>
                                        <li>
										<a href="{{ route('measuregrp.index') }}">Manage Test </a>
                                        </li>
                                    </ul>
                           
                                </li>								
                                <li>
                                    <a href="#">Products<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                       <a href="{{ route('product.create')}}">New Product</a>
                                        </li>
                                        <li>
										<a href="{{ route('product.index') }}">Manage Products</a>
                                        </li>
                                    </ul>
                           
                                </li>
								

								
								</ul>
							
								</li>
									@endif
								@elseif(Auth::check())
								<li>
									<a href="{{ url('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
								</li>
                                <li>								
                                    <a href="#"><i class="fa fa-eyedropper fa-fw"></i>QC Analysis<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>									
										<a href="{{route('report.getprod')}}">New Analysis data</a>
                                        </li>
                                        <li>									
										<a href="{{route('report.index')}}">Analysed Result</a>
                                        </li>										
                                    </ul>
              
                                </li>	
                                <li>
                                    <a href="#"><i class="fa fa-area-chart fa-fw"></i>Report<span class="fa arrow"></span></a>
                                    <ul class="nav nav-secod-level">
                                        <li>									
										<a href="{{route('report.history')}}">Generate Report</a>
                                        </li>	
                                        <li>									
										<a href="#">Visual reports</a>
                                        </li>											
                                    </ul>
              
                                </li>									
								@endif								

                          
                            <!-- /.nav-second-level -->
                       

                    </ul>
					
                </div>
                <!-- /.sidebar-collapse -->
            </div>

            <!-- /.navbar-static-side -->
			@show
        </nav>
		
@yield('body')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendor/morrisjs/morris.min.js')}}"></script>


    <!-- Custom Theme JavaScript -->
    <script src="{{asset('dist/js/sb-admin-2.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap-dialog.min.js')}}"></script>
</body>

</html>
