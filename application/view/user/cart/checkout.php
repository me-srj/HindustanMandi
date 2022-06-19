<?php
 include("../../../../config.php");
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
//$call_config->user_validation();
if (isset($_POST['submit'])) {
	if(isset($_SESSION["shopping_cart"]))
		{
$items=0;
$amount=0;
$addressid=mysqli_escape_string($call_config->con,$_POST['address']);
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
    if ($call_config->IDU("INSERT INTO `tbl_child_order_master`(`pid`, `proid`, `items`, `uamount`, `amount`, `cby`) VALUES ('".$id."','".$_SESSION["shopping_cart"][$keys]['product_id']."','".$pquantity."','".$uamtt."','".$total_amount."','".$sess_data_var['sess_user_id']."')")) {
	//do nothing child order successfull
	}
	else
	{
		$call_config->msg("Failed!!","Failed To place Order!!","error","user/cart/");
	}
}
$flat_off=$call_config->get("SELECT * FROM `tbl_flat_off_master`");
if ($flat_off['status']=="1") {
	$off=($amount/100)*$flat_off['value'];
	$amount=$amount-$off;
	$flat=$flat_off['value'];
}
else
{
	$flat=0;
}
$parent_sql="INSERT INTO `tbl_parent_order_master`(`flat_off`,`id`, `cid`, `addressid`, `items`, `amount`,`cby`) VALUES ('".$flat."','".$id."','".$sess_data_var['sess_user_id']."','".$addressid."','".$items."','".$amount."','".$sess_data_var['sess_user_id']."')";
	if ($call_config->IDU($parent_sql)) {
		unset($_SESSION["shopping_cart"]);
$call_config->IDU("INSERT INTO `tbl_notification_master`(`cid`, `title`, `message`) VALUES ('".$sess_data_var['sess_user_id']."','Order Placed!!','Your Order Number ".$id." is has Been Placed.')");
$call_config->send_sms("8210386968","New Order On the list with order number: ".$id);
mail('kishanur3@gmail.com', "New Order!!","New Order On the list with order number: ".$id );
	$call_config->msg("Success!!","Order Placed Successfully!!","success","user/dashboard/","");
	}
	else
	{
	//	echo mysqli_error($call_config->con);
	$call_config->msg("Failed!!","Failed to order parent!!","info","user/dashboard/","");	
	}		
}
else
{
$call_config->msg("Empty Cart!!","Order can not be placed","info","user/dashboard/","");
		}
}
else
{
	$call_config->msg("Error","Invalid Page!!","error","user/dashboard/","");
}

?>