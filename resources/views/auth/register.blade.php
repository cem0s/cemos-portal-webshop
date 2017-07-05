@extends('layouts.layout')
@section('title')
    Register
@endsection

@section('page-name')
    Welcome!
@endsection
@section('body')
<div class="container" ng-controller="userController">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <div id="tab_login" class="modal-body">
                    <h5 class="loginh5"> Sign up</h5>
                    <hr>
                    Make sure to fill up all with <strong style="color: red;">*</strong> marks.
                    <hr>
                        <ul  class="nav nav-tabs" role="tablist"> <!-- tab -->  
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">1. Company</a></li>
                            <li role="presentation"><a href="#profile2" aria-controls="profile" role="tab" data-toggle="tab">2. Address</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">3. User Information</a></li>
                        </ul>                       
                        <form name="userForm" class="form-horizontal" novalidate="">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">  <!-- Company -->
                               
                                <div class="form-group">
                                    <label for="company_name" class="col-sm-2 control-label"></label>
                                        <div id="company_name" class="col-sm-12">
                                            <input type="text" class="form-control" name="company_name" ng-model="user.company_name" ng-required="true"  placeholder="Company *">
                                        </div>
                                        <div class="col-sm-12">
                                            <span ng-show="userForm.company_name.$error.required && userForm.company_name.$touched"><br> <small><i>Name field is required</i></small></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="chamberofCommerce" class="col-sm-2 control-label"></label>
                                        <div id="chamberofCommerce" class="col-sm-12">
                                            <input type="text" class="form-control" ng-model="user.chamberofCommerce"  placeholder="Chamber of Commerce">
                                        </div>
                                       
                                </div>
                                <div class="form-group">
                                        <label for="company_phone" class="col-sm-2 control-label"></label>
                                        <div id="company_phone" class="col-sm-12">
                                            <input type="text" class="form-control" name="company_phone" ng-model="user.company_phone" ng-required="true"  placeholder="Phone*">
                                        </div>
                                        <div class="col-sm-12">
                                            <span ng-show="userForm.company_phone.$error.required && userForm.company_phone.$touched"><br><small><i>Phone field is required</i></small></span>
                                        </div>
                                       
                               
                                </div>
                                <div class="radioWrap form-group ">
                                    <div class="col-xs-12 radio ">
                                          Payment Method <br> <br>
                                          <label id="show" class="radioWrap">
                                            <input type="radio" name="isDebit" ng-model="user.isDebit" id="optionsRadios1" value="Debit" checked>
                                                Direct debit
                                          </label>
                                          <label id="hide">
                                            <input type="radio" name="isDebit"  ng-model="user.isDebit" id="optionsRadios2" value="Invoice">
                                                By invoice (3.50$ per invoice)
                                          </label>
                                    </div>
                                </div>
                                <div id="all">
                                    <div class="form-group">
                                        <label for="tax_number" class="col-sm-2 control-label"></label>
                                        <div id="tax_number" class="col-sm-12">
                                            <input type="text" class="form-control" ng-model="user.tax_number" placeholder="Tax Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="iban" class="col-sm-2 control-label"></label>
                                        <div id="iban" class="col-sm-12">
                                            <input type="text" class="form-control" ng-model="user.iban" placeholder="IBAN">
                                        </div>
                                    </div>
                                </div>
                                <div  class="form-group">
                                    <div class="login_pager col-sm-12 ">  <!-- Pager -->
                                        <nav aria-label="..." id="tab1" >
                                          <ul class="pager">
                        
                                            <li><a href="#" class="btnNext">Next</a></li>
                                          </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile2"> <!-- address tab -->          
                                     <div class="form-group">
                                        <label for="address_1" class="col-sm-2 control-label"></label>
                                            <div id="address_1" class="col-sm-12">
                                                <input type="text" class="form-control" name="address_1" ng-model="user.address_1" ng-required="true"  placeholder="Address 1 *">
                                            </div>
                                            <div class="col-sm-12">
                                                <span ng-show="userForm.address_1.$error.required && userForm.address_1.$touched"><br><small><i>Address 1 is required</i></small></span>
                                            </div>

                                    </div>
                                    <div class="form-group">
                                       <label for="address_2" class="col-sm-2 control-label"></label>
                                            <div id="address_2" class="col-sm-12">
                                                <input type="text" class="form-control" ng-model="user.address_2"  placeholder="Address 2 ">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="town" class="col-sm-2 control-label"></label>
                                            <div id="town" class="col-sm-12">
                                                <input type="text" class="form-control" name="town" ng-model="user.town" ng-required="true"  placeholder="Town *">
                                            </div>
                                            <div class="col-sm-12">
                                                <span ng-show="userForm.town.$error.required && userForm.town.$touched"><br><small><i>Town is required</i></small></span>
                                            </div>

                                    </div>     
                                    <div class="form-group">
                                        <label for="postal_code" class="col-sm-2 control-label"></label>
                                            <div id="postal_code" class="col-sm-12">
                                                <input type="text" class="form-control" name="postal_code" ng-model="user.postal_code" ng-required="true"  placeholder="Postal Code *">
                                            </div>
                                            <div class="col-sm-12">
                                                <span ng-show="userForm.postal_code.$error.required && userForm.postal_code.$touched"><br><small><i>Postal Code is required</i></small></span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="house_number" class="col-sm-2 control-label"></label>
                                            <div id="house_number" class="col-sm-12">
                                                <input type="text" class="form-control" ng-model="user.house_number"  placeholder="House Number">
                                            </div>
                                            
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="col-sm-2 control-label"></label>
                                            <div id="telephone" class="col-sm-12">
                                                <input type="text" class="form-control" name="telephone" ng-model="user.telephone" ng-required="true"  placeholder="Telephone *">
                                            </div>
                                            <div class="col-sm-12"><br>
                                                <span ng-show="userForm.telephone.$error.required && userForm.telephone.$touched"><br><small><i>Telephone is required</i></small></span>
                                            </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="login_pager col-sm-12">  <!-- Pager -->
                                            <nav aria-label="..." id="tab2">
                                              <ul class="pager">
                                                     <li><a href="#" class="btnPrevious">Previous</a></li>
                                                    <li><a href="#" class="btnNext">Next</a></li>
                                              </ul>
                                            </nav>
                                        </div>
                                    </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages"> <!-- user information tab -->
                                      
                                <div class="form-group">
                                   <label for="first_name" class="col-sm-2 control-label"></label>
                                        <div id="first_name" class="col-sm-12">
                                            <input type="text" class="form-control" name="first_name" ng-model="user.first_name" ng-required="true"  placeholder="First Name *">
                                        </div>
                                        <div class="col-sm-12">
                                            <span ng-show="userForm.first_name.$error.required && userForm.first_name.$touched"><br><small><i>First Name is required</i></small></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                   <label for="last_name" class="col-sm-2 control-label"></label>
                                        <div id="last_name" class="col-sm-12">
                                            <input type="text" class="form-control" name="last_name" ng-model="user.last_name" ng-required="true"  placeholder="Last Name *">
                                        </div>
                                        <div class="col-sm-12">
                                            <span ng-show="userForm.last_name.$error.required && userForm.last_name.$touched"><br><small><i>Last Name is required</i></small></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"></label>
                                        <div id="email" class="col-sm-12">
                                            <input type="email" class="form-control" name="uemail" ng-model="user.email" ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" placeholder="Email *">
                                        </div>
                                        <div class="col-sm-12">
                                            <span ng-show="userForm.uemail.$error.required && userForm.uemail.$touched"><br><small><i>Email is required</i></small></span>
                                            <span ng-show="userForm.uemail.$dirty && userForm.uemail.$error.pattern"><br><small><i>Please enter a valid email.</i></small></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label"></label>
                                        <div id="password" class="col-sm-12">
                                            <input type="password" class="form-control" name="password" ng-model="user.password" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" ng-required="true" ng-minlength="5"   placeholder="Password *">
                                        </div>
                                         <div class="col-sm-12">
                                            <span ng-show="userForm.password.$error.required && userForm.password.$touched"><br><small><i>Password is required</i></small></span>
                                            <span ng-show="userForm.password.$invalid && userForm.password.$error.pattern && userForm.password.$touched"><br><small><i>Password is either too short and the minimum length is 5 or must contain one lower &amp; uppercase letter, and one non-alpha character (a number or a symbol.).</i></small></span>

                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password" class="col-sm-2 control-label"></label>
                                        <div id="confirm_password" class="col-sm-12">
                                            <input type="password" class="form-control" name="confirm_password" ng-model="user.confirm_password" ng-required="true"  placeholder="Confirm Password *" password-verify='user.password'>
                                        </div>
                                        <div class="col-sm-12">
                                           <span ng-show="userForm.confirm_password.$error.passwordVerify"><br><small><i>Your passwords must match.</i></small></span>
                                           <span ng-show="userForm.confirm_password.$error.required && userForm.confirm_password.$touched"><br><small><i>Password confirmation is required.</i></small></span>
                                        </div>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LdQuicUAAAAAI-mcIX4BycZ_5S2z-jabke6T53h" data-callback="callback" ></div>
                                 <div class="form-group">
                                   <label for="cap" class="col-sm-2 control-label"></label>
                                        <div id="cap" class="col-sm-12">
                                            <input type="hidden" class="form-control" id="captcha" name="captcha" ng-model="user.captcha">
                                        </div>
                                      
                                </div>
                                <div class="form-group">
                                    <div class=" col-sm-12 checkboxWrap">
                                        <div class="checkbox ">
                                            <label>
                                                <input type="checkbox" ng-model="user.isAgree" ng-required="true" value="1" > I agree to the <a href="#">Terms of Sevices</a> and <a href="#">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="login_pager col-sm-12">  <!-- Pager -->
                                        <nav aria-label="..." id="tab3">
                                          <ul class="pager">
                                            <li><a href="#" class="btnPrevious">Previous</a></li>
                                            <li><button type="button" class="btn btn-primary" ng-click="save('add')" ng-disabled="userForm.$invalid">Register <i class="fa fa-spinner fa-spin" ng-show="saving" ></i></button></li>
                                          </ul>
                                        </nav>
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


