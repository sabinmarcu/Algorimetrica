<?php
$str = substr($_SERVER[REDIRECT_URL], 20);
$str = str_replace("/", "", $str);

$get = mysql_real_escape_string($str); 
$get = mysql_real_escape_string($get);
$sql = mysql_query("SELECT * FROM utilizatori WHERE id = " . $get);	$utilizator = mysql_fetch_array($sql);
$sql = mysql_query("SELECT * FROM licee WHERE id = " . $utilizator['liceu']);	$liceu = mysql_fetch_array($sql);
$sql = mysql_query("SELECT * FROM clase WHERE id = " . $utilizator['clasa']);	$clasa = mysql_fetch_array($sql);


print " <h1> " . $utilizator['nume'] . " <span style='float:right; font-size:15;'> (" . $utilizator['utilizator'] . ") </span> </h1> <hr><h4> Cate ceva despre acest utilizator : </h4> <pre><h5> " . $utilizator['descriere'] . " </h5></pre>";
print "<hr><h4> Website : <span style='float:right'><a href='".$utilizator['site']."'>".$utilizator['site']."</a></span></h4>";
print "<hr><h4> Mail : <span style='float:right'><a href='mailto:".$utilizator['mail']."'>".$utilizator['mail']."</a></span></h4>";
print "<hr><h4> Liceu / Scoala : <span style='float:right'><a href='/registru/scoala/".$liceu['id']."'>".$liceu['nume']."</a></span></h4>";
print "<hr><h4> Clasa : <span style='float:right'><a href='/registru/clasa/".$clasa['id']."'>".$clasa['nume']."</a></span></h4>";
print "<hr>";


?>