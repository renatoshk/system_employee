@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departaments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Departament </li>
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
              <a href="{{route('deps.create')}}" class="btn btn-success" style="float: right;">Add New  Departament </a>
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
              <h3 class="card-title">All Departaments </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Primary Departament</th>
                    <th scope="col">Name</th>
                    <th scope="col">Employees</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                @if($deps)
                 @foreach($deps as $dep)
              <tr>
                  <td>{{$dep->id}}</td>
                  <td>{{$dep->parent_dep->name ? : 'no data'}}</td>
                  <td>{{$dep->name}}</td>
                  <td> <a class="btn btn-small btn-success" href="{{route('employees.show', $dep->id)}}">Employees</a></td>
                  <td>{{$dep->created_at ? $dep->created_at->diffForHumans() : 'No data' }}</td>
                  <td>{{$dep->updated_at ? $dep->updated_at->diffForHumans() : 'No data' }}</td>
                  <td><a href="{{route('deps.edit', $dep->id)}}">Edit</a></td>
                  <td>
                  
                {!!Form::open(['method'=>'DELETE', 'action'=>['AdminDepController@destroy', $dep->id]])!!}
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