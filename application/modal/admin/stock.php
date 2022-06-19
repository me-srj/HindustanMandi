<?php
include('../../../config.php');
$sess_data_get=$call_config->adm_sess_data_bind();
$call_config->admin_sess_checker();
if (isset($_POST['id']) && isset($_POST['stock'])) {
//code to post text data
  $id=mysqli_escape_string($call_config->con,$_POST['id']);
 $quantity=mysqli_escape_string($call_config->con,$_POST['stock']);
$get="SELECT * FROM `tbl_product_master` WHERE `id`='".$id."'";
$pro=$call_config->get($get);
$new_quantity=$pro["stock"]+$quantity;
if ($new_quantity < 0) {
  $call_config->msg("Failed","Stock can not be in negative.","info","admin/product/","");
}
$sql="UPDATE `tbl_product_master` SET `stock`='".$new_quantity."',`uby`='".$sess_data_get["sess_adm_id"]."' WHERE `id`='".$id."'";
if ($call_config->IDU($sql)) 
{
  $call_config->msg("Success","Stock added successfully","success","admin/product/","");
}
else
{
   $call_config->msg("Failed","Failed to add Stock!!","error","admin/product/","");
}
}
else
{
  $call_config->msg("Error","Error in page","error","","");
}


?>