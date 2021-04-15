
<?php
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign In</title>

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
<form action="functions.php" method="post">
  <br><br><br><br><br>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Sign In</h2>
    <h3 class="fs-subtitle"></h3>
    <input type="text" name="email" id="email" placeholder="Email" required/>
    <input type="password" name="password" id="password" placeholder="Password" required/>
    <br>
    <br>
    <span><a href="forgotPassword.php" style="font-size:12px">Forgot Password?</a></span>
    <br><br><br> 
    <input type="button" name="Sign Up" onclick="window.location='SignUp.php'" class="previous action-button" value="Sign Up" />
    <button type="submit" id="submit" name="submitbuttonlogin" class="submit-button" ><span><p style="color:white;">Sign In</p></span></button>
  </fieldset>
  
</form>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="./script.js"></script>

</body>
</html>




