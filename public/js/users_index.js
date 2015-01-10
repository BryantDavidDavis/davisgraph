var deletebutton = $("<a class='item'><i class='fi-trash'></i></a>").css({"position": "absolute", "top": "10px", "right": "5px", "color": "red"});

var finishedbutton = $("<ul class='small-block-grid-2 small-centered medium-block-grid-4 large-block-grid-6 columns centered'><li><a id='finished-button' class='button small info'>Finished</a></li></ul>");

var rotatebutton = $("<a class='item'><i class='fi-loop'></i></a>").css({"position": "absolute", "top": "10px", "right": "5px", "color": "aluminum"});


var mycheckbox = '<input class="show-on-trip-toggle" type="checkbox">';

var displayButton = function(button) {

	$(".th-equal").append(button);
}

$('#photos-delete').on('click', function(e) {
	e.preventDefault();
	displayButton(deletebutton);
	$(finishedbutton).insertBefore($('.photo-album'));
	$('.exit-off-canvas').trigger('click');
	$(".th-equal").on('click', ".item", function(e) {
		e.preventDefault();
		//alert('hello');
		//alert($(this).attr('class'));
		var parent_thumb = $(this).closest("a.th-equal");
		var photo_id = parent_thumb.attr("photo-id");
		$.ajax({
			url: "/photos/photoDestroy",
			type: 'get',
			data: {id: photo_id },
			success: function() {
				//alert('yeah we did it');
				parent_thumb.closest('li').remove();
			},
			error: function(xhr) {
				alert(xhr.responseText);
			}
			
		});
		
	});
	$('.main-section').on('click', '#finished-button', function(e) {
		$(".th-equal").off().find('.item').remove();
		$('.main-section').find('#finished-button').closest('ul').remove();
	});
});


$('#photos-rotate').on('click', function(e) {
	e.preventDefault();
	displayButton(rotatebutton);
	$(finishedbutton).insertBefore($('.photo-album'));
	$('.exit-off-canvas').trigger('click');
	
	$(".th-equal").on('click', ".item", function(e) {
		e.preventDefault();
		var parent_thumb = $(this).closest("a.th-equal");
		var photo_id = parent_thumb.attr("photo-id");
		//parent_thumb.closest('li').remove();
		$.ajax({
			url: "/photos/photoRotate",
			type: 'get',
			data: {id: photo_id },
			success: function(data) {
				parent_thumb.css({"background-image": "url("+data.encoded+")"});
			},
			error: function(xhr) {
				alert(xhr.responseText);
			}
			
		});
		
	});	
	
	$('.main-section').on('click', '#finished-button', function(e) {
		$(".th-equal").off().find('.item').remove();
		$('.main-section').find('#finished-button').closest('ul').remove();
	});
});

$('#photos-show-on-trip').on('click', function(e) {
	e.preventDefault();
	displayButton(mycheckbox);
	$(finishedbutton).insertBefore($('.photo-album'));

	var idset = $('[photo-id]').map(function() {
		return $(this).attr('photo-id');	
	}).get();	
	$.ajax({
		url: "/photos/showTripStatus",
		type: "get",
		data: {ids: idset},
		success: function(data) {
			console.log('the show Trip status success function should work now, so why is it not iterating through the results');
			$.each(data, function() {
				var my_thumbnail = $("[photo-id='"+this.photo_id+"']");
				if(this.status === "1") {
					console.log('box for photo number: '+this.photo_id+' should be checked');
					my_thumbnail.find('.show-on-trip-toggle').prop('checked', true);
				} else {
					my_thumbnail.find('.show-on-trip-toggle').prop('checked', false);
				}
				
			});
			
		},
		error: function(xhr) {
			alert(xhr.responseText);
		}
		
	});
	
	$('.exit-off-canvas').trigger('click');
	
	$(".th-equal").on('change', ".show-on-trip-toggle", function(e) {
		var showOnTrip = $(e.target).prop('checked');
		var parent_thumb = $(this).closest("a.th-equal");
		var photo_id = parent_thumb.attr("photo-id");
		$.ajax({
			url: "/photos/photoToggleTripShow",
			type: 'get',
			data: {id: photo_id, showme: showOnTrip},
			success: function(data) {
			},
			error: function(xhr) {
				alert(xhr.responseText);
			}
			
		});
		
	});	
	
	$('.main-section').on('click', '#finished-button', function(e) {
		$(".th-equal").off().find('.show-on-trip-toggle').remove();
		$('.main-section').find('#finished-button').closest('ul').remove();
	});
});
