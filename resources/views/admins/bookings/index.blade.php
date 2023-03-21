@extends('_includes.app')

@section('styles') <!-- Display this css at mainlayout > css --> 
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
    <!-- card -->
    <div class="card card-outline card-purple">
        <!-- card-header -->
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-bars mr-1"></i>
                Booking List
            </h3>
            <!-- card-tools -->
            <div class="card-tools">
                <a href="{{ route('bookings.create') }}" class="btn bg-gradient-success btn-sm">  <!-- untuk pergi ke Viewan tambah -->
                    <i class="fa fa-plus"></i> 
                    Create Booking
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->

        <!-- card-body -->
        <div class="card-body">
            <!-- Start Table Here -->
            <table id="example1" class="table table-bordered">
                <thead class="thead-light">
                    <tr class="tr-color text-center">
                        <th>Booking ID</th>
                        <th>Vehicle Registration No</th>
                        <th>Booking By</th>
                        <th>Approved By</th>
                        <th>Booking Start Date</th>
                        <th>Booking End Date</th>
                        <th>Booking Total (RM)</th>
                        <th>Booking Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bookings as $key=>$booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->vehicles->vehicle_registration }}</td>
                        <td>{{ $booking->userDetails->full_name }}</td>
                        <td>{{ $booking->approvers->info->full_name }}</td>
                        <td>{{ $booking->booking_start_date->format('d M Y H:i') }}</td>
                        <td>{{ $booking->booking_end_date->format('d M Y H:i') }}</td>
                        <td>{{ $booking->booking_total }}</td>
                        <td>{{ $booking->booking_status }}</td>
                        <td class="text-center">
                            @if($booking->booking_status == 'Booked')
                                <a href="{{ route('bookings.checkin', ['booking' => $booking->booking_id]) }}" class="btn btn-sm btn-primary mb-1" data-toggle="modal" data-target="#modal-activate" >Approve</a>
                            @elseif($booking->booking_status == 'Pending Return')
                                <a href="{{ route('bookings.checkout', ['booking' => $booking->booking_id])}}" class="btn btn-sm btn-warning mb-1" data-toggle="modal" data-target="#modal-deactivate" >Returning Car</a>
                            @else
                                
                            @endif
                            {{-- <a href="{{ route('bookings.edit', ['booking' => $booking->id]) }}" title="Edit booking" class="btn btn-sm btn-secondary text-nowrap mb-1" ><span class="fas fa-edit"></span> Edit</a>
                            <a href="{{ route('bookings.destroy', ['booking' => $booking->id])}}" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#modal-delete" ><span class="fas fa-trash"></span> Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- End Table Here -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white">
              <h4 class="modal-title">Do you want to delete this booking?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer justify-content-right">
            <form method="POST">
            @method('delete')
            @csrf
              <button class="btn btn-danger">Delete</button>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-deactivate">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Returning Car</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p class="modal-body">Please confirm payment has been made and car has been returned.</p>
              </div>
            <div class="modal-footer justify-content-right">
            <form method="POST">
            @csrf
              <button class="btn btn-warning">Confirm</button>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
    <div class="modal fade" id="modal-activate">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Approve this booking?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer justify-content-right">
            <form method="POST">
            @csrf
                <button class="btn btn-primary">Approve</button>
            </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}} "></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}} "></script>
<script type="text/javascript">
$(function () {
    // Datatable
    $("#example1").DataTable();

	$('[data-target="#modal-delete"]').click(function(e){
		$($(this).data('target')+' form').prop('action', $(this).prop('href'));
		e.preventDefault();
	});
    $('[data-target="#modal-activate"]').click(function(e){
		$($(this).data('target')+' form').prop('action', $(this).prop('href'));
		e.preventDefault();
	});
	$('[data-target="#modal-deactivate"]').click(function(e){
		$($(this).data('target')+' form').prop('action', $(this).prop('href'));
		e.preventDefault();
	});
});
</script>
@endsection
