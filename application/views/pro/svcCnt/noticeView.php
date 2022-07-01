<main id="container" class="sub partnerSub view view01 noticeView">
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
        <div class="con_ti">
          <h3 class="text_ti"><?php echo $results->NPT_TITLE;?></h3>
          <p class="date">DATE<span><?php echo date("Y.m.d", strtotime($results->NPT_REG_DATE));?></span></p>
        </div>
        <div class="con-text">
          <p>
            <?php echo $results->NPT_CONTENT;?>
          </p>
        </div>
        <div class="btn-box">
          <a href="notice?search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>" class="btn-list">목록</a>
        </div>
      </div>
    </div>
  </div>
</main>