<?php if(!defined('_source')) die("Error");
		
		$d->reset();
		$sql = "select noidung_$lang,title,keywords,description from #_company where type='lienhe' ";
		$d->query($sql);
		$row_detail = $d->fetch_array();
		
		if(!empty($_POST)){
		$file_name = images_name($_FILES['file']['name']);
		if($file_att = upload_image("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', _upload_hinhanh_l,$file_name)){
			$data1['photo'] = $file_att;
			
		}

		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = _MAIL_IP; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = _MAIL_USER; // SMTP account username
		$mail->Password   = _MAIL_PWD;  

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom(_MAIL_USER,$row_setting['ten_'.$lang]);
		
		$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
		
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['tenlienhe'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
			$body = '<table>';
			$body .= '
				<tr> 
					<th colspan="2">&nbsp;</th>
				</tr>

				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="http://'.$config_url.'">www.'.$config_url.'</a></th>
				</tr>

				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>

				<tr>
					<th>Họ tên :</th><td>'.$_POST['tenlienhe'].'</td>
				</tr>

				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>

				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				
			
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';

			$data1['ten'] = $_POST['tenlienhe'];
			$data1['diachi'] = $_POST['diachi'];
			$data1['dienthoai'] = $_POST['dienthoai'];
			$data1['email'] = $_POST['email'];
			$data1['tieude'] = $_POST['tieude'];
			$data1['noidung'] = $_POST['noidung'];
			$data1['stt'] = $_POST['stt'];

			$data1['ngaytao'] = time();
			$d->setTable('contact');
			$d->insert($data1);

				
			$mail->Body = $body;

			if($data1['photo']){
				$mail->AddAttachment(_upload_hinhanh_l.$data1['photo']);
			}
		
			
			if($mail->Send())
			{	
				transfer("Thông tin liên hệ được gửi . Cảm ơn.", "trang-chu.html");
			} else {
				transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "lien-he.html",false);
			}
		}
			
	
?>