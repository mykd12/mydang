<div class="col g-ml-50 g-ml-0--lg g-overflow-hidden">
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


      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">상품관리
          LIST</a>
      </li>

    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">상품관리 LIST</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">

    <div class="media-md align-items-center g-mb-30">
      <div class="media d-md-flex align-items-center mr-auto ">
        <div class="d-flex align-items-center">
          <a class=" btn btn u-btn-indigo g-width-130--md g-font-size-default g-ml-10"
            href="/admin/brokerPayAdd?key=<?php echo $key?>">슬롯 추가</a>
        </div>
      </div>
    </div>
    <div class="add-table-responsive-wrapper">
      <div class="table-responsive">
        <table class="table table-striped">
          <colgroup class=' g-hidden-sm-down'>
            <col style='width:5%;' class='g-hidden-sm-down'>
            <col style='width:15%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:15%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
          </colgroup>
          <thead>
            <tr>
              <th class='g-hidden-sm-down'>
                NO.
              </th>
              <th style='width:200px;'>
                회원명
              </th>
              <th style='width:200px;'>
                슬롯개수
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
            </tr>
          </thead>

          <tbody>
            <?php if($cur_num > 0){?>
            <?php $i=0;?>
            <?php foreach($results as $data){?>
            <tr>
              <td class='g-hidden-sm-down'><?php echo $cur_num-$i;?></td>
              <td>
                <a
                  href="brokerPaymWrite?key=<?php echo $key;?>&PST_IDX=<?php echo $data->PST_IDX;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>" /><?php echo decrypt($user[$i]->BKT_NAME)."<br/>[".$user[$i]->BKT_COMPANY."]";?></a>
              </td>
              <td>
                <?php echo Number_format($data->PPT_CNT);?>
              </td>
              <td>
                <?php echo date("Y-m-d", strtotime($data->PST_START));?> ~
                <?php echo date("Y-m-d", strtotime($data->PST_END));?>
              </td>
              <td>
                <?php echo Number_format($data->PST_MONEY);?>
              </td>
              <td><?php echo $data->PST_REG_DATE;?></td>
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
    <div class='col-md-12 text-center'>
      <a href="/admin/brokerWrite?BKT_IDX=<?php echo $key;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
        class="btn btn-md u-btn-outline-bluegray g-mb-15">중개사 상세페이지로</a>
    </div>
  </div>
</div>
</div>
</section>
</main>