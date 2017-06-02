<?php 
final class RouterController {
	private $router;
	private $page;
	
	function __construct(){
		require('AutoloadController.php');
		new AutoloadController();

		$this->router = isset($_GET['r']) ? $_GET['r'] : 'home';
		$this->page = new ViewController ();

		SessionController::init_session();

		return ($_SESSION['ok']) 
		? $this->app_routes() : $this->app_access();

	}

	private function app_access() {
		if (!isset($_POST['user']) && !isset($_POST['pass']) ) {
			$this->page->load_view('login');
		} else {
			$session = new SessionController();
			$user_session = $session->login( $_POST['user'], $_POST['pass']);
			$this->app_session ( $user_session, $_POST['user']);
		}
		
	}

	private function app_session ($data = array(), $user ) {
			if (empty($data) ) {
				$this->page->load_view ('login');
				header("Location: ./?error= El Usuario <b>$user y el password proporcionado no coinciden");
			} else {
				$_SESSION['ok'] = true;

				$_SESSION['user'] = $data[0]['user'];
				$_SESSION['email'] = $data[0]['email'];
				$_SESSION['name'] = $data[0]['name'];
				$_SESSION['birthday'] = $data[0]['birthday'];
				$_SESSION['pass'] = $data[0]['pass'];
				$_SESSION['role'] = $data[0]['role'];

				header('Location: ./');
			}
			
	}

	private function app_routes() {
		switch ($this->router) {
			case 'home':
				$this->page->load_view('home');				
				break;
			case 'proyectos':
				$this->page->load_view('proyectos');		
				break;
			case 'img':
				$this->page->load_view('img');		
				break;
			case 'tipo':
				$this->page->load_view('tipo');				
				break;
			case 'colonias':
				$this->page->load_view('colonias');			
				break;
			case 'status':
				$this->page->load_view('status');			
				break;
			case 'states':
				$this->page->load_view('states');				
				break;
			case 'users':
				$this->page->load_view('users');
				break;
			case 'logout':
				$session = new SessionController();
				$session->logout();
				break;
			default:
				$this->page->load_view('404');
				break;
		}
	}

	public static function app_unauthorized() {
		$file = new ViewController();
		$file->load_file('401');
	}

	public static function app_reload() {
			print('
				<script>
					window.onload = function (){
						reloadPage("' .$_GET['r']. '");
					}
				</script>

				')	;
	}

	public function __destruct() {
		unset($this);
	}
}