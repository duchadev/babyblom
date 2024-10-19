<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=comment&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Quản lý Comment</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=comment&act=save&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	<div class="widget">

		<div class="title chonngonngu">
		<ul>
			<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
			
		</ul>
		</div>	
        
        <div class="formRow lang_hidden lang_vi active">
			<label>Sản Phẩm :</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" value="<?=$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow lang_hidden lang_vi active">
			<label>Họ tên :</label>
			<div class="formRight">
                <input type="text" name="hoten" title="Nhập tên danh mục" id="hoten" class="tipS validate[required]" value="<?=$item['hoten']?>" />
			</div>
			<div class="clear"></div>
		</div>
        
        <div class="formRow lang_hidden lang_vi active">
			<label>Email :</label>
			<div class="formRight">
                <input type="text" name="email" title="Nhập tên danh mục" id="email" class="tipS validate[required]" value="<?=$item['email']?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow lang_hidden lang_vi active">
			<label>Lúc :</label>
			<div class="formRight">
                <input type="text" name="ngaytao" title="Nhập tên danh mục" id="ngaytao" class="tipS validate[required]" value="<?=date('d/m/Y - g:i A',$item['ngaytao']);?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow lang_hidden lang_vi active">
        
			<label>Nội Dung</label>
			<div class="ck_editor">
                <textarea id="noidung_vi" name="noidung"><?=$item['noidung']?></textarea>
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
		
	</div>  
</form>
</div>

