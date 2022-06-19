<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_POST['otp'])) 
{
	$otp=mysqli_escape_string($call_config->con,$_POST['otp']);
	$pass=mysqli_escape_string($call_config->con,$_POST['_password']);
		$rpass=mysqli_escape_string($call_config->con,$_POST['_rpassword']);
		if ($pass!=$rpass) {
	$call_config->msg("Failed!!","Password and Re-Password Do not match Please Try Again.","info","adminpass_change.php?otp=",$otp);	
		}
	$u_sql="UPDATE `tbl_admin_master` SET `password`='".md5($pass)."' WHERE `otp`='".$otp."'";
	if ($call_config->IDU($u_sql)) {
		$call_config->msg("Success!!","Password Updated Successfully!!","success","acpanel_login.php","");	
	}
	else
	{
			$call_config->msg("Failed!!","Updation Failed, Old Password And New Password might be same","info","adminpass_change.php?otp=",$otp);	
	}
}
else
{
	$call_config->msg("Failed!!","Invalid action","error","","");	
}

?>