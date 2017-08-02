@extends('layouts.layout')
@section('title')
	Order Status
@endsection

@section('page-name')
	Order Status
@endsection

@section('body')
<div class="icon-bar">
  <a href="{{url('shop/'.$orderData["objData"]['id'].'')}}" class="alt-color" title="Shop"><i class="fa fa-shopping-cart"></i></a> 
  <a href="{{url('edit-property/'.$orderData["objData"]['id'].'')}}" title="Edit Property"><i class="fa fa-pencil" style="color:#B15022;"></i></a> 
  <a href="{{url('order-status/'.$orderData["objData"]['id'].'')}}" class="alt-color" title="Order Status"><i class="fa fa-bar-chart"></i></a>
  <a href="{{url('property-details/'.$orderData["objData"]['id'].'')}}" title="Property Details"><i class="fa fa-file-text-o" style="color:#B15022;"></i></a> 
</div>

<div class="container">
	<?php
		if(isset($orderData['objData'])){
			echo "<h3>".$orderData['objData']['address1']."</h3><small>".$orderData['objData']['town'].", Philippines, ".$orderData['objData']['postalcode']."</small><hr>";
		}
	?>
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

			@if(count($orderData['oData']) > 0)
				
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
						@if(strtolower($value['status']['name']) == "delivered")
							@foreach($value['suppliers'] as $sKey => $sValue)
								Step 
								@if($sKey == 0)
									1
								@else 
									{{++$sKey}}
								@endif
								<i class="fa fa-user"> {{$sValue}}</i> <br>
							@endforeach
						@else
							@if(isset($value['supplier']['name']))
								{{$value['supplier']['name']}}
							@else 
								No Supplier Yet.
							@endif
						@endif

					</td>
					<td>{{$value['status']['name']}}</td>
					<td style="width: 150px;">
						
						@if(strtolower($value['status']['name']) == "delivered")
							<a href="javascript:void(0)" onclick="viewImages({{$orderData["objData"]['company_id']}},{{$orderData["objData"]['id']}}, {{$value['orderId']}}, {{$value['id']}})" data-toggle="modal" data-target="#view-modal" class="btn btn-primary" title="View"><i class="fa fa-search" aria-hidden="true"></i></a> 
							<a href="" class="btn btn-primary" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></a> 
						@endif
						@if(strtolower($value['status']['name']) == "new")
							<a href="javascript:void(0)" class="btn btn-primary" onclick="deleteProduct({{$value['id']}}, '{{$value['product']['name']}}' )" title="Cancel"><i class="fa fa-trash" aria-hidden="true"></i></a> 
						@endif
						
					</td>
				</tr>
				
				@endforeach 
			@else 
				<tr>
					<td colspan="8"><p>No orders this time.</p></td>
				</tr>
			@endif
		</tbody>
	</table>
	 <?php echo $orderData['oData']->setPath(url('order-status/'.$orderData['objData']['id']))->render(); ?>
</div>

<!-- Modal -->
<div id="view-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delivered Images</h4>
      </div>
      <div class="modal-body">
       		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection