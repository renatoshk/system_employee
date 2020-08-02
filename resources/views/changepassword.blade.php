@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="min-height: 500px;">
    <br>
    @if ( Session::has('flash_message') )
       <div class="alert {{ Session::get('flash_type', 'alert-success') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
       </div>
    @endif
    <br>

    <!-- Main content -->
    
              <!-- /.card-header -->
      <div class="row justify-content-center">           
              <!-- form start -->
    {!!Form::model($user, ['method'=>'PATCH', 'action'=>['ProfileController@changepassword',$user->id]])!!}
              <h1>Change Password!</h1>  
              <br>
          <div class="card-body">
              <div class="form-group row {{$errors->has('oldpassword') ? 'has-error' : ''}}">
                {!!Form::label('oldpassword', 'Old Password:')!!}
                {!!Form::password('oldpassword', ['class'=>'form-control'])!!}
              </div>
                <div class="form-group row">
                        <label for="password">{{ __('Password: ') }}
                        </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                  </div>
                  <div class="form-group row">
                              <label for="password-confirm" >{{ __('Confirm Password: ') }}
                              </label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                  <div class="form-group">
                         {!!Form::submit('Change', ['class'=>'btn btn-primary'])!!}
                  </div>
                  
            </div>
                <!-- /.card-body -->

              {!!Form::close()!!}
            </div>  
       </div>
  @stop
 

