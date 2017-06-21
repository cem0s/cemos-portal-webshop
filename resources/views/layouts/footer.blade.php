<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="{{url('images/cemosfooterlogo.png')}}"/>
			</div>
			<div class="col-md-3">
				<h4 class="text-uppercase">services</h4>
					<ul>
						<li><a href="#">Photo edit</a></li>
						<li><a href="#">Floor planner</a></li>
						<li><a href="#">Impression</a></li>
						<li><a href="#">StyleSwitcher</a></li>
						<li><a href="#">Web Development</a></li>
					</ul>
			</div>
			<div class="col-md-3">
				<h4 class="text-uppercase">Useful links</h4>
					<ul>
						<li><a href="#">Our Works</a></li>
						<li><a href="#">Free trial</a></li>
					</ul>
			</div>
			<div class="col-md-3">
				<h4 class="text-uppercase">Social media</h4>
				<ul>
					<li>
						<a href="#"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>&emsp;
						<a href="#"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>&emsp;
						<a href="#"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>&emsp;
						<a href="#"><i class="fa fa-vimeo fa-lg" aria-hidden="true"></i></a>
					</li>
					<li>Have any questions?</li>
					<li><i class="fa fa-phone fa-lg" aria-hidden="true"></i> (032) 231 1526</li>
					<li><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> cemos@cemos.ph</li>
				</ul>
			</div>
		</div>
		<div class="copyright text-center">
			<p>© 2017 CEMOS. All Rights Reserved.</p>
		</div>
	</div>

</footer>
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#all").hide(200);
    });
    $("#show").click(function(){
        $("#all").show(200);
    });

   $('.btnNext').click(function(){
      $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

      $('.btnPrevious').click(function(){
      $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    })
});
</script>

<script src="{{ asset('slick/slick.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{url('app/lib/angular/angular.min.js')}}"></script>
<script src="{{url('app/app.js')}}"></script>
<script src="{{url('app/controllers/user.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
