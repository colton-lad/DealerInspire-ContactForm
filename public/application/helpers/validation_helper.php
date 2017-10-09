<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('string_remove_non_letters_digits')) {
	function string_remove_non_letters_digits(string $string) : string
	{
		return preg_replace('/[^0-9a-zA-Z]/', '', $string);
	}
}