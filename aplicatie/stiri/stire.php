<?php
$sql = mysql_query("SELECT * FROM stiri WHERE id = '".$str[2]."'");
$stiri = mysql_fetch_array($sql);
$sql = mysql_query("SELECT * FROM stiri WHERE id = ".($str[2] - 1));
$aux = mysql_fetch_array($sql);		$prev = $aux['titlu']; $previd = $aux['id'];
$sql = mysql_query("SELECT * FROM stiri WHERE id = ".($str[2] + 1));
$aux = mysql_fetch_array($sql);		$post = $aux['titlu']; $postid = $aux['id'];
if ($previd)	print"<span style='float:left'><a href='/stiri/".$previd."'>&lArr; ".$prev."</a></span>";
else	print"<span style='float:left'><a href='/stiri/'>&lArr; Inapoi la Lista</a></span>";
if ($postid)	print"<span style='float:right'><a href='/stiri/".$postid."'>".$post." &rArr;</a></span>";
else	print"<span style='float:right'><a href='/stiri/'>Inapoi la Lista &rArr;</a></span>";
print "<h1>".$stiri['titlu']."</h1>";
print "<p style='text-align:left; line-height: 1.05em; margin-bottom: 50px;'><pre>".$stiri['detalii']."</pre>";
print "<span style='float:right'>Stire adaugata ".dateconvert($stiri['data'])."</span>";
$sql = mysql_query("SELECT * FROM utilizatori WHERE id = '".$stiri['autor']."'");
$autor = mysql_fetch_array($sql);
print "<span style='float:left'>Stire adaugata de <a href='/registru/utilizator/".$autor['id']."'>".$autor['nume']."</a></span>";
print "<script type='javascript'>
	$('.subart').show();
	$('.art').animate({width: '100%'}, 100);
  	$('.subart').animate({opacity: 1, height: '100%'}, 100);
  	</script>";
?> 