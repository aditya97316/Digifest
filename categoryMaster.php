
<?php include("common/header.php") ?>

<script src="js/add_input.js"></script>
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

<style>
.title li
{
	float:left;
	margin-right:1%;
	
}
.title{
	list-style:none;
}

</style>
<!--main content start-->
<section id="main-content">
	<section class="wrapper text-center">
	<div class="col-lg-2" ></div>
	
	<div class="col-lg-7 " >
	<h1 class="text-center">Category Master</h1></br></br>
	<ul class="title">
		<li><button class="btn btn-lg btn-p" a href="#" onclick="addNew()">Add New</a></button></li>
		<li class="pull-right"><button  class="btn btn-lg btn-p " a href="#" onclick="viewAll()">View All</a></button></li>
	
	</ul>
		</br></br>	</br></br>
	<div class="row " id="viewAllDiv">
		
	<table id="table1" class="table  table-responsive"  name="Category" style=" color:black;">
		<thead>
			<tr class="table100-head" style="background-color:#d98cb3;">
				<th style="color:#fff;">id</th>
				<th style="color:#fff;">Category</th>
				<th style="color:#fff;">Status</th>
				<th style="color:#fff;">Update</th>
				<th style="color:#fff;">Delete</th>
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

		$sql = "SELECT * FROM category as c
				where c.c_status!=2";
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
						<td>".$row['c_name']."</td>
						<td>";
							if($row['c_status']==1)
								{
									$list.="<span onclick='changeStatus(".$row['c_id'].",0)' class='fa fa-circle ' style='font-size:20px;color:green;  '>";
								}
								else
								{
									$list.="<span onclick='changeStatus(".$row['c_id'].",1)' class='fa fa-circle ' style='font-size:20px;color:red;  '>";
								}
						$list.="</td>
						<td ><a href='updateCategory.php?categoryid=".$row['c_id']."' class='fa fa-upload ' style='font-size:20px;color:purple;  '></a></td>
						<td ><span  onclick='deleteCategory(".$row['c_id'].")'  class='fa fa-trash '  style='font-size:20px;color:purple;'></a></td>
						
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
	
	
	<div class="row" style="display:none" id="addNewDiv">
	 	<form action="MainDb/cin.php" method="post">
		<div class="form-group ">
		</br><label style="float:left;">Category Name: </label>
		 	<input type="text" class="form-control" name="c_name" placeholder="Category_insert" required="">
			</div>
			</br>
			<button type="submit" onclick="" class="btn btn-lg btn-q">Add</button>
			<button type="reset" class="btn btn-lg btn-q ">Reset</button>
		
		</form>
   </div>
	 

		
</section>
	

<?php include("common/footer.php") ?>
<script>
function viewAll()
{
	window.location.href="categoryMaster.php";
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
    background-color: rgba(209,154,152);
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
				data: 'act=categoryStatus',
				success: function(data) 
				{
					 var x = document.getElementById("snackbar");
					x.className = "show";
					  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
					 document.getElementById("outerConnect").innerHTML=data;

   	 			},
				error: function(e)
				{
			    
				}
		}); 
}
function deleteCategory(id)
{
	var temp=confirm("Are you confirm to delete this item ?");

	if(temp)
	{
		$.ajax({
		
				url: 'MainDb/ajaxRequest.php?id='+id,
				type: 'GET',
				data: 'act=categoryDelete',
				success: function(data) 
				{ 
					
					 document.getElementById("outerConnect").innerHTML=data;

   	 			},
				error: function(e)
				{
			    
				}
		});
	}		
}



$(document).ready( function () {
    $('#table1').DataTable();
} );
</script>
