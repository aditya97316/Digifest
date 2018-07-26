<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css" type='text/css' />
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>

<link rel="stylesheet " href="css/dataTables.bootstrap.min.css" type='text/css' />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>



<?php
	  	include("MainDb/connect.php");
	$conn = connect();
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	
$orderid=$_REQUEST['orderId'];
$sqlc = "SELECT * from organization ";
$result=mysqli_query($conn, $sqlc);
	$companyName='';
	$companyMobileNumber='';
	$companyEmail='';
	$companyAddress='';
	while($row = $result->fetch_assoc()) {
		
		$companyName=$row['companyName'];
		$companyMobileNumber=$row['companyMobileNumber'];
		$companyEmail=$row['companyEmail'];
		$companyAddress=$row['companyAddress'];
	}
	
	
	
	
	
	
	$sqlp="select * from bill1 where id=".$orderid;
	$resultp=mysqli_query($conn,$sqlp);
	$customerName='';
	$customerMobileNumber='';
	$ce='';
	$ca='';
	while($rowp=$resultp->fetch_assoc())
	{
		$customerName=$rowp['customerName'];
		$customerMobileNumber=$rowp['customerMobileNumber'];
		$customerAddress=$rowp['customerAddress'];
		$date=$rowp['date'];
		
	}
	
	
	?>
	
	
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">

	
<section id="main-content">
	<section class="wrapper">
		
		<div>	
		
		<div>
		<h1 class="text-center">INVOICE</h1></br></br>
		</div>
		<div class="row">
		
	
	
		<div class="col-md-6">
   
   
   <table>
	<tbody>
		<tr>
		<th style="text-align:left;">Company Name:</th>
		<td><?php echo 	$companyName;?></td>
		</tr>
		
		<tr>
		<th style="text-align:left;"> Mobile Number:</th>
		<td><?php echo 	$companyMobileNumber;?></td>
		</tr>
		
		<tr>
		<th style="text-align:left;">Email:</th>
		<td><?php echo $companyEmail;?></td>
		</tr>
		
		<tr>
		<th style="text-align:left;"> Address:</th>
		<td><?php echo 	$companyAddress;?> </td>
		</tr>
	</tbody>	
	</table>
	</div>
	
		<div class="col-md-6">
	<table>
	<tbody>
	
		<tr>
		<th style="text-align:left;">Customer Name:</th>
		<td><?php echo 	$customerName;?> </td>
		</tr>
		<tr>
		<th style="text-align:left;"> Mobile Number:</th>
		<td> <?php echo 	$customerMobileNumber;?> </td>
		</tr>
		<tr>
		<th style="text-align:left;">Customer Address:</th>
		<td><?php echo 	$customerAddress;?> </td>
		</tr>
		<tr>
		<th style="text-align:left;">Date:</th>
		<td><?php echo 	$date;?> </td>
		</tr>
		</tbody>
		
	</table>
	</div>
	
	</div>
	
	

		<table  id="itemList" style="width:100% ;margin-top:2%;" class=" table-condensed">
		<thead>
			<tr class="table100-head " style="background-color:#d98cb3">
				<th style="color:#000;">ITEMS</th>
				<th style="color:#000;">PRICE</th>
				<th style="color:#000;">QUANTITY</th>
				<th style="color:#000;">UNIT PRICE</th>
			
				
			</tr>
	</thead>
	
	<tbody >	
   
	
<?php 


$orderid=$_REQUEST['orderId'];
		$sql_call_bill = "SELECT  * from bill1 as b
		left join bill_details as bd on bd.order_id=b.id
		left join items as i on i.item_id=bd.item_id
		
		where bd.order_id=".$orderid;
		
		
	
		
		
		
		
	$sql2="select count(order_id) as c from bill_details as bd where  bd.order_id=".$orderid;
	$results=mysqli_query($conn, $sql2);
	while($rows = $results->fetch_assoc())
		{
			$count=$rows['c'];
		}
		
	
		
	
		$result=mysqli_query($conn, $sql_call_bill);
	$customerName='';
	$customerMobileNumber='';
	$date='';
	$customerAddress='';
	$item_name='';
	$price='';
	$quantity='';
	$unitPrice='';
	$totalUnitPrice='';
	$discount='';
	$AfterDiscount='';
	$Tax='';
	$TaxValue='';
	$Total='';
	$i=1;
		$list='';
	
	while($row = $result->fetch_assoc())
		{
		$customerName=$row['customerName'];
		$customerMobileNumber=$row['customerMobileNumber'];
		$date=$row['date'];
		$customerAddress=$row['customerAddress'];
		$totalUnitPrice=$row['totalUnitPrice'];
		$discount=$row['discount'];
		$AfterDiscount=$row['AfterDiscount'];
		$Tax=$row['Tax'];
		$TaxValue=$row['TaxValue'];
		$Total=$row['Total'];
		
		
		

			
		$list.="<tr>
		<td>" .$row['item_name']. "</td>
			<td>" .$row['price']."</td> 
			
			<td> " .$row['quantity']."</td> 
			
		<td> " .$row['unitPrice']."</td>
		
		</tr>";

	
	
		

		
	}
	
	
	
	echo $list;
	

