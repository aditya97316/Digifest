<?php

$act=$_REQUEST['act'];

switch($act)
{
	case 'itemStatus':
		itemStatus();
	break;
}
	

	
function itemStatus()
{
	$id=$_REQUEST['id'];
	$status=$_REQUEST['status'];
	
	
}	

?>