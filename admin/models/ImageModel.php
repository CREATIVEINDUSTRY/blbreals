<?php 
require_once ('Model.php');

final class ImageModel extends Model {
public $idImagen;
public $fileName;
public $extension;
public $id_proyecto;
public url_image;

public function __construct() { }

public function set( $data = array() ) {
	foreach ( $data as $key => $value) {
		$$key =  $value;
	}

	if((isset($_FILES['miArchivo'])) && ($_FILES['miArchivo'] !='')){
		$file = $_FILES['miArchivo']; //Asignamos el contenido del parametro a una variable para su mejor manejo
		
		$temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
        $internal_url = $_POST['temp_uri']; // URL interna dentro de la carpeta img
        $fileNme = $_POST['file_name'];
        $completeURL = "img/" . $internal_url . $fileNme
        $uploadOk = 1;
        $type = pathinfo($completeURL,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['miArchivo']);
        if($check !== false) {
             if (move_uploaded_file($_FILES['miArchivo'], $target_file)) {
                echo "<script>alert(\'Archivo subido con éxito\');</script>";
            }
        } else {
            echo 'error';
        }
	

	$this->sql = "INSERT INTO img (idImagen, url_image, id_proyecto) values ('$idImagen', '$completeURL', '$id_proyecto')";

	$this->set_query();
}
}

public function edit( $data = array() ) {
	foreach ( $data as $key => $value) {
		$$key =  $value;
	}

	$this->sql = "UPDATE img SET idImagen = '$idImagen',  url_image = '$completeURL', id_proyecto = '$id_proyecto'  WHERE idImagen = $idImage";
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
