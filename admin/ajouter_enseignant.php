
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
        // $nom_prenom = test_input($_POST['nom_prenom']); 
        // $Date_naiss = test_input($_POST['Date_naiss']); 
        // $lieu_naiss =  test_input($_POST['lieu_naiss']);
        // $login =  test_input($_POST['login']);
        // $diplome =  test_input($_POST['diplome']);
        // $grade =  test_input($_POST['grade']);
            test_input(extract($_POST));
           if( isset($nom) && isset($prenom) && isset($Date_naiss) 
           && isset($lieu_naiss)  && isset($login) && isset($diplome) && isset($grade)  ){
                $req = "INSERT INTO `enseignant`(`nom`,`prenom`, `Date_naiss`, `lieu_naiss`, `login`, `diplome`, `grade`, `id_role`) VALUES('$nom','$prenom','$Date_naiss', '$lieu_naiss' ,'$login' , '$diplome', '$grade' 3)";
                                                                    //
                                                                    //
            
                if(mysqli_query($conn , $req)){
                    header("location: enseignant.php");
                }else {
                    $message = "Enseignant non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="enseignant.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Ajouter un enseignant</h2>
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
        <label>Prénom</label>
        <input type="text" name="prenom">
        <label>Date de naissance</label>
        <input type="date" name="Date_naiss">
        <label>Lieu de naissance</label>
        <input type="text" name="lieu_naiss">
        <label>E-mail</label>
        <input type="email" name="login">
        <label>Diplôme</label>
        <input type="text" name="diplome">
        <label>Grade</label>
        <input type="text" name="grade">
        <input type="submit" value="ajouteur" name="button">
        </form>
   </div>
    </div>
</body>
</html>