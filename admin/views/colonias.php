<?php 	
$colonias = new ColoniasView();

if ($_SESSION['role'] && $_GET && !$_POST ) {
	$colonias->get();
} else if ( $_SESSION['role'] == 'Admin'){
	switch ($_POST['r']) {
		case 'add-form':
			$colonias->add_form();
			break;
		case 'add-crud':
			$new_colonias = array(
				'colonia_id' =>0,
				'colonia_name' => $_POST['colonia_name'] );
			$colonias->set($new_colonias);
			break;
		case 'edit-form':
			$colonias->edit_form( $_POST['colonia_id'] );
			break;
		case 'edit-crud':
			$save_colonias = array(
				'colonia_id' => $_POST['colonia_id'],
				'colonia_name' => $_POST['colonia_name']
			);
			$colonias->edit($save_colonias);
			break;
		case 'delete-form':
			$colonias->del_form($_POST['colonia_id']);
			break;
		case 'delete-crud':
			$colonias->del($_POST['colonia_id']);
			break;
		default:
			RouterController::app_unauthorized();
			break;
	}
}else {
	RouterController::app_unauthorized();
}

