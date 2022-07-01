<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$(function() {
  $(document).tooltip();
});
</script>
<style>
label {
  display: inline-block;
  width: 5em;
}
</style>
<div class="col g-ml-50 g-ml-0--lg g-overflow-hidden">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">매물
          관리</a>
      </li>

    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">매물 LIST</h1>
      </div>
      <div class="media-body align-self-center text-right">
        <a class=" btn btn u-btn-primary g-width-100--md g-font-size-default g-ml-10" href="propertyWrite">+ ADD
        </a>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <div class="media-md align-items-center g-mb-30">
      <div class="media d-md-flex align-items-center ml-auto">
        <div class="d-flex g-ml-15 g-ml-55--md">
          <form action='property' method='get' id='frm' name='frm'>
            <div class="input-group g-pos-rel g-width-320--md">
              <input id="search" name='search'
                class="form-control g-font-size-default g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-20 g-pl-20 g-pr-50 "
                type="text" placeholder="Enter search keyword." value='<?=$search?>'>
              <button
                class="btn g-pos-abs g-top-0 g-right-0 g-z-index-2 g-width-60 h-100 g-bg-transparent g-font-size-16 g-color-lightred-v2 g-color-lightblue-v3--hover rounded-0"
                type="submit">
                <i class="hs-admin-search g-absolute-centered"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="add-table-responsive-wrapper">
      <div class="table-responsive">
        <table class="table table-striped">
          <colgroup class='g-hidden-sm-down'>
            <col style='width:5%;' class='g-hidden-sm-down'>
            <col style='width:13%;' class='g-hidden-sm-down'>
            <col style='width:18%;' class='g-hidden-sm-down'>
            <col style='width:15%;' class='g-hidden-sm-down'>
            <col style='width:20%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col class='g-hidden-sm-down'>
          </colgroup>
          <thead>
            <tr>
              <th class='g-hidden-sm-down'>
                NO.
              </th>
              <th style='width:200px;'>
                단계
              </th>
              <th style='width:200px;'>
                관리번호
              </th>
              <th style='width:200px;'>
                중개사(임대인)
              </th>
              <th style='width:200px;'>
                매물 명칭
              </th>
              <th style='width:100px;'>
                DATE
              </th>
              <th style='width:180px;'></th>
            </tr>
          </thead>
          <tbody>
            <?php if($cur_num > 0){?>
            <?php $i=0;?>
            <?php foreach($results as $data){?>
            <tr>
              <td class='g-hidden-sm-down'>
                <?php echo $cur_num-$i;?>
              </td>
              <td>
                <?php if($data[0]->PPT_STATE=='B'){?>
                <a class="u-icon-v5" href="#!">
                  <span class="u-badge-v1 g-rounded-50x" title="<?php echo $data[3]->CPT_MSG;?>">!</span>
                  <select class="form-control" name="PPT_STATE[]" id="PPT_STATE<?php echo $data[0]->PPT_IDX;?>"
                    data="<?php echo $data[0]->PPT_IDX;?>" data1="<?php echo $data[0]->USER_IDX;?>"
                    data2="<?php echo $data[0]->PPT_USER_TYPE;?>">
                    <option value="A" <?php if($data[0]->PPT_STATE=='A' ){ echo "selected" ; }?>>승인</option>
                    <option value="B" <?php if($data[0]->PPT_STATE=='B' ){ echo "selected" ; }?>>검토중</option>
                    <option value="C" <?php if($data[0]->PPT_STATE=='C' ){ echo "selected" ; }?>>완료</option>
                    <option value="D" <?php if($data[0]->PPT_STATE=='D' ){ echo "selected" ; }?>>종료</option>
                  </select>
                </a>
                <?php }else{?>
                <select class="form-control" name="PPT_STATE[]" id="PPT_STATE<?php echo $data[0]->PPT_IDX;?>"
                  data="<?php echo $data[0]->PPT_IDX;?>" data1="<?php echo $data[0]->USER_IDX;?>"
                  data2="<?php echo $data[0]->PPT_USER_TYPE;?>">
                  <option value="A" <?php if($data[0]->PPT_STATE=='A' ){ echo "selected" ; }?>>승인</option>
                  <option value="B" <?php if($data[0]->PPT_STATE=='B' ){ echo "selected" ; }?>>검토중</option>
                  <option value="C" <?php if($data[0]->PPT_STATE=='C' ){ echo "selected" ; }?>>완료</option>
                  <option value="D" <?php if($data[0]->PPT_STATE=='D' ){ echo "selected" ; }?>>종료</option>
                </select>
                <?php }?>
              </td>
              <td>
                M_
                <?php echo date("Ymd", strtotime($data[0]->PPT_REG_DATE));?><?php echo str_pad($data[0]->PPT_IDX, 3, "0", STR_PAD_LEFT);?>
                <?php if($data[1] > 0){?>
                <br />
                <span style="color:#c8102e">[매물 등기 중복]</span>
                <?php }?>
                <br />
                <?php echo date("Y.m.d", strtotime($data[0]->PPT_START_DATE))." ~ ".date("Y.m.d", strtotime($data[0]->PPT_END_DATE));?>
              </td>
              <td>
                <a href='propertyWrite?PPT_IDX=<?php echo $data[0]->PPT_IDX;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>'
                  class="g-color-black">
                  <?php if($data[0]->PPT_USER_TYPE=='A'){?>
                  <?php echo $data[2]->BKT_COMPANY;?><BR />
                  (<?php echo decrypt($data[2]->BKT_NAME);?>)
                  <?php }else{?>
                  <?php echo decrypt($data[2]->MET_NAME);?><BR />
                  <?}?>
                </a>
              </td>
              <td class='table_title'>
                <a href='propertyWrite?PPT_IDX=<?php echo $data[0]->PPT_IDX;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>'
                  class="g-color-black">
                  <?php echo $data[0]->PPT_TITLE;?>
                </a>
              </td>
              <td>
                <?php echo $data[0]->PPT_REG_DATE;?>
              </td>
              <td class="text-right">
                <a href="propertyWrite?PPT_IDX=<?php echo $data[0]->PPT_IDX;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
                  class="btn btn-xs u-btn-indigo g-mr-10 " data-toggle="tooltip" data-placement="top"
                  data-original-title="Edit">
                  <i class="hs-admin-pencil g-mr-3"></i>
                  MODIFY
                </a>
                <a href="/adminDAO/property_delete?PPT_IDX=<?php echo $data[0]->PPT_IDX;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
                  class="btn btn-xs u-btn-primary g-mr-10 " onclick="return confirm('삭제 시키시겠습니까??');">
                  <i class="hs-admin-trash g-mr-3"></i>
                  DELETE
                </a>
              </td>
            </tr>
            <?$i++;}?>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="text-center list_pageination">
      <?php echo $pagination;?>
    </p>
  </div>
</div>
</div>
</section>
</main>
<a class="btn u-btn-primary" href="#modal1" data-modal-target="#modal1" data-modal-effect="fadein" id="modalCp">
</a>
<div id="modal1" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
  <button type="button" class="close" onclick="Custombox.modal.close();">
    <i class="hs-icon hs-icon-close"></i>
  </button>
  <h4 class="g-mb-20">반려 사유</h4>
  <form action="/adminDAO/comPanMsg" id="cpFrm" name="cpFrm" method="post" onsubmit="return submit_ck();">
    <input type="hidden" name="pageNo" id="pageNo" value="<?php echo $pageNo;?>">
    <input type="hidden" name="search" id="search" value="<?php echo $search;?>">
    <input type="hidden" name="pKey" id="pKey" value="" />
    <input type="hidden" name="userKey" id="userKey" value="" />
    <input type="hidden" name="userType" id="userType" value="" />
    <textarea class="form-control"
      style="min-height: 300px; border: 1px solid #aaa !important; font-size: 15px; min-width:400px;" name="CPT_MSG"
      id="CPT_MSG"></textarea>
    <div class='col-md-12 text-center g-mt-30'>
      <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
    </div>
    <form>
</div>
<script type="text/javascript">
<!--
$("select[name='PPT_STATE[]']").on("change", function() {
  var PPT_STATE = $(this).val();
  var key = $(this).attr("data");
  var userKey = $(this).attr("data1");
  var userType = $(this).attr("data2");

  if (PPT_STATE == 'B') {
    $("#CPT_MSG").val("");
    $("#pKey").val("");
    $("#userKey").val("");
    $("#userType").val("");
    $("#pKey").val(key);
    $("#userKey").val(userKey);
    $("#userType").val(userType);
    $("#modalCp").trigger("click");

  } else {
    $.ajax({
      type: 'post',
      url: '/adminDAO/property_state',
      data: {
        PPT_STATE: PPT_STATE,
        PPT_IDX: key
      },
      success: function(data) {
        console.log(data);
        if (data.indexOf('yes') !== -1) {
          location.reload();
        } else {
          $("#PPT_STATE" + key).eq(0).prop("selected", false);

        }
      }
    });
  }
});

function submit_ck() {
  if (!$("#CPT_MSG").val()) {
    alert("반려사유를 입력해주세요!");
    $("#CPT_MSG").focus();
    return false;
  } else {
    return true;
  }
}
//
-->
</script>