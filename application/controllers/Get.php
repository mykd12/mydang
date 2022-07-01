<?php
$search="";
if($this->input->get('search')){
  $search = $this->input->get('search');
}
$location="";
if($this->input->get('location')){
  $location = $this->input->get('location');
}
if($this->input->get('pageNo')){
  $pageNo= $this->input->get('pageNo');
}else{
  $pageNo= 1;
}
?>