
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

         

                // $matricule = test_input($_POST['matricule']);
                // $semestre = test_input($_POST['semestre']);
                // $annee = test_input($_POST['annee']);
                // $nom =  test_input($_POST['nom']);
                // $prenom = test_input($_POST['prenom']); 
                // $Date_naiss = test_input($_POST['Date_naiss']); 
                // $lieu_naiss =  test_input($_POST['lieu_naiss']);
                

                
                $login =  test_input($_POST['login']);
                $pwd =  md5(test_input($_POST['pwd']));
                $role =  test_input($_POST['role']);
                //test_input(extract($_POST));
           if(isset($login)  && isset($pwd) && isset($role) ){

                $req = "INSERT INTO utilisateur (`login`,`pwd`,`active`,`id_role`)VALUES('$login','$pwd',1,$role)";

                                
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