<?php

$user = 'root';
$pass = '';
$db = 'qhub_db';

$link = mysql_connect('localhost',$user,$pass) or die('Site is down for upgrade, Please try in few minutes');
mysql_select_db($db) or die('Site is down for updrade, please try in few minutes');

?>

