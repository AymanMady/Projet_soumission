

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailler matiere</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</br></br></br>
<div class="container">
    <div class="row">
        <div class="col-lg-12"> 
            <ol class="breadcrumb">
                <li><a href="acceuil.php">Acceuil</a>
                          
                </li>
                <li>Gestion des matiéres</li>

            </ol>
        </div>
    </div>
<?php

include_once "../connexion.php";
$id_matiere = $_GET['id_matiere'];


$req_detail = "SELECT * FROM matiere WHERE id_matiere = $id_matiere";
$req = mysqli_query($conn , $req_detail);
while($row=mysqli_fetch_assoc($req)){
?>
 <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <fieldset>
          <legend>Matiére</legend>
          <br><br>
          
          <?php echo "<strong>Code de la matiere : </strong>". $row['code']; ?><br>
          <?php echo "<strong>Libellè : </strong>". $row['libelle']; ?><br>
          <?php echo "<strong> Specialite : </strong>" . $row['specialite']; ?><br>
        </fieldset>
        <br><br>
      </div>
    </div>
  </div>
  <p>
        <a href="matiere.php" class = "btn btn-primary" >Retour</a>
        </p>

<?php
    
}
include "../nav_bar.php";
?>

</body>
</html>