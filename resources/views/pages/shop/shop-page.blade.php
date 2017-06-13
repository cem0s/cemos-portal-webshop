@extends('layouts.layout')

@section('title')
	Shop
@endsection

@section('page-name')
	Shop
@endsection

@section('body')
	<div class="shop_page">
		<div class="row">
			<div class="col-md-3">
				<h2 class="text-center text-uppercase"> photography</h2>
				<img src="images/s1.jpg" class="img_responsive" width="100%"/>
				<div class="Wrap_iconPage text-right">
					<i class="fa fa-shopping-cart  fa-2x" aria-hidden="true"></i>
					<i class="fa fa-list  fa-2x" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-3 ">
				<h2 class="text-center text-uppercase">floorplan</h2>
				<img src="images/s2.jpg" class="img_responsive" width="100%"/>
				<div class="Wrap_iconPage text-right">
					<i class="fa fa-shopping-cart  fa-2x" aria-hidden="true"></i>
					<i class="fa fa-list  fa-2x" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-3 ">
				<h2 class="text-center text-uppercase">impression</h2>
				<img src="images/s4.jpg" class="img_responsive" width="100%"/>
				<div class="Wrap_iconPage text-right">
					<i class="fa fa-shopping-cart  fa-2x" aria-hidden="true"></i>
					<i class="fa fa-list fa-2x" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-3 ">
				<h2 class="text-center text-uppercase">styleswitcher</h2>
				<img src="images/s5.jpg" class="img_responsive" width="100%"/>
				<div class="Wrap_iconPage text-right">
					<i class="fa fa-shopping-cart  fa-2x" aria-hidden="true"></i>
					<i class="fa fa-list  fa-2x" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
@endsection