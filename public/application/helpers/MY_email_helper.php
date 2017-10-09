<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('contact_email')) {
	function contact_email(string $subject, array $data) : bool
	{
		$ci =& get_instance();
		$ci->load->library('email');

		$ci->email->to(CONTACT_FORM_TO)
			->from(CONTATC_FORM_FROM)
			->subject($subject)
			->message(format_contact_data($data));
				
		if (!$ci->email->send()) {
			return false;
		}
		return true;
	}
}

if (!function_exists('format_contact_data')) {
	function format_contact_data(array $data) : string
	{
		$string = '';
		if (count($data) > 0) {
			$string = 'Name: ' . $data['first_name'] . ' ' . $data['last_name'] . PHP_EOL;
			$string .= 'Email: ' . $data['email'] . PHP_EOL;
			$string .= 'Phone: ' . (!empty($data['phone']) ? $data['phone'] : 'N/A') . PHP_EOL;
			$string .= 'Comment: ' . PHP_EOL . $data['comment'] . PHP_EOL;
		}

		return $string;
	}
}
