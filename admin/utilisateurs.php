
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les utilisateurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <?php
     include "nav_bar.php";
    ?>
    <div class="content">
    <div class="content_crud">
            <div class="button">
                <div><a href="ajouter_utilisateur.php" class="Btn_add"> <img title="Ajouter" src="images/plus.png"> Ajouter</a></div> 
            </div>
            <table >
                <tr id="items">
                    <th>E-mail</th>
                    <th>Rôle</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php 
                    include_once "../connexion.php";
                    $req = mysqli_query($conn , "SELECT * FROM utilisateur inner join role using(id_role)");
                    if(mysqli_num_rows($req) == 0){
                        echo "Il n'y a pas encore des utilisateur ajouter !" ;
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['login']?></td>
                                <td><?=$row['profile']?></td>
                                <td><a href="modifier_utilisateur.php?id_user=<?=$row['id_user']?>"><img title="Modifier" class="img" src="images/pen.png"></a></td>
                                <td><a href="supprimer_utilisateur.php?id_user=<?=$row['id_user']?>"onclick="return confirm(`voulez-vous vraiment supprimé ce utilisateur ?`)"><img title="Supprimer" class="img" src="images/trash.png"></a></td>
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