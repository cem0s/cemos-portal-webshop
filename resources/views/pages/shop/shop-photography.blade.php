@extends('layouts.layout')

@section('title')
	Photography
@endsection

@section('page-name')
	Photography
@endsection

@section('body')

	<div class="container">
		<div class="headerCont">
			<h2 class="text-uppercase"> BRACKET OR NON-BRACKET PHOTO EDITING</h2>
			<p>A process that involves one or more raw photo exposures to be combined or edited into a desired output. If you have a single RAW file, we can process it to suit your specific style.</p>
		</div>
		<div class="imageCont">
			<img src="{{url('images/pd3.jpg')}}" class="img-responsive">
		</div>
	</div>
@endsection