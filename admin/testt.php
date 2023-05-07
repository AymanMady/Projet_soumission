<?php require 'bd.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
    <head> 
        <meta charset="utf-8">
        <title>Import Excel To MySQL</title>
        <link rel="stylesheet" href="importez.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    </head>
<body>
    <?php
      include "nav_bar.php"
    ?>
    <div class="content_import">
        <h1 class="h">Importation de données à partir d'un fichier XLSX</h1>
        <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Sélectionner un fichier XLSX :</label>
        <input type="file" id="file" name="file" accept=".xlsx" required>
        <input type="submit" name="import" value="Importer">
    </form>
    <footer>
        <p>&copy; 2023 - Importation de données à partir d'un fichier XLSX</p>
    </footer>
        
        <?php
        if(isset($_POST["import"])){
            $fileName = $_FILES["file"]["name"];
            $fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));
            $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

            $targetDirectory = "uploads/" . $newFileName;
            move_uploaded_file($_FILES['file']['tmp_name'], $targetDirectory);

            error_reporting(0);
            ini_set('display_errors', 0);

            require 'excelReader/excel_reader2.php';
            require 'excelReader/SpreadsheetReader.php';

            $reader = new SpreadsheetReader($targetDirectory);
            foreach($reader as $key => $row){
                $matricule = $row[0];
                $groupe = $row[1];
                $semestre = $row[2];
                $nom = $row[3];
                $prenom = $row[4];
                $email = $row[5];
                


                if(mysqli_query($conn, "INSERT INTO etudiant( `id_etudiant`, id_groupe,id_symestre,`nom`, `prenom`,email) VALUES('$matricule', '$groupe','$semestre','$nom','$prenom', '$email',2)")){
                    header("location:list_etudiant.php");
                }
            }

            echo
            "
            <script>
            alert('Succesfully Imported');
            document.location.href = '';
            </script>
            ";
        }
        ?>
    </div>
    </body>
</html>