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
                  <h1 class="mt-2">Home Sliders</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Home Sliders</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        <!-- input form elements -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title ">Create New Home Slider</h3>
            </div>
            <!-- /.card-header -->

            {{-- error messages --}}
            @include('includes.messages')

            <!-- form start -->
            <form action="{{ route('home-slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">

                    {{-- slider title english--}}
                    <div class="form-group">
                        <label for="slider_title">English Slider Title</label><span class="text-danger" >  *</span>
                        <input type="text" class="form-control" id="slider_title" name="slider_title" placeholder="Enter English Slider Title" autocomplete="off">
                    </div>

                    {{-- slider title arabic --}}
                    <div class="form-group">
                      <label for="slider_title_ar">Arabic Slider Title</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="slider_title_ar" name="slider_title_ar" placeholder="Enter Arabic Slider Title" autocomplete="off">
                    </div>

                    {{-- slider subtitle english--}}
                    <div class="form-group mt-5" >
                      <label for="slider_subtitle">English Slider Subtitle</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="slider_subtitle" name="slider_subtitle" placeholder="Enter English Slider Subtitle" autocomplete="off">
                    </div>
                    {{-- slider subtitle arabic--}}
                    <div class="form-group">
                      <label for="slider_subtitle_ar">Arabic Slider Subtitle</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="slider_subtitle_ar" name="slider_subtitle_ar" placeholder="Enter Arabic Slider Subtitle" autocomplete="off">
                    </div>

                    {{-- slider btn name english--}}
                    <div class="form-group mt-5">
                      <label for="btn_name">English Button Name</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="btn_name" name="btn_name" placeholder="Enter English Button Name" autocomplete="off">
                    </div>
                    {{-- slider btn name arabic--}}
                    <div class="form-group">
                      <label for="btn_name_ar">Arabic Button Name</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="btn_name_ar" name="btn_name_ar" placeholder="Enter Arabic Button Name" autocomplete="off">
                    </div>

                    {{-- slider btn link --}}
                    <div class="form-group mt-5">
                      <label for="btn_link">Button Link / Enter External Link Or choose one of  Post Slider down below /</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="btn_link" name="btn_link" placeholder="Enter Button Link" autocomplete="off">
                    </div>

                    {{-- post slider  --}}
                    <div class="form-group ">
                      <label>Post Slider</label>
                      <select class="select2"  style="width: 100%;" name="post_id">
                          <option value="" disabled selected>Select Post To Redirect To</option>
                          @foreach ($posts as $post)
                              <option value="{{ $post->id }}">{{ $post->post_title }}</option>
                          @endforeach
                      </select>
                    </div>

                    {{-- slider background_image --}}
                    <div class="form-group mt-5">
                        <label for="background_image">Slider Background Image</label><span class="text-danger" >  *</span>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="slider_image" name="slider_image" onchange="loadFile(event)">
                                <label class="custom-file-label" for="slider_image">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                          <img id="backGround_output" src="" alt="" style="width: 500px; height:400px;">
                        </div>
                    </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='{{ route('home-slider.index') }}' class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>
          <!-- /.card -->
    </div>
    <!-- ./wrapper -->
@endsection



@section('js')
<!-- Summernote -->
  <script src=" {{ asset('backEnd/assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script>
  $(document).ready(function(){
      //Initialize Select2 Elements
      $('.select2').select2();
  });
  </script>
  
<script>
  var loadFile = function(event) {
    var output = document.getElementById('backGround_output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

@endsection