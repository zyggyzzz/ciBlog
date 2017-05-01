<?php
class User_model extends CI_Model {

	public function register($enc_password) {

		$data = array(

			'username' => $this->input->post('username'),
			'password' => $enc_password,
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),

		);

		return $this->db->insert('users', $data);

	}

	public function login($username, $password) {

		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {

			return $result->row(0)->id;

		} else {

			return false;

		}

	}

	public function check_username_exists($username) {

		$query = $this->db->get_where('users', array('username' => $username));
		return empty($query->row_array());

	}

	public function check_email_exists($email) {

		$query = $this->db->get_where('users', array('email' => $email));
		return empty($query->row_array());

	}

}
