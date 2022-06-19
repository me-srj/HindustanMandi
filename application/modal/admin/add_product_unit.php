<?php 

include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
	$unit= $_POST['unit'];
	$session= $sess_data_get['sess_adm_id'];
	if( $unit != ''   || $unit != null )
	{
			$sql = "INSERT INTO `tbl_product_unit_master`(`unit`,`cby`) VALUES ('$unit','$session')";
    if ($call_config->IDU($sql)) {
              $call_config->msg("SucceessfulL!!","A Data has been added..","success","admin/units/","");
	  }else {
              $call_config->msg("Error!!","Invaild to added..","error","admin/units/","");
}
}
else{
              $call_config->msg("fill first..!!","try again..","error","admin/units/","");
    	
}
}
?>