@extends('layouts.default')

@section('header')
	{{HTML::style('css/photos_show.css')}}
@stop

@section('menu-options')
	@if(Auth::user()->photos->contains($photo->id))
		<li><label>manage photos</label></li>
		<li><a href="{{ route('photos.create')}}">Add A Photo</a></li>
		<li><a id="photo-update" href="#">Edit Photo Details</a></li>	
	@endif
	
@stop
@section('content')
	
<!--
	<div class="row big-photo-row">
		<div class="small-12 columns centered">
				<div class="row overlay-row">
					<div class="small-12 columns overlay">
-->
					<!-- </div> -->
					<div class="row">
						<div class="small-12 medium-10 large-10 small-centered text-center columns">
							<img class="photo-show-img" photo-id="{{$photo->id}}" src="{{$image}}">
						</div>
					</div>
					<div class="row">
						<div class="small-12 medium-10 large-10 small-centered text-center columns">
							<h3 photo-id="{{$photo->id}}" model-col="title"><span>{{$photo->title}}</span></h3>
						</div>
					</div>
					<div class="row">
						<div class="small-12 medium-10 large-10 small-centered text-center columns">
							<p photo-id="{{$photo->id}}" model-col="description"><span>{{$photo->description}}</span></p>
						</div>
					</div>
					
<!--
				</div>
		</div>
	</div>	
-->

@stop

@section('footer')

	{{HTML::script('js/photos_show.js')}}

@stop