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

<form action="" method="POST" autocomplete="off" class="sign-in-form">
      <h3>Sign in</h3>

      <input type="email" name="email" required placeholder="Email">
      <select name="role">
        <option value="enseignant">Enseignant</option>
        <option value="etudiant">Etudiant</option>
      </select>
      <input type="submit" name="verifier" value="login" class="form-btn">
   </form>

</div>
</body>
</html>