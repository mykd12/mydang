<?php

$mid ='mydangkr99';                            // 테스트 MID 입니다. 계약한 상점 MID 로 변경 필요
$apiKey ='bd17d88e8eac1ed9476ed33e02ec1209';   // 테스트 MID 에 대한 apiKey
$mTxId ='Mydang_'.date("Ymd");    
$reqSvcCd ='01';
// 등록가맹점 확인
$plainText1 = hash("sha256",(string)$mid.(string)$mTxId.(string)$apiKey);
$authHash = $plainText1;
$flgFixedUser = 'N';           // 특정사용자 고정시 Y
?>
<script language="javascript">
function callSa() {
  let window = popupCenter();
  if (window != undefined && window != null) {
    document.add_form.setAttribute("target", "sa_popup");
    document.add_form.setAttribute("post", "post");
    document.add_form.setAttribute("action", "https://sa.inicis.com/auth");
    document.add_form.submit();
    return true;
  }
}

function callSaM() {
  let window = popupCenter();
  if (window != undefined && window != null) {
    document.modify_form.setAttribute("target", "sa_popup");
    document.modify_form.setAttribute("post", "post");
    document.modify_form.setAttribute("action", "https://sa.inicis.com/auth");
    document.modify_form.submit();
    return true;
  }
}

function popupCenter() {
  let _width = 400;
  let _height = 620;
  var xPos = (document.body.offsetWidth / 2) - (_width / 2); // 가운데 정렬
  xPos += window.screenLeft; // 듀얼 모니터일 때

  return window.open("", "sa_popup", "width=" + _width + ", height=" + _height + ", left=" + xPos +
    ", menubar=yes, status=yes, titlebar=yes, resizable=yes");
}
</script>

