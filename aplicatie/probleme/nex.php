<?php 
if ($str[2] == "problema")	include 'problema.php';
else if ($str[2] == "categorie")	include 'sortare.php';
else if ($str[1] == "arhiva") include 'lista.php';
else include "aplicatie/misc/404.php";
?>