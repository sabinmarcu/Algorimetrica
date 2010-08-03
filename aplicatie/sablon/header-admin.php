
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Algorimetrica v1.0 <?php print $htitlu; ?></title>
	<link rel="Shortcut Icon" href="/favicon.ico">
	<LINK href="/date/css/style.css" rel="stylesheet" type="text/css"/>
	<script type='text/javascript' src='/date/js/calendarDateInput.js'></script>
	<script src="/date/js/functii.js" type="text/javascript"></script>
	<script src="/date/js/jquery.min.js" type="text/javascript"></script>
	<script src="/date/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="/date/js/jquery.textarea.js" type="text/javascript"></script>
	<script src='/date/js/jquery.js' type='text/javascript'></script>
	<?php mobiledetect() ?>
</head>
<body class='admin <?php echo $_COOKIE['culoare'] ?>'>
</script>
<a href='/'><div class = "hf" id = "header">HOME</div></a>
	
<div class='pagina sidebar'>
<div class="coltar" id='sus'>
	<div class="colt" id="stanga-sus"></div>
	<div class="colt" id="dreapta-sus"></div>
</div>
<div class="continut">
<?php include "aplicatie/admin/meniu.php" ?>
</div>
<div class="coltar" id='jos'>
	<div class="colt" id="stanga-jos"></div>
	<div class="colt" id="dreapta-jos"></div>
</div>	
</div>
	
<div id = "wrapper">
<div id="nav">
	<ul id='menu'>
		<li id='arhiva'><a href='/arhiva/'><div>Arhiva de Probleme</div></a></li>
		<li id='clasa'>
		<?php 
			if (!$_SESSION[id]) print "<a href='javascript:login()'><div>Logheaza-te mai intai!</div></a>";
			else print "<a href='/clasa/'><div>Clasa</div></a>";
		?></li>
		<li id='stiri'><a href='/stiri/'><div>Stiri</div></a></li>
		<li id='linkuri'><a href='/linkuri/'><div><a href='/descarcari/'>Descarcari</a> | <a href='/linkuri/'>Lista</a></div></li>
	</ul>
</div>
	
	<div class="pagina">
	<div class="coltar" id='sus'>
		<div class="colt" id="stanga-sus"></div>
		<div class="colt" id="dreapta-sus"></div>
	</div><div class="continut"><div id='padding'>
