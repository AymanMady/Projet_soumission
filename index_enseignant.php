
<br>
<?php
 session_start() ;
 $email = $_SESSION['email'];
 if($_SESSION["role"]!="ens"){
     header("location:authentification.php");
 }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
 
<?php 
include "nav_bar.php";
?>
</br></br></br>
<div class="container" style="position: fixed ;">
    <div class="row">
        <div class="col-lg-12"> 
            <ol class="breadcrumb">
                <li><a href="#">Acceuil</a>       
                </li>
                <li>Les matières enseignées par l'enseignant <?php //echo $nom_ens ?> </li>     
            </ol>
        </div>
    </div>
<div style="overflow-x:auto;" style="position: fixed;" >
  <table class="table table-striped table-bordered">
          <tr>
              <th>Code</th>
              <th>Libelle</th>
              <th>Specialite</th>
              <th>Action</th>
          </tr>
          <?php 
              include_once "connexion.php";
              $req_ens_mail =  "SELECT * FROM matiere,enseigner,enseignant WHERE enseignant.id_ens=enseigner.id_ens and matiere.id_matiere=enseigner.id_matiere and enseignant.email ='$email'";

              $req = mysqli_query($conn , $req_ens_mail);
              if(mysqli_num_rows($req) == 0){
                  echo "Il n'y a pas encore des matiere ajouter !" ;
                  
              }else {
                  while($row=mysqli_fetch_assoc($req)){
                    ?>
                      <tr>
                          <td><?=$row['code']?></td>
                          <td><?=$row['libelle']?></td>
                          <td><?=$row['specialite']?></td>
                          <td><a href="admin/detail_enseignant_matiere.php?id_matiere=<?=$row['id_matiere']?>">Detailler</a></td>
                          
                      </tr>
                    <?php
                  }
              }
          ?>
        </table>
    </div>
</div>
</body>
</html>
