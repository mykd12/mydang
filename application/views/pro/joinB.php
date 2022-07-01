<link rel="stylesheet" href="/css/pro/login.css?v=<?php echo time(); ?>">
<script src="/js/login.js?v=<?php echo time(); ?>"></script>

<main id="container"
  class="join join02 <?php if($type=='A'){ echo "imdJoin"; }else if($type=='B'){  echo "lsJoin"; }else if($type=='C'){  echo "cpJoin"; }?>">
  <div class="container-inner">
    <div class="content">
      <div class="content-inner">
        <div class="title">
          <div class="icon-wrap">
            <img src="/icon/pro/join04.png" alt="파트너 아이콘">
          </div>
          <h4><?php if($type=='A'){?>중개인<?php }else if($type=='B'){?>일반<?php }else if($type=='C'){?>파트너<?php }?> 회원가입
          </h4>
        </div>
        <ul class="step-wrap">
          <li>
            <p class="num">01</p>
            <p>약관동의</p>
          </li>
          <li><img src="/icon/pro/arrow02.png" alt="화살표아이콘"> </li>
          <li class="on">
            <p class="num">02</p>
            <p>정보입력</p>
          </li>
          <li><img src="/icon/pro/arrow03.png" alt="화살표아이콘"> </li>
          <li>
            <p class="num">03</p>
            <p>신청완료</p>
          </li>
        </ul>
        <div class="form_wrap">
          <form id="join_form" method="post" action="/DAO/joinPro" onsubmit="return submit_ck();"
            enctype="multipart/form-data">
            <input type="hidden" name="type" id="type" value="<?php echo $type;?>" />
            <input type="hidden" name="EMAIL_CK" id="EMAIL_CK" value="" />
            <?php if($type=='A'){?>
            <div class="email_box int_box on">
              <h4 class="h4_email">이메일(아이디)</h4>
              <input type="text" id="JOIN_EMAIL" name="JOIN_EMAIL" placeholder="이메일 아이디를 입력해 주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <a href="javascript:email_ck();" class="btn_overlap">중복확인</a>
              <p class="error">이메일형식에 맞게 작성해주세요.</p>
              <p class="error01">이메일을 입력해주세요.</p>
            </div>
            <div class="pw_box int_box">
              <h4 class="h4_pw1">비밀번호</h4>
              <input type="PASSWORD" id="JOIN_PW1" name="JOIN_PW1" placeholder="비밀번호를 입력해 주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.</p>
              <p class="error01">비밀번호를 입력해 주세요.</p>
            </div>
            <div class="pw_box int_box">
              <h4 class="h4_pw2">비밀번호 확인</h4>
              <input type="PASSWORD" id="JOIN_PW2" name="JOIN_PW2" placeholder="비밀번호를 확인해 주세요" class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">비밀번호를 확인해 주세요.</p>
              <p class="error01">비밀번호를 확인해 주세요.</p>
            </div>
            <div class="imd_box int_box">
              <h4 classid="h4_imd">중개업소 명</h4>
              <input type="hidden" name="JOIN_CORPORATE" id="JOIN_CORPORATE" />
              <input type="text" id="JOIN_BUSINESSNAME" name="JOIN_BUSINESSNAME" placeholder="중개업소명" class="int"
                maxlength="41" value="" autocomplete="off" readonly href="#addSearch" rel="modal:open">
              <a href="#addSearch" rel="modal:open" class="btn_search">찾기</a>
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="imdNum_box int_box">
              <h4 classid="h4_imdNum">중개등록번호</h4>
              <input type="text" id="JOIN_NUMBER" name="JOIN_NUMBER" placeholder="중개등록번호" class="int" maxlength="41"
                value="" autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="filebox filebox01 int_box">
              <label for="JOIN_FILE">첨부</label>
              <input class="upload-name01" value="" placeholder="중개등록증 첨부" readonly />
              <input type="file" id="JOIN_FILE" name="JOIN_FILE" class="file">
            </div>
            <div class="imdNum_box int_box">
              <h4 classid="h4_imdNum">사업자등록번호</h4>
              <input type="text" id="JOIN_BUSINESS_NUMBER" name="JOIN_BUSINESS_NUMBER" placeholder="사업자등록번호" class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="filebox filebox01 int_box">
              <label for="JOIN_FILE1">첨부</label>
              <input class="upload-name03" value="" placeholder="사업자등록증 첨부" readonly />
              <input type="file" id="JOIN_FILE1" name="JOIN_FILE1" class="file">
            </div>
            <div class="add_box01 int_box">
              <h4 classid="h4_add01">주소</h4>
              <input type="text" id="JOIN_ADD01" name="JOIN_ADD01" placeholder="주소를 입력해주세요." class="int" maxlength="41"
                value="" autocomplete="off" onclick="execDaumPostcode();" readonly>
              <a href="javascript:void(0)" class="btn_addSearch" onclick="execDaumPostcode();">주소찾기</a>
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="add_box02 int_box">
              <h4 classid="h4_add02">상세주소</h4>
              <input type="text" id="JOIN_ADD02" name="JOIN_ADD02" placeholder="상세주소를 입력해주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="name_box int_box <?if($userName){ echo " on" ;}?>">
              <h4 classd="h4_name">대표자명</h4>
              <input type="text" id="JOIN_CEO" name="JOIN_CEO" placeholder="대표자명을 입력해 주세요." class="int" maxlength="41"
                value="<?php echo $userName;?>" <?if($userName){ echo "readonly" ;}?> autocomplete="off">
              <!-- <input type="text" id="JOIN_CEO" name="userName" placeholder="대표자명을 입력해 주세요." class="int" maxlength="41"
                value="" autocomplete="off"> -->
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="tel_box01 int_box">
              <h4 class="h4_tel01">유선전화번호</h4>
              <input type="text" id="JOIN_TEL" name="JOIN_TEL" placeholder="유선전화번호를 입력해 주세요." class="int" maxlength="41"
                value="" autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="phone_box int_box  <?if($userPhone){ echo " on" ;}?>">
              <h4 class="h4_phone">휴대폰번호</h4>
              <?
                $resultPhone= preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $userPhone);
              ?>
              <input type="text" id="JOIN_HP" name="JOIN_HP" placeholder="휴대폰 번호를 입력해 주세요." class="int" maxlength="41"
                value="<?php echo $resultPhone;?>" <?if($userPhone){ echo "readonly" ;}?> autocomplete="off" readonly>
              <!-- <input type="text" id="JOIN_HP" name="userPhone" placeholder="휴대폰 번호를 입력해 주세요." class="int" maxlength="41"
                value="" autocomplete="off"> -->
              <!-- <a href="javascript:callSa();" class="btn_overlap" id="hpCheck">본인인증</a> -->
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <!--<div class="tel_box02 int_box">
              <h4 class="h4_tel02">연락가능번호</h4>
              <p class="text-de">등록관청에 신고된 번호</p>
              <input type="text" id="MET_TEL02" name="MET_TEL02" placeholder="연락 가능한 번호를 입력해 주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>-->
            <div class="filebox filebox02 int_box">
              <h4>대표사진</h4>
              <label for="JOIN_IMG">첨부</label>
              <input class="upload-name02" placeholder="대표사진을 첨부해 주세요." readonly />
              <input type="file" id="JOIN_IMG" name="JOIN_IMG" class="file">
            </div>
            <?php }else if($type=='B'){?>
            <div class="email_box int_box on">
              <h4 class="h4_email">이메일(아이디)</h4>
              <input type="text" id="JOIN_EMAIL" name="JOIN_EMAIL" placeholder="이메일 아이디를 입력해 주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <a href="javascript:email_ck();" class="btn_overlap">중복확인</a>
              <p class="error">이메일형식에 맞게 작성해주세요.</p>
              <p class="error01">이메일을 입력해주세요.</p>
            </div>
            <div class="pw_box int_box">
              <h4 class="h4_pw1">비밀번호</h4>
              <input type="PASSWORD" id="JOIN_PW1" name="JOIN_PW1" placeholder="비밀번호를 입력해 주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.</p>
              <p class="error01">비밀번호를 입력해 주세요.</p>
            </div>
            <div class="pw_box int_box">
              <h4 class="h4_pw2">비밀번호 확인</h4>
              <input type="PASSWORD" id="JOIN_PW2" name="JOIN_PW2" placeholder="비밀번호를 확인해 주세요" class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">비밀번호를 확인해 주세요.</p>
              <p class="error01">비밀번호를 확인해 주세요.</p>
            </div>
            <div class="add_box01 int_box">
              <h4 classid="h4_add01">주소</h4>
              <input type="text" id="JOIN_ADD01" name="JOIN_ADD01" placeholder="주소를 입력해주세요." class="int" maxlength="41"
                value="" autocomplete="off" onclick="execDaumPostcode();" readonly>
              <a href="javascript:void(0)" class="btn_addSearch" onclick="execDaumPostcode();">주소찾기</a>
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="add_box02 int_box">
              <h4 classid="h4_add02">상세주소</h4>
              <input type="text" id="JOIN_ADD02" name="JOIN_ADD02" placeholder="상세주소를 입력해주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="name_box int_box <?php if($userName){ echo" on";}?>">
              <h4 classd="h4_name">이름</h4>
              <input type="text" id="JOIN_CEO" name="JOIN_CEO" placeholder="이름을 입력해 주세요." class="int" maxlength="41"
                value="<?php echo $userName;?>" <?php if($userName){ echo" readonly";}?> autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="phone_box int_box <?php if($userPhone){ echo" on";}?>">
              <h4 class="h4_phone">휴대폰번호</h4>
              <?
                $resultPhone= preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $userPhone);
              ?>
              <input type="text" id="JOIN_HP" name="JOIN_HP" placeholder="휴대폰 번호를 입력해 주세요." class="int" maxlength="41"
                value="<?php echo $resultPhone;?>" <?php if($userPhone){ echo" readonly";}?> autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <?php }else if($type=='C'){?>
            <input type='hidden' id='JOIN_ADDR1_B' name='JOIN_ADDR1_B' value='' />
            <input type='hidden' id='JOIN_LAT' name='JOIN_LAT' value='' />
            <input type='hidden' id='JOIN_LON' name='JOIN_LON' value='' />
            <input name='JOIN_AREA_A' id='JOIN_AREA_A' type="hidden" value="">
            <input type='hidden' id='JOIN_AREA_A_CODE' name='JOIN_AREA_A_CODE' value='' />
            <input name='JOIN_AREA_B' id='JOIN_AREA_B' type="hidden" value="">
            <input type='hidden' id='JOIN_AREA_B_CODE' name='JOIN_AREA_B_CODE' value='' />
            <input name='JOIN_AREA_C' id='JOIN_AREA_C' type="hidden" value="">
            <input type='hidden' id='JOIN_AREA_C_CODE' name='JOIN_AREA_C_CODE' value='' />
            <div class="email_box int_box on">
              <h4 class="h4_email">이메일(아이디)</h4>
              <input type="text" id="JOIN_EMAIL" name="JOIN_EMAIL" placeholder="이메일 아이디를 입력해 주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <a href="javascript:email_ck();" class="btn_overlap">중복확인</a>
              <p class="error">이메일형식에 맞게 작성해주세요.</p>
              <p class="error01">이메일을 입력해주세요.</p>
            </div>
            <div class="pw_box int_box">
              <h4 class="h4_pw1">비밀번호</h4>
              <input type="PASSWORD" id="JOIN_PW1" name="JOIN_PW1" placeholder="비밀번호를 입력해 주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.</p>
              <p class="error01">비밀번호를 입력해 주세요.</p>
            </div>
            <div class="pw_box int_box">
              <h4 class="h4_pw2">비밀번호 확인</h4>
              <input type="PASSWORD" id="JOIN_PW2" name="JOIN_PW2" placeholder="비밀번호를 확인해 주세요" class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">비밀번호를 확인해 주세요.</p>
              <p class="error01">비밀번호를 확인해 주세요.</p>
            </div>
            <div class="imd_box int_box">
              <h4 classid="h4_imd">파트너사 명</h4>
              <input type="text" id="JOIN_BUSINESSNAME" name="JOIN_BUSINESSNAME" placeholder="파트너사명" class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="imdNum_box int_box">
              <h4 classid="h4_imdNum">사업자등록번호</h4>
              <input type="text" id="JOIN_NUMBER" name="JOIN_NUMBER" placeholder="사업자등록번호" class="int" maxlength="41"
                value="" autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="filebox filebox01 int_box">
              <label for="JOIN_FILE">첨부</label>
              <input class="upload-name01" value="" placeholder="사업자등록 첨부" readonly />
              <input type="file" id="JOIN_FILE" name="JOIN_FILE" class="file">
            </div>
            <div class="add_box01 int_box">
              <h4 classid="h4_add01">주소</h4>
              <input type="text" id="JOIN_ADD01" name="JOIN_ADD01" placeholder="주소를 입력해주세요." class="int" maxlength="41"
                value="" autocomplete="off" onclick="execDaumPostcode();" readonly>
              <a href="javascript:void(0)" class="btn_addSearch" onclick="execDaumPostcode();">주소찾기</a>
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="add_box02 int_box">
              <h4 classid="h4_add02">상세주소</h4>
              <input type="text" id="JOIN_ADD02" name="JOIN_ADD02" placeholder="상세주소를 입력해주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="name_box int_box <?php if($userName){ echo "on";}?>">
              <h4 classd="h4_name">대표자명</h4>
              <input type="text" id="JOIN_CEO" name="JOIN_CEO" placeholder="대표자명을 입력해 주세요." class="int" maxlength="41"
                value="<?php echo $userName;?>" <?php if($userName){ echo "readonly";}?> autocomplete="off">
              <p class="error"></p>
              <p class="error01"></p>
            </div>
            <div class="tel_box01 int_box">
              <h4 class="h4_tel01">지역</h4>
              <input type="text" id="JOIN_AREA" name="JOIN_AREA" placeholder="지역을 입력해 주세요." class="int" maxlength="41"
                value="" autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="tel_box01 int_box">
              <h4 class="h4_tel01">경력</h4>
              <input type="text" id="JOIN_CAREER" name="JOIN_CAREER" placeholder="경력을 입력해 주세요." class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="tel_box01 int_box">
              <h4 class="h4_tel01">유선전화번호</h4>
              <input type="text" id="JOIN_TEL" name="JOIN_TEL" placeholder="유선전화번호를 입력해 주세요." class="int" maxlength="41"
                value="" autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="phone_box int_box <?php if($userPhone){ echo "on";}?>">
              <h4 class="h4_phone">휴대폰번호</h4>
              <?
                $resultPhone= preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $userPhone);
              ?>
              <input type="text" id="JOIN_HP" name="JOIN_HP" <?php if($userPhone){ echo "readonly";}?>
                placeholder="휴대폰 번호를 입력해 주세요." class="int" maxlength="41" value="<?php echo $resultPhone;?>"
                autocomplete="off">
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <div class="cpField_box clearfix">
              <h4>업체 주 분야</h4>
              <!--<p class="text-de">중복선택가능</p>-->
              <div class="fieldCk-wrap">
                <div class="chk_box">
                  <input type="checkbox" id="JOIN_TYPE01" name="JOIN_TYPE" value="인테리어">
                  <label for="JOIN_TYPE01" id="" class="">인테리어</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="JOIN_TYPE02" name="JOIN_TYPE" value="가구">
                  <label for="JOIN_TYPE02" id="" class="">가구</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="JOIN_TYPE03" name="JOIN_TYPE" value="주방/설비">
                  <label for="JOIN_TYPE03" id="" class="">주방/설비</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="JOIN_TYPE04" name="JOIN_TYPE" value="간판">
                  <label for="JOIN_TYPE04" id="" class="">간판</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="JOIN_TYPE05" name="JOIN_TYPE" value="광고/인쇄">
                  <label for="JOIN_TYPE05" id="" class="">광고/인쇄</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="JOIN_TYPE06" name="JOIN_TYPE" value="통신/보안">
                  <label for="JOIN_TYPE06" id="" class="">통신/보안</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="JOIN_TYPE07" name="JOIN_TYPE" value="렌탈">
                  <label for="JOIN_TYPE07" id="" class="">렌탈</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="JOIN_TYPE08" name="JOIN_TYPE" value="기타">
                  <label for="JOIN_TYPE08" id="" class="">기타</label>
                </div>
              </div>
            </div>
            <div class="cpInt-box int_box clearfix">
              <h4>간략소개</h4>
              <textarea name="JOIN_TEXT" id="JOIN_TEXT" cols="30" rows="3" placeholder=""></textarea>
            </div>
            <div class="filebox filebox02 int_box">
              <h4>대표사진</h4>
              <label for="JOIN_IMG">첨부</label>
              <input class="upload-name02" placeholder="대표사진을 첨부해 주세요." readonly />
              <input type="file" id="JOIN_IMG" name="JOIN_IMG" class="file">
            </div>
            <?php }?>
            <div class="ck-wrap">
              <div class="form-checkbox">
                <input type="checkbox" id="JOIN_EMAIL_PERMIT" class="check_box" name="JOIN_EMAIL_PERMIT" value="Y">
                <label for="JOIN_EMAIL_PERMIT">이메일수신허용(선택)</label>
              </div>
              <div class="form-checkbox">
                <input type="checkbox" id="JOIN_SMS_PERMIT" class="check_box" name="JOIN_SMS_PERMIT" value="Y">
                <label for="JOIN_SMS_PERMIT">SNS수신허용(선택)</label>
              </div>
            </div>
            <div class="bottomBtn-wrap">
              <input type="submit" title="회원가입" alt="회원가입" value="회원가입" class="btn-join ">
            </div>
          </form>

        </div>
      </div>
    </div>
    <div class="error"><i class="xi-warning"></i>비밀번호가 일치하지 않습니다. 확인해주세요!</div>
  </div>
