<?php
   //session_start();
   include_once ("controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style_registration.css">
    <title>Login</title>
</head>
<body>
   
<div class="form-container">

    <form action="authentification.php" method="POST" autocomplete="off" class="sign-in-form">
      <h3>Sign in</h3>
      
      <?php
            if(count($errors) > 0){
                foreach($errors AS $displayErrors){
                   
                ?>
                <div><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?>
      <input type="email" name="email" required placeholder="Email" autofocus>
      <!-- <img title="Email " class="img_mail" src="admin/images/email.png" alt=""> -->
      <input type="password" name="password" required placeholder="Password">
      <!-- <img title="Mot de passe " class="img_pwd" src="admin/images/pwd.png" alt=""> -->
      <input type="submit" name="entrer" value="login" class="form-btn">
      <a href="forgot.php" id="forgot">Mot de passe oublier?</a>
      <p>Cree un compte <a href="verification.php">Sign Up</a></p>
   </form>

    </div>
  </body>
</html>