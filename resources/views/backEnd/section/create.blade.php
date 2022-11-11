@extends('backEnd.layouts.master')
@section('css')
    <link rel="stylesheet" href=" {{ asset('backEnd/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backEnd/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Select2 -->
  <link rel="stylesheet"  href="{{ asset('backEnd/assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet"  href="{{ asset('backEnd/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href=" {{ asset('backEnd/assets/plugins/summernote/summernote-bs4.min.css') }}">
@endsection


@section('content')
    <div class="content-wrapper">

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
        <!-- input form elements -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title ">Create New Section</h3>
            </div>
            <!-- /.card-header -->

            {{-- error messages --}}
            @include('includes.messages')

            <!-- form start -->
            <form action="{{ route('section.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">

                    {{--  Section Name English  --}}
                    <div class="form-group">
                        <label for="section_name">English Section Name </label>
                        <input type="text" class="form-control" id="section_name" name="section_name" placeholder="Enter English Section Name" autocomplete="off">
                    </div>

                    {{--  Section Name Arabic --}}
                    <div class="form-group">
                      <label for="section_name_ar">Arabic Section Name </label>
                      <input type="text" class="form-control" id="section_name_ar" name="section_name_ar" placeholder="Enter Aracic Section Name" autocomplete="off">
                  </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='{{ route('section.index') }}' class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>
          <!-- /.card -->

    </div>
    <!-- ./wrapper -->
@endsection



@section('js')
<!-- Summernote -->
<script src="{{ asset('backEnd/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- Page specific script -->
  <script>
  $(function () {
      // Summernote
      $('#summernote').summernote();

  });
  </script>
  <script src=" {{ asset('backEnd/assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script>
  $(document).ready(function(){
      //Initialize Select2 Elements
      $('.select2').select2();
  });
  </script>
@endsection