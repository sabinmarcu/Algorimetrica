<?php 
if ($_POST)	{
	switch ($_POST['formular'])	{
			
	case "parola" :
		$parola = mysql_real_escape_string($_POST['parola-curenta']);
		$parolare = mysql_real_escape_string($_POST['parola-curenta-re']);
		$id = mysql_real_escape_string($_SESSION['id']);
		if (md5($parola) == $_SESSION['parola'])	{
			if ($parola == $parolare)	{
				$sql = mysql_query("UPDATE utilizatori SET parola = '" . md5($parola) . "'	WHERE id = '". $id . "'");
				if ($sql)	{
					$msg = "<div class='raspuns' id='pozitiv'> Simon spune : Am reusit sa actualizez Parola. Noua parola este : <br> <div style='padding: 25; margin: 10 auto; border: dashed 1px #AAAAAA'>" . $parola . "</div> </div>";
					$_SESSION['parola'] = md5($parola);
				}
				else $msg = "<div class='raspuns' id='negativ'> Simon spune : Parola este in regula, dar nu am reusit sa o actualizez. Mai incearca. </div>";
			}
			else $msg = "<div class='raspuns' id='negativ'> Simon spune : Parolele introduse nu coincid. </div>";
		}
		else	$msg = "<div class='raspuns' id='negativ'> Simon spune : Nu-ti mai amintesti parola personala? Mai incearca. </div>";
	break;	
	
	case "descriere"	:
		$semnatura = mysql_real_escape_string($_POST['descriere']);
		$id = mysql_real_escape_string($_SESSION['id']);
		$sql = mysql_query("UPDATE utilizatori SET descriere = '" . $semnatura . "'	WHERE id = '". $id . "'");
		if ($sql)	{
			$msg = "<div class='raspuns' id='pozitiv'> Simon spune : Am reusit sa actualizez descrierea. Noua descirere este  :<br> <div style='padding: 25; margin: 10 auto; border: dashed 1px #AAAAAA'>" . nl2br($semnatura) . "</div> </div>";
			$_SESSION['semnatura'] = $semnatura;
		}
		else $msg = "<div class='raspuns' id='negativ'> Simon spune : Descrierea este in regula, dar nu am reusit sa o actualizez. Mai incearca. </div>";
		break;
		
	case "site"	:
		$site = mysql_real_escape_string($_POST['site']);
		$id = mysql_real_escape_string($_SESSION['id']);
		$sql = mysql_query("UPDATE utilizatori SET site = '" . $site . "'	WHERE id = '". $id . "'");
		if ($sql)	{
			$msg = "<div class='raspuns' id='pozitiv'> Simon spune : Am reusit sa actualizez site-ul. Noul site este  :<br> <div style='padding: 25; margin: 10 auto; border: dashed 1px #AAAAAA'>" . $site . "</div> </div>";
			$_SESSION['website'] = $site;
		}
		else $msg = "<div class='raspuns' id='negativ'> Simon spune : Site-ul este in regula, dar nu am reusit sa il actualizez. Mai incearca. </div>";
		break;
		
			
	case "mail"	:
		$mail = mysql_real_escape_string($_POST['mail']);
		$id = mysql_real_escape_string($_SESSION['id']);
		$sql = mysql_query("UPDATE utilizatori SET mail = '" . $mail . "'	WHERE id = '". $id . "'");
		if ($sql)	{
			$msg = "<div class='raspuns' id='pozitiv'> Simon spune : Am reusit sa actualizez Adresa de E-mail. Noua Adresa de E-mail este  :<br> <div style='padding: 25; margin: 10 auto; border: dashed 1px #AAAAAA'>" . $mail . "</div> </div>";
			$_SESSION['mail'] = $mail;
		}
		else $msg = "<div class='raspuns' id='negativ'> Simon spune :  Adresa de E-mail este in regula, dar nu am reusit sa o actualizez. Mai incearca. </div>";
		break;
			
	}
}
else $msg = "<div class='raspuns' id='pozitiv'>Incearca sa modifici ceva ... un rezultat va aparea in aceasta caseta.</div>";


print "<style> p{text-align:left} </style>";
print "	<h2> Bine ai revenit, " . $_SESSION['username'] . "</h2> " . $msg . "<h4> Aici vei putea modifica setarile specifice tale. </h4>";
print"<form method=\"post\" action=\"/setari/\" name='parola'>
<div class='art'><div class='text'>Parola</div><div class='subart' id='parola'><h5>Introduceti parola curenta : </h5>	
<input type=\"password\" name=\"parola-curenta\" value=\"\" style=\"width:100%\"/> <br> 
<h5 style='display: inline-block;'>Introduceti parola noua : 	</h5>
<h5 style='display: inline-block; float:right;'>Reintroduceti parola noua : 		</h5>
<br>
<input type=\"password\" name=\"parola-noua\" value=\"\" style=\"width:45%; display: inline-block;\"/> 
<input type=\"password\" name=\"parola-noua-re\" value=\"\" style=\"width:45%; display: inline-block; float:right;\"/>
<br><div style='text-align:right'><input type='submit' name='Submit' value='Actualizeaza Parola'></div></div></div>
<input type='hidden' value='parola' name='formular' /></form>";
print"<form method=\"post\" action=\"/setari/\" name='descriere'>
<div class='art' ><div class='text'>Cate ceva despre tine</div><div class='subart' id='descriere'><h5>Scrie cate ceva despre tine. Poate aflam si noi, restul cate ceva despre tine.</h5><textarea name='semnatura' style='height: 100px; margin : 10; width:100%'>"; 
$sql = mysql_query("SELECT * FROM utilizatori WHERE id = " . $_SESSION['id']); 
$aux = mysql_fetch_array($sql); print $aux['descriere']."</textarea>
<div style='text-align:right'><input type='submit' name='Submit' value='Actualizeaza Semnatura'></div></div></div>
<input type='hidden' value='descriere' name='formular' /></form>";
print"<div class='art'><div class='text'>Site-ul Tau</div><div class='subart' id='site'>
<h5>Site-ul tau este : <a href='".$_SESSION['website']."'>". $_SESSION['website']." </a></h5><p>Daca doresti sa-l schimbi, introdu unul nou</p>
<form method=\"post\" action=\"/setari/\" name='website'>	
<input type=\"text\" name=\"site\" value=\"\" style=\"width:100%\"/> 
<br> 
<div style='text-align:right'><input type='submit' name='Submit' value='Actualizeaza Site-ul'></div></div></div>
<input type='hidden' value='site' name='formular' /> </form>";
print"<div class='art'><div class='text'>Adresa ta de E-Mail</div><div class='subart'><h5>Adresa ta este : <a href='mailto:".$_SESSION['mail']."'>".$_SESSION['mail']."</a><p>Daca vrei sa o modifici, introdu alta noua.</p>
<form method=\"post\" action=\"/setari/\" name='e-mail'>	
<input type=\"text\" name=\"mail\" value=\"\" style=\"width:100%\"/> 
<br> 
<div style='text-align:right'><input type='submit' name='Submit' value='Actualizeaza Adresa de E-mail'></div></div></div>
<input type='hidden' value='mail' name='formular' /></form>";		
			?>