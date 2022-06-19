
<?php

include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
	$unit= $_POST['unit'];
	$id= $_POST['id'];
	$session= $sess_data_get['sess_adm_id'];
	if( $unit != ''   || $unit != null ||
	$id != ''   || $id != null )
	{
	$sql = "UPDATE `tbl_product_unit_master` SET `unit`='".$unit."',`uby`='".$session."' WHERE `id`='".$id."' ";
    if ($call_config->IDU($sql)) {
            $call_config->msg('Success','Data UPDATE Successfully...!','success',"admin/units/","");
    		
    }else {
    	?><script>alert("Invalid to UPDATE...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/units/";</script><?php
}
}
else{
	?>
	<script>alert("fill first...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/units/";</script><?php
}
}
?>