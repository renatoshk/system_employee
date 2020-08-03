@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Primary Departaments </h1>
          </div> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Primary Departament </li>
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
              <a href="{{route('parentdeps.create')}}" class="btn btn-success" style="float: right;">Add New Primary Departament</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                 <table class="table table-striped table-bordered table-hover" id="emp_list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                  @if($primary_dep)
                    <tr>
                        <td>{{ $primary_dep->id }}</td>
                        <td>{{ $primary_dep->name }}</td>
 
                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            <a class="btn btn-small btn-success" href="{{route('deps.show', $primary_dep->id)}}">Show Departaments</a>
 
                            <a class="btn btn-small btn-info" href="{{ URL::to('adm/parentdeps/' . $primary_dep->id . '/edit')}}">Edit</a>
                              
                        </td>
                          <td>
                            {!!Form::open(['method'=>'DELETE', 'action'=>['AdminParentDepController@destroy', $primary_dep->id]])!!}
                               {!!Form::submit('Delete', ['class'=>'btn btn-danger btn-small '])!!} 
                            {!!Form::close()!!}   
                          </td>
                    </tr>
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