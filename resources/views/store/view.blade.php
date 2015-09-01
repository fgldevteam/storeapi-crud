@extends('app')
@section('content')
	
	<div class="col-md-2 col-md-offset-10">
		{!! Form::open(array('route' => array('store.destroy', $store["id"]), 'method' => 'delete')) !!}
        	<button type="submit" class="btn btn-danger btn-mini" id="delete">Delete</button>
    	{!! Form::close() !!}
	</div>
	<table class="table">	
		@foreach ($store as $key=>$value)
		<tr>
			
		</tr>
		<tr>
			<td> <b>{{$key}} </b></td>
			<td>{{$value}}</td>
		</tr>
		@endforeach
	</table>
@endsection