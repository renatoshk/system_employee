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
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
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
                <div class="tab-pane" id="messages">
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div>
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros. 
                                </td>
                            </tr>
                        </tbody> 
                    </table>
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

                
