<main id="container" class="sub prpMgmt partnerSub">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>매물관리
      </h4>
    </div>
    <!-- 탭 + 상가현황-->
    <div class="bg-wrap">
      <?php if($state=='A'){?>
      <aside class="asideBtn-wrap">
        <?php if($slot && $slot[0]->PPT_CNT > $propCnt && $state=='A'){?>
        <a href="storeWrite?state=A&psKey=<?php echo $slot[0]->PST_IDX;?>" class="btn-"><i
            class="icon"></i><span>매물등록</span></a>
        <?php }else{?>
        <?php if($slot && $slot[0]->PPT_CNT > $propCnt){?>
        <a href="javascript:alert('광고결제를 해주세요!');" class="btn-"><i class="icon"></i><span>매물등록</span></a>
        <?php }else{?>
        <a href="javascript:alert('결제 슬롯에 매물을 전부 등록하였습니다.');" class="btn-"><i class="icon"></i><span>매물등록</span></a>
        <?php }?>
        <?php }?>
        <a href="advrt" class="btn-"><i class="icon"></i><span> 광고관리</span></a>
        <a href="payment" class="btn-"><i class="icon"></i><span> 광고결제</span></a>
        <div class="banner">
          <img src="../../../../icon/asideBanner01.png" alt="명당배너">
        </div>
        <p>*광고가 필요하면<br>광고결제를 해주세요</p>
      </aside>
      <?php }?>
      <div class="toptab">
        <ul>
          <li class="<?php if($state=='A' || !$state){ echo "on";}?>"
            onclick="location.href='storeList?state=A&slotKey=';">
            진행<span>(<?php echo $useCnt;?>)</span></li>
          <li class="<?php if($state=='D'){ echo "on";}?>"
            onclick="location.href='storeList?state=D&slotKey=<?php echo $slotKey;?>';">
            종료<span>(<?php echo $stopCnt;?>)</span>
          </li>
          <li class="<?php if($state=='C'){ echo "on";}?>"
            onclick="location.href='storeList?state=C&slotKey=<?php echo $slotKey;?>';">
            완료<span>(<?php echo $compleCnt;?>)</span>
          </li>
          <li class="<?php if($state=='B'){ echo "on";}?>"
            onclick="location.href='storeList?state=B&slotKey=<?php echo $slotKey;?>';">
            검수<span>(<?php echo $InspeCnt;?>)</span>
          </li>
        </ul>
      </div>
      <?php if($slot && ($state=='A' || !$state)){?>
      <?php
      $firstDate = date_create(date("Y-m-d"));
      $secondDate = date_create($slot[0]->PST_END);
      $date_diff  = date_diff($firstDate, $secondDate);
			?>
      <div class="topBar">
        <div class="row01">
          <p>
            <span class="bar-ti">상가매물현황</span>
          </p>
        </div>
        <div class="bar-wrap"><span class="bar" style="width:<?php echo $useCnt/$slot[0]->PPT_CNT*100;?>%"></span>
        </div>
        <div class="row02">
          <div class="">
            <p class="text-num">
              <span class="Bnum num"><?php echo $useCnt;?></span>
              / <span class="num"><?php echo $slot[0]->PPT_CNT;?></span>
            </p>
          </div>
          <div class="select-wrap">
            <div class="select_box">
              <div class="select">
                <p class="select_title">
                  <span style='font-weight: 600;' class="adName"><?php echo $slot[0]->PST_TITLE;?></span><span
                    class="bar"> - </span><br class="br"><span class="date">기간
                    <?php echo date("Y.m.d", strtotime($slot[0]->PST_START));?>~<?php echo date("Y.m.d", strtotime($slot[0]->PST_END));?>
                    (D-<?php echo $date_diff->days;?>) <i class="xi-caret-down-min"></i>
                  </span>
                </p>

                <div class="btn-down"></div>
              </div>
              <ul class="depth02 array_select">
                <?php foreach($slotTotal as $data){?>
                <?php
                $firstDate = date_create(date("Y-m-d"));
                $secondDate = date_create($data[0]->PST_END);
                $date_diff  = date_diff($firstDate, $secondDate);
                ?>
                <li data1='<?php echo $data[0]->PST_IDX;?>' data2='<?php echo $state;?>'>
                  <div class="option">
                    <input type="radio" id="adProduct<?php echo $data[0]->PST_IDX;?>" class="blind"
                      value="<?php echo $data[0]->PST_IDX;?>">
                    <label for="adProduct<?php echo $data[0]->PST_IDX;?>"><span
                        class="adName"><?php echo $data[0]->PST_TITLE;?></span> (<span class="num">
                        <?echo $data[1];?>
                      </span>/<span class="Snum"><?php echo $data[0]->PPT_CNT;?></span>)<span class="date">기간
                        <?php echo date("Y.m.d", strtotime($data[0]->PST_START));?>~<?php echo date("Y.m.d", strtotime($data[0]->PST_END));?>
                        (D-<?php echo $date_diff->days;?>)
                      </span></label>
                  </div>
                </li>
                <?php }?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
      <!-- 매물이동 -->
    </div>
    <div class="top-wrap">
      <?php if($type=='A' && ($state=='A' || $state=='C' || $state=='D')){?>
      <!-- 매물이동 버튼 -->
      <div class="prpMove-wrap">
        <a href="#prp_move" rel="modal:open" class="btn_move"><span>매물이동</span></a>
      </div>
      <?php }?>
      <div class="right-wrap">
        <!-- 서치바 -->
        <div class="search_form_wrap">
          <form class="noticeSearch_form" method="get" action="">
            <input type="hidden" name="state" id="state" value="<?php echo $state;?>">
            <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
              value="<?php echo $search;?>">
            <button type="submit" class="btn_submit"><i class="xi-search"></i>
              <span class="blind">검색</span></button>
          </form>
        </div>
        <!-- 관리자선택 -->
        <?php if($type=='A'){?>
        <div class="add-select">
          <div class="select-wrap">
            <div class="select_box">
              <select class="mngr_select" title="카테고리" id="bstCate" name="bstCate">
                <option value="">전체</option>
                <?php foreach($bkSub[0] as $data){?>
                <option value="<?php echo $data->BST_IDX;?>" <?php if($bstCate==$data->BST_IDX){ echo "selected"; }?>>
                  <?php echo decrypt($data->BST_NAME);?></option>
                <?php }?>
              </select>
              <div class="btn-down"></div>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
    <div class="content">
      <div class="content-inner">
        <?php if(!$slot && $state=='A'){?>
        <div class="conText-wrap">
          <p class="text-ti">사용 할수 있는 광고가 없습니다.</p>
          <p>광고 결제 후 이용바랍니다.</p>
        </div>
      </div>
      <?php }?>
      <?php if($slot && ($state =='A' && $slot[0] && $slot[0]->PPT_CNT > 0) || $state !='A'){?>
      <div class="prp-wrap">
        <ul class="prp-list">
          <li class="t-head">
            <div class="col01">
              <!-- 전체선택 체크박스 -->
              <div class="form_checkbox">
                <input class="check_box" id="thAll-ck" name="con" type="checkbox">
                <label for="thAll-ck"><span>전체선택</span></label>
              </div>
            </div>
            <div class="col02">
              <p>매물정보</p>
            </div>
            <div class="col03">
              <p>등록정보</p>
            </div>
          </li>

          <?php for($i=0; $i < $propCnt;$i++){?>
          <?php
              if($type=='A'){
                foreach($bkSub[0] as $data){
									if($data->BST_IDX==$results[$i][0]->BST_IDX){
										$regName=decrypt($data->BST_NAME);
									}
							}
              }else{
                foreach($bkSub[0] as $data){
							  	$regName=decrypt($data->MET_NAME);
                }
              }
							
						?>

          <li class="t-con">
            <div class="col01" data-th="">
              <div class="form_checkbox">
                <input class="check_box" id="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>" name="pptChck[]"
                  type="checkbox" value="<?php echo $results[$i][0]->PPT_IDX;?>">
                <label for="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>"></label>
              </div>
            </div>
            <div class="prp tmprySto col02" data-th="매물정보">
              <div class="top-row">
                <div class="img-wrap">
                  <img src="/uploads/<?php echo $results[$i][1]->PIT_IMG_SAVE;?>" alt="광고매물이미지">
                </div>
                <div class="text-wrap">
                  <p class="row01">
                    <span class="mark01">임</span>
                    <span lass="deposit"><?php echo Number_format($results[$i][0]->PPT_PRICE_A);?> 만원</span> / <span
                      cclass="monthly-rent"><?php echo Number_format($results[$i][0]->PPT_PRICE_B);?> 만원</span>
                    <?php if($results[$i][0]->PPT_PRICE_C_ETC){?>
                    <br class="br">
                    <span class="mark02">권</span><span>
                      <?php echo $results[$i][0]->PPT_PRICE_C_ETC;?></span>
                    <?php }else{?>
                    <br class="br">
                    <span class="mark02">권</span><span>
                      <?php echo Number_format($results[$i][0]->PPT_PRICE_C);?> 만원</span>
                    <?php }?>
                  </p>
                  <p class="row02">
                    <span class="prpTitle"><?php echo $results[$i][0]->PPT_TITLE;?></span>
                  </p>
                  <p class="row03 add">
                    <?php 
												if($results[$i][0]->PPT_EXPOSURE=='노출'){
													echo decrypt($results[$i][0]->PPT_ADDR1_B);
												}else{
													echo $results[$i][0]->PPT_AREA_A." ".$results[$i][0]->PPT_AREA_B." ".$results[$i][0]->PPT_AREA_D;
												}
											?>
                  </p>
                  <p class="row04 prp-de"><?php echo $results[$i][0]->PPT_CONTENT;?></p>
                </div>
                <!--<div class="rating-box">
                    <span class="premium">프리미엄</span>
                    <span class="top">TOP</span>
                  </div>-->
                <div class="shortcuts-box">
                  <?php if($state=='A'){?>
                  <a href="/main/search?PPT_IDX=<?php echo $results[$i][0]->PPT_IDX;?>&cur_lat=<?php echo $results[$i][0]->PPT_LAT;?>&cur_lon=<?php echo $results[$i][0]->PPT_LON;?>"
                    class="btn-goDtls" target="_blank"><span class="blind">상세보기</span><i class="xi-plus"></i>
                    <p>상세 바로보기</p>
                  </a>
                  <?php }?>
                  <a href="/pro/storeWrite?key=<?php echo $results[$i][0]->PPT_IDX;?>&state=<?php echo $state;?>&psKey=<?php echo $results[$i][0]->PST_IDX;?>"
                    class="btn-edtInf"><span class="blind">정보수정하기</span><i class="xi-pen-o"></i>
                    <p>정보 수정하기</p>
                  </a>
                </div>
              </div>
              <div class="memo-box">
                <form method="post">
                  <textarea name="PPT_ETC" id="PPT_ETC<?php echo $results[$i][0]->PPT_IDX;?>" cols="30" rows="1"
                    placeholder="간편메모 광고정보에 노출되지 않습니다."><?php echo $results[$i][0]->PPT_ETC;?></textarea>
                  <button type="button" class="btn-modifyConfirm"
                    onclick="ppt_submit('<?php echo $results[$i][0]->PPT_IDX;?>');"><span>메모저장</span></button>
                </form>
              </div>
              <?php if($state=="B"){?>
              <div class="checkText-box">
                <ul class="text-con">
                  <?php foreach($results[$i][2] as $row_companion){?>
                  <li class="row">
                    <p><span class="text-ti">반려사유 </span><?php echo $row_companion[0]->CPT_MSG;?>
                      <br><span class="date"><?php echo $row_companion[0]->CPT_REG_DATE;?></span>
                    </p>
                  </li>
                  <?php }?>
                </ul>
                <button type="button" class="btn-overflow"><span class="blind">click!!</span></button>
              </div>
              <?php }?>

            </div>
            <div class="col03" data-th="등록정보">
              <div class="row01"><span
                  class="prp-num">M_<?php echo date("Ymd", strtotime($results[$i][0]->PPT_REG_DATE));?><?php echo str_pad($results[$i][0]->PPT_IDX, 3, "0", STR_PAD_LEFT);?></span>
              </div>
              <div class="row02"><span class="text-ti">- 등록일
                </span><?php echo date("Y.m.d", strtotime($results[$i][0]->PPT_REG_DATE));?></div>
              <div class="row03"><span class="text-ti">- 관리자 </span><?php echo $regName;?></div>
              <!--<div class="row03"><span class="text-ti">- 조회수 </span>30</div>
                <div class="row03"><span class="text-ti">- 관심수 </span>50</div>-->
            </div>
          </li>
          <?//php }else{?>
          <?php }?>
          <?if($slot && $slot[0]->PPT_CNT > $propCnt && $state=='A'){?>
          <div class="btn-wrap">
            <img src="/icon/pro/prpAdd01.png" alt="매물등록아이콘">
            <a href="/pro/storeWrite?state=<?php echo $state;?>&psKey=<?php echo $slot[0]->PST_IDX;?>"
              class="btn-prpAdd">
              <p>매물등록</p>
            </a>
          </div>
          <?php }?>
        </ul>
      </div>
      <?php }?>
    </div>
  </div>
  <!-- </div>
  </div> -->
</main>
<!----- 푸터 시작 ----->
<script>
$(".ppState").on("change", function() {
  var state = $(this).val();
  var key = $(this).attr("data");
  var endDAte = $(this).attr("data1");
  $.ajax({
    type: 'post',
    url: "/DAO/pst_state",
    data: {
      key: key,
      state: state,
      endDAte: endDAte
    },
    success: function(data, status, xhr) {
      if (data == '1') {
        location.reload();
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("error - " + jqXHR.responseText);
    }
  });
});

function ppt_submit(key) {
  var PPT_ETC = $("#PPT_ETC" + key).val();
  $.ajax({
    type: 'post',
    url: "/DAO/ppt_submit",
    data: {
      PPT_ETC: PPT_ETC,
      key: key
    },
    success: function(data, status, xhr) {
      if (data == '1') {
        alert("메모가 정상적으로 저장되었습니다.");
        return true;
      } else {
        alert("메모가 정상적으로 저장되지 않았습니다.");
        return true;
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("error - " + jqXHR.responseText);
    }
  });
}
</script>

<script type="text/javascript">
$('.topteb ul li').on('click', function(e) {
  $(this).addClass('on').siblings().removeClass('on');
  e.preventDefault();
});
</script>
<script>
$("#thAll-ck").on("change", function() {
  if ($(this).is(":checked")) {
    $("input:checkbox[name='pptChck[]']").prop("checked", true);
  } else {
    $("input:checkbox[name='pptChck[]']").prop("checked", false);
  }
});
$("#bstCate").on("change", function() {
  var data = $(this).val();
  var state = "<?php echo $state;?>";
  location.href = 'storeList?state=' + state + '&bstCate=' + data;
});
</script>
<!-- 매물이동 선택 모달 -->
<div class="" id="prp_move">
  <div class="modal-inner">
    <h3>매물이동 선택</h3>
    <form name="frmMove" id="frmMove" action="/DAO/proMove" method="post" onsubmit="return moveSubmit();">
      <input type="hidden" name="state" id="state" value="<?php echo $state;?>" />
      <input type="hidden" name="slotKey" id="slotKey" value="<?php echo $slotKey;?>" />
      <input type="hidden" name="pKey" id="pKey" value="" />
      <ul>
        <li class="select-wrap">
          <div class="left-title">상품선택</div>
          <div class="select_box select_box01">
            <select class="contact_select" title="카테고리" id="slot" name="slot">
              <option value="">상품을 골라주세요.</option>
              <?php foreach($slotTotal as $data){?>
              <option value="<?php echo $data[0]->PST_IDX;?>" data1="<?php echo $data[1];?>"
                data2="<?php echo $data[0]->PPT_CNT;?>"><span
                  class="adProductTi"><?php echo mb_strimwidth($data[0]->PST_TITLE, 0, 20,"...", 'utf-8');?></span> -
                <span><?php echo date("Y.m.d", strtotime($data[0]->PST_START));?> ~
                  <?php echo date("Y.m.d", strtotime($data[0]->PST_END));?></span>
              </option>
              <?php }?>

            </select>
            <div class="btn-down"></div>
          </div>
        </li>
        <li class="select-wrap">
          <div class="left-title">담당자선택</div>
          <div class="select_box select_box02">
            <select class="contact_select" title="카테고리" id="bkSub" name="bkSub">
              <option value=""> 담당자를 선택해주세요.</option>
              <?php foreach($bkSub[0] as $data){?>
              <option value="<?php echo $data->BST_IDX;?>"><?php echo decrypt($data->BST_NAME);?></option>
              <?php }?>
            </select>
            <div class="btn-down"></div>
          </div>
        </li>
        <li class="select-wrap">
          <div class="left-title">상태선택</div>
          <div class="select_box select_box03">
            <select class="contact_select" title="카테고리" id="pState" name="pState">
              <option value="">상태를 선택해주세요.</option>
              <option value="A">광고진행</option>
              <option value="D">광고중지</option>
              <option value="C">광고완료</option>
            </select>
            <div class="btn-down"></div>
          </div>
        </li>
      </ul>
      <div class="btn-wrap">
        <a href="javascript:$('#frmMove').submit();" class="btn-move">이동</a>
        <a href="javascript:void(0)" rel="modal:close" class="btn-cl">취소</a>
      </div>
    </form>
  </div>
</div>


<script>
$('.select_box01 select').change(function() {
  $(this).css('color', '#000');
});
$('.select_box02 select').change(function() {
  $(this).css('color', '#000');
});
$('.select_box03 select').change(function() {
  $(this).css('color', '#000');
});
$('.btn-overflow').click(function() {
  $(this).parent('.checkText-box').toggleClass('on')
});


if ($('.checkText-box .text-con li').height() < 80) {
  $('.checkText-box').css('padding-bottom', '0');
  $('.btn-overflow').css('display', 'none');
}

// top bar 그래프 하단 광고 상품 select 선택

$('.select').on('click', function(e) {
  e.stopPropagation();
  $(this).toggleClass('on');
  $(this).siblings('.depth02').toggleClass('active');
});

$(".array_select li").on("click", function() {
  // var text = $(this).find('label').html();
  // console.log(text)
  // $(".select-wrap .select>p").html(text);
  // $(this).parent().removeClass('active')
  var data1 = $(this).attr("data1");
  var data2 = $(this).attr("data2");
  location.href = '/pro/storeList?state=' + data2 + '&slotKey=' + data1;
});
$(".btn_move").on("click", function() {
  $("#slot option:eq(0)").prop("selected", true);
  $("#bkSub option:eq(0)").prop("selected", true);
  $("#pState option:eq(0)").prop("selected", true);
  if ($("input:checkbox[name='pptChck[]']:checked").length == 0) {
    alert("이동할 매물을 선택해주세요!");
    return false;
  } else {
    $("#pKey").val("");
    var pKey = "";
    var i = 0;
    $("input:checkbox[name='pptChck[]']:checked").each(function() {
      if (i == 0) {
        pKey += $(this).val();
      } else {
        pKey += "," + $(this).val();
      }
      i++;
    });
    $("#pKey").val(pKey);
    return true;
  }
});

function moveSubmit() {
  var pKey = $("#pKey").val();
  pKey = pKey.split(",").length;
  var data1 = $("#slot option:selected").attr("data1");
  var data2 = $("#slot option:selected").attr("data2");
  var margin = Number(data2) - (Number(data1) + pKey);
  if (!$("#slot").val() && !$("#bkSub").val() && !$("#pState").val()) {
    alert("이동할정보를 선택해주세요.");
    return false;
  } else if (margin < 0) {
    alert("이동할 광고에 슬롯 갯수가 부족합니다.");
    return false;
  } else {
    return true;
  }
}

function scrollUSection1Ani() {
  var aside1 = $('.asideBtn-wrap').offset().top;
  $(window).scroll(function() {
    var sectionH = $('#container').height() - 400;
    console.log(sectionH);
    //console.log(section1);
    var _scrollTop = $(this).scrollTop();
    console.log(_scrollTop);
    if (_scrollTop >= sectionH) {
      $('.asideBtn-wrap').addClass('on');
    } else {
      $('.asideBtn-wrap').removeClass('on');
    }
  });
};
scrollUSection1Ani(); //실행시키기위한()  
</script>