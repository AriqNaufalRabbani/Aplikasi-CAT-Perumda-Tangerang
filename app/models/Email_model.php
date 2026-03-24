<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Email_model {
    private $mail;
    private $Host;
    private $Port;
    private $From;
    private $FromName;
    private $SMTPHost;
    private $SMTPPort;
    private $SMTPUsername;
    private $SMTPPassword;

    function __construct() {
        $this->mail             = new PHPMailer\PHPMailer\PHPMailer(true);
        $this->Host             = '10.20.6.15';
        $this->Port             = 25;
        $this->From             = 'e-approval@supernova-id.com';
        $this->FromName         = 'CRM Supernova';
        
        /* Setup gmail account at https://www.google.com/settings/u/2/security/lesssecureapps for permission*/
        $this->SMTPHost         = 'smtp.gmail.com';
        $this->SMTPPort         = 587;
        $this->SMTPUsername     = 'e-approval@supernova-id.com';
        $this->SMTPPassword     = 'Jababeka2';
    }

	public function pushEmail($To, $Subject, $Message, $Files = array()) {
        try {
            $this->mail->isSMTP();
            $this->mail->Host 		    = $this->Host;
            $this->mail->Port 		    = $this->Port;
            $this->mail->SMTPAuth 	    = false;
            $this->mail->SMTPAutoTLS 	= false; 
            $this->mail->Priority       = 1;

            //Recipients
            $this->mail->setFrom($this->From, $this->FromName);
            $this->mail->addAddress($To, '');
            // $this->mail->addReplyTo('info@example.com', 'Information');
            // $this->mail->addCC('cc@example.com');
            // $this->mail->addBCC('bcc@example.com');

            /* Add attachment if exist */
            if (!empty($Files) && count($Files) > 0) {
                for ($i = 0; $i < count($Files); $i++) {
                    if (file_exists($Files[$i])) {
                        $this->mail->addAttachment($Files[$i]);
                    }
                }
            }

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $Subject;
            $this->mail->Body    = $Message;
            // $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $this->mail->send();

            // echo 'Message has been sent';
            $Result = true;
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            $Result = false;
        }

        /* If send email success, return true */
        if ($Result === true) {
            return $Result;
        }
        /* If send email failed, use SMTP Gmail */
        else {
            try {
                $this->mail->IsSMTP();
                $this->mail->Mailer 	= "smtp";
                /* 0 = off (for production use), 1 = client messages, 2 = client and server messages */
                $this->mail->SMTPDebug  = 0;  
                $this->mail->SMTPAuth   = TRUE;
                $this->mail->SMTPSecure = "tls";
                $this->mail->Host       = $this->SMTPHost;
                $this->mail->Port       = $this->SMTPPort;
                $this->mail->Username   = $this->SMTPUsername;
                $this->mail->Password   = $this->SMTPPassword;

                //Recipients
                $this->mail->setFrom($this->From, $this->FromName);
                $this->mail->addAddress($To, '');
                // $this->mail->addReplyTo('info@example.com', 'Information');
                // $this->mail->addCC('cc@example.com');
                // $this->mail->addBCC('bcc@example.com');

                /* Add attachment if exist */
                if (!empty($Files) && count($Files) > 0) {
                    for ($i = 0; $i < count($Files); $i++) {
                        if (file_exists($Files[$i])) {
                            $this->mail->addAttachment($Files[$i]);
                        }
                    }
                }

                //Content
                $this->mail->isHTML(true);
                $this->mail->Subject = $Subject;
                $this->mail->Body    = $Message;
                // $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $this->mail->send();

                $Result = true;
            } catch (Exception $e) {
                $Result = false;
            }

            return $Result;
        }
    }

	// public function sendEmail($To, $Subject, $Message) {
    //     $headers[]  = 'MIME-Version: 1.0';
    //     $headers[]  = 'Content-type: text/html; charset=iso-8859-1';
    //     $headers[]  = 'From: '. $this->FromName .' <'. $this->From .'>';

    //     ini_set("SMTP", $this->Host);
    //     ini_set("smtp_port", $this->Port);
    //     ini_set('sendmail_from', $this->From);
    //     $mail     = mail($To, $Subject, $Message, implode("\r\n", $headers));

    //     if ($mail) { 
    //         return true; 
    //     }
    //     else { 
    //         return false; 
    //     } 
    // }

    // function sendEmailAttach($to, $subject, $message, $files = array()) {
    //     $from       = "marketing@supernova-id.com";
    //     $from_name  = "Supernova Digipack";
    //     $header[]   = "From: $from_name <". $from .">";

    //     // Boundary  
    //     $semi_rand      = md5(time());  
    //     $mime_boundary  = "==Multipart_Boundary_x{$semi_rand}x";  

    //     // Headers for attachment  
    //     $header[]   = "MIME-Version: 1.0"; 
    //     $header[]   = "Content-Type: multipart/mixed;"; 
    //     $header[]   = " boundary=\"{$mime_boundary}\""; 

    //     // Multipart boundary  
    //     $messages[] = "--{$mime_boundary}"; 
    //     $messages[] = "Content-Type: text/html; charset=\"UTF-8\"";
    //     $messages[] = "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 

    //     // Preparing attachment 
    //     if (!empty($files)) { 
    //         for ($i = 0; $i < count($files); $i++) { 
    //             if (is_file($files[$i]) && file_exists($files[$i])) { 
    //                 $file_name  = basename($files[$i]); 
    //                 $file_size  = filesize($files[$i]);
    //                 $fp         = fopen($files[$i], "rb"); 
    //                 $data       = fread($fp, $file_size); 
    //                 fclose($fp); 
    //                 $data       = chunk_split(base64_encode($data));
    //                 $messages[] = "--{$mime_boundary}";  
    //                 $messages[] = "Content-Type: application/octet-stream; name=\"". $file_name ."\"";
    //                 $messages[] = "Content-Description: ". $file_name;
    //                 $messages[] = "Content-Disposition: attachment;";
    //                 $messages[] = " filename=\"". $file_name ."\"; size=". $file_size .";";
    //                 $messages[] = "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    //             } 
    //         } 
    //     } 

    //     $messages[]  = "--{$mime_boundary}--"; 
    //     $returnpath  = "-f" . $from;

    //     // Send email 
    //     ini_set("SMTP", "10.20.6.15");
    //     ini_set("smtp_port", "25");
    //     ini_set('sendmail_from', $from);
    //     $mail = mail($to, $subject, implode("\r\n", $messages), implode("\r\n", $header), $returnpath);  

    //     // Return true if email sent, otherwise return false 
    //     if ($mail) { 
    //         return true; 
    //     }
    //     else { 
    //         return false; 
    //     } 
    // }

}