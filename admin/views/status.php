<?php 	
$status = new StatusView();

if ($_SESSION['role'] && $_GET && !$_POST ) {
	$status->get();
} else if ( $_SESSION['role'] == 'Admin'){
	switch ($_POST['r']) {
		case 'add-form':
			$status->add_form();
			break;
		case 'add-crud':
			$new_states = array(
				'staus_id' =>0,
				'status_name' => $_POST['status_name']
				);
			$status->set($new_states);
			break;
		case 'edit-form':
			$status->edit_form( $_POST['staus_id'] );
			break;
		case 'edit-crud':
			$save_states = array(
				'staus_id' =>0,
				'status_name' => $_POST['status_name']
			);
			$status->edit($save_states);
			break;
		case 'delete-form':
			$status->del_form($_POST['staus_id']);
			break;
		case 'delete-crud':
			$status->del($_POST['staus_id']);
			break;
		default:
			RouterController::app_unauthorized();
			break;
	}
}else {
	RouterController::app_unauthorized();
}

