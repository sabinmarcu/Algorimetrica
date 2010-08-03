<?php
setcookie("culoare", $str[2], time()+60*60*24*30, '/');
if ($_SERVER[HTTP_REFERER] == "http://algorimetrica.info/setari-pagina/")
header('Location: /');
else
print "<script type='text/javascript'>parent.location.reload(true)</script>";
?>