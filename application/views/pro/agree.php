<link rel="stylesheet" href="/css/pro/login.css?v=<?php echo time(); ?>">
<script src="js/login.js?v=<?php echo time(); ?>"></script>
<?php

$mid = 'mydangkr99';                            // 테스트 MID 입니다. 계약한 상점 MID 로 변경 필요
$apiKey = 'bd17d88e8eac1ed9476ed33e02ec1209';   // 테스트 MID 에 대한 apiKey
$mTxId = 'Mydang_' . date("Ymd");
$reqSvcCd = '01';
// 등록가맹점 확인
$plainText1 = hash("sha256", (string)$mid . (string)$mTxId . (string)$apiKey);
$authHash = $plainText1;
$flgFixedUser = 'N';           // 특정사용자 고정시 Y
?>
<script language="javascript">
  function callSa() {
    var type = "<?php echo $type; ?>";
    if (!$('#agree1').is(':checked')) {
      alert("이용약관에 동의하셔야합니다.");
      $('#agree1').focus();
      return false;
    } else if (!$('#agree3').is(':checked')) {
      alert("개인정보취급방침에 동의하셔야합니다.");
      $('#agree3').focus();
      return false;
    } else if (!$('#agree2').is(':checked')) {
      alert("위치기반 서비스 이용약관에 동의하셔야합니다.");
      $('#agree2').focus();
      return false;
    } else if (!$('#agree4').is(':checked') && (type == 'A' || type == 'C')) {
      alert("공인중개사 및 파트너 회원 서비스 이용약관 동의하셔야합니다.");
      $('#agree4').focus();
      return false;
    } else {
      let window = popupCenter();
      if (window != undefined && window != null) {
        document.agree_form.setAttribute("target", "sa_popup");
        document.agree_form.setAttribute("post", "post");
        document.agree_form.setAttribute("action", "https://sa.inicis.com/auth");
        document.agree_form.submit();
      }
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
<main id="container" class="join agree">
  <div class="container-inner">
    <div class="content">
      <div class="content-inner">
        <div class="title">
          <h2><?php if ($type == 'A') { ?>중개인<?php } else if ($type == 'B') { ?>일반<?php } else if ($type == 'C') { ?>파트너<?php } ?> 회원가입
          </h2>
        </div>
        <ul class="step-wrap">
          <li class="on">
            <p class="num">01</p>
            <p>약관동의</p>
          </li>
          <li><img src="/icon/pro/arrow02.png" alt="화살표아이콘"> </li>
          <li>
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
          <form id="agree_form" name="agree_form">
            <input type="hidden" name="type" id="type" value="<?php echo $type; ?>" />
            <input type="hidden" name="mid" value="<?php echo $mid ?>">
            <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
            <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
            <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
            <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">

            <input type="hidden" name="successUrl" value="https://mydang.kr/pro/certif?type=<? echo $type; ?>">
            <input type="hidden" name="failUrl" value="https://mydang.kr/pro/agree?type=<? echo $type; ?>">
            <!-- 홈페이지 이용약관 동의 -->
            <div class="sub-title">
              <h4><img src="../../../icon/square.png" alt="약관동의아이콘"> 약관동의</h4>
              <p>- 회원가입시 '이용약관', ‘개인정보취급방침’, '개인정보 수집이용' 에 대한 동의가 필요합니다.</p>
            </div>
            <div class="agree-wrap">
              <? if ($type == 'A') { // 중개인
              ?>
                <!-- 이용약관 -->
                <div class="agree_box">
                  <h3>이용약관</h3>
                  <!-- textbox -->
                  <div class="text_box box1">
                    <div id="policy01" class="sg-main">
                      <section class="sg-main__title">
                        <h1>이용약관</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <h1>제 1장 총칙</h1>
                        <h2>제 1조 목적</h2>
                        <p>
                          이 약관은 (주)디노랩스(이하 "회사"라 한다)이 운영하는 인터넷 사이트 및 모바일 어플리케이션(이하 "명당"라 한다)
                          에서 제공하는 제반 서비스의 이용과 관련하여 "회사"와 "이용자"의 권리, 의무 및 책임 사항, 기타 필요한 사항을
                          규정함을 목적으로 합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 2조 정의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              명당: "회사"가 컴퓨터 등 정보통신설비를 이용하여 서비스를 제공할 수 있도록 설정한 가상의 영업장을 말하며,
                              아울러 인터넷 사이트 및 모바일 애플리케이션을 운영하는 사업자의 의미로도 사용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              이용자: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사 회원"
                              또는 "비즈니스 회원" 또는 "비회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              회원: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사
                              회원", "비즈니스 회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              개인 사용자 회원: 회사가 정한 소정의 절차를 거쳐 회사에 개인정보를 제공하여 회원 가입을 한 자로서, "명당"
                              의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 "명당"의 서비스를 계속적으로 이용할 수 있는 자를 말
                              합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사 내부 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              공인중개사 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 부동산 중개업자로서 "명당"에 매물을 제
                              공할 수 있는 권한을 가진 자를 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              비즈니스 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 공유오피스 담당자와 법인 담당자로서 "명당"에
                              매물을 제공할 수 있는 권한을 가진 자를 말합니다. 단, 공유오피스 담당자로서 비즈니스 회원의 권한은 공유오피스
                              서비스에 한정합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">비회원: 회원으로 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              아이디(ID): 회원의 식별과 서비스 이용을 위하여 회원이 설정하고 회사가 승인한 이메일주소 또는 문자나 숫
                              자의 조합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              비밀번호: 회원의 동일성 확인과 회원정보의 보호를 위하여 회원이 설정하고 회사가 승인한 문자나 숫자의 조
                              합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              게시판: 그 명칭, 형태, 위치와 관계없이 회원 및 비회원 이용자에게 공개할 목적으로 부호•문자•음성•음향
                              •화상•동영상 등의 정보 (이하 "게시물"이라 합니다)를 회원이 게재할 수 있도록 회사가 제공하는 서비스 상
                              의 가상공간을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">컨텐츠: "회원"이 게재한 모든 글, 사진, 동영상, 회원소개 등을 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">12.</span>
                            <span class="sg-text">
                              매물관리규정: "회사"가 별도로 규정하여 공개한 부동산 매물 등록 시 회원의 준수사항 및 위반 시 제재 규정을
                              의미합니다.
                            </span>
                          </li>
                        </ol>
                        <p>위 항에서 정의되지 않은 이 약관상의 용어의 의미는 일반적인 거래 관행에 의합니다.</p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 3조 약관 등의 명시와 설명 및 개정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 본 약관의 내용을 이용자가 쉽게 알 수 있도록 "명당"의 인터넷 사이트 및 모바일 애플리케이션에 게
                              시합니다. 다만, 약관의 내용은 이용자가 연결 화면을 통하여 볼 수 있도록 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "약관 규제에 관한 법률", "정보통신망 이용촉진 및 정보보호 등에 관한 법률" 등 관련법을 위배하지
                              않는 범위에서 본 약관을 개정할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 약관을 개정할 경우에는 적용 일자 및 개정 사유를 명시하여 이용자가 알기 쉽도록 표시하여 공지합
                              니다. 변경된 약관은 공지된 시점부터 그 효력이 발생하며, 이용자는 약관이 변경된 후에도 본 서비스를 계속
                              이용함으로써 변경 후의 약관에 대해 동의를 한 것으로 간주됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 4조 약관의 해석</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 서비스운영을 위해 별도의 운영정책을 마련하여 운영할 수 있으며, "회사"는 "명당" 인터넷 사이트 및
                              모바일 애플리케이션에 운영정책을 사전 공지 후 적용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">본 약관에서 정하지 아니한 사항이나 해석에 대해서는 별도의 운영정책, 관계법령 또는 상관례에 따릅니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 5조 서비스의 제공 및 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 다음과 같은 서비스를 제공합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">부동산 매물 등에 관한 정보 제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">부동산 매물 등록 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">부동산 매물 매출 관련 서비스 제공</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">부동산 중개업소 추천 등 기타 관련 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">공유사무실 등에 관한 정보제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">기타 "명당"의 이용자를 위하여 제공하는 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">유료로 제공하는 광고 상품 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">유료로 제공하는 부가 서비스</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스는 원칙적으로 상품 중도 변경, 일시중지, 양도양수가 불가합니다. 단, 이용자의 귀책사유가 아님을 증명 할 수 있을 경우 예외적으로 처리될
                              수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스의 내용을 기술적 사양의 변경 등의 이유로 변경할 경우에는 그 사유를
                              이용자에게 통지 하거나, 이용자가 알아볼 수 있도록 공지사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 6조 서비스의 중단</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 컴퓨터 등 정보 통신 설비의 보수 점검, 교체 및 고장, 통신의 두절, 천재지변 등의 사유가 발생한 경우
                              에는 서비스의 제공을 제한하거나 일시적으로 중단할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              사업종목의 전환, 사업의 포기, 업체 간의 통합 등의 이유로 서비스를 제공할 수 없게 되는 경우에는 회사는 이
                              용자에게 통지하거나 이용자가 알아볼 수 있도록 공지 사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 7조 회원에 대한 통지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 이메일, 이동전화 단문메시지서비스(SMS), 푸시알림(App push)등으로 회원에게 통지할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 불특정다수 회원에 대한 통지의 경우 공지사항으로 게시함으로써 개별 통지에 갈음 할 수 있습니다. 다
                              만, 회원 본인의 거래와 관련하여 중대한 영향을 미치는 사항에 대하여는 개별통지를 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 2장 이용계약 및 정보보호</h1>
                        <h2>제 8조 회원가입 및 회원정보의 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 회사가 정한 가입 양식에 따라 회원 정보를 기입한 후 이 약관에 동의한다는 의사표시를 함으로서
                              회원 가입을 신청합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 제1항과 같이 회원으로 가입할 것을 신청한 이용자 중 다음 각 호에 해당하지 않는 한 "개인 사용자 회
                              원" 또는 "공인중개사 회원", "비즈니스 회원"으로 등록합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">등록 내용에 허위, 기재누락, 오기가 있는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    가입 신청자가 이전에 회원 자격을 상실한 적이 있는 경우(다만 회원 자격 상실 후 회사가 필요하다고 판단하
                                    여 회원 재가입에 대한 승낙을 얻은 경우에는 예외로 합니다.)
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회사"로부터 회원 자격 정지 조치 등을 받은 회원이 그 조치 기간 중에 이용 계약을 임의 해지하고 재가입 신
                                    청을 하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">기타 회원으로 등록하는 것이 "명당"의 기술상 현저히 지장이 있다고 판단되는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">
                                    본 약관에 위배되거나 위법 또는 부당한 이용신청임이 확인된 경우 및 회사가 합리적인 판단에 의하여 필요하
                                    다고 인정하는 경우
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">회원 가입 계약의 성립 시기는 "회사"의 승낙이 "회원"에게 도달한 시점으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"은 회원 가입 신청 및 이용시 기재한 사항이 변경되었을 경우 온라인으로 수정을 하거나 전자우편 기타 방법으로 회사에 그 변경사항을 알려야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">제4항의 변경 사항을 "회사"에 알리지 않아 발생한 불이익에 대하여 회사는 책임지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              회원 가입은 반드시 본인의 진정한 정보를 통하여 가입할 수 있으며 "회사"는 "회원"이 등록한 정보에 대하여 확
                              인 조치를 할 수 있습니다. "회원"은 "회사"의 확인 조치에 대하여 적극 협력하여야 하며, 만일 이를 준수하지 아니
                              할 경우 "회사"는 등록한 정보가 부정한 것으로 간주하여 처리할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사"는 "회원"을 등급 별로 구분하여 이용시간, 이용회수, 서비스 메뉴, 매물 등록 건 수 등을 세분하여 서비스
                              이용에 차등을 둘 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회원"은 1인 1계정에 한하여 서비스 이용이 가능하며, 중복 가입 시 서비스 이용이 불가할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 9조 이용 계약의 종료</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              회원의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회원"은 회사에 언제든지 해지 의사를 통지할 수 있고 회사는 특별한 사유가 없는 한 이를 즉시 수락하여야 합
                                    니다. 다만, "회원"은 해지의사를 통지하기 전에 모든 진행중인 절차를 완료, 철회 또는 취소해야만 합니다. 이 경우
                                    철회 또는 취소로 인한 불이익은 회원 본인이 부담하여야 합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회원"이 발한 의사표시로 인해 발생한 불이익에 대한 책임은 회원 본인이 부담하여야 하며, 이용계약이 종료되
                                    면 "회사"는 "회원"에게 부가적으로 제공한 각종 혜택을 회수할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회원"의 의사로 이용계약을 해지한 후, 추후 재이용을 희망할 경우에는 재이용 의사가 "회사"에 통지되고, 이에
                                    대한 "회사"의 승낙이 있는 경우에만 서비스 재이용이 가능합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에 따라 해지를 한 "회원"은 이 약관이 정하는 회원가입절차와 관련조항에 따라 신규 회원으로 다시 가입
                                    할 수 있습니다. 다만, "회원"이 중복참여가 제한된 이벤트 중복 참여 등 부정한 목적으로 회원탈퇴 후 재이용을 신
                                    청하는 경우 "회사"는 가입을 일정기간 동안 제한할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">본 항에 따라 해지를 한 이후에는 재가입이 불가능하며, 모든 가입은 신규가입으로 처리됩니다.</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              회사의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회사"는 다음과 같은 사유가 발생하거나 확인된 경우 이용계약을 해지할 수 있습니다.
                                    <ol>
                                      <li>
                                        <span class="listNum">(1)</span>
                                        <span class="sg-text">
                                          다른 회원의 권리나 명예, 신용 기타 정당한 이익을 침해하거나 대한민국 법령 또는 공서양속에 위배되는 행위
                                          를 한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(2)</span>
                                        <span class="sg-text">
                                          "회사"가 제공하는 서비스의 원활한 진행을 방해하는 행위를 하거나 시도한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(3)</span>
                                        <span class="sg-text">제 8조 제 2항의 승낙거부 사유가 추후 발견된 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(4)</span>
                                        <span class="sg-text">"회사"가 정한 서비스 운영정책을 이행하지 않거나 위반한 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(5)</span>
                                        <span class="sg-text">기타 "회사"가 합리적인 판단에 기하여 서비스의 제공을 거부할 필요가 있다고 인정할 경우</span>
                                      </li>
                                    </ol>
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 해지를 하는 경우 "회사"는 "회원"에게 이메일, 전화, 기타의 방법을 통하여 해지 사유를 밝혀 해지 의
                                    사를 통지합니다. 이용계약은 "회사"의 해지의사를 "회원"에게 통지한 시점에 종료됩니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료될 시에는 "회사"는 "회원"에게 부가적으로 제공한 각종혜택을 회수
                                    할 수 있습니다. 이용계약의 종료와 관련하여 발생한 손해는 이용계약이 종료된 해당 회원이 책임을 부담하여야 하
                                    고, "회사"는 일체의 책임을 지지 않습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료된 경우에는, "회원"의 재이용 신청에 대하여 "회사"는 이에 대한 승
                                    낙을 거절할 수 있습니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              이용계약의 종료시, 제공된 서비스에 대한 환불은 본 규정 제15조에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 계약을 해지하는 경우, 관련법 및 "개인정보취급방침"에 따라 "회사"가 회원정보를 보유하는 경우를 제외하고는 해지 즉시 "회원"의 모든 데이터는
                              소멸됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 10조 개인정보보호</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 회원가입시 서비스 제공에 필요한 최소한의 정보를 수집합니다. 다음 사항을 필수사항으
                              로 하며 그 외 사항은 선택사항으로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이메일주소</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">비밀번호</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">휴대폰 번호(부동산 매물등록 서비스, 공유사무실 등록서비스 및 신고기능을 이용하는 회원인 경우)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"가 "이용자"의 개인식별이 가능한 개인정보를 수집하는 때에는 반드시 당해 이용자의 동의를 받습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              제공된 개인정보는 당해 이용자의 동의 없이 목적 외의 이용이나 제3자에게 제공하지 않습니다. 다만, 다음의
                              경우에는 예외로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">도용방지를 위하여 본인확인에 필요한 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">법률의 규정 또는 법률에 의하여 필요한 불가피한 사유가 있는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회사"가 제2항과 제3항에 의해 "이용자"의 동의를 받아야 하는 경우에는 개인정보관리 책임자의 신원(소속,
                              성명 및 전화번호, 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에 대한 정보제공 관련사항(제공받은 자,
                              제공목적 및 제공할 정보의 내용) 등 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 제22조 제2항이 규정
                              한 사항을 미리 명시하거나 고지해야 하며 이용자는 언제든지 이 동의를 철회할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 개인정보를 보호하기 위해 "개인정보취급방침"을 수립하고 개인정보보호책임자를 지정하
                              여 이를 게시하고 운영합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "이용자"는 언제든지 "회사"가 갖고 있는 자신의 개인정보에 대해 열람 및 오류정정을 요구할 수 있으며 "회사"
                              는 이에 대해 지체 없이 필요한 조치를 취할 의무를 집니다. 이용자가 오류의 정정을 요구한 경우에 "회사"는
                              그 오류를 정정할 때까지 당해 개인정보를 이용하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사" 또는 그로부터 개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받은 목적을 달성한 때에는 당해 개인정보를 지체 없이 파기합니다. 다만, 아래의
                              경우에는 회원 정보를
                              보관합니다. 이 경우 회사는 보 관하고 있는 회원 정보를 그 보관의 목적으로만 이용합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우 "회사"는 관계법령에서 정한 일정한 기간 동안 회원
                                    정보를
                                    보관합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 이용계약을 해지하거나 "회사"로부터 서비스 이용정지조치를 받은 회원에 대해서는 재가입에 대한 승낙거부사유가 존재하는지 여부를 확인하기 위한
                                    목적으로 이용계약종료
                                    후 5년간 성명, 이메일주소, 전화번호를 비롯하여 이용계약 해지와 서비스 이용정지와 관련된 정보 등의 필요정보를 보관합니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회사"는 새로운 업체가 제휴사 또는 제휴영업점의 지위를 취득할 경우 제7조 2항에서 정한 것과 같은 방법을
                              통하여 공지합니다. 이 때 회원이 별도의 이의제기를 하지 않을 경우 "명당" 서비스 제공이라는 필수적인 목적
                              을 위해 해당 개인 정보 제공 및 활용에 동의한 것으로 간주 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              모든 "이용자"는 "명당"로부터 제공받은 정보를 다른 목적으로 이용하거나 타인에게 유출 또는 제공해서는 안
                              되며, 위반 사용으로 인한 모든 책임을 부담해야 합니다. 또한 "회원"은 자신의 개인정보를 책임 있게 관리하여
                              타인이 회원의 개인정보를 부정하게 이용하지 않도록 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              "회사"는 "회원"의 개인정보를 보호하기 위해 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 상의 개인정
                              보 유효기간제도에 따라 1년간 미접속한 회원의 개인정보를 파기 또는 분리하여 별도로 저장/관리하며(휴면계
                              정), "회원"의 별도의 요청이 없는 한 사용이 제한됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">
                              회사”는 등기변동 알림서비스를 신청한 “회원”에게 그와 관련된 비광고성 정보를 카카오톡 알림톡으로 통지
                              할 수 있으며, 만약 알림톡 수신이 불가능하거나 해당 회원이 수신 차단한 경우에는 일반 문자 메시지로 통지할
                              수 있습니다. 다만, 와이파이 아닌 이동통신망으로 접속시 알림톡 수신 중 데이터요금이 발생할 수 있습니다.
                              회원”이 알림톡과는 다른 방식으로 정보 수신을 원하시면 알림톡을 차단할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 3장 서비스의 이용</h1>
                        <h2>제 11조 부동산 매물 및 공유사무실 등에 관한 정보제공 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 및 공유사무실 등에 관한 정보제공 서비스는 "회사"가 이용자 스스로 해당 정보를 확인 및 이용할
                              수 있도록 관련 정보를 제공하는 것입니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 “명당” 인터넷 사이트 및 모바일 애플리케이션
                              내에서 제공하는 모든 정보에 대해서 정확성이나 신뢰성이
                              있는 정보를 제공하기 위해 노력하며, 신고받은 허위매물 정
                              보의 삭제 조치를 하는 등의 서비스 관리자로서의 책임을 부
                              담합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 "명당" 인터넷 사이트 및 모바일 애플리케이션을 통해 제공되는 정보의 내용을 수정할 의무를 지지
                              않으나, 필요에 따라 개선할 수는 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 12조 부동산 매물 및 공유사무실 등록 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 등록 및 공유사무실 등록 서비스는 "회원"이 매물정보(부동산 거래정보 및 거래 물건에 대한 다양
                              한 부가정보)와 회원 연락처(회원의 이메일 주소 및 휴대폰 번호), 공유사무실 정보(공유사무실 정보 및 다양한
                              부가정보)와 회원 연락처(회원의 이메일 주소 및 전화번호)를 직접 "명당" 인터넷 사이트 및 모바일 애플리케
                              이션에 등록하여 이용자에게 노출할 수 있는 것을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실의 노출순
                              서 및 영역의 추가 등에 대한 결정 권한을 갖고 있습니다. 또
                              한, “회사”는 사전에 회원의 개별 동의를 구한 경우 “회원”의
                              매물정보 및 공유사무실 정보 등을 “명당” 인터넷 사이트 및
                              모바일 애플리케이션 이외의 다른 인터넷 사이트 등에 노출
                              할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실 정보에 대
                              해 등록 후 최대 7일 이내에 진위 여부를 확인하며, 진위 여
                              부 확인 즉시 해당 매물 및 공유사무실을 노출합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 등록한 정보가 실제 정보와 불일치 하는 경우 "회사"는 "회원"이 가입시 제공한 전화번호 또는 이메일
                              을 통해 "회원"에게 매물정보의 수정을 요청합니다. "회사"가 "회원"이 제공한 연락수단으로 2회 이상 연락하
                              였음에도 불구하고 연락이 되지 않을 경우의 책임은 "회원"에게 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              전항에 따른 "회사"의 정당한 정보 수정 요청에도 불구하고 "회원"이 24시간 이내에 정보(거래완료 혹은 노출
                              종료와 같은 매물상태 변경 포함)를 수정하지 않을 경우, 회사는 해당 매물 및 공유사무실 정보의 노출을 중지
                              하고 "회원"의 서비스 이용을 제한 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "회사"는 "명당"에 등록된 매물 및 공유사무실 중 사회통념, 관례 및 회사의 합리적인 판단에 의하여 거래가 부
                              적합하다고 판단되는 경우 이의 삭제를 요청하거나 직권으로 삭제할 수 있으며 해당 회원의 서비스 이용을 정
                              지 혹은 탈퇴시킬 수 있습니다. "명당"에 거래부적합 부동산 매물 및 공유사무실을 등록할 경우, 거래부적합 매
                              물에 대한 법적인 책임은 해당 등록자에게 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 13조 부동산 중개업소 및 공유사무실 추천 등 기타 관련 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 편의를 위해 부동산 중개업소와 공유사무실을 "이용자"에게 추천할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 회사는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모든
                              직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 14조 정보의 제공 및 광고의 게재</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스 이용 중 필요하다고 인정되는 다양한 정보를 서비스 내 공지사항, 서비스 화면, 전자
                              우편 등의 방법으로 "회원"에게 제공 할 수 있습니다. 다만, "회원"은 관련법에 따른 거래 관련 정보 및 고객문
                              의 등에 대한 답변 등을 제외하고는 언제든지 위 정보 제공에 대하여 수신 거절을 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 서비스 운영과 관련하여 회사가 제공하는 서비스의 화면 및 홈페이지 등에 광고를 게재할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 15조 환불 규정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회원"이 계약 상품 개시 후 환불 요청시 개시일로부터 경과기간에 해당하는 상품 원가 금액과 총 결제금액의 10% 위약금을 공제 한 후 그 나머지를 환급합니다.
                              "공인중개사 회원"이
                              중개업을 폐업 신고한 후 환불 요청하는 경우도 같습니다. 단, 상품 계약일로부터 7일 이내 청약철회 요청 시 위약금 없이 상품 개시일로부터 경과기간에 해당하는 상품
                              원가 금액만
                              공제하고 그 나머지를 환급합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              신용카드로 결제한 "회원"이 카드 승인일로부터 365일이내에 환불을 요청할 경우 환불금액이 부분취소처리 됩니다. 단, 그 외의 경우에는 기존에 결제하였던 내역을 전액
                              취소하며 취소
                              시점에 따라 1항에 의거한 환불공제 금액을 재승인 합니다. 이 경우 구매 취소 시점과 해당 카드사의 환불 처리기준에 따라 취소금액의 환급 방법과 환급일은 다소 차이가
                              있을 수 있으며,
                              사용한 신용카드의 환불 정책은 해당 카드사 정책에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 타인의 신용카드 또는 휴대전화번호를 도용하여 부당한 이익을 편취하였다고 볼 수 있는 합리적 사유가 있는 경우 "회사"는 "회원"에게 소명 자료를 요청하고
                              환불을 보류할 수
                              있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"의 개인정보도용 및 결제사기로 인한 환불요청 또는 결제자의 개인정보 요구는 법률이 정한 경우 외에는 거절될 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              위약금과 사용일수 금액의 총합이 결제한 금액보다 클 경우 환불이 불가합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              본 약관에서 정하지 않은 환불에 관한 사항은 전자상거래 등에서의 소비자보호에 관한 법률 등 관련 법령, 지침 또는 상관례에 의합니다.
                            </span>
                          </li>
                        </ol>
                      </section>

                      <section class="sg-agent">
                        <h1>제 4장 책임</h1>
                        <h2>제 16조 회사의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 법령과 이 약관이 금지하거나 공서양속에 반하는 행위를 하지 않으며 이 약관이 정하는 바에 따라 지
                              속적이고, 안정적으로 이용자에게 서비스를 제공하는데 최선을 다하여야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호간의 거래에 있어서 어떠한 보증도 제공하지 않습니다. 이용자 상호간 거래 행위에서 발
                              생하는 문제 및 손실에 대해서 회사는 일체의 책임을 부담하지 않으며, 거래 당사자 간에 직접 해결해야 합니
                              다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 17조 회원의 아이디(ID) 및 비밀번호에 대한 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"아이디(ID)"와 "비밀번호"에 관한 관리책임은 "회원"에게 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회원"은 자신의 "아이디(ID)" 및 "비밀번호"를 제3자에게 이용하게 해서는 안됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 자신의 "아이디(ID)" 및 "비밀번호"를 도난 당하거나 제3자가 사용하고 있음을 인지한 경우에는 바로
                              "회사"에 통보하고 "회사"의 안내가 있는 경우에는 그에 따라야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 18조 이용자의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 다음 행위를 하여서는 안됩니다. 만약 다음 각 호와 같은 행위가 확인되면 회사는 해당 "이용자"에
                              게 서비스 이용에 대한 제재를 가할 수 있으며 민형사상의 책임을 물을 수 있습니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">회사 서비스의 운영을 고의 및 과실로 방해하는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">신청 또는 변경 시 허위 내용의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">타인의 정보 도용</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">허위 매물 정보의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">"회사"가 정한 정보 이외의 정보(컴퓨터 프로그램 등) 등의 송신 또는 게시</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 저작권 등 지적재산권에 대한 침해</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 명예를 손상시키거나 업무를 방해하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">외설 또는 폭력적인 메시지, 화상, 음성, 기타 공서양속에 반하는 정보를 공개 또는 게시하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">9)</span>
                                  <span class="sg-text">이용자의 연락처 또는 개인정보를 다른 용도로 사용</span>
                                </li>
                                <li>
                                  <span class="listNum">10)</span>
                                  <span class="sg-text">사기 및 악성 글 등록 등 건전한 거래 문화 활성에 방해되는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">11)</span>
                                  <span class="sg-text">기타 중대한 사유로 인하여 회사가 서비스 제공을 지속하는 것이 부적당하다고 인정하는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 전항의 규정 된 위반 행위를 하는 회원에 대해
                              서비스 일시 중단 등의 조치를 취할 수 있으며, 필요한 경우
                              이에 대한 시정을 요구할 수 있습니다. 특히, 회원이 시정을
                              요구받은 기간 내에 시정을 하지 아니한 경우, 동일한 위반
                              행위를 반복할 경우 또는 다수의 위반 행위가 확인 된 경우
                              에 회사는 회원과의 서비스 이용계약을 해지 할 수 있습니다.
                              단, 이 경우 회사는 회원에게 전화, E-mail, SMS 등의 방법
                              으로 개별 통지합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 회사의 정책에 따라서 회원 간의 차별화된 유료 서비스를 언제든지 제공할 수 있습니다. 만약 회원이
                              비용을 지불하지 않고 사용을 할 경우 "회사"는 특정 회원에게 서비스 중지 및 특정 서비스 제한을 할 수 있습
                              니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 19조 권리의 귀속 및 이용제한</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회원"이 "명당"를 이용하여 작성한 저작물에 대한 저작권 기타 지적 재산권은 "회원"에 귀속합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"은 "회사"에 제공한 콘텐츠에 대하여 “회사”가 다음과 같은 목적과 권한으로 이용하는 것을 허락합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이용 목적 : 회사 서비스 운영 전반, 회사 서비스의 온/오프라인 광고, 회사 서비스 고도화 및 기획, 운영 등을 위한
                                    빅데이터
                                    수집</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">이용 권한 : 회사 서비스 및 회사와 제휴된 서비스에 노출할 수 있고, 해당 노출을 위해 필요한 범위 내에서 일부
                                    이용, 편집 형식의
                                    변경 및 기타 변형하여 이용할 수 있습니다. (사용, 저장, 수정, 복제, 공중송신, 전시, 공표, 공연, 전송, 배포, 방송, 2차적 저작물 작성 등
                                    어떠한 형태로든 이용
                                    가능하며, 이용기간과 지역에는 제한이 없음)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회원"은 본조 2항의 콘텐츠 이용 허락에 대한 권리를 보유해야 합니다. 이에 반하여 발생하는 모든 문제에 대해서는 “회원”이
                              책임을 부담하게
                              됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">"회원"이 작성한 콘텐츠는 제3자의 권리를 침해해서는 아니됩니다. 관련 법령에 위반되는 내용을 포함하는 경우 그로 인한 책임은
                              “회원”이 부담하게
                              되며, 관련 법령이 정한 절차에 따라 게시가 제한될 수 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">서비스에 대한 저작권 및 지적재산권은 “회사”에 귀속됩니다. 단, 회원이 직접 작성한 "콘텐츠" 및 제휴 계약에 따라 제공된
                              저작물 등은
                              제외합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">"이용자"는 서비스를 이용함으로써 얻은 정보 중 "회사"에게 지적 재산권이 귀속된 정보를 회사의 사전 승낙 없이 복제, 송신,
                              출판, 배포, 방송
                              기타 방법에 의하여 영리 목적으로 이용하거나 제3자에게 이용하게 하여서는 안됩니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 20조 책임의 한계 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 무료로 제공하는 정보 및 서비스에 관하여 "개인정보취급방침" 또는 관계 법령의 벌칙, 과태료 규정
                              등 강행 규정에 위배되지 않는 한 원칙적으로 손해를 배상 할 책임이 없습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 천재지변, 불가항력, 서비스용 설비의 보수, 교
                              체, 점검, 공사 등 기타 이에 준하는 사항으로 정보 및 서비
                              스를 제공 할 수 없는 경우에 회사의 고의 또는 과실이 없는
                              한 이에 대한 책임이 면제 됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회사"는 "이용자"의 귀책사유로 인한 정보 및 서비스 이용의 장애에 관한 책임을 지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              “회사”는 “회원”이 게재한 정보, 자료, 사실의 신뢰도, 정
                              확성 등의 내용에 관하여 회사의 고의 또는 중대한 과실이
                              없는 한 책임을 지지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "서비스"에서 제공하는 정보에 대한 신뢰 여부는 전적으로 "이용자" 본인의 책임이며, "회사"는 매물 및 공유사
                              무실 정보를 등록한 "회원"에 의한 사기, 연락 불능 등으로 인하여 발생하는 어떠한 직접, 간접, 부수적, 파생적,
                              징벌적 손해, 손실, 상해 등에 대하여 도덕적, 법적 책임을 부담하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "서비스"를 통하여 노출, 배포, 전송되는 정보를 "이용자"가 이용하여 발생하는 부동산 거래 등에 대하여 "회사"
                              는 어떠한 도덕적, 법적 책임이나 의무도 부담하지 아니합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 "회사"는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모
                              든 직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 21조 손해배상 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스를 이용함에 있어 "회사"의 고의 또는 과실로 인해 손해가 발생한 경우에는 민법 등
                              관련 법령이 규율하는 범위 내에서 그 손해를 배상합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"이 이 약관을 위반하거나 관계 법령을 위반하여 "회사"에 손해가 발생한 경우에는 "회사"에 그 손해를 배
                              상하여야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 22조 분쟁해결</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호 간 분쟁에서 발생하는 문제에 대해서 일체의 책임을 지지 않습니다. "이용자" 상호 간
                              분쟁은 당사자들이 직접 해결을 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자" 상호간에 서비스 이용과 관련하여 발생한 분쟁에 대해 "이용자"의 피해 구제 신청이 있는 경우에는
                              공정 거래 위원회 또는 시, 도지사가 의뢰하는 분쟁 조정 기관의 조정에 따를 수 있습니다.
                            </span>
                          </li>
                        </ol>


                      </section>
                      <section class="sg-agent">
                        <h2>제 23조 재판권 및 준거법</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회사"와 "회원"간 제기된 소송은 대한민국법을 준거법으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"와 "회원"간 발생한 분쟁에 관한 소송은 민사소송법 상의 관할법원에 제소합니다.</span>
                          </li>
                        </ol>
                        <p>본 약관은 2021년 12월 31일부터 적용 합니다.</p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input type="checkbox" id="agree1" class="check_box" name="agree">
                    <label for="agree1">이용약관에 동의합니다</label>
                  </div>
                </div>
                <!-- 개인정보 수집 및 이용동의 -->
                <div class="agree_box">
                  <h3>개인정보 수집 및 이용</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div id="policy04" class="sg-main">
                      <section class="sg-main__title">
                        <h1>개인정보 수집 및 이용 동의</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <p>
                          (주)디노랩스는 서비스 제공을 위하여 아래와 같이 개인정보를 수집 및 이용합니다.
                        </p>
                        <br>
                        <p>
                          정보주체는 본 개인정보의 수집 및 이용에 관한 동의를 거부하실 권리가 있으나, 서비스 제공에 필요한 최소한의 개인정보이므로 동의를 해 주셔야 서비스를 이용하실 수 있습니다.
                        </p>
                        <br>
                        <p>
                          보다 자세한 내용은 회사의 개인정보처리방침을 참조하여 주시기 바랍니다.
                        </p>
                        <br>
                        <p>
                          제공해주시는 개인정보는 '상담 안내를 요청하기 위한 용도'의 서비스 제공 목적으로 수집하며 이외 목적으로는 사용되지 않습니다.
                        </p>
                        <br>
                        <h2>개인정보의 수집 이용 목적</h2>
                        <p>
                          서비스 제공 및 상담, 부정이용 확인 및 방지, 만족도 조사 (고객안심콜 등), 본인·연령확인, 신규서비스 개발, 문의사항 또는 불만·분쟁처리, 맞춤형 서비스 제공, 서비스
                          개선에 활용,
                          계정도용 및 부정거래 방지.
                        </p>
                        <br>
                        <h2>수집하는 개인정보의 항목</h2>
                        <p>
                          연락처 (휴대폰 번호 또는 전화번호)
                        </p>
                        <br>
                        <h2>개인정보의 이용 및 보유기간</h2>
                        <p>
                          서비스 제공 목적 달성 시까지 또는 회원탈퇴 시 즉시 삭제.<br>
                          단, 전자상거래 등에서의 소비자 보호에 관한 법률 및 관계 법령에 따른 보관 의무가 있을 경우 해당 기간 동안 보관함.
                        </p>
                        <br>
                        <p>
                          본 서비스 이용을 위해서 필수적인 동의이므로, 동의를 하지 않으면 해당 서비스를 이용하실 수 없습니다. 동의를 거부하는 경우에도 다른 (주)디노랩스의 서비스의 이용에는
                          영향이 없습니다.
                        </p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input class="check_box" id="agree3" name="agree" type="checkbox">
                    <label for="agree3"> 개인정보 수집 및 이용에 동의합니다</label>
                  </div>
                </div>
                <!-- 위치기반서비스 이용약관 -->
                <div class="agree_box">
                  <h3>위치기반서비스 이용약관</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div id="policy03" class="sg-main">
                      <section class="sg-main__title">
                        <h1>위치기반서비스 이용약관</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <h2>제 1조 목적</h2>
                        <p>
                          이 약관은 (주)디노랩스(이하 "회사"라 한다)이 운영하는 인터넷 사이트 및 모바일 어플리케이션(이하 "명당"라 한다)
                          을 이용하는 고객 사이의 서비스 이용에 관해 필요한 사항을 규정함을 목적으로 합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 2조 정의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">명당: "회사"가 제공하는 위치기반서비스입니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              회사가 제공하는 서비스는 다음과 같습니다.<br>
                              1) 부동산 매물 등에 관한 정보제공 서비스<br>
                              2) 부동산 매물 등록 서비스<br>
                              3) 부동산 중개업소 추천 등 기타 관련 서비스
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">고객: "명당"에 접속하여 서비스를 이용하는 이용자를 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              회원: "명당"에 접속하여 "회사"에 개인정보를 제공하고 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인
                              사용자 회원" 또는 "공인중개사 회원"을 말합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사
                              내부의 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              개인 사용자 회원: 회사가 정한 소정의 절차를 거쳐 회사에 개인정보를 제공하여 회원 가입을 한 자로서, "명당"
                              의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 "명당"의 서비스를 계속적으로 이용할 수 있는 자를 말
                              합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사 내부 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              공인중개사 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 부동산 중개업자로서 "명당"에 매물을 제
                              공할 수 있는 권한을 가진 자를 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">비회원: 회원으로 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</span>
                          </li>
                        </ol>
                        <p>
                          이 약관은 "위치정보의 보호 및 이용 등에 관한 법률" 및 관계 법령 등에서 정하는 바에 따르며 위 항에서 정의되지
                          않은 이 약관상의 용어의 의미는 일반적인 거래 관행에 의합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 3조 계약의 체결 및 해지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "고객"은 회사의 서비스를 이용하고자 하는 경우, 약관의 고지 내용에 따라 개인위치정보 서비스에 가입하게
                              됩니다. 회원의 경우 회원가입 시 동의절차를 밟으며, 비회원인 경우 서비스를 이용하는 동안 이 약관에 동의
                              한 것으로 간주합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "고객"은 계약을 해지하고자 할 때에는 가입 회원탈퇴를 하거나, "회사"의 개인정보보호 담당자에게 이메일을
                              통해 해지신청을 하여야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 4조 서비스의 내용</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "고객"이 등록한 매물의 위치정보만을 "고객"에게 제공하며, 해당 위치정보를 다른 정보와 결합하여
                              개인위치정보로 이용하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              제공되는 "고객"의 매물 위치정보는 해당 스마트폰 등에서 제공합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 위치정보사업자인 이동통신사로부터 위치정보를 전달받아 "명당"의 모바일 단말기 전용 애플리케이
                              션(이하 "애플리케이션")을 통해 아래와 같은 위치기반서비스를 제공합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    접속 위치 제공 서비스: 위치 정보 사용을 승인한 "고객"들의 서비스 최종 접속 위치를 기반으로 서비스 내의 정
                                    보를 지도 위에 혹은 리스트를 통해 제공합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    위치 정보: 모바일 단말기 등의 WPS(Wifi Positioning System), GPS 기반으로 추출된 좌표를 이용하여 "고객"
                                    이 생성하는 지점을 말합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    최종 접속 위치를 활용한 검색 결과 제공 서비스: 정보 검색 요청 시 개인위치정보주체의 현위치를 이용한 서
                                    비스 내의 기능에 따라 제공되는 정보에 대하여 검색 결과를 제시합니다
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    "고객"의 위치 정보의 갱신은 "명당" 실행 시 또는 실행 후, 위치 관련 메뉴 이용 시 이루어지며, "고객"이 갱신
                                    한 사용자의 위치정보를 기준으로 최종 위치를 반영합니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 5조 서비스 이용요금</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스는 기본적으로 무료 서비스 입니다. 어떠한 형태의 유료 기능도 존재하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              무선 서비스 이용 시 발생하는 데이터통신료는 별도이며 가입한 각 이동통신사의 정책에 따릅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 6조 이용시간</h2>
                        <p>
                          "명당"의 이용은 24시간 가능합니다. 단, 시스템 장애, 프로그램 오류 보수, 외부요인 등 불가피한 경우에는 해당 공
                          지를 통해 사전에 통지합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 7조 접속자의 위치정보 이용</h2>
                        <p>
                          "회사"는 "회원"이 약관 등에 동의하는 경우 또는 비회원이 위치관련 메뉴 이용시에 한해 단말기를 통해 수집된 위
                          치정보를 활용하여 정보 및 회원의 게시물을 제공할 수 있습니다.
                        </p>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              약관 등에 동의를 한 회원 또는 비회원이 위치관련 메뉴 사용시 서비스 이용을 위해 본인의 위치를 자의적으로
                              노출하였다고 간주하며 "회사"는 "고객"의 실시간 위치정보를 바탕으로 컨텐츠를 제공합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              장소정보 및 컨텐츠 입력 등 서비스 이용 시 "회원"이 생성한 컨텐츠에 대해 "회사"는 "회원"의 위치에 대한 정
                              보를 저장, 보존하지 않습니다. "회사"는 장소정보 또는 "회원"이 등록한 게시물을 고객의 현재위치를 기반으로
                              추천하기 위해 위치정보를 이용합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 8조 개인위치정보의 이용 또는 제공에 관한 동의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보주체의 동의 없이 당해 개인위치정보주체의 개인위치정보를 제3자에게 제공하지 아니
                              하며, 제3자 제공 "서비스"를 제공하는 경우에는 제공 받는 자 및 제공목적을 사전에 개인위치정보주체에게 고
                              지하고 동의를 받습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보를 개인위치정보주체가 지정하는 제3자에게 제공하는 경우에는 개인위치정보를 수집
                              한 당해 통신단말장치로 매회 개인위치정보주체에게 제공받는 자, 제공 일시 및 제공목적을 즉시 통보합니다.
                              다만, 아래에 해당하는 경우에는 개인위치정보주체가 미리 특정하여 지정한 통신단말장치 또는 전자우편주소
                              등으로 통보합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    개인위치정보를 수집한 당해 통신단말장치가 문자, 음성 또는 영상의 수신기능을 갖추지 아니한 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    가입신청자가 이전에 회원 자격을 상실한 적이 있는 경우(다만 회원 자격 상실 후 회사가 필요하다고 판단하여 회원 재
                                    가입에 대한 승낙을 얻은 경우에는 예외로 합니다.)
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    개인위치정보주체가 개인위치정보를 수집한 당해 통신단말장치 외의 통신단말장치 또는 전자우편주소 등으로
                                    통보할 것을 미리 요청한 경우
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 본 약관의 목적 외 다른 용도로 개인위치정보의 이용 또는 제공사실 확인자료를 기록하거나 보존하지 아니합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 9조 개인위치정보주체의 권리</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">개인위치정보주체는 개인위치정보의 이용•제공에 대한 동의의 전부 또는 일부를 철회할 수 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              개인위치정보주체는 언제든지 개인위치정보의 이용 또는 제공의 일시적인 중지를 요구할 수 있습니다. 이 경
                              우 "회사"는 요구를 거절하지 아니하며, 이를 위한 기술적 수단을 갖추고 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              개인위치정보주체는 "회사"에 대하여 아래 자료의 열람 또는 고지를 요구할 수 있고, 당해 자료에 오류가 있는
                              경우에는 그 정정을 요구할 수 있습니다. 이 경우 "회사"는 정당한 이유 없이 요구를 거절하지 아니합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">개인위치정보주체에 대한 위치정보 이용, 제공사실 확인자료</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    개인위치정보주체의 개인위치정보가 위치정보의 보호 및 이용 등에 관한 법률 또는 다른 법령의 규정에 의하
                                    여 제3자에게 제공된 이유 및 내용
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보주체가 동의의 전부 또는 일부를 철회한 경우에는 지체 없이 수집된 개인위치정보 및 위
                              치정보 이용제공사실 확인자료(동의의 일부를 철회하는 경우에는 철회하는 부분의 개인위치정보 및 위치정보
                              이용제공사실 확인자료에 한합니다)를 파기합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              개인위치정보주체는 제1항 내지 제3항의 권리행사를 위하여 이 약관 제15조의 연락처를 이용하여 "회사"에 요구할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 10조 서비스의 변경 및 중지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 위치정보사업자의 정책변경 등과 같이 "회사"의 제반 사정 또는 법률상의 장애 등으로 서비스를 유지
                              할 수 없는 경우, 서비스의 전부 또는 일부를 제한, 변경하거나 중지할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              제1항에 의한 서비스 중단의 경우에는 "회사"는 사전에 인터넷 및 서비스 화면 등에 공지하거나 개인위치정보
                              주체에게 통지합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 11조 위치정보관리책임자의 지정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 위치정보를 관리, 보호하고, 거래 시 고객의 개인위치정보로 인한 불만을 원활히 처리할 수 있는 위치
                              정보관리책임자를 지정해 운영합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              위치정보관리책임자는 위치기반서비스를 제공하는 부서의 부서장으로서 구체적인 사항은 본 약관의 부칙에
                              따릅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 12조 손해배상 및 면책</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              개인위치정보주체는 "회사"의 다음 각 호에 해당하는 행위로 손해를 입은 경우에 "회사"에 대해 손해배상을 청
                              구할 수 있습니다. 이 경우 개인위치정보주체는 "회사"의 고의 또는 과실이 있음을 직접 입증하여야 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    법령에서 허용하는 경우를 제외하고 이용자 또는 개인위치정보주체의 동의 없이 위치정보를 수집, 이용하는 행위
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">개인위치정보의 누출, 변조, 훼손 등의 행위</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 천재지변 등 불가항력적인 사유나 "이용자"의 고의 또는 과실로 인하여 발생한 때에는 손해를 배상하지 아니합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"가 망사업자의 통신환경에 따라 발생할 수 있는 오차 있는 위치정보를 이용함으로써 "이용
                              자" 및 제3자가 입은 손해에 대하여는 배상하지 아니합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 13조 약관의 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"가 약관을 변경하고자 할 때는 사전에 공지사항을 통해 변경내용을 게시합니다. 이에 관해 "회원"이 이의
                              를 제기할 경우 "회사"는 "이용자"에게 적절한 방법으로 약관 변경내용을 통지하였음을 확인해 주어야 합니다.
                              다만, 법령의 개정이나 제도의 개선 등으로 인하여 긴급히 약관을 변경 할 때는 해당 서비스를 이용하는 통신
                              단말장치에 즉시 이를 게시하고 가입 시 등록된 "회원"의 전자우편 주소로 통지하여야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"은 제1항의 규정에 따른 약관의 변경내용이 게시되거나 통지된 후부터 변경되는 약관의 시행일 전 영업
                              일까지 계약을 해지할 수 있습니다. 단 전단의 기간 안에 "회원"의 이의가 "회사"에 도달하지 않으면 "회원"이
                              이를 승인한 것으로 봅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 14조 분쟁 해결</h2>
                        <p>
                          "회사"는 위치정보와 관련된 분쟁의 당사자간 협의가 이루어지지 아니하거나 협의를 할 수 없는 경우에는 전기통
                          신기본법의 규정에 따라 방송통신위원회에 재정을 신청하거나 정보통신망이용촉진및정보보호등에관한 법률의 규
                          정에 의한 개인정보분쟁조정위원회에 조정을 신청할 수 있습니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 15조 사업자 정보 및 위치정보관리책임자 지정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              회사의 상호, 주소, 전화번호 그 밖의 연락처는 다음과 같습니다.
                              <dl>
                                <dt>상호:</dt>
                                <dd>(주)디노랩스</dd>
                                <dt>주소:</dt>
                                <dd>광주광역시 동구 금남로4가 6<br>광주AI창업캠프 2호점 402호<br>
                                  (금남로 193-12)</dd>
                                <dt>전화번호:</dt>
                                <dd>070-8633-8942</dd>
                                <dt>이메일:</dt>
                                <dd>denolabs@naver.com</dd>
                              </dl>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              위치정보관리책임자는 다음과 같이 지정합니다.
                              <dl>
                                <dt>성명:</dt>
                                <dd>이성희</dd>
                                <dt>직위:</dt>
                                <dd>CTO</dd>
                                <dt>전화번호:</dt>
                                <dd>070-8633-8942</dd>
                                <dt>이메일:</dt>
                                <dd>denolabs@naver.com</dd>
                              </dl>
                            </span>
                          </li>
                        </ol>
                        <p>본 약관은 2022년 1월 1일부터 적용 합니다.</p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input class="check_box" id="agree2" name="agree" type="checkbox">
                    <label for="agree2"> 위치기반서비스 이용약관에 동의합니다</label>
                  </div>
                </div>
                <!-- 공인중개사 및 파트너 회원 서비스 이용 약관 동의 -->
                <div class="agree_box">
                  <h3>공인중개사 및 파트너 회원 서비스 이용 약관</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div class="sg-main">
                      <section class="sg-main__title">
                        <h1>공인중개사 및 파트너 회원 서비스 이용 약관</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <h1>제 1장 총칙</h1>
                        <h2>제 1조 목적</h2>
                        <p>
                          이 약관은 (주)디노랩스(이하 "회사"라 한다)이 운영하는 인터넷 사이트 및 모바일 어플리케이션(이하 "명당"라 한다)
                          에서 제공하는 제반 서비스의 이용과 관련하여 "회사"와 "이용자"의 권리, 의무 및 책임 사항, 기타 필요한 사항을
                          규정함을 목적으로 합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 2조 정의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              명당: "회사"가 컴퓨터 등 정보통신설비를 이용하여 서비스를 제공할 수 있도록 설정한 가상의 영업장을 말하며,
                              아울러 인터넷 사이트 및 모바일 애플리케이션을 운영하는 사업자의 의미로도 사용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              이용자: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사 회원"
                              또는 "비즈니스 회원" 또는 "비회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              회원: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사
                              회원", "비즈니스 회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              개인 사용자 회원: 회사가 정한 소정의 절차를 거쳐 회사에 개인정보를 제공하여 회원 가입을 한 자로서, "명당"
                              의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 "명당"의 서비스를 계속적으로 이용할 수 있는 자를 말
                              합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사 내부 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              공인중개사 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 부동산 중개업자로서 "명당"에 매물을 제
                              공할 수 있는 권한을 가진 자를 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              비즈니스 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 공유오피스 담당자와 법인 담당자로서 "명당"에
                              매물을 제공할 수 있는 권한을 가진 자를 말합니다. 단, 공유오피스 담당자로서 비즈니스 회원의 권한은 공유오피스
                              서비스에 한정합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">비회원: 회원으로 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              아이디(ID): 회원의 식별과 서비스 이용을 위하여 회원이 설정하고 회사가 승인한 이메일주소 또는 문자나 숫
                              자의 조합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              비밀번호: 회원의 동일성 확인과 회원정보의 보호를 위하여 회원이 설정하고 회사가 승인한 문자나 숫자의 조
                              합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              게시판: 그 명칭, 형태, 위치와 관계없이 회원 및 비회원 이용자에게 공개할 목적으로 부호•문자•음성•음향
                              •화상•동영상 등의 정보 (이하 "게시물"이라 합니다)를 회원이 게재할 수 있도록 회사가 제공하는 서비스 상
                              의 가상공간을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">컨텐츠: "회원"이 게재한 모든 글, 사진, 동영상, 회원소개 등을 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">12.</span>
                            <span class="sg-text">
                              매물관리규정: "회사"가 별도로 규정하여 공개한 부동산 매물 등록 시 회원의 준수사항 및 위반 시 제재 규정을
                              의미합니다.
                            </span>
                          </li>
                        </ol>
                        <p>위 항에서 정의되지 않은 이 약관상의 용어의 의미는 일반적인 거래 관행에 의합니다.</p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 3조 약관 등의 명시와 설명 및 개정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 본 약관의 내용을 이용자가 쉽게 알 수 있도록 "명당"의 인터넷 사이트 및 모바일 애플리케이션에 게
                              시합니다. 다만, 약관의 내용은 이용자가 연결 화면을 통하여 볼 수 있도록 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "약관 규제에 관한 법률", "정보통신망 이용촉진 및 정보보호 등에 관한 법률" 등 관련법을 위배하지
                              않는 범위에서 본 약관을 개정할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 약관을 개정할 경우에는 적용 일자 및 개정 사유를 명시하여 이용자가 알기 쉽도록 표시하여 공지합
                              니다. 변경된 약관은 공지된 시점부터 그 효력이 발생하며, 이용자는 약관이 변경된 후에도 본 서비스를 계속
                              이용함으로써 변경 후의 약관에 대해 동의를 한 것으로 간주됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 4조 약관의 해석</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 서비스운영을 위해 별도의 운영정책을 마련하여 운영할 수 있으며, "회사"는 "명당" 인터넷 사이트 및
                              모바일 애플리케이션에 운영정책을 사전 공지 후 적용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">본 약관에서 정하지 아니한 사항이나 해석에 대해서는 별도의 운영정책, 관계법령 또는 상관례에 따릅니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 5조 서비스의 제공 및 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 다음과 같은 서비스를 제공합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">부동산 매물 등에 관한 정보 제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">부동산 매물 등록 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">부동산 매물 매출 관련 서비스 제공</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">부동산 중개업소 추천 등 기타 관련 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">공유사무실 등에 관한 정보제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">기타 "명당"의 이용자를 위하여 제공하는 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">유료로 제공하는 광고 상품 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">유료로 제공하는 부가 서비스</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스는 원칙적으로 상품 중도 변경, 일시중지, 양도양수가 불가합니다. 단, 이용자의 귀책사유가 아님을 증명 할 수 있을 경우 예외적으로 처리될
                              수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스의 내용을 기술적 사양의 변경 등의 이유로 변경할 경우에는 그 사유를
                              이용자에게 통지 하거나, 이용자가 알아볼 수 있도록 공지사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 6조 서비스의 중단</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 컴퓨터 등 정보 통신 설비의 보수 점검, 교체 및 고장, 통신의 두절, 천재지변 등의 사유가 발생한 경우
                              에는 서비스의 제공을 제한하거나 일시적으로 중단할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              사업종목의 전환, 사업의 포기, 업체 간의 통합 등의 이유로 서비스를 제공할 수 없게 되는 경우에는 회사는 이
                              용자에게 통지하거나 이용자가 알아볼 수 있도록 공지 사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 7조 회원에 대한 통지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 이메일, 이동전화 단문메시지서비스(SMS), 푸시알림(App push)등으로 회원에게 통지할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 불특정다수 회원에 대한 통지의 경우 공지사항으로 게시함으로써 개별 통지에 갈음 할 수 있습니다. 다
                              만, 회원 본인의 거래와 관련하여 중대한 영향을 미치는 사항에 대하여는 개별통지를 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 2장 이용계약 및 정보보호</h1>
                        <h2>제 8조 회원가입 및 회원정보의 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 회사가 정한 가입 양식에 따라 회원 정보를 기입한 후 이 약관에 동의한다는 의사표시를 함으로서
                              회원 가입을 신청합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 제1항과 같이 회원으로 가입할 것을 신청한 이용자 중 다음 각 호에 해당하지 않는 한 "개인 사용자 회
                              원" 또는 "공인중개사 회원", "비즈니스 회원"으로 등록합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">등록 내용에 허위, 기재누락, 오기가 있는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    가입 신청자가 이전에 회원 자격을 상실한 적이 있는 경우(다만 회원 자격 상실 후 회사가 필요하다고 판단하
                                    여 회원 재가입에 대한 승낙을 얻은 경우에는 예외로 합니다.)
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회사"로부터 회원 자격 정지 조치 등을 받은 회원이 그 조치 기간 중에 이용 계약을 임의 해지하고 재가입 신
                                    청을 하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">기타 회원으로 등록하는 것이 "명당"의 기술상 현저히 지장이 있다고 판단되는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">
                                    본 약관에 위배되거나 위법 또는 부당한 이용신청임이 확인된 경우 및 회사가 합리적인 판단에 의하여 필요하
                                    다고 인정하는 경우
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">회원 가입 계약의 성립 시기는 "회사"의 승낙이 "회원"에게 도달한 시점으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"은 회원 가입 신청 및 이용시 기재한 사항이 변경되었을 경우 온라인으로 수정을 하거나 전자우편 기타 방법으로 회사에 그 변경사항을 알려야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">제4항의 변경 사항을 "회사"에 알리지 않아 발생한 불이익에 대하여 회사는 책임지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              회원 가입은 반드시 본인의 진정한 정보를 통하여 가입할 수 있으며 "회사"는 "회원"이 등록한 정보에 대하여 확
                              인 조치를 할 수 있습니다. "회원"은 "회사"의 확인 조치에 대하여 적극 협력하여야 하며, 만일 이를 준수하지 아니
                              할 경우 "회사"는 등록한 정보가 부정한 것으로 간주하여 처리할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사"는 "회원"을 등급 별로 구분하여 이용시간, 이용회수, 서비스 메뉴, 매물 등록 건 수 등을 세분하여 서비스
                              이용에 차등을 둘 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회원"은 1인 1계정에 한하여 서비스 이용이 가능하며, 중복 가입 시 서비스 이용이 불가할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 9조 이용 계약의 종료</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              회원의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회원"은 회사에 언제든지 해지 의사를 통지할 수 있고 회사는 특별한 사유가 없는 한 이를 즉시 수락하여야 합
                                    니다. 다만, "회원"은 해지의사를 통지하기 전에 모든 진행중인 절차를 완료, 철회 또는 취소해야만 합니다. 이 경우
                                    철회 또는 취소로 인한 불이익은 회원 본인이 부담하여야 합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회원"이 발한 의사표시로 인해 발생한 불이익에 대한 책임은 회원 본인이 부담하여야 하며, 이용계약이 종료되
                                    면 "회사"는 "회원"에게 부가적으로 제공한 각종 혜택을 회수할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회원"의 의사로 이용계약을 해지한 후, 추후 재이용을 희망할 경우에는 재이용 의사가 "회사"에 통지되고, 이에
                                    대한 "회사"의 승낙이 있는 경우에만 서비스 재이용이 가능합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에 따라 해지를 한 "회원"은 이 약관이 정하는 회원가입절차와 관련조항에 따라 신규 회원으로 다시 가입
                                    할 수 있습니다. 다만, "회원"이 중복참여가 제한된 이벤트 중복 참여 등 부정한 목적으로 회원탈퇴 후 재이용을 신
                                    청하는 경우 "회사"는 가입을 일정기간 동안 제한할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">본 항에 따라 해지를 한 이후에는 재가입이 불가능하며, 모든 가입은 신규가입으로 처리됩니다.</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              회사의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회사"는 다음과 같은 사유가 발생하거나 확인된 경우 이용계약을 해지할 수 있습니다.
                                    <ol>
                                      <li>
                                        <span class="listNum">(1)</span>
                                        <span class="sg-text">
                                          다른 회원의 권리나 명예, 신용 기타 정당한 이익을 침해하거나 대한민국 법령 또는 공서양속에 위배되는 행위
                                          를 한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(2)</span>
                                        <span class="sg-text">
                                          "회사"가 제공하는 서비스의 원활한 진행을 방해하는 행위를 하거나 시도한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(3)</span>
                                        <span class="sg-text">제 8조 제 2항의 승낙거부 사유가 추후 발견된 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(4)</span>
                                        <span class="sg-text">"회사"가 정한 서비스 운영정책을 이행하지 않거나 위반한 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(5)</span>
                                        <span class="sg-text">기타 "회사"가 합리적인 판단에 기하여 서비스의 제공을 거부할 필요가 있다고 인정할 경우</span>
                                      </li>
                                    </ol>
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 해지를 하는 경우 "회사"는 "회원"에게 이메일, 전화, 기타의 방법을 통하여 해지 사유를 밝혀 해지 의
                                    사를 통지합니다. 이용계약은 "회사"의 해지의사를 "회원"에게 통지한 시점에 종료됩니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료될 시에는 "회사"는 "회원"에게 부가적으로 제공한 각종혜택을 회수
                                    할 수 있습니다. 이용계약의 종료와 관련하여 발생한 손해는 이용계약이 종료된 해당 회원이 책임을 부담하여야 하
                                    고, "회사"는 일체의 책임을 지지 않습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료된 경우에는, "회원"의 재이용 신청에 대하여 "회사"는 이에 대한 승
                                    낙을 거절할 수 있습니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              이용계약의 종료시, 제공된 서비스에 대한 환불은 본 규정 제15조에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 계약을 해지하는 경우, 관련법 및 "개인정보취급방침"에 따라 "회사"가 회원정보를 보유하는 경우를 제외하고는 해지 즉시 "회원"의 모든 데이터는
                              소멸됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 10조 개인정보보호</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 회원가입시 서비스 제공에 필요한 최소한의 정보를 수집합니다. 다음 사항을 필수사항으
                              로 하며 그 외 사항은 선택사항으로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이메일주소</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">비밀번호</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">휴대폰 번호(부동산 매물등록 서비스, 공유사무실 등록서비스 및 신고기능을 이용하는 회원인 경우)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"가 "이용자"의 개인식별이 가능한 개인정보를 수집하는 때에는 반드시 당해 이용자의 동의를 받습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              제공된 개인정보는 당해 이용자의 동의 없이 목적 외의 이용이나 제3자에게 제공하지 않습니다. 다만, 다음의
                              경우에는 예외로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">도용방지를 위하여 본인확인에 필요한 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">법률의 규정 또는 법률에 의하여 필요한 불가피한 사유가 있는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회사"가 제2항과 제3항에 의해 "이용자"의 동의를 받아야 하는 경우에는 개인정보관리 책임자의 신원(소속,
                              성명 및 전화번호, 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에 대한 정보제공 관련사항(제공받은 자,
                              제공목적 및 제공할 정보의 내용) 등 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 제22조 제2항이 규정
                              한 사항을 미리 명시하거나 고지해야 하며 이용자는 언제든지 이 동의를 철회할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 개인정보를 보호하기 위해 "개인정보취급방침"을 수립하고 개인정보보호책임자를 지정하
                              여 이를 게시하고 운영합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "이용자"는 언제든지 "회사"가 갖고 있는 자신의 개인정보에 대해 열람 및 오류정정을 요구할 수 있으며 "회사"
                              는 이에 대해 지체 없이 필요한 조치를 취할 의무를 집니다. 이용자가 오류의 정정을 요구한 경우에 "회사"는
                              그 오류를 정정할 때까지 당해 개인정보를 이용하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사" 또는 그로부터 개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받은 목적을 달성한 때에는 당해 개인정보를 지체 없이 파기합니다. 다만, 아래의
                              경우에는 회원 정보를 보관합니다. 이 경우 회사는 보 관하고 있는 회원 정보를 그 보관의 목적으로만 이용합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우 "회사"는 관계법령에서 정한 일정한 기간 동안 회원
                                    정보를 보관합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 이용계약을 해지하거나 "회사"로부터 서비스 이용정지조치를 받은 회원에 대해서는 재가입에 대한 승낙거부사유가 존재하는지 여부를 확인하기 위한
                                    목적으로 이용계약종료 후 5년간 성명, 이메일주소, 전화번호를 비롯하여 이용계약 해지와 서비스 이용정지와 관련된 정보 등의 필요정보를 보관합니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회사"는 새로운 업체가 제휴사 또는 제휴영업점의 지위를 취득할 경우 제7조 2항에서 정한 것과 같은 방법을
                              통하여 공지합니다. 이 때 회원이 별도의 이의제기를 하지 않을 경우 "명당" 서비스 제공이라는 필수적인 목적
                              을 위해 해당 개인 정보 제공 및 활용에 동의한 것으로 간주 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              모든 "이용자"는 "명당"로부터 제공받은 정보를 다른 목적으로 이용하거나 타인에게 유출 또는 제공해서는 안
                              되며, 위반 사용으로 인한 모든 책임을 부담해야 합니다. 또한 "회원"은 자신의 개인정보를 책임 있게 관리하여
                              타인이 회원의 개인정보를 부정하게 이용하지 않도록 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              "회사"는 "회원"의 개인정보를 보호하기 위해 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 상의 개인정
                              보 유효기간제도에 따라 1년간 미접속한 회원의 개인정보를 파기 또는 분리하여 별도로 저장/관리하며(휴면계
                              정), "회원"의 별도의 요청이 없는 한 사용이 제한됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">
                              회사”는 등기변동 알림서비스를 신청한 “회원”에게 그와 관련된 비광고성 정보를 카카오톡 알림톡으로 통지
                              할 수 있으며, 만약 알림톡 수신이 불가능하거나 해당 회원이 수신 차단한 경우에는 일반 문자 메시지로 통지할
                              수 있습니다. 다만, 와이파이 아닌 이동통신망으로 접속시 알림톡 수신 중 데이터요금이 발생할 수 있습니다.
                              회원”이 알림톡과는 다른 방식으로 정보 수신을 원하시면 알림톡을 차단할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 3장 서비스의 이용</h1>
                        <h2>제 11조 부동산 매물 및 공유사무실 등에 관한 정보제공 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 및 공유사무실 등에 관한 정보제공 서비스는 "회사"가 이용자 스스로 해당 정보를 확인 및 이용할
                              수 있도록 관련 정보를 제공하는 것입니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 “네모” 인터넷 사이트 및 모바일 애플리케이션
                              내에서 제공하는 모든 정보에 대해서 정확성이나 신뢰성이
                              있는 정보를 제공하기 위해 노력하며, 신고받은 허위매물 정
                              보의 삭제 조치를 하는 등의 서비스 관리자로서의 책임을 부
                              담합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 "명당" 인터넷 사이트 및 모바일 애플리케이션을 통해 제공되는 정보의 내용을 수정할 의무를 지지
                              않으나, 필요에 따라 개선할 수는 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 12조 부동산 매물 및 공유사무실 등록 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 등록 및 공유사무실 등록 서비스는 "회원"이 매물정보(부동산 거래정보 및 거래 물건에 대한 다양
                              한 부가정보)와 회원 연락처(회원의 이메일 주소 및 휴대폰 번호), 공유사무실 정보(공유사무실 정보 및 다양한
                              부가정보)와 회원 연락처(회원의 이메일 주소 및 전화번호)를 직접 "명당" 인터넷 사이트 및 모바일 애플리케
                              이션에 등록하여 이용자에게 노출할 수 있는 것을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실의 노출순
                              서 및 영역의 추가 등에 대한 결정 권한을 갖고 있습니다. 또
                              한, “회사”는 사전에 회원의 개별 동의를 구한 경우 “회원”의
                              매물정보 및 공유사무실 정보 등을 “네모” 인터넷 사이트 및
                              모바일 애플리케이션 이외의 다른 인터넷 사이트 등에 노출
                              할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실 정보에 대
                              해 등록 후 최대 7일 이내에 진위 여부를 확인하며, 진위 여
                              부 확인 즉시 해당 매물 및 공유사무실을 노출합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 등록한 정보가 실제 정보와 불일치 하는 경우 "회사"는 "회원"이 가입시 제공한 전화번호 또는 이메일
                              을 통해 "회원"에게 매물정보의 수정을 요청합니다. "회사"가 "회원"이 제공한 연락수단으로 2회 이상 연락하
                              였음에도 불구하고 연락이 되지 않을 경우의 책임은 "회원"에게 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              전항에 따른 "회사"의 정당한 정보 수정 요청에도 불구하고 "회원"이 24시간 이내에 정보(거래완료 혹은 노출
                              종료와 같은 매물상태 변경 포함)를 수정하지 않을 경우, 회사는 해당 매물 및 공유사무실 정보의 노출을 중지
                              하고 "회원"의 서비스 이용을 제한 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "회사"는 "명당"에 등록된 매물 및 공유사무실 중 사회통념, 관례 및 회사의 합리적인 판단에 의하여 거래가 부
                              적합하다고 판단되는 경우 이의 삭제를 요청하거나 직권으로 삭제할 수 있으며 해당 회원의 서비스 이용을 정
                              지 혹은 탈퇴시킬 수 있습니다. "명당"에 거래부적합 부동산 매물 및 공유사무실을 등록할 경우, 거래부적합 매
                              물에 대한 법적인 책임은 해당 등록자에게 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 13조 부동산 중개업소 및 공유사무실 추천 등 기타 관련 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 편의를 위해 부동산 중개업소와 공유사무실을 "이용자"에게 추천할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 회사는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모든
                              직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 14조 정보의 제공 및 광고의 게재</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스 이용 중 필요하다고 인정되는 다양한 정보를 서비스 내 공지사항, 서비스 화면, 전자
                              우편 등의 방법으로 "회원"에게 제공 할 수 있습니다. 다만, "회원"은 관련법에 따른 거래 관련 정보 및 고객문
                              의 등에 대한 답변 등을 제외하고는 언제든지 위 정보 제공에 대하여 수신 거절을 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 서비스 운영과 관련하여 회사가 제공하는 서비스의 화면 및 홈페이지 등에 광고를 게재할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 15조 환불 규정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회원"이 계약 상품 개시 후 환불 요청시 개시일로부터 경과기간에 해당하는 상품 원가 금액과 총 결제금액의 10% 위약금을 공제 한 후 그 나머지를 환급합니다.
                              "공인중개사 회원"이 중개업을 폐업 신고한 후 환불 요청하는 경우도 같습니다. 단, 상품 계약일로부터 7일 이내 청약철회 요청 시 위약금 없이 상품 개시일로부터
                              경과기간에 해당하는 상품 원가 금액만 공제하고 그 나머지를 환급합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              신용카드로 결제한 "회원"이 카드 승인일로부터 365일이내에 환불을 요청할 경우 환불금액이 부분취소처리 됩니다. 단, 그 외의 경우에는 기존에 결제하였던 내역을 전액
                              취소하며 취소 시점에 따라 1항에 의거한 환불공제 금액을 재승인 합니다. 이 경우 구매 취소 시점과 해당 카드사의 환불 처리기준에 따라 취소금액의 환급 방법과
                              환급일은 다소 차이가 있을 수 있으며, 사용한 신용카드의 환불 정책은 해당 카드사 정책에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 타인의 신용카드 또는 휴대전화번호를 도용하여 부당한 이익을 편취하였다고 볼 수 있는 합리적 사유가 있는 경우 "회사"는 "회원"에게 소명 자료를 요청하고
                              환불을 보류할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"의 개인정보도용 및 결제사기로 인한 환불요청 또는 결제자의 개인정보 요구는 법률이 정한 경우 외에는 거절될 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              위약금과 사용일수 금액의 총합이 결제한 금액보다 클 경우 환불이 불가합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              본 약관에서 정하지 않은 환불에 관한 사항은 전자상거래 등에서의 소비자보호에 관한 법률 등 관련 법령, 지침 또는 상관례에 의합니다.
                            </span>
                          </li>
                        </ol>
                      </section>

                      <section class="sg-agent">
                        <h1>제 4장 책임</h1>
                        <h2>제 16조 회사의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 법령과 이 약관이 금지하거나 공서양속에 반하는 행위를 하지 않으며 이 약관이 정하는 바에 따라 지
                              속적이고, 안정적으로 이용자에게 서비스를 제공하는데 최선을 다하여야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호간의 거래에 있어서 어떠한 보증도 제공하지 않습니다. 이용자 상호간 거래 행위에서 발
                              생하는 문제 및 손실에 대해서 회사는 일체의 책임을 부담하지 않으며, 거래 당사자 간에 직접 해결해야 합니
                              다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 17조 회원의 아이디(ID) 및 비밀번호에 대한 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"아이디(ID)"와 "비밀번호"에 관한 관리책임은 "회원"에게 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회원"은 자신의 "아이디(ID)" 및 "비밀번호"를 제3자에게 이용하게 해서는 안됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 자신의 "아이디(ID)" 및 "비밀번호"를 도난 당하거나 제3자가 사용하고 있음을 인지한 경우에는 바로
                              "회사"에 통보하고 "회사"의 안내가 있는 경우에는 그에 따라야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 18조 이용자의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 다음 행위를 하여서는 안됩니다. 만약 다음 각 호와 같은 행위가 확인되면 회사는 해당 "이용자"에
                              게 서비스 이용에 대한 제재를 가할 수 있으며 민형사상의 책임을 물을 수 있습니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">회사 서비스의 운영을 고의 및 과실로 방해하는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">신청 또는 변경 시 허위 내용의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">타인의 정보 도용</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">허위 매물 정보의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">"회사"가 정한 정보 이외의 정보(컴퓨터 프로그램 등) 등의 송신 또는 게시</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 저작권 등 지적재산권에 대한 침해</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 명예를 손상시키거나 업무를 방해하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">외설 또는 폭력적인 메시지, 화상, 음성, 기타 공서양속에 반하는 정보를 공개 또는 게시하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">9)</span>
                                  <span class="sg-text">이용자의 연락처 또는 개인정보를 다른 용도로 사용</span>
                                </li>
                                <li>
                                  <span class="listNum">10)</span>
                                  <span class="sg-text">사기 및 악성 글 등록 등 건전한 거래 문화 활성에 방해되는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">11)</span>
                                  <span class="sg-text">기타 중대한 사유로 인하여 회사가 서비스 제공을 지속하는 것이 부적당하다고 인정하는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 전항의 규정 된 위반 행위를 하는 회원에 대해
                              서비스 일시 중단 등의 조치를 취할 수 있으며, 필요한 경우
                              이에 대한 시정을 요구할 수 있습니다. 특히, 회원이 시정을
                              요구받은 기간 내에 시정을 하지 아니한 경우, 동일한 위반
                              행위를 반복할 경우 또는 다수의 위반 행위가 확인 된 경우
                              에 회사는 회원과의 서비스 이용계약을 해지 할 수 있습니다.
                              단, 이 경우 회사는 회원에게 전화, E-mail, SMS 등의 방법
                              으로 개별 통지합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 회사의 정책에 따라서 회원 간의 차별화된 유료 서비스를 언제든지 제공할 수 있습니다. 만약 회원이
                              비용을 지불하지 않고 사용을 할 경우 "회사"는 특정 회원에게 서비스 중지 및 특정 서비스 제한을 할 수 있습
                              니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 19조 권리의 귀속 및 이용제한</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회원"이 "명당"를 이용하여 작성한 저작물에 대한 저작권 기타 지적 재산권은 "회원"에 귀속합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"은 "회사"에 제공한 콘텐츠에 대하여 “회사”가 다음과 같은 목적과 권한으로 이용하는 것을 허락합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이용 목적 : 회사 서비스 운영 전반, 회사 서비스의 온/오프라인 광고, 회사 서비스 고도화 및 기획, 운영 등을 위한
                                    빅데이터 수집</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">이용 권한 : 회사 서비스 및 회사와 제휴된 서비스에 노출할 수 있고, 해당 노출을 위해 필요한 범위 내에서 일부
                                    이용, 편집 형식의 변경 및 기타 변형하여 이용할 수 있습니다. (사용, 저장, 수정, 복제, 공중송신, 전시, 공표, 공연, 전송, 배포, 방송, 2차적
                                    저작물 작성 등 어떠한 형태로든 이용 가능하며, 이용기간과 지역에는 제한이 없음)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회원"은 본조 2항의 콘텐츠 이용 허락에 대한 권리를 보유해야 합니다. 이에 반하여 발생하는 모든 문제에 대해서는 “회원”이
                              책임을 부담하게 됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">"회원"이 작성한 콘텐츠는 제3자의 권리를 침해해서는 아니됩니다. 관련 법령에 위반되는 내용을 포함하는 경우 그로 인한 책임은
                              “회원”이 부담하게 되며, 관련 법령이 정한 절차에 따라 게시가 제한될 수 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">서비스에 대한 저작권 및 지적재산권은 “회사”에 귀속됩니다. 단, 회원이 직접 작성한 "콘텐츠" 및 제휴 계약에 따라 제공된
                              저작물 등은 제외합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">"이용자"는 서비스를 이용함으로써 얻은 정보 중 "회사"에게 지적 재산권이 귀속된 정보를 회사의 사전 승낙 없이 복제, 송신,
                              출판, 배포, 방송 기타 방법에 의하여 영리 목적으로 이용하거나 제3자에게 이용하게 하여서는 안됩니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 20조 책임의 한계 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 무료로 제공하는 정보 및 서비스에 관하여 "개인정보취급방침" 또는 관계 법령의 벌칙, 과태료 규정
                              등 강행 규정에 위배되지 않는 한 원칙적으로 손해를 배상 할 책임이 없습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 천재지변, 불가항력, 서비스용 설비의 보수, 교
                              체, 점검, 공사 등 기타 이에 준하는 사항으로 정보 및 서비
                              스를 제공 할 수 없는 경우에 회사의 고의 또는 과실이 없는
                              한 이에 대한 책임이 면제 됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회사"는 "이용자"의 귀책사유로 인한 정보 및 서비스 이용의 장애에 관한 책임을 지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              “회사”는 “회원”이 게재한 정보, 자료, 사실의 신뢰도, 정
                              확성 등의 내용에 관하여 회사의 고의 또는 중대한 과실이
                              없는 한 책임을 지지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "서비스"에서 제공하는 정보에 대한 신뢰 여부는 전적으로 "이용자" 본인의 책임이며, "회사"는 매물 및 공유사
                              무실 정보를 등록한 "회원"에 의한 사기, 연락 불능 등으로 인하여 발생하는 어떠한 직접, 간접, 부수적, 파생적,
                              징벌적 손해, 손실, 상해 등에 대하여 도덕적, 법적 책임을 부담하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "서비스"를 통하여 노출, 배포, 전송되는 정보를 "이용자"가 이용하여 발생하는 부동산 거래 등에 대하여 "회사"
                              는 어떠한 도덕적, 법적 책임이나 의무도 부담하지 아니합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 "회사"는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모
                              든 직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 21조 손해배상 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스를 이용함에 있어 "회사"의 고의 또는 과실로 인해 손해가 발생한 경우에는 민법 등
                              관련 법령이 규율하는 범위 내에서 그 손해를 배상합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"이 이 약관을 위반하거나 관계 법령을 위반하여 "회사"에 손해가 발생한 경우에는 "회사"에 그 손해를 배
                              상하여야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 22조 분쟁해결</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호 간 분쟁에서 발생하는 문제에 대해서 일체의 책임을 지지 않습니다. "이용자" 상호 간
                              분쟁은 당사자들이 직접 해결을 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자" 상호간에 서비스 이용과 관련하여 발생한 분쟁에 대해 "이용자"의 피해 구제 신청이 있는 경우에는
                              공정 거래 위원회 또는 시, 도지사가 의뢰하는 분쟁 조정 기관의 조정에 따를 수 있습니다.
                            </span>
                          </li>
                        </ol>


                      </section>
                      <section class="sg-agent">
                        <h2>제 23조 재판권 및 준거법</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회사"와 "회원"간 제기된 소송은 대한민국법을 준거법으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"와 "회원"간 발생한 분쟁에 관한 소송은 민사소송법 상의 관할법원에 제소합니다.</span>
                          </li>
                        </ol>
                        <p>본 약관은 2021년 12월 31일부터 적용 합니다.</p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input class="check_box" id="agree4" name="agree" type="checkbox">
                    <label for="agree4"> 개인정보 수집 및 이용에 동의합니다</label>
                  </div>
                </div>
              <? } else if ($type == 'B') { ?>
                <!-- 이용약관 -->
                <div class="agree_box">
                  <h3>이용약관</h3>
                  <!-- textbox -->
                  <div class="text_box box1">
                    <div id="policy01" class="sg-main">
                      <section class="sg-main__title">
                        <h1>이용약관</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <h1>제 1장 총칙</h1>
                        <h2>제 1조 목적</h2>
                        <p>
                          이 약관은 (주)디노랩스(이하 "회사"라 한다)이 운영하는 인터넷 사이트 및 모바일 어플리케이션(이하 "명당"라 한다)
                          에서 제공하는 제반 서비스의 이용과 관련하여 "회사"와 "이용자"의 권리, 의무 및 책임 사항, 기타 필요한 사항을
                          규정함을 목적으로 합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 2조 정의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              명당: "회사"가 컴퓨터 등 정보통신설비를 이용하여 서비스를 제공할 수 있도록 설정한 가상의 영업장을 말하며,
                              아울러 인터넷 사이트 및 모바일 애플리케이션을 운영하는 사업자의 의미로도 사용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              이용자: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사 회원"
                              또는 "비즈니스 회원" 또는 "비회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              회원: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사
                              회원", "비즈니스 회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              개인 사용자 회원: 회사가 정한 소정의 절차를 거쳐 회사에 개인정보를 제공하여 회원 가입을 한 자로서, "명당"
                              의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 "명당"의 서비스를 계속적으로 이용할 수 있는 자를 말
                              합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사 내부 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              공인중개사 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 부동산 중개업자로서 "명당"에 매물을 제
                              공할 수 있는 권한을 가진 자를 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              비즈니스 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 공유오피스 담당자와 법인 담당자로서 "명당"에
                              매물을 제공할 수 있는 권한을 가진 자를 말합니다. 단, 공유오피스 담당자로서 비즈니스 회원의 권한은 공유오피스
                              서비스에 한정합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">비회원: 회원으로 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              아이디(ID): 회원의 식별과 서비스 이용을 위하여 회원이 설정하고 회사가 승인한 이메일주소 또는 문자나 숫
                              자의 조합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              비밀번호: 회원의 동일성 확인과 회원정보의 보호를 위하여 회원이 설정하고 회사가 승인한 문자나 숫자의 조
                              합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              게시판: 그 명칭, 형태, 위치와 관계없이 회원 및 비회원 이용자에게 공개할 목적으로 부호•문자•음성•음향
                              •화상•동영상 등의 정보 (이하 "게시물"이라 합니다)를 회원이 게재할 수 있도록 회사가 제공하는 서비스 상
                              의 가상공간을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">컨텐츠: "회원"이 게재한 모든 글, 사진, 동영상, 회원소개 등을 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">12.</span>
                            <span class="sg-text">
                              매물관리규정: "회사"가 별도로 규정하여 공개한 부동산 매물 등록 시 회원의 준수사항 및 위반 시 제재 규정을
                              의미합니다.
                            </span>
                          </li>
                        </ol>
                        <p>위 항에서 정의되지 않은 이 약관상의 용어의 의미는 일반적인 거래 관행에 의합니다.</p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 3조 약관 등의 명시와 설명 및 개정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 본 약관의 내용을 이용자가 쉽게 알 수 있도록 "명당"의 인터넷 사이트 및 모바일 애플리케이션에 게
                              시합니다. 다만, 약관의 내용은 이용자가 연결 화면을 통하여 볼 수 있도록 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "약관 규제에 관한 법률", "정보통신망 이용촉진 및 정보보호 등에 관한 법률" 등 관련법을 위배하지
                              않는 범위에서 본 약관을 개정할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 약관을 개정할 경우에는 적용 일자 및 개정 사유를 명시하여 이용자가 알기 쉽도록 표시하여 공지합
                              니다. 변경된 약관은 공지된 시점부터 그 효력이 발생하며, 이용자는 약관이 변경된 후에도 본 서비스를 계속
                              이용함으로써 변경 후의 약관에 대해 동의를 한 것으로 간주됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 4조 약관의 해석</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 서비스운영을 위해 별도의 운영정책을 마련하여 운영할 수 있으며, "회사"는 "명당" 인터넷 사이트 및
                              모바일 애플리케이션에 운영정책을 사전 공지 후 적용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">본 약관에서 정하지 아니한 사항이나 해석에 대해서는 별도의 운영정책, 관계법령 또는 상관례에 따릅니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 5조 서비스의 제공 및 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 다음과 같은 서비스를 제공합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">부동산 매물 등에 관한 정보 제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">부동산 매물 등록 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">부동산 매물 매출 관련 서비스 제공</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">부동산 중개업소 추천 등 기타 관련 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">공유사무실 등에 관한 정보제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">기타 "명당"의 이용자를 위하여 제공하는 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">유료로 제공하는 광고 상품 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">유료로 제공하는 부가 서비스</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스는 원칙적으로 상품 중도 변경, 일시중지, 양도양수가 불가합니다. 단, 이용자의 귀책사유가 아님을 증명 할 수 있을 경우 예외적으로 처리될
                              수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스의 내용을 기술적 사양의 변경 등의 이유로 변경할 경우에는 그 사유를
                              이용자에게 통지 하거나, 이용자가 알아볼 수 있도록 공지사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 6조 서비스의 중단</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 컴퓨터 등 정보 통신 설비의 보수 점검, 교체 및 고장, 통신의 두절, 천재지변 등의 사유가 발생한 경우
                              에는 서비스의 제공을 제한하거나 일시적으로 중단할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              사업종목의 전환, 사업의 포기, 업체 간의 통합 등의 이유로 서비스를 제공할 수 없게 되는 경우에는 회사는 이
                              용자에게 통지하거나 이용자가 알아볼 수 있도록 공지 사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 7조 회원에 대한 통지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 이메일, 이동전화 단문메시지서비스(SMS), 푸시알림(App push)등으로 회원에게 통지할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 불특정다수 회원에 대한 통지의 경우 공지사항으로 게시함으로써 개별 통지에 갈음 할 수 있습니다. 다
                              만, 회원 본인의 거래와 관련하여 중대한 영향을 미치는 사항에 대하여는 개별통지를 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 2장 이용계약 및 정보보호</h1>
                        <h2>제 8조 회원가입 및 회원정보의 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 회사가 정한 가입 양식에 따라 회원 정보를 기입한 후 이 약관에 동의한다는 의사표시를 함으로서
                              회원 가입을 신청합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 제1항과 같이 회원으로 가입할 것을 신청한 이용자 중 다음 각 호에 해당하지 않는 한 "개인 사용자 회
                              원" 또는 "공인중개사 회원", "비즈니스 회원"으로 등록합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">등록 내용에 허위, 기재누락, 오기가 있는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    가입 신청자가 이전에 회원 자격을 상실한 적이 있는 경우(다만 회원 자격 상실 후 회사가 필요하다고 판단하
                                    여 회원 재가입에 대한 승낙을 얻은 경우에는 예외로 합니다.)
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회사"로부터 회원 자격 정지 조치 등을 받은 회원이 그 조치 기간 중에 이용 계약을 임의 해지하고 재가입 신
                                    청을 하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">기타 회원으로 등록하는 것이 "명당"의 기술상 현저히 지장이 있다고 판단되는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">
                                    본 약관에 위배되거나 위법 또는 부당한 이용신청임이 확인된 경우 및 회사가 합리적인 판단에 의하여 필요하
                                    다고 인정하는 경우
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">회원 가입 계약의 성립 시기는 "회사"의 승낙이 "회원"에게 도달한 시점으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"은 회원 가입 신청 및 이용시 기재한 사항이 변경되었을 경우 온라인으로 수정을 하거나 전자우편 기타 방법으로 회사에 그 변경사항을 알려야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">제4항의 변경 사항을 "회사"에 알리지 않아 발생한 불이익에 대하여 회사는 책임지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              회원 가입은 반드시 본인의 진정한 정보를 통하여 가입할 수 있으며 "회사"는 "회원"이 등록한 정보에 대하여 확
                              인 조치를 할 수 있습니다. "회원"은 "회사"의 확인 조치에 대하여 적극 협력하여야 하며, 만일 이를 준수하지 아니
                              할 경우 "회사"는 등록한 정보가 부정한 것으로 간주하여 처리할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사"는 "회원"을 등급 별로 구분하여 이용시간, 이용회수, 서비스 메뉴, 매물 등록 건 수 등을 세분하여 서비스
                              이용에 차등을 둘 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회원"은 1인 1계정에 한하여 서비스 이용이 가능하며, 중복 가입 시 서비스 이용이 불가할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 9조 이용 계약의 종료</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              회원의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회원"은 회사에 언제든지 해지 의사를 통지할 수 있고 회사는 특별한 사유가 없는 한 이를 즉시 수락하여야 합
                                    니다. 다만, "회원"은 해지의사를 통지하기 전에 모든 진행중인 절차를 완료, 철회 또는 취소해야만 합니다. 이 경우
                                    철회 또는 취소로 인한 불이익은 회원 본인이 부담하여야 합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회원"이 발한 의사표시로 인해 발생한 불이익에 대한 책임은 회원 본인이 부담하여야 하며, 이용계약이 종료되
                                    면 "회사"는 "회원"에게 부가적으로 제공한 각종 혜택을 회수할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회원"의 의사로 이용계약을 해지한 후, 추후 재이용을 희망할 경우에는 재이용 의사가 "회사"에 통지되고, 이에
                                    대한 "회사"의 승낙이 있는 경우에만 서비스 재이용이 가능합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에 따라 해지를 한 "회원"은 이 약관이 정하는 회원가입절차와 관련조항에 따라 신규 회원으로 다시 가입
                                    할 수 있습니다. 다만, "회원"이 중복참여가 제한된 이벤트 중복 참여 등 부정한 목적으로 회원탈퇴 후 재이용을 신
                                    청하는 경우 "회사"는 가입을 일정기간 동안 제한할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">본 항에 따라 해지를 한 이후에는 재가입이 불가능하며, 모든 가입은 신규가입으로 처리됩니다.</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              회사의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회사"는 다음과 같은 사유가 발생하거나 확인된 경우 이용계약을 해지할 수 있습니다.
                                    <ol>
                                      <li>
                                        <span class="listNum">(1)</span>
                                        <span class="sg-text">
                                          다른 회원의 권리나 명예, 신용 기타 정당한 이익을 침해하거나 대한민국 법령 또는 공서양속에 위배되는 행위
                                          를 한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(2)</span>
                                        <span class="sg-text">
                                          "회사"가 제공하는 서비스의 원활한 진행을 방해하는 행위를 하거나 시도한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(3)</span>
                                        <span class="sg-text">제 8조 제 2항의 승낙거부 사유가 추후 발견된 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(4)</span>
                                        <span class="sg-text">"회사"가 정한 서비스 운영정책을 이행하지 않거나 위반한 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(5)</span>
                                        <span class="sg-text">기타 "회사"가 합리적인 판단에 기하여 서비스의 제공을 거부할 필요가 있다고 인정할 경우</span>
                                      </li>
                                    </ol>
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 해지를 하는 경우 "회사"는 "회원"에게 이메일, 전화, 기타의 방법을 통하여 해지 사유를 밝혀 해지 의
                                    사를 통지합니다. 이용계약은 "회사"의 해지의사를 "회원"에게 통지한 시점에 종료됩니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료될 시에는 "회사"는 "회원"에게 부가적으로 제공한 각종혜택을 회수
                                    할 수 있습니다. 이용계약의 종료와 관련하여 발생한 손해는 이용계약이 종료된 해당 회원이 책임을 부담하여야 하
                                    고, "회사"는 일체의 책임을 지지 않습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료된 경우에는, "회원"의 재이용 신청에 대하여 "회사"는 이에 대한 승
                                    낙을 거절할 수 있습니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              이용계약의 종료시, 제공된 서비스에 대한 환불은 본 규정 제15조에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 계약을 해지하는 경우, 관련법 및 "개인정보취급방침"에 따라 "회사"가 회원정보를 보유하는 경우를 제외하고는 해지 즉시 "회원"의 모든 데이터는
                              소멸됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 10조 개인정보보호</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 회원가입시 서비스 제공에 필요한 최소한의 정보를 수집합니다. 다음 사항을 필수사항으
                              로 하며 그 외 사항은 선택사항으로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이메일주소</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">비밀번호</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">휴대폰 번호(부동산 매물등록 서비스, 공유사무실 등록서비스 및 신고기능을 이용하는 회원인 경우)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"가 "이용자"의 개인식별이 가능한 개인정보를 수집하는 때에는 반드시 당해 이용자의 동의를 받습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              제공된 개인정보는 당해 이용자의 동의 없이 목적 외의 이용이나 제3자에게 제공하지 않습니다. 다만, 다음의
                              경우에는 예외로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">도용방지를 위하여 본인확인에 필요한 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">법률의 규정 또는 법률에 의하여 필요한 불가피한 사유가 있는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회사"가 제2항과 제3항에 의해 "이용자"의 동의를 받아야 하는 경우에는 개인정보관리 책임자의 신원(소속,
                              성명 및 전화번호, 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에 대한 정보제공 관련사항(제공받은 자,
                              제공목적 및 제공할 정보의 내용) 등 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 제22조 제2항이 규정
                              한 사항을 미리 명시하거나 고지해야 하며 이용자는 언제든지 이 동의를 철회할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 개인정보를 보호하기 위해 "개인정보취급방침"을 수립하고 개인정보보호책임자를 지정하
                              여 이를 게시하고 운영합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "이용자"는 언제든지 "회사"가 갖고 있는 자신의 개인정보에 대해 열람 및 오류정정을 요구할 수 있으며 "회사"
                              는 이에 대해 지체 없이 필요한 조치를 취할 의무를 집니다. 이용자가 오류의 정정을 요구한 경우에 "회사"는
                              그 오류를 정정할 때까지 당해 개인정보를 이용하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사" 또는 그로부터 개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받은 목적을 달성한 때에는 당해 개인정보를 지체 없이 파기합니다. 다만, 아래의
                              경우에는 회원 정보를
                              보관합니다. 이 경우 회사는 보 관하고 있는 회원 정보를 그 보관의 목적으로만 이용합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우 "회사"는 관계법령에서 정한 일정한 기간 동안 회원
                                    정보를
                                    보관합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 이용계약을 해지하거나 "회사"로부터 서비스 이용정지조치를 받은 회원에 대해서는 재가입에 대한 승낙거부사유가 존재하는지 여부를 확인하기 위한
                                    목적으로 이용계약종료
                                    후 5년간 성명, 이메일주소, 전화번호를 비롯하여 이용계약 해지와 서비스 이용정지와 관련된 정보 등의 필요정보를 보관합니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회사"는 새로운 업체가 제휴사 또는 제휴영업점의 지위를 취득할 경우 제7조 2항에서 정한 것과 같은 방법을
                              통하여 공지합니다. 이 때 회원이 별도의 이의제기를 하지 않을 경우 "명당" 서비스 제공이라는 필수적인 목적
                              을 위해 해당 개인 정보 제공 및 활용에 동의한 것으로 간주 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              모든 "이용자"는 "명당"로부터 제공받은 정보를 다른 목적으로 이용하거나 타인에게 유출 또는 제공해서는 안
                              되며, 위반 사용으로 인한 모든 책임을 부담해야 합니다. 또한 "회원"은 자신의 개인정보를 책임 있게 관리하여
                              타인이 회원의 개인정보를 부정하게 이용하지 않도록 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              "회사"는 "회원"의 개인정보를 보호하기 위해 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 상의 개인정
                              보 유효기간제도에 따라 1년간 미접속한 회원의 개인정보를 파기 또는 분리하여 별도로 저장/관리하며(휴면계
                              정), "회원"의 별도의 요청이 없는 한 사용이 제한됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">
                              회사”는 등기변동 알림서비스를 신청한 “회원”에게 그와 관련된 비광고성 정보를 카카오톡 알림톡으로 통지
                              할 수 있으며, 만약 알림톡 수신이 불가능하거나 해당 회원이 수신 차단한 경우에는 일반 문자 메시지로 통지할
                              수 있습니다. 다만, 와이파이 아닌 이동통신망으로 접속시 알림톡 수신 중 데이터요금이 발생할 수 있습니다.
                              회원”이 알림톡과는 다른 방식으로 정보 수신을 원하시면 알림톡을 차단할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 3장 서비스의 이용</h1>
                        <h2>제 11조 부동산 매물 및 공유사무실 등에 관한 정보제공 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 및 공유사무실 등에 관한 정보제공 서비스는 "회사"가 이용자 스스로 해당 정보를 확인 및 이용할
                              수 있도록 관련 정보를 제공하는 것입니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 “명당” 인터넷 사이트 및 모바일 애플리케이션
                              내에서 제공하는 모든 정보에 대해서 정확성이나 신뢰성이
                              있는 정보를 제공하기 위해 노력하며, 신고받은 허위매물 정
                              보의 삭제 조치를 하는 등의 서비스 관리자로서의 책임을 부
                              담합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 "명당" 인터넷 사이트 및 모바일 애플리케이션을 통해 제공되는 정보의 내용을 수정할 의무를 지지
                              않으나, 필요에 따라 개선할 수는 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 12조 부동산 매물 및 공유사무실 등록 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 등록 및 공유사무실 등록 서비스는 "회원"이 매물정보(부동산 거래정보 및 거래 물건에 대한 다양
                              한 부가정보)와 회원 연락처(회원의 이메일 주소 및 휴대폰 번호), 공유사무실 정보(공유사무실 정보 및 다양한
                              부가정보)와 회원 연락처(회원의 이메일 주소 및 전화번호)를 직접 "명당" 인터넷 사이트 및 모바일 애플리케
                              이션에 등록하여 이용자에게 노출할 수 있는 것을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실의 노출순
                              서 및 영역의 추가 등에 대한 결정 권한을 갖고 있습니다. 또
                              한, “회사”는 사전에 회원의 개별 동의를 구한 경우 “회원”의
                              매물정보 및 공유사무실 정보 등을 “명당” 인터넷 사이트 및
                              모바일 애플리케이션 이외의 다른 인터넷 사이트 등에 노출
                              할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실 정보에 대
                              해 등록 후 최대 7일 이내에 진위 여부를 확인하며, 진위 여
                              부 확인 즉시 해당 매물 및 공유사무실을 노출합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 등록한 정보가 실제 정보와 불일치 하는 경우 "회사"는 "회원"이 가입시 제공한 전화번호 또는 이메일
                              을 통해 "회원"에게 매물정보의 수정을 요청합니다. "회사"가 "회원"이 제공한 연락수단으로 2회 이상 연락하
                              였음에도 불구하고 연락이 되지 않을 경우의 책임은 "회원"에게 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              전항에 따른 "회사"의 정당한 정보 수정 요청에도 불구하고 "회원"이 24시간 이내에 정보(거래완료 혹은 노출
                              종료와 같은 매물상태 변경 포함)를 수정하지 않을 경우, 회사는 해당 매물 및 공유사무실 정보의 노출을 중지
                              하고 "회원"의 서비스 이용을 제한 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "회사"는 "명당"에 등록된 매물 및 공유사무실 중 사회통념, 관례 및 회사의 합리적인 판단에 의하여 거래가 부
                              적합하다고 판단되는 경우 이의 삭제를 요청하거나 직권으로 삭제할 수 있으며 해당 회원의 서비스 이용을 정
                              지 혹은 탈퇴시킬 수 있습니다. "명당"에 거래부적합 부동산 매물 및 공유사무실을 등록할 경우, 거래부적합 매
                              물에 대한 법적인 책임은 해당 등록자에게 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 13조 부동산 중개업소 및 공유사무실 추천 등 기타 관련 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 편의를 위해 부동산 중개업소와 공유사무실을 "이용자"에게 추천할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 회사는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모든
                              직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 14조 정보의 제공 및 광고의 게재</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스 이용 중 필요하다고 인정되는 다양한 정보를 서비스 내 공지사항, 서비스 화면, 전자
                              우편 등의 방법으로 "회원"에게 제공 할 수 있습니다. 다만, "회원"은 관련법에 따른 거래 관련 정보 및 고객문
                              의 등에 대한 답변 등을 제외하고는 언제든지 위 정보 제공에 대하여 수신 거절을 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 서비스 운영과 관련하여 회사가 제공하는 서비스의 화면 및 홈페이지 등에 광고를 게재할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 15조 환불 규정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회원"이 계약 상품 개시 후 환불 요청시 개시일로부터 경과기간에 해당하는 상품 원가 금액과 총 결제금액의 10% 위약금을 공제 한 후 그 나머지를 환급합니다.
                              "공인중개사 회원"이
                              중개업을 폐업 신고한 후 환불 요청하는 경우도 같습니다. 단, 상품 계약일로부터 7일 이내 청약철회 요청 시 위약금 없이 상품 개시일로부터 경과기간에 해당하는 상품
                              원가 금액만
                              공제하고 그 나머지를 환급합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              신용카드로 결제한 "회원"이 카드 승인일로부터 365일이내에 환불을 요청할 경우 환불금액이 부분취소처리 됩니다. 단, 그 외의 경우에는 기존에 결제하였던 내역을 전액
                              취소하며 취소
                              시점에 따라 1항에 의거한 환불공제 금액을 재승인 합니다. 이 경우 구매 취소 시점과 해당 카드사의 환불 처리기준에 따라 취소금액의 환급 방법과 환급일은 다소 차이가
                              있을 수 있으며,
                              사용한 신용카드의 환불 정책은 해당 카드사 정책에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 타인의 신용카드 또는 휴대전화번호를 도용하여 부당한 이익을 편취하였다고 볼 수 있는 합리적 사유가 있는 경우 "회사"는 "회원"에게 소명 자료를 요청하고
                              환불을 보류할 수
                              있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"의 개인정보도용 및 결제사기로 인한 환불요청 또는 결제자의 개인정보 요구는 법률이 정한 경우 외에는 거절될 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              위약금과 사용일수 금액의 총합이 결제한 금액보다 클 경우 환불이 불가합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              본 약관에서 정하지 않은 환불에 관한 사항은 전자상거래 등에서의 소비자보호에 관한 법률 등 관련 법령, 지침 또는 상관례에 의합니다.
                            </span>
                          </li>
                        </ol>
                      </section>

                      <section class="sg-agent">
                        <h1>제 4장 책임</h1>
                        <h2>제 16조 회사의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 법령과 이 약관이 금지하거나 공서양속에 반하는 행위를 하지 않으며 이 약관이 정하는 바에 따라 지
                              속적이고, 안정적으로 이용자에게 서비스를 제공하는데 최선을 다하여야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호간의 거래에 있어서 어떠한 보증도 제공하지 않습니다. 이용자 상호간 거래 행위에서 발
                              생하는 문제 및 손실에 대해서 회사는 일체의 책임을 부담하지 않으며, 거래 당사자 간에 직접 해결해야 합니
                              다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 17조 회원의 아이디(ID) 및 비밀번호에 대한 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"아이디(ID)"와 "비밀번호"에 관한 관리책임은 "회원"에게 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회원"은 자신의 "아이디(ID)" 및 "비밀번호"를 제3자에게 이용하게 해서는 안됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 자신의 "아이디(ID)" 및 "비밀번호"를 도난 당하거나 제3자가 사용하고 있음을 인지한 경우에는 바로
                              "회사"에 통보하고 "회사"의 안내가 있는 경우에는 그에 따라야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 18조 이용자의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 다음 행위를 하여서는 안됩니다. 만약 다음 각 호와 같은 행위가 확인되면 회사는 해당 "이용자"에
                              게 서비스 이용에 대한 제재를 가할 수 있으며 민형사상의 책임을 물을 수 있습니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">회사 서비스의 운영을 고의 및 과실로 방해하는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">신청 또는 변경 시 허위 내용의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">타인의 정보 도용</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">허위 매물 정보의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">"회사"가 정한 정보 이외의 정보(컴퓨터 프로그램 등) 등의 송신 또는 게시</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 저작권 등 지적재산권에 대한 침해</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 명예를 손상시키거나 업무를 방해하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">외설 또는 폭력적인 메시지, 화상, 음성, 기타 공서양속에 반하는 정보를 공개 또는 게시하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">9)</span>
                                  <span class="sg-text">이용자의 연락처 또는 개인정보를 다른 용도로 사용</span>
                                </li>
                                <li>
                                  <span class="listNum">10)</span>
                                  <span class="sg-text">사기 및 악성 글 등록 등 건전한 거래 문화 활성에 방해되는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">11)</span>
                                  <span class="sg-text">기타 중대한 사유로 인하여 회사가 서비스 제공을 지속하는 것이 부적당하다고 인정하는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 전항의 규정 된 위반 행위를 하는 회원에 대해
                              서비스 일시 중단 등의 조치를 취할 수 있으며, 필요한 경우
                              이에 대한 시정을 요구할 수 있습니다. 특히, 회원이 시정을
                              요구받은 기간 내에 시정을 하지 아니한 경우, 동일한 위반
                              행위를 반복할 경우 또는 다수의 위반 행위가 확인 된 경우
                              에 회사는 회원과의 서비스 이용계약을 해지 할 수 있습니다.
                              단, 이 경우 회사는 회원에게 전화, E-mail, SMS 등의 방법
                              으로 개별 통지합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 회사의 정책에 따라서 회원 간의 차별화된 유료 서비스를 언제든지 제공할 수 있습니다. 만약 회원이
                              비용을 지불하지 않고 사용을 할 경우 "회사"는 특정 회원에게 서비스 중지 및 특정 서비스 제한을 할 수 있습
                              니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 19조 권리의 귀속 및 이용제한</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회원"이 "명당"를 이용하여 작성한 저작물에 대한 저작권 기타 지적 재산권은 "회원"에 귀속합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"은 "회사"에 제공한 콘텐츠에 대하여 “회사”가 다음과 같은 목적과 권한으로 이용하는 것을 허락합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이용 목적 : 회사 서비스 운영 전반, 회사 서비스의 온/오프라인 광고, 회사 서비스 고도화 및 기획, 운영 등을 위한
                                    빅데이터
                                    수집</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">이용 권한 : 회사 서비스 및 회사와 제휴된 서비스에 노출할 수 있고, 해당 노출을 위해 필요한 범위 내에서 일부
                                    이용, 편집 형식의
                                    변경 및 기타 변형하여 이용할 수 있습니다. (사용, 저장, 수정, 복제, 공중송신, 전시, 공표, 공연, 전송, 배포, 방송, 2차적 저작물 작성 등
                                    어떠한 형태로든 이용
                                    가능하며, 이용기간과 지역에는 제한이 없음)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회원"은 본조 2항의 콘텐츠 이용 허락에 대한 권리를 보유해야 합니다. 이에 반하여 발생하는 모든 문제에 대해서는 “회원”이
                              책임을 부담하게
                              됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">"회원"이 작성한 콘텐츠는 제3자의 권리를 침해해서는 아니됩니다. 관련 법령에 위반되는 내용을 포함하는 경우 그로 인한 책임은
                              “회원”이 부담하게
                              되며, 관련 법령이 정한 절차에 따라 게시가 제한될 수 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">서비스에 대한 저작권 및 지적재산권은 “회사”에 귀속됩니다. 단, 회원이 직접 작성한 "콘텐츠" 및 제휴 계약에 따라 제공된
                              저작물 등은
                              제외합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">"이용자"는 서비스를 이용함으로써 얻은 정보 중 "회사"에게 지적 재산권이 귀속된 정보를 회사의 사전 승낙 없이 복제, 송신,
                              출판, 배포, 방송
                              기타 방법에 의하여 영리 목적으로 이용하거나 제3자에게 이용하게 하여서는 안됩니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 20조 책임의 한계 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 무료로 제공하는 정보 및 서비스에 관하여 "개인정보취급방침" 또는 관계 법령의 벌칙, 과태료 규정
                              등 강행 규정에 위배되지 않는 한 원칙적으로 손해를 배상 할 책임이 없습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 천재지변, 불가항력, 서비스용 설비의 보수, 교
                              체, 점검, 공사 등 기타 이에 준하는 사항으로 정보 및 서비
                              스를 제공 할 수 없는 경우에 회사의 고의 또는 과실이 없는
                              한 이에 대한 책임이 면제 됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회사"는 "이용자"의 귀책사유로 인한 정보 및 서비스 이용의 장애에 관한 책임을 지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              “회사”는 “회원”이 게재한 정보, 자료, 사실의 신뢰도, 정
                              확성 등의 내용에 관하여 회사의 고의 또는 중대한 과실이
                              없는 한 책임을 지지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "서비스"에서 제공하는 정보에 대한 신뢰 여부는 전적으로 "이용자" 본인의 책임이며, "회사"는 매물 및 공유사
                              무실 정보를 등록한 "회원"에 의한 사기, 연락 불능 등으로 인하여 발생하는 어떠한 직접, 간접, 부수적, 파생적,
                              징벌적 손해, 손실, 상해 등에 대하여 도덕적, 법적 책임을 부담하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "서비스"를 통하여 노출, 배포, 전송되는 정보를 "이용자"가 이용하여 발생하는 부동산 거래 등에 대하여 "회사"
                              는 어떠한 도덕적, 법적 책임이나 의무도 부담하지 아니합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 "회사"는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모
                              든 직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 21조 손해배상 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스를 이용함에 있어 "회사"의 고의 또는 과실로 인해 손해가 발생한 경우에는 민법 등
                              관련 법령이 규율하는 범위 내에서 그 손해를 배상합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"이 이 약관을 위반하거나 관계 법령을 위반하여 "회사"에 손해가 발생한 경우에는 "회사"에 그 손해를 배
                              상하여야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 22조 분쟁해결</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호 간 분쟁에서 발생하는 문제에 대해서 일체의 책임을 지지 않습니다. "이용자" 상호 간
                              분쟁은 당사자들이 직접 해결을 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자" 상호간에 서비스 이용과 관련하여 발생한 분쟁에 대해 "이용자"의 피해 구제 신청이 있는 경우에는
                              공정 거래 위원회 또는 시, 도지사가 의뢰하는 분쟁 조정 기관의 조정에 따를 수 있습니다.
                            </span>
                          </li>
                        </ol>


                      </section>
                      <section class="sg-agent">
                        <h2>제 23조 재판권 및 준거법</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회사"와 "회원"간 제기된 소송은 대한민국법을 준거법으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"와 "회원"간 발생한 분쟁에 관한 소송은 민사소송법 상의 관할법원에 제소합니다.</span>
                          </li>
                        </ol>
                        <p>본 약관은 2021년 12월 31일부터 적용 합니다.</p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input type="checkbox" id="agree1" class="check_box" name="agree">
                    <label for="agree1">이용약관에 동의합니다</label>
                  </div>
                </div>
                <!-- 개인정보 수집 및 이용동의 -->
                <div class="agree_box">
                  <h3>개인정보 수집 및 이용</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div id="policy04" class="sg-main">
                      <section class="sg-main__title">
                        <h1>개인정보 수집 및 이용 동의</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <p>
                          (주)디노랩스는 서비스 제공을 위하여 아래와 같이 개인정보를 수집 및 이용합니다.
                        </p>
                        <br>
                        <p>
                          정보주체는 본 개인정보의 수집 및 이용에 관한 동의를 거부하실 권리가 있으나, 서비스 제공에 필요한 최소한의 개인정보이므로 동의를 해 주셔야 서비스를 이용하실 수 있습니다.
                        </p>
                        <br>
                        <p>
                          보다 자세한 내용은 회사의 개인정보처리방침을 참조하여 주시기 바랍니다.
                        </p>
                        <br>
                        <p>
                          제공해주시는 개인정보는 '상담 안내를 요청하기 위한 용도'의 서비스 제공 목적으로 수집하며 이외 목적으로는 사용되지 않습니다.
                        </p>
                        <br>
                        <h2>개인정보의 수집 이용 목적</h2>
                        <p>
                          서비스 제공 및 상담, 부정이용 확인 및 방지, 만족도 조사 (고객안심콜 등), 본인·연령확인, 신규서비스 개발, 문의사항 또는 불만·분쟁처리, 맞춤형 서비스 제공, 서비스
                          개선에 활용,
                          계정도용 및 부정거래 방지.
                        </p>
                        <br>
                        <h2>수집하는 개인정보의 항목</h2>
                        <p>
                          연락처 (휴대폰 번호 또는 전화번호)
                        </p>
                        <br>
                        <h2>개인정보의 이용 및 보유기간</h2>
                        <p>
                          서비스 제공 목적 달성 시까지 또는 회원탈퇴 시 즉시 삭제.<br>
                          단, 전자상거래 등에서의 소비자 보호에 관한 법률 및 관계 법령에 따른 보관 의무가 있을 경우 해당 기간 동안 보관함.
                        </p>
                        <br>
                        <p>
                          본 서비스 이용을 위해서 필수적인 동의이므로, 동의를 하지 않으면 해당 서비스를 이용하실 수 없습니다. 동의를 거부하는 경우에도 다른 (주)디노랩스의 서비스의 이용에는
                          영향이 없습니다.
                        </p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input class="check_box" id="agree3" name="agree" type="checkbox">
                    <label for="agree3"> 개인정보 수집 및 이용에 동의합니다</label>
                  </div>
                </div>
                <!-- 위치기반서비스 이용약관 -->
                <div class="agree_box">
                  <h3>위치기반서비스 이용약관</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div id="policy03" class="sg-main">
                      <section class="sg-main__title">
                        <h1>위치기반서비스 이용약관</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <h2>제 1조 목적</h2>
                        <p>
                          이 약관은 (주)디노랩스(이하 "회사"라 한다)이 운영하는 인터넷 사이트 및 모바일 어플리케이션(이하 "명당"라 한다)
                          을 이용하는 고객 사이의 서비스 이용에 관해 필요한 사항을 규정함을 목적으로 합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 2조 정의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">명당: "회사"가 제공하는 위치기반서비스입니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              회사가 제공하는 서비스는 다음과 같습니다.<br>
                              1) 부동산 매물 등에 관한 정보제공 서비스<br>
                              2) 부동산 매물 등록 서비스<br>
                              3) 부동산 중개업소 추천 등 기타 관련 서비스
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">고객: "명당"에 접속하여 서비스를 이용하는 이용자를 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              회원: "명당"에 접속하여 "회사"에 개인정보를 제공하고 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인
                              사용자 회원" 또는 "공인중개사 회원"을 말합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사
                              내부의 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              개인 사용자 회원: 회사가 정한 소정의 절차를 거쳐 회사에 개인정보를 제공하여 회원 가입을 한 자로서, "명당"
                              의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 "명당"의 서비스를 계속적으로 이용할 수 있는 자를 말
                              합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사 내부 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              공인중개사 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 부동산 중개업자로서 "명당"에 매물을 제
                              공할 수 있는 권한을 가진 자를 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">비회원: 회원으로 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</span>
                          </li>
                        </ol>
                        <p>
                          이 약관은 "위치정보의 보호 및 이용 등에 관한 법률" 및 관계 법령 등에서 정하는 바에 따르며 위 항에서 정의되지
                          않은 이 약관상의 용어의 의미는 일반적인 거래 관행에 의합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 3조 계약의 체결 및 해지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "고객"은 회사의 서비스를 이용하고자 하는 경우, 약관의 고지 내용에 따라 개인위치정보 서비스에 가입하게
                              됩니다. 회원의 경우 회원가입 시 동의절차를 밟으며, 비회원인 경우 서비스를 이용하는 동안 이 약관에 동의
                              한 것으로 간주합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "고객"은 계약을 해지하고자 할 때에는 가입 회원탈퇴를 하거나, "회사"의 개인정보보호 담당자에게 이메일을
                              통해 해지신청을 하여야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 4조 서비스의 내용</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "고객"이 등록한 매물의 위치정보만을 "고객"에게 제공하며, 해당 위치정보를 다른 정보와 결합하여
                              개인위치정보로 이용하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              제공되는 "고객"의 매물 위치정보는 해당 스마트폰 등에서 제공합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 위치정보사업자인 이동통신사로부터 위치정보를 전달받아 "명당"의 모바일 단말기 전용 애플리케이
                              션(이하 "애플리케이션")을 통해 아래와 같은 위치기반서비스를 제공합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    접속 위치 제공 서비스: 위치 정보 사용을 승인한 "고객"들의 서비스 최종 접속 위치를 기반으로 서비스 내의 정
                                    보를 지도 위에 혹은 리스트를 통해 제공합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    위치 정보: 모바일 단말기 등의 WPS(Wifi Positioning System), GPS 기반으로 추출된 좌표를 이용하여 "고객"
                                    이 생성하는 지점을 말합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    최종 접속 위치를 활용한 검색 결과 제공 서비스: 정보 검색 요청 시 개인위치정보주체의 현위치를 이용한 서
                                    비스 내의 기능에 따라 제공되는 정보에 대하여 검색 결과를 제시합니다
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    "고객"의 위치 정보의 갱신은 "명당" 실행 시 또는 실행 후, 위치 관련 메뉴 이용 시 이루어지며, "고객"이 갱신
                                    한 사용자의 위치정보를 기준으로 최종 위치를 반영합니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 5조 서비스 이용요금</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스는 기본적으로 무료 서비스 입니다. 어떠한 형태의 유료 기능도 존재하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              무선 서비스 이용 시 발생하는 데이터통신료는 별도이며 가입한 각 이동통신사의 정책에 따릅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 6조 이용시간</h2>
                        <p>
                          "명당"의 이용은 24시간 가능합니다. 단, 시스템 장애, 프로그램 오류 보수, 외부요인 등 불가피한 경우에는 해당 공
                          지를 통해 사전에 통지합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 7조 접속자의 위치정보 이용</h2>
                        <p>
                          "회사"는 "회원"이 약관 등에 동의하는 경우 또는 비회원이 위치관련 메뉴 이용시에 한해 단말기를 통해 수집된 위
                          치정보를 활용하여 정보 및 회원의 게시물을 제공할 수 있습니다.
                        </p>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              약관 등에 동의를 한 회원 또는 비회원이 위치관련 메뉴 사용시 서비스 이용을 위해 본인의 위치를 자의적으로
                              노출하였다고 간주하며 "회사"는 "고객"의 실시간 위치정보를 바탕으로 컨텐츠를 제공합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              장소정보 및 컨텐츠 입력 등 서비스 이용 시 "회원"이 생성한 컨텐츠에 대해 "회사"는 "회원"의 위치에 대한 정
                              보를 저장, 보존하지 않습니다. "회사"는 장소정보 또는 "회원"이 등록한 게시물을 고객의 현재위치를 기반으로
                              추천하기 위해 위치정보를 이용합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 8조 개인위치정보의 이용 또는 제공에 관한 동의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보주체의 동의 없이 당해 개인위치정보주체의 개인위치정보를 제3자에게 제공하지 아니
                              하며, 제3자 제공 "서비스"를 제공하는 경우에는 제공 받는 자 및 제공목적을 사전에 개인위치정보주체에게 고
                              지하고 동의를 받습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보를 개인위치정보주체가 지정하는 제3자에게 제공하는 경우에는 개인위치정보를 수집
                              한 당해 통신단말장치로 매회 개인위치정보주체에게 제공받는 자, 제공 일시 및 제공목적을 즉시 통보합니다.
                              다만, 아래에 해당하는 경우에는 개인위치정보주체가 미리 특정하여 지정한 통신단말장치 또는 전자우편주소
                              등으로 통보합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    개인위치정보를 수집한 당해 통신단말장치가 문자, 음성 또는 영상의 수신기능을 갖추지 아니한 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    가입신청자가 이전에 회원 자격을 상실한 적이 있는 경우(다만 회원 자격 상실 후 회사가 필요하다고 판단하여 회원 재
                                    가입에 대한 승낙을 얻은 경우에는 예외로 합니다.)
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    개인위치정보주체가 개인위치정보를 수집한 당해 통신단말장치 외의 통신단말장치 또는 전자우편주소 등으로
                                    통보할 것을 미리 요청한 경우
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 본 약관의 목적 외 다른 용도로 개인위치정보의 이용 또는 제공사실 확인자료를 기록하거나 보존하지 아니합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 9조 개인위치정보주체의 권리</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">개인위치정보주체는 개인위치정보의 이용•제공에 대한 동의의 전부 또는 일부를 철회할 수 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              개인위치정보주체는 언제든지 개인위치정보의 이용 또는 제공의 일시적인 중지를 요구할 수 있습니다. 이 경
                              우 "회사"는 요구를 거절하지 아니하며, 이를 위한 기술적 수단을 갖추고 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              개인위치정보주체는 "회사"에 대하여 아래 자료의 열람 또는 고지를 요구할 수 있고, 당해 자료에 오류가 있는
                              경우에는 그 정정을 요구할 수 있습니다. 이 경우 "회사"는 정당한 이유 없이 요구를 거절하지 아니합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">개인위치정보주체에 대한 위치정보 이용, 제공사실 확인자료</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    개인위치정보주체의 개인위치정보가 위치정보의 보호 및 이용 등에 관한 법률 또는 다른 법령의 규정에 의하
                                    여 제3자에게 제공된 이유 및 내용
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보주체가 동의의 전부 또는 일부를 철회한 경우에는 지체 없이 수집된 개인위치정보 및 위
                              치정보 이용제공사실 확인자료(동의의 일부를 철회하는 경우에는 철회하는 부분의 개인위치정보 및 위치정보
                              이용제공사실 확인자료에 한합니다)를 파기합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              개인위치정보주체는 제1항 내지 제3항의 권리행사를 위하여 이 약관 제15조의 연락처를 이용하여 "회사"에 요구할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 10조 서비스의 변경 및 중지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 위치정보사업자의 정책변경 등과 같이 "회사"의 제반 사정 또는 법률상의 장애 등으로 서비스를 유지
                              할 수 없는 경우, 서비스의 전부 또는 일부를 제한, 변경하거나 중지할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              제1항에 의한 서비스 중단의 경우에는 "회사"는 사전에 인터넷 및 서비스 화면 등에 공지하거나 개인위치정보
                              주체에게 통지합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 11조 위치정보관리책임자의 지정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 위치정보를 관리, 보호하고, 거래 시 고객의 개인위치정보로 인한 불만을 원활히 처리할 수 있는 위치
                              정보관리책임자를 지정해 운영합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              위치정보관리책임자는 위치기반서비스를 제공하는 부서의 부서장으로서 구체적인 사항은 본 약관의 부칙에
                              따릅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 12조 손해배상 및 면책</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              개인위치정보주체는 "회사"의 다음 각 호에 해당하는 행위로 손해를 입은 경우에 "회사"에 대해 손해배상을 청
                              구할 수 있습니다. 이 경우 개인위치정보주체는 "회사"의 고의 또는 과실이 있음을 직접 입증하여야 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    법령에서 허용하는 경우를 제외하고 이용자 또는 개인위치정보주체의 동의 없이 위치정보를 수집, 이용하는 행위
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">개인위치정보의 누출, 변조, 훼손 등의 행위</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 천재지변 등 불가항력적인 사유나 "이용자"의 고의 또는 과실로 인하여 발생한 때에는 손해를 배상하지 아니합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"가 망사업자의 통신환경에 따라 발생할 수 있는 오차 있는 위치정보를 이용함으로써 "이용
                              자" 및 제3자가 입은 손해에 대하여는 배상하지 아니합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 13조 약관의 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"가 약관을 변경하고자 할 때는 사전에 공지사항을 통해 변경내용을 게시합니다. 이에 관해 "회원"이 이의
                              를 제기할 경우 "회사"는 "이용자"에게 적절한 방법으로 약관 변경내용을 통지하였음을 확인해 주어야 합니다.
                              다만, 법령의 개정이나 제도의 개선 등으로 인하여 긴급히 약관을 변경 할 때는 해당 서비스를 이용하는 통신
                              단말장치에 즉시 이를 게시하고 가입 시 등록된 "회원"의 전자우편 주소로 통지하여야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"은 제1항의 규정에 따른 약관의 변경내용이 게시되거나 통지된 후부터 변경되는 약관의 시행일 전 영업
                              일까지 계약을 해지할 수 있습니다. 단 전단의 기간 안에 "회원"의 이의가 "회사"에 도달하지 않으면 "회원"이
                              이를 승인한 것으로 봅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 14조 분쟁 해결</h2>
                        <p>
                          "회사"는 위치정보와 관련된 분쟁의 당사자간 협의가 이루어지지 아니하거나 협의를 할 수 없는 경우에는 전기통
                          신기본법의 규정에 따라 방송통신위원회에 재정을 신청하거나 정보통신망이용촉진및정보보호등에관한 법률의 규
                          정에 의한 개인정보분쟁조정위원회에 조정을 신청할 수 있습니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 15조 사업자 정보 및 위치정보관리책임자 지정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              회사의 상호, 주소, 전화번호 그 밖의 연락처는 다음과 같습니다.
                              <dl>
                                <dt>상호:</dt>
                                <dd>(주)디노랩스</dd>
                                <dt>주소:</dt>
                                <dd>광주광역시 동구 금남로4가 6<br>광주AI창업캠프 2호점 402호<br>
                                  (금남로 193-12)</dd>
                                <dt>전화번호:</dt>
                                <dd>070-8633-8942</dd>
                                <dt>이메일:</dt>
                                <dd>denolabs@naver.com</dd>
                              </dl>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              위치정보관리책임자는 다음과 같이 지정합니다.
                              <dl>
                                <dt>성명:</dt>
                                <dd>이성희</dd>
                                <dt>직위:</dt>
                                <dd>CTO</dd>
                                <dt>전화번호:</dt>
                                <dd>070-8633-8942</dd>
                                <dt>이메일:</dt>
                                <dd>denolabs@naver.com</dd>
                              </dl>
                            </span>
                          </li>
                        </ol>
                        <p>본 약관은 2022년 1월 1일부터 적용 합니다.</p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input type="checkbox" id="agree2" class="check_box" name="agree">
                    <label for="agree2">이용약관에 동의합니다</label>
                  </div>
                </div>
                <!-- 개인정보 제3자 제공 동의 -->
                <div class="agree_box">
                  <h3>개인정보 제3자 제공 동의</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div id="policy05" class="sg-main">
                      <section class="sg-main__title">
                        <h1>개인정보 제3자 제공 동의</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <p>
                          (주)디노랩스는 서비스 제공을 위하여 아래와 같이 개인정보를 수집 및 이용합니다.
                        </p>
                        <br>
                        <p>
                          정보주체는 본 개인정보의 수집 및 이용에 관한 동의를 거부하실 권리가 있으나, 서비스 제공에 필요한 최소한의 개인정보이므로 동의를 해 주셔야 서비스를 이용하실 수 있습니다.
                        </p>
                        <br>
                        <p>
                          보다 자세한 내용은 회사의 개인정보처리방침을 참조하여 주시기 바랍니다.
                        </p>
                        <br>
                        <h2>개인정보 제공받는 자</h2>
                        <p>
                          명당(주식회사 디노랩스), <script>
                            document.write(getParameterByName("agent"))
                          </script>(주)명당인부동산중개법인
                        </p>
                        <br>
                        <h2>제공 정보</h2>
                        <p>
                          휴대폰 번호
                        </p>
                        <br>
                        <h2>목적</h2>
                        <p>
                          이용자가 문의한 서비스 제공
                        </p>
                        <br>
                        <h2>보유 및 이용기간</h2>
                        <p>
                          서비스 목적 달성 시까지. 단, 전자상거래 등에서의 소비자 보호에 관한 법률 및 관계 법령에 따른 보관 의무가 있을 경우 해당 기간 동안 보관함.
                        </p>
                        <br>
                        <p>
                          본 서비스 이용을 위해서 필수적인 동의이므로, 동의를 하지 않으면 해당 서비스를 이용하실 수 없습니다. 동의를 거부하는 경우에도 다른 (주)디노랩스 서비스의 이용에는 영향이
                          없습니다.
                        </p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input class="check_box" id="agree4" name="agree" type="checkbox">
                    <label for="agree4"> 공인중개사 및 파트너 회원 서비스 이용 약관에 동의합니다</label>
                  </div>
                </div>
              <? } else if ($type == 'C') { ?>
                <!-- 이용약관 -->
                <!-- 이용약관 -->
                <div class="agree_box">
                  <h3>이용약관</h3>
                  <!-- textbox -->
                  <div class="text_box box1">
                    <div id="policy01" class="sg-main">
                      <section class="sg-main__title">
                        <h1>이용약관</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <h1>제 1장 총칙</h1>
                        <h2>제 1조 목적</h2>
                        <p>
                          이 약관은 (주)디노랩스(이하 "회사"라 한다)이 운영하는 인터넷 사이트 및 모바일 어플리케이션(이하 "명당"라 한다)
                          에서 제공하는 제반 서비스의 이용과 관련하여 "회사"와 "이용자"의 권리, 의무 및 책임 사항, 기타 필요한 사항을
                          규정함을 목적으로 합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 2조 정의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              명당: "회사"가 컴퓨터 등 정보통신설비를 이용하여 서비스를 제공할 수 있도록 설정한 가상의 영업장을 말하며,
                              아울러 인터넷 사이트 및 모바일 애플리케이션을 운영하는 사업자의 의미로도 사용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              이용자: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사 회원"
                              또는 "비즈니스 회원" 또는 "비회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              회원: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사
                              회원", "비즈니스 회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              개인 사용자 회원: 회사가 정한 소정의 절차를 거쳐 회사에 개인정보를 제공하여 회원 가입을 한 자로서, "명당"
                              의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 "명당"의 서비스를 계속적으로 이용할 수 있는 자를 말
                              합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사 내부 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              공인중개사 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 부동산 중개업자로서 "명당"에 매물을 제
                              공할 수 있는 권한을 가진 자를 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              비즈니스 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 공유오피스 담당자와 법인 담당자로서 "명당"에
                              매물을 제공할 수 있는 권한을 가진 자를 말합니다. 단, 공유오피스 담당자로서 비즈니스 회원의 권한은 공유오피스
                              서비스에 한정합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">비회원: 회원으로 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              아이디(ID): 회원의 식별과 서비스 이용을 위하여 회원이 설정하고 회사가 승인한 이메일주소 또는 문자나 숫
                              자의 조합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              비밀번호: 회원의 동일성 확인과 회원정보의 보호를 위하여 회원이 설정하고 회사가 승인한 문자나 숫자의 조
                              합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              게시판: 그 명칭, 형태, 위치와 관계없이 회원 및 비회원 이용자에게 공개할 목적으로 부호•문자•음성•음향
                              •화상•동영상 등의 정보 (이하 "게시물"이라 합니다)를 회원이 게재할 수 있도록 회사가 제공하는 서비스 상
                              의 가상공간을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">컨텐츠: "회원"이 게재한 모든 글, 사진, 동영상, 회원소개 등을 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">12.</span>
                            <span class="sg-text">
                              매물관리규정: "회사"가 별도로 규정하여 공개한 부동산 매물 등록 시 회원의 준수사항 및 위반 시 제재 규정을
                              의미합니다.
                            </span>
                          </li>
                        </ol>
                        <p>위 항에서 정의되지 않은 이 약관상의 용어의 의미는 일반적인 거래 관행에 의합니다.</p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 3조 약관 등의 명시와 설명 및 개정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 본 약관의 내용을 이용자가 쉽게 알 수 있도록 "명당"의 인터넷 사이트 및 모바일 애플리케이션에 게
                              시합니다. 다만, 약관의 내용은 이용자가 연결 화면을 통하여 볼 수 있도록 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "약관 규제에 관한 법률", "정보통신망 이용촉진 및 정보보호 등에 관한 법률" 등 관련법을 위배하지
                              않는 범위에서 본 약관을 개정할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 약관을 개정할 경우에는 적용 일자 및 개정 사유를 명시하여 이용자가 알기 쉽도록 표시하여 공지합
                              니다. 변경된 약관은 공지된 시점부터 그 효력이 발생하며, 이용자는 약관이 변경된 후에도 본 서비스를 계속
                              이용함으로써 변경 후의 약관에 대해 동의를 한 것으로 간주됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 4조 약관의 해석</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 서비스운영을 위해 별도의 운영정책을 마련하여 운영할 수 있으며, "회사"는 "명당" 인터넷 사이트 및
                              모바일 애플리케이션에 운영정책을 사전 공지 후 적용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">본 약관에서 정하지 아니한 사항이나 해석에 대해서는 별도의 운영정책, 관계법령 또는 상관례에 따릅니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 5조 서비스의 제공 및 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 다음과 같은 서비스를 제공합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">부동산 매물 등에 관한 정보 제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">부동산 매물 등록 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">부동산 매물 매출 관련 서비스 제공</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">부동산 중개업소 추천 등 기타 관련 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">공유사무실 등에 관한 정보제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">기타 "명당"의 이용자를 위하여 제공하는 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">유료로 제공하는 광고 상품 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">유료로 제공하는 부가 서비스</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스는 원칙적으로 상품 중도 변경, 일시중지, 양도양수가 불가합니다. 단, 이용자의 귀책사유가 아님을 증명 할 수 있을 경우 예외적으로 처리될
                              수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스의 내용을 기술적 사양의 변경 등의 이유로 변경할 경우에는 그 사유를
                              이용자에게 통지 하거나, 이용자가 알아볼 수 있도록 공지사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 6조 서비스의 중단</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 컴퓨터 등 정보 통신 설비의 보수 점검, 교체 및 고장, 통신의 두절, 천재지변 등의 사유가 발생한 경우
                              에는 서비스의 제공을 제한하거나 일시적으로 중단할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              사업종목의 전환, 사업의 포기, 업체 간의 통합 등의 이유로 서비스를 제공할 수 없게 되는 경우에는 회사는 이
                              용자에게 통지하거나 이용자가 알아볼 수 있도록 공지 사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 7조 회원에 대한 통지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 이메일, 이동전화 단문메시지서비스(SMS), 푸시알림(App push)등으로 회원에게 통지할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 불특정다수 회원에 대한 통지의 경우 공지사항으로 게시함으로써 개별 통지에 갈음 할 수 있습니다. 다
                              만, 회원 본인의 거래와 관련하여 중대한 영향을 미치는 사항에 대하여는 개별통지를 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 2장 이용계약 및 정보보호</h1>
                        <h2>제 8조 회원가입 및 회원정보의 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 회사가 정한 가입 양식에 따라 회원 정보를 기입한 후 이 약관에 동의한다는 의사표시를 함으로서
                              회원 가입을 신청합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 제1항과 같이 회원으로 가입할 것을 신청한 이용자 중 다음 각 호에 해당하지 않는 한 "개인 사용자 회
                              원" 또는 "공인중개사 회원", "비즈니스 회원"으로 등록합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">등록 내용에 허위, 기재누락, 오기가 있는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    가입 신청자가 이전에 회원 자격을 상실한 적이 있는 경우(다만 회원 자격 상실 후 회사가 필요하다고 판단하
                                    여 회원 재가입에 대한 승낙을 얻은 경우에는 예외로 합니다.)
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회사"로부터 회원 자격 정지 조치 등을 받은 회원이 그 조치 기간 중에 이용 계약을 임의 해지하고 재가입 신
                                    청을 하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">기타 회원으로 등록하는 것이 "명당"의 기술상 현저히 지장이 있다고 판단되는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">
                                    본 약관에 위배되거나 위법 또는 부당한 이용신청임이 확인된 경우 및 회사가 합리적인 판단에 의하여 필요하
                                    다고 인정하는 경우
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">회원 가입 계약의 성립 시기는 "회사"의 승낙이 "회원"에게 도달한 시점으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"은 회원 가입 신청 및 이용시 기재한 사항이 변경되었을 경우 온라인으로 수정을 하거나 전자우편 기타 방법으로 회사에 그 변경사항을 알려야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">제4항의 변경 사항을 "회사"에 알리지 않아 발생한 불이익에 대하여 회사는 책임지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              회원 가입은 반드시 본인의 진정한 정보를 통하여 가입할 수 있으며 "회사"는 "회원"이 등록한 정보에 대하여 확
                              인 조치를 할 수 있습니다. "회원"은 "회사"의 확인 조치에 대하여 적극 협력하여야 하며, 만일 이를 준수하지 아니
                              할 경우 "회사"는 등록한 정보가 부정한 것으로 간주하여 처리할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사"는 "회원"을 등급 별로 구분하여 이용시간, 이용회수, 서비스 메뉴, 매물 등록 건 수 등을 세분하여 서비스
                              이용에 차등을 둘 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회원"은 1인 1계정에 한하여 서비스 이용이 가능하며, 중복 가입 시 서비스 이용이 불가할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 9조 이용 계약의 종료</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              회원의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회원"은 회사에 언제든지 해지 의사를 통지할 수 있고 회사는 특별한 사유가 없는 한 이를 즉시 수락하여야 합
                                    니다. 다만, "회원"은 해지의사를 통지하기 전에 모든 진행중인 절차를 완료, 철회 또는 취소해야만 합니다. 이 경우
                                    철회 또는 취소로 인한 불이익은 회원 본인이 부담하여야 합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회원"이 발한 의사표시로 인해 발생한 불이익에 대한 책임은 회원 본인이 부담하여야 하며, 이용계약이 종료되
                                    면 "회사"는 "회원"에게 부가적으로 제공한 각종 혜택을 회수할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회원"의 의사로 이용계약을 해지한 후, 추후 재이용을 희망할 경우에는 재이용 의사가 "회사"에 통지되고, 이에
                                    대한 "회사"의 승낙이 있는 경우에만 서비스 재이용이 가능합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에 따라 해지를 한 "회원"은 이 약관이 정하는 회원가입절차와 관련조항에 따라 신규 회원으로 다시 가입
                                    할 수 있습니다. 다만, "회원"이 중복참여가 제한된 이벤트 중복 참여 등 부정한 목적으로 회원탈퇴 후 재이용을 신
                                    청하는 경우 "회사"는 가입을 일정기간 동안 제한할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">본 항에 따라 해지를 한 이후에는 재가입이 불가능하며, 모든 가입은 신규가입으로 처리됩니다.</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              회사의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회사"는 다음과 같은 사유가 발생하거나 확인된 경우 이용계약을 해지할 수 있습니다.
                                    <ol>
                                      <li>
                                        <span class="listNum">(1)</span>
                                        <span class="sg-text">
                                          다른 회원의 권리나 명예, 신용 기타 정당한 이익을 침해하거나 대한민국 법령 또는 공서양속에 위배되는 행위
                                          를 한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(2)</span>
                                        <span class="sg-text">
                                          "회사"가 제공하는 서비스의 원활한 진행을 방해하는 행위를 하거나 시도한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(3)</span>
                                        <span class="sg-text">제 8조 제 2항의 승낙거부 사유가 추후 발견된 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(4)</span>
                                        <span class="sg-text">"회사"가 정한 서비스 운영정책을 이행하지 않거나 위반한 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(5)</span>
                                        <span class="sg-text">기타 "회사"가 합리적인 판단에 기하여 서비스의 제공을 거부할 필요가 있다고 인정할 경우</span>
                                      </li>
                                    </ol>
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 해지를 하는 경우 "회사"는 "회원"에게 이메일, 전화, 기타의 방법을 통하여 해지 사유를 밝혀 해지 의
                                    사를 통지합니다. 이용계약은 "회사"의 해지의사를 "회원"에게 통지한 시점에 종료됩니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료될 시에는 "회사"는 "회원"에게 부가적으로 제공한 각종혜택을 회수
                                    할 수 있습니다. 이용계약의 종료와 관련하여 발생한 손해는 이용계약이 종료된 해당 회원이 책임을 부담하여야 하
                                    고, "회사"는 일체의 책임을 지지 않습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료된 경우에는, "회원"의 재이용 신청에 대하여 "회사"는 이에 대한 승
                                    낙을 거절할 수 있습니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              이용계약의 종료시, 제공된 서비스에 대한 환불은 본 규정 제15조에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 계약을 해지하는 경우, 관련법 및 "개인정보취급방침"에 따라 "회사"가 회원정보를 보유하는 경우를 제외하고는 해지 즉시 "회원"의 모든 데이터는
                              소멸됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 10조 개인정보보호</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 회원가입시 서비스 제공에 필요한 최소한의 정보를 수집합니다. 다음 사항을 필수사항으
                              로 하며 그 외 사항은 선택사항으로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이메일주소</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">비밀번호</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">휴대폰 번호(부동산 매물등록 서비스, 공유사무실 등록서비스 및 신고기능을 이용하는 회원인 경우)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"가 "이용자"의 개인식별이 가능한 개인정보를 수집하는 때에는 반드시 당해 이용자의 동의를 받습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              제공된 개인정보는 당해 이용자의 동의 없이 목적 외의 이용이나 제3자에게 제공하지 않습니다. 다만, 다음의
                              경우에는 예외로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">도용방지를 위하여 본인확인에 필요한 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">법률의 규정 또는 법률에 의하여 필요한 불가피한 사유가 있는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회사"가 제2항과 제3항에 의해 "이용자"의 동의를 받아야 하는 경우에는 개인정보관리 책임자의 신원(소속,
                              성명 및 전화번호, 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에 대한 정보제공 관련사항(제공받은 자,
                              제공목적 및 제공할 정보의 내용) 등 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 제22조 제2항이 규정
                              한 사항을 미리 명시하거나 고지해야 하며 이용자는 언제든지 이 동의를 철회할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 개인정보를 보호하기 위해 "개인정보취급방침"을 수립하고 개인정보보호책임자를 지정하
                              여 이를 게시하고 운영합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "이용자"는 언제든지 "회사"가 갖고 있는 자신의 개인정보에 대해 열람 및 오류정정을 요구할 수 있으며 "회사"
                              는 이에 대해 지체 없이 필요한 조치를 취할 의무를 집니다. 이용자가 오류의 정정을 요구한 경우에 "회사"는
                              그 오류를 정정할 때까지 당해 개인정보를 이용하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사" 또는 그로부터 개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받은 목적을 달성한 때에는 당해 개인정보를 지체 없이 파기합니다. 다만, 아래의
                              경우에는 회원 정보를
                              보관합니다. 이 경우 회사는 보 관하고 있는 회원 정보를 그 보관의 목적으로만 이용합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우 "회사"는 관계법령에서 정한 일정한 기간 동안 회원
                                    정보를
                                    보관합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 이용계약을 해지하거나 "회사"로부터 서비스 이용정지조치를 받은 회원에 대해서는 재가입에 대한 승낙거부사유가 존재하는지 여부를 확인하기 위한
                                    목적으로 이용계약종료
                                    후 5년간 성명, 이메일주소, 전화번호를 비롯하여 이용계약 해지와 서비스 이용정지와 관련된 정보 등의 필요정보를 보관합니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회사"는 새로운 업체가 제휴사 또는 제휴영업점의 지위를 취득할 경우 제7조 2항에서 정한 것과 같은 방법을
                              통하여 공지합니다. 이 때 회원이 별도의 이의제기를 하지 않을 경우 "명당" 서비스 제공이라는 필수적인 목적
                              을 위해 해당 개인 정보 제공 및 활용에 동의한 것으로 간주 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              모든 "이용자"는 "명당"로부터 제공받은 정보를 다른 목적으로 이용하거나 타인에게 유출 또는 제공해서는 안
                              되며, 위반 사용으로 인한 모든 책임을 부담해야 합니다. 또한 "회원"은 자신의 개인정보를 책임 있게 관리하여
                              타인이 회원의 개인정보를 부정하게 이용하지 않도록 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              "회사"는 "회원"의 개인정보를 보호하기 위해 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 상의 개인정
                              보 유효기간제도에 따라 1년간 미접속한 회원의 개인정보를 파기 또는 분리하여 별도로 저장/관리하며(휴면계
                              정), "회원"의 별도의 요청이 없는 한 사용이 제한됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">
                              회사”는 등기변동 알림서비스를 신청한 “회원”에게 그와 관련된 비광고성 정보를 카카오톡 알림톡으로 통지
                              할 수 있으며, 만약 알림톡 수신이 불가능하거나 해당 회원이 수신 차단한 경우에는 일반 문자 메시지로 통지할
                              수 있습니다. 다만, 와이파이 아닌 이동통신망으로 접속시 알림톡 수신 중 데이터요금이 발생할 수 있습니다.
                              회원”이 알림톡과는 다른 방식으로 정보 수신을 원하시면 알림톡을 차단할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 3장 서비스의 이용</h1>
                        <h2>제 11조 부동산 매물 및 공유사무실 등에 관한 정보제공 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 및 공유사무실 등에 관한 정보제공 서비스는 "회사"가 이용자 스스로 해당 정보를 확인 및 이용할
                              수 있도록 관련 정보를 제공하는 것입니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 “명당” 인터넷 사이트 및 모바일 애플리케이션
                              내에서 제공하는 모든 정보에 대해서 정확성이나 신뢰성이
                              있는 정보를 제공하기 위해 노력하며, 신고받은 허위매물 정
                              보의 삭제 조치를 하는 등의 서비스 관리자로서의 책임을 부
                              담합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 "명당" 인터넷 사이트 및 모바일 애플리케이션을 통해 제공되는 정보의 내용을 수정할 의무를 지지
                              않으나, 필요에 따라 개선할 수는 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 12조 부동산 매물 및 공유사무실 등록 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 등록 및 공유사무실 등록 서비스는 "회원"이 매물정보(부동산 거래정보 및 거래 물건에 대한 다양
                              한 부가정보)와 회원 연락처(회원의 이메일 주소 및 휴대폰 번호), 공유사무실 정보(공유사무실 정보 및 다양한
                              부가정보)와 회원 연락처(회원의 이메일 주소 및 전화번호)를 직접 "명당" 인터넷 사이트 및 모바일 애플리케
                              이션에 등록하여 이용자에게 노출할 수 있는 것을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실의 노출순
                              서 및 영역의 추가 등에 대한 결정 권한을 갖고 있습니다. 또
                              한, “회사”는 사전에 회원의 개별 동의를 구한 경우 “회원”의
                              매물정보 및 공유사무실 정보 등을 “명당” 인터넷 사이트 및
                              모바일 애플리케이션 이외의 다른 인터넷 사이트 등에 노출
                              할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실 정보에 대
                              해 등록 후 최대 7일 이내에 진위 여부를 확인하며, 진위 여
                              부 확인 즉시 해당 매물 및 공유사무실을 노출합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 등록한 정보가 실제 정보와 불일치 하는 경우 "회사"는 "회원"이 가입시 제공한 전화번호 또는 이메일
                              을 통해 "회원"에게 매물정보의 수정을 요청합니다. "회사"가 "회원"이 제공한 연락수단으로 2회 이상 연락하
                              였음에도 불구하고 연락이 되지 않을 경우의 책임은 "회원"에게 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              전항에 따른 "회사"의 정당한 정보 수정 요청에도 불구하고 "회원"이 24시간 이내에 정보(거래완료 혹은 노출
                              종료와 같은 매물상태 변경 포함)를 수정하지 않을 경우, 회사는 해당 매물 및 공유사무실 정보의 노출을 중지
                              하고 "회원"의 서비스 이용을 제한 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "회사"는 "명당"에 등록된 매물 및 공유사무실 중 사회통념, 관례 및 회사의 합리적인 판단에 의하여 거래가 부
                              적합하다고 판단되는 경우 이의 삭제를 요청하거나 직권으로 삭제할 수 있으며 해당 회원의 서비스 이용을 정
                              지 혹은 탈퇴시킬 수 있습니다. "명당"에 거래부적합 부동산 매물 및 공유사무실을 등록할 경우, 거래부적합 매
                              물에 대한 법적인 책임은 해당 등록자에게 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 13조 부동산 중개업소 및 공유사무실 추천 등 기타 관련 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 편의를 위해 부동산 중개업소와 공유사무실을 "이용자"에게 추천할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 회사는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모든
                              직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 14조 정보의 제공 및 광고의 게재</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스 이용 중 필요하다고 인정되는 다양한 정보를 서비스 내 공지사항, 서비스 화면, 전자
                              우편 등의 방법으로 "회원"에게 제공 할 수 있습니다. 다만, "회원"은 관련법에 따른 거래 관련 정보 및 고객문
                              의 등에 대한 답변 등을 제외하고는 언제든지 위 정보 제공에 대하여 수신 거절을 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 서비스 운영과 관련하여 회사가 제공하는 서비스의 화면 및 홈페이지 등에 광고를 게재할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 15조 환불 규정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회원"이 계약 상품 개시 후 환불 요청시 개시일로부터 경과기간에 해당하는 상품 원가 금액과 총 결제금액의 10% 위약금을 공제 한 후 그 나머지를 환급합니다.
                              "공인중개사 회원"이
                              중개업을 폐업 신고한 후 환불 요청하는 경우도 같습니다. 단, 상품 계약일로부터 7일 이내 청약철회 요청 시 위약금 없이 상품 개시일로부터 경과기간에 해당하는 상품
                              원가 금액만
                              공제하고 그 나머지를 환급합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              신용카드로 결제한 "회원"이 카드 승인일로부터 365일이내에 환불을 요청할 경우 환불금액이 부분취소처리 됩니다. 단, 그 외의 경우에는 기존에 결제하였던 내역을 전액
                              취소하며 취소
                              시점에 따라 1항에 의거한 환불공제 금액을 재승인 합니다. 이 경우 구매 취소 시점과 해당 카드사의 환불 처리기준에 따라 취소금액의 환급 방법과 환급일은 다소 차이가
                              있을 수 있으며,
                              사용한 신용카드의 환불 정책은 해당 카드사 정책에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 타인의 신용카드 또는 휴대전화번호를 도용하여 부당한 이익을 편취하였다고 볼 수 있는 합리적 사유가 있는 경우 "회사"는 "회원"에게 소명 자료를 요청하고
                              환불을 보류할 수
                              있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"의 개인정보도용 및 결제사기로 인한 환불요청 또는 결제자의 개인정보 요구는 법률이 정한 경우 외에는 거절될 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              위약금과 사용일수 금액의 총합이 결제한 금액보다 클 경우 환불이 불가합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              본 약관에서 정하지 않은 환불에 관한 사항은 전자상거래 등에서의 소비자보호에 관한 법률 등 관련 법령, 지침 또는 상관례에 의합니다.
                            </span>
                          </li>
                        </ol>
                      </section>

                      <section class="sg-agent">
                        <h1>제 4장 책임</h1>
                        <h2>제 16조 회사의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 법령과 이 약관이 금지하거나 공서양속에 반하는 행위를 하지 않으며 이 약관이 정하는 바에 따라 지
                              속적이고, 안정적으로 이용자에게 서비스를 제공하는데 최선을 다하여야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호간의 거래에 있어서 어떠한 보증도 제공하지 않습니다. 이용자 상호간 거래 행위에서 발
                              생하는 문제 및 손실에 대해서 회사는 일체의 책임을 부담하지 않으며, 거래 당사자 간에 직접 해결해야 합니
                              다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 17조 회원의 아이디(ID) 및 비밀번호에 대한 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"아이디(ID)"와 "비밀번호"에 관한 관리책임은 "회원"에게 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회원"은 자신의 "아이디(ID)" 및 "비밀번호"를 제3자에게 이용하게 해서는 안됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 자신의 "아이디(ID)" 및 "비밀번호"를 도난 당하거나 제3자가 사용하고 있음을 인지한 경우에는 바로
                              "회사"에 통보하고 "회사"의 안내가 있는 경우에는 그에 따라야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 18조 이용자의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 다음 행위를 하여서는 안됩니다. 만약 다음 각 호와 같은 행위가 확인되면 회사는 해당 "이용자"에
                              게 서비스 이용에 대한 제재를 가할 수 있으며 민형사상의 책임을 물을 수 있습니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">회사 서비스의 운영을 고의 및 과실로 방해하는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">신청 또는 변경 시 허위 내용의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">타인의 정보 도용</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">허위 매물 정보의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">"회사"가 정한 정보 이외의 정보(컴퓨터 프로그램 등) 등의 송신 또는 게시</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 저작권 등 지적재산권에 대한 침해</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 명예를 손상시키거나 업무를 방해하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">외설 또는 폭력적인 메시지, 화상, 음성, 기타 공서양속에 반하는 정보를 공개 또는 게시하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">9)</span>
                                  <span class="sg-text">이용자의 연락처 또는 개인정보를 다른 용도로 사용</span>
                                </li>
                                <li>
                                  <span class="listNum">10)</span>
                                  <span class="sg-text">사기 및 악성 글 등록 등 건전한 거래 문화 활성에 방해되는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">11)</span>
                                  <span class="sg-text">기타 중대한 사유로 인하여 회사가 서비스 제공을 지속하는 것이 부적당하다고 인정하는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 전항의 규정 된 위반 행위를 하는 회원에 대해
                              서비스 일시 중단 등의 조치를 취할 수 있으며, 필요한 경우
                              이에 대한 시정을 요구할 수 있습니다. 특히, 회원이 시정을
                              요구받은 기간 내에 시정을 하지 아니한 경우, 동일한 위반
                              행위를 반복할 경우 또는 다수의 위반 행위가 확인 된 경우
                              에 회사는 회원과의 서비스 이용계약을 해지 할 수 있습니다.
                              단, 이 경우 회사는 회원에게 전화, E-mail, SMS 등의 방법
                              으로 개별 통지합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 회사의 정책에 따라서 회원 간의 차별화된 유료 서비스를 언제든지 제공할 수 있습니다. 만약 회원이
                              비용을 지불하지 않고 사용을 할 경우 "회사"는 특정 회원에게 서비스 중지 및 특정 서비스 제한을 할 수 있습
                              니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 19조 권리의 귀속 및 이용제한</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회원"이 "명당"를 이용하여 작성한 저작물에 대한 저작권 기타 지적 재산권은 "회원"에 귀속합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"은 "회사"에 제공한 콘텐츠에 대하여 “회사”가 다음과 같은 목적과 권한으로 이용하는 것을 허락합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이용 목적 : 회사 서비스 운영 전반, 회사 서비스의 온/오프라인 광고, 회사 서비스 고도화 및 기획, 운영 등을 위한
                                    빅데이터
                                    수집</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">이용 권한 : 회사 서비스 및 회사와 제휴된 서비스에 노출할 수 있고, 해당 노출을 위해 필요한 범위 내에서 일부
                                    이용, 편집 형식의
                                    변경 및 기타 변형하여 이용할 수 있습니다. (사용, 저장, 수정, 복제, 공중송신, 전시, 공표, 공연, 전송, 배포, 방송, 2차적 저작물 작성 등
                                    어떠한 형태로든 이용
                                    가능하며, 이용기간과 지역에는 제한이 없음)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회원"은 본조 2항의 콘텐츠 이용 허락에 대한 권리를 보유해야 합니다. 이에 반하여 발생하는 모든 문제에 대해서는 “회원”이
                              책임을 부담하게
                              됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">"회원"이 작성한 콘텐츠는 제3자의 권리를 침해해서는 아니됩니다. 관련 법령에 위반되는 내용을 포함하는 경우 그로 인한 책임은
                              “회원”이 부담하게
                              되며, 관련 법령이 정한 절차에 따라 게시가 제한될 수 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">서비스에 대한 저작권 및 지적재산권은 “회사”에 귀속됩니다. 단, 회원이 직접 작성한 "콘텐츠" 및 제휴 계약에 따라 제공된
                              저작물 등은
                              제외합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">"이용자"는 서비스를 이용함으로써 얻은 정보 중 "회사"에게 지적 재산권이 귀속된 정보를 회사의 사전 승낙 없이 복제, 송신,
                              출판, 배포, 방송
                              기타 방법에 의하여 영리 목적으로 이용하거나 제3자에게 이용하게 하여서는 안됩니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 20조 책임의 한계 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 무료로 제공하는 정보 및 서비스에 관하여 "개인정보취급방침" 또는 관계 법령의 벌칙, 과태료 규정
                              등 강행 규정에 위배되지 않는 한 원칙적으로 손해를 배상 할 책임이 없습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 천재지변, 불가항력, 서비스용 설비의 보수, 교
                              체, 점검, 공사 등 기타 이에 준하는 사항으로 정보 및 서비
                              스를 제공 할 수 없는 경우에 회사의 고의 또는 과실이 없는
                              한 이에 대한 책임이 면제 됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회사"는 "이용자"의 귀책사유로 인한 정보 및 서비스 이용의 장애에 관한 책임을 지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              “회사”는 “회원”이 게재한 정보, 자료, 사실의 신뢰도, 정
                              확성 등의 내용에 관하여 회사의 고의 또는 중대한 과실이
                              없는 한 책임을 지지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "서비스"에서 제공하는 정보에 대한 신뢰 여부는 전적으로 "이용자" 본인의 책임이며, "회사"는 매물 및 공유사
                              무실 정보를 등록한 "회원"에 의한 사기, 연락 불능 등으로 인하여 발생하는 어떠한 직접, 간접, 부수적, 파생적,
                              징벌적 손해, 손실, 상해 등에 대하여 도덕적, 법적 책임을 부담하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "서비스"를 통하여 노출, 배포, 전송되는 정보를 "이용자"가 이용하여 발생하는 부동산 거래 등에 대하여 "회사"
                              는 어떠한 도덕적, 법적 책임이나 의무도 부담하지 아니합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 "회사"는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모
                              든 직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 21조 손해배상 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스를 이용함에 있어 "회사"의 고의 또는 과실로 인해 손해가 발생한 경우에는 민법 등
                              관련 법령이 규율하는 범위 내에서 그 손해를 배상합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"이 이 약관을 위반하거나 관계 법령을 위반하여 "회사"에 손해가 발생한 경우에는 "회사"에 그 손해를 배
                              상하여야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 22조 분쟁해결</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호 간 분쟁에서 발생하는 문제에 대해서 일체의 책임을 지지 않습니다. "이용자" 상호 간
                              분쟁은 당사자들이 직접 해결을 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자" 상호간에 서비스 이용과 관련하여 발생한 분쟁에 대해 "이용자"의 피해 구제 신청이 있는 경우에는
                              공정 거래 위원회 또는 시, 도지사가 의뢰하는 분쟁 조정 기관의 조정에 따를 수 있습니다.
                            </span>
                          </li>
                        </ol>


                      </section>
                      <section class="sg-agent">
                        <h2>제 23조 재판권 및 준거법</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회사"와 "회원"간 제기된 소송은 대한민국법을 준거법으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"와 "회원"간 발생한 분쟁에 관한 소송은 민사소송법 상의 관할법원에 제소합니다.</span>
                          </li>
                        </ol>
                        <p>본 약관은 2021년 12월 31일부터 적용 합니다.</p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input type="checkbox" id="agree1" class="check_box" name="agree">
                    <label for="agree1">이용약관에 동의합니다</label>
                  </div>
                </div>
                <!-- 개인정보 수집 및 이용동의 -->
                <div class="agree_box">
                  <h3>개인정보 수집 및 이용</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div id="policy04" class="sg-main">
                      <section class="sg-main__title">
                        <h1>개인정보 수집 및 이용 동의</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <p>
                          (주)디노랩스는 서비스 제공을 위하여 아래와 같이 개인정보를 수집 및 이용합니다.
                        </p>
                        <br>
                        <p>
                          정보주체는 본 개인정보의 수집 및 이용에 관한 동의를 거부하실 권리가 있으나, 서비스 제공에 필요한 최소한의 개인정보이므로 동의를 해 주셔야 서비스를 이용하실 수 있습니다.
                        </p>
                        <br>
                        <p>
                          보다 자세한 내용은 회사의 개인정보처리방침을 참조하여 주시기 바랍니다.
                        </p>
                        <br>
                        <p>
                          제공해주시는 개인정보는 '상담 안내를 요청하기 위한 용도'의 서비스 제공 목적으로 수집하며 이외 목적으로는 사용되지 않습니다.
                        </p>
                        <br>
                        <h2>개인정보의 수집 이용 목적</h2>
                        <p>
                          서비스 제공 및 상담, 부정이용 확인 및 방지, 만족도 조사 (고객안심콜 등), 본인·연령확인, 신규서비스 개발, 문의사항 또는 불만·분쟁처리, 맞춤형 서비스 제공, 서비스
                          개선에 활용,
                          계정도용 및 부정거래 방지.
                        </p>
                        <br>
                        <h2>수집하는 개인정보의 항목</h2>
                        <p>
                          연락처 (휴대폰 번호 또는 전화번호)
                        </p>
                        <br>
                        <h2>개인정보의 이용 및 보유기간</h2>
                        <p>
                          서비스 제공 목적 달성 시까지 또는 회원탈퇴 시 즉시 삭제.<br>
                          단, 전자상거래 등에서의 소비자 보호에 관한 법률 및 관계 법령에 따른 보관 의무가 있을 경우 해당 기간 동안 보관함.
                        </p>
                        <br>
                        <p>
                          본 서비스 이용을 위해서 필수적인 동의이므로, 동의를 하지 않으면 해당 서비스를 이용하실 수 없습니다. 동의를 거부하는 경우에도 다른 (주)디노랩스의 서비스의 이용에는
                          영향이 없습니다.
                        </p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input class="check_box" id="agree3" name="agree" type="checkbox">
                    <label for="agree3"> 개인정보 수집 및 이용에 동의합니다</label>
                  </div>
                </div>
                <!-- 위치기반서비스 이용약관 -->
                <div class="agree_box">
                  <h3>위치기반서비스 이용약관</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div id="policy03" class="sg-main">
                      <section class="sg-main__title">
                        <h1>위치기반서비스 이용약관</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <h2>제 1조 목적</h2>
                        <p>
                          이 약관은 (주)디노랩스(이하 "회사"라 한다)이 운영하는 인터넷 사이트 및 모바일 어플리케이션(이하 "명당"라 한다)
                          을 이용하는 고객 사이의 서비스 이용에 관해 필요한 사항을 규정함을 목적으로 합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 2조 정의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">명당: "회사"가 제공하는 위치기반서비스입니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              회사가 제공하는 서비스는 다음과 같습니다.<br>
                              1) 부동산 매물 등에 관한 정보제공 서비스<br>
                              2) 부동산 매물 등록 서비스<br>
                              3) 부동산 중개업소 추천 등 기타 관련 서비스
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">고객: "명당"에 접속하여 서비스를 이용하는 이용자를 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              회원: "명당"에 접속하여 "회사"에 개인정보를 제공하고 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인
                              사용자 회원" 또는 "공인중개사 회원"을 말합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사
                              내부의 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              개인 사용자 회원: 회사가 정한 소정의 절차를 거쳐 회사에 개인정보를 제공하여 회원 가입을 한 자로서, "명당"
                              의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 "명당"의 서비스를 계속적으로 이용할 수 있는 자를 말
                              합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사 내부 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              공인중개사 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 부동산 중개업자로서 "명당"에 매물을 제
                              공할 수 있는 권한을 가진 자를 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">비회원: 회원으로 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</span>
                          </li>
                        </ol>
                        <p>
                          이 약관은 "위치정보의 보호 및 이용 등에 관한 법률" 및 관계 법령 등에서 정하는 바에 따르며 위 항에서 정의되지
                          않은 이 약관상의 용어의 의미는 일반적인 거래 관행에 의합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 3조 계약의 체결 및 해지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "고객"은 회사의 서비스를 이용하고자 하는 경우, 약관의 고지 내용에 따라 개인위치정보 서비스에 가입하게
                              됩니다. 회원의 경우 회원가입 시 동의절차를 밟으며, 비회원인 경우 서비스를 이용하는 동안 이 약관에 동의
                              한 것으로 간주합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "고객"은 계약을 해지하고자 할 때에는 가입 회원탈퇴를 하거나, "회사"의 개인정보보호 담당자에게 이메일을
                              통해 해지신청을 하여야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 4조 서비스의 내용</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "고객"이 등록한 매물의 위치정보만을 "고객"에게 제공하며, 해당 위치정보를 다른 정보와 결합하여
                              개인위치정보로 이용하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              제공되는 "고객"의 매물 위치정보는 해당 스마트폰 등에서 제공합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 위치정보사업자인 이동통신사로부터 위치정보를 전달받아 "명당"의 모바일 단말기 전용 애플리케이
                              션(이하 "애플리케이션")을 통해 아래와 같은 위치기반서비스를 제공합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    접속 위치 제공 서비스: 위치 정보 사용을 승인한 "고객"들의 서비스 최종 접속 위치를 기반으로 서비스 내의 정
                                    보를 지도 위에 혹은 리스트를 통해 제공합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    위치 정보: 모바일 단말기 등의 WPS(Wifi Positioning System), GPS 기반으로 추출된 좌표를 이용하여 "고객"
                                    이 생성하는 지점을 말합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    최종 접속 위치를 활용한 검색 결과 제공 서비스: 정보 검색 요청 시 개인위치정보주체의 현위치를 이용한 서
                                    비스 내의 기능에 따라 제공되는 정보에 대하여 검색 결과를 제시합니다
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    "고객"의 위치 정보의 갱신은 "명당" 실행 시 또는 실행 후, 위치 관련 메뉴 이용 시 이루어지며, "고객"이 갱신
                                    한 사용자의 위치정보를 기준으로 최종 위치를 반영합니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 5조 서비스 이용요금</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스는 기본적으로 무료 서비스 입니다. 어떠한 형태의 유료 기능도 존재하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              무선 서비스 이용 시 발생하는 데이터통신료는 별도이며 가입한 각 이동통신사의 정책에 따릅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 6조 이용시간</h2>
                        <p>
                          "명당"의 이용은 24시간 가능합니다. 단, 시스템 장애, 프로그램 오류 보수, 외부요인 등 불가피한 경우에는 해당 공
                          지를 통해 사전에 통지합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 7조 접속자의 위치정보 이용</h2>
                        <p>
                          "회사"는 "회원"이 약관 등에 동의하는 경우 또는 비회원이 위치관련 메뉴 이용시에 한해 단말기를 통해 수집된 위
                          치정보를 활용하여 정보 및 회원의 게시물을 제공할 수 있습니다.
                        </p>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              약관 등에 동의를 한 회원 또는 비회원이 위치관련 메뉴 사용시 서비스 이용을 위해 본인의 위치를 자의적으로
                              노출하였다고 간주하며 "회사"는 "고객"의 실시간 위치정보를 바탕으로 컨텐츠를 제공합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              장소정보 및 컨텐츠 입력 등 서비스 이용 시 "회원"이 생성한 컨텐츠에 대해 "회사"는 "회원"의 위치에 대한 정
                              보를 저장, 보존하지 않습니다. "회사"는 장소정보 또는 "회원"이 등록한 게시물을 고객의 현재위치를 기반으로
                              추천하기 위해 위치정보를 이용합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 8조 개인위치정보의 이용 또는 제공에 관한 동의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보주체의 동의 없이 당해 개인위치정보주체의 개인위치정보를 제3자에게 제공하지 아니
                              하며, 제3자 제공 "서비스"를 제공하는 경우에는 제공 받는 자 및 제공목적을 사전에 개인위치정보주체에게 고
                              지하고 동의를 받습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보를 개인위치정보주체가 지정하는 제3자에게 제공하는 경우에는 개인위치정보를 수집
                              한 당해 통신단말장치로 매회 개인위치정보주체에게 제공받는 자, 제공 일시 및 제공목적을 즉시 통보합니다.
                              다만, 아래에 해당하는 경우에는 개인위치정보주체가 미리 특정하여 지정한 통신단말장치 또는 전자우편주소
                              등으로 통보합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    개인위치정보를 수집한 당해 통신단말장치가 문자, 음성 또는 영상의 수신기능을 갖추지 아니한 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    가입신청자가 이전에 회원 자격을 상실한 적이 있는 경우(다만 회원 자격 상실 후 회사가 필요하다고 판단하여 회원 재
                                    가입에 대한 승낙을 얻은 경우에는 예외로 합니다.)
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    개인위치정보주체가 개인위치정보를 수집한 당해 통신단말장치 외의 통신단말장치 또는 전자우편주소 등으로
                                    통보할 것을 미리 요청한 경우
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 본 약관의 목적 외 다른 용도로 개인위치정보의 이용 또는 제공사실 확인자료를 기록하거나 보존하지 아니합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 9조 개인위치정보주체의 권리</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">개인위치정보주체는 개인위치정보의 이용•제공에 대한 동의의 전부 또는 일부를 철회할 수 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              개인위치정보주체는 언제든지 개인위치정보의 이용 또는 제공의 일시적인 중지를 요구할 수 있습니다. 이 경
                              우 "회사"는 요구를 거절하지 아니하며, 이를 위한 기술적 수단을 갖추고 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              개인위치정보주체는 "회사"에 대하여 아래 자료의 열람 또는 고지를 요구할 수 있고, 당해 자료에 오류가 있는
                              경우에는 그 정정을 요구할 수 있습니다. 이 경우 "회사"는 정당한 이유 없이 요구를 거절하지 아니합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">개인위치정보주체에 대한 위치정보 이용, 제공사실 확인자료</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    개인위치정보주체의 개인위치정보가 위치정보의 보호 및 이용 등에 관한 법률 또는 다른 법령의 규정에 의하
                                    여 제3자에게 제공된 이유 및 내용
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회사"는 개인위치정보주체가 동의의 전부 또는 일부를 철회한 경우에는 지체 없이 수집된 개인위치정보 및 위
                              치정보 이용제공사실 확인자료(동의의 일부를 철회하는 경우에는 철회하는 부분의 개인위치정보 및 위치정보
                              이용제공사실 확인자료에 한합니다)를 파기합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              개인위치정보주체는 제1항 내지 제3항의 권리행사를 위하여 이 약관 제15조의 연락처를 이용하여 "회사"에 요구할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 10조 서비스의 변경 및 중지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 위치정보사업자의 정책변경 등과 같이 "회사"의 제반 사정 또는 법률상의 장애 등으로 서비스를 유지
                              할 수 없는 경우, 서비스의 전부 또는 일부를 제한, 변경하거나 중지할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              제1항에 의한 서비스 중단의 경우에는 "회사"는 사전에 인터넷 및 서비스 화면 등에 공지하거나 개인위치정보
                              주체에게 통지합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 11조 위치정보관리책임자의 지정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 위치정보를 관리, 보호하고, 거래 시 고객의 개인위치정보로 인한 불만을 원활히 처리할 수 있는 위치
                              정보관리책임자를 지정해 운영합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              위치정보관리책임자는 위치기반서비스를 제공하는 부서의 부서장으로서 구체적인 사항은 본 약관의 부칙에
                              따릅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 12조 손해배상 및 면책</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              개인위치정보주체는 "회사"의 다음 각 호에 해당하는 행위로 손해를 입은 경우에 "회사"에 대해 손해배상을 청
                              구할 수 있습니다. 이 경우 개인위치정보주체는 "회사"의 고의 또는 과실이 있음을 직접 입증하여야 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    법령에서 허용하는 경우를 제외하고 이용자 또는 개인위치정보주체의 동의 없이 위치정보를 수집, 이용하는 행위
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">개인위치정보의 누출, 변조, 훼손 등의 행위</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 천재지변 등 불가항력적인 사유나 "이용자"의 고의 또는 과실로 인하여 발생한 때에는 손해를 배상하지 아니합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"가 망사업자의 통신환경에 따라 발생할 수 있는 오차 있는 위치정보를 이용함으로써 "이용
                              자" 및 제3자가 입은 손해에 대하여는 배상하지 아니합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 13조 약관의 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"가 약관을 변경하고자 할 때는 사전에 공지사항을 통해 변경내용을 게시합니다. 이에 관해 "회원"이 이의
                              를 제기할 경우 "회사"는 "이용자"에게 적절한 방법으로 약관 변경내용을 통지하였음을 확인해 주어야 합니다.
                              다만, 법령의 개정이나 제도의 개선 등으로 인하여 긴급히 약관을 변경 할 때는 해당 서비스를 이용하는 통신
                              단말장치에 즉시 이를 게시하고 가입 시 등록된 "회원"의 전자우편 주소로 통지하여야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"은 제1항의 규정에 따른 약관의 변경내용이 게시되거나 통지된 후부터 변경되는 약관의 시행일 전 영업
                              일까지 계약을 해지할 수 있습니다. 단 전단의 기간 안에 "회원"의 이의가 "회사"에 도달하지 않으면 "회원"이
                              이를 승인한 것으로 봅니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 14조 분쟁 해결</h2>
                        <p>
                          "회사"는 위치정보와 관련된 분쟁의 당사자간 협의가 이루어지지 아니하거나 협의를 할 수 없는 경우에는 전기통
                          신기본법의 규정에 따라 방송통신위원회에 재정을 신청하거나 정보통신망이용촉진및정보보호등에관한 법률의 규
                          정에 의한 개인정보분쟁조정위원회에 조정을 신청할 수 있습니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 15조 사업자 정보 및 위치정보관리책임자 지정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              회사의 상호, 주소, 전화번호 그 밖의 연락처는 다음과 같습니다.
                              <dl>
                                <dt>상호:</dt>
                                <dd>(주)디노랩스</dd>
                                <dt>주소:</dt>
                                <dd>광주광역시 동구 금남로4가 6<br>광주AI창업캠프 2호점 402호<br>
                                  (금남로 193-12)</dd>
                                <dt>전화번호:</dt>
                                <dd>070-8633-8942</dd>
                                <dt>이메일:</dt>
                                <dd>denolabs@naver.com</dd>
                              </dl>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              위치정보관리책임자는 다음과 같이 지정합니다.
                              <dl>
                                <dt>성명:</dt>
                                <dd>이성희</dd>
                                <dt>직위:</dt>
                                <dd>CTO</dd>
                                <dt>전화번호:</dt>
                                <dd>070-8633-8942</dd>
                                <dt>이메일:</dt>
                                <dd>denolabs@naver.com</dd>
                              </dl>
                            </span>
                          </li>
                        </ol>
                        <p>본 약관은 2022년 1월 1일부터 적용 합니다.</p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input class="check_box" id="agree2" name="agree" type="checkbox">
                    <label for="agree2"> 위치기반서비스 이용약관에 동의합니다</label>
                  </div>
                </div>
                <!-- 공인중개사 및 파트너 회원 서비스 이용 약관 동의 -->
                <div class="agree_box">
                  <h3>공인중개사 및 파트너 회원 서비스 이용 약관</h3>
                  <!-- textbox -->
                  <div class="text_box box2">
                    <div class="sg-main">
                      <section class="sg-main__title">
                        <h1>공인중개사 및 파트너 회원 서비스 이용 약관</h1>
                      </section>
                      <section class="sg-agent" id="begin">
                        <h1>제 1장 총칙</h1>
                        <h2>제 1조 목적</h2>
                        <p>
                          이 약관은 (주)디노랩스(이하 "회사"라 한다)이 운영하는 인터넷 사이트 및 모바일 어플리케이션(이하 "명당"라 한다)
                          에서 제공하는 제반 서비스의 이용과 관련하여 "회사"와 "이용자"의 권리, 의무 및 책임 사항, 기타 필요한 사항을
                          규정함을 목적으로 합니다.
                        </p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 2조 정의</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              명당: "회사"가 컴퓨터 등 정보통신설비를 이용하여 서비스를 제공할 수 있도록 설정한 가상의 영업장을 말하며,
                              아울러 인터넷 사이트 및 모바일 애플리케이션을 운영하는 사업자의 의미로도 사용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              이용자: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사 회원"
                              또는 "비즈니스 회원" 또는 "비회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              회원: "명당"에 접속하여 본 약관에 따라 회사가 제공하는 서비스를 받는 "개인 사용자 회원" 또는 "공인중개사
                              회원", "비즈니스 회원"을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              개인 사용자 회원: 회사가 정한 소정의 절차를 거쳐 회사에 개인정보를 제공하여 회원 가입을 한 자로서, "명당"
                              의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 "명당"의 서비스를 계속적으로 이용할 수 있는 자를 말
                              합니다. "회사"는 서비스의 원활한 제공을 위해 회원의 등급을 회사 내부 규정에 따라 나눌 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              공인중개사 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 부동산 중개업자로서 "명당"에 매물을 제
                              공할 수 있는 권한을 가진 자를 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              비즈니스 회원: "회사"가 정한 소정의 절차를 거쳐 회원 가입을 한 공유오피스 담당자와 법인 담당자로서 "명당"에
                              매물을 제공할 수 있는 권한을 가진 자를 말합니다. 단, 공유오피스 담당자로서 비즈니스 회원의 권한은 공유오피스
                              서비스에 한정합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">비회원: 회원으로 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              아이디(ID): 회원의 식별과 서비스 이용을 위하여 회원이 설정하고 회사가 승인한 이메일주소 또는 문자나 숫
                              자의 조합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              비밀번호: 회원의 동일성 확인과 회원정보의 보호를 위하여 회원이 설정하고 회사가 승인한 문자나 숫자의 조
                              합을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              게시판: 그 명칭, 형태, 위치와 관계없이 회원 및 비회원 이용자에게 공개할 목적으로 부호•문자•음성•음향
                              •화상•동영상 등의 정보 (이하 "게시물"이라 합니다)를 회원이 게재할 수 있도록 회사가 제공하는 서비스 상
                              의 가상공간을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">컨텐츠: "회원"이 게재한 모든 글, 사진, 동영상, 회원소개 등을 말합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">12.</span>
                            <span class="sg-text">
                              매물관리규정: "회사"가 별도로 규정하여 공개한 부동산 매물 등록 시 회원의 준수사항 및 위반 시 제재 규정을
                              의미합니다.
                            </span>
                          </li>
                        </ol>
                        <p>위 항에서 정의되지 않은 이 약관상의 용어의 의미는 일반적인 거래 관행에 의합니다.</p>
                      </section>
                      <section class="sg-agent">
                        <h2>제 3조 약관 등의 명시와 설명 및 개정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 본 약관의 내용을 이용자가 쉽게 알 수 있도록 "명당"의 인터넷 사이트 및 모바일 애플리케이션에 게
                              시합니다. 다만, 약관의 내용은 이용자가 연결 화면을 통하여 볼 수 있도록 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "약관 규제에 관한 법률", "정보통신망 이용촉진 및 정보보호 등에 관한 법률" 등 관련법을 위배하지
                              않는 범위에서 본 약관을 개정할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 약관을 개정할 경우에는 적용 일자 및 개정 사유를 명시하여 이용자가 알기 쉽도록 표시하여 공지합
                              니다. 변경된 약관은 공지된 시점부터 그 효력이 발생하며, 이용자는 약관이 변경된 후에도 본 서비스를 계속
                              이용함으로써 변경 후의 약관에 대해 동의를 한 것으로 간주됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 4조 약관의 해석</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 서비스운영을 위해 별도의 운영정책을 마련하여 운영할 수 있으며, "회사"는 "명당" 인터넷 사이트 및
                              모바일 애플리케이션에 운영정책을 사전 공지 후 적용합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">본 약관에서 정하지 아니한 사항이나 해석에 대해서는 별도의 운영정책, 관계법령 또는 상관례에 따릅니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 5조 서비스의 제공 및 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 다음과 같은 서비스를 제공합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">부동산 매물 등에 관한 정보 제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">부동산 매물 등록 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">부동산 매물 매출 관련 서비스 제공</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">부동산 중개업소 추천 등 기타 관련 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">공유사무실 등에 관한 정보제공 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">기타 "명당"의 이용자를 위하여 제공하는 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">유료로 제공하는 광고 상품 서비스</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">유료로 제공하는 부가 서비스</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스는 원칙적으로 상품 중도 변경, 일시중지, 양도양수가 불가합니다. 단, 이용자의 귀책사유가 아님을 증명 할 수 있을 경우 예외적으로 처리될
                              수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"가 제공하는 서비스의 내용을 기술적 사양의 변경 등의 이유로 변경할 경우에는 그 사유를
                              이용자에게 통지 하거나, 이용자가 알아볼 수 있도록 공지사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 6조 서비스의 중단</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 컴퓨터 등 정보 통신 설비의 보수 점검, 교체 및 고장, 통신의 두절, 천재지변 등의 사유가 발생한 경우
                              에는 서비스의 제공을 제한하거나 일시적으로 중단할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              사업종목의 전환, 사업의 포기, 업체 간의 통합 등의 이유로 서비스를 제공할 수 없게 되는 경우에는 회사는 이
                              용자에게 통지하거나 이용자가 알아볼 수 있도록 공지 사항으로 게시합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 7조 회원에 대한 통지</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 이메일, 이동전화 단문메시지서비스(SMS), 푸시알림(App push)등으로 회원에게 통지할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 불특정다수 회원에 대한 통지의 경우 공지사항으로 게시함으로써 개별 통지에 갈음 할 수 있습니다. 다
                              만, 회원 본인의 거래와 관련하여 중대한 영향을 미치는 사항에 대하여는 개별통지를 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 2장 이용계약 및 정보보호</h1>
                        <h2>제 8조 회원가입 및 회원정보의 변경</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 회사가 정한 가입 양식에 따라 회원 정보를 기입한 후 이 약관에 동의한다는 의사표시를 함으로서
                              회원 가입을 신청합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 제1항과 같이 회원으로 가입할 것을 신청한 이용자 중 다음 각 호에 해당하지 않는 한 "개인 사용자 회
                              원" 또는 "공인중개사 회원", "비즈니스 회원"으로 등록합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">등록 내용에 허위, 기재누락, 오기가 있는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    가입 신청자가 이전에 회원 자격을 상실한 적이 있는 경우(다만 회원 자격 상실 후 회사가 필요하다고 판단하
                                    여 회원 재가입에 대한 승낙을 얻은 경우에는 예외로 합니다.)
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회사"로부터 회원 자격 정지 조치 등을 받은 회원이 그 조치 기간 중에 이용 계약을 임의 해지하고 재가입 신
                                    청을 하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">기타 회원으로 등록하는 것이 "명당"의 기술상 현저히 지장이 있다고 판단되는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">
                                    본 약관에 위배되거나 위법 또는 부당한 이용신청임이 확인된 경우 및 회사가 합리적인 판단에 의하여 필요하
                                    다고 인정하는 경우
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">회원 가입 계약의 성립 시기는 "회사"의 승낙이 "회원"에게 도달한 시점으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"은 회원 가입 신청 및 이용시 기재한 사항이 변경되었을 경우 온라인으로 수정을 하거나 전자우편 기타 방법으로 회사에 그 변경사항을 알려야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">제4항의 변경 사항을 "회사"에 알리지 않아 발생한 불이익에 대하여 회사는 책임지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              회원 가입은 반드시 본인의 진정한 정보를 통하여 가입할 수 있으며 "회사"는 "회원"이 등록한 정보에 대하여 확
                              인 조치를 할 수 있습니다. "회원"은 "회사"의 확인 조치에 대하여 적극 협력하여야 하며, 만일 이를 준수하지 아니
                              할 경우 "회사"는 등록한 정보가 부정한 것으로 간주하여 처리할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사"는 "회원"을 등급 별로 구분하여 이용시간, 이용회수, 서비스 메뉴, 매물 등록 건 수 등을 세분하여 서비스
                              이용에 차등을 둘 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회원"은 1인 1계정에 한하여 서비스 이용이 가능하며, 중복 가입 시 서비스 이용이 불가할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 9조 이용 계약의 종료</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              회원의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회원"은 회사에 언제든지 해지 의사를 통지할 수 있고 회사는 특별한 사유가 없는 한 이를 즉시 수락하여야 합
                                    니다. 다만, "회원"은 해지의사를 통지하기 전에 모든 진행중인 절차를 완료, 철회 또는 취소해야만 합니다. 이 경우
                                    철회 또는 취소로 인한 불이익은 회원 본인이 부담하여야 합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회원"이 발한 의사표시로 인해 발생한 불이익에 대한 책임은 회원 본인이 부담하여야 하며, 이용계약이 종료되
                                    면 "회사"는 "회원"에게 부가적으로 제공한 각종 혜택을 회수할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    "회원"의 의사로 이용계약을 해지한 후, 추후 재이용을 희망할 경우에는 재이용 의사가 "회사"에 통지되고, 이에
                                    대한 "회사"의 승낙이 있는 경우에만 서비스 재이용이 가능합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에 따라 해지를 한 "회원"은 이 약관이 정하는 회원가입절차와 관련조항에 따라 신규 회원으로 다시 가입
                                    할 수 있습니다. 다만, "회원"이 중복참여가 제한된 이벤트 중복 참여 등 부정한 목적으로 회원탈퇴 후 재이용을 신
                                    청하는 경우 "회사"는 가입을 일정기간 동안 제한할 수 있습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">본 항에 따라 해지를 한 이후에는 재가입이 불가능하며, 모든 가입은 신규가입으로 처리됩니다.</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              회사의 해지
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    "회사"는 다음과 같은 사유가 발생하거나 확인된 경우 이용계약을 해지할 수 있습니다.
                                    <ol>
                                      <li>
                                        <span class="listNum">(1)</span>
                                        <span class="sg-text">
                                          다른 회원의 권리나 명예, 신용 기타 정당한 이익을 침해하거나 대한민국 법령 또는 공서양속에 위배되는 행위
                                          를 한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(2)</span>
                                        <span class="sg-text">
                                          "회사"가 제공하는 서비스의 원활한 진행을 방해하는 행위를 하거나 시도한 경우
                                        </span>
                                      </li>
                                      <li>
                                        <span class="listNum">(3)</span>
                                        <span class="sg-text">제 8조 제 2항의 승낙거부 사유가 추후 발견된 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(4)</span>
                                        <span class="sg-text">"회사"가 정한 서비스 운영정책을 이행하지 않거나 위반한 경우</span>
                                      </li>
                                      <li>
                                        <span class="listNum">(5)</span>
                                        <span class="sg-text">기타 "회사"가 합리적인 판단에 기하여 서비스의 제공을 거부할 필요가 있다고 인정할 경우</span>
                                      </li>
                                    </ol>
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 해지를 하는 경우 "회사"는 "회원"에게 이메일, 전화, 기타의 방법을 통하여 해지 사유를 밝혀 해지 의
                                    사를 통지합니다. 이용계약은 "회사"의 해지의사를 "회원"에게 통지한 시점에 종료됩니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료될 시에는 "회사"는 "회원"에게 부가적으로 제공한 각종혜택을 회수
                                    할 수 있습니다. 이용계약의 종료와 관련하여 발생한 손해는 이용계약이 종료된 해당 회원이 책임을 부담하여야 하
                                    고, "회사"는 일체의 책임을 지지 않습니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">
                                    본 항에서 정한 바에 따라 이용계약이 종료된 경우에는, "회원"의 재이용 신청에 대하여 "회사"는 이에 대한 승
                                    낙을 거절할 수 있습니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              이용계약의 종료시, 제공된 서비스에 대한 환불은 본 규정 제15조에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 계약을 해지하는 경우, 관련법 및 "개인정보취급방침"에 따라 "회사"가 회원정보를 보유하는 경우를 제외하고는 해지 즉시 "회원"의 모든 데이터는
                              소멸됩니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 10조 개인정보보호</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 회원가입시 서비스 제공에 필요한 최소한의 정보를 수집합니다. 다음 사항을 필수사항으
                              로 하며 그 외 사항은 선택사항으로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이메일주소</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">비밀번호</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">휴대폰 번호(부동산 매물등록 서비스, 공유사무실 등록서비스 및 신고기능을 이용하는 회원인 경우)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"가 "이용자"의 개인식별이 가능한 개인정보를 수집하는 때에는 반드시 당해 이용자의 동의를 받습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              제공된 개인정보는 당해 이용자의 동의 없이 목적 외의 이용이나 제3자에게 제공하지 않습니다. 다만, 다음의
                              경우에는 예외로 합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">도용방지를 위하여 본인확인에 필요한 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">법률의 규정 또는 법률에 의하여 필요한 불가피한 사유가 있는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회사"가 제2항과 제3항에 의해 "이용자"의 동의를 받아야 하는 경우에는 개인정보관리 책임자의 신원(소속,
                              성명 및 전화번호, 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에 대한 정보제공 관련사항(제공받은 자,
                              제공목적 및 제공할 정보의 내용) 등 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 제22조 제2항이 규정
                              한 사항을 미리 명시하거나 고지해야 하며 이용자는 언제든지 이 동의를 철회할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 개인정보를 보호하기 위해 "개인정보취급방침"을 수립하고 개인정보보호책임자를 지정하
                              여 이를 게시하고 운영합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "이용자"는 언제든지 "회사"가 갖고 있는 자신의 개인정보에 대해 열람 및 오류정정을 요구할 수 있으며 "회사"
                              는 이에 대해 지체 없이 필요한 조치를 취할 의무를 집니다. 이용자가 오류의 정정을 요구한 경우에 "회사"는
                              그 오류를 정정할 때까지 당해 개인정보를 이용하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "회사" 또는 그로부터 개인정보를 제공받은 제3자는 개인정보의 수집목적 또는 제공받은 목적을 달성한 때에는 당해 개인정보를 지체 없이 파기합니다. 다만, 아래의
                              경우에는 회원 정보를 보관합니다. 이 경우 회사는 보 관하고 있는 회원 정보를 그 보관의 목적으로만 이용합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">
                                    상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우 "회사"는 관계법령에서 정한 일정한 기간 동안 회원
                                    정보를 보관합니다.
                                  </span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">
                                    "회사"가 이용계약을 해지하거나 "회사"로부터 서비스 이용정지조치를 받은 회원에 대해서는 재가입에 대한 승낙거부사유가 존재하는지 여부를 확인하기 위한
                                    목적으로 이용계약종료 후 5년간 성명, 이메일주소, 전화번호를 비롯하여 이용계약 해지와 서비스 이용정지와 관련된 정보 등의 필요정보를 보관합니다.
                                  </span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">8.</span>
                            <span class="sg-text">
                              "회사"는 새로운 업체가 제휴사 또는 제휴영업점의 지위를 취득할 경우 제7조 2항에서 정한 것과 같은 방법을
                              통하여 공지합니다. 이 때 회원이 별도의 이의제기를 하지 않을 경우 "명당" 서비스 제공이라는 필수적인 목적
                              을 위해 해당 개인 정보 제공 및 활용에 동의한 것으로 간주 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">9.</span>
                            <span class="sg-text">
                              모든 "이용자"는 "명당"로부터 제공받은 정보를 다른 목적으로 이용하거나 타인에게 유출 또는 제공해서는 안
                              되며, 위반 사용으로 인한 모든 책임을 부담해야 합니다. 또한 "회원"은 자신의 개인정보를 책임 있게 관리하여
                              타인이 회원의 개인정보를 부정하게 이용하지 않도록 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">10.</span>
                            <span class="sg-text">
                              "회사"는 "회원"의 개인정보를 보호하기 위해 [정보통신망 이용촉진 및 정보보호 등에 관한 법률] 상의 개인정
                              보 유효기간제도에 따라 1년간 미접속한 회원의 개인정보를 파기 또는 분리하여 별도로 저장/관리하며(휴면계
                              정), "회원"의 별도의 요청이 없는 한 사용이 제한됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">11.</span>
                            <span class="sg-text">
                              회사”는 등기변동 알림서비스를 신청한 “회원”에게 그와 관련된 비광고성 정보를 카카오톡 알림톡으로 통지
                              할 수 있으며, 만약 알림톡 수신이 불가능하거나 해당 회원이 수신 차단한 경우에는 일반 문자 메시지로 통지할
                              수 있습니다. 다만, 와이파이 아닌 이동통신망으로 접속시 알림톡 수신 중 데이터요금이 발생할 수 있습니다.
                              회원”이 알림톡과는 다른 방식으로 정보 수신을 원하시면 알림톡을 차단할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h1>제 3장 서비스의 이용</h1>
                        <h2>제 11조 부동산 매물 및 공유사무실 등에 관한 정보제공 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 및 공유사무실 등에 관한 정보제공 서비스는 "회사"가 이용자 스스로 해당 정보를 확인 및 이용할
                              수 있도록 관련 정보를 제공하는 것입니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 “네모” 인터넷 사이트 및 모바일 애플리케이션
                              내에서 제공하는 모든 정보에 대해서 정확성이나 신뢰성이
                              있는 정보를 제공하기 위해 노력하며, 신고받은 허위매물 정
                              보의 삭제 조치를 하는 등의 서비스 관리자로서의 책임을 부
                              담합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 "명당" 인터넷 사이트 및 모바일 애플리케이션을 통해 제공되는 정보의 내용을 수정할 의무를 지지
                              않으나, 필요에 따라 개선할 수는 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 12조 부동산 매물 및 공유사무실 등록 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              부동산 매물 등록 및 공유사무실 등록 서비스는 "회원"이 매물정보(부동산 거래정보 및 거래 물건에 대한 다양
                              한 부가정보)와 회원 연락처(회원의 이메일 주소 및 휴대폰 번호), 공유사무실 정보(공유사무실 정보 및 다양한
                              부가정보)와 회원 연락처(회원의 이메일 주소 및 전화번호)를 직접 "명당" 인터넷 사이트 및 모바일 애플리케
                              이션에 등록하여 이용자에게 노출할 수 있는 것을 말합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실의 노출순
                              서 및 영역의 추가 등에 대한 결정 권한을 갖고 있습니다. 또
                              한, “회사”는 사전에 회원의 개별 동의를 구한 경우 “회원”의
                              매물정보 및 공유사무실 정보 등을 “네모” 인터넷 사이트 및
                              모바일 애플리케이션 이외의 다른 인터넷 사이트 등에 노출
                              할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              “회사”는 회원이 등록한 매물정보 및 공유사무실 정보에 대
                              해 등록 후 최대 7일 이내에 진위 여부를 확인하며, 진위 여
                              부 확인 즉시 해당 매물 및 공유사무실을 노출합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"이 등록한 정보가 실제 정보와 불일치 하는 경우 "회사"는 "회원"이 가입시 제공한 전화번호 또는 이메일
                              을 통해 "회원"에게 매물정보의 수정을 요청합니다. "회사"가 "회원"이 제공한 연락수단으로 2회 이상 연락하
                              였음에도 불구하고 연락이 되지 않을 경우의 책임은 "회원"에게 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              전항에 따른 "회사"의 정당한 정보 수정 요청에도 불구하고 "회원"이 24시간 이내에 정보(거래완료 혹은 노출
                              종료와 같은 매물상태 변경 포함)를 수정하지 않을 경우, 회사는 해당 매물 및 공유사무실 정보의 노출을 중지
                              하고 "회원"의 서비스 이용을 제한 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "회사"는 "명당"에 등록된 매물 및 공유사무실 중 사회통념, 관례 및 회사의 합리적인 판단에 의하여 거래가 부
                              적합하다고 판단되는 경우 이의 삭제를 요청하거나 직권으로 삭제할 수 있으며 해당 회원의 서비스 이용을 정
                              지 혹은 탈퇴시킬 수 있습니다. "명당"에 거래부적합 부동산 매물 및 공유사무실을 등록할 경우, 거래부적합 매
                              물에 대한 법적인 책임은 해당 등록자에게 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 13조 부동산 중개업소 및 공유사무실 추천 등 기타 관련 서비스</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자"의 편의를 위해 부동산 중개업소와 공유사무실을 "이용자"에게 추천할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 회사는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모든
                              직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 14조 정보의 제공 및 광고의 게재</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스 이용 중 필요하다고 인정되는 다양한 정보를 서비스 내 공지사항, 서비스 화면, 전자
                              우편 등의 방법으로 "회원"에게 제공 할 수 있습니다. 다만, "회원"은 관련법에 따른 거래 관련 정보 및 고객문
                              의 등에 대한 답변 등을 제외하고는 언제든지 위 정보 제공에 대하여 수신 거절을 할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 서비스 운영과 관련하여 회사가 제공하는 서비스의 화면 및 홈페이지 등에 광고를 게재할 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 15조 환불 규정</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회원"이 계약 상품 개시 후 환불 요청시 개시일로부터 경과기간에 해당하는 상품 원가 금액과 총 결제금액의 10% 위약금을 공제 한 후 그 나머지를 환급합니다.
                              "공인중개사 회원"이 중개업을 폐업 신고한 후 환불 요청하는 경우도 같습니다. 단, 상품 계약일로부터 7일 이내 청약철회 요청 시 위약금 없이 상품 개시일로부터
                              경과기간에 해당하는 상품 원가 금액만 공제하고 그 나머지를 환급합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              신용카드로 결제한 "회원"이 카드 승인일로부터 365일이내에 환불을 요청할 경우 환불금액이 부분취소처리 됩니다. 단, 그 외의 경우에는 기존에 결제하였던 내역을 전액
                              취소하며 취소 시점에 따라 1항에 의거한 환불공제 금액을 재승인 합니다. 이 경우 구매 취소 시점과 해당 카드사의 환불 처리기준에 따라 취소금액의 환급 방법과
                              환급일은 다소 차이가 있을 수 있으며, 사용한 신용카드의 환불 정책은 해당 카드사 정책에 따릅니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 타인의 신용카드 또는 휴대전화번호를 도용하여 부당한 이익을 편취하였다고 볼 수 있는 합리적 사유가 있는 경우 "회사"는 "회원"에게 소명 자료를 요청하고
                              환불을 보류할 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              "회원"의 개인정보도용 및 결제사기로 인한 환불요청 또는 결제자의 개인정보 요구는 법률이 정한 경우 외에는 거절될 수 있습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              위약금과 사용일수 금액의 총합이 결제한 금액보다 클 경우 환불이 불가합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              본 약관에서 정하지 않은 환불에 관한 사항은 전자상거래 등에서의 소비자보호에 관한 법률 등 관련 법령, 지침 또는 상관례에 의합니다.
                            </span>
                          </li>
                        </ol>
                      </section>

                      <section class="sg-agent">
                        <h1>제 4장 책임</h1>
                        <h2>제 16조 회사의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 법령과 이 약관이 금지하거나 공서양속에 반하는 행위를 하지 않으며 이 약관이 정하는 바에 따라 지
                              속적이고, 안정적으로 이용자에게 서비스를 제공하는데 최선을 다하여야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호간의 거래에 있어서 어떠한 보증도 제공하지 않습니다. 이용자 상호간 거래 행위에서 발
                              생하는 문제 및 손실에 대해서 회사는 일체의 책임을 부담하지 않으며, 거래 당사자 간에 직접 해결해야 합니
                              다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 17조 회원의 아이디(ID) 및 비밀번호에 대한 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"아이디(ID)"와 "비밀번호"에 관한 관리책임은 "회원"에게 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회원"은 자신의 "아이디(ID)" 및 "비밀번호"를 제3자에게 이용하게 해서는 안됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회원"이 자신의 "아이디(ID)" 및 "비밀번호"를 도난 당하거나 제3자가 사용하고 있음을 인지한 경우에는 바로
                              "회사"에 통보하고 "회사"의 안내가 있는 경우에는 그에 따라야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 18조 이용자의 의무</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "이용자"는 다음 행위를 하여서는 안됩니다. 만약 다음 각 호와 같은 행위가 확인되면 회사는 해당 "이용자"에
                              게 서비스 이용에 대한 제재를 가할 수 있으며 민형사상의 책임을 물을 수 있습니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">회사 서비스의 운영을 고의 및 과실로 방해하는 경우</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">신청 또는 변경 시 허위 내용의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">3)</span>
                                  <span class="sg-text">타인의 정보 도용</span>
                                </li>
                                <li>
                                  <span class="listNum">4)</span>
                                  <span class="sg-text">허위 매물 정보의 등록</span>
                                </li>
                                <li>
                                  <span class="listNum">5)</span>
                                  <span class="sg-text">"회사"가 정한 정보 이외의 정보(컴퓨터 프로그램 등) 등의 송신 또는 게시</span>
                                </li>
                                <li>
                                  <span class="listNum">6)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 저작권 등 지적재산권에 대한 침해</span>
                                </li>
                                <li>
                                  <span class="listNum">7)</span>
                                  <span class="sg-text">"회사" 및 기타 제3자의 명예를 손상시키거나 업무를 방해하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">8)</span>
                                  <span class="sg-text">외설 또는 폭력적인 메시지, 화상, 음성, 기타 공서양속에 반하는 정보를 공개 또는 게시하는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">9)</span>
                                  <span class="sg-text">이용자의 연락처 또는 개인정보를 다른 용도로 사용</span>
                                </li>
                                <li>
                                  <span class="listNum">10)</span>
                                  <span class="sg-text">사기 및 악성 글 등록 등 건전한 거래 문화 활성에 방해되는 행위</span>
                                </li>
                                <li>
                                  <span class="listNum">11)</span>
                                  <span class="sg-text">기타 중대한 사유로 인하여 회사가 서비스 제공을 지속하는 것이 부적당하다고 인정하는 경우</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회사"는 전항의 규정 된 위반 행위를 하는 회원에 대해
                              서비스 일시 중단 등의 조치를 취할 수 있으며, 필요한 경우
                              이에 대한 시정을 요구할 수 있습니다. 특히, 회원이 시정을
                              요구받은 기간 내에 시정을 하지 아니한 경우, 동일한 위반
                              행위를 반복할 경우 또는 다수의 위반 행위가 확인 된 경우
                              에 회사는 회원과의 서비스 이용계약을 해지 할 수 있습니다.
                              단, 이 경우 회사는 회원에게 전화, E-mail, SMS 등의 방법
                              으로 개별 통지합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">
                              "회사"는 회사의 정책에 따라서 회원 간의 차별화된 유료 서비스를 언제든지 제공할 수 있습니다. 만약 회원이
                              비용을 지불하지 않고 사용을 할 경우 "회사"는 특정 회원에게 서비스 중지 및 특정 서비스 제한을 할 수 있습
                              니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 19조 권리의 귀속 및 이용제한</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회원"이 "명당"를 이용하여 작성한 저작물에 대한 저작권 기타 지적 재산권은 "회원"에 귀속합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"은 "회사"에 제공한 콘텐츠에 대하여 “회사”가 다음과 같은 목적과 권한으로 이용하는 것을 허락합니다.
                              <ol>
                                <li>
                                  <span class="listNum">1)</span>
                                  <span class="sg-text">이용 목적 : 회사 서비스 운영 전반, 회사 서비스의 온/오프라인 광고, 회사 서비스 고도화 및 기획, 운영 등을 위한
                                    빅데이터 수집</span>
                                </li>
                                <li>
                                  <span class="listNum">2)</span>
                                  <span class="sg-text">이용 권한 : 회사 서비스 및 회사와 제휴된 서비스에 노출할 수 있고, 해당 노출을 위해 필요한 범위 내에서 일부
                                    이용, 편집 형식의 변경 및 기타 변형하여 이용할 수 있습니다. (사용, 저장, 수정, 복제, 공중송신, 전시, 공표, 공연, 전송, 배포, 방송, 2차적
                                    저작물 작성 등 어떠한 형태로든 이용 가능하며, 이용기간과 지역에는 제한이 없음)</span>
                                </li>
                              </ol>
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회원"은 본조 2항의 콘텐츠 이용 허락에 대한 권리를 보유해야 합니다. 이에 반하여 발생하는 모든 문제에 대해서는 “회원”이
                              책임을 부담하게 됩니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">"회원"이 작성한 콘텐츠는 제3자의 권리를 침해해서는 아니됩니다. 관련 법령에 위반되는 내용을 포함하는 경우 그로 인한 책임은
                              “회원”이 부담하게 되며, 관련 법령이 정한 절차에 따라 게시가 제한될 수 있습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">서비스에 대한 저작권 및 지적재산권은 “회사”에 귀속됩니다. 단, 회원이 직접 작성한 "콘텐츠" 및 제휴 계약에 따라 제공된
                              저작물 등은 제외합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">"이용자"는 서비스를 이용함으로써 얻은 정보 중 "회사"에게 지적 재산권이 귀속된 정보를 회사의 사전 승낙 없이 복제, 송신,
                              출판, 배포, 방송 기타 방법에 의하여 영리 목적으로 이용하거나 제3자에게 이용하게 하여서는 안됩니다.</span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 20조 책임의 한계 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 무료로 제공하는 정보 및 서비스에 관하여 "개인정보취급방침" 또는 관계 법령의 벌칙, 과태료 규정
                              등 강행 규정에 위배되지 않는 한 원칙적으로 손해를 배상 할 책임이 없습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              “회사”는 천재지변, 불가항력, 서비스용 설비의 보수, 교
                              체, 점검, 공사 등 기타 이에 준하는 사항으로 정보 및 서비
                              스를 제공 할 수 없는 경우에 회사의 고의 또는 과실이 없는
                              한 이에 대한 책임이 면제 됩니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">3.</span>
                            <span class="sg-text">"회사"는 "이용자"의 귀책사유로 인한 정보 및 서비스 이용의 장애에 관한 책임을 지지 않습니다.</span>
                          </li>
                          <li>
                            <span class="listNum">4.</span>
                            <span class="sg-text">
                              “회사”는 “회원”이 게재한 정보, 자료, 사실의 신뢰도, 정
                              확성 등의 내용에 관하여 회사의 고의 또는 중대한 과실이
                              없는 한 책임을 지지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">5.</span>
                            <span class="sg-text">
                              "서비스"에서 제공하는 정보에 대한 신뢰 여부는 전적으로 "이용자" 본인의 책임이며, "회사"는 매물 및 공유사
                              무실 정보를 등록한 "회원"에 의한 사기, 연락 불능 등으로 인하여 발생하는 어떠한 직접, 간접, 부수적, 파생적,
                              징벌적 손해, 손실, 상해 등에 대하여 도덕적, 법적 책임을 부담하지 않습니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">6.</span>
                            <span class="sg-text">
                              "서비스"를 통하여 노출, 배포, 전송되는 정보를 "이용자"가 이용하여 발생하는 부동산 거래 등에 대하여 "회사"
                              는 어떠한 도덕적, 법적 책임이나 의무도 부담하지 아니합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">7.</span>
                            <span class="sg-text">
                              "이용자"가 "회사"가 추천한 부동산 중개업소와 공유사무실을 이용할지 여부는 전적으로 "이용자" 스스로의 판
                              단에 따라 결정하는 것으로 "회사"는 "이용자"가 해당 부동산 중개업소와 공유사무실을 이용하여 발생하는 모
                              든 직접, 파생적, 징벌적, 부수적인 손해에 대해 책임을 지지 않습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 21조 손해배상 등</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "회원"이 서비스를 이용함에 있어 "회사"의 고의 또는 과실로 인해 손해가 발생한 경우에는 민법 등
                              관련 법령이 규율하는 범위 내에서 그 손해를 배상합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "회원"이 이 약관을 위반하거나 관계 법령을 위반하여 "회사"에 손해가 발생한 경우에는 "회사"에 그 손해를 배
                              상하여야 합니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 22조 분쟁해결</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">
                              "회사"는 "이용자" 상호 간 분쟁에서 발생하는 문제에 대해서 일체의 책임을 지지 않습니다. "이용자" 상호 간
                              분쟁은 당사자들이 직접 해결을 해야 합니다.
                            </span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">
                              "이용자" 상호간에 서비스 이용과 관련하여 발생한 분쟁에 대해 "이용자"의 피해 구제 신청이 있는 경우에는
                              공정 거래 위원회 또는 시, 도지사가 의뢰하는 분쟁 조정 기관의 조정에 따를 수 있습니다.
                            </span>
                          </li>
                        </ol>
                      </section>
                      <section class="sg-agent">
                        <h2>제 23조 재판권 및 준거법</h2>
                        <ol>
                          <li>
                            <span class="listNum">1.</span>
                            <span class="sg-text">"회사"와 "회원"간 제기된 소송은 대한민국법을 준거법으로 합니다.</span>
                          </li>
                          <li>
                            <span class="listNum">2.</span>
                            <span class="sg-text">"회사"와 "회원"간 발생한 분쟁에 관한 소송은 민사소송법 상의 관할법원에 제소합니다.</span>
                          </li>
                        </ol>
                        <p>본 약관은 2021년 12월 31일부터 적용 합니다.</p>
                      </section>
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form_checkbox">
                    <input class="check_box" id="agree4" name="agree" type="checkbox">
                    <label for="agree4"> 공인중개사 및 파트너 회원 서비스 이용 약관에 동의합니다</label>
                  </div>
                </div>
              <? } ?>
            </div>
            <!--전체 동의 -->
            <div class="all_agree">
              <input type="checkbox" id="agreeAll" class="check_box" name="agreeAll">
              <label for="agreeAll">모든 이용약관에 동의합니다.</label>
            </div>
            <!-- <div class="bottomBtn-wrap">
              <input type="submit" title="다음가입단계로" alt="다음가입단계로" value="다음 단계로" class="btn_next" id="">
            </div> -->
            <!-- 본인인증 -->
            <div class="prsnlCrtfc-wrap">
              <div class="sub-title">
                <h4><img src="../../../icon/square.png" alt="약관동의아이콘"> 본인인증</h4>
                <p>- 명당 파트너스 회원가입 진행을 위한 본인 인증이 필요합니다.</p>
              </div>
              <a href="javascript:callSa();" class="btn-prsnlCrtfc">
                <div class="img-wrap"><img src="../../../img/cert_hp.png" alt="본인인증휴대폰이미지"></div>
                <p>본인 명의의 휴대폰을 이용해<br>인증해주시기바랍니다.</p>
                <p class="text-ti">본인 인증</p>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="error"><i class="xi-warning"></i>비밀번호가 일치하지 않습니다. 확인해주세요!</div>
  </div>
