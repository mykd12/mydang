<!-----  메인 시작 ----->
<main id="main" class="sub view view01 newsView">
  <div class="sub-inner">
    <!-- 서브 비쥬얼 -->
    <section class="section1 subVisual">
      <div class="bg-wrap"></div>
      <h2 class="text-ti">창업비결</h2>
    </section>
    <section class="section2 ">
      <!-- 탭메뉴 -->
      <div class="tab-menu">
        <ul>
          <li><a href="/main/StartTip">창업팁</a></li>
          <li><a href="/main/StartPro">창업과정</a></li>
          <li class="on"><a href="/main/StartNews">창업뉴스</a></li>
        </ul>
      </div>
      <!-- 내용시작 -->
      <div class="content on">
        <div class="con_ti">
          <h3 class="text_ti"><?php echo $results->SNT_TITLE;?></h3>
          <p class="date">DATE<span><?php echo date("Y.m.d", strtotime($results->SNT_REG_DATE));?></span></p>
        </div>
        <div class="con-text">
          <p><?php echo $results->SNT_CONTENT;?></p>
        </div>
        <div class="btn-box">
          <a href="StartNews?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>" class="btn-list">목록</a>
        </div>
      </div>
    </section>
  </div>
</main>
<!----- 푸터 시작 ----->