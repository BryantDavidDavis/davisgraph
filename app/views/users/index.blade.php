@extends('layouts.default')

@section('header')
	{{HTML::style('css/users_index.css') }}
@stop

@section('menu-options')
	<li><label>manage photos</label></li>
	<li><a href="{{ route('photos.create')}}">Add A Photo</a></li>
	<li><a id="photos-delete" href="{{route('users.index')}}">Delete Photos</a></li>
	<li><a id="photos-rotate" href="#">Rotate Photos</a></li>
@stop

@section('content')
		<ul class="clearing-thumbs small-block-grid-2 small-centered medium-block-grid-4 large-block-grid-6 columns centered photo-album" data-clearing>
			@if (empty($photos))
				<p>Photo Album Empty</p>
			@else
			
				@foreach($photos as $photo)
				<li>
	
					<a href="{{route('photos.show', array($photo->id)) }}">
						<img data-caption="{{$photo->title}}" src="{{$photo->data}}">
					</a>
				</li>
				@endforeach
				
			@endif
		</ul>
@stop

@section('footer')
	{{ HTML::script('packages/vendor/foundation/js/foundation.clearing.js') }}
	{{ HTML::script('js/users_index.js') }}
	
@stop