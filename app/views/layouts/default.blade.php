<!doctype html>
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		{{ HTML::style('packages/vendor/foundation/css/foundation.css') }}
		{{ HTML::script('packages/vendor/foundation/js/vendor/modernizr.js') }}
		@yield('header')
	</head>
	<body>
		@yield('content')
		{{ HTML::script('packages/vendor/foundation/js/vendor/jquery.js') }}
		{{ HTML::script('packages/vendor/foundation/js/foundation.min.js') }}
		@yield('footer')
		<script>
			$(document).foundation();
		</script>
	</body>
</html>