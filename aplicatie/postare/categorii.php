<?php
$total = mysql_real_escape_string($_POST['total']);
$plus = mysql_real_escape_string($_POST['plus']);
for ($i = 1; $i <= $total; $i++)	{
	$sters = mysql_real_escape_string($_POST['sters'.$i]);
	if ($sters)	{	$sql = mysql_query("DELETE FROM categorii WHERE id='".$i."'");	$rezultat = mysql_fetch_row($sql);	
	}
	else {
		$nume = mysql_real_escape_string($_POST['nume'.$i]);
		if ($nume) { $sql = mysql_query("UPDATE categorii SET nume = '".$nume."' WHERE id='".$i."'"); $rezultat = mysql_fetch_row($sql); }
	}
}
for ($i = 1; $i <= $plus; $i++)	{
	$nume = mysql_real_escape_string($_POST['nume'.($i+$total)]);
	$sql = mysql_query("INSERT INTO categorii (nume) VALUES('".$nume."') ");
	$rezultat = mysql_fetch_row($sql);
}
print "Actualizare terminata, te redirectionam in 3 secunde ... ";
print "<script type='text/javascript'>setTimeout('history.back()', 3000);</script>";
?>