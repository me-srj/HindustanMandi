<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
 $result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");
 include('../../../../public/admin/v1_HeadPart.php');
 include('../../../../public/admin/v2_sidebar.php');
 include('../../../../public/admin/v3_TopNavBar.php');
//include('../../../../public/admin/v4_content.php');
 ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">New Orders</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
              <div class="card-body">
<div class="table-responsive">
    <table class="table-striped table">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Contact</th>
                <th>Address</th>
                <th>View</th>
                <th>Delivery Date/Bill</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
$parent_order=$call_config->get_all("SELECT * FROM `tbl_parent_order_master` WHERE exp_d_date is null AND status='1'");
foreach ($parent_order as $key) {
  $customer=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$key['cid']."'");
  $address=$call_config->get("SELECT * FROM `tbl_address_master` WHERE `id`='".$key['addressid']."'");
$i=1;
?>
<form enctype="multipart/form-data" action="<?= $call_config->base_url() ?>application/modal/admin/accept_order.php" method="POST">
<tr>
<td><?= $key['id']  ?></td>
<td><?= $customer['first_name']." ".$customer['last_name']  ?><br>Email:<?= $customer['email']  ?><br>Mobile:<?=  $customer['mobile'] ?></td>
<td><?=  $address['address']."<br>".$address['city'].",".$address['state'].",".$address['pin_code'].",".$address['mobile'] ?></td>
<td><a target="_blank" href="<?= $call_config->base_url()?>application/view/admin/new_orders/view_order.php?id=<?= $key['id']?>" class="btn btn-info btn-sm">View</a></td>
<td>
<input type="hidden" value="<?= $key['id'] ?>" name="order_id">
  <input type="date" required name="exp_d_date" class="form-control">
<input type="file" name="reciept_bill" required ></td>
<td><a href="<?= $call_config->base_url() ?>application/modal/admin/reject_order.php?id=<?= $key['id'] ?>" class="btn btn-danger btn-sm">reject</a><button type='submit' class="btn btn-success btn-sm">Accept</a></td>
</tr>
</form>
<?php
}
?>
        </tbody>
    </table>
</div>
            </div>
          </div>
        </div>
       
      </div>
    
      
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- BEGIN: Page JS-->
    <script src="<?php echo $admin_base_url ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->

 <?php
include('../../../../public/admin/v5_Footer.php');

?>