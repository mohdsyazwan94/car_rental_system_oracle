@extends('_includes.app')

@section('button')
<a href="{{ route('vehicles.index') }}" class="btn btn-secondary mb-3"><span class="fas fa-arrow-left"></span> Back to List</a>
@endsection 

@include('admins.vehicles._form', ['isEdit'=>true])