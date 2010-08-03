<?php
session_start();
session_destroy();
if ($str[1] == "logare")
print "<script>parent.location.reload(true);</script>";
else print "Te-am delogat fara probleme. Din pacate, pentru ca nu ai vrut sa accepti JavaScript, nu te pot redirectiona!";
?>