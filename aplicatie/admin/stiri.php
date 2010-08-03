<?php
$sql = mysql_query("SELECT * FROM stiri ORDER BY id ASC");
$nr = 0;
print "<form method='POST' action='/modifica-stirile/'>";
while ($stire = mysql_fetch_array($sql))	{
	$nr++;
	print "<div class='bloc colorat' id='p".$nr."'><div class='element' style='text-size:13pt;'><input type='text' style='background:none; border:none; margin:0; padding:0;' value ='".$stire[titlu]."' name='titlu".$stire[id]."'/></div><div class='subelement'><span id='sterge".$stire['id']."' style='color:red; cursor:pointer' onclick=\"sterge('".$stire['id']."')\">Sterge </span> / <span onclick=\"descriere('".$stire['id']."')\" style='color:green; cursor:pointer'>Modifica rezumatul / stirea</span></div></div>";	
	print "<input type='hidden' name='sters".$stire['id']."' id='sters".$stire['id']."' value='0'/>";
	print "<div class='descriere' id = 'd".$nr."'><h4 style='margin: 0.5em 1.33em'>Rezumatul Stirii : </h4><textarea  style='width:98%;'  name='rezumat".$stire[id]."'>".$stire[rezumat]."</textarea><h4 style='margin: 0.5em 1.33em'>Stirea propriu-zisa : </h4><textarea  style='width:98%;'  name='detalii".$stire[id]."'>".$stire[detalii]."</textarea></div>";
}print"<input type='hidden' name='total', value='".$nr."'> <input type='submit' name='form' value='Actualizeaza Stirile!'/>";print "</form><script type='text/javascript'>for (i = 1; i <= ".$nr."; i++) document.getElementById('d'+i).style.display = 'none'</script>";
?>