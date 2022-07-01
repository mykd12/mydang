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
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">보조 중개사
          LIST</a>
      </li>

    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">보조 중개사 LIST</h1>
      </div>
      <div class="media-body align-self-center text-right">
        <a class=" btn btn u-btn-primary g-width-100--md g-font-size-default g-ml-10"
          href="/admin/brokerMemerWrite?key=<?php echo $key?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>">+
          ADD
        </a>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">


    <div class="add-table-responsive-wrapper">
      <div class="table-responsive">
        <table class="table table-striped">
          <colgroup class=' g-hidden-sm-down'>
            <col style='width:5%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
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
              <th class='g-hidden-sm-down'>
                구분
              </th>
              <th style='width:200px;'>
                보조중개사명
              </th>
              <th style='width:200px;'>
                연락처
              </th>
              <th style='width:100px;'>
                DATE
              </th>
              <th style='width:180px;'></th>
            </tr>
          </thead>

          <tbody>
            <?php if($total_cnt > 0){?>
            <?php $i=0;?>
            <?php foreach($results as $data){?>
            <tr>
              <td class='g-hidden-sm-down'><?php echo $total_cnt-$i;?></td>
              <td class='table_title'>
                <a href='/admin/brokerMemerWrite?key=<?php echo $key?>&BST_IDX=<?php echo $data->BST_IDX?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>'
                  class="g-color-black"><?php echo $data->BST_TYPE;?></a>
              </td>
              <td class='table_title'>
                <a href='/admin/brokerMemerWrite?key=<?php echo $key?>&BST_IDX=<?php echo $data->BST_IDX?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>'
                  class="g-color-black"><?php echo decrypt($data->BST_NAME)?></a>
              </td>
              <td>
                <a href='/admin/brokerMemerWrite?key=<?php echo $key?>&BST_IDX=<?php echo $data->BST_IDX?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>'
                  class="g-color-black"><?php echo decrypt($data->BST_HP)?></a>
              </td>
              <td><?php echo $data->BST_REG_DATE?></td>
              <td class="text-right">
                <?if($data->BST_TYPE != '대표'){?>
                <a href="/admin/brokerMemerWrite?key=<?php echo $key?>&BST_IDX=<?php echo $data->BST_IDX?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>"
                  class="btn btn-xs u-btn-indigo g-mr-10 ">
                  <i class="hs-admin-pencil g-mr-3"></i>
                  MODIFY
                </a>
                <a href="/adminDAO/brokerMemerDelete?key=<?php echo $key?>&BST_IDX=<?php echo $data->BST_IDX?>&search=<?php echo $search;?>&pageNo=<?php echo $pageNo;?>"
                  class="btn btn-xs u-btn-primary g-mr-10 " onclick="return confirm('삭제 시키시겠습니까??');">
                  <i class="hs-admin-trash g-mr-3"></i>
                  DELETE
                </a>
                <?}?>
              </td>
            </tr>
            <?$i++;}?>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
    <div class='col-md-12 text-center'>
      <a href="/admin/brokerWrite?BKT_IDX=<?php echo $key;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
        class="btn btn-md u-btn-outline-bluegray g-mb-15">중개사 상세페이지로</a>
    </div>
  </div>
</div>
</div>
</section>
</main>