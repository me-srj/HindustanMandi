<?php
include('../../../config.php');
$sess_data_get=$call_config->adm_sess_data_bind();
$call_config->admin_sess_checker();
if (isset($_POST['id'])&&isset($_POST['reason'])) {
$id=mysqli_escape_string($call_config->con,$_POST['id']);
$reason=mysqli_escape_string($call_config->con,$_POST['reason']);
$order=$call_config->get("SELECT * FROM `tbl_message_order_master` WHERE `id`='".$id."'");
if ($call_config->IDU("UPDATE `tbl_message_order_master` SET `status`='3' WHERE `id`='".$id."'")) {
	$call_config->IDU("INSERT INTO `tbl_notification_master`(`cid`, `title`, `message`) VALUES ('".$order['cid']."','Order Rejected!!','".$reason."')");
	$call_config->msg("Success!!","Order Rejected Successfully!!","success","admin/message_orders/","");

}
else
{
$call_config->msg("Failed!!","Failed to Reject order!!","info","admin/message_orders/","");
}
}
else
{
$call_config->msg("Failed!!","Failed to get data!!","error","admin/message_orders/","");
}

?> 