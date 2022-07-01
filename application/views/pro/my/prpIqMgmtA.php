<main id="container" class="sub partnerSub myInquiry list03 prpIqMgmt my">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="../../icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>문의관리</h4>
    </div>
    <!-- 탭 -->

    <div class="toptab <?php if($type=='B'){ echo "thTab"; }else if($type=='C'){echo "twoTab";}?>">
      <ul>
        <li><a href="/pro/mypage">정보보기</a></li>
        <li <?php if($type=='B' || $type=='C'){?> class="disNone" <?php }?>"><a href="/pro/agents">담당자관리</a></li>
        <?php if($type=='A' || $type=='B'){?>
        <li class="on"><a href="/pro/prpIqMgmtA">문의관리</a></li>
        <?php }else{?>
        <li class="on"><a href="/pro/prpIqMgmtB">문의관리</a></li>
        <?php }?>
        <li <?php if($type=='C'){?> class="disNone" <?php }?>><a href="/pro/paymentList">결제내역</a></li>
      </ul>
    </div>
    <!-- 내용시작 -->
    <div class="content">
      <div class="content-inner">
        <div class="top-wrap">
          <div class="add-select">
            <?php if($type=='A'){?>

            <div class="select-wrap">
              <div class="select_box">
                <select class="mngr_select" title="카테고리" id="bsSelect" name="bsSelect">
                  <option value=""> :: 담당자 선택 :: </option>
                  <?php foreach($resultsSub as $data){?>
                  <option value="<?php echo $data->BST_IDX;?>" <?php if($bsKey==$data->BST_IDX){ echo "selected"; } ?>>
                    <?php echo decrypt($data->BST_NAME);?>
                  </option>
                  <?php }?>
                </select>
                <div class="btn-down"></div>
              </div>
            </div>
            <?php }?>
          </div>
          <!-- 서치바 -->
          <div class="search_form_wrap">
            <form class="noticeSearch_form" method="get" action="prpIqMgmtA">
              <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
                value="<?php echo $search;?>">
              <button type="submit" class="btn_submit">검색</button>
            </form>
          </div>
        </div>
        <!-- 리스트시작 -->
        <ul class="inquiry_table notice-table">
          <!-- 게시판 항목 -->
          <li class="t-head">
            <span class="prp-num">매물번호</span>
            <span class="prp-ti">타이틀</span>
            <span class="prp-add">주소</span>
            <span class="name">문의자</span>
            <span class="tel">연락처</span>
            <span class="date">신청일</span>
            <span class="btn-dlt"></span>
          </li>
          <!-- 게시판 내용 시작 -->
          <?php if($cur_num > 0){?>
          <?php $i=0;?>
          <?php foreach($results as $data){?>
          <li class="t-con">
            <span class="prp-num"
              data-th="매물번호">M_<?php echo date("Ymd", strtotime($data[1]->PPT_REG_DATE));?><?php echo str_pad($data[0]->PPT_IDX, 3, "0", STR_PAD_LEFT);?></span>
            <span class="prp-ti" data-th="타이틀"><?php echo $data[1]->PPT_TITLE;?></span>
            <span class="prp-add" data-th="주소"><?php echo decrypt($data[1]->PPT_ADDR1_A);?>
              <?php echo decrypt($data[1]->PPT_ADDR2);?></span>
            <span class="name" data-th="문의자"><?php echo decrypt($data[0]->QBT_NAME);?></span>
            <span class="tel" data-th="연락처"><?php echo decrypt($data[0]->QBT_TEL);?></span>
            <span class="date"
              data-th="신청일"><?php echo date("Y.m.d H:i:s", strtotime($data[0]->QBT_REG_DATE)); ;?></span>
            <span class="btn-dlt" onclick="qbsDel('<?=$data[0]->QBT_IDX?>');" style="cursor: pointer;">삭제</span>
          </li>
          <?php }?>
          <?php }?>
        </ul>
      </div>
      <!-- 페이징 -->
      <div class="paginationDiv">
        <?php echo $pagination;?>
      </div>
      <?// include("inc/paging.php"); ?>
    </div>
    </section>
  </div>
</main>
<script>
function qbsDel(key) {
  var rlt = confirm('삭제하시겠습니까?');
  if (rlt) {
    var pageNo = "<?php echo $pageNo;?>";
    location.href = '/DAO/qbsDel?key=' + key + "&pageNo=" + pageNo;
    return true;
  } else {
    return false;
  }
}
$("#bsSelect").on("change", function() {
  var key = $(this).val();
  var search = "<?=$search?>";
  location.href = 'prpIqMgmtA?bsKey=' + key + "&search=" + search;
});
</script>