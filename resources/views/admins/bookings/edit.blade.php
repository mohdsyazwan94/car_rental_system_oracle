@extends('_includes.app')

@section('button')
<a href="{{ route('rooms.index') }}" class="btn btn-secondary mb-3"><span class="fas fa-arrow-left"></span> Back to List</a>
@endsection 

@include('admins.rooms._form', ['isEdit'=>true])