?>

			
		</tbody>
		</table>
	
		<table style="width:100%">	
		<tbody>
		<tr>
		<td width="10%"></td>
		<td width="15%"></td>
		
		<th width="15%">TOTAL UNITPRICE</th>
		<td width="15%"><?php echo $totalUnitPrice ?></td>
		</tr>
		
		<tr>
		<td width="10%"></td>
		<td></td>
		
		<th>DISCOUNT</th>
		<td ><?php echo $discount ?></td>
		</tr>
		
		</tr>
		
		<tr>
		<td width="10%"></td>
		<td></td>
		
		<th>AFTER DISCOUNT</th>
		<td ><?php echo $AfterDiscount ?></td>
		</tr>
		
		</tr>
		
		<tr>
		
		<th>TAX %</th>
		<td ><?php echo $Tax ?></td>
		<th>TAX value</th>
		<td><?php echo $TaxValue ?></td>
		</tr>
		
		
		<tr>
		<td width="10%"></td>
		<td></td>
	
		<th>TOTAL</th>
		<td><?php echo $Total ?></td>

		</tr>
	 
			 
			 </tbody>
		</table>
		
	
		
		
	

	
</div> 
</section>
 
</section>			  

<?php include("common/footer.php") ?>
	
        	
     
	</tbody>
	
	</table>
	
		  
</div>
 
<div class="text-center">
<button class="btn-primary" onclick="PrintPreview()">PRINT</button>
</div>

</section>
 
</section>			  

<?php include("common/footer.php") ?>

 
 <script>

 
 $(document).ready( function () {
    $('#table0').DataTable();
} );

 
 
 
 


function PrintPreview() {
var contents = $("#main-content").html();
 printWindow = window.open("", "", "location=1,status=1,scrollbars=1,width=650,height=600");
 printWindow.document.write('<html><head>');
  
  
<!-- //bootstrap-css -->
printWindow.document.write('<link rel="stylesheet" href="css/bootstrap.min.css" >');
<!-- Custom CSS -->
 printWindow.document.write('<link href="css/style.css" >');
  printWindow.document.write('<link href="css/style-responsive.css" rel="stylesheet">');
   printWindow.document.write('<link rel="stylesheet" href="css/bill.css">');
   
   	
  printWindow.document.write('<link rel="stylesheet" type="text/css" href="css/util.css">');
  printWindow.document.write('<link rel="stylesheet" type="text/css" href="css/main.css">');
  printWindow.document.write('<link rel="stylesheet" type="text/css" href="css/animate.css">');
  printWindow.document.write('<link rel="stylesheet" type="text/css" href="css/custom.css">');

   
   
   
   

<!-- font CSS -->
 printWindow.document.write("<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>");





 printWindow.document.write('<style type="text/css">@media print{.no-print, .no-print *{display: none !important;}</style>');
 printWindow.document.write('</head><body>');
 printWindow.document.write('<div style="width:100%;text-align:right">');
printWindow.document.write(contents);
 
    
  //Print and cancel button
 printWindow.document.write('<input type="button" id="btnPrint" value="Print" class="no-print" style="width:100px" onclick="window.print()" />');
 printWindow.document.write('<input type="button" id="btnCancel" value="Cancel" class="no-print"  style="width:100px" onclick="window.close()" />');

 printWindow.document.write('</div>');

 //You can include any data this way. 


 //here 'forPrintPreview' is the id of the 'div' in current page(aspx).
 printWindow.document.write('</body></html>');
 printWindow.document.close();
 printWindow.focus();
}




    </script>
	
	

	