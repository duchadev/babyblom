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
	if (hoi==true) document.location = "index.php?com=<?=$_GET['com']?>&act=delete&listid=" + listid;
});
});
</script>
<div class="control_frm" style="margin-top:25px;">
   <div class="bc">
      <ul id="breadcrumbs" class="breadcrumbs">
         <li><a href="location.href='index.php?com=<?=$_GET['com']?>&act=man'"><span>Hình thức thanh toán</span></a></li>
         <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
      </ul>
      <div class="clear"></div>
   </div>
</div>

<form name="f" id="f" method="post">

<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=<?=$_GET['com']?>&act=add'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />

    </div>  
</div>
<div class="widget">
<div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
 </div>
<div class="box-body">
<div class="table-responsive">
<table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">

	<thead>
		<tr>
			<td></td>
			<td width="5%" class="tb_data_small" style="width:6%;">Stt</td>
			<!--<th style="width:30%;">Danh mục</th>-->
			<td class="sortCol" style="width:40%;">Tên </td>
			<!-- <th style="width:40%;">Tên EN</th> -->
			
			
			<td class="tb_data_small">Ẩn/Hiện</td>
			<td width="200">Thao tác</td>
		</tr>
	</thead>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
        <td style="width:6%;" align="center"><?=$items[$i]['stt']?></td>
       <!--
       <td style="width:30%;" align="center">
        	<?php
			$sql_danhmuc="select ten_vi from table_news_item where id='".$items[$i]['id_item']."'";
			$result=mysql_query($sql_danhmuc);
	 		$item_danhmuc =mysql_fetch_array($result);
	 		echo @$item_danhmuc['ten_vi'];
			?>  
        </td>-->
		<td style="width:40%;" align="center"><a href="index.php?com=<?=$_GET['com']?>&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>
		<!-- <td style="width:40%;" align="center"><a href="index.php?com=<?=$_GET['com']?>&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_en']?></a></td> -->
		
		<td style="width:5%;">
		<a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['hienthi']?>" data-val3="hienthi" class="diamondToggle <?=($items[$i]['hienthi']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a>   
        </td>
        
		<td style="width:5%;">
			<a href="index.php?com=<?=$_GET['com']?>&act=edit&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa bài viết"><img src="./images/icons/dark/pencil.png" alt=""></a>
			
			 <a href="index.php?com=<?=$_GET['com']?>&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?=$items[$i]['ten_vi']?>')) return false;" title="" class="smallButton tipS" original-title="Xóa bài viết"><img src="./images/icons/dark/close.png" alt=""></a>
			 
			
		</td>
		
	</tr>
	<?php	}?>
</table>
</div>
<div class="paging"><?=$paging?></div>

</div>
</form>
</div>