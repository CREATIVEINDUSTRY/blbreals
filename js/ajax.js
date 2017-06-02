(function (d, w) {
	'use strict';

	var READY_STATE_COMPLETE = 4,
		OK = 200,
		NOT_FOUND = 404,
		ajax = new XMLHttpRequest(),
		proyect = d.querySelector('#proyect'),
		linksMenu = d.querySelectorAll('.proyect a');

		function proyectInfo() {
			if ( ajax.readyState === READY_STATE_COMPLETE && ajax.status === OK ) {
				proyect.innerHTML = ajax.response;
			} else if ( ajax.status === NOT_FOUND ) {
				proyect.innerHTML = '<h3>El servidor NO responde. Error N°' + ajax.status + ': <mark>' + ajax.statusText + '</mark></h3>';
			}
		}

		function ajaxRequest(e) {
			//alert('funciona');
			e.preventDefault();

			ajax.onreadystatechange = proyectInfo;
			ajax.open('GET', e.target.href, true);
			ajax.setRequestHeader('Content-Type', 'text/html');
			ajax.send();
		}

		w.onload = function () {
			for (var i = 0; i < linksMenu.length; i++) {
				linksMenu[i].onclick = ajaxRequest;
			};
		}
})(document, window);