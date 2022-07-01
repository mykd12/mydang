    <!-- Link Swiper's CSS -->
    <!-- <link rel="stylesheet" href="/css/modalAnl.css?v=<?php echo time(); ?>"> -->

    <!--------------------------------------------------->
    <!--------------------------------------------------->
    <!--------------    수익계산기 폼    --------------->
    <!--------------    수익계산기 폼    --------------->
    <!--------------    수익계산기 폼    --------------->
    <!--------------------------------------------------->
    <!--------------------------------------------------->

    <div id="modal-ernngClclt" class="modal-ernngClclt">
      <div class="modal-inner">
        <form id="" class="" method="post">
          <input type='hidden' name="checkCate" id="checkCate" value="카페/디저트" />
          <div class="top-con">
            <h2>어떤 업종을 검색해 볼까요?</h2>
          </div>
          <div class="scroll-wrap">
            <div class="form-inner">
              <div class="rcmnd-indst">
                <div class="ck-wrap clearfix ">
                  <div class="form-radio on" data="카페/디저트" id="pA01">
                    <div class="bg"></div>
                    <input type="radio" name="pA01" id="cafe_Dsrt" value="카페/디저트">
                    <label for="cafe_Dsrt"><span>카페/디저트</span></label>
                  </div>
                  <div class="form-radio" data="제과/제빵">
                    <div class="bg"></div>
                    <input type="radio" name="pA01" id="industry_02" value="제과/제빵">
                    <label for="industry_02"><span>제과/제빵</span></label>
                  </div>
                  <div class="form-radio" data="치킨">
                    <div class="bg"></div>
                    <input type="radio" name="pA01" id="chicken" value="치킨">
                    <label for="chicken"><span>치킨</span></label>
                  </div>
                  <div class="form-radio" data="피자">
                    <div class="bg"></div>
                    <input type="radio" name="pA01" id="asianStyle" value="피자">
                    <label for="asianStyle"><span>피자</span></label>
                  </div>
                  <div class="form-radio" data="음식점">
                    <div class="bg"></div>
                    <input type="radio" name="pA01" id="chnsFood" value="음식점">
                    <label for="chnsFood"><span>음식점</span></label>
                  </div>
                  <div class="form-radio" data="주점">
                    <div class="bg"></div>
                    <input type="radio" name="pA01" id="pub" value="주점">
                    <label for="pub"><span>주점</span></label>
                  </div>
                  <div class="form-radio" data="편의점">
                    <div class="bg"></div>
                    <input type="radio" name="pA01" id="mrtcn_Store" value="편의점">
                    <label for="mrtcn_Store"><span>편의점</span></label>
                  </div>
                  <div class="form-radio" data="직접계산">
                    <div class="bg"></div>
                    <input type="radio" name="pA01" id="industry_08" value="직접계산">
                    <label for="industry_08"><span>직접계산</span></label>
                  </div>
                </div>
              </div>
              <div class="text-deBox">
                <p>명당이 조사한 커피 업종 평균 월 매출과 지출 비용을 알려드릴게요.</p>
                <p>각 항목을 상황에 맞게 조정하면 더 정확한 수익을 예측할 수 있습니다.</p>
              </div>
              <div class="form-group">
                <h3>예상 월매출</h3>
                <div class="ck-wrap rightTop">
                  <div class="form_radio">
                    <input type="radio" id="radio11" name="radio01" value="업종평균" checked>
                    <label for="radio11">업종평균</label>
                  </div>
                  <div class="form_radio">
                    <input type="radio" id="radio12" name="radio01" value="직접입력">
                    <label for="radio12">직접입력</label>
                  </div>
                </div>
                <div class="result">
                  <input type="text" value="<?php echo number_format("17000000");?>" numberOnly id="monthSales">
                  <button class="btn-delete InitializBtn" type="button" onclick="InitializSales()"><i
                      class="xi-close-thin"></i><span class="blind">초기화</span></button>
                </div>
                <div class="btn-wrap">
                  <button class="btn-plus01" type="button" id="monthSales1000">+1,000만</button>
                  <button class="btn-plus02" type="button" id="monthSales100">+100만</button>
                  <button class="btn-plus03" type="button" id="monthSales10">+10만</button>
                </div>
                <p class="txet-de" id="monthSalesText">커피 업종 평균 월 매출액은 1,700만원입니다.</p>
              </div>
              <div class="form-group">
                <h3>원가</h3>
                <div class="result rightTop">
                  =<span class="num" id="pudCost">6,120,000</span>원
                </div>
                <div class="gaugeBar-wrap">
                  <div class="form-range">
                    <input id="gaugeBar01" type="text" name="my_range" readonly="">
                  </div>
                </div>
                <p class="txet-de" id="pudCostText">커피 업종 평균 원가는 매출의 36%입니다.</p>
              </div>
              <div class="form-group">
                <h3>직원 급여</h3>
                <div class="con">
                  <ul class="con-inner">
                    <li>
                      <div class="form_radio">
                        <input type="radio" id="pay11" name="pay01" value="평균급여로 계산하기" checked>
                        <label for="pay11">평균급여로 계산하기</label>
                      </div>
                      <div class="오른쪽 계산">
                        <div class="result rightTop">
                          <span id="salaryA">3,400,000</span>
                        </div>
                        <p class="txet-de" id="salaryAText">커피 업종 평균 원가는 매출의 36%입니다.</p>
                      </div>
                    </li>
                    <li>
                      <div class="form_radio">
                        <input type="radio" id="pay12" name="pay01" value="직접 입력하기">
                        <label for="pay12">직접 입력하기</label>
                      </div>
                      <div class="오른쪽 계산">
                        <div class="result">
                          <input type="text" value="3,400,000" id="salaryB" numberOnly>
                          <button class="btn-delete InitializBtnS" type="button" onclick="InitializSalary()"><i
                              class="xi-close-thin"></i><span class="blind">초기화</span></button>
                        </div>
                        <div class="btn-wrap">
                          <button class="btn-plus" type="button" id="salary1000">+1,000만</button>
                          <button class="btn-plus" type="button" id="salary100">+100만</button>
                          <button class="btn-plus" type="button" id="salary10">+10만</button>
                        </div>
                        <p class="txet-de" id="salaryBText">2022년 월 최저임금 1,914,440원<br>
                          (주 40시간·월 209시간, 유급주휴 포함)</p>
                      </div>
                    </li>
                    <!-- <li>
                      <div class="form_radio">
                        <input type="radio" id="pay13" name="pay01" value="시급으로 계산하기">
                        <label for="pay13">시급으로 계산하기</label>
                      </div>
                      <div class="오른쪽 계산">
                        <div class="result rightTop">
                          =<span class="num">7,000</span>원
                        </div>
                        <ul>
                          <li>
                            <div class="">
                              <h5>직원수</h5>
                              <div class="num-wrap">
                                <button type="button" class="down02 left"><i class="xi-minus-thin"></i><span
                                    class="blind">마이너스</span></button>
                                <input class="" type="text" name="pStoreysC" id="intnum02" value="1" numberonly=""
                                  readonly="">
                                <button type="button" class="up02 right"><i class="xi-plus-thin"></i><span
                                    class="blind">플러스</span></button>
                              </div>
                              <span>명</span>
                            </div>
                          </li>
                          <li>
                            <div class="">
                              <h5>주당 근무시간</h5>
                              <input type="text" value="40">
                              <span>시간</span>
                            </div>
                          </li>
                          <li>
                            <div class="">
                              <h5>시급</h5>
                              <input type="text" value="9,160">
                              <span>원</span>
                            </div>
                          </li>
                  </ul>
                </div>
                </li> -->
                  </ul>
                </div>
              </div>
              <div class="form-group">
                <h3>임대료</h3>
                <div class="ck-wrap rightTop">
                  <div class="form_radio">
                    <input type="radio" id="radio21" name="radio02" value="업종평균" checked>
                    <label for="radio21">업종평균</label>
                  </div>
                  <div class="form_radio">
                    <input type="radio" id="radio22" name="radio02" value="직접입력">
                    <label for="radio22">직접입력</label>
                  </div>
                </div>
                <div class="result">
                  <input type="text" value="2,550,000" id="rent" numberOnly>
                  <button class="btn-delete InitializBtn" type="button" onclick="InitializRent()"><i
                      class="xi-close-thin"></i><span class="blind">초기화</span></button>
                </div>
                <div class="btn-wrap">
                  <button class="btn-plus" type="button" id="rent1000">+1,000만</button>
                  <button class="btn-plus" type="button" id="rent100">+100만</button>
                  <button class="btn-plus" type="button" id="rent10">+10만</button>
                </div>
                <p class="txet-de" id="rentText">커피 업종 평균 임대료는 매출의 15%입니다.</p>
              </div>
              <div class="form-group">
                <h3>관리비</h3>
                <div class="ck-wrap rightTop">
                  <div class="form_radio">
                    <input type="radio" id="radio31" name="radio03" value="업종평균" checked>
                    <label for="radio31">업종평균</label>
                  </div>
                  <div class="form_radio">
                    <input type="radio" id="radio32" name="radio03" value="직접입력">
                    <label for="radio32">직접입력</label>
                  </div>
                </div>
                <div class="result">
                  <input type="text" value="510,000" id="mainte">
                  <button class="btn-delete InitializBtn" type="button" onclick="InitializMainte()"><i
                      class="xi-close-thin"></i><span class="blind">초기화</span></button>
                </div>
                <div class="btn-wrap">
                  <button class="btn-plus" type="button" id="mainte1000">+1,000만</button>
                  <button class="btn-plus" type="button" id="mainte100">+100만</button>
                  <button class="btn-plus" type="button" id="mainte10">+10만</button>
                </div>
                <p class="txet-de" id="mainteText">커피 업종 평균 관리비는 매출의 3%입니다.</p>
              </div>
              <div class="form-group">
                <div class="text-ti">
                  <h3>판매수수료<i class="icon"></i></h3>
                  <div class="infor-box">
                    <p>판매수수료는<br>
                    로열티, 광고비, 신용카드 수수료와같이<br>
                    매출에 따라 발생하는 비용입니다.</p>
                  </div>
                </div>
                <div class="result rightTop">
                  =<span class="num" id="Fee">510,000</span>원
                </div>
                <div class="gaugeBar-wrap">
                  <div class="form-range">
                    <input id="gaugeBar02" type="text" name="my_range" readonly="">
                  </div>
                </div>
                <p class="txet-de" id="FeeText">커피 업종 평균 판매 수수료는 매출의 36%입니다.</p>
              </div>
            </div>
            <div class="bottom-text">
              <P>업종별 평균 예상 매출과 지출 비용은 명당이 조사한 내용입니다.</P>
              <P>감가상각, 세금(부가가치세·종합소득세), 점주 인건비를 고려하지 않습니다.</P>
              <P>실제 창업 조건과 운영 환경에 따라 오차가 발생할 수 있으니 참고용으로 이용해 주세요.</P>
            </div>
          </div>
          <div class="bottom-result">
            <p>
              <i class="icon"></i>예상 월 매출이 <span id="TotalS">1,700만원</span>일 때 수익률은 <span class="color02"
                id="TotalP">23%</span><br class="br"> 월 수익은 약 <span class="color02" id="TotalM">391만원</span> 입니다.
            </p>
          </div>
        </form>
      </div>
    </div>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript">
