@extends('backEnd.layouts.master')

{{-- head section --}}
@section('headSection')
    <!-- DataTables -->
  <link rel="stylesheet"  href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet"  href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet"  href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }} ">
@endsection

{{-- main section --}}
@section('content')
<div class="content-wrapper">
  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  @if (session('delete'))
      <div class="alert alert-danger">
          {{ session('delete') }}
      </div>
  @endif
  
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="mt-2">User Roles</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Roles</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <div class="card">
        <div class="card-header">
          @can('Create Role')
          <a class=' btn btn-primary' href="{{ route('roles.create') }}">New Role</a>
          @endcan
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Role Name</th>
              @can('Edit Role')
              <th>Edit</th>
              @endcan
              @can('Delete Role')
              <th>Delete</th>
              @endcan
            </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
                      
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$role->name}}</td>
                @can('Edit Role')
                @if ($role->name !== 'owner')
                  <td><a href="{{ route('roles.edit',$role->id ) }}"><i class="fas fa-edit"></i></span></a></td>
                @else
                  <td><a><span><i class="fa fa-edit"></i></span></a></td>
                @endif
                @endcan
                @can('Delete Role')
                @if ($role->name !== 'owner')
                  <td>
                      <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('roles.destroy',$role->id) }}" style="display:none">
                          @csrf
                          @method('DELETE')
                      </form>
                      <a href="" onclick="
                      if(confirm('Are you sure, You want to delete this Role?')) {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $role->id }}').submit();
                      }else{
                          event.preventDefault();
                      }">
                      <i class="fa fa-trash"></i></span></a>
                  </td>
                @else
                <td><a><span><i class="fa fa-trash"></i></span></a></td>
                @endif

                @endcan
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</div>

@endsection

{{-- footer section --}}
@section('footerSection')
    <!-- DataTables  & Plugins -->
    <script  src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script  src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script  src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
    </script>
@endsection