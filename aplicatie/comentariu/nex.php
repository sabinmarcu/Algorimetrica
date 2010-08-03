<?php
$utilizator =  mysql_real_escape_string($_POST['utilizator']); 
$sub =  mysql_real_escape_string($_POST['sub']); 
$comentariu =  mysql_real_escape_string($_POST['comentariu']); 
if ($_POST['problema']) include 'problema.php';
else include 'tema.php';
?>