</main>
<script>
  $("#agreeAll").on("click", function() {
    if ($(this).is(':checked')) {
      $('#agree1').prop('checked', true);
      $('#agree2').prop('checked', true);
      $('#agree3').prop('checked', true);
      $('#agree4').prop('checked', true);
      $('.agree-wrap').stop().slideUp(500);
      var offset = $(".step-wrap").offset();
      console.log(offset)
      $("html, body").animate({
        scrollTop: offset.top
      }, 400);
    } else {
      $('#agree1').prop('checked', false);
      $('#agree2').prop('checked', false);
      $('#agree3').prop('checked', false);
      $('#agree4').prop('checked', false);
      $('.agree-wrap').stop().slideDown(500);
    }
  });
  $('#agree1').on("click", function() {
    if ($(this).is(':checked') && $('#agree2').is(':checked') && $('#agree3').is(':checked') && $('#agree4').is(
        ':checked')) {
      $("#agreeAll").prop('checked', true);
      $('.agree-wrap').stop().slideUp(500);
      var offset = $(".step-wrap").offset();
      $("html, body").animate({
        scrollTop: offset.top
      }, 400);
    } else {
      $("#agreeAll").prop('checked', false);
    }
  });
  $('#agree2').on("click", function() {
    if ($(this).is(':checked') && $('#agree1').is(':checked') && $('#agree3').is(':checked') && $('#agree4').is(
        ':checked')) {
      $("#agreeAll").prop('checked', true);
      $('.agree-wrap').stop().slideUp(500);
      var offset = $(".step-wrap").offset();
      $("html, body").animate({
        scrollTop: offset.top
      }, 400);
    } else {
      $("#agreeAll").prop('checked', false);
    }
  });
  $('#agree3').on("click", function() {
    if ($(this).is(':checked') && $('#agree2').is(':checked') && $('#agree1').is(':checked') && $('#agree4').is(
        ':checked')) {
      $("#agreeAll").prop('checked', true);
      $('.agree-wrap').stop().slideUp(500);
      var offset = $(".step-wrap").offset();
      $("html, body").animate({
        scrollTop: offset.top
      }, 400);
    } else {
      $("#agreeAll").prop('checked', false);
    }
  });
  $('#agree4').on("click", function() {
    if ($(this).is(':checked') && $('#agree1').is(':checked') && $('#agree2').is(':checked') && $('#agree3').is(
        ':checked')) {
      $("#agreeAll").prop('checked', true);
      $('.agree-wrap').stop().slideUp(500);
      var offset = $(".step-wrap").offset();
      $("html, body").animate({
        scrollTop: offset.top
      }, 400);
    } else {
      $("#agreeAll").prop('checked', false);
    }
  });
</script>