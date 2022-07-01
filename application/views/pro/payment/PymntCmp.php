<?php $PMT_NUMBER2 = explode("_", $resultsPM->PMT_NUMBER2);?>
<main id="container" class="sub partnerSub pymntCmp">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>주문완료</h4>
    </div>
    <div class="content">
      <div class="content-inner">
        <div class="title">
          <div class="icon-wrap"><i></i></div>
          <p class="text-pymnt ">주문이 완료되었습니다.</p>
          <p class="text-vrtlAcnt blind">주문이 완료되었습니다.</p>
        </div>
        <div class="orderNum-box">
          <span><i class="xi-paper-o"></i></span>
          <span class="ordertext">주문번호</span><span class="orderNum"><?php echo $PMT_NUMBER2[1];?></span>
        </div>
        <div class="pymntInfo-wrap">
          <div class="pymntInfo top">
            <p><span class="text-left category">주문일</span><span
                class="text-right text-con"><?php echo date("Y년 m월 d일", strtotime($resultsPM->PMT_REG_DATE))." ".date("H:i:s", strtotime($resultsPM->PMT_REG_DATE));?></span>
            </p>
            <p><span class="text-left category">총 금액</span><span
                class="text-right text-con"><?php echo number_format($resultsPM->PMT_MONEY)." 원";?></span></p>
            <p><span class="text-left category">결제수단</span><span
                class="text-right text-con"><?php if($resultsPM->PMT_MEANS=='Card'){ echo "카드결제"; }else if($resultsPM->PMT_MEANS=='DirectBank'){ echo "즉시계좌이체";}else if($resultsPM->PMT_MEANS=='VBank'){ echo "가상계좌이체"; }?></span>
            </p>
          </div>
          <?php if($resultsPM->PMT_MEANS=='Card'){?>
          <div class="pymntInfo bottom ">
            <p><span class="text-left category">카드종류</span><span
                class="text-right text-con"><?php echo bankCodeCard($resultsPM->PMT_CARD_TYPE);?></span>
            </p>
            <p><span class="text-left category">카드번호</span><span
                class="text-right text-con"><?php echo $resultsPM->PMT_CARD_NUMBER;?></span></p>

            <p><span class="text-left category">할부여부</span><span
                class="text-right text-con"><?php if($resultsPM->PMT_INSTAL_PERIOD=='00'){ echo "일시불";}else{echo $resultsPM->PMT_INSTAL_PERIOD."개월";}?></span>
            </p>
            <!-- <p><span class="text-left category">결제일</span><span
                class="text-right text-con date"><?php echo date("Y년 m월 d일", strtotime($resultsPM->PMT_DATE))." ".date("H:i:s", strtotime($resultsPM->PMT_TIME));?></span>
            </p> -->
          </div>
          <?php }else if($resultsPM->PMT_MEANS=='DirectBank'){?>
          <div class="pymntInfo bottom ">
            <p><span class="text-left category">은행명</span><span
                class="text-right text-con"><?php echo bankCode($resultsPM->PMT_BANK_CODE);?></span>
            </p>

            <p><span class="text-left category">영수증처리</span><span
                class="text-right text-con"><?php if($resultsPM->PMT_RECEIPT_TYPE=='0'){ echo "소득공제";}else if($resultsPM->PMT_RECEIPT_TYPE=='1'){echo "지출증빙";}?></span>
            </p>
          </div>
          <?php }else if($resultsPM->PMT_MEANS=='VBank'){?>
          <div class="pymntInfo bottom vrtlAcnt">
            <p><span class="text-left category">입금정보</span><span
                class="text-right text-con"><?php echo $resultsPM->PMT_VACT_BANKNAME." ( ".$resultsPM->PMT_VACT_NUM." )";?>
                <?php echo $resultsPM->PMT_VACT_NAME;?></span>
            </p>
            <p><span class="text-left category">송금자명</span><span
                class="text-right text-con"><?php echo $resultsPM->PMT_VACT_INPUTNAME;?></span></p>
            <p><span class="text-left category">입금예정일</span><span
                class="text-right text-con date"><?php echo date("Y년 m월 d일", strtotime($resultsPM->PMT_VACT_DATE));?></span>
            </p>
          </div>
          <?php }?>


          <div class="btn-wrap">
            <a href="/pro/paymentList" class="btn-cp">결제내역확인</a>
            <a href="/pro/advrt" class="btn-cl">관리</a>
          </div>
        </div>
      </div>
    </div>
</main>