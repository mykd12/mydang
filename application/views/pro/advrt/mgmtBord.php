<main id="container" class="sub partnerSub mgmtBord">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>전체관리</h4>
    </div>
    <div class="content">
      <div class="content-inner">
        <div class="board-wrap">
          <div class="board payList">
            <h5>결제내역</h5>
            <a href="/pro/paymentList" class="btn-move"><span class="blind">페이지이동</span><i class="xi-plus-thin"></i></a>
            <div class="board-con">
              <?if($slotA[1] > 0){?>
              <ul>
                <?$i=0;?>
                <?php foreach($slotA[0] as $data){?>
                <?if($i<5){?>
                <li><a href="javascript:void(0)">
                    <div class="adName">
                      <span class="adName"><?php echo $data->PST_TITLE;?></span>
                    </div>
                    <div class="">
                      <span
                        class="adDate"><?php echo date("Y.m.d", strtotime($data->PST_START));?>-<?php echo date("Y.m.d", strtotime($data->PST_END));?></span>
                      / <span class="ea"><?php echo $data->PPT_CNT;?> EA</span>
                    </div>
                  </a>
                </li>
                <?php }?>
                <?php $i++;}?>
              </ul>
              <?php }else{?>
              <p>결제내역이 없습니다.</p>
              <?php }?>
            </div>
          </div>
          <div class="board graphboard">
            <h5>광고상품관리</h5>
            <div class="select-wrap">
              <a href="javascript:void(0)" class="select"><span>전체보기</span><i class="xi-caret-down-min"></i></a>
              <?php if($slotBCnt > 0){?>
              <ul class="depth02">
                <?php foreach($slotB as $data){?>
                <?php
                  $firstDate = date_create(date("Y-m-d"));
                  $secondDate = date_create($data[0]->PST_END);
                  $date_diff  = date_diff($firstDate, $secondDate);
                ?>
                <?php if(date("Y-m-d", strtotime($data[0]->PST_START)) > date("Y-m-d")){?>
                <li>
                  <a href="javascript:void(0)">
                    <span class="color" style="background: rgb(0, 43, 220);"></span>
                    <span class="adName"><?php echo $data[0]->PST_TITLE;?></span><br>
                    (<span class="num"><?php echo $data[1];?></span>
                    /<span class="Snum"><?php echo $data[0]->PPT_CNT;?></span>)
                    <span class="date">기간
                      <?php echo date("Y.m.d", strtotime($data[0]->PST_START));?>~<?php echo date("Y.m.d", strtotime($data[0]->PST_END));?>
                      (D-<?php echo $date_diff->days;?>)</span>
                  </a>
                </li>
                <?php }else{?>
                <li>
                  <a href="/pro/storeList?state=A&slotKey=<?php echo $data[0]->PST_IDX;?>">
                    <span class="color" style="background: rgb(0, 43, 220);"></span>
                    <span class="adName"><?php echo $data[0]->PST_TITLE;?></span><br>
                    (<span class="num"><?php echo $data[1];?></span>
                    /<span class="Snum"><?php echo $data[0]->PPT_CNT;?></span>)
                    <span class="date">기간
                      <?php echo date("Y.m.d", strtotime($data[0]->PST_START));?>~<?php echo date("Y.m.d", strtotime($data[0]->PST_END));?>
                      (D-<?php echo $date_diff->days;?>)</span>
                  </a>
                </li>
                <?php }?>
                <?php }?>
              </ul>
              <?php }?>
            </div>
            <div class="board-con">
              <?php if($slotBCnt > 0){?>
              <div class="graph left">
                <div class="pie_wrap">
                  <!-- 원형 그래프 -->
                  <div class="pie_res">
                    <svg class="pie">
                      <circle data-percent="<?php echo $slotB[0][1]/$slotB[0][0]->PPT_CNT*100;?>" />
                    </svg>
                  </div>
                  <div class="center text"><span class="Bnum"><?php echo $slotB[0][1];?></span><span
                      class="num allnum">/<?php echo $slotB[0][0]->PPT_CNT;?></span>
                  </div>
                  <div class="center01 circle">
                  </div>
                  <div class="center02 circle"></div>
                  <div class="center03 circle"></div>
                  <div class="outer circle"></div>
                </div>
              </div>
              <div class="text-box">
                <?php if(date("Y-m-d", strtotime($slotB[0][0]->PST_START)) > date("Y-m-d H:i:s")){?>
                <p>예정</p>
                <?php }else{?>
                <p>기간</p>
                <?php }?>
                <p><span class="bar"></span></p>
                <p><span class="adDate"><?php echo date("Y.m.d", strtotime($slotB[0][0]->PST_START));?></span></p>
                <p><span>~ <?php echo date("Y.m.d", strtotime($slotB[0][0]->PST_END));?></span></p>
              </div>
              <?php }else if($slotBCnt > 0 && $slotB[0][0]->PST_START > date("Y-m-d")){?>
              <p>광고 진행 예정입니다.</p>
              <?php }else{?>
              <p>결제된 상품이 없습니다.</p>
              <a href='/pro/payment'>광고 상품 결제</a>
              <?php }?>
            </div>
          </div>
          <div class="board infor">
            <h5>중개사(임대인) 정보</h5>
            <?php if($type=='A'){?>
            <a href="/pro/agents" class="btn-move"><span>담당자관리</span></a>
            <?php }?>
            <div class="board-con">
              <ul>
                <?php if($type=='A'){?>
                <li>
                  <div class="col01"><span>중개업소명</span></div>
                  <div class="col02"><span><?php echo $mem->BKT_COMPANY;?></span></div>
                </li>
                <li>
                  <div class="col01"><span>대표자</span></div>
                  <div class="col02"><span><?php echo decrypt($mem->BKT_NAME);?></span></div>
                </li>
                <li>
                  <div class="col01"><span>주소</span></div>
                  <div class="col02"><span
                      class="add"><?php echo decrypt($mem->BKT_ADDR1)." ".decrypt($mem->BKT_ADDR2);?></span></div>
                </li>
                <li>
                  <div class="col01"><span>대표번호</span></div>
                  <div class="col02"><span><?php echo decrypt($mem->BKT_HP);?></span></div>
                </li>
                <li>
                  <div class="col01"><span>등록담당자</span></div>
                  <?php if($memSub[1] > 0){?>
                  <div class="col02"><span><?php echo decrypt($memSub[0][0]->BST_NAME);?>외
                      <?php echo $memSub[1];?>명</span>
                  </div>
                  <?php }else{?>
                  <div class="col02"><span><?php echo decrypt($memSub[0][0]->BST_NAME);?></span></div>
                  <?php }?>

                </li>
                <?php }else if($type=='B'){?>
                <li>
                  <div class="col01"><span>임대인</span></div>
                  <div class="col02"><span><?php echo decrypt($mem->MET_NAME);?></span></div>
                </li>
                <li>
                  <div class="col01"><span>주소</span></div>
                  <div class="col02"><span
                      class="add"><?php echo decrypt($mem->MET_ADDR1)." ".decrypt($mem->MET_ADDR2);?></span></div>
                </li>
                <li>
                  <div class="col01"><span>연락처</span></div>
                  <div class="col02"><span><?php echo decrypt($mem->MET_TEL);?></span></div>
                </li>

                <?php }?>
              </ul>
            </div>
          </div>
          <div class="board notice01">
            <h5>공지사항</h5>
            <a href="/pro/notice" class="btn-move"><span class="blind">페이지이동</span><i class="xi-plus-thin"></i></a>
            <div class="board-con">
              <ul>
                <?php $i=0;?>
                <?php if($notice[1] > 0){?>
                <?php foreach($notice[0] as $data){?>
                <?php if($i<5){?>
                <li><a href="/pro/noticeView?key=<?php echo $data->NPT_IDX;?>"><span
                      class="con"><?php echo $data->NPT_TITLE;?></span><span
                      class="date"><?php echo date("Y.m.d", strtotime($data->NPT_REG_DATE));?></span></a></li>
                <?php }?>
                <?php $i++;}?>
                <?php }?>
              </ul>
            </div>
          </div>
          <div class="board customerCenter">
            <h5>고객센터</h5>
            <div class="board-con">
              <div class="call"><img src="../../../../icon/pro/call01.png" alt="전화아이콘">1599-4385</div>
              <div class="row02">
                <div class="col01">
                  <p><span class="text">평일</span><span class="time">10:00 - 18:30</span></p>
                  <p><span class="text">점심</span><span class="time">11:30 - 13:00</span></p>
                </div>
                <div class="col02">
                  <p>토, 일요일 공휴일 휴무</p>
                  <p>realdeno@naver.com</p>
                </div>
              </div>
            </div>
          </div>
          <div class="board btn-box">
            <a href="/pro/advrt" class="btn_advrt">
              <p class="btn-title">광고<br>관리</p>
              <p class="move-box"><span>바로가기</span></p>
              <i class="icon"></i>
            </a>
            <a href="/pro/prpIqMgmtA" class="btn_prpIqMgmt">
              <p class="btn-title">문의<br>내역</p>
              <p class="move-box"><span>바로가기</span></p>
              <i class="icon"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
