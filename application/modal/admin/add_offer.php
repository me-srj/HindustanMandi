<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
$type=mysqli_escape_string($call_config->con,$_POST['type']);
$keyword=mysqli_escape_string($call_config->con,$_POST['keyword']);
$keyword_select=mysqli_escape_string($call_config->con,$_POST['keyword_select']);
$off_text=mysqli_escape_string($call_config->con,$_POST['off_text']);
$title=mysqli_escape_string($call_config->con,$_POST['title']);
$description=mysqli_escape_string($call_config->con,$_POST['description']);
 $fimg=$_FILES['image']['name']; 
if($fimg !=null){
//code to upload account manager image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$sql_path="app-assets/images/offer/".$file_name;
$final_path="../../../app-assets/images/offer/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
//  		echo "file uploaded<br>";
 $image=$file_name;
 if ($type=="0") {
 $sql="INSERT INTO `tbl_offer_master`(`off_text`,`title`,`description`,`keyword`, `image`, `cby`) VALUES ('".$off_text."','".$title."','".$description."','".$keyword."','".$sql_path."','".$sess_data_get['sess_adm_id']."')";
 }
 else
 {
$sql="INSERT INTO `tbl_offer_master`(`off_text`,`title`,`description`,`image`, `type`, `cby`) VALUES ('".$off_text."','".$title."','".$description."','".$sql_path."','".$keyword_select."','".$sess_data_get['sess_adm_id']."')";
 }
 if ($call_config->IDU($sql)) {
 $call_config->msg("Success!!","Banner Added Successfully!!","success","admin/offers/","");
 }
 else
 {
 	$call_config->msg("Failed!!","Failed to insert data!!","info","admin/offers/","");
 }
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["image"]["error"];
}
}
else
{
	$call_config->msg("Failed!!","Failed to get image!!","info","admin/offers/","");
}
}
else
{
  $call_config->msg("Failed!!","Failed to Access!!","info","admin/offers/","");

}
