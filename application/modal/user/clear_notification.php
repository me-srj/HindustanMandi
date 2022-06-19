<?php
include('../../../config.php');
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
if ($call_config->IDU("DELETE FROM `tbl_notification_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'")) 
{
	$call_config->msg("Success!!","Notification Cleared!!","success","user/dashboard/","");
}
else
{
$call_config->msg("Failed!!","Failed to Clear Notification!!","info","user/dashboard/","");
}

?>