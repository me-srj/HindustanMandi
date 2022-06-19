<?php
include('../../../config.php');
$call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
 $result = array('html' => "",'total'=>"" );
 $sub_total=0;
if (isset($_POST['action'])) {
if (isset($_SESSION['shopping_cart'])) {
		foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
$product=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$_SESSION['shopping_cart'][$keys]['product_id']."'");
$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$product['unit']."'");
		$sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$product['sub_category_id']."'");
		$category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
		$tax_amt=($product['selling_price']/100)*$category['tax_value_percent'];
		$unit_amt=$product['selling_price'] + $tax_amt;
		$total_amt=($product['selling_price'] + $tax_amt)*$_SESSION['shopping_cart'][$keys]['product_quantity'];
		$sub_total=$sub_total+$total_amt;
 $result['html'].="<tr>
 <td>".$product['name']."[".$category['name']."(".$sub_cat['name'].")"."]<br>".$product['description']."</td>
 <td>".number_format($tax_amt+$product['selling_price'],2)."/".$unit['unit']." X (".$_SESSION['shopping_cart'][$keys]['product_quantity'].")"."=".$total_amt."</td>
 <td><a class='btn text-white btn-sm btn-success' id='".$product['id']."' onclick='addtocart(this.id)'>+1</a>
 <a class='btn btn-sm text-white btn-warning' id='".$product['id']."' onclick='remove_one(this.id)'>-1</a>
 <a class='btn btn-sm text-white btn-danger' id='".$product['id']."' onclick='remove(this.id)'><i class='ni ni-fat-remove'></i></a></td>
 </tr>";
 $result['total']=$sub_total;
			}
}
else
{
	$result['html']="<tr><td>Cart is Empty!!</td></tr>";
	$result['total']="";
}
echo json_encode($result);
}
