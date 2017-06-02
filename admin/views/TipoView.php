<?php  
final class tipoView {
	private $model;
	private static $title = 'Tipo de Proyecto';

	public function __construct() {
		$this->model = new tipoModel();
	}

	public function get( $id = '' ) {
		$tipo = $this->model->get( $id );

		if ( empty($tipo) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			$html = '
			    <section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Gestión de ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">03.</p>
				</section>
				<div class="Table-titles xs-w95 xs-flex xs-flex-wrap xs-jc-space-between">
					<div class="Item-table xs-w20"><span>ID</span></div>
					<div class="Item-table xs-w40"><span>Estados</span></div>
							<form class="Item-table xs-w30" method="POST">
								<input type="hidden" name="r" value="add-form">
								<input class="u-button  u-add xs-w100" type="submit" value="Agregar">
							</form>
					</div>
			';

			for ($n=0; $n < count($tipo); $n++) { 
				$html .= '
					<div class="Table-item xs-w95 xs-flex xs-flex-wrap xs-jc-space-between">
						<div  class="Item-table xs-w20">' . $tipo[$n]['tipo_proyecto_id'] . '</div>
						<div  class="Item-table xs-w40">'  . $tipo[$n]['tipo_proyecto_name'] . '</div>
						<div  class="Item-table xs-w30  xs-flex xs-flex-wrap">
						<form class="xs-w48" method="POST">
								<input type="hidden" name="r" value="edit-form">
								<input type="hidden" name="tipo_proyecto_id" value="' . $tipo[$n]['tipo_proyecto_id'] . '">
								<input class="u-button  u-edit xs-w100" type="submit" value="Editar">
							</form>
						
							<form class="xs-w48" method="POST">
								<input type="hidden" name="r" value="delete-form">
								<input type="hidden" name="tipo_proyecto_id" value="' . $tipo[$n]['tipo_proyecto_id'] . '">
								<input class="u-button  u-delete xs-w100" type="submit" value="Eliminar">
							</form></div>
				</div>
				';
			}


			print($html);
		}
	}

	public function set( $data = array() ) {
		$this->model->set( $data );
		print('<p class="u-message  u-bold  u-add">' . self::$title . ' SALVADO</p>');
		RouterController::app_reload();
	}

	public function del( $id = '' ) {
		$this->model->del( $id );
		print('<p class="u-message  u-bold  u-add">' . self::$title . ' ELIMINADO</p>');
		RouterController::app_reload();
	}

	public function add_form() {
		print('
		    <section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Agregar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">03.</p>
			</section>
			
			<form class="App-form xs-w60 u-margin-top" method="POST">
				<input class="xs-w65" type="text" name="tipo_proyecto_name" placeholder="Nuevo Tipo de Proyecto" required>
				<input class="u-button  u-add xs-w30" type="submit" value="Agregar">
				<input type="hidden" name="r" value="add-crud">
			
				<input class="u-button  u-show xs-w95" type="button" value="Regresar" onclick="history.back()">

			</form>
		');
	}

	public function edit_form( $id = '' ) {
		$tipo = $this->model->get( $id );

		if ( empty($tipo) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			$html = '
				<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Editar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">03.</p>
				</section>

				<form class="App-form xs-w60 u-margin-top" method="POST">
					<input type="hidden" name="tipo_proyecto_id" value="%s">
					<input class="xs-w65" type="text" name="tipo_proyecto_name" placeholder="status" value="%s" required>
					<input  class="u-button  u-edit xs-w30" type="submit" value="Editar">
					<input type="hidden" name="r" value="edit-crud">

					<input class="u-button  u-show xs-w95" type="button" value="Regresar" onclick="history.back()">
				</form>
			';

			printf(
				$html,
				$tipo[0]['tipo_proyecto_id'],
				$tipo[0]['tipo_proyecto_name']
			);
		}
	}

	public function del_form( $id = '' ) {
		$tipo = $this->model->get( $id );

		if ( empty($tipo) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			$html = '
				<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Eliminar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">03.</p>
				</section>

			
				<form class="App-form xs-w60" method="POST">
					<p class="u-message">
						¿Estas seguro de eliminar el ' . self::$title . ': 
						<h3 class="u-message  u-bold">%s?</h3>
					</p>
					<input  class="u-button  u-delete xs-w100 md-w48" type="submit" value="SI">
					<input class="u-button  u-add xs-w100 md-w48" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="tipo_proyecto_id" value="%s">
					<input type="hidden" name="r" value="delete-crud">
				</form>
			';

			printf(
				$html,
				$tipo[0]['tipo_proyecto_name'],
				$tipo[0]['tipo_proyecto_id']
			);
		}
	}

	public function __destruct() {
		unset($this);
	}
}