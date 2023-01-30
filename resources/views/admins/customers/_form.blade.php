
@section('content')
<div class="card card-purple">
	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-bars mr-1"></i>
			{{ $isEdit ? 'Edit Customer' : 'Add Customer' }}
		</h3>
	</div>
	<!-- /.card-header -->
	<form method="POST" action="{{ $isEdit ? route('customers.update', $customer->id) : route('customers.store') }}">
		{{ $isEdit ? method_field('PUT') : '' }}
		@csrf
		<div class="card-body row">
			<div class="form-group col-md-6">
				<label for="input-name">Name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="input-name" name="name" value="{{ old('name', $customer->name) }}" required autofocus>
				<!-- sent message error input -->
				@error('name') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-email">Email</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="input-email" name="email" value="{{ old('email', $customer->email) }}" required>
				<!-- sent message error input -->
				@error('email') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-phone">Contact No.</label>
				<input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Contact No" id="input-phone" name="phone" value="{{ old('phone', $customer->phone) }}" required>
				@error('phone') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-gender">Gender</label>
				<select class="form-control @error('gender') is-invalid @enderror" placeholder="Select gender" id="input-gender" name="gender" required>
					<option value="">Please select gender</option>
				  	<option value="female" {{ old('gender', $customer->gender) == "female" ? 'selected' : '' }}>Female</option>
				  	<option value="male" {{ old('gender', $customer->gender) == "male" ? 'selected' : '' }}>Male</option>
				</select>
				@error('gender') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-12">
				<label for="input-address-1">Address Line 1</label>
				<input type="text" class="form-control @error('address_1') is-invalid @enderror" placeholder="Address Line 1" id="input-address-1" name="address_1" value="{{ old('address_1', $customer->address_1) }}">
				<!-- sent message error input -->
				@error('address_1') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-12">
				<label for="input-address-2">Address Line 2</label>
				<input type="text" class="form-control @error('address_2') is-invalid @enderror" placeholder="Address Line 2" id="input-address-2" name="address_2" value="{{ old('address_2', $customer->address_2) }}">
				<!-- sent message error input -->
				@error('address_2') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-password">Password</label>
				<input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password {{ $isEdit ? '(Leave blank if no changes)' : '' }}" id="input-password" name="password" {{ $isEdit ? '' : 'required' }}>
				<!-- sent message error input -->
				@error('password') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-confirm">Confirm Password</label>
				<input type="password" class="form-control" placeholder="Confirm Password {{ $isEdit ? '(Leave blank if no changes)' : '' }}" id="input-confirm" name="password_confirmation" {{ $isEdit ? '' : 'required' }}>
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
