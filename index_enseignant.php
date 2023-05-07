<?php
session_start() ;
if($_SESSION["admin"]!="oui"){
    header("location:authentification.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma page avec une navbar constante</title>
  <link rel="stylesheet" href="CSS/style_index_ens.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="navbar-brand"><li class="navbar-item"><a href="#">soumission</a></li></div>
      <ul class="navbar-menu">
        
      </ul>
      <button class="submit-button">deconnecte</button>
    </nav>
  </header>
  <div class="content">
    <!-- Contenu de la page -->
  </div>
</body>
</html>
