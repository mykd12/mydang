<!-----  메인 시작 ----->
<main id="main" class="sub service myInquiry list03">
  <div class="sub-inner">
    <!-- 서브 비쥬얼 -->
    <section class="section1 subVisual">
      <div class="bg-wrap"></div>
      <h2 class="text-ti">마이 페이지</h2>
    </section>
    <section class="section2 ">
      <!-- 탭메뉴 -->
      <div class="tab-menu">
        <ul>
          <li><a href="/main/myPage">내 정보수정</a></li>
          <li class="on"><a href="/main/qnaList">1:1 문의</a></li>
        </ul>
      </div>
      <!-- 내용시작 -->
      <div class="content">
        <div class="content-inner">
          <div class="btn_wrap">
            <a href="/main/qnaWrite?pageNo=<?php echo $pageNo;?>" class="btn_inquiry">바로 문의하기</a>
          </div>
          <ul class="inquiry_table notice-table">
            <li class="t-head">
              <span class="num">no</span>
              <span class="t-ti">문의내역</span>
              <span class="date">등록일</span>
              <span class="status">상태</span>
            </li>
            <?php if($cur_num > 0){?>
            <?php $i=0;?>
            <?php foreach($results as $data){?>
            <li class="t-con">
              <a href="/main/qnaView?QNT_IDX=<?php echo $data->QNT_IDX;?>&pageNo=<?php echo $pageNo;?>"
                class="btn-aticle">
                <span class="num"><?php echo $cur_num-$i;?></span>
                <span class="t-ti"><?php echo $data->QNT_TITLE?></span>
                <span class="date"><?php echo date("Y.m.d H:i:s", strtotime($data->QNT_REG_DATE));?></span>
                <span class="status"><?php if($data->QNT_ANSWER){ echo "답변완료";}else{ echo "답변대기";}?></span>
              </a>
            </li>
            <?php if($data->QNT_ANSWER){?>
            <li class="comment">
              <a href="/main/qnaView?QNT_IDX=<?php echo $data->QNT_IDX;?>&pageNo=<?php echo $pageNo;?>"
                class="btn-aticle">
                <span class="num">-</span>
                <span class="t-ti"><i class="xi-subdirectory-arrow"></i> 답변입니다.</span>
                <span class="date"></span>
                <span class="status"></span>
              </a>
            </li>
            <?php }?>
            <?php $i++;}?>
            <?php }?>
            <!--<li class="t-con">
              <a href="inquiryView.php" class="btn-aticle">
                <span class="num">1</span>
                <span class="t-ti">sdsdsdsd</span>
                <span class="date">2021-06-21 14:55:30</span>
                <span class="status">답변완료</span>
              </a>
            </li>
            <li class="comment">
              <a href="inquiryView.php" class="btn-aticle">
                <span class="num">-</span>
                <span class="t-ti"><i class="xi-subdirectory-arrow"></i> 답변입니다.</span>
                <span class="date">2021-06-21 14:55:30</span>
                <span class="status">답변완료</span>
              </a>
            </li>-->
          </ul>
        </div>
        <!-- 페이징 -->
        <div class="paginationDiv">
          <?php echo $pagination;?>
        </div>
      </div>
    </section>
  </div>
</main>