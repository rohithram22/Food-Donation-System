<?php
include "functions.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css'>
<link rel="stylesheet" href="./style-dropdown.css">
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
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Details</li>
    <li>Location Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">Step 1</h3>
    <div id="app-cover">
      <div id="select-box">
     
      <input type="checkbox" name="role" id="options-view-button">
      <div id="select-button" class="brd">
              <div id="selected-value">
                  <span>Select role</span>
              </div>
              <div id="chevrons">
                      <i class="fas fa-chevron-up"></i>
                      <i class="fas fa-chevron-down"></i>
              </div>
      </div>
      <div id="options">
              <div class="option">
                      <input class="s-c top" type="radio"  name="role" value="Restaurant">
                      <input class="s-c bottom" type="radio" name="role" value="Restaurant">
                      <i class="fas fa-utensils"></i>
                      <span class="label">Restaurant</span>
                      <span class="opt-val">Restaurant</span>
              </div>
              <div class="option">
                      <input class="s-c top" type="radio" name="role" value="Organisation">
                      <input class="s-c bottom" type="radio" name="role"  value="Organisation">
                      <i class="fas fa-hands-helping"></i>
                      <span class="label">Organisation</span>
                      <span class="opt-val">Organisation</span>
              </div>
              <div class="option">
                      <input class="s-c top" type="radio" name="role"  value="Caterer">
                      <input class="s-c bottom" type="radio" name="role" id="role" value="Caterer">
                      <i class="fas fa-truck"></i>
                      <span class="label">Caterer</span>
                      <span class="opt-val">Caterer</span>
              </div>
           
             
              <div id="option-bg"></div>
      </div>
    </div>
    </div>
    <br><br>
    <br><br>
    <br>
    
    <input type="text" name="email" id="email" placeholder="Email"/>
    <input type="password" name="password" id="password" placeholder="Password" />
    <br><br>
    <span><a href="SignIn.php" style="font-size:12px">Already have an Account?</a></span>
    <br><br>
    
          
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Details</h2>
    <h3 class="fs-subtitle">Step 2</h3>
    <input type="text" name="name" id="name" placeholder="Name" />
    <input type="text" name="contact" id="contact" placeholder="Contact Number" />
    <textarea name="about" id="about" placeholder="About"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Location Details</h2>
    <h3 class="fs-subtitle">Step 3</h3>
    <textarea name="address" id="address" placeholder="Address"></textarea>
    <input type="text" name="city" id="city" placeholder="City" />
    <input type="text" name="pincode" id="pincode" placeholder="Pincode" />
    <input type="text" name="state" id="state" placeholder="State" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <button type="submit" id="submit" name="submitbutton" class="submit-button" ><span><p style="color:white;">Submit</p></span></button>
  </fieldset>
</form>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="./script.js"></script>

</body>
</html>




