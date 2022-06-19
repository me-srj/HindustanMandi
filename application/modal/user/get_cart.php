<?php
include('../../../config.php');
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
if (isset($_POST['action'])) {
$result="";
$sub_total=0;
		if(isset($_SESSION["shopping_cart"]))
		{
			if (sizeof($_SESSION['shopping_cart'])==0) {
$result='<div class="col-md-12 mt-4 btn" style="text-align: center;"><h2>Your Cart Is Empty!</h2><h6 class="text-muted">Add some goods now!</h6><a class="btn btn-primary" href="'.$call_config->base_url().'application/view/user/dashboard/"> <b>Shop now!!</b></a></div>';
			}
			else
			{
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
$product=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$_SESSION['shopping_cart'][$keys]['product_id']."'");
$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$product['unit']."'");
		$Productimage=$call_config->get("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$product['id']."'");
		$sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$product['sub_category_id']."'");
		$category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
		$tax_amt=($product['selling_price']/100)*$category['tax_value_percent'];
		$unit_amt=$product['selling_price'] + $tax_amt;
		$total_amt=($product['selling_price'] + $tax_amt)*$_SESSION['shopping_cart'][$keys]['product_quantity'];
		$sub_total=$sub_total+$total_amt;
 $result.='<div class="col-md-12 btn">
 <a href="'.$call_config->base_url().'application/view/user/view_product/?id='.base64_encode($product['id']).'">
 <img src="'.$call_config->base_url().$Productimage['path'].'" style="width:40%; height:100px" class="float-left" />
 <div class="float-right" style="width:40%;">
 <div style="text-align: left;"><b>'.$product['name'].'</b><p class="text-muted" style="font-size: 10px;">'.$product['quantitty'].'</p><b>'.number_format((float)($unit_amt), 2, '.', '').'₹ /'.$unit['unit'].' X <i class="text-warning">'.$_SESSION['shopping_cart'][$keys]['product_quantity'].'</i></b><br><b>Total:'.number_format((float)$total_amt, 2, '.', '').'₹</b></div>
 </div>
 </a>
 <button class="btn btn-sm btn-success" style="width:40px;" id="'.base64_encode($product['id']).'" onclick="add_one(this.id)">+1</button>
 <button class="btn btn-sm btn-danger mt-1" style="width:40px;" id="'.base64_encode($product['id']).'" onclick="remove_one(this.id)">-1</button><button style="width:100%;" onclick="remove(this.id)" id="'.base64_encode($product['id']).'" class="btn btn-warning text-white mt-1">Remove</button>
 </div>';
			}
$flat_off=$call_config->get("SELECT * FROM `tbl_flat_off_master`");
if ($flat_off['status']=="1") {
	$off=($sub_total/100)*$flat_off['value'];
	$result.="<div class='col-md-12 mt-4' style='text-align:center'>Special Offer:<b>".$off." ₹!! Off Aplied. Total: <s class='text-muted'>".$sub_total."</s></b></div>";
	$sub_total=$sub_total-$off;
}
			if ($sub_total>298) 
			{
	$result.="<div class='col-md-12 mt-4' style='text-align:center'>Total:<b>".$sub_total." ₹ + Free Delivery!! </b></div>";
			}
			else
			{
	$result.="<div class='col-md-12 mt-4' style='text-align:center'>Total:<b>".$sub_total." ₹ +25 ₹ Delivery Charges </b><br><i>Shop For 298₹ or more to get Free Delivery.<i></div>";
			}
			}
		}
		else
		{
$result='<div class="col-md-12 mt-4 btn" style="text-align: center;"><h2>Your Cart Is Empty!</h2><h6 class="text-muted">Add some goods now!</h6><a class="btn btn-primary" href="'.$call_config->base_url().'application/view/user/dashboard/"> <b>Shop now!!</b></a></div>';
		}
		echo $result;
}
else
{
	echo "data not posted";
}
?>