<?php
  include_once "../connexion.php";
  $id_ens= $_GET['id_ens'];
  $id_matiere= $_GET['id_matiere'];
  $req = mysqli_query($conn , "DELETE FROM enseigner WHERE id_ens = '$id_ens' and id_matiere = '$id_matiere'");
  if($req){
    header("Location:matiere.php");
  }
?>