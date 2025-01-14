<!-- Modal -->
<div class="modal reg_modal  fade" id="regestration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
   <div class="modal-dialog" id="reg_outer_div"  >
      <div class="modal-content" style="background: white;">
         <div class="modal-header" id ="" style="">
            <button type="button" class="close reg" id ="reg_close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><?=($type=="register") ? _dangkythanhvien : _dangnhap ?></h4>
         </div>
         <!--/header-->
         <div class="modal-body" style="background: white;">
            <div class="row" style="height:;background:white;">
               <?php
                  $at1 = "active";
                  $at2 = "";
                  if($type=="login"){
                  	$at2 = $at1;
                  	$at1 = "";
                  }
                  
                  ?>
               <div class="col-lg-12">
                  <div id ="reg_body_inner_left" style="">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="<?=$at2?>"><a href="#pane_login" data-toggle="tab" data-title="<?= _dangnhap ?>"><?= _dangnhap ?></a></li>
                           <li class="<?=$at1?>"><a href="#pane_reg" data-toggle="tab" data-title="<?= _dangkythanhvien ?>"><?= _dangky ?></a></li> 
                        </ul>
                        <div class="tab-content">
                           <div id="pane_login" class="tab-pane <?=$at2?>">
                              <form class="form-horizontal" id="form-login" role="form">
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                       <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" required="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label"><?= _matkhau ?></label>
                                    <div class="col-sm-9">
                                       <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="<?= _matkhau ?>" required="">
                                    </div>
                                 </div>
                                 <!--
                                    <div class="form-group">
                                    	<label for="inputEmail3" class="col-sm-3 control-label">Mã bảo vệ</label>
                                    	<div class="col-sm-6">
                                    		<input type="text" style="width:100px" class="form-control pull-left captcha-input" name="captcha" id="inputEmail3" placeholder="" autocomplete="off" required="">
                                    		<img src="captcha/captcha.php" width="100px"/><a onclick="$(this).prev().attr('src','captcha/captcha.php?c=<?=time()?>');return false" href=""><img src="assets/img/refresh.png" style="width: 20px;margin-left: 5px;" /></a>
                                    	</div>
                                    </div>
                                     <div class="form-group">
                                    	<div class="col-sm-offset-3 col-sm-9">
                                    		<div class="checkbox">
                                    			<label class="">
                                    				<input type="checkbox" class="">Nhớ đăng nhập</label>
                                    		</div>
                                    	</div>
                                    </div>-->
                                 <input type="hidden" name="action" />
                                 <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                       <button type="submit" class="btn btn-success btn-sm btn-blue"><?= _dangnhap1 ?></button>
                                       <button type="reset" class="btn btn-default btn-sm btn-reset"><?= _nhaplai ?></button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <!--/pane_login-->
                           <div id="pane_reg" class="tab-pane <?=$at1?>">
                              <form class="form-horizontal" id="form-register" role="form">
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label"><?= _tenban ?></label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control fullname-input" name="reg[fullname]" id="inputEmail3" placeholder="<?= _tenban ?>" required="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                       <input type="email" class="form-control email-input" name="reg[email]" id="inputEmail3" placeholder="Email" required="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label"><?= _matkhau ?></label>
                                    <div class="col-sm-9">
                                       <input type="password" class="form-control password-input" name="reg[password]" id="inputEmail3" placeholder="<?= _matkhau ?>" required="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label"><?= _nhaplaimatkhau ?></label>
                                    <div class="col-sm-9">
                                       <input type="password" class="form-control re-password-input" name="re-password" id="inputEmail3" placeholder="<?= _nhaplaimatkhau ?>" required="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label"><?= _ngaysinh ?></label>
                                    <div class="col-sm-3">
                                       <select name="date" class="form-control" required>
                                          <option value=""><?= _ngay ?></option>
                                          <?php for($i=1;$i<=31;$i++){
                                             echo  '<option value="'.$i.'">'.$i.'</option>';
                                             }?>
                                       </select>
                                    </div>
                                    <div class="col-sm-3">
                                       <select name="month" class="form-control" required>
                                          <option value=""><?= _thang ?></option>
                                          <?php for($i=1;$i<13;$i++){
                                             echo  '<option value="'.$i.'">'.$i.'</option>';
                                             }?>
                                       </select>
                                    </div>
                                    <div class="col-sm-3">
                                       <select name="year" class="form-control" required>
                                          <option value=""><?= _nam ?></option>
                                          <?php for($i=date("Y")-18;$i > (date("Y")-70);$i--){
                                             echo  '<option value="'.$i.'">'.$i.'</option>';
                                             }?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label"><?= _gioitinh ?></label>
                                    <div class="col-sm-9">
                                       <label class="radio-inline">
                                       <input type="radio" name="reg[gender]" id="inlineRadio1" checked value="0"> <?= _nam1 ?>
                                       </label>
                                       <label class="radio-inline">
                                       <input type="radio" name="reg[gender]" id="inlineRadio2" value="1"> <?= _nu ?>
                                       </label>
                                    </div>
                                 </div>
                                 <?php /* <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Loại thành viên</label>
                                    <div class="col-sm-4">
                                       <select name="reg[type]" class="form-control" required>
                                          <option value="">Chọn</option>
                                          <option value="1">Thành viên thường</option>
                                          <option value="2">Đại lý</option>
                                       </select>
                                    </div>
                                 </div> */ ?>
                                 <?php /* <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Mã bảo vệ</label>
                                    <div class="col-sm-6">
                                       <input type="text" style="width:100px" class="form-control pull-left captcha-input" name="captcha" id="inputEmail3" placeholder="" autocomplete="off" required="">
                                       <img src="captcha/captcha.php" width="100px"/><a onclick="$(this).prev().attr('src','captcha/captcha.php?c=<?=time()?>');return false" href=""><img src="assets/img/refresh.png" style="width: 20px;margin-left: 5px;" /></a>
                                    </div>
                                 </div> */ ?>
								  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label"><?= _c_address ?></label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control re-address-input" name="reg[address]" id="inputEmail3" placeholder="<?= _c_address ?>" required="">
                                    </div>
                                 </div>
								  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label"><?= _c_phone ?></label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control re-phone2-input" name="reg[phone2]" id="inputEmail3" placeholder="<?= _c_phone ?>" required="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                       <div class="checkbox">
                                          <label class="">
                                          <input required type="checkbox" class=""><?= _dongy ?></label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                       <button type="submit" class="btn btn-success btn-sm btn-blue"><?= _dangky ?></button>
                                       <button type="reset" class="btn btn-default btn-sm btn-reset"><?= _nhaplai ?></button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <!-- /.tab-content -->
                     </div>
                     <!-- /.tabbable -->
                  </div>
                  <!--/reg_body_inner_left-->
               </div>
               <!--col-lg-8-->
            </div>
            <!--row-->
         </div>
      </div>
      <!-- /end modal body-->
   </div>
   <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
   .tab-content{border:1px solid #ccc;padding:7px;background:rgba(241, 241, 241, 0.27);}
   #regestration input,#regestration button,#regestration select{border-radius:0}
   #regestration label{font-weight:normal}
   #regestration #pane_login, #regestration  #pane_reg{margin-top:10px;}
   #regestration .btn-blue:hover{background: #0065af;
   color: #fff;}
   #regestration .btn-blue{background: #0072c6;border-radius:0;text-transform:uppercase;
   color: #fff;border:1px solid #ccc}
   .tabbable li a{color:#111;background:none !important;border-radius:none;border:none !important}
   .tabbable .nav-tabs>li>a:hover{color:#111}
   .tabbable .nav-tabs{border:none}
   .tabbable li.active{border-bottom:1px solid rgba(241, 241, 241, 0.27);background: rgb(250, 250, 250) !important;color:#111;}
   .nav-tabs>li>a{border-radius:0;margin-right:0}
   .tabbable li.active a{
   background: none !important;
   color: #111;
   background: rgba(241, 241, 241, 0.27); !important;}
   .tabbable li{
   border-bottom:1px solid transparent;
   position:relative;
   bottom:-1px;
   border-left:2px solid transparent;
   position: relative;
   border-radius:0 !important;
   display: block;
   background: none !important;
   color:#FFF;
   border:1px solid #ccc;
   border-bottom:none;
   border-radius: 0;
   margin: 3px;
   margin-bottom:0;
   margin-left:10px;
   }
   #reg_modal_header{ background:green;border-top-left-radius:6px;border-top-right-radius:6px;border-radius:0px;}
   #reg_close{ opacity:0.5;}
   #reg_close:hover{opacity:1;}
   .rw{height: 32px;line-height: 32px;margin: 10px 0;text-align: left;}
   .size1of4 {width: 25%;float: left;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;}
   .rt{overflow: hidden;}
   .rw .rt input {font-size: 13px;padding: 0 0;valign:text-top; height:90%;width:90%;}
   .lbl{border: 0;font-size: 100%;font: inherit;vertical-align: bottom;padding-top:3px;margin-top:2px;}
   #login_email_id,#login_password,#reg_mob_no{border: 1px solid #ccc;resize: none;font-family: inherit;text-align:center;background:white;}
   .fk-input{border: 1px solid #ccc;resize: none;font-family: inherit;text-align:center;background:white;font-size: 13px;}
   div #OR{ height: 50px; width: 50px; border: 1px solid #ddd; border-radius: 50%; font-weight: bold; line-height: 50px; /* Equals elements height */
   text-align: center;font-size:20px;float:right;position: absolute;right: -25px;top:75px;z-index:1;background:white;
   }
   .reg_modal{border-radius:0px;border-bottom:4px solid green;}
   #reg_name{width:150px;margin-left:-50px;height:30px;}
</style>
<script>
   $().ready(function(){
   	$(".nav-tabs a").click(function(){
   				$("#myModalLabel").html($(this).data("title"));
   			
   			})
   
   $("#form-login").submit(function(){
   	initAjax({url:base_url+"/thanh-vien/dang-nhap.html",data:$("#form-login").serialize(),dataType:'json',success:function(data){
   		if(data.error.stt){
   			if(data.error.input){
   				$.each(data.error.data,function(i,content){
   					intializePopover({ele:$("."+i+"-input"),content:content});
   				})
   			}else{
   				if(data.error.msg){
   					showMsg('error',data.error.msg,false);
   				}
   			}
   		}else{
   			
   			showMsg('success',data.success,true);
			setTimeout(function(){location.reload();},1000);
   		}
   		return false;
   		}
   	})
   	return false;
   })
   $("#form-register").submit(function(){
   	initAjax({url:base_url+"/thanh-vien/dang-ky.html",data:$("#form-register").serialize(),dataType:'json',success:function(data){
   	if(data.error.stt){
   		$.each(data.error.data,function(i,content){
   			intializePopover({ele:$("."+i+"-input"),content:content});
   		})
   	}else{
   		alert("Đăng ký thành công...!");
		location.reload();
   	}
   	return false;
   	}
   	
   	
   	
   	});
   	return false;
   
   })
    })
    
</script>
