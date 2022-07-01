<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainVO extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
			parent::__construct();
			$this -> load -> library("pagination"); // 페이지네이션
			$this -> load -> helper("url"); // 리다이렉트
			$config = array(); // 설정 배열선언
			$this->load->model('table_model'); // 데이터 호출
			$this -> load -> helper("privatehash"); // 암호화 helper
      $this -> load -> helper("config"); // 설정 helper
			$this->load->helper('download'); // 다운로드 helper
      
	}

  public function index()
	{
		$this->load->view('welcome_message');
	}
  public function myLocation() // 내위치 세션 등록
	{
    echo "<script>alert('sadadas');</script>";
		$sido= $this->input->post('sido');
		$gugun= $this->input->post('gugun');
    $dong= $this->input->post('dong');
    $lat= $this->input->post('lat');
    $lon= $this->input->post('lon');
    $sido = $this -> session -> set_userdata('LOCATION_AREA', $sido);
    $gugun = $this -> session -> set_userdata('LOCATION_AREA_GUGUN', $gugun);
    $dong = $this -> session -> set_userdata('LOCATION_AREA_DONG', $dong);
    $lat = $this -> session -> set_userdata('LOCATION_LAT', $lat);
    $lon = $this -> session -> set_userdata('LOCATION_LON', $lon);

    $myLat = $this -> session ->userdata('LOCATION_LAT');
    //echo "<script>console.log(".$myLat.");</script>";

	}


}