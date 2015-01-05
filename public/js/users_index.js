var deletebutton = $("<a class='item'><i class='foundicon-trash'></i></a>").css({"position": "absolute", "top": "10px", "right": "5px", "color": "red"});

var displayDeleteButton = function(deletebutton) {

	$(".th-equal").append(deletebutton);
}


$('#photos-delete').on('click', function(e) {
	e.preventDefault();
	displayDeleteButton(deletebutton);
	$('.exit-off-canvas').trigger('click');
	$(".th-equal").on('click', ".item", function(e) {
		e.preventDefault();
		//alert('hello');
		//alert($(this).attr('class'));
		var parent_thumb = $(this).closest("a.th-equal");
		var photo_id = parent_thumb.attr("photo-id");
		parent_thumb.closest('li').remove();
		$.ajax({
			url: "/photos/photoDestroy",
			type: 'get',
			data: {id: photo_id },
			success: function() {
				//alert('yeah we did it');
				
			},
			error: function(xhr) {
				alert(xhr.responseText);
			}
			
		});
		
	});
	
});