function pieAct() {
  //그래프 viewBox 설정
  $(window).on('load', function() {
    var pieWidth = $('.pie').width();
    $('.pie')[0].setAttribute('viewBox', '0 0 ' + pieWidth + ' ' + pieWidth + '');
  })

  var color = ["#002bdc", "#2f4bff", "#00a6e7", "#ffd642", "#ffba5a", "#f1f"]; //그래프 색상
  var angel = -90; //그래프 시작 지점
  var pieWidth = $('.pie').width();

  $('.pie circle').each(function(i) {
    var percentData = $(this).data('percent'); //그래프 비율
    var perimeter = (pieWidth / 2) * 3.14; //원의 둘레
    var percent = percentData * (perimeter / 100); //그래프 비율만큼 원의 둘레 계산

    //그래프 비율, 색상 설정
    $(this).css({
      'stroke-dasharray': percent + ' ' + perimeter,
      'stroke': color[i],
      'transform': 'rotate(' + angel + 'deg)'
    });
    $('.pie-info .depth02 > li').eq(i).find('.color').css({
      'background': color[i]
    });

    $(this).hover(function(e) {
      x = e.pageX;
      y = e.pageY;
      $('.text-box li').eq(i).css({
        'display': 'block',
        'left': x - 620 + 'px',
        'top': y - 480 + 'px',
        'z-index': '9'
      });
    }, function() {
      $('.text-box li').eq(i).css({
        'display': 'none'
      });
    })
    //그래프 시작 지점 갱신
    angel += (percentData * 3.6);
  })
  $('.barGraph-list.ing > li').each(function(i) {
    $('.barGraph-list.ing > li').eq(i).find('.bar').css({
      'background': color[i]
    });
    $('.barGraph-list.ing > li').eq(i).find('.adName').css({
      'color': color[i]
    });
  })
}
pieAct();

//셀렉트 클릭이벤트
$('.select').on('click', function(e) {
  e.stopPropagation();
  $(this).siblings('.depth02').toggleClass('active');
});
</script>