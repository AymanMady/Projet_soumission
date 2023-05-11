<?php
  include_once "../connexion.php";
  $id_ens= $_GET['id_ens'];
  $req = mysqli_query($conn , "DELETE FROM matiere WHERE 	id_matiere = $id_ens");
  header("Location:matiere.php")
?>