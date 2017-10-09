<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('check_for_ajax')) {
	function check_for_ajax(string $is_ajax)
	{
		if (!$is_ajax) {
			redirect();
		}
	}
}