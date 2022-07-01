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
    document.join_form.setAttribute("target", "sa_popup");
    document.join_form.setAttribute("post", "post");
    document.join_form.setAttribute("action", "https://sa.inicis.com/auth");
    document.join_form.submit();
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

<link rel="stylesheet" href="/css/pro/login.css?v=<?php echo time(); ?>">
<script src="/js/login.js?v=<?php echo time(); ?>"></script>
<main id="container" class="join join02 cpJoin partnerSub cpModify ptnModify my">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>정보수정</h4>
    </div>
    <div class="toptab <?php if($PRO_TYPE=='B'){ echo "thTab"; }else if($PRO_TYPE=='C'){echo "twoTab";}?>">
      <ul>
        <li class="on"><a href="/pro/mypage">정보보기</a></li>
        <li <?php if($PRO_TYPE=='B' || $PRO_TYPE=='C'){?>class="disNone" <?php }?>><a href="/pro/agents">담당자관리</a></li>
        <?php if($PRO_TYPE=='A' || $PRO_TYPE=='B'){?>
        <li><a href="/pro/prpIqMgmtA">문의관리</a></li>
        <?php }else{?>
        <li><a href="/pro/prpIqMgmtB">문의관리</a></li>
        <?php }?>
        <li <?php if($PRO_TYPE=='C'){?> class="disNone" <?php }?>><a href="/pro/paymentList">결제내역</a></li>
      </ul>
    </div>
    <div class="content">
      <div class="content-inner">
        <div class="form_wrap">
          <form id="join_form" name="join_form" action="/DAO/myPagePro" onsubmit="return submit_ck();"
            enctype="multipart/form-data">
            <input type="hidden" name="proType" id="proType" value="<?php echo $PRO_TYPE;?>" />
            <input type="hidden" name="proKey" id="proKey" value="<?php echo $PRO_IDX;?>" />
            <input type="hidden" name="mid" value="<?php echo $mid ?>">
            <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
            <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
            <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
            <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
            <?php
            if($PRO_TYPE=='A'){
              $hp=decrypt($results->BKT_HP);
            }else if($PRO_TYPE=='B'){
              $hp=decrypt($results->MET_TEL);
            }else if($PRO_TYPE=='C'){
              $hp=decrypt($results->PTT_HP);
            }
            ?>
            <input type="hidden" name="successUrl"
              value="https://mydang.kr/pro/certifMypage?type=<?php echo $PRO_TYPE;?>&key=<?php echo $PRO_IDX;?>&tel=<?php echo $PRO_IDX;?>&<?php echo $hp;?>">
            <input type="hidden" name="failUrl" value="https://mydang.kr/pro/mypage">
            <?php if($PRO_TYPE=='A'){?>
            <div class="email_box int_box on">
              <h4 class="h4_email">이메일(아이디)</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->BKT_EMAIL);?>" autocomplete="off" readonly />
            </div>
            <div class="pw_box int_box on">
              <h4 class="h4_pw1">비밀번호</h4>
              <input type="PASSWORD" id="joinPw1" name="joinPw1" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off" readonly />
              <a href="javascript:void();" class="btn_pwChange">비밀번호 변경</a>
              <p class="error">8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.</p>
              <p class="error01">비밀번호를 입력해 주세요.</p>
            </div>
            <div class="pw_box pw_box02 int_box">
              <h4 class="h4_pw2">비밀번호 확인</h4>
              <input type="PASSWORD" id="joinPw2" name="joinPw2" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off" readonly />
              <p class="error">비밀번호를 확인해 주세요.</p>
              <p class="error01">비밀번호를 확인해 주세요.</p>
            </div>
            <div class="imd_box int_box on">
              <h4 classid="h4_imd">중개업소 명</h4>
              <input type="text" placeholder="" class="int" maxlength="41" value="<?php echo $results->BKT_COMPANY;?>"
                autocomplete="off" readonly />
            </div>
            <div class="imdNum_box int_box on">
              <h4 classid="h4_imdNum" class="">중개사등록번호</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->BKT_NUM);?>" autocomplete="off" readonly />
            </div>
            <div class="imdNum_box int_box on">
              <h4 classid="h4_imdNum" class="">사업자등록번호</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->BKT_BUSINESS_NUMBER);?>" autocomplete="off" readonly />
            </div>
            <div class="add_box01 int_box on">
              <h4 classid="h4_add01">주소</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->BKT_ADDR1);?>" autocomplete="off" readonly />
            </div>
            <div class="add_box02 int_box on">
              <h4 classid="h4_add02">상세주소</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->BKT_ADDR2);?>" autocomplete="off" readonly />
            </div>
            <div class="name_box int_box on">
              <h4 classd="h4_name">대표자명</h4>
              <input type="text" class="int" maxlength="41" id="joinName" name="joinName"
                value="<?php echo decrypt($results->BKT_NAME);?>" autocomplete="off" readonly />
            </div>
            <div class="tel_box01 int_box on">
              <h4 class="h4_tel01">유선전화번호</h4>
              <input type="text" id="joinTel" name="joinTel" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->BKT_TEL);?>" readonly autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="phone_box int_box on">
              <h4 class="h4_phone">휴대폰번호</h4>
              <?
                $resultPhone= preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", decrypt($results->BKT_HP));
              ?>
              <input type="text" id="joinHp" name="joinHp" placeholder="휴대폰 번호를 입력해 주세요." class="int" maxlength="41"
                value="<?php echo $resultPhone;?>" readonly autocomplete="off">
              <a href="javascript:callSa();" class="btn_overlap">본인인증/번호변경</a>
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="filebox filebox02 int_box">
              <input type="hidden" name="joinImgSave" id="joinImgSave" value="<?php echo $results->BKT_IMG_SAVE;?>" />
              <h4>대표사진</h4>
              <div class="photo-box">
                <?php if($results->BKT_IMG_SAVE){?>
                <div class="photo-wrap">
                  <div class="img-wrap">
                    <img src="/uploads/<?php echo $results->BKT_IMG_SAVE;?>" alt="매물사진" id="joinImgView">
                  </div>
                  <!-- <button type="button" id="joinImgbtn"><i class="xi-close-thin"></i> <span
                      class="blind">닫기</span></button> -->
                </div>
                <?php }?>
                <div class="add_input">
                  <label for="joinImg">업로드</label>
                  <!-- <input class="upload-name02" placeholder="" readonly /> -->
                  <input type="file" id="joinImg" name="joinImg" class="file">
                </div>
              </div>
            </div>
            <div class="ck-wrap">
              <div class="form-checkbox">
                <input type="checkbox" id="joinEmail" class="check_box" name="joinEmail"
                  <?if($results->BKT_EMAIL_PERMIT=='Y'){ echo "checked";}?> value="Y">
                <label for="joinEmail">이메일수신허용(선택)</label>
              </div>
              <div class="form-checkbox">
                <input type="checkbox" id="joinSns" class="check_box" name="joinSns"
                  <?if($results->BKT_SMS_PERMIT=='Y'){ echo "checked";}?> value="Y">
                <label for="joinSns">SNS수신허용(선택)</label>
              </div>
            </div>
            <?php }else if($PRO_TYPE=='B'){?>
            <div class="email_box int_box on">
              <h4 class="h4_email">이메일(아이디)</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->MET_EMAIL);?>" autocomplete="off" readonly />
            </div>
            <div class="pw_box int_box">
              <h4 class="h4_pw1">비밀번호</h4>
              <input type="PASSWORD" id="joinPw1" name="joinPw1" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off" readonly />
              <a href="javascript:void();" class="btn_pwChange">비밀번호 변경</a>
              <p class="error">8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.</p>
              <p class="error01">비밀번호를 입력해 주세요.</p>
            </div>
            <div class="pw_box pw_box02 int_box">
              <h4 class="h4_pw2">비밀번호 확인</h4>
              <input type="PASSWORD" id="joinPw2" name="joinPw2" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off" readonly />
              <p class="error">비밀번호를 확인해 주세요.</p>
              <p class="error01">비밀번호를 확인해 주세요.</p>
            </div>
            <div class="add_box01 int_box on">
              <h4 classid="h4_add01">주소</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->MET_ADDR1);?>" autocomplete="off" name="joinAddr1" id="joinAddr1"
                onclick="execDaumPostcode();" readonly />
              <a href="javascript:void(0)" class="btn_addSearch" onclick="execDaumPostcode();">주소찾기</a>
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="add_box02 int_box on">
              <h4 classid="h4_add02">상세주소</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->MET_ADDR2);?>" autocomplete="off" name="joinAddr2" id="joinAddr2" />
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="name_box int_box on">
              <h4 classd="h4_name">이름</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->MET_NAME);?>" name="joinName" id="joinName" autocomplete="off" />
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="phone_box int_box on">
              <h4 class="h4_phone">휴대폰번호</h4>
              <?
                $resultPhone= preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", decrypt($results->MET_TEL));
              ?>
              <input type="text" id="joinHp" name="joinHp" placeholder="휴대폰 번호를 입력해 주세요." class="int" maxlength="41"
                value="<?php echo $resultPhone;?>" readonly autocomplete="off">
              <a href="javascript:callSa();" class="btn_overlap">본인인증/번호변경</a>
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="ck-wrap">
              <div class="form-checkbox">
                <input type="checkbox" id="joinEmail" class="check_box" name="joinEmail"
                  <?if($results->MET_EMAIL_PERMIT=='Y'){ echo "checked";}?> value="Y">
                <label for="joinEmail">이메일수신허용(선택)</label>
              </div>
              <div class="form-checkbox">
                <input type="checkbox" id="joinSns" class="check_box" name="joinSns"
                  <?if($results->MET_SMS_PERMIT=='Y'){ echo "checked";}?> value="Y">
                <label for="joinSns">SNS수신허용(선택)</label>
              </div>
            </div>
            <?php }else if($PRO_TYPE=='C'){?>
            <div class="email_box int_box on">
              <h4 class="h4_email">이메일(아이디)</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->PTT_EMAIL);?>" autocomplete="off" readonly />
            </div>
            <div class="pw_box int_box">
              <h4 class="h4_pw1">비밀번호</h4>
              <input type="PASSWORD" id="joinPw1" name="joinPw1" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off" readonly />
              <a href="javascript:void();" class="btn_pwChange">비밀번호 변경</a>
              <p class="error">8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.</p>
              <p class="error01">비밀번호를 입력해 주세요.</p>
            </div>
            <div class="pw_box pw_box02 int_box">
              <h4 class="h4_pw2">비밀번호 확인</h4>
              <input type="PASSWORD" id="joinPw2" name="joinPw2" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off" readonly />
              <p class="error">비밀번호를 확인해 주세요.</p>
              <p class="error01">비밀번호를 확인해 주세요.</p>
            </div>
            <div class="cp_box int_box on">
              <h4 classid="h4_cp">회사 명</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->PTT_NAME);?>" autocomplete="off" readonly />
            </div>
            <div class="cpNum_box int_box on">
              <h4 classid="h4_cpNum" class="none">사업자등록번호</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->PTT_NUM);?>" autocomplete="off" readonly />
            </div>
            <div class="add_box01 int_box on">
              <input type="hidden" name="joinLat" id="joinLat" value="<?php echo $results->PTT_LAT;?>" />
              <input type="hidden" name="joinLon" id="joinLon" value="<?php echo $results->PTT_LON;?>" />
              <input type="hidden" name='joinAreaA' id='joinAreaA' value="<?php echo $results->PTT_AREA_A;?>">
              <input type='hidden' id='joinAreaAcode' name='joinAreaAcode'
                value='<?php echo $results->PTT_AREA_A_CODE;?>' />
              <input type="hidden" name='joinAreaB' id='joinAreaB' value="<?php echo $results->PTT_AREA_B;?>">
              <input type='hidden' id='joinAreaBcode' name='joinAreaBcode'
                value='<?php echo $results->PTT_AREA_B_CODE;?>' />
              <input type="hidden" name='joinAreaC' id='joinAreaC' value="<?php echo $results->PTT_AREA_C;?>">
              <input type='hidden' id='joinAreaCcode' name='joinAreaCcode'
                value='<?php echo $results->PTT_AREA_C_CODE;?>' />
              <input type='hidden' id='joinAddr1B' name='joinAddr1B'
                value='<?php echo decrypt($results->PTT_ADDR1_B);?>' />

              <h4 classid="h4_add01">주소</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->PTT_ADDR1_A);?>" autocomplete="off" name="joinAddr1" id="joinAddr1"
                onclick="execDaumPostcode();" />
              <a href="javascript:execDaumPostcode()" class="btn_addSearch">주소찾기</a>
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="add_box02 int_box on">
              <h4 classid="h4_add02">상세주소</h4>
              <input type="text" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->PTT_ADDR2);?>" autocomplete="off" name="joinAddr2" id="joinAddr2" />
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="name_box int_box on">
              <h4 classd="h4_name">대표자명</h4>
              <input type="text" id="joinName" name="joinName" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->PTT_CEO);?>" autocomplete="off" readonly />
            </div>
            <div class="name_box int_box">
              <h4 classd="h4_name">지역</h4>
              <input type="text" id="joinArea" name="joinArea" placeholder="" class="int" maxlength="41"
                value="<?php echo $results->PTT_AREA;?>" autocomplete="off" />
            </div>
            <div class="name_box int_box">
              <h4 classd="h4_name">경력</h4>
              <input type="text" id="joinCareer" name="joinCareer" placeholder="" class="int" maxlength="41"
                value="<?php echo $results->PTT_CAREER;?>" autocomplete="off" />
            </div>
            <div class="tel_box01 int_box on">
              <h4 class="h4_tel01">유선전화번호</h4>
              <input type="text" id="joinTel" name="joinTel" placeholder="" class="int" maxlength="41"
                value="<?php echo decrypt($results->PTT_TEL);?>" autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="phone_box int_box on">
              <h4 class="h4_phone">휴대폰번호</h4>
              <?
                $resultPhone= preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", decrypt($results->PTT_HP));
              ?>
              <input type="text" id="joinHp" name="joinHp" placeholder="휴대폰 번호를 입력해 주세요." class="int" maxlength="41"
                value="<?php echo $resultPhone;?>" readonly autocomplete="off">
              <a href="javascript:callSa();" class="btn_overlap">본인인증/번호변경</a>
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="cpField_box clearfix">
              <h4>업체 주 분야</h4>
              <div class="fieldCk-wrap">
                <div class="chk_box">
                  <input type="checkbox" id="joinField01" name="joinField" value="인테리어"
                    <?php if($results->PTT_TYPE=='인테리어') { echo "checked"; }?>>
                  <label for="joinField01" id="" class="">인테리어</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="joinField02" name="joinField" value="가구"
                    <?php if($results->PTT_TYPE=='가구') { echo "checked"; }?>>
                  <label for="joinField02" id="" class="">가구</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="joinField03" name="joinField" value="주방/설비"
                    <?php if($results->PTT_TYPE=='주방/설비') { echo "checked"; }?>>
                  <label for="joinField03" id="" class="">주방/설비</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="joinField04" name="joinField" value="간판"
                    <?php if($results->PTT_TYPE=='간판') { echo "checked"; }?>>
                  <label for="joinField04" id="" class="">간판</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="joinField05" name="joinField" value="광고/인쇄"
                    <?php if($results->PTT_TYPE=='광고/인쇄') { echo "checked"; }?>>
                  <label for="joinField05" id="" class="">광고/인쇄</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="joinField06" name="joinField" value="통신/보안"
                    <?php if($results->PTT_TYPE=='통신/보안') { echo "checked"; }?>>
                  <label for="joinField06" id="" class="">통신/보안</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="joinField07" name="joinField" value="렌탈"
                    <?php if($results->PTT_TYPE=='렌탈') { echo "checked"; }?>>
                  <label for="joinField07" id="" class="">렌탈</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="joinField08" name="joinField" value="기타"
                    <?php if($results->PTT_TYPE=='기타') { echo "checked"; }?>>
                  <label for="joinField08" id="" class="">기타</label>
                </div>
              </div>
            </div>
            <div class="cpInt-box int_box clearfix">
              <h4>간략소개</h4>
              <textarea name="joinText" id="joinText" cols="30" rows="3"
                placeholder=""><?php echo $results->PTT_TEXT;?></textarea>
            </div>
            <div class="filebox filebox02 int_box">
              <h4>대표사진</h4>
              <div class="photo-box">
                <input type="hidden" name="joinImgSave" id="joinImgSave" value="<?php echo $results->PTT_IMG_SAVE;?>" />
                <input type="hidden" name="joinImgDel" id="joinImgDel" value="" />
                <div class="photo-wrap" id="imgDiv"
                  <?php if(!$results->PTT_IMG_SAVE){ echo "style='display:none;'"; }?>>
                  <div class="img-wrap">
                    <img src="/uploads/<?php echo $results->PTT_IMG_SAVE;?>" alt="매물사진" id="joinImgView">
                  </div>
                  <button type="button" id="joinImgbtn"><i class="xi-close-thin"></i> <span
                      class="blind">닫기</span></button>
                </div>
                <div class="add_input">
                  <label for="joinImg">업로드</label>
                  <!-- <input class="upload-name02" placeholder="" readonly /> -->
                  <input type="file" id="joinImg" name="joinImg" class="file">
                </div>
              </div>
            </div>
            <div class="ck-wrap">
              <div class="form-checkbox">
                <input type="checkbox" id="joinEmail" class="check_box" name="joinEmail"
                  <?if($results->PTT_EMAIL_PERMIT=='Y'){ echo "checked";}?> value="Y">
                <label for="joinEmail">이메일수신허용(선택)</label>
              </div>
              <div class="form-checkbox">
                <input type="checkbox" id="joinSns" class="check_box" name="joinSns"
                  <?if($results->PTT_SMS_PERMIT=='Y'){ echo "checked";}?> value="Y">
                <label for="joinSns">SNS수신허용(선택)</label>
              </div>
            </div>
            <?php }?>

            <div class="bottomBtn-wrap">
              <input type="submit" title="정보수정" alt="" value="정보수정" class="btn-modify">
              <button type="button" class="btn-secession" onclick="withDrawal();">탈퇴하기</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="error"><i class="xi-warning"></i>비밀번호가 일치하지 않습니다. 확인해주세요!</div>
  </div>
