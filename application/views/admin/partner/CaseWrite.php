
<style type="text/css">
	.u-datepicker--v3 .flatpickr-month{height:50px;}
</style>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">파트너사 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

							<li class="list-inline-item">
                <span class="g-valign-middle">시공사례 <?php if($CST_IDX){ echo "수정"; }else{ echo "추가"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">시공사례 <?if($CST_IDX){ echo "수정"; }else{ echo "추가"; }?></h1>
              </div>

            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm'>
						 <input type='hidden' id='CST_IDX' name='CST_IDX' value='<?php  if($CST_IDX) echo $results->CST_IDX; ?>'/>
						 <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo; ?>'/>
						 <input type='hidden' id='search' name='search' value='<?php echo $search; ?>'/>
						 <input type='hidden' id='PPT_IDX' name='PTT_IDX' value='<?php echo $PTT_IDX; ?>'/>
						 <input type='hidden' id='CST_LAT' name='CST_LAT' value='<?php if($CST_IDX) echo $results->CST_LAT; ?>'/>
						 <input type='hidden' id='CST_LON' name='CST_LON' value='<?php if($CST_IDX) echo $results->CST_LON; ?>'/>
						 <input type='hidden' id='CST_ADDR1_B' name='CST_ADDR1_B' value='<?php if($CST_IDX) echo $results->CST_ADDR1_B; ?>'/>
							<div class="row">
								<!-- 1-st column -->
								<div class="col-md-12 ">
								<!-- Basic Text Inputs -->
								<div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">
									<!-- 제목 Input -->
									<div class="row">
										<div class="form-group g-mb-20 col-md-3">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구분</h4>
											<select name="CST_TYPE" id="CST_TYPE" class="form-control form-control-md rounded-0" style="height:50px;">
												<option value="" >:: 구분선택 ::</option>
												<option value="인테리어" <?if($CST_IDX && $results->CST_TYPE=='인테리어'){ echo "selected"; }?>>인테리어</option>
												<option value="가구" <?if($CST_IDX && $results->CST_TYPE=='가구'){ echo "selected"; }?>>가구</option>
												<option value="주방/설비" <?if($CST_IDX && $results->CST_TYPE=='주방/설비'){ echo "selected"; }?>>주방/설비</option>
												<option value="간판" <?if($CST_IDX && $results->CST_TYPE=='간판'){ echo "selected"; }?>>간판</option>
												<option value="광고/인쇄" <?if($CST_IDX && $results->CST_TYPE=='광고/인쇄'){ echo "selected"; }?>>광고/인쇄</option>
												<option value="통신/보안" <?if($CST_IDX && $results->CST_TYPE=='통신/보안'){ echo "selected"; }?>>통신/보안</option>
												<option value="렌탈" <?if($CST_IDX && $results->CST_TYPE=='렌탈'){ echo "selected"; }?>>렌탈</option>
												<option value="기타" <?if($CST_IDX && $results->CST_TYPE=='기타'){ echo "selected"; }?>>기타</option>
											</select>
										</div> 
										<div class="form-group g-mb-20 col-md-9">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">제목</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0  g-px-14" name='CST_TITLE' id='CST_TITLE' type="text"  placeholder='타이틀을 입력 해주세요.' value="<?php if($CST_IDX) echo $results->CST_TITLE; ?>">
										</div>
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">주소</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14" name='CST_ADDR1_A' id='CST_ADDR1_A' type="text" value="<?php if($CST_IDX) echo $results->CST_ADDR1_A;?>"  placeholder='주소를 입력해주세요.'  onclick="execDaumPostcode();" readonly >
										</div>
										<div class="form-group g-mb-20 col-md-8" id="addr_div">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상세 주소</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14" name='CST_ADDR2' id='CST_ADDR2' type="text" value="<?php if($CST_IDX) echo $results->CST_ADDR2;?>"  placeholder='상세 주소를 입력해주세요.' >
										</div>
										<?php if($CST_IDX && $results->CST_TYPE=='인테리어'){?>
											<div class="form-group g-mb-20 col-md-4 addoption">
												<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">평수</h4>
												<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0  g-px-14" name='CST_OPTION_A' id='CST_OPTION_A' type="text" numberOnly placeholder='평수를 입력 해주세요.' value="<?php echo $results->CST_OPTION_A; ?>">
											</div>
											<div class="form-group g-mb-20 col-md-4 addoption">
												<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">예산</h4>
												<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14" name='CST_OPTION_B' id='CST_OPTION_B' type="text" placeholder='예산 입력 해주세요.' value="<?php echo $results->CST_OPTION_B;?>" >
											</div>
											<div class="form-group g-mb-20 col-md-4 addoption">
												<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">기간</h4>
												<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14" name='CST_OPTION_C' id='CST_OPTION_C' type="text" placeholder='기간 입력 해주세요.' value="<?php echo $results->CST_OPTION_C;?>" >
											</div>
										<?php }else if($CST_IDX && ($results->CST_TYPE=='가구' || $results->CST_TYPE=='주방/설비')){?>
											<div class="form-group g-mb-20 col-md-12 addoption">
												<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">예산</h4>
												<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0  g-px-14" name='CST_OPTION_B' id='CST_OPTION_B' type="text" placeholder='예산 입력 해주세요.' value="<?php echo $results->CST_OPTION_B; ?>">
											</div>
										<?php }else if($CST_IDX && $results->CST_TYPE=='간판'){?>
											<div class="form-group g-mb-20 col-md-6 addoption">
												<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">예산</h4>
												<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0  g-px-14" name='CST_OPTION_B' id='CST_OPTION_B' type="text" placeholder='예산 입력 해주세요.' value="<?php echo $results->CST_OPTION_B; ?>">
											</div>
											<div class="form-group g-mb-20 col-md-6 addoption">
												<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">기간</h4>
												<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14" name='CST_OPTION_C' id='CST_OPTION_C' type="text" placeholder='기간 입력 해주세요.' value="<?php echo $results->CST_OPTION_C;?>" >
											</div>
										<?php }?>

										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시공사례 상세내용</h4>
											<textarea class="form-control form-control-md rounded-0" name='CST_CONTENT' id='CST_CONTENT' ><?php if($CST_IDX) echo $results->CST_CONTENT;?></textarea>
										</div>

										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black ">대표 이미지</h4>
											<input type="hidden" name="CST_IMG_SAVE" id="CST_IMG_SAVE" value="<?php if($CST_IDX) echo $results->CST_IMG_SAVE;?>">
											<?if($CST_IDX && $results->CST_IMG_SAVE){?>
												<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
														<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
															<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?=$results->CST_IMG_ORG?>" data-src="/uploads/<?=$results->CST_IMG_SAVE?>" data-speed="350" data-caption="<?=$results->CST_IMG_ORG?>">
																<img class="img-fluid" src="/uploads/<?=$results->CST_IMG_SAVE?>" alt="<?=$results->CST_IMG_ORG?>" STYLE='max-width:250px;'>
															</a>
														</div>
												</div>
											<?}?>
											<div >
												<div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mt-10">
													<input class="form-control form-control-md rounded-0" placeholder="대표 이미지를 선택해주세요." readonly="" type="text">
													<div class="input-group-btn">
														<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
														<input type="file" name='CST_IMG' id='CST_IMG'>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End 제목 Input -->

								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<input type="button" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='저장' id="SAVE_BTN" />
									<a href="partnerCase?PTT_IDX=<?php echo $PTT_IDX;?>&pageNo=<?=$pageNo?>&search=<?=$search?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">리스트</a>
								</div>
							</div>
						</form>
          </div>
        </div>
      </div>
  </main>

	<script type="text/javascript">
	<!--
		var editor_object = [];
    nhn.husky.EZCreator.createInIFrame({
      oAppRef: editor_object,
      elPlaceHolder: "CST_CONTENT",
      sSkinURI: "/SE/SmartEditor2Skin.html",
      htParams : {
        // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
        bUseToolbar : true,
        // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
        bUseVerticalResizer : true,
        // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
        bUseModeChanger : true,
      }
    });

	 $("#SAVE_BTN").click(function(){
		 //id가 smarteditor인 textarea에 에디터에서 대입
		 editor_object.getById["CST_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
		 var ir1 = $("#CST_CONTENT").val();
		 if(!$("#CST_TYPE").val()){
			 alert("구분을 선택해주세요.");
			 $("#CST_TYPE").focus();
			 return false;
		 }
		 if(!$("#CST_TITLE").val()){
			 alert("타이틀을 입력해주세요.");
			 $("#CST_TITLE").focus();
			 return false;
		 }
		 if(!$("#CST_ADDR1_A").val()){
			 alert("시공 주소를 입력해주세요.");
			 $("#CST_ADDR1_A").focus();
			 return false;
		 }

		 if(!$("#CST_ADDR2").val()){
			 alert("시공 상세 주소를 입력해주세요.");
			 $("#CST_ADDR2").focus();
			 return false;
		 }

			if(ir1 =="" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>'){
				var CST_CONTENT = document.getElementById("CST_CONTENT");
				editor_object.getById["CST_CONTENT"].exec("FOCUS");
				alert("시공사례 상세 내용을 입력 해주세요.");
				return false;
			}

			if(!$("#CST_IMG").val() && !$("#CST_IMG_SAVE").val()){
 			 alert("썸네일 이미지를 선택해주세요.");
 			 $("#CST_IMG").focus();
 			 return false;
 		 }

			 //id가 smarteditor인 textarea에 에디터에서 대입
			 var action = "/adminDAO/case_write";
			 //폼 submit
			 $('#frm').attr("enctype","multipart/form-data");
			 $('#frm').attr("action",action);
			 $('#frm').attr('action',action).attr('method', 'post').submit();
			 return true;
		 });
		

		$("input:text[numberOnly]").on("keyup", function() {
			$(this).val($(this).val().replace(/[^0-9]/g,""));
		});

		$("#CST_TYPE").on("change",function (){
			var type = $(this).val();
			$(".addoption").remove();
			if(type=='인테리어'){
				var html = "<div class=\"form-group g-mb-20 col-md-4 addoption \">";
				html += "<h4 class=\"h6 g-font-weight-600 g-color-black g-mb-10\">평수</h4>";
				html += "<input  class=\"form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0  g-px-14\" name='CST_OPTION_A' id='CST_OPTION_A' type=\"text\" numberOnly placeholder='평수를 입력 해주세요.'>";
				html += "</div>";
				html += "<div class=\"form-group g-mb-20 col-md-4 addoption\">";
				html += "<h4 class=\"h6 g-font-weight-600 g-color-black g-mb-10\">예산</h4>";
				html += "<input  class=\"form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14\" name='CST_OPTION_B' id='CST_OPTION_B' type=\"text\" placeholder='예산 입력 해주세요.'>";
				html += "</div>";
				html += "<div class=\"form-group g-mb-20 col-md-4 addoption\">";
				html += "<h4 class=\"h6 g-font-weight-600 g-color-black g-mb-10\">기간</h4>";
				html += "<input  class=\"form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14\" name='CST_OPTION_C' id='CST_OPTION_C' type=\"text\" placeholder='기간 입력 해주세요.' >";
				html += "</div>";
				$("#addr_div").after(html);
			}else if(type=='가구' || type=='주방/설비'){
				var html = "<div class=\"form-group g-mb-20 col-md-12 addoption\">";
				html += "<h4 class=\"h6 g-font-weight-600 g-color-black g-mb-10\">예산</h4>";
				html += "<input  class=\"form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14\" name='CST_OPTION_B' id='CST_OPTION_B' type=\"text\" placeholder='예산 입력 해주세요.'>";
				html += "</div>";
				$("#addr_div").after(html);
			}else if(type=='간판'){
				var html = "<div class=\"form-group g-mb-20 col-md-6 addoption\">";
				html += "<h4 class=\"h6 g-font-weight-600 g-color-black g-mb-10\">예산</h4>";
				html += "<input  class=\"form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14\" name='CST_OPTION_B' id='CST_OPTION_B' type=\"text\" placeholder='예산 입력 해주세요.'>";
				html += "</div>";
				html += "<div class=\"form-group g-mb-20 col-md-6 addoption\">";
				html += "<h4 class=\"h6 g-font-weight-600 g-color-black g-mb-10\">기간</h4>";
				html += "<input  class=\"form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14\" name='CST_OPTION_C' id='CST_OPTION_C' type=\"text\" placeholder='기간 입력 해주세요.' >";
				html += "</div>";
				$("#addr_div").after(html);
			}
		});

	//-->
	</script>
	<script src='//spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
	<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
	<script>
		var addr_data='';
			function execDaumPostcode() {
					new daum.Postcode({
            showMoreHName:true,
            shorthand:false,
							oncomplete: function(data) {
									var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
									var extraRoadAddr = ''; // 도로명 조합형 주소 변수
									if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
											extraRoadAddr += data.bname;
									}
									if(data.buildingName !== '' && data.apartment === 'Y'){
										 extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
									}
									if(extraRoadAddr !== ''){
											extraRoadAddr = ' (' + extraRoadAddr + ')';
									}
									if(fullRoadAddr !== ''){
											fullRoadAddr += extraRoadAddr;
									}
									var expJibunAddr = data.jibunAddress;

									document.getElementById('CST_ADDR1_A').value = fullRoadAddr;
									document.getElementById('CST_ADDR2').focus();
									addr_data=fullRoadAddr;
									addr_location(addr_data);


									$("#CST_ADDR1_B").val(expJibunAddr);
							}
					}).open();
			}
	</script>
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ca6889c8b7dc6867af0b4a4ba8cbfe35&libraries=services"></script>

	<script type="text/javascript">
	<!--
		function addr_location(addr_data){
			//alert(addr_data);
			var addr_data =addr_data;

			var geocoder = new daum.maps.services.Geocoder();
			var addr_lat='';
			var addr_lng='';

			// 주소로 좌표를 검색합니다
			geocoder.addressSearch(addr_data, function(result, status) {

				// 정상적으로 검색이 완료됐으면
				 if (status === daum.maps.services.Status.OK) {
					addr_lat=result[0].y;
					addr_lng=result[0].x;
					 $("#CST_LAT").val(addr_lat);
					 $("#CST_LON").val(addr_lng);

					var coords = new daum.maps.LatLng(result[0].y, result[0].x);

					// 결과값으로 받은 위치를 마커로 표시합니다
					var marker = new daum.maps.Marker({
						map: map,
						position: coords
					});

					// 인포윈도우로 장소에 대한 설명을 표시합니다
					var infowindow = new daum.maps.InfoWindow({
						content: '<div style="width:150px;text-align:center;padding:6px 0;">우리회사</div>'
					});
					infowindow.open(map, marker);

					// 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
					map.setCenter(coords);
				}
			});
	}
	//-->
	</script>