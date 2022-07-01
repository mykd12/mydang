<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
    $this->load->model('auth_model'); // 데이터 호출
    $this->load->model('dao_model'); // 데이터 호출
    $this -> load -> helper("privatehash"); // 암호화 helper
    
	}
	public function login()
	{
		// 검증
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('MET_EMAIL', '이메일', 'required');
		$this -> form_validation -> set_rules('MET_PW', '패스워드', 'required');

		if( $this -> form_validation -> run() === false ) { // 입력값이 유효하지 않을시 back
			$this -> load -> view('main/login');
		}else{ // 회원확인
			$id = $this->input->post('MET_EMAIL');  
      $pass = $this->input->post('MET_PW');
			$this->load->helper('alert');

      $result = $this -> auth_model -> login_user(encrypt($id), encrypt($pass));
      if($result[0]){
        $this -> session -> set_userdata('is_login', true);
        $this -> session -> set_userdata('LOGIN_IDX', $result[0]);
        $this -> session -> set_userdata('LOGIN_ID', decrypt($result[1]));
        $this -> session -> set_userdata('LOGIN_NAME', decrypt($result[2]));
        $this -> session -> set_userdata('LOGIN_IMG', $result[3]);

        $this -> session -> set_userdata('PRO_IDX', $result[0]);
        $this -> session -> set_userdata('PRO_ID', $result[1]);
        $this -> session -> set_userdata('PRO_TYPE', "B");
        $this -> session -> set_userdata('PRO_IMG', $result[3]);
          
        redirect('/');	
      }else{
        return_back('아이디 패스워드가 일치 하지 않습니다.');
      }
		}
	}
	public function logout()
	{
		$this -> session -> sess_destroy();
		$this->load->helper('alert');
		redirect('/');	
	}
  public function emailCk()
	{
    $MET_EMAIL = $this->input->post('MET_EMAIL');  
    $result = $this -> auth_model -> emailCk(encrypt($MET_EMAIL));
    if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}
  public function telCk()
	{
    $MET_TEL = $this->input->post('MET_TEL');  
    $result = $this -> auth_model -> telCk(encrypt($MET_TEL));
    if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}
  public function findId()
	{
    $this->load->helper('alert');
    $MET_NAME = $this->input->post('MET_NAME_ID');  
    $MET_TEL = $this->input->post('MET_TEL_ID');  
    $result = $this -> auth_model -> findId(encrypt($MET_NAME),encrypt($MET_TEL));
    if($result){
			redirect('/main/findId?email='.decrypt($result));
		}else{
			return_back('일치하는 회원정보가 없습니다.');
		}
	}
  public function finPw()
	{
    $this->load->helper('alert');
    $MET_EMAIL = $this->input->post('MET_EMAIL_PW');  
    $MET_TEL = $this->input->post('MET_TEL_PW');  
    $result = $this -> auth_model -> finPw(encrypt($MET_EMAIL),encrypt($MET_TEL));
    if($result){
			redirect('/main/findPw?key='.$result);
		}else{
			return_back('일치하는 회원정보가 없습니다.');
		}
	}
  public function seceSsion() // 탈퇴
	{
		$MET_IDX= $this -> session ->userdata('LOGIN_IDX');
    
    $data = array(
      "MET_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($MET_IDX,"MET_IDX","MEM_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    // 회원 등록 매물정보삭제
    $dataProperty = array(
      "PPT_DELETE_DATE" => date("Y-m-d")
    );
    $resultProperty = $this -> dao_model -> proPertyDel($MET_IDX,"B",$dataProperty); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    // 회원 등록 매물정보 관심매물정보삭제
    $dataCart1 = array(
      "CTT_DELETE_DATE" => date("Y-m-d")
    );
    $resultCart1 = $this -> dao_model -> cartDel($MET_IDX,"prod",$dataCart1); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
     // 회원 관심매물& 정보삭제
     $dataCart2 = array(
      "CTT_DELETE_DATE" => date("Y-m-d")
    );
    $resultCart2 = $this -> dao_model -> dbUpdate($MET_IDX,"MET_KEY","CART_TB",$dataCart2,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataQna = array(
      "QBT_DELETE_DATE" => date("Y-m-d")
    );
    $resultQna = $this -> dao_model -> bkQnaDel($MET_IDX,"B",$dataQna); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataQna1 = array(
      "QBT_DELETE_DATE" => date("Y-m-d")
    );
    $resultQna1 = $this -> dao_model -> dbUpdate($MET_IDX,"MET_IDX","QNA_BK_TB",$dataQna1,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataQna2 = array(
      "QNT_DELETE_DATE" => date("Y-m-d")
    );
    $resultQna2 = $this -> dao_model -> dbUpdate($MET_IDX,"MET_IDX","QNA_TB",$dataQna2,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataQna3 = array(
      "QPT_DELETE_DATE" => date("Y-m-d")
    );
    $resultQna3 = $this -> dao_model -> dbUpdate($MET_IDX,"MET_IDX","QNA_PN_TB",$dataQna3,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		if($result){
      $this->load->helper('alert');
      $this -> session -> sess_destroy();
			return_submit('정상적으로 탈퇴 되었습니다.','/');
		}else{
      $this->load->helper('alert');
      return_submit('정상적으로 탈퇴 되지 않았습니다.','/');
    }
	}

  public function loginPro()
	{
		// 검증
		$this -> load -> library('form_validation');
    $this -> form_validation -> set_rules('type', '구분', 'required');
		$this -> form_validation -> set_rules('LOGIN_EMAIL', '이메일', 'required');
		$this -> form_validation -> set_rules('LOGIN_PW', '패스워드', 'required');

		if( $this -> form_validation -> run() === false ) { // 입력값이 유효하지 않을시 back
			return_back('입력값 오류가 있습니다.');
		}else{ // 회원확인
      $type = $this->input->post('type'); 
			$id = $this->input->post('LOGIN_EMAIL');  
      $pass = $this->input->post('LOGIN_PW');
			$this->load->helper('alert');

      $result = $this -> auth_model -> login_pro(encrypt($id), encrypt($pass), $type);
      if($result[0]){
        if($type=='A' || $type=='B'){
          if($type=='A'){
            if($result[2] !="y"){
              $this->load->helper('alert');
              redirect('/pro/exmnt');	
              exit;
            }
          }
          $this -> session -> set_userdata('is_login', true);
          $this -> session -> set_userdata('PRO_IDX', $result[0]);
          $this -> session -> set_userdata('PRO_ID', $result[1]);
          $this -> session -> set_userdata('PRO_TYPE', $type);
          $this -> session -> set_userdata('PRO_IMG', $result[3]);
          if($type=='B'){
            $this -> session -> set_userdata('LOGIN_IDX', $result[0]);
            $this -> session -> set_userdata('LOGIN_ID', $result[1]);
            $this -> session -> set_userdata('LOGIN_NAME', $result[2]);
          }
          redirect('/pro/mgmtBord');	
        }else{
          $this -> session -> set_userdata('is_login', true);
          $this -> session -> set_userdata('PRO_IDX', $result[0]);
          $this -> session -> set_userdata('PRO_ID', $result[1]);
          $this -> session -> set_userdata('PRO_TYPE', $type);
          $this -> session -> set_userdata('PRO_IMG', $result[2]);
          redirect('/pro/constrCase');	
        }
      }else{
        return_back('아이디 패스워드가 일치 하지 않습니다.');
      }
		}
	}
  public function logoutPro()
	{
		$this -> session -> sess_destroy();
		$this->load->helper('alert');
		redirect('/pro/');	
	}
  public function idFindPro()
	{
    extract($_POST);
    $resultCode = $_REQUEST["resultCode"];
    $mid ='mydangkr99';    // 테스트 MID 입니다. 계약한 상점 MID 로 변경 필요
    if($resultCode=="0000"){
      $data = array(
        'mid' => $mid,        
        'txId' => $txId
         );
      
      $post_data = json_encode($data);
      
      // curl 통신 시작 
      $ch = curl_init();                                               
      curl_setopt($ch, CURLOPT_URL, $_REQUEST["authRequestUrl"]);      
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); 
      curl_setopt($ch, CURLOPT_POST, 1);                
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      
      $response = curl_exec($ch);
      curl_close($ch);
      // -------------------- 결과 수신 -------------------------------------------
      // echo '<승인결과내역>'."<br/><br/>"; 
      $response =  json_decode($response);
      $userName = $response->userName;
      $userPhone = $response->userPhone;
      $resultPhone= preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $userPhone);
      
      $result = $this -> auth_model -> findIdPro(encrypt($userName),encrypt($resultPhone));
      if($result[0] || $result[1] || $result[2]){
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>";
        echo "<script>opener.parent.location='/pro/findIdView?emailA=".decrypt($result[0])."&emailB=".decrypt($result[1])."&emailC=".decrypt($result[2])."'; </script>";
        echo "<script>self.close();</script>";
      }else{
        echo "<script>alert('가입된 회원정보가 없습니다.');self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
    
	}
  public function findPwPro()
	{
    $type = $this->input->get('type');  
    $email = $this->input->get('email');  

    extract($_POST);
    $resultCode = $_REQUEST["resultCode"];
    $mid ='mydangkr99';    // 테스트 MID 입니다. 계약한 상점 MID 로 변경 필요
    if($resultCode=="0000"){
      $data = array(
        'mid' => $mid,        
        'txId' => $txId
         );
      
      $post_data = json_encode($data);
      
      // curl 통신 시작 
      $ch = curl_init();                                               
      curl_setopt($ch, CURLOPT_URL, $_REQUEST["authRequestUrl"]);      
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);     
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); 
      curl_setopt($ch, CURLOPT_POST, 1);                
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      
      $response = curl_exec($ch);
      curl_close($ch);
      // -------------------- 결과 수신 -------------------------------------------
      // echo '<승인결과내역>'."<br/><br/>"; 
      $response =  json_decode($response);
      $userName = $response->userName;
      $userPhone = $response->userPhone;
      $resultPhone= preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $userPhone);
      
      $result = $this -> auth_model -> finPwPro(encrypt($email),encrypt($resultPhone),$type);
      if($result){
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>";
        echo "<script>opener.parent.location='/pro/findPwModify?key=".$result."&type=".$type."'; </script>";
        echo "<script>self.close();</script>";
      }else{
        echo "<script>alert('일치하는 회원정보가 없습니다.');self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}
  public function pwModify() // 패스워드 변경
	{
		$type = $this->input->post('type');
    $key = $this->input->post('key');
    $pw = $this->input->post('MET_PW1');
    if($type=="A"){
      $data = array(
        "BKT_PW" => encrypt($pw)
      );
      $result = $this -> dao_model -> dbUpdate($key,"BKT_IDX","BROKER_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    }else if($type=="B"){
      $data = array(
        "MET_PW" => encrypt($pw)
      );
      $result = $this -> dao_model -> dbUpdate($key,"MET_IDX","MEM_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    }else if($type=="C"){
      $data = array(
        "PTT_PW" => encrypt($pw)
      );
      $result = $this -> dao_model -> dbUpdate($key,"PTT_IDX","PARTNER_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    }
    
		if($result){
      $this->load->helper('alert');
			return_submit('정상적으로 비밀번호가 변경 되었습니다.','/pro');
		}else{
      return_submit('정상적으로 비밀번호가 변경 않았습니다.','/pro');
    }
	}
  public function emailCkUser()
	{
    $JOIN_EMAIL = $this->input->post('JOIN_EMAIL');  
    $result = $this -> auth_model -> emailCkUser(encrypt($JOIN_EMAIL));
    if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}
  public function emailCkPro()
	{
    $JOIN_EMAIL = $this->input->post('JOIN_EMAIL');  
    $result = $this -> auth_model -> emailCkPro(encrypt($JOIN_EMAIL));
  
    if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}
  public function emailCkPtn()
	{
    $JOIN_EMAIL = $this->input->post('JOIN_EMAIL');  
    $result = $this -> auth_model -> emailCkPtn(encrypt($JOIN_EMAIL));
    if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}
  
  public function telCkPro()
	{
    $JOIN_TEL = $this->input->post('JOIN_TEL');  
    $result = $this -> auth_model -> telCkPro(encrypt($JOIN_TEL));
    
    if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}
  public function telCkUser()
	{
    $JOIN_TEL = $this->input->post('JOIN_TEL');  
    $result = $this -> auth_model -> telCkUser(encrypt($JOIN_TEL));
    if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}
  public function telCkPtn()
	{
    $JOIN_TEL = $this->input->post('JOIN_TEL');  
    $result = $this -> auth_model -> telCkPtn(encrypt($JOIN_TEL));
    if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}
  public function seceSsionPro() // 탈퇴
	{
		$PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');

    if($PRO_TYPE=='A'){
      // 중개회원정보삭제
      $data = array(
        "BKT_DELETE_DATE" => date("Y-m-d")
      );
      $result = $this -> dao_model -> dbUpdate($PRO_IDX,"BKT_IDX","BROKER_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
      // 중개 등록 매물정보삭제
      $dataProperty = array(
        "PPT_DELETE_DATE" => date("Y-m-d")
      );
      $resultProperty = $this -> dao_model -> proPertyDel($PRO_IDX,"A",$dataProperty); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
      // 중개 등록 매물 관심매물정보삭제
      $dataCart = array(
        "CTT_DELETE_DATE" => date("Y-m-d")
      );
      $resultCart = $this -> dao_model -> cartDel($PRO_IDX,"prod",$dataCart); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

      // 중개 등록 매물 문의정보삭제
      $dataQna = array(
        "QBT_DELETE_DATE" => date("Y-m-d")
      );
      $resultQna = $this -> dao_model -> bkQnaDel($PRO_IDX,"A",$dataQna); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    }else if($PRO_TYPE=='B'){
      // 회원정보삭제
      $data = array(
        "MET_DELETE_DATE" => date("Y-m-d")
      );
      $result = $this -> dao_model -> dbUpdate($PRO_IDX,"MET_IDX","MEM_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

      // 회원 등록 매물정보삭제
      $dataProperty = array(
        "PPT_DELETE_DATE" => date("Y-m-d")
      );
      $resultProperty = $this -> dao_model -> proPertyDel($PRO_IDX,"B",$dataProperty); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

      // 회원 등록 매물정보 관심매물정보삭제
      $dataCart1 = array(
        "CTT_DELETE_DATE" => date("Y-m-d")
      );
      $resultCart1 = $this -> dao_model -> cartDel($PRO_IDX,"prod",$dataCart1); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
      
      // 회원 관심매물& 정보삭제
      $dataCart2 = array(
        "CTT_DELETE_DATE" => date("Y-m-d")
      );
      $resultCart2 = $this -> dao_model -> dbUpdate($PRO_IDX,"MET_KEY","CART_TB",$dataCart2,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
  
      $dataQna = array(
        "QBT_DELETE_DATE" => date("Y-m-d")
      );
      $resultQna = $this -> dao_model -> bkQnaDel($PRO_IDX,"B",$dataQna); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

      $dataQna1 = array(
        "QBT_DELETE_DATE" => date("Y-m-d")
      );
      $resultQna1 = $this -> dao_model -> dbUpdate($PRO_IDX,"MET_IDX","QNA_BK_TB",$dataQna1,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

      $dataQna2 = array(
        "QNT_DELETE_DATE" => date("Y-m-d")
      );
      $resultQna2 = $this -> dao_model -> dbUpdate($PRO_IDX,"MET_IDX","QNA_TB",$dataQna2,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    }else{
      $data = array(
        "PTT_DELETE_DATE" => date("Y-m-d")
      );
      $result = $this -> dao_model -> dbUpdate($PRO_IDX,"PTT_IDX","PARTNER_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

      $dataCase = array(
        "CST_DELETE_DATE" => date("Y-m-d")
      );
      $resultCase = $this -> dao_model -> dbUpdate($PRO_IDX,"PTT_IDX","CASE_TB",$dataCase,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
      
      $dataCart1 = array(
        "CTT_DELETE_DATE" => date("Y-m-d")
      );
      $resultCart1 = $this -> dao_model -> cartDel($PRO_IDX,"partner",$dataCart1); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

      $dataCart2 = array(
        "CTT_DELETE_DATE" => date("Y-m-d")
      );
      $resultCart2 = $this -> dao_model -> cartDel($PRO_IDX,"make",$dataCart2); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
      
      $dataQna = array(
        "CTT_DELETE_DATE" => date("Y-m-d")
      );
      $resultQna = $this -> dao_model -> dbUpdate($PRO_IDX,"PTT_IDX","QNA_PN_TB",$dataQna,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    }
    
    
		if($result){
      $this->load->helper('alert');
      $this -> session -> sess_destroy();
			return_submit('정상적으로 탈퇴 되었습니다.','/pro/');
		}else{
      $this->load->helper('alert');
      return_back('정상적으로 탈퇴 되지 않았습니다.');
    }
	}
}