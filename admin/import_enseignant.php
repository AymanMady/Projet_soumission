
<?php require '../connexion.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
		<link rel="stylesheet" href="../CSS/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
	</head>
	<body>
	<?php
      include "nav_bar.php"
    ?>
    <div class="content_import">
		<h1>Importation de données à partir d'un fichier Excel </h1>
		<form action="" method="post" enctype="multipart/form-data">
		<label for="file">Sélectionner un fichier Excel :</label>
		<input type="file" id="file" name="file" accept=".xlsx" required>
		<input type="submit" name="import" value="Importer">
		</form>
		<!-- souleiman modi -->
		<footer>
		<p>&copy; 2023 - Importation de données à partir d'un fichier Excel</p>
		</footer>
		
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["file"]["name"];
			$fileExtension = explode('.', $fileName);
      		$fileExtension = strtolower(end($fileExtension));
			$newFileName = date("d.m.y") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['file']['tmp_name'], $targetDirectory);
			
			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$code = $row[0];
				$nom = $row[1];
                $prenom = $row[2];
                $Date_naiss = $row[3];
                $lieu_naiss = $row[4];
                $login = $row[5];


			if(mysqli_query($conn, "INSERT INTO enseignant( 
					`			code`, `nom`, `prenom`,
								`Date_naiss`,`lieu_naiss` ,
								`login`,`id_role`)
								VALUES(
								'$code', '$nom','$prenom',
								'$Date_naiss', '$lieu_naiss', 
								'$login',3)")){
                		header("location:enseignant.php");
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
