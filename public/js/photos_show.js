var finishedbutton = $("<ul class='small-block-grid-2 small-centered medium-block-grid-4 large-block-grid-6 columns centered'><li><a id='finished-button' class='button small info'>Finished</a></li></ul>");


var editbutton = "<a class='item'><i class='fi-pencil'></i></a>";

var bindForm = function(modelCol, currentText, photo_id) {
	var form = "<form><div class='row collapse'><div class='small-10 centered columns'><input type='hidden' name='id' value='"+photo_id+"'/><input type='hidden' name='fieldname' value='"+modelCol+"'/><input type='text' name='content' placeholder='"+currentText+"' value='"+currentText+"'></div><div class='small-2 centered columns'><a href='#' class='button postfix model-col-update-ajax'><i class='fi-check'></i></a></div></div></form>";
	return form;
	
};

var originalDiv = function(newStuff, photo_id) {
	return '<div class="row"><div class="small-12 medium-10 large-10 small-centered text-center columns"><h3 photo-id="'+photo_id+'" model-col="title"><span>'+newStuff+'</span></h3></div></div>';
	//return "hello";
};

var photo_id = $('img').attr('photo-id');

$('#photo-update').on('click', function(e) {
	e.preventDefault();
	var editables = $("[photo-id]").find('span');
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
		// data: {id: photo_id, fieldname: modelCol, content: newText},
		success: function(data) {
			var newStuff = $.parseJSON(data);
			$('form').replaceWith(originalDiv(newStuff, photo_id));	
		},
		error: function(xhr) {
			alert(xhr.responseText);
		}
	});
	
});	
	