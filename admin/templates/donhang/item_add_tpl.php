<?php
	function tinhtrang($i=0)
   	{
   		$sql="select * from table_tinhtrang order by id";
   		$stmt=mysql_query($sql);
   		$str='
		<select id="id_tinhtrang" name="id_tinhtrang" class="main_font">					
		';
   		while ($row=@mysql_fetch_array($stmt)) 
   		{
   			if($row["id"]==$i)
			$selected="selected";
   			else 
			$selected="";
   			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["trangthai"].'</option>';			
		}
   		$str.='</select>';
   		return $str;
	}
   	
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
			<li><a href="index.php?com=order&act=mam"><span>Đơn hàng</span></a></li>
			<li class="current"><a href="#" onclick="return false;">Xem và sửa đơn hàng</a></li>
		</ul>
        <div class="clear"></div>
	</div>
</div>

<div class="box-body">
	<form name="frm" method="post" action="index.php?com=order&act=save" enctype="multipart/form-data" class="nhaplieu" id="xf">
		<div class="widget" style="width: 47%;float: left;margin-top: 0;clear: none;margin-right: 27px;">
			<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
				<h6>Người thanh toán</h6>
			</div>
			
			<div class="formRow" >
				<label>Mã đơn hàng</label>
				<div class="formRight" style="width:70%">
					<?=@$item['madonhang']?>
				</div>
				<div class="clear"></div>
			</div>	
			
			<div class="formRow" >
				<label>Họ tên</label>
				<div class="formRight" style="width:70%">
					<?=@$item['hoten']?>
				</div>
				<div class="clear"></div>
			</div>	
			
			<div class="formRow" >
				<label>Điện thoại</label>
				<div class="formRight" style="width:70%">
					<?=@$item['dienthoai']?>
				</div>
				<div class="clear"></div>
			</div>		        
			
			<div class="formRow" >
				<label>Email</label>
				<div class="formRight" style="width:70%">
					<?=@$item['email']?>
				</div>
				<div class="clear"></div>
			</div>	
			
			<div class="formRow" >
				<label>Địa chỉ</label>
				<div class="formRight" style="width:70%">
					<?=@$item['diachi']?>
				</div>
				<div class="clear"></div>
			</div>	
			
			
			
		</div>
		
		<div class="widget" style="width: 50%;float: left;margin-top: 0;clear: none;">
			<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
				<h6>Người nhận hàng</h6>
			</div>
			
			
			
			<div class="formRow" >
				<label>Họ tên</label>
				<div class="formRight" style="width:70%">
					<?=@$item['receive_name']?>
				</div>
				<div class="clear"></div>
			</div>	
			
			<div class="formRow" >
				<label>Điện thoại</label>
				<div class="formRight" style="width:70%">
					<?=@$item['receive_phone']?>
				</div>
				<div class="clear"></div>
			</div>		        
			
			<div class="formRow" >
				<label>Email</label>
				<div class="formRight" style="width:70%">
					<?=@$item['receive_email']?>
				</div>
				<div class="clear"></div>
			</div>	
			
			<div class="formRow" >
				<label>Địa chỉ</label>
				<div class="formRight" style="width:70%">
					<?=@$item['receive_address']?>
				</div>
				<div class="clear"></div>
			</div>	
			
			
			
		</div>
		<div class="clear"></div>
		<?php 
			unset($item['chitiet']);
			
			
		?>
		
		<div>
			<?php 
				echo @$item['donhang'];
				
			?>
		</div>
		<style>
			.all-cart-price{
			margin:10px;
			}
		</style>
		<?php 
			$d->query("select * from #_hinhthucthanhtoan where id = '".$item['hinhthucthanhtoan']."'");
			$httt = $d->fetch_array();
			
			$d->query("select * from #_hinhthucvanchuyen where id = '".$item['hinhthucvanchuyen']."'");
			$htvc = $d->fetch_array();
			
			
		?></br>
		<div><b>Hình thức thanh toán: <?=$httt['ten_vi']?> </div>
			<br />
			<div><b>Hình thức vận chuyển: <?=$htvc ['ten_vi']?> - <?=myformat($htvc['gia'])?></b></div>
			<br />
			<div><b>Tổng số tiền thanh toán: <span class="red"><?=myformat($item['tonggia'])?></span></b></div>
			<br />
			
	  		<div class="widget">
				<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
					<h6>Thông tin thêm</h6>
				</div>
				
				<div class="formRow">
					<label>Nội Dung :</label>
					<div class="formRight">
						<textarea rows="10" cols="100" title="Viết ghi chú cho đơn hàng" class="tipS" name="noidung" id="noidung"><?=@$item['noidung']?></textarea>
					</div>
					<div class="clear"></div>
				</div>	
				
				<div class="formRow">
					<label>Tình trạng</label>
					<div class="formRight">
						<div class="selector">
							<?=tinhtrang($item['trangthai'])?>
						</div>
					</div>
					<div class="clear"></div>
				</div>	
				
				<input type="hidden" name="id" value="<?= $item['id'] ?>" class="" />
				<input type="submit" value="Lưu" class="blueB" />
				<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=order&act=man'" class="btn" />
				
			</div>
			
			
			
		</form>
		<script src="assets/js/jquery.inlineStyler.min.js"></script>
		<script>
			$().ready(function(){
				//$("#xf").inlineStyler( );
			})
			
		</script>
	</div>
</div>