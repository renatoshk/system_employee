@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-info') }}">
      <h3>{{ Session::get('flash_message') }} <a href="{{route('roles.index')}}">Click here to see it!</a></h3>
  </div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('roles.create')}}" class="btn btn-success" style="float: right;">Add New Role</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<br>
<br>
<!-- editimi e categories -->
<div class="col-sm-10">
{!!Form::model($role, ['method'=>'PATCH', 'action'=>['AdminRoleController@update', $role->id]]) !!}
<div class="form-group">
    <br>
       <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$role->name}}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
  <div class="form-group row mb-0">
      <div class="col-md-10 ">
          <button type="submit" class="btn btn-primary">
              {{ __('Edit Role') }}
          </button>
      </div>
  </div>
{!!Form::close()!!}
<!-- end editimi e categories -->

  <!-- /.content -->
</div>
</div>

@stop