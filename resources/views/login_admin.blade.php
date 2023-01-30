@extends('_layouts.loginlayout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('adminlte/login_style2.css') }}">
@endsection

@section('content') <!-- Display this content at mainlayout > content --> 

<div class="pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-6">
                <div class="card overflow-hidden card-outline card-purple">
                    <div class="row">
                        <div class="col-12 align-self-end">
                            <img src="{{ asset('img/background.jpg') }}" alt="" class="img-fluid img-circle p-0">
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-purple">
                            <h4 class="text-center pt-3 pb-3">RIVERVIEW HOTEL <br>RESERVATION SYSTEM</h4>
                        </div>
                        <div class="col-12">
                            <div class="card  card-outline card-purple card-tabs">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="account-content">
                                            <!-- input-group -->
                                            <div class="input-group mb-3">
                                                <input id="login_email" type="login_email" class="form-control @error('login_email') is-invalid @enderror" name="login_email" value="{{ old('login_email') }}" placeholder="Email">
                                                <!-- input-group-append -->
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                                <!-- /.input-group-append -->
                                                <!-- start sent message error input -->
                                                @error('login_email') 
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> *{{ $message }} </strong>
                                                </span>
                                                @enderror
                                                <!-- end sent message error input -->
                                            </div>
                                            <!-- /.input-group -->
                                            <!-- input-group -->
                                            <div class="input-group mb-3">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                                <!-- /.input-group-append -->
                                                <!-- start sent message error input -->
                                                @error('password') 
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> *{{ $message }} </strong>
                                                </span>
                                                @enderror
                                                <!-- end sent message error input -->
                                            </div>
                                            <!-- /.input-group -->
                                            <!-- row -->
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">LOGIN</button>
                                                    <a href="#" class="btn btn-warning btn-block waves-effect waves-light" data-toggle="modal" data-target="#resetModal" data-dismiss="modal" aria-label="Close">Forgot Password?</a>
                                                </div>
                                                
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" action="{{ route('password.email') }}" class="contact-form">
                            @csrf
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Reset Password</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-form">
                                    <input type="email" class="form-control" placeholder="Registered Email" name="reset_email" required autofocus >
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-secondary btn-md btn-block">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="mt-2 text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Riverview Hotel Sdn Bhd | Powered By SpaceX</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection