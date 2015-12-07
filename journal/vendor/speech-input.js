/*global webkitSpeechRecognition */

(function() {
	'use strict';

	if (! ('webkitSpeechRecognition' in window) ) return;

	var talkMsg = 'start talking';
	var patience = 600;

	function capitalize(str) {
		return str.length ? str[0].toUpperCase() + str.slice(1) : str;
	}

		// find elements
		var inputEl = document.getElementById('journal-input');
		var micBtn = document.getElementById('si-btn');

		// size and position them
		var inputHeight = inputEl.offsetHeight;
		var inputRightBorder = parseInt(getComputedStyle(inputEl).borderRightWidth, 10);
		var buttonSize = 0.8 * inputHeight;
		micBtn.style.top = 0.1 * inputHeight + 'px';
		micBtn.style.height = micBtn.style.width = buttonSize + 'px';
		inputEl.style.paddingRight = buttonSize - inputRightBorder + 'px';

		// setup recognition
		var finalTranscript = '';
		var recognizing = false;
		var timeout;
		var oldPlaceholder = null;
		var recognition = new webkitSpeechRecognition();
		var interim_transcript = '';
		recognition.continuous = true;
		recognition.interimResults = true;

		function restartTimer() {
			timeout = setTimeout(function() {
				recognition.stop();
			}, patience * 100000);
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
			//clearTimeout(timeeout);
			interim_transcript += finalTranscript;
			micBtn.classList.remove('listening');
			inputEl.value = finalTranscript;
			recognition.start();

			//if (oldPlaceholder !== null) inputEl.placeholder = interim_transcript;
			//if (oldPlaceholder !== null) inputEl.placeholder = oldPlaceholder;
		};

		recognition.onresult = function(event) {
			var interim_transcript = finalTranscript;
			for (var i = event.resultIndex; i < event.results.length; ++i) {
				if (event.results[i].isFinal) {
					finalTranscript += event.results[i][0].transcript;
					inputEl.value = finalTranscript;
				}
				else{
					interim_transcript += event.results[i][0].transcript;
					inputEl.value = finalTranscript + interim_transcript;
				}
			}

			finalTranscript = capitalize(finalTranscript);
			inputEl.value = interim_transcript;
			restartTimer();

		};

		micBtn.addEventListener('click', function(event) {
			event.preventDefault();
			if (recognizing) {
				recognition.stop();
				return;
			}
			//inputEl.value = finalTranscript = '';
			recognition.start();
		}, false);
	 //});
})();