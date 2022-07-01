<div class="col g-ml-50 g-ml-0--lg g-overflow-hidden">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">분석데이터
          관리</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">주요집객시설 인원
          리스트</a>
      </li>

    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20 CTs-list-notice m---style01" id="CTs-list">

    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">주요집객시설 리스트</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <div class="media-md align-items-center g-mb-30">
      <div class="media d-md-flex align-items-center mr-auto ">
        <div class="d-flex align-items-center">
          <a class=" btn btn u-btn-indigo g-width-130--md g-font-size-default g-ml-10"
            href="dataFexcel?search=<?php echo $search;?>" target='_blank'>엑셀 출력</a>
        </div>
      </div>
      <div class="media d-md-flex align-items-center ml-auto">
        <div class="d-flex g-ml-15 g-ml-55--md">
          <form action='dataF' method='get' id='frm' name='frm'>
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
            <col style='width:15%;' class='g-hidden-sm-down'>
            <col style='width:20%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
            <col style='width:10%;' class='g-hidden-sm-down'>
          </colgroup>
          <thead>
            <tr>
              <th class='g-hidden-sm-down'>
                NO.
              </th>
              <th style='width:200px;'>
                구분 A
              </th>
              <th style='width:200px;'>
                구분 B
              </th>
              <th style='width:200px;'>
                기관명
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
                <a href='dataFwrite?DFT_IDX=<?php echo $data->DFT_IDX; ?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>'
                  class="g-color-black"><?php echo $data->DFT_TYPE_A;?></a>
              </td>
              <td>
                <a href='dataFwrite?DFT_IDX=<?php echo $data->DFT_IDX; ?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>'
                  class="g-color-black"><?php echo $data->DFT_TYPE_B;?></a>
              </td>
              <td>
                <a href='dataFwrite?DFT_IDX=<?php echo $data->DFT_IDX; ?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>'
                  class="g-color-black"><?php echo $data->DFT_NAME;?></a>
              </td>
              <td><?php echo $data->DFT_REG_DATE;?></td>
              <td class="text-right">
                <a href="dataFwrite?DFT_IDX=<?php echo $data->DFT_IDX; ?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
                  class="btn btn-xs u-btn-indigo g-mr-10 ">
                  <i class="hs-admin-pencil g-mr-3"></i>
                  MODIFY
                </a>
                <a href="/adminDAO/dataFdelete?DFT_IDX=<?php echo $data->DFT_IDX; ?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
                  class="btn btn-xs u-btn-primary g-mr-10 " onclick="return confirm('삭제 시키시겠습니까??');">
                  <i class="hs-admin-trash g-mr-3"></i>
                  DELETE
                </a>
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