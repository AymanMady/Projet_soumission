<?php
   //session_start();
   include_once ("controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style_registration.css">
    <title>Login</title>
</head>
<body>
   
<div class="form-container">

<form action="" method="POST" autocomplete="off" class="sign-in-form">
      <h3>Sign in</h3>

      <input type="email" name="email" required placeholder="Email">
      <select name="role">
        <option value="enseignant">Enseignant</option>
        <option value="etudiant">Etudiant</option>
      </select>
      <input type="submit" name="verifier" value="login" class="form-btn">
      <p><a href="authentification.php">connectez-vous</a></p>
   </form>

</div>
</body>
</html>


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
            url: 'ajax/deppartement.php',
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
