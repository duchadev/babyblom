<script>
	$(document).ready(function() {
		$("#xoahet").click(function(){
			var listid="";
			$("input[name='chon']").each(function(){
				if (this.checked) listid = listid+","+this.value;
			})
			listid=listid.substr(1);   //alert(listid);
			if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
			hoi= confirm("Bạn có chắc chắn muốn xóa?");
			if (hoi==true) document.location = "index.php?com=lang&act=delete&curPage=<?=$_GET['curPage']?>&listid=" + listid;
		});
		
		$('.timkiem button').click(function(event) {
			var keyword = $(this).parent().find('input').val();
			window.location.href="index.php?com=lang&act=man&keyword="+keyword;
		});
		
		$("#send").click(function(){
			var listid="";
			$("input[name='chon']").each(function(){
				if (this.checked) listid = listid+","+this.value;
			})
			listid=listid.substr(1);	 //alert(listid);
			if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
			hoi= confirm("Xác nhận muốn gửi thư đi?");
			if (hoi==true){ document.frm.listid.value=listid; document.frm.submit();}
		});
	});
</script>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=lang&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Quản lý ngôn ngữ</span></a></li>
        	<?php if($_GET['keyword']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>
			<?php }   ?>
		</ul>
        <div class="clear"></div>
	</div>
</div>

<form name="f" id="f" method="post">
	<input type="hidden" name="listid" id="listid">
	<div class="control_frm" style="margin-top:0;">
		<div style="float:left;">
			<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=lang&act=add'" />
			<input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />
			
		</div>  
	</div>
	<div class="widget">
		<div class="title"><span class="titleIcon">
			<input type="checkbox" id="titleCheck" name="titleCheck" />
		</span>
		<h6>Chọn tất cả</h6>
		<div class="timkiem">
			<input type="text" value="" placeholder="Nhập từ khóa tìm kiếm ">
			<button type="button" class="blueB"  value="">Tìm kiếm</button>
		</div>
		</div>
		
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
			
			<tr style="text-align:center">
				<td></td>
				<td>STT</td>
				<td class="sortCol"><div>Key lang<span></span></div></td>
				<td class="sortCol"><div>Tiếng việt<span></span></div></td>
				<td class="sortCol"><div>Tiếng anh<span></span></div></td>
				<td class="sortCol"><div>Tiếng hàn<span></span></div></td>
				<td class="sortCol" <?= $hide ?>><div>Tiếng nhật<span></span></div></td>
				<td class="sortCol" <?= $hide ?>><div>Tiếng trung<span></span></div></td>
				<td width="200">Thao tác</td>
			</tr>
			
			<?php for($i=0, $count=count($items); $i<$count; $i++){?>
				<tr style="text-align:center">
					<td style="width:3%;" align="center"><input type="checkbox" name="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>	
					
					<td style="width:5%;" align="center"><?=$i+1 ?></td>
					<td style="width:12%;" align="center"><?=$items[$i]['keylang']?></td>	
					<td style="width:12%;" align="center"><?=$items[$i]['ten_vi']?></td>
					<td style="width:12%;" align="center"><b><?=$items[$i]['ten_en']?></b></td>
					<td style="width:12%;" align="center"><b><?=$items[$i]['ten_kr']?></b></td>
					<td <?= $hide ?> style="width:12%;" align="center" ><b><?=$items[$i]['ten_jp']?></b></td>
					<td <?= $hide ?> style="width:12%;" align="center"><b><?=$items[$i]['ten_cn']?></b></td>
					
					<td style="width:12%;">
						<a href="index.php?com=lang&act=edit&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Chỉnh sửa"><img src="./images/icons/dark/pencil.png" alt=""></a>
						<a href="index.php?com=lang&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" class="smallButton tipS"><img src="./images/icons/dark/close.png" alt=""></a>
					</td>
					
				</tr>
			<?php	}?>
		</table>
	</div>
</form> 
<div class="paging"><?=$paging?></div>



