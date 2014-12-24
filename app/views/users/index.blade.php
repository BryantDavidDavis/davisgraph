@extends('layouts.default')

@section('header')
@stop

@section('content')
	<h1>Welcome my furry friends</h1>
	<a href="{{ url('/logout') }}">signout</a>
@stop

@section('footer')
@stop