</main>
<script>
$('#joinImg').change(function() {
  setImageFromFile(this, '#joinImgView');
  $("#imgDiv").css("display", "");
});

function setImageFromFile(input, expression) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $(expression).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#joinImgbtn").on("click", function() {
  $("#joinImgDel").val("del");
  $("#imgDiv").css("display", "none");
});
</script>
<script src='https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script type="text/javascript">
var addr_data = '';
var type = "<?php echo $PRO_TYPE;?>";
var pwdChange = "";
$(".btn_pwChange").on("click", function() {
  pwdChange = "on";
})

function execDaumPostcode() {
  new daum.Postcode({
    showMoreHName: true,
    shorthand: false,
    oncomplete: function(data) {
      var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
      var extraRoadAddr = ''; // 도로명 조합형 주소 변수
      if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
        extraRoadAddr += data.bname;
      }
      if (data.buildingName !== '' && data.apartment === 'Y') {
        extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
      }
      if (extraRoadAddr !== '') {
        extraRoadAddr = ' (' + extraRoadAddr + ')';
      }
      if (fullRoadAddr !== '') {
        fullRoadAddr += extraRoadAddr;
      }
      var expJibunAddr = data.jibunAddress;

      document.getElementById('joinAddr1').value = fullRoadAddr;
      document.getElementById('joinAddr2').focus();
      if (type == 'C') {
        addr_data = fullRoadAddr;
        addr_location(addr_data);

        $("#joinAreaA").val(data.sido);
        $("#joinAreaB").val(data.sigungu);
        if (data.sido == '세종특별자치시') {
          $("#joinAreaB").val(data.sido);
        }

        $("#joinAreaC").val(data.bname);
        $("#joinAreaBcode").val(data.sigunguCode);
        $("#joinAreaCcode").val(data.bcode);
        $("#joinAddr1B").val(expJibunAddr);
      }

    }
  }).open();
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
if (type == 'A') {
  var cellPhone = document.getElementById('joinTel');
  cellPhone.onkeyup = function(event) {
    event = event || window.event;
    if (this.value.length > 13) {
      var tel_txt = this.value.slice(0, -1);
      this.value = tel_txt;
    }
    var _val = this.value.trim();
    this.value = autoHypenPhone(_val);
  }
}
var cellPhoneH = document.getElementById('joinHp');
cellPhoneH.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

