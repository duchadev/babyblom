<?php
$cautruyvan = strtolower(json_encode($_REQUEST));
$tukhoa = array(
	'union',
	'chr(',
	'chr=',
	'chr%20',
	'%20chr',
	'wget%20',
	'%20wget',
	'wget(',
	'cmd=',
	'%20cmd',
	'cmd%20',
	'rush=',
	'%20rush',
	'rush%20',
	'union%20',
	'%20union',
	'union(',
	'union=',
	'echr(',
	'%20echr',
	'echr%20',
	'echr=',
	'esystem(',
	'esystem%20',
	'cp%20',
	'%20cp',
	'cp(',
	'mdir%20',
	'%20mdir',
	'mdir(',
	'mcd%20',
	'mrd%20',
	'rm%20',
	'%20mcd',
	'%20mrd',
	'%20rm',
	'mcd(',
	'mrd(',
	'rm(',
	'mcd=',
	'mrd=',
	'mv%20',
	'rmdir%20',
	'mv(',
	'rmdir(',
	'chmod(',
	'chmod%20',
	'%20chmod',
	'chmod(',
	'chmod=',
	'chown%20',
	'chgrp%20',
	'chown(',
	'chgrp(',
	'locate%20',
	'grep%20',
	'locate(',
	'grep(',
	'diff%20',
	'kill%20',
	'kill(',
	'killall',
	'passwd%20',
	'%20passwd',
	'passwd(',
	'telnet%20',
	'vi(',
	'vi%20',
	'insert%20into',
	'select%20',
	'nigga(',
	'%20nigga',
	'nigga%20',
	'fopen',
	'fwrite',
	'%20like',
	'like%20',
	'$_request',
	'$_get',
	'$request',
	'$get',
	'.system',
	'&aim',
	'%20getenv',
	'getenv%20',
	'new_password',
	'&icq',
	'/etc/password',
	'/etc/shadow',
	'/etc/groups',
	'/etc/gshadow',
	'/bin/ps',
	'wget%20',
	'uname\x20-a',
	'/usr/bin/id',
	'/bin/echo',
	'/bin/kill',
	'/bin/',
	'/chgrp',
	'/chown',
	'/usr/bin',
	'g\+\+',
	'bin/python',
	'bin/tclsh',
	'bin/nasm',
	'perl%20',
	'traceroute%20',
	'ping%20',
	'.pl',
	'/usr/X11R6/bin/xterm',
	'lsof%20',
	'/bin/mail',
	'.conf',
	'motd%20',
	'_config.php',
	'cgi-',
	'.eml',
	'file\://',
	'window.open',
	'javascript\://',
	'img src',
	'img%20src',
	'.jsp',
	'ftp.exe',
	'xp_enumdsn',
	'xp_availablemedia',
	'xp_filelist',
	'xp_cmdshell',
	'nc.exe',
	'.htpasswd',
	'servlet',
	'/etc/passwd',
	'[Only registered and activated users can see links]',
	'~root',
	'~ftp',
	'.js',
	'.jsp',
	'.history',
	'bash_history',
	'.bash_history',
	'~nobody',
	'server-info',
	'server-status',
	'reboot%20',
	'halt%20',
	'powerdown%20',
	'/home/ftp',
	'/home/www',
	'secure_site, ok',
	'chunked',
	'org.apache',
	'/servlet/con',
	'/robot.txt',
	'/perl',
	'mod_gzip_status',
	'db_mysql.inc',
	'.inc',
	'select%20from',
	'select from',
	'drop%20',
	'.system',
	'getenv',
	'_php',
	'php_',
	'phpinfo()',
	'<?php',
	'?>',
'sql='
);
$kiemtra = str_replace($tukhoa, '*', $cautruyvan);
if ($cautruyvan != $kiemtra) {
header("HTTP/1.0 404 Not Found");
die("404 Not found");
}
?>
<?php
/**
 * CR7 Framework
 * Vertion 1.0
 * Author CR7 Co.,Ltd. (cr7@cr7.vn)
 * Copyright (C) 2018 CR7 Co.,Ltd. All rights reserved
 */

if (!defined('_lib'))
	die("Error");
/* function nettuts_error_handler($number, $message, $file, $line, $vars)
	   {
	   if ( ($number !== E_NOTICE) && ($number < 2048) ) {
	   include 'templates/error_tpl.php';
	   die();
	   }
   } */
//set_error_handler('nettuts_error_handler');
error_reporting(0);

date_default_timezone_set('Asia/Ho_Chi_Minh');

$config_url = $_SERVER["SERVER_NAME"] . '/babyblom';
$config['debug'] = 1;    #Bật chế độ debug dành cho developer
/* lang config */
$config['AllLang'] = array('vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh', 'cn' => 'Tiếng Trung Quốc');
$config['AllLang_fix'] = $config['AllLang'];
$config['lang'] = array('vi');
@define('_MAIL_USER', "info@bambinispa.com");
@define('_MAIL_PWD', "TonMXbbQtu");
@define('_MAIL_IP', "210.2.87.28");

$config['salt1'] = '$nina@';
$config['salt2'] = '@bbb-6-1-2019';
$config['database']['servername'] = 'ofcmikjy9x4lroa2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$config['database']['username'] = 'ivzvkv5adg6p8u3f';
$config['database']['password'] = 'ovz04joz6gh18046';
$config['database']['database'] = 'a644myw856asrhlc';
$config['database']['refix'] = 'table_';

?>