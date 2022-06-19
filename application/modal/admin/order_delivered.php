<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
$order_id=mysqli_escape_string($call_config->con,$_POST['order_id']);	
$order=$call_config->get("SELECT * FROM `tbl_parent_order_master` WHERE `id`='".$order_id."'");
if ($call_config->IDU("UPDATE `tbl_parent_order_master` SET `d_date`=CURRENT_TIMESTAMP,`uby`='".$sess_data_get['sess_adm_id']."' WHERE `id`='".$order_id."'")) {
	$call_config->IDU("INSERT INTO `tbl_notification_master`(`cid`, `title`, `message`) VALUES ('".$order['cid']."','Order Delivered!!','your order number <br>#".$order_id."</br> is has been Delivered Successfully!!.')");
	$call_config->msg("Success!!","Order Delivered!!","success","admin/in_process_order/","");
}
else
{
		  $call_config->msg("Failed!!","Insertion Failed!!","info","admin/in_process_order/","");
}
}
else
{
	  $call_config->msg("Failed!!","Invalid URL!!","error","admin/in_process_order/","");
}