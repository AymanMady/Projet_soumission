<?php
    session_start() ;
   if(isset($_POST['boutton-valider'])){ 
    if(empty($_POST["login"]) || empty($_POST["pwd"]) ) {
        $erreur = "Veuillez remplir tous les champs obligatoires";
    } else {
        $login = $_POST['login'] ;
        $pwd = $_POST['pwd'] ;
        $erreur = "" ;
        include_once "connexion.php";
        $sql =  "SELECT * FROM utilisateur inner join role using(id_role) WHERE pwd ='$pwd'  AND login = '$login' AND profile='administrateur'  ";
        $req = mysqli_query($conn ,$sql) ;
        $num_ligne = mysqli_num_rows($req) ;
        if($num_ligne > 0 ){
            header("Location:index.php") ;
            $_SESSION["admin"]="oui";
        }else {
            $erreur = "login ou Mots de passe incorrectes !";
        }    
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="form-box">
        <form class="form" action="" method="POST">
            <span class="title">Authentifier</span>
            <?php 
            if(isset($erreur)){
                echo "<p class='erreur'>".$erreur."</p>";
            }
            ?>
            <div class="form-container">
                    <input type="text" class="input" name="login" placeholder="Votre login" >
                    <input type="password" class="input" name="pwd" placeholder="Password">
            </div>
            <input type="submit" id="submit" value="Valider" name="boutton-valider">
        </form>
    </div>
</div>
</body>
</html>