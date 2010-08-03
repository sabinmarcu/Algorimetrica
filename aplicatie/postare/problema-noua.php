<?php
if ($_POST['titlu'])	{	
$titlu = stripslashes($_POST['titlu']); $titlu = mysql_real_escape_string($titlu);
$enunt = stripslashes($_POST['enunt']); $enunt = mysql_real_escape_string($enunt);
$nr = stripslashes($_POST['exemple']); $nr = mysql_real_escape_string($nr);
print_r($_POST);
for ($i = 1; $i <= $nr - 1; $i++)	{
	$aux = stripslashes($_POST["exemplu-$i"]); $aux = mysql_real_escape_string($aux);
	if ($aux)
	$exemple = $exemple . $aux . " //-- "; 
	$aux = stripslashes($_POST["rezultat-$i"]); $aux = mysql_real_escape_string($aux);
	if ($aux)
	$rezultate = $rezultate . $aux . " //-- "; 
}
$rezolvarec = stripslashes($_POST['rezolvare-c']); $rezolvarec = mysql_real_escape_string($rezolvarec);
$rezolvarep = stripslashes($_POST['rezolvare-p']); $rezolvarep = mysql_real_escape_string($rezolvarep);
$rezolvarev = stripslashes($_POST['rezolvare-v']); $rezolvarev = mysql_real_escape_string($rezolvarev);
$categorii = stripslashes($_POST['categorii']); $categorii = mysql_real_escape_string($categorii);
$autor = stripslashes($_POST['autor']); $autor = mysql_real_escape_string($autor);
$sql = mysql_query("
INSERT INTO 
probleme 
(autor, titlu, enunt, exemple, rezultate, rezolvarec, rezolvarep, rezolvarev, categorii, data) 
VALUES
('$autor', '$titlu', '$enunt', '$exemple', '$rezultate', '$rezolvarec', '$rezolvarep', '$rezolvarev', '$categorii', now() )"
);
if ($sql) 	$_SESSION['mesaj'] = "succes"; 
else $_SESSION['mesaj'] = "esec";
header ("Location:/arhiva/");}
else {	

	print"<script type='text/javascript'>var exemple = 1; var cat = new Array(101); cat[0] = 0;</script>";
	 if (session_is_registered('username'))	{
	 if (session_is_registered('mesaj'))	{
		if ($_SESSION['mesaj'] == 'succes')	
			$msg = " <div class='raspuns' id='pozitiv'> Problema a fost postata cu succes ! </div>"; 
		else
			$msg = " <div class='raspuns' id='negativ'> Ne cerem scuze, a intervenit o eroare, iar problema nu a putut fi postata! </div>"; 
		unset($_SESSION['mesaj']);
	}
	print $msg . "
	<form method='post' action='/problema-noua/' name='adauga'> 
		<h1> Adauga o Problema </h1>
		<h3> Introduceti datele necesare pentru inregistrarea problemei. </h3>
		<br>
		<h5 style='padding : 0; margin : 0 10%; text-align:left;'>
		<div class='bg' onclick=\"toggle('titlu')\"> Titlul Problemei</div> <div class='subcontinut' id='titlu' > <input type='text' name='titlu' style='width:100%'> </div> <div class='bgb'></div>
		<div class='bg' onclick=\"toggle('enunt')\"> Enuntul problemei </div>  <div class='subcontinut' id='enunt' style='display:none'> <textarea name='enunt' style='max-width:700px; min-width:700px'></textarea> </div><div class='bgb'></div> 
		<div class='bg' onclick=\"toggle('exemple')\"> Exemple si Rezultate </div>  <div class='subcontinut' id='exemple' style='display:none'> <input type='button' onclick='insereaza(\"exemple\");' value='Adauga inca un exemplu' class='buton' /> <br><br> <div style='text-align:center'>1<input type='text' class='enunt' name='exemplu-1' style='width:45%; float:left;'><input type='text' class='rezultat' name='rezultat-1' style='width:45%; float:right;'> </div> <br> <br>  </div><div class='bgb'></div>
		<div class='bg' onclick=\"toggle('rezolvari')\"> Rezolvari </div>  <div class='subcontinut' id='rezolvari' style='display:none'> <h6> Rezolvare in C++ </h6> <textarea name='rezolvare-c' style='max-width:700px; min-width:700px'></textarea> <br><h6> Rezolvare in Pascal </h6> <textarea name='rezolvare-p' style='max-width:700px; min-width:700px'></textarea> <br><h6> Rezolvare in Visual Basic </h6> <textarea name='rezolvare-v' style='max-width:700px; min-width:700px'></textarea> </div> <div class='bgb'></div>
		<div class='bg' onclick=\"toggle('categorii')\"> Categorii </div>  <div class='subcontinut' id='categorii' style='display:none; text-align:center;'>";
			$sql = mysql_query("SELECT * FROM categorii");
			while ($categorie = mysql_fetch_array($sql))	
				print " <a onclick=\"settinta('pcat', '".$categorie['id']."')\"><div class='categorie' id='buton".$categorie['id']."'>".$categorie['nume']."</div></a>";
			print" </div> <div class='bgb'></div> 				
			<input type='submit' name='Submit' value = 'Adauga Problema !' class='buton' style='width:400px; float:right' id='buton'></h5><hr><br><br>
	<input type='hidden' name='exemple' id='nrex' value='1' >
	<input type='hidden' name='categorii' id='pcat' value='' >
	<input type='hidden' name='autor' value='" . $_SESSION['id'] . "'>
	</form><br>";
	}
	else print " <div style='text-align:center'> <h6 style='font-size:35px; padding:25; color:#999999'> Nu sunteti Logat. Pentru a putea posta o problema, trebuie sa va <a href='/logare/'> Logati </a> ori sa va <a href='/inregistrare'> Inregistrati </a> </h6> </div>";
}
?>