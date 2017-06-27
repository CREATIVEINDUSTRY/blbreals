<?php  
final class ProyectosView {
	private $proyecto;
	private static $title = 'En Construcción';

	public function __construct() {
		$this->model = new ProyectosModel();
	}

	
	public function get_state( $id = '' ) {
		$proyecto = $this->model->get_state( $id );

		if ( empty($proyecto) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
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
                  
					
					<div class="Item xs-w100 md-45">%s</div>
					<div class="Item xs-w100"><span>Colonia:</span>&nbsp;%s</div>
				
					<div class="Item xs-w100">%s</div>


					<div onclick="window.open(\'description.php?proyecto_id='. $proyecto[$n]["proyecto_id"].'\',\'_self\')" class="xs-w100 botton">ver + </div>
					
						
					
                    
                    </div>

					</div>
				',
                $proyecto[0]['imgUrl'],
				$proyecto[0]['titulo'],
				$proyecto[0]['ubicacion'],
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

                        <div  class="Item-table xs-w100">' . $proyecto[$n]['ubicacion'] . '</div>
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
		$colonias_list = $this->list_add( new ColoniasModel(), 'colonia_id', 'colonia_name' );
		$status_list = $this->list_add( new StatusModel(), 'state_id', 'state_name' );
		$tipo_list = $this->list_add( new TipoModel(), 'tipo_proyecto_id', 'tipo_proyecto_name' );
		$img_list = $this->list_add( new ImgModel(), 'img_id',  "imgUrl" );


		printf('
			<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
						<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Agregar ' . self::$title . '		
						<div class="u-line xs-w30"></div>
						</h2>
						<p class="u-number xs-20">02.</p>
			</section>
			
			<form  class="App-form xs-w60 xs-flex xs-flex-wrap xs-jc-space-between" method="POST">
				<input type="text" name="proyecto_id" placeholder="Código de la Obra" required>
				<input class="xs-w100" type="text" name="titulo" placeholder="Nombre de la Obra" required>
				<textarea class="xs-w100" type="text" cols="22" rows="9" name="descripcion" placeholder="Descripción" required></textarea>
				<input class="xs-w40" type="date" name="year" placeholder="Año" required>
				<input class="xs-w65" type="text" name="ubicacion" placeholder="Ubicación" required>

				<select class="xs-w30" name="colonia" placeholder="Colonia" required>
					<option value="">Colonia</option>
					%s
				</select>

				<select class="xs-w60" name="clase[]" placeholder="Tipo de Obra" multiple required>
					<option value="">Tipo de Obra</option>
					%s
				</select>

				<select class="xs-w65" name="state" placeholder="Status" required>
					<option value="">Status</option>
					%s
				</select>

				<select class="xs-w65" name="imgUrl[]" placeholder="Images" multiple required>
					<option value="">Imagenes</option>
					%s
				</select>

				<input class="xs-w100 md-w48 u-button  u-add" type="button" value="Regresar" onclick="history.back()">

				<input class="u-button  u-add xs-w100 md-w48" type="submit" value="Agregar">
				<input type="hidden" name="r" value="add-crud">
			</form>',
			$colonias_list,
			$tipo_list,
			$status_list,
			$img_list
		);
	}

	public function edit_form( $id = '' ) {
		$proyecto = $this->model->get( $id );

		if ( empty($proyecto) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
		
		$colonias_list = $this->simple_list_edit( new ColoniasModel(), 'colonia_id', 'colonia_name', $proyecto[0]['colonia_name']  );
		$tipo_list = $this->multiple_list_edit( new TipoModel(), 'tipo_proyecto_id', 'tipo_proyecto_name', $proyecto[0]['clase']  );
		$status_list = $this->simple_list_edit( new StatusModel(), 'state_id', 'state_name', $proyecto[0]['state_name']  );

		printf('
			<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Editar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">02.</p>
			</section>
		
			<form class="App-form xs-w60 xs-flex xs-flex-wrap xs-jc-space-between" method="POST">
				<input type="text"  placeholder="Cédula Profesional" value="%s" disabled required>
				<input type="hidden" name="proyecto_id"  value="%s">
				<input class="xs-w100" type="text" name="titulo" placeholder="Nombre de la Obra" value="%s" required>
				<textarea class="xs-w100" type="text" cols="22" rows="9" name="descripcion" placeholder="Descripción" required>"%s"</textarea>
				
  				<input class="xs-w40" type="date" name="year" placeholder="Año" value="%s" required>
  				<input class="xs-w65" type="text"  name="ubicacion" placeholder="Ubicación"  value="%s" required>
  				
  	
				<select class="xs-w30" name="colonia" placeholder="Colonia" required>
					<option value="">Colonia</option>
					%s
				</select>


				<select class="xs-w50" name="clase[]" placeholder="Tipo de Obra" multiple required>
					<option value="">Tipo de Obra</option>
					%s
				</select>

				<select class="xs-w40" name="state" placeholder="Status"  required>
					<option value="">Status</option>
					%s
				</select>

				<img src="%s" alt="" class="Grup-img xs-w100 md-w35">
				<input class="xs-w90" type="file" name="img" placeholder="Imagen" required>

				<input class="xs-w100 md-w48 u-button  u-add" type="button" value="Regresar" onclick="history.back()">

				<input class="u-button  u-edit xs-w100 md-w48" type="submit" value="Editar">
				<input type="hidden" name="r" value="edit-crud">
			</form>',
			$proyecto[0]['proyecto_id'],
			$proyecto[0]['proyecto_id'],
			$proyecto[0]['titulo'],
			$proyecto[0]['descripcion'],
			$proyecto[0]['year'],
			$proyecto[0]['ubicacion'],
			$colonias_list,
			$tipo_list,
			$status_list,
			$proyecto[0]['imgUrl']
			
		);
	}
}

	public function del_form( $id = '' ) {
		$proyecto = $this->model->get( $id );

		if ( empty($proyecto) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			$html = '
			 	<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Eliminar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">02.</p>
				</section>

				<form class="App-form xs-w60" method="POST">
					<p class="u-message">
						¿Estas seguro de eliminar el ' . self::$title . ': 
						<h3 class="u-message  u-bold">%s?</h3>
					</p>
					<h2 class="u-message u-bold ">%s</h2>
					<input  class="u-button  u-delete xs-w100 md-w48" type="submit" value="SI">
					<input class="u-button  u-show xs-w100 md-w48" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="proyecto_id" value="%s">
					<input type="hidden" name="r" value="delete-crud">
				</form>
			';

			printf(
				$html,
				$proyecto[0]['proyecto_id'],
				$proyecto[0]['titulo'],
				$proyecto[0]['proyecto_id']
			);
		}
	}

	private function list_add( $table, $id, $name ) {
		$records = $table->get();
		$list = '';

		for ($n=0; $n < count($records); $n++) { 
			$list .= '<option value="' . $records[$n][$id] . '">' . $records[$n][$name] . '</option>';
		}

		return $list;
	}

	private function simple_list_edit( $table, $id, $name, $value ) {
		$records = $table->get();
		$list = '';

		for ($n=0; $n < count($records); $n++) {
			$selected = ( array_search($value, $records[$n]) ) ? 'selected' : '';
			$list .= '<option value="' . $records[$n][$id] . '" ' . $selected . '>' . $records[$n][$name] . '</option>';
		}

		return $list;
	}

	private function multiple_list_edit( $table, $id, $name, $value ) {
		$records = $table->get();
		$list = '';
		$values = explode(',', $value);
		//var_dump($values);
			
		for ($n=0; $n < count($records); $n++) {
			for ($i=0; $i < count($values); $i++) { 
				if ( array_search($values[$i], $records[$n]) ) {
					$selected = ' selected ';
					break;
				} else {
					$selected = '';
				}
			}
			$list .= '<option value="' . $records[$n][$id] . '"' . $selected . '>' . $records[$n][$name] . '</option>';
		}

		return $list;
	}

	public function __destruct() {
		unset($this);
	}
}