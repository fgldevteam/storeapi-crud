@extends('app')

@section('content')
	<link rel="stylesheet" type="text/css" href="/css/datepicker.css">
	<div class="form-container col-md-10">
		<h2>Add Store</h2>
		{!! Form::open(['route' => 'store.store']) !!}
			<div class="row">
				<h4>Store Information</h4>
			</div>	
			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('storename', 'Store Name:') !!}
					{!! Form::text('storename', null, [ "class" => "form-control" ]) !!}
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('storenumber', 'Store Number:') !!}
					{!! Form::text('storenumber', null, [ "class" => "form-control" ]) !!}
				</div>
			</div>	
			<div class="row">
				<div class="form-group col-md-8">
					{!! Form::label('address', 'Address:') !!}
					{!! Form::text('address', null, [ "class" => "form-control" ]) !!}
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('postalcode', 'Postal Code:') !!}
					{!! Form::text('postalcode', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group col-md-4">
					{!! Form::label('city', 'City:') !!}
					{!! Form::text('city', null, ['class'=>'form-control']) !!}
				</div>
				<div class="form-group col-md-4">
					{!! Form::label('province', 'Province:') !!}
					{!! Form::text('province', null, ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-3">
					{!! Form::label('banner', 'Banner:') !!}
					{!! Form::select('banner', $banners, null, [ "class" => "form-control" ]) !!}
				</div>	
				<div class="form-group col-md-3">
					{!! Form::label('classification', 'Classification:') !!}
					{!! Form::select('classification', $classifications, null, [ "class" => "form-control" ]) !!}
				</div>
				<div class="form-group col-md-3">
					{!! Form::label('district', 'District:') !!}
					{!! Form::select('district', $districts, null, [ "class" => "form-control" ]) !!}
				</div>
				<div class="form-group col-md-3">
					{!! Form::label('status', 'Status:') !!}
					{!! Form::select('status', $status, null, [ "class" => "form-control" ]) !!}
				</div>
			</div>	
			<div class="row">
				<h4>Store Details</h4>
			</div>	
			
			<div class="row">
				<div class="col-md-3">
					{!! Form::label('sqft', 'Store Area (sqft)') !!}
					{!! Form::text('sqft', null, ['class' => 'form-control']) !!}
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
					{!! Form::text('no_of_entrances', null, ['class' => 'form-control']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('no_of_cashbanks', 'Number of Cashbanks:') !!}
					{!! Form::text('no_of_cashbanks', null, ['class' => 'form-control']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('no_of_floors', 'Number of Floors:') !!}
					{!! Form::text('no_of_floors', null, ['class' => 'form-control']) !!}

				</div>
			</div>
			<div class="row">
				
				<div class="col-md-3">
					{!! Form::label('no_of_registers', 'Number of Registers:') !!}
					{!! Form::text('no_of_registers', null, ['class' => 'form-control']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('no_of_pdts', 'Number of PDTs:') !!}
					{!! Form::text('no_of_pdts', null, ['class' => 'form-control']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('no_of_tablets', 'Number of Tablets:') !!}
					{!! Form::text('no_of_tablets', null, ['class' => 'form-control']) !!}

				</div>

			</div>
			<div class="row">
				<div class="col-md-3">
					{!! Form::label('last_reno', 'Last Renovation Date:') !!}
					{!! Form::text('last_reno', null, ['class' => 'form-control' , 'id'=>'last_reno']) !!}

				</div>
				<div class="col-md-3">
					{!! Form::label('last_computer_update', 'Last Computer Update:') !!}
					{!! Form::text('last_computer_update', null, ['class' => 'form-control', 'id'=>'last_computer_update']) !!}

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

