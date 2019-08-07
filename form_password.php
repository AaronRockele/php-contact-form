<?php
try {
    //Server settings
  $mail->SMTPDebug = 2;
  $mail->isSMTP();                                            // Set mailer to use SMTP
  $mail->Host       = 'smtp.gmail.com;';                      // Specify main and backup SMTP servers
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = 'aa.rockele@gmail.com';                 // SMTP username
  $mail->Password   = 'fbszogjueramwwyp';                              // SMTP password
  $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
  $mail->Port       = 587;                                  // TCP port to connect to

    //Recipients
  $mail->setFrom($email);
  $mail->addAddress('aa.rockele@gmail.com');                  // Add a recipient
  $mail->addReplyTo($email);


    // Content
    $mail->isHTML(true);                                      // Set email format to HTML
  $mail->Subject = 'Contact';
  $mail->Body    = $message_body;
  $mail->AltBody = 'Thanks for contacting us. you will recieve an answer in a few days.';
  
  $mail->send();
      $success = 'mission accomplished!';
      
} catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>