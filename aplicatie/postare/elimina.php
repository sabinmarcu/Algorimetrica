<?php
$sql = mysql_query("UPDATE teme SET nulled = 1 WHERE prescurtare = '".$str[2]."'");
if ($sql)	print "Succes !";
else print "Eroare !";
print "<script>setTimeout('history.back(1)', 3000)</script>";
?>