<?php include("common/header.php") ?>

<!--main content start-->
<section id="main-content">
<section class="wrapper">
		<div class="form-w3layouts">
        <!-- page start-->
 <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # 12345</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					John Smith<br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					Jane Smith<br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Visa ending **** 4242<br>
    					jsmith@email.com
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					March 7, 2014<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title pull-left" style="padding-top:18px;"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach (₹order->lineItems as ₹line) or some such thing here -->
    							<tr>
    								<td>BS-200</td>
    								<td class="text-center">₹10.99</td>
    								<td class="text-center">1</td>
    								<td class="text-right">₹10.99</td>
    							</tr>
                                <tr>
        							<td>BS-400</td>
    								<td class="text-center">₹20.00</td>
    								<td class="text-center">3</td>
    								<td class="text-right">₹60.00</td>
    							</tr>
                                <tr>
            						<td>BS-1000</td>
    								<td class="text-center">₹600.00</td>
    								<td class="text-center">1</td>
    								<td class="text-right">₹600.00</td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">₹670.99</td>
    							</tr>
									<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tax</strong></td>
    								<td class="no-line text-right">5%</td>
    							</tr>
									<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Discount</strong></td>
    								<td class="no-line text-right">15%</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">₹15</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">₹685.99</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
	<div class=" text-center">
 <button type="submit" onclick="PrintPreview();" class="btn btn-lg btn-info">Print</button>
 </div>
</div>

</section>
<script src="js/script.js"></script>


<!-- for print preview-->
<script>
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

 printWindow.document.write(document.getElementById('main-content').innerHTML);
 //here 'forPrintPreview' is the id of the 'div' in current page(aspx).
 printWindow.document.write('</body></html>');
 printWindow.document.close();
 printWindow.focus();
}
</script>


<?php include("common/footer.php") ?>