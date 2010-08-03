<?php
$str = substr($_SERVER[REDIRECT_URL], 16);
$str = str_replace("/", "", $str);
$get =  mysql_real_escape_string ($str);
$sql = mysql_query("SELECT * FROM probleme WHERE id = ".$get);
$problema = mysql_fetch_array($sql);
$sql = mysql_query("SELECT * FROM probleme WHERE id = ".($get - 1));
$aux = mysql_fetch_array($sql);		$prev = $aux['titlu']; $previd = $aux['id'];
$sql = mysql_query("SELECT * FROM probleme WHERE id = ".($get + 1));
$aux = mysql_fetch_array($sql);		$post = $aux['titlu']; $postid = $aux['id'];
print " <div id='lista-cat'> <ul> ";	
$aux = explode(", ", $problema['categorii']);
for ($i = 0; $i <= count($aux) - 1; $i++)	{
	$sql = mysql_query("SELECT * FROM categorii WHERE id = " . $aux["$i"]);
	$categorie = mysql_fetch_array($sql);
	print " <li class='cat'><a href='/arhiva/categorie/".$categorie['id']."'> ".$categorie['nume']."</a> </li>";
}
print " </ul> </div> ";
if ($previd)	print"<span style='float:left'><a href='/arhiva/problema/".$previd."'>&lArr; ".$prev."</a></span>";
else	print"<span style='float:left'><a href='/arhiva/'>&lArr; Inapoi la Lista</a></span>";
if ($postid)	print"<span style='float:right'><a href='/arhiva/problema/".$postid."'>".$post." &rArr;</a></span>";
else	print"<span style='float:right'><a href='/arhiva/'>Inapoi la Lista &rArr;</a></span>";	
					print " <h1> " . $problema['titlu'] . "</h1>";
					print "<div id='info'><pre>Pentru a mentine totul curat, am creat pagina sub forma de meniu. Ce ai nevoie, vizionezi. 
					Daca nu mai ai nevoie de ceva, poti sa ascunzi imediat. 
					
					E chiar asa de simplu. 
					Apasa pe bara gabena daca vrei sa afisezi continutul. 
					Apasa pe fundal daca ai terminat.</pre></div>";
					print " <div class='art'><div class='text'>Enunt: </div><div class='subart'> ";
					print $problema['enunt'] . " </div></div>";
					print "<div class='art'><div class='text'>Exemple si Rezultate : </div><div class='subart'>";
	$exemple = explode(" //-- ", $problema['exemple']);
	$rezultate = explode(" //-- ", $problema['rezultate']);
	for ($i = 0; $i <= count($exemple) - 2; $i++)
		print "<div class='jumatate' style='*float:left; *text-align:left'> ".str_replace("//--", "", $exemple[$i])."</div> <div class='jumatate' style='float:right; text-align:right'> ".str_replace("//--", "", $rezultate[$i])."</div> ";
	print" </div></div>";
					print " <div class='art'><div class='text'>Rezolvari : </div><div class='subart'>" ;
					$nr = 0;
					if ($problema['rezolvarec'])	$nr = $nr * 10 + 1;					
					if ($problema['rezolvarep'])	$nr = $nr * 10 + 2;
					if ($problema['rezolvarev'])	$nr = $nr * 10 + 3;
					switch ($nr)	{
						case 1	:	print "<div class='jumatate' style='width:95%'> <h5> Rezolvare in C++ </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarec'])." </pre></div>";	break;
						case 2	:	print "<div class='jumatate' style='width:95%'> <h5> Rezolvare in Pascal </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarep'])." </pre></div>";	break;
						case 3	:	print "<div class='jumatate' style='width:95%'> <h5> Rezolvare in Visual Basic </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarev'])." </pre></div>";break;
						case 12	:	print "<div class='jumatate'> <h5> Rezolvare in C++ </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarec'])." </pre></div><div class='jumatate' style='float:right'> <pre><h5> Rezolvare in Pascal </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarep'])."</pre></div>";break;
						case 13 :	print "<div class='jumatate'> <h5> Rezolvare in C++ </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarec'])." </pre></div><div class='jumatate' style='float:right'> <h5> Rezolvare in Visual Basic </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarev'])." </pre></div>";break;
						case 23 : 	print "<div class='jumatate'> <h5> Rezolvare in Pascal </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarep'])." </pre></div><div class='jumatate' style='float:right'> <h5> Rezolvare in Visual Basic </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarev'])." </pre></div>";break;
						case 123 :  print "<div class='jumatate'> <h5> Rezolvare in C++ </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarec'])." </pre></div><div class='jumatate' style='float:right'> <h5> Rezolvare in Pascal </h5> <hr><br><pre> ".str_replace("<", "&lt;",$problema['rezolvarep'])." </pre></div><div class='jumatate' style='width:95%'><h5> Rezolvare in Visual Basic </h5> <hr><br> <pre>".str_replace("<", "&lt;",$problema['rezolvarev'])."</pre></div>";break;
					}
					$data = dateconvert($problema['data']);
					print "</div></div> <h5> <span style='float:right; margin-top: -25px'>  Problema a fost postata ".$data. "</span></h5>";
					print "<br><br><br>";
					print " <p style='text-align: left'> Comentarii : </p> ";
					print " <div id = 'comentarii-main'> ";							
					$sql = mysql_query("SELECT * FROM comentarii WHERE problema = ".$problema['id']." AND sub = 0 ORDER BY sub DESC");
					if (mysql_num_rows($sql))
					while ($comentariu = mysql_fetch_array($sql))	{
						print " <div class='comentariu' id = 'comentariu-". $comentariu['id'] . "' >";
						print nl2br($comentariu['comentariu']);
						$usersql = mysql_query("SELECT * FROM utilizatori WHERE id = ".$comentariu['autor']);	$utilizator = mysql_fetch_array($usersql);
						print " <br><h5 style='text-align:left; padding:0; margin:0;'> <input type='button' class='buton' value = 'Raspundeti!' class='com' name='raspundeti' onclick=\"settinta('sub', '".$comentariu['id']."')\"> <span style='float:right'>" . $utilizator['nume'] . "<br><span style='font-weight:normal;'>" . dateconvert($comentariu['data']). "</span></span> </h5> <br>";						print "</div> <br>"; 	$ok = 1;	$tinta = $comentariu['id'];		$nivel = 1;	$limita =  $comentariu['id'];
						while ($ok)	{
							$testare = 1;	
							$subsql = mysql_query("SELECT * FROM comentarii WHERE problema = ".$problema['id']." AND sub = ".$tinta." AND id > $limita ORDER BY id ASC");
							if (mysql_num_rows($subsql))
							while ($subcomentariu = mysql_fetch_array($subsql))	{
								$testare = 1;
								print " <div class='comentariu' style='margin-left : ".($nivel * 75)."px; ' id = 'comentariu-". $subcomentariu['id'] . "'> ";
								print nl2br($subcomentariu['comentariu']);
								$usersql = mysql_query("SELECT * FROM utilizatori WHERE id = ".$subcomentariu['autor']);	$utilizator = mysql_fetch_array($usersql);
								print "<br><h5 style='text-align:left; padding:0; margin:0;'> <input type='button' class='buton' class='com' value = 'Raspundeti!' name='raspundeti' onclick=\"settinta('sub', '".$subcomentariu['id']."')\"> <span style='float:right'>" . $utilizator['nume'] . "<br><span style='font-weight:normal;'>" . dateconvert($subcomentariu['data']). "</span></span> </h5> <br>";
								print "</div> <br>";
								$intrebare = mysql_query("SELECT * FROM comentarii WHERE problema = ".$problema['id']." AND sub = ".$subcomentariu['id']);
								$subramas = $subcomentariu['sub'];
								if ($test = mysql_fetch_array($intrebare))	{
									$tinta = $subcomentariu['id'];	$nivel ++;
									$testare = 0;	$limita = $subcomentariu['id'];
									break;
								}
							}
							else {$subsql = mysql_query("SELECT * FROM comentarii WHERE problema = ".$problema['id']." AND sub = ".$tinta." ORDER BY id DESC");	$subcomentariu =  mysql_fetch_array($subsql); $subramas = $subcomentariu['sub'];}
							if ($testare)	{
								$nivel --;
								$tinta = $subramas; 
								$sqlset = mysql_query("SELECT * FROM comentarii WHERE problema = ".$problema['id']." AND id = ".$tinta);
								$temp = mysql_fetch_array($sqlset);	$tinta = $temp['sub'];	$limita = $temp['id'];
								if ($nivel === 0) 	$ok = 0;
							}
						}
							
					}
					else print "<p>Din pacate, nu exista comentarii pentru aceasta problema inca ... Fii tu primul!</p>";
					print "</div> <hr>";
					print "<input type='button' class='buton' id = 'butoncom' value = 'Afiseaza panoul pentru postare comentariu.' onclick=\"toggle('formular', 'butoncom', 'panoul pentru postare comentariu', 'normal')\" style='	display: inline-block;
	zoom: 1;
	*display: inline;'>";
					print "<div id='formular' style='display:none'>";
					if (session_is_registered('id'))	{
						print "<form method='post' action='/comentariu/' name='coment'>";
						print "<textarea name = 'comentariu' style='width:100%; min-height:100px;'> </textarea>";
						print "<input type='hidden' name='utilizator' value='".$_SESSION['id']."'>";
						print "<input type='hidden' name='problema' value='".$problema['id']."'>";
						print "<input type='hidden' name='sub' value='' id='sub'>";
						print "<input type='submit' class='buton' value='Trimiteti Comentariul!' name='form'>";
						print "</form>";
					}	else print "<h3> Nu sunteti logat. Pentru a putea posta, trebuie sa va <a href='/logare'>logati</a>! </h3>";
					print "</div>";
?>