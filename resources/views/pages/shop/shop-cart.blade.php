@extends('layouts.layout')

@section('title')
	Shop cart
@endsection

@section('page-name')
	Shop cart
@endsection

@section('body')
	<div class="container">
		<div class="row">
			<div id ="shopcart" ><!--table--> <!--tab 1--> 
				<div class="table-responsive table_bg">
					<table id="prod-status" class="table table-striped table-bordered table-hover">
						  <thead>
							<tr class="product_th">
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
								<tr>
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
								<tr>
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
								<tr>
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
								<tr>
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
								<tr>
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
								<tr>
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
								<tr>
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
								<tr>
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
								<tr>
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
@endsection