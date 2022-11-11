@extends('backEnd.layouts.master')


@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="mt-2">User Roles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active ">User Roles</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- input form elements -->
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Create New Role</h3>
      </div>
      <!-- /.card-header -->

        {{-- error messages --}}
      @include('includes.messages')
      
      <!-- form start -->
      <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="card-body">
              <div class="form-group">
                  <label for="name">Role Name</label>
                  {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' =>'Role Name')) !!}
              </div>
              <div class="form-group">
                  <label>Role Permisions</label>
                  <ul>
                      <li style="list-style-type: none">
                          @foreach($permission as $value)
                          <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                          <br />
                          @endforeach
                      </li>
                  </ul>
              </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href='{{ route('roles.index') }}' class="btn btn-warning">Back</a>
        </div>
      </form>
  </div>
    <!-- /.card -->
</div>
<!-- ./wrapper -->
@endsection