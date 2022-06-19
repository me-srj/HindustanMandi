<?php 
include('../../../config.php');
 if (isset($_POST['key'])) 
 {
$key=trim(mysqli_escape_string($call_config->con,$_POST['key']));
$result=$call_config->get_all("SELECT id,name,quantitty FROM `tbl_product_master` WHERE `name` LIKE '%".$key."%' OR `description` LIKE '%".$key."%' AND `status`='1' ORDER BY `con` DESC LIMIT 4");
if (sizeof($result)<=0 || $key==null || $key=="" || strlen($key)==0) 
{
 $result = array('id' => "#",'name'=>'No product Found' );
 echo json_encode($result);
 } 
 else
 {
 echo json_encode($result);	
 }
}
else
{
echo "string";
}
?>