<?php 
$conn=mysqli_connect('localhost','root','');
$sql="CREATE database users_bd";
mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql)){
    echo 'normale';
}
$conn=mysqli_connect('localhost','root','','users_bd');
mysqli_query($conn,'CREATE TABLE `users` (
    `id` int(10) PRIMARY KEY AUTO_INCREMENT ,
    `nom` varchar(50) DEFAULT NULL,
    `email` varchar(50) DEFAULT NULL
  );
  ');






?>