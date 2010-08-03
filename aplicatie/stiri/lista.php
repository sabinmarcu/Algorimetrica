<?php
$sql = mysql_query("SELECT * FROM stiri ORDER BY data DESC");
$nr = 1;
print "<h1>Cele mai noi stiri </h1><p>Cele mai noi evenimente.<br>Legate de site, legate de informatica, legate de lumea inconjuratoare, tot ce trebuie sa stiti</p>";while ($stire = mysql_fetch_array($sql))	{
	print "<div class='bloc colorat' id='p".$nr."' onclick=\"descriere('".$nr."')\"><div class='element' style='text-size:13pt;'>".$stire['titlu']."</div><div class='subelement'><a href='/stiri/".$stire[id]."'>Citeste mai mult!</a>";
	print "</div></div>";
	print "<div class='descriere' id = 'd".$nr."'>".$stire[rezumat]."</div>";$nr++;
}print "<script type='text/javascript'>for (i = 1; i <= ".$nr."; i++) document.getElementById('d'+i).style.display = 'none'</script>";

if ($admin2)	{

		print " <h7 onclick=\"toggle('adauga')\" id='click'> Adauga o Stire Noua </h7> ";
		print "<script type='text/javascript'>var exemple = 1;</script>";
		print "<div id='adauga'>";

			print "<form method='post' action='/tema-noua/' name='coment'>";

			print "<p> Titlul Stirii : </p><input name='titlu' style='width:100%; text-align:center;'/><br>";
			
			print "<p> Un mic rezumat (optional) : </p> <textarea name = 'rezumat' style='width:100%; min-height:100px;'> </textarea><br>";

			print "<p> La ce se refera stirea : </p><textarea name = 'detalii' style='width:100%; min-height:100px;'> </textarea>";
			
			print "<input type='hidden' name='autor' value='".$_SESSION['id']."'>";
			print "<input type='submit' class='buton' value='Trimiteti Stirea!' name='form'>";

			print "</form>";

		print "</div>";

		}
?>