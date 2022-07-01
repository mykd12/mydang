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
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">고객센터 관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">NOTICE <?if($NOT_IDX){ echo "MODIFY"; }else{ echo "ADD"; }?></span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20"  id="CTs-write">
						<div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">NOTICE <?if($NOT_IDX){ echo "MODIFY"; }else{ echo "ADD"; }?></h1>
              </div>
            </div>
						<hr class="d-flex g-brd-gray-light-v7 g-my-30">
					 <form id='frm' name='frm'>
					 <input type='hidden' id='NOT_IDX' name='NOT_IDX' value='<?php if($NOT_IDX) echo $NOT_IDX;?>'/>
					 <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>'/>
					 <input type='hidden' id='search' name='search' value='<?php echo $search;?>'/>
							<div class="row">
								<!-- 1-st column -->
								<div class="col-md-12 ">
								<!-- Basic Text Inputs -->
								<div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

									<!-- 제목 Input -->
									<div class="row">
										<div class="form-group g-mb-20 col-md-12">
											<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">제목</h4>
											<input  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14" name='NOT_TITLE' id='NOT_TITLE' type="text" placeholder="NOTICE 제목을 입력 해주세요." value="<?php if($NOT_IDX) echo $results->NOT_TITLE?>">
										</div>
									</div>
									<!-- End 제목 Input -->
									<!-- 내용 Textarea -->
									<div class="form-group g-mb-20">
										<textarea class='form-control g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 g-py-10'  name='NOT_CONTENT' id='NOT_CONTENT' placeholder='NOTICE 내용을 해주세요.'><?php if($NOT_IDX) echo $results->NOT_CONTENT?></textarea>
									</div>

									<div class="form-group">
										<h4 class="h6 g-font-weight-600 g-color-black g-mb-10">첨부파일
											<a href="javascript:add_file();" class="btn btn-xs u-btn-outline-primary  g-ml-15 g-mb-5"><i class="fa fa-plus"></i></a>
											<a href="javascript:del_file();" class="btn btn-xs u-btn-outline-darkgray g-mb-5"><i class="fa fa-minus"></i></a>
										</h4>
										<?if($count_up > 0){?>
											<div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10'>
												<?php foreach($uploads as $up){?>

													<a class="js-modal-markup u-link-v5  g-color-main  g-color-primary--hover g-mr-5  g-pl-10" href="/admin/down?sn=<?php echo $up->UP_FILE_SAVENAME;?>&on=<?php echo $up->UP_FILE_ORGNAME;?>" >
														<i class="fa fa-file"></i>    <?php echo $up->UP_FILE_ORGNAME;?>
													</a>
													<input type='hidden' name='UP_IDX[]' id='UP_IDX' value='<?php echo $up->UP_IDX;?>'/>
													<input type='hidden' name='UP_FILE_SAVENAME[]' id='UP_FILE_SAVENAME' value='<?php echo $up->UP_FILE_SAVENAME;?>'/>
													<label class='form-check-inline u-check g-pl-25 g-pr-15 g-brd-right g-brd-gray-light-v4'>
														<input class='g-hidden-xs-up g-pos-abs g-top-0 g-left-0' type='checkbox' name='UP_FILE_DEL[]' id='UP_FILE_DEL' value='<?php echo $up->UP_IDX;?>'>
														<div class='u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0'>
															<i class='fa' data-check-icon=''></i>
														</div>
														삭제
													</label>
												<?}?>
											</div>
										<?}?>
										<div id='up_file_div'>
											<div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
												<input class="form-control form-control-md rounded-0" placeholder="첨부파일 선택해주세요." readonly="" type="text" name='UPLOAD_FILE_NAME[]' id='UPLOAD_FILE_NAME'>

												<div class="input-group-btn">
												<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
												<input type="file" name='UPLOAD_FILE[]' id='UPLOAD_FILE'>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End 1-st column -->
								<div class='col-md-12 text-center'>
									<a href="javascript:void(0);" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" id='SAVE_BTN'>SAVE</a>
									<a href="notice?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
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
			elPlaceHolder: "NOT_CONTENT",
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
			editor_object.getById["NOT_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
			var ir1 = $("#NOT_CONTENT").val();

			if($("#NOT_TITLE").val() ==""){
				var NOT_TITLE = document.getElementById("NOT_TITLE");
				NOT_TITLE.focus();
				alert("NOTICE 제목을 입력 해주세요.");
				return false;
			}

			if(ir1 =="" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>'){
				var NOT_CONTENT = document.getElementById("NOT_CONTENT");
				editor_object.getById["NOT_CONTENT"].exec("FOCUS");
				alert("NOTICE 내용을 입력 해주세요.");
				return false;
			}

			var action = "/adminDAO/notice_write";
			//폼 submit
			$('#frm').attr("enctype","multipart/form-data");
			$('#frm').attr("action",action);
			$('#frm').attr('action',action).attr('method', 'post').submit();
			return true;
		});

	});

	function add_file(){

		var add_file_input ="<div class='input-group u-file-attach-v1 g-brd-gray-light-v2 add_upinput g-mt-5'>";
			add_file_input +="<input class='form-control form-control-md rounded-0  ' placeholder='첨부파일 선택해주세요.' readonly='' type='text'>";
			add_file_input +="<div class='input-group-btn'>";
			add_file_input +="<button class='btn btn-md h-100 u-btn-primary rounded-0' type='submit'>Browse</button>";
			add_file_input +="<input type='file' name='UPLOAD_FILE[]' id='UPLOAD_FILE'>";
			add_file_input +="</div>";
			add_file_input +="</div>";
			$("#up_file_div").append(add_file_input);
				// initialization of forms
			$.HSCore.helpers.HSFileAttachments.init();
			$.HSCore.components.HSFileAttachment.init('.js-file-attachment');
			$.HSCore.helpers.HSFocusState.init();
	}

	function del_file(){
		$(".add_upinput").last().remove();
	}

//-->
</script>

</body>

</html>
