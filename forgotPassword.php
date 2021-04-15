
<?php  include "dbconnection.php"; 
;
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">
</head>
<style>
  .submit-button{
    width: 100px;
	background: #96112e;
	font-weight: bold;
  color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
  font-family: montserrat;
  }
  .submit-button:hover, .submit-button:hover{
    box-shadow: 0 0 0 2px white, 0 0 0 3px #610b0b;
  } 
  a:visited{
    color: blue;
  }
  #msform .action-button {
	width: 100px;
	background: #96112e;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #610b0b;
}
</style>
<body>
<!-- partial:index.partial.html -->
<!-- multistep form -->
<div id="msform">
<form action="forgotPassword.php" method="post">
  <br><br><br><br><br>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Reset Password</h2>
    <h3 class="fs-subtitle">Enter the email</h3>
    <input type="text" name="emailr" id="email" placeholder="Email" required/>
    <br>
    <br>
    <button type="submit" id="submit" name="submitbuttonresetp" class="submit-button" ><span><p style="color:white;">Send Mail</p></span></button>
  </fieldset>
  
</form>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="./script.js"></script>

</body>
</html>
<?php
if(isset($_POST['submitbuttonresetp'])){
  $Email = $_POST['emailr'];
  $query = "select * from signup ";    
  $query .= "where Email='$Email'";

  $result = mysqli_query($connection, $query);
  if(!$result){
      die();
  }
  while ($row = $result->fetch_assoc()) {
    $Name = $row['Name'];
    $token = $row['token']; 
  } 
  if(!isset($Name)){
      ?> 
  <script>    
  alert("Account does not exist");
  window.location.href="forgotPassword.php";
  </script> <?php  
 
  }else {
  require_once('PHPMailer/PHPMailerAutoload.php');
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com'; 
  $mail->Port = '465';
  $mail->isHTML();
  $mail->Username = 'fooddonationsystem@gmail.com';
  $mail->Password = '##########';
  $mail->SetFrom('no-reply@fooddonationsystem.org');
  $mail->Subject = 'Reset Password';
  $mail->Body = "Click link http://localhost:8080/Food-Donation-System/resetPassword.php?token=$token to reset password. ";
  $mail->AddAddress("$Email");
  $mail->Send();
  ?> 
  <script>    
  alert("Mail Sent");
  window.location.href="SignIn.php";
  </script> <?php
  }
}

?>



