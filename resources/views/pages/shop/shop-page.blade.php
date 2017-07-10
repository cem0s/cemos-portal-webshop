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
                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Choose Services">
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
							<img src="{{url('images/s1.jpg')}}" class="img_responsive" width="100%"/>
							<div class="Wrap_iconPage text-right">
								<a href="{{url('shop-photography')}}"  title="Show Services Details"><i class="fa fa-arrow-circle-right  fa-2x" aria-hidden="true"></i></a>
							</div>
						</div>
						<div class="col-md-3 ">
							<h2 class="text-center text-uppercase">architectural</h2>
							<img src="{{url('images/s2.jpg')}}" class="img_responsive" width="100%"/>
							<div class="Wrap_iconPage text-right">
								<i class="fa fa-arrow-circle-right  fa-2x" aria-hidden="true"  title="Show Services"></i>
							</div>
						</div>
						<div class="col-md-3 ">
							<h2 class="text-center text-uppercase">marketing</h2>
							<img src="{{url('images/s4.jpg')}}" class="img_responsive" width="100%"/>
							<div class="Wrap_iconPage text-right">
								<i class="fa fa-arrow-circle-right  fa-2x" aria-hidden="true"  title="Show Services"></i>
							</div>
						</div>
						<div class="col-md-3 ">
							<h2 class="text-center text-uppercase">video</h2>
							<img src="{{url('images/s5.jpg')}}" class="img_responsive" width="100%"/>
							<div class="Wrap_iconPage text-right">
								<i class="fa fa-arrow-circle-right  fa-2x" aria-hidden="true"  title="Show Services"></i>
							</div>
						</div>
					</div>
					<br><br><br>
					<div class="row">
						<div class="col-md-3">
							<table class="table">
								<tr>
									<td></td>
									<td>Price</td>
									<td>Add To Cart</td>
								</tr>
								@if(!empty($data)) 
									@foreach($data['Photo'] as $key => $value) 
									<tr>
										<td>{{$value['name']}}</td>
										<td>&#8369 {{$value['price']}}</td>
										<td style="text-align: center;"><input type="checkbox" id="{{$value['id']}}"></td>
									</tr>
									@endforeach
								@endif
							</table>
						</div>
						<div class="col-md-3 ">
							<table class="table">
								<tr>
									<td></td>
									<td>Price</td>
									<td>Add To Cart</td>
								</tr>
								@if(!empty($data)) 
									@foreach($data['Archi'] as $key => $value) 
									<tr>
										<td>{{$value['name']}}</td>
										<td>&#8369 {{$value['price']}}</td>
										<td style="text-align: center;"><input type="checkbox" id="{{$value['id']}}"></td>
									</tr>
									@endforeach
								@endif
							</table>		
						</div>
						<div class="col-md-3 ">
							<table class="table">
								<tr>
									<td></td>
									<td>Price</td>
									<td>Add To Cart</td>
								</tr>
								@if(!empty($data)) 
									@foreach($data['Market'] as $key => $value) 
									<tr>
										<td>{{$value['name']}}</td>
										<td>&#8369 {{$value['price']}}</td>
										<td style="text-align: center;"><input type="checkbox" id="{{$value['id']}}"></td>
									</tr>
									@endforeach
								@endif
							</table>	
						</div>
						<div class="col-md-3 ">
							<table class="table">
								<tr>
									<td></td>
									<td>Price</td>
									<td>Add To Cart</td>
								</tr>
								@if(!empty($data)) 
									@foreach($data['Video'] as $key => $value) 
									<tr>
										<td>{{$value['name']}}</td>
										<td>&#8369 {{$value['price']}}</td>
										<td style="text-align: center;"><input type="checkbox" id="{{$value['id']}}"></td>
									</tr>
									@endforeach
								@endif
							</table>		
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
							 <ul class="list-inline pull-right">
	                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
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
	                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
	                <li><button type="button" class="btn btn-primary btn-info-full next-step">Submit</button></li>
	            </ul>
	        </div>
	        <div class="tab-pane" role="tabpanel" id="complete">
	            <h3>Complete</h3>
	            <p>You have successfully completed all steps.</p>
	        </div>
	        <div class="clearfix"></div>
	    </div>
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
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
	<script src="{{asset('js/jquery.iframe-transport.min.js') }}"></script>
	<script src="{{asset('js/jquery.fileupload.min.js') }}"></script>
@endsection

