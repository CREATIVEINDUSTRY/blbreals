(function (doc, win) {
	'use strict';

	var panel = doc.querySelector('.PanelRS'),
		panelBtn = doc.querySelector('.PanelRS-button'),
		hamburger = doc.querySelector('.hamburgerRS'),
        mq = win.matchMedia('(min-width: 64em)');
		
	function closePanel() {
			panel.classList.remove('is-active')
			hamburger.classList.remove('is-active');
	}

	panelBtn.onclick = function (e) {
		e.preventDefault();
		panel.classList.toggle('is-active');
		hamburger.classList.toggle('is-active');
	};

	closePanel();
    mq.addListener(closePanel);

	

})(document, window);