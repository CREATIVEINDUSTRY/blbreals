(function (doc, win) {
	'use strict';

	var panel = doc.querySelector('.Panel'),
		panelBtn = doc.querySelector('.Panel-button'),
		hamburger = doc.querySelector('.hamburger'),
		mq = win.matchMedia('(min-width: 64em)');

	function closePanel(mq) {
		if (mq.matches) {
			panel.classList.remove('is-active')
			hamburger.classList.remove('is-active');
		}
	}

	panelBtn.onclick = function (e) {
		e.preventDefault();
		panel.classList.toggle('is-active');
		hamburger.classList.toggle('is-active');
	};

	closePanel(mq);
	mq.addListener(closePanel);
})(document, window);