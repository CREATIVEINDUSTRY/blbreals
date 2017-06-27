<?php  
final class ProyectosView {
	private $proyecto;
	private static $title = 'Proyectos';

	public function __construct() {
		$this->model = new ProyectosModel();
	}

	
	public function get_tipo ( $id = '' ) {
		$proyecto = $this->model->get_tipo( $id );

		if ( empty($proyecto) ) {
			print('<p class="u-message  u-bold  u-error">No Hay ' . self::$title . '<p>');
			} else {
			if ( count($proyecto) == 1 ) {
				printf('
			
				<div class="OnConstruccion-box xs-w95 xs-flex xs-flex-wrap xs-jc-space-between">
                  <img class="xs-w100 md-w45" src="%s" alt="">

                  <div class="xs-w100 md-w50">

					<section class="xs-flex xs-flex-wrap xs-jc-flex-start">
						<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column">
							%s
							<div class="u-line-right xs-w30"></div>	
						</h2>
					</section>
                  
					
					
					<div class="Item xs-w100"><span>Colonia:</span>&nbsp;%s</div>
				
					<div class="Item xs-w100">%s</div>
                    
                    </div>

					</div>
				',
                $proyecto[0]['imgUrl'],
				$proyecto[0]['titulo'],
				$proyecto[0]['colonia_name'],
                $proyecto[0]['clase']
				);
		
			} else {
			$html = '
				<article class="xs-w95 xs-flex xs-flex-wrap xs-jc-space-between">
					
			';

			for ($n=0; $n < count($proyecto); $n++) { 
				$html .= '
					<div  class="OnConstruccion-box xs-w100  xs-flex xs-flex-wrap xs-jc-space-between">

                     <img class="xs-w100 md-w45" src="'. $proyecto[$n]['imgUrl'] .'" alt="">


					 <div class="xs-w100 md-w50">	
                    <section class=" xs-flex xs-flex-wrap xs-jc-flex-start">
						<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column">
							'. $proyecto[$n]['titulo'] .'
							<div class="u-line-right xs-w30"></div>	
						</h2>
					</section>

                        <div  class="Item-table xs-w100">' . $proyecto[$n]['colonia_name'] . '</div>
                        <div  class="Item-table xs-w100">' . $proyecto[$n]['clase'] . '</div>
							
							<div onclick="window.open(\'description.php?proyecto_id='. $proyecto[$n]["proyecto_id"].'\',\'_self\')" class="xs-w100 botton">ver + </div>

					</div>
                    </div>
				';
			}
			$html .= ' </article>';
			print($html);
		}
	}
}
	

 
	public function __destruct() {
		unset($this);
	}
}