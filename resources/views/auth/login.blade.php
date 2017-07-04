@extends('layouts.layout')
@section('title')
    Login
@endsection

@section('page-name')

    WELCOME!
   

@endsection
@section('body')
<div class="container" ng-controller="userController">
@if (session('status')) 
    {{ session('status') }}      
@endif

<br><br><br>
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <div class="modal-body">
                                            
                        <form name="userForm" class="form-horizontal" method="POST"  action="{{url('login')}}" >
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">  <!-- Company -->
                               <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"></label>
                                        <div id="email" class="col-sm-12">
                                            <input type="text" class="form-control" name="email" ng-model="user.email" ng-required="true"  placeholder="Email">
                                        </div>
                                        <div class="col-sm-12">
                                            <span ng-show="userForm.email.$error.required && userForm.email.$touched"><br> <small><i>Email field is required</i></small></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label"></label>
                                        <div id="password" class="col-sm-12">
                                            <input type="password" class="form-control" name="password" ng-model="user.password" ng-required="true"  placeholder="Password">
                                        </div>
                                        <div class="col-sm-12">
                                            <span ng-show="userForm.password.$error.required && userForm.password.$touched"><br><small><i>Password is required</i></small></span>
                                        </div>
                                       
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary" ng-disabled="userForm.$invalid"> Log in</button>
                                    </div>
                                </div>
                                @if (session('failedAttempt')) 
                                    {{ session('failedAttempt') }}  <br>
                                    <div class="g-recaptcha" data-sitekey="6LdQuicUAAAAAI-mcIX4BycZ_5S2z-jabke6T53h" data-callback="callback" ></div>
                                    <br>    
                                @endif
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <a href="{{url('password/reset')}}">Forgot Password? Reset here.</a>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        </form>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


