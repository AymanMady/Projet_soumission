<?php
include_once("connexion.php");
include_once("controller.php");
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
        .custom-select {
        position: relative;
        font-family: Arial;
        width: 200px;
        height: 35px;
        margin: 20px;
        background-color: #f4f4f4;
        overflow: hidden;
        border-radius: 5px;
      }

      .custom-select select {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
      }

      .custom-select span {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 10px;
        box-sizing: border-box;
        transition: all 0.3s ease;
      }

      .custom-select span::before {
        content: '\f107';
        font-family: FontAwesome;
        font-size: 20px;
        color: #888;
        margin-right: 5px;
        transform: rotate(0deg);
        transition: all 0.3s ease;
      }

      .custom-select.open span::before {
        transform: rotate(-180deg);
      }

      
      .custom-select select option {
        background-color: #f4f4f4;
        color: #333;
        font-family: Arial;
        font-size: 14px;
      }
      .custom-select select option:checked {
        background-color: #ccc;
        color: #fff;
      }
body{
    background:white;
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
         <div class="custom-select">
            <select name="test">
  <option value="enseignant">enseignant</option>
  <option value="etudiant" >etudiant</option>
</select>
</div>
            <input type="number" name="otpverify" placeholder="email" required><br>
            <input type="submit" name="verifyEmail" value="test">
        </form>
    </div>

</body>
</html>