<?php 
session_start() ;
$email = $_SESSION['email'];
if($_SESSION["role"]!="admin"){
    header("location:authentification.php");
}

include_once "../connexion.php";
$semestre = "SELECT * FROM matiere ";
$semestre_qry = mysqli_query($conn, $semestre);
include "../nav_bar.php";
?>

<body>  
 

</br>
</br></br></br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            
            <ol class="breadcrumb">
            <li><a href="#">Acceuil</a>
                    
                    </li>
                    <li>Gestion des soumission</li>
                    <li>Ajouter une soumission</li>
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
        <form action="insert.php" method="POST">
       
        <div class="form-group">
            <label class="col-md-1" >matiere</label>
            <div class="col-md-6" >
            <select class = "form-control" id="academic" value="Semesters" name="semester">
                    <option selected disabled> matiere </option>
                            <?php while ($row = mysqli_fetch_assoc($semestre_qry)) : ?>
                        <option value="<?= $row['id_matiere']; ?>"> <?= $row['libelle']; ?> </option>
                    <?php endwhile; ?> 
                </select>            
               </div>
        </div>

        <div class="form-group">
            <label class="col-md-1">date debut </label>
            <div class="col-md-6">
                <input type="datetime-local" name="codematieres" class = "form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">date fin</label>
            <div class="col-md-6">
                <input type="datetime-local" name="codematieres" class = "form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1" >Type soumission</label>
            <div class="col-md-6" >
            <select class = "form-control" id="academic" value="Semesters" name="type">
                    <option selected disabled> Types de soumissions  </option>
                    <option value="examen"> Examen</option>
                    <option value="devoir"> Devoir</option>
                </select>            
               </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">Sélectionnez un fichier : </label>
            <div class="col-md-6">
                <input type="file" id="fichier" name="file">
            </div>
        </div>


 
</form>
</body>
</html>