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
    $query = "select * from signup where Email= '".$_SESSION['EMAIL']."'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
    while($row=$result->fetch_assoc()){
        $Name = $row['Name'];
        $Contact = $row['Contact'];
        $About = $row['About'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">

</head>

<style>
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

* {margin: 0; padding: 0;}
html {
	height: 100%;
	/*Image only BG fallback*/
	
	/*background = gradient + image pattern combo*/
	/* background:  
		/*linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));*/
		 /* linear-gradient(rgba(206, 10, 85, 0.6), rgba(235, 101, 12, 0.6)) !important;  */ 
}
    #submit{
        background-color:rgb(175, 6, 85) !important;
    }
    #details{
        
        height: 100px;
    }
    #heading-k{
        font-weight: bold;
    }
    
</style>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Food Donation System</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
              
            </ul>

        </div>
        
        <button class="btn btn-outline-light my-2 my-sm-0" onclick="window.location='Home.php'" type="Home">Home</button>
    </nav>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 ">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h3 class="title text-center" id="heading-k">Update Details</h3> <br>
                    <form action="updatedetails.php" method="post">

                        <div class="form-group">
                        
                
                        <div class="row pt-3">
                            <div class="col">
                                <label for="name"><b>
                                        <h7> Name:</h7>
                                    </b></label>
                                <input type="test" id="name" name="name" class="form-control "
                                    placeholder="" value="<?php echo $Name?>" required>
                            </div>

                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <label for="name"><b>
                                        <h7> Contact:</h7>
                                    </b></label>
                                <input type="text" id="name" name="contact" class="form-control "
                                    placeholder="" value="<?php echo $Contact?>" required>
                            </div>

                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <label for="name"><b>
                                        <h7> About:</h7>
                                    </b></label>
                                <textarea id="name" name="about" class="form-control "
                                    placeholder="" required><?php echo $About?></textarea>
                            </div>

                        </div>
                        
                         <br>
                        
                             <center>
                            <input class="btn bg-gra-02 text-white" type="submit" id="submit" name="submitnewdetails" value="Update">
                            </center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        
</body>

</html>
<?php
extract($_POST);
if(isset($_POST['submitnewdetails'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $about = $_POST['about'];
    $query = "UPDATE signup set Name = '$name', Contact = '$contact', About = '$about' WHERE Email= '".$_SESSION['EMAIL']."'"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
       //echo "yes"; 
       die();
    }
    
     ?>
    <script>
       window.location.href="Home.php";
    </script>  
   <?php
}


?>