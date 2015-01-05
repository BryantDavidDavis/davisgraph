@extends('layouts.default')

@section('header')
@stop

@section('menu-options')
	<li><label>manage photos</label></li>
	<li><a href="{{ route('photos.create')}}">Add A Photo</a></li>
	<li><a id="photos-delete" href="{{route('users.index')}}">Delete Photos</a></li>
	<li><a id="photos-rotate" href="#">Rotate Photos</a></li>
@stop

@section('content')
		<ul class="small-block-grid-2 small-centered columns medium-block-grid-4 large-block-grid-6">
			@if (empty($photos))
				<p>Photo Album Empty</p>
			@else
			
				@foreach($photos as $photo)
				<li>
					<a class="th th-equal" photo-id="{{{$photo->id}}}" href="{{route('photos.show', array($photo->id)) }}" style="background-image: url({{$photo->data}})">
						<span>{{ $photo->title }}</span>
					</a>			
				</li>
				@endforeach
				
			@endif
		</ul>
@stop

@section('footer')
@stop