<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controll extends CI_Controller {

	public function index(){
		$_SESSION['login'] = null;
		$session = $_SESSION['login'];

		$data = array(
			'session' => $session,
			'page' => 'check_php',
			'link' => 'check_php'
		);
		
		$this->load->view('template/wrapper', $data);
	}
	
}
