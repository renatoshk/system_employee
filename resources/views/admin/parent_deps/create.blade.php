@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Primary Departament</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Primary Departament</li>
            </ol>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>
<br>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-success') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<!-- Krijimi  e categories -->
<div class="col-sm-10">
{!!Form::open(['method'=>'POST', 'action'=>'AdminParentDepController@store']) !!}
<div class="form-group">
    <br>
       <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
              {{ __('Add Primary Departament') }}
          </button>
      </div>
  </div>
{!!Form::close()!!} 
<!-- Krijimi e categories -->
  <!-- /.content -->
</div>
  </div>

@stop