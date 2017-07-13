@extends('layouts.layout')
@section('title')
	Order Status
@endsection

@section('page-name')
	Order Status
@endsection

@section('body')
<div class="icon-bar">
  <a href="{{url('shop/'.$orderData["objId"].'')}}" class="alt-color" title="Shop"><i class="fa fa-shopping-cart"></i></a> 
  <a href="#" title="Edit Property"><i class="fa fa-pencil" style="color:#B15022;"></i></a> 
  <a href="{{url('order-status/'.$orderData["objId"].'')}}" class="alt-color" title="Order Status"><i class="fa fa-bar-chart"></i></a>
  <a href="#" title="Property Details"><i class="fa fa-file-text-o" style="color:#B15022;"></i></a> 
</div>

<div class="container">
	<table class="table table-striped table-hover">
		<thead style='background-color:#ca7129;color:white;'>
			<tr>
				<th>#</th>
				<th>Order Id</th>
				<th>Product</th>
				<th>Price</th>
				<th>Supplier</th>
				<th>Progress</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($orderData['oData']))
	
				@foreach($orderData['oData'] as $key =>  $value)
					
				<tr>
					<td>
					@if($key == 0)
						1
					@else 
						{{++$key}}
					@endif
					</td>
					<td>{{$value['orderId']}}</td>
					<td>{{$value['product']['name']}} 
						<p class="customP">Created on {{date('F d, Y H:i:s A', strtotime($value['createdAt']))}}</p>
					</td>
					<td>&#8369 {{$value['product']['price']}}</td>
					<td>
						@if(isset($lineValue['supplier']['name']))
							{{$value['supplier']['name']}}
						@else 
							No Supplier Yet.
						@endif

					</td>
					<td>Step {{$value['step']}} - {{$value['status']['name']}}</td>
					<td style="width: 150px;"><a href="" class="btn btn-primary" title="View"><i class="fa fa-search" aria-hidden="true"></i></a> <a href="" class="btn btn-primary" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></a> <a href="" class="btn btn-primary" title="Cancel"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
				</tr>
				
				@endforeach 
			@else 
				<p>No orders this time.</p>
			@endif
		</tbody>
	</table>
	 <?php echo $orderData['oData']->setPath(url('order-status/'.$orderData['objId']))->render(); ?>
</div>

@endsection