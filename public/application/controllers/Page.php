<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['form', 'url', 'validation']);
	}

	/**
	 * Default controller method for the Page controller
	 * 
	 * @return void
	 */
	public function index() : void
	{
		$this->load->view('page/index.php');
	}

	/**
	 * Processed contact smiley form.  Returns feedback back to call.
	 * 
	 * NOTE: Only should be called via ajax.
	 * 
	 * @return void
	 */
	public function process_contact_form() : void
	{
		$this->load->helper('ajax');
		check_for_ajax($this->input->is_ajax_request());
		
		$this->load->library('form_validation');

		$return = ['error' => 0];
		if ($this->form_validation->run('contact_smiley') == false) {
			$return['error'] = 1;
			$return['message'] = validation_errors('<li>', '</li>');
		} else {
			// Saved the data to the database
			$this->load->model('contact');
			$data = $this->security->xss_clean($this->input->post());
			$insert_id = $this->contact->save_contact_form($data);

			if (is_int($insert_id)) {
				// Send notificaton email
				$this->load->helper('email');
				if (!contact_email('Contact for Smiley', $data)) {
					// TODO: log needs to be set that the email failed
				}

				$return['message'] = 'Thank you for reaching out.  You have made Smiley smile.';
			} else {
				// Issue inserting the data
				$return['error'] = 1;
				$return['message'] = 'Your submission could not be processed.  Please try again.';
			}			
		}
		echo json_encode($return);
	}

	public function test_insert()
	{
		try {
			$this->load->model('contact');
			$data = [
				'first_name' => 'scot',
				'last_name' => 'schlinger',
				'email' => 'sschling@gmail.com',
				'comment' => 'This is some text!',
				'phone' => '4356789876'
			];
			echo $this->contact->save_contact_form($data);
		} catch (Exception $e) {
			echo 'exception: ' . $e->getMessage();
		}
	}

	public function test_phone()
	{
		$numbers = [
			'123',
			'213',
			'2345678903',
			'0324567890',
			'911345579'
		];

		foreach ($numbers as $num) {
			if ($this->phone_number_check($num)) {
				echo $num . ' is a phone number<br>';
			} else {
				echo $num . ' is not a valid phone number<br>';
			}
		}	
	}

	/**
	 * Callback method to validate phone number in conjuction with CI form validating.
	 * 
	 * @param string $phone 
	 * @return bool
	 */
	public function phone_number_check(string $phone = '') : bool
	{
		if (strlen($phone) > 0) {
			if (!preg_match('/^([2-9]([02-9]\d|1[02-9]))[2-9]([02-9]\d|1[02-9])\d{4}$/', $phone)) {
				$this->form_validation->set_message('phone_number_check', 'The {field} field should be ten digits in length, following US phone number rules.');
				return false;
			}
		}
		return true;
	}
}
