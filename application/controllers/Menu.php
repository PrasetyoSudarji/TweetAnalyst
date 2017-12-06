<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index(){
		if($_SESSION['login']==null){
			$alert = "<script>
						alert('Akses di tolak!!');
						window.location.href='".base_url()."';
						</script>";
				$data = array(
				'alert' => $alert,
				'session' => $_SESSION['login'],
				'page' => 'notification',
				'link' => 'home'
			);
		}else{
			$session = $_SESSION['login'];
			$data = array(
				'session' => $session,
				'page' => 'home',
				'link' => 'home'
			);
		}	
		$this->load->view('template/wrapper', $data);
	}
	
}
