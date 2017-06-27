<?php 

final class ColoniasModel extends Model {
public $colonia_id;
public $colonia_name;

public function __construct() { }

public function set( $data = array() ) {
	foreach ( $data as $key => $value) {
		$$key =  $value;
	}

	$this->sql = "REPLACE INTO colonias SET colonia_id = $colonia_id, colonia_name = '$colonia_name'";
	$this->set_query();
}

public function edit( $data = array() ) {
	foreach ( $data as $key => $value) {
		$$key =  $value;
	}

	$this->sql = "UPDATE colonias SET colonia_name = '$colonia_name' WHERE colonia_id = $colonia_id";
	$this->set_query();
}

public function get( $id = '') {
	$this->sql = ($id != '') 
	? "SELECT * FROM colonias WHERE colonia_id = $id" 
	: "SELECT * FROM colonias";
	$this->get_query();
	$data = array();
	foreach ($this->rows as $key => $value) {
		array_push($data, $value);
	}
	return $data;
}


public function del ($id = '' ) {
	$this->sql = "DELETE FROM colonias WHERE colonia_id = $id";
	$this->set_query();
}

public function __destruct() {
	unset($this);
}

}