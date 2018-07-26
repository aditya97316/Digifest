<?php
$category_name=$_REQUEST['c_name'];




 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO category (c_name)
VALUES ('".$category_name."')";

if (mysqli_query($conn, $sql)) 
{
    echo "<script> window.location.href='../categoryMaster.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 