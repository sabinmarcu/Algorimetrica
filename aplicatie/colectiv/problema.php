<?php

$str = $_SERVER[REDIRECT_URL];
$str = substr($str, 7);
$pos = strpos($str, "/");
$str = substr($str, 0, $pos);

$get = mysql_real_escape_string($str);

$sql = mysql_query("SELECT * FROM teme WHERE prescurtare = '" . $get . "'");

$tema = mysql_fetch_array($sql);

if ($tema['id'])	{
$sql = mysql_query("SELECT * FROM teme WHERE nr = '".($tema['nr'] - 1) . "' AND liceu = ".$_SESSION['liceu']." AND clasa = ".$_SESSION['clasa']);

$aux = mysql_fetch_array($sql);		$prev = $aux['titlu']; $previd = $aux['prescurtare'];

$sql = mysql_query("SELECT * FROM teme WHERE nr = '".($tema['nr'] + 1) . "' AND liceu = ".$_SESSION['liceu']." AND clasa = ".$_SESSION['clasa']);

$aux = mysql_fetch_array($sql);		$post = $aux['titlu']; $postid = $aux['prescurtare'];

		

		if ($previd)	print"<span style='float:left'><a href='/clasa/".$previd."'>&lArr; ".$prev."</a></span>";

		else	print"<span style='float:left'><a href='/clasa/'>&lArr; Inapoi la Lista</a></span>";

		if ($postid)	print"<span style='float:right'><a href='/clasa/".$postid."'>".$post." &rArr;</a></span>";

		else	print"<span style='float:right'><a href='/clasa/'>Inapoi la Lista &rArr;</a></span>";
		
		print " <h1> " . $tema['titlu'] . "</h1>";
		print "<div id='info' style='top:175px'><pre>Pentru a mentine totul curat, am creat pagina sub forma de meniu. Ce ai nevoie, vizionezi. 
		Daca nu mai ai nevoie de ceva, poti sa ascunzi imediat. 
		
		E chiar asa de simplu. 
		Apasa pe bara gabena daca vrei sa afisezi continutul. 
		Apasa pe fundal daca ai terminat.</pre></div>";

		print "<div class='art'><div class='text'>Enunt : </div><div class='subart'><p> " . $tema['enunt'] . " </p></div></div>";

		print "<div class='art'><div class='text'>Exemple si Rezolvari</div><div class='subart'> ";

		$exemple = explode(" //-- ", $tema['exemple']);

		$rezultate = explode(" //-- ", $tema['rezultate']);

		for ($i = 0; $i <= count($exemple) - 2; $i++)

			print "<div class='jumatate' style='*float:left; *text-align:left'> ".str_replace("//--", "", $exemple[$i])."</div> <div class='jumatate' style='float:right; text-align:right'> ".str_replace("//--", "", $rezultate[$i])."</div> ";

		print" </div></div>";

		$sql = mysql_query("SELECT * FROM intrebari WHERE tema = " . $tema['id']);

		print "<p>Intrebari adresate pana acum : </p>";

		while ($intrebare = mysql_fetch_array($sql))	{

			$data = dateconvert($tema['data']);

			print "<div class='bloc'><div class='element'><a href='/clasa/" . $tema['prescurtare'] . "/intrebare/" . $intrebare['numar'] . "'>" . $intrebare['intrebare'] . "</a></div><div class='subelement'>" . $data . "</div></div>";

			

		}	

				if (session_is_registered('id'))	{

					print "<hr/><p>Ai o intrebare? Adreseaza-o acum : <br>Trimite si ceva detalii, sa inteleaga si restul lumii ce neclaritati ai. </p><form method='post' action='/intrebare-noua/' name='coment'>";

					print "<input name='intrebare' style='width:100%; text-align:center;'/><br>";

					print "<textarea name = 'rezumat' style='width:100%; min-height:100px;'> </textarea>";

					print "<input type='hidden' name='utilizator' value='".$_SESSION['id']."'>";

					print "<input type='hidden' name='prescurtare' value='".$tema['prescurtare']."'>";
					print "<input type='hidden' name='tema' value='".$tema['id']."'>";

					print "<input type='submit' class='buton' value='Trimiteti Intrebarea!' name='form'>";

					print "</form>";

				}	else print "<h3> Nu sunteti logat. Pentru a putea posta, trebuie sa va <a href='/logare'>logati</a>! </h3>";
} else include "aplicatie/misc/404.php";
?>