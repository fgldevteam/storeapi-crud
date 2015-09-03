<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<!-- basic styling -->
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

	<!-- custom css-->
	<link rel="stylesheet" type="text/css" href="/css/form.css">
	<link rel="stylesheet" type="text/css" href="/css/store.css"> 
	
	
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/home') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Login</a></li>
						<!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->firstname }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	
	<div class="col-md-2 sidebar-container">
		@if(Auth::check())
		@include('nav')
		@endif
	</div>
	<div class="col-md-10 content-container"> 
		
		<div class="row" id="store-header">
				<div class="col-md-2" id="banner">
					@if( $store["banner_id"] == 1)
						<div>Sportchek</div> <!-- Set background to this div-->
					@else 
						<div> Atmosphere </div>
					@endif
				</div>
				<div class="col-md-8" id="title">
					<div class="row" id="storename">
						<h3> {{ $store["id"] }} - {{ $store["name"] }} ({{ $districts[$store["district_id"]] }}) </h3>
					</div>
					<div class="row" id="address">
						<h5> {{ $store["address1"] }} </h5>
						<h5> {{ $store["city"] }} , {{ $store["province"] }} </h5>
						<h5>{{ $store["postal_code"] }}</h5>
					</div>
					<!-- <div class="row" id="district">
						<h4> {{ $districts[$store["district_id"]] }} </h4>						
					</div> -->
				</div>
				<div class="col-md-2" id="store-class">
					{{ $classifications[$store["classification_id"]] }}
				</div>

		</div>
		<div class="row" >
			<div class="col-md-6" id="store-details">
				<h4> Store Details</h4>
				<table class="table">
					<tr>
						<td class="detail-heading"> Square Footage </td>
						<td class="detail-info"> {{ $store["sqft"] }} </td>
					</tr>
					<tr>
						<td class="detail-heading"> Mall Entrance? </td>
						<td class="detail-info"> {{ $store["mall_entrance"] }} </td>
					</tr>
					<tr>
						<td class="detail-heading"> # Cashbanks </td>
						<td class="detail-info"> {{ $store["cashbanks"] }} </td>
					</tr>
					<tr>
						<td class="detail-heading"> # Floors </td>
						<td class="detail-info"> {{ $store["floors"] }} </td>
					</tr>
					<tr>
						<td class="detail-heading"> # Registers </td>
						<td class="detail-info"> {{ $store["registers"] }} </td>
					</tr>
					<tr>
						<td class="detail-heading"> # PDT's </td>
						<td class="detail-info"> {{ $store["pdts"] }} </td>
					</tr>
					<tr>
						<td class="detail-heading"> # Tablets </td>
						<td class="detail-info"> {{ $store["tablets"] }} </td>
					</tr>
					<tr>
						<td class="detail-heading"> Last Renovation Date </td>
						<td class="detail-info"> {{ $store["last_reno"] }} </td>
					</tr>
					<tr>
						<td class="detail-heading"> Last Computer Update </td>
						<td class="detail-info"> {{ $store["last_computer_update"] }} </td>
					</tr>
				</table>
				<h4> Visual Details </h4>
				<table class="table">
					<tr>
						<td>Coming Soon..</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6" id="map">
				<div class="row">
					<iframe
					  width="600"
					  height="450"
					  frameborder="0" style="border:0"
					  src='https://www.google.com/maps/embed/v1/place?key=AIzaSyAiRVMTD66Bxke1br0MPBN5XvyRl0jSitk&q={{$store["lat"]}},{{$store["long"]}}&zoom=10' allowfullscreen>
					</iframe>
				</div>
			</div>
		</div>
		
	</div>
	</div>

		

	<!-- Scripts -->
	<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>


@section('content')
	

	<!-- <div class="col-md-4 col-md-offset-8">
		<div class="col-md-2">
			<a href="/store/{{$store["id"]}}/edit" class="btn btn-warning btn-mini" id="edit">Edit</a>
		</div>
		<div class="col-md-2">
			{!! Form::open(array('route' => array('store.destroy', $store["id"]), 'method' => 'delete')) !!}
	        	<button type="submit" class="btn btn-danger btn-mini" id="delete">Delete</button>
	    	{!! Form::close() !!}
    	</div>
	</div>
	<div class="col-md-4">
		<table class="table table-bordered">	
			@foreach ($store as $key=>$value)
			<tr>
				
			</tr>
			<tr>
				<td> <b>{{$key}} </b></td>
				<td>{{$value}}</td>
			</tr>
			@endforeach
		</table>
	</div> -->



@endsection