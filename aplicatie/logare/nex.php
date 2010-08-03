<?php
if (!$_POST)	{
	if ($str[1] == 'logare')	print "<body style='background : #DDD; font-family:Gill Sans, Lucida Grande, Sagoe Ui, Arial;'><LINK href='/date/css/style.css' rel='stylesheet' type='text/css'/>";
		if (!session_is_registered('username'))		{
		if ($str[1] == 'logare')
		print "<form method='post' action='/logare/'>";
		else print "<form method='post' action='/logare-clasica/'>";
		print "<h2> Introduceti datele necesare pentru logare </h2>
			<table width='100%' cellpadding='15' cellspacing='0' border='0'>
				<tr> <td width='100px'> Username-ul </td> <td> : </td> <td> <input type='text' name='username' style='width:100%'> </td> </tr>
				<tr> <td width='100px'> Parola </td> <td> : </td> <td> <input type='password' name='password' style='width:100%'> </td> </tr>
				<tr> <td> </td> <td> </td> <td> <input type='submit' name='Submit' value = 'Logheaza-te'> </td> </tr>
			</table>
		</form>";}
		else {
		print " <div style='text-align:center'><h4> Logat ca si ".$_SESSION['username']." . </h4> <p> Use this next link to logout. </p> ";
		if ($str[1] == 'logare')
		print "<form method='post' action='/logare/'>";
		else print "<form method='post' action='/logare-clasica/'>";
		print" <input type='submit' value='Delogare' name='Submit'></form></div>";
		}
	if ($str[1] == 'logare')
	print "<hr/></body>";
}
else {
	if ($_POST['Submit'] == 'Delogare')	include 'delogare.php';
	else include 'logare.php';
}
?>