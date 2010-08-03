<?php
$str = substr($_SERVER[REDIRECT_URL], 16);
$str = str_replace("/", "", $str);
$get = mysql_real_escape_string($str);
$sql = mysql_query("SELECT * FROM licee WHERE id = " . $get);	$liceu = mysql_fetch_array($sql);
$sql = mysql_query("SELECT * FROM utilizatori WHERE id = " . $liceu['administrator']);	$admin = mysql_fetch_array($sql);
$moderatori = explode(", ", $liceu['moderatori']);
$membrii = explode(", ", $liceu['membrii']);

print " <h1> " . $liceu['nume'] . " </h1> <hr> <h4> Cate ceva despre aceasta scoala : </h4> <h5> " . nl2br($liceu['descriere']) . " </h5>";
print "<hr><h4> Administrator : <span style='float:right'><a href='/registru/utilizator/".$admin['id']."'>".$admin['nume']."</a></span></h4>";
print "<hr><h4> Moderatori : </h4> <ul> ";
for ($i = 0; $i <= count($moderatori) - 1; $i++)	{	
	$sql = mysql_query("SELECT * FROM utilizatori WHERE id = " . $moderatori[$i]);	$aux = mysql_fetch_array($sql);
	print " <li><a href='/registru/utilizator/".$aux['id']."'>".$aux['nume']."</a></li>";
}print "</ul><hr><h4> Membrii : </h4> <ul> ";
$sql = mysql_query("SELECT * FROM utilizatori WHERE liceu = '".$liceu[id]."'");	
while ($aux = mysql_fetch_array($sql))	{
	print " <li><a href='/registru/utilizator/".$aux['id']."'>".$aux['nume']."</a></li>";
}print "</ul><hr><h4> Clase : </h4> <ul> ";
$sql = mysql_query("SELECT * FROM clase WHERE liceu = " . $liceu['id']);	
while ($clase = mysql_fetch_array($sql))
	print " <li><a href='/registru/clasa/".$clase['id']."'>".$clase['nume']."</a></li>";
print "</ul>";
print "<hr>";

?>