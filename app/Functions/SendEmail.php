<?php

namespace Functions;

class SendEmail{
	public function sendMail($to, $subject, $body='', $attach=''){
	    $mail = new \PHPMailer;
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->CharSet = 'UTF-8';
	    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'wf3@progweb.fr';                   // SMTP username
	    $mail->Password = 'wra8ESa+Am&3';      // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to
	    $mail->setFrom('wf3@progweb.fr', 'Ben');
	    $mail->addAddress($to);                     // Add a recipient
	    if(is_array($attach) && sizeof($attach) > 0){
	        foreach ($attach as $key => $value) {
	            $mail->addAttachment($value);         // Add attachments
	        }
	    }
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $body;
	    $mail->AltBody = strip_tags($body);
	    $mail->send();
	}
}