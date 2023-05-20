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
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link href="CSS/modern-business.css" rel="stylesheet">
    <link href="CSS/cssLogin.css" rel="stylesheet" />


    <title>Login</title>
</head>
<body>
   
    <div id='page'>
        <div id="head">
            <br/>
            <div id="emblhead" align="center">

                <p id="p1"> <strong>Institut supérieur du numérique </strong></p>
                <p id="p2">
                    <strong>Plateforme de soumission des devoirs et des examens en ligne</strong>
                </p>
            </div>
        </div>
        <div id="sitename">
            <div align="center">
                <strong>  </strong>
            </div>
        </div>
    </div>
            <div align="center">
                <img id="profile-img" src="" />
            </div>
    <div class="card card-container">
        <form action="authentification.php" method="POST" class="form-signin">
            <?php
                    if(count($errors) > 0){
                        foreach($errors AS $displayErrors){
                        
                        ?>
                        <div><?php echo $displayErrors; ?></div>
                        <?php
                        }
                    }
                    ?>
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" name="email" required placeholder="Email"  class="form-control">
            <input type="password" name="password" required placeholder="Password" class="form-control">
            <input type="submit" name="entrer" value="login" class="btn btn-lg btn-primary btn-block btn-signin">
            <a href="forgot.php" id="forgot">Mot de passe oublier?</a>
            <p>Cree un compte <a href="verification.php">Sign Up</a></p>
        </form>
    </div>
</body>
</html>