<!-----  메인 시작 ----->
<main id="main" class="sub service list01 news">
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
          <li><a href="/main/notice">공지사항</a></li>
          <li class="on"><a href="/main/news">뉴스</a></li>
          <li><a href="/main/faq">FAQ</a></li>
        </ul>
      </div>
      <!-- 내용시작 -->
      <div class="content">
        <div class="content-inner">
          <!-- 서치바 -->
          <div class="search_form_wrap">
            <form class="noticeSearch_form" method="get" action="news">
              <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
                value="<?php echo $search;?>">
              <button type="submit" class="btn_submit">검색</button>
            </form>
          </div>
          <!--게시판 리스트 시작-->
          <ul class="con-list notice-table">
            <li class="t-head">
              <span class="t-ti">제목</span>
              <span class="date">등록일</span>
            </li>
            <?php if($cur_num > 0){?>
            <?php $i=0;?>
            <?php foreach($results as $data){?>
            <li class="t-con">
              <a href="/main/newsView?NST_IDX=<?php echo $data->NST_IDX;?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>"
                class="btn-aticle">
                <div class="t-ti">
                  <div class="img-wrap">
                    <img src="/uploads/<?php echo $data->NST_IMG_SAVE;?>" alt="팁이미지">
                  </div>
                  <div class="text-wrap">
                    <p class="text-ti"><?php echo $data->NST_TITLE;?></p>
                    <p class="text-de"><?php echo strip_tags($data->NST_CONTENT);?></p>
                  </div>
                </div>
                <span class="date"><?php echo date("Y.m.d", strtotime($data->NST_REG_DATE));?></span>
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