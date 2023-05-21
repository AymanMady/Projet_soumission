

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailler etudiant</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

include_once "../connexion.php";
$id_etud = $_GET['id_etud'];


$req_detail = "SELECT * FROM etudiant WHERE id_etud = $id_etud";
$req = mysqli_query($conn , $req_detail);
while($row=mysqli_fetch_assoc($req)){
?>
<script>
Swal.fire({
    title: "Etudiant ",
    html: '<?php echo "Matricule: ". $row['matricule']; ?><br><?php echo "Nom: ". $row['nom']; ?><br><?php echo " Prenom : " . $row['prenom']; ?><br><?php echo "Date de naissance: ".$row['Date_naiss']; ?><br><?php echo "Lieu de naissance : ". $row['lieu_naiss']; ?><br><?php echo "E-mail : ".$row['email']; ?><br><?php echo "Semestre : ".$row['semestre']; ?><br><?php echo "Année : ".$row['annee']; ?>',
    confirmButtonColor: '#db0b49',
    confirmButtonText: 'Close!',
    icon: 'info',
    
    showClass: {
        popup: 'animate__animated animate__fadeInDown'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
    }
    
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href='etudiant.php';
    } else {
        window.location.href='etudiant.php';
    }
    });

 </script>
<?php
    
}
?>

</body>
</html>