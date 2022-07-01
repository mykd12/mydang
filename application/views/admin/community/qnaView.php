<style type="text/css">
.card-block img {
  max-width: 100%;
}
</style>


<div class="col g-ml-50 g-ml-0--lg ">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">고객지원 관리</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">USER QNA 관리</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item">
        <span class="g-valign-middle">USER QNA 상세보기</span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-view">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">USER QNA 상세보기</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form action="/adminDAO/qna_write" method="post" name="frm" id="frm" onsubmit="return submit_ck();">
      <input type="hidden" name="QNT_IDX" id="QNT_IDX" value="<?php echo $QNT_IDX;?>" />
      <div class="row">
        <div class="col-md-12">
          <!-- Panel -->
          <div class="card g-brd-gray-light-v7 g-rounded-3 g-mb-30 add-view-page">
            <header class="card-header g-bg-transparent g-brd-bottom-none g-px-15 g-px-30--sm g-pt-15 g-pt-20--sm pb-0">
              <div class="media">
                <h3
                  class="media-body d-flex align-self-center text-uppercase g-font-size-28 g-font-size-25--md g-color-black mb-0 view_title">
                  <?php echo $results->QNT_TITLE;?></h3>

                <div class="d-flex align-self-center justify-content-end g-width-200--sm">
                  <div class="align-self-center g-pos-rel g-z-index-2">
                    <a id="dropDown4Invoker"
                      class="u-link-v5 g-pos-rel g-top-4 g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-lightblue-v3--hover g-ml-10 g-ml-20--md"
                      href="#!" aria-controls="dropDown4" aria-haspopup="true" aria-expanded="false"
                      data-dropdown-event="click" data-dropdown-target="#dropDown4" data-dropdown-type="jquery-slide">
                      <i class="hs-admin-more-alt"></i>
                    </a>

                    <div id="dropDown4" class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white"
                      aria-labelledby="dropDown4Invoker">
                      <ul class="list-unstyled g-nowrap mb-0">
                        <li>
                          <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14"
                            href="/adminDAO/qnaDelete?QNT_IDX=<?php echo $QNT_IDX?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>"
                            onclick="return confirm('삭제하시겠습니까?');">
                            <i class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                            삭제
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </header>

            <div class="card-block">
              <div class="card g-brd-gray-light-v7 g-pt-30 g-pb-30 g-px-30--sm g-bg-gray-light-v5">
                <div class="row">
                  <div class="form-group g-mb-10  col-sm-3 g-mb-20">
                    <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">문의 구분</h4>
                    <input
                      class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 "
                      style="height:48px;" value="<?php echo $results->QNT_TYPE_A;?>" readonly>
                  </div>
                  <!--<div class="form-group g-mb-10  col-sm-6 g-mb-20">
														<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">문의 구분 B</h4>
															<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 " style="height:48px;" value="<?=$QNT_TYPE_B?>" readonly>
													</div>-->
                  <div class="form-group g-mb-10  col-sm-3 g-mb-20">
                    <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이름</h4>
                    <input
                      class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 "
                      style="height:48px;" value="<?php echo decrypt($resultsMem->MET_NAME);?>" readonly>
                  </div>
                  <div class="form-group g-mb-10  col-sm-3 g-mb-20">
                    <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">연락처</h4>
                    <input
                      class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 "
                      style="height:48px;" value="<?php echo decrypt($resultsMem->MET_TEL);?>" readonly>
                  </div>
                  <div class="form-group g-mb-10  col-sm-3 g-mb-20">
                    <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이메일</h4>
                    <input
                      class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 "
                      style="height:48px;" value="<?php echo decrypt($resultsMem->MET_EMAIL);?>" readonly>
                  </div>
                  <div class="form-group g-mb-10  col-sm-12 g-mb-20">
                    <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">문의 제목</h4>
                    <input
                      class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 "
                      style="height:48px;" value="<?php echo $results->QNT_TITLE;?>" readonly>
                  </div>
                  <div class="form-group g-mt-10  col-sm-12">
                    <?php echo $results->QNT_CONTENT;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if($results->QNT_FILE_SAVE){?>
          <div class="col-md-12 col-sm-12 col-xs-12 g-mb-30 add-file">
            <h4 class="h4 g-font-size-17 g-color-blue g-mb-10 g-px-30--sm">&middot; 첨부파일</h4>
            <!-- Panel -->
            <div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 text-left ">
              <a class="js-modal-markup u-link-v5  g-color-main  g-color-primary--hover g-mr-5  g-pl-10 g-mb-10 g-bg-gray-light-v5"
                href="/admin/down?sn=<?php echo $results->QNT_FILE_SAVE;?>&on=<?php echo $results->QNT_FILE_ORG;?>">
                <i class="fa fa-file"></i> <?php echo $results->QNT_FILE_ORG;?>
              </a>
            </div>
            <!-- End Panel -->
          </div>
          <?php }?>
          <!-- End Panel -->
        </div>
        <div class='col-md-12 text-center g-mt-20' id="CTs-write">
          <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">답변</h4>
          <textarea class='form-control g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 g-py-10'
            name='QNT_ANSWER' id='QNT_ANSWER' placeholder='답변을 해주세요.'><?php echo $results->QNT_ANSWER;?></textarea>
        </div>
        <div class='col-md-12 text-center'>
          <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
          <a href="qna?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
            class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</section>
</main>

<script type="text/javascript">
<!--
function submit_ck() {
  if (!$("#QNT_ANSWER").val()) {
    alert("답변을 입력해주세요!");
    $("#QNT_ANSWER").focus();
    return false;
  } else {
    return true;
  }
}
//
-->
</script>