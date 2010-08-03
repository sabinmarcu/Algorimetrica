<?php
$sql = mysql_query("SELECT * FROM linkuri");
include 'rec.php';
$nr = 4;
print "<h1>Link-uri utile</h1>";
while ($link = mysql_fetch_array($sql))	{
	$nr++;
	print "<div class='bloc colorat' id='p".$nr."' onclick=\"descriere('".$nr."')\"><div class='element' style='text-size:13pt;'>".$link[nume]."</div><div class='subelement'>";
	if ($link[acceptata])	print "<a href='".$link[adresa]."'>Acceseaza Site-ul</a>";
	else print "Site-ul nu a fost verificat <br> In acest moment el este doar vizibil, dar nu si accesibil.";
	print "</div></div>";
	print "<div class='descriere' id = 'd".$nr."'>".$link[descriere]."</div>";
}
print "<script type='text/javascript'>for (i = 1; i <= ".$nr."; i++) document.getElementById('d'+i).style.display = 'none'</script>";
print "<h6 onclick=\"toggle('adauga')\" id='click' style='margin-top: 50px;'> Adauga Link Nou </h6> ";
print "<div id='adauga' style='padding:25px'><hr><br><br>";
print "<form action = '/link-nou/' method='post'><h5> Nume Website </h5><input type='text' style='width:100%' name='nume'><h5> Adresa Website </h5><input type='text' style='width:100%' name='adresa'><h5> Cate ceva despre acest site (optional) : </h5><textarea name='descriere' style='width:100%' COLS=100 ROWS=10></textarea><br><input type='Submit' name='form' value='Trimiteti Site-ul' style='float:right'></form>";
print "<br><br><hr></div>";
print "<script type='text/javascript'>document.getElementById('adauga').style.display = 'none'</script>";
?>