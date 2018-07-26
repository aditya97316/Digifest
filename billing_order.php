
<?php include("common/header.php") ?>


<link href="css/select2.min.css" rel="stylesheet" />
<script src="js/select2.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/custom.css">
  
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>

	<link href="css/select2.css" rel="stylesheet"/>
	<link rel="stylesheet" href="css/bill.css" >
  
	
	
    <style>
       
		th{
			text-align:center;
		}
		table{
			margin-left:17%;
		}
		::placeholder{
			color: #999 !important;
			font-size:12px !important;
		}
		hr{
			color:#d19a98;
		}
    </style>
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div>	
   <form action="bill_insert.php" method="POST">
	
	<div id="main1">
 

	<h1 class="text-center" >BILLING  </h1>  
	</br>
	<div class="row">
	<div class="col-md-6">
	<table>
	<tbody>
		<tr>
		<th style="text-align:left;">Customer Name:</th>
		<td><input id="customerName_0" name="customerName" class="form-control" type="text"> </input></td>
		</tr>
		<tr>
		<th style="text-align:left;"> Mobile Number:</th>
		<td><input id="customerMobileNumber_0" name="customerMobileNumber" class="form-control" type="tel"> </input></td>
		</tr>
		<tr>
		<th style="text-align:left;">Customer Address:</th>
		<td><textarea id="customerAddress_0" name="customerAddress" class="form-control" type="text"> </textarea></td>
		</tr>
		<tr>
		<th style="text-align:left;">Date:</th>
		<td><input id="date_0" name="date" class="form-control" type="date"> </input></td>
		</tr>
		</tbody>
		
	</table>
	</div>
	


	
</div>
	</div>
	  <hr>                             



	
    <div class="row" id="main">
 
	
		<table  id="itemList" style="width:75%" class=" table-condensed">
		<thead>
			<tr class="table100-head " style="background-color:#d98cb3">
				<th style="color:#000;">ITEMS</th>
				<th style="color:#000;">PRICE</th>
				<th style="color:#000;">QUANTITY</th>
				<th style="color:#000;">UNIT PRICE</th>
				<th style="color:#000;">OPERATION</th>
				
			</tr>
	</thead>
	
	<tbody  id="outerConnect">
		<tr id="r1"> 
		
		<td width="12%">
        <select onchange="getPrice(0)" style="width:300px" name="items[]" id="item_0" class="states form-control">
      
	         
	<?php
	
	 	include("MainDb/connect.php");
	$conn = connect();
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	
	 $sql = "SELECT * FROM items" ;
	
	$result = $conn->query($sql);
				$list='<option value="0">Select Items</option>';
			if ($result->num_rows > 0) {
		
				while($row = $result->fetch_assoc()) 
				{
					$list.='<option value="'.$row['item_id'].'">'.$row['item_name'].'</option>';
					
				}
			}
			else
			{
				echo "else";
			}
				echo $list;	
					
			 
		?>
            </select>
			  </td>
				<td><input id="price_0" name="price[]" class="form-control"  readonly="readonly" type="text"></td> 
			
			<td><input id="quantity_0" name="quantity[]" class="form-control" onkeyup="calculatePrice(0)" type="text" ></td> 
			
			<td><input id="unitPrice_0" name="unitPrice[]" class="form-control" type="text"></td> 
			
			<td></td>
			
					<span id="Row_add" class="form-control" style="display:none;"><?php echo $list ;?></span>
	
				
		</tr>
		</tbody>
		</table>
	
		<table style="width:60%">	
		<tbody>
		<tr>
		<td width="10%"></td>
		<td width="15%"></td>
		<td width="15%"></td>
		<th width="15%">TOTAL UNITPRICE</th>
		<td width="15%"><input id="totalUnitPrice_0" name="totalUnitPrice" type="text" class="form-control" ></td>
		</tr>
		
		<tr>
		<td width="10%"></td>
		<td></td>
		<td></td>
		<th>DISCOUNT</th>
		<td ><input id="dc_0" name="discount" type="text" class="form-control" onkeyup="discountD(0)" ></td>
		</tr>
		
		</tr>
		
		<tr>
		<td width="10%"></td>
		<td></td>
		<td></td>
		<th>AFTER DISCOUNT</th>
		<td ><input  id="afterDiscount_0" name="AfterDiscount" type="text" class="form-control" ></td>
		</tr>
		
		</tr>
		
		<tr>
		<td width="10%"></td>
		<th>TAX %</th>
		<td ><input  id="tax_0" name="Tax" type="text"  placeholder="CGST/SGST %"  onkeyup="tax(0)" class="form-control"> </td>
		<th>TAX value</th>
		<td> <input id="taxvalue_0" name="TaxValue" type="text"  placeholder="value"  class="form-control" >	</td>
		</tr>
		
		
		<tr>
		<td width="10%"></td>
		<td></td>
		<td></td>
		<th>TOTAL</th>
		<td><input id="totalall_0" name="Total" class="form-control"  type="text"></td>

		</tr>
	 
			 
			 </tbody>
		</table>
		
		<hr>
		
		<table style="width:60%">
			
			<tr>
			<td width="15%"></td>
			<td width="15%"></td>
					<td width="15%"></td>		
			<td><button type="submit" class="btn btn-lg btn-p " >Submit</button></td>
			<td><button type="button" class="btn btn-lg btn-p" onclick="addRows('itemList')">Add Items</button></td>
			 </tr>
		
		</table>
			</form>
		 
			  </div> 
