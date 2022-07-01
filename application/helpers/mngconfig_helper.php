<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

    function configList($page,$pageNo,$search) { // 설정 HELPER / 인자값(현제페이지, 페이지 넘버, 검색명)
      $config = array();
      $data = array();
      $config["base_url"] = base_url()."/admin/".$page."?search=".$search; // 페이징 기본 url 설정

		  $config['per_page'] = 10; // 게시물 갯수 정의
		  // 페이지 번호가 위치한 세그먼트
		  $config['uri_segment'] = 5;
      // 선택된 페이지번호의 좌우로 숫자링크를 보여줄 개수
      //$config['num_links'] = 2;
      $config['page_query_string'] = true;
      $config['query_string_segment'] = 'pageNo';
      $config['use_page_numbers'] = true;
            
      $offset = $config['per_page']*($pageNo-1);
      $data["search"] = $search; // 검색 keyword
      $data["pageNo"] = $pageNo; // 현재 페이징 number
      
      return array($config, $offset, $data);
    }
?>