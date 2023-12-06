//
// Be stepper js
//


'use strict';


	if ($('#courseForm').length) {
		var courseForm
		document.addEventListener('DOMContentLoaded', function () {
			courseForm = new Stepper(document.querySelector('#courseForm'), {
				linear: false,
				animation: true
			});
		});

	}

	if ($('#stepperForm').length) {
		var stepperForm
		document.addEventListener('DOMContentLoaded', function () {
			stepperForm = new Stepper(document.querySelector('#stepperForm'), {
				linear: false,
				animation: true
			});
		});

	}
