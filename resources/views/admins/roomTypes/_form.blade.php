
@section('content')
<div class="card card-purple">
	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title">
			<i class="fas fa-bars mr-1"></i>
			{{ $isEdit ? 'Edit Room Type' : 'Add Room Type' }}
		</h3>
	</div>
	<!-- /.card-header -->
	<form method="POST" action="{{ $isEdit ? route('roomTypes.update', $roomType->id) : route('roomTypes.store') }}" enctype="multipart/form-data">
		{{ $isEdit ? method_field('PUT') : '' }}
		@csrf
		<div class="card-body row">
			<div class="col-md-2">
				@if($roomType->image != null)         
					<img src="{{ asset('storage/rooms/'.$roomType->image) }}" alt="Photo" class="img-fluid border border-dark rounded" width="220px;">         
				@else
				<img src="{{ asset('img/no_image.png') }}" alt="Photo 3" class="img-fluid border border-dark rounded" width="220px;">   
				@endif
					
			</div>
			<div class="form-group col-md-5">
				<div class="form-group">
					<label for="input-room_number">Room Type Name</label>
					<input type="text" class="form-control @error('type_name') is-invalid @enderror" placeholder="Room Type Name" id="input-room_number" name="type_name" value="{{ old('type_name', $roomType->type_name) }}" required>
					<!-- sent message error input -->
					@error('type_name') 
					<span class="invalid-feedback" role="alert">
						<strong> *{{ $message }} </strong>
					</span>
					@enderror
					<!-- end sent message error input -->
				</div>
				<div class="form-group">
					<label for="input-room_number">Rate</label>
					<input type="number" class="form-control @error('rate') is-invalid @enderror" placeholder="Room Rate" id="input-room_number" name="rate" value="{{ old('rate', $roomType->rate) }}" required>
					<!-- sent message error input -->
					@error('rate') 
					<span class="invalid-feedback" role="alert">
						<strong> *{{ $message }} </strong>
					</span>
					@enderror
					<!-- end sent message error input -->
				</div>
			</div>
			<div class="form-group col-md-5 row">
				<div class="form-group col-md-12">
					<label for="input-room_number">Description</label>
					<textarea class="form-control @error('description') is-invalid @enderror" placeholder="Room Type Description" id="input-room_number" name="description" required>
						{{ old('description', $roomType->description) }}
					</textarea>
					<!-- sent message error input -->
					@error('description') 
					<span class="invalid-feedback" role="alert">
						<strong> *{{ $message }} </strong>
					</span>
					@enderror
					<!-- end sent message error input -->
				</div>
				<div class="form-group col-md-12">
					<label for="exampleLabelInputFile">Room Image</label>
					<div class="input-group">
					  <div class="custom-file">
						<input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile" name="image" accept="image/png, image/jpeg">
						<label class="custom-file-label text-truncate" for="exampleInputFile">{{ ($roomType->image == null) ? 'Choose Image' : $roomType->image}}</label>
						<!-- sent message error input -->
						@error('image') 
						<span class="invalid-feedback" role="alert">
							<strong> *{{ $message }} </strong>
						</span>
						@enderror
						<!-- end sent message error input -->
					  </div>
					</div>
				  </div>	
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

@section('scripts')
<script type="text/javascript">
$(function () {
    $('input[type="file"]').change(function(e){
		$fileName = e.target.files[0].name;
		$("label[for='" + $(this).attr('id') + "']").text($fileName);
	});
});
</script>
@endsection