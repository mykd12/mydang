<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VO extends CI_Controller {

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

    $myArea = $this -> session ->userdata('LOCATION_AREA');
    if($myArea){
      echo "yes";
    }
	}
  public function moveList() // 지도 이동시 리스트 호출
	{
		$level= $this->input->post('level');
		$type= $this->input->post('type');
    $lat= $this->input->post('lat');
    $lon= $this->input->post('lon');
    $sort= $this->input->post('sort');
    $optA= $this->input->post('optA');
    $optB= $this->input->post('optB');
    $optC= $this->input->post('optC');
    $optD= $this->input->post('optD');
    $optE= $this->input->post('optE');
    $optF= $this->input->post('optF');
    $optG= $this->input->post('optG');
    $optH= $this->input->post('optH');
    $optI= $this->input->post('optI');
    $key= $this->input->post('key');
    $avg= $this->input->post('avg');
    $p_type= $this->input->post('p_type');
    echo json_encode($this -> table_model -> prmoveList($level,$type,$lat,$lon,$sort,$optA,$optB,$optC,$optD,$optE,$optF,$optG,$optH,$optI,$key,$p_type,$avg));
	}
  public function prodDetail() // 매물상세보기
	{
		$PPT_IDX= $this->input->post('PPT_IDX');
    echo json_encode($this -> table_model -> prDetail($PPT_IDX));
	}

  public function MkmoveList() // 지도 이동시 리스트 호출
	{
		$level= $this->input->post('level');
		$sort= $this->input->post('sort');
    $keyword= $this->input->post('keyword');
    $type= $this->input->post('type');
    $Mykey= $this->input->post('Mykey');
    $lat= $this->input->post('lat');
    $lon= $this->input->post('lon');
    $optA= $this->input->post('optA');
    $optB= $this->input->post('optB');
    $optC= $this->input->post('optC');
    $optD= $this->input->post('optD');
    $optE= $this->input->post('optE');
    $optF= $this->input->post('optF');
    $optG= $this->input->post('optG');
    $optH= $this->input->post('optH');
    $opt=array();
    if($optA){
      array_push($opt, $optA);
    }
    if($optB){
      array_push($opt, $optB);
    }
    if($optC){
      array_push($opt, $optC);
    }
    if($optD){
      array_push($opt, $optD);
    }
    if($optE){
      array_push($opt, $optE);
    }
    if($optF){
      array_push($opt, $optF);
    }
    if($optG){
      array_push($opt, $optG);
    }
    if($optH){
      array_push($opt, $optH);
    }
    
    echo json_encode($this -> table_model -> mkmoveList($level,$type,$lat,$lon,$sort,$Mykey,$opt,$keyword));
	}

  public function makeDetail() // 업체상세보기
	{
		$PTT_IDX= $this->input->post('PTT_IDX');
    echo json_encode($this -> table_model -> mkDetail($PTT_IDX));
	}

  public function searchKeyword() // 찾다 검색
	{
		$search= $this->input->post('search');
		$page_name= $this->input->post('page_name');
    $p_type= $this->input->post('p_type');
    echo json_encode($this -> table_model -> searchKeyword($search,$page_name,$p_type));
    //echo json_encode($page_name);
	}
  public function proCartCk() // 관심매물 체크
	{
		$key= $this->input->post('key');
    $idx= $this->input->post('idx');
		echo json_encode($this -> table_model -> proCartCk($key,$idx));
	}
  public function businesSearch() // 중개사 검색
	{
    $name= $this->input->post('name');
    $pageNo= $this->input->post('pageNo');
		$ch = curl_init();
  $url = 'http://apis.data.go.kr/1611000/nsdi/EstateBrkpgService/attr/getEBOfficeInfo'; /*URL*/
  $queryParams = '?' . urlencode('bsnmCmpnm') . '=' . urlencode($name); /**/
  $queryParams .= '&' . urlencode('sttusSeCode') . '=1'; /*Service Key*/
  $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode($pageNo); /**/
  $queryParams .= '&' . urlencode('numOfRows') . '=8'; /*Service Key*/
  $queryParams .= '&' . urlencode('format') . '=' . urlencode('xml'); /**/
  $queryParams .= '&' . urlencode('ServiceKey') . '=vJfph4D0Sc0KBSN%2BYMOy0xgr4cM%2FjEWu2aQamcoOFMKxt7yobi4UPVODRyjiPJBPkW35HDeV0gflU75cY8MwPg%3D%3D'; /*Service Key*/
 
  curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  $response = curl_exec($ch);
  curl_close($ch);
  //$object = simplexml_load_string($response);
    print_r($response);
	}

  public function bstModify() // 관심매물 체크
	{
		$key= $this->input->post('key');
		echo json_encode($this -> table_model -> bstModify($key));
	}
  public function inipay() // 관심매물 체크
	{
    $this->load->view('lib/INIStdPayUtil');
    $SignatureUtil = new INIStdPayUtil();

    $price= $this->input->post('price');
    $orderNumber= $this->input->post('orderNumber');
    $timestamp= $this->input->post('timestamp');
    $params = array(
        "oid" => $orderNumber,
        "price" => $price,
        "timestamp" => $timestamp
    );
    $sign = $SignatureUtil->makeSignature($params, "sha256");
    echo $sign;
	}
  public function analysis() // 관심매물 체크
	{
		$selectDong= $this->input->post('selectDong');
		echo json_encode($this -> table_model -> analysis($selectDong));
	}

}