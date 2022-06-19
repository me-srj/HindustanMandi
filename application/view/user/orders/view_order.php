<?php
 include("../../../../config.php");
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
if (isset($_GET['id'])) {
$order_id=$_GET['id'];
include('../../../../public/user/v1_HeadPart.php');
include('../../../../public/user/v2_sidebar.php');
include('../../../../public/user/v3_TopNavBar_login.php');
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body"> 
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"><b>Order ID:</b>#<?= base64_decode($order_id) ?></h6>
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
        
<!-- BEGIN: Page JS-->
    <script src="<?php echo $call_config->base_url() ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!--code for table starts here-->

  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
<input type="number" name="last_record_number" id="last_record_number" hidden value="10">
<input type="number"  id="order_id" value="<?= base64_decode($order_id) ?>" hidden name="">
<div id="table_responsive_div" class="row">
<?php
$subo=$call_config->get_all("SELECT * FROM `tbl_child_order_master` WHERE `pid`='".base64_decode($order_id)."' ORDER BY `con` LIMIT 0,10");
foreach ($subo as $key) {
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
<div class="col-sm-12 btn btn-secondary mt-5 text-primary" id="load_more_btn" onclick="load_more()">More</div>
          </div>
<div class="row">
  <?php
$parent_order=$call_config->get("SELECT * FROM `tbl_parent_order_master` WHERE `id`='".base64_decode($order_id)."'");
if ($parent_order['status']==0) {
?>
<a class="btn btn-warning col-xl-12 mt-3" href="<?= $call_config->base_url() ?>application/modal/user/confirm_order.php?id=<?php echo base64_decode($order_id) ?>">Confirm Order!!</a>
<?php
}
  ?>
</div>
<div id="recipt_div" style="display: none;" class="row">
  <?php
  $porder=$call_config->get("SELECT * FROM `tbl_parent_order_master` WHERE `id`='".base64_decode($order_id)."'");
  $customer=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$porder['cid']."'");
  $address=$call_config->get("SELECT * FROM `tbl_address_master` WHERE `id`='".$porder['addressid']."'"); 
?>
<div class="col-xl-12">
  <b class="float-left">Order No:</b><?= $porder['id'] ?>
  <time class="float-right"><?= date("d-M-Y", strtotime($porder['con'])) ?></time><b class="float-right">On:</b>
  <br>
  <div class="float-left">
    <b>Sold By</b><br><p>
    Hindustan Mandi
      <br>
      Sharkari mandi,Chapra,841301
    </p>
  </div>
  <div class="float-right">
    <b>Shipping/Billing Address</b><br>
    <b><?= $address['aname'] ?></b><?= $address['address'].",".$address['pin_code']."<br>".$address['city'].",".$address['state'].",".$address['mobile'] ?>
  </div>
</div>
<div class="col-xl-12 table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr><th>S.No</th>
        <th>Product</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Unit Amount <b>X</b> Quantity</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
       $total_amount=0;
foreach ($subo as $key) {
$prod=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$key['proid']."'");
$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$prod['unit']."'");
$sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$prod['sub_category_id']."'");
    $category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
    $tax_amt=($prod['selling_price']/100)*$category['tax_value_percent'];
    $off_percent=number_format((($prod['mrp']-$prod['selling_price']+$tax_amt) * 100) / $prod['mrp'],2);
    $off_percent_value=($prod['selling_price']+$tax_amt-$prod['mrp'])*100;
     if ($off_percent_value>0) {
      $off_percent=number_format($off_percent_value/$prod['mrp'],2)."% OFF";
    }
    else
    {
      $saved=$prod['mrp']-$prod['selling_price'];
      $off_percent="Saved ".$saved." ₹";
    }
?>
<tr><td><?= $i++; ?></td>
<td><?= $prod['name']." (".$prod['quantitty'].")" ?></td>
<td><s><?= $prod['mrp']?></s></td>
<td><?= $off_percent ?></td>
<td><?= $key['uamount']."<b> X </b>(".$key['items'].")" ?></td>
<td><?= $key['amount'] ?></td></tr>
<?php
$total_amount=$total_amount+$key['amount'];
}
if ($parent_order['flat_off']=="0") {
  $offed_amount=$total_amount;
  $amount_string=$total_amount;
}
else
{
  $off=($total_amount/100)*$parent_order['flat_off'];
  $offed_amount=($total_amount-$off);
  $amount_string="<s>".$total_amount."</s><b class='text-success'> ".$parent_order['flat_off']."% Off</b>= ".$offed_amount;
}
if ($offed_amount>298) {
  ?>
<tr><td colspan="0">Total:</td><td colspan="3"><?= $amount_string." ₹ + Free Delivery" ?></td></tr>
  <?php
}
else
{
 ?>
<tr><td colspan="0">Total:</td><td colspan="2"><?= $amount_string." + 25 ₹ Delivery Charge" ?></td><td colspan="4"><?= $total_amount+25 ?>₹</td></tr>
  <?php 
}
  ?>
    </tbody>
  </table>
</div>
</div>
<div class="row">
    <a id="print_btn" class="btn btn-warning col-xl-12 mt-3" onclick="view_reciept()" href="#">View Reciept</a>
  <?php
if ($porder['exp_d_date']==null || $porder['exp_d_date']=="") {
  # code...
}
else
{
  ?>
<a style="display: none;" id="download_reciept_btn" class="btn btn-warning col-xl-12 mt-3" href="<?= $call_config->base_url() ?>app-assets/reciept_pdf/<?= $porder['id'] ?>.pdf">Download Reciept</a>
  <?php
}
  ?>
</div>
        </div>
       
      </div>
    </div>

<!--code for table ends here-->
<?php
 include('../../../../public/user/v5_Footer.php');
}
else
{
$call_config->msg("Failed!!","Invalid URL!!","error","user/dashboard/","");
}

?>
<script type="text/javascript">
  $(document).ready(function(){
  get_cart();
});
function get_cart() {
$.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/cart_number.php' ?>',
  type:'POST',
  data:{action:"show"},
  success:function(data){
//    alert(data);
    $("#cart_tag").html(data);
  }
}); 
  }
function view_reciept() {
  $("#download_reciept_btn").slideDown();
  $("#recipt_div").slideDown();
  $("#print_btn").hide();
}
 function load_more() {
  $("#load_more_btn").remove();
  load_rows();
 }
   function load_rows()
  {
    id=$("#order_id").val();
    last_record=$("#last_record_number").val();
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/get_child_orders_row.php' ?>',
  type:'POST',
  data:{last_record:last_record,id:id},
  success:function(data){
//alert(data);
obj = JSON.parse(data);
$("#last_record_number").val(obj['last_record']);
$('#table_responsive_div').append(obj['html_data']);
  }
});
  }
</script>