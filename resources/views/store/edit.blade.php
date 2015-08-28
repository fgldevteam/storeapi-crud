@extends('app')

@section('content')
	<link rel="stylesheet" type="text/css" href="/css/datepicker.css">
	<div class="form-container col-md-10">
		<h2>Edit Store {{$store->store_number}} : {{$store->name}}</h2>
		{!! Form::model($store, array('route' => array('store.update', $store->id), 'method' => 'PUT')) !!}
			<div class="row">
				<h4>Store Information</h4>
			</div>	
			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('storename', 'Store Name:') !!}
					{!! Form::text('storename', $store->name, [ "class" => "form-control" ]) !!}
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-8">
					{!! Form::label('address', 'Address:') !!}
					{!! Form::text('address', $store->address1, [ "class" => "form-control" ]) !!}
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('postalcode', 'Postal Code:') !!}
					{!! Form::text('postalcode', $store->postal_code, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group col-md-4">
					{!! Form::label('city', 'City:') !!}
					{!! Form::text('city', $store->city, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group col-md-4">
					{!! Form::label('province', 'Province:') !!}
					{!! Form::text('province', $store->province, ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-3">
					{!! Form::label('banner', 'Banner:') !!}
					{!! Form::select('banner', $banners, $store->banner_id, [ "class" => "form-control" ]) !!}
				</div>	
				<div class="form-group col-md-3">
					{!! Form::label('classification', 'Classification:') !!}
					{!! Form::select('classification', $classifications, $store->classification_id, [ "class" => "form-control" ]) !!}
				</div>
				<div class="form-group col-md-3">
					{!! Form::label('district', 'District:') !!}
					{!! Form::select('district', $districts, $store->district_id, [ "class" => "form-control" ]) !!}
				</div>
				<div class="form-group col-md-3">
					{!! Form::label('status', 'Status:') !!}
					{!! Form::select('status', $status, $store->status_id, [ "class" => "form-control" ]) !!}
				</div>
			</div>	
			<div class="row">
				<h4>Store Details</h4>
			</div>	
			
			<div class="row">
				<div class="col-md-3">
					{!! Form::label('sqft', 'Store Area (sqft)') !!}
					{!! Form::text('sqft', $store->sqft, ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					{!! Form::label('mall_entrance', 'Mall Entrance:') !!}
					<br>
					{!! Form::radio('mall_entrance', true, null) !!}
					{!! Form::label('mall_entrance', 'Yes:') !!}
					{!! Form::radio('mall_entrance', true, null) !!}
					{!! Form::label('mall_entrance', 'No:') !!}

				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					{!! Form::label('no_of_entrances', 'Number of Entrances:') !!}
					{!! Form::text('no_of_entrances', $store->entrances, ['class' => 'form-control']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('no_of_cashbanks', 'Number of Cashbanks:') !!}
					{!! Form::text('no_of_cashbanks', $store->cashbanks, ['class' => 'form-control']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('no_of_floors', 'Number of Floors:') !!}
					{!! Form::text('no_of_floors', $store->floors, ['class' => 'form-control']) !!}

				</div>
			</div>
			<div class="row">
				
				<div class="col-md-3">
					{!! Form::label('no_of_registers', 'Number of Registers:') !!}
					{!! Form::text('no_of_registers', $store->registers, ['class' => 'form-control']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('no_of_pdts', 'Number of PDTs:') !!}
					{!! Form::text('no_of_pdts', $store->pdts, ['class' => 'form-control']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('no_of_tablets', 'Number of Tablets:') !!}
					{!! Form::text('no_of_tablets', $store->tablets, ['class' => 'form-control']) !!}

				</div>

			</div>
			<div class="row">
				<div class="col-md-3">
					{!! Form::label('last_reno', 'Last Renovation Date:') !!}
					{!! Form::text('last_reno', $store->last_reno, ['class' => 'form-control' , 'id'=>'last_reno']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('last_computer_update', 'Last Computer Update:') !!}
					{!! Form::text('last_computer_update', $store->last_computer_update, ['class' => 'form-control', 'id'=>'last_computer_update']) !!}

				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary">
						Submit
					</button>
				</div>
			</div>
	

		{!!	Form::close() !!}
	</div>
	
@endsection

