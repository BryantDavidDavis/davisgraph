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
				Once upon a time, a family went to Roatan, Honduras...
			</div>
		</div>
	@foreach($trip_photos as $trip_photo)
		<div class="row trip-photo-row">
			<div class="small-7 columns text-center">
				<a href="{{route('photos.show', array($trip_photo->id)) }}"><img photo-id="{{$trip_photo->id}}" src="{{$trip_photo->data}}"></a>
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
@stop
