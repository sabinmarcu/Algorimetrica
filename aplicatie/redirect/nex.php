<?php
$str = $_POST['link'];
$str = mysql_real_escape_string($str);
print " <h4>Va redirectionam la adresa : <a onclick=\"redirect('".$str."')\">" . $str . "</a> in 3 secunde. <script type='text/javascript'>setTimeout('redirect(\'".$str."\')', 3000)</script></h4>"; 
?>