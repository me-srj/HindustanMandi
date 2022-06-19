<?php
include('../../../config.php');
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
//$call_config->user_validation();
if (isset($_POST['message']) && isset($_POST['address'])) {
	$message=mysqli_escape_string($call_config->con,$_POST['message']);
		$address=mysqli_escape_string($call_config->con,$_POST['address']);
	if ($call_config->IDU("INSERT INTO `tbl_message_order_master`(`cid`,`addressid`, `message`) VALUES ('".$sess_data_var['sess_user_id']."','".$address."','".$message."')")) {
$user=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$sess_data_var['sess_user_id']."'");
$subject="Order Placed!!";
$message="Your Image Order is has been placed successfully, Please Wait till we create a proper Order for you";
if($user['email']!=null||$user['email']!="")
{
    mail($user['email'], $subject, $message);
}
	 	$call_config->msg("Success!!","Message Order Placed Successfully!!","success","user/orders/","");
	}
}
else
{
	 	$call_config->msg("Failed!!","Invalid URL.","error","user/dashboard/","");

}

?>