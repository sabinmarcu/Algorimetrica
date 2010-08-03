<?php
if ($str[1] == "inregistrare") print "<body style='background : #DDD; font-family:Gill Sans, Lucida Grande, Sagoe Ui, Arial; padding:25px'><LINK href='/date/css/style.css' rel='stylesheet' type='text/css'/><script src='/date/js/functii.js' type='text/javascript'></script><script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js' type='text/javascript'></script>";
print "<form method='post' action='/inregistrare/'> 
		<h2> Introduceti datele necesare pentru inregistrare </h2>
			  	<h5>Numele de utilizator   :</h5>
			  	<input type='text' name='username' style='width:100%'>  
			 	<h5> Numele adevarat   :  </h5>
			 	<input type='text' name='nume' style='width:100%'>  
			  	<h5>Parola   :  </h5> 
			  	<input type='password' name='parola' style='width:100%'>  
				 <h5> Repeta Parola   :   </h5>
			 	<input type='password' name='re-parola' style='width:100%'>  
			  	<h5>Adresa de E-Mail   :   </h5>
			  	<input type='text' name='mail' style='width:100%'>  
			  	<h5>Cate ceva despre tine   : </h5>
			    <textarea name='descriere' style='width:100%; max-width:100%; min-width:100%;'> </textarea> 
			 	<h5> Website   :   </h5>
			 	<input type='text' name='website' style='width:100%'>   ";
print "  <h5>Liceul / Scoala ta   :</h5>";
if ($str[1] == "inregistrare-clasica")
print "Avem aici o mica problema. Pentru ca nu vrei sa accepti JavaScript, nu pot face o sortare corespunzatoare a claselor si liceelor. Prin urmare, clasele apar in ordinea liceelor. Deci, daca ai avea in lista de licee : Liceu 1, Liceu 2, Liceu 3 ... listele urmatoare vor aparea asa : Lista pentru Liceul 1, Lista pentru Liceul 2, Lista pentru Liceul 3, si tot asa.";
print"   <select name='licee' style='width:100%' onchange=\"verifica('liceu', this);\" >";
$sql = mysql_query("SELECT * FROM licee ORDER BY nume ASC");				
while ($liceu = mysql_fetch_array($sql))
	print "<option value = '".$liceu['id']."'>".$liceu['nume']."</option>";
				
print "<option value='0'>Nici un Liceu (fac o cerere mai tarziu)</option></select> ";
print "  <h5>Clasa din care faci parte   :</h5>   ";
$sql = mysql_query("SELECT * FROM licee ORDER BY nume ASC");
$i = 0;				
while ($liceu = mysql_fetch_array($sql))	{
	if ($i)
		print "<select name='clasa".$liceu['id']."' id='clasa".$liceu['id']."' style='width:100%; display:none' onchange=\"verifica('clasa0', this);\" >";
	else print "<select name='clasa".$liceu['id']."' id='clasa".$liceu['id']."' style='width:100%; display:block;' >";
	$aux = mysql_query("SELECT * FROM clase WHERE liceu = '".$liceu['id']."' ORDER BY nume DESC");
	while ($clasa = mysql_fetch_array($aux))
		print "<option value='".$clasa['id']."'>".$clasa['nume']."</option>";	
	print "<option value='0'>Nici o Clasa (fac o cerere mai tarziu)</option></select>";			
		$i++;	
}
	print "<select name='clasa0' id='clasa0' style='width:100%'; display:none'><option value='0'>Nici o Clasa (fac o cerere mai tarziu)</option></select><br><div id='clasa0'></div><input type='hidden' id='nrclase' value='1'/>  ";			
	print "       <input type='submit' name='form' value = 'Inregistreaza-te'>  
	</form> ";
if ($str[1] == "inregistrare") print "<hr></body>";
?>