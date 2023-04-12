<?php
session_start();

// Vérifier si la session est active
if (!$_SESSION['admin']) {
  header('Location: authentification.php');
  session_destroy();
  exit();
}
// Désactiver la mise en cache de la page précédente
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>
<body>
<body>
  <div class="titre"> 
    <h1>Page d'administration</h1> 
  </div>
  <div class="navbar">
    <ul>
    <li><a href="#">Accueil</a></li>
    <li><a href="#">Les etudiants</a></li>
    <li><a href="#">les enseignants</a></li>
    </ul>
  </div>
  <div class="content">
    <!-- Contenu de la page -->
  </div>
</body>

</body>
</html>