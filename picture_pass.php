<?php
session_start();
$db = new SQLite3('5up3r5tr0ngdb.db');
if(!isset($_SESSION['id'])){ //if login in session is not set
    header("Location: first_step.php");
}
if(isset($_POST["submit"]) && isset($_POST['pic'])){
  $pic=md5($_POST['pic']);
  $ses=$_SESSION["id"];
  $stm = $db->prepare("UPDATE details SET Picture=:pic WHERE id=:id");
  $stm->bindValue(':pic', $pic);
  $stm->bindValue(':id', $ses);
  if ($stm->execute()) {
    echo '<script>alert("Pictorial Password Added");</script>';
    echo '<script type="text/javascript"> window.location = "thanks.php" </script>';
  }
  else {
    $_SESSION['Error'] = "Something went wrong, please try again.";
  }
}
?>
<!doctype html>
<html lang="us-en">
	<head>
	<h1 style="color:white;text-align:center;">Authentication Schemes using Color and Images</h1>
		<title>Picture Password</title>
		<hr>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8" />
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		<style>
		ul#menu li {
  display:inline-block;
  font-size: 20px;
  width:10px;
  font-weight: bolder;
}
body
{
  background-image:url('tr5.png');
  background-attachment: fixed;
 background-size: cover; }
			#pic{
				height: 420px;
				width: 510px;
				margin-left: 450px;
				border-radius: 5px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
				margin-top: 20px;
			}

			.small_box{
				height: 140px;
				width: 170px;
				border-radius: 3px;
				margin-left: 110px;
				margin-top: 100px;
				padding: 10;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
				overflow: hidden;
			}

			#input{
				margin-top: 30px;
				width: 400px;
			}
			 * {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 20px;
}

/* Clearfix (clear floats) */
.row1::after {
  content: "";
  clear: both;
  display: table;
}
 .form-input {
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
.btn {
   display:inline-block;
   padding:10px 20px;
   background-color: #0066ff;
   font-size:17px;
   border:none;
   border-radius:5px;
   color:white;
   cursor:pointer;
}

.btn:hover {
  background-color: red;
  color:white;
}
		</style>
	</head>
	<body onload="image_crop()">
		<div class="jumbotron" style="background-color: transparent; color: white;">
			<h1 style="margin-left: 20px;">Picture Password Step:-3</h1>
		</div>
		<!--<div class="row">
			<div class="col-md-5">
				<div><img id="pic" src="crop4.jpg" /></div>
			</div>--!>
			<div class="col-md-1">
				<div style="text-align:center height:400px; width:800px; margin-top: 20px; margin-left:660px;">
				<!--<button class="btn" onclick="image_crop()" >Crop</button>--!>
			</div>

			<div class="row1">
  <div class="column">
      	<div class="small_box col-sm-4"><img class="image" data-number="1"  id="00"></div>
					</div>
					 <div class="column">
				<div class="small_box col-sm-4"><img  class="image" data-number="2" id="01"></div>
					</div>
					 <div class="column">
			<div class="small_box col-sm-4"><img  class="image" data-number="3" id="02"></div>
					</div>
					<div class="row1">
					 <div class="column">

			<div class="small_box col-sm-4"><img  class="image" data-number="4" id="10"></div>
					</div>
					 <div class="column">
			<div class="small_box col-sm-4"><img  class="image" data-number="5" id="11"></div>
					</div>
					 <div class="column">
			<div class="small_box col-sm-4"><img  class="image" data-number="6" id="12"></div>
				</div>
				<div class="row1">

					 <div class="column">
		<div class="small_box col-sm-4"><img  class="image" data-number="7" id="20"></div>
					</div>
					 <div class="column">
			<div class="small_box col-sm-4"><img  class="image" data-number="8" id="21"></div>
					</div>
					 <div class="column">
	<div class="small_box col-sm-4"><img class="image" data-number="9" id="22"></div>
					
				</div>
			</div>

		</div>
		<form style="margin-left: 500px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<input type="password" class="form-input" id="input" name="pic" placeholder="Pattern Here" />
			<button class="btn" id="submit" name="submit">Save</button>
<?php
if( isset($_SESSION['Error']) ){
  echo $_SESSION['Error'];
  unset($_SESSION['Error']);
}
?>
		</form>
	<script>
		function image_crop(){

			var m_left=0;
			var m_top=0;
			var i,j;
			for (i=0; i<3; i++)
			{

				m_left=0;
				console.log(i);
				console.log(m_top);
				for(j=0;j<3;j++)
				{
					var temp_id;
					temp_id=i.toString()+j.toString();
					console.log(temp_id);
					document.getElementById(temp_id).src="crop4.jpg";
					document.getElementById(temp_id).style.marginLeft=m_left.toString()+'px';
					
					document.getElementById(temp_id).style.marginTop=m_top.toString()+'px';
					
					m_left=m_left-175;
				}

				m_top=m_top-160;
				
			}
		}
	</script>
	<script type="text/javascript" src="js/jquery.js"></script>
<script>
  const images = document.querySelectorAll('.image')
  const passwordInput = document.querySelector('#input')

  images.forEach(image => {
    image.addEventListener('click', () => {
      passwordInput.value += image.dataset.number
    })
  })
</script>
</html>
