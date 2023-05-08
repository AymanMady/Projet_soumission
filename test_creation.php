<?php
include_once("connexion.php");
include_once("controller.php");
if(isset($_POST['submit'])){
$user=$_POST['choix'];
$email=$_POST['email'];
if($user=='enseignant'){
    $sql="select * from enseignant where login=$email";
}
else{
    $sql="select * from etudiant where login=$email";
}
$resu=mysqli_query($conn,$sql);
if(mysqli_num_rows($resu)>0){
    session_start();
    $_SESSION['nom']=$email;
    header("location:registration.php");
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Form</title>
    <link rel="stylesheet" href="CSS/style_verifier.css">
</head>
<style>
      /* styles pour le formulaire */
      form {
        max-width: 500px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 10px;
      }
      
      label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
      }
      
      select, input[type="email"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: none;
        box-shadow: inset 0 0 5px rgba(0,0,0,0.1);
        font-size: 16px;
      }
      
      select:focus, input[type="email"]:focus {
        outline: none;
        box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
      }
      
      input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
      }
      
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }


</style>
<body >
    <div id="container">
        <h2>donne Email</h2>
        <div id="line"></div>
        <form action="registration.php" method="POST" autocomplete="off">

            <?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert"><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?> 
       <label for="ville">choix :</label>
      <select id="ville" name="choix">
        <option value="etudiant">etudiant</option>
        <option value="enseignant">enseignant</option>
        
      </select>
      
      <label for="email">E-mail :</label>
      <input type="email" id="email" name="email" placeholder="Entrez votre e-mail">
      
      <input type="submit" name="submit" value="Envoyer">
        </form>
    </div>

</body>
</html>