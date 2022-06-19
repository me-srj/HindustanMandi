<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
 $base_url=$call_config->base_url();
if (isset($_POST['argument'])) {
	$sql="SELECT * FROM `tbl_sub_category_master` WHERE `category_id`='".$_POST['argument']."'";
$result=mysqli_query($call_config->con,$sql); 
$output="<option selected disabled>--Select Sub-Category--</option>";
$i=1;
while ( $key=mysqli_fetch_assoc($result)) {
$output.="<option value='".$key['id']."'>".$key['name']."</option>";
}
if ($output=="" || $output==null) {
echo "<option>No Sub Category in table</option>";
}
else
{
	echo $output;
}

}
else
{
		$call_config->msg("Failed!!","Invalid action","error","","");	
}

?>