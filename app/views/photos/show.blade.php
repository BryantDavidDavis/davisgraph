@extends('layouts.default')

@section('header')
	{{HTML::style('css/photos_show.css')}}
@stop

@section('menu-options')
	@if(Auth::user()->photos->contains($photo->id))
		<li><label>manage photos</label></li>
		<li><a href="{{ route('photos.create')}}">Add A Photo</a></li>
		<li><a id="photos-rotate" href="#">Rotate Photo</a></li>	
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
						<div class="small-12 small-centered text-center columns">
							<img class="photo-show-img" src="{{$image}}">
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