<?php  
final class UsersView {
	private $model;
	private static $title = 'Usuari@';

	public function __construct() {
		$this->model = new UsersModel();
	}

	public function get( $id = '' ) {
		$users = $this->model->get( $id );

		if ( empty($users) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			$html = '
				<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Gestión de ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">06.</p>
				</section>
				<div class="Table-titles xs-w95 xs-flex xs-flex-wrap xs-jc-space-between">
					<div class="Item-table xs-w15"><span>Usuario</span></div>
					<div class="Item-table xs-w25"><span>Email</span></div>
					<div class="Item-table xs-w20"><span>Nombre</span></div>
					<div class="Item-table xs-w20"><span>Cumpleaños</span></div>
					<div class="Item-table xs-w20"><span>Rol</span></div>
					<div  class="Item-table xs-w100 xs-order--5">
							<form method="POST">
								<input type="hidden" name="r" value="add-form">
								<input class="u-button  u-add xs-w100" type="submit" value="Agregar">
							</form></div>
						</div>
				
			';

			for ($n=0; $n < count($users); $n++) { 
				$html .= '
					<div class="Table-item xs-w95 xs-flex xs-flex-wrap xs-ac-center">
						<div  class="Item-table xs-w15">' . $users[$n]['user'] . '</div>
						<div  class="Item-table xs-w25">' . $users[$n]['email'] . '</div>
						<div  class="Item-table xs-w20">' . $users[$n]['name'] . '</div>
						<div  class="Item-table xs-w20">' . $users[$n]['birthday'] . '</div>
						<div  class="Item-table xs-w20">' . $users[$n]['role'] . '</div>
						<td>
						<div  class="Item-table xs-w100 xs-flex xs-jc-space-between">
						<form class="xs-w33" method="POST">
									<input type="hidden" name="r" value="edit-data">
									<input type="hidden" name="user" value="' . $users[$n]['user'] . '">
									<input class="u-button  u-show xs-w100" type="submit" value="Editar Datos">
								</form>
					
							<form class="xs-w33" method="POST">
									<input type="hidden" name="r" value="edit-pass-form">
									<input type="hidden" name="user" value="' . $users[$n]['user'] . '">
									<input class="u-button  u-edit xs-w100" type="submit" value="Editar Password">
								</form>
						
							<form class="xs-w33" method="POST">
									<input type="hidden" name="r" value="delete-form">
									<input type="hidden" name="user" value="' . $users[$n]['user'] . '">
									<input class="u-button  u-delete xs-w100" type="submit" value="Eliminar">
								</form>
							</div>
						</div>
				';
			}


			print($html);
		}
	}

	public function set( $data = array() ) {
		$this->model->set( $data );
		print('<p class="u-message  u-bold  u-add">' . self::$title . ' SALVADO</p>');
		RouterController::app_reload();
	}

	public function change_data( $data = array() ) {
		$this->model->change_data( $data );
		print('<p class="u-message  u-bold  u-add">' . self::$title . ' SALVADO</p>');
		RouterController::app_reload();
	}

	public function change_password( $data = array() ) {
		$this->model->change_password( $data );
		print('<p class="u-message  u-bold  u-add">' . self::$title . ' Salvado</p>');
		RouterController::app_reload();
	}

	public function del( $id = '' ) {
		$this->model->del( $id );
		print('<p class="u-message  u-bold  u-add">' . self::$title . ' ELIMINADO</p>');
		RouterController::app_reload();
	}

