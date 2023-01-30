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
                Reservation List
            </h3>
            <!-- card-tools -->
            <div class="card-tools">
                <a href="{{ route('reservations.create') }}" class="btn bg-gradient-success btn-sm">  <!-- untuk pergi ke Viewan tambah -->
                    <i class="fa fa-plus"></i> 
                    Add New
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
                        <th width="5%">#</th>
                        <th>Reservation Number</th>
                        <th>Room Number</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Reservation Status</th>
                        <th>Reservation Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reservations as $key=>$reservation)
                    <tr>
                        <td scope="row" class="text-center">{{ ++$key }}</td>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->roomDetails->room_number }}</td>
                        <td>{{ $reservation->check_in->format('d-m-Y') }}</td>
                        <td>{{ $reservation->check_out->format('d-m-Y') }}</td>
                        <td>{{ $reservation->reservationStatus->name }}</td>
                        <td>{{ $reservation->reservation_type }}</td>
                        <td class="text-center">
                            @if($reservation->reservation_status_id == 2)
                                <a href="{{ route('reservations.checkin', ['reservation' => $reservation->id]) }}" class="btn btn-sm btn-warning mb-1" data-toggle="modal" data-target="#modal-activate" >CHECK-IN</a>
                            @elseif($reservation->reservation_status_id == 3)
                                <a href="{{ route('reservations.checkout', ['reservation' => $reservation->id])}}" class="btn btn-sm btn-primary mb-1" data-toggle="modal" data-target="#modal-deactivate" >CHECK-OUT</a>
                            @else
                                
                            @endif
                            {{-- <a href="{{ route('reservations.edit', ['reservation' => $reservation->id]) }}" title="Edit reservation" class="btn btn-sm btn-secondary text-nowrap mb-1" ><span class="fas fa-edit"></span> Edit</a>
                            <a href="{{ route('reservations.destroy', ['reservation' => $reservation->id])}}" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#modal-delete" ><span class="fas fa-trash"></span> Delete</a> --}}
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
              <h4 class="modal-title">Do you want to delete this reservation?</h4>
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
              <h4 class="modal-title">Confirm check-out for this guest?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer justify-content-right">
            <form method="POST">
            @csrf
              <button class="btn btn-warning">Confirm Check-out</button>
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
                <h4 class="modal-title">Confirm check-in for this guest?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer justify-content-right">
            <form method="POST">
            @csrf
                <button class="btn btn-primary">Confirm Check-in</button>
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
