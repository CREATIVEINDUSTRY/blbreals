<?php 
final class AutoloadController {
	public function __construct () {
		spl_autoload_register(function ($class_name) {
			$models_path = './models/' .$class_name . '.php';
			$controllers_path = './controllers/' .$class_name . '.php';
			$view_path = './views/' . $class_name . '.php';

			
		if (file_exists($models_path)) 
			require($models_path);

		if (file_exists($controllers_path))
			require($controllers_path);

		if (file_exists($view_path)) 
			require($view_path);
		
		});
	}

	public function __destruct() {
		unset($this);
	}
}
