
@section('content')
<div class="card card-purple">
	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-bars mr-1"></i>
			{{ $isEdit ? 'Edit Booking' : 'Add Booking' }}
		</h3>
	</div>
	<!-- /.card-header -->
	<form method="POST" action="{{ $isEdit ? route('bookings.update', $booking->id) : route('bookings.store') }}">
		{{ $isEdit ? method_field('PUT') : '' }}
		@csrf
		<div class="card-body row">
			{{-- <div class="form-group col-md-6">
				<label for="input-vehicle">Vehicle</label>
				<input type="text" class="form-control @error('vehicle') is-invalid @enderror" placeholder="Vehicle" id="input-vehicle" name="vehicle" value="{{ old('vehicle', $booking->vehicle_id) }}" required autofocus>
				<!-- sent message error input -->
				@error('vehicle') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div> --}}
			<div class="form-group col-md-6">
				<label for="input-vehicle">Vehicle</label>
				<select class="form-control @error('vehicle') is-invalid @enderror" placeholder="Select Vehicle" id="input-vehicle" name="vehicle_id" required>
				<option selected disabled value=""> Select Vehicle </option>
				@foreach ($vehicles as $key => $vehicle)
					<option value="{{ $vehicle->vehicle_id }}">{{ $vehicle->vehicle_type }} - {{ $vehicle->vehicle_registration }}</option>
				@endforeach
				</select>
				<!-- sent message error input -->
				@error('booking_status') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-user_id">Customer</label>
				<select class="form-control @error('user_id') is-invalid @enderror" placeholder="Select Customer" id="input-user_id" name="user_id" required>
				<option selected disabled value=""> Select Customer </option>
				@foreach ($users as $key => $user)
					<option value="{{ $user->id }}">{{ $user->full_name }}</option>
				@endforeach
				</select>
				<!-- sent message error input -->
				@error('user') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-booking_start_date">Start Booking Date</label>
				<input type="datetime-local" class="form-control @error('booking_start_date') is-invalid @enderror" placeholder="Start Date" id="input-booking_start_date" name="booking_start_date" value="" required autofocus>
				<!-- sent message error input -->
				@error('booking_start_date') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-booking_end_date">End Booking Date</label>
				<input type="datetime-local" class="form-control @error('booking_end_date') is-invalid @enderror" placeholder="End Date" id="input-booking_end_date" name="booking_end_date" value="" required autofocus>
				<!-- sent message error input -->
				@error('booking_end_date') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			{{-- <div class="form-group col-md-6">
				<label for="input-booking_type">Booking Type</label>
				<select class="form-control @error('booking_type') is-invalid @enderror" placeholder="Select Booking Type" id="input-booking_type" name="booking_type" required>
				<option selected disabled value=""> Select Booking Status</option>
				@foreach ($booking_type as $key => $type)
					<option value="{{ $type->id }}"
					@if ($type == old('booking_type', $booking->bookingTypes))
						selected="selected"
					@endif
					>{{ $type->type_name }}</option>
				@endforeach
				</select>
				<!-- sent message error input -->
				@error('booking_type') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div> --}}
		</div>
		<div class="card-footer text-center">
			<button type="submit" class="btn bg-gradient-primary">
				Create Booking
			</button>
		</div>
	</form>
</div>
@endsection
