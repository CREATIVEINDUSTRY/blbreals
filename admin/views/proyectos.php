<?php 	
$proyecto = new ProyectosView();

if ($_SESSION['role'] && $_GET && !$_POST ) {
	$proyecto->get();
} else if ( $_SESSION['role'] && $_GET && $_POST['r'] == 'show-record') {
	$proyecto->get_state( $_POST['proyecto_id']);
} else if ( $_SESSION['role'] == 'Admin'){
	switch ($_POST['r']) {
		case 'add-form':
			$proyecto->add_form();
			break;
		case 'add-crud':
			$new_proyecto = array(
				array(
				'proyecto_id' => $_POST['proyecto_id'],
				'titulo' => $_POST['titulo'], 
				'descripcion' => $_POST['descripcion'],
				'year' => $_POST['year'],
				'ubicacion' => $_POST['ubicacion'],
				'colonia' => $_POST['colonia'],
				'state' => $_POST['state']
				),

				$_POST['clase']

	 );
			$proyecto->set($new_proyecto);
			break;
		case 'edit-form':
			$proyecto->edit_form( $_POST['proyecto_id'] );
			break;
		case 'edit-crud':
				$save_proyecto = array(
				array(
				'proyecto_id' => $_POST['proyecto_id'],
				'titulo' => $_POST['titulo'], 
				'descripcion' => $_POST['descripcion'],
				'year' => $_POST['year'],
				'ubicacion' => $_POST['ubicacion'],
				'colonia' => $_POST['colonia'],
				'state' => $_POST['state']
				),

				$_POST['clase']

	 );
			$proyecto->set($save_proyecto);
			break;
		case 'delete-form':
			$proyecto->del_form($_POST['proyecto_id']);
			break;
		case 'delete-crud':
			$proyecto->del($_POST['proyecto_id']);
			break;
		default:
			RouterController::app_unauthorized();
			break;
	}
}else {
	RouterController::app_unauthorized();
}