</main>
<iframe id="iframe1" name="iframe1" style="display:none"></iframe>
<div class="joionModal modal-find" id="addSearch">
  <div class="modal-inner find-inner">
    <div class="title-wrap">
      <h3>중개업소찾기</h3>
      <!-- <button type="button" class="btn-close">닫기</button> -->
    </div>
    <div class="mdlCnt-wrap">
      <div class="search-form-wrap">
        <form id="businFrm" onsubmit="return busines_search('1');" target="iframe1">
          <input type="text" placeholder="ex) 중개업소명" id="search_busines" class="searchint" autocomplete="off"
            name="search_busines" value="">
          <button type="button" class="btn-search" onclick="$('#businFrm').submit();"><i class="xi-search"><span
                class="blind">검색</span></i></button>
        </form>
      </div>
      <div class="result dp-n">
        <table class="table-lsName">
          <tr>
            <th>법정동명</th>
            <th>법인등록번호</th>
            <th>사업자상호</th>
          </tr>
          <tr>
            <td>서울특별시 종로구</td>
            <td>가123456-789</td>
            <td>신흥사부동산중개인사무소</td>
          </tr>
          <tr>
            <td>울산광역시 남구</td>
            <td>가123456-789</td>
            <td>성진공인중개사사무소</td>
          </tr>
          <tr>
            <td>광주광역시 서구</td>
            <td>가123456-789</td>
            <td>자매공인중개사사무소</td>
          </tr>
        </table>
        <div class="paginationDiv">
          <strong>1</strong>
          <a href="javascript:void(0);">2</a>
          <a href="javascript:void(0);">&gt;</a>
        </div>
      </div>
      <div class="no-result">
        <p>검색 결과가 없습니다.</p>
        <!-- <a href="javascript:void(0)" class="btn-cstCntInq">고객센터 문의</a> -->
        <a href="#cstCntInq" rel="modal:open" class="btn-cstCntInq">고객센터 문의</a>
      </div>
    </div>
  </div>
