
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
        include_once "../connexion.php";
        $id_ens = $_GET['id_ens'];
        $req = mysqli_query($conn , "SELECT * FROM enseignant WHERE id_ens = '$id_ens'");
        $row = mysqli_fetch_assoc($req);


        if(isset($_POST['button'])){ 
        extract($_POST);
        if(isset($nom) && isset($prenom) && isset($Date_naiss) && isset($lieu_naiss)  && isset($login)  && isset($diplome)  && isset($grade) ){
            $req = mysqli_query($conn, "UPDATE enseignant SET   nom = '$nom', prenom = '$prenom', Date_naiss = '$Date_naiss', lieu_naiss = '$lieu_naiss', login = '$login', diplome = '$diplome', grade = '$grade' WHERE id_ens = $id_ens");
            if($req){
                header("location: enseignant.php");
            }else {
                $message = "enseignant non modifié";
            }

        }else {
            $message = "Veuillez remplir tous les champs !";
        }
        }

        ?>

        <div class="form">
        <a href="les_joueurs.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Modifier le enseignant : <?=$row['id_ens']?> </h2>
        <p class="erreur_message">
        <?php 
            if(isset($message)){
                echo $message ;
            }
        ?>
        </p>
        <form action="" method="POST">
        <label>Nom </label>
        <input type="text" name="nom_prenom" value="<?=$row['nom']?>">
           <label> Prénom</label>
        <input type="text" name="nom_prenom" value="<?=$row['prenom']?>">
        <label>Date de naissance</label>
        <input type="date" name="Date_naiss" value="<?=$row['Date_naiss']?>">
        <label>Lieu de naissance</label>
        <input type="text" name="lieu_naiss" value="<?=$row['lieu_naiss']?>">
        <label>Email</label>
        <input type="email" name="login" value="<?=$row['login']?>">
        <label>Diplôme</label>
        <input type="text" name="diplome" value="<?=$row['diplome']?>">
        <label>Grade</label>
        <input type="text" name="grade" value="<?=$row['grade']?>">
        <input type="submit" value="Modifier" name="button">
        </form>
    </div>
    </div>

</body>
</html>