<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
$head=mysqli_escape_string($call_config->con,$_POST['head']);
$body=mysqli_escape_string($call_config->con,$_POST['body']);
$designation=mysqli_escape_string($call_config->con,$_POST['designation']);
if ($call_config->IDU("INSERT INTO `tbl_message_master`(`head`, `body`, `designation`) VALUES ('".$head."','".$body."','".$designation."')")) {
	$call_config->msg("Success!!","Message Added Successfully!!","success","admin/message/","");
}
else
{
		  $call_config->msg("Failed!!","Insertion Failed!!","info","admin/message/","");
}
}
else
{
	  $call_config->msg("Failed!!","Invalid URL!!","error","admin/message/","");
}