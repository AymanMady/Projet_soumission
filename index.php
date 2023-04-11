<?php
session_start();

// Vérifier si la session est active
if (session_status() !== PHP_SESSION_ACTIVE) {
  // Rediriger l'utilisateur vers la page de connexion
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
    <h1>hello</h1>
</body>
</html>