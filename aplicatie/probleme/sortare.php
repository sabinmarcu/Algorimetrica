<?php
$sortare =  mysql_real_escape_string ($str[3]);
if ($str[2])	$page = mysql_real_escape_string($str[2]);
else $page = 1;
$sql = mysql_query("SELECT * FROM categorii WHERE id = $sortare");
$categorie = mysql_fetch_array($sql);
print " <h2> Ultimele Probleme din categoria : {$categorie[nume]}  </h2> <p>Aceasta este arhiva noastra de probleme. Scopul, bineinteles, este pur educational. Oricine poate adauga o problema, fara interdictii ... dar, un mic aviz amatorilor de senzatii tari : Daca urcati o problema aiurea, doar sa va aflati in treaba, veti zbura pe cel mai apropiat port afara din baza de date. Simplu, nu? Ma gandeam eu. <br><br>Asa, mai departe, fiecare problema trebuie sa aiba un enunt, cel putin un exemplu. Rezolvarile sunt indicate, dar daca ati gasit o problema si nu ii dati de cap, atunci puteti sa nu scrieti nici o rezolvare. Problema va aparea ca si 'nerezolvata', si va asigur ca echipa noastra va lucra la acea problema. Intr-o zi sau chiar mai putin, o rezolvare va aparea in fiecare limbaj valabil. Asta, bineinteles, daca nu te ajuta altcineva prin comentarii intainte de asta.<br><br> Una peste alta, distrati-va ... dar aveti si grija ce faceti, pentru ca nu se tolereaza chiar tot pe acest site.";			
					$sql = mysql_query("SELECT * FROM probleme ORDER BY id DESC LIMIT 10");	$i = 0;
					print "<div id='meniu'>";
					while ($row = mysql_fetch_array($sql))	{
						$categorii = explode(", ", $row['categorii']);
						$i ++;
						for ($j = 0; $j <= count($categorii) - 1; $j ++)	if($categorii["$j"] == $sortare)	{
							$subsql = mysql_query("SELECT * FROM categorii WHERE id = ".$sortare);	$categorie = mysql_fetch_array($subsql);	
							print "<div class='bloc'><div class='element'><a href='/arhiva/problema/".$row['id']."'>".$row['titlu']."</a></div><div class='subelement'>".$categorie['nume']."</div></div>";
							break;
						}		
						}
					print "</div>";
					print "  <h6 style='margin-top:50px; margin-bottom: -50px;'> <a href='/problema-noua/'>Adauga o problema noua ! </a></h6>  <br><br>";
					print " <div id='categorii' style='margin: 50px;'><div id='titlu' onclick=\"toggle('lista', 'titlu', 'Categoriile', 'special')\"> Afiseaza Categoriile </div> ";
					print " <div id='lista' style='display:none'> ";
					$sql = mysql_query("SELECT * FROM categorii ORDER BY id ASC");
					while ($categorie = mysql_fetch_array($sql))	print " <div class='categorie'><a href='/arhiva/categorie/".$categorie['id']."'>".$categorie['nume']."</a></div>";
					if ($admin1)	print "<br><br><a href='/admin/categorii/'>Modifica Categoriile</a>";
					print "</div> </div> ";

?>