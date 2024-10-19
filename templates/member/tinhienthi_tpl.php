<link href="assets/css/member/style.css" type="text/css" rel="stylesheet">
<div class="main-member-place">
	<div class="title"><h2>TIN ĐANG HIỂN THỊ</h2></div>
	<div class="content">
		<?php
		
		$posts  = displayPost(1);
		
		if(count($posts) > 0){
			echo '<table class="table table-bordered" >';
			echo '<thead><th>STT</th><th>Tiêu đề tin</th><th>Lượt xem</th><th>Ngày đăng</th><th>Công cụ</th></thead>';
			foreach($posts as $k=>$v){
				echo '<tr>';
				echo '<td>'.($k+1).'</td><td><a href="thanh-vien/chinh-sua/'.$v['tenkhongdau'].'-'.$v['id'].'.html">'.$v['ten_'.$lang].'</a></td><td>'.$v['luotxem'].'</td>';
				?>
				
				<td style="font-weight:bold">
				
				<?php
			
				$time = date("d-m-Y",$v['ngaytao']);
				$now = date("d-m-Y",time());
				/* if($now > $time){
					echo '<span style="color:red">';
					
				}else{
					echo '<span style="color:green">';
				} */
				echo '<span style="color:green">';
				echo $time;
				echo '</span>';
				
				
						

				?>		
				</td>
				
				<?php
				
				echo '<td style="text-align:center"><a href="thanh-vien/chinh-sua/'.$v['tenkhongdau'].'-'.$v['id'].'.html"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteTin('.$v['id'].');return false"><i class=" red glyphicon glyphicon-remove"></i></a></td>';
				echo '</tr>';
			
			}
			
			
			echo '</table>';
		}
		?>
	</div>
</div>	

<script>
function pickTop($id){
	$.post("ajax/up-tin.html",{id:$id},function(data){
		console.log(data);
				arr = jQuery.parseJSON(data);
				
				 if(arr.error.stt==0){
					alert('Bạn không được làm mới tin, 24h sau mới được làm mới tin tiếp theo...!');
					window.location.href="<?= $config_url ?>";
					
				}else{
					alert("Up tin thành công!");
					location.reload();
				}
	})
	return false;
}
function deleteTin($id){
	
	$.post("ajax/delete-tin.html",{id:$id},function(){
		location.href="thanh-vien/tin-dang-hien-thi.html"
	})
	return false;
}
</script>