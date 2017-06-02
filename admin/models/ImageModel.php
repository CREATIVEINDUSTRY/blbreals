<?php 
require_once ('Model.php');

final class ImageModel extends Model {
public $idImagen;
public $fileName;
public $extension;
public $id_proyecto;
public $binario;

public function __construct() { }

public function set( $data = array() ) {
	foreach ( $data as $key => $value) {
		$$key =  $value;
	}

	if((isset($_FILES['miArchivo'])) && ($_FILES['miArchivo'] !='')){
		$file = $_FILES['miArchivo']; //Asignamos el contenido del parametro a una variable para su mejor manejo
		
		$temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
		
		//Comenzamos a extraer la información del archivo
		$fp = fopen($temName, "rb");//abrimos el archivo con permiso de lectura
		$contenido = fread($fp, filesize($temName));//leemos el contenido del archivo
		//Una vez leido el archivo se obtiene un string con caracteres especiales.
		$contenido = addslashes($contenido);//se escapan los caracteres especiales
		fclose($fp);//Cerramos el archivo
	

	$this->sql = "INSERT INTO img (idImagen, binario, id_proyecto) values ('$idImagen', '$contenido', '$id_proyecto')";

	$this->set_query();
}
}

public function edit( $data = array() ) {
	foreach ( $data as $key => $value) {
		$$key =  $value;
	}

	$this->sql = "UPDATE img SET idImagen = '$idImagen',  binario = '$binario', id_proyecto = '$id_proyecto'  WHERE idImagen = $idImage";
	$this->set_query();
}

public function get( $id = '') {
	$this->sql = ($id != '') 
	? "SELECT * FROM img WHERE idImagen = '$id'" 
	: "SELECT * FROM img";
	$this->get_query();
	$data = array();
	foreach ($this->rows as $key => $value) {
		array_push($data, $value);
	}
	return $data;
}


public function del ($id = '' ) {
	$this->sql = "DELETE FROM img WHERE idImagen = $id";
	$this->set_query();
}

public function __destruct() {
	unset($this);
}

}
