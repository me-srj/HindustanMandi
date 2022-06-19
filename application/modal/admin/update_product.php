<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["sub"]))
{
$id=mysqli_escape_string($call_config->con,$_POST['id']);
$name=mysqli_escape_string($call_config->con,$_POST['name']);
$description=mysqli_escape_string($call_config->con,$_POST['description']);
$mrp=mysqli_escape_string($call_config->con,$_POST['mrp']);
$selling_price=mysqli_escape_string($call_config->con,$_POST['selling_price']);
$unit=mysqli_escape_string($call_config->con,$_POST['unit']);
$quantitty=mysqli_escape_string($call_config->con,$_POST['quantitty']);
$category=mysqli_escape_string($call_config->con,$_POST['category']);
$scategory=mysqli_escape_string($call_config->con,$_POST['scategory']);
$key_features=mysqli_escape_string($call_config->con,$_POST['key_features']);
$shelf_life=mysqli_escape_string($call_config->con,$_POST['shelf_life']);
$mfg_details=mysqli_escape_string($call_config->con,$_POST['mfg_details']);
$seller=mysqli_escape_string($call_config->con,$_POST['seller']);
$disclaimer=mysqli_escape_string($call_config->con,$_POST['disclaimer']);
if ($call_config->IDU("UPDATE `tbl_product_master` SET `sub_category_id`='".$scategory."',`name`='".$name."',`description`='".$description."',`mrp`='".$mrp."',`selling_price`='".$selling_price."',`unit`='".$unit."',`key_features`='".$key_features."',`quantitty`='".$quantitty."',`shelf_life`='".$shelf_life."',`mfg_details`='".$mfg_details."',`seller`='".$seller."',`disclaimer`='".$disclaimer."',`uby`='".$sess_data_get['sess_adm_id']."' WHERE `id`='".$id."'")) {
	$call_config->msg("Success!!","Product Updated!!","success","admin/product/","");
}
else
{
		  $call_config->msg("Failed!!","Updation Failed!!","info","admin/product/","");
}
}
else
{
	  $call_config->msg("Failed!!","Invalid URL!!","error","admin/product/","");
}