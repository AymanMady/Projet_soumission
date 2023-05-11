<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les enseignants</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
</head>
<body>
    <?php
      include "nav_bar.php"
    ?>
    <div class="content">
    <div class="content_crud">
            <div class="button">
                <div><a href="ajouter_enseignant.php" class="Btn_add"> <img title="Ajouter" src="images/plus.png"> Ajouter</a></div> 
                <div><a href="import_enseignant.php" class="Btn_add"> <img title="Importer" src="images/importer.png"> importer</a></div>    
            </div>
            <table >
                <tr id="items">
                    <th>Nom et Prénom</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>E-mail</th>
                    <th>Diplôme</th>
                    <th>Grade</th>
                    <th colspan="2">action</th>
                </tr>
                <?php 
                    include_once "../connexion.php";
                    $req = mysqli_query($conn , "SELECT * FROM enseignant");
                    if(mysqli_num_rows($req) == 0){
                        echo "Il n'y a pas encore des enseignants ajouter !" ;
                        
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                            <td><?=$row['nom']?>
                                <?=$row['prenom']?></td>
                                <td><?=$row['Date_naiss']?></td>
                                <td><?=$row['lieu_naiss']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['diplome']?></td>
                                <td><?=$row['grade']?></td>
                                <td><a href="modifier_enseignant.php?id_ens=<?=$row['id_ens']?>"><img title="Modifier" class="img" src="images/pen.png"></a></td>
                                <td><a href="supprimer_enseignant.php?id_ens=<?=$row['id_ens']?>"onclick="return confirm(`voulez-vous vraiment supprimé ce enseignant ?`)"><img title="Supprimer" class="img" src="images/trash.png"></a></td>
                            </tr>
                            <?php
                        }
                        
                    }
                    
                ?>
            </table>
        </div>
    </div>
    <script>
        // if(confirm() ===true){
        //     alert(`L'enseignant  à eté supprimmer `)
        // }
    </script>
</body>
</html>