<nav class=" visible-lg visible-md">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <ul id="main-nav" class="pull-left ">
                        <li class="<?php if ($template == 'index') {
							echo 'active';
						} ?>"><a href="" title="<?= _home ?>">
                                <?= _home ?>
                            </a></li>

                        <li class=" <?php if ($com == 'gioi-thieu') {
							echo 'active';
						} ?>"><a href="gioi-thieu.html" title="bambinispa">babyblom</a></li>

                        <li <?php if ($com == 'dich-vu') {
							echo 'class="active"';
						} ?>><a href="dich-vu.html" title="<?= _dichvu ?>">
                                <?= _dichvu ?>
                            </a>
                            <?php
							$d->query("select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi = 1 and type='dichvu' order by stt asc,id desc");
							if ($d->num_rows()) {
								echo '<ul>';
								foreach ($d->result_array() as $k => $v) {
									echo '<li class="f"><a href="dich-vu/' . $v['tenkhongdau'] . '" title="' . $v['ten_' . $lang] . '">' . $v['ten_' . $lang] . '</a><div class="clearfix"></div>';
									/* $d->query("select id,ten_$lang,tenkhongdau from #_baiviet_cat where type='dichvu' and hienthi = 1 and id_list ='".$v['id']."' order by stt desc");
																																																																																																							  if($d->num_rows()){
																																																																																																								  echo '<ul>';
																																																																																																								  foreach($d->result_array() as $k2=>$v2){
																																																																																																									  echo '<li class="t"><a href="dich-vu/'.$v['tenkhongdau'].'/'.$v2['tenkhongdau'].'" title="'.$v2['ten_'.$lang].'">'.$v2['ten_'.$lang].'</a><div class="clearfix"></div></li>';
																																																																																																								  }
																																																																																																								  echo '</ul>';
																																																																																																							  } */
									echo '</li>';
								}
								echo '</ul>';
							}
							?>
                        </li>
                        <li <?php if ($com == 'dao-tao') {
							echo 'class="active"';
						} ?>><a href="dao-tao.html" title="Đào tạo">Đào tạo</a>
                            <?php
							$d->query("select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi = 1 and type='daotao' order by stt desc");
							if ($d->num_rows()) {
								echo '<ul>';
								foreach ($d->result_array() as $k => $v) {
									echo '<li class="f"><a href="dao-tao/' . $v['tenkhongdau'] . '" title="' . $v['ten_' . $lang] . '">' . $v['ten_' . $lang] . '</a><div class="clearfix"></div>';
									$d->query("select id,ten_$lang,tenkhongdau from #_baiviet_cat where type='daotao' and hienthi = 1 and id_list ='" . $v['id'] . "' order by stt desc");
									if ($d->num_rows()) {
										echo '<ul>';
										foreach ($d->result_array() as $k2 => $v2) {
											echo '<li class="t"><a href="dao-tao/' . $v['tenkhongdau'] . '/' . $v2['tenkhongdau'] . '" title="' . $v2['ten_' . $lang] . '">' . $v2['ten_' . $lang] . '</a><div class="clearfix"></div></li>';
										}
										echo '</ul>';
									}
									echo '</li>';
								}
								echo '</ul>';
							}
							?>
                        </li>

                        <li <?php if ($com == 'san-pham') {
							echo 'class="active"';
						} ?>><a href="san-pham.html" title="<?= _product ?>">
                                <?= _product ?>
                            </a>
                            <?php
							$d->query("select id,ten_$lang,tenkhongdau from #_product_list where hienthi = 1 and type='product' order by stt desc");
							if ($d->num_rows()) {
								echo '<ul>';
								foreach ($d->result_array() as $k => $v) {
									echo '<li class="f"><a href="san-pham/' . $v['tenkhongdau'] . '" title="' . $v['ten_' . $lang] . '">' . $v['ten_' . $lang] . '</a><div class="clearfix"></div>';
									$d->query("select id,ten_$lang,tenkhongdau from #_product_cat where  hienthi = 1 and id_list ='" . $v['id'] . "' and type='product' order by stt desc");
									if ($d->num_rows()) {
										echo '<ul>';
										foreach ($d->result_array() as $k2 => $v2) {
											echo '<li class="t"><a href="san-pham/' . $v['tenkhongdau'] . '/' . $v2['tenkhongdau'] . '" title="' . $v2['ten_' . $lang] . '">' . $v2['ten_' . $lang] . '</a><div class="clearfix"></div>';

											echo '</li>';
										}
										echo '</ul>';
									}
									echo '</li>';
								}
								echo '</ul>';
							}
							?>
                        </li>


                        <li <?php if ($com == 'kien-thuc-spa') {
							echo 'class="active"';
						} ?>><a href="kien-thuc-spa.html" title="Kiến thức spa">Kiến thức spa</a></li>

                        <li <?php if ($com == 'tin-tuc') {
							echo 'class="active"';
						} ?>><a href="tin-tuc.html" title="Tin tức & sự kiện">Tin tức & sự kiện</a> </li>

                        <li <?php if ($com == 'tuyen-dung') {
							echo 'class="active"';
						} ?>><a href="tuyen-dung.html" title="Tuyển dụng">Tuyển dụng</a></li>


                        <li class=" <?php if ($com == 'lien-he') {
							echo 'active';
						} ?>"><a href="lien-he.html" title="<?= _contact ?>">
                                <?= _contact ?>
                            </a></li>
                        <li class=" <?php if ($com == 'dang-nhap') {
							echo 'active';
						} ?>">
                            <a href="http://localhost/babyblom/login.php" class="btn ">Đăng nhập</a>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div><!-- end riw -->
        </div>
    </div>
</nav>
<div class="clearfix"></div>


<div class="visible-xs visible-sm">
    <?php include _template . "layout/responsive-menu.php" ?>
</div>