<!-----  메인 시작 ----->
<main id="main" class="sub view view01 noticeView">
  <div class="sub-inner">
    <!-- 서브 비쥬얼 -->
    <section class="section1 subVisual">
      <div class="bg-wrap"></div>
      <h2 class="text-ti">고객센터</h2>
    </section>
    <section class="section2">
      <!-- 탭메뉴 -->
      <div class="tab-menu">
        <ul>
          <li class="on"><a href="/main/notice">공지사항</a></li>
          <li><a href="/main/news">뉴스</a></li>
          <li><a href="/main/faq">FAQ</a></li>
        </ul>
      </div>
      <!-- 내용시작 -->
      <div class="content">
        <div class="content-inner">
          <div class="con_ti">
            <h3 class="text_ti"><?php echo $results->NOT_TITLE;?></h3>
            <p class="date">DATE<span><?php echo date("Y.m.d", strtotime($results->NOT_REG_DATE));?></span></p>
          </div>
          <div class="con-text">
            <p><?php echo $results->NOT_CONTENT;?></p>
          </div>
          <div class="btn-box">
            <a href="/main/notice?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>" class="btn-list">목록</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<!----- 푸터 시작 ----->