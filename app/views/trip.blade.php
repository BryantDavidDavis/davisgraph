@extends('layouts.default')

@section('header')
	{{HTML::style('css/home_trip.css')}}
	{{HTML::style('css/trip_parallax.css')}}
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
	@foreach($trip_photos as $trip_photo)
		<div class="row trip-photo-row">
			<div class="small-7 columns text-center">
				<a href="{{route('photos.show', array($trip_photo->id)) }}" data-stellar-ration='2'><img photo-id="{{$trip_photo->id}}" src="{{$trip_photo->data}}"></a>
			</div>
			<div class="small-5 columns text-left">
				<i class='fi-comment'>
					<p>Bryant: Here are some comments</p>
					<p>Suzanne: Here are more comments</p>
					<p>Dad: Here are even more interesting comments, they just get better all the time</p>
					<p>Mom: Here are even more interesting comments, they just get better all the time</p>
				</i>
			</div>
		</div>

	@endforeach
@stop

@section('footer')
	{{HTML::script('packages/vendor/stellar/jquery.stellar.min.js')}}
	{{HTML::script('packages/vendor/iscroll/build/iscroll-lite.js')}}
	{{HTML::script('js/trip_parallax.js')}}
@stop
