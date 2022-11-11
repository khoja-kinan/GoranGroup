@extends('backEnd.layouts.master')

{{-- head section --}}
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet"  href="{{ asset('backEnd/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet"  href="{{ asset('backEnd/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet"  href="{{ asset('backEnd/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backEnd/assets/dist/css/adminlte.min.css') }} ">
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
              <h1 class="mt-2">Users</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <div class="card">
        <div class="card-header">
          @can('Create User')
          <a class=' btn btn-primary' href="{{ route('users.create') }}">New User</a>
          @endcan
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>User Name</th>
              <th>User Email</th>
              <th>User Role</th>
              @can('Edit User')
              <th>Edit</th>
              @endcan
              @can('Delete User')
              <th>Delete</th>
              @endcan
            </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  {{-- User Roles --}}
                  <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                  </td>
                  {{-- Edit User --}}
                  @can('Edit User')
                    @foreach ($user->getRoleNames() as $v)
                      <td>

                        @if ($v !=='owner')
                          <a href="{{ route('users.edit',$user->id ) }}"><i class="fas fa-edit"></i></span></a>

{{-- 
                        @elseif ( )
                          <a href="{{ route('users.edit',$user->id ) }}"><i class="fas fa-edit"></i></span></a>
 --}}

                        @else
                          <i class="fas fa-edit"></i></span>
                        @endif

                      </td>
                    @endforeach
                  @endcan
                  {{-- Delete User --}}
                  @can('Delete User')
                  @foreach ($user->getRoleNames() as $v)
                    <td>
                      @if ($v !=='owner')
                        <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('users.destroy',$user->id) }}" style="display:none">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this user?')) {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $user->id }}').submit();
                        }else{
                            event.preventDefault();
                        }"> <i class="fa fa-trash"></i></span></a>
                      @else
                        <span><i class="fa fa-trash"></i></span>
                      @endif
                    </td>
                @endforeach
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
@section('js')
    <!-- DataTables  & Plugins -->
    <script  src="{{ asset('backEnd/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script  src="{{ asset('backEnd/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    
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