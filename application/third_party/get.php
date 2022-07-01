<?php
  	$search="";
		if($this->input->get('search')){
			$search = $this->input->get('search');
		}
		if($this->input->get('pageNo')){
			$pageNo= $this->input->get('pageNo');
		}else{
			$pageNo= 1;
		}
?>