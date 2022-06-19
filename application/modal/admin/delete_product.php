<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_GET["id"]))
{
$id=mysqli_escape_string($call_config->con,$_GET['id']);	
$check=$call_config->get("SELECT * FROM `tbl_child_order_master` WHERE `proid`=".$id."");
if ($check['id']!=null||$check['id']!="") {
	$call_config->msg("Error!!","Product Can't be deleted!!","info","admin/product/","");
}
else
{
	if ($call_config->IDU("DELETE FROM `tbl_product_master` WHERE `id`='".$id."'")) {
$call_config->IDU("SELECT * FROM `tbl_recent_view_master` WHERE `pid`='".$id."'");
	$call_config->msg("Success!!","Product Hidden!!","success","admin/product/","");
}
else
{
		  $call_config->msg("Failed!!","Updation Failed!!","info","admin/product/","");
}
}
}
else
{
	  $call_config->msg("Failed!!","Invalid URL!!","error","admin/product/","");
}