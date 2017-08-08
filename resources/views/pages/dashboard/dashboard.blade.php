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
			<a href="#status">
				<div class="col-md-3">
					<div class="card" style="width: 26rem;">
						<div class="card-block">
						    <h3 class="card-title"><i class="fa fa-list fa-3x black" aria-hidden="true" title="Status" style="color: #C8592A;"></i></h3>
						    <p class="card-text">Order Status</p>
						   <span class="counter counterUpCss" style="display: inline-block; width: 32%">{{count($data['orders'])}}</span>
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
						   <span class="counter counterUpCss" style="display: inline-block; width: 32%">{{($data['deliverdCount'])}}</span>
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
											<a href="{{url('property-details')}}/{{$value['id']}}" class="btn btn-primary"><i class="fa fa-arrow-right"></i></a>
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
							  <th></th>
							  <th>Property</th>
							  <th>Requestor</th>
							  <th></th>
						</tr>
					  </thead>
					   <tbody>
					  		@if(isset($data['orders']) && !empty($data['orders']))
					  			@foreach($data['orders'] as $key => $value)
					  				@if($value['status'] == "Delivered")
							  			<tr>
											<th scope="row" width="25%">
												<div class="product_name"><p>Order # {{$value['id']}}</p></div>
												<div class="product_date"> <p>Created on {{date('F d, Y H:i:s A', strtotime($value['createdAt']))}}</p></div>
											</th>
											<td class="align_middle" width="40%">
													{{$value['address1']}},	{{$value['town']}},	{{$value['country']}}, {{$value['zipcode']}}				 	
											</td>
											<td class="align_middle" width="20%">
													{{$value['firstName']}}	{{$value['lastName']}} - {{$value['company']}}
												
											</td>
											<td class="align_middle" width="15%">
												<a href="{{url('order-details')}}/{{$value['id']}}" class="btn btn-primary"><i class="fa fa-arrow-right"></i></a>
											</td>
										</tr><!--end of stripe-->
									@endif
					  			@endforeach
					  		@else 
					  		<tr><td>
					  			No data found.
					  		</td></tr>
							@endif
					  </tbody>
					
				</table>
			</div>
		</div><!--end of tab2-->
					
		<div id="status" class="custParagraph">ORDER Status</div><hr>			
		<div id ="menu2" class="table_border prod-status-table "><!-- tab3-->
			<div class="table-responsive table_bg">
				<table id="prod-status" class="table table-striped table-bordered table-hover">
					  <thead>
						<tr class="product_th text-capitalize">
							  <th></th>
							  <th>Property</th>
							  <th>Requestor</th>
							  <th></th>
						</tr>
					  </thead>
					   <tbody>
					  		@if(isset($data['orders']) && !empty($data['orders']))
					  			@foreach($data['orders'] as $key => $value)
							  			<tr>
											<th scope="row" width="25%">
												<div class="product_name"><p>Order # {{$value['id']}}</p></div>
												<div class="product_date"> <p>Created on {{date('F d, Y H:i:s A', strtotime($value['createdAt']))}}</p></div>
											</th>
											<td class="align_middle" width="40%">
													{{$value['address1']}},	{{$value['town']}},	{{$value['country']}}, {{$value['zipcode']}}				 	
											</td>
											<td class="align_middle" width="20%">
													{{$value['firstName']}}	{{$value['lastName']}} - {{$value['company']}}
												
											</td>
											<td class="align_middle" width="15%">
												{{$value['status']}}
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
