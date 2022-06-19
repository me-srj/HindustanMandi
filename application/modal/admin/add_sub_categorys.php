<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
	$sub_category= $_POST['sub_category'];
	$category= $_POST['category'];
	$session= $sess_data_get['sess_adm_id'];
	if( $sub_category != ''   || $sub_category != null  ||$category != '' || $category != null)
	{
$sql = "INSERT INTO `tbl_sub_category_master`(`name`, `category_id`, `cby`) VALUES('$sub_category', '$category','$session')";
    if ($call_config->IDU($sql)) {
        $call_config->msg("Succeessful!!","A sub_categorys has been added..","success","admin/sub_category/","");
    }else {
              $call_config->msg("Error!!","try again","warning","admin/sub_category/","");
}
}
else{
        $call_config->msg("Error!!","Fill it First","info","admin/sub_category/","");
}
}
?>