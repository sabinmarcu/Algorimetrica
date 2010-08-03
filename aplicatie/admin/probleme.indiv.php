<?php
$sql = mysql_query("SELECT * FROM probleme WHERE id = '".$str[3]."'");
$problema = mysql_fetch_array($sql);
$exemple = explode("//--", str_replace(" ", "", $problema[exemple]));
$rezultate = explode("//--", str_replace(" ", "", $problema[rezultate]));
$categorii = explode(",", str_replace(" ", "", $problema[categorii]));
$cat = implode("", $categorii);
print "<span style='float:left'><a href='javascript:history.back(1)'>&lArr; Inapoi la lista</a></span>";
print"<script type='text/javascript'>var exemple = ".(count($exemple) - 1)."; var cat = new Array(101); ";
print "cat[0] = ".count($categorii).";";
for ($i = 0; $i <= count($categorii) - 1; $i++)	{
	print "cat[".($i + 1)."] = ".$categorii[$i].";";
}
print"</script>";
print "<form method='post' action='/modifica-problema/' name='adauga'> 
	<h1> Modifica problema : ".$problema[titlu]." </h1>
	<br>
	<h5 style='padding : 0; margin : 0 10%; text-align:left;'>
	<div class='bg' onclick=\"toggle('titlu')\"> Titlul Problemei</div> <div class='subcontinut' id='titlu' > <input type='text' name='titlu' style='width:100%' value='".$problema[titlu]."'></div> <div class='bgb'></div>
	<div class='bg' onclick=\"toggle('enunt')\"> Enuntul problemei </div>  <div class='subcontinut' id='enunt' style='display:none'> <textarea name='enunt' style='max-width:700px; min-width:700px'>".$problema[enunt]."</textarea> </div><div class='bgb'></div> 
	<div class='bg' onclick=\"toggle('exemple')\"> Exemple si Rezultate </div>  <div class='subcontinut' id='exemple' style='display:none'> <input type='button' onclick='insereaza(\"exemple\");' value='Adauga inca un exemplu' class='buton' /> <br><br> ";
	for ($i = 0; $i <= count($exemple) - 1; $i++)
		print "<div style='text-align:center'>".($i + 1)."<input type='text' class='enunt' name='exemplu-".($i + 1)."' style='width:45%; float:left;' value = '".$exemple[$i]."'><input type='text' class='rezultat' name='rezultat-".($i + 1)."' style='width:45%; float:right;'value = '".$rezultate[$i]."'> </div> <br> <br>";
	
	print "  </div><div class='bgb'></div>
	<div class='bg' onclick=\"toggle('rezolvari')\"> Rezolvari </div>  <div class='subcontinut' id='rezolvari' style='display:none'> <h6> Rezolvare in C++ </h6> <textarea name='rezolvare-c' style='max-width:700px; min-width:700px'>".$problema[rezolvarec]."</textarea> <br><h6> Rezolvare in Pascal </h6> <textarea name='rezolvare-p' style='max-width:700px; min-width:700px'>".$problema[rezolvarep]."</textarea> <br><h6> Rezolvare in Visual Basic </h6> <textarea name='rezolvare-v' style='max-width:700px; min-width:700px'>".$problema[rezolvarev]."</textarea> </div> <div class='bgb'></div>
	<div class='bg' onclick=\"toggle('categorii')\"> Categorii </div>  <div class='subcontinut' id='categorii' style='display:none; text-align:center;'>";
		$sql = mysql_query("SELECT * FROM categorii");
		while ($categorie = mysql_fetch_array($sql))		{
			print " <a onclick=\"settinta('pcat', '".$categorie['id']."')\"><div class='";
			$ok = 1;
			for ($i = 0; $i <= count($categorii) - 1 && $ok; $i++)	if ($categorii[$i] == $categorie[id]) { print "buton-apasat"; $ok = 0; }
			if ($ok) print"categorie";
			
			print"' id='buton".$categorie['id']."'>".$categorie['nume']."</div></a>";
			
		}
		print"' </div> <div class='bgb'></div> 				
		<input type='submit' name='form' value = 'Actualizeaza Problema !' class='buton' style='width:400px; float:right' id='buton'></h5><hr><br><br>
<input type='hidden' name='exemple' id='nrex' value=".(count($exemple) - 1)." >
<input type='hidden' name='categorii' id='pcat' value='$cat' >
<input type='hidden' name='id' value='" . $str[3] . "'>
</form><br>";

?>