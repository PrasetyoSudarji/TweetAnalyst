<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
    
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
			$sumur = $this->Model->getSumurAll();
			$counter_liquid = $this->Model->getCounterLiquid();
			foreach ($counter_liquid->result_array() as $counter) {
				$id_liquid = $counter['liquid'];
			}
			$counter_gas = $this->Model->getCounterGas();
			foreach ($counter_gas->result_array() as $counter) {
				$id_gas = $counter['gas'];
			}
			$counter_pt = $this->Model->getCounterPt();
			foreach ($counter_pt->result_array() as $counter) {
				$id_pt = $counter['pt'];
			}
			$date_today = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));
			
			$data = array(
				'today' => $date_today,
				'id_liquid' => $id_liquid,
				'id_gas' => $id_gas,
				'id_pt' => $id_pt,
				'sumur' => $sumur,
				'session' => $_SESSION['login'],
				'page' => 'input_datav2',
				'link' => 'input_data'
			);
		}	
		$this->load->view('template/wrapper', $data);
    }

    public function input(){
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
			extract ($_POST);
			$val="true";
			$query = $this->Model->getTanggal();
			foreach ($query->result_array() as $query) {
				if($query['tanggal']==$tanggal){
					$val = "false";
				}
			}
			
			if ($val=="true"){
				if ($tanggal1 == null || $well1 == null || $choke1==null || $blpd1==null || $bopd1==null || $hp_scrubber1==null || $lp1==null || $thp1==null || $fl1==null || $chp1==null || $temp1==null ||
					$tanggal2 == null || $well2 == null || $choke2==null || $blpd2==null || $bopd2==null || $hp_scrubber2==null || $lp2==null || $thp2==null || $fl2==null || $chp2==null || $temp2==null || 
					$tanggal3 == null || $well3 == null || $choke3==null || $blpd3==null || $bopd3==null || $hp_scrubber3==null || $lp3==null || $thp3==null || $fl3==null || $chp3==null || $temp3==null || 
					$tanggal4 == null || $well4 == null || $choke4==null || $blpd4==null || $bopd4==null || $hp_scrubber4==null || $lp4==null || $thp4==null || $fl4==null || $chp4==null || $temp4==null ||
					$tanggal5 == null || $well5 == null || $choke5==null || $blpd5==null || $bopd5==null || $hp_scrubber5==null || $lp5==null || $thp5==null || $fl5==null || $chp5==null || $temp5==null ||
					$tanggal6 == null || $well6 == null || $choke6==null || $blpd6==null || $bopd6==null || $hp_scrubber6==null || $lp6==null || $thp6==null || $fl6==null || $chp6==null || $temp6==null ||
					$tanggal7 == null || $well7 == null || $choke7==null || $blpd7==null || $bopd7==null || $hp_scrubber7==null || $lp7==null || $thp7==null || $fl7==null || $chp7==null || $temp7==null || 
					$tanggal8 == null || $well8 == null || $choke8==null || $blpd8==null || $bopd8==null || $hp_scrubber8==null || $lp8==null || $thp8==null || $fl8==null || $chp8==null || $temp8==null ||
					$tanggal1 == null || $well1 == null || $choke1==null || $blpd1==null || $bopd1==null || $hp_scrubber1==null || $lp1==null || $thp1==null || $fl1==null || $chp1==null || $temp1==null 
					$tanggal1 == null || $well1 == null || $choke1==null || $blpd1==null || $bopd1==null || $hp_scrubber1==null || $lp1==null || $thp1==null || $fl1==null || $chp1==null || $temp1==null 
				){
					$alert = "<script>
							alert('Data Tidak boleh kosong!! $val $well');
							window.location.href='".base_url()."index.php/data';
							</script>";
					$data = array(
						'alert' => $alert,
						'session' => $_SESSION['login'],
						'page' => 'notification',
						'link' => 'produksi_liquid'
					);
				}else{
					$counter = $this->Model->getCounterLiquid();
					foreach ($counter->result_array() as $counter) {
						$id = $counter['liquid'];
					}
					$kadar_air = (($blpd-$bopd)/$blpd)*100;
					$data_insert = array(
							"id" => $id,
							"tanggal" => $tanggal,
							"well_name" => $well,
							"choke" => floatval($choke),
							"blpd" => floatval($blpd),
							"bopd" => floatval($bopd),
							"kadar_air" =>floatval( $kadar_air)
						);
					$this->Model->insert_data("produksi_liquid",$data_insert);

					//update counter
					$id++;
					$data_update = array(
						"liquid" => $id
					);
					$this->db->update("counter", $data_update);

					//update status tab
					$data_update = array(
						"status" => "0"
					);
					$this->Model->update("status", "1", "tab", $data_update);

					$data_update2 = array(
						"status" => "1"
					);
					$this->Model->update("name", "produksi_liquid", "tab", $data_update2);

					$sumur = $this->Model->getSumurAll();
					$tampil = $this->Model->getProduksiLiquid();
					$data = array(
						'sumur' => $sumur,
						'tab' => "produksi_liquid",
						'tampil' => $tampil,
						'session' => $_SESSION['login'],
						'page' => 'input_data',
						'link' => 'produksi_liquid'
					);
				}
			}else{
				$alert = "<script>
							alert('Data sumur tidak boleh sama!!');
							window.location.href='".base_url()."index.php/data';
							</script>";
				$data = array(
					'alert' => $alert,
					'session' => $_SESSION['login'],
					'page' => 'notification',
					'link' => 'produksi_liquid'
				);
			}
		}
		
		$this->load->view('template/wrapper', $data);
    }

    public function input_liquid(){
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
			extract ($_POST);
			$val="true";
			$query = $this->Model->getProduksiLiquid();
			foreach ($query->result_array() as $query) {
				if($query['well_name']==$well && $query['tanggal']==$tanggal){
					$val = "false";
				}
			}

			if ($val=="true"){
				if ($tanggal == null || $choke==null || $blpd==null || $bopd==null ){
					$alert = "<script>
							alert('Data Tidak boleh kosong!! $val $well');
							window.location.href='".base_url()."index.php/data';
							</script>";
					$data = array(
						'alert' => $alert,
						'session' => $_SESSION['login'],
						'page' => 'notification',
						'link' => 'produksi_liquid'
					);
				}else{
					$counter = $this->Model->getCounterLiquid();
					foreach ($counter->result_array() as $counter) {
						$id = $counter['liquid'];
					}
					$kadar_air = (($blpd-$bopd)/$blpd)*100;
					$data_insert = array(
							"id" => $id,
							"tanggal" => $tanggal,
							"well_name" => $well,
							"choke" => floatval($choke),
							"blpd" => floatval($blpd),
							"bopd" => floatval($bopd),
							"kadar_air" =>floatval( $kadar_air)
						);
					$this->Model->insert_data("produksi_liquid",$data_insert);

					//update counter
					$id++;
					$data_update = array(
						"liquid" => $id
					);
					$this->db->update("counter", $data_update);

					//update status tab
					$data_update = array(
						"status" => "0"
					);
					$this->Model->update("status", "1", "tab", $data_update);

					$data_update2 = array(
						"status" => "1"
					);
					$this->Model->update("name", "produksi_liquid", "tab", $data_update2);

					$sumur = $this->Model->getSumurAll();
					$tampil = $this->Model->getProduksiLiquid();
					$data = array(
						'sumur' => $sumur,
						'tab' => "produksi_liquid",
						'tampil' => $tampil,
						'session' => $_SESSION['login'],
						'page' => 'input_data',
						'link' => 'produksi_liquid'
					);
				}
			}else{
				$alert = "<script>
							alert('Data sumur tidak boleh sama!!');
							window.location.href='".base_url()."index.php/data';
							</script>";
				$data = array(
					'alert' => $alert,
					'session' => $_SESSION['login'],
					'page' => 'notification',
					'link' => 'produksi_liquid'
				);
			}
		}
		$this->load->view('template/wrapper', $data);
    }

    public function input_gas(){
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
			extract ($_POST);
			$val="true";
			$query = $this->Model->getProduksiGas();
			foreach ($query->result_array() as $query) {
				if($query['well_name']==$well && $query['tanggal']==$tanggal){
					$val = "false";
				}
			}

			if ($val=="true"){
				if ($tanggal == null || $well == null || $choke==null || $hp_scrubber==null || $lp==null){
					$alert = "<script>
							alert('Data Tidak boleh kosong!!');
							window.location.href='".base_url()."index.php/data';
							</script>";
					$data = array(
						'alert' => $alert,
						'session' => $_SESSION['login'],
						'page' => 'notification',
						'link' => 'produksi_gas'
					);
				}else{
					$total = $lp + $hp_scrubber;

					$counter = $this->Model->getCounterGas();
					foreach ($counter->result_array() as $counter) {
						$id = $counter['gas'];
					}
					$data_insert = array(
							"id" => $id,
							"tanggal" => $tanggal,
							"well_name" => $well,
							"choke" => floatval($choke),
							"hp_scrubber" => floatval($hp_scrubber),
							"lp" => floatval($lp),
							"total" =>floatval($total)
						);
					$this->Model->insert_data("produksi_gas",$data_insert);

					//update counter
					$id++;
					$data_update = array(
						"gas" => $id
					);
					$this->db->update("counter", $data_update);

					//update status tab
					$data_update = array(
						"status" => "0",
					);
					$this->Model->update('status', '1', 'tab', $data_update);

					$data_update2 = array(
						"status" => "1",
					);
					$this->Model->update('name', 'produksi_gas', 'tab', $data_update2);

					$sumur = $this->Model->getSumurAll();
					$tampil = $this->Model->getProduksiGas();
					$data = array(
						'sumur' => $sumur,
						'tampil' => $tampil,
						'tab' => "produksi_gas",
						'session' => $_SESSION['login'],
						'page' => 'input_data',
						'link' => 'produksi_gas'
					);
				}
			}else{
				$alert = "<script>
							alert('Data sumur tidak boleh sama!!');
							window.location.href='".base_url()."index.php/data';
							</script>";
				$data = array(
					'alert' => $alert,
					'session' => $_SESSION['login'],
					'page' => 'notification',
					'link' => 'produksi_gas'
				);
			}
		}	
		$this->load->view('template/wrapper', $data);
    }

    public function input_presstemp(){
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
			extract ($_POST);
			$val="true";
			$query = $this->Model->getPressureTemperature();
			foreach ($query->result_array() as $query) {
				if($query['well_name']==$well && $query['tanggal']==$tanggal){
					$val = "false";
				}
			}

			if ($val=="true"){
				if ($tanggal == null || $well == null || $choke==null || $thp==null || $fl==null || $chp==null || $temp==null){
					$alert = "<script>
							alert('Data Tidak boleh kosong!!');
							window.location.href='".base_url()."index.php/data';
							</script>";
					$data = array(
						'alert' => $alert,
						'session' => $_SESSION['login'],
						'page' => 'notification',
						'link' => 'press_temp'
					);
				}else{
					$counter = $this->Model->getCounterPt();
					foreach ($counter->result_array() as $counter) {
						$id = $counter['pt'];
					}
					$data_insert = array(
							"id" => $id,
							"tanggal" => $tanggal,
							"well_name" => $well,
							"choke" => floatval($choke),
							"thp" => floatval($thp),
							"fl" => floatval($fl),
							"chp" =>floatval( $chp),
							"temp" =>floatval( $temp)
						);
					$this->Model->insert_data("pressure_temperature",$data_insert);

					//update counter
					$id++;
					$data_update = array(
						"pt" => $id
					);
					$this->db->update("counter", $data_update);

					//update status tab
					$data_update = array(
						"status" => "0",
					);
					$this->Model->update('status', '1', 'tab', $data_update);

					$data_update2 = array(
						"status" => "1",
					);
					$this->Model->update('name', 'press_temp', 'tab', $data_update2);

					$sumur = $this->Model->getSumurAll();
					$tampil = $this->Model->getPressureTemperature();
					$data = array(
						'sumur' => $sumur,
						'tampil' => $tampil,
						'tab' => "press_temp",
						'session' => $_SESSION['login'],
						'page' => 'input_data',
						'link' => 'press_temp'
					);
				}
			}else{
				$alert = "<script>
							alert('Data sumur tidak boleh sama!!');
							window.location.href='".base_url()."index.php/data';
							</script>";
				$data = array(
					'alert' => $alert,
					'session' => $_SESSION['login'],
					'page' => 'notification',
					'link' => 'press_temp'
				);
			}
		}
		$this->load->view('template/wrapper', $data);
    }

    public function input_sas(){
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
			extract ($_POST);
			$val="true";
			$query = $this->Model->getSAS();
			foreach ($query->result_array() as $query) {
				if($query['tanggal'] == $tanggal){
					$val = "false";
				}
				
			}

			if ($val=="true"){
				if ($tanggal == null || $oil==null || $gas==null){
					$alert = "<script>
							alert('Data Tidak boleh kosong!!');
							window.location.href='".base_url()."index.php/data';
							</script>";
					$data = array(
						'alert' => $alert,
						'session' => $_SESSION['login'],
						'page' => 'notification',
						'link' => 'sas'
					);
				}else{
					$counter = $this->Model->getCounterSAS();
					foreach ($counter->result_array() as $counter) {
						$id = $counter['sas'];
					}
					$data_insert = array(
						"id" => $id,	
						"tanggal" => $tanggal,
						"gas" =>floatval( $gas),
						"oil" =>floatval( $oil)
					);
					$this->Model->insert_data("SAS",$data_insert);
					
					//update counter
					$id++;
					$data_update = array(
						"sas" => $id
					);
					$this->db->update("counter", $data_update);

					//update status tab
					$data_update = array(
						"status" => "0",
					);
					$this->Model->update('status', '1', 'tab', $data_update);

					$data_update2 = array(
						"status" => "1",
					);
					$this->Model->update('name', 'sas', 'tab', $data_update2);

					$tampil = $this->Model->getSAS();
			
					$data = array(		
						'tampil' => $tampil,
						'tab' => "sas",
						'session' => $_SESSION['login'],
						'page' => 'input_data',
						'link' => 'sas'
					);
				}
			}else{
				$alert = "<script>
							alert('Data tanggal tidak boleh sama!!');
							window.location.href='".base_url()."index.php/data';
							</script>";
				$data = array(
					'alert' => $alert,
					'session' => $_SESSION['login'],
					'page' => 'notification',
					'link' => 'sas'
				);
			}
		}
		$this->load->view('template/wrapper', $data);
    }

    public function tab_liquid(){
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
			$this->load->view('template/wrapper', $data);
		}else{
	    	$produksi_liquid = $this->Model->getProduksiLiquid();
			$session = $_SESSION['login'];
			$sumur = $this->Model->getSumurAll();

			$data = array(
				'tampil' => $produksi_liquid,
				'sumur' => $sumur,
				'session' => $session,
				'page' => 'ajax_produksi_liquid',
				'link' => 'produksi_liquid'
			);
			
			$this->load->view('ajax_produksi_liquid', $data);
		}
	}

	public function tab_gas(){
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
			$this->load->view('template/wrapper', $data);
		}else{
			$produksi_gas = $this->Model->getProduksiGas();
			$session = $_SESSION['login'];
			$sumur = $this->Model->getSumurAll();
			$data = array(
				'tampil' => $produksi_gas,
				'sumur' => $sumur,
				'session' => $session,
				'page' => 'ajax_produksi_gas',
				'link' => 'produksi_gas'
			);
			
			$this->load->view('ajax_produksi_gas', $data);
		}
	}
	
	public function tab_presstemp(){
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
			$this->load->view('template/wrapper', $data);
		}else{
			$pt = $this->Model->getPressureTemperature();
			$session = $_SESSION['login'];
			$sumur = $this->Model->getSumurAll();
			$data = array(
				'tampil' => $pt,
				'sumur' => $sumur,
				'session' => $session,
				'page' => 'ajax_pressure_temperature',
				'link' => 'press_temp'
			);
			
			$this->load->view('ajax_pressure_temperature', $data);
		}
	}

	public function tab_sas(){
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
			$this->load->view('template/wrapper', $data);
		}else{
			$sas = $this->Model->getSAS();
			$session = $_SESSION['login'];
			$data = array(
				'tampil' => $sas,
				'session' => $session,
				'page' => 'ajax_sas',
				'link' => 'sas'
			);
			
			$this->load->view('ajax_sas', $data);
		}
	}

	public function delete_data_pt(){
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
			$this->load->view('template/wrapper', $data);
		}else{
			extract ($_GET);

			$query_delete = $this->Model->deleteData("id",$id,"pressure_temperature");
			$session = $_SESSION['login'];
			$sumur = $this->Model->getSumurAll();
			$pt = $this->Model->getPressureTemperature();
			$data = array(
				'tampil' => $pt,
				'sumur' => $sumur,
				'session' => $session,
				'page' => 'ajax_list_press_temp',
				'link' => 'press_temp'
			);

			$this->load->view('ajax_list_press_temp', $data);
		}
				
	}

	public function delete_data_gas(){
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
			$this->load->view('template/wrapper', $data);
		}else{
			extract ($_GET);

			$query_delete = $this->Model->deleteData("id",$id,"produksi_gas");
			$session = $_SESSION['login'];
			$sumur = $this->Model->getSumurAll();
			$produksi_gas = $this->Model->getProduksiGas();
			$data = array(
				'tampil' => $produksi_gas,
				'sumur' => $sumur,
				'session' => $session,
				'page' => 'ajax_list_gas',
				'link' => 'produksi_gas'
			);

			$this->load->view('ajax_list_gas', $data);
		}
				
	}

	public function delete_data_liquid(){
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
			$this->load->view('template/wrapper', $data);
		}else{
			extract ($_GET);

			$query_delete = $this->Model->deleteData("id",$id,"produksi_liquid");
			$session = $_SESSION['login'];
			$sumur = $this->Model->getSumurAll();
			$produksi_liquid = $this->Model->getProduksiLiquid();
			$data = array(
				'tampil' => $produksi_liquid,
				'sumur' => $sumur,
				'session' => $session,
				'page' => 'ajax_list_liquid',
				'link' => 'produksi_liquid'
			);

			$this->load->view('ajax_list_liquid', $data);
		}
				
	}

	public function delete_data_sas(){
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
			$this->load->view('template/wrapper', $data);
		}else{
			extract ($_GET);

			$query_delete = $this->Model->deleteData("id",$id,"SAS");
			$session = $_SESSION['login'];
			$data_sas = $this->Model->getSAS();
			$data = array(
				'tampil' => $data_sas,
				'session' => $session,
				'page' => 'ajax_list_sas',
				'link' => 'sas'
			);

			$this->load->view('ajax_list_sas', $data);
		}
				
	}
}