<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    public function index(){
		$_SESSION['login'] = null;
		$_SESSION['status'] = null;
		
		$alert = "<script>
						window.location.href='".base_url()."';
						</script>";
		$data = array(
			'session' => $_SESSION['login'],
			'alert' => $alert,
			'page' => 'notification',
			'link' => 'home'
		);
		
		$this->load->view('template/wrapper', $data);
    }
	
}