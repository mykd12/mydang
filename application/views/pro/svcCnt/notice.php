<main id="container" class="sub sub partnerSub list03 notice">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="../../icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>공지사항</h4>
    </div>
    <!-- 내용시작 -->
    <div class="content">
      <div class="content-inner">
        <!-- 서치바 -->
        <div class="search_form_wrap">
          <form class="noticeSearch_form" method="get" action="notice">
            <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
              value="<?php echo $search;?>">
            <button type="submit" class="btn_submit">검색</button>
          </form>
        </div>
        <!--게시판 리스트 시작-->
        <ul class="con-list notice-table">
          <li class="t-head">
            <span class="num">번호</span>
            <span class="t-ti">제목</span>
            <span class="date">등록일</span>
          </li>
          <?php if($cur_num > 0){?>
          <?php $i=0;?>
          <?php foreach($results as $data){?>
          <li class="t-con">
            <a
              href="/pro/noticeView?key=<?php echo $data->NPT_IDX;?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>">
              <span class="num"><?php echo $cur_num-$i;?></span>
              <span class="t-ti"><?php echo $data->NPT_TITLE;?></span>
              <span class="date"><?php echo date("Y.m.d", strtotime($data->NPT_REG_DATE));?></span>
            </a>
          </li>
          <?php $i++;}?>
          <?php }?>

        </ul>
        <!-- 페이징 -->
        <div class="paginationDiv">
          <?php echo $pagination;?>
        </div>
      </div>
    </div>
  </div>
</main>