</div>
<div class="joionModal modal-cstCntInq" id="cstCntInq">
  <div class="modal-inner cstCntInq-inner">
    <div class="title-wrap">
      <h3>문의하기</h3>
      <!-- <button type="button" class="btn-close">닫기</button> -->
    </div>
    <div class="cstCntInq-wrap join02 inquiryWrite">
      <form class="form-cstCntInq" onsubmit="return pqQna();" target="iframe1">
        <div class="left-wrap">
          <div class="int_box on">
            <input type="text" id="pqName" name="pqName" placeholder="이름" class="int" maxlength="41" autocomplete="off">
          </div>
          <div class="int_box">
            <input type="text" id="pqTel" name="pqTel" placeholder="전화번호를 입력하세요." class="int" maxlength="41"
              autocomplete="off">
          </div>
          <div class="int_box">
            <input type="text" id="pqEmail" name="pqEmail" placeholder="이메일을 입력하세요." class="int" maxlength="41"
              autocomplete="off">
          </div>
          <div class="select_box">
            <select class="inq_select" title="카테고리" id="pqType" name="pqType">
              <option value="">문의 유형 선택</option>
              <option value="중개사 검색">중개사 검색</option>
              <option value="서비스 기타">서비스 기타</option>
            </select>
          </div>
        </div>
        <div class="right-wrap">
          <textarea name="pqContent" id="pqContent" cols="30" rows="10" placeholder="내용을 입력하세요."></textarea>
          <input type="submit" value="문의하기">
        </div>
      </form>
    </div>
  </div>
