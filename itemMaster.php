
<?php include("common/header.php") ?>

<script src="js/add_input.js"></script>
<script src="js/sweetalert.js"></script>
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">


<!--main content start-->
<section id="main-content">
	<section class="wrapper text-center">
	<div class="col-lg-2" ></div>
	
	<div class="col-lg-7 " >
	<h1 class="text-center">Item Master</h1></br></br>
	<ul class="title">
		<li><button class="btn btn-lg btn-p" a href="#" onclick="addNew()">Add New</a></button></li>
		<li class="pull-right"><button  class="btn btn-lg btn-p " a href="#" onclick="viewAll()">View All</a></button></li>
	
	</ul>
		</br></br>	</br></br>
	<div class="row " id="viewAllDiv">
		
	<table id="table2" class="table  table-responsive"  name="Category" style=" color:black;">
		<thead>
			<tr class="table100-head" style="background-color:#d98cb3;">
				<th style="color:#fff;">ID</th>
				<th style="color:#fff;">ITEMS</th>
				
				<th style="color:#fff;">CATEGORY </th>
				<th style="color:#fff;">PRICE</th>
				<th style="color:#fff;">STATUS</th>
				<th style="color:#fff;">UPDATE</th>
				<th style="color:#fff;">DELETE</th>
			</tr>
	</thead>
	
	<tbody id="innerConnect">
	
	<?php
	
	
	include("MainDb/connect.php");
	$conn = connect();
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM items as i
				left join category as c on c.c_id=i.c_id
				where i.i_status!=2";
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
						<td>".$row['item_name']."</td>
						
						<td>".$row['c_name']."</td>
						<td>".$row['price']."</td>
						<td>";
							if($row['i_status']==1)
								{
									$list.="<span onclick='changeStatus(".$row['item_id'].",0)' class='fa fa-circle ' style='font-size:20px;color:green;  '>";
								}
								else
								{
									$list.="<span onclick='changeStatus(".$row['item_id'].",1)' class='fa fa-circle ' style='font-size:20px;color:red;  '>";
								}
						$list.="</td>
						<td ><a href='updateItems.php?iid=".$row['item_id']."' class='fa fa-upload ' style='font-size:20px;color:purple;  '></a></td>
						<td ><span  onclick='deleteItem(".$row['item_id'].")'  class='fa fa-trash '  style='font-size:20px;color:purple;'></td>
						
					  </tr>";
			
			}
			
			echo $list;
		} else {
			echo "0 results";
		}

		 
	 
	
	?>
	
        
     
	</tbody>
	
	</table>
	
	</div>
	
	
	<div class="row" style="display:none" id="addNewDiv">
	 	<form action="MainDb/iin.php" method="post">
		
		
		<div class="form-group ">
		<select type="text" class="form-control dropdown" name="c_id" placeholder="Category_Name" required="">
		 <?php
			  
	$conn = connect();
		 
		 	$sql = "SELECT * FROM category";
			$result = $conn->query($sql);
				$list='<option value="0">Select Category</option>';
			if ($result->num_rows > 0) {
		
				while($row = $result->fetch_assoc()) 
				{
					$list.='<option value="'.$row['c_id'].'">'.$row['c_name'].'</option>';
				}
			}
			else
			{
				echo "else";
			}
				echo $list;	
			 
		?>
     	
			</select>
		
		<div>
		</br><label style="float:left;">Item Name: </label>
		 	<input type="text" class="form-control" name="item_name" placeholder="Item_insert" required="">
			</div>
		
		<div>
		</br><label style="float:left;">Price: </label>
		 	<input type="text" class="form-control" name="price" placeholder="Price" required="">
			</div>
	
			</br>
			<button type="submit" onclick="" class="btn btn-lg btn-q">Add</button>
			<button type="reset" class="btn btn-lg btn-q">Reset</button>
		</div>
		
		</form>
   </div>
	 

		
</section>
	

<?php include("common/footer.php") ?>
<script>
function viewAll()
{
	window.location.href="ItemMaster.php";
}

function addNew()
{
	document.getElementById("addNewDiv").style.display="block";
	document.getElementById("viewAllDiv").style.display="none";
}
 
</script>

<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: rgba(209,154,152,0.3);
    color: #fff;
    text-align: center;
    border-radius: 50px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>
 <div id="snackbar">Status Changed</div>
 
<script>

function changeStatus(id,status)
{
	$.ajax({
		
				url: 'MainDb/ajaxRequest.php?id='+id+'&status='+status,
				type: 'GET',
				data: 'act=itemStatus',
				success: function(data) 
				{
					 var x = document.getElementById("snackbar");
					x.className = "show";
					  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					 document.getElementById("innerConnect").innerHTML=data;

   	 			},
				error: function(e)
				{
			    
				}
		}); 
}
function deleteItem(id)
{
	var temp=confirm("Are you confirm to delete this item ?");

	if(temp)
	{
		$.ajax({
		
				url: 'MainDb/ajaxRequest.php?id='+id,
				type: 'GET',
				data: 'act=itemDelete',
				success: function(data) 
				{
					//alert("Item Status Change");
					 document.getElementById("innerConnect").innerHTML=data;

   	 			},
				error: function(e)
				{
			    
				}
		});
	}		
}


$(document).ready( function () {
    $('#table2').DataTable();
} );
</script>

