<?php
$sql = mysql_query("SELECT * FROM linkuri ORDER BY acceptata DESC");
$nr = 0;
print "<form method='POST' action='/modifica-linkurile/'>";
while ($link = mysql_fetch_array($sql))	{
	$nr++;
	print "<div class='bloc colorat' id='p".$nr."'><div class='element' style='text-size:13pt;'><input type='text' style='background:none; border:none; margin:0; padding:0;' value ='".$link[nume]."' name='nume".$link[id]."'/></div><div class='subelement'><span id='sterge".$link['id']."' style='color:red; cursor:pointer' onclick=\"sterge('".$link['id']."')\">Sterge </span> / <span onclick=\"descriere('".$nr."')\" style='color:green; cursor:pointer'>Modifica Descrierea</span>";
	if (!$link['acceptata'])	print "<span id='acc".$link['id']."'> / <span style='color: blue; cursor:pointer' id='ac".$link['id']."' onclick=\"accepta('".$link[id]."')\">Accepta</span></span>";
	print "</div></div>";	
	print "<input type='hidden' name='sters".$link['id']."' id='sters".$link['id']."' value='0'/>";
	print "<input type='hidden' name='accept".$link['id']."' id='accept".$link['id']."' value='".$link[acceptata]."'/>";
	print "<div class='descriere' id = 'd".$nr."'><textarea  style='background:none; border:none; margin:0; padding:0; width:98%;'  name='descriere".$link[id]."'>".$link[descriere]."</textarea></div>";
	$rem = $link[id];
}print"<input type='hidden' name='total' value='".$rem."'> <input type='submit' name='form' value='Actualizeaza Linkurile!'/>";print "</form><script type='text/javascript'>for (i = 1; i <= ".$nr."; i++) document.getElementById('d'+i).style.display = 'none'</script>";

?>