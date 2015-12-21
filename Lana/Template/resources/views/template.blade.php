<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@section("titleHead")
			Default Template
		@stop
	</title>
	@section("head")
	<script type="text/javascript" src="{{ asset('lana-template/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('lana-template/bootstrap/js/bootstrap.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('lana-template/bootstrap/css/bootstrap.min.css') }}">
	@show
	<style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      border-radius: 0;
    }
    </style>
</head>
<body>

	<div class="container">
		@section("header")
			<h1>Title Header Here...</h1>
		@show
	</div>

	@section("navigation")
		@include("LanaTemplate::nav")
	@show

	<div class="container">
		@section("layout")
		
		@show
	</div>

	<div class="container">
		<div class="text-center">
			@section("footer")
				Footer Here....
			@show	
		</div>
		
	</div>
	
</body>
</html>