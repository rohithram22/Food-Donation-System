
<?php  include "dbconnection.php";
 session_start();
 $_SESSION['token'] = $_GET['token'];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>

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
<form action="resetPassword2.php" method="post">
  <br><br><br><br><br>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Reset Password</h2>
    <h3 class="fs-subtitle">Enter new password</h3>
    <input type="password" name="passwordn" id="password" placeholder="Password" required/>
    <br>
    <br>
    <?php   ?>
    <button type="submit" id="submit" name="submitbuttonresetnp" class="submit-button" ><span><p style="color:white;">Reset Password</p></span></button>
  </fieldset>
  
</form>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="./script.js"></script>

</body>
</html>