// 게이지바
var custom_values1 = ['0', '100%'];
var gaugeBar01 = {
  skin: "big",
  min: 0,
  max: 100,
  from: 36,
  postfix: "%",
  onChange: Calculation
}
var gaugeBar02 = {
  skin: "big",
  min: 0,
  max: 100,
  from: 3,
  postfix: "%",
  onChange: Calculation
}
$("#gaugeBar01").ionRangeSlider(gaugeBar01);
$("#gaugeBar02").ionRangeSlider(gaugeBar02);
$("#optA01").ionRangeSlider(optionGauge1);
$("#optC01").ionRangeSlider(optionGauge1);
$("#optC001").ionRangeSlider(optionGauge1);

$("#demo_0").ionRangeSlider({
  skin: "big",
  min: 100,
  max: 1000,
  from: 550
});


$('.rcmnd-indst .ck-wrap .form-radio').click(function(e) {
  e.stopPropagation();
  e.preventDefault();
  $(this).find('input:radio[name=pA01]').prop('checked', function(e) {
    return !$(this).prop('checked');
  });
  $(this).toggleClass('on').siblings().removeClass('on');
});
$(".form-radio").on("click", function() {
  $("#checkCate").val($(this).attr("data"));
  if ($(this).attr("data") == '카페/디저트') {
    $("#monthSales").val("17,000,000");
    $("#monthSalesText").html("커피 업종 평균 월 매출액은 1,700만원입니다.");
    $("#pudCost").text("6,120,000");
    $("#pudCostText").html("커피 업종 평균 원가는 매출의 36%입니다.");
    $("#gaugeBar01").data("ionRangeSlider").update({
      from: 36
    });
    $("#salaryA").text("3,400,000");
    $("#salaryAText").text("커피 업종 평균 급여는 매출의 20%입니다.");
    $("#salaryB").val("3,400,000");
    $("#rent").val("2,550,000");
    $("#rentText").text("커피 업종 평균 임대료는 매출의 15%입니다.");
    $("#mainte").val("510,000");
    $("#mainteText").text("커피 업종 평균 관리비는 매출의 3%입니다.");
    $("#Fee").text("510,000");
    $("#gaugeBar02").data("ionRangeSlider").update({
      from: 3
    });
    $("#FeeText").text("커피 업종 평균 판매 수수료는 매출의 3%입니다.");
    $("#TotalS").text("1,700만원");
    $("#TotalP").text("23%");
    $("#TotalM").text("391만원");
  } else if ($(this).attr("data") == '제과/제빵') {
    $("#monthSales").val("34,000,000");
    $("#monthSalesText").html("제과/제빵 업종 평균 월 매출액은 3,400만원입니다.");
    $("#pudCost").text("18,700,000");
    $("#pudCostText").html("제과제빵 업종 평균 원가는 매출의 55%입니다.");
    $("#gaugeBar01").data("ionRangeSlider").update({
      from: 55
    });
    $("#salaryA").text("6,120,000");
    $("#salaryAText").text("제과제빵 업종 평균 급여는 매출의 18%입니다.");
    $("#salaryB").val("6,120,000");
    $("#rentText").text("커피 업종 평균 임대료는 매출의 8%입니다.");
    $("#mainte").val("1,020,000");
    $("#mainteText").text("제과제빵 업종 평균 관리비는 매출의 3%입니다.");
    $("#Fee").text("1,020,000");
    $("#gaugeBar02").data("ionRangeSlider").update({
      from: 3
    });
    $("#FeeText").text("제과제빵 업종 평균 판매 수수료는 매출의 3%입니다.");
    $("#TotalS").text("3,400만원");
    $("#TotalP").text("13%");
    $("#TotalM").text("442만원");
  } else if ($(this).attr("data") == '치킨') {
    $("#monthSales").val("16,000,000");
    $("#monthSalesText").html("치킨 업종 평균 월 매출액은 1,600만원입니다.");
    $("#pudCost").text("8,320,000");
    $("#pudCostText").html("치킨 업종 평균 원가는 매출의 52%입니다.");
    $("#gaugeBar01").data("ionRangeSlider").update({
      from: 52
    });
    $("#salaryA").text("2,400,000");
    $("#salaryAText").text("치킨 업종 평균 급여는 매출의 15%입니다.");
    $("#salaryB").val("2,400,000");
    $("#rentText").text("치킨 업종 평균 임대료는 매출의 10%입니다.");
    $("#mainte").val("480,000");
    $("#mainteText").text("치킨 업종 평균 관리비는 매출의 3%입니다.");
    $("#Fee").text("800,000");
    $("#gaugeBar02").data("ionRangeSlider").update({
      from: 5
    });
    $("#FeeText").text("치킨 업종 평균 판매 수수료는 매출의 5%입니다.");
    $("#TotalS").text("1,600만원");
    $("#TotalP").text("15%");
    $("#TotalM").text("240만원");
  } else if ($(this).attr("data") == '피자') {
    $("#monthSales").val("24,000,000");
    $("#monthSalesText").html("피자 업종 평균 월 매출액은 2,400만원입니다.");
    $("#pudCost").text("9,600,000");
    $("#pudCostText").html("피자 업종 평균 원가는 매출의 40%입니다.");
    $("#gaugeBar01").data("ionRangeSlider").update({
      from: 40
    });
    $("#salaryA").text("4,800,000");
    $("#salaryAText").text("피자 업종 평균 급여는 매출의 20%입니다.");
    $("#salaryB").val("4,800,000");
    $("#rentText").text("피자 업종 평균 임대료는 매출의 10%입니다.");
    $("#mainte").val("720,000");
    $("#mainteText").text("피자 업종 평균 관리비는 매출의 3%입니다.");
    $("#Fee").text("1,200,000");
    $("#gaugeBar02").data("ionRangeSlider").update({
      from: 5
    });
    $("#FeeText").text("피자 업종 평균 판매 수수료는 매출의 5%입니다.");
    $("#TotalS").text("2,400만원");
    $("#TotalP").text("22%");
    $("#TotalM").text("528만원");
  } else if ($(this).attr("data") == '음식점') {
    $("#monthSales").val("28,000,000");
    $("#monthSalesText").html("음식점 업종 평균 월 매출액은 2,800만원입니다.");
    $("#pudCost").text("11,200,000");
    $("#pudCostText").html("음식점 업종 평균 원가는 매출의 40%입니다.");
    $("#gaugeBar01").data("ionRangeSlider").update({
      from: 40
    });
    $("#salaryA").text("7,000,000");
    $("#salaryAText").text("음식점 업종 평균 급여는 매출의 25%입니다.");
    $("#salaryB").val("7,000,000");
    $("#rentText").text("음식점 업종 평균 임대료는 매출의 10%입니다.");
    $("#mainte").val("840,000");
    $("#mainteText").text("음식점 업종 평균 관리비는 매출의 3%입니다.");
    $("#Fee").text("840,000");
    $("#gaugeBar02").data("ionRangeSlider").update({
      from: 3
    });
    $("#FeeText").text("음식점 업종 평균 판매 수수료는 매출의 3%입니다.");
    $("#TotalS").text("2,800만원");
    $("#TotalP").text("19%");
    $("#TotalM").text("532만원");
  } else if ($(this).attr("data") == '주점') {
    $("#monthSales").val("15,000,000");
    $("#monthSalesText").html("주점 업종 평균 월 매출액은 1,500만원입니다.");
    $("#pudCost").text("6,000,000");
    $("#pudCostText").html("주점 업종 평균 원가는 매출의 40%입니다.");
    $("#gaugeBar01").data("ionRangeSlider").update({
      from: 40
    });
    $("#salaryA").text("3,750,000");
    $("#salaryAText").text("주점 업종 평균 급여는 매출의 25%입니다.");
    $("#salaryB").val("3,750,000");
    $("#rentText").text("주점 업종 평균 임대료는 매출의 10%입니다.");
    $("#mainte").val("450,000");
    $("#mainteText").text("주점 업종 평균 관리비는 매출의 3%입니다.");
    $("#Fee").text("450,000");
    $("#gaugeBar02").data("ionRangeSlider").update({
      from: 3
    });
    $("#FeeText").text("주점 업종 평균 판매 수수료는 매출의 3%입니다.");
    $("#TotalS").text("1,500만원");
    $("#TotalP").text("19%");
    $("#TotalM").text("285만원");
  } else if ($(this).attr("data") == '편의점') {
    $("#monthSales").val("44,000,000");
    $("#monthSalesText").html("편의점 업종 평균 월 매출액은 4,400만원입니다.");
    $("#pudCost").text("31,680,000");
    $("#pudCostText").html("편의점 업종 평균 원가는 매출의 72%입니다.");
    $("#gaugeBar01").data("ionRangeSlider").update({
      from: 72
    });
    $("#salaryA").text("4,400,000");
    $("#salaryAText").text("편의점 업종 평균 급여는 매출의 10%입니다.");
    $("#salaryB").val("4,400,000");
    $("#rentText").text("편의점 업종 평균 임대료는 매출의 5%입니다.");
    $("#mainte").val("1,320,000");
    $("#mainteText").text("편의점 업종 평균 관리비는 매출의 3%입니다.");
    $("#Fee").text("1,320,000");
    $("#gaugeBar02").data("ionRangeSlider").update({
      from: 3
    });
    $("#FeeText").text("편의점 업종 평균 판매 수수료는 매출의 3%입니다.");
    $("#TotalS").text("4,400만원");
    $("#TotalP").text("7%");
    $("#TotalM").text("308만원");
  } else if ($(this).attr("data") == '직접계산') {
    $("#monthSales").val("20,000,000");
    $("#monthSalesText").html("");
    $("#pudCost").text("0");
    $("#pudCostText").html("");
    $("#gaugeBar01").data("ionRangeSlider").update({
      from: 0
    });
    $("#salaryA").text("0");
    $("#salaryAText").text("");
    $("#salaryB").val("0");
    $("#rentText").text("");
    $("#mainte").val("0");
    $("#mainteText").text("");
    $("#Fee").text("0");
    $("#gaugeBar02").data("ionRangeSlider").update({
      from: 0
    });
    $("#FeeText").text("");
    $("#TotalS").text("2,000만원");
    $("#TotalP").text("100%");
    $("#TotalM").text("2,000만원");
  }
});

