<?php
	session_start();
	include_once '../scripts/connect.php';
	$utilizator = stripslashes(strtolower($_POST['username'])); $utilizator = mysql_real_escape_string($utilizator);
	$parola = stripslashes(	md5(strtolower($_POST['password']))); $parola = mysql_real_escape_string($parola);
	$sql = mysql_query("SELECT * FROM utilizatori WHERE utilizator='".$utilizator."' AND parola ='".$parola."'");
	if ($row = mysql_fetch_array($sql))		{
		if (!session_is_registered('username'))	{
		session_register('username');
		session_register('password');
		session_register('parola');
		session_register('id');
		session_register('nivel');
		session_register('website');
		session_register('mail');
		session_register('mesaj');
		session_register('clasa');
		session_register('liceu');
		$sql = mysql_query("SELECT * FROM utilizatori WHERE id = '" . $id . "'");	
		$nume = mysql_fetch_array($sql);
		$_SESSION['username'] = $nume[nume];
		$_SESSION['utilizator'] = $row['utilizator'];
		$_SESSION['username'] = $row['nume'];
		$_SESSION['parola'] = $row['parola'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['nivel'] = $row['nivel'];
		$_SESSION['website'] = $row['site'];
		$_SESSION['mail'] = $row['mail'];
		$_SESSION['clasa'] = $row['clasa'];
		$_SESSION['liceu'] = $row['liceu'];
	}
}		if ($str[1] == "logare")
		print "<script>parent.location.reload(true);</script>";
		else print "Te-am logat fara probleme. Din pacate, pentru ca nu ai vrut sa accepti JavaScript, nu te pot redirectiona!";
?>