@extends('layouts.default')

@section('header')
@stop

@section('menu-options')
	<li><label>manage photos</label></li>
	<li><a href="{{ route('photos.create')}}">Add A Photo</a></li>
	<li><a id="photos-rotate" href="#">Rotate Photo</a></li>
	
@stop
@section('content')
	<div class="row">
		<div class="small-12 columns centered">
			<label>{{$photo->title }}</label>
		</div>
	</div>	
	<div class="row">
		<div class="small-12 columns centered">
			<img src="{{$image}}">
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns centered">
			<p>{{ $photo->description }} </p>
		</div>
	</div>		

@stop

@section('footer')
@stop