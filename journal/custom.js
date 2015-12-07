$(document).ready(function() {
	var submitBtn = document.getElementById('submit');
	submitBtn.onclick=function(e){
		e.preventDefault();
	    e.stopPropagation();

   		var entry = $("#journal-input").val();
	    var ajax_url = "submit.php";

	    // Set up settings for AJAX call
	    var settings = {
			type: "POST",
			data: {'entry': entry},
			success: ajax_success_handler,
			error: ajax_error_handler,
			cache: false
	    }

	    // Make AJAX call
	    $.ajax(ajax_url, settings);
	};


	var ajax_success_handler = function(data, textStatus, jqXHR) {
	    $('#returnstatus').html(jqXHR.status);
	    $('#returntext').html(jqXHR.responseText);
	};

	var ajax_error_handler = function(jqXHR, textStatus, errorThown) {
	    $('#returnstatus').html(jqXHR.status);
	    $('#returntext').html(jqXHR.responseText);
	};

	ColorPicker(
	    document.getElementById('slide'),
	    document.getElementById('picker'),
	    function(hex, hsv, rgb) {
	      document.body.style.backgroundColor = hex;
		}
	);
});