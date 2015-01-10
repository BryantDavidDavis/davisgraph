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
					@foreach($photo->comments as $comment)
					<div class="row">
						<div class="small-12 medium-10 large-10 small-centered text-center columns">
							<p photo-id="{{$photo->id}}" model-col="comment"><span>{{$comment}}</span></p>
						</div>
					</div>
					@endforeach
					{{ Form::open(['route' => 'comments.store', 'id' => 'comment-create-form']) }}
					{{ Form::hidden('user_id', Auth::user()->id) }}
					{{ Form::hidden('photo_id', $photo->id)}}
					<div class="row">
						<div class="small-10 medium-6 large-6 small-centered columns">
							{{ Form::label('comment', 'Add a Comment') }}
							{{ Form::textarea('comment') }}
						</div>
					</div>
					<div class="row">
						<div class="small-10 medium-6 large-6 small-centered columns">	
							<input type="submit" value="submit!" id="comment-submit" class="button postfix"/>
						</div>
					</div>
					{{ Form::close()}}

					
<!--
				</div>
		</div>
	</div>	
-->

@stop

@section('footer')

	{{HTML::script('js/photos_show.js')}}

@stop