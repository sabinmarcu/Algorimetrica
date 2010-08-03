<?php
$titlu = mysql_real_escape_string($_POST['titlu']); 
$rezumat = mysql_real_escape_string($_POST['rezumat']); 
$detalii = stripslashes($_POST['detalii']); 
$autor = mysql_real_escape_string($_POST['autor']);
$sql = mysql_query("
INSERT INTO 
stiri 
(titlu, detalii, rezumat, autor, data) 
VALUES
('$titlu', '$detalii', '$rezumat', '$autor', now() )"
);
if ($sql) 	{$referer = $_SERVER['HTTP_REFERER'];
header("Location:$referer");}
else print "
INSERT INTO 
probleme 
(titlu, detalii, exemple, rezultate, data, liceu, clasa, prescurtare) 
VALUES
('$titlu', '$detalii', '$exemple', '$rezultate','$data', '$liceu', '$clasa', '$rezumat' )<br><br>" . mysql_error();
?>
