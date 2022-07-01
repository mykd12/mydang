<!-----  메인 시작 ----->
<main id="main" class="sub list02 myFavorite favoriteCom">
  <div class="sub-inner">
    <!-- 서브 비쥬얼 -->
    <section class="section1 subVisual">
      <div class="bg-wrap"></div>
      <h2 class="text-ti">관심목록</h2>
    </section>
    <section class="section2 ">
      <!-- 탭메뉴 -->
      <div class="tab-menu">
        <ul>
          <li><a href="/main/myStore">관심명당</a></li>
          <li class="on"><a href="/main/myPartner">관심업체</a></li>
        </ul>
      </div>
      <!-- 내용시작 -->
      <div class="content">
        <div class="content-inner">
          <ul class="con-list notice-table">
            <?php if($cur_num > 0){?>
            <?php $i=0;?>
            <?php foreach($results as $data){?>
            <li class="t-con" id="carDiv<?php echo $data->CTT_IDX;?>">
              <a href="/main/makeSearch?PTT_IDX=<?php echo $resultsMake[$i]->PTT_IDX;?>&cur_lat=<?php echo $resultsMake[$i]->PTT_LAT; ?>&cur_lon=<?php echo $resultsMake[$i]->PTT_LON; ?>"
                class="btn-aticle">
                <div class="img-wrap">
                  <img src="/uploads/<?php echo $resultsMake[$i]->PTT_IMG_SAVE;?>" alt="업체사진">
                </div>
                <div class="text-wrap">
                  <ul class="bi-type-list">
                    <?php if($resultsMake[$i]->PTT_TYPE=='인테리어'){?>
                    <li><span class="bi-type01">인테리어</span></li>
                    <?php }else if($resultsMake[$i]->PTT_TYPE=='가구'){?>
                    <li><span class="bi-type02">가구</span></li>
                    <?php }else if($resultsMake[$i]->PTT_TYPE=='주방/설비'){?>
                    <li><span class="bi-type03">주방설비</span></li>
                    <?php }else if($resultsMake[$i]->PTT_TYPE=='간판'){?>
                    <li><span class="bi-type04">간판</span></li>
                    <?php }else if($resultsMake[$i]->PTT_TYPE=='광고/인쇄'){?>
                    <li><span class="bi-type05">광고/인쇄</span></li>
                    <?php }else if($resultsMake[$i]->PTT_TYPE=='통신/보안'){?>
                    <li><span class="bi-type06">통신/보안</span></li>
                    <?php }else if($resultsMake[$i]->PTT_TYPE=='렌탈'){?>
                    <li><span class="bi-type07">렌탈</span></li>
                    <?php }else if($resultsMake[$i]->PTT_TYPE=='기타'){?>
                    <li><span class="bi-type08">기타</span></li>
                    <?php }?>
                  </ul>
                  <h5 class="title"><?php echo decrypt($resultsMake[$i]->PTT_NAME);?></h5>
                  <div class="line"></div>
                  <div class="bottom-text">
                    <p class="text-de"><?php echo strip_tags($resultsMake[$i]->PTT_TEXT);?></p>
                  </div>
                </div>
              </a>
              <a href="javascript:void(0);" onclick="cartDel('<?php echo $data->CTT_IDX;?>');" class="btn-heart on">
                <div class="icon-wrap"></div><span class="blind">하트</span>
              </a>
            </li>
            <?php $i++;}?>
            <?php }?>
          </ul>
          <!-- 페이징 -->
          <div class="paginationDiv">
            <?php echo $pagination;?>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<script>
function cartDel(key) {

  $.ajax({
    type: 'post',
    url: '/DAO/proCartDel',
    data: {
      key: key
    },
    dataType: "json",
    success: function(data) {
      var data = JSON.parse(data);
      if (data == "1") {
        $("#carDiv" + key).remove();
      }
    }
  });
}
</script>