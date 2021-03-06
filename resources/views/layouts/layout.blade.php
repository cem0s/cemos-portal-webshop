<!DOCTYPE html>
<html ng-app="cemos_portal" ng-cloak>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		{{-- property overview  --}}
		<link href="{{ asset('css/poverviewhover.css') }}" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

		{{-- property details --}}
		<link href="{{ asset('css/poverviewhover.css') }}" rel="stylesheet">
		<link href="{{ asset('slick/slick.css') }}" rel="stylesheet">
		<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">
		<link href="{{ asset('css/jquery-ui.css')}}" rel="stylesheet" >
		<link href="{{ asset('css/calendarCemos.css') }}" rel="stylesheet">
		<link href="{{ asset('css/poverviewhover.css') }}" rel="stylesheet">
		<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
		<link href="{{ asset('css/fancybox.min.css') }}" rel="stylesheet">
		

		<title>@yield('title')</title>
		<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="{{ asset('js/dropzone.min.js')}}"></script>

		<script src="{{asset('js/form-dropzone.js')}}"></script>
		<script src="{{asset('js/floorplanner-dropzone.js')}}"></script>
		<script src="{{asset('js/waypoints.min.js') }}"></script> 
		<script src="{{asset('js/jquery.counterup.min.js') }}"></script>

		<script>
		    jQuery(document).ready(function( $ ) {
		        $('.counter').counterUp({
		            delay: 10,
		            time: 1000
		        });

		    });
		</script>


		
	</head>

	<body>
		@include('layouts.header')
		@yield('body')
		@include('layouts.footer')
	</body>

</html>