<form name="supplier" id="validate" class="form" action="index.php?com=background&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">

		<div class="control_frm" style="margin-top:25px;">
			<div class="bc">
				<ul id="breadcrumbs" class="breadcrumbs">
					<li><a href="index.php?com=bgweb&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Cập nhật <?=$title_main?></span></a></li>
				</ul>
				<div class="clear"></div>
			</div>
		</div> 

		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
				<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<span class="note">width : <?php echo _width_thumb*$ratio_;?>px  - Height : <?php echo _height_thumb*$ratio_;?>px</span>
			</div>

			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">

				<div class="mt10"><img src="<?=_upload_hinhanh.$item['photo']?>"  alt="NO PHOTO" width="800" /></div>
				<a href="index.php?com=background&act=capnhat&xoaanh=xoaanh<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><img src="./images/icons/dark/close.png" /></a><br />
			</div>

			<div class="clear"></div>
		</div>
		
	</div>
	<div class="widget">
		
		<div class="formRow">
			<div class="formRight">
				<input type="hidden" name="id_cat" id="id_this_product" value="<?=@$item['id_cat']?>" />
				<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>   