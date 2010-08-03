<?php
			
			print "<br><br><br><br><hr style='margin-left:-25px; width:100%; padding: 0 25px'><br><br>
			<div id='subsol'>
				<div class='art subsol'><div class='text'>Ultimele probleme adaugate :</div><div class='subart'>";
					$sql = mysql_query("SELECT * FROM probleme ORDER BY id DESC LIMIT 3");
					while ($problema = mysql_fetch_array($sql)	)	{
						$subsql = mysql_query("SELECT * FROM utilizatori WHERE id = ". $problema['autor']);	$autor = mysql_fetch_array($subsql);
						print " <div> <a href='/arhiva/problema/" . $problema['id'] . "'> <strong>" .$problema['titlu'] . "</strong> </a> <div style='margin:0; padding:0; font-size:12px'>Problema adaugata de : <a href='/registru/utilizator/" . $autor['id'] . "'>" . $autor['nume'] . "</a> </div> <br> </div>";
					}
				print "</div></div><div class='art subsol'><div class='text'>Ultimile stiri :</div><div class='subart'>";
					$sql = mysql_query("SELECT * FROM stiri ORDER BY id DESC LIMIT 3");
					while ($stire = mysql_fetch_array($sql)	)	{
						$sqlaux = mysql_query("SELECT * FROM utilizatori WHERE id = '".$stire[autor]."'");
						$autor = mysql_fetch_array($sqlaux);
						print " <div> <a href='/stiri/" . $stire['id'] . "'> <strong>" .$stire['titlu'] . "</strong> </a> <div style='margin:0; padding:0; font-size:12px'>Stire adaugata de : <a href='/registru/utilizator/" . $autor['id'] . "'>" . $autor['nume'] . "</a> </div> <br> </div>";
					}
				print "
				</div></div><div class='art subsol'><div class='text'>Ultimii utilizatori :</div><div class='subart'>";
					$sql = mysql_query("SELECT * FROM utilizatori ORDER BY id DESC LIMIT 3");
					while ($user = mysql_fetch_array($sql)	)	{
						print " <div> <a href='/registru/utilizator/" . $user['id'] . "'> <strong>" .$user['nume'] . "</strong> </a><br><br> </div>";
					}
				print "</div></div></div> ";
?>		<div class='footer'>&copy; Marcu Sabin - 2010</div></div><br>	
		</div><div class="coltar" id='jos'>
			<div class="colt" id="stanga-jos"></div>
			<div class="colt" id="dreapta-jos"></div>
	</div></div>
</div>
  <div id='footer'><div id='stire' class='ft'>
  <?php 
  print "<a href='feed://algorimetrica.info/rss/' class='rss'>RSS</a>";
  ?>
  </div>
  <?php
  	if ($_SESSION[id])  	{
  	print "<div class='ft' id='setari'>";
  	print "<a href='/setari/' id='cnt'>Contul meu</a>";
  	if ($admin1)	print " | <a href='/admin/' id='admin'>Panoul de Administrare</a>";
  	print "</div>";	
  	print " <div class='ft' id='meniu'>";
  		print "<a href='/logare-clasica/' class='log'>Delogheaza-te</a> | ";
  	print "<a href='/setari-pagina/' class='set'>Setari ale paginii</a>";
  	print "</div>";}
  	else {
  		print "<div class='ft' id='log'>";
  		print "<a href='/logare-clasica/' class='log'>Logheaza-te</a> | ";
  		print "<a href='/inregistrare-clasica/' class='reg'>Inregistreaza-te</a>";
  		print "</div><div class='ft' id='sett'>";
  		print "<a href='/setari-pagina/' class='set'>Setari ale paginii </a>";
  		print "</div>";
  		}
  ?>
  </div>
<div id='overlays' class='overlay'></div>
<div id='overlayc'></div><div style='margin: -25px 0 25px 25px; text-align: left;'><a href="http://validator.w3.org/check?uri=referer"><img
       src="http://www.w3.org/Icons/valid-html401"
       alt="Valid HTML 4.01 Transitional" height="31" width="88"></a></div>
	</body>
</html>
