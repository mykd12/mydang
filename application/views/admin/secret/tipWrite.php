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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">창업비결 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">창업팁  <?if($TIT_IDX){ echo "MODIFY"; }else{ echo "ADD"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">창업팁  <?if($TIT_IDX){ echo "MODIFY"; }else{ echo "ADD"; }?></h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm'>
					 <input type='hidden' id='TIT_IDX' name='TIT_IDX' value='<?php echo $TIT_IDX;?>'/>
					 <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>'/>
					 <input type='hidden' id='search' name='search' value='<?php echo $search;?>'/>
							<div class="row">
								<!-- 1-st column -->
								<div class="col-md-12 ">
								<!-- Basic Text Inputs -->
								<div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

									<!-- 제목 Input -->
									<div class="row">
										<div class="form-group g-mb-20 col-md-4">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구분</h4>
											<select class="form-control rounded-0 form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus" name="TIT_TYPE" id="TIT_TYPE" style='height:50px;'>
												<option value="">:: 구분 선택 ::</option>
												<option value="시공정보" <?php if($TIT_IDX && $results->TIT_TYPE=='시공정보'){ echo "selected";}?>>시공정보</option>
												<option value="수납" <?php if($TIT_IDX && $results->TIT_TYPE=='수납'){ echo "selected";}?>>수납</option>
												<option value="꾸미기팁" <?php if($TIT_IDX && $results->TIT_TYPE=='꾸미기팁'){ echo "selected";}?>>꾸미기팁</option>
												<option value="청소" <?php if($TIT_IDX && $results->TIT_TYPE=='청소'){ echo "selected";}?>>청소</option>
												<option value="DIY&리폼" <?php if($TIT_IDX && $results->TIT_TYPE=='DIY&리폼'){ echo "selected";}?>>DIY&리폼</option>
												<option value="이거어때" <?php if($TIT_IDX && $results->TIT_TYPE=='이거어때'){ echo "selected";}?>>이거어때</option>
												<option value="생활정보" <?php if($TIT_IDX && $results->TIT_TYPE=='생활정보'){ echo "selected";}?>>생활정보</option>
												<option value="건축&주택" <?php if($TIT_IDX && $results->TIT_TYPE=='건축&주택'){ echo "selected";}?>>건축&주택</option>
												<option value="상업공간" <?php if($TIT_IDX && $results->TIT_TYPE=='상업공간'){ echo "selected";}?>>상업공간</option>
												<option value="지식백과" <?php if($TIT_IDX && $results->TIT_TYPE=='지식백과'){ echo "selected";}?>>지식백과</option>
											</select>
										</div>
										<div class="form-group g-mb-20 col-md-8">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">제목</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14" name='TIT_TITLE' id='TIT_TITLE' type="text" placeholder="제목을 입력 해주세요." value="<?php if($TIT_IDX) echo $results->TIT_TITLE;?>">
										</div>
									</div>
									<!-- End 제목 Input -->
									<!-- 내용 Textarea -->
									<div class="form-group g-mb-20">
										<textarea class='form-control g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 g-py-10'  name='TIT_CONTENT' id='TIT_CONTENT' placeholder='내용을 해주세요.'><?php if($TIT_IDX) echo $results->TIT_CONTENT;?></textarea>
									</div>

									<div class="form-group g-mb-20">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">대표 이미지	</h4>
											<input type='hidden' name='TIT_IMG_SAVE' id='TIT_IMG_SAVE' value='<?php if($TIT_IDX) echo $results->TIT_IMG_SAVE;?>'/>
											<?php if($TIT_IDX && $results->TIT_IMG_SAVE){?>
												<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
														<div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
															<a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?php echo $results->TIT_IMG_ORG;?>" data-src="../../uploads/<?php echo $results->TIT_IMG_SAVE;?>" data-speed="350" data-caption="<?php echo $results->TIT_IMG_ORG;?>">
																<img class="img-fluid" src="../../uploads/<?php echo $results->TIT_IMG_SAVE;?>" alt="<?php echo $results->TIT_IMG_ORG;?>" STYLE='max-width:450px;'>
															</a>
														</div>
												</div>
											<?}?>
											<div >
												<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
													<input class="form-control form-control-md rounded-0" placeholder="대표 이미지를 선택해주세요." readonly="" type="text">
													<div class="input-group-btn">
														<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
														<input type="file" name='TIT_IMG' id='TIT_IMG'>
													</div>
												</div>
											</div>
										</div>
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<a href="javascript:void(0);" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" id='SAVE_BTN' />SAVE</a>
									<a href="tip?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
								</div>
							</div>
						</form>
          </div>
        </div>
      </div>
  </main>

	<script type="text/javascript">
<!--
	$(document).ready(function(){
		//전역변수선언
		var editor_object = [];

		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "TIT_CONTENT",
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
			editor_object.getById["TIT_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
			var ir1 = $("#TIT_CONTENT").val();

			if($("#TIT_TITLE").val() ==""){
				var TIT_TITLE = document.getElementById("TIT_TITLE");
				TIT_TITLE.focus();
				alert("제목을 입력 해주세요.");
				return false;
			}

			if(ir1 =="" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>'){
				var IRT_CONTENT = document.getElementById("TIT_CONTENT");
				editor_object.getById["TIT_CONTENT"].exec("FOCUS");
				alert("내용을 입력 해주세요.");
				return false;
			}

			if(!$("#TIT_IMG").val() && !$("#TIT_IMG_SAVE").val()){
				var TIT_IMG = document.getElementById("TIT_IMG");
				TIT_IMG.focus();
				alert("대표이미지를 선택 해주세요.");
				return false;
			}

			var action = "/adminDAO/tip_write";
			//폼 submit
			$('#frm').attr("enctype","multipart/form-data");
			$('#frm').attr("action",action);
			$('#frm').attr('action',action).attr('method', 'post').submit();
			return true;
		});

	});



//-->
</script>

</body>

</html>
