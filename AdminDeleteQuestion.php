<?php
include('config.php');
session_start();

mysql_select_db('qhub_db');

$id=$_GET['qid'];

/*$res=mysql_query("SELECT *FROM question WHERE q_id='$id'" );
while ($row=mysql_fetch_array($res)) {
	# code...
	$img = $row['q_name'];
}
unlink($img);*/
mysql_query("DELETE FROM question WHERE q_id = '$id'");

?>

<script type="text/javascript">
	window.location="AdminHome.php";
</script>