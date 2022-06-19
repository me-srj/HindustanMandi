<?php
 include("../../../../config.php");
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_GET['id'])) {
$order_id=$_GET['id'];
$result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");
include('../../../../public/admin/v1_HeadPart.php');
include('../../../../public/admin/v2_sidebar.php');
 include('../../../../public/admin/v3_TopNavBar.php');
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body"> 
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"><b>Order ID:</b>#<?= $order_id ?></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"></a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
<input type="number" name="last_record_number" id="last_record_number" hidden value="10">
<input type="number"  id="order_id" value="<?= $order_id ?>" hidden name="">
<div id="table_responsive_div" class="row">
<?php
$total=0;
$subo=$call_config->get_all("SELECT * FROM `tbl_child_order_master` WHERE `pid`='".$order_id."' ORDER BY `con`");
foreach ($subo as $key) {
  $total=$total+$key['amount'];
$prod=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$key['proid']."'");
$pimage=$call_config->get("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$prod['id']."' ORDER BY `con` ");
$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$prod['unit']."'");
?>
<div class="col-sm-12 btn mt-3">
	<p class="float-left" style="text-align: left;"><?= $prod['name'] ?> X (<?= $key['items'] ?>)<br>Price:₹<?= $key['uamount'] ?>/<?= $unit['unit'] ?><br>Total:<b><?= $key['amount'] ?>₹</b></p>
  	<img class="img-thumbnail float-right" src="<?= $call_config->base_url().$pimage['path']?>" style="width:100px; height:100px"  /><br>
  </div>
<?php
}
?>
<div class="col-sm-12 btn mt3">
  Total:<?= $total ?>
</div>
          </div>
        </div>
       
      </div>
    </div>
<?php
 include('../../../../public/admin/v5_Footer.php');
}
else
{
$call_config->msg("Failed!!","Invalid URL!!","error","user/dashboard/","");
}

?>