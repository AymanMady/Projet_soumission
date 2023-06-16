<?php
session_start();
$email = $_SESSION['email'];
if ($_SESSION["role"] != "ens") {
    header("location:authentification.php");
    exit(); // Ajoutez cette ligne pour arrêter l'exécution du script après la redirection
}

include_once "../connexion.php";
$semestre = "SELECT * FROM matiere,enseigner,enseignant  where matiere.id_matiere = enseigner.id_matiere AND enseigner.id_ens = enseignant.id_ens and email='$email'";
$semestre_qry = mysqli_query($conn, $semestre);

function test_input($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_POST['button'])) {
    $id_matiere = test_input($_POST['semester']);
    $date_debut = test_input($_POST['codematieres']);
    $date_fin =  test_input($_POST['fin']);
    $type = test_input($_POST['type']);
    $titre = test_input($_POST['titre_sous']);
    $descri = test_input($_POST['description_sous']);

    $sql1 = "INSERT INTO `soumission`(`titre_sous`, `description_sous`, `date_debut`, `date_fin`, `valide`, `archive`, `id_matiere`) VALUES ('$titre','$descri','$date_debut','$date_fin',0,0,$id_matiere)";
    mysqli_query($conn, $sql1);

    if ($type == "examen") {
        $sql2 = "INSERT INTO `examen` (`date_examen`, `id_sous`, `id_matiere`) VALUES ('$date_debut',(SELECT id_sous FROM soumission WHERE id_sous=(SELECT MAX(id_sous) FROM soumission)),$id_matiere)";
        mysqli_query($conn, $sql2);
    } else {
        $sql2 = "INSERT INTO `devoir`(`date_devoir`, `id_sous`, `id_matiere`) VALUES('$date_debut',(SELECT id_sous FROM soumission WHERE id_sous=(SELECT MAX(id_sous) FROM soumission)),$id_matiere)";
        mysqli_query($conn, $sql2);
    }

    $lastSousId = mysqli_insert_id($conn); // Obtenez l'ID de la dernière soumission insérée

    if (!empty($_FILES['file']['name'][0])) {
        $fileNames = $_FILES['file']['name'];
        $fileTmpNames = $_FILES['file']['tmp_name'];

        for ($i = 0; $i < count($fileNames); $i++) {
            $fileName = basename($fileNames[$i]);
            $fileTempPath = $fileTmpNames[$i];
            $destinationPath = "C:/Users/HP_LAPTOP/Downloads/$fileName";
            
            if (move_uploaded_file($fileTempPath, $destinationPath)) {
                // Lire le contenu du fichier
                $fileContent = file_get_contents($destinationPath);

                $riq3 = "INSERT INTO `data_test`(`data`, `id_sous`) VALUES ('$fileContent',(SELECT id_sous FROM soumission WHERE id_sous=(SELECT MAX(id_sous) FROM soumission)) )";
                mysqli_query($conn, $riq3);
            }
        }
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
        // Créer un nouvel élément DIV
        var txtNewInputBox = document.createElement('div');
        txtNewInputBox.className = 'form-group';
        var div1 = document.createElement('div');
        var div2 = document.createElement('div');

        div2.className = "col-md-6";


        // Ajouter le contenu (un nouveau champ de fichier) à l'élément
        var nm = i;
        txtNewInputBox.innerHTML = "<label class='col-md-1'>Sélectionnez un fichier : </label>"
        div2.innerHTML = "<input type='file' id='fichier' name='file[]' class='form-control'>";
        txtNewInputBox.appendChild(div2);
        document.getElementById("newElementId").appendChild(txtNewInputBox);
    }
</script>

<body>
    <br /><br />
    <p class="erreur_message">
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </p>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-1">Titre </label>
                <div class="col-md-6">
                    <input type="text" name="titre_sous" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Matière</label>
                <div class="col-md-6">
                    <select class="form-control" id="academic" name="semester">
                        <option selected disabled>Matière</option>
                        <?php while ($row = mysqli_fetch_assoc($semestre_qry)) : ?>
                            <option value="<?= $row['id_matiere']; ?>"><?= $row['libelle']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1">Date début </label>
                <div class="col-md-6">
                    <input type="datetime-local" name="codematieres" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Date fin</label>
                <div class="col-md-6">
                    <input type="datetime-local" name="fin" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Type soumission</label>
                <div class="col-md-6">
                    <select class="form-control" id="academic" name="type">
                        <option selected disabled>Types de soumissions</option>
                        <option value="examen">Examen</option>
                        <option value="devoir">Devoir</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Description</label>
                <div class="col-md-6">
                    <textarea name="description_sous" id="" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1">Sélectionnez un fichier : </label>
                <div class="col-md-6">
                    <input type="file" id="fichier" name="file[]" class="form-control">
                </div>
            </div>
            <div id="newElementId">
            </div>
            <br> <br> <br>
            <div class="col-md-12">
                <button type="button" onclick="createNewElement();">
                    Ajouter un fichier
                </button>
            </div>
            <br> <br> <br>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" name="button" value="Enregistrer" class="btn-primary" />
                </div>
            </div>
        </div>
    </form>
</body>

</html>
