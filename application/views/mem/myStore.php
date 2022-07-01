<!-----  메인 시작 ----->
<main id="main" class="sub list02 myFavorite favoritePro">
  <div class="sub-inner">
    <!-- 서브 비쥬얼 -->
    <section class="section1 subVisual">
      <div class="bg-wrap"></div>
      <h2 class="text-ti">관심목록</h2>
      <?//print_r($resultsImg);?>
    </section>
    <section class="section2 ">
      <!-- 탭메뉴 -->
      <div class="tab-menu">
        <ul>
          <li class="on"><a href="/main/myStore">관심명당</a></li>
          <li><a href="/main/myPartner">관심업체</a></li>
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
              <a href="/main/search?PPT_IDX=<?php echo $resultsProd[$i]->PPT_IDX;?>&cur_lat=<?php echo $resultsProd[$i]->PPT_LAT; ?>&cur_lon=<?php echo $resultsProd[$i]->PPT_LON; ?>"
                class="btn-aticle">
                <div class="img-wrap"><img src="/uploads/<?php echo $resultsImg[$i]->PIT_IMG_SAVE;?>" alt="매물사진"></div>
                <div class="text-wrap">
                  <p class="row01"><span class="area-d">[<?php echo $resultsProd[$i]->PPT_AREA_D?>] </span><span
                      class="text-ti"><?php echo $resultsProd[$i]->PPT_TITLE?></span></p>
                  <p class="row02">
                    <span class="type"></span>
                    <span class="deposit"><?php echo Number_format($resultsProd[$i]->PPT_PRICE_B);?> 만</span> /
                    <span class="monthly-rent"><?php echo Number_format($resultsProd[$i]->PPT_PRICE_A);?> 만</span>
                  </p>
                  <p class="row03">
                    <span class="area"><?php echo Number_format($resultsProd[$i]->PPT_SIZE_B);?></span>
                    <span class="text-unit">m² </span>권리금<span class="expense">
                      <?php if($resultsProd[$i]->PPT_PRICE_C_ETC=='권리금 없음'){?>무<?php }else if($resultsProd[$i]->PPT_PRICE_C_ETC=='협의가능'){?>협의가능<?php }else if(!$resultsProd[$i]->PPT_PRICE_C_ETC){ echo $resultsProd[$i]->PPT_PRICE_C;?><?php }?></span>
                  </p>
                  <div class="line"></div>
                  <div class="bottom-text">
                    <?php if($resultsProd[$i]->PPT_EXPOSURE=='y'){?>
                    <p class="add"><?php echo decrypt($resultsProd[$i]->PPT_ADDR1_A);?>
                      <?php echo decrypt($resultsProd[$i]->PPT_ADDR2);?></p>
                    <?}else{?>
                    <p class="add"><?php echo $resultsProd[$i]->PPT_AREA_A;?> <?php echo $resultsProd[$i]->PPT_AREA_B;?>
                      <?php echo $resultsProd[$i]->PPT_AREA_D;?></p>
                    <?}?>
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