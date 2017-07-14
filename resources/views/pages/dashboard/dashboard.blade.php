@extends('layouts.layout')

@section('title')
	Dashboard
@endsection

@section('page-name')
	Dashboard
@endsection


@section('body')

	<div class="container">
		<div class="row">
			<a href="#property">
				<div class="col-md-3">
					<div class="card" style="width: 26rem;">
					  <div class="card-block">
					    <h3 class="card-title"><i class="fa fa-home fa-3x black" aria-hidden="true" title="Property" style="color: #C8592A;"></i></h3>
					    <p class="card-text"> New Properties </p>
					    <span class="counter counterUpCss">{{$data['property']['count']}}</span>
					  </div>
					</div>
				</div>
			</a>
			<a href="#delivered"> 
				<div class="col-md-3">
					<div class="card" style="width: 26rem;">
					 	<div class="card-block">
						    <h3 class="card-title"><i class="fa fa-check fa-3x black" aria-hidden="true" title="Delivered" style="color: #C8592A;"></i></h3>
						    <p class="card-text">Delivered </p>
						   <span class="counter counterUpCss" style="display: inline-block; width: 32%">50</span>
					  </div>
					</div>
				</div>
			</a>
			<a href="#status">
				<div class="col-md-3">
					<div class="card" style="width: 26rem;">
						<div class="card-block">
						    <h3 class="card-title"><i class="fa fa-list fa-3x black" aria-hidden="true" title="Status" style="color: #C8592A;"></i></h3>
						    <p class="card-text">Order Status</p>
						   <span class="counter counterUpCss" style="display: inline-block; width: 32%">50</span>
						</div>
					</div>
				</div>
			</a>
			<a href="#message">
				<div class="col-md-3">
					<div class="card" style="width: 26rem;">
						<div class="card-block">
						    <h3 class="card-title"><i class="fa fa-file-text fa-3x black" aria-hidden="true" title="Messages" style="color: #C8592A;"></i></h3>
						    <p class="card-text">Messages</p>
						    <span class="counter counterUpCss" style="display: inline-block; width: 32%">50</span>
						</div>
					</div>
				</div>
			</a>
		</div>

		
	</div>

	<hr>
	<div  id="dashboard_wrap" class="container">
		<div id="property" class="custParagraph">Properties</div><hr>
		<div id ="home" class="table_border prod-status-table "><!--tab1-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th>Property Name</th>
							  <th>Address</th>
							  <th>Owner</th>
							  <th></th>
						</tr>
					  </thead>
					  <tbody>
					  		@if(isset($data['property']['property']) && !empty($data['property']['property']))
					  			@foreach($data['property']['property'] as $key => $value)
						  			<tr>
										<th scope="row" width="25%">
											<div class="product_name"><p>{{$value['name']}}</p></div>
											<div class="product_date"> <p>Created on {{date('F d, Y H:i:s A', strtotime($value['createdat']))}}</p></div>
										</th>
										<td class="align_middle" width="40%">
												{{$value['address1']}},	{{$value['town']}},	{{$value['country']}}, {{$value['zipcode']}}				 	
										</td>
										<td class="align_middle" width="20%">
												{{$value['user']['user']['firstname']}}	{{$value['user']['user']['lastname']}}		
											
										</td>
										<td class="align_middle" width="15%">
											<button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
										</td>
									</tr><!--end of stripe-->
					  			@endforeach
					  		@else 
					  		<tr><td>
					  			No data found.
					  		</td></tr>
							@endif
					  </tbody>
				</table>
			</div>
		</div><!--end of tab1-->

		<div id="delivered" class="custParagraph">Delivered</div><hr>			
		<div id ="menu1" class="table_border prod-status-table "><!-- tab2-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th>Order  Id</th>
							  <th>Product</th>
							  <th>Requestor</th>
							  <th></th>
						</tr>
					  </thead>
					  <tbody>
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>0991</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
										Photography						
								</td>
								<td class="align_middle" width="20%">
									Gladys Vailoces
								</td>
								<td class="align_middle" width="15%">
									<button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
								</td>
							</tr><!--end of stripe-->
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>0992</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
									Floorplanner			
								</td>
								<td class="align_middle" width="20%">
									Gladys Vailoces
								</td>
								<td class="align_middle" width="15%">
									<button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
								</td>
							</tr><!--end of stripe--><tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>0993</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
									Measurement						
								</td>
								<td class="align_middle" width="20%">
									Gladys Vailoces
								</td>
								<td class="align_middle" width="15%">
									<button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
								</td>
							</tr><!--end of stripe-->
						
					  </tbody>
				</table>
			</div>
		</div><!--end of tab2-->
					
		<div id="status" class="custParagraph">Status</div><hr>			
		<div id ="menu2" class="table_border prod-status-table "><!-- tab3-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th>Order Product</th>
							  <th>Product</th>
							  <th>Progress</th>
							  <th>Suppliers</th>
						</tr>
					  </thead>
					  <tbody>
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>1</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
									Photography			
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
										</div>
									</div>
									<div class="percent">
										<p >40 complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>	
								</td>
							</tr><!--end of stripe-->
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>2</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
									Measurement				
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70;">
										</div>
									</div>
									<div class="percent">
										<p >70% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>	
								</td>
							</tr><!--end of stripe--><tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>3</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
									 360 Styleswitcher							
								</td>
								<td class="align_middle" width="20%">
									<div class="progress progressBar">
										<div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										</div>
									</div>
									<div class="percent">
										<p >60% complete</p>
									</div>
								</td>
								<td class="align_middle" width="15%">
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>
									<i class="fa fa-user fa-lg white_bg" aria-hidden="true"></i>	
								</td>
							</tr><!--end of stripe-->
						
					  </tbody>
				</table>
			</div>
		</div><!--end of tab3-->

		<div id="message" class="custParagraph">Messages</div><hr>			
		<div id ="menu3" class="table_border prod-status-table "><!-- tab4-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th>Memo Id</th>
							  <th>From</th>
							  <th>Message</th>
							  <th></th>
						</tr>
					  </thead>
					  <tbody>
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>01</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
									 Gladys Vailoces						
								</td>
								<td class="align_middle" width="20%">
									Lorem Ipsum.....
								</td>
								<td class="align_middle" width="15%">
									<button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
								</td>
							</tr><!--end of stripe-->
							<tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>02</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
									Gladys Vailoces						
								</td>
								<td class="align_middle" width="20%">
									Lorem Ipsum
								</td>
								<td class="align_middle" width="15%">
									<button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
								</td>
							</tr><!--end of stripe--><tr>
								<th scope="row" width="25%">
									<div class="product_name"><p>03</p></div>
									<div class="product_date"> <p>Created jan  1, 2005</p></div>
								</th>
								<td class="align_middle" width="40%">
									Gladys Vailoces					
								</td>
								<td class="align_middle" width="20%">
									Lorem Ipsum
								</td>
								<td class="align_middle" width="15%">
									<button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
								</td>
							</tr><!--end of stripe-->
						
					  </tbody>
				</table>
			</div>
		</div><!--end of tab4-->
					

	</div><!--end of shop page-->
	
</div>
@endsection
