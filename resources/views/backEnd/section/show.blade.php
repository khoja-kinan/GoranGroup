@extends('backEnd.layouts.master')

{{-- head section --}}
@section('css')
    <!-- DataTables -->
  <link rel="stylesheet"  href="{{ asset('backEnd/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet"  href="{{ asset('backEnd/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet"  href="{{ asset('backEnd/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
@endsection

{{-- main section --}}
@section('content')
<div class="content-wrapper">
  @if (session('success'))
      <div class="alert alert-success mt-2">
          {{ session('success') }}
      </div>
  @endif
  @if (session('delete'))
      <div class="alert alert-danger mt-2">
          {{ session('delete') }}
      </div>
  @endif
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="mt-2">Sections</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sections</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <div class="card">
        <div class="card-header">
          @can('Create Section')
          <a class=' btn btn-primary' href="{{ route('section.create') }}">New Section</a>
          @endcan
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th class="text-center">Section Name</th>
              @can('Edit Section')
              <th class="text-center">Edit</th>
              @endcan
              @can('Delete Section')
              <th class="text-center">Delete</th>
              @endcan
            </tr>
            </thead>
            <tbody>
              @foreach ($sections as $section)
                      
              <tr>
                <td class="text-center">{{ $loop->index+1 }}</td>
                <td class="text-center">{{$section->section_name}}</td>
                @can('Edit Section')
                <td class="text-center"><a href="{{ route('section.edit',$section->id ) }}"><i class="fas fa-edit"></i></span></a></td>
                @endcan
                @can('Delete Section')
                <td class="text-center">
                    <form id="delete-form-{{ $section->id }}" method="POST" action="{{ route('section.destroy',$section->id) }}" style="display:none">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="" onclick="
                    if(confirm('Are you sure, You want to delete this Section?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $section->id }}').submit();
                    }else{
                        event.preventDefault();
                    }"> <i class="fa fa-trash"></i></span></a>
                </td>
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