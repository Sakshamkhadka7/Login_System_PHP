<?php

$server="localhost";
$username="root";
$password="";
$db="user";

$conn=mysqli_connect($server,$username,$password,$db);

$sno=$_GET['id'];

$sql="DELETE FROM client WHERE sno=$sno";

if(mysqli_query($conn,$sql)){
    header("Location:welcome.php");
}else{
        echo "Error Deleting";
}




?>