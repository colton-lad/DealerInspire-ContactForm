<?php
$config = [
	'contact_smiley' => [
		[
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required|trim|min_length[2]|max_length[80]'
		],
		[
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'required|trim|min_length[2]|max_length[80]'
		],
		[
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|trim|valid_email'
		],
		[
			'field' => 'phone',
			'label' => 'Phone Number',
			'rules' => 'string_remove_non_letters_digits|callback_phone_number_check'
		],
		[
			'field' => 'comment',
			'label' => 'Tell Smiley something',
			'rules' => 'required|min_length[2]'
		]
	]
];

$config['error_prefix'] = '<ul>';
$config['error_suffix'] = '</ul>';
