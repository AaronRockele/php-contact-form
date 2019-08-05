<?php 
print_r($_POST);
$name_error = $email_error = $message_error = "";
$name = $email = $message = $success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if(empty($_POST['name'])){
        $name_error ="Name is required";
        
    } else {
        $name = test_input($_POST['fullname']);
  
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
      $to = 'aa.rockele@gmail.com';
      $subject = "Contact Form Submit";
      if(mail($to, $subject, $message)){
          $success = "Message sent, thank you";
          $name = $email = $message = "";
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