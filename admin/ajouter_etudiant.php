
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
                $matricule = test_input($_POST['matricule']);
                $semestre = test_input($_POST['semestre']);
                $annee = test_input($_POST['annee']);
                $nom =  test_input($_POST['nom']);
                $prenom = test_input($_POST['prenom']); 
                $Date_naiss = test_input($_POST['Date_naiss']); 
                $lieu_naiss =  test_input($_POST['lieu_naiss']);
                $email =  test_input($_POST['email']);
           if( !empty($matricule) && !empty($semestre)  && !empty($annee) && !empty($nom) && !empty($prenom) && !empty($Date_naiss) && !empty($lieu_naiss)  && !empty($email)){
                $req = "INSERT INTO etudiant ( `matricule`, `nom`,`prenom`,`lieu_naiss`, `Date_naiss`, `semestre`,`annee`, `email`,`id_role`) VALUES('$matricule', '$nom','$prenom','$lieu_naiss','$Date_naiss', '$semestre','$annee','$email',3)";
                                
                $req = mysqli_query($conn , $req);
                if($req){
                    header("location: etudiant.php");
                }else {
                    $message = "Etudiant non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="etudiant.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Ajouter un etudiant</h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        
        <label>Matricule</label>
        <input type="number" autocomplete="off" name="matricule">
        <label>Nom</label>
        <input type="text" name="nom">
        <label>Prénom</label>
        <input type="text" name="prenom">
        <label>Lieu de naissance</label>
        <input type="text" name="lieu_naiss">
        <label>Date de naissance</label>
        <input type="date" name="Date_naiss">
        <label>Semestre</label>
        <input type="text" name="semestre">
        <label>Année</label>
        <input type="text" name="annee">
        <label>E-mail</label>
        <input type="email" name="email">
        
        <input type="submit" value="ajouteur" name="button">
        </form>
   </div>
    </div>
</body>
</html>