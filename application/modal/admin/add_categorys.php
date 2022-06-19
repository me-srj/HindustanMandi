<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
	$name= $_POST['name'];
	$tax= $_POST['tax'];
	$session= $_POST['session'];
	if( $name != ''   || $name != null    ||
		$tax != '' || $tax != null      		
		)
	{
			$sql = "INSERT INTO `tbl_category_master`(`name`, `tax_value_percent`, `cby`) VALUES('$name', '$tax','$session')";
    if ($call_config->IDU($sql)) {
  $call_config->msg("Successfull","A categorys has been added..","success","admin/category/","");
    }
    else 
    {
      $call_config->msg("Error!!","try again","warning","admin/category/","");
}
}
else{
  $call_config->msg("Error!!","Fill it First","info","admin/category/","");
	}
}
?>