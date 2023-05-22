
<?php
session_start() ;
$email = $_SESSION['email'];
if($_SESSION["role"]!="admin"){
    header("location:authentification.php");
}

include "../nav_bar.php";
?>
</br></br></br>
<div class="container">
    <div class="row">
        <div class="col-lg-12"> 
            <ol class="breadcrumb">
                <li><a href="acceuil.php">Acceuil</a>
                    
                </li>
                <li >Gestion des enseignants</li>
                   
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

                                <div class="form-group">
                                    <div class="col-md-4 col-sm-3">
                                        <input type="text" name="search" value="" class="search-text form-control" placeholder="Chercher..." />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Filtre</button>

                            </div>
                        </div>
                    </fieldset>
                
            </div>
            <!-- /well -->
        </div>
    </div>
    <div class="text-center">
       
    </div>
    <br>
    <p>
        <a href="ajouter_enseignant.php" class = "btn btn-primary" >Nouveau</a>
    </p>
    <div style="overflow-x:auto;">

        <table class="table table-striped table-bordered">
                <tr>
                    <th>Nom et Prénom</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>E-mail</th>
                    <th>Diplôme</th>
                    <th>Grade</th>
                    <th colspan="2">Action</th>
                </tr>


            <?php 
                    include_once "../connexion.php";
                     $req1 = "SELECT * FROM enseignant;";
                    $req = mysqli_query($conn , $req1);
                    if(mysqli_num_rows($req) == 0){
                        echo "Il n'y a pas encore des utilisateur ajouter !" ;
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                           <tr>
                            <td><?=$row['nom']?>
                                <?=$row['prenom']?></td>
                                <td><?=$row['Date_naiss']?></td>
                                <td><?=$row['lieu_naiss']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['diplome']?></td>
                                <td><?=$row['grade']?></td>
                                <td><a href="modifier_enseignant.php?id_ens=<?=$row['id_ens']?>">Modifier</a></td>
                                <td><a href="supprimer_enseignant.php?id_ens=<?=$row['id_ens']?>"onclick="return confirm(`voulez-vous vraiment supprimé ce enseignant ?`)">Supprimer</a></td>
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
</body>
</html>