<main id="container" class="sub partnerSub myAgents join02 my">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="../../icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>담당자 관리</h4>
    </div>
    <!-- 탭 -->
    <div class="toptab <?php if($type=='B'){ echo "thTab"; }else if($type=='C'){echo "twoTab";}?>">
      <ul>
        <li><a href="/pro/mypage">정보보기</a></li>
        <li class="on <?php if($type=='B' || $type=='C'){?>disNone" <?php }?>"><a href="/pro/agents">담당자관리</a></li>
        <?php if($type=='A' || $type=='B'){?>
        <li><a href="/pro/prpIqMgmtA">문의관리</a></li>
        <?php }else{?>
        <li><a href="/pro/prpIqMgmtB">문의관리</a></li>
        <?php }?>
        <li <?php if($type=='C'){?> class="disNone" <?php }?>><a href="/pro/paymentList">결제내역</a></li>
      </ul>
    </div>
    <!-- 배너 -->
    <div class="banner-wrap">
      <p>매물광고 실명제에 따라 <br><span>등록관청에 신고된 담당자의 정보와 일치</span>해야 합니다.</p>
      <a href="javascript:void(0)" class="btn-move"><img src="../../icon/pro/banner-icon01.png" alt="배너물음표아이콘">매물광고
        실명제란?</a>
    </div>
    <!-- 내용시작 -->
    <div class="content">
      <div class="content-inner">
        <!-- 게시판 -->
        <div class="">
          <ul class="agents-list notice-table">
            <!-- 게시판 항목 -->
            <li class="t-head">
              <div class="name col01">이름</div>
              <div class="sort col02">구분</div>
              <div class="tel col03">연락처</div>
              <div class="set col04">설정</div>
            </li>
            <!-- 게시판 내용 시작 -->
            <?php if($total_rows > 0){?>
            <?php $i=0;?>
            <?php foreach($results as $data){?>
            <li class="t-con rep">
              <div class="name col01" data-th="이름">
                <?php if($data->BST_TYPE=='대표'){?>
                <p>
                  <span class="text-de">대표관리자</span>
                </p>
                <?php }?>
                <p>
                  <?php echo decrypt($data->BST_NAME);?>
                </p>
              </div>
              <div class="sort col02" data-th="구분"><?php echo $data->BST_TYPE;?></div>
              <div class="tel col03" data-th="연락처">
                <p><?php echo decrypt($data->BST_HP);?></p>
              </div>
              <div class="set col04" data-th="설정">
                <?php if($data->BST_TYPE != '대표'){?>
                <a href="javascript:bstModify('<?php echo $data->BST_IDX;?>');" class="btn-mo">
                  <div class="icon-wrap"><img src="../../icon/pro/btnmo.png" alt="수정아이콘"></div>수정
                </a>
                <a href="javascript:bstDelete('<?php echo $data->BST_IDX;?>');" class="btn-dl">
                  <div class="icon-wrap"><img src="../../icon/pro/btncl.png" alt="삭제아이콘"></div>삭제
                </a>
                <?php }?>
              </div>
            </li>
            <?php $i++;}?>
            <?php }?>

          </ul>
        </div>
        <!-- 추가하기 버튼 -->
        <div class="btn-wrap">
          <a href="javascript:bstAdd();" class="btn-agAdd">추가하기</a>
        </div>
        <!-- 보조원 추가 폼 -->
        <div class="form_wrap" style="display:none;" id="InsertDiv">
          <form id="add_form" name="add_form" method="post" action="/DAO/bstInsert" onsubmit="return frmInsert();">
            <input type="hidden" name="bkIdx" value="<?php echo $key;?>">
            <input type="hidden" name="mid" value="<?php echo $mid ?>">
            <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
            <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
            <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
            <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
            <input type="hidden" name="successUrl" value="https://mydang.kr/pro/certifAgents">
            <input type="hidden" name="failUrl" value="https://mydang.kr/pro/agents">
            <div class="form-group int_box">
              <h4>구분</h4>
              <div class="int-wrap">
                <div class="form-radio">
                  <input type="radio" id="bstTypeAI" class="" name="bstType" value="소속공인중개사">
                  <label for="bstTypeAI">소송공인중개사</label>
                </div>
                <div class="form-radio">
                  <input type="radio" id="bstTypeBI" class="" name="bstType" value="중개보조원">
                  <label for="bstTypeBI">중개보조원</label>
                </div>
              </div>
            </div>
            <div class="form-group name_box int_box">
              <h4 classd="h4_name">이름</h4>
              <input type="text" id="bstNameI" name="bstName" placeholder="이름을 입력하세요" class="int" maxlength="41"
                value="" autocomplete="off" onclick="callSa();" readonly>
            </div>
            <div class="form-group phone_box int_box">
              <h4 class="h4_phone">휴대폰번호</h4>
              <input type="text" id="bstHpI" name="bstHp" placeholder="휴대폰 번호를 입력하세요" class="int" maxlength="41"
                value="" autocomplete="off" readonly onclick="callSa();">
              <a href="javascript:callSa();" class="btn_search">인증<span>완료</span></a>
              <!-- <p class="error">특수기호,공백사용불가</p>
                <p class="error01">휴대폰 번호를 입력해주세요.</p> -->
            </div>
            <div class="form-group">
              <div class="ck-wrap">
                <div class="form-checkbox">
                  <input type="checkbox" id="ckMatchI" class="check_box" name="ckMatch">
                  <label for="ckMatchI">등록관청에 신고된 담당자의 정보와 일치합니다.</label>
                </div>
              </div>
            </div>
            <div class="bottomBtn-wrap">
              <input type="submit" title="추가" alt="" value="추가" class="btn-add">
              <button type="button" class="btn-cl" id="insertCancel">취소</button>
            </div>
          </form>
        </div>
        <div class="form_wrap" style="display:none;" id="modifyDiv">
          <form id="modify_form" name="modify_form" method="post" action="/DAO/bstModify"
            onsubmit="return frmModify();">
            <input type="hidden" name="bstKey" id="bstKey" value="" />
            <input type="hidden" name="bktKey" id="bktKey" value="" />
            <input type="hidden" name="mid" value="<?php echo $mid ?>">
            <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
            <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
            <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
            <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
            <input type="hidden" name="successUrl" id="successUrl" value="https://mydang.kr/pro/certifAgentsM">
            <input type="hidden" name="failUrl" value="https://mydang.kr/pro/agents">
            <div class="form-group int_box">
              <h4>구분</h4>
              <div class="int-wrap">
                <div class="form-radio">
                  <input type="radio" id="bstTypeAM" class="" name="bstType" value="소속공인중개사">
                  <label for="bstTypeAM">소속공인중개사</label>
                </div>
                <div class="form-radio">
                  <input type="radio" id="bstTypeBM" class="" name="bstType" value="중개보조원">
                  <label for="bstTypeBM">중개보조원</label>
                </div>
              </div>
            </div>
            <div class="form-group name_box int_box">
              <h4 classd="h4_name">이름</h4>
              <input type="text" id="bstNameM" name="bstName" placeholder="이름을 입력하세요" class="int" maxlength="41"
                value="" readonly autocomplete="off" onclick="callSaM();">
            </div>
            <div class="form-group phone_box int_box">
              <h4 class="h4_phone">휴대폰번호</h4>
              <input type="text" id="bstHpM" name="bstHp" placeholder="휴대폰 번호를 입력하세요" class="int" maxlength="41"
                value="" readonly autocomplete="off" onclick="callSaM();">
              <a href="javascript:callSaM();" class="btn_search">인증<span>완료</span></a>
              <!-- <p class="error">특수기호,공백사용불가</p>
                <p class="error01">휴대폰 번호를 입력해주세요.</p> -->
            </div>
            <div class="form-group">
              <div class="ck-wrap">
                <div class="form-checkbox">
                  <input type="checkbox" id="ckMatchM" class="check_box" name="ckMatch">
                  <label for="ckMatchM">등록관청에 신고된 담당자의 정보와 일치합니다.</label>
                </div>
              </div>
            </div>
            <div class="bottomBtn-wrap">
              <input type="submit" title="변경" alt="" value="변경" class="btn-add">
              <button type="button" class="btn-cl" id="modifyCancel">취소</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
