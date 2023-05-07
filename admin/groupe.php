
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les etudiants</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
</head>
<body>
    <?php
      include "nav_bar.php"
    ?>
    <div class="content">
        <div>
            <div class="button">
                <div><a href="ajouter_groupe.php" class="Btn_add"> <img title="Ajouter" src="images/plus.png"> Ajouter</a></div> 
                <div><a href="import_groupe.php" class="Btn_add"> <img title="Importer" src="images/importer.png"> importer</a></div>    
            </div>
            <table >
                <tr id="items">
                    <th>Libelle</th>
                    <th>Filière</th>
                    <th colspan="2">action</th>
                </tr>
                <?php 
                    include_once "../connexion.php";
                    $req = mysqli_query($conn , "SELECT * FROM groupe");
                    if(mysqli_num_rows($req) == 0){
                        echo "Il n'y a pas encore des groupes ajouter !" ;
                        
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['libelle']?></td>
                                <td><?=$row['filiere']?></td>
                                <td><a href="modifier_groupe.php?id_groupe=<?=$row['id_groupe']?>"><img title="Modifier" class="img" src="images/pen.png"></a></td>
                                <td><a href="supprimer_groupe.php?id_groupe=<?=$row['id_groupe']?>"onclick="return confirm(`voulez-vous vraiment supprimé cette groupe ?`)"><img title="Supprime" class="img" src="images/trash.png"></a></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>