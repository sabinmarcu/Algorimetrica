<?php
$titlu = str_replace("<", "&lt;", mysql_real_escape_string($_POST['titlu']));
$enunt = str_replace("<", "&lt;", mysql_real_escape_string($_POST['enunt']));
$nr = str_replace("<", "&lt;", mysql_real_escape_string($_POST['exemple']));
for ($i = 1; $i <= $nr - 1; $i++)	{
	$aux = stripslashes($_POST["exemplu-$i"]); $aux = mysql_real_escape_string($aux);
	if ($aux)
	$exemple = $exemple . $aux . " //-- "; 
	$aux = stripslashes($_POST["rezultat-$i"]); $aux = mysql_real_escape_string($aux);
	if ($aux)
	$rezultate = $rezultate . $aux . " //-- "; 
}
$rezolvarec = stripslashes($_POST['rezolvare-c']); $rezolvarec = mysql_real_escape_string($rezolvarec);
$rezolvarep = stripslashes($_POST['rezolvare-p']); $rezolvarep = mysql_real_escape_string($rezolvarep);
$rezolvarev = stripslashes($_POST['rezolvare-v']); $rezolvarev = mysql_real_escape_string($rezolvarev);
 $categorii = str_replace(", undefined", "", mysql_real_escape_string($_POST['categorii']));
$id = stripslashes($_POST['id']); $autor = mysql_real_escape_string($autor);
$sql = mysql_query("
UPDATE 
probleme 
SET titlu = '$titlu', enunt = '$enunt', exemple = '$exemple', rezultate = '$rezultate', rezolvarec = '$rezolvarec', rezolvarep = '$rezolvarep', rezolvarev = '$rezolvarev', categorii = '$categorii' WHERE id = '$id'"
);
if ($sql)	print "Succes ! <script>setTimeout('history.back(1)', 3000)</script>";
else print "Eroare ! <script>setTimeout('history.back(1)', 3000)</script>";
?>