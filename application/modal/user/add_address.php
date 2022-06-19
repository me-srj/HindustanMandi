<?php
include('../../../config.php');
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
if (isset($_POST['submit'])) {
$address=mysqli_escape_string($call_config->con,$_POST['address']);
$pincode=mysqli_escape_string($call_config->con,$_POST['pincode']);
$city=mysqli_escape_string($call_config->con,$_POST['city']);
$state=mysqli_escape_string($call_config->con,$_POST['state']);
$mobile=mysqli_escape_string($call_config->con,$_POST['mobile']);
$aname=mysqli_escape_string($call_config->con,$_POST['addname']);
if ($call_config->IDU("INSERT INTO `tbl_address_master`(`cid`, `address`, `pin_code`, `city`, `state`, `mobile`,`aname`) VALUES ('".$sess_data_var['sess_user_id']."','".$address."','".$pincode."','".$city."','".$state."','".$mobile."','".$aname."')")) {
	$call_config->msg("Success!!","Address Added Successfully!!","success","user/profile/address.php","");

}
else
{
$call_config->msg("Failed!!","Failed to add address!!","info","user/profile/","");
}
}
else
{
$call_config->msg("Failed!!","Failed to get data!!","error","user/dashboard/","");
}

?>