<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dao_model extends CI_Model{
 
    function __construct(){
        parent::__construct();
        $this -> load -> helper("privatehash");
    }
    
    function dbUpdate($key,$type,$table,$data,$up_save,$up_org,$up_del){ // db 업데이트 / 인자값(키값,type,테이블명,데이터,첨부저장파일이름, 첨부원본파일 이름, 첨부삭제리스트)
      $this->db->where($type, $key);
			$results = $this->db->update($table, $data);
      if($table=='NEWS_TB' || $table=='NOTICE_TB'){
        if($table=='NEWS_TB'){
          $type="news";
        }else if($table=='NOTICE_TB'){
          $type="notice";
        }
        if($up_save && count($up_save) > 0){
          for($i = 0; $i < count($up_save); $i++){
            $dataUp = array(
              'UP_TABLE_IDX' => $key,
              'UP_TABLE_TYPE'  => $type,
              'UP_FILE_ORGNAME' => $up_org[$i],
              'UP_FILE_SAVENAME' => $up_save[$i],
              'UP_REG_DATE'  => date("Y-m-d")
            );
            $resultsUp = $this->db->insert('UP_FILE', $dataUp);
          }
        }
        if($up_del && count($up_del) > 0){
          for($i = 0; $i < count($up_del); $i++){
            $dataUpDel = array(
              'UP_DELETE_DATE'  => date("Y-m-d")
            );
            $this->db->where('UP_IDX', $up_del[$i]);
            $resultsUpDel = $this->db->update('UP_FILE', $dataUpDel);
          }
        }
      }
      if ($results)  { 
				return true; 
			}  else  { 
				return false; 
			}
    }

    function dbInsert($table,$data,$up_save,$up_org){ // db 추가 / 인자값(테이블명, 데이터, 첨부저장파일이름, 첨부원본파일이름)
			$results = $this->db->insert($table, $data);
      if($table=='NEWS_TB' || $table=='NOTICE_TB'){
        if($table=='NEWS_TB'){
          $type="news";
        }else if($table=='NOTICE_TB'){
          $type="notice";
        }
        $key = $this->db->insert_id();
        if($up_save && count($up_save) > 0){
          for($i = 0; $i < count($up_save); $i++){
            $dataUp = array(
              'UP_TABLE_IDX' => $key,
              'UP_TABLE_TYPE'  => $type,
              'UP_FILE_ORGNAME' => $up_org[$i],
              'UP_FILE_SAVENAME' => $up_save[$i],
              'UP_REG_DATE'  => date("Y-m-d")
            );
            $resultsUp = $this->db->insert('UP_FILE', $dataUp);
          }
        }
      }else if($table=='BROKER_TB'){
        $key = $this->db->insert_id();
          $dataSb = array(
            'BKT_IDX' => $key,
            'BST_TYPE'  => "대표",
            'BST_NAME' => $data['BKT_NAME'],
            'BST_HP' => $data['BKT_HP'],
            'BST_REG_DATE'  => date("Y-m-d H:i:s")
          );
          $resultsSb = $this->db->insert('BROKER_SUB_TB', $dataSb);
      }
      if ($results)  { 
				return true; 
			}  else  { 
				return false; 
			}
    }

		function brkEmailCk($email){ // 중개사 이메일 중복체크

			$query = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_EMAIL='".$email."' AND BKT_DELETE_DATE IS NULL ORDER BY BKT_IDX DESC ");

			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    }

		function partnerEmailCk($email){ // 파트너사 이메일 중복체크

			$query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_EMAIL='".$email."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC ");

			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    }

    function propertyInsert($data,$up_org,$up_save,$PIT_REPRES,$PST_START,$PST_END,$key,$state){ // db추가 / 매물 추가 
      $results = $this->db->insert('PROPERTY_TB', $data);
      $PPT_IDX = $this->db->insert_id();
			
			if(count($up_save) > 0){
				for($i = 0; $i < count($up_save); $i++){
          if($PIT_REPRES[$i]){
            $PIT_REPRES=$PIT_REPRES[$i];
          }else{
            $PIT_REPRES=null;
          }
					$dataUp = array(
						'PPT_IDX' => $PPT_IDX,
            'PIT_REPRES' => $PIT_REPRES,
						'PIT_IMG_SAVE' => $up_org[$i],
						'PIT_IMG_ORG' => $up_save[$i],
						'PIT_REG_DATE'  => date("Y-m-d H:i:s")
					);
					$resultsUp = $this->db->insert('PROPERTY_IMG_TB', $dataUp);
				}
			}

			if ($results)  { 
				return true; 
			}  else  { 
				return false; 
			}
    }

    function propertyUpdate($key,$data,$up_org,$up_save,$PIT_REPRES,$PIT_UP_REPRES,$PIT_IDX,$PIT_DEL,$PST_START,$PST_END,$state){ // db 업데이트 / 매물 업데이트

      $this->db->where('PPT_IDX', $key);
			$results = $this->db->update('PROPERTY_TB', $data);
      

			if(count($up_save) > 0){
				for($i = 0; $i < count($up_save); $i++){
          if($PIT_REPRES[$i]){
            $PIT_REPRES=$PIT_REPRES[$i];
          }else{
            $PIT_REPRES=null;
          }
					$dataUp = array(
						'PPT_IDX' => $key,
            'PIT_REPRES' => $PIT_REPRES,
						'PIT_IMG_SAVE' => $up_org[$i],
						'PIT_IMG_ORG' => $up_save[$i],
						'PIT_REG_DATE'  => date("Y-m-d H:i:s")
					);
					$resultsUp = $this->db->insert('PROPERTY_IMG_TB', $dataUp);
				}
			}
      if(count($PIT_IDX) > 0){
        for($i = 0; $i < count($PIT_IDX); $i++){
          if($PIT_DEL[$i]){
            $dataUp = array(
              'PIT_DELETE_DATE' => date("Y-m-d H:i:s")
            );
          }else{
            if($PIT_UP_REPRES[$i]){
              $PIT_REPRES="Y";
            }else{
              $PIT_REPRES=null;
            }
            $dataUp = array(
              'PIT_REPRES' => $PIT_REPRES
            );
          }
          $this->db->where('PIT_IDX', $PIT_IDX[$i]);
					$resultsUp = $this->db->update('PROPERTY_IMG_TB', $dataUp);
        }
      }

			if ($results)  { 
				return true; 
			}  else  { 
				return false; 
			}
    }

    function propertyDelete($key){ // db 삭제 / 매물 삭제
      $data = array(
        'PPT_DELETE_DATE' => date("Y-m-d")
			);
			$this->db->where('PPT_IDX', $key);
			$results = $this->db->update('PROPERTY_TB', $data);

      $dataImg = array(
        'PIT_DELETE_DATE' => date("Y-m-d")
			);
      $this->db->where('PPT_IDX', $key);
			$resultsImg = $this->db->update('PROPERTY_IMG_TB', $dataImg);

			if ($results)  { 
				return true; 
			}  else  { 
				return false; 
			}
    }

    function propertyState($state,$key){ // 매물상태 업데이트 
      $data = array(
        'PPT_STATE' => $state
			);
			$this->db->where('PPT_IDX', $key);
			$results = $this->db->update('PROPERTY_TB', $data);

			if ($results)  { 
				return true; 
			}  else  { 
				return false; 
			}
    }

    function proCartClick($key,$idx,$slotKey){ // 관심 매물 변경
      $query = $this->db->query("SELECT * FROM CART_TB WHERE CTT_DELETE_DATE IS NULL AND MET_KEY='".$idx."' AND CTT_TYPE='prod' AND CTT_KEY='".$key."' ORDER BY CTT_IDX DESC");
			if($query->num_rows() > 0){
        $data = array(
          'CTT_DELETE_DATE' => date("Y-m-d")
        );
        $this->db->where('CTT_KEY', $key);
        $this->db->where('CTT_TYPE', 'prod');
        $this->db->where('MET_KEY', $idx);
        $results = $this->db->update('CART_TB', $data);
        return "0";
			}else{
        $data = array(
          'MET_KEY' => $idx,
          'CTT_TYPE' => 'prod',
          'CTT_KEY' => $key,
          'PST_IDX' => $slotKey,
          'CTT_REG_DATE'  => date("Y-m-d H:i:s")
        );
        $results = $this->db->insert('CART_TB', $data);
  			return "1";
      }
    }

    function ptnCartClick($key,$idx){ // 관심 업체 변경
      $query = $this->db->query("SELECT * FROM CART_TB WHERE CTT_DELETE_DATE IS NULL AND MET_KEY='".$idx."' AND CTT_TYPE='partner' AND CTT_KEY='".$key."' ORDER BY CTT_IDX DESC");
			if($query->num_rows() > 0){
        $data = array(
          'CTT_DELETE_DATE' => date("Y-m-d")
        );
        $this->db->where('CTT_KEY', $key);
        $this->db->where('CTT_TYPE', 'partner');
        $this->db->where('MET_KEY', $idx);
        $results = $this->db->update('CART_TB', $data);
        return "false";
			}else{
        $data = array(
          'MET_KEY' => $idx,
          'CTT_TYPE' => 'partner',
          'CTT_KEY' => $key,
          'CTT_REG_DATE'  => date("Y-m-d H:i:s")
        );
        $results = $this->db->insert('CART_TB', $data);
  			return "true";
      }
    }

    function makeCartClick($ppt_idx,$met_idx){ // 관심 업체 변경
      
      $query = $this->db->query("SELECT * FROM CART_TB WHERE CTT_DELETE_DATE IS NULL AND MET_KEY='".$met_idx."' AND CTT_TYPE='make' AND CTT_KEY='".$ppt_idx."' ORDER BY CTT_IDX DESC");
			if($query->num_rows() > 0){
        $data = array(
          'CTT_DELETE_DATE' => date("Y-m-d")
        );
        $this->db->where('CTT_KEY', $ppt_idx);
        $this->db->where('CTT_TYPE', 'make');
        $this->db->where('MET_KEY', $met_idx);
        $results = $this->db->update('CART_TB', $data);
        
			}else{
        $data = array(
          'MET_KEY' => $met_idx,
          'CTT_TYPE' => 'make',
          'CTT_KEY' => $ppt_idx,
          'CTT_REG_DATE'  => date("Y-m-d H:i:s")
        );
        $results = $this->db->insert('CART_TB', $data);
      }
      $dataCart=[];
      $dataPtn=[];
      $dataPtnIdx=[];
      $dataPtnAddr=[];
      $dataPtnName=[];
      $dataPtnImg=[];
      $dataPtnType=[];
      $queryCart = $this->db->query("SELECT * FROM CART_TB WHERE CTT_DELETE_DATE IS NULL AND MET_KEY='".$met_idx."' AND CTT_TYPE='make' ORDER BY CTT_IDX DESC");
      $all_cnt = $queryCart->num_rows();
      $typeA=0;
      $typeB=0;
      $typeC=0;
      $typeD=0;
      $typeE=0;
      $typeF=0;
      $typeG=0;
      $typeH=0;
      if($queryCart->num_rows() > 0){
				foreach($queryCart->result() as $rowCart){
          $queryPtn = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_DELETE_DATE IS NULL AND PTT_IDX='".$rowCart->CTT_KEY."' ORDER BY PTT_IDX DESC");
          $dataCart[]=$rowCart;
          if($queryPtn->num_rows() > 0){
            $rowPtn = $queryPtn->row();
            array_push($dataPtnIdx,$rowPtn->PTT_IDX);
            array_push($dataPtnAddr,decrypt($rowPtn->PTT_ADDR1_A));
            array_push($dataPtnName,decrypt($rowPtn->PTT_NAME));
            array_push($dataPtnImg,$rowPtn->PTT_IMG_SAVE);
            array_push($dataPtnType,$rowPtn->PTT_TYPE);
            $dataPtn = array($dataPtnIdx,$dataPtnAddr,$dataPtnName,$dataPtnImg,$dataPtnType);
            
            if($rowPtn->PTT_TYPE=="인테리어"){
              $typeA++;
            }else if($rowPtn->PTT_TYPE=="가구"){
              $typeB++;
            }else if($rowPtn->PTT_TYPE=="주방/설비"){
              $typeC++;
            }else if($rowPtn->PTT_TYPE=="간판"){
              $typeD++;
            }else if($rowPtn->PTT_TYPE=="광고/인쇄"){
              $typeE++;
            }else if($rowPtn->PTT_TYPE=="통신/보안"){
              $typeF++;
            }else if($rowPtn->PTT_TYPE=="렌탈"){
              $typeG++;
            }else if($rowPtn->PTT_TYPE=="기타"){
              $typeH++;
            }
          }
				}
				
			}
      return [$dataCart,$all_cnt,$typeA,$typeB,$typeC,$typeD,$typeE,$typeF,$typeG,$typeH,$dataPtn];
    }

    function cartDel($key,$type,$data){ // 관심 업체 변경
      $this->db->where("CTT_TYPE", $type);
      $this->db->where("CTT_KEY", $key);
			$results = $this->db->update('CART_TB', $data);
  		return "true";
    }

    function proPertyDel($key,$type,$data){ // 관심 업체 변경
      $query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_USER_TYPE='".$type."' AND USER_IDX='".$key."' ORDER BY PPT_IDX DESC");
      if($query->num_rows() > 0){
        $dataImg = array(
          'PIT_DELETE_DATE' => date("Y-m-d")
        );
        $rowImg = $query->row();
        $this->db->where("PPT_IDX", $rowImg->PPT_IDX);
        $resultsImg = $this->db->update('PROPERTY_IMG_TB', $dataImg);
      }

      $this->db->where("PPT_USER_TYPE", $type);
      $this->db->where("USER_IDX", $key);
			$results = $this->db->update('PROPERTY_TB', $data);
      

  		return "true";
    }

    function bkQnaDel($key,$type,$data){ // 관심 업체 변경
      $this->db->where("BKT_IDX", $key);
      $this->db->where("USER_TYPE", $type);
			$results = $this->db->update('QNA_BK_TB', $data);
  		return "true";
    }

    function dbUpdatePm($tidKey,$oidKey,$dataPm,$dataPs,$dataVa){ // 가상계좌 결제 리턴

      $query = $this->db->query("SELECT * FROM PAYMENT_TB WHERE PMT_DELETE_DATE IS NULL AND PMT_NUMBER2='".$oidKey."' ORDER BY PMT_IDX DESC ");
      if($query->num_rows() > 0){
        $this->db->where('PMT_NUMBER2', $oidKey);
        $resultsPm = $this->db->update('PAYMENT_TB', $dataPm);
        $row = $query->row();

        $this->db->where('PST_IDX', $row->PST_IDX);
        $dataPs['PST_END'] = $row->PMT_END." ".date("H:i:s", strtotime($row->PMT_REG_DATE));
        $resultsPs = $this->db->update('PROP_SLOT_TB', $dataPs);

        $dataVa['PST_IDX']=$row->PST_IDX;
        $dataVa['PMT_IDX']=$row->PMT_IDX;
        $resultsVa = $this->db->insert('VITUAL_ACCOUNT_TB', $dataVa);
      }

    
			if ($resultsPm && $resultsPs && $resultsVa)  { 
				return true; 
			}  else  { 
				return false; 
			}
    }

    
}  



//			 $this->db->or_where('id >', $id); OR 문
//			 $this->db->like('title', 'match'); LIKE 문  $this->db->or_like() // OR LIKE
//			 $this->db->group_by("title"); // GROUP BY
//			 $this->db->order_by('title', 'DESC');
//			 $this->db->limit(10); // LIMIT
/*

/// INSERT
$data = array(
        'title' => 'My title',
        'name' => 'My Name',
        'date' => 'My date'
);

$this->db->insert('mytable', $data);


// UPDATE
$data = array(
        'title' => 'My title',
        'name'  => 'My Name',
        'date'  => 'My date'
);

$this->db->where('id', $id);
$this->db->update('mytable', $data);

// DELETE

$this->db->where('id', $id);
$this->db->delete('mytable');


*/

?>