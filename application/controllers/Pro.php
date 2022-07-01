<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pro extends CI_Controller {

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
      $this -> load -> helper("configPro"); // 설정 helper
			$this->load->helper('download'); // 다운로드 helper
      $this -> load -> helper("bankcode");
      $this -> load -> model('dao_model');
	}

	public function index() // 메인
	{
    $this->load->view('pro/inc/header');
		$this -> load -> view('pro/realIndex');
    $this->load->view('inc/footer');
	}
	public function login() // 로그인
	{
    if($this -> session ->userdata('PRO_IDX')){
      if($this -> session ->userdata('PRO_TYPE')=="A" || $this -> session ->userdata('PRO_TYPE')=="B"){
        echo "<script>location.href='/pro/mgmtBord';</script>";
      }else if($this -> session ->userdata('PRO_TYPE')=="C"){
        echo "<script>location.href='/pro/constrCase';</script>";
      }
    }
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this -> load -> view('pro/index');
    $this->load->view('inc/footer');
	}
  public function agree() // 이용약관&개인정보취급방침
	{
    if($this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }

    $data['type']= $this->input->get('type');
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/agree',$data);
    $this->load->view('inc/footer');
	}
  public function joinA() // 회원가입 A
	{
    if($this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }

    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/joinA');
    $this->load->view('inc/footer');
	}
  public function joinB() // 회원가입 B
	{
    if($this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }
    
    $type = $this->input->get('type');
    $userName = $this->input->get('userName');
    $userPhone = $this->input->get('userPhone');
    $data['type']= $type;
    $data['userName']= $userName;
    $data['userPhone']= $userPhone;
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/joinB',$data);
    $this->load->view('inc/footer');
	}
  public function joinC() // 회원가입 C
	{
    if($this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/joinC');
    $this->load->view('inc/footer');
	}
  public function findId() // 아이디찾기
	{
    if($this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/findId');
    $this->load->view('inc/footer');
	}
  public function findIdView() // 아이디 확인
	{
    if($this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }
    
    $data['emailA']= $this->input->get('emailA');
    $data['emailB']= $this->input->get('emailB');
    $data['emailC']= $this->input->get('emailC');
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/findIdView',$data);
    $this->load->view('inc/footer');
	}
  public function findPw() // 패스워드찾기
	{
    if($this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }
    
    $data['email']= $this->input->get('email');
    $data['type']= $this->input->get('type');
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/findPw',$data);
    $this->load->view('inc/footer');
	}
  public function findPwModify() // 패스워드 변경
	{
    if($this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }
    
    $data['key']= $this->input->get('key');
    $data['type']= $this->input->get('type');
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/findPwModify',$data);
    $this->load->view('inc/footer');
	}
  public function myPage() // 개인정보 변경
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }
    $data["PRO_IDX"] = $PRO_IDX;
    $data["PRO_TYPE"] = $PRO_TYPE;
    if($PRO_TYPE=='A'){
      $data["results"] = $this -> table_model -> table_view("BROKER_TB","BKT",$PRO_IDX);
    }else if($PRO_TYPE=='B'){
      $data["results"] = $this -> table_model -> table_view("MEM_TB","MET",$PRO_IDX);
    }else{
      $data["results"] = $this -> table_model -> table_view("PARTNER_TB","PTT",$PRO_IDX);
    }
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/myPage',$data);
    $this->load->view('pro/inc/footer');
	}
  public function storeList() // 매물 등록 리스트
	{
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }else{
      if($PRO_TYPE=='C'){
        echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
      }
    }
    include_once 'Get.php';
    

		$returnData = configList("storeList",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];
    $state  = $this->input->get('state');
    $bstCate  = $this->input->get('bstCate');
    $slotKey  = $this->input->get('slotKey');
    
    if(!$state){
      $state="A";
    }
    if($PRO_TYPE=='A'){
      $bkSub = $this -> table_model -> table_list("BROKER_SUB_TB","BST","","", ""," AND BKT_IDX='".$PRO_IDX."' ");
      $data["bkSub"] = $bkSub;
    }else{
      $bkSub = $this -> table_model -> table_list("MEM_TB","MET","","", ""," AND MET_IDX='".$PRO_IDX."' ");
      $data["bkSub"] = $bkSub;
    }
    $data['slotKey'] = $slotKey;
    $data['key'] = $PRO_IDX;
    $data['type'] = $PRO_TYPE;
    $data['state'] = $state;
    $data['bstCate'] = $bstCate;

    $results = $this -> table_model -> table_PSlist($PRO_IDX,$PRO_TYPE,$state,$search,$bstCate,$slotKey); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    
    $data["results"] = $results[0];
    $data["propCnt"] = $results[1];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $data["slot"] = $results[2];

    $slotTotal = $this -> table_model -> table_Slotlist(" AND USER_IDX='".$PRO_IDX."' AND PST_USER_TYPE='".$PRO_TYPE."' AND PST_END >= '".date("Y-m-d")."' AND PST_STATE='A' AND PST_START <= '".date("Y-m-d")."' ")[0];


    $data["slotTotal"] = $slotTotal;
    
    $useCnt=0;
    $stopCnt=0;
    $compleCnt=0;
    $InspeCnt=0;
    if($slotKey){
      $useCnt = $this -> table_model -> table_list("PROPERTY_TB","PPT","","", ""," AND USER_IDX='".$PRO_IDX."' AND PPT_USER_TYPE='".$PRO_TYPE."' AND PPT_STATE='A' AND PST_IDX='".$slotKey."' ")[1];
      $InspeCnt = $this -> table_model -> table_list("PROPERTY_TB","PPT","","", ""," AND USER_IDX='".$PRO_IDX."' AND PPT_USER_TYPE='".$PRO_TYPE."' AND PPT_STATE='B' AND PST_IDX='".$slotKey."' ")[1];
    }else{
      $slotKey = $this -> table_model -> tableLast("PROP_SLOT_TB","PST"," AND USER_IDX='".$PRO_IDX."' AND PST_USER_TYPE='".$PRO_TYPE."' ");
      $useCnt = $this -> table_model -> table_list("PROPERTY_TB","PPT","","", ""," AND USER_IDX='".$PRO_IDX."' AND PPT_USER_TYPE='".$PRO_TYPE."' AND PPT_STATE='A' AND PST_IDX='".$slotKey->PST_IDX."' ")[1];
      $InspeCnt = $this -> table_model -> table_list("PROPERTY_TB","PPT","","", ""," AND USER_IDX='".$PRO_IDX."' AND PPT_USER_TYPE='".$PRO_TYPE."' AND PPT_STATE='B' AND PST_IDX='".$slotKey->PST_IDX."' ")[1];
    }
    
    $stopCnt = $this -> table_model -> table_list("PROPERTY_TB","PPT","","", ""," AND USER_IDX='".$PRO_IDX."' AND PPT_USER_TYPE='".$PRO_TYPE."' AND PPT_STATE='D' ")[1];
    $compleCnt = $this -> table_model -> table_list("PROPERTY_TB","PPT","","", ""," AND USER_IDX='".$PRO_IDX."' AND PPT_USER_TYPE='".$PRO_TYPE."' AND PPT_STATE='C' ")[1];

    
    $data["useCnt"] = $useCnt;
    $data["stopCnt"] = $stopCnt;
    $data["compleCnt"] = $compleCnt;
    $data["InspeCnt"] = $InspeCnt;
    
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
    
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/store/storeList',$data);
    $this->load->view('pro/inc/footer');
	}
  public function storeWrite() // 매물 등록 form
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro/login';</script>";
      exit;
    }
    
    $key= $this->input->get('key');
    $data['key']=$key;
    $state= $this->input->get('state');
    $data['state']=$state;
    $psKey= $this->input->get('psKey');
    $data['psKey']=$psKey;
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    $data['pType']=$PRO_TYPE;

    // $resultsList = $this -> table_model -> table_PSlist($PRO_IDX,$PRO_TYPE,"$state","","",$psKey);
    //  if(!$resultsList[2]){
    //   echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
    //   exit;
    //  }
       
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }

    $slot = $this -> table_model -> Sl_table_view($PRO_IDX,$PRO_TYPE);
    if($PRO_TYPE=='A'){
      $bkSub = $this -> table_model -> table_list("BROKER_SUB_TB","BST","","", ""," AND BKT_IDX='".$PRO_IDX."' ");
      $data["bkSub"] = $bkSub;
    }else{
      $data["bkSub"] = "";
    }
    $data["slot_cnt"] = $slot[0];
    $data["slot"] = $slot[1];
    $data["results"] = $this -> table_model -> table_view("PROPERTY_TB","PPT",$key);
    if(!$this -> table_model -> table_PIlist($key)){
      $data["resultsImg"] = 0;
    }else{
      $data["resultsImg"] = $this -> table_model -> table_PIlist($key); // 데이터 리스트  // 인자값(키값)
    }
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/store/storeWrite',$data);
    $this->load->view('pro/inc/footer');
	}
  public function storeView() // 매물 등록 상세페이지
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/store/storeWrite',$data);
    $this->load->view('pro/inc/footer');
	}
  public function constrCase() // 시공사례 리스트
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    include_once 'Get.php';
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }

		$returnData = configList("constrCase",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("CASE_TB","CST",$search,$config["per_page"], $offset," AND PTT_IDX='".$PRO_IDX."' "); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    
    $nowPage["nowPage"]= $this->uri->segment(2);
    $dataCouns["results"] = $this -> table_model -> couns_list();
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/case/case',$data);
		$this->load->view('pro/inc/footer');
	}
	public function constrCaseView() // 시공사례 상세페이지
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('inc/header',$nowPage);
		$this->load->view('pro/case/caseView',$data);
		$this->load->view('inc/footer');
	}
  public function constrCaseWrite() // 시공사례 등록 form
	{
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    include_once 'Get.php';
    $key = $this->input->get('key');
    $data["results"] = $this -> table_model -> table_view("CASE_TB","CST",$key); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["CST_IDX"] = $key;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
    $data["key"] = $key;
    $nowPage["nowPage"]= $this->uri->segment(2);
    $this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/case/caseWrite',$data);
		$this->load->view('pro/inc/footer');
	}
  public function qnaA() // 문의 A 리스트
	{
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('inc/header',$nowPage);
		$this->load->view('pro/qna/qnaListA',$data);
		$this->load->view('inc/footer');
	}
  public function qnaViewA() // 문의 A 리스트
	{
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('inc/header',$nowPage);
		$this->load->view('pro/qna/qnaViewA',$data);
		$this->load->view('inc/footer');
	}
  public function qnaB() // 문의 B 리스트
	{
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('inc/header',$nowPage);
		$this->load->view('pro/qna/qnaListB',$data);
		$this->load->view('inc/footer');
	}
  public function qnaViewB() // 문의 B 리스트
	{
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('inc/header',$nowPage);
		$this->load->view('pro/qna/qnaViewB',$data);
		$this->load->view('inc/footer');
	}
  public function payment() // 결제 페이지
	{
    
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    $data["key"] = $PRO_IDX;
    $data["type"] = $PRO_TYPE;
    if($PRO_TYPE=='A'){
      $results = $this -> table_model -> table_view("BROKER_TB","BKT",$PRO_IDX);
		  $data["results"] = $results;
      $data["name"]=decrypt($results->BKT_NAME);
      $data["tel"]=decrypt($results->BKT_HP);
      $data["email"]=decrypt($results->BKT_EMAIL);
    }else{
      $results = $this -> table_model -> table_view("MEM_TB","MET",$PRO_IDX);
      $data["results"] = $results;
      $data["name"]=decrypt($results->MET_NAME);
      $data["tel"]=decrypt($results->MET_TEL);
      $data["email"]=decrypt($results->MET_EMAIL);
    }

    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
    $this->load->view('lib/INIStdPayUtil');
		$this->load->view('pro/payment/index',$data);
		$this->load->view('pro/inc/footer');
	}

  public function paymentExt() // 연장 결제 페이지
	{
    $key = $this->input->get('key');
    $data["slotkey"]=$key;
    $slot = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$key);
    $data["slot"]=$slot;

    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    $data["key"] = $PRO_IDX;
    $data["type"] = $PRO_TYPE;
    if($PRO_TYPE=='A'){
      $results = $this -> table_model -> table_view("BROKER_TB","BKT",$PRO_IDX);
		  $data["results"] = $results;
      $data["name"]=decrypt($results->BKT_NAME);
      $data["tel"]=decrypt($results->BKT_HP);
      $data["email"]=decrypt($results->BKT_EMAIL);
    }else{
      $results = $this -> table_model -> table_view("MEM_TB","MET",$PRO_IDX);
      $data["results"] = $results;
      $data["name"]=decrypt($results->MET_NAME);
      $data["tel"]=decrypt($results->MET_TEL);
      $data["email"]=decrypt($results->MET_EMAIL);
    }

    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
    $this->load->view('lib/INIStdPayUtil');
		$this->load->view('pro/payment/paymentExt',$data);
		$this->load->view('pro/inc/footer');
	}
  public function payReturn() // 결제 페이지
	{
    $key = $this->input->post('key');
    $data["key"]=$key;
    $this->load->view('lib/INIStdPayUtil');
    $this->load->view('lib/HttpClient');
		$this->load->view('pro/payment/return',$data);
	}
  public function payClose() // 결제 페이지
	{
		$this->load->view('pro/payment/close');
	}

  public function payCmp() // 결제완료 페이지
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }

    $psKey = $this->input->get('psKey');
    $pmKey = $this->input->get('pmKey');

    $resultsPs = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$psKey);
    $resultsPM = $this -> table_model -> table_view("PAYMENT_TB","PMT",$pmKey);
		$data["resultsPs"] = $resultsPs;
    $data["resultsPM"] = $resultsPM;

    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/payment/PymntCmp',$data);
		$this->load->view('pro/inc/footer');
	}
  
  public function paymentList() // 결제 리스트
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    include_once 'Get.php';
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }
		$returnData = configList("paymentList",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];
    $data["key"] = $PRO_IDX;
    $data["type"] = $PRO_TYPE;
    
    $results = $this -> table_model -> table_Paymentlist("PAYMENT_TB","PMT","",$config["per_page"],$offset," AND USER_IDX='".$PRO_IDX."' AND USER_TYPE='".$PRO_TYPE."' "); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $data["resultsPs"] = $results[2];

    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수
    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징

    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/payment/list',$data);
		$this->load->view('pro/inc/footer');
	}
  public function agents() // 결제 리스트
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    include_once 'Get.php';
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }

		$returnData = configList("agents",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];
    $data["key"] = $PRO_IDX;
    $data["type"] = $PRO_TYPE;
    
    $results = $this -> table_model -> table_list("BROKER_SUB_TB","BST","","",""," AND BKT_IDX='".$PRO_IDX."' "); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $data["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/my/myAgents',$data);
		$this->load->view('pro/inc/footer');
	}
  public function prpIqMgmtA() // 결제 리스트
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    include_once 'Get.php';
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    $bsKey=$this->input->get('bsKey');
    
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }

    $returnData = configList("prpIqMgmtA",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];
    $data["key"] = $PRO_IDX;
    $data["type"] = $PRO_TYPE;
    $data["search"] = $search;
    $data["bsKey"] = $bsKey;
    
    $results = $this -> table_model -> qnaBkList($PRO_IDX,$PRO_TYPE,$config["per_page"],$offset,$search,$bsKey); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수
    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징

    if($PRO_TYPE=='A'){
      $data["resultsSub"] = $this -> table_model -> table_list("BROKER_SUB_TB","BST","","",""," AND BKT_IDX='".$PRO_IDX."' ")[0];
    }
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/my/prpIqMgmtA',$data);
		$this->load->view('pro/inc/footer');
	}
  public function prpIqMgmtB() // 결제 리스트
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    include_once 'Get.php';
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    $state=$this->input->get('state');
    
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }

    $returnData = configList("prpIqMgmtB",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];
    $data["key"] = $PRO_IDX;
    $data["type"] = $PRO_TYPE;
    $data["search"] = $search;
    $data["state"] = $state;
    
    $results = $this -> table_model -> qnaPnList($PRO_IDX,$PRO_TYPE,$config["per_page"],$offset,$search,$state); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수
    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징

    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/my/prpIqMgmtB',$data);
		$this->load->view('pro/inc/footer');
	}

  public function qnaList() // 고객센터 문의게시판
	{
		$this->load->view('pro/inc/header');
		$this->load->view('pro/qna/qnaList');
		$this->load->view('pro/inc/footer');
	}
  public function qnaView() // 고객센터 문의상세
	{
		$this->load->view('pro/inc/header');
		$this->load->view('pro/qna/qnaView');
		$this->load->view('pro/inc/footer');
	}
  public function qnaWrite() // 고객센터 문의하기쓰기
	{
		$this->load->view('pro/inc/header');
		$this->load->view('pro/qna/qnaWrite');
		$this->load->view('pro/inc/footer');
	}
  public function notice() // 공지사항 게시판
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    include_once 'Get.php';
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    $search=$this->input->get('search');
    
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }
		$returnData = configList("notice",$pageNo,$search,""); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];
    $data["key"] = $PRO_IDX;
    $data["type"] = $PRO_TYPE;
    $data["search"] = $search;
    
    $results = $this -> table_model -> table_list("NOTICE_PRO_TB","NPT","$search",$config["per_page"],$offset," "); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기

    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수
    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징

    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/svcCnt/notice',$data);
		$this->load->view('pro/inc/footer');
	}
  public function noticeView() // 공지사항 상세페이지
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');
    $key=$this->input->get('key');
    $search=$this->input->get('search');
    $pageNo=$this->input->get('pageNo');
    if(!$PRO_IDX){
      echo "<script>location.href='/pro/';</script>";
    }
    $data["key"] = $PRO_IDX;
    $data["type"] = $PRO_TYPE;
    $data["search"] = $search;
    $data["pageNo"] = $pageNo;
    $data["results"] = $this -> table_model -> table_view("NOTICE_PRO_TB","NPT",$key);
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/svcCnt/noticeView',$data);
		$this->load->view('pro/inc/footer');
	}
  public function exmnt() // 검수중
	{
		$this->load->view('pro/inc/header');
		$this->load->view('pro/exmnt');
		$this->load->view('pro/inc/footer');
	}

  public function certif() // 검수중
	{
    $type=$this->input->get('type');
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
        echo "<script>opener.parent.location='/pro/joinB?type=".$type."&userName=".$userName."&userPhone=".$userPhone."';self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}
  public function certifMypage() // 검수중
	{
    $type=$this->input->get('type');
    $key=$this->input->get('key');
    $tel=$this->input->get('tel');
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
      
      $results = $this -> table_model -> MYtelCk($type,$userName,$userPhone,$key,$tel);
      if($results=='1'){
        echo "<script>alert('이미 가입된 회원입니다.');self.close();</script>";
      }else{
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>";
        echo "<script>$(\"#joinHp\",opener.document).val('".$resultPhone."');$(\"#joinName\",opener.document).val('".$userName."');</script>";
        echo "<script>$(\"#join_form\").attr(\"action\", \"/DAO/myPagePro\");</script>";
        echo "<script>$(\"#join_form\").attr(\"enctype\", \"multipart/form-data\");</script>";
        echo "<script>self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}

  public function certifAgents() // 검수중
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
      
      $results = $this -> table_model -> bkSubtelCk($userName,$resultPhone);
      if($results=='1'){
        echo "<script>alert('이미 가입된 담당자 입니다.');self.close();</script>";
      }else{
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>";
        echo "<script>$(\"#bstHpI\",opener.document).val('".$resultPhone."');$(\"#bstNameI\",opener.document).val('".$userName."');</script>";
        echo "<script>$(\"#add_form\",opener.document).attr(\"action\", \"/DAO/bstInsert\");</script>";
        echo "<script>self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}

  public function certifAgentsM() // 검수중
	{
    $bstKey=$this->input->get('bstKey');
    
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
      
      $results = $this -> table_model -> bkSubMtelCk($userName,$resultPhone,$bstKey);
      if($results=='1'){
        echo "<script>alert('이미 가입된 담당자 입니다.');self.close();</script>";
      }else if($results=='2'){
        echo "<script>alert('다른 중개사에 담당자로 등록이 되어있습니다. 삭제 후 가입 가능합니다.');self.close();</script>";
      }else{
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>";
        echo "<script>$(\"#bstHpM\",opener.document).val('".$resultPhone."');$(\"#bstNameM\",opener.document).val('".$userName."');</script>";
        echo "<script>$(\"#modify_form\").attr(\"action\", \"/DAO/bstModify\");</script>";
        echo "<script>self.close();</script>";
      }
       //echo "<script>parent.document.getElementById('userName').val("+userName+");parent.document.getElementById('userPhone').val("+userPhone+");window.opener.$(\"#agree_form\").submit();self.close();</script>";
    }else{
      echo "<script>alert('정상적으로 인증되지 않았습니다.');self.close();</script>";
    }
	}

  public function Mmypage() // 모바일마이페이지
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/Mmypage');
		$this->load->view('pro/inc/footer');
	}

  public function payVirtualApp() // 가상결제 리턴
	{

    //@extract($_POST);
    @extract($_SERVER);

    $TEMP_IP = getenv("REMOTE_ADDR");
    $PG_IP = substr($TEMP_IP, 0, 10);

    if($PG_IP == "203.238.37" || $PG_IP == "39.115.212" || $PG_IP == "183.109.71") //PG에서 보냈는지 IP로 체크
    {
        // 이니시스 NOTI 서버에서 받은 Value
        $no_tid = $_REQUEST["no_tid"];                      // 거래TID
        $no_oid = $_REQUEST["no_oid"];                    // 상점주문번호
        $cd_bank = $_REQUEST["cd_bank"];                // 은행코드
        $cd_deal = $_REQUEST["cd_deal"];                  // 거래취급 기관코드(실제입금은행)
        $dt_trans = $_REQUEST["dt_trans"];                 // 금융기관 발생 거래일자
        $tm_trans = $_REQUEST["tm_trans"];               // 금융기관 발생 거래시각
        $no_vacct = $_REQUEST["no_vacct"];               // 계좌번호
        $amt_input = $_REQUEST["amt_input"];           // 입금금액
        $flg_close = $_REQUEST["flg_close"];               // 마감구분[0:당일마감전, 1:당일마감후]
        $cl_close = $_REQUEST["cl_close"];                  // 마감구분코드[0:당일마감전, 1:당일마감후]
        $type_msg = $_REQUEST["type_msg"];             // 거래구분[0200:정상]
        $nm_inputbank = $_REQUEST["nm_inputbank"]; // 입금은행명
        $nm_input = $_REQUEST["nm_input"];             // 입금자명
        $dt_inputstd = $_REQUEST["dt_inputstd"];        // 입금기준일자
        $dt_calculstd = $_REQUEST["dt_calculstd"];       // 정산기준일자
        $dt_transbase = $_REQUEST["dt_transbase"];     // 거래기준일자
        $cl_trans = $_REQUEST["cl_trans"];                  // 거래구분코드
        $cl_kor = $_REQUEST["cl_kor"];                      // 한글구분코드
        $dt_cshr = $_REQUEST["dt_cshr"];                   // 현금영수증 발급일자
        $tm_cshr = $_REQUEST["tm_cshr"];                 // 현금영수증 발급시간
        $no_cshr_appl = $_REQUEST["no_cshr_appl"];   // 현금영수증 발급번호
        $no_cshr_tid = $_REQUEST["no_cshr_tid"];       // 현금영수증 발급TID
        // if(데이터베이스 등록 성공 유무 조건변수 = true) 
        // 주의 : DB처리후 정상일경우만 OK출력

        
      
        if($type_msg=='0200'){
          
          $dataPm = array(
            "PMT_STATE" => "A",
            "PMT_DATE" => date("Y-m-d"),
            "PMT_TIME" => date("H:i:s")
          );
          $dataPs = array(
            "PST_STATE" => "A"
          );
          $dataVa = array(
            "ACT_TID" => $no_tid,
            "ACT_OID" => $no_oid,
            "ACT_CD_BANK" => $cd_bank,
            "ACT_CD_DEAL" => $cd_deal,
            "ACT_DT_TRANS" => $dt_trans,
            "ACT_TM_TRANS" => $tm_trans,
            "ACT_NO_VACCT" => $no_vacct,
            "ACT_AMT_INPUT" => $amt_input,
            "ACT_FLG_CLOSE" => $flg_close,
            "ACT_CL_CLOSE" => $cl_close,
            "ACT_TYPE_MSG" => $type_msg,
            "ACT_NM_INPUTBANK" => $nm_inputbank,
            "ACT_NM_INPUT" => $nm_input,
            "ACT_DT_INPUTSTD" => $dt_inputstd,
            "ACT_DT_CALCULSTD" => $dt_calculstd,
            "ACT_DT_TRANSBASE" => $dt_transbase,
            "ACT_CL_TRANS" => $cl_trans,
            "ACT_CL_KOR" => $cl_kor,
            "ACT_DT_CSHR" => $dt_cshr,
            "ACT_TM_CSHR" => $tm_cshr,
            "ACT_CSHR_APPL" => $no_cshr_appl,
            "ACT_CSHR_TID" => $no_cshr_tid,
            "ACT_REG_DATE" => date("Y-m-d H:i:s")
          );
          $result = $this -> dao_model -> dbUpdatePm($no_tid,$no_oid,$dataPm,$dataPs,$dataVa);
          
          if($result){
            $resultPm = $this -> table_model -> PayReturnList($no_oid);
            $resultPs = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$resultPm->PST_IDX);
            $tmpNum = explode("_", $no_oid); 
            $tel="";
            $name="";
            if($resultPm->USER_TYPE=='A'){
              $userResults = $this -> table_model -> table_view("BROKER_TB","BKT",$resultPm->USER_IDX);
              $tel=decrypt($userResults->BKT_HP);
              $name=decrypt($userResults->BKT_NAME);
            }else if($resultPm->USER_TYPE=='B'){
              $userResults = $this -> table_model -> table_view("MEM_TB","MET",$resultPm->USER_IDX);
              $tel=decrypt($userResults->MET_TEL);
              $name=decrypt($userResults->MET_NAME);
            }

            include_once 'api/curl_token.php';
      $token_key = token_get();
      $tel = $tel; 
      $tmp_tel = $tel;
      $tel = str_replace("-", "", $tel); 
      $name = $name; 
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TI_3950',
				'sender'      => '07086338941',
				'receiver_1'  => $tel,
				'recvname_1'  => $name,
				'subject_1'   => '가상계좌 입금 return',
				'message_1'   => '[명당] 결제완료 안내
'.$name.'님, 광고상품 결제가 완료되었습니다.

- 주문번호 : '.$tmpNum[1].'
- 결제일 : '.date("Y-m-d").'
- 금액 : '.$amt_input.'

- 광고기간 : '.date("Y.m.d", strtotime($resultPs->PST_START)).' ~ '.date("Y.m.d", strtotime($resultPs->PST_END)).'
- 슬롯개수 : '.$resultPs->PPT_CNT.'개

▷ 명당 문의하기
- 고객센터 : 070.8633.8942 (realdeno@naver.com)
- 운영시간 : AM 9:30 ~ PM 06:00 (주말&공휴일 제외)
- 점심시간 : PM 12:00 ~ PM 13:00');
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

            include_once 'api/curl_token.php';
      $token_key = token_get();
      $tel = "01094519137"; 
      $name = "김경덕"; 
			$_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
			$_hostInfo  =	parse_url($_apiURL);
			$_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
			$_variables =	array(
				'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
				'userid'      => 'realdeno', 
				'token'       => $token_key, 
				'senderkey'   => 'd81d30e63a31e347dd02f28960d7258030ab2e66', 
				'tpl_code'    => 'TI_4139',
				'sender'      => '07086338941',
				'receiver_1'  => $tel,
				'recvname_1'  => $name,
				'subject_1'   => '가상계좌 입금 return',
				'message_1'   => '거래구분
'.$type_msg.'

거래TID
'.$no_tid.'

상점주문번호
'.$no_oid.'

은행코드
'.$cd_bank.'

거래취급 기관코드(실제입금은행)
'.$cd_deal.'

금융기관 발생 거래 일자
'.$dt_trans.'

금융기관 발생 거래시각
'.$tm_trans.'

계좌번호
'.$no_vacct.'

입금금액
'.$amt_input.'

마감구분[0:당일마감전, 1:당일마감후]
'.$flg_close.'

마감구분코드[0:당일마감전, 1:당일마감후]
'.$cl_close.'

입금은행명
'.$nm_inputbank.'

입금자명
'.$nm_input.'

입금기준일자
'.$dt_inputstd.'

정산기준일자
'.$dt_calculstd.'

거래기준일자
'.$dt_transbase.'

거래구분코드
'.$cl_trans.'

한글구분코드
'.$cl_kor.'

현금영수증 발급일자
'.$dt_cshr.'

현금영수증 발급시간
'.$tm_cshr.'

현금영수증 발급번호
'.$no_cshr_appl.'

현금영수증 발급TID
'.$no_cshr_tid.'');
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
            echo "OK";
          }else{
            echo "FAIL";
          }
          
        }else{
          echo "FAIL";
        }
      // else
    //echo "FAIL";
    }else{
      echo "FAIL";
    }
	}


  public function advrt() // 광고관리페이지
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');

    $totalSlot = $this -> table_model -> table_list("PROP_SLOT_TB","PST","","", ""," AND PST_USER_TYPE='".$PRO_TYPE."' AND USER_IDX='".$PRO_IDX."' AND PST_STATE='A' AND PST_START <= '".date("Y-m-d")."' AND PST_END >= '".date("Y-m-d")."' ");
    $data["slotTotalCnt"]=$totalSlot[1];
    $data["slotTotal"]=$totalSlot[0];
    $data["PRO_IDX"]=$PRO_IDX;
    $data["PRO_TYPE"]=$PRO_TYPE;

    $data["useSlot"] = $this -> table_model -> slotCurr($PRO_IDX,$PRO_TYPE);

    $data["userState"] = $this -> table_model -> userState($PRO_IDX)[0];

    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('pro/inc/header',$nowPage);
		$this->load->view('pro/advrt/adMgmt',$data);
		$this->load->view('pro/inc/footer');
	}

  public function mgmtBord() // 광고관리페이지
	{
    if(!$this -> session ->userdata('PRO_IDX')){
      echo "<script>alert('정상적인 접근이 아닙니다.');location.href='/pro';</script>";
      exit;
    }
    
    $PRO_IDX = $this -> session ->userdata('PRO_IDX');
    $PRO_TYPE = $this -> session ->userdata('PRO_TYPE');

    $totalSlotA = $this -> table_model -> table_list("PROP_SLOT_TB","PST","","", ""," AND PST_USER_TYPE='".$PRO_TYPE."' AND USER_IDX='".$PRO_IDX."' ");
    $totalSlotB = $this -> table_model -> table_Slotlist(" AND USER_IDX='".$PRO_IDX."' AND PST_USER_TYPE='".$PRO_TYPE."' AND PST_END >= '".date("Y-m-d")."' AND PST_STATE='A' ")[0];
    $totalSlotBCnt = $this -> table_model -> table_Slotlist(" AND USER_IDX='".$PRO_IDX."' AND PST_USER_TYPE='".$PRO_TYPE."' AND PST_END >= '".date("Y-m-d")."' AND PST_STATE='A' ")[1];

    $notice = $this -> table_model -> table_list("NOTICE_PRO_TB","NPT","","", "","");

    if($PRO_TYPE=='A'){
      $data["mem"] = $this -> table_model -> table_view("BROKER_TB","BKT",$PRO_IDX);
      $data["memSub"] = $this -> table_model -> table_list("BROKER_SUB_TB","BST","","", ""," AND BKT_IDX='".$PRO_IDX."' ");
    }else if($PRO_TYPE=='B'){
      $data["mem"] = $this -> table_model -> table_view("MEM_TB","MET",$PRO_IDX);
    }


    $data["slotA"]=$totalSlotA;
    $data["slotB"]=$totalSlotB;
    $data["slotBCnt"]=$totalSlotBCnt;
    $data["notice"]=$notice;
    $data["type"]=$PRO_TYPE;
    
		$this->load->view('pro/inc/header');
		$this->load->view('pro/advrt/mgmtBord',$data);
		$this->load->view('pro/inc/footer');
	}
  
}