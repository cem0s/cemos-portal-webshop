@extends('layouts.layout')
@section('title')
	Order Status
@endsection

@section('page-name')
	Order Status
@endsection

@section('body')
<div class="container">
	<table class="table table-striped table-hover">
		<thead style='background-color:#ca7129;color:white;'>
			<tr>
				<th>Product</th>
				<th>Supplier</th>
				<th>Progress</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($orderData))
				@foreach($orderData as $key => $value)
					@foreach($value as $lineKey => $lineValue)
					<tr>
						<td>{{$lineValue['product']['name']}}</td>
						<td>
							@if(isset($lineValue['supplier']['name']))
								{{$lineValue['supplier']['name']}}
							@else 
								No Supplier Yet.
							@endif

						</td>
						<td>Step {{$lineValue['step']}} - {{$lineValue['status']['name']}}</td>
						<td style="width: 150px;"><a href="" class="btn btn-primary" title="View"><i class="fa fa-search" aria-hidden="true"></i></a> <a href="" class="btn btn-primary" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></a> <a href="" class="btn btn-primary" title="Cancel"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
					</tr>
					@endforeach
				@endforeach 
			@else 
				<p>No orders this time.</p>
			@endif
		</tbody>
	</table>

</div>
@endsection