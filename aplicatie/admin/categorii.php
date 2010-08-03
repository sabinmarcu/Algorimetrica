<?php
$sql = mysql_query("SELECT * FROM categorii ORDER BY id ASC");
$nr = 0;
print "<h2> Altereaza Categoriile </h2><p> Deci ... poti sa stergi, sa redenumesti orice categorie, sau pur si simplu sa adaugi una noua. <br> Nu-i asa ca-i distractiv sa fii administrator? Ai grija doar sa nu stergi o categorie fara vreun motiv. </p>";
print"<form method='POST' action='/modifica-categoriile/'><div id='categorii'";
while ($categorie = mysql_fetch_array($sql))	{
	print "<div class='bloc colorat' id='p".$categorie['id']."'><div class='element' style='text-size:13pt;'>".$categorie['nume']."</div><div class='subelement'><span id='sterge".$categorie['id']."' style='color:red; cursor:pointer' onclick=\"sterge('".$categorie['id']."')\">Sterge </span> / <span onclick=\"descriere('".$categorie['id']."')\" style='color:green; cursor:pointer'>Redenumeste</span>";
	print "<input type='hidden' name='sters".$categorie['id']."' id='sters".$categorie['id']."' value='0'/>";
	print "</div></div>";$nr++;
	print "<div class='descriere' id = 'd".$categorie['id']."'><textarea name='nume".$categorie['id']."' style='width:98%'></textarea></div>";$id = $categorie['id'];
}print "</div><script type='text/javascript'>for (i = 1; i <= ".$id."; i++) if ($('#d'+i).css('display') != 'none') $('#d'+i).hide(0);</script>";
print "<input type='button' onclick='insereaza(\"categorii\");' value='Adauga inca o categorie'/><input type='hidden' name='total' id='total' value='".$nr."'/><input type='hidden' name='plus' id='plus' value='0' style='float:left'/><input style='float:right' type='submit' name='form' value='Actualizeaza Categoriile'/><br></form>";
print "<br><br><hr><p><a href='/admin/'>Inapoi la meniul de administrare</a></p><hr>";
?>