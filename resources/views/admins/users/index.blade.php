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
                User List
            </h3>
            <!-- card-tools -->
            <div class="card-tools">
                <a href="{{ route('users.create') }}" class="btn bg-gradient-success btn-sm">  <!-- untuk pergi ke Viewan tambah -->
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
                        <th>Name</th>
                        <th>Email</th> 
                        <th>Contact No.</th>
                        <th>Date Joined</th>
                        <th>Designation</th>
                        <th>Manager</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td scope="row" class="text-center">{{ ++$key }}</td>
                        <td>{{ $user->info->full_name }}</td>
                        <td><a href="mailto:{{ $user->info->email }}" target="_blank">{{ $user->info->email }}</a></td>
                        <td><a href="tel:{{ $user->info->phone }}" target="_blank">{{ $user->info->phone }}</a></td>
                        <td>{{ $user->date_joined->format('d M Y') }}</td>
                        <td>{{ $user->designation }}</td>
                        <td>{{ $user->managerDetails->full_name ?? '' }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.edit', ['user' => $user->staff_id]) }}" title="Edit User" class="btn btn-sm btn-secondary text-nowrap mb-1" ><span class="fas fa-edit"></span> Edit</a>
                            <a href="{{ route('users.destroy', ['user' => $user->staff_id])}}" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#modal-delete" ><span class="fas fa-trash"></span> Delete</a>
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
              <h4 class="modal-title">Do you want to delete this user?</h4>
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
              <h4 class="modal-title">Do you want to deactivate this user?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer justify-content-right">
            <form method="POST">
            @csrf
              <button class="btn btn-warning">Deactivate</button>
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
                <h4 class="modal-title">Do you want to activate this user?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer justify-content-right">
            <form method="POST">
            @csrf
                <button class="btn btn-primary">Activate</button>
            </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}} "></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}} "></script>
<script type="text/javascript">
$(function () {
    // Datatable
    $("#example1").DataTable();

    $('[data-target="#modal-activate"]').click(function(e){
		$($(this).data('target')+' form').prop('action', $(this).prop('href'));
		e.preventDefault();
	});
	$('[data-target="#modal-deactivate"]').click(function(e){
		$($(this).data('target')+' form').prop('action', $(this).prop('href'));
		e.preventDefault();
	});
	$('[data-target="#modal-delete"]').click(function(e){
		$($(this).data('target')+' form').prop('action', $(this).prop('href'));
		e.preventDefault();
	});
});
</script>
@endsection
