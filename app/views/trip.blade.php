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
	@foreach($trip_photos as $trip_photo)
		<div class="row trip-photo-row">
			<div class="small-12 columns">
				<a href="{{route('photos.show', array($trip_photo->id)) }}"><img photo-id="{{$trip_photo->id}}" src="{{$trip_photo->data}}"></a>
			</div>
		</div>

	@endforeach
@stop

@section('footer')
@stop
