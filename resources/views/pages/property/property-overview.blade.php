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
			<?php 
				$counter = 1; 
				$secondrow = 1; 
				$add_indicator = 0;
			?>
			@foreach ($objects as $key => $value)
				@if ($secondrow <=4)
					@if ($counter == 1) 
						@include('pages.property.white-orange')
						<?php $counter = 2; ?>
						<?php $add_indicator = 1; ?>
					@else
						@include('pages.property.orange-white')
						<?php $counter = 1; ?>
						<?php $add_indicator = 0; ?>
					@endif	
					<?php $secondrow++; ?>
				@else
					@if ($secondrow >4 AND $secondrow <= 8)
						@if ($counter == 1) 
							@include('pages.property.orange-white')	
							<?php $counter = 2; ?>
							<?php $add_indicator = 0; ?>
						@else
							@include('pages.property.white-orange')
							<?php $counter = 1; ?>
							<?php $add_indicator = 1; ?>
						@endif
						<?php $secondrow++; ?>
					@else 
						@if ($counter == 1) 
							@include('pages.property.white-orange')
							<?php $counter = 2; ?>
							<?php $add_indicator = 1; ?>
						@else
							@include('pages.property.orange-white')
							<?php $counter = 1; ?>
							<?php $add_indicator = 0; ?>
						@endif
						<?php $secondrow = 1 ?>
					@endif
				@endif		
			@endforeach
			<div class="col-md-3 no-padding">
				<div class="hovereffect">
				@if ($add_indicator==0)
					<img class="img-responsive" src="images/whiteorange.jpg" alt="">
				@else
					<img class="img-responsive" src="images/orangewhite.jpg" alt="">
				@endif
					<div class="overlay">
						<p class="set3">
							<a href="{{url('add-property')}}">
								<i class="fa fa-plus" title="Add property"></i>
							</a>
						</p>
					</div>
				</div>
			</div>	
		</div>
	</div>
@endsection