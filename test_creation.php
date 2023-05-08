<?php
include_once("connexion.php");
if(isset($_POST['verifyEmail'])){
$user=$_POST['test'];
$email=$_POST['otpverify'];
if($user=='enseignant'){
    $sql="select * from enseignant where login=$email";
}
else{
    $sql="select * from etudiant where login=$email";
}
$resu=mysqli_query($conn,$sql);
if(mysqli_num_rows($resu)>0){
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
body{
    background:white;
}

</style>
<body >
    <div id="container">
        <h2>Email</h2>
        <p>C’est rapide et facile.</p>
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
            <select name="test">
  <option value="enseignant">enseignant</option>
  <option value="etudiant">etudiant</option>
</select>
            <input type="number" name="otpverify" placeholder="email" required><br>
            <input type="submit" name="verifyEmail" value="test">
        </form>
    </div>

</body>
</html>