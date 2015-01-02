@extends('layouts.default')

@section('header')
@stop

@section('content')

<label>{{$photo->title }}</label><img src="{{$image}}">
<p>{{ $photo->description }} </p>

@stop

@section('footer')
@stop