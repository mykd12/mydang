<!-----  메인 시작 ----->
<main id="main" class="sub service list03 news">
  <div class="sub-inner">
    <!-- 서브 비쥬얼 -->
    <section class="section1 subVisual">
      <div class="bg-wrap"></div>
      <h2 class="text-ti">고객센터</h2>
    </section>
    <section class="section2 ">
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
                href="/main/noticeView?NOT_IDX=<?php echo $data->NOT_IDX;?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>">
                <span class="num"><?php echo $cur_num-$i;?></span>
                <span class="t-ti"><?php echo $data->NOT_TITLE?></span>
                <span class="date"><?php echo date("Y.m.d", strtotime($data->NOT_REG_DATE));?></span>
              </a>
            </li>
            <?$i++;}?>
            <?php }?>
          </ul>
          <!-- 페이징 -->
          <div class="paginationDiv">
            <?php echo $pagination;?>
          </div>
    </section>
  </div>
</main>