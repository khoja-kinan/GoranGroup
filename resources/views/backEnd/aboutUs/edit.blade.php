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
                  <h1 class="mt-2">Video URL</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Video URL</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        <!-- input form elements -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title ">Edit Video URL</h3>
            </div>
            <!-- /.card-header -->

            {{-- error messages --}}
            @include('includes.messages')

            <!-- form start -->
            <form action="{{ route('video-url.update',$video->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">

                    {{--  Video Title   --}}
                    <div class="form-group">
                      <label for="video_title">Video Title </label>
                      <input type="text" class="form-control" id="video_title" name="video_title" placeholder="Enter Video Title" autocomplete="off" value="{{ $video->video_title }}">
                  </div>

                  {{--  Video URL   --}}
                  <div class="form-group">
                    <label for="video_url">Video URL </label>
                    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Enter Video URL" autocomplete="off" value="{{ $video->video_url }}>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='{{ route('video-url.index') }}' class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>
          <!-- /.card -->

    </div>
    <!-- ./wrapper -->
@endsection



@section('js')

@endsection