<?php 

session_start();

if (!isset($_SESSION['piccheck'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head><h1 style="color:white;text-align:center;">Authentication Schemes using Color and Images</h1>
<hr>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<style>
  .span{
  margin-top: 10px;
  color:white;  
  font-style: bold; 
  font-size: 60px; 
  
  text-align:center;
   border:1px solid white;
   padding: 15px;
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
   margin-top:400px;
}

.btn:hover {
  background-color: red;
  color:white;
}
.s{
background-color:white;}
  </style>
<?php
$db = new SQLite3('5up3r5tr0ngdb.db');
$id = $_SESSION['id'];
$stm = $db->prepare("select name from details where id = :id");
$stm->bindParam(':id', $id);
$result = $stm->execute();
$row = $result->fetchArray(SQLITE3_ASSOC);
  echo "<h1><p class='span'>Welcome " . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8'). "</h1></p>";
?>
    <a href="logout.php">
    <input id="createButton" class="btn"style="" onclick="createButton_Click" type="button" value="Logout"></a>
</body>
</html>