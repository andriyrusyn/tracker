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

	    // Make the AJAX call
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

	// ColorPicker(
	//     document.getElementById('slide'),
	//     document.getElementById('picker'),
	//     function(hex, hsv, rgb) {
	//       document.body.style.backgroundColor = hex;
	// 	}
	// );

	cp = ColorPicker(document.getElementById('slide'), document.getElementById('picker'), 
                function(hex, hsv, rgb, mousePicker, mouseSlide) { 
                  	currentColor = hex;
                    ColorPicker.positionIndicators(
                        document.getElementById('slide-indicator'),
                        document.getElementById('picker-indicator'),
                        mouseSlide, mousePicker
                    );
                    document.body.style.backgroundColor = hex;
                    // document.getElementById('hex').innerHTML = hex;
                    // document.getElementById('rgb').innerHTML = 'rgb(' + rgb.r.toFixed() + ',' + rgb.g.toFixed() + ',' + rgb.b.toFixed() + ')';
                    // document.getElementById('hsv').innerHTML = 'hsv(' + hsv.h.toFixed() + ',' + hsv.s.toFixed(2) + ',' + hsv.v.toFixed(2) + ')';
            });
            cp.setHex('#D4EDFB');
            
});