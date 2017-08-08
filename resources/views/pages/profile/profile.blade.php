@extends('layouts.layout')

@section('title')
	Profile
@endsection

@section('page-name')
	Profile
@endsection

@section('body')
<div ng-controller="userController">
	<div class="row">
		<div id="profile" class="container">
		@if (session('status')) 
		    {{ session('status') }}      
		@endif
		<br><br>
			<div class="col-md-3 profile_pic ">
				<div class="profile_picWrap">
					<div class="profile_bg text-center">
						<div class="profile-pic">
							@if(Auth::user()->getProfilePic() == "")
								<img src="{{url('images/user-avatar.png')}}" class="img-circle" style="height: 200px;width: 226px;" />
							@else 
								<img src="{{Auth::user()->getProfilePic()}}" class="img-circle" />
							@endif
						</div>
					</div>
					<br>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".change-pic">Edit Image</button>
					<h3>{{$userData['user']['firstname']}} {{$userData['user']['lastname']}}</h3>
					<p>User at {{$userData['company']['name']}} </p>
					<br>
					<div>	Status : 
						<strong style="color:green">Active</strong>	
					</div>
					<hr></hr>
					<p class="profile_date">Membership: {{date('F d, Y', strtotime($userData['user']['created_at']))}}</p>
				</div>
		
			</div>
			<div class="col-md-9">	
				<ul  class="nav nav-pills">
					<li class="active">
						<a  href="#1a" data-toggle="tab">Home</a>
					</li>
					<li>
						<a href="#2a" data-toggle="tab">Profile</a>
					</li>
					<li>
						<a href="#3a" data-toggle="tab">Messages</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="1a">
						<div id ="Profile_account" class="prod-status-table "><!--table--> <!--tab 1--> 
							<div class=" table_bg">
								<h4><i class="fa fa-list-alt fa-fw" aria-hidden="true"></i> Activity Log</h4><hr>
									<div style="height:390px;overflow-y:scroll;;">
										@if(isset($userData['logs']) && !empty($userData['logs']))
										<table class="table">
											<thead>
												<tr>
													<th></th>
												</tr>
											</thead>
											<tbody>
												@foreach ($userData['logs'] as $key => $logValue)
												<tr>
													<td>
														<div class="list-group-item">
						        							<h5 class="list-group-item-heading">Log #{{$logValue['log_id']}}</h5>
						        							<p class="customP">Created on {{date('F d, Y H:i:s A', strtotime($logValue['created_at']))}}</p>
						        							<p class="list-group-item-text">{{$logValue['data']}}</p>
						        						</div>
					        						</td>
												</tr>
												@endforeach
											</tbody>
										</table>
										@else
										<p>No logs found.</p>
										@endif
									</div>
							</div>
						</div>	<!--End of table-->
					</div>
					<div class="tab-pane" id="2a">
						<div id ="Profile_account" class="prod-status-table "><!--table--> <!--tab 2--> 
							<div class="table_bg">
							<h4><i class="fa fa-address-card-o fa-fw" aria-hidden="true"></i> Overview</h4><hr>
								<table id="prod-status" class="table">
									  <thead>
										<tr class="product_th text-uppercase">
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th>
												<div class="text-right">
													<a class="wrench orange btn btn-default btn-xs" href="" role="button" ng-click="editModal({{$userData['user']['id']}})">Edit</a>
												</div>
											</th>
										</tr>
									  </thead>
									  <tbody>
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names "><p>First Name:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['user']['firstname']}}</p></div>				
												</td>
												<th class="row" >
													<div class="Profile_names"><p>Last Name:</p></div>				
												</th>
												<td class="align_middle" >
													<div class="Profile_names"><p>{{$userData['user']['lastname']}}</p></div>		
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>User Name: </p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['user']['username']}}</p></div>				
												</td>
												<th class="row">
													<div class="Profile_names"><p>Email:</p></div>				
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['user']['email']}}</p></div>		
												</td>
											</tr><!--end of stripe-->
											
											<tr class="text-capitalize">
												
												<th  scope="row">
													<div class="Profile_names"><p>Address 1:</p></div>				
												</th>
												<td class="align_middle">
													<div class="Profile_names">{{$userData['address']['address_1']}}<p></p></div>		
												</td>
												<th  scope="row">
													<div class="Profile_names"><p>Address 2:</p></div>				
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['address']['address_2']}}</p></div>		
												</td>
											</tr><!--end of stripe-->

											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>City:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['address']['town']}}</p></div>				
												</td>
												<th  scope="row">
													<div class="Profile_names"><p>Country:</p></div>				
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['address']['country']}}</p></div>		
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>Zipcode:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['address']['zipcode']}}</p></div>				
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
												</th>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>Company:</p></div>
												</th>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>Name:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['company']['name']}}</p></div>				
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>Phone:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>{{$userData['company']['phone']}}</p></div>				
												</td>
											</tr><!--end of stripe-->
									
										</tbody>
								</table>
							</div>
						</div>	<!--End of table-->
					</div>
					<div class="tab-pane" id="3a">
						<div id ="Profile_account" class="prod-status-table "><!--table--> <!--tab 1--> 
							<div class="table_bg">
								<table id="prod-status" class="table table-striped table-bordered table-hover">
									  <thead>
										<tr class="product_th text-uppercase">
											  <th>Messages</th>
											  <th></th>
											  <th></th>
											  <th>
													<div class="text-right">
														<a class="wrench orange btn btn-default btn-xs" href="#" role="button">Edit</a>
													</div>
											  </th>
											  
										</tr>
									  </thead>
									  <tbody>
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names "><p>first name</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>Dwight</p></div>				
												</td>
												<td class="align_middle" >
													<div class="Profile_names"><p>Last Name:</p></div>				
												</td>
												<td class="align_middle" >
													<div class="Profile_names"><p>Lawrence</p></div>		
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>User Name: </p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>Dwight</p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p>Email</p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p>Dwight@gmail.com</p></div>		
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>City:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>California</p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p>Country</p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p>AMERICA</p></div>		
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>Birthday:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>June 19, 1989</p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>		
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names"><p>Phone</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p>2320562</p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>		
												</td>
											</tr><!--end of stripe-->
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names "><p >:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>		
												</td>
											</tr><!--end of stripe-->	
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names "><p >:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>		
												</td>
											</tr><!--end of stripe-->	
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names "><p >:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>		
												</td>
											</tr><!--end of stripe-->			
											<tr class="text-capitalize">
												<th scope="row">
													<div class="Profile_names "><p >:</p></div>
												</th>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>				
												</td>
												<td class="align_middle">
													<div class="Profile_names"><p></p></div>		
												</td>
											</tr><!--end of stripe-->				
											
										</tbody>
								</table>
							</div>
						</div>	<!--End of table-->
					</div>
				</div>
			</div> <!--end of col-md 9-->
		</div>
	</div>
	<div class="modal change-pic" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header"><h4>Update Profile Picture</h4></div>
	      <form action="{{url('update-pic')}}" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body" align="center">
	      		<input type="hidden" name="_token" value="{{csrf_token()}}">
	      		<input type="hidden" name="user_id" value="{{Auth::user()->getId()}}">
	      		@if(Auth::user()->getProfilePic() == "")
					<img src="{{url('images/user-avatar.png')}}" id="changePic" class="img-responsive" width="200" height="200" />
				@else 
					<img src="{{Auth::user()->getProfilePic()}}" id="changePic" class="img-responsive" width="200" height="200"/>
				@endif
				<div class="fileUpload btn btn-default">
				    <span>Browse</span>
				    <input type="file" class="upload" name="profile-pic" onchange="readURL(this, '{{url('images/user-avatar.png')}}');"/>
				</div>
	
	      		<div class="modal-footer-profile">
		  			<button type="submit" class="btn btn-primary"  id="changeOnSuccess" disabled="disabled">Update</button>
		  		</div>
	      	</div>
	      </form>
	    </div>
	  </div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" aria-hidden="true" id="edit-profile">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header"><h4>Update Profile</h4></div>
	    
	      	<div class="modal-body">
	      	  	<form name="userForm" class="form-horizontal">
	      		<input type="hidden" name="_token" value="{{csrf_token()}}">
	      		Company Information <br><br>
      			<div class="form-group">
                    <label for="company_name" class="col-sm-4 control-label">Company Name</label>
                    <div id="company_name" class="col-sm-4">
                        <input type="text" class="form-control" name="company_name" ng-model="user.company.name" ng-required="true"  placeholder="Company *">
                    </div>
                    <div class="col-sm-4">
                        <span ng-show="userForm.company_name.$error.required && userForm.company_name.$touched"><br> <small><i>Name field is required</i></small></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="chamberofCommerce" class="col-sm-4 control-label">Chamber of Commerce</label>
                    <div id="chamberofCommerce" class="col-sm-4">
                        <input type="text" class="form-control" ng-model="user.invoiceaddress.cocNumber"  placeholder="Chamber of Commerce">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_phone" class="col-sm-4 control-label">Company Phone</label>
                    <div id="company_phone" class="col-sm-4">
                        <input type="text" class="form-control" name="company_phone" ng-model="user.company.phone" ng-required="true"  placeholder="Phone*">
                    </div>
                    <div class="col-sm-4">
                        <span ng-show="userForm.company_phone.$error.required && userForm.company_phone.$touched"><br><small><i>Phone field is required</i></small></span>
                    </div>
                </div>
                <br><br>
                User Information <br><br>
                <div class="form-group">
                   <label for="first_name" class="col-sm-4 control-label">First Name</label>
                    <div id="first_name" class="col-sm-4">
                        <input type="text" class="form-control" name="first_name" ng-model="user.user.firstname" ng-required="true"  placeholder="First Name *">
                    </div>
                    <div class="col-sm-4">
                        <span ng-show="userForm.first_name.$error.required && userForm.first_name.$touched"><br><small><i>First Name is required</i></small></span>
                    </div>
                </div>
                <div class="form-group">
                   <label for="last_name" class="col-sm-4 control-label">LastName</label>
                        <div id="last_name" class="col-sm-4">
                            <input type="text" class="form-control" name="last_name" ng-model="user.user.lastname" ng-required="true"  placeholder="Last Name *">
                        </div>
                        <div class="col-sm-4">
                            <span ng-show="userForm.last_name.$error.required && userForm.last_name.$touched"><br><small><i>Last Name is required</i></small></span>
                        </div>
                </div>
               {{--  <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email</label>
                        <div id="email" class="col-sm-4">
                            <input type="email" class="form-control" name="uemail" ng-model="user.user.email" ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" placeholder="Email *">
                        </div>
                        <div class="col-sm-4">
                            <span ng-show="userForm.uemail.$error.required && userForm.uemail.$touched"><br><small><i>Email is required</i></small></span>
                            <span ng-show="userForm.uemail.$dirty && userForm.uemail.$error.pattern"><br><small><i>Please enter a valid email.</i></small></span>
                        </div>
                </div> --}}
                Address Information <br><br>
                 <div class="form-group">
                    <label for="address_1" class="col-sm-4 control-label">Address 1</label>
                        <div id="address_1" class="col-sm-4">
                            <input type="text" class="form-control" name="address_1" ng-model="user.address.address_1" ng-required="true"  placeholder="Address 1 *">
                        </div>
                        <div class="col-sm-4">
                            <span ng-show="userForm.address_1.$error.required && userForm.address_1.$touched"><br><small><i>Address 1 is required</i></small></span>
                        </div>

                </div>
                <div class="form-group">
                   <label for="address_2" class="col-sm-4 control-label">Address 2</label>
                        <div id="address_2" class="col-sm-4">
                            <input type="text" class="form-control" ng-model="user.address.address_2"  placeholder="Address 2 ">
                        </div>
                </div>
                <div class="form-group">
                    <label for="town" class="col-sm-4 control-label">Town</label>
                        <div id="town" class="col-sm-4">
                            <input type="text" class="form-control" name="town" ng-model="user.address.town" ng-required="true"  placeholder="Town *">
                        </div>
                        <div class="col-sm-4">
                            <span ng-show="userForm.town.$error.required && userForm.town.$touched"><br><small><i>Town is required</i></small></span>
                        </div>

                </div>     
                <div class="form-group">
                    <label for="postal_code" class="col-sm-4 control-label">Postal Code</label>
                        <div id="postal_code" class="col-sm-4">
                            <input type="text" class="form-control" name="postal_code" ng-model="user.address.zipcode" ng-required="true"  placeholder="Postal Code *">
                        </div>
                        <div class="col-sm-4">
                            <span ng-show="userForm.postal_code.$error.required && userForm.postal_code.$touched"><br><small><i>Postal Code is required</i></small></span>
                        </div>
                </div>
                </form>
	      	</div>
	      	 <div class="modal-footer">
	      	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  			<button type="submit" class="btn btn-primary" ng-click="save('edit')" ng-disabled="userForm.$invalid">Update <i class="fa fa-spinner fa-spin" ng-show="saving" ></i></button>
	  		</div>
	    </div>
	  </div>
	</div>
</div>
@endsection

