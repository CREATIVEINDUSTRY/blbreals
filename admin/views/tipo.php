<?php 
$tipo = new TipoView();

if ( $_SESSION['role'] && $_GET && !$_POST  ) {
	$tipo->get();
}  else if ( $_SESSION['role'] == 'Admin' ) {
	switch ( $_POST['r'] ) {
		case 'add-form':
			$tipo->add_form();
			break;
		case 'add-crud':
			$new_tipo = array(
				'tipo_proyecto_id' => 0,
				'tipo_proyecto_name' => $_POST['tipo_proyecto_name']
			);
			$tipo->set( $new_tipo );
			break;
		case 'edit-form':
			$tipo->edit_form( $_POST['tipo_proyecto_id'] );
			break;
		case 'edit-crud':
			$save_tipo = array(
				'tipo_proyecto_id' => $_POST['tipo_proyecto_id'],
				'tipo_proyecto_name' => $_POST['tipo_proyecto_name']
			);
			$tipo->set( $save_tipo );
			break;
		case 'delete-form':
			$tipo->del_form( $_POST['tipo_proyecto_id'] );
			break;
		case 'delete-crud':
			$tipo->del( $_POST['tipo_proyecto_id'] );
			break;
		default:
			RouterController::app_unauthorized();
			break;
	}
} else {
	RouterController::app_unauthorized();
}
