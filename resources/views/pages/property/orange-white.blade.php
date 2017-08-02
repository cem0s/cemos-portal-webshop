<div class="col-md-3 no-padding">
	<div class="hovereffect">
		<img class="img-responsive" src="images/orangewhite.jpg" alt="">
			<div class="overlay">
				<h2></h2>
				<p class="set1">
					<a href="{{url('property-details')}}/{{$value['id']}}">
						<i class="fa fa-home" title="Property details"></i>
					</a>
					<a href="{{url('edit-property')}}/{{$value['id']}}">
						<i class="fa fa-pencil" title="Edit property details"></i>
					</a>
				</p>
				<hr>
				<hr>
				<p class="set2">
					<a href="{{url('shop')}}/{{$value['id']}}">
						<i class="fa fa-shopping-cart" title="Shop products"></i>
					</a>
					<a href="{{url('order-status')}}/{{$value['id']}}">
						<i class="fa fa-bars" title="Product status"></i>
					</a>
				</p>
				<p> <b>{{$value['address1']}}, {{$value['town']}}, {{$value['country']}}, {{$value['zipcode']}}</b></p>
			</div>
	</div>
</div>	