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
      @if (session('delete'))
        <div class="alert alert-danger mt-2">
            {{ session('delete') }}
        </div>
      @endif
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="mt-2">Companies</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Companies</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        <!-- input form elements -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title ">Edit Company</h3>
            </div>
            <!-- /.card-header -->

            {{-- error messages --}}
            @include('includes.messages')

            <!-- form start -->
            <form action="{{ route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">

                    {{-- Company Name Arabic --}}
                    <div class="form-group">
                      <label for="company_name_arabic_arabic">Arabic Company Name </label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="company_name_arabic" name="company_name_arabic" placeholder="Enter Arabic Company Name" autocomplete="off" value="{{ $company->company_name_arabic}}">
                     </div>

                    {{-- Company Name English --}}
                    <div class="form-group">
                      <label for="company_name_english_english">English Company Name</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="company_name_english" name="company_name_english" placeholder="Enter English Company Name" autocomplete="off" value="{{ $company->company_name_english}}">
                    </div>

                    {{-- Company Name Kurdish--}}
                    {{-- <div class="form-group">
                      <label for="company_name_kurdish_kurdish">Kurdish Company Name</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="company_name_kurdish" name="company_name_kurdish" placeholder="Enter Kurdish Company Name" autocomplete="off" value="{{ $company->company_name_kurdish}}">
                    </div> --}}

                    {{-- Company Section --}}
                    <div class="form-group mt-5">
                      <label>Company Section</label>
                      <select class="select2"  data-placeholder="Select Section" style="width: 100%;" name="section">
                          
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}"  {{ $company->section_id == $section->id ? "selected" : " " }} > {{ $section->section_name }} </option>
                        @endforeach
                      </select>
                    </div>

                    {{-- Company Address Arabic --}}
                    <div class="form-group mt-5">
                      <label for="address_arabic">Arabic Company Address</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="address_arabic" name="address_arabic" placeholder="Enter Arabic Address" autocomplete="off" value="{{ $company->address_arabic}}">
                    </div>

                    {{-- Company Address English--}}
                    <div class="form-group">
                      <label for="address_english">English Company Address</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="address_english" name="address_english" placeholder="Enter English Address" autocomplete="off" value="{{ $company->address_english}}">
                    </div>

                    {{-- Company Address Kurdish--}}
                    {{-- <div class="form-group">
                      <label for="address_kurdish">Kurdish Company Address</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="address_kurdish" name="address_kurdish" placeholder="Enter Kurdish Address" autocomplete="off" value="{{ $company->address_kurdish}}"> 
                    </div> --}}

                    {{-- Company Location --}}
                    <div class="form-group mt-5">
                      <label for="location">Company Location</label>
                      <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" autocomplete="off" value="{{ $company->location}}">
                    </div>

                    {{-- Company Phone --}}
                    <div class="form-group">
                        <label for="phone">Company Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" autocomplete="off" value="{{ $company->phone}}">
                    </div>

                     {{-- Company whatsapp_num --}}
                     <div class="form-group">
                        <label for="whatsapp_num">Company Whatsapp Number</label>
                        <input type="text" class="form-control" id="whatsapp_num" name="whatsapp_num" placeholder="Enter whatsapp Number" autocomplete="off" value="{{ $company->whatsapp_num}}">
                    </div>

                    

                   {{-- Company Email --}}
                   <div class="form-group">
                      <label for="email">Company Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" autocomplete="off" value="{{ $company->email}}">
                   </div>

                   {{-- Company WebSite --}}
                   <div class="form-group">
                      <label for="web_site">Company Web Site</label>
                      <input type="web_site" class="form-control" id="web_site" name="web_site" placeholder="Enter Web Site" autocomplete="off">
                   </div>
                   

                   {{-- Company Facebook Link --}}
                   <div class="form-group">
                      <label for="facebook_link">Company Facebook Link</label>
                      <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="Enter Facebook Link" autocomplete="off" value="{{ $company->facebook_link}}">
                   </div>

                   {{-- Company Instagram Link --}}
                   <div class="form-group">
                      <label for="instagram_link">Company Instagram Link</label>
                      <input type="text" class="form-control" id="instagram_link" name="instagram_link" placeholder="Enter Instagram Link" autocomplete="off" value="{{ $company->instagram_link}}">
                   </div>

                   {{-- Company Linkedin Link --}}
                   <div class="form-group">
                      <label for="linkedin_link">Company Linkedin Link</label>
                      <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" placeholder="Enter Linkedin Link" autocomplete="off" value="{{ $company->linkedin_link}}">
                   </div>

                    {{-- Company Youtube Link --}}
                    <div class="form-group">
                        <label for="youtube_link">Company Youtube Link</label>
                        <input type="text" class="form-control" id="youtube_link" name="youtube_link" placeholder="Enter Youtube Link" autocomplete="off" value="{{ $company->youtube_link}}">
                    </div>

                    {{-- Company Video Link --}}
                    <div class="form-group mt-5">
                      <label for="youtube_link">Company Video</label>
                      <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Enter Video Link" autocomplete="off" value="{{ $company->video_link }}">
                    </div>

                     {{-- Company Logo --}}
                     <div class="form-group mt-5">
                      <label for="logo">Company Logo</label><span class="text-danger" >  *</span>
                      <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="logo" name="logo" onchange="loadFileLogo(event)" value="{{ asset($company->logo) }}">
                              <label class="custom-file-label" for="logo">Choose file</label>
                          </div>
                      </div>
                      <div class="form-group mt-2">
                        <img id="logo_output" src="{{ asset($company->logo) }}" alt="" style="width: 300px; height:200px;">
                      </div>
                    </div>

                    {{-- Company background_image --}}
                    <div class="form-group mt-5">
                        <label for="background_image">Company Background Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="background_image" name="background_image"  onchange="loadFile(event)" value="{{ asset($company->background_image) }}">
                                <label class="custom-file-label" for="background_image">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                          <img id="backGround_output" src="{{ asset($company->background_image) }}" alt="" style="width: 500px; height:400px;">
                        </div>
                    </div>
                    {{-- comapny files --}}
                    <div class="form-group mt-5">
                      <label for="company_file">Company Catalog File/s</label>
                      <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="company_file" name="company_files[]" multiple>
                              <label class="custom-file-label" for="company_file">Choose file</label>
                          </div>
                      </div>
                      
                    </div>

                    {{-- comapny Gallery --}}
                    <label class="mt-5">Upload Company Gallery Images</label><span class="text-danger" >  *</span>
                    <p class="text-danger" style="text-align: left;">* Only image files are accepted </p>
										<div class="row row-sm">
												<div class="col-sm-7 col-md-6 col-lg-4">
													<div class="custom-file mb-2">
														<input class="custom-file-input" id="customFile" type="file" name="imgs[]" multiple> <label class="custom-file-label" for="customFile">Choose file</label>
													</div>
													<div id='TextBoxesGroup' class="md-2">
                            <div id="TextBoxDiv1"></div>
												  </div>
												</div>
                        <div class="row mt-1">
                          <div id="thumb-output" class="col-sm-6 col-md-4 col-lg-2 item"></div>
                        </div>
										</div>
              </div>
              <!-- /.card-body -->

              {{-- Company Bio Arabic --}}
              <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                              Write Arabic Bio<span class="text-danger" >  *</span>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <textarea id="summernote" name="bio_arabic" >{{ $company->bio_arabic }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        <!-- /. Company Bio  content -->

        {{-- Company Bio English --}}
        <div class="row">
          <div class="col-md-12">
              <div class="card card-outline card-info">
                  <div class="card-header">
                      <h3 class="card-title">
                      Write English Bio<span class="text-danger" >  *</span>
                      </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <textarea id="summernote2" name="bio_english" >{{ $company->bio_english }}</textarea>
                  </div>
              </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- ./row -->
        <!-- /. Company Bio  content -->

        {{-- Company Bio Kurdish--}}
       {{--  <div class="row">
          <div class="col-md-12">
              <div class="card card-outline card-info">
                  <div class="card-header">
                      <h3 class="card-title">
                        Write Kurdish Bio<span class="text-danger" >  *</span>
                      </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <textarea id="summernote3" name="bio_kurdish" >{{ $company->bio_kurdish }}</textarea>
                  </div>
              </div>
          </div>
          <!-- /.col-->
        </div> --}}
         <!-- ./row -->
         <!-- /. Company Bio  content -->


              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='{{ route('company.index') }}' class="btn btn-warning">Back</a>
              </div>
            </form>
            <div class="row mt-5">
              <div class="col-md-12">
                  <div class="card card-outline card-info">
                      <div class="card-header">
                          <h3 class="card-title">
                            Gallery Images
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row photos">
                          @foreach ($images as $img )
                              <div class="col-sm-6 col-md-4 col-lg-2 item text-left"><img class="img-fluid mt-3 " src="{{ asset($img->path) }}" >
                                <button class="btn btn-outline-danger btn-sm mt-1"
                                  data-toggle="modal"
                                  data-img_id="{{ $img->id }}"
                                  data-company_id="{{ $img->company_id }}"
                                  data-path="{{ $img->path }}"
                                  data-target="#delete_file">Delete Image
                                </button>
                              </div>
                          @endforeach
                        </div>
                      </div>
                  </div>
              </div>
              <!-- /.col-->
          </div>
            
        </div>
          <!-- /.card -->

        

    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Delete Image </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('delete_img') }}" method="post">

                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="text-center">
                    <h6 style="color:red"> Are you sure You want to delete this Image?</h6>
                    </p>

                    <input type="hidden" name="img_id" id="img_id" value="">
                    <input type="hidden" name="company_id" id="company_id" value="">
                    <input type="hidden" name="path" id="path" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">cancle</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- ./wrapper -->
@endsection



@section('js')
<script>
  $('#delete_file').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var img_id = button.data('img_id')
      var company_id = button.data('company_id')
      var path = button.data('path')
      var modal = $(this)

      modal.find('.modal-body #img_id').val(img_id);
      modal.find('.modal-body #company_id').val(company_id);
      modal.find('.modal-body #path').val(path);
  })

</script>
<!-- Summernote -->
<script src="{{ asset('backEnd/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- Page specific script -->
  <script>
  $(function () {
      // Summernote
      $('#summernote').summernote();
      $('#summernote2').summernote();
      $('#summernote3').summernote();

  });
  </script>
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
  <script>
    var loadFileLogo = function(event) {
      var output = document.getElementById('logo_output');
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