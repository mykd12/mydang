<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_auth extends CI_Controller {

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
	}
	public function login()
	{
		// 검증
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('LOGIN_ID', '이메일', 'required');
		$this -> form_validation -> set_rules('LOGIN_PW', '패스워드', 'required');

		if( $this -> form_validation -> run() === false ) { // 입력값이 유효하지 않을시 back
			$this -> load -> view('admin/index');
		}else{ // 회원확인
			$id = $this->input->post('LOGIN_ID');  
      $pass = $this->input->post('LOGIN_PW');
			$this->load->helper('alert');

			if($id != "admin"){
				return_back('관리자 아이디로 로그인해주세요!');
			}else{
				$this -> load -> model('auth_model');
				$result = $this -> auth_model -> login_user($id, $pass);
				if($result[0]){
					$this -> session -> set_userdata('is_login', true);
					$this -> session -> set_userdata('ADMIN_IDX', $result[1]);
					$this -> session -> set_userdata('ADMIN_ID', $result[1]);
					redirect('/admin/user');	
				}else{
					return_back('관리자 아이디 패스워드가 일치 하지 않습니다.');
				}
			}
		}
	}
	public function logout()
	{
		$this -> session -> sess_destroy();
		$this->load->helper('alert');
		redirect('/admin');	
	}
}