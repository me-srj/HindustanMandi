<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_POST['key'])) {
	$key=mysqli_escape_string($call_config->con,$_POST['key']);
    $sql="SELECT * FROM `tbl_admin_master` WHERE `email`='".$key."' OR `mobile`='".$key."'";
    $res=$call_config->get()
	if ($res['id']!=null && $res["id"]!="") 
	{	
 	$otp= md5(uniqid());
    $url=$call_config->base_url()."application/view/adminpass_change.php?otp=".$otp;
    $subject="Forget Password!!";
    $message="Your link to reset password is here, please click <a href='".$url."'>this</a> link to reset your profile";
    if (mail($res['email'], $subject, $message)) {
    	# code...
    }
    else
    {
    	echo "failed to send mail";
    }
    if (strlen($res['mobile'])==10) {
    	//add sms api code in future
    	echo "mesage send";
    }
    $u_sql="UPDATE `tbl_admin_master` SET `otp`='".$otp."' WHERE `email`='".$key."' OR `mobile`='".$key."'";
    if ($call_config->IDU($u_sql)) {
$call_config->msg("Success!!","Otp Generated Successfully,Please check your email or mobile","success","","");		
    }
    else
    {
    	$call_config->msg("Failed!!","Data Updation Failed!!","error","","");		
    }
	}
	else
	{
$call_config->msg("Failed!!","Form Validation Failed","error","admin/Currency/","");		
	}
}
else
{
	$call_config->msg("Failed!!","Invalid action","error","","");	
}

?>