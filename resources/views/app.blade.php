<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/form.css">
	<link rel="stylesheet" type="text/css" href="/css/store.css">
	<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/css/query-builder.min.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/selectize.bootstrap3.css">

	
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
		@yield('content')
	</div>	

	<!-- Scripts -->
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
	<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="/js/store.js"></script>
	<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="/js/query-builder-standalone.min.js"></script> 
	<script type="text/javascript" src="/js/selectize.min.js"></script>

	<script type="text/javascript">
		$("#last_reno").datepicker();
		$("#last_computer_update").datepicker();
		
		var availableTags = <?php  echo str_replace('&quot;', '"', $searchList) ;  ?>;
		var cityList = <?php  echo str_replace('&quot;', '"', $cityList) ;  ?>;
		var provinceList  =  <?php echo str_replace('&quot;', '"', $provinceList) ;  ?>;
		var districtList  = <?php echo str_replace('&quot;', '"', $districtList); ?>;
		$( "#search" ).autocomplete();
		$("#search").autocomplete({
			source : availableTags,
			select : function(event, input){
				window.location.replace('/store/' + input.item.value)
			} 
		})
		 console.log(cityList)
		$('#builder').queryBuilder({
			
		    filters: [
		    {
		        id   : 'id',
		        label: 'Store Number',
		        type : 'string',
		        operators: ['equal', 'not_equal']
		    },
		    {
		    	id : 'city',
		    	label : 'City', 
		    	type : 'string', 
		    	plugin : 'selectize',
		    	plugin_config: {
			      valueField: 'id',
			      labelField: 'name',
			      searchField: 'name',
			      sortField: 'name',
			      create: true,
			      maxItems: 1,
			      plugins: ['remove_button'],
			      onInitialize: function() {
			        var that = this;
			       
			        cityList.forEach(function(item) {
			              that.addOption(item);
			        });
			        
			      }
			    },
			    valueSetter: function(rule, value) {
			      rule.$el.find('.rule-value-container input')[0].selectize.setValue(value);
			    },

		    	input: 'select',
		    	operators : ['equal', 'not_equal'],
		    	values : cityList
		    },
		    {
		    	id : 'province',
		    	label : 'Province',
		    	input : 'select',
		    	operators : ['equal', 'not_equal'],
		    	values : provinceList	

		    },
		    {
		    	id : 'district', 
		    	label : 'District',
		    	input : 'select',
		    	operators : ['equal', 'not_equal'],
		    	values : districtList
		    },
		    {
		    	id 	: 'last_reno',
		    	label: 'Last Renovation Date',
		    	type: 'date',
		    	operators : ['greater', 'less', 'equal', 'greater_or_equal', 'less_or_equal']
		    },
		    {
		    	id : 'last_computer_update',
		    	label : 'Last Computer Update Date',
		    	type: 'date',
		    	// input: 'date',
		    	operators : ['greater', 'less', 'equal']

		    },
		    {
		    	id : 'floors',
		    	label : 'Number of Floors',
		    	type : 'integer',
		    	operators : ['equal', 'greater', 'less']

		    }],
		    
		});


		// set rules
		$('#builder').queryBuilder('setRules', {
		    
		    "rules": [
		        {
		            "id": "id",
		            "field": "id",
		            "type": "integer",
		            "input": "text",
		            "operator": "equal",
		            "value": "100"
		        }
		        
		    ]
		});

		

		// reset builder
		$('.reset').on('click', function () {

		    $('#builder').queryBuilder('reset');

		    $(".json-parsed").empty();

		    $(".sql-parsed").empty();

		});

		// get rules & SQL
		$('.parse-sql').on('click', function () {

		    // JSON

		    var resJson = $('#builder').queryBuilder('getRules');

		    $(".json-parsed").html(JSON.stringify(resJson, null, 2));

		    // SQL

		    var resSql = $('#builder').queryBuilder('getSQL', false);

		    $(".sql-parsed").html(resSql.sql);

		});

		// result

		$(document).ready(function(){
		    
		    $( ".parse-sql" ).trigger( "click" );
		    
		});


	</script>
	

	

</body>
</html>
