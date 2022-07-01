<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{
 
    function __construct(){
        parent::__construct();
    }
 
    function login_user($id, $pass){ // 로그인 / 인자값(아이디,패스워드)

			$query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_EMAIL='".$id."' AND MET_PW='".$pass."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");

			if ( $query->num_rows() > 0)  { 
				$row = $query->row();
				return [$row->MET_IDX, $row->MET_EMAIL, $row->MET_NAME, $row->MET_IMG_SAVE]; 
			}  else  { 
				return false; 
			}
    }
    function emailCk($email){ // 로그인 / 인자값(아이디,패스워드)
			$query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_EMAIL='".$email."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    } 
    function telCk($tel){ // 로그인 / 인자값(아이디,패스워드)
			$query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_TEL='".$tel."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    }
    function findId($name,$tel){ // 아이디 찾기
			$query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_NAME='".$name."' AND MET_TEL='".$tel."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
        $row = $query->row();
				return $row->MET_EMAIL; 
			}  else  { 
				return false; 
			}
    }  
    function finPw($email,$tel){ // 아이디 찾기
			$query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_EMAIL='".$email."' AND MET_TEL='".$tel."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
        $row = $query->row();
				return $row->MET_IDX; 
			}  else  { 
				return false; 
			}
    } 
    function login_pro($id, $pass, $type){ // 로그인 / 인자값(아이디,패스워드)
      $idx = "";
      $name = "";
      if($type=='A'){
        $query = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_EMAIL='".$id."' AND BKT_PW='".$pass."' AND BKT_COMPANY IS NOT NULL AND BKT_DELETE_DATE IS NULL ORDER BY BKT_IDX DESC ");
        if ( $query->num_rows() > 0)  { 
          $row = $query->row();
          $idx = $row->BKT_IDX;
          $name = $row->BKT_NAME;
          $app = $row->BKT_APP;
          $img = $row->BKT_IMG_SAVE;
          return [$idx, decrypt($name),$app,$img]; 
        }else{
          return false; 
        }
      }else if($type=='B'){
        $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_EMAIL='".$id."' AND MET_PW='".$pass."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
        if ( $query->num_rows() > 0)  { 
          $row = $query->row();
          $idx = $row->MET_IDX;
          $email = $row->MET_EMAIL;
          $name = $row->MET_NAME;
          $img = $row->MET_IMG_SAVE;
          return [$idx, decrypt($email), decrypt($name),$img]; 
        }else{
          return false; 
        }
      }else if($type=='C'){
        $query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_EMAIL='".$id."' AND PTT_PW='".$pass."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC ");
        if ( $query->num_rows() > 0)  { 
          $row = $query->row();
          $idx = $row->PTT_IDX;
          $name = $row->PTT_NAME;
          $img = $row->PTT_IMG_SAVE;
          return [$idx, decrypt($name),$img]; 
        }else{
          return false; 
        }
      }
    }
    function findIdPro($name,$tel){ // 아이디 찾기
      $emailA="";$emailB="";$emailC="";
			$queryBk1 = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_NAME='".$name."' AND BKT_HP='".$tel."' AND BKT_DELETE_DATE IS NULL ORDER BY BKT_IDX DESC ");
      $queryUser = $this->db->query("SELECT * FROM MEM_TB WHERE MET_NAME='".$name."' AND MET_TEL='".$tel."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
      $queryPtn = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_NAME='".$name."' AND PTT_HP='".$tel."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC ");
      if ( $queryBk1->num_rows() > 0)  {
        $rowBk1 = $queryBk1->row();
        $emailA=$rowBk1->BKT_EMAIL;
      }
      if ( $queryUser->num_rows() > 0)  {
        $rowUser = $queryUser->row();
        $emailB=$rowUser->MET_EMAIL;
      }
      if ( $queryPtn->num_rows() > 0)  {
        $rowPtn = $queryPtn->row();
        $emailC=$rowPtn->PTT_EMAIL;
      }
      
      
      return [$emailA, $emailB, $emailC]; 
			/*if ( $query->num_rows() > 0)  { 
        $row = $query->row();
				return $row->MET_EMAIL; 
			}  else  { 
				return false; 
			}*/
    }
    function finPwPro($email,$tel,$type){ // 패스워드 찾기
      $key="";
      if($type=='A'){
        $query = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_EMAIL='".$email."' AND BKT_HP='".$tel."' AND BKT_DELETE_DATE IS NULL ORDER BY BKT_IDX DESC ");
        $row = $query->row();
        $key=$row->BKT_IDX;
      }else if($type=='B'){
        $query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_EMAIL='".$email."' AND MET_TEL='".$tel."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
        $row = $query->row();
        $key=$row->MET_IDX;
      }else if(type=='C'){
        $query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_EMAIL='".$email."' AND PTT_HP='".$tel."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC ");
        $row = $query->row();
        $key=$row->PPT_IDX;
      }
			
			if ( $query->num_rows() > 0)  { 
        $row = $query->row();
				return $key; 
			}  else  { 
				return false; 
			}
    } 
    function emailCkPro($email){ // 로그인 / 인자값(아이디,패스워드)
			$query = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_EMAIL='".$email."' AND BKT_DELETE_DATE IS NULL ORDER BY BKT_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    }
    function telCkPro($tel){ // 로그인 / 인자값(아이디,패스워드)
			$query = $this->db->query("SELECT * FROM BROKER_TB WHERE BKT_HP='".$tel."' AND BKT_DELETE_DATE IS NULL ORDER BY BKT_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    }
    function emailCkUser($email){ // 로그인 / 인자값(아이디,패스워드)
			$query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_EMAIL='".$email."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    }
    function telCkUser($tel){ // 로그인 / 인자값(아이디,패스워드)
			$query = $this->db->query("SELECT * FROM MEM_TB WHERE MET_TEL='".$tel."' AND MET_DELETE_DATE IS NULL ORDER BY MET_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    }
    function emailCkPtn($email){ // 로그인 / 인자값(아이디,패스워드)
			$query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_EMAIL='".$email."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
			}
    }
    function telCkPtn($tel){ // 로그인 / 인자값(아이디,패스워드)
			$query = $this->db->query("SELECT * FROM PARTNER_TB WHERE PTT_HP='".$tel."' AND PTT_DELETE_DATE IS NULL ORDER BY PTT_IDX DESC ");
			if ( $query->num_rows() > 0)  { 
				return false; 
			}  else  { 
				return true; 
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