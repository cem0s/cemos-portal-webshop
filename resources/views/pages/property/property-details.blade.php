@extends('layouts.layout')

@section('title')
	Property Details
@endsection

@section('page-name')
	Property details
@endsection

@section('body')
	<div class="icon-bar">
	  <a href="{{url('shop/1')}}" class="alt-color" title="Shop"><i class="fa fa-shopping-cart"></i></a> 
	  <a href="#" title="Edit Property"><i class="fa fa-pencil" style="color:#B15022;"></i></a> 
	  <a href="#" class="alt-color" title="Product Status"><i class="fa fa-bar-chart"></i></a>
	  <a href="#" title="Property Details"><i class="fa fa-file-text-o" style="color:#B15022;"></i></a> 
	</div>
	<div id="property_detailsTabs" class="container">
		<div class="row">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">All</a></li>
				<li role="presentation"><a href="#profile2" aria-controls="profile" role="tab" data-toggle="tab">Floor Planner</a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Impression</a></li>
				<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Styleswitcher</a></li>
			</ul>
		
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home"> <!--tab 1 all-->
					<div class=" row carouselWrap">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 

							  <ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							  </ol>

							  <div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="{{asset('images/pd1.jpg')}}" alt="...">
										<div class="carousel-caption">
										</div>
									</div>
									<div class="item">
										<img src="{{asset('images/pd1.jpg')}}" alt="...">
											<div class="carousel-caption">
										</div>
									</div>
							  </div>
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								 <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								 </a>
							</div><!--end of carousel-->
					</div>
					<div id="quick_summary">
						<div class="row">
							<div class="col-md-12 no-padding text-capitalize">
								<h2> quick summary</h2>
							</div>
								<div class="col-md-6 no-padding">
									<h5 class=" col-md-6 no-padding"> Address:</h5>
									<p class="col-md-6">
										Achter de Kerk 1<br>
										43381 HL<br>
										Vlissingen<br>
										Netherland<br>
									</p>
								</div>
								<div class="col-md-6">
									<h5 class=" col-md-6"> Details:</h5>
									<p class="col-md-6">
										Build in :1960<br>
										Surface:251-350 m2<br>
										Floors: 5<br>
										Rooms: 4<br>
										Occupied: Yes<br>
									</p>
								</div>
								<div class="col-md-6 no-padding">
									<h5 class=" col-md-6 no-padding"> Property type:</h5>
									<p class="col-md-6">
										Commercial<br>
										Appartment<br>
										New Building<br>
									</p>
								</div>
								<div class="col-md-6">
									<h5 class="col-md-6"> Client info:</h5>
									<p class="col-md-6">
										Gladys<br>
										231564<br>
										094456755555<br>
										Gladys@gmail.com<br>
									</p>
								</div>
						</div>
					</div>
					<div id="googleMaps">
						<div class="row">
							<h2>Map</h2>
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15700.882948790952!2d123.9087278!3d10.3242119!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x55b6761870e09a41!2sCEMOS+Digital+Productions!5e0!3m2!1sen!2sph!4v1492784244407" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen>
							</iframe>
						</div>
					</div>
				</div> <!--end of tab 2 all-->
		
					<div role="tabpanel" class="tab-pane" id="profile2"> <!--tab 2 Floorplanner-->
						<div class=" row carouselWrap">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 

							  <ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							  </ol>

							  <div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="{{asset('images/pd2.jpg')}}" alt="...">
										<div class="carousel-caption">
										</div>
									</div>
									<div class="item">
										<img src="{{asset('images/pd1.jpg')}}" alt="...">
											<div class="carousel-caption">
										</div>
									</div>
							  </div>
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								 <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								 </a>
							</div><!--end of carousel-->
						</div>
					<div id="quick_summary">
						<div class="row">
							<div class="col-md-12 no-padding text-capitalize">
								<h2> quick summary</h2>
							</div>
								<div class="col-md-6 no-padding">
									<h5 class=" col-md-6 no-padding"> Address:</h5>
									<p class="col-md-6">
										Achter de Kerk 1<br>
										43381 HL<br>
										Vlissingen<br>
										Netherland<br>
									</p>
								</div>
								<div class="col-md-6">
									<h5 class=" col-md-6"> Details:</h5>
									<p class="col-md-6">
										Build in :1960<br>
										Surface:251-350 m2<br>
										Floors: 5<br>
										Rooms: 4<br>
										Occupied: Yes<br>
									</p>
								</div>
								<div class="col-md-6 no-padding">
									<h5 class=" col-md-6 no-padding"> Property type:</h5>
									<p class="col-md-6">
										Commercial<br>
										Appartment<br>
										New Building<br>
									</p>
								</div>
								<div class="col-md-6">
									<h5 class="col-md-6"> Client info:</h5>
									<p class="col-md-6">
										Gladys<br>
										231564<br>
										094456755555<br>
										Gladys@gmail.com<br>
									</p>
								</div>
						</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="messages">
						<div class=" row carouselWrap">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 

							  <ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							  </ol>

							  <div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="{{asset('images/pd3.jpg')}}" alt="...">
										<div class="carousel-caption">
										</div>
									</div>
									<div class="item">
										<img src="{{asset('images/pd2.jpg')}}" alt="...">
											<div class="carousel-caption">
										</div>
									</div>
							  </div>
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								 <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								 </a>
							</div><!--end of carousel-->
					</div>
					<div id="quick_summary">
						<div class="row">
							<div class="col-md-12 no-padding text-capitalize">
								<h2> quick summary</h2>
							</div>
								<div class="col-md-6 no-padding">
									<h5 class=" col-md-6 no-padding"> Address:</h5>
									<p class="col-md-6">
										Achter de Kerk 1<br>
										43381 HL<br>
										Vlissingen<br>
										Netherland<br>
									</p>
								</div>
								<div class="col-md-6">
									<h5 class=" col-md-6"> Details:</h5>
									<p class="col-md-6">
										Build in :1960<br>
										Surface:251-350 m2<br>
										Floors: 5<br>
										Rooms: 4<br>
										Occupied: Yes<br>
									</p>
								</div>
								<div class="col-md-6 no-padding">
									<h5 class=" col-md-6 no-padding"> Property type:</h5>
									<p class="col-md-6">
										Commercial<br>
										Appartment<br>
										New Building<br>
									</p>
								</div>
								<div class="col-md-6">
									<h5 class="col-md-6"> Client info:</h5>
									<p class="col-md-6">
										Gladys<br>
										231564<br>
										094456755555<br>
										Gladys@gmail.com<br>
									</p>
								</div>
						</div>
					</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="settings">
							<div class=" row carouselWrap">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 

								  <ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								  </ol>

								  <div class="carousel-inner" role="listbox">
										<div class="item active">
											<img src="{{asset('images/pd4.jpg')}}" alt="...">
											<div class="carousel-caption">
											</div>
										</div>
										<div class="item">
											<img src="{{asset('images/pd3.jpg')}}" alt="...">
												<div class="carousel-caption">
											</div>
										</div>
								  </div>
									<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									 <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									 </a>
								</div><!--end of carousel-->
						</div>
						<div id="quick_summary">
							<div class="row">
								<div class="col-md-12 no-padding text-capitalize">
									<h2> quick summary</h2>
								</div>
									<div class="col-md-6 no-padding">
										<h5 class=" col-md-6 no-padding"> Address:</h5>
										<p class="col-md-6">
											Achter de Kerk 1<br>
											43381 HL<br>
											Vlissingen<br>
											Netherland<br>
										</p>
									</div>
									<div class="col-md-6">
										<h5 class=" col-md-6"> Details:</h5>
										<p class="col-md-6">
											Build in :1960<br>
											Surface:251-350 m2<br>
											Floors: 5<br>
											Rooms: 4<br>
											Occupied: Yes<br>
										</p>
									</div>
									<div class="col-md-6 no-padding">
										<h5 class=" col-md-6 no-padding"> Property type:</h5>
										<p class="col-md-6">
											Commercial<br>
											Appartment<br>
											New Building<br>
										</p>
									</div>
									<div class="col-md-6">
										<h5 class="col-md-6"> Client info:</h5>
										<p class="col-md-6">
											Gladys<br>
											231564<br>
											094456755555<br>
											Gladys@gmail.com<br>
										</p>
									</div>
							</div>
						</div>
					</div>
			</div>		
		</div>
	</div>
@endsection