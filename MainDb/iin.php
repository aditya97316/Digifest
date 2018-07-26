<?php
$item_name=$_REQUEST['item_name'];
$category_name=$_REQUEST['c_id'];
$item_price=$_REQUEST['price'];



 
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

$sql = "INSERT INTO items (c_id,item_name,price,i_status)
VALUES (".$category_name.",'".$item_name."','".$item_price."',1)";

if (mysqli_query($conn, $sql)) 
{
    echo "<script> window.location.href='../itemMaster.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 