@extends('app')
@section('content')

<div class="row">
	<div class="col-md-2 col-md-offset-8 form-group">
		{!! Form::text('search', null, ['class'=> 'form-control', 'id'=>"search", "placeholder"=>"Quick Search"]) !!}
	</div>
	<div class="col-md-2 ">
		{!! Form::label("") !!}
		<a href="/store/create" class="btn btn-success">Add new store</a>
	</div>
</div>
<table class="table table-hover table-bordered">
<tr>
	<th>Store Number</th>
	<th>Store Name</th>
	<th>Province</th>
	<th>District</th>
	<th>City</th>
	<th></th>
	<th></th>
</tr>
@foreach ($stores as $store)
	<tr>
			<td> {{$store->id}} </td>
			<td> {{$store->name}} </td>
			<td> {{$store->province}} </td>
			<td> {{$districts[$store->district_id]}} </td>
			<td> {{$store->city}} </td>
			<td> <a href="/store/{{$store->id}}" class="btn ">View</a> </td>
			<td> <a href="/store/{{$store->id}}/edit" class="btn ">Edit</a> </td>
			
	</tr>
@endforeach
</table>

	
@endsection