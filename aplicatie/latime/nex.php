<?php
if ($str[1] == "normal")	setcookie("latime", "", time() - 3600, '/');
else if ($str[1] == "1000")	setcookie("latime", "mare", time()+60*60*24*30, '/');
else if ($str[1] == "600")	setcookie("latime", "mic", time()+60*60*24*30, '/');
else setcookie("latime", "fluid", time()+60*60*24*30, '/');
print "<script>parent.location.reload(true)</script>";
?>