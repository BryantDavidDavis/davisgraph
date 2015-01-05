@extends('layouts.default')

@section('header')
@stop

@section('content')
	
	
	<div class="row">
		<div class="small-12 small-centered medium-12 large-10 large-centered columns">
			<h1 class='intro text-center'>Login to Start!</h1>
		</div>
	</div>
	{{ Form::open(['route' => 'users.store']) }}
	<div class="row">
	    <div class="small-6 small-centered medium-4 columns">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null) }}	
	    </div>
	</div>
	<div class="row">
	    <div class="small-6 small-centered medium-4 columns">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', null) }}
	    </div>
	</div>
	<div class="row">
	    <div class="small-6 small-centered medium-4 columns">
			{{ Form::label('password-confirmation', 'Password Confirmation') }}
			{{ Form::password('password_confirmation', null) }}
	    </div>
	</div>
	<div class="row">
	    <div class="small-6 small-centered medium-4 columns">
			{{ Form::submit('Sign Up', ['class' => 'button tiny']) }}
	    </div>
	</div>
	{{ Form::close() }}
@stop

@section('footer')
@stop