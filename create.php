<?php 
$conn=mysqli_connect('localhost','root','','users_bd');
if(isset($_POST['tou'])){
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    mysqli_query($conn,"INSERT INTO `users`(`nom`, `email`) VALUES ( '$nom', '$email')");
}

?>