<?php
$sql = mysql_query("SELECT * FROM probleme ORDER BY id DESC");	
$i = 0;
print "<div id='meniu'>";
while ($row = mysql_fetch_array($sql))	{
	$categorii = explode(", ", $row['categorii']);
	$i ++;
		print "<div class='bloc'><div class='element'><a href='/admin/probleme/".$row['id']."'>".$row['titlu']."</a></div><div class='subelement'>";
		for ($j = 0; $j <= count($categorii) - 1; $j ++)	{
			$subsql = mysql_query("SELECT * FROM categorii WHERE id = ".$categorii["$j"]);	$categorie = mysql_fetch_array($subsql);	
			print $categorie['nume'].", ";
		}	
	print "</div></div>";	
}
print "</div>";
?>