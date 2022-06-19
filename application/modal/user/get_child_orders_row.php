<?php
include('../../../config.php');
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
if (isset($_POST['last_record']) && isset($_POST['id'])) 
{
	$order_id=mysqli_escape_string($call_config->con,$_POST['id']);
	$result = array('last_record' => "",'html_data'=>"");
$last_record=mysqli_escape_string($call_config->con,$_POST['last_record']);
$total=$call_config->get("SELECT COUNT(*) as total FROM `tbl_child_order_master` WHERE `pid`='".$order_id."'"); 
if ($total['total']>$last_record) {
$result['last_record']=$last_record+10;
$subo=$call_config->get_all("SELECT * FROM `tbl_child_order_master` WHERE `pid`='".$order_id."' ORDER BY `con` LIMIT ".$last_record.",10");
foreach ($subo as $key) {
$prod=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$key['proid']."'");
$pimage=$call_config->get("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$prod['id']."' ORDER BY `con` ");
$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$prod['unit']."'");
$result['html_data'].='<div class="col-sm-12 btn mt-3"><p class="float-left" style="text-align: left;">'.$prod['name'].' X ('.$key['items'].')<br>Price:₹'.$key['uamount'].'/'.$unit['unit'].'<br>Total:<b>'.$key['amount'].'₹</b></p><img class="img-thumbnail float-right" src="'.$call_config->base_url().$pimage['path'].'" style="width:100px; height:100px"  /><br></div>';
}
$result['html_data'].='<div class="col-sm-12 btn btn-secondary mt-5 text-primary" id="load_more_btn" onclick="load_more()">More</div>';
 } 
 else
 {
 	$result['html_data']='<div class="col-sm-12 btn btn-secondary mt-5 text-primary">End of rows</div>';
 }
echo json_encode($result); 
}
else
{
$call_config->msg("Failed!!","Invalid URL","error","user/dashboard/","");	
}
?>