</div>
<iframe name="iframe1" style="display:none;"></iframe>
<script src='https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
$("input:checkbox[name='JOIN_TYPE']").on("change", function() {
  $("input:checkbox[name='JOIN_TYPE']").prop("checked", false);
  $(this).prop("checked", true);
});
var addr_data = '';

function execDaumPostcode() {
  var type = "<?php echo $type;?>";
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

      document.getElementById('JOIN_ADD01').value = fullRoadAddr;
      document.getElementById('JOIN_ADD02').focus();
      if (type == 'C') {
        addr_data = fullRoadAddr;
        addr_location(addr_data);

        $("#JOIN_AREA_A").val(data.sido);
        $("#JOIN_AREA_B").val(data.sigungu);
        if (data.sido == '세종특별자치시') {
          $("#JOIN_AREA_B").val(data.sido);
        }

        $("#JOIN_AREA_C").val(data.bname);
        $("#JOIN_AREA_B_CODE").val(data.sigunguCode);
        $("#JOIN_AREA_C_CODE").val(data.bcode);

        $("#JOIN_ADDR1_B").val(expJibunAddr);
      }
    }
  }).open();
}
</script>
<script type="text/javascript">
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
var type = "<?php echo $type;?>";
if (type != "B") {
  var cellPhone1 = document.getElementById('JOIN_TEL');
  cellPhone1.onkeyup = function(event) {
    event = event || window.event;
    if (this.value.length > 13) {
      var tel_txt = this.value.slice(0, -1);
      this.value = tel_txt;
    }
    var _val = this.value.trim();
    this.value = autoHypenPhone(_val);
  }
}
var cellPhone2 = document.getElementById('JOIN_HP');
cellPhone2.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

