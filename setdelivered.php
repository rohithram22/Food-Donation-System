<?php
 include "dbconnection.php";
 $Rk = $_GET['rno'];
 $query = "UPDATE delivery set delivered = 'yes' WHERE rno= '$Rk'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
    $query = "UPDATE food_requests set status = 'done' WHERE rno= '$Rk'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }  
?>

<script>
window.location.href="orgstatus.php?rno=<?php echo $Rk?>";
</script>