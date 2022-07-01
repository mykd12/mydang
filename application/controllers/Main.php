<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
      $this -> load -> model('dao_model');
			$this -> load -> helper("privatehash"); // 암호화 helper
      $this -> load -> helper("config"); // 설정 helper
			$this->load->helper('download'); // 다운로드 helper
	}
	public function index() // 메인
	{
    $nowPage["nowPage"]= $this->uri->segment(2);
    
		$this -> load -> view('index');
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
    //$this->load->view('inc/modal-inquiryAll');
	}
  public function login() // 로그인 
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if($MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mem/login');
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}

  public function agree() // 이용약관&개인정보취급방침
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if($MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }

    $data['mb_name']=$this->input->get('mb_name');
    $data['mb_email']=$this->input->get('mb_email');
    $data['mb_uid']=$this->input->get('mb_uid');
    $data['mb_type']=$this->input->get('mb_type');
    $data['mb_tel']=$this->input->get('mb_tel');
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mem/agree',$data);
	}
  public function join01() // 회원가입 01
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if($MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }

    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mem/join01');
	}
  public function join02() // 회원가입 01
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if($MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
    
    $data['userName']=$this->input->get('userName');
    $data['userPhone']=$this->input->get('userPhone');
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mem/join02',$data);
	}
  public function join03() // 회원가입 01
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if($MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mem/join03');
	}
  public function find() // 아이디찾기
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    $data['email']=$this->input->get('email');
    if($MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mem/find',$data);
	}
  public function findId() // 아이디찾기
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if($MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }

    $data['email']= $this->input->get('email');
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mem/findId',$data);
	}
  public function findPw() // 패스워드찾기
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if($MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }

		$data['key']= $this->input->get('key');
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mem/findPw',$data);
	}
  public function myPage() // 개인정보 변경
	{
    include_once 'Get.php';

		$MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if(!$MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
		$data["results"] = $this -> table_model -> table_view("MEM_TB","MET",$MET_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["MET_IDX"] = $MET_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;

    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('mem/myPage',$data);
    $this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function qnaList() // 1:1문의 리스트
	{
    include_once 'Get.php';
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if(!$MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
		$returnData = configList("qnaList",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("QNA_TB","QNT",$search,$config["per_page"], $offset," AND MET_IDX='".$MET_IDX."' "); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('mem/qnaList',$data);
    $this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function qnaView() // 1:1문의 상세페이지
	{
    include_once 'Get.php';
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if(!$MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }

		$QNT_IDX = $this->input->get('QNT_IDX');
		$data["results"] = $this -> table_model -> table_view("QNA_TB","QNT",$QNT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["QNT_IDX"] = $QNT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
    
		$this->load->view('inc/header',$nowPage);
		$this->load->view('mem/qnaView',$data);
    $this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function qnaWrite() // 1:1문의 form
	{
    include_once 'Get.php';
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if(!$MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }

		$QNT_IDX = $this->input->get('QNT_IDX');
		$data["results"] = $this -> table_model -> table_view("QNA_TB","QNT",$QNT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["QNT_IDX"] = $QNT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();

		$this->load->view('inc/header',$nowPage);
		$this->load->view('mem/qnaWrite',$data);
    $this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function myStore() // 찜한 매물
	{
    include_once 'Get.php';
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if(!$MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
		$returnData = configList("myStore",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_CPlist("CART_TB","CTT",$search,$config["per_page"], $offset," AND a.CTT_TYPE='prod' AND a.MET_KEY='".$MET_IDX."' "); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["resultsImg"] = $results[2];
    $data["resultsProd"] = $results[3];
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('mem/myStore',$data);
    $this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function myPartner() // 찜한 업체
	{
    include_once 'Get.php';
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if(!$MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
		$returnData = configList("myPartner",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_CMlist("CART_TB","CTT",$search,$config["per_page"], $offset," AND CTT_TYPE='partner' AND MET_KEY='".$MET_IDX."' "); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["resultsMake"] = $results[2];
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('mem/myPartner',$data);
    $this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
	public function search() // 찾다
	{
    $this -> load -> helper("location");
    
    $myLat = $this -> session ->userdata('LOCATION_LAT'); // 세션에 남겨 있는 위도
    $myLon = $this -> session ->userdata('LOCATION_LON'); // 세션에 남겨 있는 경도
    include_once 'Get.php';
    $loc_lat=$myLat; $loc_lon=$myLon;$type="";$p_type="";$SCH_IDX="";


    if($this->input->get('type')){
      $type= $this->input->get('type');
    }
    if($this->input->get('p_type')){
      $p_type= $this->input->get('p_type');
    }
    if($this->input->get('loc_lat')){
      $loc_lat= $this->input->get('loc_lat');
    }
    if($this->input->get('loc_lon')){
      $loc_lon= $this->input->get('loc_lon');
    }
    if($this->input->get('SCH_IDX')){
      $SCH_IDX= $this->input->get('SCH_IDX');
    }
    if($this->input->get('search_map')){
      $search_map= $this->input->get('search_map');
    }else{
      $search_map="";
    }
    if($loc_lat && $loc_lon){ // 맵위치
      $cur_lat = $loc_lat;
      $cur_lon = $loc_lon;
    }else{
      // $cur_lat = "35.14611495830668";
      // $cur_lon = "126.92308867881711";
      $cur_lat = "37.51544536618997";
      $cur_lon = "127.03687481260046";
    }
    

    if($this->input->get('PPT_IDX')){
      $PPT_IDX= $this->input->get('PPT_IDX');
    }else{
      $PPT_IDX="";
    }
    if($PPT_IDX && $cur_lat && $cur_lon){ // 외부에서 매물 직접 연결시
      $cur_lat = $this->input->get('cur_lat');
      $cur_lon = $this->input->get('cur_lon');
    }
   
    $returnData = configList("search",$pageNo,$search,"");  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $resultsList = $this -> table_model -> table_SPlist($PPT_IDX,$cur_lat,$cur_lon,$p_type); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $resultsMap = $this -> table_model -> table_SPMap($PPT_IDX,$cur_lat,$cur_lon); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $resultsSubway = $this -> table_model -> table_SPSubway($PPT_IDX,$cur_lat,$cur_lon);

    $Ds_KEY = array(); // 동/면 키값
		$Ds_NAME = array(); // 동/면 명칭
		$Ds_LAT = array(); // 동/면 경도
		$Ds_LON = array(); // 동/면 위도 results_cnt
		$Ds_ADDR = array(); // 동/면 시/도 구/군 포함 명칭
    $Ds_CNT = array(); // 동/면 시/도 구/군 포함 명칭
    if($resultsMap[1] >0){
      foreach($resultsMap[0] as $value){
        $dong_cnt = $this -> table_model -> table_dongCnt($value->CFT_AREA_A,$value->CFT_AREA_B,$value->CFT_AREA_C,$p_type);
        array_push($Ds_KEY, $value->CFT_IDX);
        array_push($Ds_NAME, $value->CFT_AREA_C);
        array_push($Ds_LAT, $value->CFT_LAT);
        array_push($Ds_LON, $value->CFT_LON);
        array_push($Ds_ADDR, $value->CFT_AREA_A." ".$value->CFT_AREA_B." ".$value->CFT_AREA_D);
        array_push($Ds_CNT, $dong_cnt);
      }
    }
    $Sw_Key = array(); // 지하철 키값
		$Sw_Name = array(); // 역사명
		$Sw_Num = array(); // 노선번호
		$Sw_Addr = array(); // 역사 주소
		$Sw_Lat = array(); // 역사 위도
    $Sw_Lon = array(); // 역사 경도
    $Sw_Tel = array(); // 역사 전화번호
    if($resultsSubway[1] >0){
      foreach($resultsSubway[0] as $value){
        array_push($Sw_Key, $value->DHT_IDX);
        array_push($Sw_Name, $value->DHT_NAME);
        array_push($Sw_Num, $value->DHT_NUMBER);
        array_push($Sw_Addr, $value->DHT_ADDR);
        array_push($Sw_Lat, $value->DHT_LAT);
        array_push($Sw_Lon, $value->DHT_LON);
        array_push($Sw_Tel, $value->DHT_TEL);
      }
    }

    $data["cur_lat"] = $cur_lat;
    $data["cur_lon"] = $cur_lon;
    $data["type"] = $type;
    $data["p_type"] = $p_type;
    $data["SCH_IDX"] = $SCH_IDX;
    $data["PPT_IDX"] = $PPT_IDX;
    $data["loc_lat"] = $loc_lat;
    $data["loc_lon"] = $loc_lon;
    $data["search_map"] = $search_map;
    $data["results"] = $resultsList;
    $data["results_cnt"] = $resultsList[1];
    $data["Ds_KEY"] = $Ds_KEY;
    $data["Ds_NAME"] = $Ds_NAME;
    $data["Ds_LAT"] = $Ds_LAT;
    $data["Ds_LON"] = $Ds_LON;
    $data["Ds_ADDR"] = $Ds_ADDR;
    $data["Ds_CNT"] = $Ds_CNT;
    $data["Sw_Key"] = $Sw_Key;
    $data["Sw_Name"] = $Sw_Name;
    $data["Sw_Num"] = $Sw_Num;
    $data["Sw_Addr"] = $Sw_Addr;
    $data["Sw_Lat"] = $Sw_Lat;
    $data["Sw_Lon"] = $Sw_Lon;
    $data["Sw_Tel"] = $Sw_Tel;
    $data["myLat"] = $myLat; // 내 위도
    $data["myLon"] = $myLon; // 내 경도
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
    $this->load->view('inc/header',$nowPage);
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
		$this->load->view('search/index',$data);
    // 모달추가 2022.05.04
		$this->load->view('inc/modal-analysis');
		$this->load->view('inc/modal-ernngClclt');
	}
  public function makeSearch() // 짓다
	{
    $myLat = $this -> session ->userdata('LOCATION_LAT'); // 세션에 남겨 있는 위도
    $myLon = $this -> session ->userdata('LOCATION_LON'); // 세션에 남겨 있는 경도
    include_once 'Get.php';
    $loc_lat=$myLat; $loc_lon=$myLon;
    if($this->input->get('loc_lat')){
      $loc_lat= $this->input->get('loc_lat');
    }
    if($this->input->get('loc_lon')){
      $loc_lon= $this->input->get('loc_lon');
    }
    $SCH_IDX="";
    if($this->input->get('SCH_IDX')){
      $SCH_IDX= $this->input->get('SCH_IDX');
    }
    $PTT_IDX="";
    if($this->input->get('PTT_IDX')){
      $PTT_IDX= $this->input->get('PTT_IDX');
    }
    $type="";
    if($this->input->get('type')){
      $type= $this->input->get('type');
    }
    if($this->input->get('search_map')){
      $search_map= $this->input->get('search_map');
    }else{
      $search_map="";
    }
    if($loc_lat && $loc_lon){ // 맵위치
      $cur_lat = $loc_lat;
      $cur_lon = $loc_lon;
    }else{
      // $cur_lat = "35.14611495830668";
      // $cur_lon = "126.92308867881711";
      $cur_lat = "37.51201725648802";
      $cur_lon = "127.04872681739359";
    }

    if($PTT_IDX && $cur_lat && $cur_lon){ // 외부에서 매물 직접 연결시
      $cur_lat = $this->input->get('cur_lat');
      $cur_lon = $this->input->get('cur_lon');
    }
   
    $returnData = configList("makeSearch",$pageNo,$search,"");  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $resultsList = $this -> table_model -> table_MSlist($PTT_IDX,$cur_lat,$cur_lon); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $resultsMap = $this -> table_model -> table_MSMap($PTT_IDX,$cur_lat,$cur_lon); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $resultsSubway = $this -> table_model -> table_MSSubway($PTT_IDX,$cur_lat,$cur_lon);
   

    $Pt_KEY = array(); // 동/면 키값
    $Pt_TYPE = array(); // 동/면 키값
		$Pt_NAME = array(); // 동/면 명칭
		$Pt_LAT = array(); // 동/면 경도
		$Pt_LON = array(); // 동/면 위도
		$Pt_ADDR = array(); // 동/면 시/도 구/군 포함 명칭
    $Pt_CNT = array(); // 동/면 시/도 구/군 포함 명칭
    if($resultsMap[1] >0){
      foreach($resultsMap[0] as $value){
        //$dong_cnt = $this -> table_model -> table_MSdongCnt($value->CFT_AREA_A,$value->CFT_AREA_B,$value->CFT_AREA_C);
        array_push($Pt_KEY, $value->PTT_IDX);
        array_push($Pt_TYPE, $value->PTT_TYPE);
        array_push($Pt_NAME, decrypt($value->PTT_NAME));
        array_push($Pt_LAT, $value->PTT_LAT);
        array_push($Pt_LON, $value->PTT_LON);
        array_push($Pt_ADDR, $value->PTT_AREA_A." ".$value->PTT_AREA_B." ".$value->PTT_AREA_C);
        array_push($Pt_CNT, 0);
      }
    }
    $Sw_Key = array(); // 지하철 키값
		$Sw_Name = array(); // 역사명
		$Sw_Num = array(); // 노선번호
		$Sw_Addr = array(); // 역사 주소
		$Sw_Lat = array(); // 역사 위도
    $Sw_Lon = array(); // 역사 경도
    $Sw_Tel = array(); // 역사 전화번호
    if($resultsSubway[1] >0){
      foreach($resultsSubway[0] as $value){
        array_push($Sw_Key, $value->DHT_IDX);
        array_push($Sw_Name, $value->DHT_NAME);
        array_push($Sw_Num, $value->DHT_NUMBER);
        array_push($Sw_Addr, $value->DHT_ADDR);
        array_push($Sw_Lat, $value->DHT_LAT);
        array_push($Sw_Lon, $value->DHT_LON);
        array_push($Sw_Tel, $value->DHT_TEL);
      }
    }
    
    $data["search_map"] = $search_map;
    $data["cur_lat"] = $cur_lat;
    $data["cur_lon"] = $cur_lon;
    $data["type"] = $type;
    $data["SCH_IDX"] = $SCH_IDX;
    $data["PTT_IDX"] = $PTT_IDX;
    $data["loc_lat"] = $loc_lat;
    $data["loc_lon"] = $loc_lon;
    $data["results"] = $resultsList;
    $data["results_cnt"] = $resultsList[1];
    $data["results_TBcnt"] = $resultsList[2];
    $data["results_case"] = $resultsList[3];
    $data["results_cart"] = $resultsList[4];
    $data["Pt_KEY"] = $Pt_KEY;
    $data["Pt_TYPE"] = $Pt_TYPE;
    $data["Pt_NAME"] = $Pt_NAME;
    $data["Pt_LAT"] = $Pt_LAT;
    $data["Pt_LON"] = $Pt_LON;
    $data["Pt_ADDR"] = $Pt_ADDR;
    $data["Pt_CNT"] = $Pt_CNT;
    $data["Sw_Key"] = $Sw_Key;
    $data["Sw_Name"] = $Sw_Name;
    $data["Sw_Num"] = $Sw_Num;
    $data["Sw_Addr"] = $Sw_Addr;
    $data["Sw_Lat"] = $Sw_Lat;
    $data["Sw_Lon"] = $Sw_Lon;
    $data["Sw_Tel"] = $Sw_Tel;
    $data["myLat"] = $myLat; // 내 위도
    $data["myLon"] = $myLon; // 내 경도
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
    $MET_IDX= $this -> session ->userdata('LOGIN_IDX');
    $data["makeCart"] = $this -> table_model -> table_list("CART_TB","CTT","","",""," AND MET_KEY='".$MET_IDX."' AND CTT_TYPE='make' ");

    $this->load->view('inc/header',$nowPage);
		$this->load->view('search/makeSearch',$data);
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function notice() // 공지사항 리스트
	{
    include_once 'Get.php';

		$returnData = configList("notice",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("NOTICE_TB","NOT",$search,$config["per_page"], $offset,""); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
    $this->load->view('inc/header',$nowPage);
		$this->load->view('community/notice',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function noticeView() // 공지사항 상세페이지
	{
    include_once 'Get.php';

		$NOT_IDX = $this->input->get('NOT_IDX');
		$data["results"] = $this -> table_model -> table_view("NOTICE_TB","NOT",$NOT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["NOT_IDX"] = $NOT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;

    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('community/noticeView',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function news() // 뉴스 리스트
	{
    include_once 'Get.php';

		$returnData = configList("news",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("NEWS_TB","NST",$search,$config["per_page"], $offset,""); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();

		$this->load->view('inc/header',$nowPage);
		$this->load->view('community/news',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function newsView() // 뉴스 상세페이지
	{
    include_once 'Get.php';

		$NST_IDX = $this->input->get('NST_IDX');
		$data["results"] = $this -> table_model -> table_view("NEWS_TB","NST",$NST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["NST_IDX"] = $NST_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('community/newsView',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function faq() // FAQ
	{
    include_once 'Get.php';

		$returnData = configList("faq",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("FAQ_TB","FAT",$search,$config["per_page"], $offset,""); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('community/faq',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function StartTip() // 창업팁 리스트
	{
    include_once 'Get.php';

		$returnData = configList("StartTip",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("TIP_TB","TIT",$search,$config["per_page"], $offset,""); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('startups/tip',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function StartTipView() // 창업팁 상세페이지
	{
    include_once 'Get.php';

		$TIT_IDX = $this->input->get('TIT_IDX');
		$data["results"] = $this -> table_model -> table_view("TIP_TB","TIT",$TIT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["TIT_IDX"] = $TIT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('startups/tipView',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function StartPro() // 창업과정 리스트
	{
    include_once 'Get.php';

		$returnData = configList("StartPro",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("PROCESS_TB","PRT",$search,$config["per_page"], $offset,""); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();

		$this->load->view('inc/header',$nowPage);
		$this->load->view('startups/process',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function StartProView() // 창업과정 상세페이지
	{
    include_once 'Get.php';

		$PRT_IDX = $this->input->get('PRT_IDX');
		$data["results"] = $this -> table_model -> table_view("PROCESS_TB","PRT",$PRT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["PRT_IDX"] = $PRT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('startups/processView',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function StartNews() // 창업소식 리스트
	{
    include_once 'Get.php';

		$returnData = configList("StartNews",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("START_NEWS_TB","SNT",$search,$config["per_page"], $offset,""); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();

		$this->load->view('inc/header',$nowPage);
		$this->load->view('startups/news',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
	public function StartNewsView() // 창업소식 상세페이지
	{
    include_once 'Get.php';

		$SNT_IDX = $this->input->get('SNT_IDX');
		$data["results"] = $this -> table_model -> table_view("START_NEWS_TB","SNT",$SNT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["SNT_IDX"] = $SNT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('startups/newsView',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function constrCase() // 시공사례 리스트
	{
    include_once 'Get.php';
		$returnData = configList("constrCase",$pageNo,$search,$location); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];
    $where ="";
    if($location && $location !='전체'){
      $where =" AND CST_ADDR1_A LIKE '%".$location."%' ";
    }

    if($this->input->get('key')){
      $where =" AND PTT_IDX = '".$this->input->get('key')."' ";
    }
    $results = $this -> table_model -> table_Cslist("CASE_TB","CST",$search,$config["per_page"], $offset,$where); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $data["resultsPtn"] = $results[2];
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
    $data["location"] = $location; // 페이징
		$this->load->view('inc/header',$nowPage);
		$this->load->view('case/case',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
	public function constrCaseView() // 시공사례 상세페이지
	{
    include_once 'Get.php';

		$CST_IDX = $this->input->get('CST_IDX');
		$data["results"] = $this -> table_model -> table_csview("CASE_TB","CST",$CST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["CST_IDX"] = $CST_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
    $data["location"] = $location;
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
    $nowPage["estimate"]= $this -> table_model -> couns_list();
		$this->load->view('inc/header',$nowPage);
		$this->load->view('case/caseView',$data);
		$this->load->view('inc/footer');
    $this->load->view('inc/modal-inquiryAll',$dataCouns);
	}
  public function callback() // 네이버 로그인 인증
	{
    if (!$this->input->get('state')) {
      // 오류가 발생하였습니다. 잘못된 경로로 접근 하신것 같습니다.
      echo "<script>alert('정상적인 접근이 아닙니다.');history.go(-1)</script>";
      exit;
    }
  
        $client_id = "LACTex0CsdPFSVBAH2p4";
        $client_secret = "Xl1WLRroUQ";
        $code = $this->input->get('code');
        $state = $this->input->get('state');
        $redirectURI = urlencode("http://yesyo.com/naver_callback.php");
  
        $naver_curl = "https://nid.naver.com/oauth2.0/token?grant_type=authorization_code&client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirectURI."&code=".$code."&state=".$state;
        // 토큰값 가져오기
        $is_post = false;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $naver_curl);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
  
        if($status_code == 200) {
          $responseArr = json_decode($response, true);
          $_SESSION['naver_access_token'] = $responseArr['access_token'];
          $_SESSION['naver_refresh_token'] = $responseArr['refresh_token'];
          // 토큰값으로 네이버 회원정보 가져오기
          $me_headers = array( 'Content-Type: application/json', sprintf('Authorization: Bearer %s', $responseArr['access_token']) );
          $me_is_post = false; $me_ch = curl_init();
          curl_setopt($me_ch, CURLOPT_URL, "https://openapi.naver.com/v1/nid/me");
          curl_setopt($me_ch, CURLOPT_POST, $me_is_post);
          curl_setopt($me_ch, CURLOPT_HTTPHEADER, $me_headers);
          curl_setopt($me_ch, CURLOPT_RETURNTRANSFER, true);
          $me_response = curl_exec ($me_ch);
          $me_status_code = curl_getinfo($me_ch, CURLINFO_HTTP_CODE);
          curl_close ($me_ch);
          $me_responseArr = json_decode($me_response, true);
          if ($me_responseArr['response']['id']) {
            // 회원아이디(naver_ 접두사에 네이버 아이디를 붙여줌)
            $mb_uid = 'naver_'.$me_responseArr['response']['id'];
            $mb_name = $me_responseArr['response']['name'];
            $mb_email = $me_responseArr['response']['email'];
            $mb_tel = $me_responseArr['response']['mobile'];
            
            $emailCk = $this -> table_model -> emailCk($mb_email);
            if($emailCk=='1'){
              $results = $this -> table_model -> mem_ck($mb_uid,"naver");
              if ($results[0] > 0) {
                
                    // 멤버 DB에 토큰값 업데이트 	$responseArr['access_token']
                  // 로그인
                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet
                        $LOGIN_IP=$_SERVER['HTTP_CLIENT_IP'];
                    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
                        $LOGIN_IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $LOGIN_IP=$_SERVER['REMOTE_ADDR'];
                    }
                    $dateTime = date("Y-m-d H:i:s");
                    $this -> session -> set_userdata('is_login', true);
                    $this -> session -> set_userdata('LOGIN_IDX', $results[1]);
                    $this -> session -> set_userdata('LOGIN_NAME', decrypt($results[2]));
                    $this -> session -> set_userdata('LOGIN_ID', decrypt($results[3]));
                    $this -> session -> set_userdata('LOGIN_IMG', $results[4]);
                    
                    $this -> session -> set_userdata('PRO_IDX', $results[1]);
                    $this -> session -> set_userdata('PRO_ID', $results[3]);
                    $this -> session -> set_userdata('PRO_TYPE', "B");
                    echo "<script>location.href='/';</script>";
              } else {
                $memKey = $this -> table_model -> searchMem($mb_email);

                $data = array(
                  "MET_NAVER" => $mb_uid
                );
                $result = $this -> dao_model -> dbUpdate($memKey->MET_IDX,"MET_IDX","MEM_TB",$data,"","","");
  
                if($result){
                  $resultsCk = $this -> table_model -> mem_ck($mb_uid,"naver");
                  $this -> session -> set_userdata('is_login', true);
                  $this -> session -> set_userdata('LOGIN_IDX', $resultsCk[1]);
                  $this -> session -> set_userdata('LOGIN_NAME', decrypt($resultsCk[2]));
                  $this -> session -> set_userdata('LOGIN_ID', decrypt($resultsCk[3]));
                  $this -> session -> set_userdata('LOGIN_IMG', $resultsCk[4]);

                  $this -> session -> set_userdata('PRO_IDX', $resultsCk[1]);
                  $this -> session -> set_userdata('PRO_ID', $resultsCk[3]);
                  $this -> session -> set_userdata('PRO_TYPE', "B");
                    
                  echo "<script>location.href='/';</script>";
                }
              } // 회원정보가 없다면 회원가입
            }else{
              $mb_email = $me_responseArr['response']['email'];
              $data = array(
                "MET_EMAIL" => encrypt($mb_email),
                "MET_NAME" => encrypt($mb_name),
                "MET_TEL" => encrypt($mb_tel),
                "MET_NAVER" => $mb_uid,
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
				'receiver_1'  => $mb_tel,
				'recvname_1'  => $mb_name,
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
                $resultsCk = $this -> table_model -> mem_ck($mb_uid,"naver");
                $this -> session -> set_userdata('is_login', true);
                $this -> session -> set_userdata('LOGIN_IDX', $resultsCk[1]);
                $this -> session -> set_userdata('LOGIN_NAME', decrypt($resultsCk[2]));
                $this -> session -> set_userdata('LOGIN_ID', decrypt($resultsCk[3]));
                $this -> session -> set_userdata('LOGIN_IMG', $resultsCk[4]);

                $this -> session -> set_userdata('PRO_IDX', $resultsCk[1]);
                $this -> session -> set_userdata('PRO_ID', $resultsCk[3]);
                $this -> session -> set_userdata('PRO_TYPE', "B");
                  
                echo "<script>alert('정상적으로 회원가입 되었습니다.');location.href='/';</script>";
              }
            }
            // 회원가입 DB에서 회원이 있으면(이미 가입되어 있다면) 토큰을 업데이트 하고 로그인함
            /*if (회원정보가 있다면) {
              // 멤버 DB에 토큰값 업데이트
              $responseArr['access_token']
              // 로그인
            } */
  
          } else {
            // 회원정보를 가져오지 못했습니다.
          }
        } else {
          // 토큰값을 가져오지 못했습니다.
        }
		//$this->load->view('testMap',$data);
    //$this->load->view('inc/modal-inquiryAll',$dataCouns);
	}

  public function callbackMody() // 네이버 재인증
	{
    if (!$this->input->get('state')) {
      // 오류가 발생하였습니다. 잘못된 경로로 접근 하신것 같습니다.
      echo "<script>alert('정상적인 접근이 아닙니다.');history.go(-1)</script>";
      exit;
    }
  
        $client_id = "LACTex0CsdPFSVBAH2p4";
        $client_secret = "Xl1WLRroUQ";
        $code = $this->input->get('code');
        $state = $this->input->get('state');
        $redirectURI = urlencode("http://yesyo.com/naver_callback.php");
  
        $naver_curl = "https://nid.naver.com/oauth2.0/token?grant_type=authorization_code&client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirectURI."&code=".$code."&state=".$state;
        // 토큰값 가져오기
        $is_post = false;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $naver_curl);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
  
        if($status_code == 200) {
          $responseArr = json_decode($response, true);
          $_SESSION['naver_access_token'] = $responseArr['access_token'];
          $_SESSION['naver_refresh_token'] = $responseArr['refresh_token'];
          // 토큰값으로 네이버 회원정보 가져오기
          $me_headers = array( 'Content-Type: application/json', sprintf('Authorization: Bearer %s', $responseArr['access_token']) );
          $me_is_post = false; $me_ch = curl_init();
          curl_setopt($me_ch, CURLOPT_URL, "https://openapi.naver.com/v1/nid/me");
          curl_setopt($me_ch, CURLOPT_POST, $me_is_post);
          curl_setopt($me_ch, CURLOPT_HTTPHEADER, $me_headers);
          curl_setopt($me_ch, CURLOPT_RETURNTRANSFER, true);
          $me_response = curl_exec ($me_ch);
          $me_status_code = curl_getinfo($me_ch, CURLINFO_HTTP_CODE);
          curl_close ($me_ch);
          $me_responseArr = json_decode($me_response, true);
          if ($me_responseArr['response']['id']) {
            // 회원아이디(naver_ 접두사에 네이버 아이디를 붙여줌)
            $mb_uid = 'naver_'.$me_responseArr['response']['id'];
            $mb_name = $me_responseArr['response']['name'];
            $mb_email = $me_responseArr['response']['email'];
            $results = $this -> table_model -> mem_ck($mb_uid,"naver");
            if ($results[0] > 0) {
              echo "<script>alert('가입된 정보가 있습니다.');location.href='/main/myPage';</script>";
            } else {
              $dataNv = array(
                "MET_NAVER" => $mb_uid
              );
              $this -> load -> model('dao_model');
              $resultNv = $this -> dao_model -> dbUpdate($this -> session ->userdata('LOGIN_IDX'),"MET_IDX","MEM_TB",$dataNv,"","","");
              echo "<script>alert('정상적으로 네이버 계정 연동이 되었습니다.');location.href='/main/myPage';</script>";
            } // 회원정보가 없다면 회원가입
  
            // 회원가입 DB에서 회원이 있으면(이미 가입되어 있다면) 토큰을 업데이트 하고 로그인함
            /*if (회원정보가 있다면) {
              // 멤버 DB에 토큰값 업데이트
              $responseArr['access_token']
              // 로그인
            } */
  
          } else {
            // 회원정보를 가져오지 못했습니다.
          }
        } else {
          // 토큰값을 가져오지 못했습니다.
        }
		//$this->load->view('testMap',$data);
    //$this->load->view('inc/modal-inquiryAll',$dataCouns);
	}

  public function kakao_callback() // 네이버 재인증
	{
    // KAKAO LOGIN
    define('KAKAO_CLIENT_ID', 'ca6889c8b7dc6867af0b4a4ba8cbfe35');
    define('KAKAO_CLIENT_SECRET', 'ORjdgdll96Llr7DBUBxldFwcrLUorKdN');
    // 필수 아님
    define('KAKAO_CALLBACK_URL', 'https://mydang.kr/main/kakao_callback');
    // if ($_SESSION['kakao_state'] != $_GET['state']) {
    //   // 오류가 발생하였습니다. 잘못된 경로로 접근 하신것 같습니다.
    // }
    if ($_GET["code"]) {
      //사용자 토큰 받기
      $code = $_GET["code"];
      $params = sprintf( 'grant_type=authorization_code&client_id=%s&redirect_uri=%s&code=%s', KAKAO_CLIENT_ID, KAKAO_CALLBACK_URL, $code);
      $TOKEN_API_URL = "https://kauth.kakao.com/oauth/token";
      $opts = array(
        CURLOPT_URL => $TOKEN_API_URL,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSLVERSION => 1, // TLS
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false
      );
      $curlSession = curl_init();
      curl_setopt_array($curlSession, $opts);
      $accessTokenJson = curl_exec($curlSession);
      curl_close($curlSession);
      $responseArr = json_decode($accessTokenJson, true);
      $_SESSION['kakao_access_token'] = $responseArr['access_token'];
      $_SESSION['kakao_refresh_token'] = $responseArr['refresh_token'];
      $_SESSION['kakao_refresh_token_expires_in'] = $responseArr['refresh_token_expires_in'];
      //사용자 정보 가저오기
      $USER_API_URL= "https://kapi.kakao.com/v2/user/me";
      $opts = array(
        CURLOPT_URL => $USER_API_URL,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSLVERSION => 1,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer " . $responseArr['access_token']
        )
      );
      $curlSession = curl_init();
      curl_setopt_array($curlSession, $opts);
      $accessUserJson = curl_exec($curlSession);
      curl_close($curlSession);
      $me_responseArr = json_decode($accessUserJson, true);
      if ($me_responseArr['id']) {
        // 회원아이디(kakao_ 접두사에 네이버 아이디를 붙여줌)
        $mb_uid = 'kakao_'.$me_responseArr['id'];
        // 회원가입 DB에서 회원이 있으면(이미 가입되어 있다면) 토큰을 업데이트 하고 로그인함

        $mb_email = $me_responseArr['kakao_account']['email']; // 이메일
        $mb_tel = $me_responseArr['kakao_account']['phone_number']; // 연락처
        $mb_tel = str_replace("+82 ", "0", $mb_tel); 

        
        $mb_name = $me_responseArr['kakao_account']['name']; // 연락처
        $emailCk = $this -> table_model -> emailCk($mb_email);
        if($emailCk=='1'){
          $results = $this -> table_model -> mem_ck($mb_uid,"kakao");
          if ($results[0] > 0) {
            // 멤버 DB에 토큰값 업데이트
            $responseArr['access_token'];
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet
                $LOGIN_IP=$_SERVER['HTTP_CLIENT_IP'];
            } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
                $LOGIN_IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $LOGIN_IP=$_SERVER['REMOTE_ADDR'];
            }
            $dateTime = date("Y-m-d H:i:s");

            $this -> session -> set_userdata('is_login', true);
            $this -> session -> set_userdata('LOGIN_IDX', $results[1]);
            $this -> session -> set_userdata('LOGIN_NAME', decrypt($results[2]));
            $this -> session -> set_userdata('LOGIN_ID', decrypt($results[3]));
            $this -> session -> set_userdata('LOGIN_IMG', $results[4]);
            echo "<script>location.href='/';</script>";
            // 로그인
          } else {
            $memKey = $this -> table_model -> searchMem($mb_email);

            $data = array(
              "MET_KAKAO" => $mb_uid
            );
            $result = $this -> dao_model -> dbUpdate($memKey->MET_IDX,"MET_IDX","MEM_TB",$data,"","","");

            if($result){
              $resultsCk = $this -> table_model -> mem_ck($mb_uid,"kakao");
              $this -> session -> set_userdata('is_login', true);
              $this -> session -> set_userdata('LOGIN_IDX', $resultsCk[1]);
              $this -> session -> set_userdata('LOGIN_NAME', decrypt($resultsCk[2]));
              $this -> session -> set_userdata('LOGIN_ID', decrypt($resultsCk[3]));
              $this -> session -> set_userdata('LOGIN_IMG', $resultsCk[4]);

              $this -> session -> set_userdata('PRO_IDX', $resultsCk[1]);
              $this -> session -> set_userdata('PRO_ID', $resultsCk[3]);
              $this -> session -> set_userdata('PRO_TYPE', "B");

              echo "<script>location.href='/';</script>";
            }
            //$mb_email = $me_responseArr['kakao_account']['email']; // 이메일
            //echo "<script>alert('가입된 정보가 없습니다.\\r\\n회원가입 후 서비스 이용가능합니다.');location.href='/main/agree?mb_email=".$mb_email."&mb_uid=".$mb_uid."&mb_tel=".$mb_tel."&mb_type=kakao';</script>";
          }
        } else { // 회원정보를 가져오지 못했습니다.
          $mb_email = $me_responseArr['kakao_account']['email']; // 이메일
          $data = array(
            "MET_EMAIL" => encrypt($mb_email),
            "MET_NAME" => encrypt($mb_name),
            "MET_TEL" => encrypt($mb_tel),
            "MET_KAKAO" => $mb_uid,
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
				'receiver_1'  => $mb_tel,
				'recvname_1'  => $mb_name,
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
      
            $resultsCk = $this -> table_model -> mem_ck($mb_uid,"kakao");
            $this -> session -> set_userdata('is_login', true);
            $this -> session -> set_userdata('LOGIN_IDX', $resultsCk[1]);
            $this -> session -> set_userdata('LOGIN_NAME', decrypt($resultsCk[2]));
            $this -> session -> set_userdata('LOGIN_ID', decrypt($resultsCk[3]));
            $this -> session -> set_userdata('LOGIN_IMG', $resultsCk[4]);

            $this -> session -> set_userdata('PRO_IDX', $resultsCk[1]);
            $this -> session -> set_userdata('PRO_ID', $resultsCk[3]);
            $this -> session -> set_userdata('PRO_TYPE', "B");
            echo "<script>alert('정상적으로 회원가입 되었습니다.');location.href='/';</script>";
          }
        }
      } else { // 회원정보를 가져오지 못했습니다.

      }
    }

	}

  public function kakao_callbackModi() // 카카오 재인증
	{
    // KAKAO LOGIN
    define('KAKAO_CLIENT_ID', 'ca6889c8b7dc6867af0b4a4ba8cbfe35');
    define('KAKAO_CLIENT_SECRET', 'ORjdgdll96Llr7DBUBxldFwcrLUorKdN');
    // 필수 아님
    define('KAKAO_CALLBACK_URL', 'https://mydang.kr/main/kakao_callbackModi');
    // if ($_SESSION['kakao_state'] != $_GET['state']) {
    //   // 오류가 발생하였습니다. 잘못된 경로로 접근 하신것 같습니다.
    // }
    if ($_GET["code"]) {
      //사용자 토큰 받기
      $code = $_GET["code"];
      $params = sprintf( 'grant_type=authorization_code&client_id=%s&redirect_uri=%s&code=%s', KAKAO_CLIENT_ID, KAKAO_CALLBACK_URL, $code);
      $TOKEN_API_URL = "https://kauth.kakao.com/oauth/token";
      $opts = array(
        CURLOPT_URL => $TOKEN_API_URL,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSLVERSION => 1, // TLS
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false
      );
      $curlSession = curl_init();
      curl_setopt_array($curlSession, $opts);
      $accessTokenJson = curl_exec($curlSession);
      curl_close($curlSession);
      $responseArr = json_decode($accessTokenJson, true);
      $_SESSION['kakao_access_token'] = $responseArr['access_token'];
      $_SESSION['kakao_refresh_token'] = $responseArr['refresh_token'];
      $_SESSION['kakao_refresh_token_expires_in'] = $responseArr['refresh_token_expires_in'];
      //사용자 정보 가저오기
      $USER_API_URL= "https://kapi.kakao.com/v2/user/me";
      $opts = array(
        CURLOPT_URL => $USER_API_URL,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSLVERSION => 1,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer " . $responseArr['access_token']
        )
      );
      $curlSession = curl_init();
      curl_setopt_array($curlSession, $opts);
      $accessUserJson = curl_exec($curlSession);
      curl_close($curlSession);
      $me_responseArr = json_decode($accessUserJson, true);
      if ($me_responseArr['id']) {
        // 회원아이디(kakao_ 접두사에 네이버 아이디를 붙여줌)
        $mb_uid = 'kakao_'.$me_responseArr['id'];
        // 회원가입 DB에서 회원이 있으면(이미 가입되어 있다면) 토큰을 업데이트 하고 로그인함

        $mb_email = $me_responseArr['kakao_account']['email']; // 이메일

        $results = $this -> table_model -> mem_ck($mb_uid,"kakao");
        if ($results[0] > 0) {
          echo "<script>alert('가입된 정보가 있습니다.');location.href='/main/myPage';</script>";
        } // 회원정보가 없다면 회원가입
        else {
          $dataKa = array(
            "MET_KAKAO" => $mb_uid
          );
          $this -> load -> model('dao_model');
          $resultKa = $this -> dao_model -> dbUpdate($this -> session ->userdata('LOGIN_IDX'),"MET_IDX","MEM_TB",$dataKa,"","","");
          echo "<script>alert('정상적으로 카카오 계정 연동이 되었습니다.');location.href='/main/myPage';</script>";
        }
      } else { // 회원정보를 가져오지 못했습니다.
      }
    }

	}
  public function certif() // 창업소식 리스트
	{
    $type="B";
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
      
      $results = $this -> table_model -> telCk($type,$userName,$resultPhone);
      if($results=='1'){
        echo "<script>alert('이미 가입된 회원입니다.');self.close();</script>";
      }else{
        echo "<script>opener.parent.location='/main/join02?userName=".$userName."&userPhone=".$resultPhone."';self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}
  public function info() // 모바일사업자정보
	{
		$nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
 
		$this->load->view('information');
	}
  public function Msearch() // 모바일검색페이지
	{
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
 
		$this->load->view('searchMobile');
	}
  public function Mmypage() // 모바일마이페이지
	{
    $MET_IDX = $this -> session ->userdata('LOGIN_IDX');
    if(!$MET_IDX){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/';</script>";
      exit;
    }
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('inc/header',$nowPage);
		$this->load->view('mypage');
	}
  public function policy() // 이용약관.정책페이지
	{
		$this->load->view('policy');
	}

  public function certifMypage() // 검수중
	{
    $tel = $this->input->get('tel');
    $key = $this->input->get('key');
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
      
      $results = $this -> table_model -> MYtelCk("B",$userName,$resultPhone,$key,$tel);
      if($results=='1'){
        echo "<script>alert('이미 가입된 회원입니다.');self.close();</script>";
      }else{
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>";
        echo "<script>$(\"#MET_TEL\",opener.document).val('".$resultPhone."');$(\"#MET_NAME\",opener.document).val('".$userName."');</script>";
        echo "<script>self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}

  public function certifFindId() // 검수중
	{
    $MET_EMAIL_PW = $this->input->get('MET_EMAIL_PW');
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
      
      $results = $this -> table_model -> searchFind($userName,$resultPhone,"");
      if($results != '0'){
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>";
        echo "<script>opener.location.href = \"/main/findId?email=".decrypt($results->MET_EMAIL)."\";</script>";
        echo "<script>self.close();</script>";
      }else{
        echo "<script>alert('가입된 회원정보가 없습니다.');self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}

  public function certifFinPw() // 검수중
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

      $MET_EMAIL_PW = $this->input->get('MET_EMAIL_PW');  

      $results = $this -> table_model -> searchFind($userName,$resultPhone,$MET_EMAIL_PW);
      if($results != '0'){
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>";
        echo "<script>opener.location.href = \"/main/findPw?key=".$results->MET_IDX."\";</script>";
        echo "<script>self.close();</script>";
      }else{
        echo "<script>alert('가입된 회원정보가 없습니다.');self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}

  /*public function codeF() // 검색 맵
	{
    $data["results"] = $this -> table_model -> codeF();
		$this->load->view('codeF',$data);
	}*/
  
}