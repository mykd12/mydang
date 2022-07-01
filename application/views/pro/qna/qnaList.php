<!-----  메인 시작 ----->
<main id="container" class="sub partnerSub myInquiry list03">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="../../icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>문의</h4>
    </div>
    <!-- 내용시작 -->
    <div class="content">
      <div class="content-inner">
        <div class="btn_wrap">
          <a href="/pro/qnaWrite" class="btn_inquiry">바로 문의하기</a>
        </div>
        <ul class="inquiry_table notice-table">
          <li class="t-head">
            <span class="num">no</span>
            <span class="t-ti">문의내역</span>
            <span class="date">등록일</span>
            <span class="status">상태</span>
          </li>
          <li class="t-con">
            <a href="/pro/qnaView" class="btn-aticle">
              <span class="num">2</span>
              <span
                class="t-ti">문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다문의합니다</span>
              <span class="date">2021-06-22 17:49:26</span>
              <span class="status">답변대기</span>
            </a>
          </li>
          <li class="t-con">
            <a href="/pro/qnaView" class="btn-aticle">
              <span class="num">1</span>
              <span class="t-ti">sdsdsdsd</span>
              <span class="date">2021-06-21 14:55:30</span>
              <span class="status">답변완료</span>
            </a>
          </li>
          <li class="comment">
            <a href="/pro/qnaView" class="btn-aticle">
              <span class="num">-</span>
              <span class="t-ti"><i class="xi-subdirectory-arrow"></i> 답변입니다.</span>
              <span class="date">2021-06-21 14:55:30</span>
              <span class="status">답변완료</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- 페이징 -->
      <div class="paginationDiv">
        <?php echo $pagination;?>
      </div>
    </div>
  </div>
</main>