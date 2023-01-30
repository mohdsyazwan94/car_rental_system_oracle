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
  

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 mt-4 ml-4">
        <div class="col-sm-6">
          <h1>Confirm Reservation</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

      <div class="card">
        <div class="card-body row">
          <div class="col-6">
            <div class="card d-flex align-items-center">
              <!-- Main content -->
  <div class="col-12 invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
             Booking Summary
            <small class="float-right">Date: {{ $today_date }}</small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-md-12 invoice-col">
          <i class="fas fa-globe"></i><b> Riverview Hotel Sdn Bhd</b><br>
          <br>
          <b>Check-in date:</b> {{ $start_date }}<br>
          <b>Check-out date:</b> {{ $end_date }}<br>
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
              <td>{{ $room->room_number }}</td>
              <td>{{ $room->roomTypes->type_name }}</td>
              <td>RM {{ number_format($room->roomTypes->rate, 2) }}</td>
              <td>RM {{ number_format($room->roomTypes->rate*$number_of_night, 2) }}</td>
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
          <p class="lead">Reservation for {{ $number_of_night }} Nights</p>
          
        </div>
        <!-- /.col -->
        <div class="col-6">

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total:</th>
                <td><strong>RM {{ number_format($room->roomTypes->rate*$number_of_night, 2) }}</strong></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div>
    <!-- /.invoice -->
          </div>
          </div>
          <div class="col-6">
            <form method="POST" action="{{ route('createReservation') }}">
              @csrf
            <h4>Customer details</h4>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required/>
            </div>
            <div class="form-group">
              <label for="inputEmail">E-Mail</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required/>
            </div>
            <div class="form-group">
              <label for="inputSubject">Phone</label>
              <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required/>
            </div>
            <div class="form-group">
              <label for="inputSubject">Payment method</label>
              <select id="payment_method" name="payment_method" class="form-control" required>
                <option value="" disabled selected>Select payment method</option>
                <option value="Online Banking">Online Banking</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Credit Card">Credit Card</option>
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" name="room_id" value="{{ $room->id }}">
              <input type="hidden" name="start_date" value="{{ $start_date }}">
              <input type="hidden" name="end_date" value="{{ $end_date }}">
              <input type="hidden" name="amount" value="{{ $room->roomTypes->rate*$number_of_night }}">
              <input type="hidden" name="number_of_night" value="{{ $number_of_night }}">
              <input type="submit" class="btn btn-primary btn-lg float-right" value="Confirm booking">
            </div>
          </form>
          </div>
        </div>
      </div>
    @push('page_scripts')
    
        <script type="text/javascript">
            
        </script>
    @endpush
@endsection