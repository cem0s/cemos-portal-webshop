<html>
	<head>

		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet">

		{{-- property overview  --}}
		<link href="{{ asset('css/poverviewhover.css') }}" rel="stylesheet">

		{{-- property details --}}
		<link href="{{ asset('css/poverviewhover.css') }}" rel="stylesheet">
		<link href="{{ asset('slick/slick.css') }}" rel="stylesheet">
		<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">

		<link href="{{ asset('css/calendarCemos.css') }}" rel="stylesheet">
		<link href="{{ asset('css/poverviewhover.css') }}" rel="stylesheet">

		<script src="{{ asset('slick/slick.min.js') }}"></script>

		<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>

		<title>@yield('title')</title>

	</head>

	<body>
		@include('layouts.header')
		@yield('body')
		@include('layouts.footer')
	</body>

</html>