
<?php include("common/header.php") ?>


<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">

	
<section id="main-content">
	<section class="wrapper">
		
		<div>	
		 <h1 class="text-center">BILL MASTER</h1></br></br>
	<table id="table0" class="table  table-responsive"  name="Category" style=" color:black;">
		<thead>
			<tr class="table100-head" style="background-color:#d98cb3;">
				<th style="color:#fff;">S.NO.</th>
				<th style="color:#fff;">CUSTOMER NAME</th>
				<th style="color:#fff;">Date</th>
				<th style="color:#fff;">VIEW</th>
				<th style="color:#fff;">PRINT</th>
			</tr>
	</thead>
	
	<tbody id="outerConnect">
	
		<?php
	include("MainDb/connect.php");
	$conn = connect();
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		
		
		
		
		$sql = "SELECT customerName,date,id FROM bill1" ;
		$result = $conn->query($sql);
		$list='';
		$cn=0;
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				$cn++;
				$list.= "<tr>
						<td>".$cn."</td>
						
						<td>".$row['customerName']."</td>
						<td>".$row['date']."</td>
						<td ><a href='bill_view.php?orderId=".$row['id']."' class='fa fa-eye ' style='font-size:20px;color:purple;  '></a></td>
						<td ><a href='print_preview.php?orderId=".$row['id']."'  class='fa fa-print '  style='font-size:20px;color:purple;'></a></td>
						
					  </tr>";
				
			}
			echo $list;
		} else {
			echo "0 results";
		}

		if (mysqli_query($conn, $sql)) 
		{
			
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		
	
	?>
	
	
        	
     
	</tbody>
	
	</table>
	
		  
</div> 
</section>
 
</section>			  

<?php include("common/footer.php") ?>


	