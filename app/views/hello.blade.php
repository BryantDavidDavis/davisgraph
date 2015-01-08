@extends('layouts.default')

@section('header')
@stop

@section('menu-options')
	@if(Auth::check())
		<li><label>manage photos</label></li>
		<li><a href="{{ route('photos.create')}}">Add A Photo</a></li>
		<li><a id="photos-delete" href="{{route('users.index')}}">Delete Photos</a></li>

	@endif
@stop

@section('content')
@stop

@section('footer')
@stop
