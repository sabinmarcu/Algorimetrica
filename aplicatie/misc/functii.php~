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
?>