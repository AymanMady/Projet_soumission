<?php
include "../nav_bar.php";
?>
                <?php

        include_once "../connexion.php";
        $id_groupe = $_GET['id_groupe'];
        $req = mysqli_query($conn , "SELECT * FROM groupe WHERE id_groupe = '$id_groupe'");
        $row = mysqli_fetch_assoc($req);


        if(isset($_POST['button'])){ 
        extract($_POST);
        if( !empty($libelle) && !empty($filiere) ){
            $req = mysqli_query($conn, "UPDATE groupe SET  libelle = '$libelle', filiere = '$filiere' WHERE id_groupe = $id_groupe");
            if($req){
                header("location: groupe.php");
            }else {
                $message = "groupe non modifié";
            }

        }else {
            $message = "Veuillez remplir tous les champs !";
        }
        }

        ?>

</br>
</br></br></br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            
            <ol class="breadcrumb">
            <li><a href="#">Acceuil</a>
                    
                    </li>
                    <li>Gestion des groupes</li>
                    <li class="active">Ajouter un groupe</li>
            </ol>
        </div>
    </div>
   
   <div class="form-horizontal">
    <br /><br />

    <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        <div class="form-group">
            <label class="col-md-1">Libellé</label>
            <div class="col-md-6">
                <input type="text" name="libelle" class = "form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-1" >Filiére</label>
            <div class="col-md-6">
            <input type="text" name="Filiere" class = "form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" name="button" value=Enregistrer class="btn-primary"  />

            </div>
        </div>
    </form>

</div>
</div>
</body>
</html>