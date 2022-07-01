<?php $area_array = explode(" ", $results[0]->CST_ADDR1_B);?>
<!-----  메인 시작 ----->
<style>
.subVisual .bg-wrap {
  position: relative;
  background: url(/uploads/<?php echo $results[0]->CST_IMG_SAVE;?>) center center fixed;
  background-size: cover;
  height: 350px;
}

@media screen and (max-width: 768px) {
  .subVisual .bg-wrap {
    height: 150px;
  }
}
</style>
<main id="main" class="sub view view02 caseView">
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
          <div class="con_ti">
            <h3 class="text_ti"><span class="area-d">[<?php echo $area_array[0];?>]</span><span class="text-ti">
                <?php echo $results[0]->CST_TITLE;?></span></h3>
            <div class="cp-wrap">
              <div class="img-wrap">
                <img src="/uploads/<?php echo $results[4][0];?>" alt="팁이미지">
              </div>
              <p class="cp-name"><?php echo $results[3][0];?></p>
            </div>
            <ul class="con-de">
              <?php if($results[0]->CST_TYPE=='인테리어'){?>
              <li><span>평수</span><span><?php echo $results[0]->CST_OPTION_A;?></span></li>
              <li><span>예산</span><span><?php echo $results[0]->CST_OPTION_B;?></span></li>
              <li><span>기간</span><span><?php echo $results[0]->CST_OPTION_C;?></span></li>
              <?php }else if($results[0]->CST_TYPE=='가구'){?>
              <li><span>예산</span><span><?php echo $results[0]->CST_OPTION_B;?></span></li>
              <?php }else if($results[0]->CST_TYPE=='주방/설비'){?>
              <li><span>예산</span><span><?php echo $results[0]->CST_OPTION_B;?></span></li>
              <?php }else if($results[0]->CST_TYPE=='간판'){?>
              <li><span>예산</span><span><?php echo $results[0]->CST_OPTION_B;?></span></li>
              <li><span>기간</span><span><?php echo $results[0]->CST_OPTION_C;?></span></li>
              <?php }?>
            </ul>
          </div>
          <div class="con-text">
            <p><?php echo $results[0]->CST_CONTENT;?></p>
          </div>
          <div class="comments">
            <?php if($this -> session ->userdata('LOGIN_IDX')){?>
            <div class="comment-input">
              <p class="text-cnt">댓글 <span class="cnt"><?php echo COUNT($results[1]);?></span></p>
              <!-- 댓글 입력폼 -->
              <div class="comment-form">
                <form method="post" action="/DAO/caseRev" onsubmit="return rvSubmit_ck();" id="frmRv">
                  <input type="hidden" name="MET_IDX" id="MET_IDX"
                    value="<?php echo $this -> session ->userdata('LOGIN_IDX');?>" />
                  <input type="hidden" name="CST_IDX" id="CST_IDX" value="<?php echo $results[0]->CST_IDX;?>" />
                  <input type="hidden" name="search" id="search" value="<?php echo $search;?>" />
                  <input type="hidden" name="pageNo" id="pageNo" value="<?php echo $pageNo;?>" />
                  <input type="hidden" name="location" id="location" value="<?php echo $location;?>" />
                  <textarea name="InsCrcont" id="InsCrcont" cols="30" rows="3"></textarea>
                  <button type="submit" class="btn-upload">등록</button>
                </form>
              </div>
            </div>
            <?php }?>
            <!-- 댓글목록 -->
            <?$i=0;?>
            <?php foreach($results[1] as $data){?>
            <div class="comment-row">
              <form method="post" action="">
                <p>
                  <?php if(isset($results[2][$i]->MET_NAME)){?>
                  <span class="nickname"><?php echo decrypt($results[2][$i]->MET_NAME);?></span>
                  <?php }else{?>
                  <span class="nickname" style="font-weight:600; color:#ccc;">[삭제된 계정]</span>
                  <?php }?>
                  <span class="date"><?php echo $data->CRT_REG_DATE;?></span>
                </p>
                <div class="con">
                  <span><i class="xi-subdirectory-arrow"></i></span>
                  <p>
                  <pre><?php echo $data->CRT_CONTENT;?></pre>
                  </p>
                </div>
                <?php if($this -> session ->userdata('LOGIN_IDX')==$data->MET_IDX){?>
                <div class="btn-wrap">
                  <a href="javascript:reviewMody('<?php echo $data->CRT_IDX;?>');"
                    class="btn-modify"><span>수정</span></a>
                  <a href="javascript:reviewDel('<?php echo $data->CRT_IDX;?>','<?php echo $data->CST_IDX;?>','<?php echo $search;?>','<?php echo $pageNo;?>','<?php echo $location;?>');"
                    class="btn-delete"><span>삭제</span></a>
                </div>
                <?php }?>
              </form>
            </div>
            <div class="dat_edit comment-row" id="rvModify<?php echo $data->CRT_IDX;?>" style="display:none;">
              <form method="post" action="/DAO/caseRevModify" onsubmit="return rvModfSubmit_ck();" id="frmRvModify">
                <input type="hidden" name="CRT_IDX" id="CRT_IDX" value="<?php echo $data->CRT_IDX;?>" />
                <input type="hidden" name="CST_IDX" id="CST_IDX" value="<?php echo $data->CST_IDX;?>" />
                <input type="hidden" name="search" id="search" value="<?php echo $search;?>" />
                <input type="hidden" name="pageNo" id="pageNo" value="<?php echo $pageNo;?>" />
                <input type="hidden" name="location" id="location" value="<?php echo $location;?>" />
                <p class="nickname"><?php echo decrypt($results[2][$i]->MET_NAME);?></p>
                <textarea name="ModfCrcont" id="ModfCrcont" cols="30"
                  rows="3"><?php echo $data->CRT_CONTENT;?></textarea>
                <button type="submit" class="btn-modifyConfirm"><span>수정하기</span></button>
              </form>
            </div>
            <?php $i++;}?>
            <!-- 댓글끝 -->

          </div>
          <div class="btn-box">
            <a href="/main/constrCase?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>&location=<?php echo $location;?>"
              class="btn-list">목록</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<script>
function rvSubmit_ck() {
  if (!$("#InsCrcont").val()) {
    alert("댓글을 입력해주세요");
    $("#InsCrcont").focus();
    return false;
  } else {
    return true;
  }
}

function rvModfSubmit_ck() {
  if (!$("#ModfCrcont").val()) {
    alert("댓글을 입력해주세요");
    $("#ModfCrcont").focus();
    return false;
  } else {
    return true;
  }
}

function reviewMody(key) {
  $("#rvModify" + key).css("display", "");
}

function reviewDel(Crkey, Cskey, search, pageNo, locUrl) {
  var rlt = confirm('삭제하시겠습니까?');
  if (rlt) {
    var url = '/DAO/caseRevDelete?CRT_IDX=' + Crkey + '&CST_IDX=' + Cskey + "&search=" + search + "&pageNo=" +
      pageNo + "&location=" + locUrl;
    location.href = url;
  } else {
    return false;
  }
}
</script>