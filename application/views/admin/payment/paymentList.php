<div class="col g-ml-50 g-ml-0--lg g-overflow-hidden">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">결제내역 LIST</a>
      </li>

    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">결제내역 LIST</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <div class="media-md align-items-center g-mb-30">
      <!-- <div class="media d-md-flex align-items-center mr-auto ">
                <div class="d-flex align-items-center">
                  <a class=" btn btn u-btn-indigo g-width-130--md g-font-size-default g-ml-10"
                    href="dataAexcel?search=<?php echo $search;?>" target='_blank'>엑셀 출력</a>
                </div>
              </div> -->
      <div class="media d-md-flex align-items-center ml-auto">
        <div class="d-flex g-ml-15 g-ml-55--md">
          <form action='paymentList' method='get' id='frm' name='frm'>
            <div class="input-group g-pos-rel g-width-320--md">
              <input id="search" name='search'
                class="form-control g-font-size-default g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-20 g-pl-20 g-pr-50 "
                type="text" placeholder="Enter search keyword." value='<?php echo $search;?>'>
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
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:15%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:15%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
          </colgroup>
          <thead>
            <tr>
              <th class='g-hidden-sm-down'>
                NO.
              </th>
              <th style='width:200px;'>
                결제현황
              </th>
              <th style='width:200px;'>
                회원구분
              </th>
              <th style='width:200px;'>
                회원명
              </th>
              <th style='width:200px;'>
                슬롯개수
              </th>
              <th style='width:200px;'>
                결제방식
              </th>
              <th style='width:200px;'>
                기간
              </th>
              <th style='width:200px;'>
                금액
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
              <td class='g-hidden-sm-down'><?php echo $cur_num-$i;?></td>
              <td>
                <?php 
                  if($data->PMT_MEANS=='VBank' && $data->PMT_STATE=='B' &&  $data->PMT_VACT_DATE < date("Y-m-d")){
                    echo "미입금";
                  }else if($data->PMT_STATE=='C'){
                    echo "결제취소";
                  }else{
                    if($data->PMT_STATE=='A'){ echo "결제"; }else if($data->PMT_STATE=='B'){echo "결제대기";}
                  }
                  
                ?>
              </td>
              <td>
                <?php if($data->USER_TYPE=='A'){ echo "중개사"; }else if($data->USER_TYPE=='B'){ echo "일반유저"; }?>
              </td>
              <td>
                <a
                  href="payment?PMT_IDX=<?php echo $data->PMT_IDX;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>">
                  <?php 
                    if($data->USER_TYPE=='A'){ 
                      echo $user[$i]->BKT_COMPANY."</br>[".decrypt($user[$i]->BKT_EMAIL)."]"; 
                    }else if($data->USER_TYPE=='B'){ 
                      echo decrypt($user[$i]->MET_NAME)."<br/>[".decrypt($user[$i]->MET_EMAIL)."]"; 
                    }
                  ?>
                </a>
              </td>
              <td>
                <?php echo Number_format($slot[$i]->PPT_CNT);?>
              </td>
              <td>
                <?php if($data->PMT_MEANS=="Card"){echo "카드결제";}else if($data->PMT_MEANS=="DirectBank"){ echo "즉시계좌이체";}else if($data->PMT_MEANS=="VBank"){echo "가상계좌";}?>
              </td>
              <td>
                <?php echo date("Y-m-d", strtotime($data->PMT_START));?> ~
                <?php echo date("Y-m-d", strtotime($data->PMT_END));?>
                <?php if($data->PMT_REFUND_STATE){ echo "<br/><span style='color:#ff0000;'>".$data->PMT_REFUND_STATE." 처리</span><br/><span style='color:#ff0000;'>".date("Y-m-d", strtotime($slot[$i]->PST_START))." ~ ".date("Y-m-d", strtotime($slot[$i]->PST_END))."</span>";}?>
              </td>
              <td>
                <?php echo Number_format($data->PMT_MONEY);?>
                <?php if($data->PMT_REFUND_STATE){ echo "<br/><span style='color:#ff0000;'>".Number_format($data->PMT_REFUND)."</span>";}?>
              </td>
              <td>
                <?php echo $data->PMT_REG_DATE;?>
                <?php if($data->PMT_REFUND_STATE){ echo "<br/><span style='color:#ff0000;'>".$data->PMT_REFUND_DATE."</span>";}?>
              </td>
              <td class="text-right">
                <?php if(!$data->PMT_REFUND_STATE && $data->PMT_STATE=='A'){?>
                <!-- <a href="/adminDAO/pmtDelete?PMT_IDX=<?php echo $data->PMT_IDX; ?>&PST_IDX=<?php echo $slot[$i]->PST_IDX; ?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
                  class="btn btn-xs u-btn-primary g-mr-10 " onclick="return confirm('취소환불 시키시겠습니까??');">
                  <i class="icon-event g-mr-3"></i>
                  취소 환불
                </a> -->
                <a href="/admin/pmtPartialDelete?PMT_IDX=<?php echo $data->PMT_IDX; ?>&PST_IDX=<?php echo $slot[$i]->PST_IDX; ?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
                  class="btn btn-xs u-btn-bluegray g-mr-10 ">
                  <i class="icon-event g-mr-3"></i>
                  환불
                </a>
                <?php }?>
              </td>
            </tr>
            <?php $i++;}?>
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