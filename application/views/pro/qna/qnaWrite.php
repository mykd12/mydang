<!-----  메인 시작 ----->
<main id="container" class="sub partnerSub view view01 inquiryWrite">
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
        <form id="inqWrite_form" name="frm">
          <div class="row ti_wrap">
            <!-- <div class="select_box disNone">
              <select class="inq_select" title="카테고리" id="QNT_TYPE_A" name="QNT_TYPE_A">
                <option value="">문의 유형 선택</option>
                <option value="서비스 문의">매물 문의</option>
                <option value="제휴 문의">업체 문의</option>
                <option value="기타 문의">기타 문의</option>
              </select>
            </div> -->
            <div class="ti_box">
              <input type="text" title="제목" placeholder="제목을 입력해주세요." name="QNT_TITLE" id="QNT_TITLE"
                value="">
            </div>
          </div>
          <div class="row text_box">
            <textarea title="내용" rows="15" name="QNT_CONTENT" id="QNT_CONTENT" placeholder="제목을 입력해주세요."></textarea>
          </div>
          <div class="re-upload">
            <div class="re-name">
              <a href="javascript:void(0);" class="btn-upload">
                <i class="xi-file-o"></i><span>C:\fakepath\m05.png</span>
              </a>
            </div>
            <div class="int-wrap">
              <input type="checkbox" name="" id="int-cc">
              <label for="int-cc">삭제</label>
            </div>
          </div>
          <div class="filebox">
            <label for="file">파일찾기</label>
            <input class="upload-name" value="파일을 선택하세요" placeholder="파일을 선택하세요">
            <input type="file" id="file">
          </div>
          <div class="btn-box">
            <a href="javascript:void(0);" class="btn-modified">
             등록하기
            </a>
            <a href="/pro/qnaList" class="btn-cancel">취소</a>
          </div>
        </form>
      </div>
    </div>
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