function submit_ck() {
  var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;
  if ($("#joinPw1").val() && !pwPattern.test($("#joinPw1").val())) {
    alert("비밀번호 형식을 8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.");
    $("#joinPw1").focus();
    return false;
  } else if ($("#joinPw1").val() != $("#joinPw2").val()) {
    alert("비밀번호와 비밀번호확인이 일치 하지 않습니다.");
    $("#joinPw2").focus();
    return false;
  } else {
    $("#join_form").attr("method", "post");
    $("#join_form").attr("target", "");
    $("#join_form").attr("action", "/DAO/myPagePro");
    return true;
  }
}

function withDrawal() {
  var result = confirm('정말 탈퇴하시겠습니까?');
  if (result) {
    location.replace('/auth/seceSsionPro');
    return true;
  } else {
    return false;
  }

}
</script>
<script>
$("input[name=joinField]").on("change", function() {
  $("input[name=joinField]").prop('checked', false);
  $(this).prop('checked', true);
});
</script>
<script>
$(".pw_box.int_box a").on("click", function() {
  $(".pw_box02.int_box").addClass('open')
  $(this).css('display', 'none');
  $('#joinPw1').attr('readonly', false);
  $('#joinPw2').attr('readonly', false);
});

$(".upload-name02").on("click", function() {
  $('#joinImg').click();
});
</script>
<script type="text/javascript"
  src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ca6889c8b7dc6867af0b4a4ba8cbfe35&libraries=services"></script>

<script type="text/javascript">
<!--
function addr_location(addr_data) {
  //alert(addr_data);
  var addr_data = addr_data;

  var geocoder = new daum.maps.services.Geocoder();
  var addr_lat = '';
  var addr_lng = '';

  // 주소로 좌표를 검색합니다
  geocoder.addressSearch(addr_data, function(result, status) {

    // 정상적으로 검색이 완료됐으면
    if (status === daum.maps.services.Status.OK) {
      addr_lat = result[0].y;
      addr_lng = result[0].x;
      $("#joinLat").val(addr_lat);
      $("#joinLon").val(addr_lng);

      var coords = new daum.maps.LatLng(result[0].y, result[0].x);

      // 결과값으로 받은 위치를 마커로 표시합니다
      var marker = new daum.maps.Marker({
        map: map,
        position: coords
      });

      // 인포윈도우로 장소에 대한 설명을 표시합니다
      var infowindow = new daum.maps.InfoWindow({
        content: '<div style="width:150px;text-align:center;padding:6px 0;">우리회사</div>'
      });
      infowindow.open(map, marker);

      // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
      map.setCenter(coords);
    }
  });
}
//
-->
</script>