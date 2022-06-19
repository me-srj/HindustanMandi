<?php
include('../../../config.php');
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
if (isset($_POST['action'])) 
{
$number = 0;
			if (isset($_SESSION['shopping_cart'])) {
				foreach($_SESSION["shopping_cart"] as $keys => $values)
			{

					$number = $number+$_SESSION["shopping_cart"][$keys]['product_quantity'];
			}
			}
			else
			{
				$number="";
			}
echo $number;
}
else
{
	$call_config->msg("Failed!!","Failed to get data!!","error","user/dashboard/","","");
}