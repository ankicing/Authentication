<?php
  session_start();
  $db = new SQLite3('5up3r5tr0ngdb.db');
  if (!empty($_POST)){
    if(isset($_POST["submit1"]) && isset($_POST['Id']) && isset($_POST['Name']) && isset($_POST['password']) && isset($_POST['password1']) && isset($_POST['email'])){
    if($_POST['password'] === $_POST['password1']){
      $pass=md5($_POST['password']);
      $name=$_POST['Name'];
      $id=$_POST['Id'];
      $email=$_POST['email'];
      $stm = $db->prepare("select * from details where id = :id");
      $stm->bindParam(":id", $id);
      $result = $stm->execute(); 
      $nrows = 0;
      while ($result->fetchArray()){
          $nrows++;
      }
      if(!$nrows){
        $stm = $db->prepare("INSERT INTO details (Name, Id, Password, email) VALUES ( ?, ?, ?,?)");
        $stm->bindParam(1, $name);
        $stm->bindParam(2, $id);
        $stm->bindParam(3, $pass);
        $stm->bindParam(4, $email);
        if(!$stm->execute()) {
          $_SESSION['Error'] = "Something went wrong, please try again.";
        }
        else{
          echo "<script>alert('Registration Successful');</script>";
          $_SESSION['id']=$id;
          sleep(2);
          header("Location: graphical.php");
        }
      }
      else{
        $_SESSION['Error'] = "User ID already registered.";
      }
    }
    else{
      $_SESSION['Error'] = "Password did not match.";
    }
    }
    else{
      $_SESSION['Error'] = "You left one or more of the required fields.";
    }
  }
?>

<!doctype html>
<html lang="us-en">
	<head><h1 style="color:white;text-align:center;">Authentication Schemes using Color and Images</h1>
		<title>FIRST STEP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8" />
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		<style>
		body {
  background-image:url('tr5.png');
  background-size: cover; }
ul#menu li {
  display:inline-block;
  font-size: 20px;
  width:100px;
  font-weight: bolder;
}
a:link,a:visited {
  color: white;
  background-color: transparent;
  text-decoration: none;
}
a:hover ,a:active{
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}
.signup-form {
  font-family: "Roboto", sans-serif;
  width:650px;
 
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
  font-weight: thin;
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
#bottom{
  position:absolute;
  width:100%;
  bottom:0;
  left:0;
}
input[type="file"] {
 outline: none;
 cursor:pointer;
 font-size: 17px;
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
   display:inline-block;
   padding:10px 20px;
   background-color: #0066ff;
   font-size:17px;
   border:none;
   border-radius:5px;
   color:white;
   cursor:pointer;
   font-weight: bold; 
}

.btn:hover {
  background-color: red;
  color:white;
}
#a{
 text-align:left;
 color: black;
 font-weight: bold
}
#link{ 
 color:  red;
 font-weight: bold 
}
			
		</style>
	</head>
	
	<hr>
	<div class="container">
 <ul id="menu" class="top-left">
      <li><a class="current" href="index.php">Home</a></li>
          <li><a href="first_step.php">Sign Up</a></li>
          <li><a href="login.php">Sign In</a></li>
          <li><a href="Contact.html">Contact</a></li>
</ul><hr>
</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="signup-form">
		<div class="form-header">
        <h1 style="color:white;">Create Account</h1>
		</div>
		<div class="form-body">
		<div class="horizontal-group">
          <div class="form-group left">
			
				
					<label class="label-title">Name*</label>
					<input type="text" class="form-input" name="Name" placeholder="Name">
				</div>
				<div class="form-group right">
					<label class="label-title">Id*</label>
					<input type="text" class="form-input" name="Id" placeholder="Id">
				</div></div>
				<div class="horizontal-group">
          <div class="form-group left">
					<label class="label-title">Password*</label>
					<input type="password" class="form-input" name="password" placeholder="Password">
				</div>
				<div class="form-group right">
					<label class="label-title">Confirm Password*</label>
					<input type="password" class="form-input" name="password1" placeholder="Password">
				</div>
        <div class="horizontal-group">
          <div class="form-group left">
					<label class="label-title">Email*</label>
					<input type="email" class="form-input" name="email" placeholder="example@gmail.com">
				</div>
				<div class="form-footer">
        <span>* required</span>
        <a   href="index.php">
				 <input id="cancelButton" class="btn"style="" onclick="cancelButton_Click" type="button" value="Cancel"></a>
				<button type="submit" class="btn btn-default" name="submit1" style="color: #white; font-weight: bold; margin-left: 0;">Register</button>
				<p id="a" >Have an account? <a id="link"href="login.php"><u>Sign In<u></a></p>
			</form>
<?php
if( isset($_SESSION['Error']) )
{
  echo $_SESSION['Error'];
  unset($_SESSION['Error']);
}
?>
		</div>
	</body>
</html>

