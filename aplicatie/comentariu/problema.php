<?php
$problema = mysql_real_escape_string($_POST['problema']);
$sql = mysql_query("INSERT INTO comentarii (problema, comentariu, autor, data, sub) VALUES(".$problema.", '".$comentariu."', '".$utilizator."', now(), '".$sub."')");
if ($sql)	{
	$subsql = mysql_query("SELECT id FROM comentarii ORDER BY id DESC LIMIT 1"); $com = mysql_fetch_array($subsql);
	header("Location:../arhiva/problema/".$_POST['problema']);
}
else print "Nu am reusit sa postez comentariul, mai incearca !<br>";print_r($_POST);
?>