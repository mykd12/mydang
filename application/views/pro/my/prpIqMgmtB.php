<main id="container" class="sub partnerSub list04 cpIqMgmt my">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>상담 문의관리</h4>
    </div>
    <div class="toptab <?php if($type=='B'){ echo "thTab"; }else if($type=='C'){echo "twoTab";}?>">
      <ul>
        <li><a href="/pro/mypage">정보보기</a></li>
        <li <?php if($type=='B' || $type=='C'){?> class="disNone" <?php }?>"><a href="/pro/agents">담당자관리</a></li>
        <?php if($type=='A' || $type=='B'){?>
        <li class="on"><a href="/pro/prpIqMgmtA">문의관리</a></li>
        <?php }else{?>
        <li class="on"><a href="/pro/prpIqMgmtB">문의관리</a></li>
        <?php }?>
        <li <?php if($type=='C'){?> class="disNone" <?php }?>><a href="/pro/paymentList">결제내역</a></li>
      </ul>
    </div>
    <!-- 내용시작 -->
    <div class="content">
      <div class="content-inner">
        <div class="top-wrap">
          <div class="chMove-wrap">
            <!-- 전체선택 체크박스 -->
            <div class="form_checkbox">
              <input class="check_box" id="thAll-ck" name="con" type="checkbox">
              <label for="thAll-ck">전체선택</label>
            </div>
            <!-- 상태 변경 셀렉트 -->
            <div class="select-wrap btn-state">
              <div class="select_box">
                <select class="state_select" title="카테고리" id="pnState" name="pnState">
                  <option value="">전체</option>
                  <option value="대기중">대기중</option>
                  <option value="상담중">상담중</option>
                  <option value="시공중">시공중</option>
                  <option value="상담완료">상담완료</option>
                  <option value="시공완료">시공완료</option>
                </select>
              </div>
              <button type="submit" class="btn_change" id="qptTmove">변경</button>
            </div>
          </div>
          <div class="right-wrap">
            <!-- 서치바 -->
            <div class="search_form_wrap">
              <form class="noticeSearch_form" method="get" action="">
                <input type="hidden" name="state" id="state" value="<?php echo $state;?>">
                <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
                  value="<?php echo $search;?>">
                <button type="submit" class="btn_submit">검색</button>
              </form>
            </div>
            <!--  -->
            <div class="-select">
              <div class="select-wrap">
                <div class="select_box">
                  <select class="mngr_select" title="카테고리" id="cate" name="cate">
                    <option value="">전체</option>
                    <option value="대기중" <?php if($state=='대기중'){ echo "selected"; }?>>대기중</option>
                    <option value="상담중" <?php if($state=='상담중'){ echo "selected"; }?>>상담중</option>
                    <option value="시공중" <?php if($state=='시공중'){ echo "selected"; }?>>시공중</option>
                    <option value="상담완료" <?php if($state=='상담완료'){ echo "selected"; }?>>상담완료</option>
                    <option value="시공완료" <?php if($state=='시공완료'){ echo "selected"; }?>>시공완료</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- 리스트시작 -->

        <ul class="cpIq-list">
          <?php if($cur_num > 0){?>
          <?php $i=0;?>
          <?php foreach($results as $data){?>
          <li class="con">
            <div class="t-top">
              <!-- 선택 체크박스 -->
              <div class="form_checkbox">
                <input class="check_box" id="qptCheck<?php echo $data->QPT_IDX;?>" name="qptCheck[]"
                  value="<?php echo $data->QPT_IDX;?>" type="checkbox">
                <label for="qptCheck<?php echo $data->QPT_IDX;?>"><span
                    class="dateAplct"><?php echo date("Y.m.d", strtotime($data->QPT_REG_DATE)); ;?></span></label>
              </div>
              <!-- 상태 변경 셀렉트 -->
              <div class="select-wrap btn-state">
                <div class="select_box">
                  <select class="state_select" title="카테고리" id="qptState<?php echo $data->QPT_IDX;?>" name="qptState[]"
                    data="<?php echo $data->QPT_IDX;?>">
                    <option value="대기중" <?if($data->QPT_STATE=='대기중'){ echo "selected"; }?>>대기중</option>
                    <option value="상담중" <?if($data->QPT_STATE=='상담중'){ echo "selected"; }?>>상담중</option>
                    <option value="시공중" <?if($data->QPT_STATE=='시공중'){ echo "selected"; }?>>시공중</option>
                    <option value="상담완료" <?if($data->QPT_STATE=='상담완료'){ echo "selected"; }?>>상담완료</option>
                    <option value="시공완료" <?if($data->QPT_STATE=='시공완료'){ echo "selected"; }?>>시공완료</option>
                  </select>
                </div>
              </div>
              <button type="button" class="btn-cl" onclick="optDel('<?php echo $data->QPT_IDX;?>');">삭제</button>
            </div>
            <!-- 테이블 -->
            <ul class="cpIq_table">
              <li class="t-con" data-th="희망날짜">
                <span class="date"><?php echo $data->QPT_DATE;?></span>
              </li>
              <li class="t-con" data-th="시공구분">
                <span class=""><?php echo $data->QPT_TYPE;?></span>
              </li>
              <li class="t-con" data-th="상가형태">
                <span class="storeType"><?php echo $data->QPT_FORM;?></span>
              </li>
              <li class="t-con" data-th="이름">
                <span class="name"><?php echo decrypt($data->QPT_NAME);?></span>
              </li>
              <li class="t-con add" data-th="주소">
                <span class="add"><?php echo decrypt($data->QPT_ADDR1);?> <?php echo decrypt($data->QPT_ADDR2);?></span>
              </li>
              <li class="t-con t-tel" data-th="전화">
                <i class="xi-call"></i><span class="tel"><?php echo decrypt($data->QPT_TEL);?></span>
              </li>
            </ul>
          </li>
          <?php $i++;}?>
          <?php }?>
        </ul>
      </div>
      <!-- 페이징 -->
      <?// include("inc/paging.php"); ?>
      <div class="paginationDiv">
        <?php echo $pagination;?>
      </div>
    </div>
    </section>
  </div>
