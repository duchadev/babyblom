
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
<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=diachi&act=man_list"><span>Quản lý tỉnh thành</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=diachi&act=save_list" method="post" enctype="multipart/form-data">
	<div class="widget">

		
		
        <div class="formRow ">
			<label>Tên Tỉnh/Thành</label>
			<div class="formRight">
                <input type="text" name="ten" title="Nhập tên danh mục" id="ten" class="tipS validate[required]" value="<?=@$item['ten']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<?php /*?> 
		 <div class="formRow ">
			<label>Phí ship</label>
			<div class="formRight">
                <input type="text" name="gia" title="Nhập giá ship" id="gia" class="tipS validate[required] conso" value="<?=@$item['gia']?>" />
			</div>
			<div class="clear"></div>
		</div>
		 <?php */?>
		
				<div class="formRow">
			<label>Hình thức thanh toán</label>
			<div class="formRight">
                <?php 

				$list_httt = explode(',',$item['httt']);
				$d->query("select * from #_hinhthucthanhtoan where hienthi = 1 order by stt desc");
				foreach($d->result_array() as $k=>$v){?>
				<div class="checkbox-inline">
				  <label>
					<input type="checkbox" value="<?= $v['id'] ?>" <?=(in_array($v['id'],$list_httt)) ? 'checked' : ''?> name="httt[]">
						<?=$v['ten_vi']?>
				  </label>
				</div>
			<?php 	
				
				
			}

		?>		
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
	<div class="widget">
		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            	<a href="index.php?com=diachi&act=man_list" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>

			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>        </div>
