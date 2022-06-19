
<?php
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();

if(isset($_POST["submit"]))
{
	$id= $_POST['id'];
	$tax= $_POST['tax'];
	$taxvaluep= $_POST['taxvaluep'];
	$session= $sess_data_get['sess_adm_id'];
	if( $tax != ''   || $tax != null &&
	$id != ''   || $id != null &&
	$taxvaluep !='' || $taxvaluep != null &&
	$session != '' || $session != null )
	{
			$sql = "UPDATE `tbl_tax_master` SET `tax`='".$tax."',`tax_value_percent`='".$taxvaluep."',`uby`='".$session."' WHERE `id`='".$id."' ";
    if ($call_config->IDU($sql)) {
    	            $call_config->msg('Success','Data UPDATE Successfully...!','success',"admin/tax_layers/","");
	
    }else {
    	?><script>alert("Invalid to UPDATE...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/tax_layers/";</script><?php
}
}
else{
	?>
	<script>alert("fill first...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/tax_layers/";</script><?php
}
}
?>