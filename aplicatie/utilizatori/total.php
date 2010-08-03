<?php

print "<h2>Bine ati venit, acesta este registrul site-ului.</h2>";
print "<h4> Il numim registru, deoarece de aici puteti obtine orice informatie doriti despre liceele, clasele si utilizatorii inregistrati in baza noasta de date. </h4>";
print "<h3> Scolile inregistrate : </h3> <ol>";
$sql = mysql_query("SELECT * FROM licee ORDER BY nume ASC");	
while ($liceu = mysql_fetch_array($sql))
 	print " <li><a href='/registru/scoala/".$liceu['id']."'>".$liceu['nume']."</a></li>";
print "</ol>";
print "<h3> Clasele inregistrate : </h3> <ol>";
$sql = mysql_query("SELECT * FROM licee ORDER BY nume ASC");	
while ($liceu = mysql_fetch_array($sql))	{
 	print " <li><h5>".$liceu['nume']."<ul>";
 	$aux = mysql_query("SELECT * FROM clase WHERE liceu = '".$liceu['id']."' ORDER BY nume ASC");	
 	while ($clasa = mysql_fetch_array($aux))	
 	 	print " <li><a href='/registru/clasa/".$clasa['id']."'>".$clasa['nume']."</a></li>";
 	print "</h5></ul></li>";
 }
print "</ol>";
?>