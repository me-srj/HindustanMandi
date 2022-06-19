<?php
if (isset($_POST['search'])) {
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
 $search=mysqli_escape_string($call_config->con,$_POST['search']);
 $product=$call_config->get_all("SELECT * FROM `tbl_product_master` WHERE `name` LIKE '%".$search."%' OR `description` LIKE '%".$search."%' OR `mrp` LIKE '%".$search."%' OR `selling_price` LIKE '%".$search."%'");
 $i=1;
 foreach ($product as $key) {
 $unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$key['unit']."'");
$Productimage=$call_config->get("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$key['id']."'");
		$sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$key['sub_category_id']."'");
		$category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
		$tax_amt=($key['selling_price']/100)*$category['tax_value_percent'];
    $off_percent=number_format((( $key['selling_price']+$tax_amt - $key['mrp']) * 100) / $key['mrp'],2);
 echo "<tr>
 <td>".$key['name']."</td>
 <td>".$key['description']."</td>
 <td>".$category['name']."(".$sub_cat['name'].")"."</td>
 <td>".$key['mrp']."/".$unit['unit']."</td>
 <td>".number_format($tax_amt+$key['selling_price'],2)."/".$unit['unit']."</td>
 <td><a class='btn text-white btn-sm btn-info' id='".$key['id']."' onclick='addtocart(this.id)'>Add</a></td>
 </tr>";
 }
}

?>