$("input[name='radio01']:radio").change(function() {
  if ($(this).val() == '업종평균') {
    if ($("#checkCate").val() == '카페/디저트') {
      $("#monthSales").val("17,000,000");
      $("#monthSalesText").html("커피 업종 평균 월 매출액은 1,700만원입니다.");
      $("#salaryA").text("3,400,000");
      $("#salaryB").val("3,400,000");
    } else if ($("#checkCate").val() == '제과/제빵') {
      $("#monthSales").val("34,000,000");
      $("#monthSalesText").html("제과/제빵 업종 평균 월 매출액은 3,400만원입니다.");
      $("#salaryA").text("6,120,000");
      $("#salaryB").val("6,120,000");
    } else if ($("#checkCate").val() == '치킨') {
      $("#monthSales").val("16,000,000");
      $("#monthSalesText").html("치킨 업종 평균 월 매출액은 1,600만원입니다.");
      $("#salaryA").text("2,400,000");
      $("#salaryB").val("2,400,000");
    } else if ($("#checkCate").val() == '피자') {
      $("#monthSales").val("24,000,000");
      $("#monthSalesText").html("피자 업종 평균 월 매출액은 2,400만원입니다.");
      $("#salaryA").text("4,800,000");
      $("#salaryB").val("4,800,000");
    } else if ($("#checkCate").val() == '음식점') {
      $("#monthSales").val("28,000,000");
      $("#monthSalesText").html("음식점 업종 평균 월 매출액은 2,800만원입니다.");
      $("#salaryA").text("7,000,000");
      $("#salaryB").val("7,000,000");
    } else if ($("#checkCate").val() == '주점') {
      $("#monthSales").val("15,000,000");
      $("#monthSalesText").html("주점 업종 평균 월 매출액은 1,500만원입니다.");
      $("#salaryA").text("3,750,000");
      $("#salaryB").val("3,750,000");
    } else if ($("#checkCate").val() == '편의점') {
      $("#monthSales").val("44,000,000");
      $("#monthSalesText").html("편의점 업종 평균 월 매출액은 4,400만원입니다.");
      $("#salaryA").text("4,400,000");
      $("#salaryB").val("4,400,000");
    } else if ($("#checkCate").val() == '직접계산') {
      $("#monthSales").val("20,000,000");
      $("#monthSalesText").html("");
      $("#salaryA").text("0");
      $("#salaryB").val("0");
    }
  }

});

