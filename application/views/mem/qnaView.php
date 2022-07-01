<!-----  메인 시작 ----->
<main id="main" class="sub service view view01 inquiryView">
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
          <div class="con_ti">
            <h3 class="text_ti"><?php echo $results->QNT_TITLE;?></h3>
            <p class="date">
              DATE<span class="date-con"><?php echo date("Y.m.d H:i:s", strtotime($results->QNT_REG_DATE));?></span><br class="br">문의유형<span><?php echo $results->QNT_TYPE_A;?></span>
            </p>
          </div>
          <div class="con-text">
            <pre><?php echo $results->QNT_CONTENT;?></pre>
          </div>
          <?php if($results->QNT_ANSWER){?>
          <div class="re_text con-text">
            <p class="re-tltie"><span>답변</span>
              <!--<span class="date">2021.04.26</span>-->
            </p>
            <p><i class="xi-subdirectory-arrow"></i></p>
            <p>
            <pre><?php echo $results->QNT_ANSWER;?></pre>
            </p>
          </div>
          <?}?>
          <?php if($results->QNT_FILE_SAVE){?>
          <div class="upload-file">
            <p>첨부파일</p>
            <div class="file-box">
              <a href="/admin/down?sn=<?php echo $results->QNT_FILE_SAVE;?>&on=<?php echo $results->QNT_FILE_ORG;?>"
                class="btn-download" download="">
                <i class="xi-file-o"></i> <span><?php echo $results->QNT_FILE_ORG;?></span>
              </a>
            </div>
          </div>
          <?}?>
          <div class="btn-box">
            <a href="/main/qnaWrite?QNT_IDX=<?php echo $QNT_IDX;?>&pageNo=<?php echo $pageNo;?>" class="btn-re">수정</a>
            <a href="/DAO/qnaDelete?QNT_IDX=<?php echo $QNT_IDX;?>&pageNo=<?php echo $pageNo;?>"
              onclick="return confirm('삭제 하시겠습니까??');" class="btn-cancle">삭제</a>
            <a href="/main/qnaList?pageNo=<?php echo $pageNo;?>" class="btn-list">목록</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>