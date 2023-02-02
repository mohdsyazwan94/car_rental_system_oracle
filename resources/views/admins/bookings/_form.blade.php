
@section('content')
<div class="card card-purple">
	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-bars mr-1"></i>
			{{ $isEdit ? 'Edit Room' : 'Add Room' }}
		</h3>
	</div>
	<!-- /.card-header -->
	<form method="POST" action="{{ $isEdit ? route('rooms.update', $room->id) : route('rooms.store') }}">
		{{ $isEdit ? method_field('PUT') : '' }}
		@csrf
		<div class="card-body row">
			<div class="form-group col-md-6">
				<label for="input-room_number">Room Number</label>
				<input type="text" class="form-control @error('room_number') is-invalid @enderror" placeholder="Room Number" id="input-room_number" name="room_number" value="{{ old('room_number', $room->room_number) }}" required autofocus>
				<!-- sent message error input -->
				@error('room_number') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-room_status">Room Status</label>
				<select class="form-control @error('room_status') is-invalid @enderror" placeholder="Select Room Status" id="input-room_status" name="room_status" required>
				<option selected disabled value=""> Select Room Status </option>
				@foreach ($room_status as $key => $status)
					<option value="{{ $status->id }}"
					@if ($status == old('room_status', $room->roomStatus))
						selected="selected"
					@endif
					>{{ $status->name }}</option>
				@endforeach
				</select>
				<!-- sent message error input -->
				@error('room_status') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-room_type">Room Type</label>
				<select class="form-control @error('room_type') is-invalid @enderror" placeholder="Select Room Type" id="input-room_type" name="room_type" required>
				<option selected disabled value=""> Select Room Status</option>
				@foreach ($room_type as $key => $type)
					<option value="{{ $type->id }}"
					@if ($type == old('room_type', $room->roomTypes))
						selected="selected"
					@endif
					>{{ $type->type_name }}</option>
				@endforeach
				</select>
				<!-- sent message error input -->
				@error('room_type') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
		</div>
		<div class="card-footer text-center">
			<button type="submit" class="btn bg-gradient-primary">
				Submit
			</button>
		</div>
	</form>
</div>
@endsection
