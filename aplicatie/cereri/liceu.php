<?php
$cererep = mysql_real_escape_string($_POST['clasa']);
$sql = mysql_query("SELECT * FROM cereri WHERE id = '".$cererep."'");
$cerere = mysql_fetch_array($sql);
$aux .= $cerere[sustinatori] . ", " . $_SESSION[id];
$sql = mysql_query("UPDATE cereri SET sustinatori = '".$aux."' WHERE id = '".$cererep."'");
if ($sql) {
$_SESSION[clasa] = -1;
$sql = mysql_query("UPDATE utilizatori SET clasa = '-1' WHERE id = '".$_SESSION[id]."'");
if ($sql)
print "<h4> Totul a mers ca uns, te redirectionam catre pagina precedenta in 3 secunde</h4> : <script>setTimeout('history.back(1)', 3000);</script>";
else print "<h4> Am avut o problema ... incearca din nou!</h4> : <script>setTimeout('history.back(1)', 3000);</script>";}
?>