
<?php
session_start() ;
$email = $_SESSION['email'];
if($_SESSION["role"]!="ens"){
    header("location:authentification.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailler matiere par enseignant </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
</br></br></br>
<div class="container">
    <div class="row">
        <div class="col-lg-12"> 
            <ol class="breadcrumb">
                <li><a href="acceuil.php">Acceuil</a></li>
                <li>Détails sur la matière <?php //echo  ?> </li>
            </ol>
        </div>
    </div>

    <?php

    include_once "../connexion.php";
    $id_matiere = $_GET['id_matiere'];

    $req_detail = "SELECT * FROM matiere
                    INNER JOIN enseigner ON matiere.id_matiere = enseigner.id_matiere
                    INNER JOIN enseignant ON enseignant.id_ens = enseigner.id_ens
                    WHERE matiere.id_matiere = $id_matiere";
    $req = mysqli_query($conn , $req_detail);
    while($row=mysqli_fetch_assoc($req)){
    ?>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <fieldset>
                <br><br>
                <?php echo "<strong>Nom de l'enseignant : </strong>". $row['nom']." ".$row['prenom']; ?><br>
                <?php echo "<strong>Code de la matiere : </strong>". $row['code']; ?><br>
                <?php echo "<strong>Libellè : </strong>". $row['libelle']; ?><br>
                <?php echo "<strong> Specialite : </strong>" . $row['specialite']; ?><br>
                <?php echo "<strong> E-mail de l'enseignant : </strong>" . $row['email']; ?><br>
                <?php echo "<strong> Diplôme : </strong>" . $row['diplome']; ?><br>
            </fieldset>
            <br><br>
        </div>
    </div>

    <?php
    }
    include "../nav_bar.php";
    ?>
    <p>
        <a href="../index_enseignant.php" class="btn btn-primary">Retour</a>
    </p>

</div> <!-- Fermeture de la div container -->

</body>
</html>