var deletebutton = $("<a class='item'><i class='fi-trash'></i></a>").css({"position": "absolute", "top": "10px", "right": "5px", "color": "red"});

var finishedbutton = $("<ul class='small-block-grid-2 small-centered medium-block-grid-4 large-block-grid-6 columns centered'><li><a id='finished-button' class='button small info'>Finished</a></li></ul>");

var rotatebutton = $("<a class='item'><i class='fi-loop'></i></a>").css({"position": "absolute", "top": "10px", "right": "5px", "color": "aluminum"});


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
