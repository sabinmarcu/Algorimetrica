<?php 
session_start();
$str = $_SERVER[REDIRECT_URL];
$str = explode("/", $str);
include_once 'misc/connect.php';
if ($_SESSION['nivel'] > 2)	$admin2 = 1;
if ($_SESSION['nivel'] > 1)	$admin1 = 1;

if ($str[1] == "rss")	{
include 'misc/rss.php';
include 'rss/nex.php';
}
else if ($str[1] == "1000" || $str[1] == "85" || $str[1] == "normal" || $str[1] == "600" || $str[1] == "culoare" || $str[1] == "setari-pagina")	
include 'pagina/nex.php';
else if ($str[1] == "logare")
include 'logare/nex.php';
else if ($str[1] == "inregistrare")	
include 'inregistrare/nex.php';
else if ($str[1] == "mail")	
include 'mail/nex.php';
else if ($str[1] == "admin" || $str[1] == "modifica-categoriile" || $str[1] == "modifica-linkurile" || $str[1] == "modifica-stirile" || $str[1] == "modifica-problema")	{	
include_once 'misc/titlu.php';
include 'sablon/header-admin.php';
if ($str[1] == "admin")
include 'admin/nex.php';
else include 'postare/nex.php';
include 'sablon/footer-admin.php';
}
else 	{
include_once 'misc/functii.php';
include_once 'misc/titlu.php';
include 'sablon/header.php';
if ($str[1] == "arhiva")	include 'probleme/nex.php';
else if ($str[1] == "registru")	include 'utilizatori/nex.php';
else if ($str[1] == "clasa")	include 'colectiv/nex.php';
else if ($str[1] == "setari")	include 'setari/nex.php';
else if ($str[1] == "comentariu")	include 'postare/nex.php';
else if ($str[1] == "problema-noua")	include 'postare/nex.php';
else if ($str[1] == "tema-noua")	include 'postare/nex.php';
else if ($str[1] == "intrebare-noua")	include 'postare/nex.php';
else if ($str[1] == "elimina-tema")	include 'postare/nex.php';
else if ($str[1] == "link-nou")	include 'postare/nex.php';
else if ($str[1] == "linkuri")	include 'linkuri/nex.php';
else if ($str[1] == "descarcari")	include 'linkuri/nex.php';
else if ($str[1] == "stiri")	include 'stiri/nex.php';
else if ($str[1] == "cerere")	include 'cereri/nex.php';
else if ($str[1] == "logare-clasica")	include 'logare/nex.php';
else if ($str[1] == "inregistrare-clasica")	include 'inregistrare/nex.php';
else if ($str[1] == "") include 'home.htm';
else include "aplicatie/misc/404.php";
include 'sablon/footer.php';
}
?>
