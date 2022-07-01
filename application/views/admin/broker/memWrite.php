<div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">중개사 관리</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>


      <li class="list-inline-item">
        <span class="g-valign-middle">보조 중개사
          <?if($BST_IDX){?>MODIFY
          <?}else{?>ADD
          <?}?>
        </span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">보조 중개사
          <?if($BST_IDX){?>MODIFY
          <?}else{?>ADD
          <?}?>
        </h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/brokerMemWirte" method="post" onsubmit="return submit_ck();">
      <input type='hidden' id='key' name='key' value='<?php echo $key;?>' />
      <input type='hidden' id='BST_IDX' name='BST_IDX' value='<?php echo $BST_IDX;?>' />
      <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
      <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
      <div class="row">
        <!-- 1-st column -->
        <div class="col-md-12 ">
          <!-- Basic Text Inputs -->
          <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

            <!-- 제목 Input -->
            <div class="row">
              <div class="form-group g-mb-20 col-md-2">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구분</h4>
                <select name="BST_TYPE" id="BST_TYPE" class="form-control">
                  <option value="소속공인중개사" <?php if(!$BST_IDX || $results->BST_TYPE=='소속공인중개사') echo "selected";?>>
                    소속공인중개사</option>
                  <option value="중개보조원" <?php if($BST_IDX && $results->BST_TYPE=='중개보조원') echo "selected";?>>중개보조원
                  </option>

                </select>
              </div>
              <div class="form-group g-mb-20 col-md-5">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">중개사명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='BST_NAME' id='BST_NAME' type="text"
                  value="<?php if($BST_IDX) echo decrypt($results->BST_NAME);?>" placeholder='보조 중개사명을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-5">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">연락처</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='BST_HP' id='BST_HP' type="text" value="<?php if($BST_IDX) echo decrypt($results->BST_HP);?>"
                  placeholder='연락처를 입력 해주세요.'>
              </div>

            </div>
          </div>
        </div>
        <!-- End 1-st column -->
        <div class='col-md-12 text-center'>
          <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
          <a href="/admin/brokerMemer?key=<?php echo $key;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
            class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</main>

<script type="text/javascript">
<!--
function submit_ck() {
  var BKT_TYPE = $("#BKT_TYPE").val();
  if (!$("#BST_TYPE").val()) {
    alert("구분을 선택해주세요");
    $("#BST_TYPE").focus();
    return false;
  } else if (!$("#BST_NAME").val()) {
    alert("중개사 이름을 입력해주세요");
    $("#BST_NAME").focus();
    return false;
  } else if (!$("#BST_HP").val()) {
    alert("연락처를 입력해주세요");
    $("#BST_HP").focus();
    return false;
  } else {
    return true;
  }
}

//
-->
</script>
<script type="text/javascript">
<!--
function autoHypenPhone(str) {
  str = str.replace(/[^0-9]/g, '');
  var tmp = '';
  if (str.length < 4) {
    return str;
  } else if (str.length < 7) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3);
    return tmp;
  } else if (str.length < 11) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 3);
    tmp += '-';
    tmp += str.substr(6);
    return tmp;
  } else {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 4);
    tmp += '-';
    tmp += str.substr(7);
    return tmp;
  }
  return str;
}

var cellPhone = document.getElementById('BST_HP');
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

//
-->
</script>