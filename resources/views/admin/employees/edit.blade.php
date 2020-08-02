@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
    {!!Form::model($employee, ['method'=>'PATCH', 'action'=>['AdminEmployeeController@update', $employee->id], 'files'=>'true'])!!}
          <div class="card-body">
                  <div class="form-group" id="attr_group_select">
                    <label for="type">Departament:</label>
                       {!!Form::select('dep_id', $deps, null, ['class'=>'form-control'])!!}
                  </div>
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{$employee->name ?? ''}}" class="form-control" id="name">
                  </div>
                   <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" name="surname" value="{{$employee->surname ?? ''}}" class="form-control" id="surname">
                  </div>
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="{{$employee->username ?? ''}}" class="form-control" id="username">
                  </div>
                   <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{$employee->email ?? ''}}" class="form-control" id="email">
                  </div>
                    <div class="form-group" id="file_upload">
                      {!!Form::file('image_id', null, ['class'=>'form-control'])!!}
                    </div>
                    @if($condition)
                        @foreach($condition as $attrs)
                          @foreach($attrs as $attr)
                             <label for="status">{{$attr->label ?? ''}}</label>
                             <input type="hidden" name="id_{{$attr->attr_code}}" value="{{$attr->id}}">
                              <input type="{{$attr->type}}" name="{{$attr->attr_code}}" value="{{App\Role_attr_value::where('user_id',$employee->id)->where('role_attr_id', $attr->id)->first()->attribute_value ?? ''}}" class="form-control" id="status">
                           @endforeach
                        @endforeach
                    @endif
                  
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id='submit-btn'>Edit Employee</button>
                </div>
  {!!Form::close()!!}
  <!-- /.content -->
</div>
  </div>

@stop
