<?php
$total = str_replace("<", "&lt;", mysql_real_escape_string($_POST['total']));
for ($i = 1; $i <= $total; $i++)	{
	$sters = str_replace("<", "&lt;", mysql_real_escape_string($_POST['sters'.$i]));
	if ($sters)	{	$sql = mysql_query("DELETE FROM linkuri WHERE id='".$i."'");	$rezultat = mysql_fetch_row($sql);	
	}
	else {
		$nume = str_replace("<", "&lt;", mysql_real_escape_string($_POST['nume'.$i]));
		$descriere = str_replace("<", "&lt;", mysql_real_escape_string($_POST['descriere'.$i]));
		$accept = str_replace("<", "&lt;", mysql_real_escape_string($_POST['accept'.$i]));
		if ($nume) { $sql = mysql_query("UPDATE linkuri SET nume = '".$nume."', descriere = '".$descriere."', acceptata = '".$accept."' WHERE id='".$i."'");  }
	}
}
print "Actualizare terminata, te redirectionam in 3 secunde ... ";
print "<script type='text/javascript'>setTimeout('history.back()', 3000);</script>";
?>