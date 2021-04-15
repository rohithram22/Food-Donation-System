<?php 

//usage 

session_start();
include "dbconnection.php";

    if(isset($_POST['submitbutton'])){

        if( isset($_POST['role']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['about']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['pincode']) && isset($_POST['state']) && isset($_POST['email']) ){
            $Email = mysqli_real_escape_string($connection,$_POST['email']);
            $Role = mysqli_real_escape_string($connection,$_POST['role']);
            $Password = mysqli_real_escape_string($connection,$_POST['password']);
            $Name = mysqli_real_escape_string($connection,$_POST['name']);
            $Contact = mysqli_real_escape_string($connection,$_POST['contact']);
            $About = mysqli_real_escape_string($connection,$_POST['about']);
            $Address = mysqli_real_escape_string($connection,$_POST['address']);
            $City = mysqli_real_escape_string($connection,$_POST['city']);
            $Pincode = mysqli_real_escape_string($connection,$_POST['pincode']);
            $State = mysqli_real_escape_string($connection,$_POST['state']);
            $hashFormat = "$2y$10$";
            $salt = "iusesomecrazystrings22";  
            $hashF_and_salt = $hashFormat.$salt;
            $Password = crypt($Password,$hashF_and_salt);
            $token = hash('sha256',uniqid());  
            $query = "insert into signup(Email,Password,Role,Name,Contact,About,Address,City,Pincode,State,token)";    
            $query .= "values ('$Email','$Password','$Role','$Name','$Contact','$About','$Address','$City','$Pincode','$State','$token')";
             
            $result = mysqli_query($connection, $query);
          if(!$result)
            {   ?> 
            <script>    
            alert("Account has been already created with this email");
            </script> <?php    
                die();
            }
            if($Role == "Caterer"){
                $query = "insert into caterer_status(Email,Status)";    
                $query .= "values ('$Email','inactive')";    
                $result = mysqli_query($connection, $query);
                if(!$result)
            {   
                die();
            }
            }
        
            $_SESSION['EMAIL'] = $Email;
            $_SESSION['ROLE'] = $Role; 
           ?>
           <script>
           window.location.href="home.php";
           </script>
           <?php
        }
        else{
              ?>
              <script>
                alert("Fill in all the blanks");
                window.history.back();
              </script>
              <?php
            
        }
             
    }

?>


<?php 



    if(isset($_POST['submitbuttonlogin'])){

        
            $Email = mysqli_real_escape_string($connection,$_POST['email']);
            $Password = mysqli_real_escape_string($connection,$_POST['password']);
            $hashFormat = "$2y$10$";
            $salt = "iusesomecrazystrings22";  
            $hashF_and_salt = $hashFormat.$salt;
            $Password = crypt($Password,$hashF_and_salt);
            $query = "select * from signup ";    
            $query .= "where Email='$Email'";
    
            $result = mysqli_query($connection, $query);
          if(!$result)
            {   ?> 
            <script>    
            alert("Account does not exist");
            
            </script> <?php    
                die();
            }
            while ($row = $result->fetch_assoc()) {
              $Dpassword = $row['Password'];
              $Role = $row['Role'] ; 
            } 
            if(!isset($Dpassword)){
                ?> 
            <script>    
            alert("Account does not exist");
            window.location.href="SignIn.php";
            </script> <?php  
           
            }
            if($Password === $Dpassword){
                $_SESSION['EMAIL'] = $Email;
                $_SESSION['ROLE'] = $Role;
                ?>
                <script>
                    window.location.href="home.php";
                </script>     
                <?php
            }else{
                ?> 
                <script>    
                alert("Incorrect Password");
                window.history.back(); 
                </script> <?php    
            }

        }
        
             
    

?>