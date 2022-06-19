<?php
include('../../../config.php');
if (isset($_POST["param"])) {
	//$res = array('status' => false,'mobile'=>false,'mail'=>false );
	$email_mobile=mysqli_escape_string($call_config->con,$_POST['param']);
 if ($call_config->checkEmail($email_mobile)) {
	$column1="email";
 }
 else
 {
 	$column1="mobile";
 }
 if ($user=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `".$column1."`='".$email_mobile."'")) {
 $generatorstringaafff="1234567890";
	$result = "";  
    for ($aaaagg = 1; $aaaagg <= 4; $aaaagg++) 
    { 
        $result .= substr($generatorstringaafff, (rand()%(strlen($generatorstringaafff))), 1); 
    } 
    $otp=$result;
 	$subject="Reset Password!!";
 	$message="Hello!! your OTP to reset password of your account is: ".$result;
 	if ($call_config->IDU("UPDATE `tbl_customer_master` SET `cookie`='".$result."' WHERE `".$column1."`='".$email_mobile."'")) {
 	//$res['status']=true;
 		$result = array( );
 	if ($user['email']!=null|| $user['email']!="") {
 		if (mail($user['email'], $subject, $message)) {
 		$result['email']=1;
 	}
 	else
 	{
 		$result['email']=0;
 	} 
 	}
 	 	else
 	{
 		$result['email']=0;
 	} 
 	if (strlen($user['mobile'])==10) {
 	$call_config->send_otp($user['mobile'],$otp);
 	$result['mobile']=1;
 	}
 	 	else
 	{
 		$result['mobile']=0;
 	} 
 echo json_encode($result);
 	}
 }
}
else
{
	$call_config->msg("Error","Invalid URL","error","","");
}

?>