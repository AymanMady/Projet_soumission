<?php
  include_once "../connexion.php";
  $id_etud= $_GET['id_etud'];
  $req = mysqli_query($conn , "DELETE FROM etudiant WHERE id_etud = $id_etud");
  if($req){
    header("Location:etudiant.php");
  }
?>