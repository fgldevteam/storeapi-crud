@extends('app')

@section('content')
		<div class="row">
			<div class="col-md-2 col-md-offset-10 form-group">
			{!! Form::text('search', null, ['class'=> 'form-control', 'id'=>"search", "placeholder"=>"Quick Search"]) !!}
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-md-2">
				<h4 >Common Reports</h4>
			</div>
		</div> -->
		<div class="row">
			<div class="col-md-2">
				<h4>Build Custom report</h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div id="builder"></div>
				 <form role="form" method="post" id="query-builder-form">
		            <div class="btn-group">
		                <input type="button" class="btn btn-warning reset" value="Reset" />
		                <input type="button" class="btn btn-primary parse-sql" value="Run" />
		            </div>
		            <hr/>


		            <!-- <textarea class="form-control json-parsed" rows="10" id="json-parsed" name="json-parsed" readonly></textarea>
		            <hr/>
		            <textarea class="form-control sql-parsed" rows="10" id="sql-parsed" name="sql-parsed" readonly></textarea> -->
		        </form>
		        
        	</div>
        	<div class="col-md-10 col-md-offset-1">
        		<div class="col-md-2 col-md-offset-10">
        			<form method="get" action="" class="hidden" id="download-report">
        				<button class="form-control" >Download Report</button>
        			</form>
        		</div>
        		
        		<table class="table hidden" id="report-result">
		            <tr>
		            	<th>Store Number</th>
		            	<th>Store Name</th>
		            	<th>Address</th>
		            	<th>City</th>
		            	<th>Province</th>
		            	<th></th>
		            </tr>
		        </table>
		    </div>
		</div>	
		

@endsection	

