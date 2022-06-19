<?php
include('../../../config.php');
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
if (isset($_POST['submit'])) {
	$first_name=mysqli_escape_string($call_config->con,$_POST['first_name']);
	$last_name=mysqli_escape_string($call_config->con,$_POST['last_name']);
$sql="UPDATE `tbl_customer_master` SET `first_name`='".$first_name."',`last_name`='".$last_name."',";
if (isset($_POST['dob'])) {
	$dob=mysqli_escape_string($call_config->con,$_POST['dob']);
	if ($dob!=null || $dob!="") {
		$sql=$sql."`dob`='".$dob."',";
	}
}
if (isset($_POST['email'])) {
	$email=mysqli_escape_string($call_config->con,$_POST['email']);
	$sql=$sql."`email`='".$email."',";
}
if (isset($_POST['mobile'])) {
	$mobile=mysqli_escape_string($call_config->con,$_POST['mobile']);
	$sql=$sql."`mobile`='".$mobile."',";
}
if (isset($_FILES['image'])) {
	 $fimg=$_FILES['image']['name']; 
	if($fimg !=null)
	{
//code to upload account manager image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$dfilepath="app-assets/images/user_image/".$file_name;
$final_path="../../../app-assets/images/user_image/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
 $image=$dfilepath;
	$sql=$sql."`image`='".$image."',";
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["image"]["error"];
}
}
else
{
//do nothing
}
}
if ($call_config->IDU($sql."`uby`='".$sess_data_var['sess_user_id']."' WHERE `id`='".$sess_data_var['sess_user_id']."'")) {
	$call_config->msg("Success!!","Profile Updated Successfully!!","success","user/dashboard/","");
}
else
{
$call_config->msg("Failed!!","Failed To Update Profile!!","error","user/dashboard/","");	
}
}
else
{
	$call_config->msg("Error!!","Invalid URL!!","info","user/dashboard/","");
}

?>