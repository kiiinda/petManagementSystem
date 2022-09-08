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
  <title>
  Sales Details
  </title>
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

fieldset { max-width: 450px;
	background: #FAFAFA;
	padding: 30px;
	margin: 50px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid rgb(189, 115, 19);


}

legend {
  padding: 0.2em 0.5em;
  border:2px solid rgba(249, 105, 14, 1);
  color:green;
  font-size:90%;
  text-align:center;
  }
  button{
    margin:15px;
    height: 30px;
    width: 100px;
    cursor:pointer;
    border-radius:15px;
    border: 3px solid rgb(189, 115, 19);
    background-color: rgb(221, 143, 40);
    color:#f2f2f2;
    font-size:15px;"
  }
  input[type=text]{
    width:100%;
    height:30px;
    border: 2px solid rgb(189, 115, 19);
    border-radius:5px;
  }
</style>
  </head>
<body>
  <div class="top-nav">
            <a class="active" href="home.html"><img src="../assets/images/icon2.png"></a>
            <a href="sales.php">Sales Details</a>
            <div class="top-nav-right">
              <a href="logout.php">Logout</a>
            </div>
          </div>

<form>
<button type="submit" formaction="sales.php">BACK</button>
</form>
<form method="post" action="addSales.php">

  <fieldset>
  
    <input type="text"  id ="sd" name="id" placeholder="Enter sales ID" required>
   <br><br>
   <input type="text" name="csid"  placeholder="Enter customer ID"required>
  <br><br>
   <input type="date"  name="date" style="width:100%;height:30px;
   border: 2px solid rgb(189, 115, 19);border-radius:5px;" required>
  <br><br>
  <input type="number" pattern="[0-9]+" name="total" min="0" style="width:100%;height:30px;
   border: 2px solid rgb(221, 143, 40);border-radius:5px;" required placeholder="Enter total amount">
  <br><br>
  <input type="submit" name="submit" value="ADD" style="width:100%;height:30px;border-radius:5px;
  border: 2px solid rgba(249, 105, 14, 1); color: white; cursor:pointer;background-color: rgb(189, 115, 19);">&ensp; 
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
  $cs_id = $_POST["csid"];
  $date= $_POST["date"];
  $total = $_POST["total"];
 




$sql = "INSERT INTO sales_details( sd_id,cs_id,date,total) VALUES ('$id','$cs_id','$date','$total')";
if ($con->multi_query($sql) == TRUE) {
    echo"<script>alert( ' Inserted successfully')</script>";
} 
else {
    echo "Error: " . $sql . "<br>" . $con
    ->error;
}

$con->close();
}


?>