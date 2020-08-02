@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Role Attributes </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attribute </li>
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
              <a href="{{route('attrs.create')}}" class="btn btn-success" style="float: right;">Add New Role Attribute </a>
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
              <h3 class="card-title">All Role Attributes </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Role</th>
                    <th scope="col">Type</th>
                    <th scope="col">Label</th>
                    <th scope="col">Value</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                @if($attributes)
                 @foreach($attributes as $attribute)
              <tr>
                  <td>{{$attribute->id}}</td>
                  <td>{{$attribute->role->name}}</td>
                  <td>{{$attribute->type}}</td>
                  <td>{{$attribute->label}}</td>
                  <td>{{$attribute->attr_code}}</td>
                  <td>{{$attribute->created_at ? $attribute->created_at->diffForHumans() : 'No data' }}</td>
                  <td>{{$attribute->updated_at ? $attribute->updated_at->diffForHumans() : 'No data' }}</td>
                  <td><a href="{{route('attrs.edit', $attribute->id)}}">Edit</a></td>
                  <td>
                  
                {!!Form::open(['method'=>'DELETE', 'action'=>['AdminRoleAttrController@destroy', $attribute->id]])!!}
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