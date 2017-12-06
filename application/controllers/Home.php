<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$_SESSION['login'] = null;

		//$json_data =  $this->getDataFromUrl();
		$json_data =  $this->getDataFromDatabase();

		$data = array(
			'json_data' => $json_data,
			'session' => $_SESSION['login'],
			'page' => 'home',
			'link' => 'home'
		);

		$this->load->view('template/wrapper', $data);
	}

	public function getDataFromUrl(){

		$url = base_url()."assets/map/stream_tweet.json";
		$string = file_get_contents($url);
		//$json_data = json_decode($string, true);
		$json_data = $string;
		return $json_data;
	}

	public function getDataFromDatabase(){
		$url = base_url()."assets/map/stream_tweet.json";
		$string = file_get_contents($url);
		$json_data = json_decode($string, true);

		$tweet_data = null;
		$i = 0;
		if($json_data != null){
			foreach ($json_data as $key => $value) {
				# code...

				$tweet_id = $json_data[$i]['id_str'];
				$database_data = $this->Model->ambil('id_tweet',$tweet_id,'tb_tweet')->result_array();

				if($database_data == null){
					//insert Query
					$data_insert = array(
						'id_tweet' => $json_data[$i]['id_str'],
						'id_user' => $json_data[$i]['user']['id_str'],
						'name' => $json_data[$i]['user']['name'],
						'screen_name' => $json_data[$i]['user']['screen_name'],
						'tweet_content' => $json_data[$i]['text'],
						'lat' => $json_data[$i]['geo']['coordinates'][0],
						'long' => $json_data[$i]['geo']['coordinates'][1],
						'created_at' => $json_data[$i]['created_at']
					);

					$this->Model->insert_data('tb_tweet',$data_insert);
				}
				$i++;
			}
		}

		$tweet_data = $this->Model->list_data_all('tb_tweet')->result_array();

		$result_data = null;
		if(count($tweet_data) <= 10){
			$result_data = $tweet_data;
		}else{
			$i = 0;
			foreach ($tweet_data as $key => $value) {
				# code...
				if($i < 10){
					$result_data[$i] = $value;
				}else{
					$temp = $value;
					for($j = 0;$j<10;$j++){
						$temp2 = null;
						$dateString1 = $temp['created_at'];
						$date1 = new DateTime( $dateString1 );
						$time1 = $date1->format( 'H:i:s' );
						

						$dateString2 = $result_data[$j]['created_at'];
						$date2 = new DateTime( $dateString2 );
						$time2 = $date2->format( 'H:i:s' );

						if($time1 > $time2){
							$temp2 = $result_data[$j];
							$result_data[$j] = $temp;
							$temp = $temp2;
						}
					}
				}
				$i++;
			}	
		}

		return $result_data;
	}

}
	
