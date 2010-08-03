 <?php
     require("aplicatie/misc/class.phpmailer.php");
     require("aplicatie/misc/class.smtp.php");
     
     $mail = new PHPMailer();
     $descriere = mysql_real_escape_string($_POST[descriere]);
     $nume = mysql_real_escape_string($_POST[nume]);
 
     $mail->IsSMTP(); // send via SMTP
     $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
     $mail->Host = "smtp.gmail.com"; // SMTP servers
     $mail->Port = 465;                   // set the SMTP port
     $mail->SMTPAuth = true; // turn on SMTP authentication
     $mail->Username = "admin@algorimetrica.co.cc"; // SMTP username
     $mail->Password = "fuck13"; // SMTP password
 
     $mail->FromName = $_SESSION[nume];
     $mail->AddAddress("cerereliceu@algorimetrica.co.cc");
     $mail->AddReplyTo($_SESSION[mail]);
 
     $mail->IsHTML(true); // send as HTML
 
     $mail->Subject = "Adaugare Liceu : ".$nume;
     $mail->Body = "Cerere de integrare liceu. <br><br><br> Nume Liceu : <b>".$nume."</b> <br><br> Descriere : <pre>".$descriere."</pre> <br><br><br><br> Autor : <a href='http://algorimetrica.co.cc/registru/utilizator/".$_SESSION[id]."'><b>".$_SESSION[username]."<b></a> (<a href='mailto:".$_SESSION[mail]."'> ".$_SESSION[mail]." </a>) <br><br> <EOF> ";
 
 
 
     if(!$mail->Send())
     { print "<h2> Nu am putut trimite cererea ! </h2><p> Mai incearca. Te redirectionam la pagina precedenta in 3 secunde </p><script>setTimeout('history.back(1)',3000)</script>";
     exit;}
 
 	print "<h2> Cerere trimisa ! </h2><p> Te redirectionam la pagina precedenta in 3 secunde </p><script>setTimeout('history.back(1)',2000)</script>";
 
 ?>