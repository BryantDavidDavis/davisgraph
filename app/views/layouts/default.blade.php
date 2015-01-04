<!doctype html>
<html class="no-js" lang="en">
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		{{ HTML::style('packages/vendor/foundation/css/foundation.css') }}
		{{ HTML::style('css/main.css') }}
		{{ HTML::script('packages/vendor/foundation/js/vendor/modernizr.js') }}
		@yield('header')
	</head>
	<body>
		<div class="page" style="background-image:url({{{ $background_img or 'none'}}})">
			<div class="off-canvas-wrap" data-offcanvas>
				<div class="inner-wrap">
					<nav class="tab-bar">
						<section class="left-small">
							<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
						</section>
						<section class="middle tab-bar-section">
							<h1 class="title">Lost in Roatan</h1>
						</section>
						@if(Auth::check())
							<section class="right-small">
								<a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
							</section>
						@endif						
					</nav>
					<aside class="left-off-canvas-menu">
						<ul class="off-canvas-list">
							@if(Auth::check())
								<li><label>Navigate</label></li>
								<li><a href="{{ action('SessionsController@destroy') }}">Logout</a></li>
								<li><a href="{{ route('users.index') }}">Home</a></li>
								<li><label>manage photos</label></li>
							@else
							<li><label>login</label></li>
							<li><a href="{{ route('sessions.create') }}">Login</a></li>
							<li><a href="{{ route('users.create') }}">Signup</a></li>
							@endif
						</ul>
					</aside>
					@if(Auth::check())
						<aside class="right-off-canvas-menu">
							<ul class="off-canvas-list">
								<li><label>users</label></li>
								<li><a href="#">user 1 </a></li>
								<li><a href="#">user 2 </a></li>
							</ul>
						</aside>
					@endif					
					<section class="main-section">
						<!-- <p>Lost in Roatan</p> -->
		@yield('content')
					</section>
					<a class="exit-off-canvas"></a>			
				</div>
			</div>
		</div>
		{{ HTML::script('packages/vendor/foundation/js/vendor/jquery.js') }}
		{{ HTML::script('packages/vendor/foundation/js/vendor/fastclick.js') }}
		{{ HTML::script('packages/vendor/foundation/js/foundation.min.js') }}
		@yield('footer')
		<script>
			$(document).foundation();
		</script>
	</body>
</html>