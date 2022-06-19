<?php
include('../../../config.php');
$call_config->user_sess_checker(); 
$sess_data_var=$call_config->user_sess_data_bind();
if (isset($_POST['tbl_name'])&&isset($_POST['last_record'])) 
{
	$result = array('last_record' => "",'html_data'=>"");
$tbl_name=mysqli_escape_string($call_config->con,$_POST['tbl_name']);
$last_record=mysqli_escape_string($call_config->con,$_POST['last_record']);
switch ($tbl_name) {
		case 'tbl_parent_order_master':
		$total=$call_config->get("SELECT COUNT(*) as total FROM `tbl_parent_order_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'"); 
if ($total['total']>$last_record) {
		$order=mysqli_query($call_config->con,"SELECT * FROM `tbl_parent_order_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' ORDER BY `con` DESC LIMIT ".$last_record.",10");
		
		while ( $key=mysqli_fetch_assoc($order)) {
			if ($key['amount']>299) {
			$amount_string=$key['amount']."₹";
			}
			else
			{
				$amount_string=($key['amount']+25)."₹ (25₹ Delivery Charge)";
			}
		$result['html_data'].='<div class="col-xl-12 pr-3 mt-2 pl-3 btn"><p class="float-left">Order No:</p><b class="float-right">#'.$key['id'].'</b><br><p class="float-left">This Order Contains '.$key['items'].' items and Total Amount:'.$amount_string.'.</p><br><b class="float-left text-muted mt-3" style="font-size: 15px;">On:'.date("d-M-Y", strtotime($key['con'])).'</b><a href="'.$call_config->base_url().'application/view/user/orders/view_order.php?id='.base64_encode($key['id']).'" class="btn btn-secondary float-right">View All</a>';
		if ($key['status']==0) {
			$result['html_data'].='<br><p style="width:100%;text-align: center;" class="bg-warning text-white float-left row"><b>Pending Confirmation!!</b></p>';
		}
		else
		{
			if ($key['d_date']==null || $key['d_date']=="") {
if ($key['exp_d_date']==null || $key['exp_d_date']=="") {
$result['html_data'].='<br><p style="width:100%;text-align: center;" class="bg-info text-white float-left row"><b>Order Pending!!</b></p>';
}
else
{
	$result['html_data'].='<br><p style="width:100%;text-align: center;" class="bg-info text-white float-left row"><b>Expected On:'.date("d-M-Y", strtotime($key['exp_d_date'])).'</b></p>';
}
			}
			else
			{
$result['html_data'].='<br><p style="width:100%;text-align: center;" class="bg-success text-white float-left row"><b>Delivered On:'.date("d-M-Y", strtotime($key['d_date'])).'</b></p>';
			}
		}
		$result['html_data'].='</div>';
		}
		$result['html_data'].='<div class="col-sm-12 btn btn-secondary mt-5 text-primary" id="load_more_btn" onclick="load_more()">More</div>';
		}
		else
		{
			 	$result['html_data']='<div class="col-sm-12 btn btn-secondary mt-5 text-primary">End of rows</div>';
		}
		break;
		case 'tbl_image_order_master':
		$total=$call_config->get("SELECT COUNT(*) as total FROM `tbl_image_order_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'"); 
if ($total['total']>$last_record) {
		$order=mysqli_query($call_config->con,"SELECT * FROM `tbl_image_order_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' ORDER BY `con` DESC LIMIT ".$last_record.",10");
		while ( $key=mysqli_fetch_assoc($order)) {
			$status="";
			if ($key['status']=="3") {
				$status='<div class="col-sm-12 bg-danger mt-5 text-white">Order Rejected.</div>';
			}
			else if ($key['status']=="1") {
			$status='<div class="col-sm-12 bg-success mt-2 text-white">Order Accepted.</div>';
			}
			else if ($key['status']=='0') {
			$status='<div class="col-sm-12 bg-info mt-2 text-white">Approvel Pending.</div>';
			}
			
		$result['html_data'].=$status;
		$result['html_data'].='<div class="col-xl-12 pr-3 pl-3 btn"><p class="float-left">Order No:</p><b class="float-right">#'.base64_encode($key['id']).'</b><br><br><img src="'.$call_config->base_url().$key['attachment'].'" style="width:100%; height:150px" class="img-thumbnail" /><br><br><b class="float-left text-muted mt-3" style="font-size: 15px;">'.date("d-M-Y", strtotime($key['con'])).'</b><a href="'.$call_config->base_url().$key['attachment'].'" class="btn btn-secondary float-right">View</a></div>';
		
		}
		$result['html_data'].='<div class="col-sm-12 btn btn-secondary mt-1 text-primary" id="load_more_btn" onclick="load_more()">More</div>';
		}
		else
		{
			 	$result['html_data']='<div class="col-sm-12 btn btn-secondary mt-5 text-primary">End of rows</div>';
		}
		break;
		case 'tbl_message_order_master':
		$total=$call_config->get("SELECT COUNT(*) as total FROM `tbl_message_order_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'"); 
if ($total['total']>$last_record) {
		$order=mysqli_query($call_config->con,"SELECT * FROM `tbl_message_order_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' ORDER BY `con` DESC LIMIT ".$last_record.",10");
		while ( $key=mysqli_fetch_assoc($order)) {
			$status="";
			if ($key['status']=="3") {
				$status='<div class="col-sm-12 bg-danger mt-1 text-white">Order Rejected.</div>';
			}
						else if ($key['status']=="1") {
			$status='<div class="col-sm-12 bg-success mt-2 text-white">Order Accepted.</div>';
			}

			else if ($key['status']=='0') {
			$status='<div class="col-sm-12 bg-info mt-2 text-white">Approvel Pending.</div>';
			}

		$result['html_data'].=$status;
		$result['html_data'].='<div class="col-xl-12 pr-3 pl-3 btn"><p class="float-left">Order No:</p><b class="float-right">#'.base64_encode($key['id']).'</b><br><br><p>'.$key['message'].'</p><br><br><b class="float-left text-muted mt-3" style="font-size: 15px;">'.date("d-M-Y", strtotime($key['con'])).'</b></div>';
		}
		$result['html_data'].='<div class="col-sm-12 btn btn-secondary mt-5 text-primary" id="load_more_btn" onclick="load_more()">More</div>';
		}
		else
		{
			 	$result['html_data']='<div class="col-sm-12 btn btn-secondary mt-5 text-primary">End of rows</div>';
		}
		break;
	
	default:
		# code...
		break;
}
$result['last_record']=$last_record+10;
echo json_encode($result); 
//print_r($sampleArray);
}
else
{
$call_config->msg("Failed!!","Invalid URL","error","user/dashboard/","");	
}
?>