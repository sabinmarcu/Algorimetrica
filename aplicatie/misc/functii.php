<?php
function dateconvert($date)	{
	$date = strtotime($date);
	$zi = date("l", $date);
	$numzi = date("j", $date);
	$luna = date("F", $date);
	$an = date("Y", $date);
	switch ($zi)	{
		case "Monday" :	$zi = "Luni";	break;
		case "Tuesday" :	$zi = "Marti";	break;
		case "Wednesday" :	$zi = "Miercuri";	break;
		case "Thursday" :	$zi = "Joi";	break;
		case "Friday" :	$zi = "Vineri";	break;
		case "Saturday" :	$zi = "Sambata";	break;
		case "Sunday" :	$zi = "Duminica";	break;
	}
	switch ($luna)	{
		case "January" :	$luna = "Ianuarie";	break;
		case "February" :	$luna = "Februarie";	break;
		case "March" :	$luna = "Martie";	break;
		case "April" :	$luna = "Aprilie";	break;
		case "May" :	$luna = "Mai";	break;
		case "June" :	$luna = "Iunie";	break;
		case "July" :	$luna = "Iulie";	break;
		case "August" :	$luna = "August";	break;
		case "September" :	$luna = "Septembrie";	break;
		case "October" :	$luna = "Octombrie";	break;
		case "November" :	$luna = "Noiembrie";	break;
		case "December" :	$luna = "Decembrie";	break;
	}
	$result = $zi . ", " . $numzi . " " . $luna . " " . $an;
	return $result;
}

function detectmobile() {

$mobile_browser = '0';

if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}

if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}    

$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda','xda-');

if(in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}

if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
    $mobile_browser++;
}

if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
    $mobile_browser=0;
}

if($mobile_browser>0) {
   echo "<link type='text/javascript' rel='stylesheet' href='/date/css/mobile.css'/>";
}
else echo "<!-- ", $_SERVER['HTTP_USER_AGENT'], " -->";
   echo "<link type='text/javascript' rel='stylesheet' href='/date/css/mobile.css'/>";

}
?>
