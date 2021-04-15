<?php
 include "dbconnection.php";
 $R = $_GET['email'];
 $query = "UPDATE caterer_status set Status = 'inactive' WHERE Email= '$R'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
?>

<script>
window.location.href="SignIn.php";
</script>