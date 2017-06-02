(function (d, w) {
	'use strict';

	var mq64 = w.matchMedia('(min-width:64em)'),
		gmaps = d.querySelector('#gmaps');

	function performanceOptimization(mq) {
		if (mq.matches) {
			gmaps.innerHTML = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937586!2d2.2922926156743895!3d48.858370079287475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTorre+Eiffel!5e0!3m2!1ses-419!2smx!4v1461982266426" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
		} else {
			gmaps.innerHTML = '<a href="https://www.google.com.mx/maps/place/Torre+Eiffel/@48.8583701,2.2922926,17z/data=!4m6!1m3!3m2!1s0x47e66e2964e34e2d:0x8ddca9ee380ef7e0!2sTorre+Eiffel!3m1!1s0x47e66e2964e34e2d:0x8ddca9ee380ef7e0" target="_blank">Ver Mapa</a>';
		}
	}

	w.onload = performanceOptimization(mq64);
	mq64.addListener(performanceOptimization);
	
})(document, window);