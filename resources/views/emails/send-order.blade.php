@component('mail::message')
<div style="height: 50px;width: 500px;background-color: black;color: white;padding: 10px;">
	<p style="color: white;text-align: center;">Thank you for your business</p> 
</div>

@component('mail::table')
<br><br><br>
This is the summary of your order: <hr>
<table class="table">
	<thead>
		<tr>
			<td><b>Product</b></td>
			<td><b>Price</b></td>
			<td><b>Quantity</b></td>
		</tr>
	</thead>
	<tbody>
		@foreach($content['cartContents'] as $key => $value)
			<tr>
				<td>{{$value->name}}</td>
				<td>&#8369 {{$value->price()}}</td>
				<td>{{$value->qty}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<br><br><hr>
<table>
	<tr>
		<td><b>Subtotal</b></td>
			<td></td>
			<td>&#8369 {{$content['subtotal']}}</td>
	</tr>
	<tr>
		<td><b>Tax</b></td>
		<td></td>
		<td>&#8369 {{$content['tax']}}</td>
	</tr>
	<tr>
		<td><b>Total</b></td>
		<td></td>
		<td>&#8369 {{$content['total']}}</td>
	</tr>
</table>

@endcomponent

@component('mail::button', ['url' =>  $content['url']])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
