<?php

$str = substr($_SERVER[REDIRECT_URL], 15);
$str = str_replace("/", "", $str);
$get = mysql_real_escape_string($str); 
$sql = mysql_query("SELECT * FROM clase WHERE id = " . $get);	$clasa = mysql_fetch_array($sql);
$sql = mysql_query("SELECT * FROM utilizatori WHERE id = " . $clasa['administrator']);	$admin = mysql_fetch_array($sql);
$sql = mysql_query("SELECT * FROM licee WHERE id = " . $clasa['liceu']);	$liceu = mysql_fetch_array($sql);
$moderatori = explode(", ", $clasa['moderatori']);

print " <h1> " . $clasa['nume'] . " </h1> <hr> <h4> Cate ceva despre aceasta clasa : </h4> <h5> " . nl2br($clasa['descriere']) . " </h5>";
print "<hr><h4> Administrator : <span style='float:right'><a href='/registru/utilizator/".$admin['id']."'>".$admin['nume']."</a></span></h4>";
print "<hr><h4> Scoala de care apartine aceasta clasa : <span style='float:right'><a href='/registru/scoala/".$liceu['id']."'>".$liceu['nume']."</a></span></h4>";
print "<hr><h4> Moderatori : </h4> <ul> ";
for ($i = 0; $i <= count($moderatori) - 1; $i++)	{	
	$sql = mysql_query("SELECT * FROM utilizatori WHERE id = " . $moderatori[$i]);	$aux = mysql_fetch_array($sql);
	print " <li><a href='/registru/utilizator/".$aux['id']."'>".$aux['nume']."</a></li>";
}print "</ul><hr><h4> Membrii : </h4> <ul> ";

$sql = mysql_query("SELECT * FROM utilizatori WHERE liceu = " . $liceu[id]. " AND clasa = " . $clasa[id]);	
while ($aux = mysql_fetch_array($sql))	{
	print " <li><a href='/registru/utilizator/".$aux['id']."'>".$aux['nume']."</a></li>";
}print "</ul><hr><h4> Alte clase ce apartin liceului : </h4> <ul> ";
$sql = mysql_query("SELECT * FROM clase WHERE liceu = " . $liceu['id']);	
while ($clase = mysql_fetch_array($sql))
if ($clase['id'] != $get)
	print " <li><a href='/registru/clasa/".$clase['id']."'>".$clase['nume']."</a></li>";
print "</ul>";
print "<hr>";

?>