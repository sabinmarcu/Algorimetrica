<?php
$intrebare = str_replace("<", "&lt;", mysql_real_escape_string($_POST['intrebare']));
$rezumat = str_replace("<", "&lt;", mysql_real_escape_string($_POST['rezumat']));
$autor = str_replace("<", "&lt;", mysql_real_escape_string($_POST['utilizator']));
$tema = str_replace("<", "&lt;", mysql_real_escape_string($_POST['tema']));
$prescurtare = str_replace("<", "&lt;", mysql_real_escape_string($_POST['prescurtare']));
$subsql = mysql_query("SELECT numar FROM intrebari WHERE tema = ".$tema." ORDER BY numar DESC LIMIT 1"); $id = mysql_fetch_array($subsql);
$sql = mysql_query("INSERT INTO intrebari (intrebare, rezumat, tema, data, autor, numar) VALUES('".$intrebare."', '".$rezumat."', '".$tema."', now(), '".$autor."', '".($id['numar'] + 1)."')");
if ($sql)	{
	header ("Location:/clasa/".$prescurtare."/intrebare/".($id['numar']+1));
}
else print "Nu am reusit sa postez intrebarea, mai incearca !<br>";
?>