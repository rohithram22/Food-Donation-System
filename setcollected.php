<?php
 include "dbconnection.php";
 $Rk = $_GET['rno'];
 $query = "UPDATE delivery set collected = 'yes' WHERE rno= '$Rk'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
?>

<script>
window.location.href="resstatus.php?rno=<?php echo $Rk?>";
</script>