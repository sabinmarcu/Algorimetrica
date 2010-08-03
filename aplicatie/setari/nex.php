<?php
if ($_SESSION[id])	{
if ($str[2])	include 'aplicatie/misc/404.php';
else include 'pagina.php';
}
else print " <div style='text-align:center'> <h6 style='font-size:35px; padding:25; color:#999999'> Nu sunteti Logat. Pentru a accesa aceasta sectiune, trebuie sa va <a href='/logare-clasica' class='log'> Logati </a> ori sa va <a href='/inregistrare-clasica/' class='reg'> Inregistrati </a> </h6> </div>";
?>