<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Algorimetrica v1.0 <?php print $htitlu; ?></title>
	<link rel="Shortcut Icon" href="/favicon.ico">
	<LINK href="/date/css/style.css" rel="stylesheet" type="text/css">
	<script type='text/javascript' src='/date/js/calendarDateInput.js'></script>
	<script src="/date/js/functii.js" type="text/javascript"></script>
	<script src="/date/js/jquery.min.js" type="text/javascript"></script>
	<script src="/date/js/jquery.ui.min.js" type="text/javascript"></script>
	<script src="/date/js/jquery.textarea.js" type="text/javascript"></script>
	<script src='/date/js/jquery.js' type='text/javascript'></script>
	<?php detectmobile() ?>
	<?php if ($_COOKIE['latime']) print "<script type='text/javascript' src='/date/js/width.js'></script>"; ?>
</head>
<body class='<?php echo $_COOKIE['culoare'], " ", $_COOKIE['latime'] ?>'>

<div class = "hf" id = "header"><a href='/' id='head'>HOME</a></div>
<div id="nav">
	<div id='navinfo' style='position:absolute; top: 50px; width:100%; text-align:center;'>Meniul de navigare este ascuns acum, pentru a nu te incomoda. Treci cu mouse-ul pe deasupra continutului pentru a arata meniul.</div>
	<ul id='menu'>
		<li id='arhiva'><div><a href='/arhiva/'>Arhiva de Probleme</a></div></li>
		<li id='clasa'>
		<?php 
			if (!$_SESSION[id]) print "<div><a href='javascript:login()'>Logheaza-te mai intai!</a></div>";
			else print "<div><a href='/clasa/'>Clasa</a></div>";
		?></li>
		<li id='stiri'><div><a href='/stiri/'>Stiri</a></div></li>
		<li id='linkuri'><div><a href='/descarcari/'>Descarcari</a> | <a href='/linkuri/'>Lista</a></div></li>
	</ul>
</div>
<div id = "wrapper">
	
	<div class="pagina">
	<div class="coltar" id='sus'>
		<div class="colt" id="stanga-sus"></div>
		<div class="colt" id="dreapta-sus"></div>
	</div><div class="continut"><div id='padding'>
