<?php
$ok = 1;
$utilizator = mysql_real_escape_string($_POST['username']);
if (!$utilizator)	{
 	header( "refresh:3;url=/inregistrare/" );
	print "<H2 style='color:#C53'>Houston, we have a problem!</H2>";
	print "<h5 style='color:#930'>S-ar parea ca nu ai introdus un nume de utilizator. Asta-i un lucru rau. Mai incearca odata in 3 secunde.</h5>";
	break; $ok = 0;
}
$sql = mysql_query("SELECT * FROM utilizatori WHERE utilizator = '".$utilizator."'");
if (mysql_num_rows($sql) != 0)	{
 	header( "refresh:3;url=/inregistrare/" );
	print "<H2 style='color:#C53'>Houston, we have a problem!</H2>";
	print "<h5 style='color:#930'>S-ar parea ca numele de utilizator pe care l-ai introdus este luat deja. Asta-i un lucru rau. Mai incearca odata in 3 secunde.</h5>";
	break; $ok = 0;
}
$parola = mysql_real_escape_string($_POST['parola']);
$parolare = mysql_real_escape_string($_POST['re-parola']);
if (!$parola || !$parolare)	{
 	header( "refresh:3;url=/inregistrare/" );
	print "<H2 style='color:#C53'>Houston, we have a problem!</H2>";
	print "<h5 style='color:#930'>S-ar parea ca nu ai introdus parola, sau verificarea. Asta-i un lucru rau. Mai incearca odata in 3 secunde.</h5>";
}
if ($parola != $parolare)	{
 	header( "refresh:3;url=/inregistrare/" );
		print "<H2 style='color:#C53'>Houston, we have a problem!</H2>";
		print "<h5 style='color:#930'>S-ar parea ca parolele pe care le-ai introdus nu corespund. Asta-i un lucru rau. Mai incearca odata in 3 secunde.</h5>";
		break; $ok = 0;
}
$nume =  mysql_real_escape_string($_POST['nume']); 
if (!nume)	{
 	header( "refresh:3;url=/inregistrare/" );
	print "<H2 style='color:#C53'>Houston, we have a problem!</H2>";
	print "<h5 style='color:#930'>S-ar parea ca nu ai introdus numele tau real. Asta-i un lucru rau. Mai incearca odata in 3 secunde.</h5>";
	break; $ok = 0;
}
$mail =  mysql_real_escape_string($_POST['mail']);  
if (!mail)	{
 	header( "refresh:3;url=/inregistrare/" );
	print "<H2 style='color:#C53'>Houston, we have a problem!</H2>";
	print "<h5 style='color:#930'>S-ar parea ca nu ai introdus adresa de e-mail. Asta-i un lucru rau. Mai incearca odata in 3 secunde.</h5>";
	break; $ok = 0;
}
$descriere =  mysql_real_escape_string($_POST['descriere']);
$website =  mysql_real_escape_string($_POST['website']);
$liceu =  mysql_real_escape_string($_POST['licee']); 
$clasa =  mysql_real_escape_string($_POST['clasa'.$liceu]); 
$sql = mysql_query("INSERT INTO utilizatori (utilizator, parola, nume, descriere, site, mail, clasa, liceu) VALUES('".$utilizator."', '".md5($parola)."', '".$nume."', '".$descriere."', '".$website."', '".$mail."', '".$clasa."', '".$liceu."')");
if ($sql && $ok)	{
		session_destroy();
		session_start();
		session_register('username');
		session_register('password');
		session_register('parola');
		session_register('id');
		session_register('nivel');
		session_register('website');
		session_register('mail');
		session_register('liceu');
		session_register('clasa');
		$sql = mysql_query("SELECT * FROM utilizatori WHERE utilizator = '" . $utilizator . "'");	
		$nume = mysql_fetch_array($sql);
		$_SESSION['username'] = $nume[nume];
		$_SESSION['utilizator'] = $nume['utilizator'];
		$_SESSION['parola'] = $nume['parola'];
		$_SESSION['id'] = $nume['id'];
		$_SESSION['nivel'] = $nume['nivel'];
		$_SESSION['website'] = $nume['site'];
		$_SESSION['mail'] = $nume['mail'];
		$_SESSION['mesaj'] = "succes"; 
		$_SESSION['liceu'] = $nume['liceu'];
		$_SESSION['clasa'] = $nume['clasa'];
		print "<script>parent.location.reload(true);</script>";
	}
	else	print mysql_error();
?>