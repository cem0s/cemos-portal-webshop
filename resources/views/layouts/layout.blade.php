<html ng-app="cemos_portal" ng-cloak>
	<head>

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

		<link href="{{ asset('css/calendarCemos.css') }}" rel="stylesheet">
		<link href="{{ asset('css/poverviewhover.css') }}" rel="stylesheet">
		

		<title>@yield('title')</title>
		<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	</head>

	<body>
		@include('layouts.header')
		@yield('body')
		@include('layouts.footer')
	</body>

</html>