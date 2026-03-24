

<?php

require("/usr/share/php/libphp-phpmailer/autoload.php");
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPAuth = false; 
$mail->SMTPSecure = false; 
$mail->SMTPAutoTLS = false; 
$mail->Host = "10.20.6.15"; 
$mail->Port = 25; 
$mail->IsHTML(true); 
$mail->SetFrom("helpdesk@supernova-id.com"); 
$mail->Subject = "tes dari phpdocker"; 
$mail->Body = "my body"; $mail->AddAddress("reggi.handy@supernova-id.com"); 
if(!$mail->Send()) { 
     echo "Mailer Error: " . $mail->ErrorInfo;
} else {
     echo "Message has been sent";
}

?>