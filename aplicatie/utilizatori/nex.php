<?php
$str = substr($_SERVER[REDIRECT_URL], 10);
$pos = strpos($str, "/"); 
$str = substr($str, 0, $pos);
$get =  mysql_real_escape_string ($str);
if ($get == "utilizator") include 'utilizatori.php';
else if ($get == "scoala") include 'scoala.php';
else if ($get == "clasa") include 'clasa.php';
else if ($get == "") include 'total.php';
else include "aplicatie/misc/404.php";
?>