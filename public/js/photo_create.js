$(document).ready(function() {
	var bar = $('.meter');
	var percent = $('.percent');
	//var status = $('#status');
	   
	$('form').ajaxForm({
	 
	    beforeSend: function() {
	        
	        var percentVal = '0%';
	        //bar.width(percentVal)
	        percent.html(percentVal);
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	        var percentVal = percentComplete + '%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
	    success: function() {
	        var percentVal = '100%...redirecting to home';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
		complete: function(xhr) {
			window.location.href = "/users/";
		}
	}); 
/*
	
	$(":submit").on('click', function(e) {
		alert('now we will send');
		e.preventDefault();
		$(this).ajaxSubmit({
			
		});
		return false;
	});
*/
		
});

/*
(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
   
$('form').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
	complete: function(xhr) {
		status.html(xhr.responseText);
	}
}); 

})(); 
*/
/*
	$.ajax({
	  xhr: function() {
	    var xhr = new window.XMLHttpRequest();
	
	    xhr.upload.addEventListener("progress", function(evt) {
	      if (evt.lengthComputable) {
	        var percentComplete = evt.loaded / evt.total;
	        percentComplete = parseInt(percentComplete * 100);
	        console.log(percentComplete);
	
	        if (percentComplete === 100) {
				alert("we did it");
	        }
	
	      }
	    }, false);
	
	    return xhr;
	  },
	  url: 'photos/store',
	  type: "POST",
	  data: JSON.stringify(fileuploaddata),
	  contentType: "application/json",
	  dataType: "json",
	  success: function(result) {
	    console.log(result);
	  }
	});	
*/
/*
$(":submit").on('click', function(e) {


});
*/

/*
	alert('i was clicked');
	//e.preventDefault();
	$.ajax({
		url: "/photos/store",
		type: 'post',
		data: {form_name: 'upload_progress'},
		success: function(data) {
			alert("we got a response back");
			$(".meter").animate({width:"100%"});
			console.log(JSON.parse(data));
		},
		error: function(xhr, textStatus, thrownError) {
			alert('did not get a response there');
		}
	});
*/
	

/*
var xhr = new XMLHttpRequest();
xhr.upload.onprogress = function(evt) {
	console.log('progress');
}
*/