<?php
session_start();
$db = new SQLite3('5up3r5tr0ngdb.db');
if(isset($_POST["submit1"]) && isset($_POST['otp'])){
  $otp=$_POST['otp'];
  $stm = $db->prepare("select * from details where otp=:otp");
  $stm->bindValue(':otp', $otp);
  $result = $stm->execute();
  $nrows = 0;
  while ($result->fetchArray()){
    $nrows++;
  }
  
  if(!$nrows){
    $_SESSION['Error'] = "Invalid otp";
  }
  else{
    $_SESSION['otp']=$otp;
    echo '<script type="text/javascript"> window.location = "welcome.php" </script>';
  }
}
?>
<!doctype html>
<html lang="us-en">
	<head>
	<h1 style="color:white;text-align:center;">Authentication Schemes using Color and Images</h1>
		<title>LOGIN</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8" />
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		<style>
			body {
  background-image:url('tr5.png'); 
  background-size: cover;}

ul#menu li {
  display:inline-block;
  font-size: 20px;
  width:100px;
  font-weight: bolder;
}

a:link,a:visited  {
  color:white;
  background-color: transparent;
  text-decoration: none;
}
a:hover ,a:active{
  color: red;
  background-color: transparent;
  text-decoration: underline;
}
.otp-form {
  font-family: "Roboto", sans-serif;
  width:600px;
  margin:30px auto;
  background:linear-gradient(to right, #ffffff 0%, #fafafa 50%, #ffffff 99%);
  border-radius: 10px;
}

.form-header  {
  background-color: tomato;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.form-header h1 {
  font-size: 30px;
  text-align:center;
  color:black;
  padding:20px 0;
  border-bottom:1px solid grey;
}
/*---------------------------------------*/
/* Form Body */
/*---------------------------------------*/
.form-body {
  padding:10px 40px;
  color:red;
  font-weight: bold;
}

.form-group{
  margin-bottom:20px;
}

.form-body .label-title {
  color:black;
  font-size: 17px;
  font-weight: bold;
}

.form-body .form-input {
    font-size: 17px;
    box-sizing: border-box;
    width: 100%;
    height: 34px;
    padding-left: 10px;
    padding-right: 10px;
    color: black;
    text-align: left;
    border: 1px solid black;
    border-radius: 4px;
    background: white;
    outline: none;
}

.horizontal-group .left{
  float:left;
  width:49%;
}

.horizontal-group .right{
  float:right;
  width:49%;
}

/*---------------------------------------*/
/* Form Footer */
/*---------------------------------------*/
.form-footer {
 clear:both;
}
/*---------------------------------------*/
/* Form Footer */
/*---------------------------------------*/
.signup-form .form-footer  {
  background-color:white;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  padding:10px 40px;
  text-align: right;
  border-top: 1px white;
}

.form-footer span {
  float:left;
  margin-top: 10px;
  color:red;  
  font-style: italic;
  font-weight: bold;
}

.btn {
   display:flex;
   padding:8px 15px;
   background-color: #0066ff;
    margin-left:200px;
   font-size:17px;
   border:none;
   border-radius:5px;
   color:white;
   cursor:pointer;color: white; font-weight: bold;
}

.btn:hover {
  background-color: red;
  color:white;
}

#a{
 text-align:left;
 color: black;
 font-weight: bold;
}
#link{ 
 color: red
; }
		</style>
	</head>
	
	<body>
	<hr>
<div class="container">
 <ul id="menu" class="top-left">
      <li><a class="current" href="index.php">Home</a></li>
          <li><a href="first_step.php">Sign Up</a></li>
          <li><a href="login.php">Sign In</a></li>
          <li><a href="Contact.html">Contact</a></li>
</ul>
</div>
<hr>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="otp-form" >
		
	<div class="form-header">
        <h1 style="color:white;">Enter otp</h1>
      </div>
      <div class="form-body"> 
      <div class="form-group left">
					<input type="number" class="form-input" name="otp" placeholder="otp">
				</div>

				<button type="submit" class="btn " name="submit1" >Login</button>
<?php
if( isset($_SESSION['Error']) ){
  echo $_SESSION['Error'];
  unset($_SESSION['Error']);
}
?>
			</form>
		</div>
	</body>
</html>

