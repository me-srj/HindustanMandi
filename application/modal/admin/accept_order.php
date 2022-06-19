<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["exp_d_date"]))
{
$order_id=mysqli_escape_string($call_config->con,$_POST['order_id']);
$order=$call_config->get("SELECT * FROM `tbl_parent_order_master` WHERE `id`='".$order_id."'");	
$address=$call_config->get("SELECT * FROM `tbl_address_master` WHERE `id`='".$order['addressid']."'");
$customer=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$order['cid']."'");
$subo=$call_config->get_all("SELECT * FROM `tbl_child_order_master` WHERE `pid`='".$order_id."'"); 
foreach ($subo as $key) {
 $pc=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$key['proid']."'");
if ($pc['stock']<$key['items']) {
  $call_config->msg("Failed!!","Product Not in stock ".$pc['name'],"error","admin/new_orders/","");
}
}
$exp_d_date=mysqli_escape_string($call_config->con,$_POST['exp_d_date']);
$arr11=explode(".",$_FILES['reciept_bill']['name']);
$lenarr11=count($arr11);
$file_name=$order_id.'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['reciept_bill']['tmp_name'];
$final_path="../../../app-assets/reciept_pdf/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
    { 
if ($call_config->IDU("UPDATE `tbl_parent_order_master` SET `exp_d_date`='".$exp_d_date."',`uby`='".$sess_data_get['sess_adm_id']."' WHERE `id`='".$order_id."'")) 
 {
  $call_config->msg("Success!!","Order Accepted!!","success","admin/new_orders/","");
 }
 else
 {
      $call_config->msg("Failed!!","Insertion Failed!!","info","admin/new_orders/","");
 }

  }
 else
 {
  echo "Failed to upload reciept_bill.".$_FILES["bill"]["error"];
}
}
else
{
	  $call_config->msg("Failed!!","Invalid URL!!","error","admin/new_orders/","");
}