</div> 
</section>
 
</section>			  

<?php include("common/footer.php") ?>
 <script src="js/row_add.js"></script>
 
 <script>

 

 
 
 
 
        $(document).ready(function() {
            $(".states").select2();   
        });

		
function calculatePrice(id)
{
	var price=eval(document.getElementById("price_"+id).value);
	var qty=eval(document.getElementById("quantity_"+id).value);
	var t=price*qty;
	document.getElementById("unitPrice_"+id).value=t;
	totalUnitPrice(id);
}

		
function getPrice(i)
{
	var id=document.getElementById('item_'+i).value;
	$.ajax({
		
				url: 'MainDb/ajaxRequest.php?id='+id,
				type: 'GET',
				data: 'act=get_price',
				success: function(data) 
				{
				
					 document.getElementById("price_"+i).value=data;

   	 			},
				error: function(e)
				{
			    
				}
		}); 
}

	function totalUnitPrice(id){
			var tPrice =[];
			var t=0;
		
			

		
	$("input[name='unitPrice[]']").each(function() {
		tPrice.push($(this).val());
		t+=eval($(this).val());
	});
	document.getElementById("totalUnitPrice_0").value=t;			
			
	}
	
	function discountD(id){
		var a = eval(document.getElementById("totalUnitPrice_"+id).value);
		var b=eval(document.getElementById("dc_"+id).value);
		
		var d=0;
		
		d=(a*(b/100)).toFixed(2);
		
		document.getElementById("afterDiscount_"+id).value=d;
		document.getElementById("afterDiscount_"+id).value=(a-d);
	}
	
	function tax(id){
		var a=eval(document.getElementById("totalUnitPrice_"+id).value);
		var b=eval(document.getElementById("tax_"+id).value);
		
		var d=0;
		
		d=(a*(b/100)).toFixed(2);
		document.getElementById("taxvalue_"+id).value=d;
		total_all(id);
	}
	
	

	function total_all(id)
	{
		var a=eval(document.getElementById("afterDiscount_"+id).value);
		var b=eval(document.getElementById("taxvalue_"+id).value);
		var c=0;
		c=parseFloat(a + b);
		document.getElementById("totalall_"+id).value=c;
	 }
	


    </script>
	
	

	