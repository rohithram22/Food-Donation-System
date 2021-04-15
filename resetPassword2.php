<?php
include "dbconnection.php";
session_start();
if(isset($_POST['submitbuttonresetnp'])){
    $Password = $_POST['passwordn'];
    $hashFormat = "$2y$10$";
    $token = $_SESSION['token'];
    $salt = "iusesomecrazystrings22";  
    $hashF_and_salt = $hashFormat.$salt;
    $Password = crypt($Password,$hashF_and_salt);
    $query = "UPDATE signup set Password = '$Password' WHERE token= '$token'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
    
        ?> 
    <script>    
     alert("Password is Reset");
     window.location.href="SignIn.php";
    </script> <?php  
}

 ?>