@extends('layouts.default')

@section('header')
@stop

@section('content')
	<div class="row">
		<div class="small-10 medium-6 large-6 small-centered columns">

			<h2>let's upload a picture</h2>
		</div>
	</div>
	{{ Form::open(['route' => 'photos.store', 'files' => true, 'id' => 'photo-create-form']) }}

	{{ Form::hidden('user_id', Auth::user()->id) }}
	<!-- {{ Form::hidden('upload_progress', ini_get('session.upload_progress.name')) }} -->
	<div class="row">
		<div class="small-10 medium-6 large-6 small-centered columns">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title') }}
		</div>
	</div>
	<div class="row">
		<div class="small-10 medium-6 large-6 small-centered columns">
			{{ Form::label('description', 'Description') }}
			{{ Form::textarea('description') }}
		</div>
	</div>	
	<div class="row">
		<div class="small-10 medium-6 large-6 small-centered columns">	
			{{ Form::label('imagename', 'Upload') }}
			{{ Form::file('imagename') }}
		</div>
	</div>	
	<div class="row">
		<div class="small-10 medium-6 large-6 small-centered columns">	
			<input type="submit" value="Post Me!" id="photo-upload-submit" class="button postfix"/>
		</div>
	</div>
	<div class="row">
		<div class="small-10 medium-6 large-6 small-centered columns">
			<div class="progress progress success radius">
				<span style="width: 0%" class="meter"><div class="percent text-center"></div></span>
			</div>
		</div>
	</div>	
	{{ Form::close() }}
<!--

	<form action="file-echo2.php" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile"><br>
        <input type="submit" value="Upload File to Server">
    </form>
    
    <div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
    </div>
    
    <div id="status"></div>
	
-->
	
<!-- 	<iframe id="hidden_progress_receiver" height="0px" frameborder="0" name="hidden_progress_receiver" src="about:blank"></iframe> -->
@stop

@section('footer')
	{{ HTML::script('packages/vendor/jquery-form/jquery.form.js') }}
	{{ HTML::script('js/photo_create.js') }}
@stop