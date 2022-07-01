<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_model extends CI_Model{
 
    function __construct(){
        parent::__construct();
				$this -> load -> helper("privatehash");
    }
 
    function table_list($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			if($search){
				if($tb_type=='MET'){
					$where .=" AND ( MET_NAME LIKE '%".encrypt($search)."%' OR MET_TEL LIKE '%".encrypt($search)."%' OR MET_EMAIL LIKE '%".encrypt($search)."%' ) ";
				}else if($tb_type=='BKT'){
					$where .=" AND ( BKT_EMAIL LIKE '%".encrypt($search)."%' OR BKT_TEL LIKE '%".encrypt($search)."%' OR BKT_NAME LIKE '%".encrypt($search)."%' OR BKT_ADDR1 LIKE '%".encrypt($search)."%' OR BKT_ADDR2 LIKE '%".encrypt($search)."%' OR BKT_CEO LIKE '%".encrypt($search)."%' OR BKT_HP LIKE '%".encrypt($search)."%' ) ";
				}else if($tb_type=='PTT'){
					$where .=" AND ( PTT_EMAIL LIKE '%".encrypt($search)."%' OR PTT_NAME LIKE '%".encrypt($search)."%' OR PTT_ADDR1_A LIKE '%".encrypt($search)."%' OR PTT_ADDR2 LIKE '%".encrypt($search)."%' OR PTT_TEL LIKE '%".encrypt($search)."%' OR PTT_HP LIKE '%".encrypt($search)."%' ) ";
				}else if($tb_type=='FAT'){
					$where .=" AND ( FAT_QUESTION LIKE '%".$search."%' OR FAT_ANSWER LIKE '%".$search."%' ) ";
				}else if($tb_type=='DAT'){
					$where .=" AND ( DAT_AREA_A LIKE '%".$search."%' OR DAT_AREA_B LIKE '%".$search."%' OR DAT_AREA_C LIKE '%".$search."%' ) ";
				}else if($tb_type=='DBT'){
					$where .=" AND ( DBT_AREA_A LIKE '%".$search."%' OR DBT_AREA_B LIKE '%".$search."%' OR DBT_AREA_C LIKE '%".$search."%' ) ";
				}else if($tb_type=='DCT'){
					$where .=" AND ( DCT_AREA_A LIKE '%".$search."%' OR DCT_AREA_B LIKE '%".$search."%' ) ";
				}else if($tb_type=='DDT'){
					$where .=" AND ( DDT_AREA_A LIKE '%".$search."%' OR DDT_AREA_B LIKE '%".$search."%' ) ";
				}else if($tb_type=='DET'){
					$where .=" AND ( DET_INSTITUTION LIKE '%".$search."%' OR DET_ADDR_A LIKE '%".$search."%' OR DET_ADDR_B LIKE '%".$search."%' OR DET_AREA_A LIKE '%".$search."%' OR DET_AREA_B LIKE '%".$search."%' OR DET_NUM LIKE '%".$search."%' OR DET_NAME LIKE '%".$search."%' ) ";
				}else if($tb_type=='DFT'){
					$where .=" AND ( DFT_TYPE_A LIKE '%".$search."%' OR DFT_TYPE_B LIKE '%".$search."%' OR DFT_AREA_A LIKE '%".$search."%' OR DFT_AREA_B LIKE '%".$search."%' OR DFT_AREA_C LIKE '%".$search."%' OR DFT_ADDR_A LIKE '%".$search."%' OR DFT_ADDR_B LIKE '%".$search."%' OR DFT_NAME LIKE '%".$search."%' ) ";
				}else if($tb_type=='CAT'){
					$where .=" AND ( CAT_CODE LIKE '%".$search."%' OR CAT_NAME LIKE '%".$search."%'  ) ";
				}else if($tb_type=='CBT'){
					$where .=" AND ( CAT_CODE LIKE '%".$search."%' OR CAT_NAME LIKE '%".$search."%' OR CBT_CODE LIKE '%".$search."%' OR CBT_NAME LIKE '%".$search."%'  ) ";
				}else if($tb_type=='CCT'){
					$where .=" AND ( CAT_CODE LIKE '%".$search."%' OR CAT_NAME LIKE '%".$search."%' OR CBT_CODE LIKE '%".$search."%' OR CBT_NAME LIKE '%".$search."%' OR CCT_CODE LIKE '%".$search."%' OR CCT_NAME LIKE '%".$search."%'  ) ";
				}else if($tb_type=='CDT'){
					$where .=" AND ( CDT_AREA LIKE '%".$search."%'  ) ";
				}else if($tb_type=='CET'){
					$where .=" AND ( CET_AREA_A LIKE '%".$search."%' OR CET_AREA LIKE '%".$search."%' ) ";
				}else if($tb_type=='CFT'){
					$where .=" AND ( CFT_AREA_A LIKE '%".$search."%' OR CFT_AREA_B LIKE '%".$search."%' OR CFT_AREA_C LIKE '%".$search."%' OR CFT_AREA_D LIKE '%".$search."%' ) ";
				}else if($tb_type=='DHT'){
					$where .=" AND ( DHT_NAME LIKE '%".$search."%' OR DHT_ADDR LIKE '%".$search."%' OR DHT_NUM_NAME LIKE '%".$search."%' ) ";
        }else if($tb_type=='PPT'){
					$where .=" AND ( PPT_TITLE LIKE '%".$search."%' OR PPT_AREA_A LIKE '%".$search."%' OR PPT_AREA_B LIKE '%".$search."%' OR PPT_AREA_C LIKE '%".$search."%' OR PPT_AREA_D LIKE '%".$search."%' ) ";
        }else{
          $where .=" AND ( ".$tb_type."_TITLE LIKE '%".$search."%' OR ".$tb_type."_CONTENT LIKE '%".$search."%' ) ";
        }
			}
			if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}

			if($orderWhere){
				$where .= $orderWhere;
			}
			$data="";

			$query = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return array($data,$all_cnt);
			}else{
        return array($data,0);
      }
			return false;
    } 
		
		function table_Qlist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			if($search){
				$where .=" AND ( a.QNT_CONTENT LIKE '%".encrypt($search)."%' OR a.QNT_TITLE LIKE '%".encrypt($search)."%' ) ";
			}
			
			$query = $this->db->query("SELECT * FROM QNA_TB as a LEFT JOIN MEM_TB as b ON a.MET_IDX = b.MET_IDX WHERE a.QNT_DELETE_DATE IS NULL AND b.MET_DELETE_DATE IS NULL ORDER BY a.QNT_IDX DESC");

			$query_cnt = $this->db->query("SELECT * FROM QNA_TB as a LEFT JOIN MEM_TB as b ON a.MET_IDX = b.MET_IDX WHERE a.QNT_DELETE_DATE IS NULL AND b.MET_DELETE_DATE IS NULL ORDER BY a.QNT_IDX DESC");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return array($data,$all_cnt);
			}
			return false;
    }
    function table_QPlist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			if($search){
				$where .=" AND ( PQT_NAME LIKE '%".encrypt($search)."%' OR PQT_TEL LIKE '%".encrypt($search)."%' OR PQT_EMAIL LIKE '%".encrypt($search)."%' OR PQT_TYPE LIKE '%".encrypt($search)."%' OR PQT_CONTENT LIKE '%".encrypt($search)."%' ) ";
			}
			
			$query = $this->db->query("SELECT * FROM PQNA_TB WHERE PQT_DELETE_DATE IS NULL ORDER BY PQT_IDX DESC");

			$query_cnt = $this->db->query("SELECT * FROM PQNA_TB WHERE PQT_DELETE_DATE IS NULL ORDER BY PQT_IDX DESC");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return array($data,$all_cnt);
			}
			return false;
    }

    function table_Plist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			if($search){
				$where .=" AND ( PPT_CONTENT LIKE '%".encrypt($search)."%' OR PPT_TITLE LIKE '%".encrypt($search)."%' ) ";
			}
			
			$query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_DELETE_DATE IS NULL ".$orderWhere." ORDER BY PPT_IDX DESC");

      $query_cnt = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_DELETE_DATE IS NULL ".$orderWhere." ORDER BY PPT_IDX DESC");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
          $query_ck = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_REGIST_NUMBER='".$row->PPT_REGIST_NUMBER."' AND PPT_IDX !='".$row->PPT_IDX."' AND PPT_DELETE_DATE IS NULL ORDER BY PPT_IDX DESC");
          $ck_cnt = $query_ck->num_rows();
          if($row->PPT_USER_TYPE=='A'){
            $query_user = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_IDX='".$row->USER_IDX."' AND BKT_DELETE_DATE IS NULL ORDER BY BKT_IDX DESC");
            $ck_user = $query_user->row();
          }else{
            $query_user = $this->db->query("SELECT * FROM MEM_TB WHERE MET_IDX='".$row->USER_IDX."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC");
            $ck_user = $query_user->row();
          }
          $query_companion = $this->db->query("SELECT * FROM COMPANION_TB WHERE PPT_IDX='".$row->PPT_IDX."' AND CPT_DELETE_DATE IS NULL ORDER BY CPT_IDX DESC");
          $companion = $query_companion->row();
          
					$data[]= array($row,$ck_cnt,$ck_user,$companion);
				}
				return array($data,$all_cnt);
			}
			return false;
    }

    function table_PIlist($key){ // 데이터 리스트 / 인자값(키값)
			$query = $this->db->query("SELECT * FROM PROPERTY_IMG_TB WHERE PIT_DELETE_DATE IS NULL AND PPT_IDX='".$key."' ORDER BY PIT_IDX ASC");
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return $data;
			}
			return false;
    }

		function table_view($tb_name,$tb_type,$key){ // 데이터 뷰 / 인자값(테이블명,type,키값)
			$query = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL AND ".$tb_type."_IDX='".$key."' ORDER BY ".$tb_type."_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				$row = $query->row();
				return $row; 
			}  else  { 
				return false; 
			}
		}

    function table_viewNodell($tb_name,$tb_type,$key){ // 데이터 뷰 / 인자값(테이블명,type,키값)
			$query = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_IDX='".$key."' ORDER BY ".$tb_type."_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				$row = $query->row();
				return $row; 
			}  else  { 
				return false; 
			}
		}
    
    function table_csview($tb_name,$tb_type,$key){ // 데이터 뷰 / 인자값(테이블명,type,키값)
			$query = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL AND ".$tb_type."_IDX='".$key."' ORDER BY ".$tb_type."_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				$row = $query->row();
        $queryRev = $this->db->query("SELECT * FROM CASE_REVIEW_TB WHERE CRT_DELETE_DATE IS NULL AND CST_IDX='".$row->CST_IDX."' ORDER BY CRT_IDX DESC ");
        $data=array();
        $name=array();
        $pt_name=array();
        $pt_img=array();
        foreach($queryRev->result() as $rowRev){
          $queryMem = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_IDX='".$rowRev->MET_IDX."' ORDER BY MET_IDX DESC ");
          $rowMem = $queryMem->row();
					$data[]=$rowRev;
          //array_push($data,$rowMem);
          $name[]=$rowMem;
				}
        $query_partner = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_IDX='".$row->PTT_IDX."' AND
          PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC");
          $row_partner = $query_partner->row();
        array_push($pt_name,decrypt($row_partner->PTT_NAME));
        array_push($pt_img,$row_partner->PTT_IMG_SAVE);
				return array($row,$data,$name,$pt_name,$pt_img); 
			}  else  { 
				return false; 
			}
		}

    function table_UserPayview($key){ // 데이터 뷰 / 인자값(테이블명,type,키값)
			$query = $this->db->query("SELECT * FROM PAYMENT_TB WHERE PMT_DELETE_DATE IS NULL AND PST_IDX='".$key."' ORDER BY PMT_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				$row = $query->row();
				return $row; 
			}  else  { 
				return false; 
			}
		}

		function uplaods($type,$key){ // 첨부 리스트 / 인자값(type,키값)
			$query = $this->db->query("SELECT * FROM UP_FILE WHERE UP_TABLE_TYPE='".$type."' AND UP_TABLE_IDX='".$key."' AND UP_DELETE_DATE IS NULL");
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return [$data,$query->num_rows()];
			}
			return false;
    }
    function table_SPlist($PPT_IDX,$cur_lat,$cur_lon,$p_type){ // 매물검색 리스트 / 인자값(키값,위도,경도)
      $data="";
      if($PPT_IDX && $cur_lat && $cur_lon){
        if($p_type){
          $where=" PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_IDX='".$PPT_IDX."' AND PPT_TYPE_A LIKE '%".$p_type."%' ";
        }else{
          $where=" PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_IDX='".$PPT_IDX."' AND PPT_TYPE_A LIKE '%상가%' ";
        }
      }else{
        if($p_type){
          $where=" PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_TYPE_A LIKE '%".$p_type."%' ";
        }else{
          $where=" PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_TYPE_A LIKE '%상가%' ";
        }
      }
      $where .= " HAVING distance <= 2"; // 0.1 - 100m , 1 - 1km
      $query = $this->db->query("SELECT * , (6371*acos(cos(radians(".$cur_lat."))*cos(radians(PPT_LAT))*cos(radians(PPT_LON)-radians(".$cur_lon."))+sin(radians(".$cur_lat."))*sin(radians(PPT_LAT)))) AS distance FROM PROPERTY_TB WHERE ".$where." ORDER BY PPT_IDX DESC");
      $total_cnt=0;
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
          $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_IDX='".$row->PST_IDX."' AND PST_STATE='A' AND PST_DELETE_DATE IS NULL AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ORDER BY PST_IDX DESC");
          $slotCnt = $querySlot->num_rows();
          if($slotCnt > 0){
            $query_img = $this->db->query("SELECT * FROM PROPERTY_IMG_TB WHERE PPT_IDX='".$row->PPT_IDX."' AND PIT_DELETE_DATE IS NULL ORDER BY PIT_IDX DESC LIMIT 1");
            $row_img = $query_img->row();

            $query_cart = $this->db->query("SELECT * FROM CART_TB WHERE CTT_KEY='".$row->PPT_IDX."' AND CTT_TYPE='prod' AND MET_KEY='".$this -> session ->userdata('LOGIN_IDX')."' AND CTT_DELETE_DATE IS NULL ORDER BY CTT_IDX DESC");
            if($query_cart->num_rows() > 0){
              $cart="true";
            }else{
              $cart="false";
            }
            $data[]=array($row,$row_img->PIT_IMG_SAVE,$cart);
            $total_cnt++;
          }
          
				}
        return [$data,$total_cnt];
			}else{
        return ["0","0"];
      }
			return false;
    }

    function table_SPMap($PPT_IDX,$cur_lat,$cur_lon){ // 지도 행정동 데이터 리스트 / 인자값(키값,위도,경도)

      $query = $this->db->query("SELECT * , (6371*acos(cos(radians(".$cur_lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$cur_lon."))+sin(radians(".$cur_lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 2 ORDER BY CFT_IDX DESC");
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return [$data,$query->num_rows()];
			}
			return false;
    }

    function table_SPSubway($PPT_IDX,$cur_lat,$cur_lon){ // 지도 지하철 데이터 리스트 / 인자값(키값,위도,경도)

      $query = $this->db->query("SELECT * , (6371*acos(cos(radians(".$cur_lat."))*cos(radians(DHT_LAT))*cos(radians(DHT_LON)-radians(".$cur_lon."))+sin(radians(".$cur_lat."))*sin(radians(DHT_LAT)))) AS distance FROM DATA_H_TB WHERE DHT_DELETE_DATE IS NULL HAVING distance <= 2 ORDER BY DHT_IDX DESC");
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return [$data,$query->num_rows()];
			}
			return false;
    }

    function table_dongCnt($areaA,$areaB,$areaC,$type){ // 지도영역 해당 행정동 매물갯수 / 인자값(시/도,구/군,동/면/리)
      $cnt=0;
      if($type=='사무실'){
        //$query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_AREA_A='".$areaA."' AND PPT_AREA_B='".$areaB."' AND PPT_AREA_D='".$areaC."' AND PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_END_DATE >= '".date("Y-m-d")."' AND PPT_TYPE_A LIKE '%사무실%' ORDER BY PPT_IDX DESC");
        //$query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_END_DATE >= '".date("Y-m-d")."' AND (PPT_ADDR1_B LIKE '%".$areaA."%' AND PPT_ADDR1_B LIKE '%".$areaB."%' AND PPT_ADDR1_B LIKE '%".$areaC."%' ) AND PPT_TYPE_A LIKE '%사무실%' ORDER BY PPT_IDX DESC");
        $query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_STATE ='A'AND ((PPT_ADDR1_B LIKE '%".$areaA."%' OR PPT_AREA_A='".$areaA."') AND (PPT_ADDR1_B LIKE '%".$areaB."%' OR PPT_AREA_B='".$areaB."') AND ( PPT_AREA_D='".$areaC."' OR PPT_AREA_C='".$areaC."' )) AND PPT_TYPE_A LIKE '%사무실%' ORDER BY PPT_IDX DESC");
        if($query->num_rows() > 0){
          foreach($query->result() as $row){
            $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_STATE ='A' AND PST_IDX='".$row->PST_IDX."' AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ORDER BY PST_IDX DESC");
            $slotCnt = $querySlot->num_rows();
            if($slotCnt > 0){
              $cnt++;
            }
          }
        }
      }else{
        //$query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_AREA_A='".$areaA."' AND PPT_AREA_B='".$areaB."' AND PPT_AREA_D='".$areaC."' AND PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_END_DATE >= '".date("Y-m-d")."' AND PPT_TYPE_A LIKE '%상가%' ORDER BY PPT_IDX DESC");
        //$query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_END_DATE >= '".date("Y-m-d")."' AND (PPT_ADDR1_B LIKE '%".$areaA."%' AND PPT_ADDR1_B LIKE '%".$areaB."%' AND PPT_ADDR1_B LIKE '%".$areaC."%' ) AND PPT_TYPE_A LIKE '%상가%' ORDER BY PPT_IDX DESC");
        
        $query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND ((PPT_ADDR1_B LIKE '%".$areaA."%' OR PPT_AREA_A='".$areaA."') AND (PPT_ADDR1_B LIKE '%".$areaB."%' OR PPT_AREA_B='".$areaB."') AND ( PPT_AREA_D='".$areaC."' OR PPT_AREA_C='".$areaC."' )) AND PPT_TYPE_A LIKE '%상가%' ORDER BY PPT_IDX DESC");
        foreach($query->result() as $row){
          $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_STATE ='A' AND PST_IDX='".$row->PST_IDX."' AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ORDER BY PST_IDX DESC");
          $slotCnt = $querySlot->num_rows();
          if($slotCnt > 0){
            $cnt++;
          }
        }
      }
			return [$cnt];
    }
    function prmoveList($level,$type,$lat,$lon,$sort,$optionA,$optionB,$optionC,$optionD,$optionE,$optionF,$optionG,$optionH,$optionI,$key,$p_type,$avg){ // 지도역역 위치 이동시 해당영역 데이터 / 인자값(지도래벨,구분,위도,경도)
      // 지도 래벨 별 거리 조절
      if($level >= '18'){
        $km = "0.4";
      }else if($level == '17'){
        $km = "0.7";
      }else if($level == '16'){
        $km = "1.5";
      }else if($level ==  '15'){
        $km = "3";
      }else if($level ==  '14'){
        $km = "5.3";
      }else if($level=='13'){
        $km = "9.6";
      }else if($level=='12'){
        $km = "20";
      }else if($level=='11'){
        $km = "38";
      }else if($level=='10'){
        $km = "78";
      }else if($level=='9'){
        $km = "120";
      }else if($level=='8'){
        $km = "160";
      }

      // 옵션 적용
      $queryWhere=" AND PPT_STATE ='A' ";
      if($p_type=='상가'){
        $queryWhere .=" AND PPT_TYPE_A LIKE '%상가%' ";
      }else if($p_type=='사무실'){
        $queryWhere .=" AND PPT_TYPE_A LIKE '%사무실%' ";
      }
      //보증금
      if($optionA){
        $optionA = explode(";", $optionA);
        if($optionA[0]=="최소"){
          $optionA[0]="0";
        }else if($optionA[0]=="천만"){
          $optionA[0]="1000";
        }else if($optionA[0]=="오천만"){
          $optionA[0]="5000";
        }else if($optionA[0]=="일억"){
          $optionA[0]="10000";
        }else{
          $optionA[0]="10000000000000000000";
        }
        if($optionA[1]=="최소"){
          $optionA[1]="0";
        }else if($optionA[1]=="천만"){
          $optionA[1]="1000";
        }else if($optionA[1]=="오천만"){
          $optionA[1]="5000";
        }else if($optionA[1]=="일억"){
          $optionA[1]="10000";
        }else{
          $optionA[1]="10000000000000000000";
        }
        $queryWhere .=" AND PPT_PRICE_A >= ".$optionA[0]." AND PPT_PRICE_A <= ".$optionA[1]." ";
      }
      //임대료
      if($optionB){
        $optionB = explode(";", $optionB);
        if($optionB[0]=="최소"){
          $optionB[0]="0";
        }else if($optionB[0]=="백만"){
          $optionB[0]="100";
        }else if($optionB[0]=="천만"){
          $optionB[0]="1000";
        }else if($optionB[0]=="천오백만"){
          $optionB[0]="1500";
        }else{
          $optionB[0]="999999999999999999999";
        }
        if($optionB[1]=="최소"){
          $optionB[1]="0";
        }else if($optionB[1]=="백만"){
          $optionB[1]="100";
        }else if($optionB[1]=="천만"){
          $optionB[1]="1000";
        }else if($optionB[1]=="천오백만"){
          $optionB[1]="1500";
        }else{
          $optionB[1]="999999999999999999999";
        }
        $queryWhere .=" AND PPT_PRICE_B >= ".$optionB[0]." AND PPT_PRICE_B <= ".$optionB[1]." ";
      }
      //권리금
      if($optionC){
        if($optionC=='유'){
          $queryWhere .=" AND PPT_PRICE_C > 0 ";
        }else if($optionC=='무'){
          $queryWhere .=" AND PPT_PRICE_C_ETC ='권리금 없음' ";
        }else if($optionC=='협의가능'){
          $queryWhere .=" AND PPT_PRICE_C_ETC ='협의가능' ";
        }
      }
      //면적
      if($optionD){
        $optionD = explode(";", $optionD);
        if($optionD[0]=="최소"){
          $optionD[0]="0";
        }else if($optionD[0]=="99㎡"){
          $optionD[0]="99";
        }else if($optionD[0]=="198㎡"){
          $optionD[0]="198";
        }else if($optionD[0]=="297㎡"){
          $optionD[0]="297";
        }else{
          $optionD[0]="99999999999999999";
        }
        if($optionD[1]=="최소"){
          $optionD[1]="0";
        }else if($optionD[1]=="99㎡"){
          $optionD[1]="99";
        }else if($optionD[1]=="198㎡"){
          $optionD[1]="198";
        }else if($optionD[1]=="297㎡"){
          $optionD[1]="297";
        }else{
          $optionD[1]="99999999999999999";
        }
        $queryWhere .=" AND PPT_SIZE_A >= ".$optionD[0]." AND PPT_SIZE_A <= ".$optionD[1]." ";
      }
      //구분
      if($optionE){
        $queryWhere .=" AND PPT_TYPE_A LIKE '%".$optionE."%' ";
      }
      //층수
      if($optionF){
        if($optionF=='2층이상'){
          $queryWhere .=" AND PPT_STOREYS_B='A' AND PPT_STOREYS_C > '1' ";
        }else if($optionF=='1층만'){
          $queryWhere .=" AND PPT_STOREYS_B='A' AND PPT_STOREYS_C = '1' ";
        }else if($optionF=='지하층'){
          $queryWhere .=" AND PPT_STOREYS_B='B' ";
        }
      }
      //주차
      if($optionG){
        $optionG = explode(";", $optionG);
        if($optionG[0]==0){
          $optionG[0]="0";
        }else if($optionG[0]==3){
          $optionG[0]="3";
        }else if($optionG[0]==6){
          $optionG[0]="6";
        }else if($optionG[0]==9){
          $optionG[0]="9";
        }else if($optionG[0]=="최대"){
          $optionG[0]="9999999999999999";
        }
        if($optionG[1]==0){
          $optionG[1]="0";
        }else if($optionG[1]==3){
          $optionG[1]="3";
        }else if($optionG[1]==6){
          $optionG[1]="6";
        }else if($optionG[1]==9){
          $optionG[1]="9";
        }else if($optionG[1]=="최대"){
          $optionG[1]="9999999999999999";
        }
        $queryWhere .=" AND PPT_OPTION_B >= ".$optionG[0]." AND PPT_OPTION_B <= ".$optionG[1]." ";
      }
      //화장실
      if($optionH){
        $queryWhere .=" AND PPT_OPTION_D ='".$optionH."' ";
      }
      //기타 옵션
      if($optionI){
        $optionI = explode("|", $optionI);
        for($i=0;$i<count($optionI);$i++){
            $queryWhere .=" AND PPT_OPTION_G LIKE '%".$optionI[$i]."%' ";
        }
      }
      if($p_type=='상가' || !$p_type){
        $queryWhere .=" AND PPT_TYPE_A LIKE '%상가%' ";
      }else{
        $queryWhere .=" AND PPT_TYPE_A LIKE '%사무실%' ";
      }
      // 지도영역 마커
      $Ds_CNT=array();
      $Ds_KEY=array();
      $Ds_NAME=array();
      $Ds_LAT=array();
      $Ds_LON=array();
      $Ds_ADDR=array();
      $Ds_AVG=array();
      $Ds_CH=array();
      $Ds_EXPO=array();
      $Ds_PRICE_A=array();
      $Ds_PRICE_B=array();
      $Ds_TYPE=array();
      
      if($type=='dong'){
        $queryDs = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= ".$km." ORDER BY CFT_IDX DESC");
      }else if($type=='gugun'){
        $queryDs = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CET_LAT))*cos(radians(CET_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CET_LAT)))) AS distance FROM CODE_E_TB WHERE CET_DELETE_DATE IS NULL HAVING distance <= ".$km." ORDER BY CET_IDX DESC");
      }else if($type=='sido'){
        $queryDs = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CDT_LAT))*cos(radians(CDT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CDT_LAT)))) AS distance FROM CODE_D_TB WHERE CDT_DELETE_DATE IS NULL HAVING distance <= ".$km." ORDER BY CDT_IDX DESC");
      }else if($type=='view'){
        $queryDs = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(PPT_LAT))*cos(radians(PPT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(PPT_LAT)))) AS distance FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL ".$queryWhere." HAVING distance <= ".$km." ORDER BY PPT_IDX DESC");
        
      }
      if($queryDs->num_rows() > 0){
        foreach($queryDs->result() as $row){
          if($type=='dong'){
            //$queryPr = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_AREA_A='".$row->CFT_AREA_A."' AND PPT_AREA_B='".$row->CFT_AREA_B."' AND PPT_AREA_D='".$row->CFT_AREA_C."' AND PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' AND PPT_END_DATE >= '".date("Y-m-d")."' ".$queryWhere." ORDER BY PPT_IDX DESC");
            $queryPr = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND ((PPT_ADDR1_B LIKE '%".$row->CFT_AREA_A."%' OR PPT_AREA_A='".$row->CFT_AREA_A."') AND (PPT_ADDR1_B LIKE '%".$row->CFT_AREA_B."%' OR PPT_AREA_B='".$row->CFT_AREA_B."') AND ( PPT_AREA_D='".$row->CFT_AREA_C."' OR PPT_AREA_C='".$row->CFT_AREA_C."' )) AND PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' ".$queryWhere." ORDER BY PPT_IDX DESC");
            $cnt=0;
            foreach($queryPr->result() as $rowPr){
              $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_STATE ='A' AND PST_IDX='".$rowPr->PST_IDX."' AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ORDER BY PST_IDX DESC");
              $slotCnt = $querySlot->num_rows();
              if($slotCnt > 0){
                $cnt++;
              }
            }
            array_push($Ds_CNT, $cnt);
            array_push($Ds_KEY,$row->CFT_IDX);
            array_push($Ds_NAME,$row->CFT_AREA_C);
            array_push($Ds_LAT,$row->CFT_LAT);
            array_push($Ds_LON,$row->CFT_LON);
            array_push($Ds_ADDR,$row->CFT_AREA_A." ".$row->CFT_AREA_B." ".$row->CFT_AREA_C);
            if($avg=='21'){
              array_push($Ds_AVG,$row->CFT_A);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_A ASC LIMIT 5");
            }else if($avg=='22'){
              array_push($Ds_AVG,$row->CFT_B);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_B ASC LIMIT 5");
            }else if($avg=='23'){
              array_push($Ds_AVG,$row->CFT_C);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_C ASC LIMIT 5");
            }else if($avg=='24'){
              array_push($Ds_AVG,$row->CFT_D);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_D ASC LIMIT 5");
            }else if($avg=='25'){
              array_push($Ds_AVG,$row->CFT_E);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_E ASC LIMIT 5");
            }else if($avg=='26'){
              array_push($Ds_AVG,$row->CFT_F);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_F ASC LIMIT 5");
            }else if($avg=='27'){
              array_push($Ds_AVG,$row->CFT_G);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_G ASC LIMIT 5");
            }else if($avg=='28'){
              array_push($Ds_AVG,$row->CFT_H);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_H ASC LIMIT 5");
            }else if($avg=='29'){
              array_push($Ds_AVG,$row->CFT_I);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_I ASC LIMIT 5");
            }else if($avg=='30'){
              array_push($Ds_AVG,$row->CFT_J);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_J ASC LIMIT 5");
            }else if($avg=='31'){
              array_push($Ds_AVG,$row->CFT_K);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_K ASC LIMIT 5");
            }else if($avg=='32'){
              array_push($Ds_AVG,$row->CFT_L);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_L ASC LIMIT 5");
            }else if($avg=='33'){
              array_push($Ds_AVG,$row->CFT_M);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_M ASC LIMIT 5");
            }else if($avg=='41'){
              array_push($Ds_AVG,$row->CFT_N);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_N ASC LIMIT 5");
            }else if($avg=='42'){
              array_push($Ds_AVG,$row->CFT_O);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_O ASC LIMIT 5");
            }else if($avg=='43'){
              array_push($Ds_AVG,$row->CFT_P);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_P ASC LIMIT 5");
            }else if($avg=='44'){
              array_push($Ds_AVG,$row->CFT_Q);
              $queryCh = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CFT_LAT))*cos(radians(CFT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CFT_LAT)))) AS distance FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL HAVING distance <= 9 ORDER BY CFT_Q ASC LIMIT 5");
            }
            
          }else if($type=='gugun'){
            $queryPr = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_AREA_A='".$row->CET_AREA_A."' AND PPT_AREA_B='".$row->CET_AREA."' AND PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' ".$queryWhere." ORDER BY PPT_IDX DESC");
            $cnt=0;
            foreach($queryPr->result() as $rowPr){
              $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_STATE ='A' AND PST_IDX='".$rowPr->PST_IDX."' AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ORDER BY PST_IDX DESC");
              $slotCnt = $querySlot->num_rows();
              if($slotCnt > 0){
                $cnt++;
              }
            }
            array_push($Ds_CNT, $cnt);
            array_push($Ds_KEY,$row->CET_IDX);
            array_push($Ds_NAME,$row->CET_AREA);
            array_push($Ds_LAT,$row->CET_LAT);
            array_push($Ds_LON,$row->CET_LON);
          }else if($type=='sido'){
            $queryPr = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_AREA_A='".$row->CDT_AREA."' AND PPT_DELETE_DATE IS NULL AND PPT_STATE ='A' ".$queryWhere." ORDER BY PPT_IDX DESC");
            $cnt=0;
            foreach($queryPr->result() as $rowPr){
              $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_STATE ='A' AND PST_IDX='".$rowPr->PST_IDX."' AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ORDER BY PST_IDX DESC");
              $slotCnt = $querySlot->num_rows();
              if($slotCnt > 0){
                $cnt++;
              }
            }
            array_push($Ds_CNT, $cnt);
            array_push($Ds_KEY,$row->CDT_IDX);
            array_push($Ds_NAME,$row->CDT_AREA);
            array_push($Ds_LAT,$row->CDT_LAT);
            array_push($Ds_LON,$row->CDT_LON);
          }else if($type=='view'){
            array_push($Ds_CNT, "1");
            array_push($Ds_KEY,$row->PPT_IDX);
            array_push($Ds_NAME,$row->PPT_TITLE);
            array_push($Ds_LAT,$row->PPT_LAT);
            array_push($Ds_LON,$row->PPT_LON);
            array_push($Ds_EXPO,$row->PPT_EXPOSURE);
            array_push($Ds_PRICE_A,$row->PPT_PRICE_A);
            array_push($Ds_PRICE_B,$row->PPT_PRICE_B);
            array_push($Ds_TYPE,$row->PPT_TYPE_A);
          }
          
				}
      }
      if($avg != 0 && $queryCh->num_rows() > 0){
        foreach($queryCh->result() as $row){
          $Ds_CH[]=$row;
        }
      }
      // 매물 리스트 순서 조건
      $querySort=" ORDER BY PPT_IDX DESC";
      if($sort=='RECOM'){
        $querySort = " ORDER BY PPT_IDX DESC";
      }else if($sort=='LATEST'){
        $querySort = " ORDER BY PPT_IDX DESC";
      }else if($sort=='BROAD'){
        $querySort = " ORDER BY  PPT_SIZE_A DESC, PPT_IDX DESC ";
      }else if($sort=='NARROW'){
        $querySort = " ORDER BY  PPT_SIZE_A ASC, PPT_IDX DESC ";
      }else if($sort=='LOW'){
        $querySort = " ORDER BY PPT_PRICE_A ASC, PPT_IDX DESC ";
      }else if($sort=='HIGH'){
        $querySort = " ORDER BY PPT_PRICE_A DESC, PPT_IDX DESC ";
      }
      // 매물리스트 쿼리
      if($key){
        $query_select = $this->db->query("SELECT * FROM CODE_F_TB WHERE CFT_IDX='".$key."' AND CFT_DELETE_DATE IS NULL ORDER BY CFT_IDX DESC");
        $row_select = $query_select->row();
        //$queryWhere.=" AND PPT_AREA_A='".$row_select->CFT_AREA_A."' AND PPT_AREA_B='".$row_select->CFT_AREA_B."' AND PPT_AREA_D='".$row_select->CFT_AREA_C."' ";
        //$queryWhere.=" AND (PPT_ADDR1_B LIKE '%".$row->CFT_AREA_A."%' AND PPT_ADDR1_B LIKE '%".$row->CFT_AREA_B."%' AND PPT_ADDR1_B LIKE '%".$row->CFT_AREA_C."%') ";
        $queryWhere.="  AND ((PPT_ADDR1_B LIKE '%".$row_select->CFT_AREA_A."%' OR PPT_AREA_A='".$row_select->CFT_AREA_A."') AND (PPT_ADDR1_B LIKE '%".$row_select->CFT_AREA_B."%' OR PPT_AREA_B='".$row_select->CFT_AREA_B."') AND ( PPT_AREA_D='".$row_select->CFT_AREA_C."' OR PPT_AREA_C='".$row_select->CFT_AREA_C."' )) ";
        
      }
      $query = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(PPT_LAT))*cos(radians(PPT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(PPT_LAT)))) AS distance FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL ".$queryWhere." HAVING distance <= ".$km." ".$querySort." ");
      // 매물리스트 
      $html ="";
      if($query->num_rows() > 0){
        $totalCnt=0;
        foreach($query->result() as $row){

          $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_STATE ='A' AND PST_IDX='".$row->PST_IDX."' AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ORDER BY PST_IDX DESC");
          $slotCnt = $querySlot->num_rows();
          if($slotCnt>0){
            if($row->PPT_EXPOSURE=='노출'){
              $PPT_ADDR = decrypt($row->PPT_ADDR1_B);
            }else{
              $PPT_ADDR = $row->PPT_AREA_A." ".$row->PPT_AREA_B." ".$row->PPT_AREA_C;
            }
            if($row->PPT_ALLOW_INDUSTRY != "추천 없음"){
              $PPT_ALLOW_INDUSTRY = explode("|", $row->PPT_ALLOW_INDUSTRY);
              $PPT_ALLOW_INDUSTRY_CNT = COUNT($PPT_ALLOW_INDUSTRY);
              if($PPT_ALLOW_INDUSTRY_CNT > 3){
                $PPT_ALLOW_INDUSTRY_CNT = 3;
              }
            }
            $query_img = $this->db->query("SELECT * FROM PROPERTY_IMG_TB WHERE PPT_IDX='".$row->PPT_IDX."' AND PIT_DELETE_DATE IS NULL ORDER BY PIT_IDX DESC LIMIT 1");
            $row_img = $query_img->row();

            $html .="<div class=\"con-row\" dataA=\"\">";
            $html .="<a href=\"javascript:list_detail('".$row->PPT_IDX."');\" class=\"product clearfix\" data1=\"".$row->PPT_LAT."\" data2=\"".$row->PPT_LON."\">";
            $html .="<div class=\"img-wrap\">";
            $html .="<img src=\"/uploads/".$row_img->PIT_IMG_SAVE."\" alt=\"매물사진\">";
            $html .="</div>";
            $html .="<div class=\"text-wrap\">";
            $html .="<p class=\"row01\">";
            $html .="<span class=\"title\">".$row->PPT_TITLE."</span>";
            $html .="</p>";
            $html .="<p class=\"row03\">";
            $html .="<span class=\"area\">".$row->PPT_SIZE_B."</span><span class=\"text-unit\">m²</span>";
            $html .="</p>";
            $html .="<p class=\"row02\">";
            $html .="<span class=\"type\">월 </span>";
            $html .="<span class=\"deposit\">".number_format($row->PPT_PRICE_B)." 만원</span> / ";
            $html .="<span class=\"monthly-rent\">".number_format($row->PPT_PRICE_A)." 만원</span>";
            $html .="</p>";
            $html .="<p class=\"row04\">";
            $html .="권리금";
            if($row->PPT_PRICE_C_ETC=='비공개' || $row->PPT_PRICE_C_ETC=='권리금 없음'){
              $PPT_PRICE_C_ETC=str_replace('권리금' , '', $row->PPT_PRICE_C_ETC);
              $html .="<span class=\"expense\"> ".$PPT_PRICE_C_ETC."</span>";
            }else if($row->PPT_PRICE_C_ETC=='협의가능'){
              $html .="<span class=\"expense\"> ".number_format($row->PPT_PRICE_C)." (협의가능)</span>";
            }else{
              $html .="<span class=\"expense\"> ".number_format($row->PPT_PRICE_C)."</span>";
            }
            

            if($row->PPT_EXPOSURE=='노출'){
              $html .="<p class=\"row05 add\">".decrypt($row->PPT_ADDR1_B)."</p>";
            }else{
              $html .="<p class=\"row05 add\">".$row->PPT_AREA_A." ".$row->PPT_AREA_B." ".$row->PPT_AREA_D."</p>";
            }
            $html .="</div>";
            $html .="</a>";
            if($this -> session ->userdata('LOGIN_IDX')){
              $query_cart = $this->db->query("SELECT * FROM CART_TB WHERE CTT_KEY='".$row->PPT_IDX."' AND CTT_TYPE='prod' AND MET_KEY='".$this -> session ->userdata('LOGIN_IDX')."' AND CTT_DELETE_DATE IS NULL ORDER BY CTT_IDX DESC");
              if($query_cart->num_rows() > 0){
                $html .="<a href=\"javascript:void(0);\" class=\"btn-heart on like_btn".$row->PPT_IDX."\" id=\"like_btn".$row->PPT_IDX."\" onclick=\"productCart('click','".$row->PPT_IDX."','".$this -> session ->userdata('LOGIN_IDX')."');\">";
              }else{
                $html .="<a href=\"javascript:void(0);\" class=\"btn-heart like_btn".$row->PPT_IDX."\" id=\"like_btn".$row->PPT_IDX."\" onclick=\"productCart('click','".$row->PPT_IDX."','".$this -> session ->userdata('LOGIN_IDX')."');\">";
              }
            }else{
              $html .="<a href=\"javascript:void(0);\" class=\"btn-heart like_btn".$row->PPT_IDX."\" onclick=\"alert('로그인 후 서비스 이용이 가능합니다.')\">";
            }
            $html .="<div class=\"icon-wrap on\"></div>";
            $html .="<span class=\"blind\">하트</span>";
            $html .="</a>";
            $html .="</div>";
            $totalCnt++;
          }
        }
      }
      // 매물 수
      if($query->num_rows() > 0){
        $PPT_CNT = $totalCnt;
      }else{
        $PPT_CNT = 0;
      }
      $data=[];
    // 지도영역 지하철 데이터
    if($type=='dong'){
      $queryT = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(DHT_LAT))*cos(radians(DHT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(DHT_LAT)))) AS distance FROM DATA_H_TB WHERE DHT_DELETE_DATE IS NULL HAVING distance <= ".$km." ORDER BY DHT_IDX DESC");
      if($queryT->num_rows() > 0){
        foreach($queryT->result() as $row){
          $data[]=$row;
        }
      }
    }

  return
  [array(
  "test" => "TEST",
  "area_type" => $type, // 지도 확대 TYPE
  "PPT_LIST" => $html, // 매물 리스트
  "PPT_CNT" => $PPT_CNT, // 매물 수량
  "Ds_CNT" => $Ds_CNT, // 해당지역별 매물수
  "Ds_KEY" => $Ds_KEY, // 해당지역마커 키
  "Ds_NAME" => $Ds_NAME, // 해당지역 마커 명칭
  "Ds_LAT" => $Ds_LAT, // 해당지역 마커 위도
  "Ds_LON" => $Ds_LON, // 해당지역 마커 경도
  "Ds_AVG" => $Ds_AVG, // 해당지역 마커 경도
  "Ds_CH" => $Ds_CH, // 해당지역 마커 경도
  "Ds_ADDR" => $Ds_ADDR, // 해당지역 마커 경도
  "Ds_EXPO" => $Ds_EXPO,
  "Ds_PRICE_A" => $Ds_PRICE_A,
  "Ds_PRICE_B" => $Ds_PRICE_B,
  "Ds_TYPE" => $Ds_TYPE

  ),$data]; // 지하철 리스트
  }
  function prDetail($PPT_IDX){ // 지도역역 위치 이동시 해당영역 데이터 / 인자값(지도래벨,구분,위도,경도)
    $img=array();
    
    $query = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_IDX='".$PPT_IDX."' AND PPT_DELETE_DATE IS NULL
    ORDER BY PPT_IDX DESC");
    
    if($query->num_rows() > 0){
      foreach($query->result() as $row){
        $query_img = $this->db->query("SELECT * FROM PROPERTY_IMG_TB WHERE PPT_IDX='".$row->PPT_IDX."' AND
        PIT_DELETE_DATE IS NULL ORDER BY PIT_IDX DESC");
        if($query_img->num_rows() > 0){
          foreach($query_img->result() as $row_img){
            array_push($img,$row_img->PIT_IMG_SAVE);
          }
        }
        $data[]=$row;
        $data["P_NUM"]=date("Ymd", strtotime($row->PPT_REG_DATE)).str_pad($row->PPT_IDX, 3, "0", STR_PAD_LEFT);;
      }
      $DFT_TYPE = array();
      $DFT_NAME = array();
      $DFT_Distance = array();
      $query_DF = $this->db->query("SELECT * ,
      (6371*acos(cos(radians(".$row->PPT_LAT."))*cos(radians(DFT_LAT))*cos(radians(DFT_LON)-radians(".$row->PPT_LON."))+sin(radians(".$row->PPT_LAT."))*sin(radians(DFT_LAT))))
      AS distance FROM DATA_F_TB WHERE DFT_DELETE_DATE IS NULL HAVING distance <= '0.5' ORDER BY distance ASC");
        foreach($query_DF->result() as $row_DF){
          array_push($DFT_TYPE,$row_DF->DFT_TYPE_A);
          array_push($DFT_NAME,$row_DF->DFT_NAME);
          $lat1=$row->PPT_LAT;
          $lon1=$row->PPT_LON;
          $lat2=$row_DF->DFT_LAT;
          $lon2=$row_DF->DFT_LON;

          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $Distance = $miles * 1.609344;
          $Distance = $Distance*1000;
            array_push($DFT_Distance,round($Distance));

        }
        if($row->PPT_USER_TYPE=='A'){
          $query_bk = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_IDX='".$row->USER_IDX."' AND BKT_DELETE_DATE IS  NULL ORDER BY BKT_IDX DESC");
          $row_bk = $query_bk->row();
          $query_bs = $this->db->query("SELECT * FROM BROKER_SUB_TB WHERE BST_IDX='".$row->BST_IDX."' AND BST_DELETE_DATE IS  NULL ORDER BY BST_IDX DESC");
          $bkImg=$row_bk->BKT_IMG_SAVE;
          $bkCompany=$row_bk->BKT_COMPANY;
          $bkAddr=decrypt($row_bk->BKT_ADDR1)." ".decrypt($row_bk->BKT_ADDR2);
          if($query_bs->num_rows() > 0){
            $row_bs = $query_bs->row();
            $bkName=decrypt($row_bs->BST_NAME);
            $bkTel=decrypt($row_bs->BST_HP);
          }else{
            $bkName=decrypt($row_bk->BKT_NAME);
            $bkTel=decrypt($row_bk->BKT_TEL);
          }
          $bkIdx=$row_bk->BKT_IDX;
          $query_BP_LIST = $this->db->query("SELECT * FROM PROPERTY_TB WHERE USER_IDX='".$row_bk->BKT_IDX."' AND PPT_DELETE_DATE IS NULL ORDER BY PPT_IDX DESC");
          $PIT_IMG=array();
        
          foreach($query_BP_LIST->result() as $row){
            $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_STATE ='A' AND PST_IDX='".$row->PST_IDX."' AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ORDER BY PST_IDX DESC");
            $slotCnt = $querySlot->num_rows();
            if($slotCnt > 0){
              $BP_row[]=$row;
              $query_BPimg = $this->db->query("SELECT * FROM PROPERTY_IMG_TB WHERE PPT_IDX='".$row->PPT_IDX."' AND
              PIT_DELETE_DATE IS NULL ORDER BY PIT_IDX DESC LIMIT 1");
              $row_BPimg = $query_BPimg->row();
              array_push($PIT_IMG,$row_BPimg->PIT_IMG_SAVE);
            }
          }
        }else{
          $query_mt = $this->db->query("SELECT * FROM MEM_TB WHERE MET_IDX='".$row->USER_IDX."' AND MET_DELETE_DATE IS  NULL ORDER BY MET_IDX DESC");
          $row_mt = $query_mt->row();
          $bkImg="";
          $bkCompany="";
          $bkAddr="";
          $bkName=decrypt($row_mt->MET_NAME);
          $bkTel=decrypt($row_mt->MET_TEL);
          $bkIdx="";
          $PIT_IMG[]="";
          $BP_row[]="";
        }

        $queryCart = $this->db->query("SELECT * FROM CART_TB WHERE CTT_DELETE_DATE IS NULL AND MET_KEY='".$this -> session ->userdata('LOGIN_IDX')."' AND CTT_TYPE='prod' AND CTT_KEY='".$PPT_IDX."' ORDER BY CTT_IDX DESC");
          
        $cart="";
        
        if($queryCart->num_rows() > 0){
          $cart = true;
        }else{
          $cart = false;
        }
        $data["cart"]=$cart;

        $BP_row["PIT_IMG"]=$PIT_IMG;
        return [$data,$img,$DFT_TYPE,$DFT_NAME,array(
          "BKT_IMG_SAVE" => $bkImg, // 지도 확대 TYPE
          "BKT_COMPANY" => $bkCompany, // 매물 리스트
          "BKT_ADDR" => $bkAddr, // 매물 수량
          "BKT_NAME" => $bkName, // 해당지역별 매물수
          "BKT_TEL" => $bkTel,
          "BKT_IDX" => $bkIdx
        ),$BP_row,$DFT_Distance];
      }
      return false;
    }

    function table_MSlist($PTT_IDX,$cur_lat,$cur_lon){ // 매물검색 리스트 / 인자값(키값,위도,경도)
      $cart=array();
      if($PTT_IDX && $cur_lat && $cur_lon){
        $where=" PTT_DELETE_DATE IS NULL AND PTT_IDX='".$PTT_IDX."' ";
      }else{
        $where=" PTT_DELETE_DATE IS NULL ";
      }
      $where .= " HAVING distance <= 1.5"; // 0.1 - 100m , 1 - 1km
      $query = $this->db->query("SELECT * , (6371*acos(cos(radians(".$cur_lat."))*cos(radians(PTT_LAT))*cos(radians(PTT_LON)-radians(".$cur_lon."))+sin(radians(".$cur_lat."))*sin(radians(PTT_LAT)))) AS distance FROM PARTNER_TB WHERE ".$where." ORDER BY PTT_IDX DESC");
      $tab_cnt=array();
      $tab_cnt["A"]=0;$tab_cnt["B"]=0;$tab_cnt["C"]=0;$tab_cnt["D"]=0;$tab_cnt["E"]=0;$tab_cnt["F"]=0;$tab_cnt["G"]=0;$tab_cnt["H"]=0;
			if($query->num_rows() > 0){
        foreach($query->result() as $row){
          if($row->PTT_TYPE=='인테리어'){
            if($tab_cnt["A"]==0){
              $tab_cnt["A"]=1;
            }else{
              $tab_cnt["A"]++;
            }
          }else if($row->PTT_TYPE=='가구'){
            if($tab_cnt["B"]==0){
              $tab_cnt["B"]=1;
            }else{
              $tab_cnt["B"]++;
            }
          }else if($row->PTT_TYPE=='주방/설비'){
            if($tab_cnt["C"]==0){
              $tab_cnt["C"]=1;
            }else{
              $tab_cnt["C"]++;
            }
          }else if($row->PTT_TYPE=='간판'){
            if($tab_cnt["D"]==0){
              $tab_cnt["D"]=1;
            }else{
              $tab_cnt["D"]++;
            }
          }else if($row->PTT_TYPE=='광고/인쇄'){
            if($tab_cnt["E"]==0){
              $tab_cnt["E"]=1;
            }else{
              $tab_cnt["E"]++;
            }
          }else if($row->PTT_TYPE=='통신/보안'){
            if($tab_cnt["F"]==0){
              $tab_cnt["F"]=1;
            }else{
              $tab_cnt["F"]++;
            }
          }else if($row->PTT_TYPE=='렌탈'){
            if($tab_cnt["G"]==0){
              $tab_cnt["G"]=1;
            }else{
              $tab_cnt["G"]++;
            }
          }else if($row->PTT_TYPE=='기타'){
            if($tab_cnt["H"]==0){
              $tab_cnt["H"]=1;
            }else{
              $tab_cnt["H"]++;
            }
          }
					$data[]=$row;
          $query_case = $this->db->query("SELECT * FROM CASE_TB WHERE PTT_IDX='".$row->PTT_IDX."' AND CST_DELETE_DATE IS NULL ORDER BY CST_IDX DESC");
          $row_case = $query_case->row();
          $data_case["review_cnt"]=0;
          foreach($query_case->result() as $row_case){
            $data_case[]=$row_case;
            $query_review = $this->db->query("SELECT * FROM CASE_REVIEW_TB WHERE CST_IDX='".$row_case->CST_IDX."' AND CRT_DELETE_DATE IS NULL ORDER BY CRT_IDX DESC");
            $data_case["review_cnt"]++;
          }
          $queryCart = $this->db->query("SELECT * FROM CART_TB WHERE CTT_KEY='".$row->PTT_IDX."' AND MET_KEY='".$this -> session ->userdata('LOGIN_IDX')."' AND CTT_TYPE='make' AND CTT_DELETE_DATE IS NULL ORDER BY CTT_IDX DESC");
          if($queryCart->num_rows() > 0){
            array_push($cart,"true");
          }else{
            array_push($cart,"false");
          }
				}
        return [$data,$query->num_rows(),$tab_cnt,$data_case,$cart];
			}else{
        return ["0",$query->num_rows(),0,0,$cart];
      }
			return false;
    }

    function table_MSMap($PTT_IDX,$cur_lat,$cur_lon){ // 지도 행정동 데이터 리스트 / 인자값(키값,위도,경도)

      $query = $this->db->query("SELECT * , (6371*acos(cos(radians(".$cur_lat."))*cos(radians(PTT_LAT))*cos(radians(PTT_LON)-radians(".$cur_lon."))+sin(radians(".$cur_lat."))*sin(radians(PTT_LAT)))) AS distance FROM PARTNER_TB WHERE PTT_DELETE_DATE IS NULL HAVING distance <= 2 ORDER BY PTT_IDX DESC");
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return [$data,$query->num_rows()];
			}
			return false;
    }

    function table_MSSubway($PTT_IDX,$cur_lat,$cur_lon){ // 지도 지하철 데이터 리스트 / 인자값(키값,위도,경도)

      $query = $this->db->query("SELECT * , (6371*acos(cos(radians(".$cur_lat."))*cos(radians(DHT_LAT))*cos(radians(DHT_LON)-radians(".$cur_lon."))+sin(radians(".$cur_lat."))*sin(radians(DHT_LAT)))) AS distance FROM DATA_H_TB WHERE DHT_DELETE_DATE IS NULL HAVING distance <= 2 ORDER BY DHT_IDX DESC");
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return [$data,$query->num_rows()];
			}
			return false;
    }

    function table_MSdongCnt($areaA,$areaB,$areaC){ // 지도영역 해당 행정동 매물갯수 / 인자값(시/도,구/군,동/면/리)

      $query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_AREA_A='".$areaA."' AND PTT_AREA_B='".$areaB."' AND PTT_AREA_C='".$areaC."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC");
				return [$query->num_rows()];
			return false;
    }
    function searchKeyword($search,$page_name,$p_type){ // 지도영역 해당 행정동 매물갯수 / 인자값(시/도,구/군,동/면/리)
      if(!$p_type){
        $p_type="상가";
      }
      $where ="";
      $sort ="";
      $search_ex =explode(" ", $search);
      $search_cnt = COUNT($search_ex);
      if($search_cnt > 1){
        $where =" AND ( CFT_AREA_A LIKE '%".$search."%' OR CFT_AREA_B LIKE '%".$search."%' OR CFT_AREA_C LIKE '%".$search."%' ";
        for($i=0; $i < $search_cnt; $i++){
          $where .=" OR CFT_AREA_A LIKE '%".$search_ex[$i]."%' OR CFT_AREA_B LIKE '%".$search_ex[$i]."%' OR CFT_AREA_C LIKE '%".$search_ex[$i]."%' ";
        }
        $where .=" ) ";
        $sort =" ORDER BY CASE WHEN CFT_AREA_C LIKE '%".$search."%' THEN 0 ";
			  $sort .=" WHEN ";
        for($k=0; $k < $search_cnt; $k++){
          if($k==0){
            $sort .=" CFT_AREA_C LIKE'%".$search_ex[$k]."%' ";
          }else{
            $sort .=" AND CFT_AREA_C LIKE'%".$search_ex[$k]."%' ";
          }
        }
        $sort .=" THEN 1 ";
		  	$j=2;
        for($i=0; $i < $search_cnt; $i++){
          $sort .=" WHEN CFT_AREA_A LIKE '%".$search_ex[$i]."%' THEN ".$j." ";
          $j++;
          $sort .=" WHEN CFT_AREA_B LIKE '%".$search_ex[$i]."%' THEN ".$j." ";
          $j++;
          $sort .=" WHEN CFT_AREA_C LIKE '%".$search_ex[$i]."%' THEN ".$j." ";
          $j++;
        }
        $sort .=" ELSE ".$j." END LIMIT 10";
      }else{
        $where =" AND (CFT_AREA_A LIKE '%".$search."%' || CFT_AREA_B LIKE '%".$search."%' || CFT_AREA_C LIKE '%".$search."%') ";
        $sort =" ORDER BY CFT_IDX ASC";
      }

      $query = $this->db->query("SELECT * FROM CODE_F_TB WHERE CFT_DELETE_DATE IS NULL ".$where." ".$sort."");
      $item="";
      $SCH_KEY="";
      $loc_lat="";
      $loc_lon="";
      $html="";
      $type="";
      $z=0;
      $htmlArea="";
      $htmlSwy="";
      $html .="<ul id=\"kwd_list\" class=\"kwd_list kwd_list01\">";
      $htmlArea .="<ul id=\"kwd_list\" class=\"kwd_list kwd_list01\">";
      foreach($query->result() as $row){
        $item = $row->CFT_AREA_A." ".$row->CFT_AREA_B." ".$row->CFT_AREA_C;
        if($search_cnt > 1){
          for($i=0; $i < $search_cnt; $i++){
            // 검색 키워드 리스트 명칭특정화
            $item = str_replace($search_ex[$i], "<span class=\"red\">".$search_ex[$i]."</span>", $item);
          }
        }else{
          $item = str_replace($search, "<span class=\"red\">".$search."</span>", $item);
        }
        // 리스트 링크 구분
        if($page_name == '/main/search' || $page_name == '/main/Msearch'){
          $html .="<li class=\"item _item item_area\" onclick=\"location.href='/main/search?type=area&SCH_IDX=".$row->CFT_IDX."&loc_lat=".$row->CFT_LAT."&loc_lon=".$row->CFT_LON."&search_map=".strip_tags($item)."&p_type=".$p_type."';\"> ".$item."</li>";
          $htmlArea .="<li class=\"item _item item_area\" onclick=\"location.href='/main/search?type=area&SCH_IDX=".$row->CFT_IDX."&loc_lat=".$row->CFT_LAT."&loc_lon=".$row->CFT_LON."&search_map=".strip_tags($item)."&p_type=".$p_type."';\"> ".$item."</li>";
        }else{
          $html .="<li class=\"item _item item_area\" onclick=\"location.href='/main/makeSearch?type=area&SCH_IDX=".$row->CFT_IDX."&loc_lat=".$row->CFT_LAT."&loc_lon=".$row->CFT_LON."&search_map=".strip_tags($item)."&p_type=".$p_type."';\"> ".$item."</li>";
          $htmlArea .="<li class=\"item _item item_area\" onclick=\"location.href='/main/makeSearch?type=area&SCH_IDX=".$row->CFT_IDX."&loc_lat=".$row->CFT_LAT."&loc_lon=".$row->CFT_LON."&search_map=".strip_tags($item)."&p_type=".$p_type."';\"> ".$item."</li>";
        }
        if($z==0){
          $type="area";
          $SCH_KEY = $row->CFT_IDX;
          $loc_lat = $row->CFT_LAT;
          $loc_lon = $row->CFT_LON;
        }
        $z++;
      }
      $html .="</ul>";
      $htmlArea .="</ul>";

      $html .="<ul id=\"kwd_list\" class=\" kwd_list kwd_list02\">";
      $htmlSwy .="<ul id=\"kwd_list\" class=\" kwd_list kwd_list02\">";
      $querySw = $this->db->query("SELECT * FROM DATA_E_TB WHERE DET_DELETE_DATE IS NULL AND DET_NAME LIKE '%".$search."%' ORDER BY DET_IDX DESC");
      $cnt_Sw = $querySw->num_rows();
      foreach($querySw->result() as $rowSw){
        $item = $rowSw->DET_NAME;
        if($search_cnt > 1){
          for($i=0; $i < $search_cnt; $i++){
            $item = str_replace($search_ex[$i], "<span class=\"red\">".$search_ex[$i]."</span>", $item);
          }
        }else{
          $item = str_replace($search, "<span class=\"red\">".$search."</span>", $item);
        }
        if($page_name == '/main/search'){
          $html .="<li class=\"item _item item_swy\" onclick=\"location.href='/main/search?type=subway&SCH_IDX=".$rowSw->DET_IDX."&loc_lat=".$rowSw->DET_LAT."&loc_lon=".$rowSw->DET_LON."&search_map=".strip_tags($item)."&p_type=".$p_type."';\"> [".$rowSw->DET_AREA_A." ".$rowSw->DET_NUM."] ".$item."</li>";
          $htmlSwy .="<li class=\"item _item item_swy\" onclick=\"location.href='/main/search?type=subway&SCH_IDX=".$rowSw->DET_IDX."&loc_lat=".$rowSw->DET_LAT."&loc_lon=".$rowSw->DET_LON."&search_map=".strip_tags($item)."&p_type=".$p_type."';\"> [".$rowSw->DET_AREA_A." ".$rowSw->DET_NUM."] ".$item."</li>";
        }else{
          $html .="<li class=\"item _item item_swy\" onclick=\"location.href='/main/makeSearch?type=subway&SCH_IDX=".$rowSw->DET_IDX."&loc_lat=".$rowSw->DET_LAT."&loc_lon=".$rowSw->DET_LON."&search_map=".strip_tags($item)."&p_type=".$p_type."';\"> [".$rowSw->DET_AREA_A." ".$rowSw->DET_NUM."] ".$item."</li>";
          $htmlSwy .="<li class=\"item _item item_swy\" onclick=\"location.href='/main/makeSearch?type=subway&SCH_IDX=".$rowSw->DET_IDX."&loc_lat=".$rowSw->DET_LAT."&loc_lon=".$rowSw->DET_LON."&search_map=".strip_tags($item)."&p_type=".$p_type."';\"> [".$rowSw->DET_AREA_A." ".$rowSw->DET_NUM."] ".$item."</li>";
        }
        if($z==0){
          $type="subway";
          $SCH_KEY = $rowSw->DET_IDX;
          $loc_lat = $rowSw->DET_LAT;
          $loc_lon = $rowSw->DET_LON;
        }
      }
      $html .="</ul>";
      $htmlSwy .="</ul>";
      
      $search = strip_tags($item);
				return array(
          "SCH_LIST" => $html, // 리스트
          "SCH_LIST_AREA" => $htmlArea, // 리스트
          "SCH_LIST_SWY" => $htmlSwy, // 리스트
          "SCH_KEY" => $SCH_KEY,
          "loc_lat" => $loc_lat,
          "loc_lon" => $loc_lon,
          "type" => $type,
          "p_type" => $p_type,
          "search" => $item
        );
			return false;
    }

    function mkmoveList($level,$type,$lat,$lon,$sort,$myKey,$opt,$keyword){ // 지도역역 위치 이동시 해당영역 데이터 / 인자값(지도래벨,구분,위도,경도)
      // 지도 래벨 별 거리 조절
      if($level >= '18'){
        $km = "0.4";
      }else if($level == '17'){
        $km = "0.7";
      }else if($level == '16'){
        $km = "1.5";
      }else if($level ==  '15'){
        $km = "3";
      }else if($level ==  '14'){
        $km = "5.3";
      }else if($level=='13'){
        $km = "9.6";
      }else if($level=='12'){
        $km = "20";
      }else if($level=='11'){
        $km = "38";
      }else if($level=='10'){
        $km = "78";
      }else if($level=='9'){
        $km = "120";
      }else if($level=='8'){
        $km = "160";
      }

      // 옵션 적용
      $queryWhere=" AND PTT_DELETE_DATE IS NULL ";
      if(count($opt) > 0){
        $queryWhere .=" AND ( ";
        for($i=0; $i<count($opt);$i++){
          if($i==0){
            $queryWhere .=" PTT_TYPE ='".$opt[$i]."' ";
          }else{
            $queryWhere .=" OR PTT_TYPE ='".$opt[$i]."' ";
          }
        }
      }
      $queryWhere .=" ) ";
      if($keyword){
        $queryWhere .=" AND ( PTT_NAME LIKE '%".encrypt($keyword)."%' OR PTT_TEXT LIKE '%".$keyword."%' OR PTT_AREA LIKE '%".$keyword."%' ) ";
      }
      /*if(count($opt) > 0){
        $queryWhere .=" OR PPT_TYPE ='인테리어' ";
      }*/
      // 지도영역 마커
      $Pt_CNT=array();
      $Pt_KEY=array();
      $Pt_TYPE=array();
      $Pt_NAME=array();
      $Pt_LAT=array();
      $Pt_LON=array();
      $PTT_CNT=0;
      $html ="";
      if($type=='dong'){
        $queryDs = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(PTT_LAT))*cos(radians(PTT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(PTT_LAT)))) AS distance FROM PARTNER_TB WHERE PTT_DELETE_DATE IS NULL ".$queryWhere." HAVING distance <= ".$km." ORDER BY PTT_IDX DESC");
      }else if($type=='gugun'){
        $queryDs = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CET_LAT))*cos(radians(CET_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CET_LAT)))) AS distance FROM CODE_E_TB WHERE CET_DELETE_DATE IS NULL HAVING distance <= ".$km." ORDER BY CET_IDX DESC");
      }else if($type=='sido'){
        $queryDs = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(CDT_LAT))*cos(radians(CDT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(CDT_LAT)))) AS distance FROM CODE_D_TB WHERE CDT_DELETE_DATE IS NULL HAVING distance <= ".$km." ORDER BY CDT_IDX DESC");
      }
      if($queryDs->num_rows() > 0){
        foreach($queryDs->result() as $row){
          if($type=='dong'){
            array_push($Pt_CNT, 0);
            array_push($Pt_KEY,$row->PTT_IDX);
            array_push($Pt_TYPE,$row->PTT_TYPE);
            array_push($Pt_NAME,decrypt($row->PTT_NAME));
            array_push($Pt_LAT,$row->PTT_LAT);
            array_push($Pt_LON,$row->PTT_LON);
          }else if($type=='gugun'){
            $queryPr = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_DELETE_DATE IS NULL AND PTT_AREA_A='".$row->CET_AREA_A."' AND PTT_AREA_B='".$row->CET_AREA."' ".$queryWhere." ORDER BY PTT_IDX DESC");
            array_push($Pt_CNT, $queryPr->num_rows());
            array_push($Pt_KEY,$row->CET_IDX);
            array_push($Pt_NAME,$row->CET_AREA);
            array_push($Pt_LAT,$row->CET_LAT);
            array_push($Pt_LON,$row->CET_LON);
          }else if($type=='sido'){
            $queryPr = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_DELETE_DATE IS NULL AND PTT_AREA_A='".$row->CDT_AREA."' ".$queryWhere." ORDER BY PTT_IDX DESC");
            array_push($Pt_CNT, $queryPr->num_rows());
            array_push($Pt_KEY,$row->CDT_IDX);
            array_push($Pt_NAME,$row->CDT_AREA);
            array_push($Pt_LAT,$row->CDT_LAT);
            array_push($Pt_LON,$row->CDT_LON);
          }
          
				}
      }
      // 매물 리스트 순서 조건
      $querySort=" ORDER BY distance ASC ";
      if($sort=='거리순'){
        $querySort = " ORDER BY distance ASC ";
      }else if($sort=='경력순'){
        $querySort = " ORDER BY PTT_CAREER DESC ";
      }
      // 매물리스트 쿼리
      $query = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(PTT_LAT))*cos(radians(PTT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(PTT_LAT)))) AS distance FROM PARTNER_TB WHERE PTT_DELETE_DATE IS NULL ".$queryWhere." HAVING distance <= ".$km." ".$querySort." ");
      // 매물리스트 
      $tb1="0";$tb2="0";$tb3="0";$tb4="0";$tb5="0";$tb6="0";$tb7="0";$tb8="0";
      if($query->num_rows() > 0){
        foreach($query->result() as $row){
          if($row->PTT_TYPE=='인테리어'){
            $tb1++;
          }else if($row->PTT_TYPE=='가구'){
            $tb2++;
          }else if($row->PTT_TYPE=='주방/설비'){
            $tb3++;
          }else if($row->PTT_TYPE=='간판'){
            $tb4++;
          }else if($row->PTT_TYPE=='광고/인쇄'){
            $tb5++;
          }else if($row->PTT_TYPE=='통신/보안'){
            $tb6++;
          }else if($row->PTT_TYPE=='렌탈'){
            $tb7++;
          }else if($row->PTT_TYPE=='기타'){
            $tb8++;
          }
          $query_case = $this->db->query("SELECT * FROM CASE_TB WHERE PTT_IDX='".$row->PTT_IDX."' AND CST_DELETE_DATE IS NULL ORDER BY CST_IDX DESC");
          $review_cnt=0;
          $data_case=array();
          if($query_case->num_rows() > 0){
            foreach($query_case->result() as $row_case){
              $data_case[]=$row_case;
              $query_review = $this->db->query("SELECT * FROM CASE_REVIEW_TB WHERE CST_IDX='".$row_case->CST_IDX."' AND CRT_DELETE_DATE IS NULL ORDER BY CRT_IDX DESC");
              $review_cnt+=$query_review->num_rows();
            }
          }
          $my_car1="";
          $my_cart2="";
          $query_cart = $this->db->query("SELECT * FROM CART_TB WHERE CTT_KEY='".$row->PTT_IDX."' AND CTT_TYPE='make' AND MET_KEY='".$this -> session ->userdata('LOGIN_IDX')."' AND CTT_DELETE_DATE IS NULL ORDER BY CTT_IDX DESC");
          if($query_cart->num_rows() > 0){
            $my_cart1="on";
            $my_cart2="";
          }else{
            $my_cart1="";
            $my_cart2="on";
          }

          $html .="<div class=\"con-row\" onclick=\"list_detail('".$row->PTT_IDX."');\">";
          $html .="<a href=\"javascript:list_detail('".$row->PTT_IDX."');\" class=\"btn-campany\">";
          $html .="<div class=\"title-wrap\">";
          $html .="<div class=\"img-wrap\">";
          if($row->PTT_IMG_SAVE){
            $html .="<img src=\"/uploads/".$row->PTT_IMG_SAVE."\" alt=\"업체로고\" id=\"detail_img1\">";
          }else{
            $html .="<img src=\"/img/m01.png\" alt=\"업체로고\" id=\"detail_img1\">";
          }
          $html .="</div>";
          $html .="</div>";
          $html .="<div class=\"text-wrap\">";
          $html .="<p class=\"sector\">";
          $html .="<span>".$row->PTT_TYPE."</span>";
          $html .="</p>";
          $html .="<h5 class=\"title\" onclick=\"list_detail('".$row->PTT_IDX."');\">".decrypt($row->PTT_NAME)."</h5>";
          $html .="<p class=\"text-de\">".strip_tags($row->PTT_TEXT)."</p>";
          $html .="<div class=\"review-box\">";
          $html .="</div>";
          $html .="</div>";
          $html .="</a>";
          $html .="<div class=\"btn-wrap\">";
          $html .="<a class=\"call\" href=\"javascript:void(0);\">";
          $html .="<div class=\"img-wrap\">";
          $html .="<img src=\"/icon/call.png\" alt=\"전화아이콘\">";
          $html .="</div>";
          $html .="<p>".decrypt($row->PTT_TEL)."</p>";
          $html .="</a>";
          if(!$this -> session ->userdata('LOGIN_IDX')){
            $html .="<a href=\"javascript:alert('로그인 후 서비스 가능합니다.');\" class=\"btn-quoteContact \">";
          }else{
            $html .="<a href=\"javascript:void(0);\" data1=\"".$row->PTT_IDX."\" data2=\"".$this -> session ->userdata('LOGIN_IDX')."\" class=\"btn-quoteContact ".$my_cart1."\">";
          }
          $html .="<div class=\"img-wrap\">";
          $html .="<img src=\"/icon/estimate.png\" alt=\"견적서아이콘\">";
          $html .="</div>";
          $html .="<span class=\"blind ".$my_cart1."\">견적서 담기</span>";
          $html .="<p>견적서<span class=\"".$my_cart2."\">&nbsp;담기</span><span class=\"".$my_cart1."\">&nbsp;빼기</span></p>";
          $html .="</a>";
          $html .="</div>";
          $html .="<div>";
          $html .="<a href=\"javascript:void(0);\" class=\"btn-caseView\"  onclick=\"location.href='/main/constrCase?key=".$row->PTT_IDX."';\">시공사례 바로가기 <i class=\"xi-angle-right-thin\"></i><span class=\"caseTotalNum\">".$query_case->num_rows()."</span></a>";
          $html .="</div>";
          $html .="</div>";
        }
      }

      if($query->num_rows() > 0){
        $PTT_CNT = $query->num_rows();
      }else{
        $PTT_CNT = 0;
      }
      $data=[];
      // 지도영역 지하철 데이터
      if($type=='dong'){
        $queryT = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(DHT_LAT))*cos(radians(DHT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(DHT_LAT)))) AS distance FROM DATA_H_TB WHERE DHT_DELETE_DATE IS NULL HAVING distance <= ".$km." ORDER BY DHT_IDX DESC");
        if($queryT->num_rows() > 0){
          foreach($queryT->result() as $row){
            $data[]=$row;
          }
        }
      }
      $myProdLat=[];
      $myProdLon=[];
      if($myKey){
        $queryProd = $this->db->query("SELECT * FROM CART_TB WHERE CTT_DELETE_DATE IS NULL AND MET_KEY='".$myKey."' AND CTT_TYPE='prod' ORDER BY CTT_IDX DESC");
        if($queryProd->num_rows() > 0){
          foreach($queryProd->result() as $row){
            $queryProd = $this->db->query("SELECT * , (6371*acos(cos(radians(".$lat."))*cos(radians(PPT_LAT))*cos(radians(PPT_LON)-radians(".$lon."))+sin(radians(".$lat."))*sin(radians(PPT_LAT)))) AS distance FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_IDX='".$row->CTT_KEY."' ORDER BY PPT_IDX DESC");
            $rowProd = $queryProd->row();
            $myProdLat[]=$rowProd->PPT_LAT;
            $myProdLon[]=$rowProd->PPT_LON;
          }
        }
      }
      
      return
      [array(
      "test"=>"test",
      "area_type" => $type, // 지도 확대 TYPE
      "PTT_LIST" => $html, // 매물 리스트
      "PTT_CNT" => $PTT_CNT, // 매물 수량
      "Pt_TYPE" => $Pt_TYPE, // 매물 수량
      "Pt_CNT" => $Pt_CNT, // 해당지역별 매물수
      "Pt_KEY" => $Pt_KEY, // 해당지역마커 키
      "Pt_NAME" => $Pt_NAME, // 해당지역 마커 명칭
      "Pt_LAT" => $Pt_LAT, // 해당지역 마커 위도
      "Pt_LON" => $Pt_LON // 해당지역 마커 경도
      ),$data,$myProdLat,$myProdLon,$tb1,$tb2,$tb3,$tb4,$tb5,$tb6,$tb7,$tb8]; // 지하철 리스트
      // return $km;
    }

    function mkDetail($PTT_IDX){ // 지도역역 위치 이동시 해당영역 데이터 / 인자값(지도래벨,구분,위도,경도)
      $query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_IDX='".$PTT_IDX."' AND PTT_DELETE_DATE IS NULL
      ORDER BY PTT_IDX DESC");
      if($query->num_rows() > 0){
        $case=array();
        $data=array();
        $cart="";
        foreach($query->result() as $row){
          $query_case = $this->db->query("SELECT * FROM CASE_TB WHERE PTT_IDX='".$row->PTT_IDX."' AND
          CST_DELETE_DATE IS NULL ORDER BY CST_IDX DESC");
          if($query_case->num_rows() > 0){
            foreach($query_case->result() as $row_case){
              $case[]=$row_case;
            }
          }
          $queryCart = $this->db->query("SELECT * FROM CART_TB WHERE CTT_KEY='".$row->PTT_IDX."' AND MET_KEY='".$this -> session ->userdata('LOGIN_IDX')."' AND CTT_TYPE='partner' AND
          CTT_DELETE_DATE IS NULL ORDER BY CTT_IDX DESC");
          if($queryCart->num_rows() > 0){
            $cart =true;
          }else{
            $cart =false;
          }
          $data[]=$row;
          $data["PTT_CEO"]=decrypt($row->PTT_CEO);
          $data["PTT_NAME"]=decrypt($row->PTT_NAME);
        }
        return [$data,$case,$cart];
      }else{
        return "error";
      }
    }

    function proCartCk($key,$idx){ // 찜한 매물 확인
      $query = $this->db->query("SELECT * FROM CART_TB WHERE CTT_DELETE_DATE IS NULL AND MET_KEY='".$idx."' AND CTT_TYPE='prod' AND CTT_KEY='".$key."' ORDER BY CTT_IDX DESC");
			if($query->num_rows() > 0){
        return true;
			}else{
  			return false;
      }
    }

    function table_Cslist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			if($search){
				$where .=" AND ( CST_TITLE LIKE '%".$search."%' OR CST_CONTENT LIKE '%".$search."%' OR CST_TYPE LIKE '%".$search."%' OR CST_ADDR1_A LIKE '%".$search."%' OR CST_ADDR1_B LIKE '%".$search."%' OR CST_ADDR2 LIKE '%".$search."%' ) ";
			}
			if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}

			if($orderWhere){
				$where .= $orderWhere;
			}
			
			$query = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ");
			$all_cnt = $query_cnt->num_rows();
      $pt_name =array();
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
          $query_partner = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_IDX='".$row->PTT_IDX."' AND
          PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC");
          $row_partner = $query_partner->row();
          array_push($pt_name,decrypt($row_partner->PTT_NAME));
				}
				return array($data,$all_cnt,$pt_name);
			}
			return false;
    }

    function table_CPlist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			
			if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}

			if($orderWhere){
				$where .= $orderWhere;
			}
			$query = $this->db->query("SELECT * FROM ".$tb_name." as a LEFT JOIN PROP_SLOT_TB as b ON a.PST_IDX = b.PST_IDX WHERE a.".$tb_type."_DELETE_DATE IS NULL AND b.PST_DELETE_DATE IS NULL AND b.PST_STATE ='A' AND b.PST_START <= '".date("Y-m-d")."' AND b.PST_END >= '".date("Y-m-d")."' ".$where." ORDER BY a.".$tb_type."_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM ".$tb_name." as a LEFT JOIN PROP_SLOT_TB as b ON a.PST_IDX = b.PST_IDX WHERE a.".$tb_type."_DELETE_DATE IS NULL AND b.PST_DELETE_DATE IS NULL AND b.PST_STATE ='A' AND b.PST_START <= '".date("Y-m-d")."' AND b.PST_END >= '".date("Y-m-d")."' ".$where." ORDER BY a.".$tb_type."_IDX DESC");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
        $prop=array();
        $propImg=array();
				foreach($query->result() as $row){
					$data[]=$row;
          $query_img = $this->db->query("SELECT * FROM PROPERTY_IMG_TB WHERE PPT_IDX='".$row->CTT_KEY."' AND PIT_DELETE_DATE IS NULL ORDER BY PIT_REPRES DESC, PIT_IDX DESC LIMIT 1");
          array_push($propImg,$query_img->row());
          $query_prop = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_IDX='".$row->CTT_KEY."' AND PPT_DELETE_DATE IS NULL ORDER BY PPT_IDX DESC");
          array_push($prop,$query_prop->row());
				}
				return array($data,$all_cnt,$propImg,$prop);
			}
			return false;
    }

    function table_CMlist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			
			if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}

			if($orderWhere){
				$where .= $orderWhere;
			}
			
			$query = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
        $make=array();
        foreach($query->result() as $row){
					$data[]=$row;
          $query_make = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_IDX='".$row->CTT_KEY."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC");
          array_push($make,$query_make->row());
				}
				return array($data,$all_cnt,$make);
			}
			return false;
    }

    function couns_list(){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			
			$MET_IDX = $this -> session ->userdata('LOGIN_IDX');

			$query = $this->db->query("SELECT * FROM CART_TB WHERE CTT_TYPE='make' AND MET_KEY='".$MET_IDX."' AND CTT_DELETE_DATE IS NULL ");
			if($query->num_rows() > 0){
        $make=array();
        $propImg=array();
        $makeTypeA=0;$makeTypeB=0;$makeTypeC=0;$makeTypeD=0;$makeTypeE=0;$makeTypeF=0;$makeTypeG=0;$makeTypeH=0;

				foreach($query->result() as $row){
					$data[]=$row;
          $query_make = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_IDX='".$row->CTT_KEY."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC");
          array_push($make,$query_make->row());
          $makeRow=$query_make->row();
          if($makeRow->PTT_TYPE=='인테리어'){
            $makeTypeA++;
          }else if($makeRow->PTT_TYPE=='가구'){
            $makeTypeB++;
          }else if($makeRow->PTT_TYPE=='주방/설비'){
            $makeTypeC++;
          }else if($makeRow->PTT_TYPE=='간판'){
            $makeTypeD++;
          }else if($makeRow->PTT_TYPE=='광고/인쇄'){
            $makeTypeE++;
          }else if($makeRow->PTT_TYPE=='통신/보안'){
            $makeTypeF++;
          }else if($makeRow->PTT_TYPE=='렌탈'){
            $makeTypeG++;
          }else if($makeRow->PTT_TYPE=='기타'){
            $makeTypeH++;
          }
          
				}
				return array($data,$make,$makeTypeA,$makeTypeB,$makeTypeC,$makeTypeD,$makeTypeE,$makeTypeF,$makeTypeG,$makeTypeH);
			}
			return false;
    }

    function mem_ck($key,$type){ // 네이버 회원 가입여부 확인
      if($type=='naver'){
        $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAVER='".$key."' ORDER BY MET_IDX DESC");
      }else if($type=='kakao'){
        $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_KAKAO='".$key."' ORDER BY MET_IDX DESC");
      }
      
      if($query->num_rows() > 0){
        $row = $query->row();
        return array($query->num_rows(),$row->MET_IDX, $row->MET_NAME, $row->MET_EMAIL, $row->MET_IMG_SAVE);
      }else{
        return array($query->num_rows(),"", "", "", "");
      }
    }
    function table_PSlist($key,$type,$state,$search,$bsCate,$slotKey){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
      if($state=='A' || $state=='B'){
        $wherePP="";$data="";
        if($slotKey){
          $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND USER_IDX='".$key."' AND PST_USER_TYPE='".$type."' AND PST_END >= '".date("Y-m-d")."' AND PST_STATE='A' AND PST_START <= '".date("Y-m-d")."' AND PST_IDX='".$slotKey."' ORDER BY PST_IDX DESC");
        }else{
          $querySlot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND USER_IDX='".$key."' AND PST_USER_TYPE='".$type."' AND PST_END >= '".date("Y-m-d")."' AND PST_STATE='A' AND PST_START <= '".date("Y-m-d")."' ORDER BY PST_IDX DESC LIMIT 1");
        }
        
        if($querySlot->num_rows() > 0){
          $Slot[] = $querySlot->row();
          $rowSlot = $querySlot->row();
          if($state=='A'){
            $wherePP .=" AND PPT_STATE='A' ";
          }else if($state=='B'){
            $wherePP .=" AND PPT_STATE='B' ";
          }
          
          if($search){
            $wherePP .=" AND ( PPT_TITLE LIKE '%".$search."%' OR PPT_AREA_A LIKE '%".$search."%' OR PPT_AREA_B LIKE '%".$search."%' OR PPT_AREA_C LIKE '%".$search."%' OR PPT_AREA_D LIKE '%".$search."%' ) ";
          }
          if($bsCate){
            $wherePP .=" AND BST_IDX='".$bsCate."' ";
          }

          $query_prop = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_USER_TYPE='".$type."' AND USER_IDX='".$key."' ".$wherePP." AND PST_IDX='".$rowSlot->PST_IDX."' ORDER BY PPT_IDX DESC");
          if($query_prop->num_rows() > 0){
            foreach($query_prop->result() as $row_prop){
                $query_img = $this->db->query("SELECT * FROM PROPERTY_IMG_TB WHERE PIT_DELETE_DATE IS NULL AND PPT_IDX='".$row_prop->PPT_IDX."' ORDER BY PIT_REPRES DESC, PIT_IDX DESC LIMIT 1");
                $row_img = $query_img->row();
                $query_companion = $this->db->query("SELECT * FROM COMPANION_TB WHERE CPT_DELETE_DATE IS NULL AND PPT_IDX='".$row_prop->PPT_IDX."' ORDER BY CPT_IDX DESC");
                $companion="";
                foreach($query_companion->result() as $row_companion){
                  $companion[]= array($row_companion);
                }
                $row_img = $query_img->row();
                $data[]= array($row_prop,$row_img,$companion);
            }
          }
          $propCnt = $query_prop->num_rows();
          return array($data,$propCnt,$Slot);
        }else{
          return array("",0,"");
        }
      }else if($state=='D' || $state=='C'){
        $wherePP="";$data="";
        if($state=='C'){
          $wherePP .=" AND PPT_STATE='C' ";
        }else if($state=='D'){
          $wherePP .=" AND PPT_STATE='D' ";
        }
        
        if($search){
          $wherePP .=" AND ( PPT_TITLE LIKE '%".$search."%' OR PPT_AREA_A LIKE '%".$search."%' OR PPT_AREA_B LIKE '%".$search."%' OR PPT_AREA_C LIKE '%".$search."%' OR PPT_AREA_D LIKE '%".$search."%' ) ";
        }
        if($bsCate){
          $wherePP .=" AND BST_IDX='".$bsCate."' ";
        }
          $query_prop = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_USER_TYPE='".$type."' AND USER_IDX='".$key."' ".$wherePP." ORDER BY PPT_IDX DESC");
          if($query_prop->num_rows() > 0){
            foreach($query_prop->result() as $row_prop){
                $query_img = $this->db->query("SELECT * FROM PROPERTY_IMG_TB WHERE PIT_DELETE_DATE IS NULL AND PPT_IDX='".$row_prop->PPT_IDX."' ORDER BY PIT_REPRES DESC, PIT_IDX DESC LIMIT 1");
                $row_img = $query_img->row();
                $query_companion = $this->db->query("SELECT * FROM COMPANION_TB WHERE CPT_DELETE_DATE IS NULL AND PPT_IDX='".$row_prop->PPT_IDX."' ORDER BY CPT_IDX DESC");
                $companion="";
                foreach($query_companion->result() as $row_companion){
                  $companion[]= array($row_companion);
                }
                $row_img = $query_img->row();
                $data[]= array($row_prop,$row_img,$companion);
            }
          }
          $propCnt = $query_prop->num_rows();
          return array($data,$propCnt,"");
      }
			
    }

    function Sl_table_view($key,$type){ // 네이버 회원 가입여부 확인
      $query = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_USER_TYPE='".$type."' AND USER_IDX='".$key."' ORDER BY PST_IDX DESC");
      
      if($query->num_rows() > 0){
        $row = $query->row();
        return array($query->num_rows(),$row);
      }else{
        return array($query->num_rows(),"");
      }
    }
    function bstModify($key){ // 네이버 회원 가입여부 확인
      $query = $this->db->query("SELECT * FROM BROKER_SUB_TB WHERE BST_DELETE_DATE IS NULL AND BST_IDX='".$key."' ORDER BY BST_IDX DESC");
      
      if($query->num_rows() > 0){
        $row = $query->row();
        $row = array('BST_NAME' =>  decrypt($row->BST_NAME), 'BST_HP' => decrypt($row->BST_HP), 'BST_TYPE' => $row->BST_TYPE, 'BKT_IDX' => $row->BKT_IDX, 'BST_IDX' => $row->BST_IDX);

        //$row["BST_NAME"] = decrypt($row->BST_NAME);
        //$row["BST_HP"] = decrypt($row->BST_HP);
        return array($row);
      }else{
        return array("");
      }
    }

    function qnaBkList($key,$type,$limit,$start,$search,$bsKey){ // 네이버 회원 가입여부 확인
      if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}
      $data="";
      $where="";
      if($search){
        $where .=" AND (QBT_NAME LIKE '%".encrypt($search)."%' OR QBT_TEL LIKE '%".encrypt($search)."%') ";
      }
      if($bsKey){
        $where .=" AND BST_IDX='".$bsKey."' ";
      }
      $query = $this->db->query("SELECT * FROM QNA_BK_TB WHERE QBT_DELETE_DATE IS NULL AND BKT_IDX='".$key."' ".$where." ORDER BY QBT_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM QNA_BK_TB WHERE QBT_DELETE_DATE IS NULL AND BKT_IDX='".$key."' ".$where." ORDER BY QBT_IDX DESC ");
			$all_cnt = $query_cnt->num_rows();

      if($query->num_rows() > 0){
				foreach($query->result() as $row){
            $queryPpt = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PPT_IDX='".$row->PPT_IDX."' ORDER BY PPT_IDX DESC");
            $rowPpt = $queryPpt->row();
            $data[]= array($row,$rowPpt);
				}
			}
      
      return array($data,$all_cnt);
    }

    function qnaPnList($key,$type,$limit,$start,$search,$state){ // 네이버 회원 가입여부 확인
      if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}
      $data="";
      $where="";
      if($search){
        $where .=" AND (QPT_NAME LIKE '%".encrypt($search)."%' OR QPT_TEL LIKE '%".encrypt($search)."%' OR QPT_TYPE LIKE '%".$search."%' OR QPT_ADDR1 LIKE '%".encrypt($search)."%' OR QPT_ADDR2 LIKE '%".encrypt($search)."%' OR QPT_FORM LIKE '%".$search."%') ";
      }
      if($state){
        $where .=" AND QPT_STATE='".$state."' ";
      }
      $query = $this->db->query("SELECT * FROM QNA_PN_TB WHERE QPT_DELETE_DATE IS NULL AND PTT_IDX='".$key."' ".$where." ORDER BY QPT_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM QNA_PN_TB WHERE QPT_DELETE_DATE IS NULL AND PTT_IDX='".$key."' ".$where." ORDER BY QPT_IDX DESC ");
			$all_cnt = $query_cnt->num_rows();

      if($query->num_rows() > 0){
				foreach($query->result() as $row){
            $data[]= $row;
				}
			}
      
      return array($data,$all_cnt);
    }

    function tableLast($table,$type,$where){ // 네이버 회원 가입여부 확인
      $data=[];
      $query = $this->db->query("SELECT * FROM ".$table." WHERE ".$type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$type."_IDX DESC LIMIT 1");
      if($query->num_rows() > 0){
				$row = $query->row();
        return $row; 
			}
      
    }

    function table_PMlist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			
			if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}

			if($orderWhere){
				$where .= $orderWhere;
			}
			
			$query = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL ".$where." ORDER BY PST_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL ".$where." ORDER BY PST_IDX DESC ");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
        $user=array();
        foreach($query->result() as $row){
					$data[]=$row;

          if($row->PST_USER_TYPE=='A'){
            $query_user = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_IDX='".$row->USER_IDX."' ORDER BY BKT_IDX DESC");
            $rowUser=$query_user->row();
            array_push($user,$rowUser);
          }else if($row->PST_USER_TYPE=='B'){
            $query_user = $this->db->query("SELECT * FROM MEM_TB WHERE MET_IDX='".$row->USER_IDX."' ORDER BY MET_IDX DESC");
            $rowUser=$query_user->row();
            array_push($user,$rowUser);
          }
				}
				return array($data,$all_cnt,$user);
			}
			return false;
    }

    function table_Paylist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			
			if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}

			if($orderWhere){
				$where .= $orderWhere;
			}
			
			$query = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
        $user=array();
        $slot=array();
        foreach($query->result() as $row){
					$data[]=$row;

          $query_slot = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND USER_IDX='".$row->USER_IDX."' AND PST_USER_TYPE='".$row->USER_TYPE."' ORDER BY PST_IDX DESC ");
          $rowSlot=$query_slot->row();
          $slot[]=$rowSlot;

          if($row->USER_TYPE=='A'){
            $query_user = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_IDX='".$row->USER_IDX."' ORDER BY BKT_IDX DESC");
            $rowUser=$query_user->row();
            array_push($user,$rowUser);
          }else if($row->USER_TYPE=='B'){
            $query_user = $this->db->query("SELECT * FROM MEM_TB WHERE MET_IDX='".$row->USER_IDX."' ORDER BY MET_IDX DESC");
            $rowUser=$query_user->row();
            array_push($user,$rowUser);
          }
				}
				return array($data,$all_cnt,$slot,$user);
			}
			return false;
    }

    function table_Payview($key,$type){ // 데이터 뷰 / 인자값(테이블명,type,키값)
			$query = $this->db->query("SELECT * FROM PAYMENT_TB WHERE PMT_DELETE_DATE IS NULL AND USER_IDX='".$key."' AND USER_TYPE='".$type."' ORDER BY PMT_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				$row = $query->row();
				return $row; 
			}  else  { 
				return false; 
			}
		}

    function emailCk($mail){ // 데이터 뷰 / 인자값(테이블명,type,키값)
			$query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_EMAIL='".encrypt($mail)."' ORDER BY MET_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return 1; 
			}  else  { 
				return 0; 
			}
		}

    function telCk($type,$name,$tel){ // 데이터 뷰 / 인자값(테이블명,type,키값)
      if($type=='A'){
        $query = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_DELETE_DATE IS NULL AND BKT_NAME='".encrypt($name)."' AND BKT_HP='".encrypt($tel)."' ORDER BY BKT_IDX DESC ");
        $query1 = $this->db->query("SELECT * FROM BROKER_SUB_TB WHERE BST_DELETE_DATE IS NULL AND BST_NAME='".encrypt($name)."' AND BST_HP='".encrypt($tel)."' ORDER BY BST_IDX DESC ");
      }else if($type=='B'){
        $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAME='".encrypt($name)."' AND MET_TEL='".encrypt($tel)."' ORDER BY MET_IDX DESC ");
      }else if($type=='C'){
        $query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_DELETE_DATE IS NULL AND PTT_CEO='".encrypt($name)."' AND PTT_HP='".encrypt($tel)."' ORDER BY PTT_IDX DESC ");
      }
			if ( $query->num_rows() > 0)  { 
        return 1;
			}  else  { 
        if($type=='A' && $query1->num_rows() > 0){
          return 2;
        }else{
          return 0; 
        }
				
			}
		}

    function MYtelCk($type,$name,$hp,$key,$tel){ // 데이터 뷰 / 인자값(테이블명,type,키값)
      $where = "";
      if($type=='A'){
        if($key){
          $where = " AND BKT_IDX !='".$key."' ";
        }
        $query = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_DELETE_DATE IS NULL AND BKT_NAME='".encrypt($name)."' AND BKT_HP='".encrypt($hp)."' ".$where." ORDER BY BKT_IDX DESC ");
      }else if($type=='B'){
        if($key){
          $where = " AND MET_IDX !='".$key."' ";
        }
        $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAME='".encrypt($name)."' AND MET_TEL='".encrypt($hp)."' ".$where." ORDER BY MET_IDX DESC ");
      }else if($type=='C'){
        if($key){
          $where = " AND PTT_IDX !='".$key."' ";
        }
        $query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_DELETE_DATE IS NULL AND PTT_CEO='".encrypt($name)."' AND PTT_HP='".encrypt($hp)."' ".$where." ORDER BY PTT_IDX DESC ");
      }
			if ( $query->num_rows() > 0)  { 
				return 1; 
			}  else  { 
				return 0; 
			}
		}

    function bkSubtelCk($name,$hp){ // 데이터 뷰 / 인자값(테이블명,type,키값)
      $query = $this->db->query("SELECT * FROM BROKER_SUB_TB WHERE BST_DELETE_DATE IS NULL AND BST_NAME='".encrypt($name)."' AND BST_HP='".encrypt($hp)."' ORDER BY BST_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return 1; 
			}  else  { 
				return 0; 
			}
		}
    
    function bkSubMtelCk($name,$hp,$key){ // 데이터 뷰 / 인자값(테이블명,type,키값)
      $query = $this->db->query("SELECT * FROM BROKER_SUB_TB WHERE BST_DELETE_DATE IS NULL AND BST_NAME='".encrypt($name)."' AND BST_HP='".encrypt($hp)."' AND BST_IDX !='".$key."' ORDER BY BST_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return 1; 
			}  else  { 
				return 0; 
			}
		}

    function searchMem($email){ // 데이터 뷰 / 인자값(테이블명,type,키값)
      $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_EMAIL='".encrypt($email)."' ORDER BY MET_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				$row = $query->row();
				return $row; 
			}  else  { 
				return 0; 
			}
		}

    function searchFind($name,$tel,$email){ // 데이터 뷰 / 인자값(테이블명,type,키값)
      if($email){
        $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAME='".encrypt($name)."' AND MET_TEL='".encrypt($tel)."' AND MET_EMAIL='".encrypt($email)."' ORDER BY MET_IDX DESC ");
      }else{
        $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_DELETE_DATE IS NULL AND MET_NAME='".encrypt($name)."' AND MET_TEL='".encrypt($tel)."' ORDER BY MET_IDX DESC ");
      }
      
			if ( $query->num_rows() > 0)  { 
				$row = $query->row();
				return $row; 
			}  else  { 
				return 0; 
			}
		}

    function slotSearch($key,$type){ // 데이터 뷰 / 인자값(테이블명,type,키값)
      //$query = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND USER_IDX='".$key."' AND PST_USER_TYPE='".$type."' AND PST_STATE='A' AND PST_END >='".date("Y-m-d H:i:s")."' ORDER BY PST_IDX DESC ");
      $query = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND USER_IDX='".$key."' AND PST_USER_TYPE='".$type."' ORDER BY PST_IDX DESC ");
      
			if ( $query->num_rows() > 0)  { 
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return $data;
			}  else  { 
				return 0; 
			}
		}

    function table_Paymentlist($tb_name,$tb_type,$search,$limit,$start,$orderWhere){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
			$where="";$limt ="";
			
			if($limit || $start){
				$limt = "LIMIT $start, $limit";
			}

			if($orderWhere){
				$where .= $orderWhere;
			}
			$data="";
      $rowPmt="";

			$query = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ".$limt);

      $query_cnt = $this->db->query("SELECT * FROM ".$tb_name." WHERE ".$tb_type."_DELETE_DATE IS NULL ".$where." ORDER BY ".$tb_type."_IDX DESC ");
			$all_cnt = $query_cnt->num_rows();

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[]=$row;
          $queryPmt = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_IDX='".$row->PST_IDX."' ORDER BY PST_IDX DESC");
          $rowPmt[] = $queryPmt->row();
				}
				return array($data,$all_cnt,$rowPmt);
			}else{
        return array($data,0,$rowPmt);
      }
			return false;
    } 
    function PayReturnList($num){ // 네이버 회원 가입여부 확인
      $query = $this->db->query("SELECT * FROM PAYMENT_TB WHERE PMT_DELETE_DATE IS NULL AND PMT_NUMBER2='".$num."' ORDER BY PMT_IDX DESC");
      if($query->num_rows() > 0){
				$row = $query->row();
        return $row; 
			}
      
    }

    function table_Slotlist($where){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
		
      $query = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL ".$where." ORDER BY PST_IDX DESC");

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
            $query_pp = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PST_IDX='".$row->PST_IDX."' AND PPT_STATE='A' ORDER BY PPT_IDX DESC");
            $cnt_pp = $query_pp->num_rows();
            $data[]= array($row,$cnt_pp);
				}
        return array($data,$query->num_rows());
			}else{
        return array("",0);
      }
			
    }

    function slotCurr($key,$type){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
		
      $query = $this->db->query("SELECT * FROM PROP_SLOT_TB WHERE PST_DELETE_DATE IS NULL AND PST_USER_TYPE='".$type."' AND USER_IDX='".$key."' AND PST_STATE='A' AND PST_START <='".date("Y-m-d")."' AND PST_END >='".date("Y-m-d")."' ORDER BY PST_IDX DESC");

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
            $query_pp = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PST_IDX='".$row->PST_IDX."' AND PPT_STATE='A' ORDER BY PPT_IDX DESC");
            $cnt_pp = $query_pp->num_rows();
            $data[]= array($row,$cnt_pp);
            
				}
        return array($data,$query->num_rows());
			}else{
        return array("",$query->num_rows());
      }
			
    }

    function userState($key){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
      $dataPP="";$dataCnt="";
      $query = $this->db->query("SELECT * FROM BROKER_SUB_TB WHERE BST_DELETE_DATE IS NULL AND BKT_IDX='".$key."' ORDER BY BST_IDX DESC");

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
          $dataPP="";$dataCnt="";
            $query_pp = $this->db->query("SELECT * FROM PROPERTY_TB as a LEFT JOIN PROP_SLOT_TB as b ON a.PST_IDX = b.PST_IDX WHERE a.PPT_DELETE_DATE IS NULL AND b.PST_DELETE_DATE IS NULL AND a.BST_IDX='".$row->BST_IDX."' AND b.PST_STATE ='A' AND b.PST_START <= '".date("Y-m-d")."' AND b.PST_END >= '".date("Y-m-d")."' AND a.PPT_USER_TYPE='A' GROUP BY a.PST_IDX");
            $cnt_pp = $query_pp->num_rows();
            foreach($query_pp->result() as $row_pp){
              $dataPP[]=$row_pp;
              $query_cnt = $this->db->query("SELECT * FROM PROPERTY_TB WHERE PPT_DELETE_DATE IS NULL AND PST_IDX='".$row_pp->PST_IDX."' AND PPT_USER_TYPE='A' AND BST_IDX='".$row->BST_IDX."' ORDER BY PPT_IDX DESC");
              $cnt = $query_cnt->num_rows();
              $dataCnt[]=$cnt;
            }
            $data[]= array($row,$dataPP,$cnt_pp,$dataCnt);
				}
        return array($data,$query->num_rows());
			}else{
        return array("",$query->num_rows());
      }
			
    }

    function data_list(){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
      echo "<script src=\"https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=c4ta8crjn6&submodules=geocoder\">";
      $data="";
      $query = $this->db->query("SELECT * FROM DATA_F_TB WHERE DFT_DELETE_DATE IS NULL AND DFT_LAT IS NULL AND DFT_LON IS NULL ORDER BY DFT_LAT ASC");
      foreach($query->result() as $row){
        $addr = urlencode($row->DFT_ADDR_A);
        $url = "https://naveropenapi.apigw.ntruss.com/map-geocode/v2/geocode?query=".$addr;
        $headers = array();
        $headers[] ="X-NCP-APIGW-API-KEY-ID:c4ta8crjn6";
        $headers[] ="X-NCP-APIGW-API-KEY:DahewwyriSLmg1hIyvibb6t9YlfzhFhB3WFBNd9i";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result,1);
        $map_y_point = $data['addresses'][0]['x']; // x 좌표값과 y좌표값이 바뀌어서 출력됨
        $map_x_point = $data['addresses'][0]['y'];
        $lat = $map_x_point;
        $lng = $map_y_point;
        $dataUp = array(
          'DFT_LAT' => $lat,
          'DFT_LON'  => $lng
        );
        $this->db->where('DFT_IDX', $row->DFT_IDX);
				$resultsUp = $this->db->update('DATA_F_TB', $dataUp);
        $data[]= array($lat,$lng,$row->DFT_ADDR_A);
      }
      return $data;
    }
    function analysis($selectDong){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
      $data="";
      $query = $this->db->query("SELECT * FROM DATA_I_TB WHERE DIT_DATA='".$selectDong."' ORDER BY DIT_IDX DESC");

			if($query->num_rows() > 0){
				foreach($query->result() as $row){
            $data[]= $row;
				}
        return array($data,$query->num_rows());
			}else{
        return array("",$query->num_rows());
      }

    }

    function bsSelect($key){ // 데이터 리스트 / 인자값(테이블명,type,검색,갯수제한,시작점,추가조건식)
      $query = $this->db->query("SELECT * FROM BROKER_SUB_TB WHERE BKT_IDX='".$key."' ORDER BY BST_IDX DESC LIMIT 1");

			if($query->num_rows() > 0){
				$row = $query->row();
        return $row;
			}else{
        return "";
      }

    }
    

}

    // $this->db->or_where('id >', $id); OR 문
    // $this->db->like('title', 'match'); LIKE 문 $this->db->or_like() // OR LIKE
    // $this->db->group_by("title"); // GROUP BY
    // $this->db->order_by('title', 'DESC');
    // $this->db->limit(10); // LIMIT
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
    'name' => 'My Name',
    'date' => 'My date'
    );

    $this->db->where('id', $id);
    $this->db->update('mytable', $data);

    // DELETE

    $this->db->where('id', $id);
    $this->db->delete('mytable');


    */

    ?>