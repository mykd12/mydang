  <!-----  메인 시작 ----->
  <main id="main" class="moblie-search Msearch">
    <div class="contents">
      <div class="search-form-wrap">
        <form class="search-form" method="get">
          <input type="text" placeholder="동단위로 검색하세요." id="search_map" class="searchint search_map" autocomplete="off"
            name="search_map" value="">
          <button type="button" class="btn-search"><i class="xi-search"><span class="blind">검색</span></i></button>
        </form>
        <div class="search-result">
          <div class="result">
            <p id="kwd_list">
              <li class="item _item">검색결과가 없습니다.</li>
            </p>
          </div>
        </div>
        <!-- <button class="btn-close"><i class="xi-close"></i></button> -->
      </div>
      <ul class="tab-add">
        <li class="on"><a href="javascript:searchMtab('A');">전체</a></li>
        <li><a href="javascript:searchMtab('B');">지역</a></li>
        <li><a href="javascript:searchMtab('C');">지하철역</a></li>
      </ul>
      <div class="result-box result-box01 on">
        <ul id="search_A">
          <li>검색결과가 없습니다.</li>
        </ul>
      </div>
      <div class="result-box result-box02">
        <ul id="search_B">
          <li>검색결과가 없습니다.</li>
        </ul>
      </div>
      <div class="result-box result-box03">
        <ul id="search_C">
          <li>검색결과가 없습니다.</li>
        </ul>
      </div>
    </div>
  </main>
  </div>
  <script src="/js/main.js?v=<?php echo time(); ?>"></script>

  </body>
  <script>
$(".tab-add li").on("click", function() {
  $(this).addClass('on').siblings().removeClass('on');;
});
$(".search_map").on('change keyup paste', function() {
  var search_timer = "";
  var searchId = $(this).attr("id");
  clearTimeout(search_timer); //타이머예약 취소하기
  search_timer = setTimeout(search_ajax(searchId), 300); //검색창 입력 후 0.3초 후 검색 실행*/
});

function search_ajax(searchId) { //ajax로 검색 실행 시키는 함수
  var page_name = window.location.pathname;
  $('.search-form-wrap').addClass("active");
  var keyword = $("#" + searchId).val();
  var search = keyword;

  if (!search) {
    $(".searhResult").empty();
    var nodata = "<p id=\"kwd_list\">검색결과가 없습니다.</p>";
    $(".searhResult").append("<span class=\"m-c\"></span>");
    $(".searhResult").append(nodata);

    $(".result-box01").empty();
    $(".result-box01").append("<span class=\"m-c\"></span>");
    $(".result-box01").append(nodata);

    $(".result-box02").empty();
    $(".result-box02").append("<span class=\"m-c\"></span>");
    $(".result-box02").append(nodata);

    $(".result-box03").empty();
    $(".result-box03").append("<span class=\"m-c\"></span>");
    $(".result-box03").append(nodata);
  } else {
    //console.log(search);
    var p_type = $('input[name=search_type]:checked').val();
    $.ajax({
      type: 'post',
      url: '/VO/searchKeyword',
      data: {
        search: search,
        p_type: p_type,
        page_name: page_name
      },
      dataType: "json",
      success: function(data) {
        //var data = JSON.parse(data);
        //console.log(data);
        if (data.SCH_LIST.length > 0) {
          $(".searhResult").empty();
          $(".searhResult").append("<span class=\"m-c\"></span>");
          $(".searhResult").append(data.SCH_LIST);
          $(".result-box01").empty();
          $(".result-box01").append("<span class=\"m-c\"></span>");
          $(".result-box01").append(data.SCH_LIST);
          $(".result-box02").empty();
          $(".result-box02").append("<span class=\"m-c\"></span>");
          $(".result-box02").append(data.SCH_LIST_AREA);
          $(".result-box03").empty();
          $(".result-box03").append("<span class=\"m-c\"></span>");
          $(".result-box03").append(data.SCH_LIST_SWY);

          $("#SCH_IDX").val(data.SCH_KEY);
          $("#loc_lat").val(data.loc_lat);
          $("#loc_lon").val(data.loc_lon);
          $("#type").val(data.type);
          $("#p_type").val(data.p_type);
        } else {
          var nodata = "<p id=\"kwd_list\">검색결과가 없습니다.</p>";
          $(".searhResult").empty();
          $(".searhResult").append("<span class=\"m-c\"></span>");
          $(".searhResult").append(nodata);
          $(".result-box01").empty();
          $(".result-box01").append("<span class=\"m-c\"></span>");
          $(".result-box01").append(nodata);
          $(".result-box02").empty();
          $(".result-box02").append("<span class=\"m-c\"></span>");
          $(".result-box02").append(nodata);
          $(".result-box03").empty();
          $(".result-box03").append("<span class=\"m-c\"></span>");
          $(".result-box03").append(nodata);
        }
      }
    });
  }
  //$("#md_check").attr("type","submit");
}

function searchMtab(type) {
  $(".result-box").removeClass("on");
  if (type == 'A') {
    $(".result-box01").addClass("on");
  } else if (type == 'B') {
    $(".result-box02").addClass("on");
  } else if (type == 'C') {
    $(".result-box03").addClass("on");
  }
}
  </script>

  </html>