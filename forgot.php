<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bleulabs mot de passe oublier</title>
    <link rel="stylesheet" href="CSS/style_registration.css">
</head>

<body>
            
        <div class="form-container">

        <form action="forgot.php" method="post">
        <h3>Verification d'Email</h3>
            <?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
           <input type="email" name="email" required placeholder="Enter your email">
      <input type="submit" name="submit" value="Verifier" class="form-btn">
      <p> <a href="authentification.php">Connecter Vous</a></p>
   </form>

</div>

</body>

</html>