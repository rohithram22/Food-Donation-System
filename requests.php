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
   
    
    $count=0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Requests</title>
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
         if($_SESSION['ROLE'] == "Restaurant"){
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
            $Email = $_SESSION['EMAIL'];
            $Role = $_SESSION['ROLE'];
            $query = "select * from food_requests";
            $result = mysqli_query($connection,$query);
            if(!$result){
                die("Query Failed 1".mysqli_error());
            }   
            
            while($row = $result->fetch_assoc()){   
                 
              if($Role == "Restaurant"){
                $Emailorg = $row['Email'];
            $query1 = "select Pincode from signup where Email='$Email' ";
            $result1 = mysqli_query($connection,$query1);
            if(!$result1){
                die("Query Failed 2".mysqli_error());
            }
            while($row1 = $result1->fetch_assoc()){     
              $pincode_res = $row1['Pincode'];
            }
            $query2 = "select * from signup where Email='$Emailorg' ";
            $result2 = mysqli_query($connection,$query2);
            if(!$result2){
                die("Query Failed 3".mysqli_error());
            }
            while($row2 = $result2->fetch_assoc()){     
              $pincode_org = $row2['Pincode'];
              $Name = $row2['Name'];
              $City = $row2['City'];
            } 
            if($pincode_res === $pincode_org && $row['status'] == 'view' ){  
               $RNO = $row['rno'];
               $count = $count + 1;     
              
        ?>
          <!-- list group item-->
          <li id="cards"  class="list-group-item">
            <!-- Custom content-->
            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
              <div class="media-body order-2 order-lg-1">
              <p class="font-italic text-muted mb-0 small"><?php echo "Request #".$row['rno']; ?></p>
                <h5 class="mt-0 font-weight-bold mb-2"><?php echo $row['Subject']; ?></h5>
                <p class="text-muted mb-0 small"><?php echo $row['Details']; ?></p>
                <div class="d-flex align-items-center justify-content-between mt-1">
                 
                  <h6 class="font-weight-bold my-2"><?php echo $Name.'-'.$City.'-'.$pincode_org ; ?></h6>
                  <ul class="list-inline small">
                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                    
                  </ul>
                </div>
                
                <div class="float-lg-right">
                <button id="<?php echo $RNO; ?>" class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='requeststatus.php?rno=<?php echo $RNO?>'" name="accept" type="Logout">Accept</button>
                
                </div>
            </div>
            </div>
            </li>
            <br>
                <?php
            }  
              }
                 elseif($Role == "Organisation"){
                  $Emailorg = $row['Email'];
                  $Rn = $row['rno'];
                  if($Email === $Emailorg && $row['status'] == 'view'){
                ?> 
                <!-- list group item-->
          <li id="cards" class="list-group-item">
            <!-- Custom content-->
            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
              <div class="media-body order-2 order-lg-1">
                <h5 class="mt-0 font-weight-bold mb-2"><?php echo $row['Subject']; ?></h5>
                <p class="font-italic text-muted mb-0 small"><?php echo $row['Details']; ?></p>
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
                <button id="withdraw" class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='requestwithdraw.php?rno=<?php echo $Rn?>'" name="withdraw" type="Logout">Withdraw</button>
                </div>
                
                 
              </div>
             </div>
             </li>
             <br>
                <?php } 
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