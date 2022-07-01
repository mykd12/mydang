<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainDAO extends CI_Controller {

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
		$this -> load -> model('dao_model');
		$this->load->helper('alert');
		$this -> load -> helper("privatehash");
    $config = array();
	}


	public function join() // 일반유저 정보삭제
	{
		$MET_EMAIL= $this->input->post('MET_EMAIL');
    $MET_PW= $this->input->post('MET_PW1');
		$MET_NAME= $this->input->post('MET_NAME');
    $MET_TEL= $this->input->post('MET_TEL');
    $data = array(
      "MET_EMAIL" => encrypt($MET_EMAIL),
      "MET_PW" => encrypt($MET_PW),
      "MET_NAME" => encrypt($MET_NAME),
      "MET_TEL" => encrypt($MET_TEL),
      "MET_DELETE_DATE" => date("Y-m-d H:i:s")
    );

    $result = $this -> dao_model -> dbInsert("MEM_TB",$data,"","");
		
		if($result){
			return_submit('정상적으로 가입되었습니다.','/');
		}else{
			return_back('정상적으로 가입되지않았습니다.');
		}
	}

}