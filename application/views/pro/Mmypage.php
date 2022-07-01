    <!-----  메인 시작 ----->
    <main id="main" class="mypage">
      <div class="contents">
        <div class="top-row">
          <a href="/pro/mypage">
            <div id="imgViewArea" class="img-wrap">

              <?php if($this -> session ->userdata('PRO_IMG')){?>
              <img id="imgArea" onerror="imgAreaError()" /
                src="/uploads/<?php echo $this -> session ->userdata('PRO_IMG');?>" alt="프로필사진">
              <?php }else{?>
              <img id="imgArea" onerror="imgAreaError()" / src="/img/my-img.png" alt="프로필사진"
                style="background-color: #f1f1f1;">
              <?php }?>
            </div>
            <i class="xi-cog"></i>
            <p class="name"><?php echo $this -> session ->userdata('LOGIN_NAME');?></p>
          </a>
          <p><span class="my-id"><?php echo $this -> session ->userdata('LOGIN_ID'); ?></span></p>
          <!-- <p><span class="my-id"><?php echo decrypt($this -> session ->userdata('LOGIN_ID')); ?></span></p> -->
          <!-- <a href="/main/myPage" class="btn-myInfo">내정보설정<i class="xi-angle-right"></i></a> -->
        </div>
        <ul class="m_menu">
          <?php if($this -> session ->userdata('PRO_TYPE')=='A'){ // 중개사 ?>
          <li><a href="/pro/mypage">정보보기</a></li>
          <li><a href="/pro/agents">담당자관리</a></li>
          <li><a href="/pro/prpIqMgmtA">문의관리</a></li>
          <li><a href="/pro/paymentList">결제내역</a></li>
          <?php }else if($this -> session ->userdata('PRO_TYPE')=='B'){ // 일반인?>
          <li><a href="/pro/mypage">정보보기</a></li>
          <li><a href="/pro/prpIqMgmtA">문의관리</a></li>
          <li><a href="/pro/paymentList">결제내역</a></li>
          <?php }else if($this -> session ->userdata('PRO_TYPE')=='C'){ // 파트너(업체)?>
          <li><a href="/pro/mypage">정보보기</a></li>
          <li><a href="/pro/prpIqMgmtB">문의관리</a></li>
          <?php }?>
        </ul>
        <a href="/auth/logoutPro" class="btn-logout">로그아웃</a>
      </div>
    </main>
    </div>
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
    </body>

    </html>