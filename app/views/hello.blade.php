@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="small-12 small-centered medium-12 large-10 large-centered columns">
			<h1 class='intro text-center'>And We're Off!</h1>
		</div>
	</div>
	<div class="row">
		<div class="small-12 small-centered medium-12 large-10 large-centered columns">
			<h2 class='text-center'><a href="{{ route('sessions.create') }}">Sign In</a></h2>
		</div>
	</div>
@stop
