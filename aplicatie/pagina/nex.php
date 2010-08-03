<?php
if ($str[1] == "setari-pagina")	{
include "aplicatie/sablon/header.php";
print "
<div style='font-size:13pt; margin-bottom:75px'>
Latimea Paginii<br>	<br> <div style='margin-left:50px'>
<a href=\"/600/\" class='setting'>Mica / </a>
<a href=\"/normal/\" class='setting'>Normal / </a>
<a href=\"/1000/\" class='setting'>Mare / </a>
<a href=\"/85/\" class='setting'>Fluid</a> </div>
</div><div style='font-size:13pt;'>
Culoarea Fundalului<br>	<br> <div style='margin-left:50px'>
<a href=\"/culoare/negru/\" class='setting'>Negru / </a>
<a href=\"/culoare/alb/\" class='setting'>Alb</a> </div>
</div>";
include "aplicatie/sablon/footer.php";
}
else if ($str[1] == "culoare") include "culoare.php";
else include "latime.php";
?>