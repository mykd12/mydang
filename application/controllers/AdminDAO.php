<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDAO extends CI_Controller {

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

	}

	public function user_write() // 일반유저 정보 수정
	{
		$MET_IDX= $this->input->post('MET_IDX');
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');
    $data = array(
      "MET_IDX" => $MET_IDX,
      "MET_PW" => encrypt($this->input->post('MET_PW1')),
      "MET_NAME" => encrypt($this->input->post('MET_NAME')),
      "MET_TEL" => encrypt($this->input->post('MET_TEL')),
      "MET_ADDR1" => encrypt($this->input->post('MET_ADDR1')),
      "MET_ADDR2" => encrypt($this->input->post('MET_ADDR2'))
    );
		$result = $this -> dao_model -> dbUpdate($MET_IDX,"MET_IDX","MEM_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 수정되 었습니다.','/admin/userWrite?MET_IDX='.$MET_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지 않았습니다.');
		}
	}

	public function user_delete() // 일반유저 정보삭제
	{
		
		$MET_IDX= $this->input->get('MET_IDX');
    $search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
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
		
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/user?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

	public function brkEmailCk() // 중개사 이메일 중복체크
	{
		$BKT_EMAIL= $this->input->post('BKT_EMAIL');
		$result = $this -> dao_model -> brkEmailCk(encrypt($BKT_EMAIL));
		if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}

	public function broker_write() // 중개사 정보 수정
	{
    $uploads_dir = './uploads/';
    $BKT_IDX= $this->input->post('BKT_IDX');
    $BKT_IMG_SAVE=""; $BKT_IMG_ORG="";
		$BKT_FILE_SAVE=""; $BKT_FILE_ORG="";

    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|pdf';
    $config['encrypt_name']  = TRUE;

    $BKT_IMG= $_FILES['BKT_IMG'];
    $this->load->library('upload', $config);
    if($BKT_IMG["size"] > 0){
      if ( ! $this->upload->do_upload("BKT_IMG"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $BKT_IMG_SAVE=$data['upload_data']['file_name'];
        $BKT_IMG_ORG=$data['upload_data']['orig_name'];
      }
    }
    $BKT_FILE= $_FILES['BKT_FILE'];
    if($BKT_FILE["size"] > 0){
      if ( ! $this->upload->do_upload("BKT_FILE"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $BKT_FILE_SAVE=$data['upload_data']['file_name'];
        $BKT_FILE_ORG=$data['upload_data']['orig_name'];
      }
    }

		$data = array(
      "BKT_COMPANY" => $this->input->post('BKT_COMPANY'),
      "BKT_EMAIL" => encrypt($this->input->post('BKT_EMAIL')),
      "BKT_PW" => encrypt($this->input->post('BKT_PW1')),
      "BKT_NAME" => encrypt($this->input->post('BKT_NAME')),
      "BKT_NUM" => encrypt($this->input->post('BKT_NUM')),
      "BKT_ADDR1" => encrypt($this->input->post('BKT_ADDR1')),
      "BKT_ADDR2" => encrypt($this->input->post('BKT_ADDR2')),
      "BKT_CEO" => encrypt($this->input->post('BKT_CEO')),
      "BKT_TEL" => encrypt($this->input->post('BKT_TEL')),
      "BKT_HP" => encrypt($this->input->post('BKT_HP')),
      "BKT_CORPORATE" => encrypt($this->input->post('BKT_CORPORATE')),
      "BKT_BUSINESS_NUMBER" => encrypt($this->input->post('BKT_BUSINESS_NUMBER')),
      "BKT_APP" => encrypt($this->input->post('BKT_APP'))
    );
    if($BKT_IMG_SAVE && $BKT_IMG_ORG){
      $data["BKT_IMG_SAVE"]=$BKT_IMG_SAVE;
      $data["BKT_IMG_ORG"]=$BKT_IMG_ORG;
    }
    if($BKT_FILE_SAVE && $BKT_FILE_ORG){
      $data["BKT_FILE_SAVE"]=$BKT_FILE_SAVE;
      $data["BKT_FILE_ORG"]=$BKT_FILE_ORG;
    }
    
		if($BKT_IDX){
			$result = $this -> dao_model -> dbUpdate($BKT_IDX,"BKT_IDX","BROKER_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
      $dataSb = array(
        "BST_NAME" => encrypt($this->input->post('BKT_NAME')),
        "BST_HP" => encrypt($this->input->post('BKT_HP'))
      );
      $resultSb = $this -> dao_model -> dbUpdate($BKT_IDX,"BKT_IDX","BROKER_SUB_TB",$dataSb,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["BKT_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("BROKER_TB",$data,"",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}

		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			if($BKT_IDX){
        if($BKT_IMG_SAVE && $BKT_IMG_ORG){
          $PRE_BKT_IMG_SAVE = $_FILES['BKT_IMG_SAVE'];
          unlink($uploads_dir.$PRE_BKT_IMG_SAVE);
        }
        if($BKT_FILE_SAVE && $BKT_FILE_ORG){
          $PRE_BKT_FILE_SAVE = $_FILES['BKT_FILE_SAVE'];
          unlink($uploads_dir.$PRE_BKT_FILE_SAVE);
        }
				return_submit('정상적으로 수정되었습니다.','/admin/brokerWrite?BKT_IDX='.$BKT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/broker?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($BKT_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}
  
	public function broker_delete() // 중개사 계정 삭제
	{
		$BKT_IDX= $this->input->get('BKT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "BKT_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($BKT_IDX,"BKT_IDX","BROKER_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataProperty = array(
      "PPT_DELETE_DATE" => date("Y-m-d")
    );
    $resultProperty = $this -> dao_model -> proPertyDel($BKT_IDX,"A",$dataProperty); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataCart = array(
      "CTT_DELETE_DATE" => date("Y-m-d")
    );
    $resultCart = $this -> dao_model -> cartDel($BKT_IDX,"prod",$dataCart); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataQna = array(
      "QBT_DELETE_DATE" => date("Y-m-d")
    );
    $resultQna = $this -> dao_model -> bkQnaDel($BKT_IDX,"A",$dataQna); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/broker?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function brokerMemWirte() // 보조 중개사 등록
	{
		$key= $this->input->post('key');
    $BST_IDX= $this->input->post('BST_IDX');
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');
    $BST_TYPE= $this->input->post('BST_TYPE');
    $BST_NAME= $this->input->post('BST_NAME');
    $BST_HP= $this->input->post('BST_HP');
    $data = array(
      "BKT_IDX" => $key,
      "BST_TYPE" => $BST_TYPE,
      "BST_NAME" => encrypt($BST_NAME),
      "BST_HP" => encrypt($BST_HP),
      "BST_REG_DATE" => date("Y-m-d H:i:s")
    );
    if($BST_IDX){
      $result = $this -> dao_model -> dbUpdate($BST_IDX,"BST_IDX","BROKER_SUB_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    }else{
      $result = $this -> dao_model -> dbInsert("BROKER_SUB_TB",$data,"","");
    }
    
		if($result){
      if($BST_IDX){
			  return_submit('정상적으로 수정되었습니다.','/admin/brokerMemerWrite?key='.$key.'&BST_IDX='.$BST_IDX.'&search='.$search."&pageNo=".$pageNo);
      }else{
        return_submit('정상적으로 등록되었습니다.','/admin/brokerMemer?key='.$key.'&search='.$search."&pageNo=".$pageNo);
      }
		}else{
      if($BST_IDX){
			return_back('정상적으로 수정되지않았습니다.');
    }else{
      return_back('정상적으로 등록되지않았습니다.');
    }
		}
	}
  public function brokerMemerDelete() // 중개사 계정 삭제
	{
    $key= $this->input->get('key');
		$BST_IDX= $this->input->get('BST_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "BST_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($BST_IDX,"BST_IDX","BROKER_SUB_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/brokerMemer?key='.$key.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function brokerPaymWirte() // 상품 등록
	{
		$key= $this->input->post('key');
    $PST_IDX= $this->input->post('PST_IDX');
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');
    $PPT_CNT= $this->input->post('PPT_CNT');
    $PST_START= $this->input->post('PST_START');
    $PST_END= $this->input->post('PST_END');
    $PST_MONEY= $this->input->post('PST_MONEY');
    $PST_PAY_METHOD= $this->input->post('PST_PAY_METHOD');
    $data = array(
      "USER_IDX" => $key,
      "PST_USER_TYPE" => "B",
      "PPT_CNT" => $PPT_CNT,
      "PST_START" => $PST_START,
      "PST_END" => $PST_END,
      "PST_MONEY" => $PST_MONEY,
      "PST_PAY_METHOD" => $PST_PAY_METHOD,
      "PST_REG_DATE" => date("Y-m-d H:i:s")
    );
    if($PST_IDX){
      $result = $this -> dao_model -> dbUpdate($PST_IDX,"PST_IDX","PROP_SLOT_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    }else{
      $result = $this -> dao_model -> dbInsert("PROP_SLOT_TB",$data,"","");
    }
    
		if($result){
      if($PST_IDX){
			  return_submit('정상적으로 수정되었습니다.','/admin/brokerPaymWrite?key='.$key.'&PST_IDX='.$PST_IDX.'&search='.$search."&pageNo=".$pageNo);
      }else{
        return_submit('정상적으로 등록되었습니다.','/admin/brokerPaym?key='.$key.'&search='.$search."&pageNo=".$pageNo);
      }
		}else{
      if($PST_IDX){
			return_back('정상적으로 수정되지않았습니다.');
    }else{
      return_back('정상적으로 등록되지않았습니다.');
    }
		}
	}

	public function partnerEmailCk() // 파트너사 이메일 중복체크
	{
		$PTT_EMAIL= $this->input->post('PTT_EMAIL');
		$result = $this -> dao_model -> partnerEmailCk(encrypt($PTT_EMAIL)); // 암호화 // 인자값(데이터)
		if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}

	public function partner_write() // 파트너사 정보 수정
	{
    $uploads_dir = './uploads/';
		$PTT_IDX= $this->input->post('PTT_IDX');

		$PTT_IMG_SAVE=""; $PTT_IMG_ORG="";
		$PTT_FILE_SAVE=""; $PTT_FILE_ORG="";

    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|pdf';
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);
    $PTT_IMG= $_FILES['PTT_IMG'];
    if($PTT_IMG["size"] > 0){
      if ( ! $this->upload->do_upload("PTT_IMG"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $PTT_IMG_SAVE=$data['upload_data']['file_name'];
        $PTT_IMG_ORG=$data['upload_data']['orig_name'];
      }
    }
    $PTT_FILE= $_FILES['PTT_FILE'];
    if($PTT_FILE["size"] > 0){
      if ( ! $this->upload->do_upload("PTT_FILE"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $PTT_FILE_SAVE=$data['upload_data']['file_name'];
        $PTT_FILE_ORG=$data['upload_data']['orig_name'];
      }
    }
    $PTT_IMG_PRE= $this->input->post('PTT_IMG_SAVE');
    $PTT_FILE_PRE= $this->input->post('PTT_FILE_SAVE');
    if($PTT_IMG_SAVE && $PTT_IMG_PRE){
      unlink($uploads_dir.$PTT_IMG_PRE);
    }
    if($PTT_FILE_SAVE && $PTT_FILE_PRE){
      unlink($uploads_dir.$PTT_FILE_PRE);
    }

    $data = array(
      "PTT_EMAIL" => encrypt($this->input->post('PTT_EMAIL')),
      "PTT_PW" => encrypt($this->input->post('PTT_PW1')),
      "PTT_NAME" => encrypt($this->input->post('PTT_NAME')),
      "PTT_NUM" => encrypt($this->input->post('PTT_NUM')),
      "PTT_ADDR1_A" => encrypt($this->input->post('PTT_ADDR1_A')),
      "PTT_ADDR2" => encrypt($this->input->post('PTT_ADDR2')),
      "PTT_ADDR1_B" => encrypt($this->input->post('PTT_ADDR1_B')),
      "PTT_AREA_A" => $this->input->post('PTT_AREA_A'),
      "PTT_AREA_A_CODE" => $this->input->post('PTT_AREA_A_CODE'),
      "PTT_AREA_B" => $this->input->post('PTT_AREA_B'),
      "PTT_AREA_B_CODE" => $this->input->post('PTT_AREA_B_CODE'),
      "PTT_AREA_C" => $this->input->post('PTT_AREA_C'),
      "PTT_AREA_C_CODE" => $this->input->post('PTT_AREA_C_CODE'),
      "PTT_LAT" => $this->input->post('PTT_LAT'),
      "PTT_LON" => $this->input->post('PTT_LON'),
      "PTT_CEO" => encrypt($this->input->post('PTT_CEO')),
      "PTT_TEL" => encrypt($this->input->post('PTT_TEL')),
      "PTT_HP" => encrypt($this->input->post('PTT_HP')),
      "PTT_TYPE" => $this->input->post('PTT_TYPE'),
      "PTT_AREA" => $this->input->post('PTT_AREA'),
      "PTT_CAREER" => $this->input->post('PTT_CAREER'),
      "PTT_TEXT" => $this->input->post('PTT_TEXT')
    );
    
    if($PTT_IMG_SAVE && $PTT_IMG_ORG){
      $data["PTT_IMG_SAVE"]=$PTT_IMG_SAVE;
      $data["PTT_IMG_ORG"]=$PTT_IMG_ORG;
    }
    if($PTT_FILE_SAVE && $PTT_FILE_ORG){
      $data["PTT_FILE_SAVE"]=$PTT_FILE_SAVE;
      $data["PTT_FILE_ORG"]=$PTT_FILE_ORG;
    }

    if($PTT_IDX){
			$result = $this -> dao_model -> dbUpdate($PTT_IDX,"PTT_IDX","PARTNER_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["PTT_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("PARTNER_TB",$data,"",""); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}

		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			if($PTT_IDX){
				return_submit('정상적으로 수정되었습니다.','/admin/partnerWrite?PTT_IDX='.$PTT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/partner?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($PTT_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}

	}

	public function partner_delete() // 파트너사 회원정보 삭제
	{
		$PTT_IDX= $this->input->get('PTT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

    $data = array(
      "PTT_DELETE_DATE" => date("Y-m-d")
    );
		$result = $this -> dao_model -> dbUpdate($PTT_IDX,"PTT_IDX","PARTNER_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataCase = array(
      "CST_DELETE_DATE" => date("Y-m-d")
    );
		$resultCase = $this -> dao_model -> dbUpdate($PTT_IDX,"PTT_IDX","CASE_TB",$dataCase,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataCart1 = array(
      "CTT_DELETE_DATE" => date("Y-m-d")
    );
    $resultCart1 = $this -> dao_model -> cartDel($PTT_IDX,"partner",$dataCart1); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataCart2 = array(
      "CTT_DELETE_DATE" => date("Y-m-d")
    );
    $resultCart2 = $this -> dao_model -> cartDel($PTT_IDX,"make",$dataCart2); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
    
    $dataQna = array(
      "CTT_DELETE_DATE" => date("Y-m-d")
    );
		$resultQna = $this -> dao_model -> dbUpdate($PTT_IDX,"PTT_IDX","QNA_PN_TB",$dataQna,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/partner?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

	public function case_write() // 시공사례 정보 업데이트
	{
    $uploads_dir ='./uploads/';
    $PTT_IDX= $this->input->post('PTT_IDX');
		$CST_IDX= $this->input->post('CST_IDX');
		$CST_IMG= $_FILES['CST_IMG'];
		$CST_IMG_PRE= $this->input->post('CST_IMG_SAVE');

		$CST_IMG_SAVE=""; $CST_IMG_ORG="";
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|pdf';
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if($CST_IMG["size"] > 0){
      if ( ! $this->upload->do_upload("CST_IMG"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $CST_IMG_SAVE=$data['upload_data']['file_name'];
        $CST_IMG_ORG=$data['upload_data']['orig_name'];
      }
    }
    
		if($CST_IMG_SAVE && $CST_IMG_PRE){
      unlink($uploads_dir.$CST_IMG_PRE);
    }
		$data = array(
      "PTT_IDX" => $PTT_IDX,
      "CST_IDX" => $CST_IDX,
      "CST_LAT" => $this->input->post('CST_LAT'),
      "CST_LON" => $this->input->post('CST_LON'),
      "CST_ADDR1_B" => $this->input->post('CST_ADDR1_B'),
      "CST_TYPE" => $this->input->post('CST_TYPE'),
      "CST_TITLE" => $this->input->post('CST_TITLE'),
      "CST_ADDR1_A" => $this->input->post('CST_ADDR1_A'),
      "CST_ADDR2" => $this->input->post('CST_ADDR2'),
      "CST_OPTION_A" => $this->input->post('CST_OPTION_A'),
      "CST_OPTION_B" => $this->input->post('CST_OPTION_B'),
      "CST_OPTION_C" => $this->input->post('CST_OPTION_C'),
      "CST_CONTENT" => $this->input->post('CST_CONTENT')
    );
    if($CST_IMG_SAVE && $CST_IMG_ORG){
      $data["CST_IMG_SAVE"]=$CST_IMG_SAVE;
      $data["CST_IMG_ORG"]=$CST_IMG_ORG;
    }

    if($CST_IDX){
			$result = $this -> dao_model -> dbUpdate($CST_IDX,"CST_IDX","CASE_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["CST_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("CASE_TB",$data,"",""); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			if($CST_IDX){
				return_submit('정상적으로 수정되었습니다.','/admin/partnerCaseWrite?CST_IDX='.$CST_IDX.'&PTT_IDX='.$PTT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/partnerCase?PTT_IDX='.$PTT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($CST_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}

	public function partnerCaseDelete() // 시공사례 정보삭제
	{
		$PTT_IDX= $this->input->get('PTT_IDX');
		$CST_IDX= $this->input->get('CST_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "CST_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($CST_IDX,"CST_IDX","CASE_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/partnerCase?PTT_IDX='.$PTT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

	public function news_write() // 소식 업데이트
	{
		$md_day = date("YmdHis");
		$uploads_dir = './uploads/';

		$NST_IDX= $this->input->post('NST_IDX');
		$NST_IMG= $_FILES['NST_IMG'];
		$NST_IMG_PRE= $this->input->post('NST_IMG_SAVE');
		$NST_IMG_SAVE=""; $NST_IMG_ORG="";
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|pdf';
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);
    if($NST_IMG["size"] > 0){
      if ( ! $this->upload->do_upload("NST_IMG"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $NST_IMG_SAVE=$data['upload_data']['file_name'];
        $NST_IMG_ORG=$data['upload_data']['orig_name'];
      }
    }
		
		if($NST_IMG_PRE && $NST_IMG_SAVE){
      unlink($uploads_dir.$NST_IMG_PRE);
    }

		$UPLOAD_FILE= $_FILES['UPLOAD_FILE'];
		$up_save=array();$up_org=array();$up_del=array();
		
		if($UPLOAD_FILE['size'][0] > 0){
			foreach($_FILES['UPLOAD_FILE']["error"] as $key => $error){
				$UPLOAD_FILE_ORGNAME = $UPLOAD_FILE["name"][$key];
				$ext = explode('.',$UPLOAD_FILE_ORGNAME); 
				$ext = strtolower(array_pop($ext));
				$UPLOAD_FILE_SAVENAME = md5($md_day.$UPLOAD_FILE_ORGNAME).".".$ext;
				$UP_FILE = $uploads_dir.$UPLOAD_FILE_SAVENAME;

				if (move_uploaded_file($_FILES['UPLOAD_FILE']['tmp_name'][$key], $UP_FILE)) {
					array_push($up_save, $UPLOAD_FILE_SAVENAME);
					array_push($up_org, $UPLOAD_FILE_ORGNAME);
				}else{
					echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
				}
			}
		}

		$UP_FILE_DEL= $this->input->post('UP_FILE_DEL');
		if($UP_FILE_DEL){
			$UP_FILE_SAVENAME= $this->input->post('UP_FILE_SAVENAME');
			for($i=0; $i< COUNT($UP_FILE_DEL); $i++){
				array_push($up_del, $UP_FILE_DEL[$i]);
				unlink($uploads_dir.$UP_FILE_SAVENAME[$i]);
			}
		}

    $data = array(
      "NST_TITLE" => $this->input->post('NST_TITLE'),
      "NST_CONTENT" => $this->input->post('NST_CONTENT')
    );
    if($NST_IMG_SAVE && $NST_IMG_ORG){
      $data["NST_IMG_SAVE"]=$NST_IMG_SAVE;
      $data["NST_IMG_ORG"]=$NST_IMG_ORG;
    }

    if($NST_IDX){
			$result = $this -> dao_model -> dbUpdate($NST_IDX,"NST_IDX","NEWS_TB",$data,$up_save,$up_org,$up_del); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["NST_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("NEWS_TB",$data,$up_save,$up_org); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			if($NST_IDX){
				return_submit('정상적으로 수정되었습니다.','/admin/newsWrite?NST_IDX='.$NST_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/news?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($NST_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}

	public function newsDelete() // 소식 정보삭제
	{
		$NST_IDX= $this->input->get('NST_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "NST_DELETE_DATE" => date("Y-m-d")
    );
		$result = $this -> dao_model -> dbUpdate($NST_IDX,"NST_IDX","NEWS_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/news?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

	public function notice_write() // 공지사항 정보업데이트
	{
		$uploads_dir = './uploads/';
    $md_day = date("YmdHis");

		$NOT_IDX= $this->input->post('NOT_IDX');

		$UPLOAD_FILE= $_FILES['UPLOAD_FILE'];
		$up_save=array();$up_org=array();$up_del=array();
		
		if($UPLOAD_FILE['size'][0] > 0){
			foreach($_FILES['UPLOAD_FILE']["error"] as $key => $error){
				$UPLOAD_FILE_ORGNAME = $UPLOAD_FILE["name"][$key];
				$ext = explode('.',$UPLOAD_FILE_ORGNAME); 
				$ext = strtolower(array_pop($ext));
				$UPLOAD_FILE_SAVENAME = md5($md_day.$UPLOAD_FILE_ORGNAME).".".$ext;
				$UP_FILE = $uploads_dir.$UPLOAD_FILE_SAVENAME;

				if (move_uploaded_file($_FILES['UPLOAD_FILE']['tmp_name'][$key], $UP_FILE)) {
					array_push($up_save, $UPLOAD_FILE_SAVENAME);
					array_push($up_org, $UPLOAD_FILE_ORGNAME);
				}else{
					echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
				}
			}
		}

		$UP_FILE_DEL= $this->input->post('UP_FILE_DEL');
		if($UP_FILE_DEL){
			$UP_FILE_SAVENAME= $this->input->post('UP_FILE_SAVENAME');
			for($i=0; $i< COUNT($UP_FILE_DEL); $i++){
				array_push($up_del, $UP_FILE_DEL[$i]);
				unlink($uploads_dir.$UP_FILE_SAVENAME[$i]);
			}
		}

    $data = array(
      "NOT_TITLE" => $this->input->post('NOT_TITLE'),
      "NOT_CONTENT" => $this->input->post('NOT_CONTENT')
    );

    if($NOT_IDX){
			$result = $this -> dao_model -> dbUpdate($NOT_IDX,"NOT_IDX","NOTICE_TB",$data,$up_save,$up_org,$up_del); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["NOT_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("NOTICE_TB",$data,$up_save,$up_org); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}
		
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			if($NOT_IDX){
				return_submit('정상적으로 수정되었습니다.','/admin/noticeWrite?NOT_IDX='.$NOT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/notice?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($NOT_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}

	public function noticeDelete() // 공지사항 정보삭제
	{
		$NOT_IDX= $this->input->get('NOT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "NOT_DELETE_DATE" => date("Y-m-d")
    );
		$result = $this -> dao_model -> dbUpdate($NOT_IDX,"NOT_IDX","NOTICE_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/notice?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

	public function faq_write() // FAQ 정보업데이트
	{
		$FAT_IDX= $this->input->post('FAT_IDX');

    $data = array(
      "FAT_QUESTION" => $this->input->post('FAT_QUESTION'),
      "FAT_ANSWER" => $this->input->post('FAT_ANSWER')
    );

    if($FAT_IDX){
			$result = $this -> dao_model -> dbUpdate($FAT_IDX,"FAT_IDX","FAQ_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["FAT_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("FAQ_TB",$data,"",""); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}
    
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			if($FAT_IDX){
				return_submit('정상적으로 수정되었습니다.','/admin/faqWrite?FAT_IDX='.$FAT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/faq?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($FAT_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}

	public function faqDelete() // FAQ 정보삭제
	{
		$FAT_IDX= $this->input->get('FAT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "FAT_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($FAT_IDX,"FAT_IDX","FAQ_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/faq?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

	public function qna_write() // 1:1 문의 답변 업데이트
	{
		$QNT_IDX= $this->input->post('QNT_IDX');
    $data = array(
      "QNT_ANSWER" => $this->input->post('QNT_ANSWER')
    );

		$result = $this -> dao_model -> dbUpdate($QNT_IDX,"QNT_IDX","QNA_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 답변이 저장되었습니다.','/admin/qnaView?QNT_IDX='.$QNT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 답변이 저장되지않았습니다.');
		}
	}

	public function qnaDelete() // 1:1 문의 정보 삭제
	{
		$QNT_IDX= $this->input->get('QNT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "QNT_DELETE_DATE" => date("Y-m-d")
    );
    $result = $this -> dao_model -> dbUpdate($QNT_IDX,"QNT_IDX","QNA_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/qna?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

	public function tip_write() // 창업팁 업데이트
	{
		$md_day = date("YmdHis");
		$uploads_dir = './uploads/';
    
		$TIT_IDX= $this->input->post('TIT_IDX');
		$TIT_IMG= $_FILES['TIT_IMG'];
		$TIT_IMG_PRE= $this->input->post('TIT_IMG_SAVE');
		$TIT_IMG_SAVE=""; $TIT_IMG_ORG="";

    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|pdf';
    $config['encrypt_name']  = TRUE;
    $this->load->library('upload', $config);

    if($TIT_IMG["size"] > 0){
      if ( ! $this->upload->do_upload("TIT_IMG"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $TIT_IMG_SAVE=$data['upload_data']['file_name'];
        $TIT_IMG_ORG=$data['upload_data']['orig_name'];
      }
    }
		
		if($TIT_IMG_PRE && $TIT_IMG_SAVE){
      unlink($uploads_dir.$TIT_IMG_PRE);
    }
    $data = array(
      "TIT_TYPE" => $this->input->post('TIT_TYPE'),
      "TIT_TITLE" => $this->input->post('TIT_TITLE'),
      "TIT_CONTENT" => $this->input->post('TIT_CONTENT')
    );

    if($TIT_IMG_SAVE && $TIT_IMG_ORG){
      $data["TIT_IMG_SAVE"]=$TIT_IMG_SAVE;
      $data["TIT_IMG_ORG"]=$TIT_IMG_ORG;
    }

    if($TIT_IDX){
			$result = $this -> dao_model -> dbUpdate($TIT_IDX,"TIT_IDX","TIP_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["TIT_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("TIP_TB",$data,"",""); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			if($TIT_IDX){
				return_submit('정상적으로 수정되었습니다.','/admin/tipWrite?TIT_IDX='.$TIT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/tip?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($TIT_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}

	public function tipDelete() // 창업팁 정보삭제
	{
		$TIT_IDX= $this->input->get('TIT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "TIT_DELETE_DATE" => date("Y-m-d")
    );
		$result = $this -> dao_model -> dbUpdate($TIT_IDX,"TIT_IDX","TIP_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/tip?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

	public function process_write() // 창업과정 업데이트
	{
		$md_day = date("YmdHis");
		$uploads_dir = './uploads/';

		$PRT_IDX= $this->input->post('PRT_IDX');
		$PRT_IMG= $_FILES['PRT_IMG'];
		$PRT_IMG_PRE= $this->input->post('PRT_IMG_PRE');
		$PRT_IMG_SAVE=""; $PRT_IMG_ORG="";
		
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|pdf';
    $config['encrypt_name']  = TRUE;
    $this->load->library('upload', $config);

    if($PRT_IMG["size"] > 0){
      if ( ! $this->upload->do_upload("PRT_IMG"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $PRT_IMG_SAVE=$data['upload_data']['file_name'];
        $PRT_IMG_ORG=$data['upload_data']['orig_name'];
      }
    }
		
		if($PRT_IMG_PRE && $PRT_IMG_SAVE){
      unlink($uploads_dir.$PRT_IMG_PRE);
    }

    $data = array(
      "PRT_TYPE" => $this->input->post('PRT_TYPE'),
      "PRT_TITLE" => $this->input->post('PRT_TITLE'),
      "PRT_CONTENT" => $this->input->post('PRT_CONTENT')
    );
    if($PRT_IMG_SAVE && $PRT_IMG_ORG){
      $data["PRT_IMG_SAVE"]=$PRT_IMG_SAVE;
      $data["PRT_IMG_ORG"]=$PRT_IMG_ORG;
    }
    if($PRT_IDX){
			$result = $this -> dao_model -> dbUpdate($PRT_IDX,"PRT_IDX","PROCESS_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["PRT_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("PROCESS_TB",$data,"",""); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			if($PRT_IDX){
				return_submit('정상적으로 수정되었습니다.','/admin/processWrite?PRT_IDX='.$PRT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/process?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($PRT_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}

	public function processDelete() // 창업과정 정보삭제
	{
		$PRT_IDX= $this->input->get('PRT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "PRT_DELETE_DATE" => date("Y-m-d")
    );
		$result = $this -> dao_model -> dbUpdate($PRT_IDX,"PRT_IDX","PROCESS_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/process?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function startNews_write()// 창업소식 정보업데이트
	{
		$md_day = date("YmdHis");
		$uploads_dir = './uploads/';

		$SNT_IDX= $this->input->post('SNT_IDX');
		$SNT_IMG= $_FILES['SNT_IMG'];
		$SNT_IMG_PRE= $this->input->post('SNT_IMG_PRE');
		$SNT_IMG_SAVE=""; $SNT_IMG_ORG="";
		
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|pdf';
    $config['encrypt_name']  = TRUE;
    $this->load->library('upload', $config);

    if($SNT_IMG["size"] > 0){
    if ( ! $this->upload->do_upload("SNT_IMG"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $SNT_IMG_SAVE=$data['upload_data']['file_name'];
        $SNT_IMG_ORG=$data['upload_data']['orig_name'];
      }
    }
		
		if($SNT_IMG_PRE && $SNT_IMG_SAVE){
      unlink($uploads_dir.$SNT_IMG_PRE);
    }
    
    $data = array(
      "SNT_TYPE" => $this->input->post('SNT_TYPE'),
      "SNT_TITLE" => $this->input->post('SNT_TITLE'),
      "SNT_CONTENT" => $this->input->post('SNT_CONTENT')
    );
    if($SNT_IMG_SAVE && $SNT_IMG_ORG){
      $data["SNT_IMG_SAVE"]=$SNT_IMG_SAVE;
      $data["SNT_IMG_ORG"]=$SNT_IMG_ORG;
    }

    if($SNT_IDX){
			$result = $this -> dao_model -> dbUpdate($SNT_IDX,"SNT_IDX","START_NEWS_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
      $data["SNT_REG_DATE"]=date("Y-m-d H:i:s");
			$result = $this -> dao_model -> dbInsert("START_NEWS_TB",$data,"",""); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}
		
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			if($SNT_IDX){
				return_submit('정상적으로 수정되었습니다.','/admin/startNewsWrite?SNT_IDX='.$SNT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/startNews?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($PRT_IDX){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}

  public function startNewsDelete() // 창업정보 삭제
	{
		$SNT_IDX= $this->input->get('SNT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
    $data = array(
      "SNT_DELETE_DATE" => date("Y-m-d")
    );
		$result = $this -> dao_model -> dbUpdate($SNT_IDX,"SNT_IDX","START_NEWS_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/startNews?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function property_write() // 매물정보 업데이트
	{
    $md_day = date("YmdHis");
		$uploads_dir = './uploads/';
    
    $PPT_IDX = $this->input->post('PPT_IDX');
    if ( is_array( $this->input->post('PPT_TYPE_A') ) ) { 
      $PPT_TYPE_A = implode("|", $this->input->post('PPT_TYPE_A'));
    }else{
      $PPT_TYPE_A = $this->input->post('PPT_TYPE_A');
    }
    $PPT_REPRES= $this->input->post('PPT_REPRES');
    $PIT_UP_REPRES= $this->input->post('PIT_UP_REPRES');
    $PIT_IDX= $this->input->post('PIT_IDX');
    $PIT_DEL= $this->input->post('PIT_DEL');

    if ( is_array( $this->input->post('PPT_OPTION_G') ) ) { 
      $PPT_OPTION_G = implode("|", $this->input->post('PPT_OPTION_G'));
    }else{
      $PPT_OPTION_G = $this->input->post('PPT_OPTION_G');
    }
    if ( is_array( $this->input->post('PPT_ALLOW_INDUSTRY') ) ) { 
      $PPT_ALLOW_INDUSTRY = implode("|", $this->input->post('PPT_ALLOW_INDUSTRY'));
    }else{
      $PPT_ALLOW_INDUSTRY = $this->input->post('PPT_OPTPPT_ALLOW_INDUSTRYION_G');
    }

    

    $up_save = array(); $up_org = array();
		$PPT_IMG= $_FILES['PPT_IMG'];
    
    foreach($_FILES['PPT_IMG']["error"] as $key => $error){
      if($PPT_IMG["size"][$key] > 0){ 
        $PPT_IMG_ORGNAME = $PPT_IMG["name"][$key];
				$ext = explode('.',$PPT_IMG_ORGNAME); 
				$ext = strtolower(array_pop($ext));
				$PPT_IMG_SAVENAME = md5($md_day.$PPT_IMG_ORGNAME).".".$ext;
				$UP_FILE = $uploads_dir.$PPT_IMG_SAVENAME;
				if (move_uploaded_file($_FILES['PPT_IMG']['tmp_name'][$key], $UP_FILE)) {
					array_push($up_save, $PPT_IMG_SAVENAME);
					array_push($up_org, $PPT_IMG_ORGNAME);
				}else{
					echo "<script>alert('정상적으로 업로드가 되지 않았습니다.'); history.go(-1);</script>";
				}
      }
    }
    if($this->input->post('PPT_USER_TYPE')=='A'){
      $bsResult = $this -> table_model -> bsSelect($this->input->post('USER_IDX'));
      $BST_IDX = $bsResult->BST_IDX;
    }else{
      $BST_IDX=NULL;
    }
    $pst = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$this->input->post('PST_IDX'));
    
    
    

    $data = array(
      "PPT_IDX" => $PPT_IDX,
      "PPT_LAT" => $this->input->post('PPT_LAT'),
      "PPT_LON" => $this->input->post('PPT_LON'),
      "PPT_ADDR1_B" => $this->input->post('PPT_ADDR1_B'),
      "PPT_AREA_A" => $this->input->post('PPT_AREA_A'),
      "PPT_AREA_B" => $this->input->post('PPT_AREA_B'),
      "PPT_AREA_C" => $this->input->post('PPT_AREA_C'),
      "PPT_AREA_A_CODE" => $this->input->post('PPT_AREA_A_CODE'),
      "PPT_AREA_B_CODE" => $this->input->post('PPT_AREA_B_CODE'),
      "PPT_AREA_C_CODE" => $this->input->post('PPT_AREA_C_CODE'),
      "PPT_AREA_D" => $this->input->post('PPT_AREA_D'),
      "PPT_TYPE_A" =>  $PPT_TYPE_A,
      "USER_IDX" => $this->input->post('USER_IDX'),
      "PPT_STATE" => $this->input->post('PPT_STATE'),
      "PPT_START_DATE" => $pst->PST_START,
      "PPT_END_DATE" => $pst->PST_END,
      "PPT_TYPE_B" => $this->input->post('PPT_TYPE_B'),
      "PPT_REGIST_NUMBER" => encrypt($this->input->post('PPT_REGIST_NUMBER')),
      "PPT_ADDR1_A" => encrypt($this->input->post('PPT_ADDR1_A')),
      "PPT_ADDR2" => encrypt($this->input->post('PPT_ADDR2')),
      "PPT_EXPOSURE" => $this->input->post('PPT_EXPOSURE'),
      "PPT_PRICE_A" => $this->input->post('PPT_PRICE_A'),
      "PPT_PRICE_B" => $this->input->post('PPT_PRICE_B'),
      "PPT_PRICE_C" => $this->input->post('PPT_PRICE_C'),
      "PPT_PRICE_C_ETC" => $this->input->post('PPT_PRICE_C_ETC'),
      "PPT_PRICE_D" => $this->input->post('PPT_PRICE_D'),
      "PPT_PRICE_D_ETC" => $this->input->post('PPT_PRICE_D_ETC'),
      "PPT_STOREYS_A" => $this->input->post('PPT_STOREYS_A'),
      "PPT_STOREYS_B" => $this->input->post('PPT_STOREYS_B'),
      "PPT_STOREYS_C" => $this->input->post('PPT_STOREYS_C'),
      "PPT_SIZE_A" => $this->input->post('PPT_SIZE_A'),
      "PPT_SIZE_B" => $this->input->post('PPT_SIZE_B'),
      "PPT_OPTION_A" => $this->input->post('PPT_OPTION_A'),
      "PPT_OPTION_B" => $this->input->post('PPT_OPTION_B'),
      "PPT_OPTION_C" => $this->input->post('PPT_OPTION_C'),
      "PPT_OPTION_D" => $this->input->post('PPT_OPTION_D'),
      "PPT_OPTION_E" => $this->input->post('PPT_OPTION_E'),
      "PPT_OPTION_F" => $this->input->post('PPT_OPTION_F'),
      "PPT_OPTION_G" => $PPT_OPTION_G,
      "PPT_ALLOW_INDUSTRY" => $PPT_ALLOW_INDUSTRY,
      "PPT_TITLE" => $this->input->post('PPT_TITLE'),
      "PPT_CONTENT" => $this->input->post('PPT_CONTENT'),
      "PST_IDX" => $this->input->post('PST_IDX'),
      "PPT_USER_TYPE" => $this->input->post('PPT_USER_TYPE'),
      'PPT_REG_DATE'  => date("Y-m-d H:i:s")
    );
    
		if($PPT_IDX){
			$result = $this -> dao_model -> propertyUpdate($PPT_IDX,$data,$up_save,$up_org,$PPT_REPRES,$PIT_UP_REPRES,$PIT_IDX,$PIT_DEL,$this->input->post('PPT_START_DATE'),$this->input->post('PPT_END_DATE'),""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		}else{
			$result = $this -> dao_model -> propertyInsert($data,$up_save,$up_org,$PPT_REPRES,$this->input->post('PPT_START_DATE'),$this->input->post('PPT_END_DATE'),"",""); // DB 추가 // 인자값(키테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명)
		}
    $CPT_MSG = $this->input->post('CPT_MSG');
    if($CPT_MSG){
      if(!$PPT_IDX){
        $PROPERTY = $this -> table_model -> tableLast("PROPERTY_TB","PPT");
        $PPT_IDX=$PROPERTY->PPT_IDX;
      }
      $dataCp = array(
        "USER_IDX" => $this->input->post('USER_IDX'),
        "USER_TYPE" => $this->input->post('PPT_USER_TYPE'),
        "PPT_IDX" => $PPT_IDX,
        "CPT_MSG" => $CPT_MSG,
        "CPT_REG_DATE" => date("Y-m-d H:i:s")
      );
      $resultCp = $this -> dao_model -> dbInsert("COMPANION_TB",$dataCp,"","");
    }
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			if($this->input->post('PPT_IDX')){
				return_submit('정상적으로 수정되었습니다.','/admin/propertyWrite?PPT_IDX='.$PPT_IDX.'&search='.$search."&pageNo=".$pageNo);
			}else{
				return_submit('정상적으로 등록되었습니다.','/admin/property?search='.$search."&pageNo=".$pageNo);
			}
		}else{
			if($this->input->post('PPT_IDX')){
				return_back('정상적으로 수정되지않았습니다.');
			}else{
				return_back('정상적으로 등록되지않았습니다.');
			}
		}
	}

  public function property_delete() // 창업정보 삭제
	{
		$PPT_IDX= $this->input->get('PPT_IDX');
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');
		$result = $this -> dao_model -> propertyDelete($PPT_IDX); // DB 삭제 // 인자값(키값)
		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/property?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}
  public function property_state() // 매물과정 업데이트
	{
		$PPT_IDX= $this->input->post('PPT_IDX');
		$PPT_STATE= $this->input->post('PPT_STATE');
		$result = $this -> dao_model -> propertyState($PPT_STATE,$PPT_IDX); // DB 업데이트 // 인자값(과정값, 키값)
		if($result){
			echo "yes";
		}else{
			echo "no";
		}
	}

  public function brokerApp() // 매물과정 업데이트
	{
		$BKT_APP= $this->input->post('BKT_APP');
		$BKT_IDX= $this->input->post('BKT_IDX');
    $data = array(
      "BKT_APP" => $BKT_APP
    );
    $result = $this -> dao_model -> dbUpdate($BKT_IDX,"BKT_IDX","BROKER_TB",$data,"","","");
		if($result){
      if($BKT_APP=='y'){
      $bkt = $this -> table_model -> table_view("BROKER_TB","BKT",$BKT_IDX);
      include_once 'api/curl_token.php';
      $token_key = token_get();
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TI_0492',
				'sender'      => '07086338941',
				'receiver_1'  => decrypt($bkt->BKT_HP),
				'recvname_1'  => decrypt($bkt->BKT_NAME),
				'subject_1'   => '부동상 플랫폼 명당 회원가입 검수 완료',
				'message_1'   => '상가, 사무실은 명당!
중개사 회원가입 검수가 완료 되었습니다.

서비스 많은 이용바라겠습니다.

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
      }
			echo "yes";
		}else{
			echo "no";
		}
	}

  public function dataAwrite() // 분석데이터 / 지역별 주거 인구수 업데이트
	{
    $DAT_IDX = $this->input->post('DAT_IDX');
    
    $data = array(
      "DAT_CNT_A" => $this->input->post('DAT_CNT_A'),
      "DAT_CNT_B" => $this->input->post('DAT_CNT_B'),
      "DAT_CNT_C" => $this->input->post('DAT_CNT_C'),
      "DAT_CNT_D" => $this->input->post('DAT_CNT_D'),
      "DAT_CNT_E" => $this->input->post('DAT_CNT_E'),
      "DAT_CNT_F" => $this->input->post('DAT_CNT_F')
    );
    $result = $this -> dao_model -> dbUpdate($DAT_IDX,"DAT_IDX","DATA_A_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/dataAwrite?DAT_IDX='.$DAT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}

  public function dataAdelete() // 분석데이터 / 지역별 주거 인구수 삭제
	{
    $DAT_IDX = $this->input->get('DAT_IDX');
    
    $data = array(
      "DAT_DELETE_DATE" => date("Y-m-d H:i:s")
    );
    $result = $this -> dao_model -> dbUpdate($DAT_IDX,"DAT_IDX","DATA_A_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/dataA?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function dataBwrite() // 분석데이터 / 지역별 유동 인구수 업데이트
	{
    $DBT_IDX = $this->input->post('DBT_IDX');
    
    $data = array(
      "DBT_CNT_A" => $this->input->post('DBT_CNT_A'),
      "DBT_CNT_B" => $this->input->post('DBT_CNT_B')
    );
    $result = $this -> dao_model -> dbUpdate($DBT_IDX,"DBT_IDX","DATA_B_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/dataBwrite?DBT_IDX='.$DBT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}

  public function dataBdelete() // 분석데이터 / 지역별 유동 인구수 삭제
	{
    $DBT_IDX = $this->input->get('DBT_IDX');
    
    $data = array(
      "DBT_DELETE_DATE" => date("Y-m-d H:i:s")
    );
    $result = $this -> dao_model -> dbUpdate($DBT_IDX,"DBT_IDX","DATA_B_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/dataB?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function dataCwrite() // 분석데이터 / 지역별 직장인 인구수 업데이트
	{
    $DCT_IDX = $this->input->post('DCT_IDX');
    
    $data = array(
      "DCT_CNT" => $this->input->post('DCT_CNT')
    );
    $result = $this -> dao_model -> dbUpdate($DCT_IDX,"DCT_IDX","DATA_C_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/dataCwrite?DCT_IDX='.$DCT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}

  public function dataCdelete() // 분석데이터 / 지역별 직장인 인구수 삭제
	{
    $DCT_IDX = $this->input->get('DCT_IDX');
    
    $data = array(
      "DCT_DELETE_DATE" => date("Y-m-d H:i:s")
    );

		$$result = $this -> dao_model -> dbUpdate($DCT_IDX,"DCT_IDX","DATA_C_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/dataC?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function dataDwrite() // 분석데이터 / 지역별 직장인 소득액 업데이트
	{
    $DDT_IDX = $this->input->post('DDT_IDX');
    
    $data = array(
      "DDT_CNT" => $this->input->post('DDT_CNT')
    );
    $result = $this -> dao_model -> dbUpdate($DDT_IDX,"DDT_IDX","DATA_D_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/dataDwrite?DDT_IDX='.$DDT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}

  public function dataDdelete() // 분석데이터 / 지역별 직장인 소득액 삭제
	{
    $DDT_IDX = $this->input->get('DDT_IDX');
    
    $data = array(
      "DDT_DELETE_DATE" => date("Y-m-d H:i:s")
    );
    $result = $this -> dao_model -> dbUpdate($DDT_IDX,"DDT_IDX","DATA_D_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/dataD?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function dataEwrite() // 분석데이터 / 지역별 지하철 승하차 인원 업데이트
	{
    $DET_IDX = $this->input->post('DET_IDX');
    
    $data = array(
      "DET_INSTITUTION" => $this->input->post('DET_INSTITUTION'),
      "DET_NUM" => $this->input->post('DET_NUM'),
      "DET_NAME" => $this->input->post('DET_NAME'),
      "DET_CNT" => $this->input->post('DET_CNT')
    );
    $result = $this -> dao_model -> dbUpdate($DE_IDX,"DET_IDX","DATA_E_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/dataEwrite?DET_IDX='.$DET_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}

  public function dataEdelete() // 분석데이터 / 지역별 지하철 승하차 인원 삭제
	{
    $DET_IDX = $this->input->get('DET_IDX');
    
    $data = array(
      "DET_DELETE_DATE" => date("Y-m-d H:i:s")
    );
    $result = $this -> dao_model -> dbUpdate($DE_IDX,"DET_IDX","DATA_E_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/dataE?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function dataFwrite() // 분석데이터 / 주요집객시설 업데이트
	{
    $DFT_IDX = $this->input->post('DFT_IDX');
    
    $data = array(
      "DFT_NAME" => $this->input->post('DFT_NAME'),
      "DFT_ADDR_A" => $this->input->post('DFT_ADDR_A'),
      "DFT_ADDR_B" => $this->input->post('DFT_ADDR_B'),
      "DFT_AREA_A" => $this->input->post('DFT_AREA_A'),
      "DFT_AREA_B" => $this->input->post('DFT_AREA_B'),
      "DFT_AREA_C" => $this->input->post('DFT_AREA_C'),
      "DFT_LAT" => $this->input->post('DFT_LAT'),
      "DFT_LON" => $this->input->post('DFT_LON')
    );

    $result = $this -> dao_model -> dbUpdate($DFT_IDX,"DFT_IDX","DATA_F_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/dataFwrite?DFT_IDX='.$DFT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}

  public function dataFdelete() // 분석데이터 / 주요집객시설 삭제
	{
    $DFT_IDX = $this->input->get('DFT_IDX');
    
    $data = array(
      "DFT_DELETE_DATE" => date("Y-m-d H:i:s")
    );
    $result = $this -> dao_model -> dbUpdate($DFT_IDX,"DFT_IDX","DATA_F_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/dataF?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function codeAwrite() // 코드관리 / 분류(대)코드 업데이트
	{
    $CAT_IDX = $this->input->post('CAT_IDX');
    
    $data = array(
      "CAT_CODE" => $this->input->post('CAT_CODE'),
      "CAT_NAME" => $this->input->post('CAT_NAME')
    );

    $result = $this -> dao_model -> dbUpdate($CAT_IDX,"CAT_IDX","CODE_A_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/codeAwrite?CAT_IDX='.$CAT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}

  public function codeAdelete() // 코드관리 / 분류(대)코드 삭제
	{
    $CAT_IDX = $this->input->get('CAT_IDX');
    
    $data = array(
      "CAT_DELETE_DATE" => date("Y-m-d")
    );

    $result = $this -> dao_model -> dbUpdate($CAT_IDX,"CAT_IDX","CODE_A_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/codeA?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}

  public function codeBwrite() // 코드관리 / 분류(중)코드 업데이트
	{
    $CBT_IDX = $this->input->post('CBT_IDX');
    
    $data = array(
      "CBT_CODE" => $this->input->post('CBT_CODE'),
      "CBT_NAME" => $this->input->post('CBT_NAME')
    );

    $result = $this -> dao_model -> dbUpdate($CBT_IDX,"CBT_IDX","CODE_B_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/codeBwrite?CBT_IDX='.$CBT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}

  public function codeBdelete() // 코드관리 / 분류(중)코드 삭제
	{
    $CBT_IDX = $this->input->get('CBT_IDX');
    
    $data = array(
      "CBT_DELETE_DATE" => date("Y-m-d")
    );

    $result = $this -> dao_model -> dbUpdate($CBT_IDX,"CBT_IDX","CODE_B_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/codeB?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}
  public function codeCwrite() // 코드관리 / 분류(소)코드 업데이트
	{
    $CCT_IDX = $this->input->post('CCT_IDX');
    
    $data = array(
      "CCT_CODE" => $this->input->post('CCT_CODE'),
      "CCT_NAME" => $this->input->post('CCT_NAME')
    );

    $result = $this -> dao_model -> dbUpdate($CCT_IDX,"CCT_IDX","CODE_C_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/codeCwrite?CCT_IDX='.$CCT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}
  public function codeCdelete() // 코드관리 / 분류(소)코드 삭제
	{
    $CCT_IDX = $this->input->get('CCT_IDX');
    
    $data = array(
      "CCT_DELETE_DATE" => date("Y-m-d")
    );

    $result = $this -> dao_model -> dbUpdate($CCT_IDX,"CCT_IDX","CODE_C_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/codeC?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}
  public function codeDwrite() // 코드관리 / 지역코드(시/도) 업데이트
	{
    $CDT_IDX = $this->input->post('CDT_IDX');
    
    $data = array(
      "CDT_CODE" => $this->input->post('CDT_CODE'),
      "CDT_AREA" => $this->input->post('CDT_AREA')
    );

    $result = $this -> dao_model -> dbUpdate($CDT_IDX,"CDT_IDX","CODE_D_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/codeDwrite?CDT_IDX='.$CDT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}
  public function codeDdelete() // 코드관리 / 지역코드(시/도) 삭제
	{
    $CDT_IDX = $this->input->get('CDT_IDX');
    
    $data = array(
      "CDT_DELETE_DATE" => date("Y-m-d")
    );

    $result = $this -> dao_model -> dbUpdate($CDT_IDX,"CDT_IDX","CODE_D_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/codeD?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}
  public function codeEwrite() // 코드관리 / 지역코드(구/군) 업데이트
  {
    $CET_IDX = $this->input->post('CET_IDX');
    
    $data = array(
      "CET_CODE" => $this->input->post('CET_CODE'),
      "CET_AREA" => $this->input->post('CET_AREA')
    );

    $result = $this -> dao_model -> dbUpdate($CET_IDX,"CET_IDX","CODE_E_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/codeEwrite?CET_IDX='.$CET_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}
  public function codeEdelete() // 코드관리 / 지역코드(구/군) 삭제
	{
    $CET_IDX = $this->input->get('CET_IDX');
    
    $data = array(
      "CET_DELETE_DATE" => date("Y-m-d")
    );

    $result = $this -> dao_model -> dbUpdate($CET_IDX,"CET_IDX","CODE_E_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/codeE?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}
  public function codeFwrite() // 코드관리 / 지역코드(동/면/리) 업데이트
	{
    $CFT_IDX = $this->input->post('CFT_IDX');
    
    $data = array(
      "CFT_CODE" => $this->input->post('CFT_CODE'),
      "CFT_AREA_C" => $this->input->post('CFT_AREA_C')
    );

    $result = $this -> dao_model -> dbUpdate($CFT_IDX,"CFT_IDX","CODE_F_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/codeFwrite?CFT_IDX='.$CFT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}
  public function codeFdelete() // 코드관리 / 지역코드(동/면/리) 삭제
	{
    $CFT_IDX = $this->input->get('CFT_IDX');
    
    $data = array(
      "CFT_DELETE_DATE" => date("Y-m-d")
    );

    $result = $this -> dao_model -> dbUpdate($CFT_IDX,"CFT_IDX","CODE_F_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/codeF?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}
  public function dataHdelete() // 분석데이터관리 / 지하철 기본정보 관리 삭제
	{
    $DHT_IDX = $this->input->get('DHT_IDX');
    
    $data = array(
      "DHT_DELETE_DATE" => date("Y-m-d")
    );

    $result = $this -> dao_model -> dbUpdate($DHT_IDX,"DHT_IDX","DATA_H_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->get('search');
		$pageNo= $this->input->get('pageNo');

		if($result){
			return_submit('정상적으로 삭제되었습니다.','/admin/dataH?search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 삭제되지않았습니다.');
		}
	}
  public function dataHwrite() // 분석데이터관리 / 지하철 기본정보 업데이트
	{
    $DHT_IDX = $this->input->post('DHT_IDX');
    
    $data = array(
      "DHT_ADDR" => $this->input->post('DHT_ADDR'),
      "DHT_LON" => $this->input->post('DHT_LON'),
      "DHT_LAT" => $this->input->post('DHT_LAT')
    );

    $result = $this -> dao_model -> dbUpdate($DHT_IDX,"DHT_IDX","DATA_H_TB",$data,"","",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)
		$search= $this->input->post('search');
		$pageNo= $this->input->post('pageNo');

		if($result){
			return_submit('정상적으로 수정되었습니다.','/admin/dataHwrite?DHT_IDX='.$DHT_IDX.'&search='.$search."&pageNo=".$pageNo);
		}else{
			return_back('정상적으로 수정되지않았습니다.');
		}
	}
  public function pmtDelete() // 결제 취소 환불
	{
    include_once 'Get.php';
    $PMT_IDX = $this->input->get('PMT_IDX');
    $PST_IDX = $this->input->get('PST_IDX');
    $resultsPm = $this -> table_model -> table_view("PAYMENT_TB","PMT",$PMT_IDX);
    $resultsPs = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$PST_IDX);

    header("Content-Type: text/html; charset=utf-8"); 

    //step1. 요청을 위한 파라미터 설정

    $key = "6hlagSHHOVSz2KGf";  // INIpayTest 의 INIAPI key
    $type = "Refund";
    $paymethod = $resultsPm->PMT_MEANS;
    $timestamp = date("YmdHis");
    $clientIp = "183.111.174.123";
    $mid = "mydangkr00";
    $tid = $resultsPm->PMT_NUMBER1; // 40byte 승인 TID 입력
    $msg = "거래취소요청";
    
    $hashData = hash("sha512",$key.$type.$paymethod.$timestamp.$clientIp.$mid.$tid); // hash 암호화


    //step2. key=value 로 post 요청

    $data = array(
        'type' => $type,
        'paymethod' => $paymethod,
        'timestamp' => $timestamp,
        'clientIp' => $clientIp,
        'mid' => $mid,
        'tid' => $tid,
        'msg' => $msg,
        'hashData' => $hashData
        );

    $url ="https://iniapi.inicis.com/api/v1/refund";  // 전송 URL

    $ch = curl_init();                                                   //curl 초기화
    curl_setopt($ch, CURLOPT_URL, $url);                        // 전송 URL 지정하기
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     //요청 결과를 문자열로 반환 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));       //POST data
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8')); // 전송헤더 설정
    curl_setopt($ch, CURLOPT_POST, 1);                          // post 전송 
    
    $response = curl_exec($ch);
    $response = json_encode($response);
    $obj = json_decode($response, true);
    $obj = str_replace("\"", "", $obj);
    $obj = str_replace("{", "", $obj);
    $obj = str_replace("}", "", $obj);
    $obj = explode(",", $obj);
    $result = explode(":", $obj[0]);

    if($result[1]=="00"){
      //승인
      $dataPm = array(
        "PMT_STATE" => "C",
        "PMT_REFUND_STATE" => "전액환불",
        "PMT_REFUND" => $resultsPm->PMT_MONEY,
        "PMT_REFUND_DATE" => date("Y-m-d H:i:s")
      );
      $resultPm = $this -> dao_model -> dbUpdate($PMT_IDX,"PMT_IDX","PAYMENT_TB",$dataPm,"","","");

      $date = date("Y-m-d"); 
      $update = date("Y-m-d", strtotime("+1 day", strtotime($date)));  

      $dataPs = array(
        "PST_STATE" => "C",
        "PST_END" => $update
      );
      $resultPs = $this -> dao_model -> dbUpdate($PST_IDX,"PST_IDX","PROP_SLOT_TB",$dataPs,"","","");

      $dataPp = array(
        "PPT_END_DATE" => $update
      );
      $resultPp = $this -> dao_model -> dbUpdate($PST_IDX,"PST_IDX","PROPERTY_TB",$dataPp,"","","");

      if($resultPm && $resultPs){
        echo "<script>alert('정상처리 되었습니다.');location.href='/admin/paymentList?pageNo=".$pageNo."&search=".$search."';</script>";
      }
    }else{
      $resultMsg = explode(":", $obj[1]);
      echo "error - ".$resultMsg[1];
    }
	}

	public function pmtPartialDelete() // 결제 취소 환불
	{
    
		$pageNo = $this->input->post('pageNo');
		$search = $this->input->post('search');
    $PMT_IDX = $this->input->post('PMT_IDX');
    $PST_IDX = $this->input->post('PST_IDX');
		$PST_END = $this->input->post('PST_END');
		$PMT_REFUND = $this->input->post('PMT_REFUND');
    $PMT_MEANS = $this->input->post('PMT_MEANS');
    $resultsPm = $this -> table_model -> table_view("PAYMENT_TB","PMT",$PMT_IDX);
    $resultsPs = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$PST_IDX);

    header("Content-Type: text/html; charset=utf-8"); 

    //step1. 요청을 위한 파라미터 설정

    $key = "6hlagSHHOVSz2KGf";  // INIpayTest 의 INIAPI key
    $iv = "y5CeQu1d7YUB3f==";  // INIpayTest 의 INIAPI key
    $type = "PartialRefund";
    
    $timestamp = date("YmdHis");
    $clientIp = "183.111.174.123";
    $mid = "mydangkr00";
    
    $msg = "부분취소요청";
		$price = $PMT_REFUND;
		$confirmPrice = (int)$resultsPm->PMT_MONEY-(int)$PMT_REFUND;
    
        //step2. key=value 로 post 요청
    if($PMT_MEANS=='VBank'){
      if($confirmPrice==0){
        $msg = "전액취소";
        $type = "Refund";
        $refundAcctNum = $this->input->post('refundAcctNum');
        $refundBankCode = $this->input->post('refundBankCode');
        $refundAcctName = $this->input->post('refundAcctName');
        $ACT_TID = $this->input->post('ACT_TID');
        $ACT_OID = $this->input->post('ACT_OID');
        $tid = $ACT_TID;

      $endata = @openssl_encrypt($refundAcctNum , "aes-128-cbc", $key, true, $iv);
      $endata = base64_encode($endata);

      $paymethod="Vacct";
      $hashData = hash("sha512",$key.$type.$paymethod.$timestamp.$clientIp.$mid.$tid.$endata); // hash 암호화
      //echo $key."/".$type."/".$paymethod."/".$timestamp."/".$clientIp."/".$mid."/".$tid."/".$endata;
      $data = array(
        'type' => $type,
        'paymethod' => $paymethod,
        'timestamp' => $timestamp,
        'clientIp' => $clientIp,
        'mid' => $mid,
        'tid' => $tid,
        'msg' => $msg,
        'refundAcctNum' => $endata,
        'refundBankCode' => $refundBankCode,
        'refundAcctName' => $refundAcctName,
        'hashData' => $hashData
        );

      }else{
      $refundAcctNum = $this->input->post('refundAcctNum');
      $refundBankCode = $this->input->post('refundBankCode');
      $refundAcctName = $this->input->post('refundAcctName');
      $ACT_TID = $this->input->post('ACT_TID');
      $ACT_OID = $this->input->post('ACT_OID');
      $tid = $ACT_TID;

      $endata = @openssl_encrypt($refundAcctNum , "aes-128-cbc", $key, true, $iv);
      $endata = base64_encode($endata);

      $paymethod="Vacct";
      $hashData = hash("sha512",$key.$type.$paymethod.$timestamp.$clientIp.$mid.$tid.$price.$confirmPrice.$endata); // hash 암호화
      $data = array(
        'type' => $type,
        'paymethod' => $paymethod,
        'timestamp' => $timestamp,
        'clientIp' => $clientIp,
        'mid' => $mid,
        'tid' => $tid,
        'msg' => $msg,
				'price' => $price,
				'confirmPrice' => $confirmPrice,
        'refundAcctNum' => $endata,
        'refundBankCode' => $refundBankCode,
        'refundAcctName' => $refundAcctName,
        'hashData' => $hashData
        );
      }
    }else{
      $paymethod = $resultsPm->PMT_MEANS;
      $tid = $resultsPm->PMT_NUMBER1; // 40byte 승인 TID 입력
      $hashData = hash("sha512",$key.$type.$paymethod.$timestamp.$clientIp.$mid.$tid.$price.$confirmPrice); // hash 암호화
      $data = array(
        'type' => $type,
        'paymethod' => $paymethod,
        'timestamp' => $timestamp,
        'clientIp' => $clientIp,
        'mid' => $mid,
        'tid' => $tid,
        'msg' => $msg,
				'price' => $price,
				'confirmPrice' => $confirmPrice,
        'hashData' => $hashData
        );
    }
    

    $url ="https://iniapi.inicis.com/api/v1/refund";  // 전송 URL

    $ch = curl_init();                                                   //curl 초기화
    curl_setopt($ch, CURLOPT_URL, $url);                        // 전송 URL 지정하기
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     //요청 결과를 문자열로 반환 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));       //POST data
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8')); // 전송헤더 설정
    curl_setopt($ch, CURLOPT_POST, 1);                          // post 전송 
    
    $response = curl_exec($ch);
    $response = json_encode($response);
    $obj = json_decode($response, true);
    $obj = str_replace("\"", "", $obj);
    $obj = str_replace("{", "", $obj);
    $obj = str_replace("}", "", $obj);
    $obj = explode(",", $obj);
    $result = explode(":", $obj[0]);

    if($result[1]=="00"){
      //승인
      $dataPm = array(
        "PMT_STATE" => "C",
        "PMT_REFUND_STATE" => "환불",
        "PMT_REFUND" => $price,
        "PMT_REFUND_DATE" => date("Y-m-d H:i:s")
      );
      if($PMT_MEANS=='VBank'){
        $dataPm['PMT_REFUND_NUM']=$refundAcctNum;
        $dataPm['PMT_REFUND_CODE']=$refundBankCode;
        $dataPm['PMT_REFUND_NAME']=$refundAcctName;
      }
      $resultPm = $this -> dao_model -> dbUpdate($PMT_IDX,"PMT_IDX","PAYMENT_TB",$dataPm,"","","");

      $dataPs = array(
        "PST_STATE" => "C",
        "PST_END" => $PST_END
      );
      $resultPs = $this -> dao_model -> dbUpdate($PST_IDX,"PST_IDX","PROP_SLOT_TB",$dataPs,"","","");

      $dataPp = array(
        "PPT_END_DATE" => $PST_END
      );
      $resultPp = $this -> dao_model -> dbUpdate($PST_IDX,"PST_IDX","PROPERTY_TB",$dataPp,"","","");

      if($resultPm && $resultPs){
        echo "<script>alert('정상처리 되었습니다.');location.href='/admin/paymentList?pageNo=".$pageNo."&search=".$search."';</script>";
      }
    }else{
      $resultMsg = explode(":", $obj[1]);
      echo "error - ".$resultMsg[1]." / code - ".$result[1];
    }
	}

  public function userPayAdd() // 슬롯추가
	{
    $key = $this->input->post('key');
    
    $data = array(
      "USER_IDX" => $this->input->post('key'),
      "PST_USER_TYPE" => "B",
      "PPT_CNT" => $this->input->post('PPT_CNT'),
      "PST_START" => $this->input->post('PST_START'),
      "PST_END" => $this->input->post('PST_END'),
      "PST_MONEY" => "0",
      "PST_MSG" => "관리자 추가",
      "PST_REG_DATE" => date("Y-m-d H:i:s"),
      "PST_STATE" => "A",
      "PST_PAY_METHOD" => "ETC"
    );

    $result = $this -> dao_model -> dbInsert("PROP_SLOT_TB",$data,"",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		if($result){
			return_submit('정상적으로 등록되었습니다.','/admin/userPayList?key='.$key);
		}else{
			return_back('정상적으로 등록되지않았습니다.');
		}
	}

  public function brokerPayAdd() // 슬롯추가
	{
    $key = $this->input->post('key');
    
    $data = array(
      "USER_IDX" => $this->input->post('key'),
      "PST_USER_TYPE" => "A",
      "PPT_CNT" => $this->input->post('PPT_CNT'),
      "PST_START" => $this->input->post('PST_START'),
      "PST_END" => $this->input->post('PST_END'),
      "PST_MONEY" => "0",
      "PST_MSG" => "관리자 추가",
      "PST_REG_DATE" => date("Y-m-d H:i:s"),
      "PST_STATE" => "A",
      "PST_PAY_METHOD" => "ETC"
    );

    $result = $this -> dao_model -> dbInsert("PROP_SLOT_TB",$data,"",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

		if($result){
			return_submit('정상적으로 등록되었습니다.','/admin/brokerPaym?key='.$key);
		}else{
			return_back('정상적으로 등록되지않았습니다.');
		}
	}

  public function comPanMsg() // 반려사유 등록
	{
    $pageNo = $this->input->post('pageNo');
    $search = $this->input->post('search');
    $pKey = $this->input->post('pKey');
    $userKey = $this->input->post('userKey');
    $userType = $this->input->post('userType');
    $CPT_MSG = $this->input->post('CPT_MSG');
    
    $data = array(
      "USER_IDX" => $userKey,
      "USER_TYPE" => $userType,
      "PPT_IDX" => $pKey,
      "CPT_MSG" => $CPT_MSG,
      "CPT_REG_DATE" => date("Y-m-d H:i:s")
    );

    $result = $this -> dao_model -> dbInsert("COMPANION_TB",$data,"",""); // DB 업데이트 // 인자값(키값,키 TYPE, 테이블명, 업데이트데이터, 첨부저장파일명, 첨부원본명, 첨부삭제데이터)

    $dataPp = array(
      "PPT_STATE" => 'B'
    );
    $resultPp = $this -> dao_model -> dbUpdate($pKey,"PPT_IDX","PROPERTY_TB",$dataPp,"","","");


		if($result && $resultPp){
			return_submit('정상적으로 등록되었습니다.','/admin/property?pageNo='.$pageNo.'&search='.$search);
		}else{
			return_back('정상적으로 등록되지않았습니다.');
		}
	}
  function paymentModify() // 반려사유 등록
	{
    $pageNo = $this->input->post('pageNo');
    $search = $this->input->post('search');
    $PMT_IDX = $this->input->post('PMT_IDX');
    $START_DATE = $this->input->post('START_DATE');
    $END_DATE = $this->input->post('END_DATE');
    $PMT_DAY = $this->input->post('PMT_DAY');
    $PMT_DAY = explode(" ", $PMT_DAY);
    $results = $this -> table_model -> table_view("PAYMENT_TB","PMT",$PMT_IDX);
    
    $dataSl = array(
      "PST_START" => $START_DATE,
      "PST_END" => $END_DATE,
      "PST_DAY" => $PMT_DAY[0]
    );

    $resultSl = $this -> dao_model -> dbUpdate($results->PST_IDX,"PST_IDX","PROP_SLOT_TB",$dataSl,"","","");


		if($resultSl){
			return_submit('정상적으로 변경되었습니다.','/admin/payment?PMT_IDX='.$PMT_IDX.'&pageNo='.$pageNo.'&search='.$search);
		}else{
			return_back('정상적으로 변경되지않았습니다.');
		}
	}
}