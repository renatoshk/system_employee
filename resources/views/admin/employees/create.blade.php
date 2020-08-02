@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
            </ol>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>
<br>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-info') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<br>
<!-- Krijimi  e categories -->
<div class="col-sm-10"> 
    {!!Form::open(['method'=>'POST', 'action'=>'AdminEmployeeController@store',  'files'=>'true'])!!}
                <div class="card-body">
                  <div class="form-group" id="attr_group_select">
                     {!!Form::label('Role', 'Role:')!!}
                     {!!Form::select('role_id', [''=>'Choose Role']+$roles, null, ['class'=>'form-control'])!!}
                  </div> 
                  <div class="form-group" >
                    <label for="dep_id">Departament:</label>
                     {!!Form::select('dep_id', [''=>'Choose Departament']+$deps, null, ['class'=>'form-control'])!!}
                  </div>
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" name="surname" class="form-control" id="surname">
                  </div>
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" id="username">
                  </div>
                   <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                    <div class="form-group"  id="prop-files-uploader">
                      {!!Form::file('image_id', null, ['class'=>'form-control'])!!}
                    </div>
                      <div class="form-group ">
                          <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group ">
                          <label for="password-confirm">{{ __('Confirm Password') }}</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" id='submit-btn'>
                  <button type="submit" class="btn btn-primary" id='submit-btn'>Add Employee</button>
                </div>
  {!!Form::close()!!}
  <!-- /.content -->
</div>
  </div>

@stop
