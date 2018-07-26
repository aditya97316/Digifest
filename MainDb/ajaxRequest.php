<?php
include("connect.php");

$act=$_REQUEST['act'];

switch($act)
{
	case 'itemStatus':
		itemStatus();
		getAllItemsList();
	break;
	case 'itemDelete':
		itemDelete();
		getAllItemsList();
	break;
	case 'categoryStatus':
		categoryStatus();
		getAllCategoryList();
	break;
	case 'categoryDelete':
		categoryDelete();
		getAllCategoryList();
	break;
	case 'get_price':
			get_price();
	break;
	
	}
	


	

function get_price()
{
	$id=$_REQUEST['id'];
	 
	$con=connect();
	$sql="SELECT * from items where item_id=".$id;
	$result = $con->query($sql);
		$list='';
		$cn=0;
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				echo $row['price'];
			}
		}
}
	
function itemStatus()
{
	$id=$_REQUEST['id'];
	$status=$_REQUEST['status'];
	$con=connect();
	$sql='UPDATE `items` set `i_status`='.$status.' where `item_id`='.$id;
	$con->query($sql);
}

function itemDelete()
{	$id=$_REQUEST['id'];
	$con=connect();
	$sql = "DELETE FROM items WHERE item_id=".$id;
	$con->query($sql);
}
	
function getAllItemsList()
{
	$con=connect();
	$sql = "SELECT * FROM items as i
				left join category as c on c.c_id=i.c_id
				where i.i_status!=2";
		$result = $con->query($sql);
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
		} 
		 
}	


function categoryStatus()
{
	$id=$_REQUEST['id'];
	$status=$_REQUEST['status'];
	$con=connect();
	$sql='UPDATE `category` set `c_status`='.$status.' where `c_id`='.$id;
	$con->query($sql);
}

function categoryDelete()
{	$id=$_REQUEST['id'];
	$con=connect();
	$sql = "DELETE FROM category WHERE c_id=".$id;
	$con->query($sql);
	
}
	
function getAllCategoryList()
{
	$con=connect();
	$sql = "SELECT * FROM category as c
				where c.c_status!=2";
		$result = $con->query($sql);
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
						<td ><span  onclick='deleteCategory(".$row['c_id'].")' class='fa fa-trash '  style='font-size:20px;color:purple;'></a></td>
						
					  </tr>";
			
			}
			
			echo $list;
		} 
		 
}	

?>