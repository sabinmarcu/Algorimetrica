<?php
$tema = mysql_real_escape_string($_POST['tema']);
$sql = mysql_query("INSERT INTO comentarii (intrebare, comentariu, autor, data, sub) VALUES(".$intrebare.", '".$comentariu."', '".$utilizator."', now(), '".$sub."')");
if ($sql)	{
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location:$referer");
}
else print "Nu am reusit sa postez comentariul, mai incearca !<br>";
?>