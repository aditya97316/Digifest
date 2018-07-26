<?php
 //input
$items=$_REQUEST['items'];
$price=$_REQUEST['price'];
$quantity=$_REQUEST['quantity'];
$unitPrice=$_REQUEST['unitPrice'];
$totalUnitPrice=$_REQUEST['totalUnitPrice'];
$discount=$_REQUEST['discount'];
$AfterDiscount=$_REQUEST['AfterDiscount'];
$Tax=$_REQUEST['Tax'];
$TaxValue=$_REQUEST['TaxValue'];
$Total=$_REQUEST['Total'];

//customer
$customerName=$_REQUEST['customerName'];
$customerMobileNumber=$_REQUEST['customerMobileNumber'];
$customerAddress=$_REQUEST['customerAddress'];
$date=$_REQUEST['date'];

//company
//$companyName=$_REQUEST['companyName'];
//$companyMobileNumber=$_REQUEST['companyMobileNumber'];
//$companyEmail=$_REQUEST['companyEmail'];
//$companyAddress=$_REQUEST['companyAddress'];

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
$sql = "INSERT INTO bill1 (customerName,customerMobileNumber,customerAddress,date,discount,AfterDiscount,Tax,TaxValue,Total)
VALUES ('".$customerName."','".$customerMobileNumber."','".$customerAddress."','".$date."','".$discount."','".$AfterDiscount."','".$Tax."','".$TaxValue."','".$Total."')";
mysqli_query($conn, $sql);


$sql2 = "SELECT id from bill1 ORDER BY id DESC LIMIT 1;"; 
 
	$result=mysqli_query($conn, $sql2);
	$orderId=0;
	while($row = $result->fetch_assoc()) 
	{
		$orderId=$row['id'];
	}
	echo $orderId;
	

if($orderId>0)
{
	
$N = count($items);

$sqlI='insert into  `bill_details`(`order_id`,`item_id`,`quantity`,`price`,`unitPrice`,`totalUnitPrice`)
 values';
 

    for($i=0; $i < $N; $i++)
    {
		if($i==0)
		{
			$sqlI.='('.$orderId.','.$items[$i].','.$quantity[$i].','.$price[$i].','.$unitPrice[$i].','.$totalUnitPrice.')';
		}
		else
		{
			$sqlI.=',('.$orderId.','.$items[$i].','.$quantity[$i].','.$price[$i].','.$unitPrice[$i].','.$totalUnitPrice.')';	
		}
    }
	
	mysqli_query($conn, $sqlI);
	

 
}	




echo "<script>window.location.href='bill_list.php'</script>";
	
mysqli_close($conn);
?> 