@extends('layouts.layout')

@section('title')
	Profile
@endsection

@section('page-name')
	Profile
@endsection

@section('body')
	<div class="row">
		<div id="profile" class="container">
			<div class="col-md-3 profile_pic ">
				<div class="profile_picWrap">
					<div class="profile_bg text-center">
						<a href="#"><img src="images/user.png"/></a>
					</div>
					<h3>Dwight lawrence</h3>
					<p>Owner ar Our Company, Inc </p>
					<div class="active_wrap">	Status
						<p>Active</p>	
					</div>
					<hr></hr>
					<p class="profile_date">Membership: jan,17, 1989</p>
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
							<div class="table-responsive table_bg">
								<table id="prod-status" class="table table-striped table-bordered table-hover">
									  <thead>
										<tr class="product_th text-uppercase">
											  <th>About</th>
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
					<div class="tab-pane" id="2a">
						<div id ="Profile_account" class="prod-status-table "><!--table--> <!--tab 2--> 
							<div class="table-responsive table_bg">
								<table id="prod-status" class="table table-striped table-bordered table-hover">
									  <thead>
										<tr class="product_th text-uppercase">
											  <th>Profile</th>
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
					<div class="tab-pane" id="3a">
						<div id ="Profile_account" class="prod-status-table "><!--table--> <!--tab 1--> 
							<div class="table-responsive table_bg">
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
@endsection

