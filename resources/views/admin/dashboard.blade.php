@extends('layouts.admin.index')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 1200.88px;">
   
    <!-- Main content -->
      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Area</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @if ( Session::has('flash_message') )
        <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
          <h3>{{ Session::get('flash_message') }}</h3>
        </div>
   @endif
    <!-- /.content-header -->
  <div class="container-fluid">
   <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-pizza-slice"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Primary Departaments</span>
                <span class="info-box-number">
                 {{count($primary_deps)}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Employees</span>
                <span class="info-box-number">{{count($users)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-green elevation-1"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Deps</span>
                <span class="info-box-number">{{count($deps)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <!-- fix for small devices only -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-black elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Admins</span>
                <span class="info-box-number">{{count($admins)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
    </div>
  </div>


    <!-- /.content -->
    
  </div>
<!-- /.content-wrapper -->

@stop
