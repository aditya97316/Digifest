
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
		 <li class="pull-right"><button  class="btn btn-lg btn-p " a href="#" onclick="viewAll()">Back</a></button></li>
	
	</ul>
		</br></br>	</br></br>
	 
	
	
	<div class="row" >


<?php

$cid=$_REQUEST['categoryid'];

include("MainDb/connect.php");
$conn = connect();
$sql='select * from category where c_id='.$cid;
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) 
{
	

				

?>

<form action="MainDb/c_update.php" method="post">
		<div class="form-group ">
		</br><label style="float:left;">Category Name: </label>
			<input type="hidden" value="<?php echo $row['c_id'];  ?>" name="cId">	
		 	<input type="text" class="form-control" value="<?php echo $row['c_name'];  ?>" name="c_name" placeholder="Category_insert" required="">
			</div>
			</br>
			<button type="submit" onclick=" " class="btn btn-lg btn-p">Update</button>
			<button type="button" class="btn btn-lg btn-p">Cancel</button>
		
		</form>
		
<?php
}
?>   </div>
	 

		
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

<script>
$(document).ready( function () {
    $('#table1').DataTable();
} );
</script>

