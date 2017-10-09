<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function save_contact_form(array $data) : int
	{
		$insert_info = [
			'full_name' => $data['first_name'] . ' ' . $data['last_name'],
			'email' => $data['email'],
			'message' => $data['comment']
		];
		!empty($data['phone']) ? $insert_info['phone'] = $data['phone'] : '';

		$this->db->insert('contact', $insert_info);

		return $this->db->insert_id();
	}
}