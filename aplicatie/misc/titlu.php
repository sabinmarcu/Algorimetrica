<?php
if ($str[1] == "arhiva") {
	if ($str[2]) {
		if ($str[2] == "categorie") {
			$sql = mysql_query("SELECT * FROM categorii WHERE id='" . $str[3] . "'");
			$cat = mysql_fetch_array($sql);
			$htitlu .= "| Problemele din categoria " . $cat['nume'];
		}
		else if ($str[2] == "problema") {
			$sql = mysql_query("SELECT * FROM probleme WHERE id='" . $str[3] . "'");
			$pr = mysql_fetch_array($sql);
			$htitlu .= "| " . $pr['titlu'];
		}
	}
	else $htitlu .= "| Lista de Probleme";
}
else if ($str[1] == "clasa")	{
	if (!$_SESSION[id])	$htitlu .= "| Clasa - Nelogat";
	else {
		if ($str[2]) {
			$sql = mysql_query("SELECT * FROM teme WHERE prescurtare='" . $str[2] . "'");
			$pr = mysql_fetch_array($sql);
			$htitlu .= "| Clasa | " . $pr['titlu'];
			if ($str[4]) $htitlu .= "| Intrebarea #" . $str[4];
		}
		else $htitlu .= "| Lista de Probleme din Clasa";
	}
}
else if ($str[1] == "stiri")	{
	if ($str[2])	{
	$sql = mysql_query("SELECT * FROM stiri WHERE id='" . $str[2] . "'");
	$pr = mysql_fetch_array($sql);
	$htitlu .= "| Stiri | " . $pr['titlu'];}
	else $htitlu .= "| Cele mai noi Stiri ";
}
else if ($str[1] == "linkuri")	{
	 $htitlu .= "| Linkuri Utile ";
}
else if ($str[1] == "logare")	{
	if ($_SESSION[id])	$htitlu .= "| Delogare";
	else $htitlu .= "| Logare ";
}
else if ($str[1] == "setari")	{
	$htitlu .= "| Setari ";
	if (!$_SESSION[id])	$htitlu .= "- Nelogat";
}
else if ($str[1] == "admin")	{
	$htitlu .= "| Administratie ";
	if ($str[2] == "categorii")	$htitlu .= "| Categorii ";
	else if ($str[2] == "linkuri")	$htitlu .= "| Linkuri ";
	else if ($str[2] == "stiri")	$htitlu .= "| Stiri ";
}
else $htitlu .= "| Acasa ";
?>