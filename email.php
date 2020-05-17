<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

 

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "cooptech1234@gmail.com";  // adresse interm  
$mail->Password   = "nada5maison";

$name = $_POST["nom"];
$phone = $_POST["gsm"];
$mailForm = $_POST["e-mail"];
$message = $_POST["msg"];
if (isset($phone)){
	$txt = "Vous avez reçu un message de ".$name.".\n\n".$message."\n\nl'adresse mail de la personne est ".$mailForm."\nLe numéro de la personne est: ".$phone;
}
else {
	$txt = "Vous avez reçu un message de ".$name.".\n\n".$message."\n\nl'adresse mail de la personne est ".$mailForm."\nLa personne n'a pas laissé de numéro de téléphone";
}


$mail->IsHTML(true);
$mail->AddAddress("cooptech12@gmail.com", $name);// adresse final 
$mail->SetFrom("cooptech1234@gmail.com", "SiteWeb Contact");// adresse interm 
$mail->AddReplyTo($mailForm, "reply-to-name"); 
$mail->Subject = "Message du site Web de Coop-tech";


 


$mail->MsgHTML($txt); 

 

if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
}
else {
     header('Location: sucessMessage.html');      
}

?>
