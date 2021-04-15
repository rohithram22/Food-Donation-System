
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
    $Email = $_SESSION['EMAIL'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous" rel="stylesheet" >
    
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat);
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
    padding-top: 50px;
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

* {margin: 0; padding: 0;}
html {
	height: 100%;
	/*Image only BG fallback*/
	
	/*background = gradient + image pattern combo*/
	/* background:  
		/*linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));*/
		 /* linear-gradient(rgba(206, 10, 85, 0.6), rgba(235, 101, 12, 0.6)) !important;  */ 
}
@import url(https://fonts.googleapis.com/css?family=Montserrat);

#about{
    font-size:15px;
}
#update{
        background-color:rgb(175, 6, 85) !important;
        
    }
    input:checked + .slider {
  background-color: #2196F3;
}
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
                <li class="nav-item">
                    <a href="requests.php" class="nav-link">Requests</a>
                </li>
                <li class="nav-item">
                    <a href="acceptedrequests.php" class="nav-link">Accepted Requests</a>
                </li>
            </ul>
        </div>
        <?php
         } 
         elseif($_SESSION['ROLE'] == "Organisation"){
        ?>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="mrequests.php" class="nav-link">Requests</a>
                </li>
                <li class="nav-item">
                    <a href="createrequests.php" class="nav-link">Create Request</a>
                </li>
            </ul>
        </div>
        <?php
          }
          elseif($_SESSION['ROLE'] == "Caterer"){ 
            $query = "select * from caterer_status ";    
            $query .= "where Email='$Email'";
    
            $result = mysqli_query($connection, $query);
            if(!$result){
                die();
            } 
            while($row=$result->fetch_assoc()){
                $status=$row['Status'];
                $_SESSION['cstatus'] = $status;
                if($status == 'inactive'){
                    $x="Active";
                }
                else{
                    $x="Inactive";
                }
            }
          
          ?>
          <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="catererrequests.php" class="nav-link">Requests</a>
                </li>
                
            </ul>
            
        </div>
        <button class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='togglestate.php?status=<?php echo $status?>'" name="logout" type="Logout"><?php echo "Set Status to ".$x?></button>
          
          <?php
          }
          
          ?>
          &nbsp;
          <?php
          if($_SESSION['ROLE'] == "Caterer"){ 
           ?>
           <button class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='setinactive.php?email=<?php echo $_SESSION['EMAIL'] ?>'" name="logout" type="Logout">Logout</button>
           <?php   
          }else{
          ?>
        <button class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='SignIn.php'" name="logout" type="Logout">Logout</button>
        <?php   
          }
          ?>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="updateinfo">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h7>Select the data to be updated</h7>
                                </div>
                                <div class="modal-body">
                                <h7>Select the data to be updated</h7>
                                </div>
                                <div class="modal-footer">
                                <button id="update" class="btn btn-outline-light my-2 my-sm-0" data-dismiss="modal"  name="close" type="Logout">Close</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div> 
    <?php
     $Email = $_SESSION['EMAIL'];
     $query = "select * from signup ";    
     $query .= "where Email='$Email'";

     $result = mysqli_query($connection, $query);
   if(!$result)
     {  
       die("Query Failed".mysqli_error());
     }   
    while($row=$result->fetch_assoc()){
         $role = $_SESSION['ROLE'];
         $name = $row['Name'];
         $about = $row['About'];
         $contact = $row['Contact'];
         $address = $row['Address'];
         $city = $row['City'];
         $pincode = $row['Pincode'];
         $state = $row['State'];
    } 
    ?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 ">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h3 class="title text-center" id="heading-k"><?php echo $name; ?><br><p class="text-muted mb-0 small"><?php echo $role; ?></p></h3> <br>
                    

                        <div class="form-group">
                        <div class="row pt-3">
                            <div class="col">
                                <label for="name">
                                        <p id="about"><?php echo $about; ?></p>
                                    </label>
                            </div> 
                        </div>   
                        <div class="row pt-3">
                            <div class="col">
                                <label for="name"><b>
                                        <h7> Contacts:</h7>
                                    </b></label>
                                     <p><?php echo "Email: ".$Email; ?></p>
                                     <p><?php echo "Contact Number: ".$contact; ?></p>
                            </div>


                            <div class="col">
                                <label for="pass"><b>
                                        <h7>Location Details:</h7>
                                    </b></label>
                                    <p><?php echo $address; ?></p>
                                     <p><?php echo $city."-".$pincode; ?></p>
                                     <p><?php echo $state; ?></p>

                            </div>
                        </div>
                        
                        <?php
                        if($role == "Caterer"){
                              ?>
                             <h6><?php echo "Status: ".$status ?></h6>  
                            <?php 
                        }
                        
                        ?>
                       <br>
                        <br>
                         <center>
                        <button id="update" class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">Update Information</button>
                        </center>
                        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select the required update:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <center>
                        <button id="update" class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='updatepassword.php'">Update Password</button><br><br>
                        <button id="update" class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='updatedetails.php'" >Update Details</button><br><br>
                        <button id="update" class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='updatelocation.php'" >Update Location</button>
      </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-light my-2 my-sm-0" id="update" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                    
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script>
 

</script>
</body>

</html> 