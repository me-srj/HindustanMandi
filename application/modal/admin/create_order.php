<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
$order_id=mysqli_escape_string($call_config->con,$_POST['order_id']);
$cid=mysqli_escape_string($call_config->con,$_POST['cid']);
$tbl_name=mysqli_escape_string($call_config->con,$_POST['tbl_name']);
$addressid=mysqli_escape_string($call_config->con,$_POST['addressid']);
if(isset($_SESSION["shopping_cart"]))
		{
$items=0;
$amount=0;
$id=$call_config->getuniquestring();
foreach($_SESSION["shopping_cart"] as $keys => $values)
{
	$product=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$_SESSION['shopping_cart'][$keys]['product_id']."'");
	$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$product['unit']."'");
	$sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$product['sub_category_id']."'");
	$category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
	$tax_amt=($product['selling_price']/100)*$category['tax_value_percent'];
	$uamtt=$product['selling_price']+$tax_amt;
	$pquantity= $_SESSION['shopping_cart'][$keys]['product_quantity'];
	$total_amount=($uamtt*$pquantity);
	$amount=$amount+$total_amount;
	$items=$items+$pquantity;
    if ($call_config->IDU("INSERT INTO `tbl_child_order_master`(`pid`, `proid`, `items`, `uamount`, `amount`, `cby`) VALUES ('".$id."','".$_SESSION["shopping_cart"][$keys]['product_id']."','".$pquantity."','".$uamtt."','".$total_amount."','".$cid."')")) {
	//do nothing child order successfull
	}
	else
	{
		$call_config->msg("Failed!!","Failed To place Order!!","error","admin/dashboard/");
	}
}
$parent_sql="INSERT INTO `tbl_parent_order_master`(`id`, `cid`, `addressid`, `items`, `amount`,`cby`,`status`) VALUES ('".$id."','".$cid."','".$addressid."','".$items."','".$amount."','".$cid."','0')";
	if ($call_config->IDU($parent_sql)) {
		unset($_SESSION["shopping_cart"]);
		$call_config->IDU("UPDATE `".$tbl_name."` SET `status`='1' WHERE `id`='".$order_id."'");
		$call_config->IDU("INSERT INTO `tbl_notification_master`(`cid`, `title`, `message`) VALUES ('".$cid."','Order Confirmed!!','Your Image/Message Order is has been confirmed!!')");
	$call_config->msg("Success!!","Order Placed Successfully!!","success","admin/dashboard/","");
	}
	else
	{
	//	echo mysqli_error($call_config->con);
	$call_config->msg("Failed!!","Failed to order parent!!","info","admin/dashboard/","");	
	}		
}
else
{
$call_config->msg("Empty Cart!!","Order can not be placed","info","admin/dashboard/","");
		}
}
else
{
$call_config->msg("Error!!","Failed to get data!!","error","admin/dashboard/","");
}