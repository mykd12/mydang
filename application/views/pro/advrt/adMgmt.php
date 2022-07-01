<main id="container" class="sub partnerSub adMgmt">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>광고관리</h4>
    </div>
    <?php
    $usePossCnt=0;
    $useCnt=0;
    
    if($slotTotalCnt > 0){
      foreach($slotTotal as $data){
        $usePossCnt+=$data->PPT_CNT;
      }
      foreach($useSlot[0] as $data){
        $useCnt+=$data[1];
      }
    }
    ?>
    <div class="graph-wrap">
      <div class="left pieGraph">
        <div class="pie_wrap">
          <!-- 원형 그래프 -->
          <div class="pie_res">
            <svg class="pie">
              <?php if($slotTotalCnt > 0){?>
              <?php foreach($useSlot[0] as $data){?>
              <circle data-percent="<?php echo $data[1]/$usePossCnt*100;?>" />
              <?php }?>
              <?php }?>
              <!-- <circle data-percent="10" /> -->
            </svg>
          </div>
          <ul class="text-box">
            <?php if($slotTotalCnt > 0){?>
            <?php foreach($useSlot[0] as $data){?>
            <?php 
              $firstDate = date_create($data[0]->PST_START);
              $secondDate = date_create($data[0]->PST_END);
              $date_diff  = date_diff($firstDate, $secondDate);  
            ?>
            <li>
              <span class="adName"><?php echo $data[0]->PST_TITLE;?></span> (<span
                class="num"><?php echo $data[1];?></span>/<span
                class="Snum"><?php echo $data[0]->PPT_CNT;?></span>)<span class="date">기간
                <?php echo date("Y.m.d", strtotime($data[0]->PST_START));?> ~
                <?php echo date("Y.m.d", strtotime($data[0]->PST_END));?>
                (D-<?php echo $date_diff->format('%d');?>)</span>
            </li>
            <?php }?>
            <?php }?>

          </ul>
          <div class="center text"><span class="Bnum"><?php echo $useCnt;?></span><span
              class="num allnum">/<?php echo $usePossCnt;?></span>
          </div>
          <div class="center01 circle">
          </div>
          <div class="center02 circle"></div>
          <div class="center03 circle"></div>
          <div class="outer circle"></div>
        </div>
      </div>
      <div class="right pieText">
        <p class="pie-title">이용중인 광고상품 <span class="num"><?php echo $slotTotalCnt;?></span>개</p>
        <div class="pie-info">
          <div class="select">
            <p>광고상품 전체보기</p>
          </div>
          <ul class="depth02">
            <?php if($slotTotalCnt > 0){?>
            <?php foreach($useSlot[0] as $data){?>
            <?php
              $firstDate = date_create($data[0]->PST_START);
              $secondDate = date_create($data[0]->PST_END);
              $date_diff  = date_diff($firstDate, $secondDate);  
            ?>
            <li>
              <span class="color"></span>
              <span class="adName"><?php echo $data[0]->PST_TITLE;?></span>
              (<span class="num"><?php echo $data[1];?></span>
              /<span class="Snum"><?php echo $data[0]->PPT_CNT;?></span>)
              <span class="date">기간
                <?php echo date("Y.m.d", strtotime($data[0]->PST_START));?>~<?php echo date("Y.m.d", strtotime($data[0]->PST_END));?>
                (D-<?php echo $date_diff->days;?>)</span>
            </li>
            <?php }?>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
    <?php if($PRO_TYPE=='A'){?>
    <div class="tab-menu">
      <ul>
        <li class="on">광고상품별 이용현황</li>
        <li>담당자별 이용현황</li>
      </ul>
    </div>
    <?php }?>
    <div class="content on">
      <div class="content-inner">
        <h3>광고상품별 이용현황</h3>
        <!-- 바 그래프 리스트 시작-->
        <div class="barGraph-wrap">
          <!-- 진행중 바 그래프 리스트 시작-->
          <!-- 진행중 바 그래프 리스트 시작-->
          <!-- 진행중 바 그래프 리스트 시작-->
          <!-- 진행중 바 그래프 리스트 시작-->
          <!-- 진행중 바 그래프 리스트 시작-->
          <ul class="barGraph-list ing">
            <?php if($slotTotalCnt > 0){?>
            <?php foreach($useSlot[0] as $data){?>
            <?php 
              $firstDate = date_create(date("Y-m-d"));
              $secondDate = date_create($data[0]->PST_END);
              $date_diff  = date_diff($firstDate, $secondDate);  
              $ratio = $data[1]/$data[0]->PPT_CNT*100;
            ?>
            <li>
              <div class="barGraph">
                <div class="bar-wrap"><span class="bar" style="width:<?php echo $ratio;?>%"></span>
                </div>
                <div class="bottom text-wrap">
                  <span class="adName"
                    id="adName<?php echo $data[0]->PST_IDX;?>"><?php echo $data[0]->PST_TITLE;?></span>
                  <input type="text" id="adNameInput<?php echo $data[0]->PST_IDX;?>"
                    value="<?php echo $data[0]->PST_TITLE;?>" style='display:none'>
                  <span class="Bnum"><?php echo $data[1];?></span> / <span
                    class="num"><?php echo $data[0]->PPT_CNT;?></span>
                  <span class="adDate">기간 <?php echo date("Y.m.d", strtotime($data[0]->PST_START));?>
                    ~ <?php echo date("Y.m.d", strtotime($data[0]->PST_END));?>
                    (D-<?php echo $date_diff->days;?>)
                  </span>
                </div>
              </div>
              <div class="btn-wrap">
                <a href="javascript:sltModify('<?php echo $data[0]->PST_IDX;?>');" class="btn-nameEdit"
                  id="adSaveBtn<?php echo $data[0]->PST_IDX;?>">상품명 수정</a>
                <a href="/pro/paymentExt?key=<?php echo $data[0]->PST_IDX;?>" class="btn-extns">광고 연장</a>
                <a href="/pro/storeList?state=A&slotKey=<?php echo $data[0]->PST_IDX;?>" class="btn-extns">매물 관리</a>
              </div>
            </li>
            <?php }?>
            <?php }?>
          </ul>
          <!-- <a href="javascript:void(0)" class="btn-more">
            <span>더 보기</span><i class="xi-angle-down-thin"></i>
          </a> -->
        </div>
      </div>
    </div>
    <script>
    function sltModify(key) {
      $("#adName" + key).css("display", "none");
      $("#adNameInput" + key).css("display", "");
      $("#adSaveBtn" + key).attr("href", "javascript:sltSave('" + key + "');");
      $("#adSaveBtn" + key).text("저장");
    }

    function sltSave(key) {
      var title = $("#adNameInput" + key).val();
      location.href = "/DAO/slotTitleModify?key=" + key + "&title=" + title;
    }
    </script>
    <!-- 담당자별 이용현황 -->
    <!-- 담당자별 이용현황 -->
    <!-- 담당자별 이용현황 -->
    <!-- 담당자별 이용현황 -->
    <!-- 담당자별 이용현황 -->
    <div class="content">
      <div class="content-inner">
        <h3>담당자별 이용현황</h3>
        <div class="agentsAdList-wrap">
          <ul class="agents-adList">
            <?php foreach($userState as $data){?>
            <li class="agent01">
              <ul class="agentsAdList_table">
                <li class="t-con" data-th="담당자명">
                  <p><?php echo decrypt($data[0]->BST_NAME);?><span class=""></span></p>
                </li>
                <li class="t-con" data-th="총 광고">
                  <p><?php echo $data[2];?></p>
                </li>
                <li class="t-con" data-th="광고명">
                  <?php if($data[2] > 0){?>
                  <?php foreach($data[1] as $dataSlot){?>

                  <p><span class="adName"><?php echo $dataSlot->PST_TITLE;?></span></p>
                  <?php }?>
                  <?php }else{?>
                  -
                  <?php }?>
                </li>
                <li class="t-con" data-th="사용량">
                  <?php if($data[2] > 0){?>
                  <?php $i=0;?>
                  <?php foreach($data[1] as $dataSlot){?>
                  <p><span class="Bnum">
                      <?echo $data[3][$i]?>
                    </span>/<span class="num"><?php echo $dataSlot->PPT_CNT;?></span></p>
                  <?php $i++;}?>
                  <?php }else{?>
                  -
                  <?php }?>
                </li>
                <li class="t-con" data-th="기간">
                  <?php if($data[2] > 0){?>
                  <?php foreach($data[1] as $dataSlot){?>
                  <?php 
                    $firstDate = date_create($dataSlot->PST_START);
                    $secondDate = date_create($dataSlot->PST_END);
                    $date_diff  = date_diff($firstDate, $secondDate);  
                  ?>
                  <p>
                    <span class="adDate">
                      기간
                      <?php echo date("Y.m.d", strtotime($dataSlot->PST_START));?>-<?php echo date("Y.m.d", strtotime($dataSlot->PST_END));?>
                      (D-<?php echo $date_diff->days;?>)
                    </span>
                  </p>
                  <?php }?>
                  <?php }else{?>
                  -
                  <?php }?>
              </ul>
            </li>
            <?php }?>
          </ul>
          <!-- <a href="javascript:void(0)" class="btn-more">
            <span>더 보기</span><i class="xi-angle-down-thin"></i>
          </a> -->
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

//탭메뉴 클릭이벤트
$('.tab-menu li').on('click', function(e) {
  e.preventDefault();
  $(this).addClass('on').siblings().removeClass('on');
  var idx = $(this).index();
  $('.content').eq(idx).addClass('on').siblings().removeClass('on');
});
</script>
<script>
</script>