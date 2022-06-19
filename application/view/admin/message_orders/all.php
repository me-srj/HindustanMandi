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
              <h6 class="h2 text-white d-inline-block mb-0">Message Orders</h6>
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
                <th>Name</th>
                <th>Contact</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody id="table_body">
      <?php
$message=$call_config->get_all("SELECT * FROM `tbl_message_order_master` WHERE `status`='0'");
foreach ($message as $key) {
  $Customer=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$key['cid']."'");
  $i=1;
  ?>
<tr>
  <td><?= $i++ ?></td>
  <td><?= $Customer['first_name']." ".$Customer['last_name'] ?></td>
  <td><?= "E-mail: ".$Customer['email']."<br> Mobile: ".$Customer['mobile'] ?></td>
  <td><?= $key['message'] ?></td>
</tr>
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