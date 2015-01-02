@extends('layouts.default')

@section('header')
	{{HTML::style('css/users_index.css') }}
@stop

@section('content')
		<ul class="small-block-grid-2 small-centered columns medium-block-grid-4 large-block-grid-6">
			@if (empty($photos))
				<p>Photo Album Empty</p>
			@else
			
				@foreach($photos as $photo)
				<li>
					<a class="th th-equal" href="{{route('photos.show', array($photo->id)) }}" style="background-image: url({{$photo->data}})">
						<span>{{ $photo->title }}</span>
					</a>			
				</li>
				@endforeach
				
			@endif
		</ul>		
		<a href="{{ route('photos.create') }}">Let's add some pictures</a>
@stop

@section('footer')
@stop