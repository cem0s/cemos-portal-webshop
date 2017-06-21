@extends('layouts.layout')
@section('title')
    Reset Password
@endsection

@section('page-name')

    WELCOME!
   

@endsection
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form name="resetForm" class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label"></label>
                                <div id="email" class="col-md-6">
                                    <input type="email" class="form-control" name="uemail" ng-model="user.email" ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" placeholder="Email *">
                                </div><br><br>
                                <span ng-show="resetForm.uemail.$error.required && resetForm.uemail.$touched">&emsp;<small><i>Email is required</i></small></span>
                                <span ng-show="resetForm.uemail.$dirty && resetForm.uemail.$error.pattern">&emsp;<small><i>Please enter a valid email.</i></small></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label"></label>
                                <div id="password" class="col-md-6">
                                    <input type="password" class="form-control" name="password" ng-model="user.password" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" ng-required="true" ng-minlength="5"   placeholder="Password *">
                                </div><br><br>
                                <span ng-show="resetForm.password.$error.required && resetForm.password.$touched">&emsp;<small><i>Password is required</i></small></span>
                                <span ng-show="resetForm.password.$invalid && resetForm.password.$error.pattern && resetForm.password.$touched">&emsp;<small><i>Password is either too short and the minimum length is 5 or must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol.).</i></small></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="col-sm-2 control-label"></label>
                                <div id="confirm_password" class="col-md-6">
                                    <input type="password" class="form-control" name="confirm_password" ng-model="user.confirm_password" ng-required="true"  placeholder="Confirm Password *" password-verify='user.password'>
                                </div><br><br>
                                <span ng-show="resetForm.confirm_password.$error.passwordVerify">&emsp;<small><i>Your passwords must match.</i></small></span>
                                <span ng-show="resetForm.confirm_password.$error.required && resetForm.confirm_password.$touched">&emsp;<small><i>Password confirmation is required.</i></small></span>
                        </div>
                     
                        <div class="form-group">
                            <label for="reset" class="col-sm-2 control-label"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
