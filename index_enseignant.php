<?php
 session_start() ;
 $email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma page avec une navbar constante</title>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
 
<?php
  //include "nav_bar.php";
  ?>


 
<div class="menu-bar">
        <ul>
            <li>
                <a href="#">Enseignants</a>
                <ul class="dropdown">
                    <li>
                        <a href="#">Matiére</a>
                        <a href="#">Devoirs</a>
                        <a href="#">Examens</a>
                        
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Soumission</a>
            </li>
        </ul>
        <div class="logout" >
            <a href="supprimer_session.php">Se déconnecte</a></div>
        </div>
    </div>


<!-- 
  <div class="content">
    
  </div>  -->

  <div class="content">
  <table >
          <tr id="items">
              <th>Code</th>
              <th>Libelle</th>
              <th>Specialite</th>
          </tr>
          <?php 
              include_once "connexion.php";
              $req_ens_mail =  "SELECT * FROM matiere
                  NATURAL JOIN enseigner NATURAL JOIN enseignant
                  WHERE enseignant.email = '$email'";

              $req = mysqli_query($conn , $req_ens_mail);
              if(mysqli_num_rows($req) == 0){
                  echo "Il n'y a pas encore des groupes ajouter !" ;
                  
              }else {
                  while($row=mysqli_fetch_assoc($req)){
                    ?>
                      <tr>
                          <td><?=$row['code']?></td>
                          <td><?=$row['libelle']?></td>
                          <td><?=$row['specialite']?></td>
                          
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
