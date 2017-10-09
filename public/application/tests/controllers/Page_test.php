<?php
/**
 * Test page controller
 *
 * @author     Scot Schlingert
 */

class Page_test extends TestCase
{
	public function test_index() : void
	{
		$output = $this->request('GET', 'page/index');
		$this->assertContains('<title>Dealer Inspire Code Challenge</title>', $output);
	}

	public function test_process_contact_form_001() : void
	{
		$data = [
			'first_name' => 'Scot',
			'last_name' => 'Schlinger',
			'email' => 'sschling@gmail.com',
			'phone' => '',
			'comment' => 'This is a word or two.'
		];
		
		$output = $this->ajaxRequest('POST', 'page/process_contact_form', $data);
		$this->assertContains('"error":0', $output);
	}

	public function test_process_contact_form_002() : void
	{
		$data = [
			'first_name' => '',
			'last_name' => 'Schlinger',
			'email' => 'sschling@gmail.com',
			'phone' => '',
			'comment' => 'This is a word or two.'
		];
		
		$output = $this->ajaxRequest('POST', 'page/process_contact_form', $data);
		$this->assertContains('"error":0', $output);
	}

	public function test_process_contact_form_003() : void
	{
		$data = [
			'first_name' => 'Jimmy',
			'last_name' => 'Bob',
			'email' => 'jimmy@bob.com',
			'phone' => '1234567890',
			'comment' => 'This is a word or two.'
		];
		
		$output = $this->ajaxRequest('POST', 'page/process_contact_form', $data);
		$this->assertContains('"error":0', $output);
	}

	public function test_process_contact_form_004() : void
	{
		$data = [
			'first_name' => 'Jimmy',
			'last_name' => 'Bob',
			'email' => 'jimmy@bob.com',
			'phone' => 'jh',
			'comment' => 'This is a word or two.'
		];
		
		$output = $this->ajaxRequest('POST', 'page/process_contact_form', $data);
		$this->assertContains('"error":0', $output);
	}

	public function test_process_contact_form_005() : void
	{
		$data = [
			'first_name' => 'Jimmy',
			'last_name' => 'Bob',
			'email' => 'jimmy@bob.com',
			'phone' => '6305542198',
			'comment' => 'This is a word or two.'
		];
		
		$output = $this->ajaxRequest('POST', 'page/process_contact_form', $data);
		$this->assertContains('"error":0', $output);
	}
}