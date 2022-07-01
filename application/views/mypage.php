    <!-----  메인 시작 ----->
    <main id="main" class="mypage">
      <div class="contents">
        <div class="top-row">
          <a href="/main/myPage/">
            <div id="imgViewArea" class="img-wrap">
              <?php if($this -> session ->userdata('LOGIN_IMG')){?>
              <img id="imgArea" onerror="imgAreaError()" /
                src="/uploads/<?php echo $this -> session ->userdata('LOGIN_IMG');?>" alt="프로필사진">
              <?php }else{?>
              <img id="imgArea" onerror="imgAreaError()" / src="/img/my-img.png" alt="프로필사진" style="background-color: #f1f1f1;">
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
          <li><a href="/main/myPage">내 정보설정<i class="xi-angle-right"></i></a></li>
          <li><a href="/main/qnaWrite">1:1문의<i class="xi-angle-right"></i></a></li>
          <li><a href="/main/myStore">관심목록<i class="xi-angle-right"></i></a></li>
        </ul>
        <a href="/auth/logout" class="btn-logout">로그아웃</a>
      </div>
    </main>
    </div>
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
    </body>

    </html>