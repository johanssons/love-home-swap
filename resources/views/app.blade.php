<!doctype html>
<html prefix="og: http://ogp.me/ns#">
	<head>	
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>Company Ltd</title>
		<meta description="Company Ltd description">
		<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	</head>
	<body>
	
		@yield('header')
		@yield('content')
		@yield('footer')

		<script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
	</body>
</html> 
