
<?php include("common/header.php") ?>

<script src="js/add_input.js"></script>
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
<!--main content start-->
<section id="main-content">
	<section class="wrapper text-center">
	<div class="col-lg-2" ></div>
	
	<div class="col-lg-7 " >
	<h1 class="text-center">Items Master</h1></br></br>
	<ul class="title">
		 <li class="pull-right"><button  class="btn btn-lg btn-p " a href="#" onclick="viewAll()">Back</a></button></li>
	
	</ul>
		</br></br>	</br></br>
	 
	
	
	<div class="row" >


<?php

$iid=$_REQUEST['iid'];
include("MainDb/connect.php");
$conn = connect();
$sql='select * from items where item_id='.$iid;
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) 
{
	

				

?>

<form action="MainDb/i_update.php" method="post">
		<div class="form-group ">
		</br><label style="float:left;">Item Name: </label>
			<input type="hidden" value="<?php echo $row['item_id'];  ?>" name="iId">	
		 	<input type="text" class="form-control" value="<?php echo $row['item_name'];  ?>" name="item_name" placeholder="Item_name" required="">
			</div>
			<div class="form-group ">
			</br><label style="float:left;">Category Name: </label>
			<select type="text" class="form-control dropdown" name="c_id" placeholder="Category_Name" required="">
		 <?php
			  
	$conn = connect();
		 
		 	$sqlC = "SELECT * FROM category";
			$result = $conn->query($sqlC);
				$list='<option value="0">Select Category</option>';
			if ($result->num_rows > 0) 
			{
				while($rowC = $result->fetch_assoc()) 
				{
					if($rowC['c_id']==$row['c_id'])
					{
						$list.='<option selected="selected" value="'.$rowC['c_id'].'">'.$rowC['c_name'].'</option>';
					}
					else
					{
						$list.='<option value="'.$rowC['c_id'].'">'.$rowC['c_name'].'</option>';
					
					}
				}
			} 
			echo $list;	
			 
		?>
     	
			</select>
			</div>
		
		<div class="form-group ">
		</br><label style="float:left;">Price: </label>
			<input type="hidden" value="<?php echo $row['item_id'];  ?>" name="iId">	
		 	<input type="text" class="form-control" value="<?php echo $row['price'];  ?>" name="price" placeholder="Price_insert" required="">
			</div>
			</br>
			<button type="submit" onclick="" class="btn btn-lg btn-q">Update</button>
			<button type="button" class="btn btn-lg btn-q ">Cancel</button>
		
		</form>
		
<?php
}
?>   </div>
	 

		
</section>
	

<?php include("common/footer.php") ?>
<script>
function viewAll()
{
	window.location.href="itemMaster.php";
}

function addNew()
{
	document.getElementById("addNewDiv").style.display="block";
	document.getElementById("viewAllDiv").style.display="none";
}
 
</script>

<script>
$(document).ready( function () {
    $('#table2').DataTable();
} );
</script>

