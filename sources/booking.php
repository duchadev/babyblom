<?php  if(!defined('_source')) die("Error");
	
	if(isset($_POST['email_bk']))
	{
		$data_['email'] = $_POST['email_bk'];
		$data_['loaiphong'] = $_POST['loaiphong_bk'];
		$data_['ngaynhan'] = $_POST['ngaynhan_bk'];
		$data_['ngaytra'] = $_POST['ngaytra_bk'];
		$data_['songuoi'] = $_POST['songuoi_bk'];
		$data_['dienthoai'] = $_POST['dienthoai_bk'];
		
		$d->reset();
		$d->setTable("datphong");
		$email_info = '<table>';
		$email_info .= '
		<tr> 
		<th colspan="2">&nbsp;</th>
		</tr>
		
		<tr>
		<th colspan="2">Thông tin đặt phòng từ website <a href="http://'.$config_url.'">www.'.$config_url.'</a></th>
		</tr>
		
		<tr>
		<th colspan="2">&nbsp;</th>
		</tr>
		
		<tr>
		<th style="width: 100px;text-align: left;">Email :</th><td>'.$_POST['email_bk'].'</td>
		</tr>
		<tr>
		<th style="width: 100px;text-align: left;">Loại phòng :</th><td>'.$_POST['loaiphong_bk'].'</td>
		</tr>
		
		<tr>
		<th style="width: 100px;text-align: left;">Ngày nhận :</th><td>'.$_POST['ngaynhan_bk'].'</td>
		</tr>
		
		<tr>
		<th style="width: 100px;text-align: left;">Ngày trả :</th><td>'.$_POST['ngaytra_bk'].'</td>
		</tr>
		
		<tr>
		<th style="width: 100px;text-align: left;">Ngày trả :</th><td>'.$_POST['ngaytra_bk'].'</td>
		</tr>
		
		<tr>
		<th style="width: 100px;text-align: left;">Số người :</th><td>'.$_POST['songuoi_bk'].'</td>
		</tr>
		';
		$email_info .= '</table>';
		
		
		if($d->insert($data_)){
			
			sendEmail($row_setting['email'],null,$row_setting['ten_'.$lang], "Thư đặt phòng từ ".$row_setting['ten_'.$lang], $email_info);
			sendEmail($_POST['email_bk'],null,$row_setting['ten_'.$lang], "Thư đặt phòng từ ".$row_setting['ten_'.$lang], $email_info);
			
			transfer("Đặt phòng thành công ! </br> Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi ! ", $_SERVER['HTTP_REFERER']);
			}else{
			transfer("Đã có lỗi xảy ra !", $_SERVER['HTTP_REFERER']);
		}
		
	}
?>