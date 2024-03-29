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
                Room Types
            </h3>
            <!-- card-tools -->
            <div class="card-tools">
                <a href="{{ route('roomTypes.create') }}" class="btn bg-gradient-success btn-sm">  <!-- untuk pergi ke Viewan tambah -->
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
                        <th>Type Name</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roomTypes as $key=>$type)
                    <tr>
                        <td scope="row" class="text-center">{{ ++$key }}</td>
                        <td>{{ $type->type_name }}</td>
                        <td>{{ $type->description }}</td>
                        <td>RM {{ number_format($type->rate, 2) }}</td>
                        <td class="text-center">
                            <a href="{{ route('roomTypes.edit', ['roomType' => $type->id]) }}" title="Edit room type" class="btn btn-sm btn-secondary text-nowrap mb-1" ><span class="fas fa-edit"></span> Edit</a>
                            <a href="{{ route('roomTypes.destroy', ['roomType' => $type->id])}}" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#modal-delete" ><span class="fas fa-trash"></span> Delete</a>
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
              <h4 class="modal-title">Do you want to delete this room type?</h4>
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
});
</script>
@endsection
