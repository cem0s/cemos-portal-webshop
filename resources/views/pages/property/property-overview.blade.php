@extends('layouts.layout')

@section('title')
	Property Overview
@endsection

@section('page-name')
	Property overview
@endsection

@section('body')
	<div class="container-fuid property-overview">
		<div class="row">
			<?php $counter = 1; ?>
			<?php $secondrow = 1; ?>
			@foreach ($objects as $key => $value)
				@if ($secondrow <=4)
					@if ($counter == 1) 
						<div class="col-md-3 no-padding">
							<div class="hovereffect">
								<img class="img-responsive" src="images/whiteorange.jpg" alt="">
									<div class="overlay">
										<h2></h2>
										<p class="set1">
											<a href="{{url('property-details')}}/{{$value['id']}}">
												<i class="fa fa-twitter"></i>
											</a>
											<a href="#">
												<i class="fa fa-facebook"></i>
											</a>
										</p>
										<hr>
										<hr>
										<p class="set2">
											<a href="#">
												<i class="fa fa-instagram"></i>
											</a>
											<a href="#">
												<i class="fa fa-dribbble"></i>
											</a>
										</p>
									</div>
							</div>
						</div>
						<?php $counter = 2; ?>
					@else
						<div class="col-md-3 no-padding">
							<div class="hovereffect">
								<img class="img-responsive" src="images/orangewhite.jpg" alt="">
									<!-- <div class="overlay">
										<p class="set3">
											<a href="#">
												<i class="fa fa-twitter"></i>
											</a>
										</p>
									</div> -->
									<div class="overlay">
										<h2></h2>
										<p class="set1">
											<a href="{{url('property-details')}}/{{$value['id']}}">
												<i class="fa fa-twitter"></i>
											</a>
											<a href="#">
												<i class="fa fa-facebook"></i>
											</a>
										</p>
										<hr>
										<hr>
										<p class="set2">
											<a href="#">
												<i class="fa fa-instagram"></i>
											</a>
											<a href="#">
												<i class="fa fa-dribbble"></i>
											</a>
										</p>
									</div>
							</div>
						</div>	
						<?php $counter = 1; ?>
					@endif	
					<?php $secondrow++; ?>
				@else
					@if ($secondrow >4 AND $secondrow <= 8)
						@if ($counter == 1) 
							<div class="col-md-3 no-padding">
								<div class="hovereffect">
									<img class="img-responsive" src="images/orangewhite.jpg" alt="">
										<div class="overlay">
											<p class="set3">
												<a href="#">
													<i class="fa fa-twitter"></i>
												</a>
											</p>
										</div>
								</div>
							</div>	
							<?php $counter = 2; ?>
						@else
							<div class="col-md-3 no-padding">
								<div class="hovereffect">
									<img class="img-responsive" src="images/whiteorange.jpg" alt="">
										<div class="overlay">
											<h2></h2>
											<p class="set1">
												<a href="{{url('property-details')}}">
													<i class="fa fa-twitter"></i>
												</a>
												<a href="#">
													<i class="fa fa-facebook"></i>
												</a>
											</p>
											<hr>
											<hr>
											<p class="set2">
												<a href="#">
													<i class="fa fa-instagram"></i>
												</a>
												<a href="#">
													<i class="fa fa-dribbble"></i>
												</a>
											</p>
										</div>
								</div>
							</div>
							<?php $counter = 1; ?>
						@endif
						<?php $secondrow++; ?>
					@else 
						@if ($counter == 1) 
							<div class="col-md-3 no-padding">
								<div class="hovereffect">
									<img class="img-responsive" src="images/whiteorange.jpg" alt="">
										<div class="overlay">
											<h2></h2>
											<p class="set1">
												<a href="{{url('property-details')}}">
													<i class="fa fa-twitter"></i>
												</a>
												<a href="#">
													<i class="fa fa-facebook"></i>
												</a>
											</p>
											<hr>
											<hr>
											<p class="set2">
												<a href="#">
													<i class="fa fa-instagram"></i>
												</a>
												<a href="#">
													<i class="fa fa-dribbble"></i>
												</a>
											</p>
										</div>
								</div>
							</div>
							<?php $counter = 2; ?>
						@else
							<div class="col-md-3 no-padding">
								<div class="hovereffect">
									<img class="img-responsive" src="images/orangewhite.jpg" alt="">
										<div class="overlay">
											<p class="set3">
												<a href="#">
													<i class="fa fa-twitter"></i>
												</a>
											</p>
										</div>
								</div>
							</div>	
							<?php $counter = 1; ?>
						@endif
						<?php $secondrow = 1 ?>
					@endif
				@endif		
			@endforeach
		</div>
	</div>
@endsection