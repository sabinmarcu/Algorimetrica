<?php
$sql = mysql_query("SELECT * FROM probleme ORDER BY data DESC");
$nr = 0;
print "<form method='POST' action='/modifica-problemele/'>";
while ($problema = mysql_fetch_array($sql))	{
	$nr++;
	print "<div class='bloc colorat' id='p".$nr."'><div class='element' style='text-size:13pt;'><input type='text' style='background:none; border:none; margin:0; padding:0;' value ='".$problema[titlu]."' name='titlu".$problema[id]."'/></div><div class='subelement'><span id='sterge".$problema['id']."' style='color:red; cursor:pointer' onclick=\"sterge('".$problema['id']."')\">Sterge </span> / <span onclick=\"descriere('".$problema['id']."')\" style='color:green; cursor:pointer'>Modifica Descrierea</span></div></div>";	
	print "<input type='hidden' name='sters".$problema['id']."' id='sters".$problema['id']."' value='0'/>";
	print "<div class='descriere' id = 'd".$problema[id]."'><h4 style='margin: 0.5em 1.33em'>Enuntul : </h4><textarea  style='width:98%;'  name='enunt".$problema[id]."'>".$problema[enunt]."</textarea>";
	
	print "<div id='exemple'><input type='button' onclick='insereaza(\"exemple\");' value='Adauga inca un exemplu' class='buton' /><br>";
	$exemple = explode("//--", $problema['exemple']);
	$rezultate = explode("//--", $problema['rezultate']);
	for ($i = 0; $i <= count($exemple) - 1; $i++)
	if ($exemple[$i])
		print "<div class='jumatate' style='*float:left; *text-align:left'> ".str_replace("//--", "", $exemple[$i])."</div> <div class='jumatate' style='float:right; text-align:right'> ".str_replace("//--", "", $rezultate[$i])."</div> ";
	print "</div></div>";
	}print"<input type='hidden' name='total', value='".$nr."'> <input type='submit' name='form' value='Actualizeaza problemele!'/>";print "</form><script type='text/javascript'>for (i = 1; i <= ".$nr."; i++) document.getElementById('d'+i).style.display = 'none'</script>";

?>