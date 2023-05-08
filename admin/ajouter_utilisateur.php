
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
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
            function test_input($data){
                $data = htmlspecialchars($data);
                $data = trim($data);
                $data = htmlentities($data);
                $data = stripcslashes($data);

                return $data;
            }

       if(isset($_POST['button'])){
<<<<<<< HEAD
                $nom =  test_input($_POST['nom']);
                $prenom = test_input($_POST['prenom']); 
                $Date_naiss = test_input($_POST['Date_naiss']); 
                $lieu_naiss =  test_input($_POST['lieu_naiss']);
                $login =  test_input($_POST['login']);
                $pass =  md5(test_input($_POST['pwd']));
                $role =  test_input($_POST['role']);

           if(  isset($nom) && isset($prenom) && isset($Date_naiss) && isset($lieu_naiss)  && isset($login)  && isset($role) ){
                $req = "INSERT INTO utilisateur ( `nom`,`prenom`, `date_naiss`,`lieu_naiss`,
                                                `login`,`pwd`,`active`,`code`,`id_role`) 
                                                VALUES('$nom','$prenom','$Date_naiss',
                                                '$lieu_naiss', '$login', '$pass', '0', '1', '$role');";
=======
                // $matricule = test_input($_POST['matricule']);
                // $semestre = test_input($_POST['semestre']);
                // $annee = test_input($_POST['annee']);
                // $nom =  test_input($_POST['nom']);
                // $prenom = test_input($_POST['prenom']); 
                // $Date_naiss = test_input($_POST['Date_naiss']); 
                // $lieu_naiss =  test_input($_POST['lieu_naiss']);
                // $login =  test_input($_POST['login']);
                test_input(extract($_POST));
           if(  isset($nom) && isset($prenom) && isset($Date_naiss) && isset($lieu_naiss)  && isset($login)  && isset($role) ){
                $req = "INSERT INTO utilisateur ( `nom`,`prenom`,`lieu_naiss`, `Date_naiss`, `semestre`,`annee`, `login`,`id_role`)VALUES('$nom','$prenom','$lieu_naiss','$Date_naiss','$login',$role)";
>>>>>>> eed1f47f55757961c60349c19534fa2486fdf6a1
                                
                $req = mysqli_query($conn , $req);
                if($req){
                    header("location: utilisateurs.php");
                }else {
                    $message = "utilisateur non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="utilisateurs.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Ajouter un utilisateur</h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        <label>Nom</label>
        <input type="text" name="nom">
<<<<<<< HEAD
        <label>Prénom</label>
=======
        <label>prénom</label>
>>>>>>> eed1f47f55757961c60349c19534fa2486fdf6a1
        <input type="text" name="prenom">
        <label>Lieu de naissance</label>
        <input type="text" name="lieu_naiss">
        <label>Date de naissance</label>
        <input type="date" name="Date_naiss">
        <label>E-mail</label>
        <input type="email" name="login">
        <label>Mot de passe</label>
        <input type="password" name="pwd">
        <label>Role</label>
        <input type="text" name="role">
        
        <input type="submit" value="ajouteur" name="button">
        </form>
   </div>
    </div>
</body>
</html>