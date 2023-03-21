
@section('content')
<div class="card card-purple">
	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-bars mr-1"></i>
			Add User
		</h3>
	</div>
	<!-- /.card-header -->
	<form method="POST" action="{{ route('users.store') }}">
		{{ $isEdit ? method_field('PUT') : '' }}
		@csrf
		<div class="card-body row">
			<div class="form-group col-md-6">
				<label for="input-full_name">Full Name</label>
				<input type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Full Name" id="input-full_name" name="full_name"  required autofocus>
				<!-- sent message error input -->
				@error('full_name') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-email">Email</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="input-email" name="email"  required>
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
				<input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Contact No" id="input-phone" name="phone" value="{{ old('phone', $user->info->phone) }}" required>
				@error('phone') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-date_joined">Date Joined</label>
				<input type="date" class="form-control @error('date_joined') is-invalid @enderror" placeholder="Date Joined" id="input-date_joined" name="date_joined" value="{{ old('date_joined', $user->date_joined->format('d/M/Y') ) }}" required autofocus>
				<!-- sent message error input -->
				@error('date_joined') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-designation">Designation</label>
				<input type="text" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation" id="input-designation" name="designation" value="{{ old('designation', $user->designation) }}" required autofocus>
				<!-- sent message error input -->
				@error('designation') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-salary">Salary (RM)</label>
				<input type="number" class="form-control @error('salary') is-invalid @enderror" placeholder="Salary" id="input-salary" name="salary" value="{{ old('salary', $user->salary) }}" required autofocus>
				<!-- sent message error input -->
				@error('salary') 
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
