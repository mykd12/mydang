<!-----  메인 시작 ----->
<main id="container" class="sub partnerSub list01 caseRgstr caseMgmt">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>시공사례 관리</h4>
    </div>
    <!-- 내용시작 -->
    <div class="content">
      <div class="content-inner">
        <div class="top-row">
          <button type="button" class="btn-cl" onclick='all_del();'>삭제</button>
          <!-- 서치바 -->
          <div class="search_form_wrap">
            <form class="noticeSearch_form" method="get" action="constrCase">
              <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
                value="<?php echo $search;?>">
              <button type="submit" class="btn_submit">검색</button>
            </form>
          </div>
          <a href="/pro/constrCaseWrite" class="btn-pl">추가</a>
        </div>
        <!--게시판 리스트 시작-->
        <ul class="con-list notice-table">
          <li class="t-head">
            <div class="form_checkbox">
              <input class="check_box" id="thAllck" name="con" type="checkbox">
              <label for="thAllck">전체선택</label>
            </div>
            <span class="t-ti">제목</span>
            <span class="date">등록일</span>
            <span class="btn"></span>
          </li>
          <?php if($cur_num > 0){?>
          <?php $i=0;?>
          <?php foreach($results as $data){?>
          <li class="t-con">
            <div class="form_checkbox">
              <input class="check_box caseCheck" id="chb<?php echo $data->CST_IDX;?>" name="chb[]" type="checkbox"
                value="<?php echo $data->CST_IDX;?>">
              <label for="chb<?php echo $data->CST_IDX;?>"></label>
            </div>
            <a href="constrCaseWrite?key=<?php echo $data->CST_IDX;?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>"
              class="btn-aticle">
              <div class="t-ti">
                <div class="img-wrap">
                  <img src="/uploads/<?php echo $data->CST_IMG_SAVE;?>" alt="팁이미지">
                </div>
                <div class="text-wrap">
                  <p class="text-ti"><?php echo $data->CST_TITLE;?></p>
                </div>
              </div>
            </a>
            <span class="date"><?php echo date("Y.m.d", strtotime($data->CST_REG_DATE));?></span>

            <div class="btn">
              <ul>
                <li><a
                    href="/pro/constrCaseWrite?key=<?php echo $data->CST_IDX;?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>">수정</a>
                </li>
                <li><button type="button" class="" onclick="caseDel('<?php echo $data->CST_IDX;?>');">삭제</button></li>
              </ul>
            </div>
          </li>
          <?$i++;}?>
          <?php }?>

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
<!----- 푸터 시작 ----->

<script type="text/javascript">
// 전체체크
function allCheck(a) {
  $("[name=con]").prop("checked", $(a).prop("checked"));
}

function oneCheck(a) {
  var allChkBox = $('#thAll-ck');
  var chkBoxName = $(a).attr("name");

  if ($(a).prop("checked")) {
    checkBoxLength = $("[name=" + chkBoxName + "]").length;
    checkedLength = $("[name=" + chkBoxName + "]:checked").length;
    if (checkBoxLength == checkedLength) {
      allChkBox.prop("checked", true);
    } else {
      allChkBox.prop("checked", false);

    }
  } else {
    allChkBox.prop("checked", false);
  }
}
$(function() {
  $('#thAll-ck').click(function() {
    allCheck(this);
  });
  $("[name=con]").each(function() {
    $(this).click(function() {
      oneCheck(this);
    });
  });
});

function caseDel(key) {
  var result = confirm('정말 삭제하시겠습니까?');
  if (result) {
    var pageNo = "<?php echo $pageNo;?>";
    var search = "<?php echo $search;?>";
    location.replace('/DAO/caseDel?key=' + key + '&pageNo=' + pageNo + '&search=' + search);
    return true;
  } else {
    return false;
  }
}

$("#thAllck").on("click", function thAllck() {
  if ($(this).is(":checked")) {
    $(".caseCheck").prop("checked", true);
  } else {
    $(".caseCheck").prop("checked", false);
  }
});

function all_del() {
  var checkBoxArr = [];
  $(".caseCheck:checked").each(function(i) {
    checkBoxArr.push($(this).val());
  });
  if (checkBoxArr.length > 0) {
    var pageNo = "<?php echo $pageNo;?>";
    var search = "<?php echo $search;?>";
    var result = confirm('정말 삭제하시겠습니까?');
    if (result) {
      location.href = '/DAO/caseDelAll?key=' + checkBoxArr + '&pageNo=' + pageNo + '&search=' + search;
    }
  } else {
    alert("삭제할 게시물을 선택해주세요!");
    return false;
  }
}
</script>