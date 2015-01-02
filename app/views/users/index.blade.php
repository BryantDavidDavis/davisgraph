@extends('layouts.default')

@section('header')
	{{HTML::style('css/users_index.css') }}
@stop

@section('content')
		<ul class="small-block-grid-2 small-centered columns medium-block-grid-4 large-block-grid-6">
		@foreach($photos as $photo)
		<li>
			<label>{{ $photo->title }}</label>
			<a href="{{route('photos.show', array($photo->id)) }}">
				<img src="{{ $photo->data }}">
			</a>
			<a href="#" class="button tiny split">Edit<span data-dropdown="{{'drop'.$photo->id }}"></span></a><br>
			<ul id="{{'drop'.$photo->id }}" class="f-dropdown" data-dropdown-content>
				<li><a href="{{ route('photos.photoDestroy', array($photo->id)) }}">Delete</a></li>
				<li><a href="#">Something Else</a></li>
			</ul>			
			
		</li>
		@endforeach
		</ul>		
		<a href="{{ route('photos.create') }}">Let's add some pictures</a>
@stop

@section('footer')
@stop