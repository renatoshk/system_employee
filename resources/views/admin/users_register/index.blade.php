@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <br>
    @if ( Session::has('flash_message') )
    <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
    </div>
    @endif
    <br>
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('users.create')}}" class="btn btn-success" style="float: right;">Add User</a>
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
    <h3 class="card-title">All Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="categories" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
    
  </thead>
  <tbody>
  @if($users) 	
    @foreach($users as $user)	
    <tr>
      <td>{{$user->id}}</td>
      <td><a style="color: black" href="{{route('users.edit', $user->id)}}">{{$user->username}}</a></td>
      <td>{{$user->email}}</td>
      <td>{{$user->role->name}}</td>
      <td>{{$user->email_verified_at  ? 'active' : 'No Active'}}</td>
      <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'No data'}}</td>
      <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : 'No data'}}</td>
      <td><a style="color: black" href="{{route('users.edit', $user->id)}}">Edit</a></td>
      <td>
      {!!Form::open(['method'=>'DELETE' , 'action'=>['AdminUsersController@destroy', $user->id]])!!}
       <div class="form-group">
        {!!Form::submit('DELETE USER', ['class'=>'btn btn-danger'])!!}
       </div>
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
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
    </section>
</div>
@stop