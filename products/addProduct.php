<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<!doctype html>
<html>
<head>
        <title>Pet Products </title>
        <style>
body {
  margin: 0;
  font-family: sans-serif;
  background: #484848;
}
.top-nav {
  overflow: hidden;
  background-color:rgb(221, 143, 40);
  height: 80px;
  border: 3px solid rgb(189, 115, 19);
}

.top-nav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 35px;
  font-weight: bold;
}

.top-nav-right {
  float: right;
}
.prod_cost{
   width:100%;
   height:30px;
   border: 2px solid  rgb(241, 188, 117); 
   border-radius:3px;  
   background:transparent;
}
button{
  margin:15px;
  height: 30px;
  width: 100px;
  border-radius:15px;
  border: 2px solid black;
  background-color: rgb(189, 115, 19);
  color:#f2f2f2;
  font-size:15px;
  cursor:pointer;
}
input[type=text]{
  width:100%;
  height:30px;
  border: 2px solid  rgb(241, 188, 117); 
  border-radius:5px; 
  background:transparent;
}
fieldset { 
  background: #FAFAFA;
  padding: 10px;
  margin:auto;
  padding: 2em;
  max-width:450px;
  box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
  border-radius: 10px;
  border: 4px solid black;
}
</style>     
</head>
<body>
<div class="top-nav">
            <a class="active" href="home.html"><img src="../assets/images/icon2.png"></a>
            <a href="product.php">Pets Products</a>
            <div class="top-nav-right">
              <a href="logout.php">Logout</a>
            </div>
          </div>
    <form>
        <button type="submit" formaction="product.php">BACK</button>
</form>
<form method="post" action="addProduct.php"> 
<fieldset> 
   <input type="text" name="id" placeholder=" Enter Product ID" >
  <br><br>
  <input type="text" pattern = "[A-Za-z]+" name="name" placeholder=" Enter Product Name" >
  <br><br>
   <input type="text" pattern = "[A-Za-z]+" name="type" placeholder=" Enter Product Type" >
  <br><br>
  <input class="prod_cost" pattern = "[A-Za-z]+" type="number" name="cost" min= 0 placeholder=" Enter Cost" required>
  <br><br>
  <input type="text" pattern = "[A-Za-z]+" name="pet" placeholder="Pet Category " >
  <br><br>
  <input type="submit" name="submit" value="SAVE"  style="font-weight:bold; border-radius:5px; padding:.3em; width:100%; background-color:rgb(241, 188, 117);">&ensp; 
</fieldset>
</form> 

</body>
</html>

<?php
if(isset($_POST["submit"]))
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petStore";


$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

  $id = $_POST["id"];
  $name = $_POST["name"];
  $type= $_POST["type"];
  $pet = $_POST["pet"];
  $cost = $_POST["cost"];

$sql = "INSERT INTO pet_products( pp_id,pp_name,pp_type,cost,pet)
VALUES ('$id','$name','$type','$cost','$pet')";

if ($con->query($sql) == TRUE) {
    echo"<script>alert( ' Inserted successfully')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con
    ->error;
}

$con->close();
}
?>