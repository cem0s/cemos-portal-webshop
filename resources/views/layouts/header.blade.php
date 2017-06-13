<section id="slogan">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="contactDetails ">
					<ul class="list-inline">
						<li><a href="#">Have any question?</a></li>
						<li><a href="#"><i class="fa fa-phone" aria-hidden="true">(032) 231 1526</i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-1 col-md-offset-6">
				<div class="socialMedia">
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section><!--end of slogan-->
<div class ="navbar navbar-default " >
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<div class="sr-only"> toggle nav bar</div>	
				<div class="icon-bar"></div>
				<div class="icon-bar"></div>
				<div class="icon-bar"></div>
			</button>
			<a class="navbar-brand" href="{{url('dashboard')}}">
				<div class="logo">
					<img src="images/cemos_logo.png"/>
				</div>
			</a>
		</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{url('dashboard')}}">Dashboard</a></li>
					<li><a href="{{url('property-overview')}}">Property</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">contact</a></li>	
				</ul>
			</div>	
	</div>
</div><!--end of nav-->
	<div class="headerWrap">
		<div class="row">
			<div class="container">
				<h1 class="text-uppercase">@yield('page-name')</h1>
			</div>
		</div>
	</div>