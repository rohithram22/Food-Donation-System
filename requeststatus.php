<?php
session_start();
 include "dbconnection.php";
 $R = $_GET['rno'];
 $query = "UPDATE food_requests set status = 'accepted' WHERE rno= '$R'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
    $query = "select * from food_requests WHERE rno= '$R'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }   
    while($row=$result->fetch_assoc()){
        $EmailOrg = $row['Email'];
        
    }
    $EmailRes = $_SESSION['EMAIL'];


    $query1 = "insert into delivery(rno,EmailOrg,EmailRes) values ('$R','$EmailOrg','$EmailRes') ";    
    
    $result1 = mysqli_query($connection, $query1);
    if(!$result1){
       //echo "yes"; 
       die();
    }
?>

<script>
window.location.href="requests.php";
</script>