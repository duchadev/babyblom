<script>
	$(document).ready(function() {
		$("#chonhet").click(function(){
			var status=this.checked;
			$("input[name='chon']").each(function(){this.checked=status;})
		});
		
		$("#xoahet").click(function(){
			var listid="";
			$("input[name='chon']").each(function(){
				if (this.checked) listid = listid+","+this.value;
			})
			listid=listid.substr(1);	 //alert(listid);
			if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
			hoi= confirm("Bạn có chắc chắn muốn xóa?");
			if (hoi==true) document.location = "index.php?com=order&act=delete&listid=" + listid;
		});
	});
</script>
<div class="control_frm" style="margin-top:25px;">
	<div class="bc">
		<ul id="breadcrumbs" class="breadcrumbs">
			<li><a href="index.php?com=order&act=man"><span>Đơn hàng</span></a></li>
			<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<script src="js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".datetimepicker").datetimepicker({
			yearOffset:222,
			lang:'ch',
			timepicker:false,
			format:'m/d/Y',
			formatDate:'Y/m/d',
			minDate:'-1970/01/02', // yesterday is minimum date
			maxDate:'+1970/01/02' // and tommorow is maximum date calendar
		});
	});
</script>
<div class="widget">
	<div class="titlee" style="padding-bottom:5px;">
		
		<div class="timkiem" >
			<form name="search" action="index.php" method="GET" class="form giohang_ser">
				<input name="com" value="order" type="hidden"  />
				<input name="act" value="man" type="hidden" />
				<input name="p" value="<?=($_GET['p']=='')?'1':$_GET['p']?>" type="hidden" />
				
				<input class="form_or" name="keyword" placeholder="Nhập từ khóa.." value="<?=$_GET['keyword']?>" type="text" />
				<input class="form_or" name="ngaybd" id="datefm" type="text" value="<?=$_GET['ngaybd']?>" placeholder="Từ ngày.."/>
				<input class="form_or" name="ngaykt" id="dateto" type="text" value="<?=$_GET['ngaykt']?>" placeholder="Đến ngày.." />
				
				<?php /* <select name="sotien">
					<option value="0">Chọn giá</option>
					<?php 
					$sql="select id,ten from #_giasearch order by id";
					$d->query($sql);
					$giasearch = $d->result_array();
					for ($i=0,$count=count($giasearch); $i < $count; $i++) { 
					?>
					<option value="<?=$giasearch[$i]["id"]?>" <?php if($giasearch[$i]["id"]==$_GET['sotien']) echo "selected='selected'";?> >
					<?=$giasearch[$i]["ten"]?>
					</option>
					<?php }?>
				</select> */ ?>
				<select name="httt">
					<option value="0">Hình thức thanh toán</option>
					<?php 
						$sql="select id,ten_vi from #_hinhthucthanhtoan order by id";
						$d->query($sql);
						$httt_sr = $d->result_array();
						for ($i=0,$count=count($httt_sr); $i < $count; $i++) { 
						?>
						<option value="<?=$httt_sr[$i]["id"]?>" <?php if($httt_sr[$i]["id"]==$_GET['httt']) echo "selected='selected'";?>>
							<?=$httt_sr[$i]["ten_".$lang]?>
						</option>
					<?php }?>
				</select>
				<select name="tinhtrang">
					<option value="0">Tình trạng</option>
					<?php  
						$sql="select id,trangthai from #_tinhtrang order by id";
						$d->query($sql);
						$tinhtrang_sr = $d->result_array();
						for ($i=0,$count=count($tinhtrang_sr); $i < $count; $i++) { 
						?>
						<option value="<?=$tinhtrang_sr[$i]["id"]?>" <?php if($tinhtrang_sr[$i]["id"]==$_GET['tinhtrang']) echo "selected='selected'";?> >
							<?=$tinhtrang_sr[$i]["trangthai"]?>
						</option>
					<?php }?>
				</select>
				<input type="submit" class="blueB" value="Tìm kiếm" style="width:100px; margin:0px 0px 0px 10px;"  />
			</form>
			<div class="clear"></div>
		</div><!--end tim kiem-->
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>

