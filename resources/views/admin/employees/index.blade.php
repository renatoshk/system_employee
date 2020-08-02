@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employees </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('employees.create')}}" class="btn btn-success" style="float: right;">Add New  Employee </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Employees </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Departament</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                @if($employees)
                 @foreach($employees as $employee)
              <tr>
                  <td>{{$employee->id}}</td>
                  <td><img height="100px" width="100px" src="/images/{{$employee->image->image}}" alt=""></td>
                  <td>{{$employee->dep->name ?? 'no data'}}</td>
                  <td>{{$employee->name}}</td>
                  <td>{{$employee->surname}}</td>
                  <td>{{$employee->username}}</td>
                  <td>{{$employee->email}}</td>
                  <td><a href="{{route('employees.edit', $employee->id)}}">Edit</a></td>
                  <td>
                  
                {!!Form::open(['method'=>'DELETE', 'action'=>['AdminEmployeeController@destroy', $employee->id]])!!}
                     {!!Form::submit('Delete', ['class'=>'btn btn-danger'])!!} 
                {!!Form::close()!!}
                </td>
              </tr>
                 @endforeach 
                @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@stop