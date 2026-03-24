<?php
	/* BASIC USE */

	require 'src/Exception.php';
	require 'src/PHPMailer.php';
	require 'src/POP3.php';
	require 'src/SMTP.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer(true);

	try {
	    $mail->isSMTP();
		$mail->Host 		= '10.20.6.15';
		$mail->SMTPAuth 	= false;
		$mail->SMTPAutoTLS 	= false; 
		$mail->Port 		= 25;

	    //Recipients
	    $mail->setFrom('marketing@supernova-id.com', 'Supernova');
	    $mail->addAddress('it.staff@supernova-id.com', 'IT Staff');     //Add a recipient
	    // $mail->addAddress('ellen@example.com');               //Name is optional
	    // $mail->addReplyTo('info@example.com', 'Information');
	    // $mail->addCC('cc@example.com');
	    // $mail->addBCC('bcc@example.com');

	    //Attachments
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = 'Here is the subject';
	    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
