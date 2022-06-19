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
              <h6 class="h2 text-white d-inline-block mb-0">Image Orders</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
                 <a class="btn btn-neutral" href="<?= $call_config->base_url() ?>application/view/admin/image_orders/all.php">All</a>
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
<div class="row">
<?php
$message=$call_config->get_all("SELECT * FROM `tbl_image_order_master` WHERE `status`='0'");
foreach ($message as $key) {
  $Customer=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$key['cid']."'");
  ?>
    <div class="col-xl-12 mt-3 btn">
    <h4>Customer Details</h4>
    Name:<b><?= $Customer['first_name']." ".$Customer['last_name'] ?></b>
    Email:<b><?= $Customer['email'] ?></b>
    Mobile:<b><?= $Customer['mobile'] ?></b>
    On:<b><?= date('D-M-Y',strtotime($key['con'])) ?></b><br>
    <a class="btn btn-info mt-3" target="_blank" href="<?php echo $call_config->base_url().$key['attachment'] ?>">View</a><br><br>
    <a class="btn btn-danger float-left" href="#" data-toggle="modal" data-target="#reject<?php echo $key["id"];?>">Reject</a>
    <a target="_blank" class="btn btn-success float-right" href="<?= $call_config->base_url() ?>application/view/admin/create_order/?cid=<?= $Customer['id'] ?>&id=<?php echo $key['id'] ?>&type=tbl_image_order_master&aid=<?= $key['addressid'] ?>">Create Order</a>
  </div>
  <div class="modal fade text-left" id="reject<?php echo $key["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header bg-warning bg-lighten-2">
<h4 class="modal-title " id="myModalLabel17">Reject Image Order</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?= $call_config->base_url() ?>application/modal/admin/reject_image_order.php">
<div class="modal-body">
<label for="unit">Reason</label>
<input type="text" name="id" class="form-control" value="<?php echo $key["id"] ?>" hidden>
<textarea name="reason" class="form-control" required placeholder="Enter Reason of cancellation.."></textarea>
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Reject</button>
</form>
</div>
</div>
</div>
</div>
  <?php
}

?>
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