	public function add_form() {
		
		print('
			<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Agregar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">06.</p>
			</section>

			<form  class="App-form xs-w60 xs-flex xs-flex-wrap xs-jc-space-between" method="POST">
				<input class="xs-w100" type="text" name="user" placeholder="user" required>
				<input class="xs-w100" type="text" name="email" placeholder="email" required>
				<input class="xs-w100" type="text" name="name" placeholder="name" required>
				<input class="xs-w100" type="date" name="birthday" placeholder="birthday" required>
				<input class="xs-w70" type="password" name="pass" placeholder="pass" required>
				<div class="xs-w60">
				<input type="radio" name="role" value="Admin" checked> <label>Admin</label>
  				<input type="radio" name="role" value="User"> <label>User</label>
				</div>
				<input class="xs-w100 md-w48 u-button  u-add" type="button" value="Regresar" onclick="history.back()">

				<input class="u-button  u-add xs-w100  md-w48" type="submit" value="Agregar">
				<input type="hidden" name="r" value="add-crud">
			</form>
		');
	}

	public function edit_data( $id = '' ) {
		$users = $this->model->get( $id );

		if ( empty($users) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
		$cat_admin = ($users[0]['role'] == 'Admin') ? 'checked' : '';
		$cat_user = ($users[0]['role'] == 'User') ? 'checked' : '';
			printf('
			<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Editar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">06.</p>
			</section>

			<form class="App-form xs-w60 xs-flex xs-flex-wrap xs-jc-space-between" method="POST">
				<input  class="xs-w100"  type="text"  placeholder="user" value="%s" disabled required>
				<input  class="xs-w100"  type="hidden" name="user" value="%s">
				<input  class="xs-w100"  type="text"  placeholder="email" value="%s" disabled required>
				<input  class="xs-w100"  type="hidden" name="email" placeholder="email" value="%s">
				<input  class="xs-w100"  type="text" name="name" placeholder="name" value="%s" required>
				<input  class="xs-w100" type="date" name="birthday" placeholder="birthday" value="%s" required>
				<input type="hidden" name="pass" value="%s" required>
				<div class="xs-w60">
				<input type="radio" name="role" id="Admin" value="Admin" %s > <label>Admin</label>
  				<input type="radio" name="role" id="User" value="User" %s >  <label for="User">User</label></div>

				  	<input class="u-button  u-add xs-w100 md-w48" type="button" value="Regresar" onclick="history.back()">
					<input  class="u-button  u-edit xs-w100 md-w48" type="submit" value="Editar">
					<input type="hidden" name="r" value="edit-crud">
				</form>
			',
				$users[0]['user'],
				$users[0]['user'],
				$users[0]['email'],
				$users[0]['email'],
				$users[0]['name'],
				$users[0]['birthday'],
				$users[0]['pass'],
				$cat_admin,
				$cat_user
			);
		}
	}



	public function edit_pass( $id = '' ) {
		$users = $this->model->get( $id );

		if ( empty($users) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			printf('
			<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Cambiar Password de ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">06.</p>
			</section> 
			
			<form  class="App-form xs-w60 xs-flex xs-flex-wrap xs-jc-space-between" method="POST">
				<input type="text"  placeholder="user" value="%s" disabled required>
				<input type="hidden" name="user" value="%s">

				
				<input class="xs-w100" type="text"  placeholder="email" value="%s" disabled required>
				<input type="hidden" name="email" value="%s">
				
				
				<input class="xs-w100" type="password" name="pass" placeholder="Cambiar Contraseña" required>
				<input type="hidden" name="pass" value="%s">

				
					<input class="u-button  u-add xs-w100 md-w48" type="button" value="Regresar" onclick="history.back()">
					<input class="u-button  u-edit  xs-w100 md-w48" type="submit" value="Editar">
					<input type="hidden" name="r" value="edit-pass">
				</form>
			',
				
				$users[0]['user'],
				$users[0]['user'],
				$users[0]['email'],
				$users[0]['email'],
				$users[0]['pass']
			);
		}
	}


	public function del_form( $id = '' ) {
		$users = $this->model->get( $id );

		if ( empty($users) ) {
			print('<p class="u-message  u-bold  u-error">NO HAY ' . self::$title . '<p>');
		} else {
			printf('
				<section class="App-title container xs-w100  xs-flex xs-flex-wrap xs-jc-flex-end">
				<h2 class="xs-w70 xs-flex xs-flex-wrap xs-flex-column xs-ai-flex-end">Eliminar ' . self::$title . '		
				<div class="u-line xs-w30"></div>
				</h2>
				<p class="u-number xs-20">06.</p>
				</section>  

				
				<form class="App-form xs-w60" method="POST">
					<p class="u-message">
						¿Estas seguro de eliminar el ' . self::$title . ': 
						<h3 class="u-message  u-bold">%s?</h3>
					</p>
					<input  class="u-button  u-delete xs-w100 md-w48" type="submit" value="SI">
					<input class="u-button  u-add xs-w100 md-w48" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="user" value="%s">
					<input type="hidden" name="pass" value="%s">

					<input type="hidden" name="r" value="delete-crud">
				</form>
			',	
			$users[0]['user'],
			$users[0]['user'],
			$users[0]['pass']

			);
		}
	}

	public function __destruct() {
		unset($this);
	}
}