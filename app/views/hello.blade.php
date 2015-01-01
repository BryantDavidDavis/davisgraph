@extends('layouts.default')

@section('header')
	{{ HTML::style('css/hello.css') }}
@stop

@section('content')
	<div class="page" style="background-image:url(images/Roatan-Pirate-Map.jpg)">
		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				<nav class="tab-bar">
					<section class="left-small">
						<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
					</section>
					<section class="middle tab-bar-section">
						<h1 class="title">Lost in Roatan</h1>
					</section>
				</nav>
				<aside class="left-off-canvas-menu">
					<ul class="off-canvas-list">
						<li><a href="{{ route('sessions.create') }}">Login</a></li>
						<li><a href="{{ route('users.create') }}">Signup</a></li>
					</ul>
				</aside>
				<section class="main-section">
				</section>
				<a class="exit-off-canvas"></a>			
			</div>
		</div>
	</div>
@stop

@section('footer')
	{{ HTML::script('packages/vendor/foundation/js/foundation.offcanvas.js') }}
@stop