function email_ck() {
  var type = "<?php echo $type;?>";
  var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
  if (!$("#JOIN_EMAIL").val()) {
    alert("이메일/아이디를 입력해주세요");
    $("#JOIN_EMAIL").focus();
    return false;
  } else if (!emailPattern.test($("#JOIN_EMAIL").val())) {
    alert("이메일/아이디를 형식에 맞지 않습니다.");
    $("#JOIN_EMAIL").focus();
    return false;
  }
  var url = "";
  if (type == 'A') {
    url = "/auth/emailCkPro";
  } else if (type == 'B') {
    url = "/auth/emailCkUser";
  } else {
    url = "/auth/emailCkPtn";
  }
  $.ajax({
    type: 'post',
    url: url,
    data: {
      JOIN_EMAIL: $("#JOIN_EMAIL").val()
    },
    success: function(data) {
      console.log(data);
      if (data.indexOf('yes') !== -1) {
        $("#JOIN_EMAIL").attr("readonly", true);
        $("#EMAIL_CK").val("Y");
        alert("사용가능한 아이디 입니다.");
        $("#JOIN_PW1").focus();
      } else {
        $("#EMAIL_CK").val("");
        alert("중복된 아이디가 있습니다.");
      }
    }
  });
}


function submit_ck() {
  var type = "<?php echo $type;?>";
  var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
  var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;
  if (type == 'A') {
    if (!$("#JOIN_EMAIL").val()) {
      alert("이메일/아이디를 입력해주세요");
      $("#JOIN_EMAIL").focus();
      return false;
    } else if (!emailPattern.test($("#JOIN_EMAIL").val())) {
      alert("이메일/아이디를 형식에 맞지 않습니다.");
      $("#JOIN_EMAIL").focus();
      return false;
    } else if ($("#EMAIL_CK").val() != "Y") {
      alert("이메일(아이디)를 중복확인해주세요.");
      $("#EMAIL_CK").focus();
      return false;
    } else if (!$("#JOIN_PW1").val()) {
      alert("비밀번호를 입력해주세요.");
      $("#JOIN_PW1").focus();
      return false;
    } else if (!pwPattern.test($("#JOIN_PW1").val())) {
      alert("비밀번호 형식을 8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.");
      $("#JOIN_PW1").focus();
      return false;
    } else if ($("#JOIN_PW1").val() != $("#JOIN_PW2").val()) {
      alert("비밀번호와 비밀번호확인이 일치 하지 않습니다.");
      $("#JOIN_PW2").focus();
      return false;
    } else if (!$("#JOIN_BUSINESSNAME").val()) {
      alert("중개업소명을 입력해주세요.");
      $("#JOIN_BUSINESSNAME").focus();
      return false;
    } else if (!$("#JOIN_NUMBER").val()) {
      alert("중개등록번호를 입력해주세요.");
      $("#JOIN_NUMBER").focus();
      return false;
    } else if (!$("#JOIN_FILE").val()) {
      alert("중개등록증을 첨부해주세요.");
      $("#JOIN_FILE").focus();
      return false;
    } else if (!$("#JOIN_BUSINESS_NUMBER").val()) {
      alert("사업자등록번호를 입력해주세요.");
      $("#JOIN_BUSINESS_NUMBER").focus();
      return false;
    } else if (!$("#JOIN_FILE1").val()) {
      alert("사업자등록증을 첨부해주세요.");
      $("#JOIN_FILE1").focus();
      return false;
    } else if (!$("#JOIN_ADD01").val()) {
      alert("주소를 입력해주세요.");
      $("#JOIN_ADD01").focus();
      return false;
    } else if (!$("#JOIN_ADD02").val()) {
      alert("상세 주소를 입력해주세요.");
      $("#JOIN_ADD02").focus();
      return false;
    } else if (!$("#JOIN_CEO").val()) {
      alert("대표자명을 입력해주세요.");
      $("#JOIN_CEO").focus();
      return false;
    } else if (!$("#JOIN_TEL").val()) {
      alert("유선전화번호를 입력해주세요.");
      $("#JOIN_TEL").focus();
      return false;
    } else if (!$("#JOIN_HP").val()) {
      alert("휴대폰번호를 입력해주세요.");
      $("#JOIN_HP").focus();
      return false;
    } else if (!$("#JOIN_IMG").val()) {
      alert("대표사진을 첨부해주세요.");
      $("#JOIN_IMG").focus();
      return false;
    } else {
      return true;
    }
  } else if (type == 'B') {
    if (!$("#JOIN_EMAIL").val()) {
      alert("이메일/아이디를 입력해주세요");
      $("#JOIN_EMAIL").focus();
      return false;
    } else if (!emailPattern.test($("#JOIN_EMAIL").val())) {
      alert("이메일/아이디를 형식에 맞지 않습니다.");
      $("#JOIN_EMAIL").focus();
      return false;
    } else if ($("#EMAIL_CK").val() != "Y") {
      alert("이메일(아이디)를 중복확인해주세요.");
      $("#EMAIL_CK").focus();
      return false;
    } else if (!$("#JOIN_PW1").val()) {
      alert("비밀번호를 입력해주세요.");
      $("#JOIN_PW1").focus();
      return false;
    } else if (!pwPattern.test($("#JOIN_PW1").val())) {
      alert("비밀번호 형식을 8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.");
      $("#JOIN_PW1").focus();
      return false;
    } else if ($("#JOIN_PW1").val() != $("#JOIN_PW2").val()) {
      alert("비밀번호와 비밀번호확인이 일치 하지 않습니다.");
      $("#JOIN_PW2").focus();
      return false;
    } else if (!$("#JOIN_ADD01").val()) {
      alert("주소를 입력해주세요.");
      $("#JOIN_ADD01").focus();
      return false;
    } else if (!$("#JOIN_ADD02").val()) {
      alert("상세 주소를 입력해주세요.");
      $("#JOIN_ADD02").focus();
      return false;
    } else if (!$("#JOIN_CEO").val()) {
      alert("이름을 입력해주세요.");
      $("#JOIN_CEO").focus();
      return false;
    } else if (!$("#JOIN_HP").val()) {
      alert("휴대폰번호를 입력해주세요.");
      $("#JOIN_HP").focus();
      return false;
    } else {
      return true;
    }

  } else if (type == 'C') {
    if (!$("#JOIN_EMAIL").val()) {
      alert("이메일/아이디를 입력해주세요");
      $("#JOIN_EMAIL").focus();
      return false;
    } else if (!emailPattern.test($("#JOIN_EMAIL").val())) {
      alert("이메일/아이디를 형식에 맞지 않습니다.");
      $("#JOIN_EMAIL").focus();
      return false;
    } else if ($("#EMAIL_CK").val() != "Y") {
      alert("이메일(아이디)를 중복확인해주세요.");
      $("#EMAIL_CK").focus();
      return false;
    } else if (!$("#JOIN_PW1").val()) {
      alert("비밀번호를 입력해주세요.");
      $("#JOIN_PW1").focus();
      return false;
    } else if (!pwPattern.test($("#JOIN_PW1").val())) {
      alert("비밀번호 형식을 8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.");
      $("#JOIN_PW1").focus();
      return false;
    } else if ($("#JOIN_PW1").val() != $("#JOIN_PW2").val()) {
      alert("비밀번호와 비밀번호확인이 일치 하지 않습니다.");
      $("#JOIN_PW2").focus();
      return false;
    } else if (!$("#JOIN_NUMBER").val()) {
      alert("사업자등록번호를 입력해주세요.");
      $("#JOIN_NUMBER").focus();
      return false;
    } else if (!$("#JOIN_FILE").val()) {
      alert("사업자등록증을 첨부해주세요.");
      $("#JOIN_FILE").focus();
      return false;
    } else if (!$("#JOIN_ADD01").val()) {
      alert("주소를 입력해주세요.");
      $("#JOIN_ADD01").focus();
      return false;
    } else if (!$("#JOIN_ADD02").val()) {
      alert("상세 주소를 입력해주세요.");
      $("#JOIN_ADD02").focus();
      return false;
    } else if (!$("#JOIN_CEO").val()) {
      alert("대표자명을 입력해주세요.");
      $("#JOIN_CEO").focus();
      return false;
    } else if (!$("#JOIN_AREA").val()) {
      alert("지역을 입력해주세요.");
      $("#JOIN_AREA").focus();
      return false;
    } else if (!$("#JOIN_CAREER").val()) {
      alert("경력을 입력해주세요.");
      $("#JOIN_CAREER").focus();
      return false;
    } else if (!$("#JOIN_TEL").val()) {
      alert("유선전화번호를 입력해주세요.");
      $("#JOIN_TEL").focus();
      return false;
    } else if (!$("#JOIN_HP").val()) {
      alert("휴대폰번호를 입력해주세요.");
      $("#JOIN_HP").focus();
      return false;
    } else if ($("input:checkbox[name='JOIN_TYPE']:checked").length == 0) {
      alert("분야를 선택해주세요.");
      $("#JOIN_TYPE01").focus();
      return false;
    } else if (!$("#JOIN_TEXT").val()) {
      alert("파트너사 간략소를 입력해주세요.");
      $("#JOIN_TEXT").focus();
      return false;
    } else if (!$("#JOIN_IMG").val()) {
      alert("대표사진을 첨부해주세요.");
      $("#JOIN_IMG").focus();
      return false;
    } else {
      return true;
    }

  }
}
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
      $("#JOIN_LAT").val(addr_lat);
      $("#JOIN_LON").val(addr_lng);

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
<script>
function busines_search(pageNo) {
  var search_busines = $("#search_busines").val();
  $.ajax({
    type: 'post',
    url: "/VO/businesSearch",
    dataType: "xml",
    data: {
      name: search_busines,
      pageNo: pageNo
    },
    success: function(data, status, xhr) {
      //console.log(data.fields.field);
      var list_num = 8;
      var page_num = 10;
      var offset = list_num * (pageNo - 1);
      var paging = "pageNo=" + pageNo;
      var numOfRows = $(data).find("numOfRows").text();
      var total_no = $(data).find("totalCount").text();
      var total_page = total_no / list_num;
      var total_block = Math.ceil(total_page / page_num);
      var block = Math.ceil(pageNo / page_num); //현재 블록 

      var first = (block - 1) * page_num; // 페이지 블록이 시작하는 첫 페이지 
      var last = block * page_num; //페이지 블록의 끝 페이지 

      if (block >= total_block) {
        last = total_page;
      }

      if (total_no > 0) {
        $(".paginationDiv").empty();
        if (pageNo > 1) {
          var go_page = pageNo - 1;
          $(".paginationDiv").append("<a href=\"javascript:busines_search(" + go_page + ");\">&lt;</a>");
        }
        for (var page_link = first + 1; page_link <= last; page_link++) {
          if (page_link == pageNo) {
            $(".paginationDiv").append("<strong>" + page_link + "</strong>");
          } else {
            $(".paginationDiv").append("<a href=\"javascript:busines_search(" + page_link + ");\">" + page_link +
              "</a>");
          }
        }
        if (total_page > pageNo) {
          go_page = pageNo + 1;
          $(".paginationDiv").append("<a href=\"javascript:busines_search(" + go_page + ");\">&gt;</a>");
        }


        $(".table-lsName").empty();
        $(".result").removeClass("dp-n");
        $(".no-result").addClass("dp-n");
        $(".table-lsName").append("<tr><th>지역</th><th>법인등록번호</th><th>사업자상호</th></tr>");
        $(data).find('field').each(function() {
          var bsnmCmpnm = $(this).find("bsnmCmpnm").text();
          var jurirno = $(this).find("jurirno").text();
          var ldCodeNm = $(this).find("ldCodeNm").text();

          $(".table-lsName").append("<tr onclick=\"businesSelect('" + bsnmCmpnm + "','" + jurirno +
            "');\"><td>" + ldCodeNm + "</td><td>" + jurirno + "</td><td>" + bsnmCmpnm +
            "</td></tr>");
        });
      } else {
        $(".result").addClass("dp-n");
        $(".no-result").removeClass("dp-n");
        $(".table-lsName").empty();
      }

    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("error - " + jqXHR.responseText);

    }
  });
}

