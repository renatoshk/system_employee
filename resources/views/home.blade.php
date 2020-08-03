@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="/chats" class="nav-link">Messages</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('profile', Auth::user()->id)}}"  class="nav-link">Edit</a>
                </li>
                  <li class="nav-item">
                    <a href="{{route('password')}}"  class="nav-link">Change Password</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">Your Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h2>{{Auth::user()->name}} {{Auth::user()->surname}}</h2>
                            <p>
                                {{Auth::user()->role->name}}, <?php if(Auth::user()->role_id == 2) {
                                  echo Auth::user()->dep->name;
                                } ?>
                            </p>
                            <h6>{{Auth::user()->email}}</h6>
                            <p>
                               Date Of Joining: {{Auth::user()->created_at->diffForHumans()}}
                            </p>
                        </div>
                        
                    </div>
                    <!--/row-->
                </div>
               
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="/images/{{Auth::user()->image->image}}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
        </div>
    </div>
</div>
@endsection

<!------ Include the above in your HEAD tag ---------->

                
