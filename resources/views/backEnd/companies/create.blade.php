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
              <h3 class="card-title ">Create New Company</h3>
            </div>
            <!-- /.card-header -->

            {{-- error messages --}}
            @include('includes.messages')

            <!-- form start -->
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">

                    {{-- Company Name Arabic --}}
                    <div class="form-group">
                        <label for="company_name_arabic_arabic">Arabic Company Name </label><span class="text-danger" >  *</span>
                        <input type="text" class="form-control" id="company_name_arabic" name="company_name_arabic" placeholder="Enter Arabic Company Name" autocomplete="off">
                    </div>

                    {{-- Company Name English --}}
                    <div class="form-group">
                      <label for="company_name_english_english">English Company Name</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="company_name_english" name="company_name_english" placeholder="Enter English Company Name" autocomplete="off">
                    </div>

                    {{-- Company Name Kurdish--}}
                   {{--  <div class="form-group">
                      <label for="company_name_kurdish_kurdish">Kurdish Company Name</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="company_name_kurdish" name="company_name_kurdish" placeholder="Enter Kurdish Company Name" autocomplete="off">
                    </div> --}}

                    {{-- Company Section --}}
                    <div class="form-group mt-5">
                      <label>Company Section</label><span class="text-danger" >  *</span>
                      <select class="select2" data-placeholder="Select Section" style="width: 100%;" name="section">
                          <option value="" disabled selected>Select Company Section</option>
                          @foreach ($sections as $section)
                              <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                          @endforeach
                      </select>
                    </div>

                    {{-- Company Address Arabic --}}
                    <div class="form-group mt-5">
                      <label for="address_arabic">Arabic Company Address</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="address_arabic" name="address_arabic" placeholder="Enter Arabic Address" autocomplete="off">
                    </div>

                    {{-- Company Address English--}}
                    <div class="form-group">
                      <label for="address_english">English Company Address</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="address_english" name="address_english" placeholder="Enter English Address" autocomplete="off">
                    </div>

                    {{-- Company Address Kurdish--}}
                    {{-- <div class="form-group">
                      <label for="address_kurdish">Kurdish Company Address</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="address_kurdish" name="address_kurdish" placeholder="Enter Kurdish Address" autocomplete="off">
                    </div> --}}

                    {{-- Company Location --}}
                    <div class="form-group mt-5">
                      <label for="location">Company Location</label><span class="text-danger" >  *</span>
                      <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" autocomplete="off">
                    </div>

                    {{-- Company Phone --}}
                    <div class="form-group mt-5">
                        <label for="phone">Company Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" autocomplete="off">
                    </div>

                     {{-- Company whatsapp_num --}}
                     <div class="form-group">
                        <label for="whatsapp_num">Company Whatsapp Number</label>
                        <input type="text" class="form-control" id="whatsapp_num" name="whatsapp_num" placeholder="Enter whatsapp Number" autocomplete="off">
                    </div>

                   {{-- Company Email --}}
                   <div class="form-group">
                      <label for="email">Company Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" autocomplete="off">
                   </div>

                   {{-- Company WebSite --}}
                   <div class="form-group">
                    <label for="web_site">Company Web Site</label>
                    <input type="text" class="form-control" id="web_site" name="web_site" placeholder="Enter Web Site" autocomplete="off">
                   </div>

                   {{-- Company Facebook Link --}}
                   <div class="form-group">
                      <label for="facebook_link">Company Facebook Link</label>
                      <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="Enter Facebook Link" autocomplete="off">
                   </div>

                   {{-- Company Instagram Link --}}
                   <div class="form-group">
                      <label for="instagram_link">Company Instagram Link</label>
                      <input type="text" class="form-control" id="instagram_link" name="instagram_link" placeholder="Enter Instagram Link" autocomplete="off">
                   </div>

                   {{-- Company Linkedin Link --}}
                   <div class="form-group">
                      <label for="linkedin_link">Company Linkedin Link</label>
                      <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" placeholder="Enter Linkedin Link" autocomplete="off">
                   </div>

                    {{-- Company Youtube Link --}}
                    <div class="form-group">
                        <label for="youtube_link">Company Youtube Link</label>
                        <input type="text" class="form-control" id="youtube_link" name="youtube_link" placeholder="Enter Youtube Link" autocomplete="off">
                    </div>


                    {{-- Company Video Link --}}
                    <div class="form-group mt-5">
                      <label for="youtube_link">Company Video</label>
                      <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Enter Video Link" autocomplete="off">
                    </div>

                    {{-- Company Logo --}}
                    <div class="form-group mt-5">
                      <label for="logo">Company Logo</label><span class="text-danger" >  *</span>
                      <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="logo" name="logo" onchange="loadFileLogo(event)">
                              <label class="custom-file-label" for="logo">Choose file</label>
                          </div>
                      </div>
                      <div class="form-group mt-2">
                        <img id="logo_output" src="" alt="" style="width: 300px; height:200px;">
                      </div>
                    </div>

                    {{-- Company background_image --}}
                    <div class="form-group mt-5">
                        <label for="background_image">Company Background Image</label><span class="text-danger" >  *</span>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="background_image" name="background_image" onchange="loadFile(event)">
                                <label class="custom-file-label" for="background_image">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                          <img id="backGround_output" src="" alt="" style="width: 500px; height:400px;">
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
                    {{-- comapny gallery --}}
                    <label class="mt-5">Upload Company Gallery Images</label><span class="text-danger" >  *</span>
                    <p class="text-danger" style="text-align: left;">* Only image files are accepted </p>
										<div class="row row-sm">
												<div class="col-sm-7 col-md-6 col-lg-4">
													<div class="custom-file mb-2">
														<input class="custom-file-input" id="customFile" type="file" name="imgs[]" multiple> <label class="custom-file-label" for="customFile">Choose Multiple Files</label>
													</div>
													<div id='TextBoxesGroup' class="md-2">
                            <div id="TextBoxDiv1">
                            </div>
											  	</div>
												</div>
                        <div class="row">
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
                                    <textarea id="summernote" name="bio_arabic" ></textarea>
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
                              <textarea id="summernote2" name="bio_english" ></textarea>
                          </div>
                      </div>
                  </div>
                  <!-- /.col-->
                </div>
                <!-- ./row -->
                <!-- /. Company Bio  content -->

                {{-- Company Bio Kurdish--}}
                {{-- <div class="row">
                  <div class="col-md-12">
                      <div class="card card-outline card-info">
                          <div class="card-header">
                              <h3 class="card-title">
                                Write Kurdish Bio<span class="text-danger" >  *</span>
                              </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <textarea id="summernote3" name="bio_kurdish" ></textarea>
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