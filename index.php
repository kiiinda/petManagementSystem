<?php
session_start();
//echo"<script>alert('welcome')</script>";
if($_POST["name"]=="admin"&&$_POST["pass"]=="2022")
{
     $_SESSION['user']="admin";
    $con = mysqli_connect("localhost","root","","petStore");
if(!$con)
{ 
die("Could not connect database".mysql_error());
}
  
else
{
    echo"<script>location.href='home.html'</script>";
}
}
else
{
     echo"<script>alert('Invaild username or password')</script>";
     echo"<script>location.href='login.html'</script>";
}

?>
