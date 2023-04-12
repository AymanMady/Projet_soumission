<?php
    session_start() ;
   if(isset($_POST['boutton-valider'])){ 
    if(empty($_POST["nom"]) || empty($_POST["pwd"]) ) {
        $erreur = "Veuillez remplir tous les champs obligatoires";
    } else {
        $nom = $_POST['nom'] ;
        $pwd = $_POST['pwd'] ;
        $erreur = "" ;
        include_once "connexion.php";
        $req = mysqli_query($conn , "SELECT * FROM utilisateur WHERE nom = '$nom' AND pwd ='$pwd' ") ;
        $num_ligne = mysqli_num_rows($req) ;
        if($num_ligne > 0 ){
            header("Location:index.php") ;
            $_SESSION["admin"]="oui";
        }else {
            $erreur = "Nom ou Mots de passe incorrectes !";
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
                echo "<p class='erreur'>".$erreur."</p>"  ;
            }
            ?>
            <div class="form-container">
                    <input type="text" class="input" name="nom" placeholder="Votre Nom" >
                    <input type="password" class="input" name="pwd" placeholder="Password">
                    <?php 
                        include_once "connexion.php";
                        $sql = "SELECT id_role, profile  FROM role";
                        $resultat = mysqli_query($conn, $sql);
                    ?>
                    <select name="role">
                        <?php
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['profile'] . "</option>";
                        }
                        ?>
                    </select>
            </div>
            <input type="submit" id="submit" value="Valider" name="boutton-valider">
        </form>
    </div>
</div>
</body>
</html>