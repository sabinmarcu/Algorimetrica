<?php
print "<h4> " . $_SESSION[username] . " -";
if ($admin2)	print "<span style='color:red'> nivelul 3</span>";
else if ($admin1)	print "<span style='color:blue'> nivelul 2</span>";
else print "<span style='color:#660'> nivelul 1 ... deci nu poti face nimic aici</span>";
print "</h4>";
if ($admin1)	print "<hr><p style='padding-right: 15px'><span style='float:left; color: #AAA'>Administrare</span><a href='/admin/categorii/'>Categorii</a></p>";
if ($admin1)	print "<hr><p style='padding-right: 15px'><span style='float:left; color: #AAA'>Administrare</span><a href='/admin/linkuri/'>Linkuri</a></p>";
if ($admin1)	print "<hr><p style='padding-right: 15px'><span style='float:left; color: #AAA'>Administrare</span><a href='/admin/probleme/'>Arhiva</a></p>";
if ($admin2)	print "<hr><p style='padding-right: 15px'><span style='float:left; color: #AAA'>Administrare</span><a href='/admin/stiri/'>Stiri</a></p>";
print "<hr><p style='text-align:left'><a href='/'>Acasa</a></p>";
?>