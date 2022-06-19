
<?php

include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
	$sub_category= $_POST['sub_category'];
	$category= $_POST['category'];
	$id= $_POST['id'];
	$session= $sess_data_get['sess_adm_id'];
	if($id != ''   || $id != null)
	{
			$sql = "UPDATE `tbl_sub_category_master` SET `name`='".$sub_category."',`category_id`='".$category."',`uby`='".$session."' WHERE `id`='".$id."' ";
    if ($call_config->IDU($sql)) {
    	        $call_config->msg("updated!!","category updated Successfully","success","admin/sub_category/","");
    	
    }else {
    	    	        $call_config->msg("Failed!!","category updated Failed","error","admin/sub_category/","");
}
}
else{
	?>
	<script>alert("fill first...!");window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/sub_category/";</script><?php
}
}
?>