<?php 
include('../../../config.php');
 $call_config->admin_sess_checker();
 $sess_data_get=$call_config->adm_sess_data_bind();
if(isset($_POST["search"]))
{
$search=$_POST['search'];
$customer=$call_config->get_all("SELECT * FROM `tbl_customer_master` WHERE `first_name` LIKE '%".$search."%' OR `last_name` LIKE '%".$search."%' OR `email` LIKE '%".$search."%' OR `mobile` LIKE '%".$search."%'");
$i=1;
foreach ($customer as $key) {
	echo ' <tr>
                <td>'.$i++.'</td>
                <td><img style="width: 10%;height: 10%;border: groove;border-radius: 40px;" src="'.$call_config->base_url().$key['image'].'" alt="N/A"></td>
                <td>'.$key['first_name'].' '.$key['last_name'].'</td>
                <td>Email:'.$key['email'].'<br>Mobile:'.$key['mobile'].'</td>
                <td>'.$key['dob'].'</td>
                <td>
<a target="_blank" class="btn btn-sm btn-success" href="'.$call_config->base_url()."application/view/admin/customers/orders.php?id=".$key['id'].'">Normal</a>
<a target="_blank" class="btn btn-info btn-sm" href="'.$call_config->base_url()."application/view/admin/customers/image_order.php?id=".$key['id'].'">Image</a>
<a target="_blank" class="btn-sm btn btn-warning" href="'.$call_config->base_url()."application/view/admin/customers/message_order.php?id=".$key['id'].'">Message</a></td>
            </tr>';
}
if ($i==1) {
	echo "<tr><td>No Record Found.</td></tr>";
}
}
else
{
$call_config->msg("Failed!!","Failed to get data!!","error","admin/dashboard/","");
}