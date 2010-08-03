<?php
$total = mysql_real_escape_string($_POST['total']);
for ($i = 1; $i <= $total; $i++)	{
	$sters = mysql_real_escape_string($_POST['sters'.$i]);
	if ($sters)	{	$sql = mysql_query("DELETE FROM stiri WHERE id='".$i."'");	$rezultat = mysql_fetch_row($sql);	
	}
	else {
		$titlu = mysql_real_escape_string($_POST['titlu'.$i]);
		$detalii = mysql_real_escape_string($_POST['detalii'.$i]);
		$rezumat = mysql_real_escape_string($_POST['rezumat'.$i]);
		if ($titlu) { $sql = mysql_query("UPDATE stiri SET titlu = '".$titlu."', detalii = '".$detalii."', rezumat = '".$rezumat."' WHERE id='".$i."'"); $rezultat = mysql_fetch_row($sql); }
	}
}
print "Actualizare terminata, te redirectionam in 3 secunde ... ";
print "<script type='text/javascript'>setTimeout('history.back()', 3000);</script>";
?>