<?php


require_once ('./admin/models/Model.php');
require_once ('./admin/models/ProyectosModel.php');
require_once ('./admin/views/ProyectosView.php');

$proyect = new ProyectosView();



if (!$_POST ) {
	$proyect->get_state();
}
 if ($_POST == 'show-record') {
	$proyect->get_state( $_POST['proyecto_id']);
}