@extends('app')
@section('content')
<div class="row">
	<div class="col-md-2 col-md-offset-8 form-group">
		{!! Form::select('search', $searchList, null , ['class'=> 'form-control']) !!}
	</div>
	<div class="col-md-2 ">
		{!! Form::label("") !!}
		<a href="/store/create" class="btn btn-success">Add new store</a>
	</div>
</div>
<table class="table table-hover">
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
			<td> {{ $districts[$store->district_id] }} </td>
			<td> {{$store->city}} </td>
			<td> <a href="/store/{{$store->id}}" class="btn btn-info">View</a> </td>
			<td> <a href="/store/{{$store->id}}/edit" class="btn btn-warning">Edit</a> </td>
			
	</tr>
@endforeach
</table>
@endsection