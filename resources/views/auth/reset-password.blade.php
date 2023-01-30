@extends('_layouts.masterlayout_homepage') 

@section('content') 
    <main>
        <div class="container pb-50 pt-50 overflow-h">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if(session('status'))
                            <div class="alert alert-success alert-block" role="alert">
                                <i class="icon fas fa-check"></i> 
                                <strong>{{ session('status') }}</strong>  
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">Reset Password</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email', $request->email) }}" required>
                                            @error('email') 
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> *{{ $message }} </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                                            @error('password') 
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> *{{ $message }} </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                            @error('password_confirmation') 
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> *{{ $message }} </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end center mt-4">
                                        <button type="submit" class="btn header-btn btn-danger">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection