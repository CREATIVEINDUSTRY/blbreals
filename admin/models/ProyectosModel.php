<?php 
include ('Model.php');

final class ProyectosModel extends Model {
public $proyecto_id;
public $titulo;
public $year;
public $ubicacion;
public $colonia;
public $state;




public function __construct() { }

public function set( $data = array() ) {
    foreach ( $data[0] as $key => $value) {
        $$key =  htmlentities($value, ENT_QUOTES);
    }
    $this->del($proyecto_id);

    $this->sql_transaction[0] = "INSERT INTO proyecto(proyecto_id, titulo, descripcion, year, ubicacion, colonia, state)
            VALUES ('$proyecto_id', '$titulo', '$descripcion', '$year', '$ubicacion', '$colonia', '$state')";

    $this->sql_transaction[1] = "INSERT INTO tipo_proyecto_x_proyecto(proyecto, tipo)
        VALUES ";
            for ($n=0; $n < count($data[1]); $n++) { 
              $this->sql_transaction[1] .= " ('$proyecto_id'," . $data[1][$n] . "),";
             } 
             $this->sql_transaction[1] = trim( $this->sql_transaction[1], ',' );

    $this->set_transaction();
}

public function get( $id = '') {
	$this->sql = ($id != '') 
	? "SELECT p.proyecto_id, p.titulo, p.descripcion, p.year, p.ubicacion, c.colonia_name, s.state_name,
        (SELECT GROUP_CONCAT(tp.tipo_proyecto_name) FROM tipo_proyecto AS tp INNER JOIN tipo_proyecto_x_proyecto AS txp ON tp.tipo_proyecto_id = txp.tipo WHERE p.proyecto_id = txp.proyecto) AS clase
        FROM proyecto AS p 
        INNER JOIN colonias AS c ON p.colonia = c.colonia_id  
        INNER JOIN status AS s ON p.state = s.state_id WHERE p.proyecto_id = '$id' " 
	: "SELECT  p.proyecto_id, p.titulo, p.descripcion, p.year, p.ubicacion, c.colonia_name, s.state_name,
        (SELECT GROUP_CONCAT(tp.tipo_proyecto_name) FROM tipo_proyecto AS tp INNER JOIN tipo_proyecto_x_proyecto AS txp ON tp.tipo_proyecto_id = txp. tipo WHERE p.proyecto_id = txp.proyecto) AS clase
        FROM proyecto AS p 
        INNER JOIN colonias AS c ON p.colonia = c.colonia_id  
        INNER JOIN status AS s ON p.state = s.state_id"; 
	$this->get_query();
	$data = array();
	foreach ($this->rows as $key => $value) {
		array_push($data, $value);
	}
	return $data;
}

public function get_state ( $id = '') {
	$this->sql = ($id != '') 
	? "SELECT p.proyecto_id, p.titulo, p.descripcion, p.year, p.ubicacion, c.colonia_name, s.state_name,
        (SELECT GROUP_CONCAT(tp.tipo_proyecto_name) FROM tipo_proyecto AS tp INNER JOIN tipo_proyecto_x_proyecto AS txp ON tp.tipo_proyecto_id = txp.tipo WHERE p.proyecto_id = txp.proyecto) AS clase
        FROM proyecto AS p 
        INNER JOIN colonias AS c ON p.colonia = c.colonia_id  
        INNER JOIN status AS s ON p.state = s.state_id WHERE s.state_id = '$id' " 
	: "SELECT  p.proyecto_id, p.titulo, p.descripcion, p.year, p.ubicacion, c.colonia_name, s.state_name,
        (SELECT GROUP_CONCAT(tp.tipo_proyecto_name) FROM tipo_proyecto AS tp INNER JOIN tipo_proyecto_x_proyecto AS txp ON tp.tipo_proyecto_id = txp. tipo WHERE p.proyecto_id = txp.proyecto) AS clase
        FROM proyecto AS p 
        INNER JOIN colonias AS c ON p.colonia = c.colonia_id  
        INNER JOIN status AS s ON p.state = s.state_id"; 
	$this->get_query();
	$data = array();
	foreach ($this->rows as $key => $value) {
		array_push($data, $value);
	}
	return $data;
}

public function del ($id = '' ) {
  $this->sql_transaction[0] = "DELETE FROM tipo_proyecto_x_proyecto WHERE proyecto = '$id'";
        
    $this->sql_transaction[1]  =  "DELETE FROM proyecto WHERE proyecto_id = '$id'";

	$this->set_transaction();
}

public function __destruct() {
	unset($this);
}



}