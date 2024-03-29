var finishedbutton = $("<ul class='small-block-grid-2 small-centered medium-block-grid-4 large-block-grid-6 columns centered'><li><a id='finished-button' class='button small info'>Finished</a></li></ul>");


var editbutton = "<a class='item'><i class='fi-pencil'></i></a>";

var bindForm = function(modelCol, currentText, photo_id) {
	var form = "<form class='edit-photo-details-form'><div class='row collapse'><div class='small-10 centered columns'><input type='hidden' name='id' value='"+photo_id+"'/><input type='hidden' name='fieldname' value='"+modelCol+"'/><input type='text' name='content' placeholder='"+currentText+"' value='"+currentText+"'></div><div class='small-2 centered columns'><a href='#' class='button postfix model-col-update-ajax'><i class='fi-check'></i></a></div></div></form>";
	return form;
	
};

var originalDiv = function(newStuff, photo_id, modelcol) {
	var newdiv;
	if(modelcol === "title") {
		newdiv = '<h3 class="editable" photo-id="'+photo_id+'" model-col="title"><span>'+newStuff+'</span></h3>';
	} else {
		newdiv = '<p class="editable" photo-id="'+photo_id+'" model-col="description"><span>'+newStuff+'</span></p>';
	}
	return '<div class="row"><div class="small-12 medium-10 large-10 small-centered text-center columns">'+newdiv+'</div></div>';
};

var commentDiv = function(data) {
	return '<div class="row comment-row"><div class="small-12 medium-10 large-10 small-centered text-center columns"><p photo-id="'+data.photo_id+'" model-col="comment"><span>'+data.comment+'</span></p></div></div>';	
};

var photo_id = $('img').attr('photo-id');

$('#photo-update').on('click', function(e) {
	e.preventDefault();
	var editables = $(".editable").find('span');
	$(editbutton).insertBefore(editables);
	$('.exit-off-canvas').trigger('click');
	
	$('body').on('click', '.item', function(e) {
		
		var modelCol = $(this).parent().attr('model-col');
		var currentText = $(this).parent().find('span').text();
		$(this).closest('div').replaceWith(bindForm(modelCol, currentText, photo_id));
	});

});

$('body').on('click', '.model-col-update-ajax', function(e) {
	var newText = $(this).closest('form').find('input[name="content"]');
	$.ajax({
		url: "/photos/updateField",
		type: "post",
		data: $(this).closest('form').serialize(),
		success: function(data) {
			$(e.target).closest('.edit-photo-details-form').replaceWith(originalDiv(data.newcontent, photo_id, data.modelcol));	
		},
		error: function(xhr) {
			alert(xhr.responseText);
		}
	});
});

$('#comment-submit').on('click', function(e) {
	e.preventDefault();
	$.ajax({
		url: "/comments/storeComment",
		type: "post",
		data: $(this).closest('form').serialize(),
		success: function(data) {
			if($('.comment-row').length) {
				$('.comment-row').last().after(commentDiv(data));	
			} else {
				$('.description-row').last().after(commentDiv(data));
			}
		},
		error: function(xhr) {
			alert(xhr.responseText);
		}		
	});
});
	