@extends('layouts.app')
@section('content')
<!------ Include the above in your HEAD tag ---------->
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-info') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<div class="container">
                    {!!Form::model(Auth::user(), ['method'=>'PATCH', 'action'=>['ProfileController@update', Auth::user()->id], 'files'=>'true'])!!}
   <div class="row my-2">
     <div class="col-lg-4 order-lg-1 text-center">
            <img src="/images/{{Auth::user()->image->image}}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="file" name="image_id" class="custom-file-input">
                <span class="custom-file-control">Choose file</span>
            </label>
        </div>
    <div class="col-lg-8 order-lg-2">
      <div class="tab-pane" id="edit">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="name" type="text" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="surname" value="{{Auth::user()->surname}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="username" value="{{Auth::user()->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <button type="submit" class="btn btn-primary" value="Save Changes">Save Changes</button>
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
                </div> 
            </div>
      </div>  
@stop