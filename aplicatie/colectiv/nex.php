<?php
if (!session_is_registered("username"))	 print " <div style='text-align:center'> <h6 style='font-size:35px; padding:25; color:#999999'> Nu sunteti Logat. Pentru a accesa aceasta sectiune, trebuie sa va <a href='/logare-clasica' class='log'> Logati </a> ori sa va <a href='/inregistrare-clasica/' class='reg'> Inregistrati </a> </h6> </div>";
else if (!$_SESSION[liceu])	{
print "<h2> Cere inregistrarea unui nou liceu </h2>";
print "<p> In regula, te-ai inregistrat, dar nu ai gasit scoala ta. Uite cum facem, scri o mica cerere acum, nimic pretentios, noi ne gandim, si daca totul e in regula, vom inregistra scoala ta, si de atunci poti sa faci ce vrei </p><p> Tine minte doar, la descriere, nu uita sa mentionezi numele directorului scolii pentru a verifica scoala. De asemenea, daca esti doar elev la acea scoala, atunci mentioneaza si numele profesorului. De asemenea, daca ai mentiona si adresele de e-mail ale acestor persoane ne-ai scuti pe toti de cateva mailuri inutile. </p>";
print "<form method='post' action='/mail/liceu/'>";
print "<input type='hidden' name='autor' value='".$_SESSION[id]."' />";
print "<h4> Numele Scolii : </h4> <input type='text' name='nume' style='width:100%'/>";
print "<h4> Descrie, in cateva cuvinte, Scoala ta : </h4> <textarea name='descriere' style='width:100%'></textarea>";
print "<input type='submit' name='form' value='Trimite Cerere' />";
print "</form>";
print "<p> O zi buna !</p>";
}
else if (!$_SESSION[clasa] || $_SESSION['clasa'] == '-1')	{
print "<h2> Cere inregistrarea unui noi clase </h2>";
print "<p> Uite cum sta treaba : Daca apartii unei scoli, sigur apartii si unei clase. O clasa are cel putin 20 de elevi. Cel putin inca 2 dintre ei pot fi convinsi sa foloseasca site-ul. In plus, Fiecare clasa are un profesor. Deci, pentru ca o clasa sa fie inscrisa in baza de date, trebuie sa aiba 4 sustinatori. Tu, inca 2 colegi, si profesorul de la clasa. Totusi, daca sunteti chiar profesorul, atunci convingeti 3 elevi sa va sustina cererea. Bineinteles, am uitat esentialul. Faceti o cerere, sau sustineti una deja propusa, si asteptati sa se rezolve propunerea. Alegeti cu grija totusi. Nu exista decat o singura sansa sa intrati intr-o clasa. Nu veniti dupa aceea sa cersiti o a doua sansa.</p><p> In plus, la descriere adaugati si voi o mica descriere a clasei tale, si mentioneaza numele / adresa de e-mail a profesorului. Eventual, mentioneaza username-ul profesorului aici pe algorimetrica.</p>";
if ($_SESSION[clasa] != '-1'){
print "<form method='post' action='/mail/liceu/'>";
print "<input type='hidden' name='autor' value='".$_SESSION[id]."' />";
print "<h4> Numele Clasei (numarul) : </h4> <input type='text' name='nume' style='width:100%'/>";
print "<h4> Descrie, in cateva cuvinte, Clasa ta : </h4> <textarea name='descriere' style='width:100%'></textarea>";
print "<input type='submit' name='form' value='Trimite Cerere' />";
print "</form>";
print "<br><br><hr><br><h4> Cereri deja propuse : </h4>";}
$sql = mysql_query("SELECT * FROM cereri WHERE tip = 1 AND optional = '".$_SESSION[liceu]."' ORDER BY id ASC");
$nr = 0;
while ($cerere = mysql_fetch_array($sql))	{
	$nr++;
	$sustinatori = explode(",", $cerere[sustinatori]);
	print "<div class='bloc colorat' id='p".$nr."' onclick=\"descriere('".$cerere[id]."')\"><div class='element' style='text-size:13pt;'>".$cerere[subiect]."</div><div class='subelement'>".count($sustinatori)."/3 ";
	if ($_SESSION[clasa] != '-1' && count($sustinatori) < 3)
	print "<form method='post' action='/cerere/liceu/'><input type='hidden' name='clasa' value='".$cerere[id]."' /><input type='submit' name='form' value='Sustine Cererea' style=' margin:0; padding:0; border:none; background:none; cursor:pointer;'/></form>";
	else print "Nu poti aplica la aceasta clasa.";
	print "</div></div>";	
	print "<div class='descriere' id = 'd".$cerere[id]."'><h4> Cate ceva despre cerere </h4><pre>".$cerere[continut]."</pre><h4> Sustinatori : </h4><ul>";
	for ($i = 0; $i <= count($sustinatori) - 1; $i++)	{
		$sustinatori[$i] = str_replace(" ", "", $sustinatori[$i]);
		$sqlaux = mysql_query("SELECT * FROM utilizatori WHERE id = '".$sustinatori[$i]."'");
		$aux = mysql_fetch_array($sqlaux);
		print "<li><a href='/registru/utilizator/".$aux[id]."'>".$aux[nume]."</a></li>";
	}
	print "</ul></div>";print "<script type='text/javascript'>$('.descriere').hide()</script>";
}


print "<p> O zi buna !</p>";}
else {
$str = $_SERVER[REDIRECT_URL];
if (strpos($str, "intrebare"))include 'intrebare.php';
else if ($str == "/clasa/") include 'lista.php';
else include 'problema.php';

}
?> 