<?php 
	$str = $_SERVER[REDIRECT_URL];
	$pb = substr($str, 7);
	$pos = strpos($pb, "/");
	$pb = substr($pb, 0, $pos);
	$str = str_replace("/clasa/" . $pb . "/intrebare/", "", $str);
	$pos = strpos($str, "/");
	$str = substr($str, 0, $pos);
	$sql = mysql_query("SELECT * FROM teme WHERE prescurtare = '".$pb."'");
	$aux = mysql_fetch_array($sql);
	$pb = $aux['id'];
	$get = mysql_real_escape_string($str);  $pb = mysql_real_escape_string($pb);
	$sql = mysql_query("SELECT * FROM intrebari WHERE numar = " . $get . " AND tema = " . $pb);
	$intrebare = mysql_fetch_array($sql);	if ($intrebare['id']){
	$sql = mysql_query("SELECT * FROM intrebari WHERE numar = ".($get - 1) . " AND tema = " . $pb);
	$aux = mysql_fetch_array($sql);		$prev = $aux['intrebare']; $previd = $aux['numar'];
	$sql = mysql_query("SELECT * FROM intrebari WHERE numar = ".($get + 1) . " AND tema = " . $pb);
	$aux = mysql_fetch_array($sql);		$post = $aux['intrebare']; $postid = $aux['numar'];
	



		if ($previd)	print"<span style='float:left'><a href='/clasa/".$pb."/intrebare:".$previd."'>&lArr; ".$prev."</a></span>";

		else	print"<span style='float:left'><a href='/clasa/".$pb."'>&lArr; Inapoi la Lista</a></span>";

		if ($postid)	print"<span style='float:right'><a href='/clasa/".$pb."/intrebare:".$postid."'>".$post." &rArr;</a></span>";

		else	print"<span style='float:right'><a href='/clasa/".$pb."'>Inapoi la Lista &rArr;</a></span>";

			$data = dateconvert($intrebare['data']);$usersql = mysql_query("SELECT * FROM utilizatori WHERE id = ".$intrebare['autor']);	$autor = mysql_fetch_array($usersql);

		print "<br><br><div class='bloc inchis'><h3 style='text-indent:50px; line-height:0.5em;'>" . $intrebare['intrebare'] . "<h6 style='float:right'>" . $data . "</span></h6></h3><hr/><div class='element'><h4>" . $intrebare['rezumat'] . "</h4></div><hr/><h6 style='float:right; font-size:10pt'>" . $autor['nume'] . "</h6><br/><br/></div>";

			print " <h4> Comentarii : </h4> ";

			print " <div id = 'comentarii-main'> ";							

			$sql = mysql_query("SELECT * FROM comentarii WHERE intrebare = ".$intrebare['id']." AND sub = 0 ORDER BY sub DESC");

			while ($comentariu = mysql_fetch_array($sql))	{

				print " <div class='comentariu' id = 'comentariu-". $comentariu['id'] . "' >";

				print nl2br($comentariu['comentariu']);

				$usersql = mysql_query("SELECT * FROM utilizatori WHERE id = ".$comentariu['autor']);	$utilizator = mysql_fetch_array($usersql);

				print " <br><h5 style='text-align:left; padding:0; margin:0;'> <input type='button' class='buton' value = 'Raspundeti!' class='com' name='raspundeti' onclick=\"settinta('sub', '".$comentariu['id']."')\"> <span style='float:right'><a href='/registru/?utilizator=".$utilizator['id']."'>" . $utilizator['nume'] . "</a></span> </h5> <br>";						print "</div> <br>"; 	$ok = 1;	$tinta = $comentariu['id'];		$nivel = 1;	$limita =  $comentariu['id'];

				while ($ok)	{

					$testare = 1;	

					$subsql = mysql_query("SELECT * FROM comentarii WHERE intrebare = ".$intrebare['id']." AND sub = ".$tinta." AND id > $limita ORDER BY id ASC");

					if (mysql_num_rows($subsql))

					while ($subcomentariu = mysql_fetch_array($subsql))	{

						$testare = 1;

						if ($nivel > 5)	$nivel --;

						print " <div class='comentariu' style='margin-left : ".($nivel * 75)."px; ' id = 'comentariu-". $subcomentariu['id'] . "'> ";

						print nl2br($subcomentariu['comentariu']);

						$usersql = mysql_query("SELECT * FROM utilizatori WHERE id = ".$subcomentariu['autor']);	$utilizator = mysql_fetch_array($usersql);

						print "<br><h5 style='text-align:left; padding:0; margin:0;'> <input type='button' class='buton' class='com' value = 'Raspundeti!' name='raspundeti' onclick=\"settinta('sub', '".$subcomentariu['id']."')\"> <span style='float:right'><a href='/registru/?utilizator=".$utilizator['id']."'>" . $utilizator['nume'] . "</a></span> </h5> <br>";

						print "</div> <br>";

						$daca= mysql_query("SELECT * FROM comentarii WHERE intrebare = ".$intrebare['id']." AND sub = ".$subcomentariu['id']);

						$subramas = $subcomentariu['sub'];

						if ($test = mysql_fetch_array($daca))	{

							$tinta = $subcomentariu['id'];	$nivel ++;

							$testare = 0;	$limita = $subcomentariu['id'];

							break;

						}

					}

					else {$subsql = mysql_query("SELECT * FROM comentarii WHERE intrebare = ".$intrebare['id']." AND sub = ".$tinta." ORDER BY id DESC");	$subcomentariu =  mysql_fetch_array($subsql); $subramas = $subcomentariu['sub'];}

					if ($testare)	{

						$nivel --;

						$tinta = $subramas; 

						$sqlset = mysql_query("SELECT * FROM comentarii WHERE intrebare = ".$intrebare['id']." AND id = ".$tinta);

						$temp = mysql_fetch_array($sqlset);	$tinta = $temp['sub'];	$limita = $temp['id'];

						if ($nivel === 0) 	$ok = 0;

					}

				}



			}

			print "</div> <hr>";

			print "<input type='button' class='buton' id = 'butoncom' value = 'Afiseaza panoul pentru postare comentariu.' onclick=\"toggle('formular', 'butoncom', 'panoul pentru postare comentariu', 'normal')\" style='	display: inline-block;

		zoom: 1;

		*display: inline;'>";

			print "<div id='formular' style='display:none'>";

			if (session_is_registered('id'))	{

				print "<form method='post' action='/comentariu/' name='coment'>";

				print "<textarea name = 'comentariu' style='width:100%; min-height:100px;'> </textarea>";

				print "<input type='hidden' name='utilizator' value='".$_SESSION['id']."'>";

				print "<input type='hidden' name='intrebare' value='".$intrebare['id']."'>";

				print "<input type='hidden' name='tema' value='".$pb."'>";

				print "<input type='hidden' name='sub' value='' id='sub'>";

				print "<input type='submit' class='buton' value='Trimiteti Comentariul!' name='form'>";

				print "</form>";

			}	else print "<h3> Nu sunteti logat. Pentru a putea posta, trebuie sa va <a href='/logare'>logati</a>! </h3>";

			print "</div><hr>";
	} else include 'aplicatie/misc/404.php';

	
	

	



	?>
