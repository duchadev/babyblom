<div class="wrapper">

<div class="control_frm" id="form-register" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=member&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm <?=$title_main?></span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=member&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">

		<div class="title chonngonngu">
		<ul>
			<?php 
					foreach($config['AllLang_fix'] as $k=>$v){
					if(in_array($k,$config['lang'])){
						
					if($k=='vi'){
						
				?>
				<li><a href="<?= $k ?>" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
					<?php }else if($k=='en'){ ?>
				<li><a href="<?= $k ?>" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
					<?php }else{?>
				<li><a href="<?= $k ?>" class="tipS validate[required]" title="Chọn tiếng Trung quốc "><img src="./images/cn.jpg" alt="" class="tienganh" />Tiếng Trung quốc</a></li>
					<?php }}} ?>
		</ul>
		</div>	
		
		<?php if($config_images=='true'){?>
		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="avatar" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit'){?>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_member_.$item['avatar']?>"  alt="NO PHOTO" width="100" /></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php } } ?>
		<div class="ttl"><h4>Thông tin tài khoản</h4></div>
        <div class="formRow lang_hidden lang_vi active">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" title="Nhập email" id="email" <?=(isset($item)) ? 'readonly' : ''?> class="tipS validate[required]" value="<?=@$item['email']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow lang_hidden lang_vi active">
			<label>Mật khẩu mới</label>
			<div class="formRight">
                <input type="text" name="reg[password]" title="Nhập password" id="password"  class="tipS" value="" />
			</div>
			<div class="clear"></div>
		</div>


        <div class="formRow">
          <label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
         
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
             <label>Số thứ tự: </label>
              <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
          </div>
          <div class="clear"></div>
        </div>
		<div class="ttl"><h4>Thông tin cá nhân</h4></div>
		
		<div class="formRow lang_hidden lang_vi active">
			<label>Họ tên <span>*</span></label>
			<div class="formRight">
                <input type="text" name="reg[fullname]" title="Nhập tên bạn" id="fullname"  class="tipS validate[required]" value="<?=@$item['fullname']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
			
		<div class="formRow">
			<label style="margin-right:10px;">Ngày sinh <span>*</span></label>
				
			<?php
				$bd = explode("-",@$item['birthday']);
				
			?>
			<div class="col-5">
				<div class="fix-row" style="">
				<select name="date" class="main_select select" required>
					<option value="">Ngày</option>
					<?php for($i=1;$i<=31;$i++){
						$slt = "";
						if($i == $bd[0]){
							$slt = "selected";
						}
						echo  '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
					}?>
				</select>
				</div>
			</div>
			
			<label style="margin-right:10px;">Tháng</label>
			<div class="col-5">
				<div class="fix-row">
				<select name="month" class="main_select select" required>
					<option value="">Tháng</option>
					<?php for($i=1;$i<13;$i++){
						$slt = "";
						if($i == $bd[1]){
							$slt = "selected";
						}
						echo  '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
					}?>
				</select>
				</div>
				
			</div>
			<label style="margin-right:10px;">Năm</label>
			<div class="col-5">
				<div class="fix-row">
				<select name="year" class="main_select select" required>
					<option value="">Năm</option>
					<?php for($i=date("Y")-18;$i > (date("Y")-70);$i--){
						$slt = "";
						if($i == $bd[2]){
							$slt = "selected";
						}
						echo  '<option value="'.$i.'" '.$slt.'>'.$i.'</option>';
					}?>
				</select>
				</div>
			</div>
		
		<div class="clear"></div>
		
		
		
		
		</div>
	
		<div class="formRow">
			<label style="margin-right:5px;">Giới tính <span></span></label>
			
			<label class="radio-inline" style="margin-right:5px;">
				  <input type="radio" name="reg[gender]" id="inlineRadio1" <?php if(@$item['gender']==0) echo 'checked'; ?> value="0"> Nam
				</label>
				<label class="radio-inline">
				  <input type="radio" name="reg[gender]" id="inlineRadio2" <?php if(@$item['gender']==1) echo 'checked'; ?> value="1"> Nữ
				</label>
			<div class="clear"></div>
		</div>
		<div class="ttl"><h4>Thông tin liên hệ</h4></div>	
		
		<div class="formRow">
			<label>Địa chỉ liên hệ <span>*</span></label>
			<div class="formRight">
                <input type="text" name="reg[address]" title="Nhập địa chỉ liên hệ" id="address"  class="tipS validate[required]" value="<?=@$item['address']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
		
		<div class="formRow">
			<label>Điện thoại <span>*</span></label>
			<div class="formRight">
                <input type="text" name="reg[phone2]" title="Nhập điện thoại bàn" id="address"  class="tipS validate[required]" value="<?=@$item['phone2']?>" />
			</div>
			<div class="clear"></div>
		</div>
			
		<?php /* <div class="formRow">
			<label>Điện thoại bàn<span>*</span></label>
			<div class="formRight">
                <input type="text" name="reg[phone]" title="Nhập điện thoại" id="address"  class="tipS validate[required]" value="<?=@$item['phone']?>" />
			</div>
			<div class="clear"></div>
		</div> */ ?>
		
		
		
	</div>  
	<div class="widget">
		
		<div class="formRow">
			<div class="formRight">
				<input  type="hidden" name="secret" value="<?=$item['secret']?>">
				<input  type="hidden" name="required" value="1">
				<input  type="hidden" name="has_error" class="has_error" value="1">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
				<?php if($_GET['act']=='edit'){ ?>
					<input type="submit" class="brownB" onclick="TreeFilterChanged2(); return false;" value="Sửa thông tin" /><?php }else{?>
					<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Thêm thông tin" />
				<?php } ?>
				<input type="reset" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Nhập lại" />
            	<a href="index.php?com=member&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>

	</div>
</form>        </div>

<style>
	.ttl{
		margin:10px 5px
	}
	.col-5{
		width:25%;
		float:left
	}
	.main_select.select{
		
		width:100%;
	}
</style>


<script>

$().ready(function(){
	if($("#m-type").val()){
	toggleRequired($("#m-type").val());
	}
})
function checkValid(){
	$("#form-register").submit(function(){
		return true;
			if($(".has_error").val()==1){
			$options = new Array();
			$options.url = base_url+"/thanh-vien/valid.html";
			$options.data = $(this).serialize()+"&edit=1";
			$options.dataType = "json";
			$options.success = function(data){
			
				console.log(data);
				
				if(data.error.stt){
					$.each(data.error.data,function(i,item){
						$("."+i+"-input").parent().find(".help-block").html(item);
					})
					return false;
				}
				else{
					$(".has_error").val(0);
					$("#form-register").submit();
					
				}
				
				
			
			};
			 initAjax($options);
			 return false;
			 }
		
	
	})


}
function toggleRequired($id){
		$("#tab_1").find("input,select,textarea").each(function(){
			$name = $(this).attr("name");
			$(this).attr("data-name",$name);
			$(this).removeAttr("name");
			attr = $(this).attr("required");
			
			if (typeof attr !== typeof undefined && attr !== false) {
				$(this).removeAttr("required");
				$(this).attr("data-required","required");
			}
		
		})
		$("#tab_2").find("input,select,textarea").each(function(){
			$name = $(this).attr("name");
			$(this).attr("data-name",$name);
			$(this).removeAttr("name");
			attr = $(this).attr("required");
			
			if (typeof attr !== typeof undefined && attr !== false) {
				$(this).removeAttr("required");
				$(this).attr("data-required","required");
			}
		
		})
		$("#tab_"+$id).find("input,select,textarea").each(function(){
		//$("#tab_").find("input,select,textarea").each(function(){
			attr = $(this).data("required");
			$name = $(this).data("name");
			$(this).attr("name",$name);
			if (typeof attr !== typeof undefined && attr !== false) {
				
				$(this).attr("required","true");
			}
		
		})
	
	
	
	}
$().ready(function(){
	
	$("#form-register input[type=text],#form-register input[type=password],#form-register input[type=email],#form-register select,#form-register selected").each(function(){
		if(!$(this).parent().find(".help-block").length){
			$(this).after("<div class='clearfix'></div><span class='help-block red'></span>");
			
		}
	
	})
	$("#form-register").click(function(){
		$(this).find(".help-block").html("");
	})
	checkValid();
	$("#m-type").change(function(){
		if($(this).val()!=''){
			toggleRequired($(this).val());
			$("#tab_1,#tab_2").hide().removeClass("hide");
			$("#tab_"+$(this).val()).fadeIn();
			
			
		
		
		}
	
	
	})

})	


</script>	 
<script type="text/javascript">		

	$(document).ready(function() {
		$('.chonngonngu li a').click(function(event) {
			var lang = $(this).attr('href');
			$('.chonngonngu li a').removeClass('active');
			$(this).addClass('active');
			$('.lang_hidden').removeClass('active');
			$('.lang_'+lang).addClass('active');
			return false;
		});

		$('.update_stt').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'baiviet_photo';
			var value = $(this).val();
			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value},
				success: function(result) {
				}
			});
		});

		$('.delete_images').click(function(){
	      if (confirm('Bạn có muốn xóa hình này ko ? ')) {
	        var id = $(this).attr('title');
			var table = 'baiviet_photo';
			var links = "<?=_upload_baiviet;?>";
	        $.ajax ({
	          type: "POST",
	          url: "ajax/delete_images.php",
	          data: {id:id,table:table,links:links},
	          success: function(result) { 
	          }
	        });
	        $(this).parent().slideUp();
	      }
	      return false;
	    });

	    $('.themmoi').click(function(e) {
			$.ajax ({
				type: "POST",
				url: "ajax/khuyenmai.php",
				success: function(result) { 
					$('.load_sp').append(result);
				}
			});
        });

		$('.delete').click(function(e) {
			$(this).parent().remove();
		});
		

	});
	
</script>
