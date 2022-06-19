<?php
 include("../../../config.php");
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
if (isset($_GET['id'])) {
$order_id=$_GET['id'];
$sql="UPDATE `tbl_parent_order_master` SET `uby`='".$sess_data_var['sess_user_id']."',`status`='1' WHERE `id`='".$order_id."'";
if ($call_config->IDU($sql)) {
    $call_config->send_sms("8210386968","New Order Confirmed On the list with order number: ".$order_id);
mail('kishanur3@gmail.com', "New Order!!","New Order Confirmed On the list with order number: ".$order_id );
$call_config->msg("Success!!","Order Confirmed!!","success","user/dashboard/","");
}
else
{
$call_config->msg("Failed!!","Failed to confirm Order!!","error","user/dashboard/","");
}
}
else
{
	$call_config->msg("Failed!!","Failed to get data!!","error","user/dashboard/","");
}
?>