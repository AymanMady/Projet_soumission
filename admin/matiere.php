<title>Les matiéres</title>
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
        </div>
    </div>
    <div class="text-center">
       
    </div> 
    <br>
    <p>
        <a href="ajoute_matiere.php" class = "btn btn-primary" >Nouveau</a>
    </p>
    <div style="overflow-x:auto;">

    <?php
include_once "../connexion.php";

// Récupération des enseignants
$enseignant_query = "SELECT * FROM enseignant";
$enseignant_result = mysqli_query($conn, $enseignant_query);

// Vérification si des matières existent
$matiere_query = "SELECT * FROM matiere inner join module using(id_module) inner join semestre using(id_semestre)";
$matiere_result = mysqli_query($conn, $matiere_query);

if (mysqli_num_rows($matiere_result) == 0) {
    echo "Il n'y a pas encore de matières ajoutées !";
} else {
    ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Code</th>
            <th>Libelle</th>
            <th>Specialite</th>
            <th>Modile</th>
            <th>Semester</th>
            <th>Affectation</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($matiere_result)) {
            ?>
            <tr>
                <td><?= $row['code'] ?></td>
                <td><?= $row['libelle'] ?></td>
                <td><?= $row['specialite'] ?></td>
                <td><?= $row['nom_module'] ?></td>
                <td><?= $row['nom_semestre'] ?></td>
                <td>
                    <form action="affecter_matiere.php" method="POST">
                        <select class="form-control" name="enseignant_id">
                            <option selected disabled>Enseignant</option>
                            <?php
                            // Réinitialisation du curseur des enseignants
                            mysqli_data_seek($enseignant_result, 0);
                            while ($enseignant_row = mysqli_fetch_assoc($enseignant_result)) {
                                ?>
                                <option value="<?= $enseignant_row['id_ens'] ?>"><?= $enseignant_row['nom'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="hidden" name="matiere_id" value="<?= $row['id_matiere'] ?>">
                        <br>
                        <button type="submit" class = "btn btn-primary">Affecter</button>
                    </form>
                </td>
                <td><a href="modifier_matiere.php?id_matiere=<?= $row['id_matiere'] ?>">Modifier</a></td>
                <td><a href="supprimer_matiere.php?id_matiere=<?= $row['id_matiere'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette matière ?')">Supprimer</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>
</div>
</body>
</html>

