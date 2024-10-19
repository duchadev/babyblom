<script src="js/queue/src/jQuery.ajaxQueue.js" type="text/javascript"></script>
<div class="box-header with-border">
<h3>Rss</h3>
</div>
<div class="widget">
<div>
<?php
					$ar['24h.com.vn'] = array(array("name"=>"Tin tức trong ngày","url"=>"http://www.24h.com.vn/upload/rss/tintuctrongngay.rss"),
					   array("name"=>"An ninh hình sự","url"=>"http://www.24h.com.vn/upload/rss/anninhhinhsu.rss"),
					   array("name"=>"Thời trang hitech","url"=>"http://www.24h.com.vn/upload/rss/thoitranghitech.rss"),
					   array("name"=>"Thời trang","url"=>"http://www.24h.com.vn/upload/rss/thoitrang.rss"),
					   array("name"=>"Bóng đá","url"=>"http://www.24h.com.vn/upload/rss/bongda.rss"),
					   array("name"=>"Ẩm thực","url"=>"http://www.24h.com.vn/upload/rss/amthuc.rss"),
					   array("name"=>"Làm đẹp","url"=>"http://www.24h.com.vn/upload/rss/lamdep.rss"),
					   array("name"=>"Du lịch","url"=>"http://www.24h.com.vn/upload/rss/dulich.rss"),
	
	
						);
						
	foreach($ar as $k=>$v){
		?>
		
		
		<div class="form-group">
		<label><?=$k?>:</label>
			<?php foreach($v as $k2=>$v2){
					echo '<p><a class="add-list" href="'.$v2['url'].'">'.$v2['name'].'</a></p>';
				
				}	
			?>
			
			<p></p>
		
	  </div>
	  <?php 
	}					

?>

</div>
<table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
	<thead>
		<tr>
		<td class="tb_data_small">#</td>
		<td class="tb_data_small">Hình ảnh</td>
		<td class="tb_data_small">Tên</td>
		<td class="tb_data_small">Trạng thái</td>
		</tr>
	</thead>
	<tbody>
	</tbody>
	
</table>

<button class="blueB" id="get-item">LẤY TIN</button>
<div id="contentrss">
</div>
<script>
$().ready(function(){
	
	$("#get-item").click(function(){
		$("#checkAll tr").each(function(){	
			
			var $obj = $(this);
			
		if($obj.find("a").length){
		jQuery.ajaxQueue({
			url:base_url+"/admin/index.php?com=<?=$_GET['com']?>&act=rss&method=get-item&type=<?=$_GET['type']?>",
			data:{"url":$obj.find("a").attr("href"),'image':$obj.find("img").attr("src"),"name":$obj.find("a").html()},
			type:'post',
			dataType: "json",
			beforeSend:function(){
				$obj.addClass("is-process");
				$("tr.is-process").find("td").last().addClass("orange").html("Đang xử lý");
				
			},
			
		}).done(function( data ) {
			$obj = $("tr.is-process");
			$obj.find("td").last().attr("class","");
			$obj.find("td").last().addClass(data.cls).html(data.stt);
			
			
			//console.log(data);
		});
		}
		})
		
		return false;
	})
	$(".add-list").click(function(){
		$("#checkAll tbody").empty();
		$.ajax({
			url:base_url+"/admin/index.php?com=<?=$_GET['com']?>&act=rss&method=getlist",
			type:'get',
			data:{url:$(this).attr("href")},
			success:function(data){
				$jdata = $.parseJSON(data);
				$.each($jdata,function(i,item){
					//console.log(item);
					$content = "<tr><td>"+i+"</td><td><img width=50 src='"+item.image+"' /></td><td><a href='"+item.link+"'>"+item.name+"</a></td><td>Đang chờ</td></tr>";
					
					$("#checkAll tbody").append($content);
					$("#checkAll").removeClass("hide");
				})
				return false;
			}
		})
		return false;
	})
	
	
})
</script>
<style>
.form-group label{
	margin-left:15px;
	font-size:16px;
	font-weight:bold;
	margin-top:10px;
}
	.form-group a{
		font-size:15px;
		margin-left:15px;
	}
.red{color:red}
.green{color:green}
.orange{color:orange}
</style>
</div>