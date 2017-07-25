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
			@if (Auth::check())
			<div class="col-md-1 col-md-offset-6">
				{{-- <div class="socialMedia">
					<ul>
						<li></li>
					</ul>
				</div> --}}
				<div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
				  	@if(Auth::user()->getProfilePic() == "")
						<img src="{{url('images/user-avatar.png')}}" width="20" height="20"/>
					@else 
						<img src="{{asset(Auth::user()->getProfilePic())}}" width="20" height="20"/>
					@endif
				  	{{Auth::user()->getFirstName()}}
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li>
				    	<a href="{{url('profile')}}" >Profile</a>
				    </li>
				    <li>
				    	<a href="#">Credit Points: <span id="points">{{ Session::get('credit_points') }} </span> </a>
				    </li>
				    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">Log out</a></li>
				  </ul>
				</div>
			</div>
			@endif
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
					<img src="{{url('images/cemos_logo.png')}}"/>
				</div>
			</a>
		</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li><a href="{{url('dashboard')}}">Dashboard</a></li>
					<li><a href="{{url('property-overview')}}">Property</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">contact</a></li>
					
				@else 
						
					<li><a href="{{url('login')}}">Login</a></li>
					<li><a href="{{url('register')}}">Sign up</a></li>

				@endif
					
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

	<!-- Small modal -->


<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
      <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
      <div class="modal-footer">
  		<form method="POST" action="{{url('logout')}}">
  			<input type="hidden" name="_token" value="{{csrf_token()}}">
  			<button type="submit" class="btn btn-primary btn-block">Log out</button>
  		</form>
      </div>
    </div>
  </div>
</div>