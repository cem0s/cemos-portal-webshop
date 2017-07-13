@extends('layouts.layout')
@section('title')
	Shop
@endsection

@section('page-name')
	Shop
@endsection

@section('body')

	<div class="wizard">
        <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#step1" data-toggle="tab"  aria-controls="step1" role="tab" title="Choose Services">
                        <span class="round-tab">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                    </a>
                </li>

                <li role="presentation" class="disabled">
                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Fill Up Forms">
                        <span class="round-tab">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Review Order">
                        <span class="round-tab">
                            <i class="fa fa-check-square-o"></i>
                        </span>
                    </a>
                </li>
             
            </ul>
        </div>
    

	     <div class="tab-content">
	        <div class="tab-pane active" role="tabpanel" id="step1">
	           <div class="shop_page">
					<div class="row">
						<div class="col-md-3">
							<h2 class="text-center text-uppercase"> photography</h2>
							<div class="cont">
								<img src="{{url('images/s1.jpg')}}" class="img_responsive" width="100%"/>
								<div class="overlay">
									<div class="text">
										<table class="table" style="color: white;">
												<tr>
													<td></td>
													<td></td>
													<td><i class="fa fa-cart-arrow-down fa-2x"></i></td>
												</tr>
											@if(!empty($data)) 
												@foreach($data['Photo'] as $key => $value) 
												<tr>
													<td><b>{{$value['name']}}</b></td>
													<td style="width: 200px;">&#8369 {{$value['price']}}</td>
													<td style="text-align: center;"><input type="checkbox" id="{{$value['id']}}"></td>
												</tr>
												@endforeach
											@endif
										</table>
									</div>
								</div>
							</div>
							<div class="Wrap_iconPage text-right">
								<a href="{{url('shop-photography')}}"  title="Show Services Details"><i class="fa fa-search-plus  fa-2x" aria-hidden="true"></i></a>
								<a href="" class="next-step" title="Show Cart"><i class="fa fa-shopping-cart fa-2x"></i></a>
								
							</div>
						</div>
						<div class="col-md-3 ">
							<h2 class="text-center text-uppercase">architectural</h2>
							<div class="cont">
								<img src="{{url('images/s2.jpg')}}" class="img_responsive" width="100%"/>
								<div class="overlay">
									<div class="text">
										<table class="table" style="color: white;">
												<tr>
													<td></td>
													<td></td>
													<td><i class="fa fa-cart-arrow-down fa-2x"></i></td>
												</tr>
											@if(!empty($data)) 
												@foreach($data['Archi'] as $key => $value) 
												<tr>
													<td><b>{{$value['name']}}</b></td>
													<td style="width: 200px;">&#8369 {{$value['price']}}</td>
													<td style="text-align: center;"><input type="checkbox" id="{{$value['id']}}"></td>
												</tr>
												@endforeach
											@endif
										</table>		
									</div>
								</div>
							</div>
							<div class="Wrap_iconPage text-right">
								<i class="fa fa-search-plus  fa-2x" aria-hidden="true"  title="Show Services"></i>
								<a href="" class="next-step" title="Show Cart"><i class="fa fa-shopping-cart fa-2x"></i></a>
							</div>

						</div>
						<div class="col-md-3 ">
							<h2 class="text-center text-uppercase">marketing</h2>
							<div class="cont">
								<img src="{{url('images/s4.jpg')}}" class="img_responsive" width="100%"/>
								<div class="overlay">
									<div class="text">
										<table class="table" style="color: white;">
												<tr>
													<td></td>
													<td></td>
													<td><i class="fa fa-cart-arrow-down fa-2x"></i></td>
												</tr>
											@if(!empty($data)) 
												@foreach($data['Market'] as $key => $value) 
												<tr>
													<td><b>{{$value['name']}}</b></td>
													<td style="width: 200px;">&#8369 {{$value['price']}}</td>
													<td style="text-align: center;"><input type="checkbox" id="{{$value['id']}}"></td>
												</tr>
												@endforeach
											@endif
										</table>	
									</div>
								</div>
							</div>
							<div class="Wrap_iconPage text-right">
								<i class="fa fa-search-plus  fa-2x" aria-hidden="true"  title="Show Services"></i>
								<a href="" class="next-step" title="Show Cart"><i class="fa fa-shopping-cart fa-2x"></i></a>
							</div>
						</div>
						<div class="col-md-3 ">
							<h2 class="text-center text-uppercase">video</h2>
							<div class="cont">
								<img src="{{url('images/s5.jpg')}}" class="img_responsive" width="100%"/>
								<div class="overlay">
									<div class="text">
										<table class="table" style="color: white;">
												<tr>
													<td></td>
													<td></td>
													<td><i class="fa fa-cart-arrow-down fa-2x"></i></td>
												</tr>
											@if(!empty($data)) 
												@foreach($data['Video'] as $key => $value) 
												<tr>
													<td><b>{{$value['name']}}</b></td>
													<td style="width: 200px;">&#8369 {{$value['price']}}</td>
													<td style="text-align: center;"><input type="checkbox" id="{{$value['id']}}"></td>
												</tr>
												@endforeach
											@endif
										</table>		
									</div>
								</div>
							</div>
							<div class="Wrap_iconPage text-right">
								<i class="fa fa-search-plus  fa-2x" aria-hidden="true"  title="Show Services"></i>
								<a href="" class="next-step" title="Show Cart"><i class="fa fa-shopping-cart fa-2x"></i></a>
							</div>

						</div>
					</div>
					<br><br><br>
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
							 <ul class="list-inline pull-right">
	                            {{-- <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li> --}}
	                        </ul>
						</div>
					</div>
				</div>
	        </div>
	        <div class="tab-pane" role="tabpanel" id="step2">
	           <div class="container" id="showhere"></div>
	            <ul class="list-inline pull-right">
	                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
	                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
	            </ul>
	        </div>
	        <div class="tab-pane" role="tabpanel" id="step3">
	            <div class="container" id="checkout"></div>    
            	<ul class="list-inline pull-right">
	                <li><p style="color: green;display: none; " id="emptyCartNotif"><i class="fa fa-warning"></i> Your Cart is Empty. </p><button type="button" class="btn btn-default prev-step">Previous</button></li>
	                <li><button type="button" class="btn btn-primary btn-info-full next-step" id="submitOrder" onclick="orderNow()">Submit Order</button></li>
	            </ul>
	        </div>
	        <div class="tab-pane" role="tabpanel" id="complete">
	            <h3>Complete</h3>
	            <p>You have successfully completed all steps.</p>
	        </div>
	        <div class="clearfix"></div>
	    </div>
    </div>
    <div class="container" id="formBody">
    	<img src="{{asset('images/loading-spinner.gif')}}" class="img-responsive customImage" > <br> <hr>
    	<p style="text-align: center;">Processing your orders...</p>
    </div>
     <div class="container" id="formSuccess">
    	   <img src="{{asset('images/gi.png')}}" class="img-responsive customImage" > <br> <hr>
    	<p style="text-align: center;">Success! <br> Your orders are now saved. <br><br> <a href="{{url('property-details/'.session('object_id').'')}}" class="btn btn-info">Go back to Property Overview</a></p>

    </div>

    <div id="brochure1" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Template 1</h4>
		      </div>
		      <div class="modal-body">
		        <p><img src="{{asset('images/templates/brochure-1.jpg')}}" class="img-responsive"></p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		</div>
	</div>
	<div id="brochure2" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Template 2</h4>
		      </div>
		      <div class="modal-body">
		        <p><img src="{{asset('images/templates/brochure-2.jpg')}}" class="img-responsive"></p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		</div>
	</div>
	<div id="brochure3" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Template 3</h4>
		      </div>
		      <div class="modal-body">
		        <p><img src="{{asset('images/templates/brochure-3.jpg')}}" class="img-responsive"></p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		</div>
	</div>
	<div id="brochure4" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Template 4</h4>
		      </div>
		      <div class="modal-body">
		        <p><img src="{{asset('images/templates/brochure-4.jpg')}}" class="img-responsive"></p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		</div>
	</div>

	
@endsection

