  (function (d, w, j) {
	'use strict';

	var ajax = new XMLHttpRequest(),
		movies = d.querySelector('#on_construction'),
		moviesInfo,
		moviesTemplate = '';

	w.onload = function () {
		ajax.open('GET', './js/movies.json', true);

		ajax.onload = function () {
			if (ajax.status >= 200 && ajax.status < 400) {
			
				moviesInfo = j.parse(ajax.responseText);
		
					moviesTemplate += `
            <section class="OnConstruccion-box container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-start">
			<img src="${moviesInfo['movies'][0].poster}" alt="" class="OnConstruccion-img xs-w100 md-w35">
			<div class="OnConstruccion-text xs-w100 md-w55 xs-flex xs-flex-wrap xs-flex-column xs-jc-flex-end">
			<h3 class="xs-w90 md-w55 xs-flex xs-flex-wrap xs-flex-column xs-jc-flex-end">
			<div class="u-line-up xs-w30"></div>
			${moviesInfo['movies'][0].title}		
			</h3>
			<p class="xs-w100">${moviesInfo['movies'][0].descripcion}</p>
			<a href="${moviesInfo['movies'][0].url}" class="botton xs-w35" target="_blank">ver proyecto</a>
			</div>
		    </section>

            <section class="OnConstruccion-box container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
			<img src="${moviesInfo['movies'][1].poster}" alt="" class="OnConstruccion-img xs-w100 md-w35">
			<div class="OnConstruccion-textRight xs-w100 md-w55 xs-flex xs-flex-wrap xs-jc-flex-end md-order--1">
			<div class="u-line-up xs-w15"></div>
			<h3 class="xs-w100">${moviesInfo['movies'][1].title}</h3>
			<p class="xs-w100">${moviesInfo['movies'][1].descripcion}</p>
			<a href="${moviesInfo['movies'][1].url}" class="botton xs-w35" target="_blank">ver proyecto</a>
			</div>
		    </section>

					`;
				

			} else {
				moviesTemplate = '<h3>El servidor NO responde. Error N°' + ajax.status + ': <mark>' + ajax.statusText + '</mark></h3>';
			}

			movies.innerHTML = moviesTemplate;
		};

		ajax.send();
	};
})(document, window, JSON);