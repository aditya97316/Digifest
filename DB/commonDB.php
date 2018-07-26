<?php
include("connect.php");
if(isset($_REQUEST['action']))
	{
		$act=$_REQUEST['action'];
		
		switch($act)
		{
			case 'insertProfile':
				insertProfileDB();
			break;
		}
	}
	
	function insertProfileDB()
	{
		$userName=$_REQUEST['userName'];
		$Email=$_REQUEST['Email'];
		$Password=$_REQUEST['Password'];
		$sql="insert into `login`(`userName`,`password`,`email`,`status`) values('".$userName."','".$Email."','".$Password."',1)";
		
		$conn=connect();
		if (mysqli_query($conn, $sql)) 
		{
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		
	}

?>