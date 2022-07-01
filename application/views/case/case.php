<!-----  메인 시작 ----->
<main id="main" class="sub start-up list02 case">
  <div class="sub-inner">
    <!-- 서브 비쥬얼 -->
    <section class="section1 subVisual">
      <div class="bg-wrap"></div>
      <h2 class="text-ti">시공사례</h2>
    </section>
    <section class="section2 ">
      <!-- 내용시작 -->
      <div class="content">
        <div class="content-inner">
          <div class="localSelect select_wrap">
            <a href="javascript:void(0);" class="btn-localSelect"><span
                class="selec-value"><?php if($location){ echo $location;}else{ echo "지역선택";}?></span><i
                class="xi-caret-up-min"></i></a>
            <ul class="array_select">
              <li class="AREA_SELECT" data="전체"><span>전체</span></li>
              <li class="AREA_SELECT" data="서울"><span>서울특별시</span></li>
              <li class="AREA_SELECT" data="부산"><span>부산광역시</span></li>
              <li class="AREA_SELECT" data="대구"><span>대구광역시</span></li>
              <li class="AREA_SELECT" data="인천"><span>인천광역시</span></li>
              <li class="AREA_SELECT" data="광주"><span>광주광역시</span></li>
              <li class="AREA_SELECT" data="대전"><span>대전광역시</span></li>
              <li class="AREA_SELECT" data="울산"><span>울산광역시</span></li>
              <li class="AREA_SELECT" data="세종"><span>세종특별자치시</span></li>
              <li class="AREA_SELECT" data="경기"><span>경기도</span></li>
              <li class="AREA_SELECT" data="강원"><span>강원도</span></li>
              <li class="AREA_SELECT" data="충북"><span>충청북도</span></li>
              <li class="AREA_SELECT" data="충남"><span>충청남도</span></li>
              <li class="AREA_SELECT" data="전북"><span>전라북도</span></li>
              <li class="AREA_SELECT" data="전남"><span>전라남도</span></li>
              <li class="AREA_SELECT" data="경북"><span>경상북도</span></li>
              <li class="AREA_SELECT" data="경남"><span>경상남도</span></li>
              <li class="AREA_SELECT" data="제주"><span>제주특별자치도</span></li>
            </ul>
          </div>
          <!-- 서치바 -->
          <div class="search_form_wrap">
            <form class="noticeSearch_form" method="get" action="constrCase">
              <input type="hidden" name="location" id="location" value="<?php echo $location;?>" />
              <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
                value="<?php echo $search;?>">
              <button type="submit" class="btn_submit">검색</button>
            </form>
          </div>
          <!--게시판 리스트 시작-->
          <ul class="con-list notice-table">
            <?php if($cur_num > 0){?>
            <?php $i=0;?>
            <?php foreach($results as $data){?>
            <?php $area_array = explode(" ", $data->CST_ADDR1_B); ?>
            <li class="t-con">
              <a href="constrCaseView?CST_IDX=<?php echo $data->CST_IDX;?>&search=<?php echo $search;?>&location=<?php echo $location;?>&pageNo=<?php echo $pageNo;?>"
                class="btn-aticle">
                <div class="img-wrap">
                  <img src="/uploads/<?php echo $data->CST_IMG_SAVE;?>" alt="팁이미지">
                </div>
                <div class="text-wrap">
                  <p class="title"><span class="area-d">[<?php echo $area_array[0];?>]</span><span class="text-ti">
                      <?php echo $data->CST_TITLE;?></span></p>
                  <p class="add"><?php echo $data->CST_ADDR1_B;?> <?php echo $data->CST_ADDR2;?></p>
                  <span class="line"></span>
                  <div class="bottom-text">
                    <p class="cp-name"><?php echo $resultsPtn[$i];?></p>
                    <ul class="bi-type-list">
                      <?php if($data->CST_TYPE=='인테리어'){?>
                      <li><span class="bi-type01">인테리어</span></li>
                      <?php }else if($data->CST_TYPE=='가구'){?>
                      <li><span class="bi-type02">가구</span></li>
                      <?php }else if($data->CST_TYPE=='주방설비'){?>
                      <li><span class="bi-type03">주방설비</span></li>
                      <?php }else if($data->CST_TYPE=='간판'){?>
                      <li><span class="bi-type04">간판</span></li>
                      <?php }else if($data->CST_TYPE=='광고/인쇄'){?>
                      <li><span class="bi-type05">광고/인쇄</span></li>
                      <?php }else if($data->CST_TYPE=='통신/보안'){?>
                      <li><span class="bi-type06">통신/보안</span></li>
                      <?php }else if($data->CST_TYPE=='렌탈'){?>
                      <li><span class="bi-type07">렌탈</span></li>
                      <?php }else if($data->CST_TYPE=='기타'){?>
                      <li><span class="bi-type08">기타</span></li>
                      <?php }?>
                    </ul>
                  </div>
                </div>
              </a>
            </li>
            <?$i++;}?>
            <?php }?>
          </ul>
          <!-- 페이징 -->
          <div class="paginationDiv">
            <?php echo $pagination;?>
          </div>
    </section>
  </div>
</main>
<script>
$(".btn-localSelect").on("click", function() {
  $(".array_select").toggleClass('active')
  $(this).toggleClass('on')
});
$(".array_select li").on("click", function() {
  var text = $(this).find('span').html();
  $(".selec-value").html(text);
  $(this).parent().removeClass('active')
  $(".btn-localSelect").removeClass('on');
  var search = "<?php echo $search;?>";
  location.href = '/main/constrCase?search=' + search + '&location=' + text;
});
</script>