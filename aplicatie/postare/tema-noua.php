<?php
$titlu = mysql_real_escape_string($_POST['titlu']); 
$scurtatura = mysql_real_escape_string($_POST['scurtatura']); 
$enunt = stripslashes($_POST['enunt']); 
$nr = mysql_real_escape_string($_POST['nrex']);
for ($i = 1; $i <= $nr; $i++)	{
	$aux = mysql_real_escape_string($_POST["exemplu-$i"]);
	if ($aux)
	$exemple = $exemple . $aux . " //-- "; 
	$aux = mysql_real_escape_string($_POST["rezultat-$i"]);
	if ($aux)
	$rezultate = $rezultate . $aux . " //-- "; 
}
$clasa = mysql_real_escape_string($_POST['clasa']);
$liceu = mysql_real_escape_string($_POST['liceu']);
$data = mysql_real_escape_string($_POST['data']);
$sql = mysql_query("
INSERT INTO 
teme 
(titlu, enunt, exemple, rezultate, data, liceu, clasa, prescurtare) 
VALUES
('$titlu', '$enunt', '$exemple', '$rezultate', '$data', '$liceu', '$clasa', '$scurtatura' )"
);
if ($sql) 	{$referer = $_SERVER['HTTP_REFERER'];
header("Location:$referer");}
else print "
INSERT INTO 
probleme 
(titlu, enunt, exemple, rezultate, data, liceu, clasa, prescurtare) 
VALUES
('$titlu', '$enunt', '$exemple', '$rezultate','$data', '$liceu', '$clasa', '$scurtatura' )<br><br>" . mysql_error();
?>
