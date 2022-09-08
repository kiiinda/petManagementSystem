<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<html>
    <head>
        <title>Pet Products </title>
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

.top-nav-right {
  float: right;
} 
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    outline: rgb(189, 115, 19) solid 5px;
    background: #FAFAFA;
    width: 100%;
    margin:5px ;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th{
    background-color:rgb(221, 143, 40);
}


.custom-button{
  margin:25px;
}
button{
    height: 50px;
    width: 150px;
    cursor:pointer;
    border-radius:15px;
    border: 2px solid rgb(189, 115, 19);
    background-color: rgba(230, 143, 29, 0.973); 
    color:#f2f2f2;
    font-size:17px;
}
input[type=text] {
    width: 15%;
    padding: 12px 20px;
    margin: 8px ;
    border: 2px solid rgb(189, 115, 19);
    color:white;
    background:transparent;
}        
.det-btn{
    width:100px;
    height:44px;
    cursor:pointer;
    border-radius:15px;
    border: 2px solid rgb(189, 115, 19);
    background-color: rgba(230, 143, 29, 0.973); 
    color:#f2f2f2;
    font-size:17px;
    font-weight: bold;
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
          <div class="custom-button">          
<form>
<button formaction="addProduct.php">Add Product</button>
<button formaction="updateProduct.php">Update Product</button>
</form>
</div>

    <?php
$con = mysqli_connect("localhost","root","","petStore");
if(!$con)
{ 
die("Could not connect".mysql_error());
}

$var=mysqli_query($con,"SELECT * FROM pet_products ");
echo "<table border size=10>";
echo "<tr>
<th>ID</th>
<th>Name</th>
<th>Type</th>
<th>Cost</th>
<th>Pet</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    <td>$arr[4]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
<form action="deleteProduct.php" method="post">
    <input type="text" name="id" placeholder="Enter ID to delete" required >
    <input class = "det-btn" type="submit" value="Delete">
</form> 

</body>
</html>