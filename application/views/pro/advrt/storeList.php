<main id="container" class="sub partnerSub adMgmt">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>광고관리</h4>
    </div>
    <div class="그래프-wrap">
      <div class="왼쪽 원형그래프">
      <div class="pie_wrap">
    <!-- 원형 그래프 -->
    <div class="pie_res">
        <svg class="pie">
            <circle data-percent="10" />
            <circle data-percent="20" />
            <circle data-percent="30" />
            <circle data-percent="40" />
        </svg>
    </div>
    <!-- 원형 그래프 리스트 -->
    <ul class="pie_info">
        <li>
            <span class="color"></span>
            <span class="txt">그래프 1</span>
        </li>
        <li>
            <span class="color"></span>
            <span class="txt">그래프 2</span>
        </li>
        <li>
            <span class="color"></span>
            <span class="txt">그래프 3</span>
        </li>
        <li>
            <span class="color"></span>
            <span class="txt">그래프 4</span>
        </li>
    </ul>
</div>
      </div>
      <div class="오른쪽 텍스트">
        <p class="그래프 타이틀"></p>
        <div class="그래프 내역 상세보기">
          <div class="select">
            <p>광고상품 전체보기</p>
          </div>
          <ul class="depth02">
            <li></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="tab-menu">
      <ul>
        <li>광고상품별 이용현황</li>
        <li>담당자별 이용현황</li>
      </ul>
    </div>
    <div class="content">
      <div class="content-inner">
        <h3>광고상품별 이용현황</h3>
        <div class="">
          <ul>
            <li>
              <div class="바그래프영역">
                <div class="bar-wrap"><span class="bar" style="width:50%"></span>
                  <div class="하단 텍스트 영역"><span class="adName"></span><span class="adDate"></span></div>
                </div>
              </div>
              <div class="btn-wrap">
                <a href="">상품명 수정</a>
                <a href="">광고 연장</a>
              </div>
            </li>
          </ul>
          <div class="">더 보기</div>
        </div>
      </div>
    </div>
  </div>
</main>


<script>
  $(document).ready(function(){
    pieAct();
})

function pieAct(){
    //그래프 viewBox 설정
    $(window).on('load',function(){
        var pieWidth = $('.pie').width();
        $('.pie')[0].setAttribute('viewBox', '0 0 '+pieWidth +' '+pieWidth+'');
    })

    var color = ["#60D0FD","#ADE7FD","#2F677D","#89B7C9"]; //그래프 색상
    var angel = -90; //그래프 시작 지점
    var pieWidth = $('.pie').width();

    $('.pie circle').each(function(i){
        var percentData = $(this).data('percent'); //그래프 비율
        var perimeter = (pieWidth/2) * 3.14; //원의 둘레
        var percent =  percentData*(perimeter/100); //그래프 비율만큼 원의 둘레 계산

        //그래프 비율, 색상 설정
        $(this).css({
            'stroke-dasharray':percent+' '+perimeter, 
            'stroke':color[i],
            'transform':'rotate('+angel+'deg)'
        });
        $('.pie_info > li').eq(i).find('.color').css({'background':color[i]});
        
        //그래프 시작 지점 갱신
        angel += (percentData * 3.6);
    })
}
</script>