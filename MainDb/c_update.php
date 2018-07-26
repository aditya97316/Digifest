<?php
include("connect.php");
$conn = connect();
$category_name=$_REQUEST['c_name'];
$cId=$_REQUEST['cId'];


 
$sql = "update category set c_name='".$category_name."'  where c_id=".$cId;

if (mysqli_query($conn, $sql)) 
{
    echo "<script> window.location.href='../categoryMaster.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 