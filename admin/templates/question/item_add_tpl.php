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
	});
</script>

<form name="supplier" id="validate" class="form" action="index.php?com=question&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

	<div class="control_frm" style="margin-top:25px;">
	    <div class="bc">
	        <ul id="breadcrumbs" class="breadcrumbs">
	        	<li><a href="index.php?com=question&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Cập nhật <?=$title_main?></span></a></li>
	        </ul>
	        <div class="clear"></div>
	    </div>
	</div>

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
<?php if($config_images=='true'){ ?>
	<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" width="100" /></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>



<?php if($config_ten=='true'){ ?>
    <div class="formRow lang_hidden lang_vi active">
		<label>Tiêu đề</label>
		<div class="formRight">
            <input type="text" name="ten" title="Nhập tên " id="ten" class="tipS" value="<?=@$item['ten_vi']?>" />
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="formRow lang_hidden lang_vi active">
		<label>Email</label>
		<div class="formRight">
            <input type="text" name="ten" title="Nhập tên " id="email" class="tipS" value="<?=@$item['email']?>" />
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="formRow lang_hidden lang_vi active">
		<label>Số điện thoại</label>
		<div class="formRight">
            <input type="text" name="ten" title="Nhập số điện thoại " id="phone" class="tipS" value="<?=@$item['phone']?>" />
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="formRow lang_hidden lang_vi active">
		<label>Địa chỉ</label>
		<div class="formRight">
            <input type="text" name="address" title="Nhập địa chỉ" id="address" class="tipS" value="<?=@$item['address']?>" />
		</div>
		<div class="clear"></div>
	</div>
	
	
<?php } ?>
<?php if($config_mota=='true'){ ?>
<div class="formRow lang_hidden lang_vi active">
			<label>Mô tả (Tiếng việt)</label>
			<div class="">
                <textarea id="mota_vi" rows="5" name="mota_vi"><?=@$item['mota_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow lang_hidden lang_en">
			<label>Mô tả (Tiếng anh)</label>
			<div class="ck_editor">
                <textarea id="mota_en" rows="5" name="mota_en"><?=@$item['mota_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow lang_hidden lang_cn">
			<label>Mô tả (Tiếng Trung)</label>
			<div class="ck_editor">
                <textarea id="mota_cn" rows="5" name="mota_cn"><?=@$item['mota_cn']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
<?php } ?> 


       
	<div class="formRow lang_hidden lang_vi active">
			<label>Nội Dung câu hỏi (Tiếng việt)</label>
			<div class="ck_editor">
                <textarea id="content" name="content"><?=@$item['content']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		
	<div class="formRow lang_hidden lang_vi active">
			<label>Nội Dung câu trả lời (Tiếng việt)</label>
			<div class="ck_editor">
                <textarea id="reply" name="reply"><?=@$item['reply']?></textarea>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow lang_hidden lang_en">
			<label>Nội Dung (Tiếng anh)</label>
			<div class="ck_editor">
                <textarea id="noidung_en" name="noidung_en"><?=@$item['noidung_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow lang_hidden lang_cn">
			<label>Nội Dung (Tiếng Trung)</label>
			<div class="ck_editor">
                <textarea id="noidung_cn" name="noidung_cn"><?=@$item['noidung_cn']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
   
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung seo</h6>
		</div>
		
		<div class="formRow">
			<label>Title</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho sản phẩm" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$item['description']?></textarea>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id_cat" id="id_this_product" value="<?=@$item['id_cat']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
				<a href="index.php?com=product&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>   
