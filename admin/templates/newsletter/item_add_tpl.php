
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
	<form  name="supplier" id="validate" class="form" action="index.php?com=newsletter&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
		<div class="widget">
			<div class="formRow">
				<label>Tên</label>
				<div class="formRight">
					<input type="text" name="ten" value="<?=$item['ten']?>" class="input" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Email</label>
				<div class="formRight">
					<input type="text" name="email" value="<?=$item['email']?>" class="input" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Địa chỉ</label>
				<div class="formRight">
					<input type="text" name="diachi" value="<?=$item['diachi']?>" class="input" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Điện thoại</label>
				<div class="formRight">
					<input type="text" name="dienthoai" value="<?=$item['dienthoai']?>" class="input" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Nội  dung</label>
				<div class="formRight">
					  <textarea rows="4" cols="" title="Nhập Ghi chú ." class="tipS" name="ghichu"><?=@$item['noidung']?></textarea>
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
			
			<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
			
			<input type="submit" class="blueB" value="Lưu" class="btn" />
			<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=newsletter&act=man'" class="btn" />
		</div>	
	</form>
</div>