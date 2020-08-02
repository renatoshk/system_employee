@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Attribute </h1>
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
  <div class="alert {{ Session::get('flash_type', 'alert-info') }}">
      <h3>{{ Session::get('flash_message') }} <a href="{{route('attrs.index')}}">Click here to see it!</a></h3>
  </div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('attrs.create')}}" class="btn btn-success" style="float: right;">Add New Role Attribute</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<br>
<br>
<!-- editimi e categories --> 
<div class="col-sm-6">
{!!Form::model($attribute, ['method'=>'PATCH', 'action'=>['AdminRoleAttrController@update', $attribute->id]]) !!}
<div class="form-group">
  {!!Form::select('role_id', $roles, null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <br>
    {!!Form::label('type', ' Type: ')!!}
    {!!Form::select('type', ['text' => 'Text', 'select' => 'Select', 'checkbox' => 'Checkbox'], null, ['class'=>'form-control'])!!}
    
</div>
<div class="form-group">
    <br>
    {!!Form::label('label', ' Label: ')!!}
     {!!Form::text('label', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <br>
    {!!Form::label('attr_code', 'Value : ')!!}
     {!!Form::text('attr_code', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::submit('Update Attribute  ', ['class'=>'btn btn-primary col-sm-6'])!!}
</div>
{!!Form::close()!!}
<!-- end editimi e categories -->

  <!-- /.content -->
</div>
</div>

@stop