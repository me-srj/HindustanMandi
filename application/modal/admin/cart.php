<?php
include('../../../config.php');
$call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if (isset($_POST['action'])) {
$action=mysqli_escape_string($call_config->con,$_POST['action']);
$pid=mysqli_escape_string($call_config->con,$_POST['id']);
switch ($action) {
	case 'add':
		if(isset($_SESSION["shopping_cart"]))
		{
			$is_available = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($_SESSION["shopping_cart"][$keys]['product_id'] == $pid)
				{
					$is_available++;
					$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + 1;
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'               =>     $pid,      
					'product_quantity'         =>     1
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
				'product_id'               =>     $pid,  
				'product_quantity'         =>     1
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
		# code...
		break;
case 'clear':
				unset($_SESSION["shopping_cart"]);
				//echo "remove";
			
		break;
case 'remove':
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["product_id"] == $pid)
			{
				unset($_SESSION["shopping_cart"][$keys]);
				//echo "remove";
			}
		}
		break;
case 'remove_one':
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["product_id"] == $pid)
			{
$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] - 1;	
//echo "remove_one";	
	}
if ($_SESSION['shopping_cart'][$keys]["product_quantity"]==0) {
	unset($_SESSION["shopping_cart"][$keys]);
	//echo "remove_all";
		}
		}
		break;
	
	default:
echo "inside default";
		break;
}
}
else
{
	echo "data not posted";
}
?>