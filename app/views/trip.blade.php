@extends('layouts.default')

@section('header')
	{{HTML::style('css/home_trip.css')}}
@stop

@section('menu-options')
	@if(Auth::check())
		<li><label>manage photos</label></li>
		<li><a href="{{ route('photos.create')}}">Add A Photo</a></li>
		<li><a id="photos-delete" href="{{route('users.index')}}">Delete Photos</a></li>
	@endif
@stop

@section('content')
		<div class="row">
			<div class="small-12 columns trip-intro-row">
				<blockquote class="intro-quote text-left">Hey Guys, We're going to Roatan!  The scuba diving is great there, and you'll love the condo...<cite>Steven Davis, December 15th, 2014</cite></blockquote>
			</div>
		</div>				
@stop

@section('footer')
@stop
      