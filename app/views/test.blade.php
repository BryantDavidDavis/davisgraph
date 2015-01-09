<!doctype html>
<html class="no-js" lang="en">
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		{{ HTML::style('stylesheets/app.css') }}
		{{ HTML::style('packages/vendor/foundation-icon-fonts/foundation-icons.css') }}
		{{ HTML::style('css/trip_parallax.css')}}
		{{ HTML::script('packages/vendor/foundation/js/vendor/modernizr.js') }}
	</head>
	<body>
		
		<h1>Stellar.js</h1>
        <h2>Mobile Parallax Demo</h2>
        <p>Scroll down to see Stellar.js in action.</p>
		<div id="wrapper">
			<div id="scroller">
				<section>
					@foreach($trip_photos as $trip_photo)
						<a class="parallax-img" href="{{route('photos.show', array($trip_photo->id)) }}" data-stellar-ratio='2.5'><img photo-id="{{$trip_photo->id}}" src="{{$trip_photo->data}}"></a>
						<h2>this text should move slower</h2>
					@endforeach
				</section>
			</div>
		</div>
		{{ HTML::script('packages/vendor/foundation/js/vendor/jquery.js') }}
		{{ HTML::script('packages/vendor/foundation/js/vendor/fastclick.js') }}
		{{ HTML::script('packages/vendor/foundation/js/foundation.min.js') }}
		{{ HTML::script('packages/vendor/stellar/jquery.stellar.min.js')}}
		{{HTML::script('packages/vendor/iscroll/build/iscroll-lite.js')}}
		{{HTML::script('js/trip_parallax.js')}}
	</body>
</html>