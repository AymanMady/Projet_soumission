<?php 
session_start() ;
if($_SESSION["admin"]!="oui"){
    header("location:../authentification.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="menu-bar">
        <ul>
            <li>
                <a href="#">Administration</a>
                <ul class="dropdown">
                    <li>
                        <a href="etudiant.php">Etudiants</a>
                        <a href="enseignant.php">Enseignants</a>
                        <a href="groupe.php">Groupes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">soumission</a>
            </li>
        </ul>
        <div class="logout" >
            <a href="../supprimer_session.php">Se déconnecte</a></div>
        </div>
    </div>
</body>
</html>