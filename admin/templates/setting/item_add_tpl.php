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
<div class="control_frm" style="margin-top:25px;">
	<div class="bc">
		<ul id="breadcrumbs" class="breadcrumbs">
			<li><a href="index.php?com=setting&act=capnhat"><span>Thiết lập hệ thống</span></a></li>
			<li class="current"><a href="#" onclick="return false;">Cấu hình website</a></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
		$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=setting&act=save&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	

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

				<div class="formRow lang_hidden lang_vi active">
					<label>Tên Công Ty</label>
					<div class="formRight">
						<input type="text" name="ten_vi" title="Nhập tên công ty" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow lang_hidden lang_en">
					<label>Tên Công Ty (Tiếng anh)</label>
					<div class="formRight">
						<input type="text" name="ten_en" title="Nhập tên công ty" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow lang_hidden lang_cn">
					<label>Tên Công Ty (Tiếng anh)</label>
					<div class="formRight">
						<input type="text" name="ten_cn" title="Nhập tên công ty" id="ten_cn" class="tipS validate[required]" value="<?=@$item['ten_cn']?>" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow lang_hidden lang_vi active">
					<label>Slogan form liên hệ</label>
					<div class="formRight">
						<input type="text" name="slogancontact_vi" title="Nhập slogan" id="slogancontact_vi" class="tipS validate[required]" value="<?=@$item['slogancontact_vi']?>" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow lang_hidden lang_vi ">
					<label>Slogan</label>
					<div class="formRight">
						<input type="text" name="slogan_vi" title="Nhập slogan" id="slogan_vi" class="tipS validate[required]" value="<?=@$item['slogan_vi']?>" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow lang_hidden lang_en">
					<label>Slogan (Tiếng anh)</label>
					<div class="formRight">
						<input type="text" name="slogan_en" title="Nhập slogan" id="slogan_en" class="tipS validate[required]" value="<?=@$item['slogan_en']?>" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow lang_hidden lang_cn">
					<label>Slogan (Tiếng Trung)</label>
					<div class="formRight">
						<input type="text" name="slogan_cn" title="Nhập slogan" id="slogan_cn" class="tipS validate[required]" value="<?=@$item['slogan_cn']?>" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label>Email</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['email']?>" name="email" title="Nhập địa chỉ email" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label>Hotline</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['hotline']?>" name="hotline" title="Nhập hotline" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label>Điện thoại</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['dienthoai']?>" name="dienthoai" title="Nhập số điện thoại" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow lang_hidden lang_vi active">
					<label>Địa chỉ</label>
					<div class="formRight">
						<input type="text" name="diachi_vi" title="Nhập địa chỉ công ty" id="diachi_vi" class="tipS validate[required]" value="<?=@$item['diachi_vi']?>" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow lang_hidden lang_en">
					<label>Địa chỉ (Tiếng anh)</label>
					<div class="formRight">
						<input type="text" name="diachi_en" title="Nhập địa chỉ công ty" id="diachi_en" class="tipS validate[required]" value="<?=@$item['diachi_en']?>" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow lang_hidden lang_cn">
					<label>Địa chỉ (Tiếng Trung)</label>
					<div class="formRight">
						<input type="text" name="diachi_cn" title="Nhập địa chỉ công ty" id="diachi_cn" class="tipS validate[required]" value="<?=@$item['diachi_cn']?>" />
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label>Website</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['website']?>" name="website" title="Nhập địa chỉ website" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>	

				<div class="formRow">
					<label>Tọa độ bản đồ</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['toado']?>" name="toado" title="Nhập tọa độ vị trí công ty" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>	

				<div class="formRow">
					<label>FanPage Facebook</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['facebook']?>" name="facebook" title="Nhập link fanpage facebook" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>


				<div class="formRow">
					<label>Ngôn ngữ mặc định</label>

					<div class="formRight">
						<?php 

						foreach($config['AllLang_fix'] as $k=>$v){
							if(in_array($k,$config['lang'])){
								echo '<label class="radio-inline">';
								echo '<input type="radio" name="default_lang" value="'.$k.'" '.(($item['default_lang'] == $k) ? 'checked' : '').' id="inlineRadio1" value="option1">';
								echo $v;
								echo '</label>';
							}

						}



						?>

					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label>Phân trang sản phẩm</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['product_paging']?>" name="product_paging" title="Phân trang sản phẩm" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label>Phân trang tin tức</label>
					<div class="formRight">
						<input type="text" value="<?=@$item['news_paging']?>" name="news_paging" title="Phân trang tin tức" class="tipS" />
					</div>
					<div class="clear"></div>
				</div>
		<!-- 	<div class="formRow">
			<label>Đóng dấu ảnh</label>
			<div class="formRight">
			<div class="mt10"><img src="../upload/watermark.png"  alt="NO PHOTO" width="100" /></div><br>
			<input type="file" id="dongdau" name="dongdau" />
			<div class="note"> width : 1/4 kích thước sản phẩm </div>
			</div>
			<div class="clear"></div>
			</div>
		-->
		
		
		
		
		
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
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho website" class="tipS" />
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
			<label>code Top:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code Top" class="tipS" name="meta_top"><?=@$item['meta_top']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>code Bottom:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code Bottom" class="tipS" name="meta_bottom"><?=@$item['meta_bottom']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Analyrics:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code Analytics" class="tipS" name="analytics"><?=@$item['analytics']?></textarea>
			</div>
			<div class="clear"></div>
		</div>	
		
		<div class="formRow">
			<label>V chat :</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Code vchat" class="tipS" name="vchat"><?=@$item['vchat']?></textarea>
			</div>
			<div class="clear"></div>
		</div>	
		
		<div class="formRow">
			<div class="formRight">
				<input type="hidden" name="id" id="id_this_setting" value="<?=@$item['id']?>" />
				<input type="submit" class="blueB"  value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div> 			
	</div>

	
</form>   