
<?php
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["pid"]) && isset($_POST['number']))
{
	$pid= mysqli_escape_string($call_config->con,$_POST['pid']);
	$number=  mysqli_escape_string($call_config->con,$_POST['number']);
	$session=  $sess_data_get['sess_adm_id'];
	if( $pid != ''   || $pid != null ||	$number !='' || $number != null )
	{
$product=$call_config->get("SELECT * FROM `tbl_product_master` where `id`='".$pid."'");
$new=$product['stock']+$number;
	$sql = "UPDATE `tbl_product_master` SET `stock`='".$new."',`uby`='".$sess_data_get['sess_adm_id']."' WHERE `id`='".$pid."'";
    
    if ($call_config->IDU($sql)) 
    {
    	            $call_config->msg("Successfully!!","Stock Changed","success","admin/product/","");
    }else {
    	?><script>alert("Invalid to INSERT...!<?= mysqli_error($call_config->con) ?>");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/product/";</script><?php
				//	$res = $call_config->slient_session_flash();
}
}
else{
	?>
	<script>alert("fill first...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/product/";</script><?php
}
}
?>