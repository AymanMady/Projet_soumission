<?php
include_once "../connexion.php";
$ens = "SELECT * FROM enseignant ";
$ens_qry = mysqli_query($conn, $ens);
$groupe = "SELECT * FROM groupe";
$groupe_qry = mysqli_query($conn,$groupe);
$type_matiere = "SELECT * FROM type_matiere";
$type_matiere_qry = mysqli_query($conn,$type_matiere);
?>



<?php
session_start() ;
$email = $_SESSION['email'];
if($_SESSION["role"]!="admin"){
    header("location:authentification.php");
} 
?>


<?php
$id_matiere = $_GET['id_matiere'];

function test_input($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = htmlentities($data);
        $data = stripcslashes($data);
        return $data;
    }
    if (isset($_POST['button'])) {
    
        // Vérifiez si les champs enseignant et groupe sont des tableaux
        if (isset($_POST['enseignant']) && isset($_POST['groupe']) && isset($_POST['type_matiere']) ) {
            $enseignants = $_POST['enseignant'];
            $groupes = $_POST['groupe'];
            $type_matieres = $_POST['type_matiere'];

    
            // Parcourez les tableaux enseignant et groupe pour insérer les valeurs correspondantes dans la base de données
            foreach ($enseignants as $key => $enseignant) {
                $groupe = $groupes[$key];
                $type_matiere = $type_matieres[$key];

    
                if (!empty($enseignant) && !empty($groupe)  && !empty($type_matiere)) {
                    $req = mysqli_query($conn, "INSERT INTO enseigner (`id_matiere`, `id_ens`, `id_groupe`, `id_type_matiere`) VALUES ('$id_matiere', '$enseignant', '$groupe' , '$type_matiere')");
    
                    if (!$req) {
                        $message = "Erreur lors de l'ajout de l'enseignant et du groupe.";
                        break;
                    }
                } else {
                    $message = "Veuillez remplir tous les champs.";
                    break;
                }
            }
    
            if (!isset($message)) {
                header("location: matiere.php");
                exit();
            }
        } else {
            $message = "Veuillez sélectionner au moins un enseignant et un groupe et une type de matiere .";
        }
    }

include "../nav_bar.php";

?>
<script type="text/JavaScript">
    var i = 1;

   
    function ToAction(url) {
        window.location.href = url;
    }

    function createNewElement() {
        i++;
        // First create a DIV element.
        var txtNewInputBox = document.createElement('div');
        txtNewInputBox.className = "col-md-12";
        //txtNewInputBox.className = 'form-group';
        var div1 = document.createElement('div');
        var div2 = document.createElement('div');
        var div3 = document.createElement('div');
        var div4 = document.createElement('div');

        div2.className = "col-md-2";
        div2.className = "col-md-3";
        div3.className = "col-md-2";
        div4.className = "col-md-2";

      
        // Then add the content (a new input box) of the element.
        var nm =  i;
        div1.innerHTML = "<label class='col-md-3'> Enseignant " + i + "</label>"
        txtNewInputBox.appendChild(div1);
        div2.innerHTML = "<select  name='enseignant[]' id='modi' class = 'form-control'><option selected disabled> Enseignants </option><?php while ($row_ens = mysqli_fetch_assoc($ens_qry)) :?><option value='<?= $row_ens['id_ens']; ?>'> <?= $row_ens['nom'].' '.$row_ens['prenom']; ?> </option>  <?php endwhile;?></select>";
        txtNewInputBox.appendChild(div2);
        div3.innerHTML = "<select  name='groupe[]' id='modi1' class = 'form-control' ><option selected disabled> Groupes </option><?php while ($row_groupe = mysqli_fetch_assoc($groupe_qry)) :?><option value='<?= $row_groupe['id_groupe']; ?>'> <?= $row_groupe['libelle']; ?> </option>  <?php endwhile;?></select>";
        txtNewInputBox.appendChild(div3);
        div4.innerHTML = "<select  name='type_matiere[]' id='modi1' class = 'form-control' ><option selected disabled> Type Matiere </option><?php while ($row_type_matiere = mysqli_fetch_assoc($type_matiere_qry)) :?><option value='<?= $row_type_matiere['id_type_matiere']; ?>'> <?= $row_type_matiere['libelle_type']; ?> </option>  <?php endwhile;?></select><br>";
        txtNewInputBox.appendChild(div4);
        // div4.innerHTML = "<input type='text' class='form-control' name=" + nm + " multiple/><input type='file' name='files' multiple/>";
        // txtNewInputBox.appendChild(div4);
        document.getElementById("newElementId").appendChild(txtNewInputBox);
    }


</script>



</br>
</br></br></br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            
            <ol class="breadcrumb">
            <li><a href="#">Acceuil</a>
                    
                    </li>
                    <li>Gestion des matière</li>
                    <li>Affecter une matière</li>
            </ol>
        </div>
    </div>
 
   
    <div class="form-horizontal">
    <br /><br />

    <p class="erreur_message">
            <?php 
            $ens = "SELECT * FROM enseignant ";
            $ens_qry = mysqli_query($conn, $ens);
            $groupe = "SELECT * FROM groupe";
            $groupe_qry = mysqli_query($conn,$groupe);
            $type_matiere = "SELECT * FROM type_matiere";
            $type_matiere_qry = mysqli_query($conn,$type_matiere);
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        <div class="form-group">
            <label class="col-md-2">Enseignant 1 </label>
            <div class="col-md-3">
            <select  name="enseignant[]" id="modi" class = "form-control">
                <option selected disabled> Enseignants </option>
                        <?php  while ($row_ens = mysqli_fetch_assoc($ens_qry)) :?>
                        <option value="<?= $row_ens['id_ens']; ?>"> <?= $row_ens['nom']." ".$row_ens['prenom']; ?> </option>  
                    <?php endwhile;?>
                </select>
            </div>
            <div class="col-md-2">
            <select  name="groupe[]" id="modi1" class = "form-control">
                <option selected disabled> Groupes </option>
                        <?php  while ($row_groupe = mysqli_fetch_assoc($groupe_qry)) :?>
                        <option value="<?= $row_groupe['id_groupe']; ?>"> <?= $row_groupe['libelle']; ?> </option>  
                    <?php endwhile;?>
                </select>
            </div>
            <div class="col-md-2">
            <select  name="type_matiere[]" id="modi1" class = "form-control">
                <option selected disabled> Type Matiere </option>
                        <?php  while ($row_type_matiere = mysqli_fetch_assoc($type_matiere_qry)) :?>
                        <option value="<?= $row_type_matiere['id_type_matiere']; ?>"> <?= $row_type_matiere['libelle_type']; ?> </option>  
                    <?php endwhile;?>
                </select>
            </div>

            <br>  <br> <br>
            <div class="form-group" id="newElementId">
            </div>
            <br>  <br> <br>
            <div class="col-md-12">
            <button type="button" onclick="createNewElement();">
                 Ajouter un enseignant
            </button>
            </div>
            <br>  <br> <br>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" name="button" value="Enregistrer" class="btn-primary"  />

            </div>
        </div>
    </form>


