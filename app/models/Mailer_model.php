<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Mailer_model {
	private $db;

	public function __construct() {
		$this->db = new Database;
        $this->mail = new PHPMailer;
	}

	public function sendMail($fromMail, $fromName = '', $toMail, $toName = '', $subject = '', $message = '', $attachments = array(), $ccMail = array()) {
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

            $this->mail->isSMTP();
            $this->mail->Host 		    = '10.20.6.15';
            $this->mail->SMTPAuth 	    = false;
            $this->mail->SMTPAutoTLS    = false;
            $this->mail->Port 		    = 25;
            $this->mail->Priority       = 1;

            //Recipients
            $this->mail->setFrom($fromMail, $fromName);
            $this->mail->addAddress($toMail, $toName);
            $this->mail->addReplyTo($fromMail, $fromName);
            $this->mail->addCC('reggi.handy@supernova-id.com');
            // $this->mail->addCC('erghiimannurichsan@gmail.com');
            // $this->mail->addBCC('bcc@example.com');
            
            foreach ($attachments as $attachment) {
                $this->mail->addAttachment($attachment);
            }

            //Content
            $this->mail->isHTML(true); //Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;
            // $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
	}

}