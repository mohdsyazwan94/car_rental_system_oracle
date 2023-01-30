
@section('content')
<div class="card card-purple">
	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-bars mr-1"></i>
			{{ $isEdit ? 'Edit User' : 'Add User' }}
		</h3>
	</div>
	<!-- /.card-header -->
	<form method="POST" action="{{ $isEdit ? route('users.update', $user->id) : route('users.store') }}">
		{{ $isEdit ? method_field('PUT') : '' }}
		@csrf
		<div class="card-body row">
			<div class="form-group col-md-6">
				<label for="input-name">Name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="input-name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
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
				<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="input-email" name="email" value="{{ old('email', $user->email) }}" required>
				<!-- sent message error input -->
				@error('email') 
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
			<div class="form-group col-md-6">
				<label for="input-phone">Contact No.</label>
				<input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Contact No" id="input-phone" name="phone" value="{{ old('phone', $user->phone) }}" required>
				@error('phone') 
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
