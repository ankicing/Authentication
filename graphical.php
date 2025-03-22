<?php
session_start();
$db = new SQLite3('5up3r5tr0ngdb.db');
if(!isset($_SESSION['id'])){
  header("Location: first_step.php");
  die();
}
if(isset($_POST["submit"]) && isset($_POST['graph'])){
  $graph = $_POST['graph'];
  $graph = md5($graph);
  $ses = $_SESSION["id"];
  $stm = $db->prepare("UPDATE details SET Graph=:graph WHERE id=:id");
  $stm->bindParam(':graph', $graph);
  $stm->bindParam(':id', $ses);
  if($stm->execute()){
    echo '<script>alert("Graphical Password Added");</script>';
    echo '<script type="text/javascript"> window.location = "picture_pass.php" </script>';
  }
  else {
    $_SESSION['Error'] = "Something went wrong, please try again.";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<h1 style="color:white;text-align:center;">Authentication Schemes using Color and Images</h1>
	<title>Level 2 Authentication</title>
  <hr>

	<style type="text/css">
		body {
  background-image:url('tr5.png');
  background-size: cover; }
		#container{
			margin:2px 450px;
		}
		#red_box, #blue_box, #green_box,#violet_box, #white_box, #orange_box,#purple_box, #yellow_box, #tomato_box{
			padding: 50px;
      margin-left: 25px;margin-top: 20px;
		}

		#submit{
			margin-top: 30px;
			margin-left: 150px;
		}
		.form-input {margin-top: 30px;
			width: 400px;
    font-size: 17px;
    box-sizing: border-box;
    width: 70%;
    height: 36px;
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
   color:#bcf5e7;
   cursor:pointer;
   color: white; 
   font-weight: bold;
}
.btn:hover {
  background-color: #red;
  color:white;
}
.btn-group button {
  border: 1px black; /* black border */
  color: black; /* black text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}
	</style>
</head>

<body>
<div class="jumbotron" style="background-color: transparent; color: white;">
<h1 style="margin-left: 20px;">Graphical Password Step-2:</h1>
</div>

<div id="container">
	<div class="btn-group" style="width:100%">
	<button id="red_box" class="btn btn-danger color"style="background-color: red;" >1</button>
	<button id="blue_box" class="btn btn-primary color"style="background-color: blue;">2</button>
	<button id="green_box" class="btn btn-success color"style="background-color: green;">3</button></div>
	<div class="btn-group" style="width:100%">
	<button id="yellow_box" class="btn btn-danger color"style="background-color: yellow;">4</button>
	<button id="tomato_box" class="btn btn-primary color"style="background-color: tomato;">5</button>
	<button id="white_box" class="btn btn-success color"style="background-color: white;">6</button></div>
	<div class="btn-group" style="width:100%">
	<button id="purple_box" class="btn btn-danger color"style="background-color: purple;">7</button>
	<button id="violet_box" class="btn btn-primary color"style="background-color: violet;">8</button>
	<button id="orange_box" class="btn btn-success color"style="background-color: orange;">9</button></div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<input type="password" class="form-input" id="input" name="graph" placeholder="Pattern Here" />
		<button class="btn " id="submit" name="submit">Save</button>
<?php
if( isset($_SESSION['Error']) ){
  echo $_SESSION['Error'];
  unset($_SESSION['Error']);
}
?>
	</form>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
  const colors = document.querySelectorAll('.color')
  const passwordInput = document.querySelector('#input')

  colors.forEach(color => {
    color.addEventListener('click', () => {
      passwordInput.value += color.textContent.toString()
    })
  })
</script>
</html>
