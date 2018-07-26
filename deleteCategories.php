
<?php

$cat_id=$_REQUEST["categoryid"];




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

$sql = "DELETE FROM category WHERE c_id=".$cat_id;
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
	 echo "<script> window.location.href='categoryMaster.php'; </script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?> 