function businesSelect(bsnmCmpnm, jurirno) {
  $("#JOIN_CORPORATE").val(jurirno);
  $("#JOIN_BUSINESSNAME").val(bsnmCmpnm);
  $("#search_busines").val("");
  $(".paginationDiv").empty();
  $(".result").addClass("dp-n");
  $(".no-result").removeClass("dp-n");
  $(".table-lsName").empty();
  $(".close-modal").trigger("click");
  $("#JOIN_NUMBER").focus();
}

function pqQna() {
  var pqName = $("#pqName").val();
  var pqTel = $("#pqTel").val();
  var pqEmail = $("#pqEmail").val();
  var pqType = $("#pqType").val();
  var pqContent = $("#pqContent").val();
  $.ajax({
    type: 'post',
    url: "/DAO/pqQna",
    data: {
      pqName: pqName,
      pqTel: pqTel,
      pqEmail: pqEmail,
      pqType: pqType,
      pqContent: pqContent
    },
    success: function(data, status, xhr) {
      if (data == '1') {
        alert("정상적으로 등록 되었습니다.");
        $(".close-modal").trigger("click");
        return true;
      } else {
        alert("정상적으로 등록 되지않았습니다.");
        return false;
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("error - " + jqXHR.responseText);

    }
  });
}
</script>