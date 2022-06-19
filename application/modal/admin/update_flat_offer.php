<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_data_get = $call_config->adm_sess_data_bind();
if (isset($_POST['value'])) {
$value=mysqli_escape_string($call_config->con,$_POST['value']);
$sql="UPDATE `tbl_flat_off_master` SET `value`='".$value."',`uby`='".$sess_data_get['sess_adm_id']."' WHERE `id`='1'";
//echo $res;
if ($call_config->IDU($sql)) 
{
$call_config->msg("Success!!","Updated Successfully.","success","admin/flat_off/","");
}
else
{
$call_config->msg("Failed!!","Updated Failed.","error","admin/flat_off/","");	
}
}
else
{
$call_config->msg("Failed!!","Invalid URL!!","error","admin/flat_off/","");	

}
?>