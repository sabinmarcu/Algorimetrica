<?php
if($_SESSION[id])	: ?>
<?php
if ($str[2] == "")	{ ?>
<h1> Panoul de Administrare </h1>
<p>In functie de nivelul vostru ca si utilizator Algorimetrica, aveti acces la optiunile prezentate in panoul din stanga. </p>

<?php }
else if ($str[2] == "categorii")	include 'categorii.php';
else if ($str[2] == "linkuri")	include 'linkuri.php';
else if ($str[2] == "stiri")	include 'stiri.php';
else if ($str[2] == "probleme" && !$str[3])	include 'probleme.lista.php';
else if ($str[2] == "probleme" && $str[3])	include 'probleme.indiv.php';
else include 'aplicatie/misc/404.php';
?>
<?php
else : print " <div style='text-align:center'> <h6 style='font-size:35px; padding:25; color:#999999'> Nu sunteti Logat. Pentru a accesa aceasta sectiune, trebuie sa va <a href='/logare-clasica' class='log'> Logati </a> ori sa va <a href='/inregistrare-clasica/' class='reg'> Inregistrati </a> </h6> </div>"; 
endif;
?>