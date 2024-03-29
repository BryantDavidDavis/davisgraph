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
		@foreach($trip_photos as $trip_photo)
			<div class=" trip-photo-row row medium-collapse large-collapse">
				<div class="small-12 columns">
					<div class="panel radius">
						<div class="row small-collapse">
							<div class="small-12 medium-6 columns">
								<div class="row small-collapse">
									<div class="small-12 columns text-left">
										<a photo-id="{{{$trip_photo->id}}}" href="{{route('photos.show', array($trip_photo->id)) }}"><img src="{{$trip_photo->data}}"></a>
									</div>				
									<div class="small-12 columns text-left">
										<label>Uploaded by: {{{$trip_photo->username}}}</label><h6 class="subheader">{{{$trip_photo->description}}}</h6>
									</div>									
								</div>
							</div>
							<div class ="small-12 medium-6 columns">
								@foreach($trip_photo->comments as $comments)
								<div class="panel radius">
								<h6 class="subheader">{{{$comments->comment}}}</h6>
								<h6 class='subheader'>--{{{$comments->user->username}}}</h6>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
@stop

@section('footer')
	{{HTML::style('js/home_trip.js')}}
@stop
      