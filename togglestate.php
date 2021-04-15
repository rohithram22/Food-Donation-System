<?php
 session_start();
 include "dbconnection.php";
 $Email = $_SESSION['EMAIL'];
 $R = $_GET['status'];
 if($R == "active"){
     $K = "inactive";
 }
 else{
    $K = "active";
 }
 $query = "UPDATE caterer_status set Status = '$K' WHERE Email= '$Email'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       
       die();
    }
?>

<script>
window.location.href="home.php";
</script>