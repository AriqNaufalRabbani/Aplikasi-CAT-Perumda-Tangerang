<?php
	/* BASIC USE */
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer;

	try {

	    //SMTP settings
	    /* Setup gmail account at https://www.google.com/settings/u/2/security/lesssecureapps */
		// $mail->IsSMTP();
		// $mail->Mailer 	  = "smtp";
		/* 0 = off (for production use), 1 = client messages, 2 = client and server messages */
		// $mail->SMTPDebug  = 1;  
		// $mail->SMTPAuth   = TRUE;
		// $mail->SMTPSecure = "tls";
		// $mail->Port       = 587;
		// $mail->Host       = "smtp.gmail.com";
		// $mail->Username   = "digipacksupernova@gmail.com";
		// $mail->Password   = "supernova4321";

	    $mail->isSMTP();
		$mail->Host 		= '10.20.6.15';
		$mail->SMTPAuth 	= false;
		$mail->SMTPAutoTLS 	= false; 
		$mail->Port 		= 25;
		$mail->Priority     = 1;

	    //Recipients
	    $mail->setFrom('helpdesk@supernova-id.com', 'Supernova Digipack');
	    $mail->addAddress('erghi.supernova@gmail.com', 'Erghi');     //Add a recipient
	    $mail->addReplyTo('erghi@gmail.com', 'Erghi');
	    // $mail->addCC('reggi.handy@supernova-id.com');
	    $mail->addCC('erghiimannurichsan@gmail.com');
	    // $mail->addBCC('bcc@example.com');

	    //Attachments
	    $mail->addAttachment('image.png');        //Add attachments
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
