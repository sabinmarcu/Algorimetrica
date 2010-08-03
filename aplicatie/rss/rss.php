<?php
	$rss = new RSS2Writer('Ultimile Probleme', 'Fiti la curent cu cele mai noi probleme de pe Algorimetrica', 'http://algorimetrica.co.cc/arhiva/');
	$rss->addCategory("RSS Feed");
	$rss->addElement('copyright', '(c) Marcu Sabin 2010');
	$sql = mysql_query("SELECT * FROM probleme ORDER BY data DESC LIMIT 15");
	while ($problema = mysql_fetch_array($sql))	{
		$rss->addItem($problema['titlu'], $problema['enunt'], "http://algorimetrica.co.cc/arhiva/".$problema['id']);
		$sqlaux = mysql_query("SELECT * FROM utilizatori WHERE id=".$problema['autor']);
		$aux = mysql_fetch_array($sqlaux);
		$rss->addElement('author', $aux['mail']." (".$aux['nume'].")");
		$rss->addElement('pubDate', date("r", strtotime($problema[data])));
		$aux = explode(", ", $problema['categorii']);
		for ($i = 0; $i <= count($aux) - 1; $i++)	{
			$sqlaux = mysql_query("SELECT * FROM categorii WHERE id = " . $aux["$i"]);
			$categorie = mysql_fetch_array($sqlaux);
			$rss->addCategory($categorie['nume']);
		}
	}
	echo $rss->getXML();				
?>