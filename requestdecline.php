<?php
 include "dbconnection.php";
 $R = $_GET['rno'];
 $query = "UPDATE food_requests set status = 'declined' WHERE rno= '$R'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
?>

<script>
window.location.href="requests.php";
</script>