
@section('content')
<div class="card card-purple">
	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-bars mr-1"></i>
			{{ $isEdit ? 'Edit Vehicle' : 'Add Vehicle' }}
		</h3>
	</div>
	<!-- /.card-header -->
	<form method="POST" action="{{ $isEdit ? route('vehicles.update', $vehicle->vehicle_id) : route('vehicles.store') }}">
		{{ $isEdit ? method_field('PUT') : '' }}
		@csrf
		<div class="card-body row">
			<div class="form-group col-md-6">
				<label for="input-vehicle_type">Vehicle Model / Type</label>
				<input type="text" class="form-control @error('vehicle_type') is-invalid @enderror" placeholder="Vehicle Model / Type" id="input-vehicle_type" name="vehicle_type" value="{{ old('vehicle_type', $vehicle->vehicle_type) }}" required autofocus>
				<!-- sent message error input -->
				@error('vehicle_type') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-vehicle_color">Vehicle Color</label>
				<input type="text" class="form-control @error('vehicle_color') is-invalid @enderror" placeholder="Vehicle Color" id="input-vehicle_color" name="vehicle_color" value="{{ old('vehicle_color', $vehicle->vehicle_color) }}" required autofocus>
				<!-- sent message error input -->
				@error('vehicle_color') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-vehicle_registration">Vehicle Registration No</label>
				<input type="text" class="form-control @error('vehicle_registration') is-invalid @enderror" placeholder="Vehicle Registration No" id="input-vehicle_registration" name="vehicle_registration" value="{{ old('vehicle_registration', $vehicle->vehicle_registration) }}" required autofocus>
				<!-- sent message error input -->
				@error('vehicle_registration') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-vehicle_type">Vehicle Rate (Hour)</label>
				<input type="number" class="form-control @error('vehicle_rate') is-invalid @enderror" placeholder="Vehicle Rate" id="input-vehicle_rate" name="vehicle_rate" value="{{ old('vehicle_rate', $vehicle->vehicle_rate) }}" required autofocus>
				<!-- sent message error input -->
				@error('vehicle_rate') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			{{-- <div class="form-group col-md-6">
				<label for="input-vehicle_status">Vehicle Status</label>
				<select class="form-control @error('vehicle_status') is-invalid @enderror" placeholder="Select Vehicle Status" id="input-vehicle_status" name="vehicle_status" required>
				<option selected disabled value=""> Select Vehicle Status </option>
				@foreach ($vehicle_status as $key => $status)
					<option value="{{ $status->id }}"
					@if ($status == old('vehicle_status', $vehicle->vehiclestatus))
						selected="selected"
					@endif
					>{{ $status->name }}</option>
				@endforeach
				</select>
				<!-- sent message error input -->
				@error('vehicle_status') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div> --}}
			{{-- <div class="form-group col-md-6">
				<label for="input-vehicle_color">Vehicle Color</label>
				<select class="form-control @error('vehicle_color') is-invalid @enderror" placeholder="Select Vehicle Color" id="input-vehicle_color" name="vehicle_color" required>
				<option selected disabled value=""> Select Vehicle Status</option>
				@foreach ($vehicle_type as $key => $type)
					<option value="{{ $type->id }}"
					@if ($type == old('vehicle_type', $vehicle->vehicleTypes))
						selected="selected"
					@endif
					>{{ $type->type_name }}</option>
				@endforeach
				</select>
				<!-- sent message error input -->
				@error('vehicle_type') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div> --}}
		</div>
		<div class="card-footer text-center">
			<button type="submit" class="btn bg-gradient-primary">
				Submit
			</button>
		</div>
	</form>
</div>
@endsection
