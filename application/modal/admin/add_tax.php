
<?php
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
	$tax= mysqli_escape_string($call_config->con,$_POST['tax']);
	$taxvaluep=  mysqli_escape_string($call_config->con,$_POST['taxvaluep']);
	$session=  $sess_data_get['sess_adm_id'];
	if( $tax != ''   || $tax != null ||
	$taxvaluep !='' || $taxvaluep != null )
	{
			$sql = "INSERT INTO `tbl_tax_master`(`tax`, `tax_value_percent`, `cby`) VALUES ('$tax','$taxvaluep','$session')";
    if ($call_config->IDU($sql)) {
    	            $call_config->msg("Successfully!!","Tax Added","success","admin/tax_layers/","");
    }else {
    	?><script>alert("Invalid to INSERT...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/tax_layers/";</script><?php
				//	$res = $call_config->slient_session_flash();
}
}
else{
	?>
	<script>alert("fill first...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/tax_layers/";</script><?php
}
}
?>