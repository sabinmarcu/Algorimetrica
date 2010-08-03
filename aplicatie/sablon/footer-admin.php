</div>
</div><div class="coltar" id='jos'>
			<div class="colt" id="stanga-jos"></div>
			<div class="colt" id="dreapta-jos"></div>
	</div></div>
</div> <div id='footer'><div id='stire' class='ft'>
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
  		print "</div><div class='ft' id='set'>";
  		print "<a href='/setari-pagina/' class='set'>Setari ale paginii </a>";
  		print "</div>";
  		}
  ?>
  </div>
</div>
<div id='overlays' class='overlay'></div>
<div id='overlayc'></div>