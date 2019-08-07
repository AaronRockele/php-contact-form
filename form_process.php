<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'form_password.php';
$name_error = $email_error = $message_error = "";
$name = $email = $message = $success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if(empty($_POST['name'])){
        $name_error ="Name is required";
        
    } else {
        $name = test_input($_POST['name']);

    if(!preg_match("/^[a-zA-Z ]*/", $name)){
        $name_error = "Only letters and whitspace allowed";
    }
    }
    if (empty($_POST["email"])){
        $email_error = "Email is required";
    } else{
        $email = test_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error = "Invalid email format";
        }
    }
    if (empty($_POST["message"])){
        $message = "";
    } else{
        $message = test_input($_POST['message']);
    }
    if ($name_error == "" and $email_error == ""){
        $message_body = "";
        unset($_POST['submit']);
        foreach($_POST as $key => $value){
        $message_body .= "$key: $value\n";
        }

        $mail = new PHPMailer(true);

        try {
          //Server settings
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com;';                      // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'aa.rockele@gmail.com';                 // SMTP username
        $mail->Password   = $password;                     // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;  
                                                                    // TCP port to connect to

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
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>