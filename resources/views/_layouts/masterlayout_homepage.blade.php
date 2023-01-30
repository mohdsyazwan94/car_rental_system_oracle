<!DOCTYPE html>
<html lang= "en" >
    <!-- begin::Head -->
    <head>
        @yield('css')
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Riverview Hotel</title>
        <meta name="description" content="Riverview Hotel Sdn Bhd">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
        <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    </head>
    <!-- end::Head -->
    
    <body>
      <!-- Site wrapper -->
      <div class="wrapper">
        <header>
            <!-- Header Start -->
            <div class="header-area p">
                <div class="main-header">
                    <div class="header-bottom header-sticky" style="background-color:#DAE5D0;">
                            <div class="row align-items-center m-0">
                                <!-- Logo -->
                                <div class="col-md-2 col-3">
                                    <div class="logo pl-md-3">
                                        <a href="{{ route('index') }}"><img src="{{ asset('img/logo/logo3-sm.png') }}" alt="" height="50px"></a>
                                    </div>
                                </div>
                                <div class="col-md-10 col-9">
                                    <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                        <!-- Main-menu -->
                                        <div class="main-menu d-none d-lg-block">
                                            <nav> 
                                                <ul id="navigation">                                                                                          
                                                    <li><a href="{{ route('index') }}" style="color:#000000;">Home</a></li>
                                                    <li><a href="{{ route('index') }}#about" style="color:#000000;">About Us</a></li>
                                                    <li><a href="{{ route('index') }}#contact" style="color:#000000;">Contact</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <!-- Header-btn -->
                                        <div class="header-right-btn d-lg-block ml-20 btn-group mr-lg-2 mr-5">
                                          <a href="{{ route('index') }}#reservation" class="btn header-btn btn-danger">Reservation</a>
                                        </div>
                                    </div>
                                </div> 
                                <!-- Mobile Menu -->
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-lg-none"></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
        </header>
          <!-- begin::Content -->
              @yield('content')
          <!-- end::Content -->

          <!-- Scroll Up -->
          <div id="back-top" >
              <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form method="POST" action="{{ route('login') }}" class="contact-form">
                      @csrf
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="input-form">
                    <input type="text" placeholder="Registered Email" name="login_email" required autofocus >
                  </div>
                  <div class="input-form">
                    <input type="password" placeholder="Password" name="password" required autocomplete="current-password">
                  </div>
                  <div class="text-center mt-2">
                      <button type="submit" class="btn btn-secondary btn-lg btn-block">Login</button>
                  </div>
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-between">
                  <div>
                    <a href="#" class="text-primary" data-toggle="modal" data-target="#resetModal" data-dismiss="modal" aria-label="Close">Forgot Password?</a>
                  </div>
                </div>
              </form>
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
                              <input type="email" placeholder="Registered Email" name="reset_email" required autofocus >
                          </div>
                          <div class="text-center mt-2">
                              <button type="submit" class="btn btn-secondary btn-lg btn-block">Reset</button>
                          </div>
                      </div>
                  </form>
              </div>
            </div>
          </div>
      </div>
      <!-- ./wrapper -->

      <!-- begin::Foot | script -->
      <footer>
          <!--? Footer Start-->
          <div class="footer-area footer-bg" style="background-color:#DAE5D0;">
              <div class="container">
                  <!-- Footer Bottom -->
                  <div class="footer-bottom">
                      <div class="row d-flex align-items-center">
                          <div class="col-lg-12">
                              <div class="footer-copy-right text-center">
                                  <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Riverview Hotel Sdn Bhd | Powered By SpaceX</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </footer>
      <!-- end::Foot | script -->

      <!-- begin::Foot | script -->
      <!-- JS here -->
      <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <!--script src="js/popper.min.js"></script-->
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- Jquery Mobile Menu -->
      <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
      <script src="{{ asset('js/jquery.sticky.js') }}"></script>
      <!-- Jquery Plugins, main Jquery -->  
      <script src="{{ asset('js/plugins.js') }}"></script>
      <script src="{{ asset('js/sweetalert.min.js') }} "></script>
      <!-- end::Foot | script -->
      <script src="{{ asset('js/gijgo/gijgo.min.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
      

      <script>
          (function ($)
           { 
              @if(session('status'))
                  swal({
                    icon: 'error',
                    title: 'Unsuccessful.',
                    text: '{{ session('status') }}'
                  })
              @endif

              @if(session('status_success'))
                  swal({
                    icon: 'success',
                    title: 'Successfully.',
                    text: '{{ session('status_success') }}'
                  })
              @endif

              @error('login_email')
                  swal({
                    icon: 'error',
                    title: 'Unsuccessful.',
                    text: '{{ $message }}'
                  })
              @enderror   

			$('form').submit(function(){
				$(this).unbind('submit');
				$(this).submit(function(){
					return false;
				});
			});			  
          })(jQuery);

      </script>

      <!-- begin:: Certain script -->
          @yield('script')
      <!-- end:: Certain script -->
      @stack('third_party_scripts')

@stack('page_scripts')
    </body>
</html>
