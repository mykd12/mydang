    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/modalAnl.css?v=<?php echo time(); ?>">

    <!----------------------------------------------------->
    <!----------------------------------------------------->
    <!--------------    상권분석 폼    --------------->
    <!--------------    상권분석 폼    --------------->
    <!--------------    상권분석 폼    --------------->
    <!----------------------------------------------------->
    <!----------------------------------------------------->
    <div id="modal-analysis" class="modal-analysis">
      <div class="modal-inner">
        <div class="top-con">
          <p>선택상권의 주요 현황을 알려드립니다.<br>
            보다 자세한 정보는 ‘상권분석’을 이용해주세요.</p>
          <ul>
            <li>
              <p class="위치" id="analyLocation"></p>
            </li>
            <li>
              <p class="업종" id="analyIndustry"></p>
            </li>
          </ul>
        </div>
        <div class="modalSlider-wrap">
          <div class="swiper-container modal-slider05">
            <div class="swiper-wrapper">
              <div class="swiper-slide swiper-slide01">
                <h2 class="modal-ti" id=""><i class="icon"></i>월평균 추정매출은 <span class="color01" id="analySales"></span>만원
                  입니다.<span class="yymm1">(21년 09월
                    기준)</span></h2>
                <div class="graphBar-wrap">
                  <div class="avgAmt-bar">
                    <div class="text-wrap">
                      <p><span id="analySalesMin">551만원</span></p>
                      <p><span id="analySalesMax">13,814만원</span></p>
                    </div>
                    <div class="bar-wrap">
                      <div class="box" style="left:50%;" id="analySalesAvg">1,519만원</div>
                      <div class="bar" style="width:50%;" id="analySalesBar"></div>
                    </div>
                    <div class="text-wrap bar-text">
                      <p><span>최저</span></p>
                      <p><span>최고</span></p>
                    </div>
                  </div>
                </div>
                <div class="graph-wrap">
                  <div class="left">
                    <div class="colum_chart_compare graph graph01">
                      <div class="chart_container">
                        <div class="x-row">
                          <div class="x1"></div>
                          <div class="x2"></div>
                          <div class="x3"></div>
                          <div class="x4"></div>
                          <div class="x5"></div>
                        </div>
                        <ul>
                          <li>
                            <p class="num dong" id="analyDongNum">1,519</p>
                            <div class="chart_wrap">
                              <div class="chart_content average dong" id="analyDongAvg">
                              </div>
                            </div>
                            <p class="name" id="analyDong">역삼1동</p>
                          </li>
                          <li>
                            <p class="num" id="analyGuNum">1,519</p>
                            <div class="chart_wrap">
                              <div class="chart_content average" id="analyGuAvg">
                              </div>
                            </div>
                            <p class="name" id="analyGu">강남구</p>
                          </li>
                          <li>
                            <p class="num" id="analySiNum">1,519</p>
                            <div class="chart_wrap">
                              <div class="chart_content average" id="analySiAvg">
                              </div>
                            </div>
                            <p class="name" id="analySi">서울특별시</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="right">
                    <div class="mark">
                      <ul>
                        <?
                         $randomNumA = mt_rand(1, 3);
                         $randomNumAA = mt_rand(3, 17);
                        ?>
                        <?php if($randomNumA==1){?>
                        <li class="mark-up"><i class="up"></i><span class="text">전년대비</span><span
                            class="num"><?php echo $randomNumAA;?>%</span>
                        </li>
                        <?php }else if($randomNumA==2){?>
                        <li class="mark-down"><i class="down"></i><span class="text">전년대비</span><span
                            class="num">-<?php echo $randomNumAA;?>%</span></li>
                        <?php }else if($randomNumA==3){?>
                        <li class=" mark-none"><i class="none"></i><span class="text">전년대비</span><span
                            class="num">0%</span></li>
                        <?php }?>
                        <?
                         $randomNumB = mt_rand(1, 3);
                         $randomNumBB = mt_rand(3, 17);
                        ?>
                        <?php if($randomNumB==1){?>
                        <li class="mark-up"><i class="up"></i><span class="text">전월대비</span><span
                            class="num"><?php echo $randomNumBB;?>%</span>
                        </li>
                        <?php }else if($randomNumB==2){?>
                        <li class="mark-down"><i class="down"></i><span class="text">전월대비</span><span
                            class="num">-<?php echo $randomNumBB;?>%</span></li>
                        <?php }else if($randomNumB==3){?>
                        <li class=" mark-none"><i class="none"></i><span class="text">전월대비</span><span
                            class="num">0%</span></li>
                        <?php }?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide swiper-slide02">
                <h2 class="modal-ti"><i class="icon"></i>선택업종 업소수는 <span class="color02" id="selectStore">30</span>개
                  입니다.<span class="yymm1">(21년 09월
                    기준)</span></h2>
                <div class="graph-wrap">
                  <div class="left">
                    <div class="colum_chart_compare graph graph01">
                      <div class="chart_container">
                        <div class="x-row">
                          <div class="x1"></div>
                          <div class="x2"></div>
                          <div class="x3"></div>
                          <div class="x4"></div>
                          <div class="x5"></div>
                        </div>
                        <ul>
                          <li>
                            <p class="num dong" id="dongStoreCnt">1,519</p>
                            <div class="chart_wrap">
                              <div class="chart_content average dong" id="dongStoreAvg">
                              </div>
                            </div>
                            <p class="name" id="dongStore">역삼1동</p>
                          </li>
                          <li>
                            <p class="num" id="guStoreCnt">1,519</p>
                            <div class="chart_wrap">
                              <div class="chart_content average" id="guStoreAvg">
                              </div>
                            </div>
                            <p class="name" id="guStore">강남구</p>
                          </li>
                          <li>
                            <p class="num" id="siStoreCnt">1,519</p>
                            <div class="chart_wrap">
                              <div class="chart_content average" id="siStoreAvg">
                              </div>
                            </div>
                            <p class="name" id="siStore">서울특별시</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="right">
                    <div class="mark">
                      <ul>
                        <?
                         $randomNumC = mt_rand(1, 3);
                         $randomNumCC = mt_rand(1, 10);
                        ?>
                        <?php if($randomNumC==1){?>
                        <li class="mark-up"><i class="up"></i><span class="text">전년대비</span><span
                            class="num"><?php echo $randomNumCC;?>%</span>
                        </li>
                        <?php }else if($randomNumC==2){?>
                        <li class="mark-down"><i class="down"></i><span class="text">전년대비</span><span
                            class="num">-<?php echo $randomNumCC;?>%</span></li>
                        <?php }else if($randomNumC==3){?>
                        <li class=" mark-none"><i class="none"></i><span class="text">전년대비</span><span
                            class="num">0%</span></li>
                        <?php }?>
                        <?
                         $randomNumD = mt_rand(1, 3);
                         $randomNumDD = mt_rand(1, 10);
                        ?>
                        <?php if($randomNumD==1){?>
                        <li class="mark-up"><i class="up"></i><span class="text">전월대비</span><span
                            class="num"><?php echo $randomNumDD;?>%</span>
                        </li>
                        <?php }else if($randomNumD==2){?>
                        <li class="mark-down"><i class="down"></i><span class="text">전월대비</span><span
                            class="num">-<?php echo $randomNumDD;?>%</span></li>
                        <?php }else if($randomNumD==3){?>
                        <li class=" mark-none"><i class="none"></i><span class="text">전월대비</span><span
                            class="num">0%</span></li>
                        <?php }?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="bottom-text">
                  <p>선택 동은 속해있는 구보다 업소수가 <span class="color" id="storeAvg">96%</span> 적습니다.</p>
                </div>
              </div>
              <div class="swiper-slide swiper-slide03">
                <h2 class="modal-ti"><i class="icon"></i><span class="color02" id="majorSalesTitle">서울특별시 주요
                    매출정보</span>입니다.</h2>
                <div class="table-wrap">
                  <ul class="table03" id="majorSalesUl">
                    <!-- 게시판 항목 -->
                    <!-- <li class="t-head">
                      <span class="area">동</span>
                      <span class="sales">매출(만원)</span>
                      <span class="nmbBsn">업소수(개)</span>
                      <span class="crnPpl">유동인구(명)</span>
                    </li>
                    <li class="t-con">
                      <span class="area">서울특별시 종로구 교남동</span>
                      <span class="sales">2,546</span>
                      <span class="nmbBsn">53</span>
                      <span class="crnPpl">3,553</span>
                    </li>
                    <li class="t-con">
                      <span class="area">서울특별시 종로구 교남동</span>
                      <span class="sales">2,546</span>
                      <span class="nmbBsn">53</span>
                      <span class="crnPpl">3,553</span>
                    </li>
                    <li class="t-con">
                      <span class="area">서울특별시 종로구 교남동</span>
                      <span class="sales">2,546</span>
                      <span class="nmbBsn">53</span>
                      <span class="crnPpl">3,553</span>
                    </li> -->
                  </ul>
                </div>
              </div>
              <div class="swiper-slide swiper-slide04">
                <p class="modal-ti"><i class="icon"></i>일일평균 유동인구는 <span class="color02" id="population"></span>명
                  입니다.<span class="yymm1">(
                    21년 09월 기준
                    )
                </p>
                <div class="graph-wrap">
                  <div class="left">
                    <div class="graph01-wrap">
                      <div class="text-wrap">
                        <p><span>유동인구가 가장 많은 요일</span><span class="day">금요일</span></p>
                      </div>
                      <div class="graph graph04">
                        <div class="pie-chart-wrap">
                          <div class="pie-chart pie-chart1">
                            <span class="center"></span>
                          </div>
                          <p class="chart-values01">
                            <span class="value01">주</span>
                            <span class="value02">말</span>
                            <span class="value03" id="weekendVal1">2</span>
                            <span class="value04" id="weekendVal2">0</span>
                            <span class="value05" id="weekendVal3">.</span>
                            <span class="value06" id="weekendVal4">8</span>
                            <span class="value07">%</span>
                          </p>
                          <p class="chart-values02">
                            <span class="value01">주</span>
                            <span class="value02">중</span>
                            <span class="value03" id="weekDayVal1">7</span>
                            <span class="value04" id="weekDayVal2">9</span>
                            <span class="value05" id="weekDayVal3">.</span>
                            <span class="value06" id="weekDayVal4">2</span>
                            <span class="value07">%</span>
                          </p>
                          <p class="chart-de">주중·주말 비율</p>
                        </div>
                        <ul class="day-list">
                          <li><span>월요일</span><span><?php echo mt_rand(4, 14);?>%</span></li>
                          <li><span>화요일</span><span><?php echo mt_rand(4, 14);?>%</span></li>
                          <li><span>수요일</span><span><?php echo mt_rand(4, 14);?>%</span></li>
                          <li><span>목요일</span><span><?php echo mt_rand(4, 14);?>%</span></li>
                          <li class="best"><span>금요일</span><span><?php echo mt_rand(19, 25);?>%</span></li>
                          <li><span>토요일</span><span><?php echo mt_rand(4, 14);?>%</span></li>
                          <li><span>일요일</span><span><?php echo mt_rand(4, 14);?>%</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="right">
                    <div class="graph02-wrap">
                      <div class="text-wrap">
                        <p><span>유동인구가 가장 많은 시간대</span><span class="time">12-15시</span></p>
                      </div>
                      <div class="colum_chart_compare graph graph03">
                        <div class="chart_container">
                          <p class="text-unit">단위 : %</p>
                          <ul class="row-text">
                            <li class="x1">
                              <p>0</p>
                            </li>
                            <li class="x2">
                              <p>33</p>
                            </li>
                            <li class="x3">
                              <p>66</p>
                            </li>
                            <li class="x4">
                              <p>100</p>
                            </li>
                          </ul>
                          <div class="x-row">
                            <div class="x1"></div>
                            <div class="x2"></div>
                            <div class="x3"></div>
                            <div class="x4"></div>
                          </div>
                          <ul class="con">
                            <li>
                              <div class="chart_wrap">
                                <div class="chart_content average" style="height:3%;">
                                  <p class="num"><?php echo mt_rand(1, 3);?></p>
                                </div>
                              </div>
                              <p class="name">00-03</p>
                            </li>
                            <li>
                              <div class="chart_wrap">
                                <div class="chart_content average" style="height:6%">
                                  <p class="num"><?php echo mt_rand(3, 10);?></p>
                                </div>
                              </div>
                              <p class="name">04-07</p>
                            </li>
                            <li>
                              <div class="chart_wrap">
                                <div class="chart_content best" style="height:25%">
                                  <p class="num"><?php echo mt_rand(25, 40);?></p>
                                </div>
                              </div>
                              <p class="name">08-11</p>
                            </li>
                            <li>
                              <div class="chart_wrap">
                                <div class="chart_content average" style="height:11%">
                                  <p class="num"><?php echo mt_rand(20, 25);?></p>
                                </div>
                              </div>
                              <p class="name">12-15</p>
                            </li>
                            <li>
                              <div class="chart_wrap">
                                <div class="chart_content average" style="height:13%">
                                  <p class="num"><?php echo mt_rand(20, 25);?></p>
                                </div>
                              </div>
                              <p class="name">16-19</p>
                            </li>
                            <li>
                              <div class="chart_wrap">
                                <div class="chart_content average" style="height:9%">
                                  <p class="num"><?php echo mt_rand(5, 9);?></p>
                                </div>
                              </div>
                              <p class="name">20-23</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="bottom-text">
            <p>다른 동과 업종의 상권분석은 <span class="color">상권분석</span> 적습니다.</p>
          </div> -->
              </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </div>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script type="text/javascript">
// 필터 슬라이더 연결
var modalslider05 = new Swiper('.modal-slider05', {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  on: {
    slideChangeTransitionEnd: function() {
      $('.swiper-slide.swiper-slide-active').addClass('on').siblings().removeClass('on'),
        // $('.chart_content').css("height", "0"),
        draw(30, '.pie-chart1', '#6855da');
    },
  }
});

$('a[href="#modal-analysis"]').click(function(event) {
  event.preventDefault();
  $('.modal-slider05 .swiper-slide').addClass('on')
});

function draw(max, classname, colorname) {
  var i = 1;
  var func1 = setInterval(function() {
    if (i < max) {
      color1(i, classname, colorname);
      i++;
    } else {
      clearInterval(func1);
    }
  }, 10);
}

function color1(i, classname, colorname) {
  $(classname).css({
    "background": "conic-gradient(" + colorname + " 0% " + i + "%, #ddd " + i + "% 100%)"
  });
}
    </script>