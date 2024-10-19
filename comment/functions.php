<?php if(!defined('_lib')) die("Error");
function showComment($root_id){
	global $d,$comment;
		$d->reset();		
		$sql = "select * from table_comment where id_cat = ".$root_id." order by id desc";
		$d->query($sql);
		$co_comment = $d->result_array();
		if(count($co_comment)==0)
		{
			echo '<div class="rel_comment" style="display:none;">';
			echo '<form action="" method="post" class="com_men_xx" name="comment_ex">
    <textarea name="noidung" style="float:left;width: 98%; margin: 7px; margin-bottom: 0;" id="noidung" placeholder="Nhập nội dung" required="required"></textarea>
    <input type="hidden" name="id_cat" id="id_cat" value="">
    <a href="javascrip:void(0);" style="margin-right:7px;margin-bottom:7px;" class="ok">Bình luận</a>
</form>';
			echo '</div>';
		}
	
	if($root_id > 0){
		echo '<form action="" method="post" class="com_men" name="comment_ex" style="display:none">
					<textarea name="noidung" style="float:left;width: 99%;" id="noidung" placeholder="Nhập nội dung" required="required"></textarea>
					<input type="hidden" name="id_cat" id="id_cat" value="'.$root_id.'">
					<a href="#thongtin_cm" style="margin-right:7px;" class="ok load_cm">Bình luận</a>
				</form>';
		$d->reset();		
		$d->query("select * from table_comment where id_cat = ".$root_id." order by id desc");
		if($d->num_rows()){ $p = 0;
			echo '<div class="rel_comment">';
			echo '<form action="" method="post" class="com_men_xx" name="comment_ex">
    <textarea name="noidung" style="float:left;width: 98%; margin: 7px; margin-bottom: 0;" id="noidung" placeholder="Nhập nội dung" required="required"></textarea>
    <input type="hidden" name="id_cat" id="id_cat" value="">
    <a href="javascrip:void(0);" style="margin-right:7px;" class="ok">Bình luận</a>
</form>';
			foreach($d->result_array() as $k=>$v){  $p++;
				
			$d->reset();
			$sql = "select * from #_comment_like where id_comment='".$v['id']."' order by stt,id desc ";
			$d->query($sql);
			$comment_like = $d->result_array();
			
			$d->reset();
			$sql = "select * from #_comment_like where id_comment='".$v['id']."' and ip_nguoilike='".getRealIPAddress()."' order by stt,id desc ";
			$d->query($sql);
			$kiem_like = $d->result_array();
			
			if($v['quantri']!=0){
				$quantrivien = "";
			} else {
				$quantrivien = '';
			}
			if($p > 2){
				$ann = 'hidden_cm';
			} else {
				$ann = '';
			}
			
			echo '<div class="nd_comment xam '.$ann.'">

					<div class="col-md-1 col-sm-1 col-xx-2 col-xs-2">
					<div class="com-user">';
        
				$str=$v['hoten'];
				echo $str[0];
			
        		echo '</div>
					</div>
					<div class="col-md-11 col-sm-11 col-xx-10 col-xs-10" style="padding:0px;">
					<p class="tencm">'.$v['hoten'].$quantrivien.'</p>
					<p class="ndcm">'.$v['noidung'].'</p>
					<p class="thich">
					<a href="javascript:void(0)" class="traloi1">Trả lời</a>
					<a href="javascript:void(0)" class="like_comment">';
					if(count($kiem_like)!=0){
					 echo ' <img src="comment/thich_icon.png" alt="'.$v['id'].'"> ';
					} else {
						 echo ' <img src="comment/thich_icon.png" alt="'.$v['id'].'" class="like_comment">  ';
					}
					
					echo 'Thích </a>';
					if(count($comment_like)>0){
					echo '<span id="load_like_'.$v['id'].'">('.count($comment_like).') </span>';
					}
					echo '<span>'.ngay_thang($comment[$i]['ngaytao']).'</span></p>';
					echo showComment($v['id']);
					echo '</div>
				</div>';
			}
			if($p>2){ echo '<div class="xemthem_rl">Xem thêm .....</div>';}
			echo '</div>';
		}
	}
	
}
function ngay_thang($oldDate){
    date_default_timezone_set('Asia/Ho_Chi_Minh'); //Change your timezone. To find your timezone here:http://php.net/manual/en/timezones.php
    $today = mktime(date('H'), date('i'), date('s'), date("m")  , date("d"), date("Y"));
    $old=$oldDate;
    $between=$today-$old;
    $result=array();
    $result['days']=$between/(60*60*24*7*30*12);
    $result['typeTime']='năm';
    
	if($result['days']<1) 
	{
		$result['days']=$between/(60*60*24*7*30);
		$result['typeTime']='tháng';
		if($result['days']<1)
		{
			$result['days']=$between/(60*60*24*7);
			$result['typeTime']='tuần';
			if($result['days']<1) 
			{
				$result['days']=$between/(60*60*24);
				$result['typeTime']='ngày';
				if($result['days']<1) 
				{
					$result['days']=$between/(60*60);
					$result['typeTime']='giờ';
					if($result['days']<1) 
					{
						$result['days']=$between/(60);
						$result['typeTime']='phút';
						if($result['days']<1) 
						{
							$result['days']=$between;
							$result['typeTime']='giây';
						}
					}
				}
			}
		}
	}
    return round($result['days']).' '.$result['typeTime'].' '.'trước';	
}
function getRemoteIPAddress(){
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    return $ip;
}
  
/* If your visitor comes from proxy server you have use another function
to get a real IP address: */

function getRealIPAddress(){  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>