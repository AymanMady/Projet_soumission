<?php 
session_start() ;
if($_SESSION["admin"]!="oui"){
    header("location:../authentification.php");
}
?>
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
        $groupe_cm = test_input($_POST['groupe_cm']);
        $groupe_tp =  test_input($_POST['groupe_tp']);
        $filiere = test_input($_POST['filiere']); 
           if( isset($groupe_cm) && isset($groupe_tp) && isset($filiere) ){
                $req = mysqli_query($conn , "INSERT INTO groupe(`groupe_cm`, `groupe_tp`, `filiere`) VALUES('$groupe_cm', '$groupe_tp', '$filiere')");
                if($req){
                    header("location: groupe.php");
                }else {
                    $message = "groupe non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="groupe.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Ajouter un groupe</h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        <label>groupe_cm</label>
        <input type="text" name="groupe_cm">
        <label>groupe_tp</label>
        <input type="text" name="groupe_tp">
        <label>filiére</label>
        <input type="text" name="filiere">
        <input type="submit" value="ajouteur" name="button">
        </form>
   </div>
    </div>
</body>
</html>