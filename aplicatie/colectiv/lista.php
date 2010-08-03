<?php


	$sql = mysql_query("SELECT * FROM clase WHERE liceu = " . $_SESSION['liceu'] . " AND id = " . $_SESSION['clasa']);

	$clasa = mysql_fetch_array($sql);

	$sql = mysql_query("SELECT * FROM licee WHERE id = " . $_SESSION['liceu']);

	$liceu = mysql_fetch_array($sql);

	print "<h1> Camera de discutii </h1> <h5> Clasa <a href='/registru/?clasa=" . $clasa['id'] . "'> " . $clasa['nume'] . "</a> </h5><h5> Scoala <a href='/registru/?scoala=" . $liceu['id'] . "'> " . $liceu['nume'] . "</a> </h5>";

	print "<p>Acestea sunt problemele pe care le aveti de rezolvat pana data viitoare <br> Puteti sa puneti oricate intrebari doriti, sau sa raspundeti intrebarilor deja adresate. <br> Fiti si voi mai 'oameni' si ajutati-va colegii cand acestia au nevoie de ajutor. Cine stie, poate va veni si randul vostru candva. </p> <h5>PS. In partea din dreapta se afla data la care trebuie sa prezentati temele, asa ca ati face bine sa va grabiti </h5>";

	$sql = mysql_query("SELECT * FROM teme WHERE liceu = " . $liceu['id'] . " AND clasa = " . $clasa['id']." AND nulled = 0");

	$mod = explode(', ', $clasa['moderatori']);

	$ok = 0;	for ($i = 0; $i <= count($mod) - 1 && $ok === 0; $i++){if ($mod[$i] == $_SESSION['id']) $ok = 1;}
	if (mysql_num_rows($sql))
	while ($tema = mysql_fetch_array($sql))	{

		$data = dateconvert($tema['data']);

		print "<div class='bloc'><div class='element'><a href='/clasa/" . $tema['prescurtare'] . "'> " . $tema['titlu'] . " </a></div><div class='subelement'>" . $data . "</div>";

	

		if ($ok)print "<div class='subelement'><a href='/elimina-tema/".$tema['prescurtare']."'> Sterge </a></div>";

		print "</div>";

	}
	else print "<br><br><br><br><br><hr><h6>Se pare ca nu aveti tema pentru data viitoare (inca).</h6><br><hr><br><br><br><br><br><br>";

	if ($ok)	{

		print " <h6 onclick=\"toggle('adauga')\" id='click'> Adauga Tema Noua </h6> ";
		print "<script type='text/javascript'>var exemple = 1;</script>";
		print "<div id='adauga'>";

			print "<form method='post' action='/tema-noua/' name='coment'>";

			print "<p> Titlul Problemei : </p><input name='titlu' style='width:100%; text-align:center;'/><br>";
			
			print "<p> Link-ul Implicit : </p> <span style='color:#3A3; font-size: 10pt; font-style:italic; font-weight:bolder; text-shadow:none; text-decoration: underline;'>http://algorimetrica.co.cc/clasa/<span id='link-continuare' style='font-weight: bold; color:red; padding:0 5px;'></span>/</span>
			<input name='scurtatura' style='width:100%; text-align:center;' onkeyup='reimprospatare(this.value)'/><br>";

			print "<p> Enuntul Problemei : </p><textarea name = 'enunt' style='width:100%; min-height:100px;'> </textarea>";

			print " <div id='exemple'> <p>Exemple si Rezultate</p> <div style='text-align:center'>1<input type='text' class='enunt' name='exemplu-1' style='width:45%; float:left;'><input type='text' class='rezultat' name='rezultat-1' style='width:45%; float:right;'><br/><br/> </div></div><input id='adauga' type='button' onclick='insereaza(\"exemple\");' value='Adauga inca un exemplu' class='buton' style='float:right'/>";

			print "<input type='hidden' name='nrex' id='nrex' value='1'>";

			print "<input type='hidden' name='clasa' value='".$_SESSION['clasa']."'>";

			print "<input type='hidden' name='liceu' value='".$_SESSION['liceu']."'>";

			print"<span style='float:right'><script>DateInput('data', true, 'YYYY-MM-DD')</script></span>";

			print "<input type='submit' class='buton' value='Trimiteti Tema!' name='form'>";

			print "</form>";

		print "</div>";

		}
		if ($_SESSION[id] == $liceu[administrator])	{
			print " <hr><h6 onclick=\"toggle('permite')\" id='click'> Verifica noile clase ce vor o camera in cadrul liceului </h6> ";
					print "<div id='permite'>";
						$sql = mysql_query("SELECT * FROM cereri WHERE stare = '0'");
						$nr = 0;
						while ($cerere = mysql_fetch_array($sql))	{
							print "<form method='post' action='/cerere/accepta/' name='coment' name='".$nr."'>";
							$nr++;
							print "<div class='bloc colorat' id='p".$nr."' onclick=\"descriere('".$nr."')\"><div class='element' style='text-size:13pt;'>".$cerere[subiect]."</div><div class='subelement'>";
							print "<input type='hidden' name='cerere' value='".$cerere[id]."' /><input type='submit' name='form' style='background: none; border: none; padding: 0; margin: 0;' value='Accepta Cererea'/>";
							print "</div></div>";
							print "<div class='descriere' id = 'd".$nr."'>".$cerere[continut]."</div>";
							print "</form>";							
						}
						print "<script type='text/javascript'>for (i = 1; i <= ".$nr."; i++) document.getElementById('d'+i).style.display = 'none'</script>";
					print "</div>";
			}
		
		?>