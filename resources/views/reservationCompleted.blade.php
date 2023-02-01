@extends('_layouts.masterlayout_homepage') 

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
        crossorigin="anonymous"/>
@endsection

@section('content') <!-- Display this content at mainlayout > content --> 
    <main>

        <!--? our info Start -->
        <h3 class="pt-40 pb-40" style="text-align:center;"><strong>Your booking has been completed! #Booking ID : {{ $reservation->id }}</strong></h3>
        
    
        <!--? our info Start -->
        <div class="our-info-area pt-40 pb-40 pr-40 pl-40">
            <div class="card d-flex align-items-center">
                <!-- Main content -->
    <div class="col-12 invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              <i class="fas fa-globe"></i> Perak Car Rental
              <small class="float-right">Date: {{ $today_date }}</small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <!-- /.col -->
          <div class="col-md-12 invoice-col">
            <b>Invoice #{{ $payment->id }}</b><br>
            <br>
            <b>Reservation ID:</b> #{{ $reservation->id }}<br>
            <b>Payment Date:</b> {{ $payment->payment_date->format('d/m/Y') }}<br>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Room Number</th>
                <th>Room Name</th>
                <th>Nett price per night</th>
                <th>Subtotal</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
              <td>{{ $reservation->roomDetails->room_number }}</td>
              <td>{{ $reservation->roomDetails->roomTypes->type_name }}</td>
              <td>RM {{ number_format($reservation->roomDetails->roomTypes->rate, 2) }}</td>
              <td>RM {{ number_format($reservation->roomDetails->roomTypes->rate*$number_of_night, 2) }}</td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
            <p class="lead">Payment Methods: {{ $payment->payment_type }}</p>
            <p>Customer Name: {{ $user->name }}</p>
            <p>Customer Email: {{ $user->email }}</p>
            <p>Customer Phone: {{ $user->phone }}</p>
            
          </div>
          <!-- /.col -->
          <div class="col-6">

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Total:</th>
                  <td><strong>RM {{ number_format($reservation->roomDetails->roomTypes->rate*$number_of_night, 2) }}</strong></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-12">
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
              <i class="fas fa-download"></i> Download PDF
            </button>
          </div>
        </div>
      </div>
      <!-- /.invoice -->
            </div>
        </div>


        
        
        {{-- <!-- our info End -->
        <div class="card" style="background-color:#DAE5D0; padding-top:20px; padding-bottom:20px;">
        </div> --}}
        
    </main>

    @push('page_scripts')
    
        <script type="text/javascript">
            var nowDate = new Date();
            var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
            var tomorrow = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate() + 1, 0, 0, 0, 0);
            $('#date_range').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                },
                autoApply: true,
                startDate: today,
                endDate: tomorrow,
                minDate: today,
            });
        </script>
    @endpush
@endsection