function bstAdd() {

  $("#modifyDiv").css("display", "none");
  $("#bstTypeAM").prop('checked', false);
  $("#bstTypeBM").prop('checked', false);
  $("#bstNameM").val("");
  $("#bstHpM").val("");
  $("#ckMatchM").prop('checked', false);
  $("#InsertDiv").css("display", "");
  setTimeout(function() {
    var offset = $('#modifyDiv').offset(); //선택한 태그의 위치를 반환
    $('html').animate({
      scrollTop: offset.top
    }, 400);
  }, 500);


}
$("#insertCancel").on("click", function() {
  $("#InsertDiv").css("display", "none");
  $("#bstTypeAI").prop('checked', false);
  $("#bstTypeBI").prop('checked', false);
  $("#bstNameI").val("");
  $("#bstHpI").val("");
  $("#ckMatchI").prop('checked', false);
});
$("#modifyCancel").on("click", function() {
  $("#modifyDiv").css("display", "none");
  $("#bstTypeAM").prop('checked', false);
  $("#bstTypeBM").prop('checked', false);
  $("#bstNameM").val("");
  $("#bstHpM").val("");
  $("#ckMatchM").prop('checked', false);
});

function frmInsert() {
  if (!$("input:radio[name=bstType]").is(':checked')) {
    alert("구분을 선택해주세요!");
    $("#bstTypeAI").focus();
    return false;
  } else if (!$("#bstNameI").val() || !$("#bstHpI").val()) {
    alert("본인인증을 해주세요!");
    $("#bstNameI").focus();
    return false;
  } else if (!$("#ckMatchI").is(':checked')) {
    alert("등록관청에 신고된 담당자와 정보 일치에 확인하셔아합니다.");
    $("#ckMatchI").focus();
    return false;
  } else {
    $("#add_form").attr("method", "post");
    $("#add_form").attr("action", "/DAO/bstInsert");
    $("#add_form").attr("target", "");
    return true;
  }
}

function frmModify() {
  if (!$("input:radio[name=bstType]").is(':checked')) {
    alert("구분을 선택해주세요!");
    $("#bstTypeAM").focus();
    return false;
  } else if (!$("#bstNameM").val()) {
    alert("이름을 입력해주세요!");
    $("#bstNameM").focus();
    return false;
  } else if (!$("#bstHpM").val()) {
    alert("휴대폰번호를 입력해주세요");
    $("#bstHpM").focus();
    return false;
  } else if (!$("#ckMatchM").is(':checked')) {
    alert("등록관청에 신고된 담당자와 정보 일치에 확인하셔아합니다.");
    $("#ckMatchM").focus();
    return false;
  } else {
    $("#modify_form").attr("method", "post");
    $("#modify_form").attr("action", "/DAO/bstModify");
    $("#modify_form").attr("target", "");
    return true;
  }
}

function bstModify(key) {
  $("#InsertDiv").css("display", "none");
  $("#bstTypeAM").prop('checked', false);
  $("#bstTypeBM").prop('checked', false);
  $("#bstNameM").val("");
  $("#bstHpM").val("");
  $("#ckMatchM").prop('checked', false);
  $.ajax({
    type: 'post',
    url: "/VO/bstModify",
    data: {
      key: key
    },
    success: function(data) {
      var data = JSON.parse(data);
      console.log(data[0].BST_TYPE);
      if (data) {
        if (data[0].BST_TYPE.indexOf('소속공인중개사') === 0) {
          console.log(data[0].BST_TYPE);
          $("#bstTypeAM").prop('checked', true);
        } else if (data[0].BST_TYPE.indexOf('중개보조원') === 0) {
          console.log(data[0].BST_TYPE);
          $("#bstTypeBM").prop('checked', true);
        }
        $("#bstNameM").val(data[0].BST_NAME);
        $("#bstHpM").val(data[0].BST_HP);
        $("#bstKey").val(data[0].BST_IDX);
        $("#bktKey").val(data[0].BKT_IDX);
        $("#successUrl").val("https://mydang.kr/pro/certifAgentsM?bstKey=" + data[0].BST_IDX);
        $("#modifyDiv").css("display", "");
        setTimeout(function() {
          var offset = $('#modifyDiv').offset(); //선택한 태그의 위치를 반환
          $('html').animate({
            scrollTop: offset.top
          }, 400);
        }, 500);
      } else {
        $("#modifyDiv").css("display", "none");
      }
    }
  });
}

function bstDelete(key) {
  var rlt = confirm('삭제하시겠습니까?');
  if (rlt) {
    location.href = '/DAO/bstDelete?key=' + key;
  }
}

function autoHypenPhone(str) {
  str = str.replace(/[^0-9]/g, '');
  var tmp = '';
  if (str.length < 4) {
    return str;
  } else if (str.length < 7) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3);
    return tmp;
  } else if (str.length < 11) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 3);
    tmp += '-';
    tmp += str.substr(6);
    return tmp;
  } else {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 4);
    tmp += '-';
    tmp += str.substr(7);
    return tmp;
  }
  return str;
}

var cellPhone1 = document.getElementById('bstHpI');
cellPhone1.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}
var cellPhone2 = document.getElementById('bstHpM');
cellPhone2.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}
</script>