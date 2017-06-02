<?php 
abstract class Model {
	private static $host = 'localhost';
	private static $user = 'root';
	private static $pass = '';
	private static $name = 'blb';
	private static $charset = 'utf8';
	private $mysql;
	protected $sql;
	protected $sql_transaction = array();
	protected $rows = array();
	private $result;

	abstract protected function set();
	abstract protected function get();
	abstract protected function del();

	private function db_open() {
		$this->mysql = new mysqli(
			self::$host, 
			self::$user, 
			self::$pass, 
			self::$name
		);
		try {
			if ( $this->mysql->connect_errno ) {
				throw new Exception(
					'<li>Error N°: '. $this->mysql->connect_errno .'</li>
					 <li>Mensaje del Error: '. $this->mysql->connect_error .'</li>'
				);
			}else {
				$this->mysql->set_charset (self::$charset);
			}
		} catch (Exception $e) {
			print '<h3>Error en la conexión a MySQL:</h3><ul> '. $e->getMessage() .'</ul>';
			die();
		}
	}
		


	private function db_close() {
		$this->mysql->close();
	}

	protected function set_query() {
		 $this->db_open();
		 try {
		 	if ( !$this->mysql->query( $this->sql ) ) {
		 		throw new Exception(
		 			'<li>Error N°: '. $this->mysql->errno .'</li>
		 			 <li>Mensaje del error: '. $this->mysql->error .'</li>
		 			 <li>Consulta SQL: '. $this->sql . '</li>'
		 		);
		 		
		 	}
		 } catch (Exception $e) {
		 	print '<h3>Error en la Sentencia SQL:</h3><ul>' . $e->getMessage() . '</ul>';
		 	die();
		 	
		 }
		 $this->db_close();
	}

	protected function set_transaction() {
		$this->db_open();
		$this->mysql->autocommit(false);
		try {
			for ($n=0; $n < count($this->sql_transaction); $n++) { 
				if (!$this->mysql->query($this->sql_transaction[$n] ) ) {
					throw new Exception(
					'<li>Error N°: '. $this->mysql->errno .'</li>
		 			 <li>Mensaje del error: '. $this->mysql->error .'</li>
		 			 <li>Consulta SQL: '. $this->sql_transaction[$n] . '</li>'
		 			);
					
				}
			}
		} catch (Exception $e) {
			$this->mysql->rollback();
			print '<h3>Error en la Sentencia SQL:</h3><ul>' . $e->getMessage() . '</ul>';
		 	die();
		}

		$this->mysql->commit();
		$this->db_close();
	}



	protected function get_query() {
		$this->db_open();
		try {
		 	if ( !$this->result = $this->mysql->query( $this->sql ) ) {
		 		throw new Exception(
		 			'<li>Error N°: '. $this->mysql->errno .'</li>
		 			 <li>Mensaje del error: '. $this->mysql->error .'</li>
		 			 <li>Consulta SQL: '. $this->sql . '</li>'
		 		);
		 		
		 	}
		 } catch (Exception $e) {
		 	print '<h3>Error en la Sentencia SQL:</h3><ul>' . $e->getMessage() . '</ul>';
		 	die();
		 	
		 }
		while ( $this->rows[] = $this->result->fetch_assoc() );
		$this->result->free();
		$this->db_close();
		return array_pop( $this->rows );
	}

}