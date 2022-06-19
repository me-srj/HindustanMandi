<?php
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if (isset($_POST['sub'])) {
$name=mysqli_escape_string($call_config->con,$_POST['name']);
$description=mysqli_escape_string($call_config->con,$_POST['description']);
$mrp=mysqli_escape_string($call_config->con,$_POST['mrp']);
$selling_price=mysqli_escape_string($call_config->con,$_POST['selling_price']);
$unit=mysqli_escape_string($call_config->con,$_POST['unit']);
$scategory=mysqli_escape_string($call_config->con,$_POST['scategory']);
$key_features=mysqli_escape_string($call_config->con,$_POST['key_features']);
$shelf_life=mysqli_escape_string($call_config->con,$_POST['shelf_life']);
$mfg_details=mysqli_escape_string($call_config->con,$_POST['mfg_details']);
$seller=mysqli_escape_string($call_config->con,$_POST['seller']);
$quantitty=mysqli_escape_string($call_config->con,$_POST['quantitty']);
$disclaimer=mysqli_escape_string($call_config->con,$_POST['disclaimer']);

$row1=$call_config->get("SELECT MAX(id) as max FROM tbl_product_master");
$pid=$row1["max"]+1;
if (isset($_FILES['photo'])) {
$total = count($_FILES['photo']['name']);
$generator = "1357902468";
$imagename=[]; 
for ($i=0; $i <$total ; $i++) {
	$image_name=$call_config->getuniquestring();
 	array_push($imagename, $image_name);
 	try
 	{
 	$tmpFilePath = $_FILES['photo']['tmp_name'][$i];
 	$newFilePath = "../../../app-assets/images/products/".$image_name.".".pathinfo($_FILES['photo']['name'][$i], PATHINFO_EXTENSION);
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
  $pathn="app-assets/images/products/".$image_name.".".pathinfo($_FILES['photo']['name'][$i], PATHINFO_EXTENSION);
    	$call_config->IDU("INSERT INTO `tbl_product_image_master`(`pid`, `path`,`cby`) VALUES ('".$pid."','".$pathn."','".$sess_data_get["sess_adm_id"]."')");
    }
 	}
 	catch(Exception $e)
 	{
 		echo $e;
 	}
 }
 if ($call_config->IDU("INSERT INTO `tbl_product_master`(`key_features`,`shelf_life`,`mfg_details`,`seller`,`disclaimer`,`sub_category_id`, `name`, `description`, `mrp`, `selling_price`, `unit`,  `cby`,`quantitty`) VALUES ('".$key_features."','".$shelf_life."','".$mfg_details."','".$seller."','".$disclaimer."','".$scategory."','".$name."','".$description."','".$mrp."','".$selling_price."','".$unit."','".$sess_data_get['sess_adm_id']."','".$quantitty."')")) {
 	$call_config->msg("Success","Product Added Successfully!!","success","admin/","product/");
 }
 else
 {
 	 	$call_config->msg("Failed","Failed to add Product!!","error","admin/","product/");
 }
}
}
else
{
	$call_config->msg("Invalid URL!!","Invalid url access!!","error","admin/dashboard/","");
}

?>