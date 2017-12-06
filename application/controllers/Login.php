<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		extract ($_POST);

		$queryuser = $this->Model->ambil("username",$user,"tb_user");
		if ($queryuser->result_array() == null){
			$_SESSION['login'] = null;
			$alert = "<script>
					alert('Username salah !!');
					window.location.href='".base_url()."';
					</script>";
		}else{
			foreach($queryuser->result_array() as $queryuser){
				$username = $queryuser['username'];
				$password = $queryuser['password'];
			}
			if ($password == $pass){
				$alert = "<script>
					alert('Login Sukses !!');
					window.location.href='".base_url()."index.php/menu';
					</script>";
				$_SESSION['login'] = $queryuser['id'];
				$_SESSION['status'] = 3;
			}else{
				$_SESSION['login'] = null;
				$alert = "<script>
				alert('Password Salah !!');
				window.location.href='".base_url()."';
				</script>";
			}
		}
		$data = array(
			'session' => $_SESSION['login'],
			'alert' => $alert,
			'page' => 'notification',
			'link' => 'notification'
		);
		$this->load->view('template/wrapper', $data);
	}
	
}
