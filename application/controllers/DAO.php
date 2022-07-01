<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DAO extends CI_Controller {

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
    $this -> load -> model('table_model');
		$this->load->helper('alert');
		$this -> load -> helper("privatehash");
    $config = array();
    $this -> load -> helper("bankcode");
	}


	public function join() // 일반 회원가입
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
      "MET_REG_DATE" => date("Y-m-d H:i:s")
    );

    $result = $this -> dao_model -> dbInsert("MEM_TB",$data,"","");
		
		if($result){
      include_once 'api/curl_token.php';
      $token_key = token_get();
      $MET_TEL = str_replace("-", "", $MET_TEL); 
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TH_9550',
				'sender'      => '07086338941',
				'receiver_1'  => $MET_TEL,
				'recvname_1'  => $MET_NAME,
				'subject_1'   => '부동상 플랫폼 명당 회원가입',
				'message_1'   => '상권 분석 부동산 플랫폼 명당

회원가입 축하드립니다.
앞으로 다양한 소식과 혜택/정보를 메시지로 전달 받을 수 있습니다.

▼CS 고객상담▼
070-8633-8942
▼홈페이지▼
https://mydang.kr/',
				'button_1'    => '{"button":[{"name":"연결","linkType":"WL","linkP":"https://mydang.kr/", "linkM": "https://mydang.kr/"}]}' // 템플릿에 버튼이 없는경우 제거하시기 바랍니다.
			);
		 
			$oCurl = curl_init();
			curl_setopt($oCurl, CURLOPT_PORT, $_port);
			curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
			curl_setopt($oCurl, CURLOPT_POST, 1);
			curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

			$ret = curl_exec($oCurl);
			$error_msg = curl_error($oCurl);
			curl_close($oCurl);
      //$retArr = json_decode($ret);
      //print_r($retArr);
			return_submit('정상적으로 가입되었습니다.','/main/join03');
		}else{
			return_back('정상적으로 가입되지않았습니다.');
		}
	}

  public function pwChange() // 패스워드 변경
	{
		$MET_IDX= $this->input->post('MET_IDX');
    $MET_PW= $this->input->post('MET_PW1');
    $data = array(
      "MET_PW" => encrypt($MET_PW)
    );

    $result = $this -> dao_model -> dbUpdate($MET_IDX,"MET_IDX","MEM_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		
		if($result){
			return_submit('정상적으로 비밀번호가 변경 되었습니다.','/main/login');
		}else{
			return_back('정상적으로 비밀번호가 변경 되지 않았습니다.');
		}
	}
  public function proCartClick() // 관심매물 클릭
	{
		$key= $this->input->post('key');
    $idx= $this->input->post('idx');
    $slotKey= $this->input->post('slotKey');
		echo json_encode($this -> dao_model -> proCartClick($key,$idx,$slotKey));
	}

  public function caseRev() // 사례 댓글 등록
	{
		$MET_IDX= $this->input->post('MET_IDX');
    $CST_IDX= $this->input->post('CST_IDX');
		$CRT_CONTENT= $this->input->post('InsCrcont');
    $search= $this->input->post('search');
    $pageNo= $this->input->post('pageNo');
    $data = array(
      "MET_IDX" => $MET_IDX,
      "CST_IDX" => $CST_IDX,
      "CRT_CONTENT" => $CRT_CONTENT,
      "CRT_REG_DATE" => date("Y-m-d H:i:s")
    );

    $result = $this -> dao_model -> dbInsert("CASE_REVIEW_TB",$data,"","");
		
		if($result){
			return_submit('정상적으로 등록 되었습니다.','/main/constrCaseView?CST_IDX='.$CST_IDX.'&search='.$search.'&pageNo='.$pageNo.'');
		}else{
			return_back('정상적으로 등록 되지 않았습니다.');
		}
	}

  public function caseRevModify() // 사례 댓글 수정
	{
		$CRT_IDX= $this->input->post('CRT_IDX');
    $CST_IDX= $this->input->post('CST_IDX');
		$CRT_CONTENT= $this->input->post('ModfCrcont');
    $search= $this->input->post('search');
    $pageNo= $this->input->post('pageNo');
    $location= $this->input->post('location');
    $data = array(
      "CRT_CONTENT" => $CRT_CONTENT,
    );

    $result = $this -> dao_model -> dbUpdate($CRT_IDX,"CRT_IDX","CASE_REVIEW_TB",$data,"","","");
		
		if($result){
			return_submit('정상적으로 변경 되었습니다.','/main/constrCaseView?CST_IDX='.$CST_IDX.'&search='.$search.'&pageNo='.$pageNo.'&location='.$location.'');
		}else{
			return_back('정상적으로 변경 되지 않았습니다.');
		}
	}

  public function caseRevDelete() // 사례 댓글 삭제
	{
		$CRT_IDX= $this->input->get('CRT_IDX');
    $CST_IDX= $this->input->get('CST_IDX');
		$search= $this->input->get('search');
    $pageNo= $this->input->get('pageNo');
    $location= $this->input->get('location');
    $data = array(
      "CRT_DELETE_DATE" => date("Y-m-d"),
    );

    $result = $this -> dao_model -> dbUpdate($CRT_IDX,"CRT_IDX","CASE_REVIEW_TB",$data,"","","");
		
		if($result){
			return_submit('정상적으로 삭제 되었습니다.','/main/constrCaseView?CST_IDX='.$CST_IDX.'&search='.$search.'&pageNo='.$pageNo.'&location='.$location.'');
		}else{
			return_back('정상적으로 삭제 되지 않았습니다.');
		}
	}
  public function ptnCartClick() // 관심업체 클릭
	{
		$key= $this->input->post('key');
    $idx= $this->input->post('idx');
    echo json_encode($this -> dao_model -> ptnCartClick($key,$idx));
	}

  public function makeCartClick() // 업체 견적 추가 클릭
	{
		$PTT_IDX= $this->input->post('PTT_IDX');
    $MET_IDX= $this->input->post('MET_IDX');
		echo json_encode($this -> dao_model -> makeCartClick($PTT_IDX,$MET_IDX));
	}

  public function myModify() // 내정보 수정
	{
		$MET_IDX= $this->input->post('MET_IDX');
    $MET_NAME= $this->input->post('MET_NAME');
    $MET_TEL= $this->input->post('MET_TEL');
    $MET_ADDR1= $this->input->post('MET_ADDR1');
    $MET_ADDR2= $this->input->post('MET_ADDR2');
    $MET_PW1= $this->input->post('MET_PW1');
    $MET_PW2= $this->input->post('MET_PW2');
    
    $md_day = date("YmdHis");
		$uploads_dir = './uploads/';
    $up_save = array(); $up_org = array();
    
    $MET_IMG= $_FILES['MET_IMG'];
    $data="";
    if($MET_IMG["size"] > 0){ 
      $MET_IMG_ORGNAME = $MET_IMG["name"];
      $ext = explode('.',$MET_IMG_ORGNAME); 
      $ext = strtolower(array_pop($ext));
      $MET_IMG_SAVENAME = md5($md_day.$MET_IMG_ORGNAME).".".$ext;
      $UP_FILE = $uploads_dir.$MET_IMG_SAVENAME;
      if (move_uploaded_file($_FILES['MET_IMG']['tmp_name'], $UP_FILE)) {
        $MET_IMG_SAVE= $this->input->post('MET_IMG_SAVE');
        unlink($uploads_dir.$MET_IMG_SAVE);
        
        $data = array(
          "MET_NAME" => encrypt($MET_NAME),
          "MET_TEL" => encrypt($MET_TEL),
          "MET_ADDR1" => encrypt($MET_ADDR1),
          "MET_ADDR2" => encrypt($MET_ADDR2),
          "MET_IMG_SAVE" => $MET_IMG_SAVENAME,
          "MET_IMG_ORG" => $MET_IMG_ORGNAME
        );
        if($MET_PW1 && $MET_PW2){
          $data["MET_PW"]=encrypt($MET_PW1);
        }
        $this -> session -> set_userdata('LOGIN_IMG', $MET_IMG_SAVENAME);
      }else{
        echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
      }
    }else{
      $data = array(
        "MET_NAME" => encrypt($MET_NAME),
        "MET_TEL" => encrypt($MET_TEL),
        "MET_ADDR1" => encrypt($MET_ADDR1),
        "MET_ADDR2" => encrypt($MET_ADDR2),
      );
      if($MET_PW1 && $MET_PW2){
        $data["MET_PW"]=encrypt($MET_PW1);
      }
    }
    $this -> session -> set_userdata('LOGIN_NAME', $MET_NAME);
    

    $result = $this -> dao_model -> dbUpdate($MET_IDX,"MET_IDX","MEM_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		
		if($result){
			return_submit('정상적으로 변경 되었습니다.','/main/myPage');
		}else{
			return_back('정상적으로 변경 되지 않았습니다.');
		}
	}

  public function qnaWrite() // 창업과정 업데이트
	{
		$md_day = date("YmdHis");
		$uploads_dir = './uploads/';
    $MET_IDX= $this -> session ->userdata('LOGIN_IDX');
		$QNT_IDX= $this->input->post('QNT_IDX');
		$QNT_FILE= $_FILES['QNT_FILE'];
		$QNT_FILE_PRE= $this->input->post('QNT_FILE_PRE');
    $QNT_FILE_DEL= $this->input->post('QNT_FILE_DEL');
		$QNT_FILE_SAVE=""; $QNT_FILE_ORG="";
		
    if($QNT_FILE["size"] > 0){
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png|pdf';
      $config['encrypt_name']  = TRUE;
      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload("QNT_FILE"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $QNT_FILE_SAVE=$data['upload_data']['file_name'];
        $QNT_FILE_ORG=$data['upload_data']['orig_name'];
      }
    }
		
		if($QNT_FILE_PRE && $QNT_FILE_SAVE){
      unlink($uploads_dir.$QNT_FILE_PRE);
    }

    $data = array(
      "MET_IDX" => $MET_IDX,
      "QNT_TYPE_A" => $this->input->post('QNT_TYPE_A'),
      "QNT_TITLE" => $this->input->post('QNT_TITLE'),
      "QNT_CONTENT" => $this->input->post('QNT_CONTENT')
    );
    if($QNT_FILE_DEL){
      $data["QNT_FILE_SAVE"]="";
      $data["QNT_FILE_ORG"]="";
    }
    if($QNT_FILE_SAVE && $QNT_FILE_ORG){
      $data["QNT_FILE_SAVE"]=$QNT_FILE_SAVE;
      $data["QNT_FILE_ORG"]=$QNT_FILE_ORG;
    }
    if($QNT_IDX){
			$result = $this -> dao_model -> dbUpdate($QNT_IDX,"QNT_IDX","QNA_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["QNT_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("QNA_TB",$data,"",""); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}

		$pageNo= $this->input->get('pageNo');

		if($result){
			if($QNT_IDX){
				return_submit('정상적으로 수정되었습니다.','/main/qnaView?QNT_IDX='.$QNT_IDX.'&pageNo='.$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/main/qnaList?pageNo='.$pageNo);
			}
		}else{
			if($QNT_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}
  public function qnaDelete() // 문의 삭제
	{
    $QNT_IDX= $this->input->get('QNT_IDX');
    $pageNo= $this->input->get('pageNo');
    
    $data = array(
      "QNT_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($QNT_IDX,"QNT_IDX","QNA_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    
    if($result){
      return_submit('정상적으로 삭제 되었습니다.','/main/qnaList?pageNo='.$pageNo);
    }else{
      return_back('정상적으로 삭제 되지않았습니다.');
    }
  }
  public function proCartDel() // 관신명당 매물 제거
	{
    $key= $this->input->post('key');
    $data = array(
      "CTT_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($key,"CTT_IDX","CART_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    
    if($result){
      echo "1";
    }else{
      echo "0";
    }
  }

  public function counsDel() // 관심업체 삭제
	{
    $key= $this->input->post('key');
    $MET_IDX= $this -> session ->userdata('LOGIN_IDX');

    $ctt = $this -> table_model -> table_view("CART_TB","CTT",$key);

    $data = array(
      "CTT_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($key,"CTT_IDX","CART_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    $results = $this -> table_model -> table_list("CART_TB","CTT","","", ""," AND CTT_TYPE='make' AND MET_KEY='".$MET_IDX."' ");
    
    if($result){
      echo "1/".$results[1]."/".$ctt->CTT_KEY;
    }else{
      echo "0/".$results[1]."/".$ctt->CTT_KEY;
    }
  }

  public function cqWirte() // 간단 업체 문의
	{
    $page= $this->input->post('page');
    $mKey= $this->input->post('mKey');

    $CTT_IDX= $this->input->post('CTT_IDX');
    $PTT_TYPE= $this->input->post('PTT_TYPE');
    $PTT_IDX= $this->input->post('PTT_IDX');
    $CQT_NAME= $this->input->post('CQT_NAME');
    $CQT_TEL= $this->input->post('CQT_TEL');
    $CQT_ADDR1= $this->input->post('CQT_ADDR1');
    $CQT_ADDR2= $this->input->post('CQT_ADDR2');
    $CQT_TYPE= $this->input->post('CQT_TYPE');
    $CQT_DATE= $this->input->post('CQT_DATE');
    for($i=0; $i<COUNT($CTT_IDX);$i++){
      $data = array(
        "PTT_IDX" => $PTT_IDX[$i],
        "MET_IDX" => $mKey,
        "QPT_NAME" => encrypt($CQT_NAME),
        "QPT_TEL" => encrypt($CQT_TEL),
        "QPT_TYPE" => $PTT_TYPE[$i],
        "QPT_ADDR1" => encrypt($CQT_ADDR1),
        "QPT_ADDR2" => encrypt($QPT_ADDR2),
        "QPT_FORM" => $CQT_TYPE,
        "QPT_STATE" => "대기중",
        "QPT_DATE" => $CQT_DATE,
        "QPT_REG_DATE" => date("Y-m-d H:i:s")
      );
      $result = $this -> dao_model -> dbInsert("QNA_PN_TB",$data,"","");
      if($result){
        $dataCt = array(
          "CTT_DELETE_DATE" => date("Y-m-d")
        );
        $resultCt = $this -> dao_model -> dbUpdate($CTT_IDX[$i],"CTT_IDX","CART_TB",$dataCt,"","","");
      }
    }
    if($result){
      return_submit('정상적으로 등록되었습니다.',$page);
    }else{
      return_submit('정상적으로 등록되지않았습니다.',$page);
    }
  }

  public function naverCancel() // 네이버 연동 해제
	{
    $key= $this->input->get('key');
    $data = array(
      "MET_NAVER" => null
    );
    $result = $this -> dao_model -> dbUpdate($key,"MET_IDX","MEM_TB",$data,"","","");
    if($result){
      return_submit('정상적으로 해제되었습니다.',"/main/myPage");
    }else{
      return_submit('정상적으로 해제되지않았습니다.',"/main/myPage");
    }
  }
  public function kakaoCancel() // 카카오 연동 해제
	{
    $key= $this->input->get('key');
    $data = array(
      "MET_KAKAO" => null
    );
    $result = $this -> dao_model -> dbUpdate($key,"MET_IDX","MEM_TB",$data,"","","");
    if($result){
      return_submit('정상적으로 해제되었습니다.',"/main/myPage");
    }else{
      return_submit('정상적으로 해제되지않았습니다.',"/main/myPage");
    }
  }

  public function joinPro() // 업체 회원가입
	{
    $type= $this->input->post('type');
    $md_day = date("YmdHis");
		$uploads_dir = './uploads/';
    if($type=='A'){
      $JOIN_FILE= $_FILES['JOIN_FILE'];
      $JOIN_FILE1= $_FILES['JOIN_FILE1'];
      $JOIN_IMG= $_FILES['JOIN_IMG'];
      $JOIN_FILE_SAVE=""; $JOIN_FILE_ORG="";
      $JOIN_FILE1_SAVE=""; $JOIN_FILE1_ORG="";
      $JOIN_IMG_SAVE=""; $JOIN_IMG_ORG="";
      
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png|pdf';
      $config['encrypt_name']  = TRUE;
      $this->load->library('upload', $config);

      if($JOIN_FILE["size"] > 0){
        if ( ! $this->upload->do_upload("JOIN_FILE"))
        {
          echo $this->upload->display_errors();
        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
          $JOIN_FILE_SAVE=$data['upload_data']['file_name'];
          $JOIN_FILE_ORG=$data['upload_data']['orig_name'];
        }
      }
      if($JOIN_FILE1["size"] > 0){
        if ( ! $this->upload->do_upload("JOIN_FILE1"))
        {
          echo $this->upload->display_errors();
        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
          $JOIN_FILE1_SAVE=$data['upload_data']['file_name'];
          $JOIN_FILE1_ORG=$data['upload_data']['orig_name'];
        }
      }
      if($JOIN_IMG["size"] > 0){
        if ( ! $this->upload->do_upload("JOIN_IMG"))
        {
          echo $this->upload->display_errors();
        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
          $JOIN_IMG_SAVE=$data['upload_data']['file_name'];
          $JOIN_IMG_ORG=$data['upload_data']['orig_name'];
        }
      }

      $data = array(
        "BKT_EMAIL" => encrypt($this->input->post('JOIN_EMAIL')),
        "BKT_PW" => encrypt($this->input->post('JOIN_PW1')),
        "BKT_COMPANY" => $this->input->post('JOIN_BUSINESSNAME'),
        "BKT_CORPORATE" => encrypt($this->input->post('JOIN_CORPORATE')),
        "BKT_NUM" => encrypt($this->input->post('JOIN_NUMBER')),
        "BKT_BUSINESS_NUMBER" => encrypt($this->input->post('JOIN_BUSINESS_NUMBER')),
        "BKT_ADDR1" => encrypt($this->input->post('JOIN_ADD01')),
        "BKT_ADDR2" => encrypt($this->input->post('JOIN_ADD02')),
        "BKT_NAME" => encrypt($this->input->post('JOIN_CEO')),
        "BKT_TEL" => encrypt($this->input->post('JOIN_TEL')),
        "BKT_HP" => encrypt($this->input->post('JOIN_HP')),
        "BKT_TYPE" => "master",
        "BKT_SMS_PERMIT" => $this->input->post('JOIN_EMAIL_PERMIT'),
        "BKT_EMAIL_PERMIT" => $this->input->post('JOIN_SMS_PERMIT'),
        "BKT_REG_DATE" => date("Y-m-d H:i:s")
      );

      if($JOIN_FILE_SAVE && $JOIN_FILE_ORG){
        $data["BKT_FILE_SAVE"]=$JOIN_FILE_SAVE;
        $data["BKT_FILE_ORG"]=$JOIN_FILE_ORG;
      }
      if($JOIN_FILE1_SAVE && $JOIN_FILE1_ORG){
        $data["BKT_FILE1_SAVE"]=$JOIN_FILE1_SAVE;
        $data["BKT_FILE1_ORG"]=$JOIN_FILE1_ORG;
      }
      if($JOIN_IMG_SAVE && $JOIN_IMG_ORG){
        $data["BKT_IMG_SAVE"]=$JOIN_IMG_SAVE;
        $data["BKT_IMG_ORG"]=$JOIN_IMG_ORG;
      }
      $result = $this -> dao_model -> dbInsert("BROKER_TB",$data,"","");
      
    }else if($type=='B'){

      $data = array(
        "MET_EMAIL" => encrypt($this->input->post('JOIN_EMAIL')),
        "MET_PW" => encrypt($this->input->post('JOIN_PW1')),
        "MET_ADDR1" => encrypt($this->input->post('JOIN_ADD01')),
        "MET_ADDR2" => encrypt($this->input->post('JOIN_ADD02')),
        "MET_NAME" => encrypt($this->input->post('JOIN_CEO')),
        "MET_TEL" => encrypt($this->input->post('JOIN_HP')),
        "MET_TEL_CK" => "y",
        "MET_SMS_PERMIT" => $this->input->post('JOIN_EMAIL_PERMIT'),
        "MET_EMAIL_PERMIT" => $this->input->post('JOIN_SMS_PERMIT'),
        "MET_REG_DATE" => date("Y-m-d H:i:s")
      );

      $result = $this -> dao_model -> dbInsert("MEM_TB",$data,"","");

    }else if($type=='C'){
      $JOIN_FILE= $_FILES['JOIN_FILE'];
      $JOIN_IMG= $_FILES['JOIN_IMG'];
      $JOIN_FILE_SAVE=""; $JOIN_FILE_ORG="";
      $JOIN_IMG_SAVE=""; $JOIN_IMG_ORG="";
      
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png|pdf';
      $config['encrypt_name']  = TRUE;
      $this->load->library('upload', $config);

      if($JOIN_FILE["size"] > 0){
        if ( ! $this->upload->do_upload("JOIN_FILE"))
        {
          echo $this->upload->display_errors();
        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
          $JOIN_FILE_SAVE=$data['upload_data']['file_name'];
          $JOIN_FILE_ORG=$data['upload_data']['orig_name'];
        }
      }
      if($JOIN_IMG["size"] > 0){
        if ( ! $this->upload->do_upload("JOIN_IMG"))
        {
          echo $this->upload->display_errors();
        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
          $JOIN_IMG_SAVE=$data['upload_data']['file_name'];
          $JOIN_IMG_ORG=$data['upload_data']['orig_name'];
        }
      }

      $data = array(
        "PTT_EMAIL" => encrypt($this->input->post('JOIN_EMAIL')),
        "PTT_PW" => encrypt($this->input->post('JOIN_PW1')),
        "PTT_NAME" => encrypt($this->input->post('JOIN_BUSINESSNAME')),
        "PTT_NUM" => encrypt($this->input->post('JOIN_NUMBER')),
        "PTT_ADDR1_A" => encrypt($this->input->post('JOIN_ADD01')),
        "PTT_ADDR2" => encrypt($this->input->post('JOIN_ADD02')),
        "PTT_ADDR1_B" => encrypt($this->input->post('JOIN_ADDR1_B')),
        "PTT_AREA_A" => $this->input->post('JOIN_AREA_A'),
        "PTT_AREA_A_CODE" => $this->input->post('JOIN_AREA_A_CODE'),
        "PTT_AREA_B" => $this->input->post('JOIN_AREA_B'),
        "PTT_AREA_B_CODE" => $this->input->post('JOIN_AREA_B_CODE'),
        "PTT_AREA_C" => $this->input->post('JOIN_AREA_C'),
        "PTT_AREA_C_CODE" => $this->input->post('JOIN_AREA_C_CODE'),
        "PTT_LAT" => $this->input->post('JOIN_LAT'),
        "PTT_LON" => $this->input->post('JOIN_LON'),
        "PTT_TEL" => encrypt($this->input->post('JOIN_TEL')),
        "PTT_HP" => encrypt($this->input->post('JOIN_HP')),
        "PTT_TYPE" => $this->input->post('JOIN_TYPE'),
        "PTT_AREA" => $this->input->post('JOIN_AREA'),
        "PTT_CAREER" => $this->input->post('JOIN_CAREER'),
        "PTT_CEO" => encrypt($this->input->post('JOIN_CEO')),
        "PTT_TEXT" => $this->input->post('JOIN_TEXT'),
        "PTT_SMS_PERMIT" => $this->input->post('JOIN_EMAIL_PERMIT'),
        "PTT_EMAIL_PERMIT" => $this->input->post('JOIN_SMS_PERMIT'),
        "PTT_REG_DATE" => date("Y-m-d H:i:s")
      );
      
      if($JOIN_FILE_SAVE && $JOIN_FILE_ORG){
        $data["PTT_FILE_SAVE"]=$JOIN_FILE_SAVE;
        $data["PTT_FILE_ORG"]=$JOIN_FILE_ORG;
      }
      if($JOIN_IMG_SAVE && $JOIN_IMG_ORG){
        $data["PTT_IMG_SAVE"]=$JOIN_IMG_SAVE;
        $data["PTT_IMG_ORG"]=$JOIN_IMG_ORG;
      }
      $result = $this -> dao_model -> dbInsert("PARTNER_TB",$data,"","");

    }
    if($result){
      include_once 'api/curl_token.php';
      $token_key = token_get();
      $MET_TEL = str_replace("-", "", $this->input->post('JOIN_HP')); 
      $MET_NAME = str_replace("-", "", $this->input->post('JOIN_CEO')); 
      $_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;

      if($type=='A'){
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TI_2284',
				'sender'      => '07086338941',
				'receiver_1'  => $MET_TEL,
				'recvname_1'  => $MET_NAME,
				'subject_1'   => '부동상 플랫폼 명당 회원가입',
				'message_1'   => '상권 분석 부동산 플랫폼 명당

파트너(중개인)회원가입 축하드립니다.
등록하신 정보 확인 후 승인절차가 이루어집니다.
앞으로 다양한 소식과 혜택/정보를 메시지로 전달 받을 수 있습니다.


▼CS 고객상담▼
070-8633-8942

▼홈페이지▼
https://mydang.kr/pro/',
				'button_1'    => '{"button":[{"name":"연결","linkType":"WL","linkP":"https://mydang.kr/pro/", "linkM": "https://mydang.kr/pro/"}]}' // 템플릿에 버튼이 없는경우 제거하시기 바랍니다.
			);
		 

      }else if($type=='B'){
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TH_9550',
				'sender'      => '07086338941',
				'receiver_1'  => $MET_TEL,
				'recvname_1'  => $MET_NAME,
				'subject_1'   => '부동상 플랫폼 명당 회원가입',
				'message_1'   => '상권 분석 부동산 플랫폼 명당

회원가입 축하드립니다.
앞으로 다양한 소식과 혜택/정보를 메시지로 전달 받을 수 있습니다.

▼CS 고객상담▼
070-8633-8942
▼홈페이지▼
https://mydang.kr/',
				'button_1'    => '{"button":[{"name":"연결","linkType":"WL","linkP":"https://mydang.kr/", "linkM": "https://mydang.kr/"}]}' // 템플릿에 버튼이 없는경우 제거하시기 바랍니다.
			);
      }else if($type=='C'){
        $_variables =	array(
          'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
          'userid'      => 'realdeno', 
          'token'       => $token_key, 
          'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
          'tpl_code'    => 'TI_2285',
          'sender'      => '07086338941',
          'receiver_1'  => $MET_TEL,
          'recvname_1'  => $MET_NAME,
          'subject_1'   => '부동상 플랫폼 명당 회원가입',
          'message_1'   => '상권 분석 부동산 플랫폼 명당
  
  파트너(파트너)회원가입 축하드립니다.
  앞으로 다양한 소식과 혜택/정보를 메시지로 전달 받을 수 있습니다.
  
  
  ▼CS 고객상담▼
  070-8633-8942
  
  ▼홈페이지▼
  https://mydang.kr/pro/',
          'button_1'    => '{"button":[{"name":"연결","linkType":"WL","linkP":"https://mydang.kr/pro/", "linkM": "https://mydang.kr/pro/"}]}' // 템플릿에 버튼이 없는경우 제거하시기 바랍니다.
        );
      }

      $oCurl = curl_init();
			curl_setopt($oCurl, CURLOPT_PORT, $_port);
			curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
			curl_setopt($oCurl, CURLOPT_POST, 1);
			curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

			$ret = curl_exec($oCurl);
			$error_msg = curl_error($oCurl);
			curl_close($oCurl);

      return_submit('정상적으로 회원가입 되었습니다.',"/pro/joinC");
    }else{
      return_back('정상적으로 회원가입 되지 않았습니다.');
    }
  }

  public function ppt_submit() // 카카오 연동 해제
	{
    $PPT_ETC= $this->input->post('PPT_ETC');
    $key= $this->input->post('key');
    $data = array(
      "PPT_ETC" => $PPT_ETC
    );
    $result = $this -> dao_model -> dbUpdate($key,"PPT_IDX","PROPERTY_TB",$data,"","","");
    if($result){
      echo "1";
    }else{
      echo "0";
    }
  }
  public function pst_state() // 카카오 연동 해제
	{
    $key= $this->input->post('key');
    $state= $this->input->post('state');
    $endDAte= $this->input->post('endDAte');
    $data = array(
      "PPT_STATE" => $state,
      "PPT_END_DATE" => $endDAte
    );
    $result = $this -> dao_model -> dbUpdate($key,"PPT_IDX","PROPERTY_TB",$data,"","","");

    if($result){
      echo "1";
    }else{
      echo "0";
    }
  }
  public function pqQna() // 카카오 연동 해제
	{
    $pqName= $this->input->post('pqName');
    $pqTel= $this->input->post('pqTel');
    $pqEmail= $this->input->post('pqEmail');
    $pqType= $this->input->post('pqType');
    $pqContent= $this->input->post('pqContent');
    $data = array(
      "PQT_NAME" => encrypt($pqName),
      "PQT_TEL" => encrypt($pqTel),
      "PQT_EMAIL" => encrypt($pqEmail),
      "PQT_TYPE" => $pqType,
      "PQT_CONTENT" => $pqContent,
      "PQT_REG_DATE" => date("Y-m-d H:i:s"),
    );

    $result = $this -> dao_model -> dbInsert("PQNA_TB",$data,"","");
    if($result){
      echo "1";
    }else{
      echo "0";
    }
  }
  public function payment() // 카카오 연동 해제
	{
    //$PRO_IDX = $this -> session ->userdata('PRO_IDX');
    

    $PST_IDX= $this->input->post('PST_IDX');
    $USER_IDX= $this->input->post('USER_IDX');
    $USER_TYPE= $this->input->post('USER_TYPE');
    $PMT_MONEY= $this->input->post('PMT_MONEY');
    $PMT_MEANS= $this->input->post('PMT_MEANS');
    $PMT_NUMBER1= $this->input->post('PMT_NUMBER1');
    $PMT_NUMBER2= $this->input->post('PMT_NUMBER2');
    $PMT_DATE= $this->input->post('PMT_DATE');
    $PMT_TIME= $this->input->post('PMT_TIME');
    $PMT_CODE= $this->input->post('PMT_CODE');

    $psDate = $this->input->post('psDate');
    $psCnt = $this->input->post('psCnt');
    $strtD = $this->input->post('strtD');
    $TIME = date("H:i:s");
    $START_DATE = $strtD." ".$TIME;

    $END_DATE = date("Y-m-d", strtotime("+".$psDate." day", strtotime(date("Y-m-d ".$TIME.""))));
    $END_DATE = $END_DATE." ".$TIME;
    
    if($PMT_MEANS=='Card' || $PMT_MEANS=='DirectBank'){
      $PST_STATE="A";
    }else{
      $PST_STATE="B";
    }
    if($PST_IDX){
      if($PMT_MEANS=='Card' || $PMT_MEANS=='DirectBank'){
        $resultsSelect = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$PST_IDX);
        $PST_DAY = $resultsSelect->PST_DAY+$psDate;
        $psMoney = $resultsSelect->PST_MONEY+$PMT_MONEY;
        $dataSlot = array(
          "PST_END" => $END_DATE,
          "PST_END_TIME" => $TIME,
          "PST_DAY" => $PST_DAY,
          "PST_MONEY" => $psMoney,
          "PST_PAY_METHOD" => $PMT_MEANS
        );
        $resultSlot = $this -> dao_model -> dbUpdate($PST_IDX,"PST_IDX","PROP_SLOT_TB",$dataSlot,"","","");
      }else{
        $resultSlot="VBank";
      }
    }else{
      $dataSlot = array(
        "USER_IDX" => $USER_IDX,
        "PST_USER_TYPE" => $USER_TYPE,
        "PPT_CNT" => $psCnt,
        "PST_START" => $START_DATE,
        "PST_END" => $END_DATE,
        "PST_MONEY" => $PMT_MONEY,
        "PST_REG_DATE" => date("Y-m-d H:i:s"),
        "PST_STATE" => $PST_STATE,
        "PST_START_TIME" => $TIME,
        "PST_END_TIME" => $TIME,
        "PST_DAY" => $psDate,
        "PST_TITLE" => "광고상품",
        "PST_PAY_METHOD" => $PMT_MEANS
      );
      $resultSlot = $this -> dao_model -> dbInsert("PROP_SLOT_TB",$dataSlot,"","");
      $resultsSelect = $this -> table_model -> tableLast("PROP_SLOT_TB","PST");
    }

    
    

    if($PMT_MEANS=='Card'){
      $PMT_CARD_NUMBER= $this->input->post('PMT_CARD_NUMBER');
      $PMT_INSTAL_PERIOD= $this->input->post('PMT_INSTAL_PERIOD');
      $PMT_CARD_TYPE= $this->input->post('PMT_CARD_TYPE'); 
      $PMT_CARD_INTEREST= $this->input->post('PMT_CARD_INTEREST'); 
      $PMT_CARD_QUOTA= $this->input->post('PMT_CARD_QUOTA');
      $PMT_CARD_CORPFLAG= $this->input->post('PMT_CARD_CORPFLAG');
      $PMT_CARD_CHECKFLAG= $this->input->post('PMT_CARD_CHECKFLAG');
      $PMT_CARD_PRTC= $this->input->post('PMT_CARD_PRTC');
      $PMT_CARD_POINT= $this->input->post('PMT_CARD_POINT');
      if($PST_IDX){
        $data = array(
          "USER_IDX" => $USER_IDX,
          "USER_TYPE" => $USER_TYPE,
          "PST_IDX" => $PST_IDX,
          "PMT_MONEY" => $PMT_MONEY,
          "PMT_MEANS" => $PMT_MEANS,
          "PMT_CODE" => $PMT_CODE,
          "PMT_NUMBER1" => $PMT_NUMBER1,
          "PMT_NUMBER2" => $PMT_NUMBER2,
          "PMT_DATE" => date("Y-m-d", strtotime($PMT_DATE)),
          "PMT_TIME" => $PMT_TIME,
          "PMT_CARD_NUMBER" => $PMT_CARD_NUMBER,
          "PMT_INSTAL_PERIOD" => $PMT_INSTAL_PERIOD,
          "PMT_CARD_TYPE" => $PMT_CARD_TYPE,
          "PMT_CARD_INTEREST" => $PMT_CARD_INTEREST,
          "PMT_CARD_QUOTA" => $PMT_CARD_QUOTA,
          "PMT_CARD_CORPFLAG" => $PMT_CARD_CORPFLAG,
          "PMT_CARD_CHECKFLAG" => $PMT_CARD_CHECKFLAG,
          "PMT_CARD_PRTC" => $PMT_CARD_PRTC,
          "PMT_CARD_POINT" => $PMT_CARD_POINT,
          "PMT_STATE" => "A",
          "PMT_DAY" => $psDate,
          "PMT_START" => $resultsSelect->PST_END,
          "PMT_END" => $END_DATE,
          "PMT_REG_DATE" => date("Y-m-d H:i:s"),
        ); 
      }else{
        $data = array(
          "USER_IDX" => $USER_IDX,
          "USER_TYPE" => $USER_TYPE,
          "PST_IDX" => $resultsSelect->PST_IDX,
          "PMT_MONEY" => $PMT_MONEY,
          "PMT_MEANS" => $PMT_MEANS,
          "PMT_CODE" => $PMT_CODE,
          "PMT_NUMBER1" => $PMT_NUMBER1,
          "PMT_NUMBER2" => $PMT_NUMBER2,
          "PMT_DATE" => date("Y-m-d", strtotime($PMT_DATE)),
          "PMT_TIME" => $PMT_TIME,
          "PMT_CARD_NUMBER" => $PMT_CARD_NUMBER,
          "PMT_INSTAL_PERIOD" => $PMT_INSTAL_PERIOD,
          "PMT_CARD_TYPE" => $PMT_CARD_TYPE,
          "PMT_CARD_INTEREST" => $PMT_CARD_INTEREST,
          "PMT_CARD_QUOTA" => $PMT_CARD_QUOTA,
          "PMT_CARD_CORPFLAG" => $PMT_CARD_CORPFLAG,
          "PMT_CARD_CHECKFLAG" => $PMT_CARD_CHECKFLAG,
          "PMT_CARD_PRTC" => $PMT_CARD_PRTC,
          "PMT_CARD_POINT" => $PMT_CARD_POINT,
          "PMT_STATE" => "A",
          "PMT_DAY" => $psDate,
          "PMT_START" => $START_DATE,
          "PMT_END" => $END_DATE,
          "PMT_REG_DATE" => date("Y-m-d H:i:s"),
        ); 

      }
      
      if($PMT_INSTAL_PERIOD=='00'){
        $msgCardPeriod = "일시불";
      }else{
        $msgCardPeriod = $PMT_INSTAL_PERIOD." 개월";
      }
      
      $tel="";
      $name="";
      if($USER_TYPE=='A'){
        $userResults = $this -> table_model -> table_view("BROKER_TB","BKT",$USER_IDX);
        $tel=decrypt($userResults->BKT_HP);
        $name=decrypt($userResults->BKT_NAME);
      }else if($USER_TYPE=='B'){
        $userResults = $this -> table_model -> table_view("MEM_TB","MET",$USER_IDX);
        $tel=decrypt($userResults->MET_TEL);
        $name=decrypt($userResults->MET_NAME);
      }
      $PMT_NUMBER2 = explode("_", $PMT_NUMBER2);
      if($PST_IDX){
        $START_DATE = date("Y.m.d", strtotime($resultsSelect->PST_END));
      }else{
        $START_DATE = date("Y.m.d", strtotime($START_DATE));
      }
      
      $END_DATE = date("Y.m.d", strtotime($END_DATE));

      include_once 'api/curl_token.php';
      $token_key = token_get();
      $tel = str_replace("-", "", $tel); 
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
      
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TI_3943',
				'sender'      => '07086338941',
				'receiver_1'  => $tel,
				'recvname_1'  => $name,
				'subject_1'   => '부동상 플랫폼 명당 결제완료',
				'message_1'   => '[명당] 결제완료 안내
'.$name.'님, 광고상품 결제가 완료되었습니다.

- 주문번호 : '.$PMT_NUMBER2[1].'
- 결제일 : '.$PMT_DATE.'
- 금액 : '.number_format($PMT_MONEY).'

- 카드번호 : '.$PMT_CARD_NUMBER.'
- 일시/할부 : '.$msgCardPeriod.'
- 광고기간 : '.$START_DATE.' ~ '.$END_DATE.'
- 슬롯개수 : '.$psCnt.'개

▷ 명당 문의하기
- 고객센터 : 070.8633.8942 (realdeno@naver.com)
- 운영시간 : AM 9:30 ~ PM 06:00 (주말&공휴일 제외)
- 점심시간 : PM 12:00 ~ PM 13:00');


    }else if($PMT_MEANS=='DirectBank'){
      if($PST_IDX){
        $resultsSelect = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$PST_IDX);
        $START_DATE = $resultsSelect->PST_IDX;
      }
      $PMT_BANK_CODE= $this->input->post('PMT_BANK_CODE');
      $PMT_RECEIPT_TYPE= $this->input->post('PMT_RECEIPT_TYPE');
      $PMT_RECEIPT_CODE= $this->input->post('PMT_RECEIPT_CODE');
      
      $data = array(
        "USER_IDX" => $USER_IDX,
        "USER_TYPE" => $USER_TYPE,
        "PST_IDX" => $resultsSelect->PST_IDX,
        "PMT_MONEY" => $PMT_MONEY,
        "PMT_MEANS" => $PMT_MEANS,
        "PMT_CODE" => $PMT_CODE,
        "PMT_NUMBER1" => $PMT_NUMBER1,
        "PMT_NUMBER2" => $PMT_NUMBER2,
        "PMT_DATE" => date("Y-m-d", strtotime($PMT_DATE) ),
        "PMT_TIME" => $PMT_TIME,
        "PMT_BANK_CODE" => $PMT_BANK_CODE,
        "PMT_RECEIPT_TYPE" => $PMT_RECEIPT_TYPE,
        "PMT_RECEIPT_CODE" => $PMT_RECEIPT_CODE,
        "PMT_STATE" => "A",
        "PMT_DAY" => $psDate,
        "PMT_START" => $START_DATE,
        "PMT_END" => $END_DATE,
        "PMT_REG_DATE" => date("Y-m-d H:i:s"),
      ); 

      $PMT_BANK = bankCode($PMT_BANK_CODE);

      $tel="";
      $name="";
      if($USER_TYPE=='A'){
        $userResults = $this -> table_model -> table_view("BROKER_TB","BKT",$USER_IDX);
        $tel=decrypt($userResults->BKT_HP);
        $name=decrypt($userResults->BKT_NAME);
      }else if($USER_TYPE=='B'){
        $userResults = $this -> table_model -> table_view("MEM_TB","MET",$USER_IDX);
        $tel=decrypt($userResults->MET_TEL);
        $name=decrypt($userResults->MET_NAME);
      }
      $PMT_NUMBER2 = explode("_", $PMT_NUMBER2);
      $START_DATE = date("Y.m.d", strtotime($START_DATE));
      $END_DATE = date("Y.m.d", strtotime($END_DATE));

      include_once 'api/curl_token.php';
      $token_key = token_get();
      $tel = str_replace("-", "", $tel); 
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TI_3945',
				'sender'      => '07086338941',
				'receiver_1'  => $tel,
				'recvname_1'  => $name,
				'subject_1'   => '부동상 플랫폼 명당 결제완료',
				'message_1'   => '[명당] 결제완료 안내
'.$name.'님, 광고상품 결제가 완료되었습니다.

- 주문번호 :'.$PMT_NUMBER2[1].'
- 결제일 : '.$PMT_DATE.'
- 금액 : '.number_format($PMT_MONEY).'

- 은행명 : '.$PMT_BANK.'
- 계좌주명 : '.$name.'
- 광고기간 : '.$START_DATE.' ~ '.$END_DATE.'
- 슬롯개수 : '.$psCnt.'개

▷ 명당 문의하기
- 고객센터 : 070.8633.8942 (realdeno@naver.com)
- 운영시간 : AM 9:30 ~ PM 06:00 (주말&공휴일 제외)
- 점심시간 : PM 12:00 ~ PM 13:00');


    }else if($PMT_MEANS=='VBank'){
      if($PST_IDX){
        $resultsSelect = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$PST_IDX);
        $START_DATE = $resultsSelect->PST_START;
      }
      
      $PMT_VACT_NUM= $this->input->post('PMT_VACT_NUM');
      $PMT_VACT_BANKCODE= $this->input->post('PMT_VACT_BANKCODE');
      $PMT_VACT_BANKNAME= $this->input->post('PMT_VACT_BANKNAME');
      $PMT_VACT_NAME= $this->input->post('PMT_VACT_NAME');
      $PMT_VACT_INPUTNAME= $this->input->post('PMT_VACT_INPUTNAME');
      $PMT_VACT_DATE= $this->input->post('PMT_VACT_DATE');
      $PMT_VACT_TIME= $this->input->post('PMT_VACT_TIME');
      $data = array(
        "USER_IDX" => $USER_IDX,
        "USER_TYPE" => $USER_TYPE,
        "PST_IDX" => $resultsSelect->PST_IDX,
        "PMT_MONEY" => $PMT_MONEY,
        "PMT_MEANS" => $PMT_MEANS,
        "PMT_CODE" => $PMT_CODE,
        "PMT_NUMBER1" => $PMT_NUMBER1,
        "PMT_NUMBER2" => $PMT_NUMBER2,
        "PMT_DATE" => NULL,
        "PMT_TIME" => NULL,
        "PMT_VACT_NUM" => $PMT_VACT_NUM,
        "PMT_VACT_BANKCODE" => $PMT_VACT_BANKCODE,
        "PMT_VACT_BANKNAME" => $PMT_VACT_BANKNAME,
        "PMT_VACT_NAME" => $PMT_VACT_NAME,
        "PMT_VACT_INPUTNAME" => $PMT_VACT_INPUTNAME,
        "PMT_VACT_DATE" => $PMT_VACT_DATE,
        "PMT_VACT_TIME" => $PMT_VACT_TIME,
        "PMT_STATE" => "B",
        "PMT_DAY" => $psDate,
        "PMT_START" => $START_DATE,
        "PMT_END" => $END_DATE,
        "PMT_REG_DATE" => date("Y-m-d H:i:s"),
      ); 

      $tel="";
      $name="";
      if($USER_TYPE=='A'){
        $userResults = $this -> table_model -> table_view("BROKER_TB","BKT",$USER_IDX);
        $tel=decrypt($userResults->BKT_HP);
        $name=decrypt($userResults->BKT_NAME);
      }else if($USER_TYPE=='B'){
        $userResults = $this -> table_model -> table_view("MEM_TB","MET",$USER_IDX);
        $tel=decrypt($userResults->MET_TEL);
        $name=decrypt($userResults->MET_NAME);
      }
      $PMT_NUMBER2 = explode("_", $PMT_NUMBER2);
      $START_DATE = date("Y.m.d", strtotime($START_DATE));
      $END_DATE = date("Y.m.d", strtotime($END_DATE));

      include_once 'api/curl_token.php';
      $token_key = token_get();
      $tel = str_replace("-", "", $tel); 
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TI_3947',
				'sender'      => '07086338941',
				'receiver_1'  => $tel,
				'recvname_1'  => $name,
				'subject_1'   => '부동상 플랫폼 명당 입금요청',
				'message_1'   => '[명당] 입금요청 안내
'.$name.'님, 광고상품 입금요청 드립니다.

- 주문번호 : '.$PMT_NUMBER2[1].'
- 금액 : '.number_format($PMT_MONEY).'
- 가상계좌번호 : '.$PMT_VACT_NUM.'
- 입금은행 : '.$PMT_VACT_BANKNAME.'
- 예금주 : '.$PMT_VACT_NAME.'
- 송금자명 : '.$PMT_VACT_INPUTNAME.'
- 입금기한 : '.$PMT_VACT_DATE.'

- 광고기간 : '.$START_DATE.' ~ '.$END_DATE.'
- 슬롯개수 : '.$psCnt.'개

▷ 명당 문의하기
- 고객센터 : 070.8633.8942 (realdeno@naver.com)
- 운영시간 : AM 9:30 ~ PM 06:00 (주말&공휴일 제외)
- 점심시간 : PM 12:00 ~ PM 13:00');
    }
        
    $result = $this -> dao_model -> dbInsert("PAYMENT_TB",$data,"","");

    $resultsSelectPm = $this -> table_model -> tableLast("PAYMENT_TB","PMT","");

    if($result && $resultSlot){
      $oCurl = curl_init();
			curl_setopt($oCurl, CURLOPT_PORT, $_port);
			curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
			curl_setopt($oCurl, CURLOPT_POST, 1);
			curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

			$ret = curl_exec($oCurl);
			$error_msg = curl_error($oCurl);
			curl_close($oCurl);
      redirect('/pro/payCmp?psKey='.$resultsSelect->PST_IDX.'&pmKey='.$resultsSelectPm->PMT_IDX);
    }else{
      return_back('정상적으로 결제되지않았습니다.');
    }
  }

  public function porpdWirte() // 매물정보 업데이트
	{
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    
    $Pkey= $this->input->post('key');
    $psKey= $this->input->post('psKey');
    $pLat= $this->input->post('pLat');
    $pLon= $this->input->post('pLon');
    $pAddr1B= $this->input->post('pAddr1B');
    $pAreaA= $this->input->post('pAreaA');
    $pAreaB= $this->input->post('pAreaB');
    $pAreaC= $this->input->post('pAreaC');
    $pAreaD= $this->input->post('pAreaD');
    $pAreaAcode= $this->input->post('pAreaAcode');
    $pAreaBcode= $this->input->post('pAreaBcode');
    $pAreaCcode= $this->input->post('pAreaCcode');
    $pTypeA= $this->input->post('pTypeA');
    $pTypeB= $this->input->post('pTypeB');
    $pRegist= $this->input->post('pRegist');
    $pAddr1= $this->input->post('pAddr1');
    $pAddr2= $this->input->post('pAddr2');
    $pExposure= $this->input->post('pExposure');
    $pPriceA= $this->input->post('pPriceA');
    $pPriceB= $this->input->post('pPriceB');
    $pPriceC= $this->input->post('pPriceC');
    $pPriceCEtc= $this->input->post('pPriceCEtc');
    $pPriceD= $this->input->post('pPriceD');
    $pPriceDEtc= $this->input->post('pPriceDEtc');
    $pStoreysA= $this->input->post('pStoreysA');
    $pStoreysB= $this->input->post('pStoreysB');
    $pStoreysC= $this->input->post('pStoreysC');
    $pSizeA= $this->input->post('pSizeA');
    $pSizeAA= $this->input->post('pSizeAA');
    $pSizeB= $this->input->post('pSizeB');
    $pSizeBB= $this->input->post('pSizeBB');
    $pOptionA= $this->input->post('pOptionA');
    $pOptionB= $this->input->post('pOptionB');
    $pOptionC= $this->input->post('pOptionC');
    $pOptionD= $this->input->post('pOptionD');
    $pOptionE= $this->input->post('pOptionE');
    $pOptionG= $this->input->post('pOptionG');
    $pAllowInd= $this->input->post('pAllowInd');
    $pTitle= $this->input->post('pTitle');
    $pContent= $this->input->post('pContent');
    $pState= $this->input->post('pState');
    $pStart= $this->input->post('pStart');
    $pEnd= $this->input->post('pEnd');
    $pRepres= $this->input->post('pRepres');
    $PIT_UP_REPRES= $this->input->post('PIT_UP_REPRES');
    $PIT_IDX= $this->input->post('PIT_IDX');
    $PIT_DEL= $this->input->post('PIT_DEL');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    
    $md_day = date("YmdHis");
		$uploads_dir = './uploads/';
    if ( is_array( $pTypeA ) ) { 
      $pTypeA = implode("|", $pTypeA);
    }else{
      $pTypeA = $pTypeA;
    }
    if(!$pState)
    {$pState="A";}

    if ( is_array( $pOptionG ) ) { 
      $pOptionG = implode("|", $pOptionG);
    }else{
      $pOptionG = $pOptionG;
    }
    if ( is_array( $pAllowInd ) ) { 
      $pAllowInd = implode("|", $pAllowInd);
    }else{
      $pAllowInd = $pAllowInd;
    }
    $up_save = array(); $up_org = array();
    $pImg= $_FILES['pImg'];
    
    foreach($_FILES['pImg']["error"] as $key => $error){
      if($pImg["size"][$key] > 0){ 
        $pImg_ORGNAME = $pImg["name"][$key];
        $ext = explode('.',$pImg_ORGNAME); 
        $ext = strtolower(array_pop($ext));
        $pImg_SAVENAME = md5($md_day.$pImg_ORGNAME).".".$ext;
        $UP_FILE = $uploads_dir.$pImg_SAVENAME;
        if (move_uploaded_file($_FILES['pImg']['tmp_name'][$key], $UP_FILE)) {
          array_push($up_save, $pImg_SAVENAME);
          array_push($up_org, $pImg_ORGNAME);
        }else{
          echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
        }
      }
    }

    
    $data = array(
      "PST_IDX" => $psKey,
      "PPT_LAT" => $pLat,
      "PPT_LON" => $pLon,
      "PPT_ADDR1_B" => $pAddr1B,
      "PPT_AREA_A" => $pAreaA,
      "PPT_AREA_B" => $pAreaB,
      "PPT_AREA_C" => $pAreaC,
      "PPT_AREA_A_CODE" => $pAreaAcode,
      "PPT_AREA_B_CODE" => $pAreaBcode,
      "PPT_AREA_C_CODE" => $pAreaCcode,
      "PPT_AREA_D" => $pAreaD,
      "PPT_TYPE_A" =>  $pTypeA,
      "USER_IDX" => $PRO_IDX,
      "PPT_STATE" => $pState,
      "PPT_START_DATE" => $pStart,
      "PPT_END_DATE" => $pEnd,
      "PPT_TYPE_B" => $pTypeB,
      "PPT_REGIST_NUMBER" => encrypt($pRegist),
      "PPT_ADDR1_A" => encrypt($pAddr1),
      "PPT_ADDR2" => encrypt($pAddr2),
      "PPT_EXPOSURE" => $pExposure,
      "PPT_PRICE_A" => $pPriceA,
      "PPT_PRICE_B" => $pPriceB,
      "PPT_PRICE_C" => $pPriceC,
      "PPT_PRICE_C_ETC" => $pPriceCEtc,
      "PPT_PRICE_D" => $pPriceD,
      "PPT_PRICE_D_ETC" => $pPriceDEtc,
      "PPT_STOREYS_A" => $pStoreysA,
      "PPT_STOREYS_B" => $pStoreysB,
      "PPT_STOREYS_C" => $pStoreysC,
      "PPT_SIZE_A" => $pSizeA,
      "PPT_SIZE_B" => $pSizeB,
      "PPT_OPTION_A" => $pOptionA,
      "PPT_OPTION_B" => $pOptionB,
      "PPT_OPTION_C" => $pOptionC,
      "PPT_OPTION_D" => $pOptionD,
      "PPT_OPTION_E" => $pOptionE,
      "PPT_OPTION_G" => $pOptionG,
      "PPT_ALLOW_INDUSTRY" => $pAllowInd,
      "PPT_TITLE" => $pTitle,
      "PPT_CONTENT" => $pContent,
      "PPT_USER_TYPE" => $PRO_TYPE,
      'PPT_REG_DATE'  => date("Y-m-d H:i:s")
    );
    if($PRO_TYPE=='A'){
      $pbsIdx = $this->input->post('pbsIdx');
      $data["BST_IDX"]=$pbsIdx;
    }

    if($Pkey){
      $result = $this -> dao_model -> propertyUpdate($Pkey,$data,$up_save,$up_org,$pRepres,$PIT_UP_REPRES,$PIT_IDX,$PIT_DEL,$pStart,$pEnd,$this->input->post('pState')); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    }else{
      $result = $this -> dao_model -> propertyInsert($data,$up_save,$up_org,$pRepres,$pStart,$pEnd,$Pkey,$this->input->post('pState')); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
    }
    
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $state= $this->input->get('state');

		if($result){
			if($Pkey){
				return_submit('정상적으로 수정되었습니다.','/pro/storeWrite?key='.$Pkey.'&state='.$state.'&slotKey='.$psKey);
			}else{
				return_submit('정상적으로 등록되었습니다.','/pro/storeList?slotKey='.$psKey.'&state='.$state);
			}
		}else{
			if($Pkey){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
  }
  
  public function myPagePro() // 매물정보 업데이트
	{
    $proType= $this->input->post('proType');
    $proKey= $this->input->post('proKey');
    $joinPw= $this->input->post('joinPw1');
    $joinAddr1= $this->input->post('joinAddr1');
    $joinAddr2= $this->input->post('joinAddr2');
    $joinName= $this->input->post('joinName');
    $joinPw= $this->input->post('joinPw1');
    $joinTel= $this->input->post('joinTel');
    $joinHp= $this->input->post('joinHp');
    $joinEmail= $this->input->post('joinEmail');
    $joinSns= $this->input->post('joinSns');
    
   
    
    $md_day = date("YmdHis");
		$uploads_dir = './uploads/';
    
    $up_save = ""; $up_org = "";
    if($proType=='A'){
      $joinImgSave= $this->input->post('joinImgSave');
      $joinImg= $_FILES['joinImg'];
      $data = array(
        "BKT_NAME" => encrypt($joinName),
        "BKT_HP" => encrypt($joinHp),
        "BKT_SMS_PERMIT" => $joinSns,
        "BKT_EMAIL_PERMIT" => $joinEmail
      );
      if($joinPw){
        $data["BKT_PW"]=encrypt($joinPw);
      }
      
      if($joinImg["size"] > 0){ 
        $joinImg_ORGNAME = $joinImg["name"];
        $ext = explode('.',$joinImg_ORGNAME); 
        $ext = strtolower(array_pop($ext));
        $joinImg_SAVENAME = md5($md_day.$joinImg_ORGNAME).".".$ext;
        $UP_FILE = $uploads_dir.$joinImg_SAVENAME;
        if (move_uploaded_file($_FILES['joinImg']['tmp_name'], $UP_FILE)) {
          $up_save=$joinImg_SAVENAME;
          $up_org=$joinImg_ORGNAME;
        }else{
          echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
        }
      }
      if($up_save && $up_org){
        unlink($uploads_dir.$joinImgSave);
      }
      if($up_save && $up_org){
        $data["BKT_IMG_SAVE"]=$up_save;
        $data["BKT_IMG_ORG"]=$up_org;
      }
      
      $result = $this -> dao_model -> dbUpdate($proKey,"BKT_IDX","BROKER_TB",$data,"","","");
    }else if($proType=='B'){
      $data = array(
        "MET_NAME" => encrypt($joinName),
        "MET_ADDR1" => encrypt($joinAddr1),
        "MET_ADDR2" => encrypt($joinAddr2),
        "MET_TEL" => encrypt($joinHp),
        "MET_SMS_PERMIT" => $joinSns,
        "MET_EMAIL_PERMIT" => $joinEmail
      );
      if($joinPw){
        $data["MET_PW"]=encrypt($joinPw);
      }
      
      $result = $this -> dao_model -> dbUpdate($proKey,"MET_IDX","MEM_TB",$data,"","","");
    }else{
      $joinImgSave= $this->input->post('joinImgSave');
      $joinImgDel= $this->input->post('joinImgDel');
      $joinArea= $this->input->post('joinArea');
      $joinCareer= $this->input->post('joinCareer');
      $joinField= $this->input->post('joinField');
      $joinText= $this->input->post('joinText');
      $joinImg= $_FILES['joinImg'];
      $data = array(
        "PTT_CEO" => encrypt($joinName),
        "PTT_TEL" => encrypt($joinTel),
        "PTT_HP" => encrypt($joinHp),
        "PTT_TYPE" => $joinField,
        "PTT_AREA" => $joinArea,
        "PTT_CAREER" => $joinCareer,
        "PTT_TEXT" => $joinText,
        "PTT_SMS_PERMIT" => $joinSns,
        "PTT_EMAIL_PERMIT" => $joinEmail
      );
      if($joinPw){
        $data["PTT_PW"]=encrypt($joinPw);
      }
      
      if($joinImg["size"] > 0){ 
        $joinImg_ORGNAME = $joinImg["name"];
        $ext = explode('.',$joinImg_ORGNAME); 
        $ext = strtolower(array_pop($ext));
        $joinImg_SAVENAME = md5($md_day.$joinImg_ORGNAME).".".$ext;
        $UP_FILE = $uploads_dir.$joinImg_SAVENAME;
        if (move_uploaded_file($_FILES['joinImg']['tmp_name'], $UP_FILE)) {
          $up_save=$joinImg_SAVENAME;
          $up_org=$joinImg_ORGNAME;
        }else{
          echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
        }
      }
      
      if($up_save && $up_org){
        unlink($uploads_dir.$joinImgSave);
      }

      if($joinImgDel){
        unlink($uploads_dir.$joinImgSave);
        $data["PTT_IMG_SAVE"]="";
        $data["PTT_IMG_ORG"]="";
      }

      if($up_save && $up_org){
        $data["PTT_IMG_SAVE"]=$up_save;
        $data["PTT_IMG_ORG"]=$up_org;
      }
      
      $result = $this -> dao_model -> dbUpdate($proKey,"PTT_IDX","PARTNER_TB",$data,"","","");
    }

		if($result){
			return_submit('정상적으로 변경되었습니다.','/pro/mypage');
		}else{
			return_back('정상적으로 변경되지않았습니다.');
		}
  }
  public function caseWrite() // 매물정보 업데이트
	{
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $caseKey= $this->input->post('caseKey');
    $caseAddrB= $this->input->post('caseAddrB');
    $caseLat= $this->input->post('caseLat');
    $caseLon= $this->input->post('caseLon');
    $caseField= $this->input->post('caseField');
    $caseOptionA= $this->input->post('caseOptionA');
    $caseOptionB= $this->input->post('caseOptionB');
    $caseOptionC= $this->input->post('caseOptionC');
    $caseTitle= $this->input->post('caseTitle');
    $caseAddr1= $this->input->post('caseAddr1');
    $caseAddr2= $this->input->post('caseAddr2');
    $caseContent= $this->input->post('caseContent');
    $search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');
    
    $md_day = date("YmdHis");
		$uploads_dir = './uploads/';
    
    $up_save = ""; $up_org = "";
    $caseImg= $_FILES['caseImg'];

    $data = array(
      "PTT_IDX" => $PRO_IDX,
      "CST_TYPE" => $caseField,
      "CST_TITLE" => $caseTitle,
      "CST_CONTENT" => $caseContent,
      "CST_ADDR1_A" => $caseAddr1,
      "CST_ADDR2" => $caseAddr2,
      "CST_ADDR1_B" => $caseAddrB,
      "CST_LAT" => $caseLat,
      "CST_LON" => $caseLon,
      "CST_OPTION_A" => $caseOptionA,
      "CST_OPTION_B" => $caseOptionB,
      "CST_OPTION_C" => $caseOptionC,
      "CST_REG_DATE" => date("Y-m-d H:i:s")
    );
    
    if($caseImg["size"] > 0){ 
      $caseImg_ORGNAME = $caseImg["name"];
      $ext = explode('.',$caseImg_ORGNAME); 
      $ext = strtolower(array_pop($ext));
      $caseImg_SAVENAME = md5($md_day.$caseImg_ORGNAME).".".$ext;
      $UP_FILE = $uploads_dir.$caseImg_SAVENAME;
      if (move_uploaded_file($_FILES['caseImg']['tmp_name'], $UP_FILE)) {
        $up_save=$caseImg_SAVENAME;
        $up_org=$caseImg_ORGNAME;
      }else{
        echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
      }
    }
    if($up_save && $up_org){
      $data["CST_IMG_SAVE"]=$up_save;
      $data["CST_IMG_ORG"]=$up_org;
    }
    if($caseKey){
      $result = $this -> dao_model -> dbUpdate($caseKey,"CST_IDX","CASE_TB",$data,"","","");
    }else{
      $result = $this -> dao_model -> dbInsert("CASE_TB",$data,"","");
    }
    

		if($result){
      if($caseKey){
        return_submit('정상적으로 수정되었습니다.','/pro/constrCaseWrite?key='.$caseKey."&search=".$search."&pageNo=".$pageNo);
      }else{
        return_submit('정상적으로 등록되었습니다.','/pro/constrCase?search='.$search."&pageNo=".$pageNo);
      }
			
		}else{
      if($caseKey){
        return_back('정상적으로 수정되지않았습니다.');
      }else{
        return_back('정상적으로 등록되지않았습니다.');
      }
		}
  }
  public function caseDel() // 매물정보 업데이트
	{
    $key = $this->input->get('key');
    $search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "CST_DELETE_DATE" => date("Y-m-d")
    );
    
    $result = $this -> dao_model -> dbUpdate($key,"CST_IDX","CASE_TB",$data,"","","");

		if($result){
      return_submit('정상적으로 삭제되었습니다.','/pro/constrCase?search='.$search."&pageNo=".$pageNo);
		}else{
      return_back('정상적으로 삭제되지않았습니다.');
		}
  }
  public function caseDelAll() // 매물정보 업데이트
	{
    $key = $this->input->get('key');
    $key = explode(",", $key);
    $search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    for($i=0;$i<COUNT($key);$i++){
      $data = array(
        "CST_DELETE_DATE" => date("Y-m-d")
      );
      $result = $this -> dao_model -> dbUpdate($key[$i],"CST_IDX","CASE_TB",$data,"","","");
    }
    

		if($result){
      return_submit('정상적으로 삭제되었습니다.','/pro/constrCase?search='.$search."&pageNo=".$pageNo);
		}else{
      return_back('정상적으로 삭제되지않았습니다.');
		}
  }

  public function payMnt() // 매물정보 업데이트
	{
    $key = $this->input->post('key');
    $type = $this->input->post('type');
    $psDate = $this->input->post('psDate');
    $psCnt = $this->input->post('psCnt');
    $psMoney = $this->input->post('price');
    $payMethod = $this->input->post('payMethod');

    $NextDate = date("Ymd", strtotime("+".$psDate." day", strtotime(date("Y-m-d H:i:s"))));  
    $data = array(
      "USER_IDX" => $key,
      "PST_USER_TYPE" => $type,
      "PPT_CNT" => $psCnt,
      "PST_START" => date("Y-m-d H:i:s"),
      "PST_END" => $NextDate,
      "PST_MONEY" => $psMoney,
      "PST_REG_DATE" => date("Y-m-d H:i:s"),
      "PST_STATE" => "A",
      "PST_PAY_METHOD" => $payMethod
    );
    $result = $this -> dao_model -> dbInsert("PROP_SLOT_TB",$data,"","");
    

		if($result){
      return_submit('정상적으로 결제되었습니다.','/pro/storeList');
		}else{
      return_back('정상적으로 결제되지않았습니다.');
		}
  }
  public function bstInsert() // 매물정보 업데이트
	{
    $bkIdx = $this->input->post('bkIdx');
    $bstType = $this->input->post('bstType');
    $bstName = $this->input->post('bstName');
    $bstHp = $this->input->post('bstHp');

    $data = array(
      "BKT_IDX" => $bkIdx,
      "BST_TYPE" => $bstType,
      "BST_NAME" => encrypt($bstName),
      "BST_HP" => encrypt($bstHp),
      "BST_REG_DATE" => date("Y-m-d H:i:s")
    );
    $result = $this -> dao_model -> dbInsert("BROKER_SUB_TB",$data,"","");
    

		if($result){
      return_submit('정상적으로 등록되었습니다.','/pro/agents');
		}else{
      return_back('정상적으로 등록되지않았습니다.');
		}
  }
  public function bstDelete() // 매물정보 업데이트
	{
    $key = $this->input->get('key');

    $data = array(
      "BST_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($key,"BST_IDX","BROKER_SUB_TB",$data,"","","");
    

		if($result){
      return_submit('정상적으로 삭제되었습니다.','/pro/agents');
		}else{
      return_back('정상적으로 삭제되지않았습니다.');
		}
  }
  public function bstModify() // 매물정보 업데이트
	{
    $bstKey = $this->input->post('bstKey');
    $bktKey = $this->input->post('bktKey');
    $bstType = $this->input->post('bstType');
    $bstName = $this->input->post('bstName');
    $bstHp = $this->input->post('bstHp');

    $data = array(
      "BKT_IDX" => $bktKey,
      "BST_TYPE" => $bstType,
      "BST_NAME" => encrypt($bstName),
      "BST_HP" => encrypt($bstHp)
    );
    $result = $this -> dao_model -> dbUpdate($bstKey,"BST_IDX","BROKER_SUB_TB",$data,"","","");
    

		if($result){
      return_submit('정상적으로 변경되었습니다.','/pro/agents');
		}else{
      return_back('정상적으로 변경되지않았습니다.');
		}
  }

  public function qbsDel() // 매물정보 업데이트
	{
    $key = $this->input->get('key');
    $pageNo = $this->input->get('pageNo');
    
    $data = array(
      "QBT_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($key,"QBT_IDX","QNA_BK_TB",$data,"","","");
    

		if($result){
      return_submit('정상적으로 삭제 되었습니다.','/pro/prpIqMgmtA?pageNo='.$pageNo);
		}else{
      return_back('정상적으로 삭제 되지않았습니다.');
		}
  }
  public function bkQna() // 매물정보 업데이트
	{
    $bQnaIdx = $this->input->post('bQnaIdx');
    $userIdx = $this->input->post('userIdx');
    $bQnaName = $this->input->post('bQnaName');
    $bQnaTel = $this->input->post('bQnaTel');
    $results = $this -> table_model -> table_view("PROPERTY_TB","PPT",$bQnaIdx); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    $BST_IDX=0;
    if($results->BST_IDX){
      $BST_IDX=$results->BST_IDX;
    }else{
      $BST_IDX=0;
    }
    
    $data = array(
      "BKT_IDX" => $results->USER_IDX,
      "BST_IDX" => $BST_IDX,
      "MET_IDX" => $userIdx,
      "USER_TYPE" => $results->PPT_USER_TYPE,
      "PPT_IDX" => $bQnaIdx,
      "QBT_NAME" => encrypt($bQnaName),
      "QBT_TEL" => encrypt($bQnaTel),
      "QBT_REG_DATE" => date("Y-m-d H:i:s")
    );
    $result = $this -> dao_model -> dbInsert("QNA_BK_TB",$data,"","");
    

		if($result){
      $prop = $this -> table_model -> table_view("PROPERTY_TB","PPT",$bQnaIdx);
      include_once 'api/curl_token.php';
      $token_key = token_get();
      $MET_TEL = str_replace("-", "", $bQnaTel); 
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TI_0488',
				'sender'      => '07086338941',
				'receiver_1'  => $MET_TEL,
				'recvname_1'  => $bQnaName,
				'subject_1'   => '부동상 플랫폼 명당 매물문의',
				'message_1'   => '상가, 사무실은 명당!
매물 문의가 접수되었습니다.

등록하신 연락처로 담당 중개사님이 연락드릴 예정입니다.

[매물번호  M_'.date("Ymd", strtotime($prop->PPT_REG_DATE)).str_pad($prop->PPT_IDX, 3, "0", STR_PAD_LEFT).']
https://mydang.kr/main/search?PPT_IDX='.$prop->PPT_IDX.'&cur_lat='.$prop->PPT_LAT.'&cur_lon='.$prop->PPT_LON.'

[명당 고객센터]
070.8633.8942');
		 
			$oCurl = curl_init();
			curl_setopt($oCurl, CURLOPT_PORT, $_port);
			curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
			curl_setopt($oCurl, CURLOPT_POST, 1);
			curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

			$ret = curl_exec($oCurl);
			$error_msg = curl_error($oCurl);
			curl_close($oCurl);

      echo "1";
		}else{
      echo "0";
		}
  }

  public function ppMove() // 매물정보 업데이트
	{
    $bsKey = $this->input->get('bsKey');
    $pptIdx = $this->input->get('pptIdx');
    $state = $this->input->get('state');
    $pptIdx = explode(",", $pptIdx);

    for($i=0; $i<COUNT($pptIdx);$i++){
      $data = array(
        "BST_IDX" => $bsKey
      );
      $result = $this -> dao_model -> dbUpdate($pptIdx[$i],"PPT_IDX","PROPERTY_TB",$data,"","","");
    }

		if($result){
      return_submit('정상적으로 변경 되었습니다.','/pro/storeList?state='.state);
		}else{
      return_back('정상적으로 변경 되지않았습니다.');
		}
  }

  public function qptWirte() // 매물정보 업데이트
	{
    $pKey = $this->input->post('pKey');
    $mKey = $this->input->post('mKey');
    $optType = $this->input->post('optType');
    $optName = $this->input->post('optName');
    $optTel = $this->input->post('optTel');
    $optAddr1 = $this->input->post('optAddr1');
    $optAddr2 = $this->input->post('optAddr2');
    $optForm = $this->input->post('optForm');
    $optDate = $this->input->post('optDate');
    
    $data = array(
      "PTT_IDX" => $pKey,
      "MET_IDX" => $mKey,
      "QPT_NAME" => encrypt($optName),
      "QPT_TEL" => encrypt($optTel),
      "QPT_TYPE" => $optType,
      "QPT_ADDR1" => encrypt($optAddr1),
      "QPT_ADDR2" => encrypt($optAddr2),
      "QPT_FORM" => $optForm,
      "QPT_STATE" => "대기중",
      "QPT_DATE" => $optDate,
      "QPT_REG_DATE" => date("Y-m-d H:i:s")
    );
    $result = $this -> dao_model -> dbInsert("QNA_PN_TB",$data,"","");
    

		if($result){
      echo "1";
		}else{
      echo "0";
		}
  }

  public function qptDel() // 매물정보 업데이트
	{
    $key = $this->input->get('key');

      $data = array(
        "QPT_DELETE_DATE" => date("Y-m-d")
      );
      $result = $this -> dao_model -> dbUpdate($key,"QPT_IDX","QNA_PN_TB",$data,"","","");

		if($result){
      return_submit('정상적으로 삭제 되었습니다.','/pro/prpIqMgmtB');
		}else{
      return_back('정상적으로 삭제 되지않았습니다.');
		}
  }

  public function qptMove() // 매물정보 업데이트
	{
    $key = $this->input->post('key');
    $state = $this->input->post('state');
    $data = array(
      "QPT_STATE" =>  $state,
    );
    $result = $this -> dao_model -> dbUpdate($key,"QPT_IDX","QNA_PN_TB",$data,"","","");

		if($result){
      echo "1";
		}else{
      echo "0";
		}
  }

  public function qptTmove() // 매물정보 업데이트
	{
    $key = $this->input->post('key');
    $qptState = $this->input->post('qptState');
    $key = explode(",", $key);
    for($i=0; $i < COUNT($key); $i++){
      $data = array(
        "QPT_STATE" =>  $qptState,
      );
      $result = $this -> dao_model -> dbUpdate($key[$i],"QPT_IDX","QNA_PN_TB",$data,"","","");
    }

		if($result){
      echo "1";
		}else{
      echo "0";
		}
  }

  public function proMove() // 매물정보 업데이트
	{
    $state = $this->input->post('state');
    $slotKey = $this->input->post('slotKey');
    $pKey = $this->input->post('pKey');
    $pKey_array = explode(",", $pKey);

    $slot = $this->input->post('slot');
    $bkSub = $this->input->post('bkSub');
    $pState = $this->input->post('pState');
    for($i=0; $i<count($pKey_array); $i++){
      if($slot){
        $data['PST_IDX'] = $slot;
      }
      if($bkSub){
        $data['BST_IDX'] = $bkSub;
      }
      if($pState){
        $data['PPT_STATE'] = $pState;
      }
      $result = $this -> dao_model -> dbUpdate($pKey_array[$i],"PPT_IDX","PROPERTY_TB",$data,"","","");
    }

		if($result){
      return_submit('정상적으로 변경 되었습니다.','/pro/storeList?state='.$state.'&slotKey='.$slotKey);
		}else{
      return_back('정상적으로 변경 되지않았습니다.');
		}
  }
  public function slotTitleModify() // 매물정보 업데이트
	{
    $key = $this->input->get('key');
    $title = $this->input->get('title');

    $data['PST_TITLE'] = $title;
    $result = $this -> dao_model -> dbUpdate($key,"PST_IDX","PROP_SLOT_TB",$data,"","","");

		if($result){
      return_submit('정상적으로 변경 되었습니다.','/pro/advrt');
		}else{
      return_back('정상적으로 변경 되지않았습니다.');
		}
  }
}