</main>
<!----- 푸터 시작 ----->
<script>
$("#thAll-ck").on("change", function() {
  if ($(this).is(":checked")) {
    $("input:checkbox[name='qptCheck[]']").prop("checked", true);
  } else {
    $("input:checkbox[name='qptCheck[]']").prop("checked", false);
  }
});

function optDel(key) {
  var rlt = confirm('삭제하시겠습니까?');

  if (rlt) {
    location.href = '/DAO/qptDel?key=' + key;
    return true;
  } else {
    return false;
  }
}
$("#cate").on("change", function() {
  var state = $(this).val();
  var search = "<?php echo $search;?>";
  $("#state").val(state);
  location.href = 'prpIqMgmtB?search=' + search + '&state=' + state;
})
$("select[name='qptState[]']").on("change", function() {
  var key = $(this).attr("data");
  var state = $(this).val();
  $.ajax({
    type: 'post',
    url: '/DAO/qptMove',
    data: {
      key: key,
      state: state
    },
    success: function(data) {
      if (data == '1') {
        alert("정상적으로 변경 되었습니다.");
        location.reload();
        return true;
      } else {
        alert("정상적으로 변경 않았습니다.");
        return false;
      }
    }
  });
})
$("#qptTmove").on("click", function() {
  var qptState = $("#pnState").val();
  var qptCheckCnt = $("input:checkbox[name='qptCheck[]']:checked").length;
  if (!qptState) {
    alert("변경 과정을 선택해주세요!");
    $("#pnState").focus();
    return false;
  } else if (qptCheckCnt == 0) {
    alert("변경 항목을 선택해주세요!");
    return false;
  } else {
    var key = "";
    var i = 0;
    $('input:checkbox[name="qptCheck[]"]:checked').each(function() {
      if (i == 0) {
        key += $(this).val();
      } else {
        key += "," + $(this).val();
      }
      i++;
    });
    $.ajax({
      type: 'post',
      url: '/DAO/qptTmove',
      data: {
        key: key,
        qptState: qptState
      },
      success: function(data) {
        if (data == '1') {
          alert("정상적으로 변경 되었습니다.");
          location.reload();
          return true;
        } else {
          alert("정상적으로 변경 않았습니다.");
          return false;
        }
      }
    });
  }
})
$("input:checkbox[name='qptCheck[]']").on("change", function() {
  if ($(this).is(":checked") == false) {
    $("#thAll-ck").prop("checked", false);
  }
  if ($("input:checkbox[name='qptCheck[]']").length == $("input:checkbox[name='qptCheck[]']:checked").length) {
    $("#thAll-ck").prop("checked", true);
  }
})
</script>