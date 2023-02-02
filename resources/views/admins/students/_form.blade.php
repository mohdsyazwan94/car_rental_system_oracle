
@section('content')
<div class="card card-purple">
	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-bars mr-1"></i>
			{{ $isEdit ? 'Edit student' : 'Add student' }}
		</h3>
	</div>
	<!-- /.card-header -->
	<form method="POST" action="{{ $isEdit ? route('students.update', $student->id) : route('students.store') }}">
		{{ $isEdit ? method_field('PUT') : '' }}
		@csrf
		<div class="card-body row">
			<div class="form-group col-md-6">
				<label for="input-name">Full Name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="input-name" name="name" value="{{ old('name', $student->info->full_name) }}" required autofocus>
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
				<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="input-email" name="email" value="{{ old('email', $student->info->email) }}" required>
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
				<input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Contact No" id="input-phone" name="phone" value="{{ old('phone', $student->info->phone) }}" required>
				@error('phone') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-phone">Student No.</label>
				<input type="text" class="form-control @error('student_no') is-invalid @enderror" placeholder="Student No" id="input-student_no" name="student_no" value="{{ old('student_no', $student->student_no) }}" required>
				@error('student_no') 
				<span class="invalid-feedback" role="alert">
					<strong> *{{ $message }} </strong>
				</span>
				@enderror
				<!-- end sent message error input -->
			</div>
			<div class="form-group col-md-6">
				<label for="input-phone">Course Name</label>
				<input type="text" class="form-control @error('course_name') is-invalid @enderror" placeholder="Course Name" id="input-course_name" name="course_name" value="{{ old('course_name', $student->course_name) }}" required>
				@error('course_name') 
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
