
<?php 

include_once "../connexion.php";
//include 'include_common/header.php' ;
$semestre = "SELECT * FROM semestre ";
$semestre_qry = mysqli_query($conn, $semestre);
$module = "SELECT distinct(id_module) FROM module";
$module_qry = mysqli_query($conn,$module);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Matiere</title>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   border-radius: 5px;
}

.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#333;
}

.container .content h3 span{
   background: crimson;
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:crimson;
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: rgb(20, 87, 220);
}

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:crimson;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: rgb(90, 20, 220);
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:rgb(30, 20, 220);
   text-decoration: none;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
    </style>


</head>
<body>                             
<div class="form-container">
    <form action="insert.php" method="POST" class="sign-in-form">
        <h2>Ajouter une Matiere</h2>
        
                <input type="text" name="codematieres" class="" placeholder="Code de Matiere"required="">
        
                <input type="text" name="nommatieres" class="" placeholder="libellé" required>

                <select class="form-select" id="academic" value="Semesters" name="semester">
                    <option selected disabled> Semesters </option>
                            <?php while ($row = mysqli_fetch_assoc($semestre_qry)) : ?>
                        <option value="<?= $row['id_semestre']; ?>"> <?= $row['libelle']; ?> </option>
                    <?php endwhile; ?> 
                </select>
<!-- 
            <input type="text" class="form-control col-md-11" placeholder="New module" name="module" id="add" style="display:none;"> -->
                <select  name="module" id="modi">
                <option selected disabled> Modules </option>
                        <?php while ($row = mysqli_fetch_assoc($module_qry)) :?>
                        <option value="<?= $row['id_module']; ?>"> <?= $row['id_module']; ?> </option>  
                    <?php endwhile;?>
                </select>
                <!-- <img src="new.png" alt="" onclick="myf1()" id="back" style="display:none;margin-left:95%;margin-top:-13.5%;width: 17px;height: 17px;"><img src="edit.png" id="addn" alt="" onclick="myf()" style="margin-left:95%;margin-top:-13.5%;width: 17px;height: 17px;">
                         -->

                <select class="form-select" id="deppartement" name="departement">
                    <option selected disabled>deppartements</option>
                </select>
            
           <input type="submit" id="btn" class="form-btn" name="submit" value="Ajouter">
            
        </div>
    </form>

</div>


<script>
    function myf(){
        document.getElementById("mod").style.display = "none";
        document.getElementById("back").style.display = "inline";
        document.getElementById("add").style.display = "block";
        document.getElementById("addn").style.display = "none";
    }
    function myf1(){
        document.getElementById("mod").style.display = "block";
        document.getElementById("back").style.display = "none";
        document.getElementById("add").style.display = "none";
        document.getElementById("addn").style.display = "inline";
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // County State  
    $('#academic').on('change',function() {
        var academic_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'departement.php',
            type: "POST",
            data: {
                academic_data: academic_id
            },
            success: function(result) {
                $('#deppartement').html(result);
                // console.log(result);
                // alert(result);
            }
        })
    });





    
</script>
</form>
</body>
</html>