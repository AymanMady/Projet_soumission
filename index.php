<?php
session_start();

if (!$_SESSION['admin']) {
  header('Location: authentification.php');
  session_destroy();
  exit();
}

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

  
  </div>
</body>

</body>
</html>