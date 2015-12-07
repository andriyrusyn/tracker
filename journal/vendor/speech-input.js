/*global webkitSpeechRecognition */

(function() {
	'use strict';

	if (! ('webkitSpeechRecognition' in window) ) return;

	var talkMsg = 'start talking';
	var patience = 6;


// CUSTOM STUFF ANDRIY ADDED
	var submitBtn = document.getElementById('submit');
	submitBtn.addEventListener('click', function(event) {
		event.preventDefault();
		var xmlhttp;
		var input = document.getElementById('si-input').value;
		if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  	} else { // code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	  	xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		    }
	  	}
	  	xmlhttp.open("POST","submit.php?entry="+input,true);
	  	xmlhttp.send();						
	}, false);

	
	  ColorPicker(
	    document.getElementById('slide'),
	    document.getElementById('picker'),
	    function(hex, hsv, rgb) {
	      document.body.style.backgroundColor = hex;
	    });


      var gridster;

      $(function() {
          gridtster = $(".gridster > ul").gridster({
              widget_margins: [10, 10],
              widget_base_dimensions: [140, 140],
              min_cols: 6
          }).data('gridster');
      });
// END OF CUSTOM STUFF


	function capitalize(str) {
		return str.length ? str[0].toUpperCase() + str.slice(1) : str;
	}

	// var speechInputWrappers = document.getElementsByClassName('si-wrapper');

	// [].forEach.call(speechInputWrappers, function(speechInputWrapper) {
		// find elements
		var inputEl = document.getElementById('si-input');
		var micBtn = document.getElementById('si-btn');

		// size and position them
		var inputHeight = inputEl.offsetHeight;
		var inputRightBorder = parseInt(getComputedStyle(inputEl).borderRightWidth, 10);
		var buttonSize = 0.8 * inputHeight;
		micBtn.style.top = 0.1 * inputHeight + 'px';
		micBtn.style.height = micBtn.style.width = buttonSize + 'px';
		inputEl.style.paddingRight = buttonSize - inputRightBorder + 'px';
		// speechInputWrapper.appendChild(micBtn);

		// setup recognition
		var finalTranscript = '';
		var recognizing = false;
		var timeout;
		var oldPlaceholder = null;
		var recognition = new webkitSpeechRecognition();
		recognition.continuous = true;

		function restartTimer() {
			timeout = setTimeout(function() {
				recognition.stop();
			}, patience * 1000);
		}

		recognition.onstart = function() {
			oldPlaceholder = inputEl.placeholder;
			inputEl.placeholder = talkMsg;
			recognizing = true;
			micBtn.classList.add('listening');
			restartTimer();
		};

		recognition.onend = function() {
			recognizing = false;
			clearTimeout(timeout);
			micBtn.classList.remove('listening');
			if (oldPlaceholder !== null) inputEl.placeholder = oldPlaceholder;
		};

		recognition.onresult = function(event) {
			clearTimeout(timeout);
			for (var i = event.resultIndex; i < event.results.length; ++i) {
				if (event.results[i].isFinal) {
					finalTranscript += event.results[i][0].transcript;
				}
			}
			finalTranscript = capitalize(finalTranscript);
			inputEl.value = finalTranscript;
			restartTimer();
		};

		micBtn.addEventListener('click', function(event) {
			event.preventDefault();
			if (recognizing) {
				recognition.stop();
				return;
			}
			inputEl.value = finalTranscript = '';
			recognition.start();
		}, false);
	// });
})();