<form name="f" id="f" method="post">
	<div class="control_frm" style="margin-top:0;">
		<div style="float:left;">
			
			<input type="button" class="blueB" value="Xoá" id="xoahet" />
		</div>  
		
	</div>
	<div class="widget">
		<div class="title"><span class="titleIcon">
			<input type="checkbox" id="titleCheck" name="titleCheck" />
		</span>
		<h6>Danh sách đơn hàng</h6>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
			<thead>
				<tr>
					<td></td>
					<td class="sortCol" width="120"><div>Mã đơn hàng<span></span></div></td>     
					<td class="sortCol"><div>Họ tên<span></span></div></td>
					<td class="sortCol" width="150"><div>Ngày đặt<span></span></div></td>
					<td width="150">Số tiền</td>
					<td width="150">Tình trạng</td>
					<td width="150">Thao tác</td>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="10"><div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?>     </div></td>
				</tr>
			</tfoot>
			<tbody>
				<?php for($i=0, $count=count($items); $i<$count; $i++){?>
					<tr>
						<td>
							<input type="checkbox" name="chon" value="<?=$items[$i]['id']?>" id="chon" />
						</td>
						<td align="center" <?php if($items[$i]['view']==0){ echo "style='font-weight:bold;'";}?>>
							<?=$items[$i]['madonhang']?>
						</td> 
						<td <?php if($items[$i]['view']==0){ echo "style='font-weight:bold;'";}?>>
							<?=$items[$i]['hoten']?>
						</td>
						<td align="center" <?php if($items[$i]['view']==0){ echo "style='font-weight:bold;'";}?>>
							
							<?=date('d/m/Y - g:i A',$items[$i]['ngaytao']);?>
						</td>
						
						<td align="center" <?php if($items[$i]['view']==0){ echo "style='font-weight:bold;'";}?>>
							<?=number_format($items[$i]['tonggia'],0, ',', '.')?>&nbsp;VNĐ
						</td>
						
						<td align="center" <?php if($items[$i]['view']==0){ echo "style='font-weight:bold;'";}?>>
							<?php 
								$sql="select trangthai from #_tinhtrang where id= '".$items[$i]['tinhtrang']."' ";
								$d->query($sql);
								$result=$d->fetch_array();
								echo $result['trangthai'];
							?>
						</td>
						
						<td class="actBtns">
							<?php /* <a href="export_word.php?id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Xuất đơn hàng word">
								<img src="./images/icons/dark/word.png" alt="">
								</a>
								
							<a href="export.php?id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Xuất đơn hàng excel"><img src="./images/icons/dark/excel.png" alt=""></a> */ ?>
							
							<a href="index.php?com=order&act=edit&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Xem và sửa đơn hàng"><img src="./images/icons/dark/preview.png" alt=""></a>
						<a href="index.php?com=order&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa đơn hàng"><img src="./images/icons/dark/close.png" alt=""></a>        </td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		
		
	</div>
</form>  
<script type="text/javascript">
	function onSearch(evt) {	
		var datefm = document.getElementById("datefm").value;	
		var dateto = document.getElementById("dateto").value;
		var status = document.getElementById("id_tinhtrang").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=order&act=man&datefm="+datefm+"&dateto="+dateto+"&status="+status;
		loadPage(document.location);
		
	}
	$(document).ready(function(){						
		var dates = $( "#datefm, #dateto" ).datepicker({
			defaultDate: "+1w",
			dateFormat: 'dd/mm/yy',
			changeMonth: true,			
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "datefm" ? "minDate" : "maxDate",
				instance = $( this ).data( "datepicker" ),
				date = $.datepicker.parseDate(
				instance.settings.dateFormat ||
				$.datepicker._defaults.dateFormat,
				selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
        
	});
	
</script>