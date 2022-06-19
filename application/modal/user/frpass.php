<?php
include('../../../config.php');
if (isset($_POST['email_mobile']) && isset($_POST['otp'])) {
$email_mobile=mysqli_escape_string($call_config->con,$_POST['email_mobile']);
$otp=mysqli_escape_string($call_config->con,$_POST['otp']);
$password=mysqli_escape_string($call_config->con,$_POST['password']);
if ($call_config->checkEmail($email_mobile)) {
 	$column1="email";
 }
 else
 {
 	$column1="mobile";
 }
 if ($check=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `".$column1."`='".$email_mobile."' AND `cookie`='".$otp."'")) {
 	if ($check['id']!=null || $check!="") {
 		if ($call_config->IDU("UPDATE `tbl_customer_master` SET `password`='".md5($password)."',`uby`='".$email_mobile."' WHERE `".$column1."`='".$email_mobile."'")) {
 		$call_config->msg("Success!!","Password Updated!!","success","user/dashboard/","");
 		}
 	}
 	else
 	{
 	$call_config->msg("Error!!","Invalid Email or OTP","success","user/dashboard/","");
 	}
 }
 else
 {
$call_config->msg("Invalid OTP","Invalid OTP","info","user/dashboard/",""); 	
 }
}
else
{
$call_config->msg("Failed","Invalid URL","error","","");
}

?>