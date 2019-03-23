<?php
include('config.php');
session_start();

mysql_select_db('qhub_db');

$id=$_GET['cid'];

/*$res=mysql_query($link,"SELECT *FROM category WHERE cat_id='$id'" );
while ($row=mysql_fetch_array($res)) {
	# code...
	$
}*/
mysql_query("DELETE FROM category WHERE cat_id = '$id'");

?>

<script type="text/javascript">
	window.location="AdminHome.php";
</script>