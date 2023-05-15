<?php
include "../nav_bar.php";
?>
</br></br></br>
<div class="container">
    <div class="row">
        <div class="col-lg-12"> 
            <ol class="breadcrumb">
                <li><a href="#">Acceuil</a>
                    
                </li>
                <li class="active">Gestion des utisateurs</li>
                   
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="well">
                
                    <fieldset class="fsStyle">
                        <legend class="legendStyle">
                            <a data-toggle="collapse" data-target="#demo" href="#">Filtre</a>
                        </legend>
                        <div class="collapse in" id="demo">
                            <div class="search-box">

<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les utilisateurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <?php
     include "nav_bar.php";
    ?>
    <div class="content">
    <div class="content_crud">
            <div class="button">
                <div><a href="ajouter_utilisateur.php" class="Btn_add"> <img title="Ajouter" src="images/plus.png"> Ajouter</a></div> 
=======
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-3">
                                        <input type="text" name="search" value="" class="search-text form-control" placeholder="Chercher..." />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Filtre</button>

                            </div>
                        </div>
                    </fieldset>
                
>>>>>>> 21c8a8f9ea506b12c206018120794937600f76db
            </div>
            <!-- /well -->
        </div>
    </div>
    <div class="text-center">
       
    </div>
    <br>
    <p>
        <a href="ajouter_utilisateur.php" class = "btn btn-primary" >Nouveau</a>
    </p>
    <div style="overflow-x:auto;">

        <table class="table table-striped table-bordered">
            <tr>
                    <th>E-mail</th>
                    <th>Rôle</th>
                    <th colspan="2">Action</th>
               
            </tr>


            <?php 
                    include_once "../connexion.php";
                    $req = mysqli_query($conn , "SELECT * FROM utilisateur inner join role using(id_role)");
                    if(mysqli_num_rows($req) == 0){
                        echo "Il n'y a pas encore des utilisateur ajouter !" ;
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['login']?></td>
                                <td><?=$row['profile']?></td>
                                <td><a href="modifier_utilisateur.php?id_user=<?=$row['id_user']?>">Modifier</a></td>
                                <td><a href="supprimer_utilisateur.php?id_user=<?=$row['id_user']?>"onclick="return confirm(`voulez-vous vraiment supprimé ce utilisateur ?`)"> Supprimer</a></td>
                            </tr>
                            <?php
                        }
                    }
                ?>



        </table>
    </div>
    <div class="pager">
            </div>

</div>

