<main id="container" class="sub partnerSub list03 paymentDt my">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="../../icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>결제내역</h4>
    </div>
    <div class="toptab <?php if($type=='B'){ echo "thTab"; }else if($type=='C'){echo "twoTab";}?>">
      <ul>
        <li><a href="/pro/mypage">정보보기</a></li>
        <li <?php if($type=='B' || $type=='C'){?>class="disNone" <?php }?>><a href="/pro/agents">담당자관리</a></li>
        <?php if($type=='A' || $type=='B'){?>
        <li><a href="/pro/prpIqMgmtA">문의관리</a></li>
        <?php }else{?>
        <li><a href="/pro/prpIqMgmtB">문의관리</a></li>
        <?php }?>
        <li class="on <?php if($type=='C'){?> disNone <?php }?>"><a href="/pro/paymentList">결제내역</a></li>
      </ul>
    </div>
    <!-- 내용시작 -->
    <div class="content">
      <div class="content-inner">


        <ul class="payList">
          <?php if($cur_num > 0){?>
          <?php $i=0;?>
          <?php foreach($results as $data){?>
          <?php
          $firstDate = date_create($data->PMT_START);
          $secondDate = date_create($data->PMT_END);
          $date_diff  = date_diff($firstDate, $secondDate);
          if($data){
            $PMT_NUMBER2 = explode("_", $data->PMT_NUMBER2);
            $PMT_NUMBER2 = $PMT_NUMBER2[1];
            $PMT_VACT_NAME = str_replace("（", "(", $data->PMT_VACT_NAME);
            $PMT_VACT_NAME = str_replace("）", ")", $PMT_VACT_NAME);
            $PMT_REG_DATE = date("Y.m.d", strtotime($data->PMT_REG_DATE));
            $PMT_DATE = $data->PMT_DATE;
            $PMT_MONEY = number_format($data->PMT_MONEY);
            $PMT_MEANS =$data->PMT_MEANS;
            $PMT_REFUND_DATE = date("Y.m.d", strtotime($data->PMT_REFUND_DATE));
            $PMT_VACT_DATE = $data->PMT_VACT_DATE;
            $PMT_STATE = $data->PMT_STATE;
            $PMT_VACT_INPUTNAME = $data->PMT_VACT_INPUTNAME;
            $PMT_NUMBER1 = $data->PMT_NUMBER1;
          }else{
            $PMT_NUMBER2="-";
            $PMT_VACT_NAME="-";
            $PMT_REG_DATE="-";
            $PMT_DATE = "";
            $PMT_MONEY = "0";
            $PMT_MEANS ="";
            $PMT_REFUND_DATE = "";
            $PMT_VACT_DATE = "";
            $PMT_STATE = "";
            $PMT_VACT_INPUTNAME = "";
            $PMT_NUMBER1 = "";
          }
          
          

          ?>
          <li class="payList01">
            <p>주문번호 <span class="orderNum"><?php echo $PMT_NUMBER2;?></span>
              <?php if($resultsPs[$i]->PST_STATE=='C'){?>
              <span class="date cl">
                <?php echo date("Y.m.d", strtotime($data->PMT_START));?> ~
                <?php echo date("Y.m.d", strtotime($data->PMT_END));?>(<?php echo $date_diff->format('%d')+1;?>일)(<?php echo $resultsPs[$i]->PPT_CNT;?>개)
              </span>
              <?php }?>
              <span class="date">
                <?php echo date("Y.m.d", strtotime($resultsPs[$i]->PST_START));?>-<?php echo date("Y.m.d", strtotime($resultsPs[$i]->PST_END));?>(<?php echo $resultsPs[$i]->PPT_CNT;?>개)
              </span>
            </p>
            <ul class="payList_table">
              <li class="t-con" data-th="주문일">
                <span class="date"><?php echo $PMT_REG_DATE;?></span>
              </li>
              <li class="t-con" data-th="결제일">

                <span
                  class="date"><?php if($PMT_DATE){ echo date("Y.m.d", strtotime($PMT_DATE));}else { echo "-";}?></span>
              </li>
              <li class="t-con" data-th="총 금액">
                <span class=""><?php echo $PMT_MONEY;?>원</span>
              </li>
              <li class="t-con"
                data-th="<?php if($PMT_MEANS=='Card'){ echo "카드";}else if($PMT_MEANS=='DirectBank'){ echo "실시간 계좌이체";}else if($PMT_MEANS=='VBank'){ echo "가상계좌"; }?>">
                <?php if($PMT_MEANS=='Card'){?>
                <span class=""><?php echo bankCodeCard($data->PMT_CARD_TYPE);?>(<?php echo $data->PMT_CARD_NUMBER;?>)
                  <?php if($data->PMT_INSTAL_PERIOD=='00'){ echo"일시불";}else {echo $data->PMT_INSTAL_PERIOD."개월";}?></span>
                <?php }else if($PMT_MEANS=='DirectBank'){?>
                <span class=""><?php echo bankCode($data->PMT_BANK_CODE);?></span>
                <?php }else if($PMT_MEANS=='VBank'){?>
                <span class=""><?php echo $data->PMT_VACT_BANKNAME;?>
                  (<?php echo $data->PMT_VACT_NUM;?>)<br />
                  <?php echo $PMT_VACT_NAME;?></span>
                <?php }?>
              </li>
              <li class="t-con" data-th="상태">
                <span
                  class=""><?php if($data->PMT_STATE =='A' && $data->PMT_END > date("Y-m-d") && $data->PMT_START > date("Y-m-d")){ echo "진행예정"; }else if($PMT_STATE =='A' && $data->PMT_END > date("Y-m-d")){ echo"진행중"; }else if($data->PMT_STATE =='B' && $PMT_MEANS=='VBank' && $PMT_VACT_DATE >= date("Y-m-d") ){ echo "입금대기(".$PMT_VACT_INPUTNAME.")"; }else if($data->PMT_STATE =='B' && $PMT_MEANS=='VBank' && $PMT_VACT_DATE > date("Y-m-d") ){ echo "입금기한 종료"; }else if($PMT_STATE=='C'){echo "취소";}else{ echo"종료"; }?></span>
                <span
                  class="date"><?php if($PMT_STATE=='C'){ echo $PMT_REFUND_DATE;}else if($PMT_STATE =='B' && $PMT_MEANS=='VBank' && $PMT_VACT_DATE >= date("Y-m-d")){ echo $PMT_VACT_DATE."까지";}?></span>
              </li>
              <li class="t-con" data-th="영수증확인">
                <?php if($PMT_NUMBER1){?>
                <a href="javascript:void(0)" class="btn-"
                  onclick="window.open('https://iniweb.inicis.com/DefaultWebApp/mall/cr/cm/mCmReceipt_head.jsp?noTid=<?echo $PMT_NUMBER1;?>&noMethod=1','_blank','width=420, height=550, scrollbars=no, resizable=no, toolbars=no, menubar=no')"><span>확인하기</span></a>
                <?php }?>
              </li>
            </ul>
          </li>
          <?php $i++;}?>
          <?php }?>



        </ul>

      </div>
      <!-- 페이징 -->
      <?// include("inc/paging.php"); ?>
      <div class="paginationDiv">
        <?php echo $pagination;?>
      </div>
    </div>
    </section>
  </div>
</main>
<!----- 푸터 시작 ----->