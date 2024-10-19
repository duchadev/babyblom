<script>
   $().ready(function(){
   $(".fancybox-sya").fancybox({
   
   	autoSize:false,
   	width:600,
   	height:115,
   	beforeClose:function(){
   		window.location.href='thanh-vien/dang-tin.html';
   	
   	}
   	
   
   });
   if(1==<?=$success?>){
   	$(".fancybox-sya").click();
   
   }
   })
   
</script>
<link href="assets/css/member/style.css" type="text/css" rel="stylesheet">

<!-- MultiUpload -->
<link href="assets/multiupload/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="assets/multiupload/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="assets/multiupload/jquery.filer.min.js"></script>


<script type="text/javascript" src="assets/ckeditor/ckeditor.js" charset="utf-8"></script>
<a href="#success-post" class="fancybox-sya"></a>
<div class="hide">
   <div id="success-post">
      <div class="col-sm-12">
         <div class="alert alert-success" role="alert">
            <p><strong>ĐĂNG TIN THÀNH CÔNG!</strong></p>
            Cảm ơn bạn đã đăng tin. Chúng tôi sẽ kiểm tra tin của bạn trong thời gian sớm nhất. Xin cám ơn
         </div>
      </div>
   </div>
</div>
<div class="main-member-place">
   <div class="title">
      <h2>ĐĂNG TIN MỚI</h2>
   </div>
   <div class="content">
      <form class="form-horizontal" role="form" action="" id="form-submit" method="post" enctype="multipart/form-data">
	  <div class="panel panel-info">
	  <div class="panel-heading"><h3 class="panel-title  text-uppercase">THÔNG TIN CƠ BẢN</h3></div>
	  <div class="panel-body">
         <div class="form-group" style="margin-top:15px;">
            <label for="inputEmail3" class="col-sm-3 control-label">Tiêu đề tin <span>*</span></label>
            <div class="col-sm-8">
               <input type="text" name="p[ten_vi]"  class="form-control" id="inputEmail3" placeholder="Tiêu đề tin" required>
            </div>
         </div>
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Hình ảnh <span>*</span></label>
            <div class="col-sm-8">
               <input type="file" name="file"  class="form-control" id="inputEmail3"  required>
            </div>
         </div>
         <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Loại Tin đăng <span>*</span></label>
            <div class="col-sm-9">
               <?php
                  $checked = "checked";
                  foreach($loaigd as $k=>$v){?>
               <label class="radio-inline">
               <input type="radio" name="p[id_loaitin]"  <?=$checked?> id="inlineRadio1" value="<?=$k?>"> <?=$v?>
               </label>
               <?php $checked = ''; }
                  ?>
            </div>
         </div>
         <!-- end form-group -->
         <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Loại BDS <span>*</span></label>
            <div class="col-sm-3">
               <div class="">
                  <div class="row">
                     <select class="form-control input-sm" name="p[id_brand]">
                        <option value="">Chọn loại bất động sản</option>
                        <?php
                           foreach($loaibds as $k=>$v){
                           	
                           	?>
                        <option value="<?= $k ?>"><?= $v ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Danh mục cấp 1 <span>*</span></label>
            <div class="col-sm-3">
               <div class="">
                  <div class="row">
                     <select class="form-control input-sm" id="id_list" name="p[id_list]">
                        <option value="">Chọn Danh mục cấp 1</option>
                        <?php
                           foreach($product_list as $k=>$v){
                           	
                           	?>
                        <option value="<?= $k ?>"><?= $v ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
         </div>
		 
		 <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Danh mục cấp 2 <span>*</span></label>
            <div class="col-sm-3">
               <div class="">
                  <div class="row">
                     <select class="form-control input-sm" id="id_cat" name="p[id_cat]">
                        <option value="">Chọn Danh mục cấp 2</option>
                        <?php
                           foreach($product_cat as $k=>$v){
                           	
                           	?>
                        <option value="<?= $k ?>"><?= $v ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <!-- end form-group -->
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Giá <span>*</span></label>
            <div class="col-sm-3">
				<div class="row">
					<input type="text"  name="a[giaban]"  class="form-control input-sm" id="inputEmail3" >
			   </div>
            </div>
            <div class="clearfix"></div>
         </div>
		 
         <!-- end form-group -->
		 
		 </div>
		 
		 </div>
		 
		 
		 <div class="panel panel-danger">
			 <div class="panel-heading">
				<h3 class="panel-title  text-uppercase">ĐẶC ĐIỂM VÀ TIỆN ÍCH</h3>
			</div>
			<div class="panel-body">
				
				<div id="input">

				</div>
					
			<div class="formRow">
			<label for="inputEmail3" class="col-sm-2 control-label item-ti">Tiện ích</label>
				</br>
				<?php 
					$d->query("select ten,id from #_lkweb where type='tienich' and hienthi=1 order by stt,id desc");
					
					foreach($d->result_array() as $k=>$v){
				?>
				  <div class="col-sm-4">
						<div class="row">
							<div  style="margin-bottom:10px;">
												 
								<input value="<?= $v['id'] ?>"  type="checkbox" name="tienich[]" ><label for="ctl00_ContentPlaceHolder1_CheckBox_Gara" style="margin-left:5px"><?= $v['ten'] ?></label>                 
							</div>
						</div>
					</div>
					<?php } ?>
			<div class="clear"></div>
			</div>
				
			
			</div>
		 
		 </div>
		 
		<div class="panel panel-danger">
		<div class="panel-heading">
				<h3 class="panel-title  text-uppercase">MÔ TẢ CHI TIẾT</h3>
			</div>
		<div class="panel-body">
         <div class="form-group" style="margin-top:10px;">
            <label for="inputEmail3" class="col-sm-2 control-label">Mô tả<span>*</span></label>
            <div class="col-sm-10">
               <textarea name="p[mota_vi]" class='form-control' rows="6" required></textarea>
            </div>
         </div>
         <!-- end form-group -->	
         <div class="clearfix"></div>
         
   
   <!-- end form-group -->
   <div class="form-group">
   <label for="inputEmail3" class="col-sm-2 control-label">Thông tin khác</label>

   <div class="clearfix"></div>
   </div><!-- end form-group -->	
   <div class="">
  <?php /*  <label for="inputEmail3" class="col-sm-3 control-label">Hình ảnh</label>
   <div id="result"></div> */ ?>
  <?php /*  <div class="col-sm-9">
   <strong>Đăng nhiều ảnh lớn đẹp để sản phầm được tìm kiếm nhiều hơn!</strong>
   <div id="target-div8"></div>
   <div class="content-box">
   <div class="clear">						
   <input type="button" id="upload-btn" class="btn btn-primary btn-large clearfix" value="Choose file">
   <span style="padding-left:5px;vertical-align:middle;"><i>PNG, JPG, or GIF (500K max file size)</i></span>
   <div id="errormsg" class="clearfix redtext">
   </div>	              
   <div class="input-file-row-1">
   </div>	
   <div id="progress">
   </div>
   </div>
   </div>	
   <div class="clearfix"></div>
    <a href="" onclick="insertImgToText();return false" class="hide insert-img">Chèn tất cả hình vào phần mô tả</a> 
   </div> */ ?>
   
           <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label contact-label"><span data-bind="text: Label">Đăng hình ảnh</span><span data-bind="visible:Required"></span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						
                           <div class="search-location">
						   <div class="mbn-posting">
                              <div class="image-wapper">
                                 <div class="image-wapper-label">
                                    ĐĂNG ẢNH THẬT ĐỂ ĐƯỢC HIỆU QUẢ NHẤT!
                                 </div>
                                 <div class="image-wapper-take">
                                    <div class="jfu-container" id="jfu-plugin-f682923867e1-450e-5044-2b7a20814964">
                                       <span class="jfu-btn-upload"><span><span style="position:relative; cursor:pointer">
                                       <a class="input-file"  data-jfiler-name="files[]" data-jfiler-extensions="jpg, jpeg, png, gif">  <i class="fa fa-camera camera-add-image"></i><i class="fa fa-plus-circle plus-add-image"></i></a>   
                                       </span></span>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="image-wapper-des">
                                    <div>Click vào dấu cộng ở trên để up hình,</div>
                                    <div>bạn có thể up tối đa 10 hình, mỗi hình tối đa 6MB</div>
                                 </div>
                              </div>
                           </div>
						   </div>
                        </div>
                     </div>
   <div class="clearfix"></div>
   </div><!-- end form-group -->
   <div class="form-group">
   <label for="inputEmail3" class="col-sm-2 control-label">Nội dung tin<span>*</span></label>
   <div class="col-sm-10">
   <textarea name="p[noidung_vi]" id="noidung" class="editor" ></textarea>
   </div>
   <div class="clearfix"></div>
   </div><!-- end form-group -->	
   <input type="hidden" id="md5" name="md5"  value="<?=md5(time())?>" />
   <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"></label>
            <div class="col-sm-9">
               <p style="color: red;font-size:26px;font-weight:bold;">
                  <input type="checkbox" id="check" name="is_noindex" value="1">
                  Yêu cầu lên tin vip
               </p>
			   
			    <p style="color: red;font-size:26px;font-weight:bold;">
                  Liên hệ : <?= $row_setting['hotline'] ?>
                 
               </p>
            </div>
         </div>
   <?php /* <div class="form-group">
      <label for="inputEmail3" class="col-sm-4 control-label">Bản đồ đường đi</label>
      <div class="col-sm-12">
      <input type="text" name="a[map]" class="iframe-refresh form-control input-sm" />
      <span class="help-block">Chèn iframe google map (Chiều dài: 700px chiều cao 400px)</span>
      <div class="clearfix">
      <div id="iframe-into"></div>
      </div>
      </div>
      </div><!-- end form-group -->	 */ ?>
	  </div>
	 </div>
   <div class="panel panel-info">
   <div class="panel-heading">THÔNG TIN LIÊN LẠC</div>
   <div class="panel-body">
   <div class="form-group">
   <label for="inputEmail3" class="col-sm-3 control-label">Tên người đăng <span>*</span></label>
   <div class="col-sm-8">
   <input type="text" class="form-control" name="u[ten]" id="inputEmail3" value='<?=$_SESSION['member_log']['fullname']?>' required>
   </div>
   <div class="clearfix"></div>
   </div><!-- end form-group -->
   <div class="form-group">
   <label for="inputEmail3" class="col-sm-3 control-label">Địa chỉ <span>*</span></label>
   <div class="col-sm-8">
   <input type="text" name="u[diachi]" value='<?=$_SESSION['member_log']['address']?>' class="form-control" required id="inputEmail3">
   </div>
   <div class="clearfix"></div>
   </div><!-- end form-group -->
   <div class="form-group">
   <label for="inputEmail3" class="col-sm-3 control-label">Điện thoại <span>*</span></label>
   <div class="col-sm-8">
   <input type="text" name="u[sdt]" class="form-control" required id="inputEmail3">
   </div>
   <div class="clearfix"></div>
   </div><!-- end form-group -->
   <div class="form-group">
   <label for="inputEmail3" class="col-sm-3 control-label">Email <span>*</span></label>
   <div class="col-sm-8">
   <input type="text" name="u[email]" class="form-control" required value='<?=$_SESSION['member_log']['email']?>' required id="inputEmail3">
   </div>
   <div class="clearfix"></div>
   </div><!-- end form-group -->
   </div>
   </div>
   <!-- end panel --> 
   <div class="form-group">
   <label for="inputEmail3" class="col-sm-3 control-label">Mã bảo vệ <span>*</span></label>
   <div class="col-sm-2">
   <div class="row">
   <div id="captcha_img">
   <img width='100px' id="yw0" src="captcha/captcha.php" data-url="captcha/captcha.php" alt="" /></div>
   </div>
   </div>
   <div class="col-sm-3">
   <div class="row">
   <input name="captcha"  class="form-control" required id="captcha" type="text" /><span class="captcha-status"></span></div></div>	<div class="col-sm-1">	<a class="captcha-refresh-button" href="" title="Lấy code mới"><i class="glyphicon glyphicon-refresh"></i></a></div>
   </div><!-- end form-group -->
   <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
   <button type="submit" class="btn btn-success">ĐĂNG TIN</button>
   <input type="hidden" name="submit" value="action" />
   </div>
   </div>
   </form>
   <div class="clearfix"></div>
</div>
</div>
<script>
	$().ready(function(){
					$('.input-file').filer({
            showThumbs: true,
			limit :10,
			maxSize:124,
			extensions :['png','gif','jpg','jpeg'],
            templates: {
				
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-rightlist-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true,
			
            files: <?=json_encode($ar)?>,
			
        });
	})

   
   $().ready(function(){
   	$(".captcha-refresh-button").click(function(){
   		$('#captcha_img').parent().find("img").attr("src","captcha/captcha.php?"+Math.random());
      		
   		return false;
   	})
   	$("#id_cat").click(function(){
   		if($("#id_list").val() == 0){
   			alert("Vui lòng chọn danh mục cấp 1!");
   			$("#id_list").focus();
   		}
   	})
   	
   	$json = <?=json_encode($product_cat)?>;
	
   	$("#id_list").change(function(){
   	$("#id_cat").find("option").not(":first").remove();
		$obj = $(this);
   		$.each($json,function(i,item){
			
   			if(i==$obj.val()){
   				$.each(item,function($i2,$item2){
   				$("#id_cat").append("<option value='"+$item2.id+"'>"+$item2.ten_vi+"</option>");
   					
   					
   				})
   			
   			}
   		})
		
		
		$id=$('#id_list').val();
		$.ajax({
			url:'ajax/danhmuc_list.html',
			type:'post',
			data:{id:$id},
			success:function(data){
				$ojb=$.parseJSON(data);
				$('#input').html("");
				$.each($ojb,function(index,item){
				$('#input').append("<div class='form-group'><label for='inputEmail3' class='col-sm-3 control-label'>"+item.ten_vi+"</label><div class='col-sm-8'><input type='text' name='thuoctinh["+item.id+"]' value='' class='form-control'></div></div>");
				})
			}
			
		})
		
   		
   	
   	})

   
   })	
   
</script>
<script type="text/javascript">
   var editor = CKEDITOR.replace('noidung', {
       uiColor: '#EAEAEA',
       language: 'en',
       skin: 'moono',
       width: 500,
       resize_enabled: false,
   
       height: 200,
		
       toolbar: [
              [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-'],
              [ 'FontSize' ],{ name: 'insert', items: ['Image', 'Youtube']},
          ],
	plugins: 'about,a11yhelp,basicstyles,bidi,blockquote,clipboard,colorbutton,colordialog,contextmenu,dialogadvtab,div,elementspath,enterkey,entities,filebrowser,find,flash,floatingspace,font,format,forms,horizontalrule,htmlwriter,image,iframe,indentlist,indentblock,justify,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastefromword,pastetext,preview,print,removeformat,resize,save,scayt,selectall,showblocks,showborders,smiley,sourcearea,specialchar,stylescombo,tab,table,tabletools,templates,toolbar,undo,wsc,wysiwygarea,image2,widget,lineutils,youtube',
    removeButtons: '',
    removeDialogTabs : '',
	entities: false,
	htmlEncodeOutput: false,
	skin:'bootstrapck',
	toolbarGroups: [
      { name: 'document',	   groups: [ 'mode', 'document', 'doctools'  ] },
      { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
      { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
    //  { name: 'forms' },
      '/',
      { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
      { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'links' },
     
      '/',
      { name: 'styles' },
      { name: 'colors' },
      
      
     // { name: 'about' },
	   { name: 'insert' },
	
    ]
		
   
   });
</script>
<input type="hidden" id="num" value="0" />
<input type="hidden" id="is_alert" value="0" />
</style>
<script>
   $().ready(function(){
   	$("#SignUpVatGiaForm_captcha").change(function(){
   		$(".captcha-status").hide();
   		$cap = $("#SignUpVatGiaForm_captcha").val();
   		$.post("thanh-vien/checkcaptcha.html",{cap:$cap},function(data){
   			
   			if(data==1){
   				$("#form-submit").submit();
   				return true;
   			}else{
   				$(".captcha-status").show().html("Mã bảo vệ không đúng").css("color","red");
   				
   				return false;
   			}
   		})
   		return false;
   	})
   	
   	
   	})
   
</script>
<style>
.item-ti{
	    text-align: left;
    margin-top: -15px;
}
.search-location {
    float: left;
    width: 100%;
}
.mbn-posting .image-wapper {
    border: 1px solid #ccc;
    background: #f9f9f9;
}
.mbn-posting .image-wapper .image-wapper-label {
    text-align: center;
    margin-top: 20px;
    color: #1c60a7;
}
.mbn-posting .image-wapper .image-wapper-take {
    text-align: center;
    margin-top: 10px;
}
.jfu-container {
    position: relative;
    margin: 5px 0;
}
.mbn-posting .image-wapper .image-wapper-take .jfu-btn-upload {
    width: 100%;
    background-color: #f9f9f9;
    border: none;
    cursor: pointer;
}
.jfu-btn-upload {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
    color: #fff;
    background-color: #ef9240;
    border-color: #e16d07;
}
.camera-add-image {
    color: #ebebeb;
    font-size: 70px;
}
.plus-add-image {
    position: absolute;
    top: -22px;
    left: 27px;
    font-size: 25px;
    color: #5bc3e9;
}
input[type=file] {
    display: block;
}
.input-file {
    position: relative;
}
.jfu-input-file {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    opacity: 0;
    filter: alpha(opacity=0);
    font-size: 23px;
    direction: ltr;
    cursor: pointer;
    width: 100%;
}
.jfu-input-file {
    height: 100%;
}
.mbn-posting .image-wapper .image-wapper-label {
    text-align: center;
    margin-top: 20px;
    color: #1c60a7;
}
.mbn-posting .image-wapper .image-wapper-des {
    text-align: center;
    margin-top: 10px;
    line-height: 20px;
    color: #555;
}
</style>
