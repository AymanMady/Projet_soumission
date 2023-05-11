<?php 
// session_start() ;
// if($_SESSION["admin"]!="oui"){
//     header("location:../authentification.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
</head>
<body>
    <?php
      include "nav_bar.php"
    ?>
    <div class="content">
    <?php
          include_once "../connexion.php";
        function test_input($data){
                $data = htmlspecialchars($data);
                $data = trim($data);
                $data = htmlentities($data);
                $data = stripcslashes($data);

                return $data;
            }
       if(isset($_POST['button'])){
        $libelle = test_input($_POST['libelle']);
        $filiere = test_input($_POST['filiere']); 
           if( isset($libelle) && isset($filiere) ){
                $req = mysqli_query($conn , "INSERT INTO matiere(`libelle`, `filiere`)
                 VALUES('$libelle', '$filiere')");
                if($req){
                    header("location: matiere.php");
                }else {
                    $message = "matiere non ajouté";
                }

           }else {
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="matiere.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2 class="title_joueur">Ajouter un matiere</h2>
        <p class="erreur_message">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST" autocomplete="off" class="sign-in-form">
      <input type="text" name="code" required placeholder="code">
      <input type="libele" name="libele" required placeholder="libele">
      <select id="academic" name="semester">
            <option selected disabled> Semesters </option>
            <?php while ($row = mysqli_fetch_assoc($academic_qry)): ?>
                <option value="<?php echo $row['id_semestre']; ?>"> <?php echo $row['libelle']; ?> </option>
            <?php endwhile; ?>
        </select>
      <select name="module" id="mod">
        <option selected disabled>Modules</option>
        
                <?php
            while ($row = mysqli_fetch_assoc($module_qry)) :?>
                <option> <?php echo $row['id_module']; ?> </option>  
            <?php endwhile;?>
        </select>
      <select id="deppartement" name="departement">
            <option selected disabled>deppartements</option>
        </select>
        <input type="submit" value="ajouteur" name="button">
        
   </form>
   </div>
    </div>
</body>
</html>