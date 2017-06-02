<?php 	
$image = new ImageView();

if ($_SESSION['role'] && $_GET && !$_POST ) {
	$image->get();
} else if ( $_SESSION['role'] == 'Admin'){
	switch ($_POST['r']) {
		case 'add-form':
			$image->add_form();
			break;
		case 'add-crud':
			$new_image = array(
				'idImage' =>0,
				'binario' => $_POST['binario'], 
				'id_proyecto' => $_POST['id_proyecto']
				 );
			$image->set($new_image);
			break;
		case 'edit-form':
			$image->edit_form( $_POST['idImagen'] );
			break;
		case 'edit-crud':
			$save_image = array(
				'idImage' =>0,
				'binario' => $_POST['binario'], 
				'id_proyecto' => $_POST['id_proyecto']
			);
			$image->edit($save_image);
			break;
		case 'delete-form':
			$image->del_form($_POST['id']);
			break;
		case 'delete-crud':
			$image->del($_POST['id']);
			break;
		default:
			RouterController::app_unauthorized();
			break;
	}
}else {
	RouterController::app_unauthorized();
}

