<!-----  메인 시작 ----->
<main id="main" class="sub service view view01 inquiryWrite">
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
          <form id="inqWrite_form" name="frm" action="/DAO/qnaWrite" method="post" onsubmit="return submit_ck();"
            enctype="multipart/form-data">
            <input type="hidden" name="QNT_IDX" id="QNT_IDX" value="<?php echo $QNT_IDX;?>" />
            <input type="hidden" name="pageNo" id="pageNo" value="<?php echo $pageNo;?>" />
            <input type="hidden" name="QNT_FILE_PRE" id="QNT_FILE_PRE"
              value="<?php if($QNT_IDX && $results->QNT_FILE_SAVE){ echo $results->QNT_FILE_SAVE; }?>" />
            <div class="row ti_wrap">
              <div class="select_box">
                <select class="inq_select" title="카테고리" id="QNT_TYPE_A" name="QNT_TYPE_A">
                  <option value="">문의 유형 선택</option>
                  <option value="서비스 문의" <?php if($QNT_IDX && $results->QNT_TYPE_A=='서비스 문의'){ echo "selected";}?>>서비스
                    문의
                  </option>
                  <option value="제휴 문의" <?php if($QNT_IDX && $results->QNT_TYPE_A=='제휴 문의'){ echo "selected";}?>>제휴 문의
                  </option>
                  <option value="기타 문의 <?php if($QNT_IDX && $results->QNT_TYPE_A=='기타 문의'){ echo "selected";}?>">기타 문의
                  </option>
                </select>
              </div>
              <div class="ti_box">
                <input type="text" title="제목" placeholder="제목을 입력해주세요." name="QNT_TITLE" id="QNT_TITLE"
                  value="<?php if($QNT_IDX && $results->QNT_TITLE){ echo $results->QNT_TITLE;}?>">
              </div>
            </div>
            <div class="row text_box">
              <textarea title="내용" rows="15" name="QNT_CONTENT" id="QNT_CONTENT"
                placeholder="내용을 입력해주세요."><?php if($QNT_IDX && $results->QNT_CONTENT){ echo $results->QNT_CONTENT;}?></textarea>
            </div>
            <?php if($QNT_IDX && $results->QNT_FILE_SAVE){ ?>
            <div class="re-upload">
              <div class="re-name">
                <a href="/admin/down?sn=<?php echo $results->QNT_FILE_SAVE;?>&on=<?php echo $results->QNT_FILE_ORG;?>"
                  class="btn-upload">
                  <i class="xi-file-o"></i><span><?php echo $results->QNT_FILE_ORG;?></span>
                </a>
              </div>
              <div class="int-wrap">
                <input type="checkbox" name="QNT_FILE_DEL" id="int-cc" value="del">
                <label for="int-cc">삭제</label>
              </div>
            </div>
            <?php }?>
            <div class="filebox">
              <label for="file">파일찾기</label>
              <input class="upload-name" value="파일을 선택하세요" placeholder="파일을 선택하세요">
              <input type="file" id="file" name="QNT_FILE">
            </div>
            <div class="btn-box">
              <a href="javascript:$('#inqWrite_form').submit();" class="btn-modified">
                <?php if(!$QNT_IDX){ echo "등록";}else{ echo "수정";}?>
              </a>
              <a href="/main/qnaList?pageNo=<?php echo $pageNo;?>" class="btn-cancel">목록</a>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</main>

<script>
$("#file").on('change', function() {
  var fileName = $("#file").val();
  $(".upload-name").val(fileName);
});

function submit_ck() {
  if (!$("#QNT_TYPE_A").val()) {
    alert("문의 유형을 입력해주세요");
    $("#QNT_TYPE_A").focus();
    return false;
  } else if (!$("#QNT_TITLE").val()) {
    alert("문의 제목을 입력해주세요");
    $("#QNT_TITLE").focus();
    return false;
  } else if (!$("#QNT_CONTENT").val()) {
    alert("문의 제목을 입력해주세요");
    $("#QNT_CONTENT").focus();
    return false;
  } else {
    return true;
  }
}
</script>