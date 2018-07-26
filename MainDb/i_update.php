<?php
include("connect.php");
$conn = connect();
$item_name=$_REQUEST['item_name'];
$category_id=$_REQUEST['c_id'];

$item_price=$_REQUEST['price'];
$iId=$_REQUEST['iId'];


 
$sql = "update items set item_name='".$item_name."',c_id='".$category_id."',price='".$item_price."' where item_id=".$iId;

if (mysqli_query($conn, $sql)) 
{
    echo "<script> window.location.href='../itemMaster.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 