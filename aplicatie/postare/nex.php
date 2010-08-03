<?php
if ($_POST['form'] == "Trimiteti Comentariul!") {
	$utilizator =  mysql_real_escape_string($_POST['utilizator']); 
	$sub =  mysql_real_escape_string($_POST['sub']); 
	$comentariu =  mysql_real_escape_string($_POST['comentariu']); 
	if ($_POST['problema']) include 'problema.php';
	else if ($_POST['tema']) include 'tema.php';
}
else if ($_POST['form'] == 'Trimiteti Tema!') include 'tema-noua.php';
else if ($_POST['form'] == 'Trimiteti Intrebarea!') include 'intrebare-noua.php';
else if ($_POST['form'] == 'Trimiteti Site-ul') include 'link-nou.php';
else if ($_POST['form'] == 'Trimiteti Stirea!') include 'stire-noua.php';
else if ($_POST['form'] == 'Actualizeaza Categoriile') include 'categorii.php';
else if ($_POST['form'] == 'Actualizeaza Linkurile!') include 'linkuri.php';
else if ($_POST['form'] == 'Actualizeaza Stirile!') include 'stiri.php';
else if ($_POST['form'] == 'Actualizeaza Problema !') include 'problema.edit.php';
else if ($str[1] == "elimina-tema")	include 'elimina.php';
else include 'problema-noua.php';
?>