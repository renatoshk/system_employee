@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add  Departament</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Departament</li>
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
{!!Form::open(['method'=>'POST', 'action'=>'AdminDepController@store']) !!}
<div class="form-group">
  {!!Form::select('primary_dep_id', [''=>'Choose Primary Departament']+$primary_deps, null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <br>
    {!!Form::label('name', ' Name: ')!!}
     {!!Form::text('name', null,  ['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::submit('Create', ['class'=>'btn btn-primary col-sm-7'])!!}
</div>
{!!Form::close()!!}
<!-- Krijimi e categories -->
  <!-- /.content -->
</div>
  </div>

@stop