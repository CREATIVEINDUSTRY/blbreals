<?php  
final class ColoniasView {
	private $model;
	private static $title = 'Colonias';

	public function __construct() {
		$this->model = new ColoniasModel();
	}

	public function get( $id = '' ) {
		$colonias = $this->model->get( $id );

		if ( empty($colonias) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			$html = '
				<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Gestión de ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">05.</p>
				</section>
				
				<div class="Table-titles xs-w95 xs-flex xs-flex-wrap xs-jc-space-between">
					<div class="Item-table xs-w60"><span>Colonias</span></div>
							<form class="Item-table xs-w30" method="POST">
								<input type="hidden" name="r" value="add-form">
								<input class="u-button  u-add xs-w100" type="submit" value="Agregar">
							</form>
						</div>
			';

			for ($n=0; $n < count($colonias); $n++) { 
				$html .= '
					<div class="Table-item xs-w95 xs-flex xs-flex-wrap xs-jc-space-between">
						<div  class="Item-table xs-w60">' . $colonias[$n]['colonia_name'] . '</div>
						<div  class="Item-table xs-w30  xs-flex xs-flex-wrap">
							<form class="xs-w48" method="POST">
								<input type="hidden" name="r" value="edit-form">
								<input type="hidden" name="colonia_id" value="' . $colonias[$n]['colonia_id'] . '">
								<input class="u-button  u-edit xs-w100" type="submit" value="Editar">
							</form>
							<form class="xs-w48" method="POST">
								<input type="hidden" name="r" value="delete-form">
								<input type="hidden" name="colonia_id" value="' . $colonias[$n]['colonia_id'] . '">
								<input class="u-button  u-delete xs-w100" type="submit" value="Eliminar">
							</form>
						</div>
					</div>
				';
			}

			print($html);
		}
	}

	public function set( $data = array() ) {
		$this->model->set( $data );
		print('<p class="u-message  u-bold  u-add">' . self::$title . ' GUARDADO</p>');
		RouterController::app_reload();
	}

    	public function edit( $data = array() ) {
		$this->model->edit( $data );
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
				<p class="u-number xs-20">05.</p>
			</section>

			<form class="App-form xs-w60 u-margin-top" method="POST">
				<input class="xs-w65" type="text" name="colonia_name" placeholder="Nueva Colonia" required>
				<input class="u-button  u-add xs-w30" type="submit" value="Agregar">
				<input type="hidden" name="r" value="add-crud">

				<input class="u-button  u-show xs-w95" type="button" value="Regresar" onclick="history.back()">
			</form>
		');
	}

	public function edit_form( $id = '' ) {
		$colonias = $this->model->get( $id );

		if ( empty($colonias) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			$html = '
			<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Edirar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">05.</p>
			</section>

				<form class="App-form xs-w60 u-margin-top" method="POST">
					<input type="hidden" name="colonia_id" value="%s">
					<input class="xs-w65" type="text" name="colonia_name" placeholder="colonia" value="%s" required>
					<input  class="u-button  u-edit xs-w30" type="submit" value="Editar">
					<input type="hidden" name="r" value="edit-crud">

					<input class="u-button  u-show xs-w95" type="button" value="Regresar" onclick="history.back()">
				</form>
			';

			printf(
				$html,
				$colonias[0]['colonia_id'],
				$colonias[0]['colonia_name']
			);
		}
	}

	public function del_form( $id = '' ) {
		$colonia = $this->model->get( $id );

		if ( empty($colonia) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			$html = '
			<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Eliminar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">05.</p>
			</section>

				<form class="App-form xs-w60 u-margin-top" method="POST">
					<p class="u-message">
						¿Estas seguro de eliminar el ' . self::$title . ': 
						<h3 class="u-message  u-bold">%s?</h3>
					</p>
					<input  class="u-button  u-delete xs-w100 md-w48" type="submit" value="SI">
					<input class="u-button  u-add xs-w100 md-w48" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="colonia_id" value="%s">
					<input type="hidden" name="r" value="delete-crud">
				</form>
			';

			printf(
				$html,
				$colonia[0]['colonia_name'],
				$colonia[0]['colonia_id']
			);
		}
	}

	public function __destruct() {
		unset($this);
	}
}