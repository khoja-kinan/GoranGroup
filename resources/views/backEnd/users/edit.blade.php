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
        <!-- input form elements -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title ">Edit User</h3>
            </div>
            <!-- /.card-header -->

            {{-- error messages --}}
            @include('includes.messages')

            <!-- form start -->
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">

                    {{-- User Name --}}
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" autocomplete="off">
                    </div>

                    {{-- User Email --}}
                    <div class="form-group">
                        <label for="email">User Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" autocomplete="off">
                    </div>

                    {{-- user Password --}}
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Leave it Empty If you don't want to Update it !">
                    </div>
                    {{-- Confirm Password --}}
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control"  name="confirm-password" placeholder="Leave it Empty If you don't want to Update it !">
                    </div>
                    {{-- user Roles --}}
                    <div class="form-group">
                        <label>Roles</label>
                        {!! Form::select('roles_name[]', $roles,$userRole, array('class' => ' select2 form-control'))
                            !!}
                        {{-- <select class="select2" multiple="multiple" data-placeholder="Select Roles" style="width: 100%;" name="roles[]">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select> --}}
                    </div>
                    
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href='{{ route('users.index') }}' class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>
          <!-- /.card -->

        


    </div>
    <!-- ./wrapper -->
@endsection



@section('js')
  <script src="{{ asset('backEnd/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- Page specific script -->
  <script>
  $(function () {
      // Summernote
      $('#summernote').summernote()

  })
  </script>
  <script src=" {{ asset('backEnd/assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script>
  $(document).ready(function(){
      //Initialize Select2 Elements
      $('.select2').select2();
  });
  </script>
@endsection