function InitializSales() {
  $("#monthSales").val(0);
  $("#monthSalesText").html("");
}

function InitializSalary() {
  if ($("input[name=pay01]:checked").val() == '직접 입력하기') {
    $("#salaryB").val(0);
    $("#salaryBText").html("");
  }
}

function InitializRent() {
  $("#rent").val(0);
  $("#rentText").html("");
}

function InitializMainte() {
  $("#mainte").val(0);
  $("#mainteText").html("");
}

$("input:text[numberOnly]").on("keyup", function() {
  if ($(this).attr("id") == 'monthSales') {
    if ($(this).val().replace(/[^0-9]/g, "") > 100000000 || $(this).val().replace(/[^0-9]/g, "") == 100000000) {
      $(this).val(comma(uncomma(100000000)));
      $("#monthSalesText").html("<span style='color:#ff0000;'>최대 1억원까지 입력할 수 있습니다.</span>");
    } else {
      $(this).val(comma(uncomma($(this).val().replace(/[^0-9]/g, ""))));
      $("#monthSalesText").html("");
    }
  } else if ($(this).attr("id") == 'salaryB') {
    if ($(this).val().replace(/[^0-9]/g, "") > 50000000 || $(this).val().replace(/[^0-9]/g, "") == 50000000) {
      $(this).val(comma(uncomma(50000000)));
      $("#salaryBText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
    } else {
      $(this).val(comma(uncomma($(this).val().replace(/[^0-9]/g, ""))));
      $("#salaryBText").html("");
    }
  } else if ($(this).attr("id") == 'rent') {
    if ($(this).val().replace(/[^0-9]/g, "") > 50000000 || $(this).val().replace(/[^0-9]/g, "") == 50000000) {
      $(this).val(comma(uncomma(50000000)));
      $("#rentText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
    } else {
      $(this).val(comma(uncomma($(this).val().replace(/[^0-9]/g, ""))));
      $("#rentText").html("");
    }
  }

});
$("#monthSales1000").on("click", function() {
  var monthSales = Number(uncomma($("#monthSales").val()));
  monthSales = monthSales + 10000000;
  if (monthSales > 100000000 || monthSales == 100000000) {
    $("#monthSales").val(comma(uncomma(100000000)));
    $("#monthSalesText").html("<span style='color:#ff0000;'>최대 1억원까지 입력할 수 있습니다.</span>");
  } else {
    $("#monthSales").val(comma(uncomma(monthSales)));
    $("#monthSalesText").html("");
  }

});
$("#monthSales100").on("click", function() {
  var monthSales = Number(uncomma($("#monthSales").val()));
  monthSales = monthSales + 1000000;
  if (monthSales > 100000000 || monthSales == 100000000) {
    $("#monthSales").val(comma(uncomma(100000000)));
    $("#monthSalesText").html("<span style='color:#ff0000;'>최대 1억원까지 입력할 수 있습니다.</span>");
  } else {
    $("#monthSales").val(comma(uncomma(monthSales)));
    $("#monthSalesText").html("");
  }
});
$("#monthSales10").on("click", function() {
  var monthSales = Number(uncomma($("#monthSales").val()));
  monthSales = monthSales + 100000;
  if (monthSales > 100000000 || monthSales == 100000000) {
    $("#monthSales").val(comma(uncomma(100000000)));
    $("#monthSalesText").html("<span style='color:#ff0000;'>최대 1억원까지 입력할 수 있습니다.</span>");
  } else {
    $("#monthSales").val(comma(uncomma(monthSales)));
    $("#monthSalesText").html("");
  }
});
$("#salary1000").on("click", function() {
  if ($("input[name=pay01]:checked").val() == '직접 입력하기') {
    var salaryB = Number(uncomma($("#salaryB").val()));
    salaryB = salaryB + 10000000;
    if (salaryB > 50000000 || salaryB == 50000000) {
      $("#salaryB").val(comma(uncomma(50000000)));
      $("#salaryBText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
    } else {
      $("#salaryB").val(comma(uncomma(salaryB)));
      $("#salaryBText").html("");
    }
  }
});
$("#salary100").on("click", function() {
  if ($("input[name=pay01]:checked").val() == '직접 입력하기') {
    var salaryB = Number(uncomma($("#salaryB").val()));
    salaryB = salaryB + 1000000;
    if (salaryB > 50000000 || salaryB == 50000000) {
      $("#salaryB").val(comma(uncomma(50000000)));
      $("#salaryBText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
    } else {
      $("#salaryB").val(comma(uncomma(salaryB)));
      $("#salaryBText").html("");
    }
  }
});
$("#salary10").on("click", function() {
  if ($("input[name=pay01]:checked").val() == '직접 입력하기') {
    var salaryB = Number(uncomma($("#salaryB").val()));
    salaryB = salaryB + 100000;
    if (salaryB > 50000000 || salaryB == 50000000) {
      $("#salaryB").val(comma(uncomma(50000000)));
      $("#salaryBText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
    } else {
      $("#salaryB").val(comma(uncomma(salaryB)));
      $("#salaryBText").html("");
    }
  }
});

$("#rent1000").on("click", function() {
  var rent = Number(uncomma($("#rent").val()));
  rent = rent + 10000000;
  if (rent > 50000000 || rent == 50000000) {
    $("#rent").val(comma(uncomma(50000000)));
    $("#rentText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
  } else {
    $("#rent").val(comma(uncomma(rent)));
    $("#rentText").html("");
  }
});

$("#rent100").on("click", function() {
  var rent = Number(uncomma($("#rent").val()));
  rent = rent + 1000000;
  if (rent > 50000000 || rent == 50000000) {
    $("#rent").val(comma(uncomma(50000000)));
    $("#rentText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
  } else {
    $("#rent").val(comma(uncomma(rent)));
    $("#rentText").html("");
  }
});

$("#rent10").on("click", function() {
  var rent = Number(uncomma($("#rent").val()));
  rent = rent + 100000;
  if (rent > 50000000 || rent == 50000000) {
    $("#rent").val(comma(uncomma(50000000)));
    $("#rentText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
  } else {
    $("#rent").val(comma(uncomma(rent)));
    $("#rentText").html("");
  }
});
$("#mainte1000").on("click", function() {
  var mainte = Number(uncomma($("#mainte").val()));
  mainte = mainte + 10000000;
  if (mainte > 50000000 || mainte == 50000000) {
    $("#mainte").val(comma(uncomma(50000000)));
    $("#mainteText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
  } else {
    $("#mainte").val(comma(uncomma(mainte)));
    $("#mainteText").html("");
  }
});
$("#mainte100").on("click", function() {
  var mainte = Number(uncomma($("#mainte").val()));
  mainte = mainte + 1000000;
  if (mainte > 50000000 || mainte == 50000000) {
    $("#mainte").val(comma(uncomma(50000000)));
    $("#mainteText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
  } else {
    $("#mainte").val(comma(uncomma(mainte)));
    $("#mainteText").html("");
  }
});
$("#mainte10").on("click", function() {
  var mainte = Number(uncomma($("#mainte").val()));
  mainte = mainte + 100000;
  if (mainte > 50000000 || mainte == 50000000) {
    $("#mainte").val(comma(uncomma(50000000)));
    $("#mainteText").html("<span style='color:#ff0000;'>최대 5,000만원까지 입력할 수 있습니다.</span>");
  } else {
    $("#mainte").val(comma(uncomma(mainte)));
    $("#mainteText").html("");
  }
});

$("#monthSales, #pudCost, #salaryA, #salaryB, #rent, #mainte, #Fee").on("change keyup paste", function() {
  Calculation();
});
$("#monthSales1000, #monthSales100, #monthSales10, #salary1000, #salary100, #salary10, .InitializBtn, #rent1000, #rent100, #rent10, #mainte1000, #mainte100, #mainte10, #pay11, #pay12")
  .on("click",
    function() {
      Calculation();
    });
$("#salary1000, #salary100, #salary10, .InitializBtnS").on("click", function() {
  if ($("input[name=pay01]:checked").val() == '직접 입력하기') {
    Calculation();
  }
});

function Calculation() {
  var gaugeBar01 = $("#gaugeBar01").data("ionRangeSlider").result.from;
  var gaugeBar02 = $("#gaugeBar02").data("ionRangeSlider").result.from;

  var monthSales = $("#monthSales").val();

  var calcuA = parseInt(Number(uncomma(monthSales)) * (Number(gaugeBar01) / 100));
  var calcuB = parseInt(Number(uncomma(monthSales)) * (Number(gaugeBar02) / 100));
  $("#pudCost").text(comma(calcuA));
  $("#Fee").text(comma(calcuB));

  var pudCost = $("#pudCost").text();
  if ($("input[name=pay01]:checked").val() == '직접 입력하기') {
    var salary = $("#salaryB").val();
  } else {
    var salary = $("#salaryA").text();
  }
  var rent = $("#rent").val();
  var mainte = $("#mainte").val();
  var Fee = $("#Fee").text();
  var total = Number(uncomma(monthSales)) - Number(uncomma(pudCost)) - Number(uncomma(salary)) - Number(uncomma(
    rent)) - Number(uncomma(mainte)) - Number(uncomma(Fee));
  total = parseInt(total / 10000);
  if (total < 0) {
    $("#TotalM").text("0 만원");
  } else {
    $("#TotalM").text(comma(total) + "만원");
  }
  console.log(monthSales + "/" + pudCost + "/" + salary + "/" + rent + "/" + mainte + "/" + Fee);

  var TotalP = ((total * 10000) / Number(uncomma(monthSales))) * 100;
  if (TotalP < 0) {
    $("#TotalP").text("0%");
  } else {
    $("#TotalP").text(parseInt(TotalP) + "%");
  }

  var TotalS = comma(parseInt(Number(uncomma(monthSales)) / 10000));
  if (TotalS == '10,000') {
    $("#TotalS").text("1억");
  } else {
    $("#TotalS").text(comma(TotalS) + "만원");
  }

}
    </script>