<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_GET["id"]))
{
$id=mysqli_escape_string($call_config->con,$_GET['id']);
if ($call_config->IDU("DELETE FROM `tbl_message_master` WHERE `id`='".$id."'")) {
  $call_config->msg("Successfull!!","Message deleted Successfully!!","success","admin/Message/","");
}
else
{
  $call_config->msg("Failed!!","Failed to delete Banner!!","info","admin/Message/","");

}
} 