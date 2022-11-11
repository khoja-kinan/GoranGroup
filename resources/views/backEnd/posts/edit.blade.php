@extends('backEnd.layouts.master')
@section('css')
    <link rel="stylesheet" href=" {{ asset('backEnd/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backEnd/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href=" {{ asset('backEnd/assets//plugins/summernote/summernote-bs4.min.css') }}">
@endsection


@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="mt-2">Posts</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        <!-- input form elements -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Post</h3>
            </div>
            <!-- /.card-header -->

            {{-- error messages --}}
            @include('includes.messages')

            <!-- form start -->
            <form action="{{ route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card-body">

                {{-- Header title english --}}
                <div class="form-group">
                  <label for="header_title">English Header Title</label>
                  <input type="text" class="form-control" id="header_title" name="header_title" placeholder="Enter English Header Title" autocomplete="off" value="{{ $post->header_title }}">
                </div>
                {{-- Header title arabic --}}
                <div class="form-group">
                  <label for="header_title_ar">Arabic Header Title</label>
                  <input type="text" class="form-control" id="header_title_ar" name="header_title_ar" placeholder="Enter Arabic Header Title" autocomplete="off" value="{{ $post->header_title_ar }}">
                </div>

                {{-- Header image --}}
                <div class="form-group">
                    <label for="header_image">Header Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="header_image" name="header_image" onchange="loadFile(event)">
                            <label class="custom-file-label" for="header_image">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                      <img id="backGround_output" src="{{ asset($post->header_image) }}" alt="" style="width: 500px; height:400px;">
                    </div>
                </div>

                {{-- Post title --}}
                <div class="form-group">
                  <label for="post_title">English Post Title</label>
                  <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Enter English Post Title" autocomplete="off" value="{{ $post->post_title }}">
                </div>
                {{-- Post title arabic --}}
                <div class="form-group">
                  <label for="post_title_ar">Arabic Post Title</label>
                  <input type="text" class="form-control" id="post_title_ar" name="post_title_ar" placeholder="Enter Arabic Post Title" autocomplete="off" value="{{ $post->post_title_ar }}">
                </div>

                {{-- post images --}}
                <label class="mt-5">Upload Post Image/s</label>
                <p class="text-danger" style="text-align: left;">* Only image files are accepted </p>
                <div class="row row-sm">
                    <div class="col-sm-7 col-md-6 col-lg-4">
                      <div class="custom-file mb-2">
                        <input class="custom-file-input" id="customFile" type="file" name="imgs[]" multiple> <label class="custom-file-label" for="customFile">Choose File/s</label>
                      </div>
                      <div id='TextBoxesGroup' class="md-2">
                        <div id="TextBoxDiv1">
                        </div>
                      </div>
                    </div>
                    <div class="row photos">
                      @foreach ($images as $img )
                           <div class="col-sm-6 col-md-4 col-lg-2 item"><img class="img-fluid mt-3 " src="{{ asset($img->path) }}" ></div>
                      @endforeach
                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              {{-- Post Body --}}
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    Edit English Post Body
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea id="summernote" name="post_body" >{{ $post->post_body }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- ./row -->
                
                <!-- /. Post Body content -->
                {{-- Post Body Arabic--}}
                <div class="row mt-3">
                  <div class="col-md-12">
                      <div class="card card-outline card-info">
                          <div class="card-header">
                              <h3 class="card-title">
                                Edit Arabic Post Body
                              </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <textarea id="summernote2" name="post_body_ar">{{ $post->post_body_ar }}</textarea>
                          </div>
                      </div>
                  </div>
                  <!-- /.col-->
              </div>
              <!-- ./row -->
          <!-- /. Post Body content -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='{{ route('post.index') }}' class="btn btn-warning">Back</a>
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
        $('#summernote2').summernote();

    })
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
    <script>
   
      $(document).ready(function(){
       $('#customFile').on('change', function(){ //on file input change 
              var data = $(this)[0].files; //this file data
               
              $.each(data, function(index, file){ //loop though each file
                  if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                      var fRead = new FileReader(); //new filereader
                      fRead.onload = (function(file){ //trigger function on successful read
                      return function(e) {
                          var img = $('<img/>').addClass('img-fluid mt-3').attr('src', e.target.result); //create image element 
                          $('#thumb-output').append(img); //append image to output element
                      };
                      })(file);
                      fRead.readAsDataURL(file); //URL representing the file's data.
                  }
              });
       });
      });
    </script>
@endsection