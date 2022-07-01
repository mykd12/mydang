<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
      $this -> load -> model('dao_model');
			$config = array(); // 설정 배열선언
			$this->load->model('table_model'); // 데이터 호출
      $this->load->helper(
        array('url', 'adm', 'privatehash')
      );
      $this -> load -> helper("bankcode");
	}

	public function index()
	{
		$this -> load -> view('admin/index');
	}
  
	public function user() // 일반유저 리스트
	{
    include_once 'Get.php';

		$returnData = configList("user",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("MEM_TB","MET",$search,$config["per_page"], $offset,""); // 데이터 리스트 // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/user/list',$data);
		$this->load->view('admin/inc/footer');
	}
	public function userWrite() // 일반유저 form
	{
		include_once 'Get.php';

		$MET_IDX = $this->input->get('MET_IDX');
		$data["results"] = $this -> table_model -> table_view("MEM_TB","MET",$MET_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["MET_IDX"] = $MET_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/user/write',$data);
		$this->load->view('admin/inc/footer');
	}

	public function userExcel() // 일반회원 엑셀 다운로드
	{
		$search = $this->input->get('search');
		$data["results"] = $this -> table_model -> table_list("MEM_TB","MET",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$data["search"] = $search;
		$this->load->view('admin/user/excel',$data);
	}

	public function broker() // 중개사 리스트
	{
		include_once 'Get.php';

    $returnData = configList("broker",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("BROKER_TB","BKT",$search,$config["per_page"], $offset," "); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/broker/list',$data);
		$this->load->view('admin/inc/footer');
	}

	public function brokerWrite() // 중개사 form
	{

		include_once 'Get.php';

		$BKT_IDX = $this->input->get('BKT_IDX');
		$data["results"] = $this -> table_model -> table_view("BROKER_TB","BKT",$BKT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["BKT_IDX"] = $BKT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/broker/write',$data);
		$this->load->view('admin/inc/footer');
	}

  public function brokerMemer() // 보조 중개사 관리
	{

    include_once 'Get.php';
    $key = $this->input->get('key');
    $pageNo = $this->input->get('pageNo');
    $search = $this->input->get('search');
    $data["key"] = $key;
    $data["pageNo"] = $pageNo;
    $data["search"] = $search;

    $results = $this -> table_model -> table_list("BROKER_SUB_TB","BST","","", ""," AND BKT_IDX='".$key."' "); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $data["total_cnt"] = $results[1]; 

    $nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/broker/memlist',$data);
		$this->load->view('admin/inc/footer');
	}
  public function brokerMemerWrite() // 보조 중개사 관리
	{

    $key = $this->input->get('key');
    $BST_IDX = $this->input->get('BST_IDX');

    $pageNo = $this->input->get('pageNo');
    $search = $this->input->get('search');
    $data["key"] = $key;
    $data["pageNo"] = $pageNo;
    $data["search"] = $search;
    $data["BST_IDX"] = $BST_IDX;

    $data["results"] = $this -> table_model -> table_view("BROKER_SUB_TB","BST",$BST_IDX);
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/broker/memWrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function brokerPaym() // 중개사 상품관리
	{
		include_once 'Get.php';
    $key = $this->input->get('key');

    $returnData = configList("brokerPaym",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_PMlist("PAYMENT_TB","PMT",$search,$config["per_page"], $offset," AND USER_IDX='".$key."' AND PST_USER_TYPE='A' "); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $data["user"] = $results[2];
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수
    $data["key"] = $key;

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);


		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/broker/brokerPaymList',$data);
		$this->load->view('admin/inc/footer');
	}
  public function brokerPaymWrite() // 보조 중개사 관리
	{

    include_once 'Get.php';

    $key = $this->input->get('key');
		$PST_IDX = $this->input->get('PST_IDX');
		$resultsSlot = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$PST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    $results = $this -> table_model -> table_UserPayview($PST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)

    $resultsUser = $this -> table_model -> table_view("BROKER_TB","BKT",$resultsSlot->USER_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		if($results){
			$data["results"] = $results;	
			$data["PMT_IDX"] = $results->PMT_IDX;
		}
		
    $data["slot"] = $resultsSlot;
    $data["user"] = $resultsUser;
    $data["key"] = $key;
		$data["PST_IDX"] = $PST_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/broker/brokerPaymWrite',$data);
		$this->load->view('admin/inc/footer');
	}
  
	public function partner() // 파트너사 리스트
	{

		include_once 'Get.php';

    $returnData = configList("partner",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("PARTNER_TB","PTT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/partner/list',$data);
		$this->load->view('admin/inc/footer');
	}
	public function partnerWrite() // 파트너사 form
	{
		include_once 'Get.php';

		$PTT_IDX = $this->input->get('PTT_IDX');
		$data["results"] = $this -> table_model -> table_view("PARTNER_TB","PTT",$PTT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["PTT_IDX"] = $PTT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/partner/write',$data);
		$this->load->view('admin/inc/footer');
	}

	public function partnerCase() // 파트너사 사례 리스트
	{
		include_once 'Get.php';
		$PTT_IDX = $this->input->get('PTT_IDX');
    $returnData = configList("partnerCase",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("CASE_TB","CST",$search,$config["per_page"], $offset," AND PTT_IDX='".$PTT_IDX."'"); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
		$data["PTT_IDX"] = $PTT_IDX;

    $this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/partner/CaseList',$data);
		$this->load->view('admin/inc/footer');
	}

	public function partnerCaseWrite() // 파트너사 사례 form
	{
		include_once 'Get.php';

		$PTT_IDX = $this->input->get('PTT_IDX');
		$CST_IDX = $this->input->get('CST_IDX');

		$data["results"] = $this -> table_model -> table_view("CASE_TB","CST",$CST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["PTT_IDX"] = $PTT_IDX;
		$data["CST_IDX"] = $CST_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);


		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/partner/CaseWrite',$data);
		$this->load->view('admin/inc/footer');
	}

	public function news() // 뉴스 리스트
	{
		include_once 'Get.php';

    $returnData = configList("news",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("NEWS_TB","NST",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/newsList',$data);
		$this->load->view('admin/inc/footer');
	}
	public function newsWrite() // 뉴스 form
	{
		include_once 'Get.php';

		$NST_IDX = $this->input->get('NST_IDX');
		$data["results"] = $this -> table_model -> table_view("NEWS_TB","NST",$NST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["NST_IDX"] = $NST_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);
		$data["uploads"] = $this -> table_model -> uplaods("news",$NST_IDX)[0]; // 첨부리스트 // 인자값(type,키값)
		$count_up = $this -> table_model -> uplaods("news",$NST_IDX)[1]; // 첨부 총 수량 // 인자값(type,키값)
		$data["count_up"] = $count_up;

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/newsWrite',$data);
		$this->load->view('admin/inc/footer');
	}
	public function newsView() // 뉴스 보기
	{
		include_once 'Get.php';

		$NST_IDX = $this->input->get('NST_IDX');
		$data["results"] = $this -> table_model -> table_view("NEWS_TB","NST",$NST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["NST_IDX"] = $NST_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);
		$data["uploads"] = $this -> table_model -> uplaods("news",$NST_IDX)[0]; // 첨부리스트 // 인자값(type,키값)
		$count_up = $this -> table_model -> uplaods("news",$NST_IDX)[1]; // 첨부 총 수량 // 인자값(type,키값)
		$data["count_up"] = $count_up;

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/newsView',$data);
		$this->load->view('admin/inc/footer');
	}

	public function notice() // 공지사항 리스트
	{
		include_once 'Get.php';

    $returnData = configList("notice",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("NOTICE_TB","NOT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/noticeList',$data);
		$this->load->view('admin/inc/footer');
	}
	public function noticeWrite() // 공지사항 form
	{
		include_once 'Get.php';

		$NOT_IDX = $this->input->get('NOT_IDX');
		$data["NOT_IDX"] = $NOT_IDX;
		$data["results"] = $this -> table_model -> table_view("NOTICE_TB","NOT",$NOT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["uploads"] = $this -> table_model -> uplaods("notice",$NOT_IDX)[0]; // 첨부리스트 // 인자값(type,키값)
		$count_up = $this -> table_model -> uplaods("notice",$NOT_IDX)[1]; // 첨부 총 수량 // 인자값(type,키값)
		$data["count_up"] = $count_up;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/noticeWrite',$data);
		$this->load->view('admin/inc/footer');
	}
	public function noticeView() // 공지사항 보기
	{
		include_once 'Get.php';

		$NOT_IDX = $this->input->get('NOT_IDX');
		$data["NOT_IDX"] = $NOT_IDX;
		$data["results"] = $this -> table_model -> table_view("NOTICE_TB","NOT",$NOT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["uploads"] = $this -> table_model -> uplaods("notice",$NOT_IDX)[0]; // 첨부리스트 // 인자값(type,키값)
		$count_up = $this -> table_model -> uplaods("notice",$NOT_IDX)[1]; // 첨부 총 수량 // 인자값(type,키값)
		$data["count_up"] = $count_up;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/noticeView',$data);
		$this->load->view('admin/inc/footer');
	}
	public function faq() // 자주찾는질문 리스트
	{

		include_once 'Get.php';

    $returnData = configList("faq",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("FAQ_TB","FAT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/faqList',$data);
		$this->load->view('admin/inc/footer');
	}
	public function faqWrite() // 자주찾는질문 form
	{
		include_once 'Get.php';

		$FAT_IDX = $this->input->get('FAT_IDX');
		$data["FAT_IDX"] = $FAT_IDX;
		$data["results"] = $this -> table_model -> table_view("FAQ_TB","FAT",$FAT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/faqWrite',$data);
		$this->load->view('admin/inc/footer');
	}
	public function qna() // 1:1문의 리스트
	{
		include_once 'Get.php';

    $returnData = configList("qna",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_Qlist("QNA_TB","QNT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/qnaList',$data);
		$this->load->view('admin/inc/footer');
	}
  public function qnaPro() // 1:1문의 리스트
	{
		include_once 'Get.php';

    $returnData = configList("qnaPro",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_QPlist("QNA_PRO_TB","QPT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/qnaListPro',$data);
		$this->load->view('admin/inc/footer');
	}
	public function qnaView() // 1:1문의 보기
	{
		include_once 'Get.php';

		$QNT_IDX = $this->input->get('QNT_IDX');
		$data["results"] = $this -> table_model -> table_view("QNA_TB","QNT",$QNT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    $data["resultsMem"] = $this -> table_model -> table_view("MEM_TB","MET",$data["results"]->MET_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["QNT_IDX"] = $QNT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/qnaView',$data);
		$this->load->view('admin/inc/footer');
	}
  public function qnaViewPro() // 1:1문의 보기
	{
		include_once 'Get.php';

		$QPT_IDX = $this->input->get('QPT_IDX');
		$data["results"] = $this -> table_model -> table_view("QNA_TB","QNT",$QNT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    $data["resultsMem"] = $this -> table_model -> table_view("MEM_TB","MET",$data["results"]->MET_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["QPT_IDX"] = $QPT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/community/qnaView',$data);
		$this->load->view('admin/inc/footer');
	}
	public function tip() // 창업팁 리스트
	{
		include_once 'Get.php';

    $returnData = configList("tip",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("TIP_TB","TIT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/tipList',$data);
		$this->load->view('admin/inc/footer');
	}
	public function tipWrite() // 창업팁 form
	{
		include_once 'Get.php';

		$TIT_IDX = $this->input->get('TIT_IDX');
		$data["results"] = $this -> table_model -> table_view("TIP_TB","TIT",$TIT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["TIT_IDX"] = $TIT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/tipWrite',$data);
		$this->load->view('admin/inc/footer');
	}
	public function tipView() // 창업팁 보기
	{
		include_once 'Get.php';

		$TIT_IDX = $this->input->get('TIT_IDX');
		$data["results"] = $this -> table_model -> table_view("TIP_TB","TIT",$TIT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["TIT_IDX"] = $TIT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/tipView',$data);
		$this->load->view('admin/inc/footer');
	}
	public function process() // 과정 리스트
	{
		include_once 'Get.php';

    $returnData = configList("process",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("PROCESS_TB","PRT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/processList',$data);
		$this->load->view('admin/inc/footer');
	}
	public function processWrite() // 과정 form
	{
		include_once 'Get.php';

		$PRT_IDX = $this->input->get('PRT_IDX');
		$data["results"] = $this -> table_model -> table_view("PROCESS_TB","PRT",$PRT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["PRT_IDX"] = $PRT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/processWrite',$data);
		$this->load->view('admin/inc/footer');
	}
	public function processView() // 과정 보기
	{
    include_once 'Get.php';

		$PRT_IDX = $this->input->get('PRT_IDX');
		$data["results"] = $this -> table_model -> table_view("PROCESS_TB","PRT",$PRT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["PRT_IDX"] = $PRT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/processView',$data);
		$this->load->view('admin/inc/footer');
	}
	public function startNews() // 창업 소식 리스트
	{
    include_once 'Get.php';

    $returnData = configList("startNews",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("START_NEWS_TB","SNT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/startNews',$data);
		$this->load->view('admin/inc/footer');
	}
	public function startNewsWrite() // 창업 소식 form
	{
    include_once 'Get.php';

		$SNT_IDX = $this->input->get('SNT_IDX');
		$data["results"] = $this -> table_model -> table_view("START_NEWS_TB","SNT",$SNT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["SNT_IDX"] = $SNT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/startNewsWrite',$data);
		$this->load->view('admin/inc/footer');
	}
	public function startNewsView() // 창업 소식 보기
	{
    include_once 'Get.php';

		$SNT_IDX = $this->input->get('SNT_IDX');
		$data["results"] = $this -> table_model -> table_view("START_NEWS_TB","SNT",$SNT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["SNT_IDX"] = $SNT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/secret/startNewsView',$data);
		$this->load->view('admin/inc/footer');
	}
	public function caseList() // 시공사례 리스트
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/case/caseList');
		$this->load->view('admin/inc/footer');
	}
	public function caseWrite() // 시공사례 form
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/case/caseWrite');
		$this->load->view('admin/inc/footer');
	}
	public function caseView() // 시공사례 보기
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/case/caseView');
		$this->load->view('admin/inc/footer');
	}
	public function property() // 매물관리 리스트
	{
    include_once 'Get.php';

    $returnData = configList("property",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_Plist("PROPERTY_TB","PPT",$search,$config["per_page"], $offset," AND PPT_STATE !='F' "); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/property/property',$data);
		$this->load->view('admin/inc/footer');
	}
	public function propertyWrite() // 매물관리 form
	{
    include_once 'Get.php';

		$PPT_IDX = $this->input->get('PPT_IDX');
		$results = $this -> table_model -> table_view("PROPERTY_TB","PPT",$PPT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["results"] = $results;
		$data["PPT_IDX"] = $PPT_IDX;
    if($PPT_IDX && $data["results"]->PPT_USER_TYPE=='A'){
      $data["brkResults"] = $this -> table_model -> table_list("BROKER_TB","BKT","","","","")[0];  // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    }else if($PPT_IDX && $data["results"]->PPT_USER_TYPE=='B'){
      $data["brkResults"] = $this -> table_model -> table_list("MEM_TB","MET","","","","")[0];  // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    }else{
      $data["brkResultsBk"] = $this -> table_model -> table_list("BROKER_TB","BKT","","","","")[0];
      $data["brkResultsMe"] = $this -> table_model -> table_list("MEM_TB","MET","","","","")[0];
    }
    
    if(!$this -> table_model -> table_PIlist($PPT_IDX)){
      $data["resultsImg"] = 0;
    }else{
      $data["resultsImg"] = $this -> table_model -> table_PIlist($PPT_IDX); // 데이터 리스트  // 인자값(키값)
    }
		if($results){
			$data["slotResults"] = $this -> table_model -> table_list("PROP_SLOT_TB","PST","","",""," AND USER_IDX='".$data["results"]->USER_IDX."' AND PST_USER_TYPE='".$data["results"]->PPT_USER_TYPE."'")[0];
		}
    $data["companion"]="";
    if($results){
			$data["companion"] = $this -> table_model -> table_list("COMPANION_TB","CPT","","",""," AND PPT_IDX='".$PPT_IDX."'")[0];
		}

		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/property/propertyWrite',$data);
		$this->load->view('admin/inc/footer');
	}
	public function dataA() // 지역별 주거 인구수 리스트
	{
    include_once 'Get.php';

    $returnData = configList("dataA",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("DATA_A_TB","DAT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);
    
		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataAlist',$data);
		$this->load->view('admin/inc/footer');
	}
	public function dataAwrite() // 지역별 주거 인구수 form
	{
    include_once 'Get.php';

		$DAT_IDX = $this->input->get('DAT_IDX');
		$data["results"] = $this -> table_model -> table_view("DATA_A_TB","DAT",$DAT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["DAT_IDX"] = $DAT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataAwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataAexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("DATA_A_TB","DAT",$search,"","","")[0];  // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/data/dataAexcel',$data);
	}
	public function dataB() // 지역별 유동 인구수 리스트
	{
		include_once 'Get.php';

    $returnData = configList("dataB",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("DATA_B_TB","DBT",$search,$config["per_page"], $offset,"");  // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

    $this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataBlist',$data);
		$this->load->view('admin/inc/footer');
	}
	public function dataBwrite() // 지역별 유동 인구수 form
	{
		include_once 'Get.php';

		$DBT_IDX = $this->input->get('DBT_IDX');
		$data["results"] = $this -> table_model -> table_view("DATA_B_TB","DBT",$DBT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["DBT_IDX"] = $DBT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataBwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataBexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("DATA_B_TB","DBT",$search,"","","")[0];  // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/data/dataBexcel',$data);
	}
	public function dataC() // 지역별 직장인 인구수 리스트
	{
		include_once 'Get.php';

    $returnData = configList("dataC",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("DATA_C_TB","DCT",$search,$config["per_page"], $offset,"");  // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataClist',$data);
		$this->load->view('admin/inc/footer');
	}
	public function dataCwrite() // 지역별 직장인 인구수 form
	{
		include_once 'Get.php';

		$DCT_IDX = $this->input->get('DCT_IDX');
		$data["results"] = $this -> table_model -> table_view("DATA_C_TB","DCT",$DCT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["DCT_IDX"] = $DCT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataCwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataCexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("DATA_C_TB","DCT",$search,"","","")[0];  // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/data/dataCexcel',$data);
	}
	public function dataD() // 지역별 직장인 소득액 리스트
	{
		include_once 'Get.php';

    $returnData = configList("dataD",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("DATA_D_TB","DDT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataDlist',$data);
		$this->load->view('admin/inc/footer');
	}
	public function dataDwrite() // 지역별 직장인 소득액 form
	{
    include_once 'Get.php';

		$DDT_IDX = $this->input->get('DDT_IDX');
		$data["results"] = $this -> table_model -> table_view("DATA_D_TB","DDT",$DDT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["DDT_IDX"] = $DDT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataDwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataDexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("DATA_D_TB","DDT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/data/dataDexcel',$data);
	}
	public function dataE() // 지역별 지하철 승하차 인원 리스트
	{
		include_once 'Get.php';

    $returnData = configList("dataE",$pageNo,$search);  // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("DATA_E_TB","DET",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataElist',$data);
		$this->load->view('admin/inc/footer');
	}
	public function dataEwrite() // 지역별 지하철 승하차 인원 form
	{
		include_once 'Get.php';

		$DET_IDX = $this->input->get('DET_IDX');
		$data["results"] = $this -> table_model -> table_view("DATA_E_TB","DET",$DET_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["DET_IDX"] = $DET_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataEwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataEexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("DATA_E_TB","DET",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/data/dataEexcel',$data);
	}
	public function dataF() // 주요집객시설 리스트
	{
		include_once 'Get.php';

    $returnData = configList("dataF",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("DATA_F_TB","DFT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataFlist',$data);
		$this->load->view('admin/inc/footer');
	}
	public function dataFwrite() // 주요집객시설 form
	{
		include_once 'Get.php';

		$DFT_IDX = $this->input->get('DFT_IDX');
		$data["results"] = $this -> table_model -> table_view("DATA_F_TB","DFT",$DFT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["DFT_IDX"] = $DFT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataFwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataFexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("DATA_F_TB","DFT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/data/dataFexcel',$data);
	}
	public function dataG() // 상가정보 리스트
	{
		include_once 'Get.php';

    $returnData = configList("dataG",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("DATA_G_TB","DGT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataGlist',$data);
		$this->load->view('admin/inc/footer');
	}
	public function dataGwrite() // 상가정보 form
	{
		include_once 'Get.php';

		$DGT_IDX = $this->input->get('DGT_IDX');
		$data["results"] = $this -> table_model -> table_view("DATA_G_TB","DGT",$DGT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["DGT_IDX"] = $DGT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataGwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataGexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("DATA_G_TB","DGT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/data/dataGexcel',$data);
	}
  public function codeA() // 상가정보 리스트
	{
		include_once 'Get.php';

    $returnData = configList("codeA",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("CODE_A_TB","CAT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeAlist',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeAwrite() // 상가정보 form
	{
		include_once 'Get.php';

		$CAT_IDX = $this->input->get('CAT_IDX');
		$data["results"] = $this -> table_model -> table_view("CODE_A_TB","CAT",$CAT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["CAT_IDX"] = $CAT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeAwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeAexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("CODE_A_TB","CAT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/code/codeAexcel',$data);
	}
  public function codeB() // 상가정보 리스트
	{
		include_once 'Get.php';

    $returnData = configList("codeB",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("CODE_B_TB","CBT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeBlist',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeBwrite() // 상가정보 form
	{
		include_once 'Get.php';

		$CBT_IDX = $this->input->get('CBT_IDX');
		$data["results"] = $this -> table_model -> table_view("CODE_B_TB","CBT",$CBT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["CBT_IDX"] = $CBT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeBwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeBexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("CODE_B_TB","CBT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/code/codeBexcel',$data);
	}
  public function codeC() // 상가정보 리스트
	{
		include_once 'Get.php';

    $returnData = configList("codeC",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("CODE_C_TB","CCT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeClist',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeCwrite() // 상가정보 form
	{
		include_once 'Get.php';

		$CCT_IDX = $this->input->get('CCT_IDX');
		$data["results"] = $this -> table_model -> table_view("CODE_C_TB","CCT",$CCT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["CCT_IDX"] = $CCT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeCwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeCexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("CODE_C_TB","CCT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/code/codeCexcel',$data);
	}
  public function codeD() // 상가정보 리스트
	{
		include_once 'Get.php';

    $returnData = configList("codeD",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("CODE_D_TB","CDT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeDlist',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeDwrite() // 상가정보 엑셀다운
	{
		include_once 'Get.php';

		$CDT_IDX = $this->input->get('CDT_IDX');
		$data["results"] = $this -> table_model -> table_view("CODE_D_TB","CDT",$CDT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["CDT_IDX"] = $CDT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeDwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeDexcel() // 지역별 주거 인구수 form
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("CODE_D_TB","CDT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/code/codeDexcel',$data);
	}
  public function codeE() // 상가정보 리스트
	{
		include_once 'Get.php';

    $returnData = configList("codeE",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("CODE_E_TB","CET",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeElist',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeEwrite() // 상가정보 form
	{
		include_once 'Get.php';

		$CET_IDX = $this->input->get('CET_IDX');
		$data["results"] = $this -> table_model -> table_view("CODE_E_TB","CET",$CET_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["CET_IDX"] = $CET_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeEwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeEexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("CODE_E_TB","CET",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/code/codeEexcel',$data);
	}
  public function codeF() // 상가정보 리스트
	{
		include_once 'Get.php';

    $returnData = configList("codeF",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("CODE_F_TB","CFT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeFlist',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeFwrite() // 상가정보 form
	{
		include_once 'Get.php';
		$CFT_IDX = $this->input->get('CFT_IDX');
		$data["results"] = $this -> table_model -> table_view("CODE_F_TB","CFT",$CFT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["CFT_IDX"] = $CFT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/code/codeFwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function codeFexcel() // 지역별 주거 인구수 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("CODE_F_TB","CFT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/code/codeFexcel',$data);
	}
  public function dataH() // 지하철역 기본정보 리스트
	{
		include_once 'Get.php';

    $returnData = configList("dataH",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_list("DATA_H_TB","DHT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataHlist',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataHwrite() // 지하철역 기본정보  form
	{
		include_once 'Get.php';
		$DHT_IDX = $this->input->get('DHT_IDX');
		$data["results"] = $this -> table_model -> table_view("DATA_H_TB","DHT",$DHT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		$data["DHT_IDX"] = $DHT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/data/dataHwrite',$data);
		$this->load->view('admin/inc/footer');
	}
  public function dataHexcel() // 지하철역 기본정보 엑셀다운
	{
    include_once 'Get.php';
    $data["search"] = $search;
		$data["results"] = $this -> table_model -> table_list("DATA_H_TB","DHT",$search,"","","")[0]; // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		$this->load->view('admin/data/dataHexcel',$data);
	}
	public function down() // 첨부파일 다운로드
	{
    $this->load->helper('download');
		$sn = $this->input->get('sn');
		$on = $this->input->get('on');
		$data = file_get_contents(FCPATH . "/uploads/".$sn);
		force_download($on, $data);
	}

  public function paymentList() // 결제내역 리스트
	{
		include_once 'Get.php';

    $returnData = configList("paymentList",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_Paylist("PAYMENT_TB","PMT",$search,$config["per_page"], $offset,""); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $data["slot"] = $results[2];
    $data["user"] = $results[3];
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/payment/paymentList',$data);
		$this->load->view('admin/inc/footer');
	}
  public function payment() // 결제내역 리스트
	{
		include_once 'Get.php';

    $PMT_IDX = $this->input->get('PMT_IDX');
    $results = $this -> table_model -> table_view("PAYMENT_TB","PMT",$PMT_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    $resultsSlot = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$results->PST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    if($results->USER_TYPE=='A'){
      $resultsUser = $this -> table_model -> table_view("BROKER_TB","BKT",$results->USER_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    }else if($results->USER_TYPE=='B'){
      $resultsUser = $this -> table_model -> table_view("MEM_TB","MET",$results->USER_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    }

		$data["results"] = $results;
    $data["slot"] = $resultsSlot;
    $data["user"] = $resultsUser;
		$data["PMT_IDX"] = $PMT_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/payment/payment',$data);
		$this->load->view('admin/inc/footer');
	}

  public function userPayList() // 결제내역 리스트
	{
		include_once 'Get.php';
    $key = $this->input->get('key');

    $returnData = configList("userPayList",$pageNo,$search); // config 공통 // 인자값(페이지명, 페이지넘버, 검색)
    $config = $returnData[0];
    $offset = $returnData[1];
    $data = $returnData[2];

    $results = $this -> table_model -> table_PMlist("PAYMENT_TB","PMT",$search,$config["per_page"], $offset," AND USER_IDX='".$key."' AND PST_USER_TYPE='B' "); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
    $data["results"] = $results[0];
    $config["total_rows"] = $results[1]; // 게시판 게시물 총갯수 구하기
    $data["user"] = $results[2];
    $cur_num=$config["total_rows"] - $config['per_page']*($pageNo-1);
    $data["cur_num"] = $cur_num; // 게시물 갯수
    $data["key"] = $key;

    $this -> pagination -> initialize($config);
    $data["pagination"] = $this->pagination->create_links(); // 페이징
    $nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/user/userPayList',$data);
		$this->load->view('admin/inc/footer');
		
	}

  public function userPay() // 결제내역 리스트
	{
		include_once 'Get.php';

    $key = $this->input->get('key');
		$PST_IDX = $this->input->get('PST_IDX');
		$resultsSlot = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$PST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
    $results = $this -> table_model -> table_UserPayview($PST_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)

    $resultsUser = $this -> table_model -> table_view("MEM_TB","MET",$resultsSlot->USER_IDX); // 데이터 값 // 인자값(테이블명, 테이블 TYPE, 키값)
		if($results){
			$data["results"] = $results;	
			$data["PMT_IDX"] = $results->PMT_IDX;
		}
		
    $data["slot"] = $resultsSlot;
    $data["user"] = $resultsUser;
    $data["key"] = $key;
		$data["PST_IDX"] = $PST_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;
		$nowPage["nowPage"]= $this->uri->segment(2);

		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/user/userPay',$data);
		$this->load->view('admin/inc/footer');
	}

  public function propSlot() // 매물등록시 중개사&유저가 슬롯이 결제 되었는지 확인후 리스트 가져오기
	{
		include_once 'Get.php';

    $type = $this->input->post('type');
    $key = $this->input->post('key');
    $results = $this -> table_model -> slotSearch($key,$type);
    echo json_encode($results);
	}

	public function pmtPartialDelete() // 결제내역 리스트
	{
		include_once 'Get.php';

    $PMT_IDX = $this->input->get('PMT_IDX');
		$PST_IDX = $this->input->get('PST_IDX');
		$data["PMT_IDX"] = $PMT_IDX;
		$data["PST_IDX"] = $PST_IDX;
		$data["search"] = $search;
		$data["pageNo"] = $pageNo;

		$resultsPm = $this -> table_model -> table_view("PAYMENT_TB","PMT",$PMT_IDX);
    $resultsPs = $this -> table_model -> table_view("PROP_SLOT_TB","PST",$PST_IDX);
		if($resultsPm->USER_TYPE=='A'){
			$resultsUser = $this -> table_model -> table_viewNodell("BROKER_TB","BKT",$resultsPm->USER_IDX);
		}else if($resultsPm->USER_TYPE=='B'){
			$resultsUser = $this -> table_model -> table_viewNodell("MEM_TB","MET",$resultsPm->USER_IDX);
		}
    $resultAct="";
		if($resultsPm->PMT_MEANS=='VBank'){
			$resultAct = $this -> table_model -> table_list("VITUAL_ACCOUNT_TB","ACT","","",""," AND PMT_IDX='".$PMT_IDX."' AND PST_IDX='".$PST_IDX."' ");
		}
		
		$data['resultsPm'] = $resultsPm;
		$data['resultsPs'] = $resultsPs;
		$data['resultAct'] = $resultAct;
		$data['resultsUser'] = $resultsUser;
		$nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/payment/refund',$data);
		$this->load->view('admin/inc/footer');
	}

	function userPayAdd() // 임대인 관리자 매물슬롯 임의 추가
	{
		include_once 'Get.php';

    $data['key'] = $this->input->get('key');
		$nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/user/userPayAdd',$data);
		$this->load->view('admin/inc/footer');
	}

	function brokerPayAdd() // 임대인 관리자 매물슬롯 임의 추가
	{
		include_once 'Get.php';

    $data['key'] = $this->input->get('key');
		$nowPage["nowPage"]= $this->uri->segment(2);
		$this->load->view('admin/inc/header',$nowPage);
		$this->load->view('admin/broker/brokerPayAdd',$data);
		$this->load->view('admin/inc/footer');
	}

	function dataTest() // 임대인 관리자 매물슬롯 임의 추가
	{
		include_once 'Get.php';

    $results = $this -> table_model -> data_list(); // 데이터 리스트  // 인자값(테이블명, 테이블 TYPE, 검색, 페이징 per_page, offset, 기타 추가 조건식)
		pirnt_r($results);
	}


}