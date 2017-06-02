(function (d) {
	'use strict';

	function sendForm(e) {
		var form = e.target,
			preload = form.querySelector('.preload'),
			message = form.querySelector('.message');
		
		e.preventDefault();
		//alert('enviando');

		preload.classList.remove('hidden');

		setTimeout(function () {
			preload.classList.add('hidden');
			message.classList.remove('hidden');

			setTimeout(function () {
				form.reset();
				message.classList.add('hidden');
			}, 3000);
		}, 3000);
	}

	for (var i = 0; i < d.forms.length; i++) {
		d.forms[i].onsubmit = sendForm;
	};

	
})(document);