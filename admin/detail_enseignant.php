

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

include_once "../connexion.php";
$id_ens = $_GET['id_ens'];


$req_detail = "SELECT * FROM enseignant WHERE id_ens = $id_ens";
$req = mysqli_query($conn , $req_detail);
while($row=mysqli_fetch_assoc($req)){
?>
<script>
Swal.fire({

   
            title: "Enseignant",
            html: '<?php echo "Nom: ". $row['nom']; ?><br><?php echo " Prenom : " . $row['prenom']; ?><br><?php echo "Date de naissance: ".$row['Date_naiss']; ?><br><?php echo "Lieu de naissance : ". $row['lieu_naiss']; ?><br><?php echo "E-mail : ".$row['email']; ?><br><?php echo "Diplôme : ".$row['diplome']; ?><br><?php echo "Grade : ".$row['grade']; ?>',
            confirmButtonColor: '#3085d6',
            //cancelButtonColor: '#d33',
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
              window.location.href='enseignant.php';
            } else {
                window.location.href='enseignant.php';
            }
          });

 </script>
<?php
    
}
?>

</body>
</html>