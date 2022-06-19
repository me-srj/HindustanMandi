<?php 
include('../../../config.php');
 if (isset($_POST['sub'])) 
 {
$email_mobile=mysqli_escape_string($call_config->con,$_POST['email_mobile']);
$password=mysqli_escape_string($call_config->con,$_POST['password']);
 if ($call_config->checkEmail($email_mobile)) 
 {
 	$column1="email";
 	mail($email_mobile, "Registration Successfull!!", "Hello, Welcome to the family. Thanks for choosing us");
 }
 else
 {
 	if (strlen($email_mobile)==10) 
 	{
 		$call_config->send_sms($email_mobile,"Hello, Welcome to the family,Please login and complete your profile");
 	}
 	else
 	{
 $call_config->msg("Error!!","Failed to register!!","error","user/","dashboard/");		
 	}
 	$column1="mobile";
 }
 $sql="INSERT INTO `tbl_customer_master`(`".$column1."`, `password`) VALUES ('".$email_mobile."','".md5($password)."')";
if ($call_config->IDU($sql)) 
 {
 if ($column1=="email") {
  	mail($email_mobile, "Registration Successfull!!", "Hello you have registered yourself successfully!!");
  }
  					$cookie=md5($password.uniqid());
					$cookie_pass=md5(uniqid()); 
$insert="UPDATE `tbl_customer_master` SET `cookie`='".$cookie."',`cookie_pass`='".$cookie_pass."' WHERE `".$column1."`='".$email_mobile."'";
  if ($call_config->IDU($insert)) {
  setcookie("grocer_cookie", $cookie, time() + (86400 * 30), "/");
  setcookie("cookie_pass", $cookie_pass, time() + (86400 * 30), "/");
  $call_config->msg("Success!!","Registration Successfull!!","success","user/","dashboard/");
  } 	
 }
 else
 {
 	$call_config->msg("Error!!","Failed to register!!","error","user/","dashboard/");
 }
}
else{
echo "string";
}

 ?>