<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_GET["id"]))
{
$order_id=mysqli_escape_string($call_config->con,$_GET['id']);	
$order=$call_config->get("SELECT * FROM `tbl_parent_order_master` WHERE id='".$order_id."'");
if ($call_config->IDU("DELETE FROM `tbl_parent_order_master` WHERE `id`='".$order_id."'")) 
{
$call_config->IDU("INSERT INTO `tbl_notification_master`(`cid`, `title`, `message`) VALUES ('".$order['cid']."','Order Rejected!!','Sorry to inform you that your order number <br>#".$order_id."</br> is has been rejected.')");
	$call_config->msg("Success!!","Order Rejected!!","success","admin/new_orders/","");
}
else
{
		  $call_config->msg("Failed!!","Insertion Failed!!","info","admin/new_orders/","");
}
}
else
{
	  $call_config->msg("Failed!!","Invalid URL!!","error","admin/new_orders/","");
}