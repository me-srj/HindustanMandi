<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
 $result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");
include('../../../../public/admin/v1_HeadPart.php');
 include('../../../../public/admin/v2_sidebar.php');
 include('../../../../public/admin/v3_TopNavBar.php');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6"> 
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Flat Off</h6>
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <form method="POST" action="<?= $call_config->base_url() ?>application/modal/admin/update_flat_offer.php">
    <div class="container-fluid mt--6">
    <div class="row card p-5" >
  <?php

$flat_off=$call_config->get("SELECT * FROM `tbl_flat_off_master`");
  ?>
  <div class="col-md-12">
  <label>Offer Percentage:-</label>
  <input type="number" step="0.01" name="value" class="form-control form-group" placeholder="Enter Value of the offer" value="<?= $flat_off['value'] ?>">
  </div>
  <div class="col-md-12">
    <?php
if ($flat_off['status']=='0') {
  ?>
    <a href="<?= $call_config->base_url() ?>application/modal/admin/activate_flat_offer.php" class="btn text-white float-right btn-info">Activate</a>
<?php
}
else
{
?>
  <a href="<?= $call_config->base_url() ?>application/modal/admin/deactivate_flat_offer.php" class="btn text-white float-right btn-danger">Deactivate</a>
<?php
}
    ?>
    <button type="submit" name="submit" class="btn btn-success float-center">Update</button>
  
  </div>
</div>
      </div>
      </form>
<?php
 include('../../../../public/admin/v5_Footer.php');
 
 //include('../../../../public/admin/v4_content.php');
 ?>
