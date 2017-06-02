<?php 
final class ViewController {
	private static $view_path = './views/';

	public function load_view ($view) {
		require(self::$view_path .'header.php');
		require(self::$view_path . $view .'.php');
		require(self::$view_path .'footer.php');
	}

	public function load_file($file) {
		require(self::$view_path . $file . '.php');
	}

	public function __destruct() {
		unset($this);
	}
} 