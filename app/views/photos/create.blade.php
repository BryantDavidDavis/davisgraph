@extends('layouts.default')

@section('header')
@stop

@section('content')
	<h2>let's upload a picture</h2>
	{{ Form::open(['route' => 'photos.store', 'files' => true]) }}

	{{ Form::hidden('user_id', Auth::user()->id) }}
	
	{{ Form::label('title', 'Title') }}
	{{ Form::text('title') }}
	
	{{ Form::label('description', 'Description') }}
	{{ Form::text('description') }}
	
	{{ Form::label('imagename', 'Upload:') }}
	{{ Form::file('imagename') }}
	
	
	{{ Form::submit('Post Me!') }}

	{{ Form::close() }}
	<a href="{{ url('/logout') }}">signout</a>
@stop

@section('footer')
@stop