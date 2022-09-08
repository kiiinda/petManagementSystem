<html>
<head>
        <title>Sale Details </title>
        <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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
</style>
<body>
<div class="top-nav">
            <a class="active" href="home.html"><img src="../assets/images/icon2.png"></a>
            <a href="sales.php">Sales Details</a>
            
          </div>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petStore";


$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$id=$_POST["id"];
$qry2="SELECT count(*) FROM sales_details WHERE sd_id='$id'";
$ex = mysqli_query($con,$qry2);
$count = mysqli_fetch_row($ex);
if($count[0]==1)
{
  $sql = "DELETE FROM sales_details WHERE sd_id='$id'";
  if ($con->query($sql) == TRUE) {
    echo"<script>alert( ' Data deleted successfully')</script>";
  }
  else {
      echo "Error: " . $sql . "<br>" . $con->error;
  }
}
else{
    echo"<script>alert( ' Data not found')</script>";
}


$con->close();
?>
<form>
<button class="del-btn" type="submit" formaction="sales.php">BACK</button>
</form>
</body>
</html>