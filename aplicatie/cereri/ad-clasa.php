<?php
$cerere = mysql_real_escape_string($_POST[cerere]);
$sql = mysql_query("UPDATE cereri SET stare = '1' WHERE id = '".$cerere."'");
if ($sql)	{
	$sql = mysql_query("SELECT * FROM cereri WHERE id = '".$cerere."'");
	$cerere  = mysql_fetch_array($sql);
	$sql = mysql_query("INSERT INTO clase (liceu, nume, descriere, administrator, moderatori, membrii) VALUES('".$_SESSION[liceu]."', '".$cerere[subiect]."', '".$cerere[continut]."', '".$cerere[autor]."', '".$cerere[sustinatori]."', '".$cerere[autor].", ".$cerere[sustinatori]."')");
	if ($sql)	print "<h2> Clasa a fost acceptata cu succes !</h2><h4> Te redirectionam la pagina precedenta in 3 secunde ... </h4><script>setTimeout('history.back(1)', 3000);</script>";
	else print mysql_error();
}
else print mysql_error();
?>