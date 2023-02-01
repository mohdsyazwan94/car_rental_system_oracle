<!DOCTYPE html>
<html lang= "en" >
  <!-- begin::Head -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Perak Car Rental</title>
    <meta name="description" content="Perak Car Rental">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    
    @yield('css')
  </head>
  <!-- end::Head -->
  
  <body class="hold-transition login-page" style="background: #eff2f7;">
      <!-- begin::Content -->
      @yield('content')
      <!-- end::Content -->

      <!-- JS here -->
      <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
      <!-- Jquery, Popper, Bootstrap -->
      <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
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
  </body>
</html>
