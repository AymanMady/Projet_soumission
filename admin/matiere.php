<title>Les matiéres</title>


<?php
include "../nav_bar.php";
?>
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
            <table >
                <!-- <tr id="items">
                    <th>Code</th>
                    <th>Libelle</th>
                    <th>Specialite</th>
                    <th>Modile</th>
                    <th>Semester</th>
                    <th colspan="2">Action</th> -->
            <!-- /well -->
        </div>
    </div>
    <div class="text-center">
       
    </div> 
    <br>
    <p>
        <a href="ajoute_matiere.php" class = "btn btn-primary" >Nouveau</a>
    </p>
    <div style="overflow-x:auto;">

        <table class="table table-striped table-bordered">
                <tr >
                    <th>code</th>
                    <th>libelle</th>
                    <th>specialite</th>
                    <th>id_modile</th>
                    <th>id_semester</th>
                    <th colspan="2">action</th>
                </tr>


                <?php 
                    include_once "../connexion.php";
                    $req = mysqli_query($conn , "SELECT * FROM module inner join  matiere using(id_module) inner join semestre using(id_semestre)");
                    if(mysqli_num_rows($req) == 0){
                        echo "Il n'y a pas encore des enseignants ajouter !" ;
                        
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                            <td><?=$row['code']?></td>
                            <td> <?=$row['libelle']?></td>
                                <td><?=$row['specialite']?></td>
                                <td><?=$row['nom_module']?></td>
                                <td><?=$row['nom_semestre']?></td>
                                <td><a href="modifiere_matiere.php?id_ens=<?=$row['id_matiere']?>">modifier</a></td>
                                <td><a href="supprime_matiere.php?id_ens=<?=$row['id_matiere']?>"onclick="return confirm(`voulez-vous vraiment supprimé cet matiere ?`)">supprime</a></td>
                            </tr>
                            <?php
                        }
                        
                    }
                    
                ?>
        </table>
    </div>
</body>
</html>
