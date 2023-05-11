
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
</head>
<body>
    <?php
      include "nav_bar.php"
    ?>
    <div class="content">
                <?php

            function test_input($data){
                $data = htmlspecialchars($data);
                $data = trim($data);
                $data = htmlentities($data);
                $data = stripcslashes($data);

                return $data;
            }

            include_once "../connexion.php";
            $id_user = $_GET['id_user'];
            $req = mysqli_query($conn , "SELECT * FROM utilisateur WHERE id_user = $id_user");
            $row = mysqli_fetch_assoc($req);

            // $matricule = test_input($_POST['matricule']);
            // $semestre = test_input($_POST['semestre']);
            // $annee = test_input($_POST['annee']);
            // $nom =  test_input($_POST['nom']);
            // $prenom = test_input($_POST['prenom']); 
            // $Date_naiss = test_input($_POST['Date_naiss']); 
            // $lieu_naiss =  test_input($_POST['lieu_naiss']);
            // $login =  test_input($_POST['login']);
            // $pwd =  test_input($_POST['pwd']);
            // $id_role =  test_input($_POST['id_role']);
            // $active =  test_input($_POST['active']);
            if(isset($_POST['button'])){ 
                test_input(extract($_POST));
            if( !empty($login) && !empty($role)){
                $req = mysqli_query($conn, "UPDATE utilisateur SET     login = '$login', role = '$role'  WHERE id_user = $id_user");
            if( !empty($pwd)  && !empty($login) && !empty($role)){
                $req = mysqli_query($conn, "UPDATE utilisateur SET pwd = '$pwd', login = '$login', id_role = '$role'  WHERE id_user = $id_user");

                echo $req;
                if($req){
                    header("location: utilisateurs.php");
                }else {
                    $message = "utilisateur non modifié";
                }

            }else {
                $message = "Veuillez remplir tous les champs !";
            }
            }
        }
            ?>

            <div class="form">
            <a href="utilisateurs.php" class="back_btn"><img src="images/back.png"> Retour</a>
            <h2 class="title_joueur">Modifier un utilisateur </h2>
            <p class="erreur_message">
            <?php 
                if(isset($message)){
                    echo $message ;
                }
            ?>
            </p>
            <form action="" method="POST">
            <label>E-mail</label>
            <input type="email" name="login" value="<?=$row['login']?>">
            <label>Mot de passe</label>
            <input type="password" name="pwd">
            <label>Rôle</label>
            <input type="text" name="role" value="<?=$row['id_role']?>">
            <input type="submit" value="Modifier" name="button">
            </form>
            </div>
    </div>
</body>
</html>