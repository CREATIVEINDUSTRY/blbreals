<?php 	
$users = new UsersView();

if ($_SESSION['role'] && $_GET && !$_POST ) {
	$users->get();
} else if ( $_SESSION['role'] == 'Admin'){
	switch ($_POST['r']) {
		case 'add-form':
			$users->add_form();
			break;
		case 'add-crud':
			$new_users = array(
				'user' => $_POST['user'],
				'email' => $_POST['email'],
				'name' => $_POST['name'],
				'birthday' => $_POST['birthday'],
				'pass' => $_POST['pass'],
				'role' => $_POST['role']
				 );
			$users->set($new_users);
			break;

		case 'edit-data':
			$users->edit_data($_POST['user']);
			break;
		case 'edit-crud':
			$save_users = array(
				'user' => $_POST['user'],
				'email' => $_POST['email'],
				'name' => $_POST['name'],
				'birthday' => $_POST['birthday'],
				'role' => $_POST['role']
			);
			$users->change_data($save_users);
			break;
		case 'edit-pass-form':
			$users->edit_pass($_POST['user']);
			break;
		case 'edit-pass':
			$save_pass = array(
				'user' => $_POST['user'],
				'email' => $_POST['email'],
				'pass' => $_POST['pass']
			);
			$users->change_password($save_pass);
			break;
		case 'delete-form':
			$users->del_form($_POST['user']);
			break;
		case 'delete-crud':
			$users->del($_POST['user']);
			break;
		default:
			RouterController::app_unauthorized();
			break;
	}
}else {
	RouterController::app_unauthorized();
}

