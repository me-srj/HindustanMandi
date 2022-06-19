<?php
include('../../../config.php');
$call_config = new config();
$call_config->admin_sess_checker();
$sess_data_get = $call_config->adm_sess_data_bind();
$name=mysqli_escape_string($call_config->con,$_POST['name']);
$mobile=mysqli_escape_string($call_config->con,$_POST['mobile']);
//$adddress=mysqli_escape_string($call_config->con,$_POST['adddress']);
$id=$sess_data_get["sess_adm_id"];
$currentimg=mysqli_escape_string($call_config->con,$_POST['currentimg']);
 $fimg=$_FILES['image']['name']; 
if($fimg !=null){
//code to upload account manager image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$final_path="../../../app-assets/images/admin/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
//  		echo "file uploaded<br>";
 $image=$file_name;
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["image"]["error"];
}
}
else
{
	$image=$currentimg;
}
$sql="UPDATE `tbl_admin_master` SET `name`='".$name."',`mobile`='".$mobile."',`image`='".$image."',`uby`='".$sess_data_get["sess_adm_id"]."' WHERE `id`='".$sess_data_get["sess_adm_id"]."'";
//echo $res;
if ($call_config->IDU($sql)) 
{
$call_config->msg("Success!!","Updated Successfully.","success","admin/edit_profile/","");
	}
	else
	{
$call_config->msg("Failed!!","Updated Failed.","error","admin/edit_profile/","");	
}

?>