<?php

final class UsersModel extends Model {
	public $user;
	public $email;
	public $name;
	public $birthday;
	public $pass;
	public $new_pass = 'pass';
	public $role;

	public function set( $data = array() ) {
		foreach ( $data as $key => $value ) {
			$$key = htmlentities($value, ENT_QUOTES);
		}
		
		$this->del($user);

		$this->sql = "INSERT INTO users SET user = '$user', email = '$email', name = '$name', birthday = '$birthday', pass = MD5('$pass'), role = '$role'";

		$this->set_query();
	}

	public function get( $id = '' ) {
		$this->sql = ( $id != '' )
			? "SELECT * FROM users WHERE user = '$id'"
			: "SELECT * FROM users";

		$this->get_query();

		$data = array();

		foreach ( $this->rows as $key => $value ) {
			array_push( $data, $value );
		}

		return $data;
	}

	public function change_data( $data = array() ) {
		foreach ( $data as $key => $value ) {
			$$key = htmlentities($value, ENT_QUOTES);
		}

		$this->sql = "UPDATE users SET name = '$name', birthday = '$birthday', role = '$role' WHERE user = '$user' AND email = '$email'";

		$this->set_query();
	}

	public function change_password( $data = array() ) {
		foreach ( $data as $key => $value ) {
			$$key = $value;
		}

		$this->sql = "UPDATE users SET pass = MD5('$pass') WHERE user = '$user' AND email = '$email'";

		$this->set_query();
	}

	public function del( $id = '' ) {
		$this->sql = "DELETE FROM users WHERE user = '$id'";
		$this->set_query();
	}

	public function login( $user, $pass ) {
		$this->sql = "SELECT * FROM users WHERE user = '$user' AND pass = MD5('$pass')";

		$this->get_query();

		$data = array();

		foreach ( $this->rows as $key => $value ) {
			array_push( $data, $value );
		}

		return $data;
	}

	public function __destruct() {
		unset($this);
	}
}