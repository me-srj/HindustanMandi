<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_GET["id"]))
{
$id=mysqli_escape_string($call_config->con,$_GET['id']);	
if ($call_config->IDU("UPDATE `tbl_product_master` SET `status`='1',`uby`='".$sess_data_get['sess_adm_id']."' WHERE `id`='".$id."'")) {
	$call_config->msg("Success!!","Product Un-Hidden!!","success","admin/product/","");
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