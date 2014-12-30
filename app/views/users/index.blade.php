@extends('layouts.default')

@section('header')
@stop

@section('content')
	<h2>Some fun pictures will go here</h2>
		<ul class="small-block-grid-2 small-centered columns medium-block-grid-4 large-block-grid-6">
		@foreach($photos as $photo)
		<li><img src="{{ $photo }}"></li>
		@endforeach
		</ul>		
	<a href="{{route('photos.create') }}">Let's add some pictures</a>
	<br/>
	<a href="{{ url('/logout') }}">signout</a>
@stop

@section('footer')
@stop