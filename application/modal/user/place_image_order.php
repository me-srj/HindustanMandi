<?php
include('../../../config.php');
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
//$call_config->user_validation();
if (isset($_POST['submit']) && isset($_POST['address'])) {
	$address=mysqli_escape_string($call_config->con,$_POST['address']);
if (isset($_FILES['image'])) {
	 $fimg=$_FILES['image']['name']; 
	if($fimg !=null)
	{
//code to upload account manager image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$dfilepath="app-assets/images/image_order/".$file_name;
$final_path="../../../app-assets/images/image_order/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
 $image=$dfilepath;
if ($call_config->IDU("INSERT INTO `tbl_image_order_master`(`cid`,`addressid`, `attachment`) VALUES ('".$sess_data_var['sess_user_id']."','".$address."','".$image."')")) {
$user=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$sess_data_var['sess_user_id']."'");
$subject="Order Placed!!";
$message="Your Image Order is has been placed successfully, Please Wait till we create a proper Order for you";
if($user['email']!=null||$user['email']!="")
{
    mail($user['email'], $subject, $message);
}
$call_config->msg("Order Placed!!","Order Placed Successfully!!","success","user/orders/","");
}
else
{
	$call_config->msg("Failed!!","Failed to insert data!!","info","user/dashboard/","");
}
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["image"]["error"];
}
}
else
{
$call_config->msg("Failed!!","Failed to get Image","info","user/dashboard/","");}
}
else
{
	$call_config->msg("Failed!!","Failed to get Image","info","user/dashboard/","");
}
}
else
{
	 	$call_config->msg("Failed!!","Invalid URL.","error","user/dashboard/","");

}

?>