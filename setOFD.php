<?php
 include "dbconnection.php";
 $Rk = $_GET['rno'];
 $query = "UPDATE delivery set OFD = 'yes' WHERE rno= '$Rk'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
?>

<script>
window.location.href="catereraccepted.php?rno=<?php echo $Rk?>";
</script>