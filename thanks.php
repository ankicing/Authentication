<?php
session_start();
if(!isset($_SESSION['id'])){ //if login in session is not set
    header("Location: first_step.php");
}
?>
<!doctype html>
<html lang="us-en">
<br>
	<head>
	<h1 style="color:white;text-align:center;">Authentication Schemes using Color and Images</h1>
  <hr>
  <br>
  <br>
	<h1 style="color:white;text-align:center; font-weight: bold">Thank you for Registering with us.</h1>
  <br>
</head>

<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
body
{
  background-image:url('tr5.png'); 
  background-size: cover;}
.btn {
   display:inline-block;
   padding:10px 20px;
   background-color: #0066ff;
   font-size:17px;
   border:none;
   border-radius:5px;
   color:white;
   cursor:pointer;
   color: white;
   margin-left:700px;
}

.btn:hover {
  background-color: red;
  color:white;
}

	</style>
		
		</div>
		<a   href="login.php">
    <input id="createButton" class="btn"style="" onclick="createButton_Click" type="button" value="Login"></a>
	</body>
</html>