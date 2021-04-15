<?php
    include "dbconnection.php";
    session_start(); 
    if(!isset($_SESSION['EMAIL'])){
        ?>
         <script>
            window.location.href="SignIn.php";
         </script>  
        <?php
       
    } 
    $query1 = "select * from delivery where EmailCat='".$_SESSION['EMAIL']."' ";
    $result1 = mysqli_query($connection,$query1);
    if(!$result1){
        die("Query Failed".mysqli_error());
    }
    while($row1 = $result1->fetch_assoc()){     
      //$EmailCat = $row1['EmailCat'];
      $rnum = $row1['rno'];
      $delivered = $row1['delivered'];
      if(isset($rnum) && $delivered != 'yes'){
        ?>
        <script>
            window.location.href="catereraccepted.php?rno=<?php echo $rnum ?>";
        </script>
        <?php
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caterer Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    
  
<style>
  @import url(https://fonts.googleapis.com/css?family=Montserrat);
  * {margin: 0; padding: 0;}
html {
	height: 100%;
	/*Image only BG fallback*/
	
	/*background = gradient + image pattern combo*/
	/* background:  
		/*linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));*/
		 /* linear-gradient(rgba(206, 10, 85, 0.6), rgba(235, 101, 12, 0.6)) !important;  */ 
         
}

body {
	font-family: montserrat, arial, verdana;
    /* background: 
		/*linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));*/
		/* linear-gradient(rgba(105, 83, 91, 0.6), rgba(235, 101, 12, 0.6)) !important; */ 
    background: rgb(230,230,230) !important;     
    
}

.navbar {
    background-color:rgb(175, 6, 85) !important;
}

.navbar-brand {
    font-weight: bold !important;
}



.card-4 {
    
    background: white !important; ;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
}




@media (max-width: 767px) {
    .card-4 .card-body {
        padding: 50px 40px;
    }
}



.p-t-130 {
    padding-top: 80px;
}
.p-b-100 {
    padding-bottom: 300px;
}
.page-wrapper {
    min-height: 50vh;
}

.wrapper {
    margin: 0 auto;
}


.wrapper--w680 {
    max-width: 500px;
}


</style>

</head>

<style>
    #accept, #decline, #withdraw {
        background-color:rgb(175, 6, 85) !important;
        position: relative;
    }
    button[name="accept"]{
      background-color:rgb(175, 6, 85) !important;
        position: relative;
    }
    #cards{
       background-color:white;
        width: 800px;
        
        margin: 0 auto;
       position: relative;
    }
    
</style>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Food Donation System</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
         if($_SESSION['ROLE'] == "Caterer"){
        ?>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                
            </ul>
        </div>
        <?php
         } 
         elseif($_SESSION['ROLE'] == "Organisation"){
        ?>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                   
            </ul>
        </div>
        <?php
          } 
          ?>
        <button class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='Home.php'" type="Home">Home</button>
    </nav>


    <div  class="container py-5">
  
    <div class="row">
      <div class="col-lg-8 mx-auto">
  
        <!-- List group-->
        <ul class="list-group shadow">
        <div id="request">
        <?php
             $count=0;
            $query = "select * from food_requests";
            $result = mysqli_query($connection,$query);
            if(!$result){
                die("Query Failed 1".mysqli_error());
            }   
            while($row = $result->fetch_assoc()){   
                 
              if($row['status'] == "accepted" && $_SESSION['cstatus'] == 'active'){
                $Emailorg = $row['Email'];
            $query1 = "select * from signup where Email='$Emailorg' ";
            $result1 = mysqli_query($connection,$query1);
            if(!$result1){
                die("Query Failed 2".mysqli_error());
            }
            while($row1 = $result1->fetch_assoc()){     
              $pincode1 = $row1['Pincode'];
              $Name1 = $row1['Name'];
              $City1 = $row1['City'];
              $Address1 = $row1['Address'];
              $Contact1 = $row1['Contact'];
            }
            $query2 = "select EmailRes from delivery where EmailOrg='".$Emailorg."' ";
            $result2 = mysqli_query($connection,$query2);
            if(!$result2){
                die("Query Failed 3".mysqli_error());
            }
            while($row2 = $result2->fetch_assoc()){     
              $EmailRes = $row2['EmailRes'];
            } 
            $query1 = "select * from signup where Email='$EmailRes' ";
            $result1 = mysqli_query($connection,$query1);
            if(!$result1){
                die("Query Failed 2".mysqli_error());
            }
            while($row1 = $result1->fetch_assoc()){     
              $pincode2 = $row1['Pincode'];
              $Name2 = $row1['Name'];
              $City2 = $row1['City'];
              $Address2 = $row1['Address'];
              $Contact2 = $row1['Contact'];
            }        
            $query3 = "select * from signup where Email='".$_SESSION['EMAIL']."'";
            $result3 = mysqli_query($connection,$query3);
            if(!$result1){
                die("Query Failed 3".mysqli_error());
            }
            while($row3 = $result3->fetch_assoc()){     
                $pincode3 = $row3['Pincode'];

              } 
                  

            if($pincode1 === $pincode3 ){  
               $RNO = $row['rno'];
              $count=$count+1;
        ?>
          <!-- list group item-->
          <li id="cards"  class="list-group-item">
            <!-- Custom content-->
            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
              <div class="media-body order-2 order-lg-1">
              <p class="font-italic text-muted mb-0 small"><?php echo "Request #".$row['rno']; ?></p>
                <h5 class="mt-0 font-weight-bold mb-2">Restaurant Details:</h5>
                <h6 ><?php echo $Name2.'-'.$Contact2 ; ?></h6>
                <h6 ><?php echo $Address2.'-'.$City2.'-'.$pincode2 ; ?></h6>
                <h5 class="mt-0 font-weight-bold mb-2" >Organisation Details:</h5>                    
                <h6 ><?php echo $Name1.'-'.$Contact1 ; ?></h6>
                <h6 ><?php echo $Address1.'-'.$City1.'-'.$pincode1 ; ?></h6>
                <div class="d-flex align-items-center justify-content-between mt-1">

                  
                  <ul class="list-inline small">
                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                    
                  </ul>
                </div>
                
                <div class="float-lg-right">
                <button id="<?php echo $RNO; ?>" class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='catereraccepted.php?rno=<?php echo $RNO ?>'" name="accept" type="Logout">Accept</button>
                
                </div>
            </div>
            </div>
            </li>
            <br>
                <?php
            }
              
              }
              elseif($_SESSION['cstatus'] != 'active' ){
                  ?><script>
                  alert("Turn status to active");
                  window.location.href="home.php";
                  </script>
                  <?php
              }
                 ?>
            <!-- End -->
          
          
          <!-- End -->
         <?php } ?>
          
        </ul>
        <!-- End -->
      </div>
    </div>
  </div>
  <?php
  if($count==0){
    ?>
    <script>
        alert("There are no requests");
        window.location.href="home.php";
    </script>
    <?php
}
  
  ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>