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
    <title>Registration</title>
    <link rel="stylesheet" href="CSS/style_registration.css">
</head>
<body>
<div class="form-container">

    <form action="registration.php" method="post" autocomplete="off" class="sign-up-form">
        <h3>Sign up</h3>
        <?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert"><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?> 
        <form name="fo" method="post" action="">
        <input type="text" name="fname" required placeholder="Nom">
        <input type="text" name="lname" required placeholder="Prénom">
        <input type="password" name="password" required placeholder="Mot de passe">
        <input type="password" name="confirmPassword" required placeholder="Confirmer Mot de passe">
        <input type="submit" name="signup" value="Valider" class="form-btn">
        <p>Vous avez déjà un compte ? <a href="index.php">connectez-vous</a></p>
    </form>

</div>
</body>
</html>