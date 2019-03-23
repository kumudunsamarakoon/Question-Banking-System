<?php
include('config.php');
session_start();

mysql_select_db('qhub_db');

$id=$_GET['pid'];

/*$res=mysql_query($link,"SELECT *FROM question WHERE cat_id='$id'" );
while ($row=mysql_fetch_array($res)) {
	# code...
	$img = $row['']
}*/
mysql_query("DELETE FROM paper WHERE ppr_id = '$id'");

?>

<script type="text/javascript">
	window.location="AdminHome.php";
</script>