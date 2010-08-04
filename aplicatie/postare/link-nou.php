<?php
$nume = str_replace("<", "&lt;", mysql_real_escape_string($_POST['nume']));
$adresa = str_replace("<", "&lt;", mysql_real_escape_string($_POST['adresa']));
$descriere = str_replace("<", "&lt;", mysql_real_escape_string($_POST['descriere']));
$sql = mysql_query("INSERT INTO linkuri (nume, adresa, descriere) VALUES('".$nume."', '".$adresa."', '".$descriere."')");
if ($sql)	{
	header ("Location:/linkuri/");
}
else print "Nu am reusit sa adaug link-ul, mai incearca !<br>";
?>