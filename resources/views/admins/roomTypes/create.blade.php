@extends('_includes.app')

@section('button')
<a href="{{ route('roomTypes.index') }}" class="btn btn-secondary mb-3"><span class="fas fa-arrow-left"></span> Back to List</a>
@endsection 

@section('content')
    @include('admins.roomTypes._form', ['isEdit'=>false])
@endsection