
<?php
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
	$name= $_POST['name'];
	$tax= $_POST['tax'];
	$id= $_POST['id'];
	$session= $sess_data_get['sess_adm_id'];
	if( $name != ''   || $name != null   &&
	    $id != ''   || $id != null    &&
		$tax != '' || $tax != null      		
		)
	{
			$sql = "UPDATE `tbl_category_master` SET `name`='".$name."',`tax_value_percent`='".$tax."',`uby`='".$session."' WHERE `id`='".$id."' ";
    if ($call_config->IDU($sql)) {
    	$call_config->msg("Successfull","A categorys has been Updated!","success","admin/category/",""); 		
    }else {
    	?>
  <script>alert("Invalid to UPDATE...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/category/";</script><?php
}
}
else{
	?>
	<script>alert("fill first...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/category/index.php";</script><?php
}
}
?>