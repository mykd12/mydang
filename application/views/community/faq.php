<!-----  메인 시작 ----->
<main id="main" class="sub service faq">
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
          <li><a href="/main/news">뉴스</a></li>
          <li class="on"><a href="/main/faq">FAQ</a></li>
        </ul>
      </div>
      <!-- 내용시작 -->
      <div class="content">
        <div class="content-inner">
          <!-- 서치바 -->
          <div class="search_form_wrap">
            <form class="noticeSearch_form" method="get" action="/main/faq">
              <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
                value="<?php echo $search;?>">
              <button type="submit" class="btn_submit">검색</button>
            </form>
          </div>
          <!-- faq_list 시작-->
          <div class="faqList_wrap">
            <div class="faq_list">
              <?php if($cur_num > 0){?>
              <?php $i=0;?>
              <?php foreach($results as $data){?>
              <div class="faq_con">
                <a href="javascript:void(0);" class="btn_click">
                  <p class="faq_q"><span class="text-q">Q</span><span
                      class="text-ti"><?php echo $data->FAT_QUESTION;?></span></p>
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
                </a>
                <div class="faq_a">
                  <div class="faq_a_inner">
                    <p class="text-a">A</p>
                    <pre><?php echo $data->FAT_ANSWER;?>
                    </pre>
                  </div>
                </div>
              </div>
              <?$i++;}?>
              <?php }?>

            </div>
            <!-- 페이징 -->
            <div class="paginationDiv">
              <?php echo $pagination;?>
            </div>
          </div>
        </div>
    </section>
  </div>
</main>

<script type="text/javascript">
$('.btn_click').on('click', function() {
  $(this).siblings('.faq_a').stop().slideToggle(300);
  $(this).toggleClass('on');
});
</script>