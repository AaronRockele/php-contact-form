<?php include('form_process.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact form</title>
    <link rel="stylesheet" href="./Assets/CSS/stylesheet.css">
</head>
<body>
<div id="page-wrapper">
  <h1>Contact Form</h1>
  <div id="form-messages"></div>
  <form id="ajax-contact" method="post" action="<?= $_SERVER['PHP_SELF'];?>">
    <div class="field">
      <label for="name">Name:</label>
      <input type="text" id="name" placeholder="Name" name="name" value=<?=$name?>>
      <span class="error"><?= $name_error ?></span>
    </div>
    <div class="field">
      <label for="email">Email-adress:</label>
      <input type="text" id="email" placeholder="Email-adress" name="email">
      <span class="error"><?= $email_error ?></span>
    </div>
    <div class="field">
      <label for="message">Message:</label>
      <textarea id="message" placeholder="message you want to send us..." type="text" name="message"></textarea>
    </div>
    <div class="field">
      <button class="red-btn" type="submit" name="submit" value='reset'>Send</button>
    </div>
  </form>
  <div class="success"><?= $success; ?></div>

</div>
</body>
</html>