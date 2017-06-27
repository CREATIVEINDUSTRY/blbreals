<?php 

final class TipoModel extends Model {
public $tipo_proyecto_id;
public $tipo_proyecto_name;


public function set( $data = array() ) {
	foreach ( $data as $key => $value) {
		$$key =  $value;
	}

	$this->sql = "REPLACE INTO tipo_proyecto SET tipo_proyecto_id = $tipo_proyecto_id, tipo_proyecto_name = '$tipo_proyecto_name'";
	$this->set_query();
}

public function get( $id = '') {
	$this->sql = ($id != '') 
	? "SELECT * FROM tipo_proyecto WHERE tipo_proyecto_id = $id" 
	: "SELECT * FROM tipo_proyecto";
	$this->get_query();
	$data = array();
	foreach ($this->rows as $key => $value) {
		array_push($data, $value);
	}
	return $data;
}


public function del ($id = '' ) {
	$this->sql = "DELETE FROM tipo_proyecto WHERE tipo_proyecto_id = $id";
	$this->set_query();
}

public function __destruct() {
	unset($this);
}

}